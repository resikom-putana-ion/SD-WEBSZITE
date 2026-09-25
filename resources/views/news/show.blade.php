<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $news->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-sky-100 via-white to-amber-50 text-slate-800">
    <div class="mx-auto max-w-4xl px-4 py-10">
        <a href="{{ route('news.index') }}" class="mb-6 inline-flex items-center gap-2 text-sm font-bold text-sky-700">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Berita
        </a>

        <article class="overflow-hidden rounded-[32px] border border-white/80 bg-white/70 p-6 shadow-xl backdrop-blur">
            @if ($news->image_path)
                <img src="{{ asset('storage/'.$news->image_path) }}" alt="{{ $news->title }}" class="mb-6 h-80 w-full rounded-[28px] object-cover shadow-md">
            @endif

            <div class="mb-4 flex items-center gap-3 text-sm text-slate-500">
                <span>{{ $news->published_at?->format('d M Y') ?? 'Baru' }}</span>
                <span>•</span>
                <span>{{ $news->user?->name ?? 'Tim Sekolah' }}</span>
            </div>

            <h1 class="text-3xl font-extrabold text-slate-900 md:text-4xl">{{ $news->title }}</h1>
            <div class="prose mt-6 max-w-none text-slate-700">
                {!! nl2br(e($news->content)) !!}
            </div>
        </article>
    </div>
</body>
</html>
