<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CaptchaServiceController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function auth(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if(auth()->user()->role == "admin") {
                return redirect()->intended('/dashboard');
            } else {
                return redirect()->intended('/');
            }

        }

        Alert::error('Error', 'Login Failed!!');

        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
        //     return redirect()->intended('/dashboard');
        // }
        return back();
    }

    public function reloadCaptcha() {
        return response()->json(['captcha'=> captcha_img()]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
