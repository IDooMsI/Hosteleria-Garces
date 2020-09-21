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
                <h4><label for="">Imagenes</label></h4>
                <div class="form-group mb-4 col-12 text-center">
                    <a href="{{ route('work.index') }}"><button class="mx-2 btn btn-outline-dark rounded-pill" type="button">Desde Trabajos</button></a>
                </div>
                <div class="form-group m-0 col-12 text-center">
                    <label for="">Desde Ordenador</label>
                    <input name="img[]" multiple id="myFile" class="form-control-file" type="file">
                    @error('img')
                        <div id="error" class="alert alert-danger mx-auto col-11 col-sm-4 col-lg-12"><span>{{ $message }}</span></div>
                    @enderror
                </div>
            </div>
            <div class="form-group m-0 col-12 col-md-6 col-lg-4">
                <label class="h4 pb-2" for="">Categoria</label>
                <select class="form-control mb-1" id="category" name="category" onchange="traer()">
                    <option value="">Elija una categoria</option>
                    @if(isset($categories))
                        @foreach($categories as $category)
                            <option id="option-category" value="{{$category->id}}">{{Ucfirst($category->name)}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group m-0 col-12 col-md-6 col-lg-4">
                <label class="h4 pb-2" for="">Subcategoria principal</label>
                <select id="subcategory" class="form-control mb-1" name="subcategory" onchange="traer2()">
                    <option id="novalor-sub" value="">No hay valores</option>
                </select>
            </div>
            <div class="form-group m-0 col-12 col-md-6 col-lg-4">
                <label class="h4 pb-2" for="">Subcategoria secundaria</label>
                <select id="subsubcategory" class="form-control mb-1" name="subsubcategory" >
                    <option id="novalor-sub" value="">No hay valores</option>
                </select>
            </div>
        </div>
        <div id="buttons" class="text-center mt-3 col-12">
            <a href="{{route('publication.store')}}"><button class="mx-2 btn btn-outline-dark rounded-pill" type="submit">Agregar</button></a>
            <a href="{{route('publication.index')}}"><button class="btn btn-outline-dark rounded-pill" type="button">Cancelar</button></a>
        </div>
</form>
</div>
@stop
@section('scripts')
    <script src="{{ asset('js/categories.js') }}"></script>
@endsection