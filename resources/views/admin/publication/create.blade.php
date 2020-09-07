@extends('layouts.app')
@section('content')
<div class="col-12">
    <div class="col-12 text-center mb-5">
        <h2>Nueva Publicación</h2>
    </div>
    <form class="col-12 mx-auto" action="{{route('publication.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="form-group col-12 col-md-6 col-lg-4">
                <h4><label for="">Nombre</label></h4>
                <input name="name" class="form-control" type="text" value="{{ old('name') }}">
                <small class="form-text text-muted"><b>Nombre de la nueva publicación</b></small>
                @error('name')
                <div id="error" class="alert alert-danger mx-auto col-11 col-sm-4 col-lg-12"><span>{{ $message }}</span></div>
                @enderror
            </div>
            <div class="form-group col-12 col-md-6 col-lg-4">
                <h4><label for="">Descripción</label></h4>
                <textarea class="w-100" name="description" maxlength="300" rows="5" onkeyup="countChars(this);" placeholder="Maximo 300 caracteres"></textarea>
                <p id="charNum">300 caracteres restantes</p>
                @error('description')
                <div id="error" class="alert alert-danger mx-auto col-11 col-sm-4 col-lg-12"><span>{{ $message }}</span></div>
                @enderror
                <small class="form-text text-muted"><b>Descripción de la publicación</b></small>
            </div>
            <div id="image" class="form-group col-12 col-md-6 col-lg-4">
                <h4><label for="">Archivos</label></h4>
                <input name="img[]" multiple id="myFile" class="form-control-file" type="file">
            </div>
                <div class="form-group m-0 col-12 col-md-6 col-lg-4">
                    <label class="h4 pb-2" for="">Categoria</label>
                    <select class="form-control mb-1" name="category" onchange="categorias(id)">
                        <option value="">Elija una categoria</option>
                        @if(isset($categories))
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{Ucfirst($category->name)}}</option>
                            @endforeach
                        @endif
                    </select>
                    <div class="+form-group mt-4 col-12" style="display: inline-grid">
                        <button class="btn btn-outline-dark btn-block rounded-pill w-100" type="button" onclick="newCategory()">Agregar categoria</button>
                        <small class="form-text text-muted"><b>En caso de no encontrar una cateogria, agreguela</b></small>
                    </div>
                </div>
                <div class="form-group m-0 col-12 col-md-6 col-lg-4">
                    <label class="h4 pb-2" for="">Subcategoria principal</label>
                    <select id="subcategorias" class="form-control mb-1" name="subcategory">
                        <option value="">Elija una subcategoria principal</option>    
                    </select>
                    <div class="form-group mt-4 col-12" style="display: inline-grid">
                        <button class="btn btn-outline-dark btn-block rounded-pill w-100" type="button" onclick="newSubcategory()">Agregar subcategoria principal</button>
                        <small class="form-text text-muted"><b>En caso de no encontrar una subcateogria, agreguela</b></small>
                    </div>
                </div>
                <div class="form-group m-0 col-12 col-md-6 col-lg-4">
                    <label class="h4 pb-2" for="">Subcategoria secundaria</label>
                    <select class="form-control mb-1" name="subsubcategory">
                        <option value="">Elija una subcategoria secundaria</option>          
                    </select>
                    <div class="form-group mt-4 col-12" style="display: inline-grid">
                        <button class="btn btn-outline-dark btn-block rounded-pill w-100" type="button" onclick="newSubsubcategory()">Agregar subcategoria secundaria</button>
                        <small class="form-text text-muted"><b>En caso de no encontrar una subcateogria, agreguela</b></small>
                    </div>
                </div>
                <div id="div-nueva-categoria" class="form-group m-0 col-12 col-md-6 col-lg-4" style="display: none">
                    <div class="form-group p-0 col-12 col-md-6 col-lg-6">
                        <h4 class="m-0">Nueva categoria</h4>
                        <label for="">Nombre</label>
                        <input name="new-category" class="form-control" type="text" value="{{ old('new-category') }}">
                    </div>
                    <div class="form-group m-0 col-12 col-md-6 col-lg-4" style="display: inline-grid">
                        <button class="btn btn-outline-dark btn-block rounded-pill w-100 my-auto" type="button" onclick="cancelNewCategory()">Cancelar</button>
                    </div>
                </div>
                <div id="div-nueva-subcategoria" class="form-group m-0 col-12 col-md-6 col-lg-4" style="display: none">
                    <div class="form-group p-0 col-12 col-md-6 col-lg-6">
                        <h4 class="m-0">Nueva subcategoria principal</h4>
                        <label for="">Nombre</label>
                        <input name="new-subcategory" class="form-control" type="text" value="{{ old('new-subcategory') }}">
                    </div>
                    <div class="form-group m-0 col-12 col-md-6 col-lg-4" style="display: inline-grid">
                        <button class="btn btn-outline-dark btn-block rounded-pill w-100 my-auto" type="button" onclick="cancelNewSubcategory()">Cancelar</button>
                    </div>
                </div>
                <div id="div-nueva-subsubcategoria" class="form-group m-0 col-12 col-md-6 col-lg-4" style="display: none">
                    <div class="form-group p-0 col-12">
                        <h4 class="m-0">Nueva subcategoria secundaria</h4>
                        <label for="">Nombre</label>
                        <input name="new-subsubcategory" class="form-control" type="text" value="{{ old('new-subsubcategory') }}">
                    </div>
                    <div class="form-group m-0 col-12 col-md-6 col-lg-4" style="display: inline-grid">
                        <button class="btn btn-outline-dark btn-block rounded-pill w-100 my-auto" type="button" onclick="cancelNewSubsubcategory()">Cancelar</button>
                    </div>
                </div>
                
        </div>
    <div id="buttons" class="text-center mt-3 col-12">
        <a href="{{route('publication.store')}}"><button class="mx-2 btn btn-outline-dark rounded-pill" type="submit">Agregar</button></a>
        <a href="{{route('publication.index')}}"><button class="btn btn-outline-dark rounded-pill" type="button">Cancelar</button></a>
    </div>
</form>
   
</div>
@endsection