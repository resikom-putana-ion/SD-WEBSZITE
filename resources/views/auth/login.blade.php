<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Portal SD Ceria Nusantara</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif']
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #e0f2fe 0%, #fef3c7 50%, #fce7f3 100%);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center px-4 py-10">
    <div class="w-full max-w-5xl rounded-[32px] border border-white/80 bg-white/60 backdrop-blur-xl shadow-2xl overflow-hidden">
        <div class="grid md:grid-cols-2">
            <div class="bg-gradient-to-br from-sky-600 via-blue-700 to-indigo-800 p-10 text-white relative hidden md:flex flex-col justify-between">
                <div>
                    <div class="flex items-center space-x-3 mb-8">
                        <div class="h-12 w-12 rounded-2xl bg-white/20 flex items-center justify-center">
                            <i class="fa-solid fa-graduation-cap text-2xl"></i>
                        </div>
                        <div>
                            <p class="text-xl font-extrabold">SD Ceria Nusantara</p>
                            <p class="text-xs uppercase tracking-[0.2em] text-sky-100">Portal Sekolah</p>
                        </div>
                    </div>
                    <h1 class="text-4xl font-extrabold leading-tight">Masuk ke sistem digital sekolah</h1>
                    <p class="mt-5 text-sky-100 text-base leading-relaxed">Akses dashboard akademik, keuangan, admin, dan layanan siswa dalam satu portal yang modern dan terintegrasi.</p>
                </div>
                <div class="mt-10 space-y-3 text-sm text-sky-100">
                    <div class="flex items-center gap-3"><i class="fa-solid fa-circle-check"></i> Akademik & jadwal belajar</div>
                    <div class="flex items-center gap-3"><i class="fa-solid fa-circle-check"></i> Keuangan dan tagihan</div>
                    <div class="flex items-center gap-3"><i class="fa-solid fa-circle-check"></i> Administrasi PPDB</div>
                </div>
            </div>

            <div class="p-8 md:p-12 bg-white/60">
                <div class="text-center md:text-left mb-8">
                    <p class="text-sm font-bold text-sky-700 uppercase tracking-[0.24em]">Login Portal</p>
                    <h2 class="mt-2 text-3xl font-extrabold text-slate-900">Masuk ke akun Anda</h2>
                </div>

                @if ($errors->any())
                    <div class="mb-5 rounded-2xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login.submit') }}" class="space-y-5">
                    @csrf
                    <div>
                        <label class="mb-2 block text-sm font-semibold text-slate-700">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required class="w-full rounded-2xl border border-slate-200 bg-white/70 px-4 py-3 text-slate-800 focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-200" placeholder="nama@sdcerianusantara.sch.id">
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-semibold text-slate-700">Password</label>
                        <input type="password" name="password" required class="w-full rounded-2xl border border-slate-200 bg-white/70 px-4 py-3 text-slate-800 focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-200" placeholder="Masukkan password">
                    </div>

                    <div class="flex items-center justify-between text-sm text-slate-600">
                        <label class="inline-flex items-center gap-2">
                            <input type="checkbox" name="remember" class="h-4 w-4 rounded border-slate-300 text-sky-600 focus:ring-sky-500">
                            Ingat saya
                        </label>
                        <a href="{{ route('registration.create') }}" class="font-semibold text-sky-600">Daftar tanpa login</a>
                    </div>

                    <button type="submit" class="w-full rounded-full bg-gradient-to-r from-sky-600 to-blue-700 px-5 py-3.5 font-bold text-white shadow-lg shadow-sky-500/30 transition hover:-translate-y-0.5">
                        Masuk Sekarang
                    </button>
                </form>

                <div class="mt-8 rounded-2xl border border-sky-100 bg-sky-50 p-4 text-sm text-slate-700">
                    <p class="font-semibold mb-2">Akun demo:</p>
                    <ul class="space-y-1 text-xs text-slate-600">
                        <li>Admin: admin@sdcerianusantara.sch.id</li>
                        <li>Akademik: akademik@sdcerianusantara.sch.id</li>
                        <li>Guru: guru@sdcerianusantara.sch.id</li>
                        <li>Keuangan: keuangan@sdcerianusantara.sch.id</li>
                        <li>Siswa: mahasiswa@sdcerianusantara.sch.id</li>
                    </ul>
                    <p class="mt-3 text-xs text-slate-600">Minta kata sandi demo kepada pengelola proyek.</p>
                </div>

                <p class="mt-8 text-center text-sm text-slate-500">
                    Kembali ke <a href="{{ route('home') }}" class="font-semibold text-sky-600">Beranda</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
