<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class FinanceController extends Controller
{
    public function dashboard(): View
    {
        $this->authorizeRole(['finance', 'admin']);

        $payments = Payment::with('user')->latest()->get();

        return view('finance.dashboard', compact('payments'));
    }

    public function studentPayments(): View
    {
        $this->authorizeRole(['student']);

        $payments = Payment::where('user_id', Auth::id())->latest()->get();

        return view('finance.student-payments', compact('payments'));
    }

    public function submitPayment(Request $request): RedirectResponse
    {
        $this->authorizeRole(['student']);

        $validated = $request->validate([
            'amount' => ['required', 'integer', 'min:1000'],
            'month' => ['required', 'string', 'max:50'],
            'notes' => ['nullable', 'string', 'max:255'],
            'proof' => ['required', 'image', 'mimes:jpg,jpeg,png,webp'],
        ]);

        Payment::create([
            'user_id' => Auth::id(),
            'amount' => $validated['amount'],
            'month' => $validated['month'],
            'notes' => $validated['notes'] ?? null,
            'proof_path' => $request->file('proof')->store('payments', 'public'),
            'status' => 'pending',
        ]);

        return redirect()->route('student.payments')->with('success', 'Konfirmasi pembayaran berhasil dikirim.');
    }

    public function review(Payment $payment): RedirectResponse
    {
        $this->authorizeRole(['finance', 'admin']);

        $payment->update([
            'status' => 'approved',
            'approved_by' => Auth::id(),
            'approved_at' => now(),
        ]);

        return back()->with('success', 'Pembayaran berhasil disetujui.');
    }

    public function reject(Payment $payment): RedirectResponse
    {
        $this->authorizeRole(['finance', 'admin']);

        $payment->update([
            'status' => 'rejected',
            'approved_by' => Auth::id(),
            'approved_at' => now(),
        ]);

        return back()->with('success', 'Pembayaran ditolak.');
    }

    protected function authorizeRole(array $roles): void
    {
        if (! Auth::check() || ! in_array(Auth::user()->role, $roles, true)) {
            abort(403);
        }
    }
}
