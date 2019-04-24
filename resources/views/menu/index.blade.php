@extends('maestro')
@section('card-header')
<div class="row">
  <div class="col-md-6 text-left">
    MENU
  </div>
  <div class="col-md-6 text-right">
    <a href="#modalAgregar"   data-toggle="modal" class="nuevo" data-target=""> <li class="fa fa-plus"></li> Nuevo MENU</a> <br/>
  </div>
</div>
@endsection


@section('empleado')   @endsection
@section('titulo') Proveedor @endsection

@section('menuMenu')
class="active"
@endsection

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
            <label for="menu_" > <b><i>Menu</i></b> </label>
            {!! Form::text('menu', null, ['class'=>'form-control letras', 'placeholder'=>'Menu', 'id'=>'menu_', 'required']) !!}
          </div>
          <div class="col-md-3">
            <label for="precio_" > <b><i>Precio</i></b> </label>
            {!! Form::text('precio', null, ['class'=>'form-control', 'placeholder'=>'Precio', 'id'=>'precio_', 'required']) !!}
          </div>
          <div class="col-md-3">
            <label for="fecha_" > <b><i>Fecha</i></b> </label>
            {!! Form::date('fecha', null, ['class'=>'form-control', 'placeholder'=>'Fecha', 'id'=>'fecha_', 'required']) !!}
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <label for="imagen_" > <b><i>Imagen</i></b> </label>
            {!! Form::file('imagen', null, ['class'=>'form-control', 'placeholder'=>'Imagen', 'id'=>'imagen_', 'required']) !!}
          </div>
          <div class="col-md-1">

          </div>
          <div class="col-md-5">
            <label for="receta_" > <b><i>Receta</i></b> </label>
            {!! Form::textarea('receta', null, ['class'=>'form-control', 'placeholder'=>'Receta', 'id'=>'receta_', 'required']) !!}
          </div>
          <div class="col-md-2">
            <label for="permanente_" > <b><i>Permanente</i></b> </label>
            {!! Form::checkbox('permanente', 'si', false, ['class'=>'form-control', 'placeholder'=>'Receta', 'id'=>'permanente_']) !!}
          </div>
        </div>

        <hr>

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
                    {!! Form::open(['route'=>['Menu.update', ':DATO_ID'], 'method'=>'PATCH', 'id'=>'form-update' ])!!}

                    <div class="row">
                      <div class="col-md-6">
                        <label for="menu_" > <b><i>Menu</i></b> </label>
                        {!! Form::text('menu', null, ['class'=>'form-control letras', 'placeholder'=>'Menu', 'id'=>'menu', 'required']) !!}
                      </div>
                      <div class="col-md-3">
                        <label for="precio_" > <b><i>Precio</i></b> </label>
                        {!! Form::text('precio', null, ['class'=>'form-control', 'placeholder'=>'Precio', 'id'=>'precio', 'required']) !!}
                      </div>
                      <div class="col-md-3">
                        <label for="fecha_" > <b><i>Fecha</i></b> </label>
                        {!! Form::date('fecha', null, ['class'=>'form-control', 'placeholder'=>'Fecha', 'id'=>'fecha', 'required']) !!}
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <label for="imagen_" > <b><i>Imagen</i></b> </label><br>
                        <img src="" width="150" id="imagen" alt="">
                      </div>
                      <div class="col-md-1">

                      </div>
                      <div class="col-md-5">
                        <label for="receta" > <b><i>Receta</i></b> </label>
                        {!! Form::textarea('receta', null, ['class'=>'form-control', 'placeholder'=>'Receta', 'id'=>'receta', 'required']) !!}
                      </div>

                      <div class="col-md-2">
                        <label for="permanente" > <b><i>Permanente</i></b> </label>
                        {!! Form::checkbox('permanente', 'si', false, null, ['class'=>'form-control', 'placeholder'=>'Receta', 'id'=>'permanente']) !!}
                      </div>
                    </div>

                    <hr>

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
                    <div class="panel-heading"> </div>
                    <div class="panel-body">
                        <table id="tablaAgenda" class="table display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Menu</th>
                                    <th>Precio</th>
                                    <th>Fecha</th>
                                    <th>Imagen</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datos as $dato)
                                   @if($dato->permanente == "si")
                                    <tr data-id="{{ $dato->id }}" style="background-color:#bcdcd1;">
                                  @else
                                    <tr data-id="{{ $dato->id }}" >
                                  @endif
                                        <td>{{$dato->id}}</td>
                                        <td>{{$dato->menu}}</td>
                                        <td>{{$dato->precio}}</td>
                                        <td>{{$dato->fecha}}</td>
                                        <td> <img src="{{asset('RughHXvNTFm9zzBett0zzPpFGaE2r7mjB9/'.$dato->imagen)}}" width="50" alt=""></td>
                                        <td>
                                              <a href="#modalModifiar"  data-toggle="modal" data-target="" class="actualizar" style="color: #B8823B;"> <li class="fa fa-edit"></li>Editar</a> &nbsp;&nbsp;&nbsp;
                                              <a href="#"  data-toggle="modal" data-target="" style="color: #ff0000;" class="eliminar"> <li class="fa fa-trash"></li>Eliminar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! Form::open(['route'=>['Menu.destroy', ':DATO_ID'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}
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
            link  = '{{ asset("/index.php/Menu/")}}/'+id;

            jQuery.getJSON(link, function(data, textStatus) {
                if(data.length > 0){
                    jQuery.each(data, function(index, el) {
                      jQuery('#menu').val(el.menu);
                      jQuery('#precio').val(el.precio);
                      jQuery('#fecha').val(el.fecha);

                      if(el.permanente == "si"){
                        jQuery('#permanente').prop( "checked", true );
                      }else{
                        jQuery('#permanente').prop( "checked", false );
                        }

                      jQuery('#imagen').attr("src", "{{asset('RughHXvNTFm9zzBett0zzPpFGaE2r7mjB9/')}}/"+el.imagen);
                      jQuery('#receta').val(el.receta);
                    });
                }else{
                    //
                }
            });
        });


        jQuery('.eliminar').click(function(event) {
            event.preventDefault();
            var fila = jQuery(this).parents('tr');
            var id = fila.data('id');
            var form = jQuery('#form-delete');
            var url = form.attr('action').replace(':DATO_ID',id);
            var data = form.serialize();

            if(confirm('Esta seguro de eliminar al Empleado'))
            {
                jQuery.post(url, data, function(result, textStatus, xhr) {
                    alert(result);
                    fila.fadeOut();
                }).fail(function(esp){
                    fila.show();
                });
            }
        });


    </script>
@endsection
