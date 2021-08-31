<script language="JavaScript">
function confirmar ( mensaje ) {
return confirm( mensaje );
}
</script>
<?PHP	

	$borrar=$_POST["borrar"];
	$activarsi=$_POST["activarsi"];
	$activarno=$_POST["activarno"];
if ($_POST["borrar"]!="")
{

	$laSQL = "DELETE from videohome where Id='$borrar'";
	$result = mysqli_query($link,$laSQL);	
	echo "<div class='valid_box'>
        VIDEO BORRADO
     </div>";
}

if ($_POST["activarsi"]!="")
{

	$laSQL = "UPDATE videohome SET Activo=1 where Id='$activarsi' ";
	$result = mysqli_query($link,$laSQL);	
	echo "<div class='valid_box'>
        VIDEO ACTIVADO
     </div>";
}
if ($_POST["activarno"]!="")
{

	$laSQL = "UPDATE videohome SET Activo=0 where Id='$activarno'";
	$result = mysqli_query($link,$laSQL);	
	echo "<div class='valid_box'>
        VIDEO DESACTIVADO
     </div>";
}

if ($_POST["Video"]!="")
{

	$laSQL = "INSERT INTO videohome (Id, Link, Activo) VALUES (NULL, '".$_POST["Video"]."' , '1');";
	$result = mysqli_query($link,$laSQL);	
	echo "<div class='valid_box'>
        VIDEO AGREGADO
     </div>";
}
?>	

<table width="100%" id="rounded-corner" >
    <thead>
    	<tr>
        	<th scope="col" class="rounded-company"></th>
            <th width="70%" class="rounded" scope="col">Titulo</th>
            <th scope="col" class="rounded">Editar</th>
            <th scope="col" class="rounded-q4">Borrar</th>
        </tr>
    </thead>
    
        	<?php
			$laSQL = "SELECT * FROM videohome  order by Id desc";
			$result = mysqli_query($link,$laSQL);			 
			while ($row = mysqli_fetch_array($result)) {
			$Id=$row['Id'];
			$Video=$row['Link'];
			$Activo=$row['Activo'];
			
			echo"<tr>
        	<td><input type='checkbox' name='notas[]' value='$Id' /></td>
            <td>$Video</td>
             <td>";
			 
			 if($Activo==1){echo"<form method='post'>
			<input type='hidden' name='activarno' value='$Id' />
			<input type='image' name='imageField' id='imageField' src='".$dir_raiz."images/error.png' /></form>";}
			else{echo"<form method='post'>
			<input type='hidden' name='activarsi' value='$Id' />
			<input type='image' name='imageField' id='imageField' src='".$dir_raiz."images/valid.png' /></form>";}
			
            echo"</td><td><form method='post'>
			<input type='hidden' name='borrar' value='$Id' />
			<input type='image' name='imageField' id='imageField' src='".$dir_raiz."images/trash.png'
			onClick='return confirmar(\"¿Esta seguro que desea eliminar el registro $Titulo?\")' /></form>
            
         </td>
        </tr>    
        ";
			}
			?>
</table> 

<h1>Nuevo Video</h1> 
    
           <form action="" method="post" class="form" enctype="multipart/form-data" >
         <table width="100%" border="0" cellspacing="5" cellpadding="0">
           <tr>
     <td width="9%"><h5>Video:</h5></td>
     <td width="91%"><input type="text" name="Video"  style="width:500px" /></td>
   </tr>
      <tr>
     <td>&nbsp;</td>
     <td><input type="submit" name="submit" id="submit" value="Enviar"  style="width:500px"/></td>
   </tr>
   </table></form>