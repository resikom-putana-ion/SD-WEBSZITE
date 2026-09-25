<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'hero_badge',
        'hero_title',
        'hero_subtitle',
        'hero_image_path',
        'cta_primary_label',
        'cta_primary_link',
        'cta_secondary_label',
        'cta_secondary_link',
        'principal_name',
        'principal_title',
        'principal_message',
        'principal_image_path',
        'about_title',
        'about_description',
        'school_image_path',
    ];

    public static function defaults(): array
    {
        return [
            'site_name' => 'SD Ceria Nusantara',
            'hero_badge' => 'Akreditasi A - Sekolah Penggerak',
            'hero_title' => 'Selamat Datang di SD Ceria Nusantara',
            'hero_subtitle' => 'Tempat belajar yang menyenangkan, interaktif, dan penuh inspirasi bagi buah hati Anda untuk tumbuh menjadi generasi cerdas, mandiri, dan berakhlak mulia.',
            'cta_primary_label' => 'Daftar Siswa Baru',
            'cta_primary_link' => '/pendaftaran',
            'cta_secondary_label' => 'Jelajahi Profil',
            'cta_secondary_link' => '#profil',
            'principal_name' => 'Dra. Hj. Siti Aminah, M.Pd.',
            'principal_title' => 'Kepala Sekolah SD Ceria Nusantara',
            'principal_message' => 'Selamat datang di website resmi SD Ceria Nusantara. Kami berkomitmen untuk memberikan lingkungan belajar yang aman, ramah anak, serta merangsang kreativitas berpikir kritis dan karakter berbudi pekerti luhur.',
            'about_title' => 'Membangun Fondasi Generasi Emas Masa Depan',
            'about_description' => 'Sekolah kami berkomitmen menghadirkan pendidikan yang aman, inspiratif, dan menyenangkan demi masa depan generasi yang unggul dan berkarakter.',
        ];
    }
}
