<?php

namespace Tests\Feature;

use App\Models\Gallery;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class SchoolPortalTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_page_is_accessible(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_login_is_throttled_after_five_failed_attempts(): void
    {
        for ($attempt = 0; $attempt < 5; $attempt++) {
            $this->post('/login', [
                'email' => 'unknown@example.com',
                'password' => 'wrong-password',
            ])->assertRedirect();
        }

        $this->post('/login', [
            'email' => 'unknown@example.com',
            'password' => 'wrong-password',
        ])->assertStatus(429);
    }

    public function test_public_registration_store_creates_registration_record(): void
    {
        $response = $this->post('/pendaftaran', [
            'name' => 'Rina Wijaya',
            'email' => 'rina@example.com',
            'phone' => '081234567890',
            'school' => 'SDN 1 Nusantara',
        ]);

        $response->assertRedirect('/pendaftaran');
        $this->assertDatabaseHas('registrations', [
            'email' => 'rina@example.com',
            'status' => 'pending',
        ]);
    }

    public function test_student_can_submit_payment_confirmation_and_teacher_dashboard_is_accessible(): void
    {
        Storage::fake('proofs');

        $student = User::factory()->create([
            'name' => 'Student Payment',
            'email' => 'student.payment@example.com',
            'role' => 'student',
        ]);

        $this->actingAs($student);

        $response = $this->post('/siswa/pembayaran', [
            'amount' => 350000,
            'month' => 'September 2026',
            'proof' => UploadedFile::fake()->image('bukti.png', 1200, 900),
            'notes' => 'Pembayaran SPP bulan September',
        ]);

        $response->assertRedirect('/siswa/pembayaran');
        $this->assertDatabaseHas('payments', [
            'user_id' => $student->id,
            'month' => 'September 2026',
            'status' => 'pending',
        ]);

        $payment = Payment::firstOrFail();
        Storage::disk('proofs')->assertExists($payment->proof_path);
        $this->get(route('finance.payments.proof', $payment))->assertForbidden();

        $finance = User::factory()->create(['role' => 'finance']);
        $this->actingAs($finance);
        $this->get(route('finance.payments.proof', $payment))->assertOk()->assertDownload();

        $teacher = User::factory()->create([
            'name' => 'Guru Baru',
            'email' => 'guru@example.com',
            'role' => 'teacher',
        ]);

        $this->actingAs($teacher);
        $this->get('/dashboard/teacher')->assertStatus(200);
    }

    public function test_admin_can_upload_gallery_image(): void
    {
        Storage::fake('public');

        $admin = User::factory()->create(['role' => 'admin']);

        $this->actingAs($admin)->post('/admin/galeri', [
            'title' => 'Foto kegiatan',
            'category' => 'Kegiatan',
            'image' => UploadedFile::fake()->image('kegiatan.png', 100, 100),
        ])->assertRedirect('/admin/galeri');

        $gallery = Gallery::where('title', 'Foto kegiatan')->firstOrFail();
        Storage::disk('public')->assertExists($gallery->image_path);
    }
}
