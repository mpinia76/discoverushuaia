<?php error_reporting(0);//require('makeSecure.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>DISCOVER rent a car - Ushuaia - Pagos OnLine</title>
<style type="text/css">
img{
border:none;
}
#top {
margin:0 auto 0 auto;
width:782px;
height:100px;
background:url(top_posnet.jpg) no-repeat;
}
.salir{
float:right;
margin:0 30px;
padding-top:20px;
}
.titulo{
float:left;
}
#content{
margin:0 auto 0 auto;
width:782px;
background:url(bg_content.jpg) repeat-y;
}
#info{
padding:10px;
}
#end{
background:url(content_end.png) no-repeat;
height:10px;
margin:0 auto 0 auto;
width:782px;
}
</style>

</head>

<body bgcolor="#CCCCCC">
<div id="top"><a href="../logout.php"><img class="salir" src="b_salir.png"/></a></div>
<div id="content">
<div id="info">
<?php
if(isset($_GET['noperacion'])){

	$nroOperacion = $_GET['noperacion'];

	$arrayNroOperacion = explode('_', $nroOperacion);
    /*ob_start();
    print_r($_POST);
    $data = ob_get_contents();
    ob_end_clean();*/
    $nombreFile = 'Reserva_MP_'.date('Ymd');
	 $dt = date('Y-m-d G:i:s');

	 $_Log = fopen("logs/" . $nombreFile . ".log", "a+") or die("Operation Failed!");

	 fputs($_Log, $dt . $data ."\n");
	if ($arrayNroOperacion[0]=='AUTO') {
		include("../conex.php");
		include("../db.php");
		$dbh2 = mysqli_connect(db_dir_gestion(), db_usr_gestion(), db_pass_gestion(), db_base_gestion());

		$laSQL = "SELECT * FROM  reservas where id = '".$arrayNroOperacion[1]."'";
		$resultReserva = mysqli_query($dbh2,$laSQL);
		//echo $laSQL.'<br>';
		fputs($_Log, $dt . $laSQL ."\n");
		if ($rowReserva = mysqli_fetch_array($resultReserva)) {
			list($dia1,$mes1,$ano1) = explode("-",$rowReserva['retiro']);
			list($dia2,$mes2,$ano2) = explode("-",$rowReserva['devolucion']);
			$desde = $dia1.'/'.$mes1.'/'.$ano1;
			$hasta = $dia2.'/'.$mes2.'/'.$ano2;

		}

			if ($arrayNroOperacion[0]=='AUTO'){
				echo '<strong>Su reserva no ha podido realizarse. Por el siguiente motivo: '.$_POST['motivo'].'
			</strong><br><br><br>';
				$cuerpo = "<div style=\"font-family:tahoma,sans-serif;color:rgb(68,68,68)\">
				Estimado ".$_POST['titular']."<br>
				Su pago ha sido rechazado por el proveedor del sistema de cobros. Puede que usted haya ingresado algún dato de manera errónea o
				que tenga que autorizar la operación con el emisor de su plástico. ¡De todos modos no se preocupe! NO REALICE UNA NUEVA RESERVA.
				Aunque no se encuentra confirmada, guardaremos los datos de la que acaba de realizar y nos comunicaremos con usted para poder
				confirmarla. Si lo desea puede comunicarse usted con nosotros mediante nuestro formulario de contacto o al email y teléfonos que
				figuran en la firma de este correo.<br><br>
				Muchas Gracias por su preferencia.<br><br><br><br>



	Atte.";




				$cuerpo .= "</div>
				<br><br>
				<div style=\"font-family:tahoma,sans-serif;color:rgb(68,68,68)\">
				<div style=\"color:rgb(102,102,102);text-align:center;font-family:arial\">
					<font size=\"1\" color=\"#666666\" face=\"verdana, sans-serif\"><b>Oficina de Reservas</b></font>
				</div>
				<div style=\"color:rgb(102,102,102);font-family:verdana,sans-serif;text-align:center\">
					<font size=\"1\" color=\"#666666\" face=\"verdana, sans-serif\"><b>Discover Rent a Car</b></font>
				</div>
				<div style=\"color:rgb(102,102,102);font-family:verdana,sans-serif;text-align:center\">
					<font size=\"1\" color=\"#666666\" face=\"verdana, sans-serif\"><b><br></b></font>
				</div>
				<div style=\"color:rgb(102,102,102);font-family:verdana,sans-serif\">
					<div style=\"text-align:center;font-size:12.8px;font-family:tahoma,sans-serif;color:rgb(68,68,68)\">
						<img src=\"http://www.discoverushuaia.com.ar/images/logo_mail.jpg\" style=\"margin-right:0px\" width=\"162\" height=\"51\">&nbsp;&nbsp;
					</div>
					<div style=\"text-align:center;font-size:12.8px;font-family:tahoma,sans-serif;color:rgb(68,68,68)\">
						<b style=\"font-size:12.8px\"><font size=\"1\">@discoverrentacar</font></b><br>
					</div>
				</div>
				<div style=\"color:rgb(102,102,102);font-family:verdana,sans-serif\">
					<p class=\"MsoNormal\" style=\"text-align:center;font-family:tahoma,sans-serif\">
					<span lang=\"ES-TRAD\"><font size=\"1\" color=\"#666666\" face=\"tahoma, sans-serif\"><br></font></span>
					</p>
					<p class=\"MsoNormal\" style=\"text-align:center\"><span lang=\"ES-TRAD\">
					<font size=\"1\" color=\"#666666\" face=\"verdana, sans-serif\">25 de Mayo 260; 2° piso; of: 9; Ushuaia; Tierra del Fuego; Argentina</font></span></p>
					<p class=\"MsoNormal\" style=\"text-align:center\"><font size=\"1\" color=\"#666666\" face=\"verdana, sans-serif\"><span lang=\"ES-TRAD\">Te</span>l./Fax.: (54) 2901 425337 -&nbsp;</font>
					<span style=\"font-size:x-small;text-align:start\">Whatsapp:+(549) 2901 646393</span></p><p class=\"MsoNormal\" style=\"text-align:center\">
					<font size=\"1\" color=\"#666666\" face=\"verdana, sans-serif\">Oficina de Reservas Puerto Madero; Buenos Aires; Argentina</font></p>
					<p class=\"MsoNormal\" style=\"text-align:center\"><font size=\"1\" color=\"#666666\" face=\"verdana, sans-serif\"><span lang=\"ES-TRAD\">Te</span>l./Fax.: (54) 011 52547702 -&nbsp;</font>
					<span style=\"font-size:x-small\">Solo desde CABA: 0810-345-5002</span></p><p class=\"MsoNormal\" style=\"text-align:center\"><b style=\"font-size:x-small\">
					<a href=\"mailto:info@discoverushuaia.com.ar\" target=\"_blank\">info@discoverushuaia.com.ar</a>&nbsp;</b><b style=\"font-size:x-small\">
					<a href=\"http://www.discoverushuaia.com.ar/\" target=\"_blank\">
					www.discoverushuaia.com.ar</a></b><span style=\"font-size:x-small\">&nbsp;</span></p></div></div>";


				$asunto .= "Pago de reserva rechazado";


				$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
				$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

				// Cabeceras adicionales
				$cabeceras .= 'To: '.$_POST['titular'].'<'.$_POST['emailcomprador'].'>' . "\r\n";
				//$cabeceras .= "From: $nombre <" . $_POST['email'] . ">" . "\r\n";
				$cabeceras .= 'From: Discover Ushuaia Rent a Car<info@discoverushuaia.com.ar>' . "\r\n";


				@mail($_POST['emailcomprador'], $asunto, $cuerpo, $cabeceras);

				$cuerpo = "Ip:".$_SERVER['REMOTE_ADDR'] . "<p>";
			    $cuerpo .= "Datos de la Reserva: N°: ".$rowReserva['numero']."<br>";

				$laSQL = "SELECT * FROM  clientes where id = '".$rowReserva['cliente_id']."'";
				$resultCliente = mysqli_query($dbh2,$laSQL);
				//echo $laSQL.'<br>';
				fputs($_Log, $dt . $laSQL ."\n");
				if ($rowCliente = mysqli_fetch_array($resultCliente)) {


					$telefono = $rowCliente['telefono'];
					$cliente = $rowCliente['nombre_apellido'];

				}

				$cuerpo .= "Cliente: ".$cliente."<br>";

				$cuerpo .= "Email: ".$_POST['emailcomprador']."<br>";
				$cuerpo .= "Tel: ".$telefono."<p>";

				$laSQL = "SELECT C.categoria, C.vehiculos FROM  categorias C INNER JOIN unidads U ON C.id = U.categoria_id  where U.id= ".$rowReserva['unidad_id'];
				$resultCat = mysqli_query($dbh2,$laSQL);
				fputs($_Log, $dt . $laSQL ."\n");
				if(mysqli_affected_rows($dbh2)>0){
					if ($rowCat = mysqli_fetch_array($resultCat)) {
						$categoria_nombre = utf8_encode($rowCat['categoria'].' - '.$rowCat['vehiculos']);
					}
				}

				$cuerpo .= "Categoria: ".$categoria_nombre."<br>";
				$laSQL = "SELECT ES.subrubro FROM reserva_extras RE INNER JOIN extras E ON RE.extra_id = E.id INNER JOIN extra_subrubros
				ES ON E.extra_subrubro_id = ES.id WHERE RE.reserva_id=".$arrayNroOperacion[1];
				fputs($_Log, $dt . $laSQL ."\n");
				$resultExtras = mysqli_query($dbh2,$laSQL);
				if ($rowExtras = mysqli_fetch_array($resultExtras)) {
					$extras .= utf8_encode($rowExtras['subrubro'])." - ";
				}
				$extras = substr($extras, 0, (strlen($extras)-3));

				$cuerpo .= "Extras: ".$extras."<br>";
				if ($rowReserva['discover']==1) {
					$seguro = 'Discover';
				}
				elseif ($rowReserva['discover_plus']==1) {
					$seguro = 'Discover Plus';
				}
				elseif ($rowReserva['discover_advance']==1) {
					$seguro = 'Discover Advance';
				}
				$cuerpo .= "Seguro: ".$seguro."<br>";
				$laSQL = "SELECT * FROM  lugars WHERE id=".$rowReserva['lugar_retiro_id'];
				fputs($_Log, $dt . $laSQL ."\n");
				$resultLugar = mysqli_query($dbh2,$laSQL);
				if ($rowLugar = mysqli_fetch_array($resultLugar)) {
					$lugarRetiro_nombre = ($rowLugar['lugar']);
				}
				$cuerpo .= "<p><strong>Retiro</strong><br>".$lugarRetiro_nombre.' '.$desde.' '.$rowReserva['hora_retiro']."<br>";
				$laSQL = "SELECT * FROM  lugars WHERE id=".$rowReserva['lugar_devolucion_id'];
				fputs($_Log, $dt . $laSQL ."\n");
				$resultLugar = mysqli_query($dbh2,$laSQL);
				if ($rowLugar = mysqli_fetch_array($resultLugar)) {
					$lugarDevolucion_nombre = ($rowLugar['lugar']);
				}
				$cuerpo .= "<p><strong>Devolucion</strong><br>".$lugarDevolucion_nombre.' '.$hasta.' '.$rowReserva['hora_devolucion']."<p>";
				$laSQL = "SELECT * FROM  descuentos WHERE id = ".$arrayNroOperacion[5];
				fputs($_Log, $dt . $laSQL ."\n");
				$resultCobro = mysqli_query($dbh2,$laSQL);
				if ($rowCobro = mysqli_fetch_array($resultCobro)) {
					$tipoCobro = $rowCobro['descuento'];
				}
				$cuerpo .= "Forma de Pago: ".$tipoCobro."/Pago rechazado<br>";
				$cuerpo .= "Motivo del rechazo: ".$_POST['motivo']."<br>";


				$cuerpo .= "Enviado el ".date("d-m-Y")." a las ".date("H:i")."<p>";


				$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
				$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

				// Cabeceras adicionales
				$cabeceras .= 'To: Discover Ushuaia Rent a Car<info@discoverushuaia.com.ar>' . "\r\n";
				//$cabeceras .= "From: $nombre <" . $_POST['email'] . ">" . "\r\n";
				$cabeceras .= 'From: Discover Ushuaia Rent a Car<info@discoverushuaia.com.ar>' . "\r\n";
				$cabeceras .= 'Cc: blengioj@discoverushuaia.com.ar,minervinim@discoverushuaia.com.ar,pacec@discoverushuaia.com.ar' . "\r\n";

				@mail("info@discoverushuaia.com.ar.test-google-a.com", "Nueva Reserva desde la web/Pago Rechazado", $cuerpo, $cabeceras);
			}

		}
        fclose($_Log);
	}




?>
</div>
</div>
<div id="end">
</div>
</body>
</html>
