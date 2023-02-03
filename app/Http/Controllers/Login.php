<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class Login extends Controller
{
    public function create(){
        return view('forms.login');
    }

    public function store(){
        $attributes = request()->validate([
            'email'=> ['required','email'],
            'password'=>['required']
        ]);

        if(auth()->attempt($attributes)){
            session()->regenerate();
            return redirect('/')->with('success','you are logged in');
        }

        throw ValidationException::withMessages([
            'invalid'=>'invalid creditionals'
        ]);
        // return back()
        // ->withInput()
        // ->withErrors(['invalid'=>'invalid creditionals']);
    }

    
    public function destroy(){
        auth()->logout();
        return redirect('/')->with('success','you are logged out');
    }

}
