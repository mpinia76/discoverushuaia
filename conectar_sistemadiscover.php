<?php
include("conex.php");

	$vdir = "163.10.35.37";
	$vusr = "root";
	$vpass = "secyt";
	$vbase = "discover";
	$link=Conectarse( $vdir, $vusr, $vpass, $vbase);

	$laSQL = "SELECT * FROM  categorias order by categoria asc";
	$result = mysqli_query($link,$laSQL);

			while ($rowL = mysqli_fetch_array($result)) {
				echo $rowL['id']." - ".$rowL['categoria']."<br>";
			}
?>
