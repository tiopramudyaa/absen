<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthenticationController extends Controller
{
    //
    public function login()
    {
        if (Auth::check()) {
            // Arahkan pengguna ke halaman dashboard jika sudah login
            return redirect('/dashboard');
        }
        return view('admin/loginView');
    }

    public function loginAction(Request $request)
    {
        $loginData = $request->all();

        $validate = Validator::make($loginData, [
            'email' => 'required|email:rfc',
            'password' => 'required'
        ]);

        if ($validate->fails()) {
            Session::flash('error', $validate->errors());
            return back();
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            return redirect('dashboard');
        }
        Session::flash('error', 'Email atau password salah.');
        return back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
