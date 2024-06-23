<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\mobil;
use App\Models\pengiriman;
use App\Models\sopir;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data['akun'] = Akun::count();
        $data['mobil'] = mobil::count();
        $data['sopir'] = sopir::count();
        $data['pengiriman'] = pengiriman::count();
        $akun = Akun::all();
        $mobil = mobil::all();
        $sopir = sopir::all();
        $pengiriman = pengiriman::where('status', '!=', 'arrived')->get();
        return view('Dashboard.index', compact('data', 'akun', 'mobil', 'sopir', 'pengiriman'));
    }
}
