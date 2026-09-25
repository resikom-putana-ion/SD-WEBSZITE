<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran PPDB - SD Ceria Nusantara</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #e0f2fe 0%, #fef3c7 50%, #fce7f3 100%);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center px-4 py-10">
    <div class="w-full max-w-3xl rounded-[30px] border border-white/80 bg-white/60 backdrop-blur-xl shadow-2xl p-6 md:p-10">
        <div class="mb-8 text-center">
            <p class="text-sm font-bold uppercase tracking-[0.25em] text-amber-600">Pendaftaran Siswa Baru</p>
            <h1 class="mt-2 text-3xl font-extrabold text-slate-900">PPDB Online 2026/2027</h1>
            <p class="mt-2 text-sm text-slate-600">Formulir pendaftaran dibuka tanpa login, untuk calon siswa dan orang tua wali.</p>
        </div>

        @if (session('success'))
            <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('registration.store') }}" class="space-y-6">
            @csrf
            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name') }}" required class="w-full rounded-2xl border border-slate-200 bg-white/70 px-4 py-3 text-slate-800 focus:outline-none focus:ring-2 focus:ring-sky-200 focus:border-sky-500" placeholder="Contoh: Budi Pratama">
                </div>
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required class="w-full rounded-2xl border border-slate-200 bg-white/70 px-4 py-3 text-slate-800 focus:outline-none focus:ring-2 focus:ring-sky-200 focus:border-sky-500" placeholder="contoh@email.com">
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Nomor WhatsApp</label>
                    <input type="text" name="phone" value="{{ old('phone') }}" required class="w-full rounded-2xl border border-slate-200 bg-white/70 px-4 py-3 text-slate-800 focus:outline-none focus:ring-2 focus:ring-sky-200 focus:border-sky-500" placeholder="081234567890">
                </div>
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Asal Sekolah</label>
                    <input type="text" name="school" value="{{ old('school') }}" required class="w-full rounded-2xl border border-slate-200 bg-white/70 px-4 py-3 text-slate-800 focus:outline-none focus:ring-2 focus:ring-sky-200 focus:border-sky-500" placeholder="SDN 1 Nusantara">
                </div>
            </div>

            <div class="flex flex-col sm:flex-row gap-3 pt-4">
                <button type="submit" class="flex-1 rounded-full bg-gradient-to-r from-amber-500 to-orange-500 px-5 py-3 font-bold text-white shadow-lg shadow-amber-500/30 transition hover:-translate-y-0.5">Kirim Pendaftaran</button>
                <a href="{{ route('home') }}" class="flex-1 rounded-full border border-slate-200 bg-white/60 px-5 py-3 text-center font-bold text-slate-700 transition hover:bg-white">Kembali ke Beranda</a>
            </div>
        </form>

        <div class="mt-8 rounded-2xl border border-sky-100 bg-sky-50 p-4 text-sm text-slate-700">
            Sudah punya akun? <a href="{{ route('login') }}" class="font-bold text-sky-700">Masuk ke portal</a>
        </div>
    </div>
</body>
</html>
