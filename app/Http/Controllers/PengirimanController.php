<?php

namespace App\Http\Controllers;

use App\Models\mobil;
use App\Models\pengiriman;
use App\Models\sopir;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    public function index()
    {
        $pengiriman = pengiriman::all();
        $sopir = sopir::all();
        $mobil = mobil::all();
        return view('pengiriman.index', compact('pengiriman'));
    }

    public function create()
    {
        $sopir = sopir::where('status', 'ready')->get();
        $mobil = mobil::where('status', 'ready')->get();
        $pengiriman = pengiriman::all();
        return view('pengiriman.create', compact('pengiriman'));
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
        // $pengiriman->total = $request->liter * $request->jarak * $request->tarif;
        // $pengiriman->status = $request->status;

        $pengiriman->save();

        // $request->validate([
        //     'sopir_id' => 'required',
        //     'mobil_id' => 'required',
        //     'perusahaan' => 'required',
        //     'alamat' => 'required',
        //     'date_order' => 'required',
        //     'liter' => 'required',
        //     'jarak' => 'required',
        //     'tarif' => 'required',
        //     'total' => 'required',
        //     'status' => 'required',
        // ]);

        // Pengiriman::find($id)->update($request->all());

        return redirect('pengiriman')->with('status', 'Data pengiriman berhasil diubah!');
    }

    public function destroy($id)
    {
        Pengiriman::destroy($id);
        return redirect('pengiriman')->with('status', 'Data pengiriman berhasil dihapus!');
    }

    public function cetakpdf()
    {
    	$pengiriman = pengiriman::all();

    	$pdf = PDF::loadview('pengiriman_pdf',['pengiriman'=>$pengiriman]);
    	return $pdf->download('laporan-pengiriman-pdf');
    }
}
