<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <!--- Basic Page Needs  -->
    <meta charset="utf-8">
    <title>Pizzeria Maná</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Specific Meta  -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700|Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('/appson/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/appson/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('/appson/css/preview.css')}}">
    <link rel="stylesheet" href="{{asset('/appson/css/responsive.css')}}">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="img/favicon.ico">

    <script type="text/javascript">
        function loadLocation () {
          //inicializamos la funcion y definimos  el tiempo maximo ,las funciones de error y exito.
          if (navigator.geolocation){
            navigator.geolocation.getCurrentPosition(viewMap,ViewError,{timeout:1000});
          }else{
            alert("Tu bavegador no lo soporta");
          }
        }

        //Funcion de exito
        function viewMap (position) {
          var lon = position.coords.longitude;	//guardamos la longitud
          var lat = position.coords.latitude;		//guardamos la latitud

          document.getElementById("longitud").innerHTML = lon;
          document.getElementById("latitud").innerHTML = lat;
        }
        function ViewError (error) {
          switch(error.code) {
               case error.PERMISSION_DENIED: alert("El usurio no compartió su ubicación geográfica");
               break;
               case error.POSITION_UNAVAILABLE: alert("No se pudo detectar la posición geográfica actual");
               break;
               case error.TIMEOUT: alert("Se ha agotado el tiempo de espera al consultar posición geográfica");
               break;
               default: alert("Error desconocido");
               break;
           }
        }
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
    <!-- End Preloader -->
    <!-- Header Section -->
    <header id="home">
        <div class="full-wrap hero-wrap">
            <div class="hero-inner">
                <div class="hero-wrap-inside">
                    <h1>PIZZAS</h1>
                    <span>Las mas deliciosas pizzas potosinas a pedido desde tu celular</span>
                </div>
            </div>
        </div>
    </header>

    <!-- Page layout Section -->
    <div class="page-layout" id="page_layout">
        <div class="container">

            <div class="row">
                <div class="col-xs-12 text-center">
                    <div class="row">
                      <form class="" action="{{asset('/index.php/Celular')}}" method="post">
                        {!! csrf_field() !!}
                        <input type="submit" name="" value="Hacer Pedido" class="btn btn-success form-control">
                        <br>
                        <input type="hidden" name="longitud" id="longitud" value="">
                        <input type="hidden" name="latitud" id="latitud" value="">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-4">
                              <input type="text" name="nombre" value="" class="form-control" placeholder="Nombre Completo">
                            </div>
                            <div class="col-xs-6 col-sm-3 col-md-2">
                              <input type="text" name="ci" value="" class="form-control" placeholder="Numero de CI">
                            </div>
                            <div class="col-xs-6 col-sm-3 col-md-2">
                              <input type="text" name="celular" value="" class="form-control" placeholder="Numero de Celular">
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                              <input type="text" name="direccion" value="" class="form-control" placeholder="Direccion">
                            </div>
                        </div>


                        <br><br>
                        <?php $i=1; ?>
                       @foreach($datos as $dato)
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="single-preview">
                                <div class="preview-content">
                                    <div class="preview-content-thumb" style="background-image: url('{{asset('RughHXvNTFm9zzBett0zzPpFGaE2r7mjB9/'.$dato->imagen)}}')"></div>
                                </div>
                                <div class="thumb-title">
                                    <b>Elegir</b> <input type="checkbox" name="menu{{$i}}"  value="{{$dato->id}}"> <h2><a href="#" > {{$dato->menu}} {{$dato->precio}}Bs. </a></h2>
                                    <select class="form-control" name="cantidad{{$i}}">
                                      <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9<option value="10">10</option>
                                      <option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="1">1</option><option value="20">20</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <input type="hidden" name="cantidad" id="cantidad" value="{{$i}}">
                        <input type="submit" name="" value="Hacer Pedido" class="btn btn-success form-control">

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
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
    <!-- End Contact Section -->
    <!-- Scripts -->
    <script src="{{asset('appson/js/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('appson/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('appson/js/theme.js')}}"></script>
</body>

</html>
