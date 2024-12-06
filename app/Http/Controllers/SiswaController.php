<?php

namespace App\Http\Controllers;

use App\Models\JadwalKelas;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function dashboard()
    {
        $jadwalKelas = JadwalKelas::with(['mataPelajaran', 'pengajar'])->get();
        return view('siswa.dashboard', compact('jadwalKelas'));
    }
}
