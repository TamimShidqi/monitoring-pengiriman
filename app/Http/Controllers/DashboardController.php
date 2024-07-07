<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\mobil;
use App\Models\pengiriman;
use App\Models\sopir;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'akun' => Akun::where('role', '!=', 'admin')->count(),
            'mobil' => Mobil::count(),
            'sopir' => Sopir::where('nama', '!=', 'admin')->count(),
            'pengiriman' => Pengiriman::count(),
            'pengirimanSopir' => Pengiriman::all()
        ];

        $graph = Pengiriman::select(
            DB::raw('MONTH(date_order) as bulan'),
            DB::raw('count(id) as total')
        )
            ->groupBy('bulan')
            ->get();

        foreach ($graph as $item) {
            $item->bulan = date('F', mktime(0, 0, 0, $item->bulan, 1));
        }

        $pengiriman = Pengiriman::where('status', '!=', 'arrived')->get();

        return view('Dashboard.index', compact('data', 'graph', 'pengiriman'));
    }
    }
