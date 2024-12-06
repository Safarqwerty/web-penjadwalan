<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminPengajarController extends Controller
{
    public function index()
    {
        $pengajar = User::role('pengajar')->get(); // Asumsi role 'pengajar' sudah ada
        return view('admin.pengajar.index', compact('pengajar'));
    }

    public function create()
    {
        return view('admin.pengajar.create');
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
        $user->assignRole('pengajar'); // Berikan role 'pengajar'

        return redirect()->route('admin.pengajar.index')->with('success', 'Pengajar berhasil ditambahkan.');
    }

    public function show($id)
    {
        $pengajar = User::findOrFail($id);
        return view('admin.pengajar.show', compact('pengajar'));
    }

    public function edit($id)
    {
        $pengajar = User::findOrFail($id);
        return view('admin.pengajar.edit', compact('pengajar'));
    }

    public function update(Request $request, $id)
    {
        $pengajar = User::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:users,email,{$pengajar->id}",
        ]);

        $pengajar->update($request->all());
        return redirect()->route('admin.pengajar.index')->with('success', 'Pengajar berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pengajar = User::findOrFail($id);
        $pengajar->delete();

        return redirect()->route('admin.pengajar.index')->with('success', 'Pengajar berhasil dihapus.');
    }
}
