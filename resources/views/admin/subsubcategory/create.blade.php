@extends('layouts.app')
@section('content')
<div class="col-12">
    <div class="col-12 text-center mb-5">
        <h2>Nueva Subcategoria Secundaria</h2>
    </div>
    <form class="col-12 mx-auto" action="{{route('subsubcategory.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-row justify-content-center">
            <div class="form-group col-12 col-md-6 col-lg-3">
                <h4><label for="">Nombre</label></h4>
                <input name="name" class="form-control" type="text" value="{{ old('name') }}">
                <small class="form-text text-muted"><b>Nombre de la nueva subcategoria</b></small>
                @error('name')
                <div id="error" class="alert alert-danger mx-auto col-11 col-sm-4 col-lg-12"><span>{{ $message }}</span></div>
                @enderror
            </div>
            <div class="form-group m-0 col-12 col-md-6 col-lg-4">
                <label class="h4 pb-2" for="">Subcategoria</label>
                <select class="form-control mb-1" name="subcategory">
                    <option value="">Elija una subcategoria</option>
                    @if(isset($subcategories))
                        @foreach($subcategories as $subcategory)
                            <option value="{{$subcategory->id}}">{{Ucfirst($subcategory->name)}}</option>
                        @endforeach
                    @endif
                </select>
                @error('subcategory')
                <div id="error" class="alert alert-danger mx-auto col-11 col-sm-4 col-lg-12"><span>{{ $message }}</span></div>
                @enderror
            </div>
        <div id="buttons" class="text-center mt-3 col-12">
            <button class="mx-2 btn btn-outline-dark rounded-pill" type="submit">Agregar</button>
            <a href="{{route('subsubcategory.index')}}"><button class="btn btn-outline-dark rounded-pill" type="button">Cancelar</button></a>
        </div>
    </form>
</div>
@endsection