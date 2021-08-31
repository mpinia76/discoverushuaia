<?php
    $id=$_GET['id'];
  //print_r($_POST);
  if ($_POST["crear"]!="")
{

	$Nombre=$_POST["Nombre"];
	$Categoria=$_POST["Categoria"];
	$Marca=$_POST["Marca"];
	$Linkea=$_POST["Link"];

	$Activo=$_POST["Activo"];
	$Estrellas=$_POST["Estrellas"];
	$EstrellasT=$_POST["EstrellasT"];
	$Precio=$_POST["Precio"];
	$Bajada=$_POST["Bajada"];

	$Nombre_Ingles=$_POST["Nombre_Ingles"];
	$Marca_Ingles=$_POST["Marca_Ingles"];
	$Precio_Ingles=$_POST["Precio_Ingles"];

	$Nombre_Portugues=$_POST["Nombre_Portugues"];
	$Marca_Portugues=$_POST["Marca_Portugues"];
	$Precio_Portugues=$_POST["Precio_Portugues"];
	$orden=$_POST["orden"];


if($_POST['enablefoto']){$status = "";
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
	$actFoto="Foto='$Foto', ";
}
	/*$link = mysql_connect(db_dir(), db_usr(), db_pass(), true);
	mysql_select_db(db_base(), $link); */
	//mysql_select_db(db_base_gestion(), $dbh2);

	$laSQL = "UPDATE categorias SET Categoria = '$Categoria', $actFoto Nombre='$Nombre', Marca='$Marca', Activo='$Activo', Bajada='$Bajada', Precio='$Precio', EstrellasT='$EstrellasT', Estrellas='$Estrellas', Link='$Linkea', Nombre_Ingles='$Nombre_Ingles', Marca_Ingles='$Marca_Ingles', Precio_Ingles='$Precio_Ingles', Nombre_Portugues='$Nombre_Portugues', Marca_Portugues='$Marca_Portugues', Precio_Portugues='$Precio_Portugues', orden='$orden' where Id='$id'";
	//echo $laSQL;
	$result = mysqli_query($link,$laSQL);
	//echo mysql_errno($link) . ": " . mysql_error($link) . "\n";
	echo "
	<div class='valid_box'>
        CATEGORIA EDITADA CORRECTAMENTE
     </div>";
}


?>

  <?php


  			$laSQL = "SELECT * FROM categorias where Id='$id'";
			$result = mysqli_query($link,$laSQL);
			while ($rowL = mysqli_fetch_array($result)) {
				$Id=($rowL['Id']);
				$Categoria=($rowL['Categoria']);
				$Nombre=($rowL['Nombre']);
				$Marca=($rowL['Marca']);
				$Foto=($rowL['Foto']);
				$Link=($rowL['Link']);
				$Activo=($rowL['Activo']);
				$Bajada=($rowL['Bajada']);
				$Estrellas=($rowL['Estrellas']);
				$EstrellasT=($rowL['EstrellasT']);
				$Precio=($rowL['Precio']);
				$Nombre_Ingles=($rowL['Nombre_Ingles']);
				$Marca_Ingles=($rowL['Marca_Ingles']);
				$Precio_Ingles=($rowL['Precio_Ingles']);
				$Nombre_Portugues=($rowL['Nombre_Portugues']);
				$Marca_Portugues=($rowL['Marca_Portugues']);
				$Precio_Portugues=($rowL['Precio_Portugues']);
				$orden=($rowL['orden']);

			}
			?>


            <h1>Editar Categoria</h1>
               <form action="" method="post" class="form" enctype="multipart/form-data" >
         <table width="100%" border="0" cellspacing="5" cellpadding="0">
              <tr>
     <td width="9%"><h5>Categoria:</h5></td>
     <td width="91%">

     <select name="Categoria" id="Categoria">
     	<option value="">Seleccionar...</option>
		<?php
			$dbh2 = mysqli_connect(db_dir_gestion(), db_usr_gestion(), db_pass_gestion(), db_base_gestion());

			$laSQL1 = "SELECT * FROM categorias where activa= '1' ORDER BY orden";
			//echo $laSQL1;
			$result1 = mysqli_query($dbh2,$laSQL1);
			while ($rowL = mysqli_fetch_array($result1)) {
				$selected=(strcasecmp($rowL['categoria'], $Categoria) == 0) ?' selected':'';

				echo '<option value="'.$rowL['categoria'].'" '.$selected.'>'.$rowL['categoria'].'</option>';
			}
		?>



			</select>

     </td>
   </tr>
        <tr>
     <td width="9%"><h5>Bajada:</h5></td>
     <td width="91%"><input type="text" name="Bajada"  style="width:500px" value="<?php echo $Bajada?>" /></td>
   </tr>
           <tr>
     <td width="9%"><h5>Nombre:</h5></td>
     <td width="91%"><input type="text" name="Nombre"  style="width:500px" value="<?php echo $Nombre?>" /></td>
   </tr>
         <tr>
     <td width="9%"><h5>Marca:</h5></td>
     <td width="91%"><input type="text" name="Marca"  style="width:500px" value="<?php echo $Marca?>" /></td>
     </td>
   </tr>
         <tr>
     <td width="9%"><h5>Precio:</h5></td>
     <td width="91%"><input type="text" name="Precio"  style="width:500px" value="<?php echo $Precio?>" /></td>
     </td>
   </tr>
   <tr>
     <td width="9%"><h5>Nombre Ingles:</h5></td>
     <td width="91%"><input type="text" name="Nombre_Ingles"  style="width:500px" value="<?php echo $Nombre_Ingles?>" /></td>
   </tr>
         <tr>
     <td width="9%"><h5>Marca Ingles:</h5></td>
     <td width="91%"><input type="text" name="Marca_Ingles"  style="width:500px" value="<?php echo $Marca_Ingles?>" /></td>
     </td>
   </tr>
         <tr>
     <td width="9%"><h5>Precio Ingles:</h5></td>
     <td width="91%"><input type="text" name="Precio_Ingles"  style="width:500px" value="<?php echo $Precio_Ingles?>" /></td>
     </td>
   </tr>
   <tr>
     <td width="9%"><h5>Nombre Portugues:</h5></td>
     <td width="91%"><input type="text" name="Nombre_Portugues"  style="width:500px" value="<?php echo $Nombre_Portugues?>" /></td>
   </tr>
         <tr>
     <td width="9%"><h5>Marca Portugues:</h5></td>
     <td width="91%"><input type="text" name="Marca_Portugues"  style="width:500px" value="<?php echo $Marca_Portugues?>" /></td>
     </td>
   </tr>
         <tr>
     <td width="9%"><h5>Precio Portugues:</h5></td>
     <td width="91%"><input type="text" name="Precio_Portugues"  style="width:500px" value="<?php echo $Precio_Portugues?>" /></td>
     </td>
   </tr>
   <tr>
     <td width="9%"><h5>Orden:</h5></td>
     <td width="91%"><input type="text" name="orden"  style="width:500px" value="<?php echo $orden?>" /></td>
     </td>
   </tr>
                       <tr>
     <td width="9%"><h5>Tipo de Estrellas:</h5></td>
     <td width="91%"><?php
     if($EstrellasT=="local"){$sel1="selected";}elseif($EstrellasT=="global"){$sel2="selected";}else{$sel3="selected";}

	 ?><select name="EstrellasT" id="EstrellasT">
       <option value="local"  <?php echo $sel1?>>local</option>
       <option value="global" <?php echo $sel2?>>global</option>
      <option value="sin" <?php echo $sel3?>>sin</option>

     </select></td>
   </tr>


            <tr>
     <td width="9%"><h5>Estrellas:1/2/3/4/5</h5></td>
     <td width="91%"><input type="text" name="Estrellas"  style="width:500px" value="<?php echo $Estrellas?>" /></td>
     </td>
   </tr>
                 <tr>
     <td width="9%"><h5>Link (slug):</h5></td>
     <td width="91%"><input name="Link" type="text" id="Link"  style="width:400px" value="<?php echo $Link?>"/></td>
   </tr>

                  <tr>
     <td width="9%"><h5>Foto:</h5></td>
     <td width="91%"><input name="enablefoto" type="checkbox" id="enablefoto"> - <input id="Foto" name="archivo" type="file" disabled="disabled" size="35"  /></td>
   </tr>

                    <tr>
     <td width="9%"><h5>Activo:</h5></td>
     <td width="91%"><?php
     if($Activo==1){$sel1="selected";}else{$sel2="selected";}

	 ?><select name="Activo" id="Activo">
       <option value="1"  <?php echo $sel1?>>Si</option>
       <option value="0" <?php echo $sel2?>>No</option>
     </select></td>
   </tr>

   <tr>
     <td>&nbsp;</td><input name="crear" type="hidden" id="crear" value="si" />
     <td><input type="submit" name="submit" id="submit" value="Enviar"  style="width:500px"/></td>
   </tr>
         </table>


</form>




	<script>

	$(document).ready(function($) {
      $("#enable").click(function(){
               if ($('#enable').is(':checked')) {
			   var remove = '';
			    $('#Link').attr ('value', remove);
                            $('#Link').attr("disabled", true);

                 }
               else if ($('#enable').not(':checked')) {


                            $('#Link').attr("disabled", false);
                             }
 }); });


		$(document).ready(function($) {
      $("#enablefoto").click(function(){
               if ($('#enablefoto').is(':checked')) {
                          $('#Foto').attr("disabled", false);
                 }
               else if ($('#enablefoto').not(':checked')) {
                      			   var remove = '';
			    $('#Foto').attr ('value', remove);
                 $('#Foto').attr("disabled", true);



                             }
 }); });
	</script>
