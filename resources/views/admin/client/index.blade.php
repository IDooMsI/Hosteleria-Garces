@extends('layouts.app')
@section('content')
<div class="col-12">
    <div class="mx-auto text-center col-12">
        <h2>Clientes</h2>
        <a href="{{route('admin')}}" style="text-decoration: none; color:black"><i class="fas fa-arrow-circle-left"></i> Volver</a>
    </div>
    <div class="row justify-content-center mx-auto mb-3 col-12 col-md-8 col-lg-6 col-xl-4">
        <div class="my-3 col-6 col-md-4">
            <a href="{{route('client.create')}}"><button class="btn btn-admin rounded-pill w-100">Nuevo</button></a>
        </div>
    </div>
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
                <th scope="col">Titulo</th>
                <th scope="col">Link</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Subcategoria</th>
                <th scope="col">Imagen/Video</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @if (isset($clients))
            @foreach($clients as $client => $data)
            <tr>
                <th scope="row">{{$data->id}}</th>
                <th>{{$data->title}}</th>
                <th>{{Str::limit($data->link,10)}}</th>
                <th>{{Str::limit($data->description,20)}}</th>
                @if(isset($data->subcategory))
                <th>{{$data->subcategory->name}}</th>
                @endif
                <th>{{Str::limit($data->image,10)}}</th>
                <th>
                </th>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>
@endsection