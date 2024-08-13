<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateController extends Controller
{
    public function login()
    {
        // dd(User::all());
        return view('auth.login');

    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if (Auth::attempt($request->only('email', 'password'))) {
            // session()->regenerate();

            return redirect('/');
        }

        // dd(Auth::user());
    }
}
