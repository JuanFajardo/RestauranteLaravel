<?php

require_once('CodigoControlV7.php');

$numero_autorizacion = '6004002578983';
$numero_factura = '890986';
$nit_cliente = '1678842';
$fecha_compra = '20070331';
$monto_compra = round(25089.49);
$clave = 'hsKS\KhKG-YmMGA5sTUKN[CEYhEQFC8KS=4$Wi9*uQGh[L)e78eF4V{@JXrFVqeh';

echo CodigoControlV7::generar($numero_autorizacion, $numero_factura, $nit_cliente, $fecha_compra, $monto_compra, $clave);
