  <?php

  if ($_POST["crear"]!="")
{

	$Nombre=$_POST["Nombre"];
	$Categoria=$_POST["Categoria"];
	$Marca=$_POST["Marca"];
	$Linkea=$_POST["Link"];

	$Activo=$_POST["Activo"];

	$Bajada=$_POST["Bajada"];
	$Precio=$_POST["Precio"];
	$Estrellas=$_POST["Estrellas"];
	$EstrellasT=$_POST["EstrellasT"];

	$Nombre_Ingles=$_POST["Nombre_Ingles"];
	$Marca_Ingles=$_POST["Marca_Ingles"];
	$Precio_Ingles=$_POST["Precio_Ingles"];

	$Nombre_Portugues=$_POST["Nombre_Portugues"];
	$Marca_Portugues=$_POST["Marca_Portugues"];
	$Precio_Portugues=$_POST["Precio_Portugues"];
	$orden=$_POST["orden"];

$status = "";
    // obtenemos los datos del archivo
    $tamano = $_FILES["archivo"]['size'];
    $tipo = $_FILES["archivo"]['type'];
    $archivo = $_FILES["archivo"]['name'];
    $prefijo = substr(md5(uniqid(rand())),0,6);

    if ($archivo != "") {
        // guardamos el archivo a la carpeta files
        $destino =  "../fotos/categorias/".$prefijo."_".$archivo;
        if (copy($_FILES['archivo']['tmp_name'],$destino)) {
            $status = "Archivo subido: <b>".$archivo."</b>";
        } else {
            $status = "Error al subir el archivo";
        }
    } else {
        $status = "Error al subir archivo";
    }

$Foto=substr($destino,3);


	$laSQL = "INSERT INTO categorias (Id,  Categoria, Nombre, Marca, Foto, Activo,  Link, Bajada, EstrellasT, Estrellas, Precio, Nombre_Ingles, Marca_Ingles, Precio_Ingles, Nombre_Portugues, Marca_Portugues, Precio_Portugues, orden)
	VALUES (NULL, '$Categoria', '$Nombre', '$Marca', '$Foto', '$Activo','$Linkea', '$Bajada', '$EstrellasT', '$Estrellas','$Precio', '$Nombre_Ingles', '$Marca_Ingles', '$Precio_Ingles', '$Nombre_Portugues', '$Marca_Portugues', '$Precio_Portugues', '$orden')";
	$result = mysqli_query($link,$laSQL);
	echo "
	<div class='valid_box'>
        CATEGORIA AGREGADA CORRECTAMENTE
     </div>";
$ultimo=mysqli_insert_id($link);

$CareItem=$_POST['CareItem'];
$CareDesc=$_POST['CareDesc'];

 for($x = 0; $x < count($CareItem); $x++ )
    {
	echo	"$ultimo";
	$laSQL = "INSERT INTO categorias_detalles (Id,  Categoria, Tipo, Detalle)
	VALUES (NULL, '$ultimo', '".$CareItem["$x"]."', '".$CareDesc["$x"]."')";
	$result = mysqli_query($link,$laSQL);
    }
return;

}
?>  <h1>CATEGORIA NUEVA</h1>

           <form action="" method="post" class="form" enctype="multipart/form-data" >
         <table width="100%" border="0" cellspacing="5" cellpadding="0">
              <tr>
     <td width="9%"><h5>Cateogria:</h5></td>
     <td width="91%">

	<select name="Categoria" size="1" id="Categoria">
	<option value="">Seleccionar...</option>
		<?php
			$dbh2 = mysqli_connect(db_dir_gestion(), db_usr_gestion(), db_pass_gestion(), db_base_gestion());

			$laSQL1 = "SELECT * FROM  categorias where activa= '1' ORDER BY orden";
			//echo $laSQL1;
			$result1 = mysqli_query($dbh2,$laSQL1);
			while ($rowL = mysqli_fetch_array($result1)) {
				echo '<option value="'.$rowL['categoria'].'">'.$rowL['categoria'].'</option>';
			}
		?>



			</select>
     </td>
   </tr>

   <tr>
     <td width="9%"><h5>Bajada:</h5></td>
     <td width="91%"><input type="text" name="Bajada"  style="width:500px" /></td>
     </td>
   </tr>
        <tr>
     <td width="9%"><h5>Nombre:</h5></td>
     <td width="91%"><input type="text" name="Nombre"  style="width:500px" /></td>
   </tr>
         <tr>
     <td width="9%"><h5>Marca:</h5></td>
     <td width="91%"><input type="text" name="Marca"  style="width:500px" /></td>
     </td>
   </tr>
      <tr>
     <td width="9%"><h5>Precio:</h5></td>
     <td width="91%"><input type="text" name="Precio"  style="width:500px" /></td>
     </td>
   </tr>
   <tr>
     <td width="9%"><h5>Nombre Ingles:</h5></td>
     <td width="91%"><input type="text" name="Nombre_Ingles"  style="width:500px" /></td>
   </tr>
         <tr>
     <td width="9%"><h5>Marca Ingles:</h5></td>
     <td width="91%"><input type="text" name="Marca_Ingles"  style="width:500px"/></td>
     </td>
   </tr>
         <tr>
     <td width="9%"><h5>Precio Ingles:</h5></td>
     <td width="91%"><input type="text" name="Precio_Ingles"  style="width:500px"/></td>
     </td>
   </tr>
   <tr>
     <td width="9%"><h5>Nombre Portugues:</h5></td>
     <td width="91%"><input type="text" name="Nombre_Portugues"  style="width:500px"/></td>
   </tr>
         <tr>
     <td width="9%"><h5>Marca Portugues:</h5></td>
     <td width="91%"><input type="text" name="Marca_Portugues"  style="width:500px"/></td>
     </td>
   </tr>
         <tr>
     <td width="9%"><h5>Precio Portugues:</h5></td>
     <td width="91%"><input type="text" name="Precio_Portugues"  style="width:500px"/></td>
     </td>
   </tr>
    <tr>
     <td width="9%"><h5>Orden:</h5></td>
     <td width="91%"><input type="text" name="orden"  style="width:500px"/></td>
     </td>
   </tr>
         <tr>
     <td width="9%"><h5>Tipo de estrellas:</h5></td>
     <td width="91%"><select name="EstrellasT" id="EstrellasT">
       <option value="local">local</option>
       <option value="global">global</option>
       <option value="sin">sin</option>
     </select></td>
     </td>
   </tr>
         <tr>
     <td width="9%"><h5>Estrellas:</h5></td>
     <td width="91%"><select name="Estrellas" id="Estrellas">
       <option value="1">1</option>
       <option value="2">2</option>
       <option value="3">3</option>
       <option value="4">4</option>
       <option value="5">5</option>
     </select></td>
     </td>
   </tr>

                 <tr>
     <td width="9%"><h5>Link (slug):</h5></td>
     <td width="91%"><input name="Link" type="text" id="Link"  style="width:400px" /></td>
   </tr>

                  <tr>
     <td width="9%"><h5>Foto:</h5></td>
     <td width="91%"><input name="archivo" type="file" size="35" /></td>
   </tr>

                    <tr>
     <td width="9%"><h5>Activo:</h5></td>
     <td width="91%"><select name="Activo" id="Activo">
       <option value="1">Si</option>
       <option value="0">No</option>
     </select></td>
   </tr>
      <tr>
     <td>Caracteristicas</td>
     <td>


     <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr><td>

  <div id="dynamicInput"><select name="CareItem[]">
    <option value="puertas">Puertas</option>
    <option value="aire">Aire</option>
    <option value="personas">Personas</option>
    <option value="maletas">Maletas</option>

    <option value="kilos">Kilos</option>
    <option value="maletaspeque">Maleta chica</option>
    <option value="centralizado">Cierre centralizado</option>
    <option value="disel">Disel</option>
    <option value="alarma">Alarma</option>
    <option value="direccion">Direccion asistida</option>
    <option value="levantavidrios">Levantavidrios</option>
    <option value="airbag">Airbag</option>
    <option value="vidrio_electrico">Vidrio Electrico</option>
    <option value="abs">Abs</option>
    <option value="isofix">Isofix</option>
    <option value="traccion">Traccion</option>
    <option value="doble_cabina">Doble Cabina</option>
    <option value="otros">Otros</option>
    </select>
    <input name="CareDesc[]" type="text"  style="width:300px" />

</div>

			<input type="button" id="more_fields" onclick="addInput('dynamicInput');" value="Agregar otro item" />
			<script>

var counter = 1;
var limit = 15;
function addInput(divName){
     if (counter == limit)  {
          alert("You have reached the limit of adding " + counter + " inputs");
     }
     else {
          var newdiv = document.createElement('div');
          newdiv.innerHTML = "<br><select name='CareItem[]'><option value='puertas'>Puertas</option><option value='aire'>Aire</option><option value='personas'>Personas</option><option value='maletas'>Maletas</option><option value='kilos'>Kilos</option><option value='maletaspeque'>Maleta chica</option><option value='centralizado'>Cierre centralizado</option><option value='disel'>Disel</option><option value='alarma'>Alarma</option><option value='direccion'>Direccion asistida</option><option value='levantavidrios'>Levantavidrios</option><option value='airbag'>Airbag</option><option value='vidrio_electrico'>Vidrio Electrico</option><option value='abs'>Abs</option><option value='isofix'>Isofix</option><option value='traccion'>Traccion</option><option value='doble_cabina'>Doble Cabina</option><option value='otros'>Otros</option></select><input name='CareDesc[]' type='text'  style='width:300px' />";
          document.getElementById(divName).appendChild(newdiv);
          counter++;
     }
}
</script>

</td><td></td></tr>
</table>


     <input name="crear" type="hidden" id="crear" value="si" /></td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td><input type="submit" name="submit" id="submit" value="Enviar"  style="width:500px"/></td>
   </tr>
         </table>


</form>


