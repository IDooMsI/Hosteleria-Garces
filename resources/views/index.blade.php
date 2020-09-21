@extends('layouts.app')
@section('content')
{{-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{asset('storage/banner1.jpg')}}" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('storage/banner2.jpg')}}" alt="Second slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
</div> --}}
<div class="col-xl-10 col-11 mt-5 mx-auto">
    <div class="row justify-content-center mb-5">
        <div class="col-10 col-lg-4 my-auto">
            <img src="{{asset('/storage/logo.jpg')}}" class="w-100"  alt="image-logo">
        </div>
        <div class="col-10 col-lg-6 font-weight-bold descripcion-index">
            Hosteleria Garcés es una empresa de mantenimiento, venta e instalaciones de maquinaria de Hosteleria. Respaldados por la Junta de Andalucía. Contamos con productos de primera calidad y personal profesional totalmente capacitado. 
        </div>
    </div>
    <div class="row justify-content-around w-100 m-0 marco">
        <h3 class="text-center col-12 font-italic"><strong>NUESTROS SERVICIOS</strong></h3>
        <div class="row justify-content-around w-100 mx-0">
        @foreach ($categories as $category)
        <div class="dropdown col-md-2 col-sm-4 col-6 text-center mb-2">
            <button class="btn btn-lg btn-outline-dark dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{ucfirst($category->name)}} </button>
            <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                @foreach ($category->subcategories as $subcategory)
                    @if (count($subcategory->subsubcategories)>0)
                        <li class="dropdown-submenu">
                        <a  class="dropdown-item" href="{{ route('show-publicaciones',['nombre'=>$subcategory->name]) }}">{{Ucfirst($subcategory->name)}}</a>
                        <ul class="dropdown-menu">
                            @foreach ($subcategory->subsubcategories as $subsubcategory)
                            <li class="dropdown-item"><a class="text-reset" href="{{ route('show-publicaciones',['nombre'=>$subsubcategory->name]) }}">{{Ucfirst($subsubcategory->name)}}</a></li>
                            @endforeach
                        </ul>
                    @else
                        <li class="dropdown-item"><a class="text-reset" href="{{ route('show-publicaciones',['nombre'=>$subcategory->name]) }}">{{ucfirst($subcategory->name)}}</a></li>
                    @endif
                @endforeach
            </ul>
        </div> 
        @endforeach             
        </div> 
    </div>
    <div class="row justify-content-around w-100 mx-0 marco">
        <h2 class="col-12 text-center py-4"><strong>ESTAS MARCAS CONFIAN EN NOSOTROS</strong></h2>
        <h3 class="col-12 col-md-6 order-1 order-md-1 text-center font-italic mt-4"><strong>NUESTROS PROVEEDORES:</strong></h3>
        <h3 class="col-12 col-md-6 order-3 order-md-2 text-center font-italic mt-4"><strong>SERVICIO DE ATENCIÓN TÉCNICA OFICIAL:</strong></h3>
        <div class="col-md-5 col-12 order-2 order-md-3 my-auto">
            <div class="row justify-content-around w-100 mx-0">
                <div class="col-6 d-flex align-items-center">
                    <img class="w-100" src="{{asset('storage/leroymerlin.png')}}" alt="">
                </div>
                <div class="col-6 d-flex align-items-center">
                    <img class="w-100" src="{{asset('storage/haier.png')}}" alt="">
                </div>
            </div>  
        </div>
        <div class="col-12 col-md-5 order-4 order-md-4 my-auto">
            <div class="row justify-content-around w-100 mx-0">
                <div class="col-6 d-flex align-items-center">
                    <img class="w-100" src="{{asset('storage/bricomart.png')}}" alt="">
                </div>
                <div class="col-6 d-flex align-items-center">
                    <img class="w-100" src="{{asset('storage/olimpiasplendid.png')}}" alt="">
                </div>
            </div>
        </div>
        <h3 class="col-12 col-md-6 order-5 order-md-5 text-center font-italic mt-4"><strong>ENTIDADES FINANCIERAS:</strong></h3>
        <h3 class="col-12 col-md-6 order-7 order-md-6 text-center font-italic mt-4"><strong>AVALADOS POR:</strong></h3>
        <div class="col-12 col-md-5 order-xs-6 order-md-7 my-auto">
            <div class="row justify-content-around w-100 mx-0">
                <div class="col-10 d-flex align-items-center">
                    <img class="w-100" src="{{asset('storage/caixabank.png')}}" alt="">
                </div>
            </div>
        </div>
        <div class="col-12 col-md-5 order-8 order-md-8 my-auto">
        <div class="row justify-content-around w-100 mx-0">
                <div class="col-10 d-flex align-items-center">
                    <img class="w-100" src="{{asset('storage/logo andalucia.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection