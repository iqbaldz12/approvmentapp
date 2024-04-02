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
<<<<<<< HEAD
            return redirect()->intended('/tasks');
=======
<<<<<<< HEAD
            return redirect()->intended('/tasks');
=======
            return redirect()->intended('/');
>>>>>>> 5a59e6c4d843fc0ba5b4d569831e8e3ed33330a1
>>>>>>> 8c8decbd13737634609000997c3c5fddf960d7c8
        }

        return redirect('login')
            ->withInput()
<<<<<<< HEAD
            ->with('error', 'username dan password salah');
=======
            ->withErrors(['login_gagal' => 'username dan password salah']);
>>>>>>> 8c8decbd13737634609000997c3c5fddf960d7c8
    }

    public function logout(Request $request)
    {
        $request->session()->flush();

        Auth::logout();
        return Redirect('login');
    }
}
