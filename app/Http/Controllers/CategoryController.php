<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $vac = compact('categories');
        return view('admin.category.index',$vac);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
        Category::create([
            'name'=>$request['name'],
            'description'=>$request['description']
        ]);
        return redirect()->route('category.index')->with('notice', 'La categoria '. $request['name'] .' ha sido creada correctamente');
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
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $vac = compact('category');
        return view('admin.category.edit',$vac);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validator($request);
        $category=Category::find($id);
        $category->update([
            'name'=>$request->input('name'),
            'description'=>$request->input('description')
        ]); 
        return redirect()->route('category.index')->with('notice', 'La categoria '.$category->name.' ha sido editada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::find($id);
        $category->delete();
        return redirect()->route('category.index')->with('notice', 'La categoria '.$category->name.' ha sido eliminada correctamente');
    }
    public function validator(Request $request)
    {
        $rules = [
            'name' => 'required|unique:categories|string|max:50',
            'description' => 'required|string|max:300'
        ];
        $message = [
            'required' => 'El campo es obligatorio.',
            'unique' => 'La categoria ya existe en nuestra base.',
            'string' => 'Solo se admiten letras.'
        ];
        return $this->validate($request, $rules, $message);
    }
}
