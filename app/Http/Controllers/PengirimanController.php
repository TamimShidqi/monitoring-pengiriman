<?php

namespace App\Http\Controllers;

use App\Models\History;
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

        // Ambil data sopir dan mobil
        $sopir = Sopir::all();
        $mobil = Mobil::all();

        // Kirim data ke view
        return view('pengiriman.index', compact('pengiriman', 'sopir', 'mobil'));
    }

    public function create()
    {
        $sopir = Sopir::where('status', 'ready')
            ->whereNotIn('nama', ['admin'])
            ->get();
        $mobil = mobil::where('status', 'ready')->get();
        $pengiriman = pengiriman::all();
        return view('pengiriman.create', compact('pengiriman', 'sopir', 'mobil'));
    }

    public function store(Request $request)
    {
        if(!auth()->user()->hasRole('sopir')) {
            return redirect('pengiriman')->with('status', 'Anda tidak memiliki akses!');
        }

        $pengiriman = new pengiriman();
        $pengiriman->sopir_id = $request->sopir_id;
        $pengiriman->mobil_id = $request->mobil_id;
        $pengiriman->perusahaan = $request->perusahaan;
        $pengiriman->alamat = $request->alamat;
        $pengiriman->date_order = $request->date_order;
        $pengiriman->jenis = $request->jenis;
        $pengiriman->liter = $request->liter;
        $pengiriman->jarak = $request->jarak;
        $pengiriman->tarif = $request->tarif;
        $total = $request->liter * $request->jarak * $request->tarif;
        $pengiriman->total = $total;

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
        $request->validate([
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $pengiriman = pengiriman::find($id);

        // Update data pengiriman (kecuali foto)
        $pengiriman->sopir_id = $request->sopir_id;
        $pengiriman->mobil_id = $request->mobil_id;
        $pengiriman->perusahaan = $request->perusahaan;
        $pengiriman->alamat = $request->alamat;
        $pengiriman->date_order = $request->date_order;
        $pengiriman->jenis = $request->jenis;
        $pengiriman->liter = $request->liter;
        $pengiriman->jarak = $request->jarak;
        $pengiriman->tarif = $request->tarif;
        $pengiriman->status = $request->status;

        // Handle foto jika ada
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($pengiriman->foto) {
                Storage::delete($pengiriman->foto);
            }

            // Simpan foto baru
            $imageName = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('fotos'), $imageName);
                $pengiriman->foto = $imageName;
        }

        // Hitung total hanya sekali
        $pengiriman->total = $request->liter * $request->jarak * $request->tarif;

        // Simpan perubahan
        $pengiriman->save();

        // Update status sopir dan mobil
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

        // Buat history jika status 'arrived'
        if ($request->status == 'arrived') {
            $history = new History();
            $history->pengiriman_id = $pengiriman->id;
            $history->save();
        }

        return redirect('pengiriman')->with('status', 'Data pengiriman berhasil diubah!');
    }

    public function downloadPdf($id)
    {
        $mpdf = new \Mpdf\Mpdf();
        $pengiriman = pengiriman::find($id);
        $mpdf->WriteHTML(view('pengiriman.show', ['pengiriman' => $pengiriman]));
        $mpdf->Output('surat-jalan.pdf', 'I');
    }
}
