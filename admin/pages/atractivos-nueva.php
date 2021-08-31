  <?php

  if ($_POST["crear"]!="")
{

	$Lugar=$_POST["Lugar"];
	$Texto=$_POST["Texto"];

	$Lugar_Ingles=$_POST["Lugar_Ingles"];
	$Texto_Ingles=$_POST["Texto_Ingles"];

	$Lugar_Portugues=$_POST["Lugar_Portugues"];
	$Texto_Portugues=$_POST["Texto_Portugues"];

	$Activo=$_POST["Activo"];
	$orden=$_POST["orden"];


	$laSQL = "INSERT INTO atractivos (Id,  Lugar, Texto, Lugar_Ingles, Texto_Ingles, Lugar_Portugues, Texto_Portugues, Activo, orden)
	VALUES (NULL, '$Lugar', '$Texto','$Lugar_Ingles', '$Texto_Ingles','$Lugar_Portugues', '$Texto_Portugues', '$Activo', '$orden')";
	$result = mysqli_query($link,$laSQL)  ;
	echo "
	<div class='valid_box'>
        ATRACTIVO AGREGADO CORRECTAMENTE
     </div>";

return;

}
?>  <h1>ATRACTIVO NUEVO</h1>

           <form action="" method="post" class="form" enctype="multipart/form-data" >
         <table width="100%" border="0" cellspacing="5" cellpadding="0">
              <tr>
     <td width="9%"><h5>Lugar:</h5></td>
     <td width="91%"><input type="text" name="Lugar"  style="width:500px" /></td>
   </tr>
        <tr>
     <td width="9%"><h5>Texto:</h5></td>
     <td width="91%"><textarea name="Texto" class="jqte-test"></textarea></td>
   </tr>
	<tr>
     <td width="9%"><h5>Lugar Ingles:</h5></td>
     <td width="91%"><input type="text" name="Lugar_Ingles"  style="width:500px"/></td>
   </tr>
         <tr>
     <td width="9%"><h5>Texto Ingles:</h5></td>
     <td width="91%"><textarea name="Texto_Ingles" class="jqte-test"></textarea></td>
     </td>
   </tr>

    <tr>
     <td width="9%"><h5>Lugar Portugues:</h5></td>
     <td width="91%"><input type="text" name="Lugar_Portugues"  style="width:500px" /></td>
   </tr>
         <tr>
     <td width="9%"><h5>Texto Portugues:</h5></td>
     <td width="91%"><textarea name="Texto_Portugues" class="jqte-test"></textarea></td>
     </td>
   </tr>
   <tr>
     <td width="9%"><h5>Orden:</h5></td>
     <td width="91%"><input type="text" name="orden"  style="width:30px"/></td>
     </td>
   </tr>
                    <tr>

     <td width="9%"><h5>Activo:</h5></td>
     <td width="91%"><select name="Activo" id="Activo">
       <option value="1">Si</option>
       <option value="0">No</option>
     </select></td>
   </tr>

   <tr>
     <td>&nbsp;</td><input name="crear" type="hidden" id="crear" value="si" />
     <td><input type="submit" name="submit" id="submit" value="Enviar"  style="width:500px"/></td>
   </tr>
         </table>


</form>


