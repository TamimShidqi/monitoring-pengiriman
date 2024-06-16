<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data['akun'] = Akun::count();
        return view('Dashboard.index');
    }
}
