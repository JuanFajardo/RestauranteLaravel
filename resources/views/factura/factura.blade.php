<!--
0
id	1
nombre	"Juan Fajardo"
telefono	"0"
direccion	"0"
ci	"6612330"
tipo	"pagado"
fecha	"2019-04-15"
hora	"2019-04-15 03:02:18"
mesa	"15"
estado	"pagado"
latitud	"0"
longitud	"0"
id_user	1
created_at	"2019-04-15 03:11:10"
updated_at	"2019-04-15 03:11:10"
detalle	" Picante de pollo"
precio	"15"
cantidad	1
id_pedido	1
id_menu	1
numero_factura	1
nit	6612330
total	15
numero_autorizacion	"44566748"
codigo_control	"38-12-E5-88"
id_usuario	1
id_dosificacion	1
-->


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
              body{

                    font-size: large;
                    font-family: Arial;
                    width: 240px;
                    font-size: 10px;
                    margin-left: 10px;
                    /*margin-left:450px;*/
                }
                tfoot{
                    padding-top: 5px;
                }
                .css-content_center{
                    text-align: center;
                }
                .css-header_table{
                    border-top: 1px solid;
                    border-bottom: 1px solid;
                }
                .css-footer_table{
                    border-top: 1px solid;
                }
                .css-info_table{
                    width: 240px;
                }
                .css-info_table td{
                    padding-right: 2px;
                    padding-left: 2px;
                }


    </style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        </head>
        <body>


            <div class="css-content_center">
              <table cellpadding="2" border="0" width="240">
                <tr>
                  <td align='center'>
                    RESTAURANTE
                  </td>
                </tr>
                <tr>
                  <td align='center'>
                    XXXXX
                  </td>
                </tr>
                <tr>
                  <td align='center'>
                    Sucursal - 9 - SEVILLA
                  </td>
                </tr>
                <tr>
                  <td align='center'>
                    Dir. Calle Chuquisaca S/N
                  </td>
                </tr>
                <tr>
                  <td align='center'>
                    Potos&iacute; - Bolivia
                  </td>
                </tr>
                <tr>
                  <td align='center'>
                    <b>{{$dosificacion[0]->titulo}}</b>
                  </td>
                </tr>
              </table>
            </div>

            <div class="css-content_center">
                <hr>
                <table width="240">
                    <tr>
                        <td align="left"><b>NIT: </b></td>
                        <td align="right"> {{$dosificacion[0]->nit}}</td>
                    </tr>
                    <tr>
                        <td align="left"><b>FACTURA No.: </b></td>
                        <td align="right"> {{$datos[0]->numero_factura}}</td>
                    </tr>
                    <tr>
                        <td align="left"><b>AUTORIZACION No.: </b></td>
                        <td align="right"> {{$dosificacion[0]->nro_autorizacion}}</td>
                    </tr>
                </table>
            </div>

            <hr>
            <span style="width:240px;"><center>Actividad: Servicios y/o actividades sujetas al IVA<br>
            Ch'utillos 2017</center></span><br>
            <div>
              <table cellpanding='2'  width="240">
                <tr>
                  <td colspan="2">Fecha:<b> {{$datos[0]->fecha}}</b></td>

                  <td colspan="2">Hora: <b>{{$datos[0]->hora}}</b></td>
                </tr><tr>
                  <td>NIT/CI:</td><td>{{$datos[0]->nit}}</td>
                </tr><tr>
                  <td>Se&ntilde;or(a):</td><td>{{ ucfirst($datos[0]->nombre)}} </td>
                </tr>
              </table><br>

                <table border="0" class="css-info_table">
                    <tr class='css-header_table'>
                        <th align="left">Calle</th>
                        <th align="left">#</th>
                        <th align="left">Precio</th>
                    </tr>
                    <!--aqui ingresa el detalle-->
                  <code>   </code>
                    <tr><td colspan="4" style="border-top:solid 1px grey;"></td></tr>
                    <tr>
                          <td align="left"></td>
                          <td align="left"><strong>Total </strong></td>
                          <td align="left"><strong>Bs. {{$datos[0]->total}}</strong> </td>
                    </tr>
                </table>
            </div>
            <hr>
            <div>
                <p>Son: sdfsdf 00/100 Bolivianos</p>
            <hr>
                <p>C&oacute;digo de control: <b>{{ $datos[0]->codigo_control }}</b></p>
                <p>Fecha l&iacute;mite de emisi&oacute;n: <b>{{ $dosificacion[0]->fecha_limite_emision }}</b>
                </p>
            </div>
            <div class="css-content_center" >
              <img src="" alt="QR Code">
            </div>
            <hr>
            <div class="css-content_center">
                <p><b>{{$dosificacion[0]->leyenda1}}</b></p>
                  <span>{{$dosificacion[0]->leyenda2}}</span>
            </div>
            <hr>
            <center>* Gracias por su compra</center>
            <br><br>

        </body>
</body>
</html>
