<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RegistrationController extends Controller
{
    public function create(): View
    {
        return view('auth.registration');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:registrations,email'],
            'phone' => ['required', 'string', 'max:20'],
            'school' => ['required', 'string', 'max:255'],
        ]);

        Registration::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'school' => $validated['school'],
            'status' => 'pending',
        ]);

        return redirect()->route('registration.create')->with('success', 'Pendaftaran berhasil dikirim. Tim kami akan menghubungi Anda segera.');
    }
}
