<?php
		$dir_raiz="http://localhost//discoverushuaia/admin/";

@session_start();


	if ($_SESSION['time'] > time()) {
	//include("index.php");
	}
	else {
		$error=$_GET['e'];
		if($error==1){$msj='Password incorrecto';}
		if($error==2){$msj='Debe especificar un usuario y password';}


/* Cerramos la parte de codigo PHP porque vamos a escribir bastante HTML y nos será mas cómodo así que metiendo echo's */


if(isset($_POST['submit']) and $_POST['login']=="discover" and $_POST['pass']=="posnet"){
	header("Location: posnet/index.php");
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
</style>
</head>
<body class="page-heading">
<img src="img/logo_blanco.png" alt="Rent a Car" width="200" height="61" class="logo-fixed" /></a> </div></div>
<div id="main_container">

	<div class="header_login">
    <div class="logo">

    </div>

    </div>
      <p>'</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>

         <div class="login_form">

         <h3>Sistema de pagos</h3>
         <?php echo $msj?>


         <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="niceform">

                <fieldset>
                    <dl>
                        <dt>
                          <label for="user">Usuario:</label></dt>
                        <dd><input type="text" name="login" id="" size="40" /></dd>
                    </dl>
                    <dl>
                        <dt><label for="password">Password:</label></dt>
                        <dd><input type="password" name="pass" id="" size="40" /></dd>
                    </dl>

                    <dl>
                        <dt><label></label></dt>

                    </dl>

                     <dl class="submit">
                    <input type="submit" name="submit" id="submit" value="Enter" />
                     </dl>

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
