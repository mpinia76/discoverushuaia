<?php
    $id=$_GET['id'];
  
  if ($_POST["crear"]!="")
{

	$Titulo=$_POST["Titulo"];
	$Bajada=$_POST["Bajada"];
	$Texto=$_POST["Texto"];
	$Link=$_POST["Link"];
	$Visible=$_POST["Visible"];

	$Titulo_Ingles=$_POST["Titulo_Ingles"];
	$Bajada_Ingles=$_POST["Bajada_Ingles"];
	$Texto_Ingles=$_POST["Texto_Ingles"];

	$Titulo_Portugues=$_POST["Titulo_Portugues"];
	$Bajada_Portugues=$_POST["Bajada_Portugues"];
	$Texto_Portugues=$_POST["Texto_Portugues"];
	
	$laSQL = "UPDATE home SET Titulo = '$Titulo', Bajada='$Bajada', Texto='$Texto', Link='$Link', Visible='$Visible', Titulo_Ingles = '$Titulo_Ingles', Bajada_Ingles='$Bajada_Ingles', Texto_Ingles='$Texto_Ingles', Titulo_Portugues = '$Titulo_Portugues', Bajada_Portugues='$Bajada_Portugues', Texto_Portugues='$Texto_Portugues' where Id='$id'";

	$result = mysqli_query($link,$laSQL);
	echo "
	<div class='valid_box'>
        BLOQUE EDITADO CORRECTAMENTE
     </div>";
}


?>  

  <?php


  			$laSQL = "SELECT * FROM home where Id='$id'";
			$result = mysqli_query($link,$laSQL);			 
			while ($rowL = mysqli_fetch_array($result)) {
	$Titulo=$rowL["Titulo"];
	$Bajada=$rowL["Bajada"];
	$Texto=$rowL["Texto"];
	$Link=$rowL["Link"];
	$Visible=$rowL["Visible"];

	$Titulo_Ingles=$rowL["Titulo_Ingles"];
	$Bajada_Ingles=$rowL["Bajada_Ingles"];
	$Texto_Ingles=$rowL["Texto_Ingles"];	
	
	$Titulo_Portugues=$rowL["Titulo_Portugues"];
	$Bajada_Portugues=$rowL["Bajada_Portugues"];
	$Texto_Portugues=$rowL["Texto_Portugues"];	

			
			}
			?>
            
            
            <h1>Editar BLOQUE</h1> 
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
     <td width="9%"><h5>Link:</h5></td>
     <td width="91%"><input type="text" name="Link"  style="width:500px" value="<?php echo $Link?>" /></td>
   </tr>
                 <tr>
     <td width="9%"><h5>Texto:</h5></td>
     <td width="91%"><textarea name="Texto" class="jqte-test"><?php echo $Texto?></textarea></td>
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
     <td width="9%"><h5>Texto Ingles:</h5></td>
     <td width="91%"><textarea name="Texto_Ingles" class="jqte-test"><?php echo $Texto_Ingles?></textarea></td>
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
     <td width="9%"><h5>Texto Portugues:</h5></td>
     <td width="91%"><textarea name="Texto_Portugues" class="jqte-test"><?php echo $Texto_Portugues?></textarea></td>
   </tr>
                    <tr>
     <td width="9%"><h5>Activo:</h5></td>
     <td width="91%"><?php
     if($Visible==1){$sel1="selected";}else{$sel2="selected";}
	 
	 ?><select name="Visible" id="Visible">
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