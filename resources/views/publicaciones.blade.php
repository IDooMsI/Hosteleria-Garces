@extends('layouts.app')
@section('content')

<div class="row mt-4">
    @foreach ($publications as $publication)
    <div class="col-9 mx-auto" id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach ($publication->imagenes as $imagen)
            <div class="carousel-item active">
                <img src="{{asset('storage/'.$imagen->name)}}" alt="">
            </div>            
            @endforeach
        </div>
        
        @endforeach
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

@endsection


