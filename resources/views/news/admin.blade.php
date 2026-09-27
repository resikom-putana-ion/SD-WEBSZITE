<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Berita</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-100 via-sky-50 to-amber-50 text-slate-800">
    <div class="mx-auto max-w-6xl px-4 py-10">
        <div class="mb-8 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-[0.25em] text-sky-600">Pengelolaan</p>
                <h1 class="mt-2 text-3xl font-extrabold text-slate-900">Kelola Berita Sekolah</h1>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('dashboard.role', ['role' => Auth::user()->role]) }}" class="rounded-full border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700">Dashboard</a>
                <a href="{{ route('admin.news.create') }}" class="rounded-full bg-sky-600 px-5 py-2.5 text-sm font-bold text-white">Tambah Berita</a>
            </div>
        </div>

        @if(session('success'))
            <div class="mb-6 rounded-2xl bg-emerald-100 px-4 py-3 text-sm font-semibold text-emerald-700">{{ session('success') }}</div>
        @endif

        <div class="space-y-4">
            @forelse ($news as $item)
                <div class="flex flex-col gap-4 rounded-[28px] border border-white/80 bg-white/75 p-4 shadow-lg md:flex-row md:items-center md:justify-between">
                    <div class="flex items-center gap-4">
                        <div class="h-20 w-20 overflow-hidden rounded-2xl bg-slate-200">
                            @if ($item->image_path)
                                <img src="{{ Storage::disk('public')->url($item->image_path) }}" alt="{{ $item->title }}" class="h-full w-full object-cover">
                            @endif
                        </div>
                        <div>
                            <h2 class="text-lg font-extrabold text-slate-900">{{ $item->title }}</h2>
                            <p class="text-sm text-slate-500">{{ $item->published_at?->format('d M Y') ?? 'Draft' }}</p>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <a href="{{ route('admin.news.edit', $item) }}" class="rounded-full bg-amber-500 px-4 py-2 text-sm font-bold text-white">Edit</a>
                        <form action="{{ route('admin.news.destroy', $item) }}" method="POST" onsubmit="return confirm('Hapus berita ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="rounded-full bg-rose-500 px-4 py-2 text-sm font-bold text-white">Hapus</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="rounded-[28px] border border-dashed border-slate-300 bg-white/60 p-10 text-center text-slate-500">
                    Belum ada berita. Buat berita pertama hari ini.
                </div>
            @endforelse
        </div>
    </div>
</body>
</html>
