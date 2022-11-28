<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $req){
        $req->validate([
            'name'=>'required',
            'email'=>'required|unique:users,email',
            'password'=>'required|confirmed',
            'password_confirmation'=>'required'
        ]);


        User::Create([
            'username' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password),
            'cpassword' => Hash::make($req->password_confirmation)
        ]);

        return redirect()->route('LogIn');
    }

    public function login(Request $req){
        $req->validate([        
            'email'=>'required',
            'password'=>'required',
        ]);
        if(Auth::attempt($req->only('email','password'))){
            return redirect()->route('dashboard');
        }
        else{
            return back()->with('err','Login Failed!!!');
        }
    }
    public function logout(){
        auth()->logout();
        return redirect()->route('login');
    }
}
