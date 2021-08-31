<?php

	include("../conex.php");
	include("../db.php");
	$vdir = db_dir();
	$vusr = db_usr();
	$vpass = db_pass();
	$vbase = db_base();
	$link=Conectarse( $vdir, $vusr, $vpass, $vbase);
	
	?>
<script type='text/javascript' src='../js/jquery-1.6.1.min.js'></script>
<script type="text/javascript">
$(function(){
	$("#mediodepago").change(function(){ // se activa el script cuando selecciono el select vehiculo
		 tarjeta=$(this).val() // Tomo el valor seleccionado
	 	
		 //envio a una pagina que hara la consulta sql y me devolvera los datos para poner en el select
	 
		 $.get("cuotasSelect.php?tarjeta="+tarjeta+"&cuotaSeleccionada="+<?php echo $_POST['CUOTAS']; ?>,
			 function(data){
				 $("#selectCuotas").html(data); // Tomo el resultado e inserto los datos en el select marca								
			 });															
	});
	});		

$( document ).ready(function() {
	$("#mediodepago").change();
});



        
    </script>
<form method="POST" name="form" action="https://sps.decidir.com/sps-ar/Validar">
<input type="hidden" name="NROOPERACION" value="<?php echo $_POST['NROOPERACION']?>">
<input type="hidden" name="NROCOMERCIO" value="<?php echo $_POST['NROCOMERCIO']?>">
<input type="hidden" name="IDTEMPLATES" value="<?php echo $_POST['IDTEMPLATES']?>">
<input type="hidden" name="NOMBRE" value="<?php echo $_POST['NOMBRE']?>">
<input type="hidden" name="APELLIDO" value="<?php echo $_POST['APELLIDO']?>">
<input type="hidden" name="CALLE" value="<?php echo $_POST['CALLE']?>">
<input type="hidden" name="NROPUERTA" value="<?php echo $_POST['NROPUERTA']?>">
<input type="hidden" name="FECHADENACIMIENTO" value="<?php echo $_POST['FECHADENACIMIENTO']?>">
<input type="hidden" name="MONTO" value="<?php echo $_POST['MONTO']?><?php echo $_POST['DECIMAL']?>">
<input type="hidden" name="NRODOC" value="<?php echo $_POST['NRODOC']?>" />
<input type="hidden" name="EMAILCLIENTE" value="<?php echo $_POST['EMAILCLIENTE']?>" />
<input type="hidden" name="URLDINAMICA" value="http://www.discoverushuaia.com.ar/posnet/index.php?ref=exito">
<?php 
$nombreFile = date('Ymd') . '_log';
         $dt = date('Y-m-d G:i:s');

         $_Log = fopen("logs/" . $nombreFile . ".log", "a+") or die("Operation Failed!");

         fputs($_Log, $dt . " --> Operacion: " . $_POST['NROOPERACION'] . "; Apellido y Nombre: " . $_POST['APELLIDO'].", ".$_POST['NOMBRE'] ."; DOC: " . $_POST['NRODOC'] ."; MAIL: " . $_POST['EMAILCLIENTE'] ."\n");

         fclose($_Log);
?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td width="53%" valign="top" class="campo_titulo">
            <p style="font-family:Arial, Helvetica, sans-serif; font-size:12px;">
			<b>Verifique los datos guardados</b>
			</p>
            <p style="font-family:Arial, Helvetica, sans-serif; font-size:12px;">
			<?php echo $_POST['NOMBRE']?> <?php echo $_POST['APELLIDO']?>
			</p>
			<p style="font-family:Arial, Helvetica, sans-serif; font-size:12px;">
			<?php echo $_POST['EMAILCLIENTE']?>
			</p>
			<p style="font-family:Arial, Helvetica, sans-serif; font-size:12px;">
			Numero y tipo de documento: 
			<select size="1" name="TIPODOC" class="campo">
			<option <?php if($_POST['TIPODOC']==1){ echo 'selected="selected"'; }?> value="1">DNI</option>
			<option <?php if($_POST['TIPODOC']==2){ echo 'selected="selected"'; }?> value="2">CI</option>
			<option <?php if($_POST['TIPODOC']==3){ echo 'selected="selected"'; }?> value="3">LE</option>
			<option <?php if($_POST['TIPODOC']==4){ echo 'selected="selected"'; }?> value="4">LC</option>
			</select>
			<?php echo $_POST['NRODOC']?>
			</p>
			<p style="font-family:Arial, Helvetica, sans-serif; font-size:12px;">
			Calle y numero: 
			<?php echo $_POST['CALLE']?> <?php echo $_POST['NROPUERTA']?>
			</p>
			<p style="font-family:Arial, Helvetica, sans-serif; font-size:12px;">
			Fecha de nacimiento: 
			<?php echo $_POST['FECHANACIMIENTO']?>
			</p>
			<p style="font-family:Arial, Helvetica, sans-serif; font-size:12px;">
			Numero de operacion: 
			<?php echo $_POST['NROOPERACION']?>
			</p>
		</td>
		<td width="47%" valign="top" class="campo_titulo">
			<p style="font-family:Arial, Helvetica, sans-serif; font-size:12px;">
			<strong>Verifique el monto y forma de pago</strong>
			</p>
			
			<p style="font-family:Arial, Helvetica, sans-serif; font-size:12px;">
			Monto: $<?php echo $_POST['MONTO']?>,<?php echo $_POST['DECIMAL']?><br>
			</p>
			<p style="font-family:Arial, Helvetica, sans-serif; font-size:12px;">
			<span id="4">Tarjeta de Credito 
			
			<select name="MEDIODEPAGO" size="1" id="mediodepago">
			<option <?php if($_POST['MEDIODEPAGO']==1){ echo 'selected="selected"'; }?>  value="1">VISA</option>
                        <option <?php if($_POST['MEDIODEPAGO']==6){ echo 'selected="selected"'; }?>  value="6">American Express</option>
			<option <?php if($_POST['MEDIODEPAGO']==15){ echo 'selected="selected"'; }?>  value="15">Mastercard</option>
                        <option <?php if($_POST['MEDIODEPAGO']==8){ echo 'selected="selected"'; }?>  value="8">Diners</option>
			</select> en 
			<span id="selectCuotas">
			<select name="CUOTAS" size="1" id="cuotas">
			
			</select></span> couta/s
			</p>
			<br>
			<p style="font-family:Arial, Helvetica, sans-serif; font-size:12px;">
			Si desea modificar la informaci&oacute;n presiona Atr&aacute;s en el explorador
			</p>
			<br />
			<input type="submit" value="Procesar >" name="procesar">
		</td>
	</tr>
	</table>
</form>