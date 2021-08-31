<?php
    $id=$_GET['id'];
  
  if ($_POST["crear"]!="")
{

	$Nombre=$_POST["Nombre"];

	$laSQL = "UPDATE Locales SET Nombre = '$Nombre' where Id='$id'";

	$result = mysqli_query($link,$laSQL);
	echo "
	<div class='valid_box'>
        LOCAL EDITADO CORRECTAMENTE
     </div>";
}


?>  

  <?php


  			$laSQL = "SELECT * FROM Locales where Id='$id'";
			$result = mysqli_query($link,$laSQL);			 
			while ($rowL = mysqli_fetch_array($result)) {
				$Nombre=$rowL['Nombre'];
			
			}
			?>
            
            
            <h1>Editar Atractivo</h1> 
               <form action="" method="post" class="form" enctype="multipart/form-data" >
         <table width="100%" border="0" cellspacing="5" cellpadding="0">

        <tr>
     <td width="9%"><h5>Nombre:</h5></td>
     <td width="91%"><input type="text" name="Nombre"  style="width:500px" value="<?php echo $Nombre?>" /></td>
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