  <?php
  
  if ($_POST["crear"]!="")
{

	$Nombre=$_POST["Nombre"];

	$laSQL = "INSERT INTO Locales (Id,  Nombre) 
	VALUES (NULL, '$Nombre')";
	$result = mysqli_query($link,$laSQL);
	echo "
	<div class='valid_box'>
        Local Agregado
     </div>";

return;

}
?>  <h1>LOCAL NUEVO</h1> 
    
           <form action="" method="post" class="form" enctype="multipart/form-data" >
         <table width="100%" border="0" cellspacing="5" cellpadding="0">
              <tr>
     <td width="9%"><h5>Nombre:</h5></td>
     <td width="91%"><input type="text" name="Nombre"  style="width:500px" /></td>
   </tr>
        
      
   <tr>
     <td>&nbsp;</td><input name="crear" type="hidden" id="crear" value="si" />
     <td><input type="submit" name="submit" id="submit" value="Enviar"  style="width:500px"/></td>
   </tr>
         </table>

      
</form>

	
