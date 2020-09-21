@extends('layouts.app')
@section('content')
<div class="col-12">
    <div class="col-12 text-center mb-5">
        <h2>Editar Categoria</h2>
    </div>
    <form class="col-12 mx-auto" action="{{route('category.update',['category'=>$category])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-row justify-content-center">
            <div class="form-group col-12 col-md-6 col-lg-3">
                <h4><label for="">Nombre</label></h4>
                <input name="name" class="form-control" type="text" value="{{ $category->name }}">
                <small class="form-text text-muted"><b>Nuevo nombre de la categoria</b></small>
                @error('name')
                <div id="error" class="alert alert-danger mx-auto col-11 col-sm-4 col-lg-12"><span>{{ $message }}</span></div>
                @enderror
            </div>
            <div class="form-group col-12 col-md-6 col-lg-3">
                <h4><label for="">Descripcion</label></h4>
                <input name="description" class="form-control" type="text" value="{{ $category->description }}">
                <small class="form-text text-muted"><b>Nueva descripcion de la categoria</b></small>
                @error('lastname')
                <div id="error" class="alert alert-danger mx-auto col-11 col-sm-4 col-lg-12"><span>{{ $message }}</span></div>
                @enderror
            </div>
        <div id="buttons" class="text-center mt-3 col-12">
            <button class="mx-2 btn btn-outline-dark rounded-pill" type="submit">Editar</button>
            <a href="{{route('category.index')}}"><button class="btn btn-outline-dark rounded-pill" type="button">Cancelar</button></a>
        </div>
    </form>
</div>
@endsection