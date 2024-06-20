<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Display the login page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login.index');
    }

    /**
     * Handle login request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $email = $request->email;
        $password = $request->password;

        $user = Akun::where('email', $email)->first();

        if ($user && Hash::check($password, $user->password)) {
            Session::put('akun', $user);
            return redirect()->route('dashboard')->with('success', 'Selamat Datang di Dashboard');
        } else {
            return back()->with('loginerror', 'Password atau Username Salah');
        }
    }

    /**
     * Handle logout request.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Session::flush();
        return redirect('/');
    }
}
