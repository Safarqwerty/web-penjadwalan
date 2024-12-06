<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelas extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak mengikuti konvensi Laravel (tabel 'kelas')
    protected $table = 'kelas';

    // Tentukan kolom mana saja yang dapat diisi (mass assignable)
    protected $fillable = [
        'nama',
        'deskripsi',
        'jadwal',  // Pastikan kolom ini ada di tabel 'kelas'
    ];

    // Casting untuk kolom jadwal, jika jadwal adalah tipe date atau datetime
    protected $casts = [
        'jadwal' => 'datetime',  // atau 'date' jika hanya tanggal tanpa waktu
    ];

    // Relasi dengan model User (siswa) melalui tabel pivot kelas_siswa
    public function siswa()
    {
        return $this->belongsToMany(User::class, 'kelas_siswa', 'kelas_id', 'user_id');
    }
}
