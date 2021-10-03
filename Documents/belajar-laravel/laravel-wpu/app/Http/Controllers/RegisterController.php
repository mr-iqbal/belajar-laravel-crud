<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index() {
        return view('register.index', [
            'title'   => 'Register Here',
            'active'  => 'register',
        ]);
    }

    public function store(Request $request) {

        //data validation
        $validatedData = $request->validate([
            'name'      => 'required|max:255',
            'username'  => 'required|min:3|max:255|unique:users',
            'email'     => 'required|unique:users|email:dns',
            'password'  => 'required|min:5|max:255'
        ]);
        
        //enkripsi password
        $validatedData['password'] = bcrypt($validatedData['password']);

        //mengirimkan data yang telah di masukan ke form register ke database
        User::create($validatedData);
        //redirect perintah untuk balik ke url yg di tuju  ; with perintah untuk mengirimkan pesan ke view
        return redirect('/login')->with('success','Registration successful! Please login to continue');
    }
}
