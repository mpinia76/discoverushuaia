 <style>

.item-beneficio{
	max-width:900px;
	height:200px;
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

.page-heading {
	background-image: url("img/beneficios_azull.jpg");
	
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
<div class="page-heading">
        <h1 class="title" style="color:#FFF"><?php echo utf8_encode(BENEFICIOS);?></h1>

</div>
		
<div class="container content-page" align="center">
<!--Conocé cada un de nuestros beneficios que podés disfrutar
--><p>
<div id="beneficios">
                    			<?php
$laSQL = "SELECT * FROM  beneficios ";
if (isset($_SESSION['idioma'])) {
	switch ($_SESSION['idioma']) {
		case 'es':
			
			$laSQL .= " WHERE Activo = 1 ";

		break;
		case 'po':
			$laSQL .= " WHERE Activo_Portugues = 1 ";
			
		break;
		case 'en':
			$laSQL .= " WHERE Activo_Ingles = 1 ";
			
		break;
		
	}
	
}
else{
	$laSQL .= " WHERE Activo = 1 ";
}
$laSQL .= " ORDER BY orden ";

$result = mysqli_query($link,$laSQL);
$i=1;
			while ($rowL = mysqli_fetch_array($result)) {
				$Id=$rowL['Titulo'];
				$Logo=$rowL['Logo'];
				if (isset($_SESSION['idioma'])) {
					switch ($_SESSION['idioma']) {
						case 'es':
							
							$Nombre=utf8_encode($rowL['Nombre']);
							$Texto=utf8_encode($rowL['Texto']);
				
						break;
						case 'po':
							$Nombre=utf8_encode($rowL['Nombre_Portugues']);
							$Texto=utf8_encode($rowL['Texto_Portugues']);
						break;
						case 'en':
							
							$Nombre=utf8_encode($rowL['Nombre_Ingles']);
							$Texto=utf8_encode($rowL['Texto_Ingles']);
						break;
						
					}
					
				}
				else{
					$Nombre=utf8_encode($rowL['Nombre']);
					$Texto=utf8_encode($rowL['Texto']);
				}
				
				$Link=utf8_encode($rowL['Link']);


echo "<div class='item-beneficio'>
        <div class='benf-foto'><img src='fotos/beneficios/$Logo'></div>
            <div class='benf-texto'>
            <h4>$Nombre</h4>$Texto";


           if($Link){echo"<div class='benf-consultar'><a href='$Link' target='_blank'>".utf8_encode(CONSULTAR)."</a></div>";}
		   
		                echo "</div>
        
        
        
        
        
        </div>";

			}
			?>






</div>




</div>