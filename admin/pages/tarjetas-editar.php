<script language="JavaScript">
function confirmar ( mensaje ) {
return confirm( mensaje );
}
</script>
<?PHP	

	$borrar=$_POST["borrar"];
if ($_POST["borrar"]!="")
{

	$laSQL = "DELETE from cuotas where id='$borrar'";
	$result = mysqli_query($link,$laSQL);	
	
	echo "<div class='valid_box'>
	
        CUOTA BORRADA
     </div>";
}

?>	

<table width="100%" id="rounded-corner" >
    <thead>
    	<tr>
        	<th scope="col" class="rounded-company"></th>
            <th width="70%" class="rounded" scope="col">Tarjeta</th>
            <th width="70%" class="rounded" scope="col">Cuota</th>
            <th width="70%" class="rounded" scope="col">Indice</th>
            <th scope="col" class="rounded">Editar</th>
            <th scope="col" class="rounded-q4">Borrar</th>
        </tr>
    </thead>
    
        	<?php
			$laSQL = "SELECT * FROM cuotas  order by id desc";
			$result = mysqli_query($link,$laSQL);			 
			while ($row = mysqli_fetch_array($result)) {
			$id=$row['id'];
			$tarjeta=$row['tarjeta'];
			$cuota=$row['cuota'];
			$indice=$row['indice'];
			
			echo"<tr>
        	<td><input type='checkbox' name='notas[]' value='$id' /></td>
            <td>$tarjeta</td>
            <td>$cuota</td>
            <td>$indice</td>
             <td><a href='".$dir_raiz."tarjetas/edit-$id.html'><img src='".$dir_raiz."images/user_edit.png'  border='0' /></a></td>
            <td><form method='post'>
			<input type='hidden' name='borrar' value='$id' />
			<input type='image' name='imageField' id='imageField' src='".$dir_raiz."images/trash.png'onClick='return confirmar(\"¿Esta seguro que desea eliminar el registro $Nombre?\")' /></form>
            
         </td>
        </tr>    
        ";
			}
			?>
</table> 