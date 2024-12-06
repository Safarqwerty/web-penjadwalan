<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminSiswaController extends Controller
{
    public function index()
    {
        $siswa = User::role('siswa')->get(); // Asumsi role 'siswa' sudah ada
        return view('admin.siswa.index', compact('siswa'));
    }

    public function create()
    {
        return view('admin.siswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $user->assignRole('siswa'); // Berikan role 'siswa'

        return redirect()->route('admin.siswa.index')->with('success', 'Siswa berhasil ditambahkan.');
    }

    public function show($id)
    {
        $siswa = User::findOrFail($id);
        return view('admin.siswa.show', compact('siswa'));
    }

    public function edit($id)
    {
        $siswa = User::findOrFail($id);
        return view('admin.siswa.edit', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $siswa = User::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:users,email,{$siswa->id}",
        ]);

        $siswa->update($request->all());
        return redirect()->route('admin.siswa.index')->with('success', 'Siswa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $siswa = User::findOrFail($id);
        $siswa->delete();

        return redirect()->route('admin.siswa.index')->with('success', 'Siswa berhasil dihapus.');
    }
}
