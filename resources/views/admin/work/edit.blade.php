@extends('layouts.app')
@section('content')
<div class="col-12">
    <div class="col-12 text-center my-5">
        <h2>Editar Trabajo</h2>
    </div>
    <form class="col-12 mx-auto" action="{{route('work.update',['work'=>$work])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="form-group col-12 col-md-6 col-lg-3">
                <h4><label for="">Factura</label></h4>
                <input name="number" class="form-control" type="number" required>
                <small id="passwordHelpBlock" class="form-text text-muted"><b>Numero de factura</b></small>
                @error('number')
                <div id="error" class="alert alert-danger mx-auto col-11 col-sm-4 col-lg-12"><span>{{ $message }}</span></div>
                @enderror
            </div>
            <div class="form-group col-12 col-md-6 col-lg-3">
                <h4><label for="">Precio</label></h4>
                <input name="price" class="form-control" type="number" required>
                <small id="passwordHelpBlock" class="form-text text-muted"><b>Monto de la factura</b></small>
                @error('price')
                <div id="error" class="alert alert-danger mx-auto col-11 col-sm-4 col-lg-12"><span>{{ $message }}</span></div>
                @enderror
            </div>
            <div class="form-group col-12 col-md-6 col-lg-3">
                <h4><label for="">Fecha de creacion</label></h4>
                <input name="created_at" class="form-control" type="text" readonly value="{{ $work->created_at->format('d/m/Y') }}">
                <small id="passwordHelpBlock" class="form-text text-muted"><b>Fecha en la que se creo el trabajo</b></small>
            </div>
            <div class="form-group col-12 col-md-6 col-lg-3">
                <h4><label for="">Fecha de instalacion</label></h4>
                <input name="updated_at" class="form-control" type="date" value="{{ $work->updated_at->format('d/m/Y') }}" required>
                <small id="passwordHelpBlock" class="form-text text-muted"><b>Fecha en la que se instalo el trabajo</b></small>
            </div>
            <div class="form-group col-12 col-md-6 col-lg-3">
                <h4><label for="">Trabajo Finalizado?</label></h4>
                @if($work->user)
                <input name="" class="form-control" type="text" readonly value="{{ Ucwords($work->user->name) }}">
                <small id="passwordHelpBlock" class="form-text text-muted"><b>Tecnico que realizo el trabajo</b></small>
                @else
                    <label for="">Si!</label>
                    <input name="user" value="{{ Auth::user()->id }}" type="checkbox" required>
                @endif
            </div>
            <div class="form-group col-12 col-md-6 col-lg-3">
                <h4><label for="">Cliente</label></h4>
                <input name="client" class="form-control" type="text" readonly value="{{ Ucwords($work->client->name) }}">
                <small id="passwordHelpBlock" class="form-text text-muted"><b>Cliente al que se le realizo el trabajo</b></small>
            </div>
             <div id="image" class="form-group col-12 col-md-6 col-lg-3">
                <h4><label for="">Archivos</label></h4>
                <input name="img[]" multiple id="myFile" class="form-control-file" type="file" required >
            </div>
        </div>
        <div id="buttons" class="text-center col-12">
            <button class="mx-2 btn btn-outline-dark rounded-pill" type="submit">Editar</button>
            <a href="{{route('work.index')}}"><button class="btn btn-outline-dark rounded-pill" type="button">Cancelar</button></a>
        </div>
    </form>
</div>
@endsection