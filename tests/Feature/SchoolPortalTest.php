<?php

namespace Tests\Feature;

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
        Storage::fake('public');

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

        $teacher = User::factory()->create([
            'name' => 'Guru Baru',
            'email' => 'guru@example.com',
            'role' => 'teacher',
        ]);

        $this->actingAs($teacher);
        $this->get('/dashboard/teacher')->assertStatus(200);
    }
}
