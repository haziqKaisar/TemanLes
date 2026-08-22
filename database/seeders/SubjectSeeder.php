<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        $subjects = [
            'Matematika', 'Fisika', 'Kimia', 'Biologi',
            'Bahasa Indonesia', 'Bahasa Inggris', 'Bahasa Mandarin',
            'IPA', 'IPS', 'Sejarah', 'Ekonomi', 'Akuntansi',
            'Komputer & Coding', 'Mengaji',
        ];

        foreach ($subjects as $name) {
            Subject::firstOrCreate(
                ['slug' => Str::slug($name)],
                ['name' => $name]
            );
        }
    }
}
