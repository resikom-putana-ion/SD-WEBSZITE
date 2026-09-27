<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = config('demo.password');

        if (! $password) {
            if (app()->isProduction()) {
                throw new \RuntimeException('Set DEMO_PASSWORD before seeding demo users in production.');
            }

            $password = 'password';
        }

        $users = [
            [
                'name' => 'Admin Portal',
                'email' => 'admin@sdcerianusantara.sch.id',
                'password' => $password,
                'role' => 'admin',
            ],
            [
                'name' => 'Akademik Manager',
                'email' => 'akademik@sdcerianusantara.sch.id',
                'password' => $password,
                'role' => 'academic',
            ],
            [
                'name' => 'Guru SD Ceria',
                'email' => 'guru@sdcerianusantara.sch.id',
                'password' => $password,
                'role' => 'teacher',
            ],
            [
                'name' => 'Keuangan Sekolah',
                'email' => 'keuangan@sdcerianusantara.sch.id',
                'password' => $password,
                'role' => 'finance',
            ],
            [
                'name' => 'Mahasiswa SD Ceria',
                'email' => 'mahasiswa@sdcerianusantara.sch.id',
                'password' => $password,
                'role' => 'student',
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                [
                    'name' => $user['name'],
                    'password' => Hash::make($user['password']),
                    'role' => $user['role'],
                ]
            );
        }
    }
}
