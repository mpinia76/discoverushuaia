<?php
    $id=$_GET['id'];
  
  if ($_POST["crear"]!="")
{

	
	
	$activo=$_POST["activo"];
	

	
	
	$laSQL = "UPDATE whatsapp SET activo='$activo' where Id='$id'";

	$result = mysqli_query($link,$laSQL);
	echo "
	<div class='valid_box'>
        WHATSAPP EDITADO CORRECTAMENTE
     </div>";
}


?>  

  <?php


  			$laSQL = "SELECT * FROM whatsapp where Id='$id'";
			$result = mysqli_query($link,$laSQL);			 
			while ($rowL = mysqli_fetch_array($result)) {
				
				
				$activo=$rowL["activo"];
			

	

			
			}
			?>
            
            
            <h1>Editar Whatsapp</h1> 
               <form action="" method="post" class="form" enctype="multipart/form-data" >
         <table width="100%" border="0" cellspacing="5" cellpadding="0">
             
                 
                    <tr>
     <td width="9%"><h5>Activo:</h5></td>
     <td width="91%"><?php
     if($activo==1){$selEs1="selected";}else{$selEs2="selected";}
	 
	 ?><select name="activo" id="activo">
       <option value="1"  <?php echo $selEs1?>>Si</option>
       <option value="0" <?php echo $selEs2?>>No</option>
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