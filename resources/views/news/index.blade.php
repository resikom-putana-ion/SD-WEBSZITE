<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita Sekolah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="min-h-screen bg-gradient-to-br from-sky-100 via-amber-50 to-pink-100 text-slate-800">
    <div class="mx-auto max-w-7xl px-4 py-8">
        <div class="mb-8 flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-[0.25em] text-sky-600">Sekolah</p>
                <h1 class="mt-2 text-3xl font-extrabold text-slate-900">Berita & Informasi</h1>
            </div>
            <a href="{{ route('home') }}" class="rounded-full bg-slate-900 px-5 py-2.5 text-sm font-semibold text-white">Kembali ke Beranda</a>
        </div>

        <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
            @forelse ($news as $item)
                <article class="overflow-hidden rounded-[30px] border border-white/80 bg-white/70 shadow-lg backdrop-blur">
                    <div class="h-52 overflow-hidden bg-slate-200">
                        @if ($item->image_path)
                            <img src="{{ Storage::disk('public')->url($item->image_path) }}" alt="{{ $item->title }}" class="h-full w-full object-cover">
                        @else
                            <div class="flex h-full items-center justify-center bg-gradient-to-br from-sky-200 to-amber-100 text-xl font-bold text-slate-700">{{ $item->title }}</div>
                        @endif
                    </div>
                    <div class="space-y-4 p-6">
                        <div class="flex items-center justify-between text-xs text-slate-500">
                            <span>{{ $item->published_at?->format('d M Y') ?? 'Baru' }}</span>
                            <span class="rounded-full bg-sky-100 px-2 py-1 font-semibold text-sky-700">Berita</span>
                        </div>
                        <h2 class="text-xl font-extrabold text-slate-900">{{ $item->title }}</h2>
                        <p class="line-clamp-3 text-sm text-slate-600">{{ $item->excerpt ?: Str::limit(strip_tags($item->content), 140) }}</p>
                        <a href="{{ route('news.show', $item) }}" class="inline-flex items-center gap-2 font-bold text-sky-700">
                            Baca Selengkapnya <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </article>
            @empty
                <div class="md:col-span-2 xl:col-span-3 rounded-[30px] border border-dashed border-slate-300 bg-white/60 p-10 text-center text-slate-500">
                    Belum ada berita yang dipublikasikan.
                </div>
            @endforelse
        </div>
    </div>
</body>
</html>
