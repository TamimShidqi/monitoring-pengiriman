<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\sopir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $akun=Akun::all();
        $sopir = sopir::all();
        return view('akun.index', compact('akun'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sopir = sopir::all();
        return view('akun.create', compact('sopir'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $akun = new Akun();
        $akun->email = $request->email;
        $akun->sopir_id = $request->sopir_id;
        $akun->email = $request->email;
        $akun->password = Hash::make($request->password);
        $akun->role = $request->role;
        $akun->save();
        return redirect('akun')->with('success', "Data Berhasil Disimpan");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Akun  $akun
     * @return \Illuminate\Http\Response
     */
    public function show(Akun $akun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Akun  $akun
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sopir = sopir::all();
        $akun = Akun::with('sopir')->find($id);
        return view('akun.edit', compact('akun','sopir'));

        // return view('akun.edit', ['akun' => $akun]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Akun  $akun
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = Akun::find($id);
        $model->sopir_id = $request->sopir_id;
        $model->email = $request->email;
        $newPassword = $request->password;
        if ($newPassword != null) {
            $model->password = Hash::make($newPassword);
        }
        $model->role = $request->role;
        $model->save();
        return redirect('akun')->with('success', "Data Berhasil Diupdate");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Akun  $akun
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Akun::find($id);
        $model->delete();
        return redirect('akun')->with('success', "Data Berhasil Dihapus");
    }
}
