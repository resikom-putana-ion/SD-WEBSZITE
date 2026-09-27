<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Beranda</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    boxShadow: {
                        soft: '0 20px 45px rgba(15, 23, 42, 0.08)',
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="min-h-screen bg-slate-100 text-slate-800">
    <div class="mx-auto max-w-7xl px-4 py-8">
        <header class="mb-8 rounded-[28px] bg-white/80 p-6 shadow-soft backdrop-blur ring-1 ring-slate-200">
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.25em] text-sky-600">Admin Panel</p>
                    <h1 class="mt-2 text-3xl font-extrabold text-slate-900">Kelola Konten Beranda</h1>
                </div>
                <div class="flex gap-3">
                    <a href="{{ route('dashboard.role', ['role' => Auth::user()->role]) }}" class="rounded-full border border-slate-200 bg-slate-50 px-4 py-2 text-sm font-semibold text-slate-700">Dashboard</a>
                    <a href="{{ route('home') }}" target="_blank" class="rounded-full bg-sky-600 px-5 py-2.5 text-sm font-bold text-white">Lihat Website</a>
                </div>
            </div>
        </header>

        @if(session('success'))
            <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-semibold text-emerald-700">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.site-settings.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf

            <div class="grid gap-8 xl:grid-cols-[1.3fr_0.7fr]">
                <div class="space-y-8">
                    <section class="rounded-[30px] bg-white p-6 shadow-soft ring-1 ring-slate-200">
                        <div class="mb-5 flex items-center gap-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-2xl bg-sky-100 text-sky-600"><i class="fa-solid fa-house"></i></div>
                            <h2 class="text-xl font-extrabold text-slate-900">Hero Section</h2>
                        </div>

                        <div class="grid gap-5 md:grid-cols-2">
                            <div class="md:col-span-2">
                                <label class="mb-2 block text-sm font-semibold text-slate-700">Nama Sekolah</label>
                                <input type="text" name="site_name" value="{{ old('site_name', $setting->site_name) }}" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 focus:border-sky-500 focus:outline-none" required>
                            </div>
                            <div class="md:col-span-2">
                                <label class="mb-2 block text-sm font-semibold text-slate-700">Badge</label>
                                <input type="text" name="hero_badge" value="{{ old('hero_badge', $setting->hero_badge) }}" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 focus:border-sky-500 focus:outline-none">
                            </div>
                            <div class="md:col-span-2">
                                <label class="mb-2 block text-sm font-semibold text-slate-700">Judul Hero</label>
                                <input type="text" name="hero_title" value="{{ old('hero_title', $setting->hero_title) }}" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 focus:border-sky-500 focus:outline-none" required>
                            </div>
                            <div class="md:col-span-2">
                                <label class="mb-2 block text-sm font-semibold text-slate-700">Subjudul Hero</label>
                                <textarea name="hero_subtitle" rows="4" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 focus:border-sky-500 focus:outline-none" required>{{ old('hero_subtitle', $setting->hero_subtitle) }}</textarea>
                            </div>
                            <div>
                                <label class="mb-2 block text-sm font-semibold text-slate-700">Label Tombol Utama</label>
                                <input type="text" name="cta_primary_label" value="{{ old('cta_primary_label', $setting->cta_primary_label) }}" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 focus:border-sky-500 focus:outline-none">
                            </div>
                            <div>
                                <label class="mb-2 block text-sm font-semibold text-slate-700">Link Tombol Utama</label>
                                <input type="text" name="cta_primary_link" value="{{ old('cta_primary_link', $setting->cta_primary_link) }}" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 focus:border-sky-500 focus:outline-none">
                            </div>
                            <div>
                                <label class="mb-2 block text-sm font-semibold text-slate-700">Label Tombol Kedua</label>
                                <input type="text" name="cta_secondary_label" value="{{ old('cta_secondary_label', $setting->cta_secondary_label) }}" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 focus:border-sky-500 focus:outline-none">
                            </div>
                            <div>
                                <label class="mb-2 block text-sm font-semibold text-slate-700">Link Tombol Kedua</label>
                                <input type="text" name="cta_secondary_link" value="{{ old('cta_secondary_link', $setting->cta_secondary_link) }}" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 focus:border-sky-500 focus:outline-none">
                            </div>
                            <div class="md:col-span-2">
                                <label class="mb-2 block text-sm font-semibold text-slate-700">Foto Hero</label>
                                <input type="file" name="hero_image" accept="image/*" class="w-full rounded-2xl border border-dashed border-slate-300 bg-slate-50 px-4 py-3">
                                @if($setting->hero_image_path)
                                    <img src="{{ Storage::disk('public')->url($setting->hero_image_path) }}" class="mt-4 h-48 w-full rounded-2xl object-cover">
                                @endif
                            </div>
                        </div>
                    </section>

                    <section class="rounded-[30px] bg-white p-6 shadow-soft ring-1 ring-slate-200">
                        <div class="mb-5 flex items-center gap-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-2xl bg-amber-100 text-amber-600"><i class="fa-solid fa-user-tie"></i></div>
                            <h2 class="text-xl font-extrabold text-slate-900">Sambutan Kepala Sekolah</h2>
                        </div>

                        <div class="grid gap-5 md:grid-cols-2">
                            <div>
                                <label class="mb-2 block text-sm font-semibold text-slate-700">Nama Kepala Sekolah</label>
                                <input type="text" name="principal_name" value="{{ old('principal_name', $setting->principal_name) }}" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 focus:border-sky-500 focus:outline-none" required>
                            </div>
                            <div>
                                <label class="mb-2 block text-sm font-semibold text-slate-700">Jabatan</label>
                                <input type="text" name="principal_title" value="{{ old('principal_title', $setting->principal_title) }}" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 focus:border-sky-500 focus:outline-none">
                            </div>
                            <div class="md:col-span-2">
                                <label class="mb-2 block text-sm font-semibold text-slate-700">Pesan Sambutan</label>
                                <textarea name="principal_message" rows="6" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 focus:border-sky-500 focus:outline-none" required>{{ old('principal_message', $setting->principal_message) }}</textarea>
                            </div>
                            <div class="md:col-span-2">
                                <label class="mb-2 block text-sm font-semibold text-slate-700">Foto Kepala Sekolah</label>
                                <input type="file" name="principal_image" accept="image/*" class="w-full rounded-2xl border border-dashed border-slate-300 bg-slate-50 px-4 py-3">
                                @if($setting->principal_image_path)
                                    <img src="{{ Storage::disk('public')->url($setting->principal_image_path) }}" class="mt-4 h-48 w-full rounded-2xl object-cover">
                                @endif
                            </div>
                        </div>
                    </section>
                </div>

                <aside class="space-y-8">
                    <section class="rounded-[30px] bg-white p-6 shadow-soft ring-1 ring-slate-200">
                        <div class="mb-5 flex items-center gap-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-2xl bg-violet-100 text-violet-600"><i class="fa-solid fa-image"></i></div>
                            <h2 class="text-xl font-extrabold text-slate-900">Foto Sekolah</h2>
                        </div>
                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">Gambar Profil Sekolah</label>
                            <input type="file" name="school_image" accept="image/*" class="w-full rounded-2xl border border-dashed border-slate-300 bg-slate-50 px-4 py-3">
                            @if($setting->school_image_path)
                                <img src="{{ Storage::disk('public')->url($setting->school_image_path) }}" class="mt-4 h-56 w-full rounded-2xl object-cover">
                            @endif
                        </div>
                    </section>

                    <section class="rounded-[30px] bg-white p-6 shadow-soft ring-1 ring-slate-200">
                        <div class="mb-5 flex items-center gap-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-2xl bg-emerald-100 text-emerald-600"><i class="fa-solid fa-info-circle"></i></div>
                            <h2 class="text-xl font-extrabold text-slate-900">Tentang Sekolah</h2>
                        </div>

                        <div class="space-y-5">
                            <div>
                                <label class="mb-2 block text-sm font-semibold text-slate-700">Judul</label>
                                <input type="text" name="about_title" value="{{ old('about_title', $setting->about_title) }}" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 focus:border-sky-500 focus:outline-none" required>
                            </div>
                            <div>
                                <label class="mb-2 block text-sm font-semibold text-slate-700">Deskripsi</label>
                                <textarea name="about_description" rows="7" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 focus:border-sky-500 focus:outline-none" required>{{ old('about_description', $setting->about_description) }}</textarea>
                            </div>
                        </div>
                    </section>
                </aside>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="rounded-full bg-sky-600 px-7 py-3 text-sm font-bold text-white shadow-lg shadow-sky-200 transition hover:-translate-y-0.5">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</body>
</html>
