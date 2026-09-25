<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Galeri</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-100 via-sky-50 to-pink-50 text-slate-800">
    <div class="mx-auto max-w-6xl px-4 py-10">
        <div class="mb-8 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-[0.25em] text-sky-600">Media</p>
                <h1 class="mt-2 text-3xl font-extrabold text-slate-900">Kelola Galeri</h1>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('dashboard.role', ['role' => Auth::user()->role]) }}" class="rounded-full border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700">Dashboard</a>
                <a href="{{ route('gallery.create') }}" class="rounded-full bg-violet-600 px-5 py-2.5 text-sm font-bold text-white">Tambah Galeri</a>
            </div>
        </div>

        @if(session('success'))
            <div class="mb-6 rounded-2xl bg-emerald-100 px-4 py-3 text-sm font-semibold text-emerald-700">{{ session('success') }}</div>
        @endif

        <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-3">
            @forelse ($galleries as $gallery)
                <div class="overflow-hidden rounded-[28px] border border-white/80 bg-white/75 shadow-lg">
                    <div class="h-52 overflow-hidden">
                        <img src="{{ asset('storage/'.$gallery->image_path) }}" alt="{{ $gallery->title }}" class="h-full w-full object-cover">
                    </div>
                    <div class="p-4">
                        <div class="mb-2 flex items-center justify-between gap-3">
                            <h2 class="text-lg font-extrabold text-slate-900">{{ $gallery->title }}</h2>
                            <span class="rounded-full bg-violet-100 px-2 py-1 text-[10px] font-bold uppercase tracking-widest text-violet-700">{{ $gallery->category }}</span>
                        </div>
                        <div class="flex gap-2">
                            <a href="{{ route('gallery.edit', $gallery) }}" class="rounded-full bg-amber-500 px-4 py-2 text-sm font-bold text-white">Edit</a>
                            <form action="{{ route('gallery.destroy', $gallery) }}" method="POST" onsubmit="return confirm('Hapus galeri ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="rounded-full bg-rose-500 px-4 py-2 text-sm font-bold text-white">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="md:col-span-2 xl:col-span-3 rounded-[30px] border border-dashed border-slate-300 bg-white/60 p-10 text-center text-slate-500">
                    Belum ada item galeri.
                </div>
            @endforelse
        </div>
    </div>
</body>
</html>
