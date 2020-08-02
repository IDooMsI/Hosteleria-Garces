@extends('layouts.app')
@section('content')
<div class="col-12">
    <div class="col-12 text-center mb-5">
        <h2>Nuevo Cliente</h2>
    </div>
    <form class="col-12 mx-auto" action="{{route('client.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="form-group col-12 col-md-6 col-lg-4">
                <h4><label for="">Nombre</label></h4>
                <input name="name" class="form-control" type="text" value="{{ old('name') }}">
                <small id="passwordHelpBlock" class="form-text text-muted"><b>Nombre del nuevo cliente</b></small>
                @error('name')
                <div id="error" class="alert alert-danger mx-auto col-11 col-sm-4 col-lg-12"><span>{{ $message }}</span></div>
                @enderror
            </div>
            <div class="form-group col-12 col-md-6 col-lg-4">
                <h4><label for="">Apellido</label></h4>
                <input name="lastname" class="form-control" type="text" value="{{ old('lastname') }}">
                <small id="passwordHelpBlock" class="form-text text-muted"><b>Apellido del nuevo cliente</b></small>
                @error('lastname')
                <div id="error" class="alert alert-danger mx-auto col-11 col-sm-4 col-lg-12"><span>{{ $message }}</span></div>
                @enderror
            </div>
            {{-- <div class="form-group col-md-4 mx-auto">
                <h4><label for="">Subategoria</label></h4>
               <select class="form-control mb-1" name="subcategory" value="{{ old('subcategory') }}" required id="">
                    <option value="">Elija una subcategoria</option>
                    @foreach($subcategories as $subcategory)
                    <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                    @endforeach
                </select>
                <small id="passwordHelpBlock" class="form-text text-muted"><b>Categoria a la que pertenece</b></small>
            </div> --}}
            <div class="form-group col-12 col-md-6 col-lg-4">
                <h4><label for="">Cuit</label></h4>
                <input name="cuit" class="form-control" type="number" value="{{ old('cuit') }}" required>
                <small id="passwordHelpBlock" class="form-text text-muted"><b>Cuit del nuevo cliente</b></small>
                @error('cuit')
                <div id="error" class="alert alert-danger mx-auto col-11 col-sm-4 col-lg-12"><span>{{ $message }}</span></div>
                @enderror
            </div>
            <div class="form-row mr-1 col-12 col-md-6 col-lg-4">
                <div class="form-group col-12 m-0">
                    <h4 class="m-0"><label class="m-0" for="">Direccion</label></h4>
                </div>
                <div class="form-group m-0 col-12 col-md-6 col-lg-6">
                    <label for="">Calle</label>
                    <input name="street" class="form-control" type="text" value="" readonly>
                    <small id="passwordHelpBlock" class="form-text text-muted"><b>Calle del nuevo cliente</b></small>

                </div>
                <div class="form-group m-0 col-12 col-md-6 col-lg-6">
                    <label for="">Numero</label>
                    <input name="number" class="form-control" type="text" value="" readonly>
                    <small id="passwordHelpBlock" class="form-text text-muted"><b>Numero del nuevo cliente</b></small>
                </div>
                <div class="form-group m-0 col-12 col-md-6 col-lg-6">
                    <label for="">Localidad</label>
                    <input name="street" class="form-control" type="text" value="" readonly>
                    <small id="passwordHelpBlock" class="form-text text-muted"><b>Localidad del nuevo cliente</b></small>
                </div>
                 <div class="form-group my-auto m-0 col-12 col-md-6 col-lg-6" style="display: inline-grid" >
                     <a href="{{route('client.index')}}"><button class="btn btn-admin btn-block" type="button">Agregar Direccion</button></a>
                </div>
            </div>
            <div class="form-group col-12 col-md-6 col-lg-4">
                <h4><label for="">Descripcion</label></h4>
                <textarea name="description" class="form-control" id="" cols="30" rows="5"></textarea>
                <small id="passwordHelpBlock" class="form-text text-muted"><b>Descripcion del nuevo cliente</b></small>
                @error('description')
                <div id="error" class="alert alert-danger mx-auto col-11 col-sm-4 col-lg-12"><span>{{ $message }}</span></div>
                @enderror
            </div>
        </div>
        <div id="buttons" class="text-center col-12">
            <button class="mx-2 btn btn-admin" type="submit">Agregar</button>
            <a href="{{route('client.index')}}"><button class="btn btn-admin" type="button">Cancelar</button></a>
        </div>
    </form>
</div>
@endsection