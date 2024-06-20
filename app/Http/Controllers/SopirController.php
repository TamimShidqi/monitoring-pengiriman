<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\sopir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SopirController extends Controller
{
    public function index(Request $request)
    {
        $sopir = sopir::all();
        $akun = Akun::all();
        return view('sopir.index', compact('sopir'));
    }

    public function edit($id)
    {
        $sopir = sopir::with('sopir')->find($id);
        return view('sopir.edit', compact('sopir'));
    }

    public function create()
    {
        $sopir = sopir::all();
        $akun = Akun::all();
        return view('sopir.create', compact('sopir'));
    }

    public function store(Request $request)
    {
        $sopir = new sopir();
        $sopir->id = $request->id;
        $sopir->nama = $request->nama;
        $sopir->nik = $request->nik;
        $sopir->tgl_lahir = $request->tgl_lahir;
        $sopir->alamat = $request->alamat;
        $sopir->email = $request->email;
        $sopir->no_hp = $request->no_hp;
        $sopir->masa_sim = $request->masa_sim;


        $sopir->save();

        $akun = new Akun();
        $akun->email = $sopir->email;
        $akun->sopir_id = $sopir->id;
        $akun->email = $sopir->email;
        $password = str_replace('-', '', $sopir->tgl_lahir);
        $akun->password = Hash::make($password);
        $akun->save();



        return redirect('sopir')->with('success', "Data Berhasil Disimpan");

    }

    public function update(Request $request, $id)
    {
        $sopir = sopir::find($id);
        $sopir->id = $request->id;
        $sopir->nama = $request->nama;
        $sopir->nik = $request->nik;
        $sopir->tgl_lahir = $request->tgl_lahir;
        $sopir->alamat = $request->alamat;
        $sopir->email = $request->email;
        $sopir->no_hp = $request->no_hp;
        $sopir->masa_sim = $request->masa_sim;
        $sopir->save();

        $akun = Akun::where('sopir_id', $sopir->id)->first();
        $akun->email = $sopir->email;
        
        $akun->save();
        return redirect('sopir')->with('success', "Data Berhasil Diupdate");
    }

    public function destroy($id)
    {
        $sopir = sopir::find($id);
        $sopir->delete();
        return redirect('sopir')->with('success', "Data Berhasil Dihapus");
    }
}
