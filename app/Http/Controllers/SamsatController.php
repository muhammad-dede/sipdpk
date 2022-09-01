<?php

namespace App\Http\Controllers;

use App\Models\Samsat;
use Illuminate\Http\Request;

class SamsatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Samsat::all();
        return view('samsat.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('samsat.create');
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
            'uptd_gerai' => 'required|string|max:255',
            'wilayah' => 'required|string|max:255',
            'alamat' => 'required|string',
        ]);

        Samsat::create([
            'uptd_gerai' => strtoupper($request->uptd_gerai),
            'wilayah' => strtoupper($request->wilayah),
            'alamat' => strtoupper($request->alamat),
        ]);

        return redirect()->route('samsat.index')->with('success', __('Berhasil disimpan!'));
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
        $samsat = Samsat::findOrFail($id);

        if (!$samsat) {
            return abort('404');
        }

        return view('samsat.edit', compact('samsat'));
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
            'uptd_gerai' => 'required|string|max:255',
            'wilayah' => 'required|string|max:255',
            'alamat' => 'required|string',
        ]);

        $samsat = Samsat::findOrFail($id);

        if (!$samsat) {
            return abort('404');
        }

        $samsat->update([
            'uptd_gerai' => strtoupper($request->uptd_gerai),
            'wilayah' => strtoupper($request->wilayah),
            'alamat' => strtoupper($request->alamat),
        ]);

        return redirect()->route('samsat.index')->with('success', __('Berhasil disimpan!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $samsat = Samsat::findOrFail($id);

        if (!$samsat) {
            return abort('404');
        }

        $samsat->delete();

        return redirect()->route('samsat.index')->with('success', __('Berhasil dihapus!'));
    }
}
