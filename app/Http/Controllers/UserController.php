<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['user'] = User::where('id', auth()->user()->id)->get();
        // return $data;
        return view('profile.index', [
            "title" => "Profile"
        ])->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $id;
        // return $request->jenis_kelamin;
        // $request['jenis_kelamin'] = $request->jenis_kelamin;
        User::find($id)->update($request->all());
        // $user->update($request->all());
        return redirect('profile')->with('success', 'Data profile berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function editPassword(Request $request)
    {
        // return $request;

        $request->validate([
            'password' => 'required',
            'new_password' => 'required|confirmed',
            'new_password_confirmation' => 'required'
        ],
        [
            'password.required' => 'Password lama belum diisi!',
            'new_password.required' => 'Password baru belum diisi!',
            'new_password.confirmed' => 'Password baru tidak sama!',
            'new_password_confirmation.required' => 'Konfirmasi password baru belum diisi!'
        ]);

        if(Hash::check($request->password, auth()->user()->password) == true) {
            User::where('id', auth()->user()->id)->update([
                'password' => bcrypt($request->new_password)
            ]);
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            // return redirect('/login')->with('success', 'Password Berhasil Diubah');
            return redirect()->route('login')->with(['success' => 'Password berhasil diubah!']);
        } else {
            return back()->with(['error' => 'Password lama salah!']);
        }

    }
}
