<?php
    $id=$_GET['id'];
  
  if ($_POST["crear"]!="")
{

	$Titulo=$_POST["Titulo"];
	$Bajada=$_POST["Bajada"];
	$Linkea=$_POST["Link"];

	$Activo=$_POST["Activo"];

	$Titulo_Ingles=$_POST["Titulo_Ingles"];
	$Bajada_Ingles=$_POST["Bajada_Ingles"];
	
	$Titulo_Portugues=$_POST["Titulo_Portugues"];
	$Bajada_Portugues=$_POST["Bajada_Portugues"];

if($_POST['enablefoto']){$status = "";
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
	$actFoto="Foto='$Foto', ";
}


	$laSQL = "UPDATE sliderhome SET Titulo = '$Titulo', $actFoto Bajada='$Bajada', Activo='$Activo', Link='$Linkea', Titulo_Ingles='$Titulo_Ingles', Bajada_Ingles='$Bajada_Ingles' , Titulo_Portugues='$Titulo_Portugues', Bajada_Portugues='$Bajada_Portugues' where Id='$id'";

	$result = mysqli_query($link,$laSQL);
	echo "
	<div class='valid_box'>
        SLIDER EDITADO CORRECTAMENTE
     </div>";
}


?>  

  <?php


  			$laSQL = "SELECT * FROM sliderhome where Id='$id'";
			$result = mysqli_query($link,$laSQL);			 
			while ($rowL = mysqli_fetch_array($result)) {
				$Id=$rowL['Id'];
				$Titulo=$rowL['Titulo'];
				$Bajada=$rowL['Bajada'];
				$Ubicacion=$rowL['Ubicacion'];
				$Foto=$rowL['Foto'];
				$Link=$rowL['Link'];
				$Activo=$rowL['Activo'];
				$Titulo_Ingles=$rowL['Titulo_Ingles'];
				$Bajada_Ingles=$rowL['Bajada_Ingles'];
				$Titulo_Portugues=$rowL['Titulo_Portugues'];
				$Bajada_Portugues=$rowL['Bajada_Portugues'];
				
			
			}
			?>
            
            
            <h1>Editar Slider</h1> 
               <form action="" method="post" class="form" enctype="multipart/form-data" >
         <table width="100%" border="0" cellspacing="5" cellpadding="0">
              <tr>
     <td width="9%"><h5>Titulo:</h5></td>
     <td width="91%"><input type="text" name="Titulo"  style="width:500px" value="<?php echo $Titulo?>" /></td>
   </tr>
                 <tr>
     <td width="9%"><h5>Bajada:</h5></td>
     <td width="91%"><input type="text" name="Bajada"  style="width:500px" value="<?php echo $Bajada?>" /></td>
   </tr>

   <tr>
     <td width="9%"><h5>Titulo Ingles:</h5></td>
     <td width="91%"><input type="text" name="Titulo_Ingles"  style="width:500px" value="<?php echo $Titulo_Ingles?>" /></td>
   </tr>
                 <tr>
     <td width="9%"><h5>Bajada Ingles:</h5></td>
     <td width="91%"><input type="text" name="Bajada_Ingles"  style="width:500px" value="<?php echo $Bajada_Ingles?>" /></td>
   </tr>
	 <tr>
     <td width="9%"><h5>Titulo Portugues:</h5></td>
     <td width="91%"><input type="text" name="Titulo_Portugues"  style="width:500px" value="<?php echo $Titulo_Portugues?>" /></td>
   </tr>
                 <tr>
     <td width="9%"><h5>Bajada Portugues:</h5></td>
     <td width="91%"><input type="text" name="Bajada_Portugues"  style="width:500px" value="<?php echo $Bajada_Portugues?>" /></td>
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