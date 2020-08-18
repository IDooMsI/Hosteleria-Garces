@extends('layouts.app')
@section('content')
<div class="col-12">
    <div class="col-12 text-center mb-5">
        <h2>Editar Cliente</h2>
    </div>
    <form class="col-12 mx-auto" action="{{route('client.update',['client'=>$client])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="form-group col-12 col-md-6 col-lg-3">
                <h4><label for="">Nombre</label></h4>
                <input name="name" class="form-control" type="text" value="{{ Ucfirst($client->name) }}">
                <small id="passwordHelpBlock" class="form-text text-muted"><b>Nombre del cliente</b></small>
                @error('name')
                <div id="error" class="alert alert-danger mx-auto col-11 col-sm-4 col-lg-12"><span>{{ $message }}</span></div>
                @enderror
            </div>
            <div class="form-group col-12 col-md-6 col-lg-3">
                <h4><label for="">Apellido</label></h4>
                <input name="lastname" class="form-control" type="text" value="{{ Ucfirst($client->lastname) }}">
                <small id="passwordHelpBlock" class="form-text text-muted"><b>Apellido del Cliente</b></small>
                @error('lastname')
                <div id="error" class="alert alert-danger mx-auto col-11 col-sm-4 col-lg-12"><span>{{ $message }}</span></div>
                @enderror
            </div>
            <div class="form-group col-12 col-md-6 col-lg-3">
                <h4><label for="">Cuit</label></h4>
                <input name="cuit" class="form-control" type="number" value="{{ $client->cuit }}" required>
                <small id="passwordHelpBlock" class="form-text text-muted"><b>Cuit del Cliente</b></small>
                @error('cuit')
                <div id="error" class="alert alert-danger mx-auto col-11 col-sm-4 col-lg-12"><span>{{ $message }}</span></div>
                @enderror
            </div>
            <div class="form-group col-12 col-md-6 col-lg-3">
                <h4><label for="">Telefono</label></h4>
                <input name="phone" class="form-control" type="number" value="{{ $client->phone }}" required>
                <small id="passwordHelpBlock" class="form-text text-muted"><b>Telefono del Cliente</b></small>
                @error('phone')
                <div id="error" class="alert alert-danger mx-auto col-11 col-sm-4 col-lg-12"><span>{{ $message }}</span></div>
                @enderror
            </div>
            <div class="form-row mr-1 col-12 col-md-6 col-lg-4">
                <div class="form-group col-12 m-0">
                    <h4 class="m-0"><label class="m-0" for="">Direccion</label></h4>
                </div>
                <div class="form-group m-0 col-12 col-md-6 col-lg-6">
                    <label for="">Calle</label>
                    <input name="street" class="form-control" type="text" value="{{ Ucwords($client->address->street) }}">
                </div>
                <div class="form-group m-0 col-12 col-md-6 col-lg-6 mb-2">
                    <label for="">Numero</label>
                    <input name="number" class="form-control" type="text" value="{{ Ucfirst($client->address->number) }}">
                </div>
                <div class="form-group m-0 col-12 col-md-6 col-lg-6">
                    <label for="">Localidad</label>
                    <select class="form-control mb-1" name="locality" value="{{ old('locality') }}">
                        <option value="">Elija una localidad</option>
                        @if(isset($localities))
                            @foreach($localities as $locality)
                                <option <?php if ($locality->id == $client->address->locality_id) echo "selected"; ?> value="{{$locality->id}}">{{ Ucfirst($locality->name) }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group my-auto m-0 col-12 col-md-6 col-lg-6" style="display: inline-grid">
                    <button class="btn btn-outline-dark btn-block rounded-pill w-100" type="button" onclick="newLocality()">Agregar Localidad</button>
                    <small id="passwordHelpBlock" class="form-text text-muted"><b>En caso de no encontrar una localidad, agreguela</b></small>
                </div>
            </div>
            <div  div id="div-new-category" class="form-group m-0 col-12 col-md-6 col-lg-6" style="display: none">
                <div class="form-group col-12 col-md-6 col-lg-6">
                    <h4 class="m-0">Nueva Localidad</h4>
                    <label for="">Nombre</label>
                    <input name="new-locality" class="form-control" type="text" value="{{ old('new-locality') }}">
                </div>
                <div class="form-group m-0 col-12 col-md-6 col-lg-6" style="display: inline-grid">
                    <button class="btn btn-outline-dark btn-block rounded-pill w-100 my-auto" type="button" onclick="cancelNewLocality()">Cancelar</button>
                </div>
            </div>
        </div>
        <div id="buttons" class="text-center col-12">
            <a href="{{route('client.store')}}"><button class="mx-2 btn btn-outline-dark rounded-pill" type="submit">Agregar</button></a>
            <a href="{{route('client.index')}}"><button class="btn btn-outline-dark rounded-pill" type="button">Cancelar</button></a>
        </div>
    </form>
</div>
@endsection