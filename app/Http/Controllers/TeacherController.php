<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TeacherController extends Controller
{
    public function publicIndex(): View
    {
        $teachers = Teacher::orderBy('category')->orderBy('name')->get();

        return view('teachers.index', compact('teachers'));
    }

    public function manage(): View
    {
        $this->authorizeRole(['admin', 'teacher']);

        $teachers = Teacher::orderBy('category')->orderBy('name')->get();

        return view('teachers.manage', compact('teachers'));
    }

    public function create(): View
    {
        $this->authorizeRole(['admin', 'teacher']);

        return view('teachers.form', ['teacher' => new Teacher, 'mode' => 'create']);
    }

    public function store(Request $request): RedirectResponse
    {
        $this->authorizeRole(['admin', 'teacher']);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:100'],
            'position' => ['required', 'string', 'max:150'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30'],
            'bio' => ['nullable', 'string'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $teacher = Teacher::create([
            'name' => $validated['name'],
            'category' => $validated['category'],
            'position' => $validated['position'],
            'email' => $validated['email'] ?? null,
            'phone' => $validated['phone'] ?? null,
            'bio' => $validated['bio'] ?? null,
        ]);

        if ($request->hasFile('photo')) {
            $teacher->update([
                'photo_path' => $request->file('photo')->store('teachers', 'public'),
            ]);
        }

        return redirect()->route('teacher.manage')->with('success', 'Data guru berhasil ditambahkan.');
    }

    public function edit(Teacher $teacher): View
    {
        $this->authorizeRole(['admin', 'teacher']);

        return view('teachers.form', ['teacher' => $teacher, 'mode' => 'edit']);
    }

    public function update(Request $request, Teacher $teacher): RedirectResponse
    {
        $this->authorizeRole(['admin', 'teacher']);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:100'],
            'position' => ['required', 'string', 'max:150'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30'],
            'bio' => ['nullable', 'string'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $teacher->update([
            'name' => $validated['name'],
            'category' => $validated['category'],
            'position' => $validated['position'],
            'email' => $validated['email'] ?? null,
            'phone' => $validated['phone'] ?? null,
            'bio' => $validated['bio'] ?? null,
        ]);

        if ($request->hasFile('photo')) {
            $teacher->update([
                'photo_path' => $request->file('photo')->store('teachers', 'public'),
            ]);
        }

        return redirect()->route('teacher.manage')->with('success', 'Data guru berhasil diperbarui.');
    }

    public function destroy(Teacher $teacher): RedirectResponse
    {
        $this->authorizeRole(['admin', 'teacher']);

        $teacher->delete();

        return redirect()->route('teacher.manage')->with('success', 'Data guru berhasil dihapus.');
    }

    protected function authorizeRole(array $roles): void
    {
        if (! Auth::check() || ! in_array(Auth::user()->role, $roles, true)) {
            abort(403);
        }
    }
}
