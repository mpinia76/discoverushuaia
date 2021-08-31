  <?php
  
  if ($_POST["crear"]!="")
{

	$Pregunta=$_POST["Pregunta"];
	$Respuesta=$_POST["Respuesta"];
	$Pregunta_Ingles=$_POST["Pregunta_Ingles"];
	$Respuesta_Ingles=$_POST["Respuesta_Ingles"];
	
	$Pregunta_Portugues=$_POST["Pregunta_Portugues"];
	$Respuesta_Portugues=$_POST["Respuesta_Portugues"];
$status = "";
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

	$laSQL = "INSERT INTO faq (Id,Logo,Pregunta, Respuesta, Pregunta_Ingles, Respuesta_Ingles, Pregunta_Portugues, Respuesta_Portugues) 
	VALUES (NULL, '$Foto', '$Pregunta', '$Respuesta', '$Pregunta_Ingles', '$Respuesta_Ingles', '$Pregunta_Portugues', '$Respuesta_Portugues')";
	$result = mysqli_query($link,$laSQL);
	echo "
	<div class='valid_box'>
        FAQ AGREGADO CORRECTAMENTE
     </div>";

return;

}
?>  <h1>FAQ NUEVO</h1> 
    
           <form action="" method="post" class="form" enctype="multipart/form-data" >
         <table width="100%" border="0" cellspacing="5" cellpadding="0">

        <tr>
     <td width="9%"><h5>Pregunta:</h5></td>
     <td width="91%"><input type="text" name="Pregunta"  style="width:500px" /></td>
   </tr>


                 <tr>
     <td width="9%"><h5>Respuesta:</h5></td>
     <td width="91%"><textarea name="Respuesta" class="jqte-test"></textarea></td>
   </tr>
	<tr>
     <td width="9%"><h5>Pregunta Ingles:</h5></td>
     <td width="91%"><input type="text" name="Pregunta_Ingles"  style="width:500px"  /></td>
   </tr>
                 <tr>
     <td width="9%"><h5>Texto Ingles:</h5></td>
     <td width="91%"><textarea name="Respuesta_Ingles" class="jqte-test"></textarea></td>
   </tr>
    <tr>
     <td width="9%"><h5>Pregunta Portugues:</h5></td>
     <td width="91%"><input type="text" name="Pregunta_Portugues"  style="width:500px"/></td>
   </tr>
                 <tr>
     <td width="9%"><h5>Texto Portugues:</h5></td>
     <td width="91%"><textarea name="Respuesta_Portugues" class="jqte-test"></textarea></td>
   </tr>
     
        <tr>
     <td width="9%"><h5>Foto:</h5></td>
     <td width="91%"><input name="archivo" type="file" size="35" /></td>
   </tr>
                    
      <tr>
     <td></td>
     <td> 
     
     
     

     
     <input name="crear" type="hidden" id="crear" value="si" /></td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td><input type="submit" name="submit" id="submit" value="Enviar"  style="width:500px"/></td>
   </tr>
         </table>

      
</form>

	
