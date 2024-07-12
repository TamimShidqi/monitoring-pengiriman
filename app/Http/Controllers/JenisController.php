<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (auth()->user()->role != 'admin') {
            return redirect('dashboard');
        }
        $jenis = Jenis::all();

        return view('jenis.index', compact('jenis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if (auth()->user()->role != 'admin') {
            return redirect('dashboard');
        }
        $jenis = Jenis::all();

        return view('jenis.create', compact('jenis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if (auth()->user()->role != 'admin') {
            return redirect('dashboard');
        }
        $request->validate([
            'nama' => 'required',
        ]);

        Jenis::create($request->all());

        return redirect()->route('jenis.index')
            ->with('success', 'Jenis Baru Berhasil Ditambah.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jenis $jenis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        if (auth()->user()->role != 'admin') {
            return redirect('dashboard');
        }
        $jenis = Jenis::find($id);
        return view('jenis.edit', compact('jenis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id, Jenis $jenis)
    {
        //
        if (auth()->user()->role != 'admin') {
            return redirect('dashboard');
        }

        $jenis = Jenis::find($id);
        $jenis->update($request->all());
        $jenis->save();

        return redirect('jenis')
            ->with('success', 'Jenis Berhasil Diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, Jenis $jenis)
    {
        //
        if (auth()->user()->role != 'admin') {
            return redirect('dashboard');
        }

        if ($jenis->pengiriman->count()) {
            return back()->with('error', 'Jenis ini memiliki pengiriman.');
        }

        $jenis= Jenis::find($id);
        $jenis->delete();

        return redirect()->route('jenis.index')
            ->with('success', 'Jenis Berhasil Dihapus.');
    }
}
