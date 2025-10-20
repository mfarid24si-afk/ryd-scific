<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController
{
    public function index()
    {
        $data['dataUser'] = User::all(); // Ganti Pelanggan menjadi User
        return view('admin.user.index', $data);
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Simpan data dengan field yang benar
        User::create([
            'name' => $request->name, // Sesuaikan dengan form HTML
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user.create')->with('success', 'Penambahan Data Berhasil!');
    }
}