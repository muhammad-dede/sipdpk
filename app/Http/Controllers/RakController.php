<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use App\Models\Rak;
use Illuminate\Http\Request;

class RakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Rak::with(['lokasi'])->get();
        return view('rak.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_lokasi = Lokasi::all();
        return view('rak.create', compact('data_lokasi'));
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
            'no' => 'required|string|max:12',
            'box' => 'required|string|max:12',
            'baris' => 'required|string|max:12',
            'id_lokasi' => 'required|string',
        ]);

        $lokasi = Lokasi::findOrFail($request->id_lokasi);

        Rak::create([
            'kode' => strtoupper($lokasi->kode . $request->no . $request->box . $request->baris),
            'no' => strtoupper($request->no),
            'box' => strtoupper($request->box),
            'baris' => strtoupper($request->baris),
            'id_lokasi' => $request->id_lokasi,
        ]);

        return redirect()->route('rak.index')->with('success', __('Berhasil disimpan!'));
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
        $rak = Rak::findOrFail($id);
        if (!$rak) {
            return abort('404');
        }

        $data_lokasi = Lokasi::all();

        return view('rak.edit', compact('rak', 'data_lokasi'));
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
            'no' => 'required|string|max:12',
            'box' => 'required|string|max:12',
            'baris' => 'required|string|max:12',
            'id_lokasi' => 'required|string',
        ]);

        $rak = Rak::findOrFail($id);
        if (!$rak) {
            return abort('404');
        }

        $lokasi = Lokasi::findOrFail($request->id_lokasi);

        $rak->update([
            'kode' => strtoupper($lokasi->kode . $request->no . $request->box . $request->baris),
            'no' => strtoupper($request->no),
            'box' => strtoupper($request->box),
            'baris' => strtoupper($request->baris),
            'id_lokasi' => $request->id_lokasi,
        ]);

        return redirect()->route('rak.index')->with('success', __('Berhasil disimpan!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rak = Rak::findOrFail($id);
        if (!$rak) {
            return abort('404');
        }

        $rak->delete();

        return redirect()->route('rak.index')->with('success', __('Berhasil dihapus!'));
    }
}
