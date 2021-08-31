<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<?php
@session_start();

 if ( $_SESSION['time'] < time() )
 {
 	@session_destroy();
 	include"index.php";
 }
 elseif(
 	$_SESSION['admin']!='si'){header("location:general.php");
 }
 else{
 			$_SESSION['time'] = ( time() + 1800 );
 			include("../conex.php");
			include("../db.php");
			$el_directorio= "http://".$_SERVER['HTTP_HOST']."/uxm";
			$vdir = db_dir();
			$vusr = db_usr();
			$vpass = db_pass();
			$vbase = db_base();
			$link=Conectarse( $vdir, $vusr, $vpass, $vbase);	
			
						function corta($texto,$tamano) {
//			$texto = htmlspecialchars($texto);
			if (strlen($texto) > $tamano) {
			$texto = substr($texto, 0, $tamano);
			$texto .= " ...";
			}
			return $texto;
			} 

			function cambios($texto) {
			$logoimg="<img src=&quot;http://".$_SERVER['HTTP_HOST']."/uxm/images/logotxt.jpg&quot;>";
			$texto = str_replace("/logouxm","$logoimg",$texto);		

			
			return $texto;
			} 
?>


<?php
			
echo"<link href='$el_directorio/css/dhtmlgoodies_calendar.css?random=20051112' type='text/css' rel='stylesheet'  media='screen'></link>
	 <link href='$el_directorio/css/default.css' rel='stylesheet' type='text/css'>";

echo"<SCRIPT src='$el_directorio/javascript/dhtmlgoodies_calendar.js?random=20060118' type='text/javascript' ></script>";



?>
	<link rel="stylesheet" href="<?php echo"$el_directorio";?>/css/tab-view.css" type="text/css" media="screen">
	<script type="text/javascript" src="<?php echo"$el_directorio";?>/javascript/tab-view.js"></script>	
<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
}
.fondo {
	background-image: url(imagenes/fondo_panel.jpg);
	background-repeat: repeat-x;
}
.style1 {
	font-size: 12px;
	font-weight: bold;
}
-->
</style>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<script LANGUAGE="javascript">
function oculta(id){
 document.getElementById(id).style.display = "none";
}
function muestra(id){
 document.getElementById(id).style.display = "block";

}
</script>


              <?php
			  
			  $Hoy=date("Y-m-d");
	$page=$_GET['page']; //champ NUM
	list($page2,$resto)=explode("-","$page");
	$raiz= "admin/";
	?>
              <style type="text/css">
<!--
.a1 {
	padding: 10px;
}
a.a1 {
	padding: 10px;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
              </style>
    </head>
 <body>          
	
<table width="100%" height="100%"  border="0" cellpadding="0" cellspacing="0" class="fondo">
  <tr>
    <td valign="top"><table width="760" height="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
      <tr bgcolor="#CCCCCC" background="imagenes/fondo_panel.jpg">
        <td height="97" colspan="2" valign="top"><img src="imagenes/navegacion.jpg" width="750" height="97" border="0" usemap="#MapMap"></td>
      </tr>
      <tr bgcolor="#CCCCCC">
        <td width="200" valign="top" background="imagenes/articulos.jpg" bgcolor="#DCDCDC"><blockquote>
          <p class="style1"><a href="general.php">GENERAL</a></p>
          <p class="style1"><a href="admin.php?page=configuracion-e">CONFIGURACION</a></p>
          <p class="style1"><a href="admin.php?page=editminamin">EDITAR MIN A MIN</a></p>
          <p class="style1"><a href="admin.php?page=editjugadas">EDITAR JUGADAS </a></p>
          <p class="style1"><a href="admin.php?page=editmsj">MENSAJES</a></p>
          <p class="style1"><a href='#' onClick="MM_openBrWindow('edit/backup.php', 'UnidosPorElMate', 'scrollbars=yes,width=350,height=250')">HACER BACKUP</a></p>
          <p class="style1"><a href="<?php echo"$el_directorio";?>/order-home-base.php" target='_blank'>ORDER HOME</a></p>
<p></blockquote>

			<?php
			$var1="Order";
			$var2="order";
			if($page2==$var2){$style='';}else{$style="style='display:none'";}
			echo"<blockquote><p align='left' class='style1'>";
			echo"<a id='mostrar-$var2' style='cursor: pointer;' onclick='oculta(\"mostrar-$var2\");muestra(\"$var2\");muestra(\"ocultar-$var2\")'>$var1 +</a>
	<a id='ocultar-$var2' style='cursor: pointer; display:none' onclick='oculta(\"$var2\");muestra(\"mostrar-$var2\");oculta(\"ocultar-$var2\")'>$var1 -</a>";
			echo"</p></blockquote>";
			
			echo"<ul id='$var2'  $style>
              <li><a href='admin.php?page=$var2-n'>Nuevo $var1 </a></li>
              <li><a href='admin.php?page=$var2-e'>Editar $var1 </a></li>
              <li><a href='admin.php?page=$var2-b'>Borrar $var1 </a></li>
            </ul>";
			?>
			
						<?php
			$var1="Noticias";
			$var2="nota";
			if($page2==$var2){$style='';}else{$style="style='display:none'";}
			echo"<blockquote><p align='left' class='style1'>";
			echo"<a id='mostrar-$var2' style='cursor: pointer;' onclick='oculta(\"mostrar-$var2\");muestra(\"$var2\");muestra(\"ocultar-$var2\")'>$var1 +</a>
	<a id='ocultar-$var2' style='cursor: pointer; display:none' onclick='oculta(\"$var2\");muestra(\"mostrar-$var2\");oculta(\"ocultar-$var2\")'>$var1 -</a>";
			echo"</p></blockquote>";
			
			echo"<ul id='$var2'  $style>
              <li><a href='admin.php?page=$var2-n'>Nuevo $var1 </a></li>
              <li><a href='admin.php?page=$var2-e'>Editar $var1 </a></li>
              <li><a href='admin.php?page=$var2-b'>Borrar $var1 </a></li>
            </ul>";
			?>
			  
			<?php
			$var1="Breves";
			$var2="breve";
			if($page2==$var2){$style='';}else{$style="style='display:none'";}
			echo"<blockquote><p align='left' class='style1'>";
			echo"<a id='mostrar-$var2' style='cursor: pointer;' onclick='oculta(\"mostrar-$var2\");muestra(\"$var2\");muestra(\"ocultar-$var2\")'>$var1 +</a>
	<a id='ocultar-$var2' style='cursor: pointer; display:none' onclick='oculta(\"$var2\");muestra(\"mostrar-$var2\");oculta(\"ocultar-$var2\")'>$var1 -</a>";
			echo"</p></blockquote>";
			
			echo"<ul id='$var2'  $style>
              <li><a href='admin.php?page=$var2-n'>Nuevo $var1 </a></li>
              <li><a href='admin.php?page=$var2-e'>Editar $var1 </a></li>
              <li><a href='admin.php?page=$var2-b'>Borrar $var1 </a></li>
            </ul>";
			?>
			
			<?php
			$var1="Video";
			$var2="video";
			if($page2==$var2){$style='';}else{$style="style='display:none'";}
			echo"<blockquote><p align='left' class='style1'>";
			echo"<a id='mostrar-$var2' style='cursor: pointer;' onclick='oculta(\"mostrar-$var2\");muestra(\"$var2\");muestra(\"ocultar-$var2\")'>$var1 +</a>
	<a id='ocultar-$var2' style='cursor: pointer; display:none' onclick='oculta(\"$var2\");muestra(\"mostrar-$var2\");oculta(\"ocultar-$var2\")'>$var1 -</a>";
			echo"</p></blockquote>";
			
			echo"<ul id='$var2'  $style>
              <li><a href='admin.php?page=$var2-n'>Nuevo $var1 </a></li>
              <li><a href='admin.php?page=$var2-e'>Editar $var1 </a></li>
              <li><a href='admin.php?page=$var2-b'>Borrar $var1 </a></li>
            </ul>";
			?>
            
			<?php
			$var1="Bloquear Acceso";
			$var2="ip";
			if($page2==$var2){$style='';}else{$style="style='display:none'";}
			echo"<blockquote><p align='left' class='style1'>";
			echo"<a id='mostrar-$var2' style='cursor: pointer;' onclick='oculta(\"mostrar-$var2\");muestra(\"$var2\");muestra(\"ocultar-$var2\")'>$var1 +</a>
	<a id='ocultar-$var2' style='cursor: pointer; display:none' onclick='oculta(\"$var2\");muestra(\"mostrar-$var2\");oculta(\"ocultar-$var2\")'>$var1 -</a>";
			echo"</p></blockquote>";
			
			echo"<ul id='$var2'  $style>
              <li><a href='admin.php?page=$var2-n'>Nuevo $var1 </a></li>
              <li><a href='admin.php?page=$var2-b'>Borrar $var1 </a></li>
            </ul>";
			?>
 
						<?php
			$var1="Comentarios";
			$var2="comentario";
			if($page2==$var2){$style='';}else{$style="style='display:none'";}
			echo"<blockquote><p align='left' class='style1'>";
			echo"<a id='mostrar-$var2' style='cursor: pointer;' onclick='oculta(\"mostrar-$var2\");muestra(\"$var2\");muestra(\"ocultar-$var2\")'>$var1 +</a>
	<a id='ocultar-$var2' style='cursor: pointer; display:none' onclick='oculta(\"$var2\");muestra(\"mostrar-$var2\");oculta(\"ocultar-$var2\")'>$var1 -</a>";
			echo"</p></blockquote>";
			
			echo"<ul id='$var2'  $style>
              <li><a href='admin.php?page=comentarios&t=borrar'>Borrar $var1 </a></li>
              <li><a href='admin.php?page=comentarios&t=edit'>Editar $var1 </a></li>
            </ul>";
			?>
 
			<?php
			$var1="Secciones";
			$var2="seccion";
			if($page2==$var2){$style='';}else{$style="style='display:none'";}
			echo"<blockquote><p align='left' class='style1'>";
			echo"<a id='mostrar-$var2' style='cursor: pointer;' onclick='oculta(\"mostrar-$var2\");muestra(\"$var2\");muestra(\"ocultar-$var2\")'>$var1 +</a>
	<a id='ocultar-$var2' style='cursor: pointer; display:none' onclick='oculta(\"$var2\");muestra(\"mostrar-$var2\");oculta(\"ocultar-$var2\")'>$var1 -</a>";
			echo"</p></blockquote>";
			
			echo"<ul id='$var2'  $style>
              <li><a href='admin.php?page=$var2-e'>Editar $var1 </a></li>
            </ul>";
			?>

			<?php
			$var1="Encuesta";
			$var2="encuesta";
			if($page2==$var2){$style='';}else{$style="style='display:none'";}
			echo"<blockquote><p align='left' class='style1'>";
			echo"<a id='mostrar-$var2' style='cursor: pointer;' onclick='oculta(\"mostrar-$var2\");muestra(\"$var2\");muestra(\"ocultar-$var2\")'>$var1 +</a>
	<a id='ocultar-$var2' style='cursor: pointer; display:none' onclick='oculta(\"$var2\");muestra(\"mostrar-$var2\");oculta(\"ocultar-$var2\")'>$var1 -</a>";
			echo"</p></blockquote>";
			
			echo"<ul id='$var2'  $style>
              <li><a href='admin.php?page=$var2-n'>Nueva $var1 </a></li>
              <li><a href='admin.php?page=$var2-e'>Editar $var1 </a></li>
              <li><a href='admin.php?page=$var2-b'>Borrar $var1 </a></li>
            </ul>";
			?>
                    	<?php
			$var1="Banners";
			$var2="banner";
			if($page2==$var2){$style='';}else{$style="style='display:none'";}
			echo"<blockquote><p align='left' class='style1'>";
			echo"<a id='mostrar-$var2' style='cursor: pointer;' onclick='oculta(\"mostrar-$var2\");muestra(\"$var2\");muestra(\"ocultar-$var2\")'>$var1 +</a>
	<a id='ocultar-$var2' style='cursor: pointer; display:none' onclick='oculta(\"$var2\");muestra(\"mostrar-$var2\");oculta(\"ocultar-$var2\")'>$var1 -</a>";
			echo"</p></blockquote>";
			
			echo"<ul id='$var2'  $style>
              <li><a href='admin.php?page=$var2-n'>Nueva $var1 </a></li>
              <li><a href='admin.php?page=$var2-e'>Editar $var1 </a></li>
              <li><a href='admin.php?page=$var2-b'>Borrar $var1 </a></li>
			  <br>
			  <li><a href='admin.php?page=$var2-rn'>Nueva $var1 rotativo</a></li>
              <li><a href='admin.php?page=$var2-re'>Editar $var1 rotativo</a></li>
              <li><a href='admin.php?page=$var2-rb'>Borrar $var1 rotativo</a></li>
            </ul>";
			?>
			
		  	<?php
			$var1="Plantel";
			$var2="plantel";
			if($page2==$var2){$style='';}else{$style="style='display:none'";}
			echo"<blockquote><p align='left' class='style1'>";
			echo"<a id='mostrar-$var2' style='cursor: pointer;' onclick='oculta(\"mostrar-$var2\");muestra(\"$var2\");muestra(\"ocultar-$var2\")'>$var1 +</a>
	<a id='ocultar-$var2' style='cursor: pointer; display:none' onclick='oculta(\"$var2\");muestra(\"mostrar-$var2\");oculta(\"ocultar-$var2\")'>$var1 -</a>";
			echo"</p></blockquote>";
			
			echo"<ul id='$var2'  $style>
              <li><a href='admin.php?page=$var2-n'>Nueva $var1 </a></li>
              <li><a href='admin.php?page=$var2-e'>Editar $var1 </a></li>
              <li><a href='admin.php?page=$var2-b'>Borrar $var1 </a></li>
			  <li><a href='admin.php?page=$var2-ep'>EDITAR x TEMPORADA</a></li>
            </ul>";
			?>
          
		  	<?php
			$var1="Ultimo Momento";
			$var2="marquee";
			if($page2==$var2){$style='';}else{$style="style='display:none'";}
			echo"<blockquote><p align='left' class='style1'>";
			echo"<a id='mostrar-$var2' style='cursor: pointer;' onclick='oculta(\"mostrar-$var2\");muestra(\"$var2\");muestra(\"ocultar-$var2\")'>$var1 +</a>
	<a id='ocultar-$var2' style='cursor: pointer; display:none' onclick='oculta(\"$var2\");muestra(\"mostrar-$var2\");oculta(\"ocultar-$var2\")'>$var1 -</a>";
			echo"</p></blockquote>";
			
			echo"<ul id='$var2'  $style>
              <li><a href='admin.php?page=$var2-n'>Nueva $var1 </a></li>
              <li><a href='admin.php?page=$var2-e'>Editar $var1 </a></li>
              <li><a href='admin.php?page=$var2-b'>Borrar $var1 </a></li>
            </ul>";
			?>
			
          	<?php
			$var1="InfoAscenso";
			$var2="ascenso";
			if($page2==$var2){$style='';}else{$style="style='display:none'";}
			echo"<blockquote><p align='left' class='style1'>";
			echo"<a id='mostrar-$var2' style='cursor: pointer;' onclick='oculta(\"mostrar-$var2\");muestra(\"$var2\");muestra(\"ocultar-$var2\")'>$var1 +</a>
	<a id='ocultar-$var2' style='cursor: pointer; display:none' onclick='oculta(\"$var2\");muestra(\"mostrar-$var2\");oculta(\"ocultar-$var2\")'>$var1 -</a>";
			echo"</p></blockquote>";
			
			echo"<ul id='$var2'  $style>
              <li><a href='admin.php?page=$var2-n'>Nueva $var1 </a></li>
              <li><a href='admin.php?page=$var2-e'>Editar $var1 </a></li>
              <li><a href='admin.php?page=$var2-b'>Borrar $var1 </a></li>
            </ul>";
			?>
            <?php
			$var1="Historial";
			$var2="historial";
			if($page2==$var2){$style='';}else{$style="style='display:none'";}
			echo"<blockquote><p align='left' class='style1'>";
			echo"<a id='mostrar-$var2' style='cursor: pointer;' onclick='oculta(\"mostrar-$var2\");muestra(\"$var2\");muestra(\"ocultar-$var2\")'>$var1 +</a>
	<a id='ocultar-$var2' style='cursor: pointer; display:none' onclick='oculta(\"$var2\");muestra(\"mostrar-$var2\");oculta(\"ocultar-$var2\")'>$var1 -</a>";
			echo"</p></blockquote>";
			
			echo"<ul id='$var2'  $style>
              <li><a href='admin.php?page=historial-e'>Editar $var1 </a></li>
            </ul>";
			?>
			
          	<?php
			$var1="Efemerides";
			$var2="efemerides";
			if($page2==$var2){$style='';}else{$style="style='display:none'";}
			echo"<blockquote><p align='left' class='style1'>";
			echo"<a id='mostrar-$var2' style='cursor: pointer;' onclick='oculta(\"mostrar-$var2\");muestra(\"$var2\");muestra(\"ocultar-$var2\")'>$var1 +</a>
	<a id='ocultar-$var2' style='cursor: pointer; display:none' onclick='oculta(\"$var2\");muestra(\"mostrar-$var2\");oculta(\"ocultar-$var2\")'>$var1 -</a>";
			echo"</p></blockquote>";
			
			echo"<ul id='$var2'  $style>
              <li><a href='admin.php?page=$var2-n'>Nueva $var1 </a></li>
              <li><a href='admin.php?page=$var2-e'>Editar $var1 </a></li>
              <li><a href='admin.php?page=$var2-b'>Borrar $var1 </a></li>
            </ul>";
			?>
			          
          	<?php
			$var1="Fixture";
			$var2="fixture";
			if($page2==$var2){$style='';}else{$style="style='display:none'";}
			echo"<blockquote><p align='left' class='style1'>";
			echo"<a id='mostrar-$var2' style='cursor: pointer;' onclick='oculta(\"mostrar-$var2\");muestra(\"$var2\");muestra(\"ocultar-$var2\")'>$var1 +</a>
	<a id='ocultar-$var2' style='cursor: pointer; display:none' onclick='oculta(\"$var2\");muestra(\"mostrar-$var2\");oculta(\"ocultar-$var2\")'>$var1 -</a>";
			echo"</p></blockquote>";
			
			echo"<ul id='$var2'  $style>
              <li><a href='admin.php?page=$var2-e'>Editar $var1 </a></li>
            </ul>";
			?>
			
            <?php
			$var1="Partido";
			$var2="partido";
			if($page2==$var2){$style='';}else{$style="style='display:none'";}
			echo"<blockquote><p align='left' class='style1'>";
			echo"<a id='mostrar-$var2' style='cursor: pointer;' onclick='oculta(\"mostrar-$var2\");muestra(\"$var2\");muestra(\"ocultar-$var2\")'>$var1 +</a>
	<a id='ocultar-$var2' style='cursor: pointer; display:none' onclick='oculta(\"$var2\");muestra(\"mostrar-$var2\");oculta(\"ocultar-$var2\")'>$var1 -</a>";
			echo"</p></blockquote>";
			
			echo"<ul id='$var2'  $style>
			  <li><a href='admin.php?page=$var2-n'>Nuevo $var1 </a></li>
              <li><a href='admin.php?page=$var2-e&cond=13'>Editar $var1 </a></li>
			  <li><a href='admin.php?page=$var2-ef'>Formacion $var1 </a></li>
            </ul>";
			?>
			
			<?php
			$var1="ShoutBox";
			$var2="shoutbox";
			if($page2==$var2){$style='';}else{$style="style='display:none'";}
			echo"<blockquote><p align='left' class='style1'>";
			echo"<a id='mostrar-$var2' style='cursor: pointer;' onclick='oculta(\"mostrar-$var2\");muestra(\"$var2\");muestra(\"ocultar-$var2\")'>$var1 +</a>
	<a id='ocultar-$var2' style='cursor: pointer; display:none' onclick='oculta(\"$var2\");muestra(\"mostrar-$var2\");oculta(\"ocultar-$var2\")'>$var1 -</a>";
			echo"</p></blockquote>";
			
			echo"<ul id='$var2'  $style>
              <li><a href='admin.php?page=$var2-b'>Borrar $var1 </a></li>
            </ul>";
			?>

         	<?php
			$var1="Libro de Visitas";
			$var2="libro";
			if($page2==$var2){$style='';}else{$style="style='display:none'";}
			echo"<blockquote><p align='left' class='style1'>";
			echo"<a id='mostrar-$var2' style='cursor: pointer;' onclick='oculta(\"mostrar-$var2\");muestra(\"$var2\");muestra(\"ocultar-$var2\")'>$var1 +</a>
	<a id='ocultar-$var2' style='cursor: pointer; display:none' onclick='oculta(\"$var2\");muestra(\"mostrar-$var2\");oculta(\"ocultar-$var2\")'>$var1 -</a>";
			echo"</p></blockquote>";
			
			echo"<ul id='$var2'  $style>
              <li><a href='admin.php?page=$var2-b'>Borrar $var1 </a></li>
            </ul>";
			?>
			
			<?php
			$var1="Remplazos";
			$var2="reemplazo";
			if($page2==$var2){$style='';}else{$style="style='display:none'";}
			echo"<blockquote><p align='left' class='style1'>";
			echo"<a id='mostrar-$var2' style='cursor: pointer;' onclick='oculta(\"mostrar-$var2\");muestra(\"$var2\");muestra(\"ocultar-$var2\")'>$var1 +</a>
	<a id='ocultar-$var2' style='cursor: pointer; display:none' onclick='oculta(\"$var2\");muestra(\"mostrar-$var2\");oculta(\"ocultar-$var2\")'>$var1 -</a>";
			echo"</p></blockquote>";
			
			echo"<ul id='$var2'  $style>
              <li><a href='admin.php?page=$var2-n'>Crear $var1 </a></li>
              <li><a href='admin.php?page=$var2-b'>Borrar $var1 </a></li>
            </ul>";
			?>
           
			<?php
			$var1="Links/Fotologs";
			$var2="links";
			if($page2==$var2){$style='';}else{$style="style='display:none'";}
			echo"<blockquote><p align='left' class='style1'>";
			echo"<a id='mostrar-$var2' style='cursor: pointer;' onclick='oculta(\"mostrar-$var2\");muestra(\"$var2\");muestra(\"ocultar-$var2\")'>$var1 +</a>
	<a id='ocultar-$var2' style='cursor: pointer; display:none' onclick='oculta(\"$var2\");muestra(\"mostrar-$var2\");oculta(\"ocultar-$var2\")'>$var1 -</a>";
			echo"</p></blockquote>";
			
			echo"<ul id='$var2'  $style>
              <li><a href='admin.php?page=$var2-n'>Nueva $var1 </a></li>
              <li><a href='admin.php?page=$var2-e'>Editar $var1 </a></li>
              <li><a href='admin.php?page=$var2-b'>Borrar $var1 </a></li>
            </ul>";
			?>
			
			<?php
			$var1="Pics";
			$var2="subirpic";
			if($page2==$var2){$style='';}else{$style="style='display:none'";}
			echo"<blockquote><p align='left' class='style1'>";
			echo"<a id='mostrar-$var2' style='cursor: pointer;' onclick='oculta(\"mostrar-$var2\");muestra(\"$var2\");muestra(\"ocultar-$var2\")'>$var1 +</a>
	<a id='ocultar-$var2' style='cursor: pointer; display:none' onclick='oculta(\"$var2\");muestra(\"mostrar-$var2\");oculta(\"ocultar-$var2\")'>$var1 -</a>";
			echo"</p></blockquote>";
			
			echo"<ul id='$var2'  $style>
              <li><a href='admin.php?page=$var2'>Subir $var1 </a></li>
            </ul>";
			?>
           	<?php
			$var1="Cuadros";
			$var2="cuadros";
			if($page2==$var2){$style='';}else{$style="style='display:none'";}
			echo"<blockquote><p align='left' class='style1'>";
			echo"<a id='mostrar-$var2' style='cursor: pointer;' onclick='oculta(\"mostrar-$var2\");muestra(\"$var2\");muestra(\"ocultar-$var2\")'>$var1 +</a>
	<a id='ocultar-$var2' style='cursor: pointer; display:none' onclick='oculta(\"$var2\");muestra(\"mostrar-$var2\");oculta(\"ocultar-$var2\")'>$var1 -</a>";
			echo"</p></blockquote>";
			
			echo"<ul id='$var2'  $style>
              <li><a href='admin.php?page=$var2-n'>Nueva $var1 </a></li>
              <li><a href='admin.php?page=$var2-e'>Editar $var1 </a></li>
              <li><a href='admin.php?page=$var2-b'>Borrar $var1 </a></li>
            </ul>";
			?>
			<?php
			$var1="Estadisticas";
			$var2="estadisticas";
			if($page2==$var2){$style='';}else{$style="style='display:none'";}
			echo"<blockquote><p align='left' class='style1'>";
			echo"<a id='mostrar-$var2' style='cursor: pointer;' onclick='oculta(\"mostrar-$var2\");muestra(\"$var2\");muestra(\"ocultar-$var2\")'>$var1 +</a>
	<a id='ocultar-$var2' style='cursor: pointer; display:none' onclick='oculta(\"$var2\");muestra(\"mostrar-$var2\");oculta(\"ocultar-$var2\")'>$var1 -</a>";
			echo"</p></blockquote>";
			
			echo"<ul id='$var2'  $style>
              <li><a href='http://www.ademails.com/visitas.php3?ID=242991&Seg=a6ff790fa62debc978e97b38b147daaa&IDUrl=1059913619&nocache=1157416645' target='_blank'>Ver estadisticas</a></li>
              <li><a href='http://www.comunidad-x.com.ar/estadisticas/index.php' target='_blank'>VER TIPO AVANZADO </a>
           <p align='center'>(user: unidos / pass: losmates1) </li></ul> </p>";
			?>

            </td>
        <td width="560" height="100%" valign="top" bgcolor="#FFFFFF" class="a1"><?php
        if($page)
		 { include ("$raiz$page.php"); }
		else
		 { include ("edit/home.php"); }
		 ?></td>
      </tr>
      <tr bgcolor="#CCCCCC">
        <td valign="top" background="imagenes/articulos.jpg" bgcolor="#DCDCDC"><img src="imagenes/administracion.jpg" width="210" height="44"></td>
        <td valign="top" bgcolor="#FFFFFF" class="a1">&nbsp;</td>
      </tr>
    </table>
      <map name="MapMap">
        <area shape="rect" coords="680,59,731,82" href="logout.php">
      </map></td>
  </tr>
</table>


<?php
}?>
  </body>
</html>