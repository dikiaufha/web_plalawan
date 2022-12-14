<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaptchaServiceController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function auth(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
            'captcha' => 'required|captcha'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return back();
    }

    public function reloadCaptcha() {
        return response()->json(['captcha'=> captcha_img()]);
    }
}
