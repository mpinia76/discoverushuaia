<script language="JavaScript">
function confirmar ( mensaje ) {
return confirm( mensaje );
}
</script>


<table width="100%" id="rounded-corner" >
    <thead>
    	<tr>
        	<th scope="col" class="rounded-company"></th>
            <th width="70%" class="rounded" scope="col">Nombre</th>
            <th scope="col" class="rounded">Editar</th>
        </tr>
    </thead>
    
        	<?php
			$laSQL = "SELECT * FROM banderas order by Id desc";
			$result = mysqli_query($link,$laSQL);			 
			while ($row = mysqli_fetch_array($result)) {
			$Id=$row['Id'];
			$Titulo=$row['Titulo'];
			
			echo"<tr>
        	<td><input type='checkbox' name='notas[]' value='$Id' /></td>
            <td>$Titulo</td>
             <td><a href='".$dir_raiz."banderas/edit-$Id.html'><img src='".$dir_raiz."images/user_edit.png'  border='0' /></a></td>

        </tr>    
        ";
			}
			?>
</table> 