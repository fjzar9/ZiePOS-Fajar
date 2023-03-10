<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register.index', [
            "title" => "Register"
        ]);
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email:dns|unique:users',
            'no_telp' => 'required|unique:users',
            'alamat' => 'required',
            'password' => 'required'
        ],
        [
            'name.required' => 'Nama lengkap belum diisi!',
            'username.required' => 'Username belum diisi!',
            'username.unique' => 'Username sudah ada!',
            'email.required' => 'Email belum diisi!',
            'email.unique' => 'Email sudah ada!',
            'alamat.required' => 'Alamat belum diisi!',
            'no_telp.required' => 'No telp belum diisi!',
            'no_telp.unique' => 'No telp sudah ada!',
            'password.required' => 'Password belum diisi!',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('login')->with('success', 'Registrasi berhasil!');
    }
}
