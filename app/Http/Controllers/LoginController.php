<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function proses_login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);


        $credential = $request->only('username', 'password');

        if (Auth::attempt($credential)) {
            return redirect()->intended('/tasks');
        }

        return redirect('login')
            ->withInput()
            ->with('error', 'username dan password salah');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();

        Auth::logout();
        return Redirect('login');
    }
}
