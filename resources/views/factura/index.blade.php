@extends('maestro')
@section('card-header')
<div class="row">
  <div class="col-md-6 text-left">
    USUARIOS
  </div>
  <div class="col-md-6 text-right">
    <a href="{{asset('/index.php/register')}}"  class="nuevo" data-target=""> <li class="fa fa-plus"></li>  Nuevo USUARIO</a> <br/>
  </div>
</div>
@endsection


@section('empleado')   @endsection
@section('titulo') Usuarios @endsection

@section('menuUsuario')
active
@endsection

@section('cuerpo')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">  </div>
                    <div class="panel-body">
                        <table id="tablaAgenda" class="table display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Usuario</th>
                                    <th>Nombres y Apellidos</th>
                                    <th>Grupo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datos as $dato)
                                    <tr data-id="{{ $dato->id }}">
                                        <td>{{$dato->id}}</td>
                                        <td>{{$dato->name}} </td>
                                        <td>{{$dato->email}}</td>
                                        <td>
                                          @if($dato->grupo == "1" )
                                            Adminsitrador
                                          @elseif($dato->grupo == "2" )
                                            Cocina
                                          @elseif($dato->grupo == "3" )
                                            Reporte
                                          @endif
                                        </td>
                                        <td>
                                              <a href="#modalModifiar"  data-toggle="modal" data-target="" class="actualizar" style="color: #B8823B;"> <li class="fa fa-edit"></li>Editar</a> &nbsp;&nbsp;&nbsp;
                                              <!--<a href="#"  data-toggle="modal" data-target="" style="color: #ff0000;" class="eliminar"> <li class="fa fa-trash"></li>Desactivar</a>-->
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! Form::open(['route'=>['Empleado.destroy', ':DATO_ID'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}
                        {!! Form::close() !!}
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
