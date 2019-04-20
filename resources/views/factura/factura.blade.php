

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
                    PIZZERIA
                  </td>
                </tr>
                <tr>
                  <td align='center'>
                    PIZARRON
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
            <span style="width:240px;">
              <center>
                Actividad: Servicios y/o actividades sujetas al IVA {{date('Y')}}
              </center></span><br>
            <div>
              <table cellpanding='2'  width="240">
                <tr>
                  <td colspan="2">Fecha:<b> {{$datos[0]->fecha}}</b></td>

                  <td colspan="2">Hora: <b>{{ date('H:i:s', strtotime($datos[0]->hora)) }}</b></td>
                </tr><tr>
                  <td>NIT/CI:</td><td>{{$datos[0]->nit}}</td>
                </tr><tr>
                  <td>Se&ntilde;or(a):</td><td>{{ ucfirst($datos[0]->nombre)}} </td>
                </tr>
              </table><br>

                <table border="0" class="css-info_table">
                    <tr class='css-header_table'>
                        <th align="left">Producto</th>
                        <th align="left">#</th>
                        <th align="left">Precio</th>
                    </tr>
                    @foreach($datos as $dato)
                      <tr>
                        <td>{{$dato->detalle}}</td>
                        <td>{{$dato->cantidad}}</td>
                        <td>{{$dato->precio}}</td>
                      </tr>
                    @endforeach

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
                <p>Son: {{\App\Clases\Letras::to_word( $datos[0]->total )}} </p>
            <hr>
                <p>C&oacute;digo de control: <b>{{ $datos[0]->codigo_control }}</b></p>
                <p>Fecha l&iacute;mite de emisi&oacute;n: <b>{{ $dosificacion[0]->fecha_limite_emision }}</b>
                </p>
            </div>
            <div class="css-content_center" >
              {!! QrCode::size(100)->generate( $datos[0]->codigo_control."|".$datos[0]->ci ); !!}
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
