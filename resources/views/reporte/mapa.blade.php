<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrador</title>
	<style>
	.badge-danger
	{
	background-color: #d43f3a;
	#panelGuest{
    max-height: 400px;
    overflow-y:scroll;
    width: 100%;
    float:left;
    border-right:solid #ff920a 2px;
	}
</style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body  onload="initialize()">


  {!! Form::open(['accept-charset'=>'UTF-8', 'route'=>['celular.pedido'], 'enctype'=>'multipart/form-data', 'method'=>'POST', 'files'=>true, 'autocomplete'=>'off', 'id'=>'form-insert'] ) !!}
  <table class='table table-border'>
      <tr>
          <td>
              <input type="text" class="form-control input-lg" id="lat" placeholder="coordenada X" id="coordenadaX" name="coordenadaX" required>
          </td>
          <td>
              <input type="text" class="form-control input-lg"  id="lng" placeholder="coordenada Y" id="coordenadaY" name="coordenadaY" required>
          </td>
          <td>
              <input type="submit" value="Realizar pedido" class="btn btn-primary btn-lg">
          </td>
      </tr>
  </table>
  {!! Form::open() !!}
    <div id="map_canvas" style="width:100%; height:90%"></div>
    <script type="text/javascript">
    var ultimo='-19.57922312399841_-65.76328153230543';
    ultimo=ultimo.split("_");
    </script>
    <script type="text/javascript" src="{{asset('js/punto.js')}}"></script>
    <script src="js/jquery.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDWfhkbkuAlTm08GKlCAUcINKqXUSTdzqE" async defer></script>
</body>
</html>
