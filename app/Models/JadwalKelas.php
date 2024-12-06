<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalKelas extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'jadwal_kelas';

    // Kolom yang dapat diisi secara mass-assignment
    protected $fillable = [
        'kelas_id',
        'mata_pelajaran_id',
        'pengajar_id',
        'hari',
        'waktu_mulai',
        'waktu_selesai',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class, 'mata_pelajaran_id');
    }

    public function pengajar()
    {
        return $this->belongsTo(User::class, 'pengajar_id');
    }
}
