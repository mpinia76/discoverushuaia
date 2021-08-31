
<script type='text/javascript' src='../js/jquery-1.6.1.min.js'></script>
<script type="text/javascript">
$(function(){
	$("#mediodepago").change(function(){ // se activa el script cuando selecciono el select vehiculo
		 tarjeta=$(this).val() // Tomo el valor seleccionado
	 	
		 //envio a una pagina que hara la consulta sql y me devolvera los datos para poner en el select
	 
		 $.get("cuotasSelect.php?tarjeta="+tarjeta,
			 function(data){
				 $("#selectCuotas").html(data); // Tomo el resultado e inserto los datos en el select marca								
			 });															
	});
	});		

$( document ).ready(function() {
	$("#mediodepago").change();
});



        
    </script>
<form method="POST" name="form" action="index.php?ref=procesa">
<input type="hidden" name="NROOPERACION" value="<?php echo mt_rand(1000000000,9999999999)?>">
<input type="hidden" name="NROCOMERCIO" value="00150809">
<input type="hidden" name="IDTEMPLATES" value="discoverushuaia">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td width="53%" valign="top" class="campo_titulo">
            <p style="font-family:Arial, Helvetica, sans-serif; font-size:12px;">
			<b>Verifique los datos guardados</b>
			</p>
            <p style="font-family:Arial, Helvetica, sans-serif; font-size:12px;">
			Nombre: <input type="text" name="NOMBRE" size="12"> Apellido: <input type="text" name="APELLIDO" size="12">
			</p>
			<p style="font-family:Arial, Helvetica, sans-serif; font-size:12px;">
			Email: <input type="text" name="EMAILCLIENTE" size="20">
			</p>
			<p style="font-family:Arial, Helvetica, sans-serif; font-size:12px;">
			Numero y tipo de documento: 
			<select size="1" name="TIPODOC" class="campo">
			<option <?php if($_POST['TIPODOC']==1){ echo 'selected="selected"'; }?> value="1">DNI</option>
			<option <?php if($_POST['TIPODOC']==2){ echo 'selected="selected"'; }?> value="2">CI</option>
			<option <?php if($_POST['TIPODOC']==3){ echo 'selected="selected"'; }?> value="3">LE</option>
			<option <?php if($_POST['TIPODOC']==4){ echo 'selected="selected"'; }?> value="4">LC</option>
			</select>
			<input type="text" name="NRODOC" size="20">
			</p>
			<p style="font-family:Arial, Helvetica, sans-serif; font-size:12px;">
			Calle y numero: 
			<input type="text" name="CALLE" size="15"><input type="text" name="NROPUERTA" size="5">
			</p>
			<p style="font-family:Arial, Helvetica, sans-serif; font-size:12px;">
			Fecha de nacimiento: 
			<input type="text" name="FECHANACIMIENTO" size="10" class="campo" value="<?php echo $_POST['FECHANACIMIENTO']?>"/><br />
			Formato DDMMAAAA, ejemplo 02/12/1988 -> 02131968	
			</p>
		</td>
		<td width="47%" valign="top" class="campo_titulo">
			<p style="font-family:Arial, Helvetica, sans-serif; font-size:12px;">
			<strong>Seleccione la monto y forma de pago</strong>
			</p>
			
			<p style="font-family:Arial, Helvetica, sans-serif; font-size:12px;">
			Monto: $<input type="text" name="MONTO" size="10">,<input type="text" name="DECIMAL" size="2" value="00"><br>
			</p>
			<p style="font-family:Arial, Helvetica, sans-serif; font-size:12px;">
			<span id="4">Tarjeta de Credito 
			<select name="MEDIODEPAGO" size="1" id='mediodepago'>
			<option value="1">VISA</option>
                        <option value="6">American Express</option>
                        <option value="15">Mastercard</option>
                        <option value="8">Diners</option>
			</select> en 
			<span id="selectCuotas">
			<select name="CUOTAS" size="1" id="cuotas">
			
			
			</select></span> couta/s
			</p>
			<br><br>
			<br>
			<input type="submit" value="Procesar >" name="procesar">
		</td>
	</tr>
	</table>
</form>