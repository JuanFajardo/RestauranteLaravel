@extends('maestro')
@section('card-header')
<div class="row">
  <div class="col-md-6 text-left">
    PEDIDO
  </div>
  <div class="col-md-6 text-right">
    <a href="#modalAgregar"   data-toggle="modal" class="nuevo" data-target=""> <li class="fa fa-plus"></li> Nuevo PEDIDO</a> <br/>
  </div>
</div>
@endsection


@section('empleado')   @endsection
@section('titulo') Pedido @endsection

@section('menuPedido')
class="active"
@endsection

@section('modal1')
<div id="modalAgregar" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content panel panel-primary">

      <div class="modal-header panel-heading">
        <b>Insertar nuevo Pedido</b>
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
        <h4>Pedido</h4>
        <hr>
        <div class="row">
          <div class="col-md-7">
            <label for="">Pedido</label>  <br>
            <input type="text" name="" value="" id="pedido_pedido" class="form-control" list="list-pedido">
            <datalist id="list-pedido">
              @foreach($menus as $menu)
                <option value="{{$menu->id}} | {{$menu->menu}}. {{$menu->precio}} Bs.">
              @endforeach
            </datalist>
          </div>
          <div class="col-md-2">
            <label for="">Cantidad</label>  <br>
            <input type="text" name="" value="" id="pedido_cantidad" class="form-control">
          </div>
          <div class="col-md-2">
            <label for="">Precio</label>  <br>
            <input type="text" name="" value="" id="pedido_precio" class="form-control">
          </div>
          <div class="col-md-1"><br>
            <button type="button" name="button" class="btn btn-success" id="pedido_boton"> + </button>
          </div>
        </div>
        <br>
        <table width="90%" border="2">
          <thead>
            <tr>
              <th width="40%">Pedido</th>
              <th width="10%">Cantidad</th>
              <th width="10%">Precio</th>
              <th width="5%">Eliminar</th>
            </tr>
          </thead>
          <tbody id="cuerpoTabla">

          </tbody>
        </table>

        {!! Form::hidden('contador', '0', ['id'=>'contador']) !!}

        {!! Form::hidden('telefono', '0') !!}
        {!! Form::hidden('direccion', '0') !!}
        {!! Form::hidden('tipo', 'Local') !!}
        {!! Form::hidden('latitud', '0') !!}
        {!! Form::hidden('longitud', '0') !!}

        <br><br>
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
                    <b>Actualizar Pedido</b>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body panel-body">
                    {!! Form::open(['route'=>['Pedido.update', ':DATO_ID'], 'method'=>'PATCH', 'id'=>'form-update' ])!!}

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
                    <h4>Pedido</h4>
                    <hr>
                    <div class="row">
                      <div class="col-md-7">
                        <label for="">Pedido</label>  <br>
                        <input type="text" name="" value="" id="pedido_pedido_" class="form-control" list="list-pedido_">
                        <datalist id="list-pedido_">
                          @foreach($menus as $menu)
                            <option value="{{$menu->id}} | {{$menu->menu}}">
                          @endforeach
                        </datalist>
                      </div>
                      <div class="col-md-2">
                        <label for="">Cantidad</label>  <br>
                        <input type="text" name="" value="" id="pedido_cantidad_" class="form-control">
                      </div>
                      <div class="col-md-2">
                        <label for="">Precio</label>  <br>
                        <input type="text" name="" value="" id="pedido_precio_" class="form-control">
                      </div>
                      <div class="col-md-1"><br>
                        <button type="button" name="button" class="btn btn-success" id="pedido_boton_"> + </button>
                      </div>
                    </div>
                    <br>
                    <table width="90%" border="2">
                      <thead>
                        <tr>
                          <th width="40%">Pedido</th>
                          <th width="10%">Cantidad</th>
                          <th width="10%">Precio</th>
                          <th width="5%">Eliminar</th>
                        </tr>
                      </thead>
                      <tbody id="cuerpoTabla_">

                      </tbody>
                    </table>

                    {!! Form::hidden('contador', '0', ['id'=>'contador_']) !!}

                    {!! Form::hidden('telefono', '0') !!}
                    {!! Form::hidden('direccion', '0') !!}
                    {!! Form::hidden('tipo', 'Local') !!}
                    {!! Form::hidden('latitud', '0') !!}
                    {!! Form::hidden('longitud', '0') !!}

                    {!! Form::hidden('id_usuario', '1') !!}

                    {!! Form::submit('Actualizar ', ['class'=>'btn btn-warning']) !!}
                    {!! Form::submit('Pagar Y facturar', ['class'=>'btn btn-danger']) !!}
                    {!! Form::checkbox('pagar', 'pagar', false, ['class'=>'btn btn-danger']) !!}

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
                    <div class="panel-heading"> </div><br>
                    <div class="panel-body">
                        <table id="tablaAgenda" class="table display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Direccion</th>
                                    <th>Tipo</th>
                                    <th>Estado</th>
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
                                          <span class="badge badge-danger">Celular</span>
                                          @endif
                                        </td>
                                        <td>
                                          @if( $dato->estado == "pedido" )
                                          <span class="badge badge-dark">Pedido</span>
                                          @elseif($dato->estado == "pagado" )
                                          <span class="badge badge-info">Pagado</span>
                                          @elseif($dato->estado == "facturado" )
                                          <span class="badge badge-success">Factura</span>
                                          @endif
                                        </td>
                                        <td>{{$dato->mesa}}</td>
                                        <td>
                                          <a href="#modalModifiar"  data-toggle="modal" class="actualizar" style="color: #B8823B;"> <li class="fa fa-edit"></li> Editar</a> &nbsp;&nbsp;&nbsp;
                                          @if($dato->estado == "facturado" || $dato->estado == "pagado"   )
                                            <a href="{{asset('/index.php/Facturar/'.$dato->id)}}"  style="color: #1c48b4;"> <li class="fa fa-qrcode"></li> Factura</a> &nbsp;&nbsp;&nbsp;
                                          @endif
                                          @if( $dato->tipo != "Local")
                                            <a href="{{asset('index.php/Mapa/'.$dato->id)}}"   style="color: #308e15;" > <li class="fa fa-eye"></li> Ver</a>
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

        jQuery('#pedido_precio').focus(function(event){
          var pedido   = jQuery('#pedido_pedido').val();
          var cantidad = jQuery('#pedido_cantidad').val();
          pedido = pedido.split('|');
          link  = '{{ asset("/index.php/Menu/")}}/'+pedido[0];
          jQuery.getJSON(link, function(data, textStatus) {
              if(data.length > 0){
                  jQuery.each(data, function(index, el) {
                    jQuery('#pedido_precio').val(el.precio * cantidad);
                  });
              }
          });

        });

        jQuery('#pedido_boton').click(function(event){
          event.preventDefault();
          var producto  = jQuery('#pedido_pedido').val();
          var precio    = jQuery('#pedido_precio').val();
          var cantidad  = jQuery('#pedido_cantidad').val();
          var contador  = parseInt(jQuery('#contador').val());

          if(producto.length > 0 && precio.length > 0 &&  cantidad.length > 0 ){
            contador  =  parseInt(contador) + 1;
            var texto = jQuery('#cuerpoTabla').html();
            var html  = texto + "<tr data-id='"+contador+"'>"+
                               "<td><input type='text'     id='pedido_"+contador+"'   name='pedido_"+contador+"'    value='"+producto+"' class='form-control'></td>" +
                               "<td><input type='text'     id='cantidad_"+contador+"' name='cantidad_"+contador+"'  value='"+cantidad+"' class='form-control'></td>" +
                               "<td><input type='text'     id='precio_"+contador+"'   name='precio_"+contador+"'    value='"+precio+"' class='form-control'></td>" +
                               "<td><input type='checkbox' id='eliminar_"+contador+"' name='eliminar_"+contador+"'  value='eliminar' > <i class='fa fa-trash'></i> </td>" +
                               "</tr>";
            jQuery('#pedido_pedido').val(''); jQuery('#pedido_precio').val(''); jQuery('#pedido_cantidad').val('');
            jQuery('#contador').val(contador);
            jQuery('#cuerpoTabla').html(html);
          }
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
                if( data.length > 0 ){
                    jQuery.each(data, function(index, el) {
                      jQuery('#nombre').val(el.nombre);
                      jQuery('#ci').val(el.ci);
                      jQuery('#mesa').val(el.mesa);
                    });
                }
            });

            link2  = '{{ asset("/index.php/Pedidos/")}}/'+id;
            jQuery.getJSON(link2, function(data, textStatus) {
                if( data.length > 0 ){
                    var html ='';
                    var contador = 0;
                    jQuery.each(data, function(index, el) {
                      contador ++;
                      html  = html+  "<tr data-id='"+contador+"'>"+
                                         "<td><input type='text'     id='pedido_"+contador+"_' name='pedido_"+contador+"' value='"+el.id+"|"+el.detalle+"' class='form-control'></td>" +
                                         "<td><input type='text'     id='cantidad_"+contador+"_' name='cantidad_"+contador+"' value='"+el.cantidad+"' class='form-control'></td>" +
                                         "<td><input type='text'     id='precio_"+contador+"_' name='precio_"+contador+"' value='"+el.precio+"' class='form-control'></td>" +
                                         "<td><input type='checkbox' id='eliminar_"+contador+"_' name='eliminar_"+contador+"' value='eliminar' > <i class='fa fa-trash'></i> </td>" +
                                         "</tr>";
                      jQuery('#contador_').val(contador);
                      jQuery('#cuerpoTabla_').html(html);
                    });
                }
            });

            jQuery('#pedido_boton_').click(function(event){
              event.preventDefault();
              var producto  = jQuery('#pedido_pedido_').val();
              var precio    = jQuery('#pedido_precio_').val();
              var cantidad  = jQuery('#pedido_cantidad_').val();
              var contador  = parseInt(jQuery('#contador_').val());

              if(producto.length > 0 && precio.length > 0 &&  cantidad.length > 0 ){
                contador  =  parseInt(contador) + 1;
                var texto = jQuery('#cuerpoTabla_').html();
                var html  = texto + "<tr data-id='"+contador+"'>"+
                                   "<td><input type='text'     id='pedido_"+contador+"_' name='pedido_"+contador+"' value='"+producto+"' class='form-control'></td>" +
                                   "<td><input type='text'     id='cantidad_"+contador+"_' name='cantidad_"+contador+"' value='"+cantidad+"' class='form-control'></td>" +
                                   "<td><input type='text'     id='precio_"+contador+"_' name='precio_"+contador+"' value='"+precio+"' class='form-control'></td>" +
                                   "<td><input type='checkbox' id='eliminar_"+contador+"_' name='eliminar_"+contador+"' value='eliminar' > <i class='fa fa-trash'></i> </td>" +
                                   "</tr>";
                jQuery('#pedido_pedido_').val(''); jQuery('#pedido_precio_').val(''); jQuery('#pedido_cantidad_').val('');
                jQuery('#contador_').val(contador);
                jQuery('#cuerpoTabla_').html(html);
              }
            });

            jQuery('#pedido_precio_').focus(function(event){
              var pedido   = jQuery('#pedido_pedido_').val();
              var cantidad = jQuery('#pedido_cantidad_').val();
              pedido = pedido.split('|');
              link  = '{{ asset("/index.php/Menu/")}}/'+pedido[0];
              jQuery.getJSON(link, function(data, textStatus) {
                  if(data.length > 0){
                      jQuery.each(data, function(index, el) {
                        jQuery('#pedido_precio_').val(el.precio * cantidad);
                      });
                  }
              });

            });


        });

    </script>
@endsection
