@extends('maestro')
@section('card-header')
<div class="row">
  <div class="col-md-6 text-left">
    PREPARADO
  </div>
  <div class="col-md-6 text-right">

  </div>
</div>
@endsection


@section('empleado')   @endsection
@section('titulo') Preparado @endsection

@section('menuPreparado')
class="active"
@endsection

@section('cuerpo')
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading"> </div><br>
      <div class="panel-body">

<div class="row">
  @foreach($datos as $dato)
  <div class="col-md-4">
    <h3>{{$dato->nombre}} - {{$dato->mesa}}</h3>
    <?php $detalles = \DB::table('detalles')->where('id_pedido', '=', $dato->id)->get(); ?>
    <ul>
      @foreach($detalles as $detalle)
      <li> {{$detalle->detalle}} - {{$detalle->cantidad}} </li>
      @endforeach
    </ul>


    @if($dato->estado =='pedido')
    <a href="{{asset('/index.php/Preparado/Pedido/'.$dato->id)}}" class="btn btn-primary">Pedido</a>
    @elseif( $dato->estado =='preparar')
    <a href="{{asset('/index.php/Preparado/Preparar/'.$dato->id)}}" class="btn btn-success">Preparado</a>
    @elseif( $dato->estado =='servir')
    <a href="#" class="btn btn-danger">Servir</a>
    @endif
  </div>
  @endforeach
</div>


      </div>
    </div>
  </div>
</div>
@endsection
