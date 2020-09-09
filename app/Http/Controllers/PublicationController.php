<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Publication;
use App\Category;
use App\Subcategory;
use App\SubSubcategory;
use App\Image;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publications = Publication::all();
        $vac = compact('publications');
        return view('admin.publication.index',$vac);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::table('categories')->select('*')->orderBy('name')->get();
        $subcategories = DB::table('subcategories')->select('*')->orderBy('name')->get();
        $subsubcategories = DB::table('subsubcategories')->select('*')->orderBy('name')->get();
        $vac = compact('categories','subcategories','subsubcategories');
        return view('admin.publication.create',$vac);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response 
     */
    public function store(Request $request)
    {
        $subcategory = NULL;
        $subsubcategory = NULL;

        if ($request['new-category']){
            $newCategory = Category::create([
                'name' => $request['new-category']
            ]);
            $category = $newCategory->id;
        }else {
            $category = $request['category'];
        };

        if ($request['new-subcategory']){
            $newSubcategory = Subcategory::create([
                'name' => $request['new-subcategory']
            ]);
            $subcategory = $newSubcategory->id;
        }else {
            $subcategory = $request['subcategory'];
        };

        if ($request['new-subsubcategory']){
            $newSubSubcategory = SubSubcategory::create([
                'name' => $request['new-subsubcategory']
            ]);
            $subsubcategory = $newSubSubcategory->id;
        }else {
            $subsubcategory = $request['subsubcategory'];
        };

        
        $publication = Publication::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'category' => $category,
            'subcategory' => $subcategory,
            'subsubcategory' => $subsubcategory,
            ]);

        $this->createImage($request, $publication);
        return redirect()->route('publication.index')->with('notice', 'La publicación '. Ucfirst($publication->name).' ha sido creada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $publication = Publication::find($id);
        $categories = DB::table('categories')->select('*')->orderBy('name')->get();
        $subcategories = DB::table('subcategories')->select('*')->orderBy('name')->get();
        $subsubcategories = DB::table('subsubcategories')->select('*')->orderBy('name')->get();
        $vac = compact('publication','categories','subcategories','subsubsubcategories');
        return view('admin.publication.edit',$vac);
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
        $publication = Publication::find($id);
        
        if ($request['new-category']){
            $newCategory = Category::create([
                'name' => $request['new-category']
            ]);
            $category = $newCategory;
        }else {
            $category = $request['category'];
        };

        if ($request['new-subcategory']){
            $newSubcategory = Subcategory::create([
                'name' => $request['new-subcategory']
            ]);
            $subcategory = $newSubcategory;
        }else {
            $subcategory = $request['subcategory'];
        };

        if ($request['new-subsubcategory']){
            $newSubSubcategory = SubSubcategory::create([
                'name' => $request['new-subsubcategory']
            ]);
            $subsubcategory = $newSubSubcategory;
        }else {
            $subsubcategory = $request['subsubcategory'];
        };


        $this->createImage($request, $publication);

        $publication->update([
            'name' => $request['name'],
            'description' => $request['description'],
            'category' => $category,
            'subcategory' => $subcategory,
            'subsubcategory' => $subsubcategory,
        ]);
        return redirect()->route('publication.index')->with('notice', 'La publicación '. Ucfirst($publication->name).' ha sido editada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $publication = Publication::find($id);
        return redirect()->route('publication.index')->with('notice', 'La publicación '. Ucfirst($publication->name).' ha sido eliminada correctamente.');
    }

    public function createImage(Request $request, Publication $publication)
        {
        $position = 0;

        if (isset($request['category'])) {
            $category = ' categoria-'.$request['category'];
        } if(isset($request['subcategory'])) {
            $category = ' subcategoria-'.$request['subcategory'];
        }elseif(isset($request['subsubcategory'])) {
            $category = ' subsubcategoria-'.$request['subsubcategory'];
        }
        if (isset($request['img'])) {
           foreach ($request['img'] as $key) {
            $file = $key;
            $name = $request['name'] . "-publicación N°" . $publication->id . $category ."-". $position++ . "." . $file->extension();
            $path = 'publications/' . $name;
            $path = $file->storeAs('publication', $name, 'public');
            
            // move_uploaded_file($file, "../public_html/storage/$path");
            $image = Image::create([
                'name' => $path,
                'publication_id' => $publication->id,
            ]); 
        }
            
            return $image;
        }
    }

    public function validator($request)
    {
        $rules = [
            'name' => 'required|string|max:50',
            'description' => 'string|max:300',
            'category' => 'required|string|unique:categories',
            'subcategory' => 'string|unique:subcategories', 
            'subsubcategory' => 'string|unique:subsubcategories', 
        ];
        $message = [
            'required'  => 'El campo es obligatorio',
            'unique'    => 'La categoria ya existe en nuestra base',
            'string'    => 'El campo no puede estar vacio', 
        ];
        return $this->validate($request, $rules, $message);
    }

    public function categoryValidator(Request $request)
    {
        $rules = [
            'new-category' => 'unique:categories,name|string|required',
        ];
        $message = [
            'unique' => 'La categoria ya existe en nuestra base',
            'string' => 'El campo no puede estar vacio',
            'required' => 'El campo es obligatorio',
        ];
        return $this->validate($request, $rules, $message);
    }

    public function subcategoryValidator(Request $request)
    {
        $rules = [
            'new-subgategory' => 'unique:subcategories,name|string|required',
        ];
        $message = [
            'unique' => 'La subcategoria principal ya existe en nuestra base',
            'string' => 'El campo no puede estar vacio',
            'required' => 'El campo es obligatorio',
        ];
        return $this->validate($request, $rules, $message);
    }
    public function subsubcategoryValidator(Request $request)
    {
        $rules = [
            'new-subsubgategory' => 'unique:subsubcategories,name|string|required',
        ];
        $message = [
            'unique' => 'La subcategoria secundaria ya existe en nuestra base',
            'string' => 'El campo no puede estar vacio',
            'required' => 'El campo es obligatorio',
        ];
        return $this->validate($request, $rules, $message);
    }
}

