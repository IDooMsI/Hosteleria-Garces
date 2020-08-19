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
                <input name="number" class="form-control" type="number" value="{{ $work->fc_number }}">
                <small id="passwordHelpBlock" class="form-text text-muted"><b>Numero de factura</b></small>
                @error('number')
                <div id="error" class="alert alert-danger mx-auto col-11 col-sm-4 col-lg-12"><span>{{ $message }}</span></div>
                @enderror
            </div>
            <div class="form-group col-12 col-md-6 col-lg-3">
                <h4><label for="">Precio</label></h4>
                <input name="price" class="form-control" type="number" value="{{ $work->price }}">
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
                <input name="updated_at" class="form-control" type="text" readonly value="{{ $work->updated_at->format('d/m/Y') }}">
                <small id="passwordHelpBlock" class="form-text text-muted"><b>Fecha en la que se instalo el trabajo</b></small>
            </div>
            <div class="form-group col-12 col-md-6 col-lg-3">
                <h4><label for="">Tecnico</label></h4>
                @if($work->user)
                    <input name="user" class="form-control" type="text" readonly value="{{ Ucwords($work->user->name) }}">
                @else
                    <input name="user" class="form-control" type="text" readonly value="{{ UcFirst('trabajo no finalizado') }}">
                @endif
                <small id="passwordHelpBlock" class="form-text text-muted"><b>Tecnico que realizo el trabajo</b></small>
            </div>
            <div class="form-group col-12 col-md-6 col-lg-3">
                <h4><label for="">Cliente</label></h4>
                @if($work->client)
                <input name="client" class="form-control" type="text" readonly value="{{ Ucwords($work->client->name) }}">
                @else
                <input name="client" class="form-control" type="text" readonly value="{{ Ucfirst('trabajo no finalziado') }}">
                @endif
                <small id="passwordHelpBlock" class="form-text text-muted"><b>Cliente al que se le realizo el trabajo</b></small>
            </div>
        </div>
    </form>
</div>
@endsection