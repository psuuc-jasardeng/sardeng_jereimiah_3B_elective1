<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;



class RegisterController
{
    public function showRegistrationForm(){
        return view('auth.register');
    }

    public function register(Request $request){
    
        $validator = Validator::make($request ->all(),
        [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);


        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        DB::table('users')-> insert([
            'name'=>$request-> name,
            'email'=>$request-> email,
            'password' => Hash::make($request->password),
            'created_at'=> now(),
            'updated_at'=>now(),
        ]);

        return redirect()-> route("login")->with('success', 'Registration Successful! You Can now login' );

    }
}
