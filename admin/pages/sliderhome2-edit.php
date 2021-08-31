<?php
    $id=$_GET['id'];
  
  if ($_POST["crear"]!="")
{


	$Linkea=$_POST["Link"];

	$Activo=$_POST["Activo"];
	
	$Idioma=$_POST["Idioma"];


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


	$laSQL = "UPDATE sliderhome SET Titulo = '$Titulo', $actFoto Bajada='$Bajada', Activo='$Activo', Link='$Linkea', Idioma='$Idioma' where Id='$id'";

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
				$Idioma=$rowL['Idioma'];
			
			}
			?>
            
            
            <h1>Editar Slider</h1> 
               <form action="" method="post" class="form" enctype="multipart/form-data" >
         <table width="100%" border="0" cellspacing="5" cellpadding="0">

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
     <td width="9%"><h5>Idioma:</h5></td>
     <td width="91%"><?php
     switch ($Idioma) {
     	case 'Es':
     	 $sel1="selected";
     	break;
     	case 'Po':
     	 $sel2="selected";
     	break;
     	case 'En':
     	 $sel3="selected";
     	break;
     }
     
	 
	 ?><select name="Idioma" id="Idioma">
       <option value="Es"  <?php echo $sel1?>>Español</option>
       <option value="En"  <?php echo $sel3?>>Ingles</option>
       <option value="Po" <?php echo $sel2?>>Portugues</option>
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