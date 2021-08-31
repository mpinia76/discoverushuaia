<?php
@session_start();

 if ( $_SESSION['time'] < time() )
 {@session_destroy();include"index.php";}
 else{
	  	$_SESSION['time'] = ( time() + 1800 );
	 	$page=$_GET['page'];
		$dir_raiz="http://localhost//discoverushuaia/admin/";


		include("conex.php");
		include("db.php");

		$vdir = db_dir();
		$vusr = db_usr();
		$vpass = db_pass();
		$vbase = db_base();
		$link=Conectarse( $vdir, $vusr, $vpass, $vbase);

	 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="http://localhost//discoverushuaia/admin/" />

<?php header('Content-Type: text/html; charset=ISO-8859-1'); ?>
<title>PANEL DE ADMINISTRACION | Discover Rent Car</title>

<link rel="stylesheet" type="text/css" href="<?php echo $dir_raiz?>css/style.css" />
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js" charset="utf-8"></script>

<link type="text/css" rel="stylesheet" href="wisiwyg/jquery-te-1.4.0.css">

<script type="text/javascript" src="wisiwyg/jquery-te-1.4.0.min.js" charset="utf-8"></script>

</head>
<body >
<div id="main_container">

	<div class="header">
    <div class="logo"></div>

    <div class="right_header">Bienvenido <?php echo $_SESSION['nombre']?> | <a href="#" class="messages">() Mensajes</a> | <a href="<?php echo $dir_raiz?>logout.php" class="logout">Logout</a></div>
    </div>

    <div class="main_content">

                    <div class="menu">
                    <ul>
                    <li><a class="current" href="<?php echo $dir_raiz?>index.php">Admin Home</a></li>
                    </ul>
                    </div>




    <div class="center_content">



    <div class="left_content">
      <div class="sidebarmenu">
  <?php include ("sidebarmenu.php"); ?>
          </div>
    </div>

    <div class="right_content">

<?php
        if($page)
		 { include ("pages/".$page.".php"); }
		else
		 {
		 echo"<div align='center' >Bievenido a su Panel de Administracion</div>";

		 }
		 ?>



     </div><!-- end of right content-->


  </div>   <!--end of center content -->




    <div class="clear"></div>
    </div> <!--end of main content-->


    <div class="footer">

    	<div class="left_footer">Panel de Administraci&oacute;n</div>
    	<div class="right_footer"></div>

    </div>

</div>
<script>
	$('.jqte-test').jqte();

	// settings of status
	var jqteStatus = true;
	$(".status").click(function()
	{
		jqteStatus = jqteStatus ? false : true;
		$('.jqte-test').jqte({"status" : jqteStatus})
	});
</script>
</body>
</html>




	<?php }?>
