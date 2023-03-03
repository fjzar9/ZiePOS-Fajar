<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        // if($user = Auth::user()) {
        //     switch ($user->level) {
        //         case 'Owner':
        //             return redirect()->intended('pembelian')->with('success', 'Berhasil Login!');
        //             break;
        //         case 'Admin':
        //             return redirect()->intended('barang')->with('success', 'Berhasil Login!');
        //             break;
        //         case 'Kasir':
        //             return redirect()->intended('Penjualan')->with('success', 'Berhasil Login!');
        //             break;
        //     }
        // }
        
        return view('auth.login.index', [
            "title" => "Login"
        ]);
    }

    // public function authenticate(AuthRequest $request) {
    //     $credentials = $request->only('username', 'password');
    //     $request->session()->regenerate();
    //     if(Auth::attempt($credentials)) {
    //         $user = Auth::user();
    //         switch ($user->level) {
    //             case 'Owner':
    //                 return redirect()->intended('pembelian')->with('success', 'Berhasil Login!');
    //                 break;
    //             case 'Admin':
    //                 return redirect()->intended('barang')->with('success', 'Berhasil Login!');
    //                 break;
    //             case 'Kasir':
    //                 return redirect()->intended('Penjualan')->with('success', 'Berhasil Login!');
    //                 break;
    //         }
    //     }

    //     return back()->withErrors([
    //         'notfound' => 'Username atau password salah'
    //     ])->onlyInput('username');
    // }

    public function authenticate(AuthRequest $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('home')->with('success', 'Berhasil Login!');
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
