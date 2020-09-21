<?php

namespace App\Http\Controllers;

use App\Category;
use App\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = Subcategory::all();
        $vac = compact('subcategories');
        return view('admin.subcategory.index', $vac);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $vac = compact('categories');
        return view('admin.subcategory.create',$vac);
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
        Subcategory::create([
            'name' => $request['name'],
            'category_id' => $request['category']
        ]);
        return redirect()->route('subcategory.index')->with('notice', 'La subcategoria ' . strtoupper($request['name']) . ' ha sido creada correctamente');
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Category  $category
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(request $request)
    // {
    //     $category = Category::find($id);
    //     $vac = compact('category');
    //     return view('admin.category.show', $vac);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategory = Subcategory::find($id);
        $categories = Category::all();
        $vac = compact('subcategory','categories');
        return view('admin.subcategory.edit', $vac);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validator($request);
        $subcategory = Subcategory::find($id);
        $subcategory->update([
            'name' => $request->input('name'),
            'category_id' => $request->input('category')
        ]);
        return redirect()->route('subcategory.index')->with('notice', 'La subategoria ' . strtoupper($subcategory->name) . ' ha sido editada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->delete();
        return redirect()->route('subcategory.index')->with('notice', 'La subcategoria ' . strtoupper($subcategory->name) . ' ha sido eliminada correctamente');
    }

    public function validator(Request $request)
    {
        $rules = [
            'name' => 'required|unique:subcategories|string|max:50',
            'category' => 'required'
        ];
        $message = [
            'required' => 'El campo es obligatorio.',
            'unique' => 'La categoria ya existe en nuestra base.',
            'string' => 'Solo se admiten letras.'
        ];
        return $this->validate($request, $rules, $message);
    }
}
