<script language="JavaScript">
function confirmar ( mensaje ) {
return confirm( mensaje );
}
</script>
<?PHP	

	$borrar=$_POST["borrar"];
if ($_POST["borrar"]!="")
{

	$laSQL = "DELETE from categorias where Id='$borrar'";
	$result = mysqli_query($link,$laSQL);	
	
		$laSQL = "DELETE from categorias_detalles where Categoria='$borrar'";
	$result = mysqli_query($link,$laSQL);
	
	echo "<div class='valid_box'>
	
        CATEGORIA BORRADA
     </div>";
}

?>	

<table width="100%" id="rounded-corner" >
    <thead>
    	<tr>
        	<th scope="col" class="rounded-company"></th>
            <th width="60%" class="rounded" scope="col">Nombre</th>
            <th width="10%" class="rounded" scope="col">Orden</th>
            <th scope="col" class="rounded">Editar</th>
            <th scope="col" class="rounded">Detalles</th>

            <th scope="col" class="rounded-q4">Borrar</th>
        </tr>
    </thead>
    
        	<?php
			$laSQL = "SELECT * FROM categorias order by orden";
			$result = mysqli_query($link,$laSQL);			 
			while ($row = mysqli_fetch_array($result)) {
			$Id=$row['Id'];
			$Nombre=($row['Nombre']);
			$Marca=($row['Marca']);
			$orden=($row['orden']);
			
			echo"<tr>
        	<td><input type='checkbox' name='notas[]' value='$Id' /></td>
            <td>$Nombre ($Marca)</td>
            <td>$orden</td>
             <td><a href='".$dir_raiz."categorias/edit-$Id.html'><img src='".$dir_raiz."images/user_edit.png'  border='0' /></a></td>
             <td><a href='".$dir_raiz."categorias/detalles-$Id.html'><img src='".$dir_raiz."images/notice.png'  border='0' /></a></td>
            <td><form method='post'>
			<input type='hidden' name='borrar' value='$Id' />
			<input type='image' name='imageField' id='imageField' src='".$dir_raiz."images/trash.png'onClick='return confirmar(\"¿Esta seguro que desea eliminar el registro $Nombre?\")' /></form>
            
         </td>
        </tr>    
        ";
			}
			?>
</table> 