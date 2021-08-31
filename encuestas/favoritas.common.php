<?php
if (!isset($_SESSION)) session_start();
//session_start();
require_once ("../xajax/xajax_core/xajax.inc.php");
$keys="alojamiento en mar de las pampas,alojamiento mar de las pampas,alojamientos mar de las pampas,apart hotel boutique,apart hotel boutique mar de las pampas,apart hotel en mar de las pampas,apart hotel mar de las pampas,apart hotel village,apart hoteles botique,apart hoteles costa atlantica argentina,apart hoteles en mar de las pampas,apart hoteles mar de las pampas,apart mar de las pampas,aparts mar de las pampas,cabañas en mar de las pampas,cabañas mar de las pampas,costa atlantica argentina,hotel en mar de las pampas,hotel mar de las pampas,hoteles de diseño en la costa,hoteles en la costa,hoteles en mar de las pampas,mar de las pampas,mar de las pampas alojamiento,mar de las pampas alojamientos,mar de las pampas apart,mar de las pampas apart hotel,mar de las pampas apart hoteles,mar de las pampas aparts,mar de las pampas cabañas,mar de las pampas tarifas,mar de las pampas village,spa en mar de las pampas,spa mar de las pampas,mar de las pampas promociones,mar de las pampas hoteles,vacaciones en la costa,vacaciones en mar de las pampas,hospedaje en mar de las pampas,hospedaje mar de las pampas,mar de las pampas hospedajse";

$description="Distinguido apart hotel boutique en Mar de las Pampas y a metros del mar, donde podrá vivir una experiencia vacacional inolvidable. Tel:(011)-5254-7734/5 o (02255)-454243/4";

$acentos=array("&aacute;","&Aacute;","&Eacute;","&eacute;","&Iacute;","&iacute;","&Oacute;","&oacute;","&Uacute;","&uacute;","&nbsp;","&ntilde;","&Ntilde;","<br />","<br>");
$letras=array("a","A","E","e","I","i","O","o","U","u","","n","N","","");

$xajax = new xajax("favoritas.server.php");
$xajax->configure('javascript URI', '../xajax/');
/*$reqeliminarSeleccion =& $xajax->registerFunction('eliminarSeleccion');
$reqnuevoDpto =& $xajax->registerFunction('nuevoDpto');*/
$reqcerrarVentana =& $xajax->registerFunction('cerrarVentana');
/*$xajax->registerFunction('processForm');
$xajax->registerFunction('enviarEmail');
$xajax->registerFunction('muestraCarga');
$xajax->registerFunction('verDetalle');
$xajax->registerFunction('verSimilar');
$xajax->registerFunction('tarjeta');
$xajax->registerFunction('porcentaje');
$xajax->registerFunction('procesaPago');*/
$xajax->registerFunction('buscaCliente');
$xajax->registerFunction('muestraMsg');

$total_galeria=30;
?>
