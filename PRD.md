# Product Requirements Document — Portal Sekolah SD-WEBSZITE

**Status:** Draf untuk ditinjau

**Tanggal:** 27 September 2026

**Tujuan dokumen:** Mencatat kemampuan proyek saat ini dan menjadi acuan pengembangan berikutnya.
**Batasan yang disepakati:** Demo dapat diakses teman melalui internet; lima peran dapat masuk; pengembangan menuju pengelolaan data sekolah sungguhan; layanan hosting dan penyimpanan tetap pada paket gratis; belum ada tenggat.

Dokumen ini disusun dari implementasi pada repositori, terutama `routes/web.php`, controller, model, migrasi, konfigurasi deployment, dan pengujian fitur. Istilah **sudah ada** berarti alur tersedia dalam kode; **rencana** berarti belum boleh dipresentasikan sebagai fungsi aktif. Kelayakan memakai data sekolah sungguhan masih memerlukan validasi keamanan, operasional, dan kebutuhan sekolah.

## 1. Executive Summary

### Problem Statement

Teman kolaborator perlu membuka dan mencoba portal sekolah dari internet tanpa menjalankan server lokal. Tim juga memerlukan gambaran yang akurat tentang fitur yang sudah berjalan, fitur yang masih berupa contoh, serta langkah untuk mengubah demo menjadi sistem pengelolaan sekolah yang dapat digunakan.

### Proposed Solution

Sediakan portal informasi sekolah berbasis web dengan halaman publik, formulir pendaftaran, dashboard lima peran, pengelolaan konten, dan konfirmasi pembayaran manual. Gunakan PRD ini untuk membatasi lingkup demo, menentukan kriteria penerimaan, dan memprioritaskan pekerjaan sebelum data nyata dimasukkan.

### Success Criteria

Angka berikut adalah **target penerimaan yang diusulkan**, bukan hasil pengukuran operasional. Tim dapat menyepakatinya kembali saat uji bersama.

1. Seluruh 7 halaman publik utama (`/`, `/berita`, detail berita, `/guru`, `/galeri`, `/pendaftaran`, `/login`) dapat dibuka dari internet pada uji penerimaan tanpa kesalahan server.
2. Lima akun demo — admin, akademik, guru, keuangan, siswa — masing-masing dapat masuk, diarahkan ke dashboard perannya, dan ditolak ketika membuka dashboard peran lain.
3. Satu pendaftaran uji tersimpan dengan status `pending`; satu konfirmasi pembayaran siswa tersimpan dengan bukti gambar dan dapat diputuskan oleh keuangan atau admin.
4. Bukti pembayaran uji hanya dapat diunduh oleh admin atau keuangan; permintaan siswa ke tautan bukti menghasilkan HTTP 403.
5. Seluruh pengujian fitur otomatis yang tersedia lulus sebelum setiap rilis; pengujian browser untuk alur publik, login, unggah, dan tinjau pembayaran dilakukan setelah deployment.

Target untuk sekolah sungguhan, seperti jumlah pengguna, jumlah pendaftar, waktu respons, dan ketersediaan layanan, masih **TBD** setelah kebutuhan dan volume pemakaian sekolah diketahui.

## 2. User Experience & Functionality

### User Personas

| Pengguna | Kebutuhan utama | Akses saat ini |
| --- | --- | --- |
| Pengunjung/orang tua calon siswa | Membaca informasi sekolah dan mengirim pendaftaran | Halaman publik dan formulir pendaftaran |
| Admin | Mengelola tampilan beranda, konten, dan memantau aktivitas | Dashboard, pengaturan beranda, berita, guru, galeri, tinjau pembayaran |
| Guru | Memperbarui konten sekolah | Dashboard, berita, profil guru, galeri |
| Staf akademik | Melihat informasi akademik | Dashboard demo; proses kelas, nilai, jadwal, dan rapor belum tersedia |
| Siswa | Melihat dashboard dan mengonfirmasi pembayaran | Dashboard demo, daftar pembayaran milik sendiri, unggah bukti |
| Staf keuangan | Memeriksa konfirmasi pembayaran | Dashboard, daftar pembayaran, unduh bukti, setujui/tolak |

### User Flow

1. Pengunjung membuka halaman sekolah, membaca berita/profil guru/galeri, lalu dapat mengirim formulir pendaftaran. Sistem menyimpan data dengan status `pending` dan menampilkan pesan keberhasilan.
2. Pengguna demo masuk dengan email dan kata sandi; sistem mengarahkan mereka ke `/dashboard/{role}`. Halaman dan aksi yang memiliki pembatasan peran menolak peran yang tidak berhak.
3. Admin mengubah konten beranda; admin atau guru menambah, mengubah, dan menghapus berita, profil guru, serta galeri. Konten yang tersimpan tampil pada halaman publik.
4. Siswa memasukkan jumlah, bulan, dan bukti pembayaran. Staf keuangan atau admin melihat daftar, mengunduh bukti, lalu menyetujui atau menolak. Siswa melihat status pada daftar pembayarannya sendiri.

### User Stories dan Acceptance Criteria

**US-01 — Informasi sekolah.** Sebagai pengunjung, saya ingin melihat beranda, berita, daftar guru, dan galeri agar saya mengenal sekolah.

- Halaman publik dapat dibuka tanpa login.
- Berita memiliki halaman daftar dan detail berdasarkan slug; data guru dan galeri tampil dari basis data.
- Data terbaru yang disimpan melalui antarmuka pengelolaan muncul pada halaman publik setelah halaman dimuat ulang.

**US-02 — Pendaftaran calon siswa.** Sebagai calon siswa/orang tua, saya ingin mengirim data pendaftaran agar sekolah menerima minat saya.

- Formulir meminta nama, email, telepon, dan asal sekolah; email pendaftaran harus unik.
- Data valid tersimpan dengan status `pending` dan pengguna mendapat pesan keberhasilan.
- Data tidak valid ditolak dengan kesalahan validasi; antarmuka untuk meninjau atau memutuskan pendaftaran **belum ada**.

**US-03 — Login sesuai peran.** Sebagai pengguna sekolah, saya ingin masuk ke dashboard peran saya agar hanya melihat alur yang relevan.

- Lima peran `admin`, `academic`, `teacher`, `finance`, dan `student` memiliki akun demo yang dapat diuji.
- Login berhasil memperbarui sesi dan membuka dashboard yang sesuai; logout mengakhiri sesi.
- Percobaan login gagal dibatasi menjadi lima kali sebelum respons HTTP 429; akses ke dashboard peran lain menghasilkan HTTP 403.

**US-04 — Pengelolaan konten.** Sebagai admin atau guru, saya ingin mengelola berita, profil guru, dan galeri agar informasi publik tetap terkini.

- Admin dan guru dapat melihat daftar serta menambah, mengubah, dan menghapus ketiga jenis konten.
- Gambar yang diterima untuk konten adalah JPG, JPEG, PNG, atau WebP dengan batas 2 MB; galeri mewajibkan gambar.
- Admin dapat mengubah konten dan gambar beranda; peran selain admin tidak dapat mengakses pengaturan beranda.

**US-05 — Konfirmasi pembayaran.** Sebagai siswa, saya ingin mengunggah bukti transfer agar staf dapat memeriksa pembayaran saya.

- Siswa dapat mengirim jumlah bilangan bulat minimal Rp1.000, bulan, catatan opsional, dan bukti gambar JPG/JPEG/PNG/WebP maksimal 2 MB.
- Rekaman baru berstatus `pending`; siswa hanya melihat daftar pembayaran miliknya.
- Fitur ini mencatat **klaim pembayaran manual**, bukan memproses atau memastikan perpindahan uang.

**US-06 — Tinjau pembayaran.** Sebagai staf keuangan atau admin, saya ingin melihat dan memutuskan konfirmasi pembayaran agar statusnya tercatat.

- Staf keuangan dan admin dapat melihat daftar, mengunduh bukti dari penyimpanan privat, serta menyetujui atau menolak.
- Keputusan mengubah status menjadi `approved` atau `rejected` dan mencatat ID pemeriksa serta waktu keputusan.
- Siswa dan guru tidak dapat mengunduh bukti melalui endpoint keuangan.

**US-07 — Dashboard akademik.** Sebagai staf akademik, saya ingin melihat ringkasan data kelas dan belajar agar dapat memantau kegiatan sekolah. **Status: rencana.**

- Pada demo, dashboard peran akademik dapat dibuka, tetapi metrik kelas, rapor, agenda, dan nilai masih angka contoh.
- Penerimaan fitur nyata memerlukan tabel sumber data, hak akses, proses input, dan perhitungan yang disepakati sekolah; nilai contoh harus dihilangkan sebelum dipakai sebagai laporan.

### Batas Kemampuan Saat Ini

| Area | Sudah ada | Belum ada/masih contoh |
| --- | --- | --- |
| Konten publik | Beranda, berita, guru, galeri; CRUD konten | Alur editorial seperti draf dan persetujuan berita |
| Pendaftaran | Pengiriman formulir dan status `pending` | Daftar/admin review, keputusan, pemberitahuan, status untuk pendaftar |
| Akun | Login, logout, lima peran demo | Manajemen akun melalui UI, undangan pengguna, pemulihan kata sandi |
| Pembayaran | Unggah bukti, riwayat siswa, tinjau manual | Tagihan, gerbang pembayaran, rekonsiliasi bank, kuitansi |
| Akademik | Dashboard peran | Kelas, jadwal, nilai, rapor, tugas, presensi nyata |
| Ringkasan dashboard | Sebagian jumlah konten, pendaftar, dan pembayaran berasal dari basis data | Angka akademik, saldo/pemasukan/pengeluaran, sebagian angka guru/siswa masih statis; beberapa tautan cepat kembali ke beranda |

### Non-Goals untuk Tahap Demo

- Mengelola seluruh administrasi sekolah sungguhan pada rilis demo.
- Memproses transaksi uang, membuat tagihan resmi, atau membuktikan transfer melalui integrasi bank.
- Menganggap angka contoh pada dashboard sebagai laporan faktual.
- Menambahkan fitur AI; kode saat ini tidak memakai model AI.
- Menjamin kapasitas dan ketersediaan setara layanan berbayar pada paket gratis.

## 3. AI System Requirements

Tidak berlaku. Produk saat ini tidak menggunakan AI; kebutuhan alat, evaluasi keluaran, dan pengamanan khusus AI belum diperlukan. Penambahan AI kelak memerlukan PRD tersendiri.

## 4. Technical Specifications

### Architecture Overview

Browser mengakses rute Laravel dan tampilan server-rendered. Controller memvalidasi permintaan dan mengatur izin menurut peran, lalu model Eloquent membaca/menulis PostgreSQL. Gambar publik disimpan pada bucket objek publik; bukti pembayaran disimpan pada bucket privat dan hanya disalurkan lewat endpoint yang memeriksa peran.

```text
Browser → Vercel PHP runtime → Laravel routes/controllers → PostgreSQL (Neon)
                                      ↘ bucket gambar publik (Neon Object Storage)
                                      ↘ bucket bukti privat (Neon Object Storage)
```

- Backend: PHP 8.3 dan Laravel 13; autentikasi berbasis sesi Laravel.
- Frontend: Blade, Vite 8, Tailwind CSS 4; beberapa aset antarmuka memakai CDN. Ketergantungan CDN perlu diperiksa sebelum pemakaian sekolah sungguhan.
- Deployment demo: Vercel Hobby dengan runtime PHP komunitas `vercel-php@0.7.4`; PostgreSQL dan object storage pada layanan Neon gratis.
- Entitas inti: `users`, `registrations`, `news`, `teachers`, `galleries`, `payments`, dan `site_settings`. Migrasi Laravel menjadi sumber struktur data.
- Tidak ada API publik khusus, integrasi bank, layanan email, atau sistem akademik eksternal pada kode saat ini.

### Integration Points

| Komponen | Fungsi | Persyaratan operasional |
| --- | --- | --- |
| PostgreSQL Neon | Menyimpan akun, konten, pendaftaran, pembayaran, pengaturan | Koneksi dan migrasi tersedia; data demo dipisah dari data nyata |
| Penyimpanan gambar publik | Menyimpan gambar berita, guru, galeri, beranda | Objek dapat dibaca pengunjung; unggahan divalidasi |
| Penyimpanan bukti privat | Menyimpan bukti pembayaran | Bucket tidak terbuka ke publik; akses melalui pemeriksaan peran |
| Vercel | Menjalankan aplikasi dan menyajikan aset | Konfigurasi lingkungan benar; rilis diuji setelah deployment |

### Security & Privacy

- Kontrol yang sudah ada: kata sandi di-hash oleh Laravel, sesi diregenerasi setelah login, perlindungan CSRF untuk formulir, pembatasan percobaan login, validasi unggahan, serta pemeriksaan peran pada fungsi terproteksi.
- Pendaftaran menyimpan nama, email, telepon, dan asal sekolah; pembayaran menyimpan identitas akun, jumlah, bulan, catatan, dan foto bukti. Data ini perlu diperlakukan sebagai data pribadi/keuangan, bukan materi demo publik.
- Sebelum data sekolah sungguhan dipakai, tetapkan pemilik data, dasar pemberitahuan/persetujuan, kebijakan retensi dan penghapusan, prosedur cadangan/pemulihan, serta akses staf. Keputusan kebijakan dan kepatuhan hukum masih **TBD** bersama pihak sekolah.
- Pekerjaan keamanan prioritas: lindungi formulir publik dari spam, sediakan pengelolaan akun dan rotasi kredensial demo, tetapkan kebijakan akses objek, audit perubahan keputusan pembayaran, dan pastikan pengguna tak dapat mengubah status secara tidak semestinya.
- Rahasia koneksi dan kata sandi demo tidak dicantumkan dalam dokumen atau repositori; simpan di variabel lingkungan. Jangan gunakan akun demo untuk data sekolah nyata.

### Verifikasi dan Definisi Rilis

Repositori mempunyai pengujian fitur untuk halaman login, pembatasan login, pendaftaran, unggah bukti dan izin unduh, dashboard guru, serta unggah galeri. Pada pemeriksaan deployment sebelumnya, 7 pengujian dengan 23 assertion lulus. Ini adalah **baseline**, bukan cakupan seluruh alur. Setiap rilis perlu menjalankan pengujian otomatis dan uji browser singkat untuk lima login, halaman publik, unggah gambar, pengiriman bukti, dan keputusan keuangan. Kriteria tahap sekolah sungguhan mencakup uji akses antarperan, pemulihan data, dan validasi data dengan pihak sekolah.

## 5. Risks & Roadmap

### Phased Rollout

| Tahap | Hasil yang dituju | Kriteria selesai |
| --- | --- | --- |
| **MVP — demo saat ini** | Situs internet dapat dicoba; lima peran masuk; konten publik, pendaftaran, dan konfirmasi pembayaran manual dapat didemonstrasikan | Kriteria keberhasilan 1–5 di atas diuji pada deployment; keterbatasan dashboard ditunjukkan secara jujur |
| **v1.1 — kesiapan operasional** | Alur admin untuk melihat/menindaklanjuti pendaftaran; dashboard hanya menampilkan data riil atau label demo; istilah siswa konsisten; manajemen akun, pembatasan spam, audit dan pemantauan dasar | Alur PPDB dapat ditangani dari UI; tak ada metrik statis yang tampak sebagai data faktual; akses dan pencatatan perubahan lolos uji |
| **v2.0 — data sekolah sungguhan** | Modul akademik dan keuangan dipilih bersama sekolah: kelas, jadwal, nilai/rapor, tagihan, laporan, atau integrasi lain sesuai kebutuhan | Skema dan izin disetujui sekolah; data uji dapat dimigrasi/dipulihkan; uji pengguna dan kebijakan privasi selesai sebelum data nyata dimasukkan |

Urutan modul v2.0, jumlah pengguna, target performa, dan keputusan apakah paket gratis masih mencukupi adalah **TBD**. Bila batas gratis tidak mencukupi, lingkup atau platform harus dievaluasi bersama, tanpa menjanjikan operasi tanpa biaya untuk volume nyata.

### Technical Risks

| Risiko | Dampak | Mitigasi yang direncanakan |
| --- | --- | --- |
| Runtime PHP Vercel berasal dari komunitas | Kompatibilitas atau pemeliharaan dapat berubah | Kunci versi, uji rilis, dan siapkan opsi hosting PHP lain bila perlu |
| Kuota/latensi paket gratis Vercel dan Neon | Respons lambat atau layanan terhenti saat batas tercapai | Pantau pemakaian, batasi ukuran unggahan, ukur beban sebelum pengguna nyata masuk |
| Dashboard berisi angka dan tautan contoh | Pengguna salah mengira data sudah dikelola | Beri label demo dan hilangkan angka/tautan palsu pada v1.1 |
| Data pribadi masuk lewat formulir publik | Spam, akses berlebihan, atau retensi tanpa aturan | Tambah perlindungan formulir, kebijakan data, kontrol akses, dan proses penghapusan |
| Berkas bukti dan gambar bergantung pada object storage | Konten hilang atau tidak dapat dibuka jika konfigurasi berubah | Cadangan, uji pemulihan, dan pemeriksaan izin bucket pada setiap lingkungan |
| Konfirmasi pembayaran bersifat manual | Status disetujui tidak otomatis berarti uang diterima | Tetapkan prosedur verifikasi staf; jangan sebut status sebagai bukti settlement bank |

### Keputusan Terbuka untuk Kolaborator

1. Nama sekolah, identitas visual, dan informasi apa saja yang boleh ditampilkan ke publik.
2. Siapa yang berwenang memutuskan pendaftaran dan bagaimana calon siswa menerima hasilnya.
3. Modul nyata pertama setelah demo: pendaftaran, akademik, atau keuangan.
4. Jumlah pengguna/data perkiraan dan aturan penyimpanan serta penghapusan data pribadi.
5. Penanggung jawab rilis, cadangan data, dan pengelolaan kredensial setelah kolaborasi dimulai.
