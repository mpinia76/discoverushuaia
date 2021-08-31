<?php
    $id=$_GET['id'];

  if ($_POST["crear"]!="")
{

	$Lugar=$_POST["Lugar"];
	$Texto=$_POST["Texto"];

	$Lugar_Ingles=$_POST["Lugar_Ingles"];
	$Texto_Ingles=$_POST["Texto_Ingles"];

	$Lugar_Portugues=$_POST["Lugar_Portugues"];
	$Texto_Portugues=$_POST["Texto_Portugues"];

	$Activo=$_POST["Activo"];
	$orden=$_POST["orden"];


	$laSQL = "UPDATE atractivos SET Lugar = '$Lugar', Texto='$Texto', Lugar_Ingles = '$Lugar_Ingles', Texto_Ingles='$Texto_Ingles',Lugar_Portugues = '$Lugar_Portugues', Texto_Portugues='$Texto_Portugues',Activo='$Activo', orden='$orden' where Id='$id'";

	$result = mysqli_query($link,$laSQL)  ;
	echo "
	<div class='valid_box'>
        ATRACTIVO EDITADA CORRECTAMENTE
     </div>";
}


?>

  <?php


  			$laSQL = "SELECT * FROM atractivos where Id='$id'";
			$result = mysqli_query($link,$laSQL)  ;
			while ($rowL = mysqli_fetch_array($result)) {
				$Id=utf8_encode($rowL['Id']);
				$Lugar=utf8_encode($rowL['Lugar']);
				$Texto=$rowL['Texto'];
				$Lugar_Ingles=utf8_encode($rowL['Lugar_Ingles']);
				$Texto_Ingles=$rowL['Texto_Ingles'];
				$Lugar_Portugues=utf8_encode($rowL['Lugar_Portugues']);
				$Texto_Portugues=$rowL['Texto_Portugues'];
				$Activo=utf8_encode($rowL['Activo']);
				$orden=($rowL['orden']);

			}
			?>


            <h1>Editar Atractivo</h1>
               <form action="" method="post" class="form" enctype="multipart/form-data" >
         <table width="100%" border="0" cellspacing="5" cellpadding="0">

        <tr>
     <td width="9%"><h5>Lugar:</h5></td>
     <td width="91%"><input type="text" name="Lugar"  style="width:500px" value="<?php echo $Lugar?>" /></td>
   </tr>
         <tr>
     <td width="9%"><h5>Texto:</h5></td>
     <td width="91%"><textarea name="Texto" class="jqte-test"><?php echo $Texto?></textarea></td>
     </td>
   </tr>

    <tr>
     <td width="9%"><h5>Lugar Ingles:</h5></td>
     <td width="91%"><input type="text" name="Lugar_Ingles"  style="width:500px" value="<?php echo $Lugar_Ingles?>" /></td>
   </tr>
         <tr>
     <td width="9%"><h5>Texto Ingles:</h5></td>
     <td width="91%"><textarea name="Texto_Ingles" class="jqte-test"><?php echo $Texto_Ingles?></textarea></td>
     </td>
   </tr>

    <tr>
     <td width="9%"><h5>Lugar Portugues:</h5></td>
     <td width="91%"><input type="text" name="Lugar_Portugues"  style="width:500px" value="<?php echo $Lugar_Portugues?>" /></td>
   </tr>
         <tr>
     <td width="9%"><h5>Texto Portugues:</h5></td>
     <td width="91%"><textarea name="Texto_Portugues" class="jqte-test"><?php echo $Texto_Portugues?></textarea></td>
     </td>
   </tr>
     <tr>
     <td width="9%"><h5>Orden:</h5></td>
     <td width="91%"><input type="text" name="orden"  style="width:30px" value="<?php echo $orden?>" /></td>
     </td>
   </tr>
                    <tr>
     <td width="9%"><h5>Activo:</h5></td>
     <td width="91%"><?php
     if($Activo==1){$sel1="selected";}else{$sel2="selected";}

	 ?><select name="Activo" id="Activo">
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
