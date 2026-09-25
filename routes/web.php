<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\TeacherController;
use App\Models\Gallery;
use App\Models\News;
use App\Models\SiteSetting;
use App\Models\Teacher;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

Route::get('/', function () {
    $site = Schema::hasTable('site_settings')
        ? SiteSetting::firstOrCreate([], SiteSetting::defaults())
        : SiteSetting::make(SiteSetting::defaults());

    return view('home', [
        'site' => $site,
        'news' => Schema::hasTable('news') ? News::latest('published_at')->take(3)->get() : collect(),
        'teachers' => Schema::hasTable('teachers') ? Teacher::orderBy('category')->orderBy('name')->take(6)->get() : collect(),
        'galleries' => Schema::hasTable('galleries') ? Gallery::latest()->take(6)->get() : collect(),
    ]);
})->name('home');

Route::get('/berita', [NewsController::class, 'index'])->name('news.index');
Route::get('/berita/{news:slug}', [NewsController::class, 'show'])->name('news.show');
Route::get('/guru', [TeacherController::class, 'publicIndex'])->name('teacher.index');
Route::get('/galeri', [GalleryController::class, 'publicIndex'])->name('gallery.index');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/pendaftaran', [RegistrationController::class, 'create'])->name('registration.create');
Route::post('/pendaftaran', [RegistrationController::class, 'store'])->name('registration.store');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/{role}', [DashboardController::class, 'show'])->name('dashboard.role');

    Route::get('/admin/beranda', [SiteSettingController::class, 'index'])->name('admin.site-settings');
    Route::post('/admin/beranda', [SiteSettingController::class, 'update'])->name('admin.site-settings.store');

    Route::get('/admin/berita', [NewsController::class, 'adminIndex'])->name('admin.news.index');
    Route::get('/admin/berita/create', [NewsController::class, 'create'])->name('admin.news.create');
    Route::post('/admin/berita', [NewsController::class, 'store'])->name('admin.news.store');
    Route::get('/admin/berita/{news}/edit', [NewsController::class, 'edit'])->name('admin.news.edit');
    Route::put('/admin/berita/{news}', [NewsController::class, 'update'])->name('admin.news.update');
    Route::delete('/admin/berita/{news}', [NewsController::class, 'destroy'])->name('admin.news.destroy');

    Route::get('/admin/guru', [TeacherController::class, 'manage'])->name('teacher.manage');
    Route::get('/admin/guru/create', [TeacherController::class, 'create'])->name('teacher.create');
    Route::post('/admin/guru', [TeacherController::class, 'store'])->name('teacher.store');
    Route::get('/admin/guru/{teacher}/edit', [TeacherController::class, 'edit'])->name('teacher.edit');
    Route::put('/admin/guru/{teacher}', [TeacherController::class, 'update'])->name('teacher.update');
    Route::delete('/admin/guru/{teacher}', [TeacherController::class, 'destroy'])->name('teacher.destroy');

    Route::get('/admin/galeri', [GalleryController::class, 'manage'])->name('gallery.manage');
    Route::get('/admin/galeri/create', [GalleryController::class, 'create'])->name('gallery.create');
    Route::post('/admin/galeri', [GalleryController::class, 'store'])->name('gallery.store');
    Route::get('/admin/galeri/{gallery}/edit', [GalleryController::class, 'edit'])->name('gallery.edit');
    Route::put('/admin/galeri/{gallery}', [GalleryController::class, 'update'])->name('gallery.update');
    Route::delete('/admin/galeri/{gallery}', [GalleryController::class, 'destroy'])->name('gallery.destroy');

    Route::get('/siswa/pembayaran', [FinanceController::class, 'studentPayments'])->name('student.payments');
    Route::post('/siswa/pembayaran', [FinanceController::class, 'submitPayment'])->name('student.payments.store');

    Route::get('/keuangan/pembayaran', [FinanceController::class, 'dashboard'])->name('finance.payments');
    Route::post('/keuangan/pembayaran/{payment}/approve', [FinanceController::class, 'review'])->name('finance.payments.approve');
    Route::post('/keuangan/pembayaran/{payment}/reject', [FinanceController::class, 'reject'])->name('finance.payments.reject');
});
