#!/usr/bin/php -q
<?php

require_once("/var/lib/asterisk/agi-bin/phpagi/phpagi.php");

function fecha_normal($fecha)
{
    ereg( "([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})", $fecha, $mifecha);
    $lafecha=$mifecha[3].$mifecha[2].$mifecha[1];
    return $lafecha;
}

function resta_fecha($fecha_inicial, $fecha_final)
{
    ereg( "([0-9]{1,2})([0-9]{1,2})([0-9]{2,4})", $fecha_inicial, $fini);
    ereg( "([0-9]{1,2})([0-9]{1,2})([0-9]{2,4})", $fecha_final, $ffin);

    $fecha1 = mktime(0,0,0,$fini[2], $fini[1], $fini[3]);
    $fecha2 = mktime(0,0,0,$ffin[2], $ffin[1], $ffin[3]);

    return round(($fecha2 - $fecha1) / (60 * 60 * 24));
}

// http://es.wikibooks.org/wiki/Algoritmo_para_obtener_la_letra_del_NIF
function letra_nif($dni)
{
 return substr("TRWAGMYFPDXBNJZSQVHLCKE",$dni%23,1);
}

$agi = new AGI();
$dni = $argv[1];
$dni = str_replace(" ","",$dni);
$dni = $dni.letra_nif($dni);

// Conexion a la base de Datos
$base = "erp";
$host = "home-asterisk.local";
$user = "asterisk";
$password = "asterisk";
$conexion = mysql_connect($host,$user,$password);
$result = mysql_select_db($base,$conexion) 
or die ("Error en la Conexion a BD");

$query = mysql_query("SELECT * FROM clientes WHERE dni = '$dni'");

if(!mysql_num_rows($query))
{
 $diasgarantia = '0';
}
else
{
 $cliente = mysql_fetch_array($query);
 $idcliente = $cliente['id'];

 mysql_query("SELECT * FROM vehiculos WHERE cliente = '$idcliente'");
 $vehiculo = mysql_fetch_array($query2);
 $fcompra = $vehiculo['fcompra'];
 $garantia = $vehiculo['garantia'];
 $ahora = date("dmY",strtotime("-$garantia year"));
 $fechacompra = fecha_normal($fcompra);
 $diasgarantia = resta_fecha($ahora,$fechacompra);
}

$agi->verbose($diasgarantia);
$agi->set_variable("textotts",$diasgarantia);
?>
