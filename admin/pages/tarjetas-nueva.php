  <?php
  
  if ($_POST["crear"]!="")
{

	$tarjeta=$_POST["tarjeta"];
	$cuota=$_POST["cuota"];
	$indice=$_POST["indice"];

			

	$laSQL = "INSERT INTO cuotas (id,  tarjeta, cuota, indice) 
	VALUES (NULL, '$tarjeta', '$cuota', '$indice')";
	$result = mysqli_query($link,$laSQL);
	echo "
	<div class='valid_box'>
        TARJETA AGREGADA CORRECTAMENTE
     </div>";

return;

}
?>  <h1>TARJETA NUEVA</h1> 
    
           <form action="" method="post" class="form" enctype="multipart/form-data" >
         <table width="100%" border="0" cellspacing="5" cellpadding="0">
              <tr>
     <td width="9%"><h5>Tarjeta:</h5></td>
     <td width="91%"><input type="text" name="tarjeta"  style="width:200px" /></td>
   </tr>
        <tr>
     <td width="9%"><h5>Cuota nro.:</h5></td>
     <td width="91%"><input type="text" name="cuota"  style="width:35px" /></td>
   </tr>

   
                    <tr>
     <td width="9%"><h5>Indice:</h5></td>
     <td width="91%"><input type="text" name="indice"  style="width:35px" /></td>
   </tr>
      
   <tr>
     <td>&nbsp;</td><input name="crear" type="hidden" id="crear" value="si" />
     <td><input type="submit" name="submit" id="submit" value="Enviar"  style="width:500px"/></td>
   </tr>
         </table>

      
</form>

	
