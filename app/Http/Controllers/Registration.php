<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Registration extends Controller
{
    public function create(){
        return view('forms.registration');
    }
    public function store(){

//    dd(request()->all());
        $attributes = request()->validate([
            'name'=>['required','min:6'],
            'username'=>['required','max:255'],
            'email'=>['required','email','max:255','unique:users,email'],
            'password'=>['required','min:8','max:16']
        ]);

        $user = User::create($attributes);
        auth()->login($user);
        return redirect('/register');
    }
}
