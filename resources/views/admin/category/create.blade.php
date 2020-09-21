@extends('layouts.app')
@section('content')
<div class="col-12">
    <div class="col-12 text-center mb-5">
        <h2>Nueva Categoria</h2>
    </div>
    <form class="col-12 mx-auto" action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-row justify-content-center">
            <div class="form-group col-12 col-md-6 col-lg-3">
                <h4><label for="">Nombre</label></h4>
                <input name="name" class="form-control" type="text" value="{{ old('name') }}">
                <small class="form-text text-muted"><b>Nombre de la nueva categoria</b></small>
                @error('name')
                <div id="error" class="alert alert-danger mx-auto col-11 col-sm-4 col-lg-12"><span>{{ $message }}</span></div>
                @enderror
            </div>
            <div class="form-group col-12 col-md-6 col-lg-3">
                <h4><label for="">Descripcion</label></h4>
                <input name="description" class="form-control" type="text" value="{{ old('description') }}">
                <small class="form-text text-muted"><b>Descripcion de la nueva categoria</b></small>
                @error('lastname')
                <div id="error" class="alert alert-danger mx-auto col-11 col-sm-4 col-lg-12"><span>{{ $message }}</span></div>
                @enderror
            </div>
        <div id="buttons" class="text-center mt-3 col-12">
            <button class="mx-2 btn btn-outline-dark rounded-pill" type="submit">Agregar</button>
            <a href="{{route('category.index')}}"><button class="btn btn-outline-dark rounded-pill" type="button">Cancelar</button></a>
        </div>
    </form>
   
</div>
@endsection