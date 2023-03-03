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
            'name' => 'required|max:100',
            'username' => 'required|min:3|max:50|unique:users',
            'email' => 'required|email:dns',
            'no_telp' => 'required|max:20',
            'alamat' => 'required|max:100',
            'password' => 'required|min:5|max:50'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('login')->with('success', 'Registrasi berhasil!');
    }

    public function update($request, User $user)
    {
        $user->update($request->all());
        return redirect('profile')->with('success', 'Data satuan berhasil diupdate!');
    }
}
