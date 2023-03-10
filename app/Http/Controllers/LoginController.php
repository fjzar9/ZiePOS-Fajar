<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {   
        return view('auth.login.index', [
            "title" => "Login"
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // if(Auth::user()->role == 'Owner') {
            //     return redirect()->route('O.home')->with('success', 'Berhasil Login!');
            // } else if (Auth::user()->role == 'Admin') {
            //     return redirect()->route('A.home')->with('success', 'Berhasil Login!');
            // } else if (Auth::user()->role == 'Kasir') {
            //     return redirect()->route('K.home')->with('success', 'Berhasil Login!');
            // }

            return redirect()->route('home')->with('success', 'Berhasil Login!');

        }
        
        return back()->withErrors('Username atau password salah!')->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login')->with('success', 'Berhasil Logout!');
    }
}
