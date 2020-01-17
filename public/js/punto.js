var flag=true;
var map;
var marcador1 = [];
function initialize() {

//alert (ultimo);
    var lat='';
    var lng='';
        document.getElementById("lat").value = lat;
        document.getElementById("lng").value = lng;
    myLatlng = new google.maps.LatLng(ultimo[0],ultimo[1]);
  var mapOptions = {
    zoom: 18,
    center: myLatlng,
    styles: [
            {elementType: 'geometry', stylers: [{color: '#242f3e'}]},
            {elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},
            {elementType: 'labels.text.fill', stylers: [{color: '#746855'}]},
            {
              featureType: 'administrative.locality',
              elementType: 'labels.text.fill',
              stylers: [{color: '#d59563'}]
            },
            {
              featureType: 'poi',
              elementType: 'labels.text.fill',
              stylers: [{color: '#d59563'}]
            },
            {
              featureType: 'poi.park',
              elementType: 'geometry',
              stylers: [{color: '#263c3f'}]
            },
            {
              featureType: 'poi.park',
              elementType: 'labels.text.fill',
              stylers: [{color: '#6b9a76'}]
            },
            {
              featureType: 'road',
              elementType: 'geometry',
              stylers: [{color: '#38414e'}]
            },
            {
              featureType: 'road',
              elementType: 'geometry.stroke',
              stylers: [{color: '#212a37'}]
            },
            {
              featureType: 'road',
              elementType: 'labels.text.fill',
              stylers: [{color: '#9ca5b3'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'geometry',
              stylers: [{color: '#746855'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'geometry.stroke',
              stylers: [{color: '#1f2835'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'labels.text.fill',
              stylers: [{color: '#f3d19c'}]
            },
            {
              featureType: 'transit',
              elementType: 'geometry',
              stylers: [{color: '#2f3948'}]
            },
            {
              featureType: 'transit.station',
              elementType: 'labels.text.fill',
              stylers: [{color: '#d59563'}]
            },
            {
              featureType: 'water',
              elementType: 'geometry',
              stylers: [{color: '#17263c'}]
            },
            {
              featureType: 'water',
              elementType: 'labels.text.fill',
              stylers: [{color: '#515c6d'}]
            },
            {
              featureType: 'water',
              elementType: 'labels.text.stroke',
              stylers: [{color: '#17263c'}]
            }
          ]
  }

    var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
ajax=objetoAjax();
    ajax.open("GET", "puntos.php");
    ajax.onreadystatechange=function()
    {
       if (ajax.readyState==4)
       {
      datos=ajax.responseText;
      //alert(datos);
          dato=datos.split("---");
          datos=dato[1].split("___");
         // alert(datos);
         var i=0;
          for(var x=0;x<(dato[0]);x++)
          {
            var coordenadas = new google.maps.LatLng(datos[i+4], datos[i+5]);
            var image = datos[i+1]+'/number_'+datos[i+3]+'.png';
             // alert(image);
            var marcador = new google.maps.Marker({
                  position: coordenadas,
                  draggable: false,
                  map: map,
                  animation: google.maps.Animation.DROP,
                  title:'Asociacion '+datos[i]+' Zona '+datos[i+2],
                  icon: image
                  });
              i=i+6;
          }
       }
    }
    ajax.send(null)

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     google.maps.event.addListener(map, 'click', function(event) {

      if(!flag)
      {
        marcador1[0].setMap(null);
        marcador1.length = 0
        flag=true;
      }
      if(flag)
      {
      var latitud = event.latLng.lat();
      var longitud = event.latLng.lng();

        document.getElementById("lat").value = latitud;
        document.getElementById("lng").value = longitud;

        var coordenadas = new google.maps.LatLng(latitud, longitud); /* Debo crear un punto geografico utilizando google.maps.LatLng */
        /*Pone el marcador*/
      var image ='negro/number_1.png';
      var marcador = new google.maps.Marker({
          position: coordenadas,
          draggable: false,
          map: map,
          animation: google.maps.Animation.DROP,
          title:"Un marcador cualquiera",
          icon: image
          });
      marcador1.push(marcador);
      flag=false;
      }
      });
 /*FIN DEL EVENTO CLICK*/

}
function objetoAjax()
{
        var xmlhttp=false;
        try {
               xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
               try {
                  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
               } catch (E) {
                       xmlhttp = false;
               }
        }
        if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
               xmlhttp = new XMLHttpRequest();
        }
        return xmlhttp;
}
function ultimo_()
{
ajax2=objetoAjax();
    ajax2.open("GET", "ultimo.php");
 var ultimo;
    ajax2.onreadystatechange=function()
    {
       if (ajax2.readyState==4)
       {
       ultimo=ajax2.responseText;
       //alert(ultimo);
       return ultimo;
       }
    }
    ajax2.send(null)
}
