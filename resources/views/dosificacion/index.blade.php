@extends('maestro')
@section('card-header')
<div class="row">
  <div class="col-md-6 text-left">
    DOSIFICACION
  </div>
  <div class="col-md-6 text-right">
    <a href="#NuevoDosificacion"   data-toggle="modal" class="nuevo" data-target=""> <li class="fa fa-plus"></li> Nuevo DOSIFICACION</a> <br/>
  </div>
</div>
@endsection


@section('empleado')   @endsection
@section('titulo') Dosificacion @endsection

@section('menuDosificacion')
class="active"
@endsection


@section('cuerpo')
<style>

</style>
<br>
<div class="panel">
  <div class="panel-body panel-info">
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

<a href="#dosificacionActual" data-toggle="modal" class="btn btn-info">
<li class="fa fa-check-square"></li> Ver Dosificaci&oacute;n Actual</a>

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<br><br>
<table id="tablaAgenda" class="table table-bordered table-hover" cellspacing="0" width="100%">
    <thead>
    <tr>
        <td>#</td>
        <th>Nro Â° Factura</th>
        <th>NIT</th>
        <th>NÂ° de Autorizacion</th>
        <th>Fecha De Registro</th>
        <th>Opciones</th>
    </tr>
    </thead>
    <tbody>
      <?php $i=1;?>
    @foreach($dosificaciones as $dosificacion)
        <tr>
            <td><?php echo $i++;?></td>
            <td>{{$dosificacion->numero_factura}}</td>
            <td>{{$dosificacion->nit}}</td>
            <td>{{$dosificacion->nro_autorizacion}}</td>
            <td>{{$dosificacion->created_at}}</td>
            <td>
                <!--<a href="#ActualizarDosificacion" data-toggle="modal" class="config"  onclick="ver(this.id);" id="{{$dosificacion->id}}"><li class="fa fa-edit"></li> Editar</a>-->
                <!--&nbsp;&nbsp;&nbsp;&nbsp;<a href="#EliminarDosificacion" style="color:#F3565D;" onclick="eliminar(this.id);" id="{{$dosificacion->id}}" data-toggle="modal" class="config"><span class="fa fa-trash-o"></span> Eliminar</a>-->
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
</div>
@stop


@section('modal1')
<div class="modal fade" id="NuevoDosificacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content panel panel-success">
            <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Nuevo Dosificacion</h4>
            </div>
            <div class="modal-body">
              {!! Form::open(array('url' => 'Dosificacion', 'method' => 'post')) !!}
            <table class="table table-hover">
              <tr>
                <td>Numero de Factura</td>
                <td><input type="text" name="numero_factura" class='form-control' ></td>
              </tr>
              <tr>
                <td>NIT</td>
                <td><input type="text" name="nit" class='form-control' ></td>
              </tr>
              <tr>
                <td>NÂ° de Autorizaci&oacute;n</td>
                <td><input type="text" name="nro_autorizacion" class='form-control' ></td>
              </tr>
              <tr>
                <td>Llave</td>
                <td><input type="text" name="llave" class='form-control' ></td>
              </tr>
              <tr>
                <td>Fecha Limite de EmisiÃ³n</td>
                <td><input type="text" name="fecha_limite_emision" class='form-control' ></td>
              </tr>
              <tr>
                <td>Titulo</td>
                <td><input type="text" name="titulo" class='form-control' ></td>
              </tr>
              <tr>
                <td>Leyenda 1</td>
                <td>
                    <textarea name="leyenda1" class='form-control'  rows="4"></textarea>
                </td>
              </tr>
              <tr>
                <td>Leyenda 2</td>
                <td>
                  <textarea name="leyenda2" class='form-control'  rows="4"></textarea>
                  </td>
              </tr>
              <tr>
                <td></td>
                <td align="right"><input type="submit" name="Registrar" class='btn btn-success' value="Registrar"></td>
              </tr>
            </table>
            {!! Form::close() !!}
            </div>
            <div class="modal-footer">
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@stop
<style>
.campo
{
  font-weight: bold;
}
</style>

@section('modal2')
<div class="modal fade" id="dosificacionActual" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content panel panel-info">
            <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Dosificaci&oacute;n Actual</h4>
            </div>
            <div class="modal-body">
              <table class="table table-bordered">
                <tr>
                  <td class="campo">NIT</td>
                  <td>{{$actual->nit or 'Default'}}</td>
                  <td class="campo">Numero de Factura</td>
                  <td>{{$actual->numero_factura or 'Default'}}</td>
                  <td class="campo">Numero de Autorizaci&oacute;n</td>
                  <td>{{$actual->nro_autorizacion or 'Default'}}</td>
                </tr>
                <tr>
                  <td class="campo">Titulo</td>
                  <td>{{$actual->titulo or 'Default'}}</td>
                  <td class="campo">Fecha De registro</td>
                  <td>{{$actual->created_at or 'Default'}}</td>
                  <td class="campo">Fecha Limite de Emision</td>
                  <td>{{$actual->fecha_limite_emision or 'Default'}}</td>
                </tr>
                <tr>
                  <td class="campo">Llave</td>
                  <td colspan="5">{{$actual->llave or 'Default'}}</td>
                </tr>
                <tr>
                  <td class="campo">Leyenda1</td>
                  <td colspan="5">{{$actual->leyenda1 or 'Default'}}</td>
                </tr>
                <tr>
                  <td class="campo">Leyenda2</td>
                  <td colspan="5">{{$actual->leyenda2 or 'Default'}}</td>
                </tr>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@stop

@section('modal3')
<div class="modal fade" id="ActualizarDosificacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content panel panel-success">
            <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Actualizar Dosificaci&oacute;n</h4>
            </div>
            <div class="modal-body">
              {!! Form::open(array('url' => 'SIIM/Dosificacion/update', 'method' => 'PATCH')) !!}
            <table class="table table-hover">
              <tr>
                <td>Numero de Factura</td>
                <td><input type="text" name="numero_factura" id="numero_factura" class='form-control' ></td>
              </tr>
              <tr>
                <td>NIT</td>
                <td><input type="text" name="nit" class='form-control' id="nit" ></td>
              </tr>
              <tr>
                <td>NÂ° de Autorizaci&oacute;n</td>
                <td><input type="text" name="nro_autorizacion" id="nro_autorizacion" class='form-control' ></td>
              </tr>
              <tr>
                <td>Llave</td>
                <td><input type="text" name="llave" id="llave" class='form-control' ></td>
              </tr>
              <tr>
                <td>Llave</td>
                <td><input type="text" name="fecha_limite_emision" id="fecha_limite_emision" class='form-control' ></td>
              </tr>
              <tr>
                <td>Titulo</td>
                <td><input type="text" name="titulo" id="titulo" class='form-control' ></td>
              </tr>
              <tr>
                <td>Leyenda 1</td>
                <td>
                    <textarea name="leyenda1" id="leyenda1" class='form-control'  rows="4"></textarea>
                </td>
              </tr>
              <tr>
                <td>Leyenda 2</td>
                <td>
                  <textarea name="leyenda2" id="leyenda2" class='form-control'  rows="4"></textarea>
                  </td>
              </tr>
              <tr>
                <td></td>
                <td align="right"><input type="submit" name="ejecutar" class='btn btn-success' value="Actualizar"></td>
              </tr>
              <input type="hidden" name="id" id="id">
            </table>
            {!! Form::close() !!}
            </div>
            <div class="modal-footer">
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@stop

@section('modal4')
<div class="modal fade" id="EliminarDosificacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Desea Eliminar Dosificacion?</h4>
            </div>
      <div class="modal-footer">
        {!! Form::open(['route'=>['Dosificacion.destroy', ':DATO_ID'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}
      <input type="submit" class="btn blue" value="Aceptar">
      <input type="hidden" name="id_borrar" id="id_borrar" value="">
      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
      {!! Form::close() !!}
      </div>
</div>
@stop
@section('js')
<script>
$(document).ready(function(){
            $('#tablaAgenda').DataTable({
                "order": [[ 0, 'asc']],
                "language":
                {
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

function ver(id)
{
  event.preventDefault();
  url  = '{{ asset("/index.php/SIIM/Dosificacion")}}/'+id;

 $.getJSON(url, null, function(data) {
     if(data.length>0)
     {
         $.each(data, function(field, e)
         {
             $('#numero_factura').val(e.numero_factura);
             $('#nit').val(e.nit);
             $('#nro_autorizacion').val(e.nro_autorizacion);
             $('#llave').val(e.llave);
             $('#fecha_limite_emision').val(e.fecha_limite_emision);
             $('#titulo').val(e.titulo);
             $('#leyenda1').val(e.leyenda1);
             $('#leyenda2').val(e.leyenda2);
             $('#id').val(e.id);

         });
     }
 });
}
function eliminar(id)
{
var form = $('#form-delete');
var url = form.attr('action').replace(':DATO_ID',id);
var data = form.serialize();
$("#id_borrar").val(id);
}
</script>
@stop
