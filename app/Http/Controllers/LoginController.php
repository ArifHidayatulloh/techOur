<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    

    public function login()
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'user') {
                Auth::logout();
                return redirect('/')->with('error','email atau password salah');

            }
            else{
                return redirect('home');
            }
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
            if (Auth::user()->role != 'user') {
                $user = Auth::user();
                $user->last_login = now();
                $user->save();
                return redirect('home');
            } else{
                return back()->with('error','email atau password salah');    
            }
        }
        else{
            return back()->with('error','email atau password salah');
        }

    }

    public function actionlogout(Request $request)
    {
        
        $user = $request->user();
        $user->last_logout = now();
        $user->save();
        Auth::logout();
        return redirect('/');
    }
}