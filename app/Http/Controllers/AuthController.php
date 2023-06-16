<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function viewRegister()
    {
        return view('auth.register');
    }

    public function viewLogin() {
        return view('auth.login');
    }

    public function register (Request $request) 
    {
        $password = $request->password;
        $confirmPw = $request->confirm_pw;
        $email = $request->email;
        $name = $request->name;

        if($password != $confirmPw) {
            return view('auth.register', ['message'=>'Confirm password incorrect! Please enter again']);
        }
        
        $data = [
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password)
        ];
        $user = User::create($data);
        return view('auth.register', ['message'=>'Created user!']);
    }

    public function login(Request $request) {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
         if (Auth::attempt($data)) {
            return redirect()->route('admin.dashboard')->with('message', 'Login success');
         }
         return view('auth.login', ['message'=> 'Incorrect! Please login again']);
    }
}
