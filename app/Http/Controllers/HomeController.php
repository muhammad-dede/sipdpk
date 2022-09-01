<?php

namespace App\Http\Controllers;

use App\Models\Dpa;
use App\Models\Rc;
use App\Models\Samsat;
use App\Models\Stnk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard()
    {
        $data_dpa = Dpa::all();
        $data_rc = Rc::all();
        $data_samsat = Samsat::all();
        $data_stnk = Stnk::all();
        return view('home.dasboard', compact('data_dpa', 'data_rc', 'data_samsat', 'data_stnk'));
    }
}
