@extends('layouts.app')
@section('content')
<div class="container">
     <div class="card my-5">
        <div class="card-header text-center">
            <h3>Datos del trabajo</h3>
        </div>
        <div class="table table-hover" style="overflow-x:auto;">
            <table class="mx-auto" >
                <thead>
                    <tr>
                        <th>Numero</th>
                        <th>Factura</th>
                        <th>Monto</th>
                        <th>Creado</th>
                        <th>Realizado</th>
                        <th>Tecnico</th>
                        <th>Cliente</th>
                    </tr>
                </thead> 
                <tbody>
                    <tr>
                        <th>{{ $work->id }}</th>
                        <th>{{ $work->fc_number }}</th>
                        <th>{{ $work->price }}</th>
                        <th>{{ $work->created_at }}</th>
                        @if($work->updated_at != $work->created_at)        
                        <th>{{ $work->updated_at }}</th>
                        @else
                        <th>{{ Ucfirst('trabajo no finalizado')}}</th>
                        @endif
                        @if($work->user)
                        <th>{{ Ucfirst($work->user->name)}}</th>
                        @else
                        <th>{{ Ucfirst('trabajo no finalizado')}}</th>
                        @endif
                        @if($work->client)
                        <th>{{ Ucfirst($work->client->name)}}</th>
                        @endif        
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
     <div class="card-header text-center">
        <h3>Imagenes</h3>
    </div>
    @if(isset($images))
    <form class="row" action="{{route('publication.create')}}" method="get" enctype="multipart/form-data">
        @csrf
        @foreach ($images as $image)
        <div class="col-4 text-center border">
            <input type="checkbox" name="images[]" value="{{ $image->id }}"><img class="w-100" src="{{ asset('/storage/'.$image->name) }}" alt="">    
        </div>
        @endforeach
        <div class="col-12 text-center mt-3">
            <a href="{{ route('work.index') }}"><button class="btn btn-outline-dark">Volver</button></a>
            <button class="btn btn-outline-dark">Crear Publicacion</button>
        </div>
    </form>
    @endif
</div>
@endsection