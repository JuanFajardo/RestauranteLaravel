<!DOCTYPE html>
<html>
  <head>
    <style>
 	    html, body { height: 100%; margin: 0; }
      #map { min-height: 90%; width: 100%; }
      .modal { display: none; /* Hidden by default */ position: fixed; /* Stay in place */ z-index: 1; /* Sit on top */ padding-top: 100px; /* Location of the box */ left: 0; top: 0; width: 100%; /* Full width */ height: 100%; /* Full height */ overflow: auto; /* Enable scroll if needed */ background-color: rgb(0,0,0); /* Fallback color */ background-color: rgba(0,0,0,0.4); /* Black w/ opacity */ }
      /* Modal Content */
      .modal-content { background-color: #fefefe; margin: auto; padding: 20px; border: 1px solid #888; width: 40%; }
      /* The Close Button */
      .close { color: #aaaaaa; float: right; font-size: 28px; font-weight: bold; }
      .close:hover,
      .close:focus { color: #000; text-decoration: none; cursor: pointer; }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>

    <div id="map"></div>

    <div id="comida" class="modal">
      <div class="modal-content">
        <p>Pizzeria Maná</p><br>
        <b style="font-size:20px;">Datos del pedido</b><br>
        <b>Nombre</b> {{$dato->nombre}}<br>
        <b>Telefono</b> {{$dato->telefono}}<br>
        <b>Direccion</b> {{$dato->direccion}}<br>
      </div>
    </div>

<script>
  var map;

	var modal = document.getElementById('salud');
	var span = document.getElementsByClassName("close")[0];
  var modal0 = document.getElementById('salud0');
  var span0  = document.getElementsByClassName("close")[0];

  var modal9 = document.getElementById('comida');
  var span9  = document.getElementsByClassName("close")[0];

	window.onclick = function(event) {
      if (event.target == modal)  modal.style.display = "none";
      if (event.target == modal0) modal0.style.display = "none";
      if (event.target == modal9) modal9.style.display = "none";
	}
  span.onclick = function() { modal.style.display = "none"; }
  span0.onclick = function() { modal0.style.display = "none"; }
  span9.onclick = function() { modal9.style.display = "none"; }

   function initMap() {
    var uluru = {lat: -19.5844895, lng: -65.7527863};
    map = new google.maps.Map(document.getElementById('map'), { zoom: 15, center: uluru });

    /////////////////COMIDA
    var image12  = new google.maps.MarkerImage( '{{asset("img/comida130.png")}}', new google.maps.Size(130,130));
    var place12  = new google.maps.LatLng(-19.583276020290292, -65.75961750176322);
    var marker12 = new google.maps.Marker({ position: place12, map: map , title: 'Reserva' , icon: image12 , animation: google.maps.Animation.DROP,});

    function showInfoComida() {
    	var modal9 = document.getElementById('comida'); modal9.style.display = 'block';
    }
    google.maps.event.addListener(marker12, 'click', showInfoComida);

  }
</script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA3_Dqo-80xQtQXcth-uFD9Y71170wyi-4&callback=initMap">
    </script>
  </body>
</html>
