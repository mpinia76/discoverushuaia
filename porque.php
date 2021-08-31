<style>

.item-bloque{
	max-width:50%
}
.bloq{
	
	border:1px solid #999;
	padding:10px;
	text-align:justify;
	
	margin:30px;
}
.encabezado{
	background:url(img/bloq-beneficio.jpg) center;

	height:150px;
	margin:-10px -10px 5px -10px;
	color: #fff;
    line-height:140px; /* igual a height*/
	
}
.encabezado span{
 display:inline-block;
    line-height:2em;
    vertical-align:bottom;
	font-size:18px;
	font-weight:bold;
	padding:7px}

#bloques{
	width:100%;
}


.page-heading {
	background-image: url("img/porq_alquilar_azull.jpg");
	
}
</style>

<script src="http://masonry.desandro.com/v2/jquery.masonry.min.js"></script>

<?php 
@session_start();
if (isset($_SESSION['idioma'])) {
	switch ($_SESSION['idioma']) {
		case 'es':
			include("messages_es.php");
		break;
		case 'po':
			include("messages_po.php");
		break;
		case 'en':
			include("messages_en.php");
		break;
		
	}
	
}
else{
	include("messages_es.php");
}
?>
  
<div class="page-heading">
        <h1 class="title" style="color:#FFF"><?php echo utf8_encode(POR_QUE_ALQUILAR_UN_AUTO);?></h1>

</div>
		
<div class="container content-page" align="center">


<div style="width:70%; line-height:1.6; "><?php echo utf8_encode(PORQUE_CONTENIDO);?>
</div>
<p>
<!--<h3 style="margin:60px 0px"><strong>¿Por qué alquilar un auto?</strong> <span style="color:#999; font-weight:300">Libertad, DESCUBRIR. El espíritu de la marca.</span></h3>--><p>
<h2><?php echo utf8_encode(ATRACTIVOS_PARA_LLEGAR_EN_AUTO);?></h2>


<div id="bloques">


            			<?php
$laSQL = "SELECT * FROM  atractivos where Activo='1' ORDER BY orden ";
$result = mysqli_query($link,$laSQL);
$i=1;
			while ($rowL = mysqli_fetch_array($result)) {
				if (isset($_SESSION['idioma'])) {
					switch ($_SESSION['idioma']) {
						case 'es':
							$Lugar=utf8_encode($rowL['Lugar']);
							$Texto=utf8_encode($rowL['Texto']);
						break;
						case 'po':
							$Lugar=utf8_encode($rowL['Lugar_Portugues']);
							$Texto=utf8_encode($rowL['Texto_Portugues']);
						break;
						case 'en':
							$Lugar=utf8_encode($rowL['Lugar_Ingles']);
							$Texto=utf8_encode($rowL['Texto_Ingles']);
						break;
						
					}
					
				}
				else{
					$Lugar=utf8_encode($rowL['Lugar']);
					$Texto=utf8_encode($rowL['Texto']);
				}
				
				$Foto=utf8_encode($rowL['Foto']);


echo "<div class='item-bloque'><div id='bloq-$i' class='bloq'>
<div class='encabezado' style='background:url(img/$Foto) center;background-size:cover;'><span>$Lugar</span></div>
$Texto
</div></div>";

			}
			?>







</div>





                            			<?php
$laSQL = "SELECT * FROM  `home` where Lugar='5-porque'";
$result = mysqli_query($link,$laSQL);
$row = mysqli_fetch_array($result);
				if($row['Visible']==1){$Texto=utf8_encode($row['Texto']);
				
				echo'<h3>Excursiones sugeridas</h3>
<p>
<div style="max-width: 70%; color: #006;">';

echo"$Texto";

echo'</div>';}
			
			?>
<!--<table width="70%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50%"><h4>Trekking</h4></td>
    <td width="50%">&nbsp;</td>
  </tr>
  <tr>
    <td>Avistaje de Castores</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Trekking a la Laguna Perdida o Esmeralda</td>
    <td>Dificultad: Moderada</td>
  </tr>
  <tr>
    <td>Trekking Glaciar Ojo de Albino</td>
    <td>Dificultad: Exigente</td>
  </tr>
  <tr>
    <td>Trekking Glaciar Del Alvear</td>
    <td>Dificultad: Exigente</td>
  </tr>
  <tr>
    <td>Trekking &amp; Canoas en el Parque Nacional</td>
    <td>Dificultad: Moderada</td>
  </tr>
  <tr>
    <td>Trekking Glaciar</td>
    <td>Periodo de Operaciones: Octubre a Abril</td>
  </tr>
  </table>-->



</div><!-- end container -->
<div style="background:url(img/montana.jpg); background-size:cover; width:100%; min-height:400px;"></div>

<script>

		jQuery.noConflict();
			jQuery(function() {
			
				jQuery('#bloques').masonry({
  itemSelector: '.item-bloque'
});
			
			});
			
			
  </script>
  
  