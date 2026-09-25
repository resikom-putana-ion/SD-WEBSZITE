<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        $news = News::latest('published_at')->get();

        return view('news.index', compact('news'));
    }

    public function show(News $news): View
    {
        $news->load('user');

        return view('news.show', compact('news'));
    }

    public function adminIndex(): View
    {
        $this->authorizeRole(['admin', 'teacher']);

        $news = News::latest('published_at')->get();

        return view('news.admin', compact('news'));
    }

    public function create(): View
    {
        $this->authorizeRole(['admin', 'teacher']);

        return view('news.form', ['news' => new News(), 'mode' => 'create']);
    }

    public function store(Request $request): RedirectResponse
    {
        $this->authorizeRole(['admin', 'teacher']);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp'],
            'published_at' => ['nullable', 'date'],
        ]);

        $news = News::create([
            'user_id' => Auth::id(),
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']).'-'.time(),
            'excerpt' => $validated['excerpt'] ?? Str::limit(strip_tags($validated['content']), 120),
            'content' => $validated['content'],
            'published_at' => $validated['published_at'] ?? now(),
        ]);

        if ($request->hasFile('image')) {
            $news->update([
                'image_path' => $request->file('image')->store('news', 'public'),
            ]);
        }

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit(News $news): View
    {
        $this->authorizeRole(['admin', 'teacher']);

        return view('news.form', ['news' => $news, 'mode' => 'edit']);
    }

    public function update(Request $request, News $news): RedirectResponse
    {
        $this->authorizeRole(['admin', 'teacher']);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp'],
            'published_at' => ['nullable', 'date'],
        ]);

        $news->update([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']).'-'.$news->id,
            'excerpt' => $validated['excerpt'] ?? Str::limit(strip_tags($validated['content']), 120),
            'content' => $validated['content'],
            'published_at' => $validated['published_at'] ?? $news->published_at ?? now(),
        ]);

        if ($request->hasFile('image')) {
            $news->update([
                'image_path' => $request->file('image')->store('news', 'public'),
            ]);
        }

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(News $news): RedirectResponse
    {
        $this->authorizeRole(['admin', 'teacher']);

        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil dihapus.');
    }

    protected function authorizeRole(array $roles): void
    {
        if (! Auth::check() || ! in_array(Auth::user()->role, $roles, true)) {
            abort(403);
        }
    }
}
