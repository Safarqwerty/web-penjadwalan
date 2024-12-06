<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kelas;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Kelas::create(['nama' => 'Matematika', 'deskripsi' => 'Kelas dasar', 'jadwal' => '2024-12-10']);
        Kelas::create(['nama' => 'Bahasa Inggris', 'deskripsi' => 'Intermediate', 'jadwal' => '2024-12-15']);
    }
}
