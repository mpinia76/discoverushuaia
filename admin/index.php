<?php
		$dir_raiz="http://localhost//discoverushuaia/admin/";

@session_start();


	if ($_SESSION['time'] > time()) {
	include("general.php");
	}
	else {
		$error=$_GET['e'];
		if($error==1){$msj='Password incorrecto';}
		if($error==2){$msj='Debe especificar un usuario y password';}


/* Cerramos la parte de codigo PHP porque vamos a escribir bastante HTML y nos será mas cómodo así que metiendo echo's */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PANEL DE ADMINISTRACION | Discover Rent Car</title>
<link rel="stylesheet" type="text/css" href="<?php echo $dir_raiz?>css/style.css" />

<link rel="stylesheet" type="text/css" media="all" href="<?php echo $dir_raiz?>css/niceforms-default.css" />

</head>
<body>
<div id="main_container">

	<div class="header_login">
    <div class="logo">

    </div>

    </div>
      <p>'</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>

         <div class="login_form">

         <h3>Panel de Administracion</h3>
         <?php echo $msj?>
         <a href="#" class="forgot_pass">Recuperar password</a>

         <form action="<?php echo $dir_raiz?>comprueba.php" method="post" class="niceform">

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
                        <dd>
                    <input type="checkbox" name="interests[]" id="" value="" /><label class="check_label">Recordar usuario</label>
                        </dd>
                    </dl>

                     <dl class="submit">
                    <input type="submit" name="submit" id="submit" value="Enter" />
                     </dl>

                </fieldset>

         </form>
         </div>



    <div class="footer_login">

    	<div class="left_footer_login">Panel de Administración
    	</div><div class="right_footer_login"></div>

    </div>

</div>
</body>
</html>

<?php
}
	exit;
?>
