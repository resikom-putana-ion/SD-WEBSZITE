<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\News;
use App\Models\Payment;
use App\Models\Registration;
use App\Models\Teacher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): RedirectResponse
    {
        if (! Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        return redirect()->route('dashboard.role', ['role' => $user->role]);
    }

    public function show(string $role): View|RedirectResponse
    {
        if (! Auth::check()) {
            return redirect()->route('login');
        }

        $allowedRoles = ['admin', 'academic', 'finance', 'student', 'teacher'];

        abort_unless(in_array($role, $allowedRoles), 404);

        $user = Auth::user();
        abort_unless($user && $user->role === $role, 403);

        $stats = match ($role) {
            'admin' => [
                'title' => 'Dashboard Admin',
                'subtitle' => 'Pengelolaan sekolah, berita, galeri, guru, dan proses pendaftaran siswa baru',
                'cards' => [
                    ['label' => 'Pendaftar Baru', 'value' => Schema::hasTable('registrations') ? Registration::where('status', 'pending')->count() : 0, 'icon' => 'fa-user-plus', 'color' => 'sky', 'bg_class' => 'bg-sky-100', 'text_class' => 'text-sky-600'],
                    ['label' => 'Guru', 'value' => Schema::hasTable('teachers') ? Teacher::count() : 0, 'icon' => 'fa-chalkboard-user', 'color' => 'amber', 'bg_class' => 'bg-amber-100', 'text_class' => 'text-amber-600'],
                    ['label' => 'Berita', 'value' => Schema::hasTable('news') ? News::count() : 0, 'icon' => 'fa-newspaper', 'color' => 'emerald', 'bg_class' => 'bg-emerald-100', 'text_class' => 'text-emerald-600'],
                    ['label' => 'Galeri', 'value' => Schema::hasTable('galleries') ? Gallery::count() : 0, 'icon' => 'fa-images', 'color' => 'violet', 'bg_class' => 'bg-violet-100', 'text_class' => 'text-violet-600'],
                ],
            ],
            'academic' => [
                'title' => 'Dashboard Akademik',
                'subtitle' => 'Monitoring pembelajaran, jadwal, dan hasil belajar siswa',
                'cards' => [
                    ['label' => 'Kelas', 'value' => '24', 'icon' => 'fa-school', 'color' => 'sky', 'bg_class' => 'bg-sky-100', 'text_class' => 'text-sky-600'],
                    ['label' => 'Rapor Terinput', 'value' => '96%', 'icon' => 'fa-file-lines', 'color' => 'emerald', 'bg_class' => 'bg-emerald-100', 'text_class' => 'text-emerald-600'],
                    ['label' => 'Agenda Hari Ini', 'value' => '12', 'icon' => 'fa-calendar-check', 'color' => 'amber', 'bg_class' => 'bg-amber-100', 'text_class' => 'text-amber-600'],
                    ['label' => 'Nilai Rata-rata', 'value' => '88,4', 'icon' => 'fa-chart-column', 'color' => 'rose', 'bg_class' => 'bg-rose-100', 'text_class' => 'text-rose-600'],
                ],
            ],
            'finance' => [
                'title' => 'Dashboard Keuangan',
                'subtitle' => 'Pemantauan tagihan, pemasukan, dan pengeluaran sekolah',
                'cards' => [
                    ['label' => 'Pembayaran Pending', 'value' => Schema::hasTable('payments') ? Payment::where('status', 'pending')->count() : 0, 'icon' => 'fa-receipt', 'color' => 'amber', 'bg_class' => 'bg-amber-100', 'text_class' => 'text-amber-600'],
                    ['label' => 'Pemasukan Bulan Ini', 'value' => 'Rp 245 jt', 'icon' => 'fa-sack-dollar', 'color' => 'emerald', 'bg_class' => 'bg-emerald-100', 'text_class' => 'text-emerald-600'],
                    ['label' => 'Pengeluaran', 'value' => 'Rp 189 jt', 'icon' => 'fa-money-bill-wave', 'color' => 'rose', 'bg_class' => 'bg-rose-100', 'text_class' => 'text-rose-600'],
                    ['label' => 'Saldo', 'value' => 'Rp 1,4 m', 'icon' => 'fa-wallet', 'color' => 'sky', 'bg_class' => 'bg-sky-100', 'text_class' => 'text-sky-600'],
                ],
            ],
            'teacher' => [
                'title' => 'Dashboard Guru',
                'subtitle' => 'Manajemen pembelajaran, data guru, dan pengelolaan konten sekolah',
                'cards' => [
                    ['label' => 'Total Guru', 'value' => Schema::hasTable('teachers') ? Teacher::count() : 0, 'icon' => 'fa-chalkboard-user', 'color' => 'sky', 'bg_class' => 'bg-sky-100', 'text_class' => 'text-sky-600'],
                    ['label' => 'Kelas Aktif', 'value' => '12', 'icon' => 'fa-school', 'color' => 'emerald', 'bg_class' => 'bg-emerald-100', 'text_class' => 'text-emerald-600'],
                    ['label' => 'Berita', 'value' => Schema::hasTable('news') ? News::count() : 0, 'icon' => 'fa-newspaper', 'color' => 'amber', 'bg_class' => 'bg-amber-100', 'text_class' => 'text-amber-600'],
                    ['label' => 'Galeri', 'value' => Schema::hasTable('galleries') ? Gallery::count() : 0, 'icon' => 'fa-images', 'color' => 'violet', 'bg_class' => 'bg-violet-100', 'text_class' => 'text-violet-600'],
                ],
            ],
            'student' => [
                'title' => 'Dashboard Mahasiswa',
                'subtitle' => 'Informasi jadwal, nilai, dan aktivitas belajar Anda',
                'cards' => [
                    ['label' => 'Jadwal Hari Ini', 'value' => '5 Mata Pelajaran', 'icon' => 'fa-calendar-day', 'color' => 'sky', 'bg_class' => 'bg-sky-100', 'text_class' => 'text-sky-600'],
                    ['label' => 'Rata-rata Nilai', 'value' => '92,5', 'icon' => 'fa-award', 'color' => 'amber', 'bg_class' => 'bg-amber-100', 'text_class' => 'text-amber-600'],
                    ['label' => 'Tugas Menunggu', 'value' => '3', 'icon' => 'fa-list-check', 'color' => 'rose', 'bg_class' => 'bg-rose-100', 'text_class' => 'text-rose-600'],
                    ['label' => 'Kehadiran', 'value' => '97%', 'icon' => 'fa-user-check', 'color' => 'emerald', 'bg_class' => 'bg-emerald-100', 'text_class' => 'text-emerald-600'],
                ],
            ],
        };

        $dashboardData = match ($role) {
            'admin' => [
                'quickLinks' => [
                    ['label' => 'Kelola Beranda', 'route' => route('admin.site-settings'), 'bg_class' => 'bg-sky-100', 'text_class' => 'text-sky-700'],
                    ['label' => 'Kelola Berita', 'route' => route('admin.news.index'), 'bg_class' => 'bg-amber-100', 'text_class' => 'text-amber-700'],
                    ['label' => 'Kelola Guru', 'route' => route('teacher.manage'), 'bg_class' => 'bg-violet-100', 'text_class' => 'text-violet-700'],
                    ['label' => 'Kelola Galeri', 'route' => route('gallery.manage'), 'bg_class' => 'bg-emerald-100', 'text_class' => 'text-emerald-700'],
                ],
            ],
            'academic' => [
                'quickLinks' => [
                    ['label' => 'Data Kelas', 'route' => route('home'), 'bg_class' => 'bg-sky-100', 'text_class' => 'text-sky-700'],
                    ['label' => 'Input Nilai', 'route' => route('home'), 'bg_class' => 'bg-emerald-100', 'text_class' => 'text-emerald-700'],
                    ['label' => 'Agenda', 'route' => route('home'), 'bg_class' => 'bg-amber-100', 'text_class' => 'text-amber-700'],
                ],
            ],
            'finance' => [
                'quickLinks' => [
                    ['label' => 'Konfirmasi Pembayaran', 'route' => route('finance.payments'), 'bg_class' => 'bg-amber-100', 'text_class' => 'text-amber-700'],
                    ['label' => 'Tagihan Siswa', 'route' => route('home'), 'bg_class' => 'bg-sky-100', 'text_class' => 'text-sky-700'],
                    ['label' => 'Laporan Keuangan', 'route' => route('home'), 'bg_class' => 'bg-emerald-100', 'text_class' => 'text-emerald-700'],
                ],
            ],
            'teacher' => [
                'quickLinks' => [
                    ['label' => 'Kelola Guru', 'route' => route('teacher.manage'), 'bg_class' => 'bg-sky-100', 'text_class' => 'text-sky-700'],
                    ['label' => 'Kelola Berita', 'route' => route('admin.news.index'), 'bg_class' => 'bg-amber-100', 'text_class' => 'text-amber-700'],
                    ['label' => 'Kelola Galeri', 'route' => route('gallery.manage'), 'bg_class' => 'bg-violet-100', 'text_class' => 'text-violet-700'],
                ],
            ],
            'student' => [
                'quickLinks' => [
                    ['label' => 'Konfirmasi Pembayaran', 'route' => route('student.payments'), 'bg_class' => 'bg-amber-100', 'text_class' => 'text-amber-700'],
                    ['label' => 'Jadwal Saya', 'route' => route('home'), 'bg_class' => 'bg-sky-100', 'text_class' => 'text-sky-700'],
                    ['label' => 'Nilai dan Rapor', 'route' => route('home'), 'bg_class' => 'bg-emerald-100', 'text_class' => 'text-emerald-700'],
                ],
            ],
            default => ['quickLinks' => []],
        };

        $dashboardData['payments'] = match ($role) {
            'finance', 'admin' => Schema::hasTable('payments') ? Payment::with('user')->latest()->take(5)->get() : collect(),
            default => collect(),
        };

        return view('dashboard.index', [
            'user' => $user,
            'role' => $role,
            'stats' => $stats,
            'dashboardData' => $dashboardData,
        ]);
    }
}
