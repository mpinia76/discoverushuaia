<?php
    $id=$_GET['id'];
  
  if ($_POST["crear"]!="")
{

	$tarjeta=$_POST["tarjeta"];
	$cuota=$_POST["cuota"];

	$indice=$_POST["indice"];



	$laSQL = "UPDATE cuotas SET tarjeta = '$tarjeta', cuota='$cuota', indice='$indice' where id='$id'";

	$result = mysqli_query($link,$laSQL);
	echo "
	<div class='valid_box'>
        TARJETA EDITADA CORRECTAMENTE
     </div>";
}


?>  

  <?php


  			$laSQL = "SELECT * FROM cuotas where id='$id'";
			$result = mysqli_query($link,$laSQL);			 
			while ($rowL = mysqli_fetch_array($result)) {
				$id=utf8_encode($rowL['id']);
				$tarjeta=utf8_encode($rowL['tarjeta']);
				$cuota=$rowL['cuota'];
				$indice=utf8_encode($rowL['indice']);

			
			}
			?>
            
            
            <h1>Editar Tarjeta</h1> 
               <form action="" method="post" class="form" enctype="multipart/form-data" >
         <table width="100%" border="0" cellspacing="5" cellpadding="0">

        <tr>
     <td width="9%"><h5>Tarjeta:</h5></td>
     <td width="91%"><input type="text" name="tarjeta"  style="width:200px" value="<?php echo $tarjeta?>" /></td>
   </tr>
         <tr>
     <td width="9%"><h5>Cuota:</h5></td>
     <td width="91%"><input type="text" name="cuota"  style="width:35px" value="<?php echo $cuota?>" /></td>
     </td>
   </tr>
                
                    <tr>
     <td width="9%"><h5>Indice:</h5></td>
     <td width="91%"><input type="text" name="indice"  style="width:35px" value="<?php echo $indice?>" /></td>
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