  <?php

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

$status = "";
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


	$laSQL = "INSERT INTO beneficios (Id,  Nombre, Texto, Logo, Activo,  Link,  Nombre_Ingles, Texto_Ingles,  Nombre_Portugues, Texto_Portugues,  Activo_Ingles,  Activo_Portugues, orden)
	VALUES (NULL, '$Nombre', '$Texto', '$Foto', '$Activo','$Linkea',  '$Nombre_Ingles', '$Texto_Ingles',  '$Nombre_Portugues', '$Texto_Portugues',  '$Activo_Ingles',  '$Activo_Portugues', '$orden')";
	$result = mysqli_query($link,$laSQL)  ;
	echo "
	<div class='valid_box'>
        BENEFICIO AGREGADO CORRECTAMENTE
     </div>";

return;

}
?>  <h1>BENEFICIO NUEVO</h1>

           <form action="" method="post" class="form" enctype="multipart/form-data" >
         <table width="100%" border="0" cellspacing="5" cellpadding="0">

        <tr>
     <td width="9%"><h5>Nombre:</h5></td>
     <td width="91%"><input type="text" name="Nombre"  style="width:500px" /></td>
   </tr>
         <tr>
     <td width="9%"><h5>Link:</h5></td>
     <td width="91%"><input type="text" name="Link"  style="width:500px" /></td>
     </td>
   </tr>

                 <tr>
     <td width="9%"><h5>Texto:</h5></td>
     <td width="91%"><textarea name="Texto" class="jqte-test"></textarea></td>
   </tr>
     <tr>
     <td width="9%"><h5>Activo:</h5></td>
     <td width="91%"><select name="Activo" id="Activo">
       <option value="1">Si</option>
       <option value="0">No</option>
     </select></td>
   </tr>
<tr>
     <td width="9%"><h5>Nombre Ingles:</h5></td>
     <td width="91%"><input type="text" name="Nombre_Ingles"  style="width:500px" /></td>
   </tr>
                 <tr>
     <td width="9%"><h5>Texto Ingles:</h5></td>
     <td width="91%"><textarea name="Texto_Ingles" class="jqte-test"></textarea></td>
   </tr>
	  <tr>
     <td width="9%"><h5>Activo Ingles:</h5></td>
     <td width="91%"><select name="Activo_Ingles" id="Activo_Ingles">
       <option value="1">Si</option>
       <option value="0">No</option>
     </select></td>
   </tr>

                 <tr>
     <td width="9%"><h5>Nombre Portugues:</h5></td>
     <td width="91%"><input type="text" name="Nombre_Portugues"  style="width:500px"/></td>
   </tr>
                 <tr>
     <td width="9%"><h5>Texto Portugues:</h5></td>
     <td width="91%"><textarea name="Texto_Portugues" class="jqte-test"></textarea></td>
   </tr>
   <tr>
     <td width="9%"><h5>Activo Portugues:</h5></td>
     <td width="91%"><select name="Activo_Portugues" id="Activo_Portugues">
       <option value="1">Si</option>
       <option value="0">No</option>
     </select></td>
   </tr>
     <tr>
     <td width="9%"><h5>Foto:</h5></td>
     <td width="91%"><input name="archivo" type="file" size="35" /></td>
   </tr>
   <tr>
     <td width="9%"><h5>Orden:</h5></td>
     <td width="91%"><input type="text" name="orden"  style="width:30px"/></td>
     </td>
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


