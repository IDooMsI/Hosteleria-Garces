<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TecnicController extends Controller
{
    public function index()
    {
        return view('tecnic.index');
    }
}
