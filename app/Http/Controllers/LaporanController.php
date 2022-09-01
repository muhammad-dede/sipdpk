<?php

namespace App\Http\Controllers;

use App\Models\Dpa;
use App\Models\Rak;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $start_date = "";
        $end_date = "";
        $rak = "";

        $data = Dpa::orderBy('tgl_dpa', 'desc');

        if ($request->get('start_date')) {
            $start_date = $request->get('start_date');
            $data->where('tgl_dpa', '>=', Carbon::createFromFormat('Y-m-d', $request->get('start_date')));
        }

        if ($request->get('end_date')) {
            $end_date = $request->get('end_date');
            $data->where('tgl_dpa', '<=', Carbon::createFromFormat('Y-m-d', $request->get('end_date')));
        }

        if ($request->get('rak')) {
            $rak = $request->get('rak');
            $data->where('id_rak', $rak);
        }

        $data_rak = Rak::all();
        $data = $data->get();

        return view('laporan.index', compact('data', 'data_rak', 'start_date', 'end_date', 'rak'));
    }

    public function cetak(Request $request)
    {
        $start_date = "";
        $end_date = "";
        $rak = "";

        $data_dpa = Dpa::orderBy('tgl_dpa', 'desc');

        if ($request->get('start_date')) {
            $data_dpa->where('tgl_dpa', '>=', Carbon::createFromFormat('Y-m-d', $request->get('start_date')));
        }

        if ($request->get('end_date')) {
            $data_dpa->where('tgl_dpa', '<=', Carbon::createFromFormat('Y-m-d', $request->get('end_date')));
        }

        if ($request->get('rak')) {
            $data_dpa->where('id_rak', $request->get('rak'));
        }

        $data = $data_dpa->get();

        $pdf = PDF::loadView('laporan.cetak', ['data' => $data])->setPaper('a4', 'landscape')->setWarnings(false);
        return $pdf->stream();
    }
}
