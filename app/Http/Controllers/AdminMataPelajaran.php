<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class AdminMataPelajaran extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mataPelajaran = MataPelajaran::all();
        return view('admin.mata_pelajaran.index', compact('mataPelajaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.mata_pelajaran.create'); // Menampilkan form untuk tambah mata pelajaran
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        MataPelajaran::create($request->all());

        return redirect()->route('admin.mataPelajaran.index')->with('success', 'Mata pelajaran berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mataPelajaran = MataPelajaran::findOrFail($id);
        return view('admin.mata_pelajaran.show', compact('mataPelajaran')); // Menampilkan detail mata pelajaran
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mataPelajaran = MataPelajaran::findOrFail($id);
        return view('admin.mata_pelajaran.edit', compact('mataPelajaran')); // Menampilkan form edit mata pelajaran
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $mataPelajaran = MataPelajaran::findOrFail($id);
        $mataPelajaran->update($request->all());

        return redirect()->route('admin.mataPelajaran.index')->with('success', 'Mata pelajaran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mataPelajaran = MataPelajaran::findOrFail($id);

        // Periksa jika mata pelajaran terkait dengan jadwal kelas
        if ($mataPelajaran->jadwal()->count() > 0) {
            // Jangan hapus mata pelajaran jika ada jadwal yang terkait
            return redirect()->back()->with('error', 'Mata pelajaran ini tidak dapat dihapus karena terkait dengan jadwal kelas.');
        }

        // Hapus mata pelajaran
        $mataPelajaran->delete();

        return redirect()->route('admin.mataPelajaran.index')->with('success', 'Mata pelajaran berhasil dihapus.');
    }
}
