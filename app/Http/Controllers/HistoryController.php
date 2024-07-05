<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\pengiriman;
use Illuminate\Http\Request;
use Mpdf\Mpdf;

class HistoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Pengiriman::where('status', 'arrived');

        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('date_order', [$request->start_date, $request->end_date]);
        }

        $history = $query->orderBy('updated_at', 'desc')->get();
        return view('history.index', compact('history'));
    }

    public function show()
    {
        $history = pengiriman::where('status', 'arrived')->get();
        return view("history.show", compact('history'));
    }
    public function download_pdf()
    {
        $mpdf = new \Mpdf\Mpdf();
        $history = pengiriman::where('status', 'arrived')->get();
        $mpdf->WriteHTML(view("history.show", ['history' => $history]));
        $mpdf->Output('download-history-pengiriman.pdf', 'I');
    }
}
