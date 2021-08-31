<script language="JavaScript">
function confirmar ( mensaje ) {
return confirm( mensaje );
}
</script><?php
    $id=$_GET['id'];
  
  
  
  if ($_POST["crear"]!="")
{


$CareItem=$_POST['CareItem'];
$CareDesc=$_POST['CareDesc'];
$CareDescEn=$_POST['CareDescEn'];
$CareDescPo=$_POST['CareDescPo'];
$CareId=$_POST['CareId'];

 for($x = 0; $x < count($CareItem); $x++ )
    {
	$laSQL = "UPDATE categorias_detalles  SET Tipo='".$CareItem["$x"]."', Detalle='".$CareDesc["$x"]."', Detalle_Ingles='".$CareDescEn["$x"]."', Detalle_Portugues='".$CareDescPo["$x"]."' where Id='".$CareId["$x"]."';";
	
	$result = mysqli_query($link,$laSQL);
	
    }
	
	
	
	$CareItemN=$_POST['CareItemN'];
$CareDescN=$_POST['CareDescN'];
$CareDescEnN=$_POST['CareDescEnN'];
$CareDescPoN=$_POST['CareDescPoN'];

 for($x = 0; $x < count($CareItemN); $x++ )
    {
	$laSQL = "INSERT INTO categorias_detalles (Id,  Categoria, Tipo, Detalle, Detalle_Ingles, Detalle_Portugues) 
	VALUES (NULL, '$id', '".$CareItemN["$x"]."', '".$CareDescN["$x"]."', '".$CareDescEnN["$x"]."', '".$CareDescPoN["$x"]."')";
	$result = mysqli_query($link,$laSQL);

    }



		echo "
	<div class='valid_box'>
        DETALLES EDITADOS CORRECTAMENTE
     </div>";
return;

}



?>  

<?PHP	

	$borrar=$_POST["borrar"];
if ($_POST["borrar"]!="")
{

	$laSQL = "DELETE from categorias_detalles where Id='$borrar'";
	$result = mysqli_query($link,$laSQL);	
	
	echo "<div class='valid_box'>
	
        DATO BORRADO
     </div>";
}

?>	



            
            
            <h1>Editar Categoria</h1> 
  
   <form action="" method="post" class="form" enctype="multipart/form-data">
  
  <table>
  
    <?php


  			$laSQL = "SELECT * FROM categorias_detalles where Categoria='$id'";
			$result = mysqli_query($link,$laSQL);			 
			while ($rowL = mysqli_fetch_array($result)) {
				$IdD=utf8_encode($rowL['Id']);
				$Tipo=utf8_encode($rowL['Tipo']);
				$Detalle=$rowL['Detalle'];
				$Detalle_Ingles=$rowL['Detalle_Ingles'];
				$Detalle_Portugues=$rowL['Detalle_Portugues'];
				
				$array = array("puertas"=>"Q Puertas", "aire"=>"Climatización", "personas"=>"Q pasajeros", "maletas"=>"Maletas Grandes", "maletaspeque"=>"Maletas Pequeñas", "centralizado"=>"Cierre Centralizado", "disel"=>"Combustible", "alarma"=>"Alarma", "direccion"=>"Dirección Asistida", "airbag"=>"Airbag", "vidrio_electrico"=>"Alzacristales", "abs"=>"ABS", "isofix"=>"Isofix", "traccion"=>"Tracción", "doble_cabina"=>"Doble Cabina", "otros"=>"Otros");
				
			echo"<tr><td><input name='CareId[]' type='hidden' value='$IdD' /><select name='CareItem[]'>";
			
			foreach ($array as $clave => &$valor) {
				if($Tipo==$clave){$selected='selected';}else{$selected='';}
    echo"<option value='$clave' $selected>$valor</option>";
}
			echo"</select></td>
			<td><input name='CareDesc[]' type='text'  style='width:140px' value='$Detalle' />
			</td><td><input name='CareDescEn[]' type='text'  style='width:140px' value='$Detalle_Ingles' />
			</td><td><input name='CareDescPo[]' type='text'  style='width:140px' value='$Detalle_Portugues' />
			</td><td><form></form>
			<form method='post' id='borrar' name='borrar'>
			<input type='hidden' name='borrar' value='$IdD' />
			<input type='image' name='imageField' id='imageField' src='".$dir_raiz."images/trash.png' onClick='return confirmar(\"Â¿Esta seguro que desea eliminar el registro $Nombre?\")' /></form></td></tr>";
			}
			?>
            </table>
   <div id="dynamicInput">         
            
  </div>
  
  

			<input type="button" id="more_fields" onclick="addInput('dynamicInput');" value="Agregar otro item" />
			<script>
			
var counter = 1;
var limit = 15;
function addInput(divName){
     if (counter == limit)  {
          alert("You have reached the limit of adding " + counter + " inputs");
     }
     else {
          var newdiv = document.createElement('div');
          newdiv.innerHTML = "<br><div id='agregue-"+counter+"'><select name='CareItemN[]'><option value='puertas'>Q Puertas</option><option value='aire'>Climatización</option><option value='personas'>Q pasajeros</option><option value='maletas'>Maletas Grandes</option><option value='maletaspeque'>Maletas Pequeñas</option><option value='centralizado'>Cierre centralizado</option><option value='disel'>Combustible</option><option value='alarma'>Alarma</option><option value='direccion'>Dirección asistida</option><option value='airbag'>Airbag</option><option value='vidrio_electrico'>Alzacristales</option><option value='abs'>ABS</option><option value='isofix'>Isofix</option><option value='traccion'>Tracción</option><option value='doble_cabina'>Doble Cabina</option><option value='otros'>Otros</option></select><input name='CareDescN[]' type='text'  style='width:140px' /><input name='CareDescEnN[]' type='text'  style='width:140px' /><input name='CareDescPoN[]' type='text'  style='width:140px' /><a onclick='borrar(\"agregue-"+counter+"\");'>X</a></div>";
          document.getElementById(divName).appendChild(newdiv);
          counter++;
     }
}


function borrar(borrandoid){
	document.getElementById(borrandoid).remove();
	
}
</script><p>
     <input name="crear" type="hidden" id="crear" value="si" />
<input type="submit" name="submit" id="submit" value="Enviar"  style="width:500px"/></form>





 

	