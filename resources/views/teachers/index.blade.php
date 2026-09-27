<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guru & Staff</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-sky-50 via-white to-amber-50 text-slate-800">
    <div class="mx-auto max-w-7xl px-4 py-10">
        <div class="mb-8 text-center">
            <p class="text-xs font-bold uppercase tracking-[0.25em] text-sky-600">Tim Pendidikan</p>
            <h1 class="mt-2 text-3xl font-extrabold text-slate-900">Guru & Staff SD Ceria Nusantara</h1>
        </div>

        <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
            @forelse ($teachers as $teacher)
                <div class="overflow-hidden rounded-[30px] border border-white/80 bg-white/70 p-5 text-center shadow-lg backdrop-blur">
                    <div class="mx-auto mb-4 h-28 w-28 overflow-hidden rounded-full border-4 border-sky-100 bg-slate-200">
                        @if ($teacher->photo_path)
                            <img src="{{ Storage::disk('public')->url($teacher->photo_path) }}" alt="{{ $teacher->name }}" class="h-full w-full object-cover">
                        @else
                            <div class="flex h-full items-center justify-center bg-gradient-to-br from-sky-200 to-amber-100 text-lg font-bold text-slate-700">{{ strtoupper(substr($teacher->name, 0, 1)) }}</div>
                        @endif
                    </div>
                    <h2 class="text-lg font-extrabold text-slate-900">{{ $teacher->name }}</h2>
                    <p class="mt-1 text-sm font-semibold text-sky-600">{{ $teacher->category }}</p>
                    <p class="mt-2 text-sm text-slate-600">{{ $teacher->position }}</p>
                    @if ($teacher->email)
                        <p class="mt-2 text-xs text-slate-500">{{ $teacher->email }}</p>
                    @endif
                </div>
            @empty
                <div class="md:col-span-2 xl:col-span-4 rounded-[30px] border border-dashed border-slate-300 bg-white/60 p-10 text-center text-slate-500">
                    Data guru belum tersedia.
                </div>
            @endforelse
        </div>
    </div>
</body>
</html>
