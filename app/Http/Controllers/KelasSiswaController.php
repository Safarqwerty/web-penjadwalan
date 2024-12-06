<?php

namespace App\Http\Controllers;

use App\Models\KelasSiswa;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;

class KelasSiswaController extends Controller
{
    // Menampilkan daftar kelas dan siswa yang terdaftar
    public function index()
    {
        // Mengambil semua kelas dan siswa yang terdaftar
        $kelasSiswa = KelasSiswa::with(['kelas', 'siswa'])->get();

        // Add these lines to pass kelas and siswa to the view
        $kelas = Kelas::all();
        $siswa = User::role('siswa')->get();

        return view('admin.kelas-siswa.index', compact('kelasSiswa', 'kelas', 'siswa'));
    }

    // Menampilkan form untuk menambahkan siswa ke kelas
    public function create()
    {
        $kelas = Kelas::all();
        $siswa = User::role('siswa')->get();

        return view('admin.kelas-siswa.create', compact('kelas', 'siswa'));
    }

    // Menyimpan data siswa ke kelas
    public function store(Request $request)
    {
        $request->validate([
            'kelas_id' => 'required|exists:kelas,id',
            'user_id' => 'required|exists:users,id',
        ]);

        KelasSiswa::create([
            'kelas_id' => $request->kelas_id,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('admin.kelas-siswa.index')->with('success', 'Siswa berhasil ditambahkan ke kelas.');
    }

    // Menghapus hubungan siswa dari kelas
    public function destroy($id)
    {
        $kelasSiswa = KelasSiswa::findOrFail($id);
        $kelasSiswa->delete();

        return redirect()->route('admin.kelas-siswa.index')->with('success', 'Hubungan siswa dan kelas berhasil dihapus.');
    }
}
