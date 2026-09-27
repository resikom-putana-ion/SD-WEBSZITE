<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $site->site_name ?? 'SD Ceria Nusantara' }} - Sekolah Unggul & Berkarakter</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        glass: 'rgba(255, 255, 255, 0.65)',
                        glassBorder: 'rgba(255, 255, 255, 0.8)',
                        glassDark: 'rgba(255, 255, 255, 0.15)',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #e0f2fe 0%, #fef3c7 50%, #fce7f3 100%);
            min-height: 100vh;
            color: #1e293b;
            overflow-x: hidden;
        }

        .blob {
            position: absolute;
            filter: blur(80px);
            z-index: -1;
            opacity: 0.6;
            animation: floatBlob 10s infinite alternate ease-in-out;
        }
        .blob-1 {
            width: 450px;
            height: 450px;
            background: rgba(56, 189, 248, 0.5);
            top: -100px;
            left: -100px;
            border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%;
        }
        .blob-2 {
            width: 500px;
            height: 500px;
            background: rgba(251, 191, 36, 0.4);
            top: 40%;
            right: -150px;
            border-radius: 60% 40% 30% 70% / 50% 60% 40% 50%;
            animation-delay: -3s;
        }
        .blob-3 {
            width: 400px;
            height: 400px;
            background: rgba(244, 114, 182, 0.4);
            bottom: -50px;
            left: 20%;
            border-radius: 50% 50% 20% 80% / 60% 30% 70% 40%;
            animation-delay: -6s;
        }

        @keyframes floatBlob {
            0% { transform: translate(0px, 0px) scale(1); }
            50% { transform: translate(30px, -40px) scale(1.1); }
            100% { transform: translate(-20px, 30px) scale(0.95); }
        }

        .liquid-card {
            background: rgba(255, 255, 255, 0.55);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.8);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.06), inset 0 1px 0 rgba(255, 255, 255, 0.9);
            border-radius: 2rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .liquid-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1), inset 0 1px 0 rgba(255, 255, 255, 1);
            background: rgba(255, 255, 255, 0.7);
        }

        .liquid-btn {
            background: linear-gradient(135deg, #0284c7 0%, #0369a1 100%);
            box-shadow: 0 10px 25px rgba(2, 132, 199, 0.3), inset 0 1px 0 rgba(255, 255, 255, 0.4);
            border-radius: 9999px;
            transition: all 0.3s ease;
        }
        .liquid-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(2, 132, 199, 0.4), inset 0 1px 0 rgba(255, 255, 255, 0.6);
        }

        .liquid-btn-accent {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            box-shadow: 0 10px 25px rgba(245, 158, 11, 0.3), inset 0 1px 0 rgba(255, 255, 255, 0.4);
        }
        .liquid-btn-accent:hover {
            box-shadow: 0 15px 30px rgba(245, 158, 11, 0.4), inset 0 1px 0 rgba(255, 255, 255, 0.6);
        }

        .liquid-nav {
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.6);
        }

        ::-webkit-scrollbar {
            width: 10px;
        }
        ::-webkit-scrollbar-track {
            background: rgba(241, 245, 249, 0.5);
        }
        ::-webkit-scrollbar-thumb {
            background: rgba(148, 163, 184, 0.5);
            border-radius: 5px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: rgba(100, 116, 139, 0.7);
        }
    </style>
</head>
<body class="relative selection:bg-sky-500 selection:text-white">
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>
    <div class="blob blob-3"></div>

    <header class="sticky top-0 z-50 liquid-nav transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <div class="flex items-center space-x-3 cursor-pointer" onclick="switchSection('beranda')">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-sky-500 to-amber-400 flex items-center justify-center shadow-lg text-white text-2xl font-bold">
                        <i class="fa-solid fa-graduation-cap"></i>
                    </div>
                    <div>
                        <span class="text-xl font-extrabold bg-gradient-to-r from-sky-600 to-blue-800 bg-clip-text text-transparent">{{ $site->site_name ?? 'SD Ceria Nusantara' }}</span>
                        <p class="text-xs text-slate-500 font-medium">Unggul, Kreatif & Berkarakter</p>
                    </div>
                </div>

                <nav class="hidden md:flex items-center space-x-1 lg:space-x-2">
                    <button onclick="switchSection('beranda')" class="nav-link px-4 py-2 rounded-xl text-sm font-semibold text-sky-700 bg-sky-100/60 transition" data-target="beranda">Beranda</button>
                    <button onclick="switchSection('profil')" class="nav-link px-4 py-2 rounded-xl text-sm font-medium text-slate-600 hover:text-sky-600 hover:bg-white/40 transition" data-target="profil">Profil</button>
                    <button onclick="switchSection('jadwal')" class="nav-link px-4 py-2 rounded-xl text-sm font-medium text-slate-600 hover:text-sky-600 hover:bg-white/40 transition" data-target="jadwal">Jadwal</button>
                    <button onclick="switchSection('guru')" class="nav-link px-4 py-2 rounded-xl text-sm font-medium text-slate-600 hover:text-sky-600 hover:bg-white/40 transition" data-target="guru">Guru & Staff</button>
                    <button onclick="switchSection('galeri')" class="nav-link px-4 py-2 rounded-xl text-sm font-medium text-slate-600 hover:text-sky-600 hover:bg-white/40 transition" data-target="galeri">Galeri</button>
                    <button onclick="switchSection('berita')" class="nav-link px-4 py-2 rounded-xl text-sm font-medium text-slate-600 hover:text-sky-600 hover:bg-white/40 transition" data-target="berita">Berita</button>
                </nav>

                <div class="hidden md:flex items-center space-x-3">
                    <a href="{{ route('login') }}" class="rounded-full border border-slate-200 bg-white/70 px-5 py-2.5 text-sm font-semibold text-slate-700 transition hover:bg-white">Login</a>
                    <button onclick="window.location.href='{{ route('registration.create') }}'" class="liquid-btn-accent text-white font-bold px-6 py-2.5 rounded-full text-sm shadow-md hover:scale-105 transition transform flex items-center space-x-2">
                        <i class="fa-solid fa-user-plus"></i>
                        <span>PPDB Online</span>
                    </button>
                </div>

                <div class="md:hidden flex items-center">
                    <button id="mobileMenuBtn" onclick="toggleMobileMenu()" class="p-2.5 rounded-xl bg-white/60 text-slate-700 hover:bg-white shadow-sm">
                        <i class="fa-solid fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <div id="mobileMenu" class="hidden md:hidden px-4 pt-2 pb-6 space-y-2 liquid-nav border-t border-white/50">
            <button onclick="switchSection('beranda'); toggleMobileMenu();" class="block w-full text-left px-4 py-2.5 rounded-xl text-sm font-semibold text-sky-700 bg-sky-100/60">Beranda</button>
            <button onclick="switchSection('profil'); toggleMobileMenu();" class="block w-full text-left px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 hover:bg-white/50">Profil</button>
            <button onclick="switchSection('jadwal'); toggleMobileMenu();" class="block w-full text-left px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 hover:bg-white/50">Jadwal</button>
            <button onclick="switchSection('guru'); toggleMobileMenu();" class="block w-full text-left px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 hover:bg-white/50">Guru & Staff</button>
            <button onclick="switchSection('galeri'); toggleMobileMenu();" class="block w-full text-left px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 hover:bg-white/50">Galeri</button>
            <button onclick="switchSection('berita'); toggleMobileMenu();" class="block w-full text-left px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 hover:bg-white/50">Berita</button>
            <a href="{{ route('login') }}" class="block w-full text-center px-4 py-2.5 rounded-xl text-sm font-semibold text-slate-700 bg-white/60">Login</a>
            <button onclick="window.location.href='{{ route('registration.create') }}'; toggleMobileMenu();" class="block w-full text-center px-4 py-3 rounded-full text-sm font-bold text-white liquid-btn-accent shadow-md mt-4">Daftar PPDB Online</button>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <section id="section-beranda" class="page-section space-y-12">
            <div class="liquid-card p-8 md:p-12 relative overflow-hidden flex flex-col lg:flex-row items-center justify-between gap-8">
                <div class="absolute -right-10 -bottom-10 w-72 h-72 bg-gradient-to-br from-sky-400/20 to-amber-400/20 rounded-full blur-2xl pointer-events-none"></div>
                <div class="space-y-6 max-w-2xl z-10">
                    <span class="px-4 py-1.5 rounded-full text-xs font-bold bg-sky-500/10 text-sky-700 border border-sky-300/50 inline-flex items-center gap-2">
                        <i class="fa-solid fa-award"></i> {{ $site->hero_badge ?? 'Akreditasi A - Sekolah Penggerak' }}
                    </span>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-slate-900 leading-tight">
                        {{ $site->hero_title ?? 'Selamat Datang di SD Ceria Nusantara' }}
                    </h1>
                    <p class="text-lg text-slate-600 font-normal leading-relaxed">
                        {{ $site->hero_subtitle ?? 'Tempat belajar yang menyenangkan, interaktif, dan penuh inspirasi bagi buah hati Anda untuk tumbuh menjadi generasi cerdas, mandiri, dan berakhlak mulia.' }}
                    </p>
                    <div class="flex flex-wrap gap-4 pt-2">
                        <button onclick="window.location.href='{{ $site->cta_primary_link ?? route('registration.create') }}'" class="liquid-btn text-white font-bold px-8 py-4 rounded-full shadow-lg flex items-center space-x-3 hover:scale-105 transition transform">
                            <span>{{ $site->cta_primary_label ?? 'Daftar Siswa Baru' }}</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </button>
                        <button onclick="window.location.href='{{ $site->cta_secondary_link ?? '#profil' }}'" class="liquid-card px-8 py-4 rounded-full font-bold text-slate-700 hover:bg-white transition flex items-center space-x-2">
                            <span>{{ $site->cta_secondary_label ?? 'Jelajahi Profil' }}</span>
                            <i class="fa-solid fa-compass text-sky-500"></i>
                        </button>
                    </div>
                </div>
                <div class="z-10 w-full lg:w-auto flex justify-center">
                    <div class="liquid-card p-4 rounded-3xl shadow-xl bg-white/40 max-w-sm w-full border border-white">
                        <div class="rounded-2xl overflow-hidden shadow-inner relative group h-64 bg-sky-100 flex items-center justify-center">
                            <img src="{{ $site->hero_image_path ? Storage::disk('public')->url($site->hero_image_path) : 'https://placehold.co/500x400/38bdf8/ffffff?text=Anak+Belajar+Ceria' }}" alt="{{ $site->site_name ?? 'Sekolah' }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" onerror="this.src='https://placehold.co/500x400/38bdf8/ffffff?text=SD+Ceria'">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 via-transparent to-transparent flex items-end p-4">
                                <div class="text-white">
                                    <p class="text-xs uppercase font-semibold tracking-wider text-amber-300">Kegiatan Siswa</p>
                                    <p class="text-sm font-bold">Belajar Interaktif & Menyenangkan</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 grid grid-cols-3 gap-2 text-center">
                            <div class="p-2 rounded-xl bg-white/60">
                                <p class="text-lg font-bold text-sky-700">450+</p>
                                <p class="text-xs text-slate-500">Siswa</p>
                            </div>
                            <div class="p-2 rounded-xl bg-white/60">
                                <p class="text-lg font-bold text-amber-600">32</p>
                                <p class="text-xs text-slate-500">Guru Profesional</p>
                            </div>
                            <div class="p-2 rounded-xl bg-white/60">
                                <p class="text-lg font-bold text-pink-600">100%</p>
                                <p class="text-xs text-slate-500">Lulusan Unggul</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="liquid-card p-8 md:p-10 grid grid-cols-1 lg:grid-cols-3 gap-8 items-center">
                <div class="flex justify-center">
                    <div class="relative">
                        <div class="absolute -inset-2 rounded-3xl bg-gradient-to-tr from-sky-400 to-amber-400 opacity-70 blur-lg"></div>
                        <div class="relative w-56 h-64 rounded-3xl overflow-hidden border-4 border-white shadow-xl bg-slate-200">
                            <img src="{{ $site->principal_image_path ? Storage::disk('public')->url($site->principal_image_path) : 'https://placehold.co/300x350/cbd5e1/475569?text=Kepala+Sekolah' }}" alt="{{ $site->principal_name ?? 'Kepala Sekolah' }}" class="w-full h-full object-cover" onerror="this.src='https://placehold.co/300x350/cbd5e1/475569?text=Kepala+Sekolah'">
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-2 space-y-4">
                    <span class="text-xs font-bold tracking-widest text-sky-600 uppercase">Sambutan Kepala Sekolah</span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900">"{{ $site->about_title ?? 'Membangun Fondasi Generasi Emas Masa Depan' }}"</h2>
                    <p class="text-slate-600 leading-relaxed text-sm sm:text-base">
                        {{ $site->principal_message ?? 'Selamat datang di website resmi SD Ceria Nusantara. Kami berkomitmen untuk memberikan lingkungan belajar yang aman, ramah anak, serta merangsang kreativitas berpikir kritis dan karakter berbudi pekerti luhur. Bersama guru-guru berdedikasi tinggi, kami siap mendampingi buah hati Anda meraih cita-cita tertingginya.' }}
                    </p>
                    <div>
                        <p class="font-bold text-slate-900 text-base">{{ $site->principal_name ?? 'Dra. Hj. Siti Aminah, M.Pd.' }}</p>
                        <p class="text-xs text-slate-500">{{ $site->principal_title ?? 'Kepala Sekolah SD Ceria Nusantara' }}</p>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="text-center max-w-xl mx-auto space-y-2">
                    <span class="text-xs font-bold tracking-widest text-sky-600 uppercase">Keunggulan Kami</span>
                    <h2 class="text-3xl font-extrabold text-slate-900">Mengapa Memilih SD Ceria Nusantara?</h2>
                    <p class="text-sm text-slate-600">Berbagai fasilitas dan metode pembelajaran terbaik demi tumbuh kembang optimal anak.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="liquid-card p-6 space-y-4 group">
                        <div class="w-14 h-14 rounded-2xl bg-sky-500/20 text-sky-600 flex items-center justify-center text-2xl group-hover:bg-sky-500 group-hover:text-white transition duration-300">
                            <i class="fa-solid fa-book-open-reader"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900">Kurikulum Merdeka</h3>
                        <p class="text-sm text-slate-600 leading-relaxed">Pembelajaran berbasis proyek (PBL) yang menyenangkan dan berpusat pada minat bakat siswa.</p>
                    </div>
                    <div class="liquid-card p-6 space-y-4 group">
                        <div class="w-14 h-14 rounded-2xl bg-amber-500/20 text-amber-600 flex items-center justify-center text-2xl group-hover:bg-amber-500 group-hover:text-white transition duration-300">
                            <i class="fa-solid fa-laptop-code"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900">Lab Komputer & Digital</h3>
                        <p class="text-sm text-slate-600 leading-relaxed">Fasilitas IT modern untuk mengenalkan teknologi digital sejak dini secara bijak dan kreatif.</p>
                    </div>
                    <div class="liquid-card p-6 space-y-4 group">
                        <div class="w-14 h-14 rounded-2xl bg-emerald-500/20 text-emerald-600 flex items-center justify-center text-2xl group-hover:bg-emerald-500 group-hover:text-white transition duration-300">
                            <i class="fa-solid fa-medal"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900">Ekstrakurikuler Juara</h3>
                        <p class="text-sm text-slate-600 leading-relaxed">Pramuka, Drumband, Tahfidz, Futsal, Robotik, Tari Tradisional, hingga English Club.</p>
                    </div>
                    <div class="liquid-card p-6 space-y-4 group">
                        <div class="w-14 h-14 rounded-2xl bg-pink-500/20 text-pink-600 flex items-center justify-center text-2xl group-hover:bg-pink-500 group-hover:text-white transition duration-300">
                            <i class="fa-solid fa-shield-heart"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900">Lingkungan Ramah Anak</h3>
                        <p class="text-sm text-slate-600 leading-relaxed">Sekolah bebas perundungan dengan pengawasan penuh, kantin higienis, dan ruang bermain asri.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="section-profil" class="page-section space-y-12 hidden">
            <div class="text-center max-w-2xl mx-auto space-y-3">
                <span class="text-xs font-bold tracking-widest text-sky-600 uppercase">Tentang Sekolah</span>
                <h2 class="text-3xl font-extrabold text-slate-900">Profil & Visi Misi Sekolah</h2>
                <p class="text-slate-600 text-sm">Mengenal lebih dekat sejarah, identitas, serta komitmen pendidikan kami.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="liquid-card p-8 space-y-6">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 rounded-2xl bg-sky-500 text-white flex items-center justify-center text-xl shadow-md">
                            <i class="fa-solid fa-eye"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900">Visi Sekolah</h3>
                    </div>
                    <p class="text-slate-700 leading-relaxed font-medium text-base bg-white/40 p-6 rounded-2xl border border-white/60 shadow-inner">
                        "Terwujudnya peserta didik yang cerdas, kreatif, berkarakter luhur, berwawasan global, serta cinta lingkungan."
                    </p>
                </div>
                <div class="liquid-card p-8 space-y-6">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 rounded-2xl bg-amber-500 text-white flex items-center justify-center text-xl shadow-md">
                            <i class="fa-solid fa-bullseye"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900">Misi Sekolah</h3>
                    </div>
                    <ul class="space-y-3 text-sm text-slate-700">
                        <li class="flex items-start space-x-3"><i class="fa-solid fa-check-circle text-amber-500 mt-1"></i><span>Menyelenggarakan pembelajaran aktif, inovatif, kreatif, dan menyenangkan.</span></li>
                        <li class="flex items-start space-x-3"><i class="fa-solid fa-check-circle text-amber-500 mt-1"></i><span>Mengembangkan nilai-nilai keimanan, ketaqwaan, dan budi pekerti luhur dalam keseharian.</span></li>
                        <li class="flex items-start space-x-3"><i class="fa-solid fa-check-circle text-amber-500 mt-1"></i><span>Memfasilitasi pengembangan minat dan bakat siswa melalui kegiatan ekstrakurikuler unggulan.</span></li>
                        <li class="flex items-start space-x-3"><i class="fa-solid fa-check-circle text-amber-500 mt-1"></i><span>Membentuk kesadaran menjaga kebersihan dan kelestarian lingkungan sekolah.</span></li>
                    </ul>
                </div>
            </div>

            <div class="liquid-card p-8 md:p-12 space-y-6">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 rounded-2xl bg-indigo-500 text-white flex items-center justify-center text-xl shadow-md">
                        <i class="fa-solid fa-landmark"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900">Sejarah Singkat SD Ceria Nusantara</h3>
                </div>
                <p class="text-slate-600 leading-relaxed text-sm sm:text-base">
                    {{ $site->about_description ?? 'Didirikan pada tahun 1998, SD Ceria Nusantara berawal dari sebuah impian untuk menghadirkan institusi pendidikan dasar yang tidak hanya fokus pada prestasi akademik semata, melainkan juga kebahagiaan anak dalam belajar. Selama lebih dari 25 tahun berkarya, sekolah kami telah melahirkan ribuan alumni sukses yang tersebar di berbagai SMP unggulan dan menorehkan prestasi gemilang di tingkat kota maupun nasional.' }}
                </p>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 pt-4 text-center">
                    <div class="liquid-card p-4 rounded-2xl bg-white/50"><p class="text-2xl font-extrabold text-sky-600">1998</p><p class="text-xs text-slate-500 font-medium">Tahun Berdiri</p></div>
                    <div class="liquid-card p-4 rounded-2xl bg-white/50"><p class="text-2xl font-extrabold text-amber-600">NPSN 20183921</p><p class="text-xs text-slate-500 font-medium">Nomor Pokok Sekolah</p></div>
                    <div class="liquid-card p-4 rounded-2xl bg-white/50"><p class="text-2xl font-extrabold text-emerald-600">15 Kelas</p><p class="text-xs text-slate-500 font-medium">Ruang Belajar AC</p></div>
                    <div class="liquid-card p-4 rounded-2xl bg-white/50"><p class="text-2xl font-extrabold text-pink-600">Asri & Luas</p><p class="text-xs text-slate-500 font-medium">Area Sekolah 5.000m²</p></div>
                </div>
            </div>
        </section>

        <section id="section-jadwal" class="page-section space-y-8 hidden">
            <div class="text-center max-w-2xl mx-auto space-y-3">
                <span class="text-xs font-bold tracking-widest text-sky-600 uppercase">Akademik Interaktif</span>
                <h2 class="text-3xl font-extrabold text-slate-900">Jadwal Pelajaran Siswa</h2>
                <p class="text-slate-600 text-sm">Pilih kelas di bawah ini untuk melihat jadwal mata pelajaran harian secara lengkap.</p>
            </div>

            <div class="flex flex-wrap justify-center gap-3">
                <button onclick="filterJadwal('1')" class="jadwal-btn px-6 py-2.5 rounded-full text-sm font-bold bg-sky-600 text-white shadow-md transition">Kelas 1</button>
                <button onclick="filterJadwal('2')" class="jadwal-btn px-6 py-2.5 rounded-full text-sm font-semibold bg-white/60 text-slate-700 hover:bg-white shadow-sm transition">Kelas 2</button>
                <button onclick="filterJadwal('3')" class="jadwal-btn px-6 py-2.5 rounded-full text-sm font-semibold bg-white/60 text-slate-700 hover:bg-white shadow-sm transition">Kelas 3</button>
                <button onclick="filterJadwal('4')" class="jadwal-btn px-6 py-2.5 rounded-full text-sm font-semibold bg-white/60 text-slate-700 hover:bg-white shadow-sm transition">Kelas 4</button>
                <button onclick="filterJadwal('5')" class="jadwal-btn px-6 py-2.5 rounded-full text-sm font-semibold bg-white/60 text-slate-700 hover:bg-white shadow-sm transition">Kelas 5</button>
                <button onclick="filterJadwal('6')" class="jadwal-btn px-6 py-2.5 rounded-full text-sm font-semibold bg-white/60 text-slate-700 hover:bg-white shadow-sm transition">Kelas 6</button>
            </div>

            <div class="liquid-card p-6 md:p-8 overflow-x-auto">
                <div class="flex items-center justify-between mb-6 pb-4 border-b border-white/60">
                    <h3 id="jadwalTitle" class="text-xl font-extrabold text-slate-900 flex items-center gap-3">
                        <i class="fa-solid fa-calendar-days text-sky-600"></i> Jadwal Pelajaran - Kelas 1 (Tahun Ajaran 2026/2027)
                    </h3>
                    <span class="px-3 py-1 bg-sky-100 text-sky-700 rounded-full text-xs font-bold">Semester Ganjil</span>
                </div>
                <table class="w-full text-left border-collapse min-w-[650px]">
                    <thead>
                        <tr class="border-b border-slate-200/60 text-slate-500 text-xs uppercase tracking-wider">
                            <th class="py-3 px-4">Hari</th>
                            <th class="py-3 px-4">07:30 - 09:00</th>
                            <th class="py-3 px-4">09:15 - 10:45</th>
                            <th class="py-3 px-4">10:45 - 11:15</th>
                            <th class="py-3 px-4">11:15 - 12:45</th>
                        </tr>
                    </thead>
                    <tbody id="jadwalTableBody" class="text-sm font-medium text-slate-700 divide-y divide-slate-200/40"></tbody>
                </table>
            </div>
        </section>

        <section id="section-guru" class="page-section space-y-8 hidden">
            <div class="text-center max-w-2xl mx-auto space-y-3">
                <span class="text-xs font-bold tracking-widest text-sky-600 uppercase">Tenaga Pendidik Profesional</span>
                <h2 class="text-3xl font-extrabold text-slate-900">Dewan Guru & Staff Sekolah</h2>
                <p class="text-slate-600 text-sm">Pendidik berpengalaman, berdedikasi tinggi, dan ramah anak.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="liquid-card p-6 text-center space-y-4 group">
                    <div class="w-28 h-28 mx-auto rounded-full overflow-hidden border-4 border-white shadow-lg bg-sky-100">
                        <img src="https://placehold.co/200x200/38bdf8/ffffff?text=Bu+Guru" alt="Guru" class="w-full h-full object-cover group-hover:scale-110 transition duration-300" onerror="this.src='https://placehold.co/200x200/38bdf8/ffffff?text=Guru'">
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900 text-lg">Dewi Lestari, S.Pd.</h3>
                        <p class="text-xs font-semibold text-sky-600">Wali Kelas 1 A</p>
                    </div>
                    <p class="text-xs text-slate-500">Pendidikan Guru Sekolah Dasar (Universitas Negeri Jakarta)</p>
                </div>
                <div class="liquid-card p-6 text-center space-y-4 group">
                    <div class="w-28 h-28 mx-auto rounded-full overflow-hidden border-4 border-white shadow-lg bg-amber-100">
                        <img src="https://placehold.co/200x200/fbbf24/ffffff?text=Pak+Guru" alt="Guru" class="w-full h-full object-cover group-hover:scale-110 transition duration-300" onerror="this.src='https://placehold.co/200x200/fbbf24/ffffff?text=Guru'">
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900 text-lg">Ahmad Fauzi, M.Pd.</h3>
                        <p class="text-xs font-semibold text-amber-600">Guru Matematika & Sains</p>
                    </div>
                    <p class="text-xs text-slate-500">Pembina Olimpiade Matematika SD Tingkat Kota</p>
                </div>
                <div class="liquid-card p-6 text-center space-y-4 group">
                    <div class="w-28 h-28 mx-auto rounded-full overflow-hidden border-4 border-white shadow-lg bg-pink-100">
                        <img src="https://placehold.co/200x200/f472b6/ffffff?text=Bu+Guru" alt="Guru" class="w-full h-full object-cover group-hover:scale-110 transition duration-300" onerror="this.src='https://placehold.co/200x200/f472b6/ffffff?text=Guru'">
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900 text-lg">Siti Rahma, S.Pd.</h3>
                        <p class="text-xs font-semibold text-pink-600">Wali Kelas 3 B & Seni</p>
                    </div>
                    <p class="text-xs text-slate-500">Spesialis Seni Tari Tradisional & Pendidikan Karakter</p>
                </div>
                <div class="liquid-card p-6 text-center space-y-4 group">
                    <div class="w-28 h-28 mx-auto rounded-full overflow-hidden border-4 border-white shadow-lg bg-emerald-100">
                        <img src="https://placehold.co/200x200/34d399/ffffff?text=Pak+Guru" alt="Guru" class="w-full h-full object-cover group-hover:scale-110 transition duration-300" onerror="this.src='https://placehold.co/200x200/34d399/ffffff?text=Guru'">
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900 text-lg">Budi Santoso, S.Or.</h3>
                        <p class="text-xs font-semibold text-emerald-600">Guru Olahraga & Jasmani</p>
                    </div>
                    <p class="text-xs text-slate-500">Pelatih Kepala Ekstrakurikuler Futsal & Atletik</p>
                </div>
            </div>
        </section>

        <section id="section-galeri" class="page-section space-y-8 hidden">
            <div class="text-center max-w-2xl mx-auto space-y-3">
                <span class="text-xs font-bold tracking-widest text-sky-600 uppercase">Dokumentasi Sekolah</span>
                <h2 class="text-3xl font-extrabold text-slate-900">Galeri Kegiatan Siswa</h2>
                <p class="text-slate-600 text-sm">Momen seru belajar, berkreasi, dan berprestasi di lingkungan sekolah.</p>
            </div>

            <div class="flex flex-wrap justify-center gap-3">
                <button onclick="filterGallery('all')" class="gallery-btn px-5 py-2 rounded-full text-xs font-bold bg-sky-600 text-white shadow-sm">Semua</button>
                <button onclick="filterGallery('belajar')" class="gallery-btn px-5 py-2 rounded-full text-xs font-semibold bg-white/60 text-slate-700 hover:bg-white shadow-sm">Kegiatan Belajar</button>
                <button onclick="filterGallery('ekskul')" class="gallery-btn px-5 py-2 rounded-full text-xs font-semibold bg-white/60 text-slate-700 hover:bg-white shadow-sm">Ekstrakurikuler</button>
                <button onclick="filterGallery('lomba')" class="gallery-btn px-5 py-2 rounded-full text-xs font-semibold bg-white/60 text-slate-700 hover:bg-white shadow-sm">Prestasi & Lomba</button>
            </div>

            <div id="galleryGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="liquid-card p-4 rounded-3xl overflow-hidden group gallery-item" data-category="belajar">
                    <div class="rounded-2xl overflow-hidden relative h-56 bg-sky-100">
                        <img src="https://placehold.co/600x400/38bdf8/ffffff?text=Praktikum+Sains" alt="Sains" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" onerror="this.src='https://placehold.co/600x400/38bdf8/ffffff?text=Praktikum'">
                        <div class="absolute top-3 right-3 bg-sky-600 text-white text-xs px-3 py-1 rounded-full font-bold shadow-md">Belajar</div>
                    </div>
                    <div class="mt-4 px-2">
                        <h3 class="font-bold text-slate-900 text-base">Praktikum Sains Sederhana di Laboratorium</h3>
                        <p class="text-xs text-slate-500 mt-1">Siswa kelas 4 antusias melakukan eksperimen gunung meletus buatan.</p>
                    </div>
                </div>
                <div class="liquid-card p-4 rounded-3xl overflow-hidden group gallery-item" data-category="ekskul">
                    <div class="rounded-2xl overflow-hidden relative h-56 bg-amber-100">
                        <img src="https://placehold.co/600x400/fbbf24/ffffff?text=Drumband+Ceria" alt="Drumband" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" onerror="this.src='https://placehold.co/600x400/fbbf24/ffffff?text=Drumband'">
                        <div class="absolute top-3 right-3 bg-amber-600 text-white text-xs px-3 py-1 rounded-full font-bold shadow-md">Ekskul</div>
                    </div>
                    <div class="mt-4 px-2">
                        <h3 class="font-bold text-slate-900 text-base">Latihan Rutin Ekstrakurikuler Drumband</h3>
                        <p class="text-xs text-slate-500 mt-1">Mengasah kekompakan ritme dan kerja sama tim antar siswa.</p>
                    </div>
                </div>
                <div class="liquid-card p-4 rounded-3xl overflow-hidden group gallery-item" data-category="lomba">
                    <div class="rounded-2xl overflow-hidden relative h-56 bg-emerald-100">
                        <img src="https://placehold.co/600x400/34d399/ffffff?text=Juara+Olimpiade" alt="Lomba" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" onerror="this.src='https://placehold.co/600x400/34d399/ffffff?text=Juara+Lomba'">
                        <div class="absolute top-3 right-3 bg-emerald-600 text-white text-xs px-3 py-1 rounded-full font-bold shadow-md">Prestasi</div>
                    </div>
                    <div class="mt-4 px-2">
                        <h3 class="font-bold text-slate-900 text-base">Juara 1 Olimpiade Matematika Tingkat Kota</h3>
                        <p class="text-xs text-slate-500 mt-1">Penyerahan piala dan penghargaan bagi siswa berprestasi gemilang.</p>
                    </div>
                </div>
                <div class="liquid-card p-4 rounded-3xl overflow-hidden group gallery-item" data-category="ekskul">
                    <div class="rounded-2xl overflow-hidden relative h-56 bg-pink-100">
                        <img src="https://placehold.co/600x400/f472b6/ffffff?text=Tari+Tradisional" alt="Tari" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" onerror="this.src='https://placehold.co/600x400/f472b6/ffffff?text=Tari'">
                        <div class="absolute top-3 right-3 bg-pink-600 text-white text-xs px-3 py-1 rounded-full font-bold shadow-md">Ekskul</div>
                    </div>
                    <div class="mt-4 px-2">
                        <h3 class="font-bold text-slate-900 text-base">Latihan Menari Seni Tari Nusantara</h3>
                        <p class="text-xs text-slate-500 mt-1">Melestarikan budaya tradisional sejak usia dini dengan riang gembira.</p>
                    </div>
                </div>
                <div class="liquid-card p-4 rounded-3xl overflow-hidden group gallery-item" data-category="belajar">
                    <div class="rounded-2xl overflow-hidden relative h-56 bg-indigo-100">
                        <img src="https://placehold.co/600x400/818cf8/ffffff?text=Perpustakaan+Digital" alt="Perpus" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" onerror="this.src='https://placehold.co/600x400/818cf8/ffffff?text=Perpus'">
                        <div class="absolute top-3 right-3 bg-indigo-600 text-white text-xs px-3 py-1 rounded-full font-bold shadow-md">Belajar</div>
                    </div>
                    <div class="mt-4 px-2">
                        <h3 class="font-bold text-slate-900 text-base">Jam Literasi di Perpustakaan Nyaman</h3>
                        <p class="text-xs text-slate-500 mt-1">Menumbuhkan minat baca buku cerita anak dan ensiklopedia interaktif.</p>
                    </div>
                </div>
                <div class="liquid-card p-4 rounded-3xl overflow-hidden group gallery-item" data-category="lomba">
                    <div class="rounded-2xl overflow-hidden relative h-56 bg-orange-100">
                        <img src="https://placehold.co/600x400/fb923c/ffffff?text=Lomba+Mewarnai" alt="Mewarnai" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" onerror="this.src='https://placehold.co/600x400/fb923c/ffffff?text=Mewarnai'">
                        <div class="absolute top-3 right-3 bg-orange-600 text-white text-xs px-3 py-1 rounded-full font-bold shadow-md">Prestasi</div>
                    </div>
                    <div class="mt-4 px-2">
                        <h3 class="font-bold text-slate-900 text-base">Festival Lomba Mewarnai & Menggambar</h3>
                        <p class="text-xs text-slate-500 mt-1">Mengasah imajinasi dan kreativitas seni rupa anak-anak tingkat dasar.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="section-berita" class="page-section space-y-8 hidden">
            <div class="text-center max-w-2xl mx-auto space-y-3">
                <span class="text-xs font-bold tracking-widest text-sky-600 uppercase">Informasi Terkini</span>
                <h2 class="text-3xl font-extrabold text-slate-900">Berita & Pengumuman Sekolah</h2>
                <p class="text-slate-600 text-sm">Informasi penting seputar agenda kegiatan, libur semester, dan pengumuman resmi.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="liquid-card p-6 space-y-4 flex flex-col justify-between">
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold px-3 py-1 rounded-full bg-amber-100 text-amber-700">Pengumuman</span>
                            <span class="text-xs text-slate-400"><i class="fa-regular fa-calendar mr-1"></i> 24 Sep 2026</span>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 leading-snug">Jadwal Libur Semester Ganjil & Penyerahan Rapor Siswa</h3>
                        <p class="text-xs text-slate-600 leading-relaxed">Pengambilan rapor hasil belajar siswa semester ganjil akan dilaksanakan pada hari Jumat, bertempat di aula utama sekolah.</p>
                    </div>
                    <button onclick="showAlert('Detail Pengumuman', 'Pengambilan rapor akan dimulai pukul 08.00 WIB didampingi oleh orang tua/wali murid.')" class="text-xs font-bold text-sky-600 hover:text-sky-800 flex items-center gap-1">Baca Selengkapnya <i class="fa-solid fa-arrow-right"></i></button>
                </div>

                <div class="liquid-card p-6 space-y-4 flex flex-col justify-between">
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold px-3 py-1 rounded-full bg-sky-100 text-sky-700">Kegiatan</span>
                            <span class="text-xs text-slate-400"><i class="fa-regular fa-calendar mr-1"></i> 20 Sep 2026</span>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 leading-snug">Pekan Literasi dan Donasi Buku Cerita Anak Nusantara</h3>
                        <p class="text-xs text-slate-600 leading-relaxed">Mari berpartisipasi dalam gerakan kumpul buku cerita untuk disumbangkan ke perpustakaan sudut baca daerah terpencil.</p>
                    </div>
                    <button onclick="showAlert('Detail Kegiatan', 'Siswa dapat membawa buku bacaan layak pakai ke ruang perpustakaan sekolah mulai senin depan.')" class="text-xs font-bold text-sky-600 hover:text-sky-800 flex items-center gap-1">Baca Selengkapnya <i class="fa-solid fa-arrow-right"></i></button>
                </div>

                <div class="liquid-card p-6 space-y-4 flex flex-col justify-between">
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold px-3 py-1 rounded-full bg-emerald-100 text-emerald-700">Prestasi</span>
                            <span class="text-xs text-slate-400"><i class="fa-regular fa-calendar mr-1"></i> 15 Sep 2026</span>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 leading-snug">Tim Futsal SD Ceria Nusantara Raih Juara 2 Antar SD</h3>
                        <p class="text-xs text-slate-600 leading-relaxed">Pertandingan final yang sangat dramatis melawan SD Harapan Bangsa membuktikan ketangguhan mental atlet muda kami.</p>
                    </div>
                    <button onclick="showAlert('Detail Berita', 'Selamat kepada Tim Futsal atas kerja keras dan semangat juang yang luar biasa!')" class="text-xs font-bold text-sky-600 hover:text-sky-800 flex items-center gap-1">Baca Selengkapnya <i class="fa-solid fa-arrow-right"></i></button>
                </div>
            </div>
        </section>

        <section id="section-ppdb" class="page-section space-y-8 hidden">
            <div class="text-center max-w-2xl mx-auto space-y-3">
                <span class="text-xs font-bold tracking-widest text-amber-600 uppercase">Pendaftaran Siswa Baru</span>
                <h2 class="text-3xl font-extrabold text-slate-900">Formulir PPDB Online 2026/2027</h2>
                <p class="text-slate-600 text-sm">Daftarkan putra-putri tercinta Anda dengan mudah melalui formulir digital online berikut.</p>
            </div>

            <div class="liquid-card p-8 md:p-12 max-w-3xl mx-auto">
                <form id="ppdbForm" onsubmit="handlePPDBSubmit(event)" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-slate-700">Nama Lengkap Calon Siswa</label>
                            <input type="text" required placeholder="Contoh: Budi Pratama" class="w-full px-4 py-3 rounded-2xl bg-white/70 border border-slate-200 focus:outline-none focus:ring-2 focus:ring-sky-500 text-slate-800 font-medium">
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-slate-700">Nama Panggilan</label>
                            <input type="text" required placeholder="Contoh: Budi" class="w-full px-4 py-3 rounded-2xl bg-white/70 border border-slate-200 focus:outline-none focus:ring-2 focus:ring-sky-500 text-slate-800 font-medium">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-slate-700">Jenis Kelamin</label>
                            <select class="w-full px-4 py-3 rounded-2xl bg-white/70 border border-slate-200 focus:outline-none focus:ring-2 focus:ring-sky-500 text-slate-800 font-medium">
                                <option>Laki-laki</option>
                                <option>Perempuan</option>
                            </select>
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-slate-700">Tanggal Lahir</label>
                            <input type="date" required class="w-full px-4 py-3 rounded-2xl bg-white/70 border border-slate-200 focus:outline-none focus:ring-2 focus:ring-sky-500 text-slate-800 font-medium">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-slate-700">Nama Orang Tua / Wali</label>
                            <input type="text" required placeholder="Contoh: Bapak Joko Widodo" class="w-full px-4 py-3 rounded-2xl bg-white/70 border border-slate-200 focus:outline-none focus:ring-2 focus:ring-sky-500 text-slate-800 font-medium">
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-bold text-slate-700">Nomor WhatsApp Aktif</label>
                            <input type="tel" required placeholder="Contoh: 081234567890" class="w-full px-4 py-3 rounded-2xl bg-white/70 border border-slate-200 focus:outline-none focus:ring-2 focus:ring-sky-500 text-slate-800 font-medium">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-bold text-slate-700">Alamat Domisili Lengkap</label>
                        <textarea rows="3" required placeholder="Jalan, RT/RW, Kelurahan, Kecamatan, Kota" class="w-full px-4 py-3 rounded-2xl bg-white/70 border border-slate-200 focus:outline-none focus:ring-2 focus:ring-sky-500 text-slate-800 font-medium"></textarea>
                    </div>

                    <div class="pt-4 text-center">
                        <button type="submit" class="liquid-btn-accent text-white font-bold px-10 py-4 rounded-full shadow-lg text-base hover:scale-105 transition transform w-full md:w-auto">
                            <i class="fa-solid fa-paper-plane mr-2"></i> Kirim Pendaftaran PPDB
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <footer class="mt-20 liquid-nav border-t border-white/60 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="space-y-4">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-sky-500 to-amber-400 flex items-center justify-center text-white text-xl font-bold">
                        <i class="fa-solid fa-graduation-cap"></i>
                    </div>
                    <span class="text-lg font-extrabold text-slate-900">SD Ceria Nusantara</span>
                </div>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Sekolah dasar pilihan utama yang memadukan kecerdasan intelektual, keterampilan digital, dan akhlak mulia.
                </p>
            </div>
            <div class="space-y-3">
                <h4 class="font-bold text-slate-900 text-sm">Tautan Cepat</h4>
                <ul class="space-y-2 text-xs text-slate-600">
                    <li><button onclick="switchSection('beranda')" class="hover:text-sky-600 transition">Beranda Utama</button></li>
                    <li><button onclick="switchSection('profil')" class="hover:text-sky-600 transition">Profil Sekolah</button></li>
                    <li><button onclick="switchSection('jadwal')" class="hover:text-sky-600 transition">Jadwal Pelajaran</button></li>
                    <li><button onclick="switchSection('guru')" class="hover:text-sky-600 transition">Dewan Guru</button></li>
                </ul>
            </div>
            <div class="space-y-3">
                <h4 class="font-bold text-slate-900 text-sm">Informasi Lain</h4>
                <ul class="space-y-2 text-xs text-slate-600">
                    <li><button onclick="switchSection('galeri')" class="hover:text-sky-600 transition">Galeri Kegiatan</button></li>
                    <li><button onclick="switchSection('berita')" class="hover:text-sky-600 transition">Berita & Pengumuman</button></li>
                    <li><button onclick="switchSection('ppdb')" class="hover:text-sky-600 transition">Pendaftaran PPDB</button></li>
                </ul>
            </div>
            <div class="space-y-3">
                <h4 class="font-bold text-slate-900 text-sm">Hubungi Kami</h4>
                <p class="text-xs text-slate-600"><i class="fa-solid fa-location-dot text-sky-600 mr-2"></i> Jl. Pendidikan Ceria No. 45, Kota Nusantara</p>
                <p class="text-xs text-slate-600"><i class="fa-solid fa-phone text-sky-600 mr-2"></i> (021) 555-8932</p>
                <p class="text-xs text-slate-600"><i class="fa-solid fa-envelope text-sky-600 mr-2"></i> info@sdcerianusantara.sch.id</p>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8 pt-6 border-t border-slate-200/50 text-center text-xs text-slate-500">
            © 2026 SD Ceria Nusantara. All rights reserved. Designed with Liquid Glassmorphism UI/UX.
        </div>
    </footer>

    <div id="customModal" class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/40 backdrop-blur-sm hidden">
        <div class="liquid-card p-8 max-w-md w-full mx-4 text-center space-y-4 shadow-2xl bg-white/90">
            <div id="modalIcon" class="w-16 h-16 rounded-full bg-sky-100 text-sky-600 flex items-center justify-center text-3xl mx-auto shadow-inner">
                <i class="fa-solid fa-circle-check"></i>
            </div>
            <h3 id="modalTitle" class="text-xl font-extrabold text-slate-900">Judul Pesan</h3>
            <p id="modalMessage" class="text-sm text-slate-600">Isi pesan atau informasi detail akan tampil di sini.</p>
            <button onclick="closeModal()" class="liquid-btn text-white font-bold px-6 py-2.5 rounded-full text-sm shadow-md w-full">Tutup</button>
        </div>
    </div>

    <script>
        const jadwalData = {
            '1': [
                ['Senin', 'Pendidikan Agama Islam', 'Matematika Dasar', 'Istirahat', 'Bahasa Indonesia'],
                ['Selasa', 'Bahasa Indonesia', 'Seni Budaya & Keterampilan', 'Istirahat', 'Pendidikan Pancasila'],
                ['Rabu', 'Matematika Dasar', 'PJOK (Olahraga)', 'Istirahat', 'Bahasa Inggris Dasar'],
                ['Kamis', 'Bahasa Indonesia', 'Seni Musik', 'Istirahat', 'Pendidikan Agama Islam'],
                ['Jumat', 'Pramuka Siaga / Pramuka Ceria', 'Pendidikan Pancasila', 'Istirahat', 'Kebersihan Lingkungan']
            ],
            '2': [
                ['Senin', 'Matematika', 'Bahasa Indonesia', 'Istirahat', 'Pendidikan Agama'],
                ['Selasa', 'Pendidikan Pancasila', 'PJOK', 'Istirahat', 'Seni Rupa'],
                ['Rabu', 'Bahasa Inggris', 'Matematika', 'Istirahat', 'IPA Sederhana'],
                ['Kamis', 'Bahasa Indonesia', 'Seni Musik', 'Istirahat', 'Pendidikan Agama'],
                ['Jumat', 'Pramuka / Kegiatan Jumat Bersih', 'Bahasa Indonesia', 'Istirahat', 'Kesenian Daerah']
            ],
            '3': [
                ['Senin', 'Matematika Lanjut', 'IPA (Sains)', 'Istirahat', 'Bahasa Indonesia'],
                ['Selasa', 'Bahasa Inggris', 'Pendidikan Pancasila', 'Istirahat', 'PJOK'],
                ['Rabu', 'Bahasa Indonesia', 'Matematika', 'Istirahat', 'Seni Budaya'],
                ['Kamis', 'Ilmu Pengetahuan Alam', 'Pendidikan Agama', 'Istirahat', 'Bahasa Inggris'],
                ['Jumat', 'Pramuka Penggalang', 'Bahasa Indonesia', 'Istirahat', 'Seni Kreatif']
            ],
            '4': [
                ['Senin', 'Matematika', 'IPAS (Sains & Sosial)', 'Istirahat', 'Bahasa Indonesia'],
                ['Selasa', 'Bahasa Inggris', 'Pendidikan Pancasila', 'Istirahat', 'PJOK'],
                ['Rabu', 'IPAS', 'Matematika', 'Istirahat', 'Seni Budaya & Prakarya'],
                ['Kamis', 'Bahasa Indonesia', 'Pendidikan Agama', 'Istirahat', 'Informatika Dasar'],
                ['Jumat', 'Pramuka', 'Bahasa Indonesia', 'Istirahat', 'Muatan Lokal']
            ],
            '5': [
                ['Senin', 'Matematika', 'IPAS', 'Istirahat', 'Bahasa Inggris'],
                ['Selasa', 'Bahasa Indonesia', 'Pendidikan Pancasila', 'Istirahat', 'PJOK'],
                ['Rabu', 'Informatika', 'Matematika', 'Istirahat', 'Seni Budaya'],
                ['Kamis', 'IPAS', 'Pendidikan Agama', 'Istirahat', 'Bahasa Indonesia'],
                ['Jumat', 'Pramuka', 'Muatan Lokal', 'Istirahat', 'Kesenian']
            ],
            '6': [
                ['Senin', 'Matematika Ujian', 'Bahasa Indonesia', 'Istirahat', 'IPAS'],
                ['Selasa', 'Pendidikan Pancasila', 'Bahasa Inggris', 'Istirahat', 'PJOK'],
                ['Rabu', 'IPAS', 'Matematika', 'Istirahat', 'Informatika'],
                ['Kamis', 'Bahasa Indonesia', 'Pendidikan Agama', 'Istirahat', 'Try Out Simulasi'],
                ['Jumat', 'Pramuka / Bimbingan Belajar', 'Muatan Lokal', 'Istirahat', 'Persiapan Kelulusan']
            ]
        };

        function switchSection(sectionId) {
            document.querySelectorAll('.page-section').forEach(sec => sec.classList.add('hidden'));
            const targetSec = document.getElementById('section-' + sectionId);
            if (targetSec) {
                targetSec.classList.remove('hidden');
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }

            document.querySelectorAll('.nav-link').forEach(btn => {
                if (btn.getAttribute('data-target') === sectionId) {
                    btn.className = 'nav-link px-4 py-2 rounded-xl text-sm font-semibold text-sky-700 bg-sky-100/60 transition';
                } else {
                    btn.className = 'nav-link px-4 py-2 rounded-xl text-sm font-medium text-slate-600 hover:text-sky-600 hover:bg-white/40 transition';
                }
            });
        }

        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }

        function filterJadwal(kelas) {
            document.querySelectorAll('.jadwal-btn').forEach(btn => {
                btn.className = 'jadwal-btn px-6 py-2.5 rounded-full text-sm font-semibold bg-white/60 text-slate-700 hover:bg-white shadow-sm transition';
            });
            event.target.className = 'jadwal-btn px-6 py-2.5 rounded-full text-sm font-bold bg-sky-600 text-white shadow-md transition';

            document.getElementById('jadwalTitle').innerHTML = `<i class="fa-solid fa-calendar-days text-sky-600"></i> Jadwal Pelajaran - Kelas ${kelas} (Tahun Ajaran 2026/2027)`;

            const tbody = document.getElementById('jadwalTableBody');
            tbody.innerHTML = '';
            const rows = jadwalData[kelas];
            rows.forEach(row => {
                const tr = document.createElement('tr');
                tr.className = 'hover:bg-white/40 transition';
                tr.innerHTML = `
                    <td class="py-3 px-4 font-bold text-slate-900">${row[0]}</td>
                    <td class="py-3 px-4">${row[1]}</td>
                    <td class="py-3 px-4">${row[2]}</td>
                    <td class="py-3 px-4"><span class="px-2.5 py-1 bg-amber-100 text-amber-700 rounded-full text-xs font-semibold">${row[3]}</span></td>
                    <td class="py-3 px-4">${row[4]}</td>
                `;
                tbody.appendChild(tr);
            });
        }

        function filterGallery(category) {
            document.querySelectorAll('.gallery-btn').forEach(btn => {
                btn.className = 'gallery-btn px-5 py-2 rounded-full text-xs font-semibold bg-white/60 text-slate-700 hover:bg-white shadow-sm';
            });
            event.target.className = 'gallery-btn px-5 py-2 rounded-full text-xs font-bold bg-sky-600 text-white shadow-sm';

            const items = document.querySelectorAll('.gallery-item');
            items.forEach(item => {
                item.style.display = (category === 'all' || item.getAttribute('data-category') === category) ? 'block' : 'none';
            });
        }

        function handlePPDBSubmit(e) {
            e.preventDefault();
            showAlert('Pendaftaran Berhasil!', 'Terima kasih telah mendaftar di SD Ceria Nusantara. Data calon siswa telah tersimpan di sistem kami. Panitia PPDB akan segera menghubungi Anda melalui WhatsApp.');
            document.getElementById('ppdbForm').reset();
        }

        function showAlert(title, message) {
            document.getElementById('modalTitle').innerText = title;
            document.getElementById('modalMessage').innerText = message;
            document.getElementById('customModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('customModal').classList.add('hidden');
        }

        window.onload = function() {
            filterJadwal('1');
        };
    </script>
</body>
</html>
