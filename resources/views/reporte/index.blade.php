@extends('maestro')
@section('card-header')
<div class="row">
  <div class="col-md-6 text-left">
    REPORTE
  </div>
  <div class="col-md-6 text-right">
  </div>
</div>
@endsection

@section('empleado')   @endsection
@section('titulo') Unidades @endsection

@section('menuReporte')
class="active"
@endsection

@section('cuerpo')
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading"></div>
      <div class="panel-body">

        <form class="" action="{{asset('/index.php/Reporte')}}" method="post">
          {!! csrf_field() !!}
          <div class="row" >
              <div class="col-md-4">
                <input type="date" name="inicio" id="inicio" value="" placeholder="Fecha Inicio" class="form-control">
              </div>
              <div class="col-md-4">
                <input type="date" name="fin" id="fin" value="" placeholder="Fecha Final" class="form-control">
              </div>

              <div class="col-md-2">
                <button type="submit" name="button" value="web" class="btn btn-primary"> Reporte Web</button>
              </div>
              <div class="col-md-2">
                <button type="submit" name="button" value="pdf" class="btn btn-danger"> Reporte Pdf</button>
              </div>
          </div>
        </form>
<br><br>

        @isset( $datos )
        <table class="table">
          <thead>
            <tr>
              <th>Nro</th>
              <th>Fecha</th>
              <th>Nombre</th>
              <th>C.I.</th>
              <th>Cantidad</th>
              <th>Total</th>
              <th>Usuario</th>
            </tr>
          </thead>
          <tbody><?php $i=1; ?>
            @foreach($datos as $dato)
              <tr>
                <td>{{$i}}</td>
                <td>{{$dato->fecha}}</td>
                <td>{{$dato->nombre}}</td>
                <td>{{$dato->nit}}</td>
                <td>{{$dato->cantidad}}</td>
                <td>{{$dato->total}}</td>
                <td>{{$dato->name}}</td>
              </tr>
            <?php $i++; ?>
            @endforeach
          </tbody>
        </table>
        @endisset

      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
  jQuery(document).ready(function(){
    jQuery('#tablaAgenda').DataTable({
      "order": [[ 0, 'desc']],
      "language": {
        "bDeferRender": true,
        "sEmtpyTable": "No ay registros",
        "decimal": ",",
        "thousands": ".",
        "lengthMenu": "Mostrar _MENU_ datos por registros",
        "zeroRecords": "No se encontro nada,  lo siento",
        "info": "Mostrar paginas [_PAGE_] de [_PAGES_]",
        "infoEmpty": "No ay entradas permitidas",
        "search": "Buscar ",
        "infoFiltered": "(Busqueda de _MAX_ registros en total)",
        "oPaginate":{
          "sLast":"Final",
          "sFirst":"Principio",
          "sNext":"Siguiente",
          "sPrevious":"Anterior"
        }
      }
    });
  });
</script>
@endsection
