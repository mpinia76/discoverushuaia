  <?php
  
  if ($_POST["crear"]!="")
{

	$Titulo=$_POST["Titulo"];
	$Bajada=$_POST["Bajada"];
	$Tipo=1;
	$Linkea=$_POST["Linkea"];

	$Ubicacion=$_POST["Ubicacion"];

	$Activo=$_POST["Activo"];

	$Idioma=$_POST["Idioma"];
			
$status = "";
    // obtenemos los datos del archivo
    $tamano = $_FILES["archivo"]['size'];
    $tipo = $_FILES["archivo"]['type'];
    $archivo = $_FILES["archivo"]['name'];
    $prefijo = substr(md5(uniqid(rand())),0,6);
   
    if ($archivo != "") {
        // guardamos el archivo a la carpeta files
        $destino =  "../fotos/slider/".$prefijo."_".$archivo;
        if (copy($_FILES['archivo']['tmp_name'],$destino)) {
            $status = "Archivo subido: <b>".$archivo."</b>";
        } else {
            $status = "Error al subir el archivo";
        }
    } else {
        $status = "Error al subir archivo";
    }

$Foto=substr($destino,3);


	$laSQL = "INSERT INTO sliderhome (Id,  Activo, Ubicacion, Titulo, Bajada, Foto, Tipo, Link, Orden, Idioma) 
	VALUES (NULL, '$Activo', '$Ubicacion', '$Titulo', '$Bajada', '$Foto', '$Tipo','$Linkea', '1', '$Idioma')";
	$result = mysqli_query($link,$laSQL);
	echo "
	<div class='valid_box'>
        SLIDER AGREGADO CORRECTAMENTE
     </div>";

return;

}
?>  <h1>SLIDER NUEVO</h1> 
    
           <form action="" method="post" class="form" enctype="multipart/form-data" >
         <table width="100%" border="0" cellspacing="5" cellpadding="0">



                 <tr>
     <td width="9%"><h5>Link</h5></td>
     <td width="91%"><input type="text" name="Linkea"  style="width:500px" /></td>
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
     <td width="9%"><h5>Idioma:</h5></td>
     <td width="91%"><select name="Idioma" id="Idioma">
       <option value="Es">Español</option>
       <option value="En">Ingles</option>
       <option value="Po">Portugues</option>
     </select></td>
   </tr>
      <tr>
     <td></td>
     <td> 
     
     
     
<input name="Ubicacion" type="hidden" id="crear" value="homeofer" />
     
     <input name="crear" type="hidden" id="crear" value="si" /></td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td><input type="submit" name="submit" id="submit" value="Enviar"  style="width:500px"/></td>
   </tr>
         </table>

      
</form>

	
