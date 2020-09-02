@extends('layouts.app')
@section('content')
<div class="col-12 mt-3">
    <div class="col-12 text-center mb-5">
        <h2>Nuevo Item</h2>
    </div>
    <form class="col-12 mx-auto" action="{{route('calculadora.update',['calculadora'=>$calculadora])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-row text-center">
            <div class="form-group col-12 col-md-6 col-lg-4">
                <h4><label for="">Codigo</label></h4>
                <input name="code" class="form-control" type="text" value="{{ $calculadora->code }}" required>
                <small class="form-text text-muted"><b>Nueco Codigo del item</b></small>
                @error('code')
                <div id="error" class="alert alert-danger mx-auto col-11 col-sm-4 col-lg-12"><span>{{ $message }}</span></div>
                @enderror
            </div>
            <div class="form-group col-12 col-md-6 col-lg-4">
                <h4><label for="">Precio</label></h4>
                <input name="price" class="form-control" type="text" value="{{ $calculadora->price }}" required>
                <small class="form-text text-muted"><b>Nuevo Precio del item</b></small>
                @error('price')
                <div id="error" class="alert alert-danger mx-auto col-11 col-sm-4 col-lg-12"><span>{{ $message }}</span></div>
                @enderror
            </div>
            <div class="form-group col-12 col-md-6 col-lg-4">
                <h4><label for="">Descripcion</label></h4>
                <textarea class="form-control" name="description" rows="3" required>{{ $calculadora->description }}</textarea>
                <small class="form-text text-muted"><b>Nueva Descripcion del item</b></small>
                @error('description')
                <div id="error" class="alert alert-danger mx-auto col-11 col-sm-4 col-lg-12"><span>{{ $message }}</span></div>
                @enderror
            </div>
        </div>
        <div id="buttons" class="text-center mt-3 col-12">
            <button class="mx-2 btn btn-outline-dark rounded-pill" type="submit">Editar</button></a>
            <a href="{{route('calculadora.index')}}"><button class="btn btn-outline-dark rounded-pill" type="button">Cancelar</button></a>
        </div>
    </form>
</div>
@endsection