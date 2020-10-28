<?php

namespace App\Http\Controllers;

use App\Subcategory;
use App\SubSubcategory;
use Illuminate\Http\Request;

class SubsubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subsubcategories = SubSubcategory::all();
        $vac = compact('subsubcategories');
        return view('admin.subsubcategory.index', $vac);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategories = Subcategory::all();
        $vac = compact('subcategories');
        return view('admin.subsubcategory.create', $vac);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request);
        Subsubcategory::create([
            'name' => $request['name'],
            'subcategory_id' => $request['subcategory']
        ]);
        return redirect()->route('subsubcategory.index')->with('notice', 'La subcategoria secundaria ' . strtoupper($request['name']) . ' ha sido creada correctamente');
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subsubcategory = Subsubcategory::find($id);
        $subcategories = Subcategory::all();
        $vac = compact('subsubcategory', 'subcategories');
        return view('admin.subsubcategory.edit', $vac);
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
        $subsubcategory = Subsubcategory::find($id);
        if($subsubcategory->name != $request->input('name')){
            $this->validator($request);
        }
        $subsubcategory->update([
            'name' => $request->input('name'),
            'subcategory_id' => $request->input('subcategory')
        ]);
        return redirect()->route('subsubcategory.index')->with('notice', 'La subategoria secundaria ' . Ucfirst($subsubcategory->name) . ' ha sido editada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subsubcategory = Subsubcategory::find($id);
        $subsubcategory->delete();
        return redirect()->route('subsubcategory.index')->with('notice', 'La subcategoria secundaria ' . Ucfirst($subsubcategory->name) . ' ha sido eliminada correctamente');
    }

    public function validator(Request $request)
    {
        $rules = [
            'name' => 'required|unique:subcategories|string|max:50',
            'subcategory' => 'required'
        ];
        $message = [
            'required' => 'El campo es obligatorio.',
            'unique' => 'La categoria ya existe en nuestra base.',
            'string' => 'Solo se admiten letras.'
        ];
        return $this->validate($request, $rules, $message);
    }
}
