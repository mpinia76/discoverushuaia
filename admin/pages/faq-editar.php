<script language="JavaScript">
function confirmar ( mensaje ) {
return confirm( mensaje );
}
</script>
<?PHP	

	$borrar=$_POST["borrar"];
if ($_POST["borrar"]!="")
{

	$laSQL = "DELETE from faq where Id='$borrar'";
	$result = mysqli_query($link,$laSQL);	
	
	echo "<div class='valid_box'>
	
        FAQ BORRADA
     </div>";
}

?>	

<table width="100%" id="rounded-corner" >
    <thead>
    	<tr>
        	<th scope="col" class="rounded-company"></th>
            <th width="70%" class="rounded" scope="col">Nombre</th>
            <th scope="col" class="rounded">Editar</th>
            <th scope="col" class="rounded-q4">Borrar</th>
        </tr>
    </thead>
    
        	<?php
			$laSQL = "SELECT * FROM faq  order by Id desc";
			$result = mysqli_query($link,$laSQL);			 
			while ($row = mysqli_fetch_array($result)) {
			$Id=$row['Id'];
			$Pregunta=$row['Pregunta'];
			
			echo"<tr>
        	<td><input type='checkbox' name='notas[]' value='$Id' /></td>
            <td>$Pregunta</td>
             <td><a href='".$dir_raiz."faq/edit-$Id.html'><img src='".$dir_raiz."images/user_edit.png'  border='0' /></a></td>
            <td><form method='post'>
			<input type='hidden' name='borrar' value='$Id' />
			<input type='image' name='imageField' id='imageField' src='".$dir_raiz."images/trash.png'onClick='return confirmar(\"¿Esta seguro que desea eliminar el registro $Pregunta?\")' /></form>
            
         </td>
        </tr>    
        ";
			}
			?>
</table> 