<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $stats['title'] }} - SD Ceria Nusantara</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #e0f2fe 0%, #fef3c7 50%, #fce7f3 100%);
        }
    </style>
</head>
<body class="min-h-screen text-slate-800">
    <div class="mx-auto max-w-7xl px-4 py-6 md:px-8">
        <header class="mb-8 rounded-[28px] border border-white/80 bg-white/60 p-5 shadow-lg backdrop-blur-xl">
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.25em] text-sky-600">Portal Sekolah</p>
                    <h1 class="mt-2 text-3xl font-extrabold text-slate-900">{{ $stats['title'] }}</h1>
                    <p class="mt-1 text-sm text-slate-600">{{ $stats['subtitle'] }}</p>
                </div>
                <div class="flex items-center gap-4">
                    <div class="rounded-2xl bg-sky-100 px-4 py-2 text-left">
                        <p class="text-[10px] uppercase tracking-[0.2em] text-sky-700">Login</p>
                        <p class="font-bold text-slate-800">{{ Auth::user()->name }}</p>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="rounded-full bg-slate-900 px-5 py-2.5 text-sm font-bold text-white shadow-md transition hover:-translate-y-0.5">Logout</button>
                    </form>
                </div>
            </div>
        </header>

        <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-4">
            @foreach ($stats['cards'] as $card)
                <div class="rounded-[28px] border border-white/80 bg-white/60 p-5 shadow-lg backdrop-blur-lg">
                    <div class="mb-5 flex items-center justify-between">
                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl {{ $card['bg_class'] }} {{ $card['text_class'] }}">
                            <i class="fa-solid {{ $card['icon'] }}"></i>
                        </div>
                        <span class="rounded-full bg-slate-100 px-2 py-1 text-[10px] font-bold uppercase tracking-[0.2em] text-slate-500">Live</span>
                    </div>
                    <p class="text-3xl font-extrabold text-slate-900">{{ $card['value'] }}</p>
                    <p class="mt-2 text-sm text-slate-600">{{ $card['label'] }}</p>
                </div>
            @endforeach
        </div>

        <div class="mt-8 grid gap-6 lg:grid-cols-3">
            <div class="rounded-[28px] border border-white/80 bg-white/60 p-6 shadow-lg lg:col-span-2">
                <h2 class="mb-5 text-xl font-extrabold text-slate-900">Aktivitas Terbaru</h2>
                <div class="space-y-4">
                    <div class="flex items-center justify-between rounded-2xl bg-sky-50 px-4 py-3">
                        <div>
                            <p class="font-bold text-slate-800">Pembaruan jadwal pelajaran</p>
                            <p class="text-xs text-slate-500">Diperbarui 15 menit yang lalu</p>
                        </div>
                        <span class="rounded-full bg-sky-100 px-2.5 py-1 text-xs font-semibold text-sky-700">Baru</span>
                    </div>
                    <div class="flex items-center justify-between rounded-2xl bg-amber-50 px-4 py-3">
                        <div>
                            <p class="font-bold text-slate-800">Tagihan siswa semester ganjil</p>
                            <p class="text-xs text-slate-500">Belum dibayar: 48 peserta didik</p>
                        </div>
                        <span class="rounded-full bg-amber-100 px-2.5 py-1 text-xs font-semibold text-amber-700">Perlu Tindakan</span>
                    </div>
                    <div class="flex items-center justify-between rounded-2xl bg-emerald-50 px-4 py-3">
                        <div>
                            <p class="font-bold text-slate-800">Prestasi siswa meningkat</p>
                            <p class="text-xs text-slate-500">Rata-rata nilai naik 4,2% bulan ini</p>
                        </div>
                        <span class="rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-semibold text-emerald-700">Optimalkan</span>
                    </div>
                </div>
            </div>

            <div class="rounded-[28px] border border-white/80 bg-white/60 p-6 shadow-lg">
                <h2 class="mb-5 text-xl font-extrabold text-slate-900">Quick Menu</h2>
                <div class="space-y-3">
                    @foreach ($dashboardData['quickLinks'] as $link)
                        <a href="{{ $link['route'] }}" class="block rounded-2xl {{ $link['bg_class'] }} px-4 py-3 font-semibold {{ $link['text_class'] }}">{{ $link['label'] }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>
</html>
