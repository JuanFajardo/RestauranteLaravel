<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <table class="table" width="100%">
      <thead>
        <tr>
          <th colspan="7">REPORTE DE FECHA {{ date('d/m/Y', strtotime($inicio) ) }} a {{ date('d/m/Y', strtotime($fin) ) }}</th>
        </tr>
        <tr>
          <th>Nro</th>
          <th>Fecha</th>
          <th>Nombre</th>
          <th>C.I.</th>
          <th>Cantidad</th>
          <th>Total</th>
          <th>Usuario</th>
        </tr>
      </thead>
      <tbody><?php $i=1; ?>
        @foreach($datos as $dato)
          <tr>
            <td>{{$i}}</td>
            <td>{{$dato->fecha}}</td>
            <td>{{$dato->nombre}}</td>
            <td>{{$dato->nit}}</td>
            <td>{{$dato->cantidad}}</td>
            <td>{{$dato->total}}</td>
            <td>{{$dato->name}}</td>
          </tr>
        <?php $i++; ?>
        @endforeach
      </tbody>
    </table>


  </body>
</html>
