<?php

namespace App\Http\Controllers;

use App\Calculadora;
use Illuminate\Http\Request;

class CalculadoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Calculadora::all();
        $vac = compact('items');
        return view('admin.calculator.index',$vac);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.calculator.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Calculadora::create([
            'code' => $request['code'],
            'price' => $request['price'],
            'description' => $request['description'],
        ]);
        
        return redirect()->route('calculadora.index')->with('notice', 'El item se agrego correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Calculadora  $calculadora
     * @return \Illuminate\Http\Response
     */
    public function show(Calculadora $calculadora)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Calculadora  $calculadora
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $calculator = Calculadora::find($id);
        $vac = compact('calculator');
        return view('admin.calculator.edit',$vac);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Calculadora  $calculadora
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $calculadora = Calculadora::find($id);
        $calculadora->update([
            'code' => $request['code'],
            'price' => $request['price'],
            'description' => $request['description'],
        ]);

        return redirect()->route('calculator.index')->with('notice', 'El item se modifico correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Calculadora  $calculadora
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $calculadora = Calculadora::find($id);
        $calculadora->delete();
        return redirect()->route('calculator.index')->with('notice', 'El item se elimino correctamente');
 
    }
}
