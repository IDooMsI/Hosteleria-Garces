@extends('layouts.app')
@section('content')
<div class="row justify-content-around mt-3 w-100">
    @if (count($publications) > 0)
    @foreach ($publications as $publication)   
    <div class="col-10 col-md-6 col-lg-4">
        <img id="{{$publication->id}}" class="w-100" src="{{asset('storage/'.$publication->imagenes[0]->name)}}" alt="">
        <div class="row ml-5" style="margin-left: 35% !important;">
            @foreach ($publication->imagenes as $imagen)
            <img class="marco" id="{{$imagen->id}}" onclick="choice(this.id, {{$publication->id}})" style="width:20%; height:15%" src="{{asset('storage/'.$imagen->name)}}" alt="">
            @endforeach
        </div>
    </div>
    @endforeach
    @else
    <div class="mt-5" style="height: 20rem">
        <h1>No hay publicaciones para la categoria {{ request()->path() }}</h1>
    </div>
    @endif 
</div>
@endsection


