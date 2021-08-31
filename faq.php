 <style>

.item-beneficio{
	max-width:900px;
	min-height:200px;
	border:1px solid #CCC;
	-webkit-box-shadow: 5px 5px 10px 0px rgba(133,131,133,1);
-moz-box-shadow: 5px 5px 10px 0px rgba(133,131,133,1);
box-shadow: 5px 5px 10px 0px rgba(133,131,133,1);
border-radius: 10px 10px 10px 10px;
-moz-border-radius: 10px 10px 10px 10px;
-webkit-border-radius: 10px 10px 10px 10px;
margin:20px;
}
.benf-foto{
	height:200px;
	width:200px;
	float:left;
	margin-right:10px;
	text-align:left;
	padding:10px;
}



.benf-texto{
	padding:30px;
	text-align:left
}

.benf-consultar{
	width:180px;
	padding:10px;
	color:#359cdf;
	background-color:#eee;
	float:right;
	text-align:center;
	font-size:14px;
	margin-top:20px;
}
</style>
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
<div class="page-heading" style="background:url(img/bg-beneficios.jpg); background-size:cover">
        <h1 class="title" style="color:#FFF"><?php echo utf8_encode(PREGUNTAS_FRECUENTES);?></h1>

</div>
		
<div class="container content-page" align="center">
<p>
<div id="faq">
                    			<?php
$laSQL = "SELECT * FROM  faq order by Orden asc ";
$result = mysqli_query($link,$laSQL);
$i=1;
			while ($rowL = mysqli_fetch_array($result)) {
				$Logo=$rowL['Logo'];
			if (isset($_SESSION['idioma'])) {
					switch ($_SESSION['idioma']) {
						case 'es':
							
							$Pregunta=utf8_encode($rowL['Pregunta']);
							$Respuesta=utf8_encode($rowL['Respuesta']);
				
						break;
						case 'po':
							$Pregunta=utf8_encode($rowL['Pregunta_Portugues']);
							$Respuesta=utf8_encode($rowL['Respuesta_Portugues']);
							
						break;
						case 'en':
							$Pregunta=utf8_encode($rowL['Pregunta_Ingles']);
							$Respuesta=utf8_encode($rowL['Respuesta_Ingles']);
						break;
						
					}
					
				}
				else{
					$Pregunta=utf8_encode($rowL['Pregunta']);
					$Respuesta=utf8_encode($rowL['Respuesta']);
				}
				


echo "<div class='item-beneficio'>
        <div class='benf-foto'><img src='fotos/faq/$Logo'></div>
            <div class='benf-texto'>
            <h4>$Pregunta</h4>$Respuesta
			</div>
        
        
        
        
        
        </div>";

			}
			?>






</div>




</div>