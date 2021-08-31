<?php
session_start();
//datos para establecer la conexion con la base de mysql.

            include("conex.php");
			include("db.php");

			$vdir = db_dir();
			$vusr = db_usr();
			$vpass = db_pass();
			$vbase = db_base();
			$link=Conectarse( $vdir, $vusr, $vpass, $vbase);


if(trim($_POST["login"]) != "" && trim($_POST["login"]) != "")
{

	$login=$_POST['login'];
	$pass=$_POST['pass'];
	$volver = $_POST["volver"];

	$result = mysqli_query($link,"SELECT * FROM administracion WHERE login='$login'");
	$row = mysqli_fetch_array($result);
	$lapass=crypt($pass,"semilla");
	//echo $lapass;
			if($row["password"]==$lapass ){
			$_SESSION["login"]=$login;
			$_SESSION["nombre"]=$row["nombre"];
			$_SESSION["apellidos"]=$row["apellidos"];
			$_SESSION["admin"]=$row["admin"];
			$_SESSION["fotos"]=$row["fotos"];
			$_SESSION["datos"]=$row["datos"];
			$_SESSION["otros"]=$row["otros"];

			$_SESSION["time"] = ( time() + 6000 );
			header("location:general.php");
			}
			else{

			header("location:index.php?e=1");
			}


	mysqli_free_result($result);
}else{
	header("location:index.php?e=2");
}
mysqli_close($link);

?>
