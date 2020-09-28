@extends('layouts.app')
@section('content')
<div class="col-12">
    <div class="mx-auto text-center col-12">
        <h2>Subcategoria Principal</h2>
        <a href="{{route('admin')}}" style="text-decoration: none; color:black"><i class="fas fa-arrow-circle-left"></i> Volver</a>
    </div>
    <div class="row justify-content-center mx-auto mb-3 col-12 col-md-8 col-lg-6 col-xl-4">
        <div class="my-3 col-6 col-md-4">
            <a href="{{route('subcategory.create')}}"><button class="btn btn-outline-dark rounded-pill w-100">Nueva</button></a>
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
                <th scope="col">Nombre</th>
                <th scope="col">Categoria</th>
                <th scope="col" colspan="2">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @if (isset($subcategories))
            @foreach($subcategories as $subcategory => $data)
            <tr>
                <th scope="row">{{$data->id}}</th>
                <th>{{ Ucfirst($data->name) }}</th>
                @if ($data->category)
                    <th>{{ Ucfirst($data->category->name) }}</th>
                @else
                    <th class="text-danger">No tiene. Por favor Asigne una</th>
                @endif
                <th><a href="{{ route('subcategory.edit',['subcategory'=>$data]) }}"><span class="material-icons" title="Editar">edit</span></a></th>
                <th><a href="{{ route('subcategory.delete',['id'=>$data->id]) }}"><span class="material-icons" title="Eliminar">delete_outline</span></a></th>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>
@endsection