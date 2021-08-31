<?php
    $id=$_GET['id'];

  if ($_POST["crear"]!="")
{

	$Pregunta=$_POST["Pregunta"];
	$Respuesta=$_POST["Respuesta"];

	$Pregunta_Ingles=$_POST["Pregunta_Ingles"];
	$Respuesta_Ingles=$_POST["Respuesta_Ingles"];

	$Pregunta_Portugues=$_POST["Pregunta_Portugues"];
	$Respuesta_Portugues=$_POST["Respuesta_Portugues"];

if($_POST['enablefoto']){$status = "";
    // obtenemos los datos del archivo
    $tamano = $_FILES["archivo"]['size'];
    $tipo = $_FILES["archivo"]['type'];
    $archivo = $_FILES["archivo"]['name'];
    $prefijo = substr(md5(uniqid(rand())),0,6);

    if ($archivo != "") {
        // guardamos el archivo a la carpeta files
        $destino =  "../fotos/faq/".$prefijo."_".$archivo;
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



	$laSQL = "UPDATE faq SET Pregunta = '$Pregunta', $actFoto Respuesta='$Respuesta', Pregunta_Ingles = '$Pregunta_Ingles',  Respuesta_Ingles='$Respuesta_Ingles', Pregunta_Portugues = '$Pregunta_Portugues',  Respuesta_Portugues='$Respuesta_Portugues' where Id='$id'";

	$result = mysqli_query($link,$laSQL);
	echo mysqli_errno($link) . ": " . mysqli_error($link) . "\n";
	echo "
	<div class='valid_box'>
        FAQ EDITADO CORRECTAMENTE
     </div>";
}


?>

  <?php


  			$laSQL = "SELECT * FROM faq where Id='$id'";
			$result = mysqli_query($link,$laSQL);
			while ($rowL = mysqli_fetch_array($result)) {
				$Id=$rowL['Id'];
				$Pregunta=$rowL['Pregunta'];
				$Respuesta=$rowL['Respuesta'];
				$Pregunta_Ingles=$rowL['Pregunta_Ingles'];
				$Respuesta_Ingles=$rowL['Respuesta_Ingles'];
				$Pregunta_Portugues=$rowL['Pregunta_Portugues'];
				$Respuesta_Portugues=$rowL['Respuesta_Portugues'];
								$Foto=$rowL['Logo'];



			}
			?>


            <h1>Editar FAQ</h1>
               <form action="" method="post" class="form" enctype="multipart/form-data" >
         <table width="100%" border="0" cellspacing="5" cellpadding="0">
              <tr>
     <td width="9%"><h5>Pregunta:</h5></td>
     <td width="91%"><input type="text" name="Pregunta"  style="width:500px" value="<?php echo $Pregunta?>" /></td>
   </tr>
                 <tr>
     <td width="9%"><h5>Texto:</h5></td>
     <td width="91%"><textarea name="Respuesta" class="jqte-test"><?php echo $Respuesta?></textarea></td>
   </tr>
   <tr>
     <td width="9%"><h5>Pregunta Ingles:</h5></td>
     <td width="91%"><input type="text" name="Pregunta_Ingles"  style="width:500px" value="<?php echo $Pregunta_Ingles?>" /></td>
   </tr>
                 <tr>
     <td width="9%"><h5>Texto Ingles:</h5></td>
     <td width="91%"><textarea name="Respuesta_Ingles" class="jqte-test"><?php echo $Respuesta_Ingles?></textarea></td>
   </tr>
    <tr>
     <td width="9%"><h5>Pregunta Portugues:</h5></td>
     <td width="91%"><input type="text" name="Pregunta_Portugues"  style="width:500px" value="<?php echo $Pregunta_Portugues?>" /></td>
   </tr>
                 <tr>
     <td width="9%"><h5>Texto Portugues:</h5></td>
     <td width="91%"><textarea name="Respuesta_Portugues" class="jqte-test"><?php echo $Respuesta_Portugues?></textarea></td>
   </tr>

                        <tr>
     <td width="9%"><h5>Foto:</h5></td>
     <td width="91%"><input name="enablefoto" type="checkbox" id="enablefoto"> - <input id="Foto" name="archivo" type="file" disabled="disabled" size="35"  /></td>
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
