<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login.index');
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $user = Akun::where(['email' => $email, 'password' => $password])->get();
        // dd($user);

        if (count($user) > 0) {
            Session::put("akun", $user);
            return redirect()->route("dashboard")->with("akun", $user)->with("success", "Selamat Datang di Dashboard");

        } else {
            // return redirect("login")->with('Password atau Username Salah', true);
            return back()->with('loginerror',true);
        }
    }
    public function logout()
    {
        Session::flush();
        return redirect('/');
    }
}
