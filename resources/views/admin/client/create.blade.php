@extends('layouts.app')
@section('content')
<div class="col-12">
    <div class="col-12 text-center mb-5">
        <h2>Nuevo Cliente</h2>
    </div>
    <form class="col-12 mx-auto" action="{{route('client.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="form-group col-12 col-md-6 col-lg-3">
                <h4><label for="">Nombre</label></h4>
                <input name="name" class="form-control" type="text" value="{{ old('name') }}">
                <small class="form-text text-muted"><b>Nombre del nuevo cliente</b></small>
                @error('name')
                <div id="error" class="alert alert-danger mx-auto col-11 col-sm-4 col-lg-12"><span>{{ $message }}</span></div>
                @enderror
            </div>
            <div class="form-group col-12 col-md-6 col-lg-3">
                <h4><label for="">Apellido</label></h4>
                <input name="lastname" class="form-control" type="text" value="{{ old('lastname') }}">
                <small class="form-text text-muted"><b>Apellido del nuevo cliente</b></small>
                @error('lastname')
                <div id="error" class="alert alert-danger mx-auto col-11 col-sm-4 col-lg-12"><span>{{ $message }}</span></div>
                @enderror
            </div>
            <div class="form-group col-12 col-md-6 col-lg-3">
                <h4><label for="">Cif</label></h4>
                <input name="cuit" class="form-control" type="number" value="{{ old('cuit') }}">
                <small class="form-text text-muted"><b>Cif del nuevo cliente</b></small>
                @error('cuit')
                <div id="error" class="alert alert-danger mx-auto col-11 col-sm-4 col-lg-12"><span>{{ $message }}</span></div>
                @enderror
            </div>
            <div class="form-group col-12 col-md-6 col-lg-3">
                <h4><label for="">Telefono</label></h4>
                <input name="phone" class="form-control" type="number" value="{{ old('phone') }}">
                <small class="form-text text-muted"><b>Telefono del nuevo cliente</b></small>
                @error('phone')
                <div id="error" class="alert alert-danger mx-auto col-11 col-sm-4 col-lg-12"><span>{{ $message }}</span></div>
                @enderror
            </div>
            <div class="form-row mr-1 col-12 col-md-6 col-lg-6">
                <div class="form-group col-12 text-center m-0">
                    <h4 class="m-0"><label class="m-0" for="">Direccion</label></h4>
                </div>
                <div class="form-group m-0 col-12 col-md-6 col-lg-6">
                    <label for="">Calle</label>
                    <input name="street" class="form-control" type="text" value="">
                    @error('street')
                        <div id="error" class="alert alert-danger mx-auto col-11 col-sm-4 col-lg-12"><span>{{ $message }}</span></div>
                    @enderror
                </div>
                <div class="form-group col-12 col-md-6 col-lg-6">
                    <label for="">Numero</label>
                    <input name="number" class="form-control" type="text" value="">
                    @error('number')
                        <div id="error" class="alert alert-danger mx-auto col-11 col-sm-4 col-lg-12"><span>{{ $message }}</span></div>
                    @enderror
                </div>
                <div class="form-group m-0 col-12 col-md-6 col-lg-6">
                    <label for="">Localidad</label>
                    <select class="form-control mb-1" name="locality">
                        <option value="">Elija una localidad</option>
                        @if(isset($localities))
                            @foreach($localities as $locality)
                                <option value="{{$locality->id}}">{{Ucfirst($locality->name)}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group my-auto m-0 col-12 col-md-6 col-lg-6" style="display: inline-grid">
                    <button class="btn btn-outline-dark btn-block rounded-pill w-100" type="button" onclick="newLocality()">Agregar Localidad</button>
                    <small class="form-text text-muted"><b>En caso de no encontrar una localidad, agreguela</b></small>
                </div>
            </div>
            <div class="form-row mr-1 col-12 col-md-6 col-lg-4 text-center">
                <div class="form-group m-0 col-12">
                    <h4 class=""><label for="">Proveedor</label></h4>
                </div>
                <div class="form-group m-0 col-12">
                    <select class="form-control col-12" name="provider">
                        <option value="">Elija una proveedor</option>
                        @if(isset($providers))
                        @foreach($providers as $provider)
                        <option value="{{$provider->id}}">{{Ucfirst($provider->name)}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group my-auto m-0 col-12 col-md-6 col-lg-12" style="display: inline-grid">
                    <button class="btn btn-outline-dark btn-block rounded-pill w-100" type="button" onclick="newProvider()">Agregar Proveedor</button>
                    <small class="form-text text-muted"><b>En caso de no encontrar un proveedor, agreguelo</b></small>
                </div>
            </div>
            <div  div id="div-new-category" class="form-group m-0 col-12 col-md-6 col-lg-6" style="display: none">
                <div class="form-group p-0 col-12 col-md-6 col-lg-6">
                    <h4 class="m-0">Nueva Localidad</h4>
                    <label for="">Nombre</label>
                    <input name="new-locality" class="form-control" type="text" value="{{ old('new-locality') }}">
                </div>
                <div class="form-group m-0 col-12 col-md-6 col-lg-4" style="display: inline-grid">
                    <button class="btn btn-outline-dark btn-block rounded-pill w-100 my-auto" type="button" onclick="cancelNewLocality()">Cancelar</button>
                </div>
            </div>
            <div  div id="div-new-provider" class="form-group m-0 col-12 col-md-6 col-lg-4" style="display: none">
                <div class="form-group p-0 col-12 col-md-6 col-lg-12">
                    <h4 class="m-0">Nuevo Proveedor</h4>
                    <label for="">Nombre</label>
                    <input name="new-provider" class="form-control" type="text" value="{{ old('new-provider') }}">
                </div>
                <div class="form-group m-0 col-12 col-md-6 col-lg-4" style="display: inline-grid">
                    <button class="btn btn-outline-dark btn-block rounded-pill w-100 my-auto" type="button" onclick="cancelNewProvider()">Cancelar</button>
                </div>
            </div>
        </div>
        <div id="buttons" class="text-center mt-3 col-12">
            <a href="{{route('client.store')}}"><button class="mx-2 btn btn-outline-dark rounded-pill" type="submit">Agregar</button></a>
            <a href="{{route('client.index')}}"><button class="btn btn-outline-dark rounded-pill" type="button">Cancelar</button></a>
        </div>
    </form>
   
</div>
@endsection