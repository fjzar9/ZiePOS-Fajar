<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $data['user'] = User::get();
        return view('profile.index', [
            "title" => "Profile"
        ])->with($data);
    }
}
