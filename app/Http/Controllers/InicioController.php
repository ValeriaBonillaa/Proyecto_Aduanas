<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;


class InicioController extends Controller
{
    public function _invoke()
    {
        $username = Auth::user()->Usuario;
        return view('inicio', compact('username'));
    }
}
