<?php

namespace App\Http\Controllers;

use App\Models\Dpa;
use App\Models\Rak;
use App\Models\Rc;
use Illuminate\Http\Request;

class DpaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Dpa::all();
        return view('dpa.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_rc = Rc::whereDoesntHave('dpa')->get();
        $data_rak = Rak::all();
        return view('dpa.create', compact('data_rc', 'data_rak'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->has('id_rak')) {
            foreach ($request->input('id_rak') as $key => $rak) {
                if ($rak !== null) {
                    Dpa::create([
                        'id_rc' => $request->input('id_rc')[$key],
                        'id_stnk' => $request->input('id_stnk')[$key],
                        'tgl_dpa' => now(),
                        'id_rak' => $rak,
                    ]);
                }
            }
            return redirect()->route('dpa.index')->with('success', __('Berhasil disimpan'));
        }

        return redirect()->route('dpa.index')->with('success', __('Tidak ada Data yang disimpan'));
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
        return abort('404');
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
        return abort('404');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dpa = Dpa::findOrFail($id);
        $dpa->delete();

        return redirect()->route('dpa.index')->with('success', __('Berhasil dihapus!'));
    }
}
