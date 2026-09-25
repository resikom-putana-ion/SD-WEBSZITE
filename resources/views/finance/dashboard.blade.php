<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keuangan Sekolah</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-amber-50 via-white to-sky-50 text-slate-800">
    <div class="mx-auto max-w-6xl px-4 py-10">
        <div class="mb-8 flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-[0.25em] text-amber-600">Keuangan</p>
                <h1 class="mt-2 text-3xl font-extrabold text-slate-900">Konfirmasi Pembayaran</h1>
            </div>
            <a href="{{ route('dashboard.role', ['role' => Auth::user()->role]) }}" class="rounded-full border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700">Dashboard</a>
        </div>

        @if(session('success'))
            <div class="mb-6 rounded-2xl bg-emerald-100 px-4 py-3 text-sm font-semibold text-emerald-700">{{ session('success') }}</div>
        @endif

        <div class="space-y-4">
            @forelse ($payments as $payment)
                <div class="rounded-[28px] border border-white/80 bg-white/75 p-5 shadow-lg">
                    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                        <div class="space-y-1">
                            <h2 class="text-lg font-extrabold text-slate-900">{{ $payment->user?->name ?? 'Siswa' }}</h2>
                            <p class="text-sm text-slate-500">Bulan {{ $payment->month }} • Rp {{ number_format($payment->amount, 0, ',', '.') }}</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="rounded-full px-3 py-1 text-xs font-bold uppercase tracking-wide
                                @if($payment->status === 'approved') bg-emerald-100 text-emerald-700
                                @elseif($payment->status === 'rejected') bg-rose-100 text-rose-700
                                @else bg-amber-100 text-amber-700 @endif">
                                {{ $payment->status }}
                            </span>
                        </div>
                    </div>

                    <div class="mt-4 grid gap-4 md:grid-cols-[1fr_auto] md:items-center">
                        <div class="rounded-2xl bg-slate-50 p-4">
                            <p class="text-xs font-bold uppercase tracking-[0.2em] text-slate-500">Catatan</p>
                            <p class="mt-2 text-sm text-slate-700">{{ $payment->notes ?: 'Tidak ada catatan tambahan' }}</p>
                        </div>

                        <div class="flex gap-2">
                            <a href="{{ asset('storage/'.$payment->proof_path) }}" target="_blank" class="rounded-full bg-sky-600 px-4 py-2 text-sm font-bold text-white">Lihat Bukti</a>
                            @if ($payment->status !== 'approved')
                                <form action="{{ route('finance.payments.approve', $payment) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="rounded-full bg-emerald-600 px-4 py-2 text-sm font-bold text-white">Setujui</button>
                                </form>
                            @endif
                            @if ($payment->status !== 'rejected')
                                <form action="{{ route('finance.payments.reject', $payment) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="rounded-full bg-rose-500 px-4 py-2 text-sm font-bold text-white">Tolak</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="rounded-[30px] border border-dashed border-slate-300 bg-white/60 p-10 text-center text-slate-500">
                    Belum ada pembayaran yang dikirim siswa.
                </div>
            @endforelse
        </div>
    </div>
</body>
</html>
