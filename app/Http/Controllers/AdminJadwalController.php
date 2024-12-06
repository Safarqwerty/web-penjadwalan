<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use App\Models\JadwalKelas;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;

class AdminJadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwal = JadwalKelas::all(); // Ambil semua jadwal kelas
        $kelas = Kelas::all(); // Ambil semua data kelas
        $mataPelajaran = MataPelajaran::all(); // Ambil semua mata pelajaran
        $pengajar = User::role('pengajar')->get(); // Ambil semua pengajar (asumsi pengajar adalah user dengan role 'pengajar')

        return view('admin.jadwal.index', compact('jadwal', 'kelas', 'mataPelajaran', 'pengajar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::all();
        $mataPelajaran = MataPelajaran::all();
        $pengajar = User::role('pengajar')->get();

        return view('admin.jadwal.create', compact('kelas', 'mataPelajaran', 'pengajar'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kelas_id' => 'required|exists:kelas,id',
            'mata_pelajaran_id' => 'required|exists:mata_pelajaran,id',
            'pengajar_id' => 'required|exists:users,id',
            'hari' => 'required|string|max:10', // Validasi untuk hari
            'waktu_mulai' => 'required|date_format:H:i', // Validasi format waktu
            'waktu_selesai' => 'required|date_format:H:i|after:waktu_mulai', // Harus lebih besar dari waktu mulai
        ]);

        // Menyimpan data jadwal ke database
        JadwalKelas::create([
            'kelas_id' => $request->kelas_id,
            'mata_pelajaran_id' => $request->mata_pelajaran_id,
            'pengajar_id' => $request->pengajar_id,
            'hari' => $request->hari,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
        ]);

        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal kelas berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jadwal = JadwalKelas::findOrFail($id);
        return view('admin.jadwal.show', compact('jadwal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jadwal = JadwalKelas::findOrFail($id);
        $kelas = Kelas::all();
        $mataPelajaran = MataPelajaran::all();
        $pengajar = User::role('pengajar')->get();

        return view('admin.jadwal.edit', compact('jadwal', 'kelas', 'mataPelajaran', 'pengajar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kelas_id' => 'required|exists:kelas,id',
            'mata_pelajaran_id' => 'required|exists:mata_pelajaran,id',
            'pengajar_id' => 'required|exists:users,id',
            'hari' => 'required|string|max:10', // Validasi untuk hari
            'waktu_mulai' => 'required|date_format:H:i', // Validasi format waktu
            'waktu_selesai' => 'required|date_format:H:i|after:waktu_mulai', // Harus lebih besar dari waktu mulai
        ]);

        $jadwal = JadwalKelas::findOrFail($id);
        $jadwal->update($request->all());

        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal kelas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jadwal = JadwalKelas::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal kelas berhasil dihapus.');
    }
}
