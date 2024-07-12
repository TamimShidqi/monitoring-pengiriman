<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Jenis;
use App\Models\mobil;
use App\Models\pengiriman;
use App\Models\sopir;
use Carbon\Carbon;
use Mpdf\Mpdf;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengirimanController extends Controller
{
    public function index()
    {
        $pengiriman = Pengiriman::whereNotIn('status', ['arrived'])
            ->orWhere(function ($query) {
                $query->where('status', 'arrived')
                    ->whereDate('updated_at', '>=', Carbon::now()->subDays(1)); // Perbaiki kondisi tanggal
            })
            ->orderBy('status', 'desc')
            ->get();

        $sopir = Sopir::all();
        $mobil = Mobil::all();

        return view('pengiriman.index', compact('pengiriman', 'sopir', 'mobil'));
    }

    public function create()
    {
        if (auth()->user()->role != 'admin') {
            return redirect('pengiriman')->with('error', 'Anda tidak memiliki akses!');
        }
        $sopir = Sopir::where('status', 'ready')
            ->whereNotIn('nama', ['admin'])
            ->get();
        $mobil = mobil::where('status', 'ready')->get();
        $jenis = Jenis::all();
        $pengiriman = pengiriman::all();
        return view('pengiriman.create', compact('pengiriman', 'sopir', 'mobil', 'jenis'));
    }

    public function store(Request $request)
    {
        if (auth()->user()->role != 'admin') {
            return redirect('pengiriman')->with('error', 'Anda tidak memiliki akses!');
        }
        $pengiriman = new pengiriman();
        $pengiriman->sopir_id = $request->sopir_id;
        $pengiriman->mobil_id = $request->mobil_id;
        $pengiriman->perusahaan = $request->perusahaan;
        $pengiriman->alamat = $request->alamat;
        $pengiriman->date_order = $request->date_order;
        $pengiriman->jenis_id = $request->jenis_id;
        $pengiriman->liter = $request->liter;
        $pengiriman->jarak = $request->jarak;
        $pengiriman->tarif = $request->tarif;
        $mobil = Mobil::find($request->mobil_id);

        $kapasitas = $mobil->kapasitas;

        if ($kapasitas == 8000) {
            $kapasitas = 8;
        }
        if ($kapasitas == 16000) {
            $kapasitas = 10;
        }

        $jarak = $request->jarak;
        $tarif = $request->tarif;

        $total = $kapasitas * $jarak * $tarif;
        $pengiriman->total = $total;

        $sopir = sopir::find($request->sopir_id);
        $sopir->status = 'delivery';
        $sopir->save();

        $mobil = mobil::find($request->mobil_id);
        $mobil->status = 'delivery';
        $mobil->save();
        $pengiriman->save();

        return redirect('pengiriman')->with('success', 'Data pengiriman berhasil ditambahkan!');
    }

    public function show($id)
    {
        $pengiriman = pengiriman::find($id);
        return view('pengiriman.show', compact('pengiriman'));
    }

    public function edit($id)
    {
        if (auth()->user()->role != 'sopir') {
            return redirect('pengiriman')->with('error', 'Anda tidak memiliki akses!');
        }
        $sopir = sopir::all();
        $mobil = mobil::all();
        $pengiriman = Pengiriman::find($id);
        return view('pengiriman.edit', compact('pengiriman'));
    }

    public function update(Request $request, $id)
    {
        if (auth()->user()->role != 'sopir') {
            return redirect('pengiriman')->with('error', 'Anda tidak memiliki akses!');
        }
        $request->validate([
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $pengiriman = pengiriman::find($id);

        $pengiriman->sopir_id = $request->sopir_id;
        $pengiriman->mobil_id = $request->mobil_id;
        $pengiriman->perusahaan = $request->perusahaan;
        $pengiriman->alamat = $request->alamat;
        $pengiriman->date_order = $request->date_order;
        $pengiriman->jenis_id = $request->jenis_id;
        $pengiriman->liter = $request->liter;
        $pengiriman->jarak = $request->jarak;
        $pengiriman->tarif = $request->tarif;
        $pengiriman->status = $request->status;

        if ($request->hasFile('foto')) {
            if ($pengiriman->foto) {
                Storage::delete($pengiriman->foto);
            }

            $imageName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('fotos'), $imageName);
            $pengiriman->foto = $imageName;
        }

        $pengiriman->total = $request->liter * $request->jarak * $request->tarif;

        $pengiriman->save();

        $sopir = sopir::find($pengiriman->sopir_id);
        $mobil = mobil::find($pengiriman->mobil_id);

        if ($request->status == 'arrived') {
            $sopir->status = 'ready';
            $mobil->status = 'ready';
        } else {
            $sopir->status = 'delivery';
            $mobil->status = 'delivery';
        }
        $sopir->save();
        $mobil->save();

        if ($request->status == 'arrived') {
            $history = new History();
            $history->pengiriman_id = $pengiriman->id;
            $history->save();
        }

        return redirect('pengiriman')->with('success', 'Status pengiriman berhasil diubah!');
    }

    public function downloadPdf($id)
    {
        if (auth()->user()->role != 'admin') {
            return redirect('pengiriman')->with('error', 'Anda tidak memiliki akses!');
        }
        $mpdf = new \Mpdf\Mpdf();
        $pengiriman = pengiriman::find($id);
        $mpdf->WriteHTML(view('pengiriman.show', ['pengiriman' => $pengiriman]));
        $mpdf->Output('surat-jalan.pdf', 'I');
    }

    public function destroy($id)
    {
        if (auth()->user()->role != 'admin') {
            return redirect('pengiriman')->with('error', 'Anda tidak memiliki akses!');
        }
        $pengiriman = pengiriman::find($id);
        $sopir = sopir::find($pengiriman->sopir_id);
        $mobil = mobil::find($pengiriman->mobil_id);

        $sopir->status = 'ready';
        $mobil->status = 'ready';
        $sopir->save();
        $mobil->save();
        $pengiriman->delete();

        return redirect('pengiriman')->with('success', 'Data pengiriman berhasil dihapus!');
    }
}
