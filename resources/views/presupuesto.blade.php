@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
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
                <td>{{$item->price}}€</td>
                <td><input class="elemento-calculadora" type="number" name="" value="1" id="{{$item->id}}"></td>
                <td>
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
                </td>
            </tr>
        </tbody>
    </table>  
    <div  class="col-8 p-0 mx-auto">
      <table class="table table-responsive-xs table-bordered">
          <thead class="thead-light">
              <th scope="col">Código</th>
              <th scope="col">Precio</th>
              <th scope="col">Cant</th>
              <th scope="col">Descripción</th>
            </thead>
    </div>
          <tbody>
            @else
            <tr id="{{$item->id}}">
              <th scope="row"><label for="">{{$item->id}}</label> </th>
              <th><input class="w-75"readonly value="{{$item->price}}"> €</input></th>
              <th><input type="number" onchange="calcularParcial(this.id)" type="number" value="0" id="{{$item->id}}"></th>
              <th>{{$item->description}}</th>
            </tr>
            @endif
            @endforeach
          </tbody>
        </table>
        <p>TOTAL: <input readonly value="0" id="total"></input></p>
      </div>
  </div>

  @endsection
