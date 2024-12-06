<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataPelajaran;
use App\Models\JadwalKelas;
use App\Models\Kelas;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard'); // Pastikan ini sesuai dengan file view Anda
    }
}
