<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calculadora;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function showCalculadora()
    {   
        $items = Calculadora::all();
        $vac = compact('items'); 
        return view('presupuesto',$vac);
    }

}