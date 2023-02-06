<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $req)
    {
        // validation code
        $req->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $req->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('dashboard');
        }
        return redirect("login")->withError('Login details are not valid');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }
}
