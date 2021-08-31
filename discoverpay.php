<style>

 .form-barra
 {display:none}
#gmap{
left: 0;
position: absolute !important;
width: 100%;
height:70%;
z-index: 0;
top:100px;} /* One increment smaller than the z-index of container */

#container{
margin: 0 auto;
overflow: visible !important;
position: relative;
top: -35px;
width: 500px;
z-index: 2;
float:left } /* One increment larger than the Google Maps z-index of iframe */

.opcionAzul{
	color:#547da1;
}
</style>
<div class="page-heading" style="height:100px;padding-top: 4px;padding-bottom: 20px;">
</div>
<?php
@session_start();
if (isset($_SESSION['idioma'])) {
	switch ($_SESSION['idioma']) {
		case 'es':
			include("messages_es.php");
		break;
		case 'po':
			include("messages_po.php");
		break;
		case 'en':
			include("messages_en.php");
		break;

	}

}
else{
	include("messages_es.php");
}
?>
<div class="container content-page container-contacto" align="center">

<iframe id="gmap" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d4599.090046188452!2d-68.307355!3d-54.80553900000001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xbc4c23206c5b8887%3A0xe4dfa0b392f22dab!2s25+de+Mayo+260%2C+V9410DFF+Ushuaia%2C+Tierra+del+Fuego%2C+Argentina!5e0!3m2!1ses!2sar!4v1476537668973" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" width="425" height="350"></iframe>

<div id="container" class="container-contacto"><div dir="ltr" style="text-align: left;" trbidi="on">
<br /></div>

<div style="background:#FFF; padding:10px; text-align:left; font-size:11px;box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
" class="col-md-12"><h5><?php echo utf8_encode(DONDE_ESTAMOS);?></h5>

<div class="vc_col-sm-6"><i class="fa fa-map-marker" aria-hidden="true"></i> USHUAIA<br>25 de Mayo 260 2° 9<br>Ushuaia, Tierra del Fuego, Argentina (9410) <br>Tel. (54) 2901 425337</div>
<div class="vc_col-sm-6"><i class="fa fa-map-marker" aria-hidden="true"></i> BUENOS AIRES<br><?php echo utf8_encode(OFICINA_RESERVAS);?><br>
CABA, Argentina (1107)<br>
Tel. (54) 11 52547702 <br>
0810-345-5002 <?php echo utf8_encode(SOLO_DESDE);?> CABA
</div>
</div>
<p>&nbsp;<p>
<form method="POST" name="form" id="form_decidir" action="https://sps.decidir.com/sps-ar/Validar">
<input type="hidden" name="NROOPERACION" value="<?php echo $_POST['NROOPERACION']?>">
<input type="hidden" name="NROCOMERCIO" value="00150809">
<input type="hidden" name="IDTEMPLATES" value="discoverushuaia">
<input type="hidden" name="NOMBRE" value="<?php echo $_POST['NOMBRE']?>">
<input type="hidden" name="APELLIDO" value="<?php echo $_POST['APELLIDO']?>">
<input type="hidden" name="CALLE" value="<?php echo $_POST['CALLE']?>">
<input type="hidden" name="NROPUERTA" value="<?php echo $_POST['NROPUERTA']?>">
<input type="hidden" name="FECHADENACIMIENTO" value="<?php echo $_POST['FECHADENACIMIENTO']?>">
<input type="hidden" name="MONTO" value="<?php echo $_POST['MONTO']?>">
<input type="hidden" name="NRODOC" value="<?php echo $_POST['NRODOC']?>" />
<input type="hidden" name="EMAILCLIENTE" value="<?php echo $_POST['EMAILCLIENTE']?>" />
<input type="hidden" id="CUOTAS" name="CUOTAS" value="<?php echo $_POST['CUOTAS']?>">
<input type="hidden" id="MEDIODEPAGO" name="MEDIODEPAGO" value="<?php echo $_POST['MEDIODEPAGO']?>">
<input type="hidden" name="URLDINAMICA" value="https://www.discoverushuaia.com.ar/posnet/index.php?ref=exito">
</form>

<form action="" method="post" name="contact-form" id="contact-form" style="background-color:#93b8d8;box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3); padding:20px; text-align:left" class="contact-form">
<h5><?php echo utf8_encode(DISCOVER_PAY);?></h5><p></p>

<?php
if($_POST['finProcesoTarjeta']){
		/*echo '<strong>Su reserva ha sido realizada con &eacute;xito. Usted recibira&acute; un correo electr&oacute;nico confirmando su pago. Gracias por elegirnos como su soluci&oacute;n de movilidad en el fin del mundo
		</strong><br><br><br><br><br><br>';*/
		echo utf8_encode(PROCESANDO).'<br><br><br><br><br><br><br>';
		echo '<script>$("#form_decidir").submit();</script>';
	}
elseif($_POST['enviarform']){

	$monto_pagado = $_POST['totalFinal'];
	$intereses = $monto_pagado-$_POST['total'];

	$pago = $monto_pagado;


	$pago = number_format($pago, 2, '.', '');

	$arrayCuotas=explode('-',$_POST['CUOTAS']);

	$intereses = number_format($intereses, 2);
	$nroOperacion = 'MANUAL_'.$_POST['reserva_id'].'_'.$_POST['total'].'_0_'.$intereses.'_'.$_POST['MEDIODEPAGO'];

	$monto_cobrado = str_replace('.', '', $pago);

	echo '<input type="hidden" id="finProcesoTarjeta" name="finProcesoTarjeta" value="1">
	<input type="hidden" id="NROOPERACION" name="NROOPERACION" value="'.$nroOperacion.'">
	<input type="hidden" id="NOMBRE" name="NOMBRE" value="'.$_POST['nombre'].'">
	<input type="hidden" id="APELLIDO" name="APELLIDO" value="'.$_POST['apellido'].'">
	<input type="hidden" id="EMAILCLIENTE" name="EMAILCLIENTE" value="'.$_POST['email'].'">
	<input type="hidden" id="MONTO" name="MONTO" value="'.$monto_cobrado.'">
	<input type="hidden" id="CUOTAS" name="CUOTAS" value="'.$arrayCuotas[0].'">
	<input type="hidden" id="MEDIODEPAGO" name="MEDIODEPAGO" value="'.$_POST['MEDIODEPAGO'].'">
	';

	echo utf8_encode(PROCESANDO).'<br><br><br><br><br><br><br>';
	echo '<script>$("#contact-form").submit();</script>';

}else{


	$laSQL = "SELECT R.*, C.nombre_apellido, C.email, C.telefono FROM  reservas R INNER JOIN clientes C ON R.cliente_id = C.id WHERE R.id = ".$_GET['id_reserva'];
	$result = mysqli_query($dbh2,$laSQL);
	if(mysqli_affected_rows($link)>0){
		if ($rowL = mysqli_fetch_array($result)) {
			$nombre_apellido = $rowL['nombre_apellido'];
			$email = $rowL['email'];
			$telefono = $rowL['telefono'];
			$total = $rowL['total'];
		}
	}


?>
<input class="contact-form-name" id="nombre" name="nombre" size="40" value="<?php echo $nombre_apellido;?>" type="text" placeholder="<?php echo NOMBRE;?>" required"/>

<input class="contact-form-name" id="email" name="email" size="40" value="<?php echo $email;?>" type="text" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" title="mail@ejemplo.com" placeholder="Email" required/>

<input class="contact-form-name" id="telefono" name="telefono" size="20" value="<?php echo $telefono;?>" type="text" placeholder="<?php echo utf8_encode(TELEFONO)?>" required/>

<?php
if (($rowL['estado']!=2)&&($rowL['estado']!=1)) {
	$no_adelantadas = 0;
	$laSQL = "SELECT * FROM  reserva_extras WHERE reserva_id = ".$_GET['id_reserva']." AND adelantada = 0";
	$result = mysqli_query($dbh2,$laSQL);
	if(mysqli_affected_rows($link)>0){
		while($rowL = mysqli_fetch_array($result)) {
			$no_adelantadas += $rowL['cantidad'] * $rowL['precio'];
		}
	}
	$devoluciones = 0;
	$laSQL = "SELECT * FROM  reserva_devoluciones WHERE reserva_id = ".$_GET['id_reserva'];
	$result = mysqli_query($dbh2,$laSQL);
	if(mysqli_affected_rows($link)>0){
		while($rowL = mysqli_fetch_array($result)) {
			$devoluciones += $rowL['monto'];
		}
	}
	$descuentos = 0;
	$laSQL = "SELECT * FROM  reserva_cobros WHERE reserva_id = ".$_GET['id_reserva']." AND tipo = 'DESCUENTO'";
	$result = mysqli_query($dbh2,$laSQL);
	if(mysqli_affected_rows($link)>0){
		while($rowL = mysqli_fetch_array($result)) {
			$descuentos += $rowL['monto_neto'];
		}
	}
	$pagos = 0;
	$laSQL = "SELECT * FROM  reserva_cobros WHERE reserva_id = ".$_GET['id_reserva']." AND tipo != 'DESCUENTO'";
	$result = mysqli_query($dbh2,$laSQL);
	if(mysqli_affected_rows($link)>0){
		while($rowL = mysqli_fetch_array($result)) {
			$pagos += $rowL['monto_cobrado'];
		}
	}

	$pendiente = Round($total + $no_adelantadas - $pagos - $descuentos + $devoluciones,2);
	$pendiente = ($pendiente==-0)?0:$pendiente;
	if ($pendiente>0) {
		echo '<br><div id="selectTarjetas">

				'.utf8_encode(TARJETA).'
				<select name="MEDIODEPAGO" size="1" id="mediodepago" style="display:inline;width:80px;" required>';
				echo '<option value="">Seleccionar...</option>';
			$laSQL = "SELECT DISTINCT marca, id_decidir FROM cobro_tarjeta_tipos WHERE activa = 1 AND cobro_tarjeta_posnet_id = 1";
			$result = mysqli_query($dbh2,$laSQL);

			while ($rowL = mysqli_fetch_array($result)) {
				echo '<option value="'.$rowL['id_decidir'].'">'.$rowL['marca'].'</option>';
			}
			echo '

				</select> ';
			if ($_SESSION['idioma']=='es') {
				echo utf8_encode(EN).'
				<span id="selectCuotas">
				<select name="CUOTAS" size="1" id="cuotas" style="display:inline" required>


				</select></span> '.utf8_encode(CUOTAS);
			}

			echo '</div>';

		if ($_SESSION['idioma']=='es') {
			echo '<div id="divSaldoTarjeta">
					<div align="right"><strong>'.utf8_encode(INTERESES_FINANCIEROS).'*: <span id="spanIntereses">$0,00</span><br>
					'.utf8_encode(TOTAL_A_PAGAR).': <span id="spanTotalTarjeta">$'.$pendiente.'</span>
				</strong></div>
				<div style="font-size:8px;"><strong>*'.utf8_encode(INTERESES_FINANCIEROS_COMENTARIO).'</strong></div>
				</div>
				';
			}
		else{
			echo '<input type="hidden" name="CUOTAS" id="CUOTAS" value="1" ><div id="divSaldoTarjeta">
					<div align="right"><strong>'.utf8_encode(TOTAL_A_PAGAR).': <span id="spanTotalTarjeta">$'.$pendiente.'</span>
				</strong></div>

				</div>
				';
		}
		echo '
		<input type="hidden" name="reserva_id" id="reserva_id" value="'.$_GET['id_reserva'].'" >
		<input type="hidden" name="total" id="total" value="'.$pendiente.'" >
		<input type="hidden" name="totalFinal" id="totalFinal" value="'.$pendiente.'" >
		<input type="submit" name="enviarform" id="enviarform" value="'.utf8_encode(ABONAR).'" style=" width:100%">
		</div>
		<p></p>';
	}
	else{
		echo '<strong>'.utf8_encode(RESERVA_ABONADA).'
		</strong><br><br>
		<center>
		<input type="button" name="terminarProceso" id="terminarProceso" value="'.utf8_encode(TERMINAR_PROCESO).'" onclick="window.location.href=\'index.html\'">
		</center>

		<br><br><br><br>';
	}

}
else{
	echo '<strong>'.utf8_encode(RESERVA_ABONADA).'
	</strong><br><br>
	<center>
	<input type="button" name="terminarProceso" id="terminarProceso" value="'.utf8_encode(TERMINAR_PROCESO).'" onclick="window.location.href=\'index.html\'">
	</center>

	<br><br><br><br>';
}


?>





<?php

}?>

</form>



</div>


</div>


<script type="text/javascript">
		jQuery.noConflict();
        jQuery(document).ready(function () {
            window.asd = jQuery('.SlectBox2').SumoSelect({ csvDispCount: 3, captionFormatAllSelected: "Todos" });

        });



var formatNumber = {
		 separador: ".", // separador para los miles
		 sepDecimal: ',', // separador para los decimales
		 formatear:function (num){
		  num +='';
		  var splitStr = num.split('.');
		  var splitLeft = splitStr[0];
		  var splitRight = splitStr.length > 1 ? this.sepDecimal + splitStr[1] : '';
		  var regx = /(\d+)(\d{3})/;
		  while (regx.test(splitLeft)) {
		  splitLeft = splitLeft.replace(regx, '$1' + this.separador + '$2');
		  }
		  return this.simbol + splitLeft  +splitRight;
		 },
		 new:function(num, simbol){
		  this.simbol = simbol ||'';
		  return this.formatear(num);
		 }
		}


$(function() {
	$("#mediodepago").change();

	})






$(function(){
	$("#mediodepago").change(function(){ // se activa el script cuando selecciono el select vehiculo
		 tarjeta=$(this).val() // Tomo el valor seleccionado

		 //envio a una pagina que hara la consulta sql y me devolvera los datos para poner en el select

		 $.get("posnet/cuotasSelectNueva.php?tarjeta="+tarjeta,
			 function(data){
				 $("#selectCuotas").html(data); // Tomo el resultado e inserto los datos en el select marca
				 $("#cuotas").change();
			 });
	});

});

function seleccionarCuota(e){

	var res = e.value.split("-");
	//var total = $("input[name='total_pago']:checked").val().split("-");
	var total = $("#total").val();

	var num_interes = Math.round(parseFloat(total)*(parseFloat(res[1])-1)*100)/100;

	$("#spanIntereses").html(formatNumber.new(num_interes, "$"));
	$("#spanTotalTarjeta").html(formatNumber.new(parseFloat(total)+parseFloat(num_interes), "$"));
	$('#totalFinal').val(parseFloat(total)+parseFloat(num_interes));
}


</script>

    <script src="js/jquery.sumoselect.js"></script>
    <link href="css/sumoselect.css" rel="stylesheet" />



