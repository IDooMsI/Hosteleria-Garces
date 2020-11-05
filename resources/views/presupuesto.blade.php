@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row mt-5">
    <div class="col-12">
    <h3 class="text-center">INSTALACIONES DE CONDUCTO</h3>
    </div>
    @foreach ($items as $item)
    @if ($item->id == 1)
    <table class="table table-responsive-sm table-bordered">
        <thead class="thead-light">
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Precio</th>
                <th scope="col">Cant</th>
                <th scope="col">Descripción</th>
            </tr>
        </thead>
        <tbody>
            <tr id="{{$item->id}}">
                <th scope="row">{{$item->id}}</th>
                <th><label id="precioBase" type="number" value="{{$item->price}}" readonly>{{$item->price}}</label><span>€</span></th>
                <th><label id="cantidadBase" id="{{$item->id}}">1</label></th>
                <th>
                    <ul>
                      <li>DESMONTAJE Y MONTAJE DE FALSO DESMONTABLE</li>
                      <li>INSTALACIÓN DE UNIDAD INTERIOR Y EXTERIOR EN SITIOS DE FÁCIL ACCESO</li>
                      <li>SOPORTES Y AMORTIGUADORES ANTIVIBRATORIOS</li>
                      <li>EMBOQUE DE FIBRA DESDE EQUIPO A CONDUCTO (MAX 0,80 CM)</li>
                      <li>COLOCACIÓN DE TERMOSTATO DE PARED EN SU CAJA PREVISTA</li>
                      <li>CONEXIÓN A DESAGÜES EXISTENTES</li>
                      <li>PUESTA EN MARCHA, REGULACIÓN DE CAUDAL Y CONTROL GENERAL DE EQUIPOS</li>
                      <li>CERTIFICADO DE EMPRESA INSTALADORA AUTORIZADA</li>
                    </ul>
                </th>
            </tr>
        </tbody>
    </table>  
    <div  class="col-8 p-0 mx-auto">
      <table class="table table-responsive-xs table-bordered">
          <thead class="thead-light">
              <th scope="col">Código</th>
              <th scope="col">Precio</th>
              <th scope="col">Cant</th>
              <th scope="col">Total</th>
              <th scope="col">Descripción</th>
          </thead>
    </div>
          <tbody>
            <div class="col-12">
              <h4 class="text-center">EXTRAS</h4>
            </div>
            @else
            <tr id="{{$item->id}}">
              <th scope="row"><label for="">{{$item->id}}</label> </th>
              <th><label>{{$item->price}}</label>€</th>
              <th><input type="number" onchange="calcularParcial(this.id)" type="number" value="" id="{{$item->id}}"></th>
              <th><label class="subtotal" type="number">0</label>€</th>
              <th>{{$item->description}}</th>
            </tr>
            @endif
            @endforeach
          </tbody>
        </table>
          <p><strong> TOTAL: <label id="total"></label>€</strong></p>
          <div class="row justify-content-center">
            <h3 class="text-center col-12">INSTALACIONES DE SPLITS</h3>
            <a href="{{asset('/storage/CONDICIONES-SPLITS-2020.pdf')}}" download><button class="mb-3 btn btn-success rounded-pill" type="button">DESCARGAR PRESUPUESTO SPLITS</button></a>
          </div>
      </div>
    </div>
@stop
@section('scripts')
  <script src="{{asset('js/presupuesto.js')}}"></script>
@endsection
