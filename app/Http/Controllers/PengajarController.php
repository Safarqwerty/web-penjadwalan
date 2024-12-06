<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalKelas;

class PengajarController extends Controller
{
    public function dashboard()
    {
        $pengajar = auth()->user();
        // Mengambil data JadwalKelas beserta relasi yang dibutuhkan
        $jadwalKelas = JadwalKelas::with(['mataPelajaran', 'kelas.siswa', 'pengajar'])->get();

        return view('pengajar.dashboard', compact('jadwalKelas'));
    }
}
