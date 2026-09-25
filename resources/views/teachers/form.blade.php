<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $mode === 'edit' ? 'Edit Guru' : 'Tambah Guru' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-sky-50 to-amber-50 text-slate-800">
    <div class="mx-auto max-w-3xl px-4 py-10">
        <div class="mb-8">
            <p class="text-xs font-bold uppercase tracking-[0.25em] text-sky-600">Data Guru</p>
            <h1 class="mt-2 text-3xl font-extrabold text-slate-900">{{ $mode === 'edit' ? 'Edit Data Guru' : 'Tambah Data Guru' }}</h1>
        </div>

        <form action="{{ $mode === 'edit' ? route('teacher.update', $teacher) : route('teacher.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 rounded-[32px] border border-white/80 bg-white/70 p-6 shadow-xl backdrop-blur">
            @csrf
            @if ($mode === 'edit')
                @method('PUT')
            @endif

            <div class="grid gap-5 md:grid-cols-2">
                <div class="md:col-span-2">
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name', $teacher->name ?? '') }}" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 focus:border-sky-500 focus:outline-none">
                    @error('name')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Kategori</label>
                    <input type="text" name="category" value="{{ old('category', $teacher->category ?? '') }}" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 focus:border-sky-500 focus:outline-none">
                    @error('category')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Jabatan / Posisi</label>
                    <input type="text" name="position" value="{{ old('position', $teacher->position ?? '') }}" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 focus:border-sky-500 focus:outline-none">
                    @error('position')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Email</label>
                    <input type="email" name="email" value="{{ old('email', $teacher->email ?? '') }}" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 focus:border-sky-500 focus:outline-none">
                    @error('email')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Nomor Telepon</label>
                    <input type="text" name="phone" value="{{ old('phone', $teacher->phone ?? '') }}" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 focus:border-sky-500 focus:outline-none">
                    @error('phone')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
                </div>

                <div class="md:col-span-2">
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Biografi</label>
                    <textarea name="bio" rows="4" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 focus:border-sky-500 focus:outline-none">{{ old('bio', $teacher->bio ?? '') }}</textarea>
                    @error('bio')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
                </div>

                <div class="md:col-span-2">
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Foto Guru</label>
                    <input type="file" name="photo" accept="image/*" class="w-full rounded-2xl border border-dashed border-slate-300 bg-slate-50 px-4 py-3">
                    @error('photo')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('teacher.manage') }}" class="rounded-full border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold text-slate-700">Batal</a>
                <button type="submit" class="rounded-full bg-sky-600 px-6 py-2.5 text-sm font-bold text-white">{{ $mode === 'edit' ? 'Simpan Perubahan' : 'Tambah Guru' }}</button>
            </div>
        </form>
    </div>
</body>
</html>
