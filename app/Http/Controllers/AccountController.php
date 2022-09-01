<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function profile()
    {
        return view('account.profile');
    }

    public function setting()
    {
        return view('account.setting');
    }
}
