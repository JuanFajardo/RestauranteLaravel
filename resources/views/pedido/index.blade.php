@extends('maestro')
@section('card-header') Pedido  @endsection


@section('empleado')   @endsection
@section('titulo') Pedido @endsection


@section('modal1')
<div id="modalAgregar" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content panel panel-primary">

      <div class="modal-header panel-heading">
        <b>Insertar nuevo Menu</b>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body panel-body">
        {!! Form::open(['accept-charset'=>'UTF-8', 'enctype'=>'multipart/form-data', 'method'=>'POST', 'files'=>true, 'autocomplete'=>'off', 'id'=>'form-insert'] ) !!}

        <div class="row">
          <div class="col-md-6">
            <label for="nombre_" > <b><i>Nombre Completo</i></b> </label>
            {!! Form::text('nombre', null, ['class'=>'form-control letras', 'placeholder'=>'Nombre Completo', 'id'=>'nombre_', 'required']) !!}
          </div>
          <div class="col-md-4">
            <label for="ci_" > <b><i>Carnet Identidad</i></b> </label>
            {!! Form::text('ci', null, ['class'=>'form-control', 'placeholder'=>'ci', 'id'=>'ci_', 'required']) !!}
          </div>
          <div class="col-md-2">
            <label for="mesa_" > <b><i>Mesa</i></b> </label>
            {!! Form::text('mesa', null, ['class'=>'form-control', 'placeholder'=>'Mesa', 'id'=>'mesa_', 'required']) !!}
          </div>
        </div>

        <hr>

        {!! Form::hidden('telefono', '0') !!}
        {!! Form::hidden('direccion', '0') !!}
        {!! Form::hidden('tipo', 'Local') !!}
        {!! Form::hidden('latitud', '0') !!}
        {!! Form::hidden('longitud', '0') !!}


        {!! Form::hidden('id_usuario', '1') !!}
        {!! Form::submit('A&ntilde;adir', ['class'=>'agregar btn btn-primary']) !!}
        {!! Form::close() !!}
      </div>

    </div>
  </div>
</div>
@endsection

@section('modal2')
    <div id="modalModifiar" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content panel panel-warning ">

                <div class="modal-header panel-heading">
                    <b>Actualizar Proveedor</b>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body panel-body">
                    {!! Form::open(['route'=>['Proveedor.update', ':DATO_ID'], 'method'=>'PATCH', 'id'=>'form-update' ])!!}

                    <div class="row">
                      <div class="col-md-6">
                        <label for="nombre_" > <b><i>Nombre Completo</i></b> </label>
                        {!! Form::text('nombre', null, ['class'=>'form-control letras', 'placeholder'=>'Nombre Completo', 'id'=>'nombre', 'required']) !!}
                      </div>
                      <div class="col-md-4">
                        <label for="ci_" > <b><i>Carnet Identidad</i></b> </label>
                        {!! Form::text('ci', null, ['class'=>'form-control', 'placeholder'=>'ci', 'id'=>'ci', 'required']) !!}
                      </div>
                      <div class="col-md-2">
                        <label for="mesa_" > <b><i>Mesa</i></b> </label>
                        {!! Form::text('mesa', null, ['class'=>'form-control', 'placeholder'=>'Mesa', 'id'=>'mesa', 'required']) !!}
                      </div>
                    </div>

                    <hr>

                    {!! Form::hidden('telefono', '0') !!}
                    {!! Form::hidden('direccion', '0') !!}
                    {!! Form::hidden('tipo', 'Local') !!}
                    {!! Form::hidden('latitud', '0') !!}
                    {!! Form::hidden('longitud', '0') !!}

                    {!! Form::hidden('id_usuario', '1') !!}

                    {!! Form::submit('Actualizar ', ['class'=>'btn btn-warning']) !!}
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
@endsection


@section('cuerpo')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="#modalAgregar"   data-toggle="modal" class="nuevo" data-target=""> <li class="fa fa-plus"></li> Nuevo Pedido</a>  </div>
                    <div class="panel-body">
                        <table id="tablaAgenda" class="table display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Direccion</th>
                                    <th>Tipo</th>
                                    <th>Mesa</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datos as $dato)
                                    <tr data-id="{{ $dato->id }}">
                                        <td>{{$dato->id}}</td>
                                        <td>{{$dato->nombre}}</td>
                                        <td>{{$dato->direccion}}</td>
                                        <td>
                                          @if( $dato->tipo == "Local" )
                                          <span class="badge badge-primary">Local</span>
                                          @else
                                          <span class="badge badge-danger">Pedido</span>
                                          @endif
                                          </td>
                                        <td>{{$dato->mesa}}</td>
                                        <td>
                                          <a href="#modalModifiar"  data-toggle="modal" class="actualizar" style="color: #B8823B;"> <li class="fa fa-edit"></li>Editar</a> &nbsp;&nbsp;&nbsp;
                                          @if( $dato->tipo != "Local")
                                          <a href="{{asset('index.php/Mapa/'.$dato->id)}}"  data-toggle="modal" data-target="" style="color: blue;" class="eliminar"> <li class="fa fa-eye"></li>Ver</a>
                                          @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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

        jQuery('.nuevo').click(function(event){
          event.preventDefault();
          jQuery('#form-insert').closest('form').find("input[type=text], textarea").val("");
        });

        jQuery('.actualizar').click(function(event){
            event.preventDefault();
            var fila = jQuery(this).parents('tr');
            var id = fila.data('id');
            var form = jQuery('#form-update')
            var url = form.attr('action').replace(':DATO_ID', id);
            form.get(0).setAttribute('action', url);
            link  = '{{ asset("/index.php/Pedido/")}}/'+id;

            jQuery.getJSON(link, function(data, textStatus) {
                if(data.length > 0){
                    jQuery.each(data, function(index, el) {
                      jQuery('#nombre').val(el.nombre);
                      jQuery('#ci').val(el.ci);
                      jQuery('#mesa').val(el.mesa);
                    });
                }
            });
        });
    </script>
@endsection
