<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->default('SD Ceria Nusantara');
            $table->string('hero_badge')->default('Akreditasi A - Sekolah Penggerak');
            $table->string('hero_title')->default('Selamat Datang di SD Ceria Nusantara');
            $table->text('hero_subtitle')->default('Tempat belajar yang menyenangkan, interaktif, dan penuh inspirasi bagi buah hati Anda untuk tumbuh menjadi generasi cerdas, mandiri, dan berakhlak mulia.');
            $table->string('hero_image_path')->nullable();
            $table->string('cta_primary_label')->default('Daftar Siswa Baru');
            $table->string('cta_primary_link')->default('/pendaftaran');
            $table->string('cta_secondary_label')->default('Jelajahi Profil');
            $table->string('cta_secondary_link')->default('#profil');
            $table->string('principal_name')->default('Dra. Hj. Siti Aminah, M.Pd.');
            $table->string('principal_title')->default('Kepala Sekolah SD Ceria Nusantara');
            $table->text('principal_message')->default('Selamat datang di website resmi SD Ceria Nusantara. Kami berkomitmen untuk memberikan lingkungan belajar yang aman, ramah anak, serta merangsang kreativitas berpikir kritis dan karakter berbudi pekerti luhur.');
            $table->string('principal_image_path')->nullable();
            $table->string('about_title')->default('Membangun Fondasi Generasi Emas Masa Depan');
            $table->text('about_description')->default('Sekolah kami berkomitmen menghadirkan pendidikan yang aman, inspiratif, dan menyenangkan demi masa depan generasi yang unggul dan berkarakter.');
            $table->string('school_image_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
