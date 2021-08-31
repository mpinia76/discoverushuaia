<?php
		$dir_raiz="http://localhost//discoverushuaia/admin/";

@session_start();


switch ($_GET['p']) {
		case 2:
			$_SESSION['idioma']='es';
			include("messages_es.php");
		break;
		case 3:
			$_SESSION['idioma']='po';
			include("messages_po.php");
		break;
		case 4:
			$_SESSION['idioma']='en';
			include("messages_en.php");
		break;
		default:
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
		break;
	}



	if ($_SESSION['time'] > time()) {
	//include("index.php");
	}
	else {
		$error=$_GET['e'];
		if($error==1){$msj='Password incorrecto';}
		if($error==2){$msj='Debe especificar un usuario y password';}


/* Cerramos la parte de codigo PHP porque vamos a escribir bastante HTML y nos será mas cómodo así que metiendo echo's */


if(isset($_POST['submit'])){
	include("conex.php");
	include("db.php");
	$dbh2 = mysqli_connect(db_dir_gestion(), db_usr_gestion(), db_pass_gestion(), db_base_gestion());
	//mysql_select_db(db_base_gestion(), $dbh2);
	$laSQL = "SELECT R.id FROM  reservas R INNER JOIN clientes C ON R.cliente_id = C.id WHERE R.numero = ".$_POST['nro_reserva']." AND
	(C.nombre_apellido = '%".$_POST['nombre']."%' OR C.nombre_apellido LIKE '%".$_POST['apellido']."%')";
	$result = mysqli_query($dbh2,$laSQL);
	if(mysqli_affected_rows($link)>0){
		if ($rowL = mysqli_fetch_array($result)) {
			header("Location: discoverpay_".$rowL['id'].".html");
		}
	}
	else{
		$msj = DATOS_ERRONEOS;
	}

}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Discover Rent a Car</title>
<link rel="stylesheet" type="text/css" href="<?php echo $dir_raiz?>css/style.css" />

<link rel="stylesheet" type="text/css" media="all" href="<?php echo $dir_raiz?>css/niceforms-default.css" />

<style type="text/css">
.page-heading {
              background-color: #2a9ed9;
			  background-image: url(http://localhost//discoverushuaia/tienda/wp-content/uploads/2016/09/bg-home-v3-b-1.jpg);
			  background-size: cover;
			  background-repeat: no-repeat;
			  color:#fff;
			  }

        IMG.HoverBorder {border:1px solid #eee;}
        IMG.HoverBorder:hover {border:1px solid #555;}

/*===============================
=            Buttons            =
===============================*/
button,
html input[type="button"],
input[type="reset"],
input[type="submit"] {
  -webkit-appearance: button;
  /* 2 */
  cursor: pointer;
  /* 3 */
}
.button,
.btn,
input[type="submit"] {
  display: inline-block;
  -webkit-border-radius: 0;
          border-radius: 0;
  border: 1px solid #f2f2f2;
  color: #000000;
  text-transform: uppercase;
  font-size: 0.79rem;
  font-weight: 700;
  letter-spacing: 1px;
  text-align: center;
  padding: 0 1.95em;
  height: 2.642rem;
  line-height: 2.5rem;
  background-color: #2a9ed9!important;
  -webkit-transition: all 0.2s linear;
  transition: all 0.2s linear;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}
.button:hover,
.btn:hover,
input[type="submit"]:hover {
  color: #ffffff;
  border-color: #000000;
  opacity: .8!important;
  background-color: #000000;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}
.button:focus,
.btn:focus,
input[type="submit"]:focus {
  color: #000000;
  outline: none;
}
.button:focus:hover,
.btn:focus:hover,
input[type="submit"]:focus:hover {
  color: white;
  outline: none;
}
.button.active,
.btn.active,
input[type="submit"].active {
  color: white;
}
.button.active:hover,
.btn.active:hover,
input[type="submit"].active:hover {
  background-color: black;
  color: white;
  border-color: black;
}
.button.active:focus,
.btn.active:focus,
input[type="submit"].active:focus {
  color: white;
}

</style>
</head>
<body class="page-heading">
<img src="img/logo_blanco.png" alt="Rent a Car" width="200" height="61" class="logo-fixed" /></a> </div></div>
<div id="main_container">

	<div class="header_login">
    <div class="logo">

    </div>

    </div>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>

         <div class="login_form">

         <h3><?php echo utf8_encode(DISCOVER_PAY); ?></h3>



         <form action="discoverpayerror.html" method="post" class="niceform">

                <fieldset>
                <center><span style="color:red;"><?php echo utf8_encode($msj)?></span></center>
                    <?php
                    if ($_GET['p']==1) {
                    	include("idiomas.php");
                    }
                    else{
                    	include("loginDatos.php");
                    }


                    ?>


                </fieldset>

         </form>
         </div>



    <div class="footer_login">


    	</div><div class="right_footer_login"></div>

    </div>

</div>
</body>
</html>

<?php
}
	exit;
?>
