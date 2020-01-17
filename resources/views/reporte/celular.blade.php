<!DOCTYPE html>
<html lang="es" class="no-js">
<head>
    <meta charset="utf-8">
    <title>Pizzeria Maná</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700|Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('/appson/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/appson/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('/appson/css/preview.css')}}">
    <link rel="stylesheet" href="{{asset('/appson/css/responsive.css')}}">
    <link rel="shortcut icon" type="image/png" href="img/favicon.ico">
    <script type="text/javascript">
        @isset($msj)
          alert('Su pedido fue registrado correctamente');
        @endif
    </script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>
<body data-spy="scroll" data-target="#scroll-menu" data-offset="100" onload="loadLocation();">
    <!-- Preloader -->
    <div class="preloader-wrap">
        <div class="preloader-inside">
            <div class="preloader">
                <div class="preloader-inner box1"></div>
                <div class="preloader-inner box2"></div>
                <div class="preloader-inner box3"></div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="tituloModal"> </h4>
        </div>
        <div class="modal-body">
          <p id="cuerpoModal"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">cerrar</button>
        </div>
      </div>

    </div>
  </div>
    <!-- End Preloader -->
    <!-- Header Section -->
    <!--
    <header id="home">
        <div class="full-wrap hero-wrap">
            <div class="hero-inner">
                <div class="hero-wrap-inside">
                    <h1>PIZZAS</h1>
                    <span>Las mas deliciosas pizzas potosinas a pedido desde tu celular</span>
                </div>
            </div>
        </div>
    </header>-->

    <div style="position: absolute;left:250px;">
        <a href="#PIZZAS" class="btn btn-success btn-lg" > PIZZAS</a>
        <a href="#EXTRAS" class="btn btn-success btn-lg"> EXTRAS</a>
        <a href="#BEBIDAS" class="btn btn-success btn-lg"> BEBIDAS</a>
        <a href="#PROMOCIONES" class="btn btn-success btn-lg"> PROMOCIONES</a>
    </div>
    <!-- Page layout Section -->
    <div class="page-layout" id="page_layout">
        <div class="container">



            <div class="row">
                <div class="col-xs-12 text-center">
                    <div class="row">



                      <form class="" action="{{asset('/index.php/Celular')}}" method="post">
                        {!! csrf_field() !!}
                        <div class="">

                        </div>

                      <!--<input type="submit" name="" value="Hacer Pedido" class="btn btn-success form-control">-->
                        <br>
                        <input type="hidden" name="longitud" id="longitud" value="{{$longitud}}">
                        <input type="hidden" name="latitud" id="latitud" value="{{$latitud}}">
                        <div class="row">

                           <div class="input-group col-xs-12 col-sm-12 col-md-12">
                              <span class="input-group-addon">CI</span>
                              <input type="number" name="ci" value="" class="form-control" placeholder="Numero de CI" required min="1" pattern="^[0-9]+">
                            </div>
                            <div class="input-group col-xs-12 col-sm-12 col-md-12">
                               <span class="input-group-addon">Celular</span>
                               <input type="number" name="celular" value="" class="form-control" placeholder="Numero de Celular" required min="1" pattern="^[0-9]+">
                             </div>
                             <div class="input-group col-xs-12 col-sm-12 col-md-12">
                                <span class="input-group-addon">Direccion</span>
                                <input type="text" name="direccion" value="" class="form-control" placeholder="Direccion" required>
                              </div>

                              <div class="input-group col-xs-12 col-sm-12 col-md-12">
                                 <span class="input-group-addon">Nombres</span>
                                 <input type="text" name="nombre" value="" class="form-control" placeholder="Nombre Completo" onkeypress="return soloLetras(event)" required>
                               </div>

                              <div class="input-group col-xs-12 col-sm-12 col-md-12">
                                 <span class="input-group-addon">Monto Bs.</span>
                                 <input type="text" name="precio" value="0" class="btn btn-info" id="precio" readonly>
                               </div>

                        </div>


                        <br><br>
                        <?php $i=0; ?>
                       @foreach($datos as $dato)
                        <div class="col-xs-12 col-sm-6 col-md-4" id="{{$dato->tipo}}">
                            <div class="single-preview">
                                <div class="preview-content">
                                    <div class="thumb-title" style="border:solid 2px #ff5733;">
                                      <h4><a href="#" style="color:#ff5733;" data-toggle="modal"  onclick="modal('{{$dato->id}}')">  {{ strtoupper($dato->tipo) }} {{$dato->menu}} <b class="precio{{$i}}">{{$dato->precio}}</b> Bs.</a></h4>
                                      @if($dato->tipo == "PIZZAS")
                                      <select class="form-control" name="pizzaTipo{{$dato->id}}" id="pizzaTipo{{$dato->id}}" onchange="precioPizza('{{$dato->id}}')">
                                        <option value="0"> ---- </option>
                                        <option value="1"> Pequeña </option>
                                        <option value="2"> Mediana </option>
                                        <option value="3"> Grande </option>
                                      </select>
                                      @endif
                                    </div>
                                    <div class="preview-content-thumb" style="background-image: url('{{asset('RughHXvNTFm9zzBett0zzPpFGaE2r7mjB9/'.$dato->imagen)}}')"></div>
                                </div>
                                <div class="thumb-title">
                                    <b>Elegir</b> <input type="checkbox" name="menu{{$i}}"  value="{{$dato->id}}"  id="menu{{$i}}" onclick="cambio('{{$i}}')">
                                    <input type="hidden" id="precio{{$i}}" value="{{$dato->precio}}">
                                    <div class="row">
                                      <div class="col-xs-2 col-sm-2 col-md-2" style="font-size:large;">
                                        <b onclick="sumar('{{$i}}')" class="btn btn-success"> + </b>
                                      </div>
                                      <div class="col-xs-8 col-sm-8 col-md-8" >
                                        <input type="text" id="cantida{{$i}}" name="cantida{{$i}}" value="0" readonly class="btn btn-info">
                                      </div>
                                      <div class="col-xs-2 col-sm-2 col-md-2" style="font-size:large;">
                                        <b onclick="restar('{{$i}}')" class="btn btn-danger"> - </b>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div><?php $i++; ?>
                        @endforeach
                        <input type="hidden" name="cantidad" id="cantidad" value="{{count($datos)}}">
                        <input type="submit" name="" value="Hacer Pedido" class="btn btn-success btn-lg form-control ">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <!-- Page layout Section Ends -->
    <div class="preview-footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    &nbsp;
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('appson/js/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('appson/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('appson/js/theme.js')}}"></script>
    <script type="text/javascript">

    function precioPizza(nro){
      //alert(nro);
      var id = parseFloat(nro)-1;
      var nombre        = "#pizzaTipo" + nro ;
      var pizzaTipoValor= jQuery(nombre).val()

      var idPrecio      = "#precio" + id;
      var preciopizza   = $(idPrecio).val();

      var actual  = $('#precio').val();
      var suma    = 0;
      
      if( pizzaTipoValor == '1' ){
        suma = parseFloat(actual);
        alert( suma );
      }else if( pizzaTipoValor == '2' ){
        suma = parseFloat(actual) + parseFloat(preciopizza);
        alert( suma );
      }else if( pizzaTipoValor == '3' ){
        suma = parseFloat(actual) + ( parseFloat(preciopizza) * 2 );
        alert( suma );
      }

      $('#precio').val(suma);
    }

    function modal(id){
      link  = '{{ asset("/index.php/Menu/")}}/' + id;
      jQuery.getJSON(link, function(data, textStatus) {
        if(data.length > 0){
          jQuery.each(data, function(index, el) {
            jQuery('#tituloModal').html("<b>Pizza:</b> " + el.menu + " <b>Tipo:</b> " + (el.tipo).toUpperCase() + " <b>Precio:</b> " + el.precio );
            //jQuery('#precio').val(el.precio);
            jQuery('#cuerpoModal').html(el.receta);
            $('#myModal').modal('show'); // abrir
          });
        }
      });
    }

    function soloLetras(e){
      key = e.keyCode || e.which;
      tecla = String.fromCharCode(key).toLowerCase();
      letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
      especiales = "8-37-39-46";

      tecla_especial = false
      for(var i in especiales){
           if(key == especiales[i]){
               tecla_especial = true;
               break;
           }
       }

       if(letras.indexOf(tecla)==-1 && !tecla_especial){
           return false;
       }
    }

    function sumar(dato){
      var id          = '#menu'+dato;
      var idPrecio    = '#precio'+dato;
      var idCantidad  = '#cantida'+dato;
      var actual      = $('#precio').val();

      //var cantidad      = $('#precio').val();

      var cantidad= $(idCantidad).val();
      cantidad    = parseFloat(cantidad) + 1;
      $(idCantidad).val(cantidad);

      var precio  = $(idPrecio).val();
      var suma    = parseFloat(precio) + parseFloat(actual);
      $('#precio').val(suma);
    }

    function restar(dato){
      var id          = '#menu'+dato;
      var idPrecio    = '#precio'+dato;
      var idCantidad  = '#cantida'+dato;
      var actual      = $('#precio').val();

      var cantidad    = $(idCantidad).val();
      cantidad = parseFloat(cantidad) - 1;
      $(idCantidad).val(cantidad);

      var precio      = $(idPrecio).val();
      var suma  = parseFloat(actual) - parseFloat(precio);
      $('#precio').val(suma);
    }
    </script>
</body>

</html>
