<script language="JavaScript">
function confirmar ( mensaje ) {
return confirm( mensaje );
}
</script>
<?PHP	

	$borrar=$_POST["borrar"];
if ($_POST["borrar"]!="")
{

	$laSQL = "UPDATE 2014_lineas SET Visible='NO' where Id='$borrar'";
	$result = mysqli_query($link,$laSQL);	
	echo "<div class='valid_box'>
        Maquina Ocultada
     </div>";
}

?>	

<table width="100%" id="rounded-corner" >
    <thead>
    	<tr>
        	<th scope="col" class="rounded-company"></th>
            <th width="70%" class="rounded" scope="col">Feria</th>
            <th scope="col" class="rounded">Editar</th>
            <th scope="col" class="rounded-q4">Visible</th>
        </tr>
    </thead>
    
        	<?php
			$laSQL = "SELECT * FROM 2014_lineas  order by Id desc";
			$result = mysqli_query($link,$laSQL);			 
			while ($row = mysqli_fetch_array($result)) {
			$Id=$row['Id'];
			$Nombre=$row['Nombre_es'];
			$Visible=$row['Visible'];
			
			echo"<tr>
        	<td><input type='checkbox' name='notas[]' value='$Id' /></td>
            <td>$Nombre</td>
             <td><a href='".$dir_raiz."lineas/edit-$Id.html'><img src='".$dir_raiz."images/user_edit.png'  border='0' /></a></td>
            <td><form method='post'>
			<input type='hidden' name='borrar' value='$Id' />
			<input type='image' name='imageField' id='imageField' src='".$dir_raiz."images/trash.png'onClick='return confirmar(\"¿Esta seguro que desea ocultar el registro $Nombre?\")' /></form>
            
         </td>
        </tr>    
        ";
			}
			?>
</table> 