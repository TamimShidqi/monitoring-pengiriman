<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\pengiriman;
use Illuminate\Http\Request;
use Mpdf\Mpdf;

class HistoryController extends Controller
{
    public function index()
    {
        $history = History::all();
        $history = pengiriman::where('status', 'arrived')->get();
        return view('history.index', compact('history'));
    }

    public function show()
    {
        $history = pengiriman::where('status', 'arrived')->get();
        return view('history.show', compact('history'));
    }
    public function downloadPdf()
    {
        $mpdf = new \Mpdf\Mpdf();
        $history = pengiriman::where('status', 'arrived')->get();
        $mpdf->WriteHTML(view('history.show', ['history' => $history]));
        $mpdf->Output('riwayat-pengiriman.pdf', 'D');
    }

}
