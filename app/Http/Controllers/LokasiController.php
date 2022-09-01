<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Lokasi::all();
        return view('lokasi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lokasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:12',
            'nama' => 'required|string|max:255',
        ]);

        Lokasi::create([
            'kode' => strtoupper($request->kode),
            'nama' => strtoupper($request->nama),
        ]);

        return redirect()->route('lokasi.index')->with('success', __('Berhasil disimpan!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort('404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lokasi = Lokasi::findOrFail($id);
        if (!$lokasi) {
            return abort('404');
        }
        return view('lokasi.edit', compact('lokasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required|string|max:12',
            'nama' => 'required|string|max:255',
        ]);

        $lokasi = Lokasi::findOrFail($id);
        if (!$lokasi) {
            return abort('404');
        }

        $lokasi->update([
            'kode' => strtoupper($request->kode),
            'nama' => strtoupper($request->nama),
        ]);

        return redirect()->route('lokasi.index')->with('success', __('Berhasil disimpan!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lokasi = Lokasi::findOrFail($id);
        if (!$lokasi) {
            return abort('404');
        }

        $lokasi->delete();

        return redirect()->route('lokasi.index')->with('success', __('Berhasil dihapus!'));
    }
}
