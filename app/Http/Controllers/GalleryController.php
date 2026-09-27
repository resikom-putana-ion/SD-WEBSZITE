<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function publicIndex(): View
    {
        $galleries = Gallery::latest()->get();

        return view('gallery.index', compact('galleries'));
    }

    public function manage(): View
    {
        $this->authorizeRole(['admin', 'teacher']);

        $galleries = Gallery::latest()->get();

        return view('gallery.manage', compact('galleries'));
    }

    public function create(): View
    {
        $this->authorizeRole(['admin', 'teacher']);

        return view('gallery.form', ['gallery' => new Gallery, 'mode' => 'create']);
    }

    public function store(Request $request): RedirectResponse
    {
        $this->authorizeRole(['admin', 'teacher']);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'category' => ['nullable', 'string', 'max:100'],
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        Gallery::create([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'category' => $validated['category'] ?? 'umum',
            'image_path' => $request->file('image')->store('gallery', 'public'),
        ]);

        return redirect()->route('gallery.manage')->with('success', 'Galeri berhasil ditambahkan.');
    }

    public function edit(Gallery $gallery): View
    {
        $this->authorizeRole(['admin', 'teacher']);

        return view('gallery.form', ['gallery' => $gallery, 'mode' => 'edit']);
    }

    public function update(Request $request, Gallery $gallery): RedirectResponse
    {
        $this->authorizeRole(['admin', 'teacher']);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'category' => ['nullable', 'string', 'max:100'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $gallery->update([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'category' => $validated['category'] ?? 'umum',
        ]);

        if ($request->hasFile('image')) {
            $gallery->update([
                'image_path' => $request->file('image')->store('gallery', 'public'),
            ]);
        }

        return redirect()->route('gallery.manage')->with('success', 'Galeri berhasil diperbarui.');
    }

    public function destroy(Gallery $gallery): RedirectResponse
    {
        $this->authorizeRole(['admin', 'teacher']);

        $gallery->delete();

        return redirect()->route('gallery.manage')->with('success', 'Galeri berhasil dihapus.');
    }

    protected function authorizeRole(array $roles): void
    {
        if (! Auth::check() || ! in_array(Auth::user()->role, $roles, true)) {
            abort(403);
        }
    }
}
