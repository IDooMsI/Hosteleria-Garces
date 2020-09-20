<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calculadora;
use App\Publication;

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
    
    public function showAllPublications($nombre)
    {
        $publications = Publication::where('subcategory', $nombre)->orwhere('subsubcategory',$nombre)->get();
        $vac = compact('publications');
        return view('publicaciones',$vac);
    }
}