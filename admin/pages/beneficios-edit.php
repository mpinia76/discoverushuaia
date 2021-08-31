<?php
    $id=$_GET['id'];

  if ($_POST["crear"]!="")
{

	$Nombre=$_POST["Nombre"];
	$Texto=$_POST["Texto"];
	$Linkea=$_POST["Link"];

	$Activo=$_POST["Activo"];

	$Nombre_Ingles=$_POST["Nombre_Ingles"];
	$Texto_Ingles=$_POST["Texto_Ingles"];
	$Nombre_Portugues=$_POST["Nombre_Portugues"];
	$Texto_Portugues=$_POST["Texto_Portugues"];

	$Activo_Ingles=$_POST["Activo_Ingles"];
	$Activo_Portugues=$_POST["Activo_Portugues"];
	$orden=$_POST["orden"];

if($_POST['enablefoto']){$status = "";
    // obtenemos los datos del archivo
    $tamano = $_FILES["archivo"]['size'];
    $tipo = $_FILES["archivo"]['type'];
    $archivo = $_FILES["archivo"]['name'];
    $prefijo = substr(md5(uniqid(rand())),0,6);

    if ($archivo != "") {
        // guardamos el archivo a la carpeta files
        $destino =  "../fotos/beneficios/".$prefijo."_".$archivo;
        if (copy($_FILES['archivo']['tmp_name'],$destino)) {
            $status = "Archivo subido: <b>".$archivo."</b>";
        } else {
            $status = "Error al subir el archivo";
        }
    } else {
        $status = "Error al subir archivo";
    }
	$Foto=$prefijo."_".$archivo;
	$actFoto="Logo='$Foto', ";
}


	$laSQL = "UPDATE beneficios SET Nombre = '$Nombre', $actFoto Texto='$Texto', Activo='$Activo', Link='$Linkea', Nombre_Ingles = '$Nombre_Ingles', Texto_Ingles='$Texto_Ingles', Nombre_Portugues = '$Nombre_Portugues', Texto_Portugues='$Texto_Portugues', Activo_Ingles='$Activo_Ingles', Activo_Portugues='$Activo_Portugues', orden='$orden' where Id='$id'";

	$result = mysqli_query($link,$laSQL)  ;
	//echo mysql_errno($link) . ": " . mysql_error($link) . "\n";
	echo "
	<div class='valid_box'>
        BENEFICIO EDITADO CORRECTAMENTE
     </div>";
}


?>

  <?php


  			$laSQL = "SELECT * FROM beneficios where Id='$id'";
			$result = mysqli_query($link,$laSQL)  ;
			while ($rowL = mysqli_fetch_array($result)) {
				$Id=$rowL['Id'];
				$Logo=$rowL['Logo'];
				$Nombre=$rowL['Nombre'];
				$Texto=$rowL['Texto'];
				$Foto=$rowL['Logo'];
				$Link=$rowL['Link'];
				$Activo=$rowL['Activo'];
				$Nombre_Ingles=$rowL['Nombre_Ingles'];
				$Texto_Ingles=$rowL['Texto_Ingles'];
				$Nombre_Portugues=$rowL['Nombre_Portugues'];
				$Texto_Portugues=$rowL['Texto_Portugues'];
				$Activo_Ingles=$rowL['Activo_Ingles'];
				$Activo_Portugues=$rowL['Activo_Portugues'];
				$orden=($rowL['orden']);

			}
			?>


            <h1>Editar Beneficio</h1>
               <form action="" method="post" class="form" enctype="multipart/form-data" >
         <table width="100%" border="0" cellspacing="5" cellpadding="0">
              <tr>
     <td width="9%"><h5>Nombre:</h5></td>
     <td width="91%"><input type="text" name="Nombre"  style="width:500px" value="<?php echo $Nombre?>" /></td>
   </tr>
                 <tr>
     <td width="9%"><h5>Texto:</h5></td>
     <td width="91%"><textarea name="Texto" class="jqte-test"><?php echo $Texto?></textarea></td>
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
     <td width="9%"><h5>Nombre Ingles:</h5></td>
     <td width="91%"><input type="text" name="Nombre_Ingles"  style="width:500px" value="<?php echo $Nombre_Ingles?>" /></td>
   </tr>
                 <tr>
     <td width="9%"><h5>Texto Ingles:</h5></td>
     <td width="91%"><textarea name="Texto_Ingles" class="jqte-test"><?php echo $Texto_Ingles?></textarea></td>
   </tr>
	<tr>
     <td width="9%"><h5>Activo Ingles:</h5></td>
     <td width="91%"><?php
     if($Activo_Ingles==1){$sel1="selected";}else{$sel2="selected";}

	 ?><select name="Activo_Ingles" id="Activo_Ingles">
       <option value="1"  <?php echo $sel1?>>Si</option>
       <option value="0" <?php echo $sel2?>>No</option>
     </select></td>
   </tr>

                 <tr>
     <td width="9%"><h5>Nombre Portugues:</h5></td>
     <td width="91%"><input type="text" name="Nombre_Portugues"  style="width:500px" value="<?php echo $Nombre_Portugues?>" /></td>
   </tr>
                 <tr>
     <td width="9%"><h5>Texto Portugues:</h5></td>
     <td width="91%"><textarea name="Texto_Portugues" class="jqte-test"><?php echo $Texto_Portugues?></textarea></td>
   </tr>
	<tr>
     <td width="9%"><h5>Activo Portugues:</h5></td>
     <td width="91%"><?php
     if($Activo_Portugues==1){$sel1="selected";}else{$sel2="selected";}

	 ?><select name="Activo_Portugues" id="Activo_Portugues">
       <option value="1"  <?php echo $sel1?>>Si</option>
       <option value="0" <?php echo $sel2?>>No</option>
     </select></td>
   </tr>
                 <tr>
     <td width="9%"><h5>Link (url):</h5></td>
     <td width="91%"><input name="Link" type="text" id="Link"  style="width:400px" value="<?php echo $Link?>"/></td>
   </tr>

                  <tr>
     <td width="9%"><h5>Foto:</h5></td>
     <td width="91%"><input name="enablefoto" type="checkbox" id="enablefoto"> - <input id="Foto" name="archivo" type="file" disabled="disabled" size="35"  /></td>
   </tr>

   <tr>
     <td width="9%"><h5>Orden:</h5></td>
     <td width="91%"><input type="text" name="orden"  style="width:30px" value="<?php echo $orden?>" /></td>
     </td>
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
