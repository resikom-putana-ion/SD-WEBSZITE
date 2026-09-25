<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pembayaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-amber-50 via-white to-sky-50 text-slate-800">
    <div class="mx-auto max-w-5xl px-4 py-10">
        <div class="mb-8 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-[0.25em] text-amber-600">Siswa</p>
                <h1 class="mt-2 text-3xl font-extrabold text-slate-900">Riwayat Pembayaran</h1>
            </div>
            <a href="{{ route('dashboard.role', ['role' => Auth::user()->role]) }}" class="rounded-full border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700">Dashboard</a>
        </div>

        @if(session('success'))
            <div class="mb-6 rounded-2xl bg-emerald-100 px-4 py-3 text-sm font-semibold text-emerald-700">{{ session('success') }}</div>
        @endif

        <form action="{{ route('student.payments.store') }}" method="POST" enctype="multipart/form-data" class="mb-8 rounded-[30px] border border-white/80 bg-white/70 p-6 shadow-xl backdrop-blur">
            @csrf
            <div class="grid gap-5 md:grid-cols-2">
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Nominal</label>
                    <input type="number" name="amount" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 focus:border-amber-500 focus:outline-none" required>
                    @error('amount')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Bulan</label>
                    <input type="text" name="month" placeholder="Contoh: Januari 2027" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 focus:border-amber-500 focus:outline-none" required>
                    @error('month')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
                </div>
                <div class="md:col-span-2">
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Catatan</label>
                    <textarea name="notes" rows="3" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 focus:border-amber-500 focus:outline-none"></textarea>
                    @error('notes')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
                </div>
                <div class="md:col-span-2">
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Bukti Pembayaran</label>
                    <input type="file" name="proof" accept="image/*" class="w-full rounded-2xl border border-dashed border-slate-300 bg-slate-50 px-4 py-3" required>
                    @error('proof')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="mt-5 flex justify-end">
                <button type="submit" class="rounded-full bg-amber-500 px-6 py-2.5 text-sm font-bold text-white">Kirim Konfirmasi</button>
            </div>
        </form>

        <div class="space-y-4">
            @forelse ($payments as $payment)
                <div class="rounded-[28px] border border-white/80 bg-white/75 p-5 shadow-lg">
                    <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                        <div>
                            <h2 class="text-lg font-extrabold text-slate-900">Pembayaran {{ $payment->month }}</h2>
                            <p class="text-sm text-slate-500">Rp {{ number_format($payment->amount, 0, ',', '.') }}</p>
                        </div>
                        <span class="rounded-full px-3 py-1 text-xs font-bold uppercase tracking-wide
                            @if($payment->status === 'approved') bg-emerald-100 text-emerald-700
                            @elseif($payment->status === 'rejected') bg-rose-100 text-rose-700
                            @else bg-amber-100 text-amber-700 @endif">
                            {{ $payment->status }}
                        </span>
                    </div>
                </div>
            @empty
                <div class="rounded-[30px] border border-dashed border-slate-300 bg-white/60 p-10 text-center text-slate-500">
                    Belum ada riwayat pembayaran.
                </div>
            @endforelse
        </div>
    </div>
</body>
</html>
