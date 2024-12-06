<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus pengguna lama jika ada
        User::where('email', 'admin@gmail.com')->delete();
        User::where('email', 'pengajar@gmail.com')->delete();
        User::where('email', 'siswa@gmail.com')->delete();

        // Lanjutkan dengan membuat pengguna baru
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        $admin->assignRole('admin');

        $pengajar = User::create([
            'name' => 'Pengajar User',
            'email' => 'pengajar@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        $pengajar->assignRole('pengajar');

        $siswa = User::create([
            'name' => 'Siswa User',
            'email' => 'siswa@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        $siswa->assignRole('siswa');
    }
}
