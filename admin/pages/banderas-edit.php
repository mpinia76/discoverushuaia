<?php
    $id=$_GET['id'];
  
  if ($_POST["crear"]!="")
{

	$Titulo=$_POST["Titulo"];
	
	$es=$_POST["es"];
	$en=$_POST["en"];
	$po=$_POST["po"];

	
	
	$laSQL = "UPDATE banderas SET Titulo = '$Titulo', es='$es', en='$en', po='$po' where Id='$id'";

	$result = mysqli_query($link,$laSQL);
	echo "
	<div class='valid_box'>
        IDIOMAS EDITADOS CORRECTAMENTE
     </div>";
}


?>  

  <?php


  			$laSQL = "SELECT * FROM banderas where Id='$id'";
			$result = mysqli_query($link,$laSQL);			 
			while ($rowL = mysqli_fetch_array($result)) {
				$Titulo=$rowL["Titulo"];
				
				$es=$rowL["es"];
				$en=$rowL["en"];
				$po=$rowL["po"];

	

			
			}
			?>
            
            
            <h1>Editar Idiomas</h1> 
               <form action="" method="post" class="form" enctype="multipart/form-data" >
         <table width="100%" border="0" cellspacing="5" cellpadding="0">
              <tr>
     <td width="9%"><h5>Titulo:</h5></td>
     <td width="91%"><input type="text" name="Titulo"  style="width:500px" value="<?php echo $Titulo?>" /></td>
   </tr>
                 
                    <tr>
     <td width="9%"><h5>Español activa:</h5></td>
     <td width="91%"><?php
     if($es==1){$selEs1="selected";}else{$selEs2="selected";}
	 
	 ?><select name="es" id="es">
       <option value="1"  <?php echo $selEs1?>>Si</option>
       <option value="0" <?php echo $selEs2?>>No</option>
     </select></td>
   </tr>
   <tr>
     <td width="9%"><h5>Inglés activa:</h5></td>
     <td width="91%"><?php
     if($en==1){$selEn1="selected";}else{$selEn2="selected";}
	 
	 ?><select name="en" id="en">
       <option value="1"  <?php echo $selEn1?>>Si</option>
       <option value="0" <?php echo $selEn2?>>No</option>
     </select></td>
   </tr>
   <tr>
     <td width="9%"><h5>Portugués activa:</h5></td>
     <td width="91%"><?php
     if($po==1){$selPo1="selected";}else{$selPo2="selected";}
	 
	 ?><select name="po" id="po">
       <option value="1"  <?php echo $selPo1?>>Si</option>
       <option value="0" <?php echo $selPo2?>>No</option>
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