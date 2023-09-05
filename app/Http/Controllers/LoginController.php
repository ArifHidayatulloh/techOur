<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    

    public function login()
    {
        if (Auth::check()) {
            return redirect('home');
        } else {
            return view('login');
        }
    }

    public function actionlogin(Request $request)
    {
        $data = array(
            'email' => $request->email,
            'password' => $request->password
        );
        
        if (Auth::attempt($data)) {
            return redirect('home');
        }
        else{
            return back()->with('error','email atau password salah');
        }

    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }
}