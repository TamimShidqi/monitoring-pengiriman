<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\mobil;
use App\Models\pengiriman;
use App\Models\sopir;
use Barryvdh\DomPDF\PDF;
use Mpdf\Mpdf;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    public function index()
    {
        $pengiriman = pengiriman::where('status', '!=', 'arrived')->get();
        $sopir = sopir::all();
        $mobil = mobil::all();
        return view('pengiriman.index', compact('pengiriman'));
    }

    public function create()
    {
        $sopir = sopir::where('status', 'ready')->get();
        $mobil = mobil::where('status', 'ready')->get();
        $pengiriman = pengiriman::all();
        return view('pengiriman.create', compact('pengiriman', 'sopir', 'mobil'));
    }

    public function store(Request $request)
    {
        $pengiriman = new pengiriman();
        $pengiriman->sopir_id = $request->sopir_id;
        $pengiriman->mobil_id = $request->mobil_id;
        $pengiriman->perusahaan = $request->perusahaan;
        $pengiriman->alamat = $request->alamat;
        $pengiriman->date_order = $request->date_order;
        $pengiriman->liter = $request->liter;
        $pengiriman->jarak = $request->jarak;
        $pengiriman->tarif = $request->tarif;
        $total = $request->liter * $request->jarak * $request->tarif;
        $pengiriman->total = $total;
        // if($request->file('foto')){
        //     $file = $request->file('foto');
        //     $nama_file = $pengiriman->nama.'.'.$file->getClientOriginalExtension();
        //     $file->move('a_fotos', $nama_file);
        //     $pengiriman->foto=$nama_file;

        //     File::delete('fotos', $pengiriman->foto);
        //     $pengiriman->foto=$nama_file;
        // }
        // $pengiriman->status = $request->status;

        $sopir = sopir::find($request->sopir_id);
        $sopir->status = 'delivery';
        $sopir->save();

        $mobil = mobil::find($request->mobil_id);
        $mobil->status = 'delivery';
        $mobil->save();
        $pengiriman->save();

        return redirect('pengiriman')->with('status', 'Data pengiriman berhasil ditambahkan!');
    }

    public function show($id)
    {
        $pengiriman = pengiriman::find($id);
        return view('pengiriman.show', compact('pengiriman'));
    }

    public function edit($id)
    {
        $sopir = sopir::all();
        $mobil = mobil::all();
        $pengiriman = Pengiriman::find($id);
        return view('pengiriman.edit', compact('pengiriman'));
    }

    public function update(Request $request, $id)
    {
        $pengiriman = pengiriman::find($id);
        // $pengiriman->sopir_id = $request->sopir_id;
        // $pengiriman->mobil_id = $request->mobil_id;
        // $pengiriman->perusahaan = $request->perusahaan;
        // $pengiriman->alamat = $request->alamat;
        // $pengiriman->date_order = $request->date_order;
        // $pengiriman->liter = $request->liter;
        // $pengiriman->jarak = $request->jarak;
        // $pengiriman->tarif = $request->tarif;
        // $total = $request->liter * $request->jarak * $request->tarif;
        // $pengiriman->total = $total;
        $pengiriman->status = $request->status;
        // $pengiriman->foto = $request->foto;

        $sopir = sopir::find($pengiriman->sopir_id);
        if ($request->status == 'arrived') {
            $sopir->status = 'ready';
        } else {
            $sopir->status = 'delivery';
        }
        $sopir->save();

        $mobil = mobil::find($pengiriman->mobil_id);
        if ($request->status == 'arrived') {
            $mobil->status = 'ready';
        } else {
            $mobil->status = 'delivery';
        }
        $mobil->save();

        if ($request->status == 'arrived') {
            $history = new History();
            $history->pengiriman_id = $pengiriman->id;
            $history->save();
        }
        $pengiriman->save();

        return redirect('pengiriman')->with('status', 'Data pengiriman berhasil diubah!');
    }

    // public function pickup($id)
    // {
    //     $pengiriman = pengiriman::find($id);
    //     $pengiriman->status = 'pickup';
    //     $pengiriman->save();

    //     $sopir = sopir::find($pengiriman->sopir_id);
    //     $sopir->status = 'ready';
    //     $sopir->save();

    //     $mobil = mobil::find($pengiriman->mobil_id);
    //     $mobil->status = 'ready';
    //     $mobil->save();

    //     return redirect('pengiriman')->with('status', 'Data pengiriman berhasil diambil!');
    // }

    // public function destroy($id)
    // {
    //     Pengiriman::destroy($id);
    //     return redirect('pengiriman')->with('status', 'Data pengiriman berhasil dihapus!');
    // }

    public function downloadPdf($id)
    {
        $pengiriman = pengiriman::find($id)->get();
        $mpdf = new Mpdf();
        $mpdf->WriteHTML(view('pengiriman.print', ['pengiriman' => $pengiriman]));
        $mpdf->Output('download-pdf-' . $pengiriman->id . '.pdf', 'D');
    }
}
