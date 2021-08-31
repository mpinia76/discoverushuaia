

<?php



include("../db.php");



$connDiscover=mysqli_connect(db_dir_gestion(), db_usr_gestion(), db_pass_gestion(), db_base_gestion());
$connDiscoverushuaia=mysqli_connect(db_dir(), db_usr(), db_pass(), db_base());

$sql = "SELECT clientes.email, encuesta.* 
	FROM encuesta INNER JOIN clientes ON encuesta.cliente_id = clientes.id";
	//echo $sql;
	$rsTemp = mysqli_query($connDiscoverushuaia,$sql);
	//print_r($rsTemp);
	while ($rs = mysqli_fetch_array($rsTemp)){

		$sql = "SELECT reservas.id
			FROM reservas INNER JOIN clientes ON reservas.cliente_id = clientes.id 
			WHERE reservas.retiro = '".$rs['retiro']."' AND reservas.devolucion = '".$rs['devolucion']."' AND clientes.email = '".$rs['email']."'";
		//echo $sql."<br>";
		$rsTemp1 = mysqli_query($connDiscover,$sql) or die(mysqli_error($connDiscover));
		//print_r($rsTemp1);
		$reserva_id=0;
		if ($rs1 = mysqli_fetch_array($rsTemp1)){
			$reserva_id = $rs1['id'];
		}
		
		$sql = "INSERT INTO encuesta (id, reserva_id, password, comentarios_buenos, comentarios_malos, enviada) VALUES ('".$rs['id']."','".$reserva_id."','".md5($rs['password'])."','".$rs['comentarios_buenos']."','".$rs['comentarios_malos']."',1)";
		mysqli_query($connDiscover,$sql);
		$sql = "SELECT * 
			FROM encuesta_respuestas WHERE encuesta_id = ".$rs['id'];
			//echo $sql;
			$rsTemp2 = mysqli_query($connDiscoverushuaia,$sql);
			//print_r($rsTemp);
			while ($rs2 = mysqli_fetch_array($rsTemp2)){
				$sql = "INSERT INTO encuesta_respuestas (encuesta_id, pregunta_id, valor, extra) 
				VALUES ('".$rs2['encuesta_id']."','".$rs2['pregunta_id']."','".$rs2['valor']."','".$rs2['extra']."')";
				//echo $sql;
				mysqli_query($connDiscover,$sql);
			}
		
	}
			
				
?>

	

