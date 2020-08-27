@extends('layouts.app')
@section('content')
<div class="col-12">
    <div class="mx-auto text-center col-12">
        <h2>Clientes</h2>
        <a href="{{route('admin')}}" style="text-decoration: none; color:black"><i class="fas fa-arrow-circle-left"></i> Volver</a>
    </div>
    <div class="row justify-content-center mx-auto mb-3 col-12 col-md-8 col-lg-6 col-xl-4">
        <div class="my-3 col-6 col-md-4">
            <a href="{{route('client.create')}}"><button class="btn btn-outline-dark rounded-pill w-100">Nuevo</button></a>
        </div>
    </div>
    <form id="form-search" class="col-12 col-md-6 col-lg-6 mx-auto text-center" action="{{route('client.search')}}" method="get">
        @csrf
        <div class="" style="display:inline">
            <div class="col-6 mx-auto mb-2">
                <button id="button-buscador" type="button" onclick="openBuscador()" class="btn btn-outline-dark rounded-pill w-50 mx-auto">Buscador</button>
            </div>
            @if (Request::url() == route('client.search'))
            <div class="col-6 mx-auto mb-2">
                <a href="{{ route('client.index') }}"><button type="button" id="button-buscador" class="btn btn-outline-dark rounded-pill w-50 mx-auto">Mostrar Todos</button></a>
            </div>
            @endif
        </div>
        <div id="div-buscador" class="row" style="display: none">
            <div class="col-6 mx-auto mb-2">
                <button onclick="preSubmit()" class="btn btn-outline-dark rounded-pill w-50 mx-auto">Buscar</button>
            </div>
            <div class="col-6 mx-auto mb-2">
                <button type="button" onclick="closeBuscador()" class="btn btn-outline-dark rounded-pill w-50 mx-auto">Cancelar</button>
            </div>
            <div class="form-group col-6">
                <input id="input-search" name="search" type="text" class="form-control" placeholder="Busqueda">
            </div>
            <div class="input-group col-6">
                <select class="custom-select" name="category" id="select-search">
                    <option value="">Buscar por...</option>
                    <option value="name">Nombre</option>
                    <option value="lastname">Apellido</option>
                    <option value="cuit">Cuit</option>
                    <option value="phone">Telefono</option>
                    <option value="street">Calle</option>
                    <option value="locality">Localidad</option>
                </select>
            </div>
        </div>
    </form>
    <div class="my-2 col-12 text-center">
        @if(Session::has('notice'))
        <h3 class="my-auto text-success"><strong>{{ Session::get('notice') }}</strong></h3>
        @endif
    </div>
</div>
<div class="table table-hover" style="overflow-x:auto;">
    <table class="mx-auto">
        <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Cuit</th>
                <th scope="col">Telefono</th>
                <th scope="col">Calle</th>
                <th scope="col">Altura</th>
                <th scope="col">Localidad</th>
                <th scope="col" colspan="3">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @if (isset($clients))
            @foreach($clients as $client => $data)
            <tr>
                <th scope="row">{{$data->id}}</th>
                <th>{{ Ucfirst($data->name) }}</th>
                <th>{{ Ucfirst($data->lastname) }}</th>
                <th>{{ $data->cuit }}</th>
                <th>{{ $data->phone }}</th>
                <th>{{ Ucfirst($data->address->street) }}</th>
                <th>{{ $data->address->number }}</th>
                <th>{{ Ucfirst($data->address->locality->name) }}</th>
                <th><a href="{{ route('client.edit',['client'=>$data]) }}"><span class="material-icons" title="Editar">edit</span></a></th>
                <th><a href="{{ route('client.delete',['id'=>$data->id]) }}"><span class="material-icons" title="Eliminar">delete_outline</span></a></th>
                <th><a href="{{ route('work.asignee',['id'=>$data->id]) }}" title="Crear trabajo"><span class="material-icons">assignment</span></a></th>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
    <div class="col-12 text-center">
        @if(Session::has('no-results'))
        <h3 class="my-auto text-success"><strong>{{ Session::get('no-results') }}</strong></h3>
        @endif
    </div>
</div>
@endsection