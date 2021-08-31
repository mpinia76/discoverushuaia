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
</style>
<div class="page-heading" style="background:url(img/bg-beneficios.jpg); background-size:cover">
        <h1 class="title" style="color:#FFF">Terminos y Condiciones</h1>

</div>
		
<div class="container content-page" align="center">
<p>
<div id="terminos" style="width:70%; margin-bottom:20px; text-align:justify">
                    			
								
                                <?php
$laSQL = "SELECT * FROM  `home` where Visible='1' and Lugar='Terminos'";
$result = mysqli_query($link,$laSQL);
			while ($rowS = mysqli_fetch_array($result)) {

				$Texto=utf8_encode($rowS['Texto']);

echo "$Texto";
			}
			if($Texto==""){echo"<center><h2>SITIO EN CONSTRUCCIÓN</h2></center>";}
			?>






</div>




</div>