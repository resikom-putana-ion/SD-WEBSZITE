<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $mode === 'edit' ? 'Edit Berita' : 'Tambah Berita' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-sky-50 to-amber-50 text-slate-800">
    <div class="mx-auto max-w-3xl px-4 py-10">
        <div class="mb-8">
            <p class="text-xs font-bold uppercase tracking-[0.25em] text-sky-600">Berita</p>
            <h1 class="mt-2 text-3xl font-extrabold text-slate-900">{{ $mode === 'edit' ? 'Edit Berita' : 'Tambah Berita' }}</h1>
        </div>

        <form action="{{ $mode === 'edit' ? route('admin.news.update', $news) : route('admin.news.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 rounded-[32px] border border-white/80 bg-white/70 p-6 shadow-xl backdrop-blur">
            @csrf
            @if ($mode === 'edit')
                @method('PUT')
            @endif

            <div class="space-y-5">
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Judul</label>
                    <input type="text" name="title" value="{{ old('title', $news->title ?? '') }}" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 focus:border-sky-500 focus:outline-none">
                    @error('title')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Ringkasan</label>
                    <input type="text" name="excerpt" value="{{ old('excerpt', $news->excerpt ?? '') }}" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 focus:border-sky-500 focus:outline-none">
                    @error('excerpt')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Konten</label>
                    <textarea name="content" rows="8" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 focus:border-sky-500 focus:outline-none">{{ old('content', $news->content ?? '') }}</textarea>
                    @error('content')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Tanggal Publikasi</label>
                    <input type="date" name="published_at" value="{{ old('published_at', $news->published_at?->format('Y-m-d') ?? now()->format('Y-m-d')) }}" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 focus:border-sky-500 focus:outline-none">
                    @error('published_at')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Gambar</label>
                    <input type="file" name="image" accept="image/*" class="w-full rounded-2xl border border-dashed border-slate-300 bg-slate-50 px-4 py-3">
                    @error('image')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('admin.news.index') }}" class="rounded-full border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold text-slate-700">Batal</a>
                <button type="submit" class="rounded-full bg-sky-600 px-6 py-2.5 text-sm font-bold text-white">{{ $mode === 'edit' ? 'Simpan Perubahan' : 'Publikasikan Berita' }}</button>
            </div>
        </form>
    </div>
</body>
</html>
