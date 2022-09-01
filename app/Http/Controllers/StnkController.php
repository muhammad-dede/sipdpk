<?php

namespace App\Http\Controllers;

use App\Models\Samsat;
use App\Models\Stnk;
use Illuminate\Http\Request;

class StnkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Stnk::with('samsat')->get();
        return view('stnk.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_samsat = Samsat::all();
        return view('stnk.create', compact('data_samsat'));
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
            'nopol' => 'required|alpha_num|max:12',
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'tgl_awal_pkb' => 'required|date',
            'id_samsat' => 'required|string',
        ]);

        Stnk::create([
            'nopol' => strtoupper(str_replace(' ', '', $request->nopol)),
            'nama' => strtoupper($request->nama),
            'alamat' => strtoupper($request->alamat),
            'tgl_awal_pkb' => $request->tgl_awal_pkb,
            'id_samsat' => $request->id_samsat,
        ]);

        return redirect()->route('stnk.index')->with('success', __('Berhasil disimpan!'));
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
        $data_samsat = Samsat::all();
        $stnk = Stnk::findOrFail($id);
        if (!$stnk) {
            return abort('404');
        }
        return view('stnk.edit', compact('data_samsat', 'stnk'));
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
            'nopol' => 'required|alpha_num|max:12',
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'tgl_awal_pkb' => 'required|date',
            'id_samsat' => 'required|string',
        ]);

        $stnk = Stnk::findOrFail($id);

        if (!$stnk) {
            return abort('404');
        }

        $stnk->update([
            'nopol' => strtoupper(str_replace(' ', '', $request->nopol)),
            'nama' => strtoupper($request->nama),
            'alamat' => strtoupper($request->alamat),
            'tgl_awal_pkb' => $request->tgl_awal_pkb,
            'id_samsat' => $request->id_samsat,
        ]);

        return redirect()->route('stnk.index')->with('success', __('Berhasil disimpan!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stnk = Stnk::findOrFail($id);

        if (!$stnk) {
            return abort('404');
        }

        $stnk->delete();

        return redirect()->route('stnk.index')->with('success', __('Berhasil dihapus!'));
    }
}
