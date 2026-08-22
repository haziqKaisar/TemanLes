<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\Tutor;
use App\Models\TutorAvailability;
use App\Models\TutorSubject;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DemoAccountSeeder extends Seeder
{
    public function run(): void
    {
        // ===== ADMIN =====
        User::firstOrCreate(
            ['email' => 'admin@demo.com'],
            [
                'name' => 'Admin Demo',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );

        // ===== MURID =====
        User::firstOrCreate(
            ['email' => 'murid@demo.com'],
            [
                'name' => 'Ani Wijaya',
                'password' => Hash::make('password'),
                'role' => 'student',
                'email_verified_at' => now(),
            ]
        );

        // ===== DATA GURU (6 guru dengan variasi) =====
        $teachers = [
            [
                'email' => 'guru1@demo.com',
                'name' => 'Budi Santoso',
                'headline' => 'Guru Matematika & Fisika Berpengalaman 5 Tahun',
                'bio' => 'Lulusan Pendidikan Matematika UI, spesialis persiapan UTBK dan olimpiade.',
                'education' => 'S1 Pendidikan Matematika - Universitas Indonesia',
                'experience_years' => 5,
                'teaching_mode' => 'both',
                'lat' => -6.5971, 'lng' => 106.8060, 'address' => 'Bogor, Jawa Barat',
                'rating_avg' => 4.8, 'rating_count' => 12,
                'subjects' => [
                    ['name' => 'Matematika', 'level' => 'SMA', 'price' => 100000],
                    ['name' => 'Matematika', 'level' => 'SMP', 'price' => 80000],
                    ['name' => 'Fisika', 'level' => 'SMA', 'price' => 110000],
                ],
                'days' => [1, 2, 3, 4, 5], 'start' => '15:00', 'end' => '20:00',
            ],
            [
                'email' => 'guru2@demo.com',
                'name' => 'Siti Rahayu',
                'headline' => 'Native-level English Tutor, Sertifikasi TOEFL & IELTS',
                'bio' => 'Pengalaman 8 tahun mengajar Bahasa Inggris untuk anak-anak hingga dewasa, fokus speaking & writing.',
                'education' => 'S1 Sastra Inggris - Universitas Gadjah Mada',
                'experience_years' => 8,
                'teaching_mode' => 'online',
                'lat' => null, 'lng' => null, 'address' => null,
                'rating_avg' => 4.9, 'rating_count' => 27,
                'subjects' => [
                    ['name' => 'Bahasa Inggris', 'level' => 'SD', 'price' => 70000],
                    ['name' => 'Bahasa Inggris', 'level' => 'SMP', 'price' => 85000],
                    ['name' => 'Bahasa Inggris', 'level' => 'Umum', 'price' => 120000],
                ],
                'days' => [1, 2, 3, 4, 5, 6], 'start' => '09:00', 'end' => '17:00',
            ],
            [
                'email' => 'guru3@demo.com',
                'name' => 'Ahmad Fauzi',
                'headline' => 'Tutor Coding & Komputer untuk Pemula sampai Mahir',
                'bio' => 'Software engineer dengan pengalaman mengajar coding untuk anak SD-SMA, dari dasar logika sampai bikin aplikasi sederhana.',
                'education' => 'S1 Ilmu Komputer - Institut Teknologi Bandung',
                'experience_years' => 4,
                'teaching_mode' => 'both',
                'lat' => -6.9147, 'lng' => 107.6098, 'address' => 'Bandung, Jawa Barat',
                'rating_avg' => 4.7, 'rating_count' => 9,
                'subjects' => [
                    ['name' => 'Komputer & Coding', 'level' => 'SMP', 'price' => 90000],
                    ['name' => 'Komputer & Coding', 'level' => 'SMA', 'price' => 130000],
                    ['name' => 'Matematika', 'level' => 'SMA', 'price' => 95000],
                ],
                'days' => [2, 4, 6], 'start' => '13:00', 'end' => '18:00',
            ],
            [
                'email' => 'guru4@demo.com',
                'name' => 'Dewi Lestari',
                'headline' => 'Guru Mengaji & Bahasa Arab Bersertifikat',
                'bio' => 'Hafidzah 30 juz, pengalaman mengajar mengaji dan bahasa Arab untuk anak-anak selama 6 tahun.',
                'education' => 'S1 Pendidikan Agama Islam - UIN Jakarta',
                'experience_years' => 6,
                'teaching_mode' => 'offline',
                'lat' => -6.2088, 'lng' => 106.8456, 'address' => 'Jakarta Selatan, DKI Jakarta',
                'rating_avg' => 5.0, 'rating_count' => 18,
                'subjects' => [
                    ['name' => 'Mengaji', 'level' => 'SD', 'price' => 60000],
                    ['name' => 'Mengaji', 'level' => 'Umum', 'price' => 75000],
                ],
                'days' => [0, 1, 2, 3, 4], 'start' => '16:00', 'end' => '19:00',
            ],
            [
                'email' => 'guru5@demo.com',
                'name' => 'Rizky Pratama',
                'headline' => 'Spesialis Kimia & Biologi, Alumni Fakultas Kedokteran',
                'bio' => 'Mahasiswa kedokteran tingkat akhir, fokus membantu persiapan UTBK Saintek dan ujian sekolah.',
                'education' => 'S1 Pendidikan Dokter - Universitas Airlangga',
                'experience_years' => 3,
                'teaching_mode' => 'online',
                'lat' => null, 'lng' => null, 'address' => null,
                'rating_avg' => 4.6, 'rating_count' => 7,
                'subjects' => [
                    ['name' => 'Kimia', 'level' => 'SMA', 'price' => 100000],
                    ['name' => 'Biologi', 'level' => 'SMA', 'price' => 100000],
                    ['name' => 'IPA', 'level' => 'SMP', 'price' => 75000],
                ],
                'days' => [1, 3, 5], 'start' => '19:00', 'end' => '22:00',
            ],
            [
                'email' => 'guru6@demo.com',
                'name' => 'Maya Anggraini',
                'headline' => 'Guru SD Semua Mapel, Sabar & Berpengalaman',
                'bio' => 'Pengalaman 10 tahun mengajar di SD, cocok untuk anak yang butuh pendampingan belajar menyeluruh.',
                'education' => 'S1 PGSD - Universitas Negeri Yogyakarta',
                'experience_years' => 10,
                'teaching_mode' => 'both',
                'lat' => -7.7956, 'lng' => 110.3695, 'address' => 'Yogyakarta',
                'rating_avg' => 4.9, 'rating_count' => 31,
                'subjects' => [
                    ['name' => 'Matematika', 'level' => 'SD', 'price' => 65000],
                    ['name' => 'Bahasa Indonesia', 'level' => 'SD', 'price' => 60000],
                    ['name' => 'IPA', 'level' => 'SD', 'price' => 65000],
                ],
                'days' => [1, 2, 3, 4, 5], 'start' => '14:00', 'end' => '17:00',
            ],
            [
                'email' => 'guru7@demo.com',
                'name' => 'Rina Kusuma',
                'headline' => 'Tutor Ekonomi & Akuntansi, Fokus Persiapan Ujian',
                'bio' => 'Pengalaman mengajar akuntansi dasar hingga menengah, cocok untuk siswa SMA jurusan IPS.',
                'education' => 'S1 Akuntansi - Universitas Airlangga',
                'experience_years' => 4,
                'teaching_mode' => 'both',
                'lat' => -7.2575, 'lng' => 112.7521, 'address' => 'Surabaya, Jawa Timur',
                'rating_avg' => 4.5, 'rating_count' => 6,
                'subjects' => [
                    ['name' => 'Ekonomi', 'level' => 'SMA', 'price' => 90000],
                    ['name' => 'Akuntansi', 'level' => 'SMA', 'price' => 95000],
                ],
                'days' => [1, 2, 4], 'start' => '16:00', 'end' => '20:00',
            ],
            [
                'email' => 'guru8@demo.com',
                'name' => 'Farhan Hidayat',
                'headline' => 'Guru Sejarah & IPS yang Bikin Pelajaran Seru',
                'bio' => 'Metode mengajar interaktif, banyak menggunakan studi kasus dan cerita agar materi mudah diingat.',
                'education' => 'S1 Pendidikan Sejarah - Universitas Negeri Malang',
                'experience_years' => 3,
                'teaching_mode' => 'online',
                'lat' => null, 'lng' => null, 'address' => null,
                'rating_avg' => 4.4, 'rating_count' => 5,
                'subjects' => [
                    ['name' => 'Sejarah', 'level' => 'SMP', 'price' => 70000],
                    ['name' => 'IPS', 'level' => 'SMP', 'price' => 70000],
                ],
                'days' => [0, 3, 5], 'start' => '10:00', 'end' => '15:00',
            ],
            [
                'email' => 'guru9@demo.com',
                'name' => 'Lina Marlina',
                'headline' => 'Guru Bahasa Mandarin, Persiapan HSK',
                'bio' => 'Pernah studi di Tiongkok selama 3 tahun, mengajar bahasa Mandarin untuk pemula sampai persiapan sertifikasi HSK.',
                'education' => 'S1 Sastra China - Universitas Indonesia',
                'experience_years' => 5,
                'teaching_mode' => 'offline',
                'lat' => -6.1751, 'lng' => 106.8650, 'address' => 'Jakarta Pusat, DKI Jakarta',
                'rating_avg' => 4.9, 'rating_count' => 14,
                'subjects' => [
                    ['name' => 'Bahasa Mandarin', 'level' => 'Umum', 'price' => 150000],
                    ['name' => 'Bahasa Mandarin', 'level' => 'SMA', 'price' => 110000],
                ],
                'days' => [2, 4, 6], 'start' => '15:00', 'end' => '19:00',
            ],
            [
                'email' => 'guru10@demo.com',
                'name' => 'Yusuf Ibrahim',
                'headline' => 'Tutor Fisika & Matematika, Alumni Juara Olimpiade',
                'bio' => 'Mantan peraih medali OSN Fisika, sekarang fokus membimbing siswa yang ingin ikut kompetisi sains.',
                'education' => 'S1 Fisika - Institut Teknologi Bandung',
                'experience_years' => 2,
                'teaching_mode' => 'both',
                'lat' => 3.5952, 'lng' => 98.6722, 'address' => 'Medan, Sumatera Utara',
                'rating_avg' => 4.7, 'rating_count' => 4,
                'subjects' => [
                    ['name' => 'Fisika', 'level' => 'SMA', 'price' => 120000],
                    ['name' => 'Matematika', 'level' => 'SMA', 'price' => 105000],
                ],
                'days' => [1, 3, 5, 6], 'start' => '13:00', 'end' => '17:00',
            ],
            [
                'email' => 'guru11@demo.com',
                'name' => 'Putri Amalia',
                'headline' => 'Guru Bahasa Indonesia, Spesialis Menulis & Membaca',
                'bio' => 'Fokus membantu anak-anak yang kesulitan membaca lancar dan menulis dengan baik, pendekatan sabar dan menyenangkan.',
                'education' => 'S1 Pendidikan Bahasa Indonesia - Universitas Pendidikan Indonesia',
                'experience_years' => 7,
                'teaching_mode' => 'online',
                'lat' => null, 'lng' => null, 'address' => null,
                'rating_avg' => 4.8, 'rating_count' => 22,
                'subjects' => [
                    ['name' => 'Bahasa Indonesia', 'level' => 'SD', 'price' => 65000],
                    ['name' => 'Bahasa Indonesia', 'level' => 'SMP', 'price' => 75000],
                ],
                'days' => [1, 2, 3, 4, 5], 'start' => '08:00', 'end' => '12:00',
            ],
            [
                'email' => 'guru12@demo.com',
                'name' => 'Doni Saputra',
                'headline' => 'Mentor Coding Profesional untuk Career Switcher',
                'bio' => 'Senior software engineer, membimbing profesional dewasa yang ingin belajar coding untuk pindah karir ke tech.',
                'education' => 'S2 Teknik Informatika - Institut Teknologi Sepuluh Nopember',
                'experience_years' => 9,
                'teaching_mode' => 'online',
                'lat' => null, 'lng' => null, 'address' => null,
                'rating_avg' => 5.0, 'rating_count' => 16,
                'subjects' => [
                    ['name' => 'Komputer & Coding', 'level' => 'Umum', 'price' => 200000],
                ],
                'days' => [0, 6], 'start' => '09:00', 'end' => '16:00',
            ],
        ];

        foreach ($teachers as $t) {
            $user = User::firstOrCreate(
                ['email' => $t['email']],
                [
                    'name' => $t['name'],
                    'password' => Hash::make('password'),
                    'role' => 'teacher',
                    'email_verified_at' => now(),
                ]
            );

            $tutor = Tutor::firstOrCreate(
                ['user_id' => $user->id],
                [
                    'headline' => $t['headline'],
                    'bio' => $t['bio'],
                    'education' => $t['education'],
                    'experience_years' => $t['experience_years'],
                    'teaching_mode' => $t['teaching_mode'],
                    'default_latitude' => $t['lat'],
                    'default_longitude' => $t['lng'],
                    'default_address' => $t['address'],
                    'verification_status' => 'verified',
                    'is_active' => true,
                    'rating_avg' => $t['rating_avg'],
                    'rating_count' => $t['rating_count'],
                ]
            );

            foreach ($t['subjects'] as $s) {
                $subject = Subject::where('name', $s['name'])->first();

                if ($subject) {
                    TutorSubject::firstOrCreate(
                        ['tutor_id' => $tutor->id, 'subject_id' => $subject->id, 'level' => $s['level']],
                        ['price_per_hour' => $s['price'], 'is_active' => true]
                    );
                }
            }

            foreach ($t['days'] as $day) {
                TutorAvailability::firstOrCreate(
                    ['tutor_id' => $tutor->id, 'day_of_week' => $day, 'start_time' => $t['start'], 'end_time' => $t['end']],
                    ['is_active' => true]
                );
            }
        }

        $this->command->info('Demo accounts created:');
        $this->command->info('Admin -> admin@demo.com / password');
        $this->command->info('Murid -> murid@demo.com / password');
        $this->command->info('Guru 1 -> guru1@demo.com / password (Matematika & Fisika, Bogor)');
        $this->command->info('Guru 2 -> guru2@demo.com / password (Bahasa Inggris, Online)');
        $this->command->info('Guru 3 -> guru3@demo.com / password (Coding, Bandung)');
        $this->command->info('Guru 4 -> guru4@demo.com / password (Mengaji, Jakarta Selatan)');
        $this->command->info('Guru 5 -> guru5@demo.com / password (Kimia & Biologi, Online)');
        $this->command->info('Guru 6 -> guru6@demo.com / password (Guru SD, Yogyakarta)');
    }
}
