@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row mt-5">
    <div class="col-12">
    <h3 class="text-center">PLANTILLA MEDICIÓN AIRE ACONDICIONADO</h3>
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
                        <li>Toma de medidas previa en caso de contratación de instalación.</li>
                        <li>Desmontaje y montaje de flaso techo existente.</li>
                        <li>Instalación equipo interior y exterior.</li>
                        <li>Soportes necesarios para las unidades interior y exterior.</li>
                        <li>Prueba de estanqueidad o conexión entre equipos hasta 10 metros (línea frigorífica y eléctrica de interconexión).</li>
                        <li>Conexión/emboquillado a conductos existentes</li>
                        <li>Conexión a desagüe existente.</li>
                        <li>Conexión (línea eléctrica vista con canaleta) a termostato.</li>
                        <li>Puesta en funcionamiento.</li>
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
      </div>
  </div>
@stop
@section('scripts')
  <script src="{{asset('js/presupuesto.js')}}"></script>
@endsection
