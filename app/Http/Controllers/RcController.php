<?php

namespace App\Http\Controllers;

use App\Imports\RcImport;
use App\Models\Rc;
use App\Models\Stnk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;

class RcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Rc::orderBy('id', 'desc')->get();
        return view('rc.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_stnk = Stnk::all();
        return view('rc.create', compact('data_stnk'));
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
            'id_stnk' => 'required|string',
            'tgl_akhir_pkb' => 'required|date',
        ]);

        Rc::create([
            'id_stnk' => $request->id_stnk,
            'tgl_akhir_pkb' => $request->tgl_akhir_pkb,
        ]);

        return redirect()->route('rc.index')->with('success', __('Berhasil disimpan!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rc = Rc::findOrFail($id);
        if (!$rc) {
            return abort('404');
        }

        $data_stnk = Stnk::all();

        return view('rc.edit', compact('rc', 'data_stnk'));
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
            'id_stnk' => 'required|string',
            'tgl_akhir_pkb' => 'required|date',
        ]);

        $rc = Rc::findOrFail($id);
        if (!$rc) {
            return abort('404');
        }

        $rc->update([
            'id_stnk' => $request->id_stnk,
            'tgl_akhir_pkb' => $request->tgl_akhir_pkb,
        ]);

        return redirect()->route('rc.index')->with('success', __('Berhasil disimpan!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rc = Rc::findOrFail($id);
        if (!$rc) {
            return abort('404');
        }

        $rc->delete();

        return redirect()->route('rc.index')->with('success', __('Berhasil dihapus!'));
    }

    public function downloadTemplateExcel()
    {
        $fileName = 'template-record-centre.xlsx';
        $path = public_path('unduh/' . $fileName);

        return Response::download($path, $fileName, ['Content-Type: application/xlsx']);
    }

    public function importExcel(Request $request)
    {
        Excel::import(new RcImport(), $request->file('excel_file'));

        return redirect()->back()->with('success', __('Berhasil disimpan!'));
    }
}
