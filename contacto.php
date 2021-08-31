<style>

 .form-barra
 {display:none}
#gmap{
left: 0;
position: absolute !important;
width: 100%;
height:70%;
z-index: 0;
top:100px;} /* One increment smaller than the z-index of container */

#container{
margin: 0 auto;
overflow: visible !important;
position: relative;
top: -35px;
width: 500px;
z-index: 2;
float:left } /* One increment larger than the Google Maps z-index of iframe */

</style>
<div class="page-heading" style="height:100px;padding-top: 4px;padding-bottom: 20px;">
</div>

<div class="container content-page container-contacto" align="center">

<iframe id="gmap" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d4599.090046188452!2d-68.307355!3d-54.80553900000001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xbc4c23206c5b8887%3A0xe4dfa0b392f22dab!2s25+de+Mayo+260%2C+V9410DFF+Ushuaia%2C+Tierra+del+Fuego%2C+Argentina!5e0!3m2!1ses!2sar!4v1476537668973" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" width="425" height="350"></iframe>

<div id="container" class="container-contacto"><div dir="ltr" style="text-align: left;" trbidi="on">
<br /></div>
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
<div style="background:#FFF; padding:10px; text-align:left; font-size:11px;box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
" class="col-md-12"><h5><?php echo utf8_encode(DONDE_ESTAMOS);?></h5>

<div class="vc_col-sm-6"><i class="fa fa-map-marker" aria-hidden="true"></i> USHUAIA<br>25 de Mayo 260 2° 9<br>Ushuaia, Tierra del Fuego, Argentina (9410) <br>Tel. (54) 2901 425337</div>
<div class="vc_col-sm-6"><i class="fa fa-map-marker" aria-hidden="true"></i> BUENOS AIRES<br><?php echo utf8_encode(OFICINA_RESERVAS);?><br>
CABA, Argentina (1107)<br>
Tel. (54) 11 52547702 <br>
0810-345-5002 <?php echo utf8_encode(SOLO_DESDE);?> CABA
</div>
</div>
<p>&nbsp;<p>

<form action="gracias-contacto-alquiler-de-autos-en-ushuaia.html" method="post" name="contact-form" style="background-color:#FFF;box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3); padding:20px; text-align:left" class="contact-form">
<h5><?php echo utf8_encode(CONSULTA_POR_ALQUILER);?></h5><p></p>
                    	<?php
/*$laSQL = "SELECT * FROM  Locales order by Nombre asc";
$result = mysqli_query($link,$laSQL);*/
$dbh2 = mysqli_connect(db_dir_gestion(), db_usr_gestion(), db_pass_gestion(), db_base_gestion());
//mysql_select_db(db_base_gestion(), $dbh2);
$laSQL = "SELECT * FROM  lugars WHERE activo = 1 order by lugar asc";
$result = mysqli_query($dbh2,$laSQL);
$i=1;
			while ($rowL = mysqli_fetch_array($result)) {
				$Id=$rowL['id'];
				$Locales[$Id]=$rowL['lugar'];
				if (isset($_SESSION['idioma'])) {
					switch ($_SESSION['idioma']) {
						case 'es':

							$Nombre=$rowL['lugar'];

						break;
						case 'po':
							$Nombre=$rowL['lugar_portugues'];
						break;
						case 'en':

							$Nombre=$rowL['lugar_ingles'];
						break;

					}

				}
				else{
					$Nombre=$rowL['lugar'];
				}

			}


$auto=$_POST['auto'];
$local=$_POST['local'];
$retiro=$_POST['retiro'];
$devolucion=$_POST['devolucion'];
$nombre=$_POST['nombre'];
$email=$_POST['email'];
$telefono=$_POST['telefono'];

$localret=$_POST['localret'];
$localdev=$_POST['localdev'];
$auto=$_POST['auto'];

if($auto){
    for ($i=0;$i<count($auto);$i++)
    {
        $autos.= $auto[$i]." - ";
    }
}

$retiro=$_POST['retiro'];
/*$parts = explode('/',$retiro);
$retiro = $parts[1] . '/' . $parts[0] . '/' . $parts[2];*/

$devolucion=$_POST['devolucion'];
/*$parts = explode('/',$devolucion);
$devolucion = $parts[1] . '/' . $parts[0] . '/' . $parts[2];*/

$HoraRetiro=$_POST['HoraRetiro'];
$HoraDevolucion=$_POST['HoraDevolucion'];
$mensaje=$_POST['mensaje'];

//if($_POST['enviarform']){
if(($_POST['enviarform'])&&($_POST['nombre']!='')&&($_POST['email']!='')&&($_POST['telefono']!='')&&($_POST['auto']!='')
&&($_POST['retiro']!='')&&($_POST['devolucion']!='')&&($_POST['HoraRetiro']!='')&&($_POST['HoraDevolucion']!='')){
$cuerpo = "Ip:".$_SERVER['REMOTE_ADDR'] . "<p>";
$cuerpo .= utf8_encode(NOMBRE).": ".$nombre."<br>";
$cuerpo .= "Email: ".$email."<br>";
$cuerpo .= utf8_encode(TELEFONO).": ".$telefono."<p>";

$cuerpo .= utf8_encode(CATEGORIA).": ".$autos."<br>";
$cuerpo .= "<p><strong>".utf8_encode(RETIRO)."</strong><br>".utf8_encode(LUGAR).": $Locales[$localret]<br>".utf8_encode(DIA).": $retiro<br>".utf8_encode(HORA).": $HoraRetiro<br>";

$cuerpo .= "<p><strong>".utf8_encode(DEVOLUCION)."</strong><br>".utf8_encode(LUGAR).": $Locales[$localdev]<br>".utf8_encode(DIA).": $devolucion<br>".utf8_encode(HORA).": $HoraDevolucion<p>";

$cuerpo .= utf8_encode(COMENTARIO).": ".$mensaje."<p>";

$cuerpo .= utf8_encode(ENVIADO_EL)." ".date("d-m-Y")." ".utf8_encode(A_LAS)." ".date("H:i")."<p>";


$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Cabeceras adicionales
$cabeceras .= 'To: Discover Rent Car<info@discoverushuaia.com.ar>' . "\r\n";
$cabeceras .= "From: $nombre <" . $email . ">" . "\r\n";

$nombreFile = date('Ymd') . '_log';
 $dt = date('Y-m-d G:i:s');

 $_Log = fopen("logs/" . $nombreFile . ".log", "a+") or die("Operation Failed!");

 fputs($_Log, $dt . " --> Asunto: Formulario de retiro para el ".$retiro . "; Cuerpo: " . $cuerpo ."\n");

 fclose($_Log);


@mail("info@discoverushuaia.com.ar", "Formulario de retiro para el $retiro", $cuerpo, $cabeceras);

echo"<h3>".utf8_encode(SU_MENSAJE_FUE_ENVIADO)."</h3>";

}else{
if (($_POST['enviarform'])&&(($_POST['nombre']=='')||($_POST['email']=='')||($_POST['telefono']=='')||($_POST['auto']=='')||($_POST['retiro']=='')||($_POST['devolucion']=='')||($_POST['HoraRetiro']=='')||($_POST['HoraDevolucion']==''))){
	echo '<div id="mensaje" style="color:red">'.utf8_encode(CAMPOS_OBLIGATORIOS_CONTACTO).'</div>';
}

?>
<input class="contact-form-name" id="nombre" name="nombre" size="60" required value="<?php echo $_POST['nombre'];?>" type="text" placeholder="<?php echo utf8_encode(NOMBRE);?>"  />
<input class="contact-form-name" id="email" name="email" size="60" required value="<?php echo $_POST['email'];?>" type="text" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" title="mail@ejemplo.com" placeholder="Email" />
<input class="contact-form-name" id="telefono" name="telefono" required size="60" value="<?php echo $_POST['telefono'];?>" type="text" placeholder="<?php echo utf8_encode(TELEFONO);?>"  />

<?php echo utf8_encode(LUGAR_DE_RETIRO);?>:
<select name="localret"  style="width:100%; margin:2px 0px" required>
<?php
/*$laSQL = "SELECT * FROM  Locales order by Nombre asc";
$result = mysqli_query($link,$laSQL);*/
$dbh2 = mysqli_connect(db_dir_gestion(), db_usr_gestion(), db_pass_gestion(), db_base_gestion());
//mysql_select_db(db_base_gestion(), $dbh2);
$laSQL = "SELECT * FROM  lugars WHERE activo = 1 order by lugar asc";
$result = mysqli_query($dbh2,$laSQL);
$i=1;

while ($rowL = mysqli_fetch_array($result)) {

	$Id=$rowL['id'];

	if (isset($_SESSION['idioma'])) {
		switch ($_SESSION['idioma']) {
			case 'es':

				$Nombre=$rowL['lugar'];

			break;
			case 'po':
				$Nombre=$rowL['lugar_portugues'];
			break;
			case 'en':

				$Nombre=$rowL['lugar_ingles'];
			break;

		}

	}
	else{
		$Nombre=$rowL['lugar'];
	}


if($Id==$localret){$Locselected="selected";}else{$Locselected="";}
echo "<option value='".$Id."' ".$Locselected.">".$Nombre."</option>";

			}
			?></select>
<div class="col-md-12" style="margin:10px 0px; padding:0px">
<div class="vc_col-sm-6"><?php echo utf8_encode(DIA_RETIRO);?>:<br><input name="retiro" type="text" required  id="retiro" value="<?php echo $retiro?>"></div>

<div class="vc_col-sm-6"><?php echo utf8_encode(HORA_RETIRO);?><br><select name="HoraRetiro" id="HoraRetiro" required style="width:150px"><option value="" disabled selected><?php echo utf8_encode(ELEGIR);?></option>

<?php $start = "08:30";
$end = "22:00";

$tStart = strtotime($start);
$tEnd = strtotime($end);
$tNow = $tStart;

while($tNow <= $tEnd){
	$Hora=date("H:i",$tNow);
	if($Hora==$HoraRetiro){$Horselected="selected";}else{$Horselected="";}

  echo "<option value='$Hora' $Horselected>$Hora</option>";
  $tNow = strtotime('+30 minutes',$tNow);
}

?></select></div>
</div>
<br>
<?php echo utf8_encode(LUGAR_DE_DEVOLUCION);?>:
<select name="localdev" style="width:100%; margin:2px 0px" required><?php
$dbh2 = mysqli_connect(db_dir_gestion(), db_usr_gestion(), db_pass_gestion(), db_base_gestion());
//mysql_select_db(db_base_gestion(), $dbh2);
$laSQL = "SELECT * FROM  lugars WHERE activo = 1 order by lugar asc";
$result = mysqli_query($dbh2,$laSQL);
$i=1;

while ($rowL = mysqli_fetch_array($result)) {
	$Id=$rowL['id'];
	if (isset($_SESSION['idioma'])) {
		switch ($_SESSION['idioma']) {
			case 'es':

				$Nombre=$rowL['lugar'];

			break;
			case 'po':
				$Nombre=$rowL['lugar_portugues'];
			break;
			case 'en':

				$Nombre=$rowL['lugar_ingles'];
			break;

		}

	}
	else{
		$Nombre=$rowL['lugar'];
	}

if($Id==$localdev){$Locselected="selected";}else{$Locselected="";}
echo "<option value='".$Id."' ".$Locselected.">".$Nombre."</option>";

			}
			?></select>

<div class="col-md-12" style="margin:10px 0px; padding:0px">
<div class="vc_col-sm-6"><?php echo utf8_encode(DIA_DEVOLUCION);?>:<br><input name="devolucion" id="devolucion" type="text" required  value="<?php echo $devolucion?>"></div>

<div class="vc_col-sm-6"><?php echo utf8_encode(HORA_DEVOLUCION);?><br><select name="HoraDevolucion" id="HoraDevolucion" required style="width:150px"><option value="" disabled selected><?php echo utf8_encode(ELEGIR);?></option>
<?php $start = "08:30";
$end = "22:00";

$tStart = strtotime($start);
$tEnd = strtotime($end);
$tNow = $tStart;

while($tNow <= $tEnd){
	$Hora=date("H:i",$tNow);
	if($Hora==$HoraDevolucion){$Horselected="selected";}else{$Horselected="";}

  echo "<option value='$Hora' $Horselected>$Hora</option>";
  $tNow = strtotime('+30 minutes',$tNow);
}

?></select></div>
</div>

<?php echo utf8_encode(CATEGORIA_DE_AUTO);?>:<br>
<select name="auto[]" required multiple="multiple" class="SlectBox2" style="width:100%; margin:2px 0px" id="auto" placeholder="Categoria de auto">

                   			<?php
$laSQL = "SELECT * FROM  categorias where Activo='1' ";
$result = mysqli_query($link,$laSQL);
$i=1;
			while ($rowL = mysqli_fetch_array($result)) {
				$Id=utf8_encode($rowL['Id']);
				$Categoria=utf8_encode($rowL['Categoria']);
				if (isset($_SESSION['idioma'])) {
					switch ($_SESSION['idioma']) {
						case 'es':

							$Nombre=utf8_encode($rowL['Nombre']);

						break;
						case 'po':
							$Nombre=utf8_encode($rowL['Nombre_Portugues']);
						break;
						case 'en':

							$Nombre=utf8_encode($rowL['Nombre_Ingles']);
						break;

					}

				}
				else{
					$Nombre=utf8_encode($rowL['Nombre']);
				}

				if($auto==$Nombre){$autoselect="selected";}else{$autoselect="";}
				echo"<option value='$Nombre' $autoselect>$Nombre</option>";
			}?>
            </select>




<br>
<p>
<textarea class="contact-form-email-message"  id="mensaje" name="mensaje" cols="25" rows="5" placeholder="<?php echo utf8_encode(MENSAJE);?>"></textarea>
<p></p>
<input type="submit" name="enviarform" id="enviarform" value="<?php echo utf8_encode(ENVIAR_CONSULTA);?>" style=" width:100%">
<p></p>


<?php }?>

</form>



</div>


</div>


<script type="text/javascript">
jQuery.noConflict();
        jQuery(document).ready(function () {
            window.asd = jQuery('.SlectBox2').SumoSelect({ csvDispCount: 3, captionFormatAllSelected: "Todos" });

        });
    </script>

    <script src="js/jquery.sumoselect.js"></script>
    <link href="css/sumoselect.css" rel="stylesheet" />



