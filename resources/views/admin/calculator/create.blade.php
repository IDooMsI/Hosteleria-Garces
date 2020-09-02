@extends('layouts.app')
@section('content')
<div class="col-12 mt-3">
    <div class="col-12 text-center mb-5">
        <h2>Nuevo Item</h2>
    </div>
    <form class="col-12 mx-auto" action="{{route('calculator.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-row text-center">
            <div class="form-group col-12 col-md-6 col-lg-4">
                <h4><label for="">Codigo</label></h4>
                <input name="code" class="form-control" type="text" value="{{ old('code') }}" required>
                <small class="form-text text-muted"><b>Codigo del nuevo item</b></small>
                @error('code')
                <div id="error" class="alert alert-danger mx-auto col-11 col-sm-4 col-lg-12"><span>{{ $message }}</span></div>
                @enderror
            </div>
            <div class="form-group col-12 col-md-6 col-lg-4">
                <h4><label for="">Precio</label></h4>
                <input name="price" class="form-control" type="text" value="{{ old('price') }}" required>
                <small class="form-text text-muted"><b>Precio del nuevo item</b></small>
                @error('price')
                <div id="error" class="alert alert-danger mx-auto col-11 col-sm-4 col-lg-12"><span>{{ $message }}</span></div>
                @enderror
            </div>
            <div class="form-group col-12 col-md-6 col-lg-4">
                <h4><label for="">Descripcion</label></h4>
                <textarea class="form-control" name="description" rows="3" required></textarea>
                <small class="form-text text-muted"><b>Descripcion del nuevo item</b></small>
                @error('description')
                <div id="error" class="alert alert-danger mx-auto col-11 col-sm-4 col-lg-12"><span>{{ $message }}</span></div>
                @enderror
            </div>
        </div>
        <div id="buttons" class="text-center mt-3 col-12">
            <button class="mx-2 btn btn-outline-dark rounded-pill" type="submit">Agregar</button>
            <a href="{{route('calculator.index')}}"><button class="btn btn-outline-dark rounded-pill" type="button">Cancelar</button></a>
        </div>
    </form>
</div>
@endsection