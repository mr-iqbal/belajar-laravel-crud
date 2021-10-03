<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index',[
            'title'     => 'Login',
            'active'    => 'login'
        ]);
    }


    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email'     => 'required|email',
            'password'  => 'required'
        ]);    

        //untuk mengecek apakah email dan password yang dimasukan sesuai atau tidak
        if(Auth::attempt($credentials)) {
            //apabila sesuai jalankan ini
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        //apabila tidak sesuai jalankan ini dan menampilkan pesan yang di tampilkan pada view
        return back()->with('loginError', 'Login Failed!');
    }

    public function logout(Request $request) 
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
