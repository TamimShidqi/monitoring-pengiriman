<?php

namespace App\Http\Controllers;

use App\Models\mobil;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    public function index(request $request)
    {
        $mobil = mobil::all();
        return view('mobil.index', compact('mobil'));
    }

    public function create()
    {
        $mobil = mobil::all();
        return view('mobil.create', compact('mobil'));
    }

    public function store(request $request)
    {
        $mobil = new mobil();
        $mobil->nopol = $request->nopol;
        $mobil->merk = $request->merk;
        $mobil->status = $request->status;
        $mobil->kapasitas = $request->kapasitas;
        $mobil->masa_stnk = $request->masa_stnk;
        $mobil->save();
        return redirect('mobil')->with('success', "Data Berhasil Disimpan");
    }

    public function edit($id)
    {
        $mobil = mobil::find($id);
        return view('mobil.edit', compact('mobil'));
    }

    public function update(request $request, $id)
    {
        $mobil = mobil::find($id);
        $mobil->nopol = $request->nopol;
        $mobil->merk = $request->merk;
        $mobil->status = $request->status;
        $mobil->kapasitas = $request->kapasitas;
        $mobil->masa_stnk = $request->masa_stnk;
        $mobil->save();
        return redirect('mobil')->with('success', "Data Berhasil Diupdate");
    }

    public function destroy($id)
    {
        $mobil = mobil::find($id);
        $mobil->delete();
        return redirect('mobil')->with('success', "Data Berhasil Dihapus");
    }
}
