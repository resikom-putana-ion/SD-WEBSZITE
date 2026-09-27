<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Kegiatan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-sky-50 via-white to-pink-50 text-slate-800">
    <div class="mx-auto max-w-7xl px-4 py-10">
        <div class="mb-8 text-center">
            <p class="text-xs font-bold uppercase tracking-[0.25em] text-sky-600">Dokumentasi</p>
            <h1 class="mt-2 text-3xl font-extrabold text-slate-900">Galeri Kegiatan Sekolah</h1>
        </div>

        <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
            @forelse ($galleries as $gallery)
                <article class="overflow-hidden rounded-[30px] border border-white/80 bg-white/70 shadow-lg backdrop-blur">
                    <div class="h-64 overflow-hidden">
                        <img src="{{ Storage::disk('public')->url($gallery->image_path) }}" alt="{{ $gallery->title }}" class="h-full w-full object-cover">
                    </div>
                    <div class="space-y-4 p-5">
                        <div class="flex items-center justify-between">
                            <h2 class="text-lg font-extrabold text-slate-900">{{ $gallery->title }}</h2>
                            <span class="rounded-full bg-violet-100 px-2 py-1 text-[10px] font-bold uppercase tracking-widest text-violet-700">{{ $gallery->category }}</span>
                        </div>
                        @if ($gallery->description)
                            <p class="text-sm text-slate-600">{{ $gallery->description }}</p>
                        @endif
                    </div>
                </article>
            @empty
                <div class="md:col-span-2 xl:col-span-3 rounded-[30px] border border-dashed border-slate-300 bg-white/60 p-10 text-center text-slate-500">
                    Belum ada galeri yang dipublikasikan.
                </div>
            @endforelse
        </div>
    </div>
</body>
</html>
