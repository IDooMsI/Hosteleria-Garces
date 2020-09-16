@extends('layouts.app')
@section('content')
<div class="container">
    <div id="div-admin-buttons" class="row mt-3 justify-content-center">
        <div class="col-6 col-md-3">
            <a href="{{route('client.index')}}">
                <button class="btn btn-outline-dark rounded-pill">CLIENTES</button>
            </a>
        </div>
        <div class="col-6 col-md-3">
            <a href="{{ route('work.index') }}">
                <button class="btn btn-outline-dark rounded-pill">TRABAJOS</button>
            </a>
        </div>
        <div class="col-6 col-md-3">
            <a href="{{ route('publication.index')}}">
                <button class="btn btn-outline-dark rounded-pill">PUBLICACIONES</button>
            </a>
        </div> 
        <div class="col-6 col-md-3">
            <a href="{{ route('calculator.index') }}">
                <button class="btn btn-outline-dark rounded-pill">CALCULADORA</button>
            </a>
        </div> 
    </div>
    <div id="div-admin-buttons" class="row mt-3 justify-content-center">
        <div class="col-6 col-md-3">
            <a href="{{ route('category.index') }}">
                <button class="btn btn-outline-dark rounded-pill">CATEGORIAS</button>
            </a>
        </div> 
        <div class="col-6 col-md-3">
            <a href="{{ route('subcategory.index') }}">
                <button class="btn btn-outline-dark rounded-pill">SUBCATEGORIAS PRINCIPALES</button>
            </a>
        </div> 
        <div class="col-6 col-md-3">
            <a href="{{ route('subsubcategory.index') }}">
                <button class="btn btn-outline-dark rounded-pill">SUBCATEGORIAS SECUNDARIAS</button>
            </a>
        </div> 
    </div>    
    
</div>
@endsection