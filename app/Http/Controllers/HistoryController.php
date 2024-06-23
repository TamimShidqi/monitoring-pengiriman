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

    public function downloadPdf()
    {
        $mpdf = new Mpdf();
        $history = pengiriman::where('status', 'arrived')->get();
        $mpdf->WriteHTML(view('history.pdf'));
        $mpdf->Output('download-pdf-.pdf', 'D');
    }

}
