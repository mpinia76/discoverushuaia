<?php

require("favoritas.common.php");

include("../admin/preguntas.inc.php");

echo '<?xml version="1.0" encoding="UTF-8"?>';

?>

<?php

include("../conex.php");

include("../db.php");

$vdir = db_dir();

$vusr = db_usr();

$vpass = db_pass();

$vbase = db_base();

$link=Conectarse( $vdir, $vusr, $vpass, $vbase);



//funciones utiles

function fechasql($fecha){

	$part=explode("/",$fecha);

	$mysql=$part[2]."-".$part[1]."-".$part[0];

	return $mysql;

}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Page-Enter" content="revealTrans(Duration=1, Transition=5)" >

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Discover - Rent a car - Encuesta de satisfacci&oacute;n</title>

<?php $xajax->printJavascript(); ?>



<link rel="stylesheet" type="text/css" media="all" href="../admin/css/style.css" />

<link rel="stylesheet" type="text/css" media="all" href="../admin/css/niceforms-default.css" />



<style type="text/css">

.titulo_formulario {

	font-family: Arial, Helvetica, sans-serif;

	font-size: x-large;

	color: #AAA;

	}

.titulo_principal {

	font-family: Arial, Helvetica, sans-serif;

	border: 1px solid #CCC;

	font-size:0.8em;

	font-weight:bold;

	color:#30896C;

	background-color:#CAECE1;

	line-height: 1.8em;

	}

.titulo_secundario {

	font-family: Arial, Helvetica, sans-serif;

	font-size:small;

	}

.comentario {

	font-family: Arial, Helvetica, sans-serif;

	font-size:small;

	font-style:italic;

	color:#fff;

	}

table {

	border: 1px solid #CCCCCC;

	}

.itemdetabla-1{

	font-family: Arial, Helvetica, sans-serif;

	font-size:small;

	line-height: 1.8em;

	padding-left: .5em;

	background-color:#FFF;

	color:#333333;

	font-weight:normal;

	}

.itemdetabla-2{

	font-family: Arial, Helvetica, sans-serif;

	font-size:small;

	line-height: 1.8em;

	padding-left: .5em;

	background-color:#EEE;

	color:#333333;

	font-weight:normal;

	}

.controldetabla-1{

	line-height: 1.8em;

	background-color:#FFF;

	}

.controldetabla-2{

	line-height: 1.8em;

	background-color:#EEE;

	}

#contenedor{

	width:70%;

	margin-left:auto;

	margin-right:auto;

	padding:15px;

	border: 2px solid #CCCCCC;

	background-color:#FFF;

	overflow-y:scroll;

	overflow-x:hidden;

	height: 50%;

	/*position:relative;*/

	position:absolute;

	top:25%;

	right:15%;

	z-index:10;

	}

.mensaje {

	position:absolute;

	top:100px;

	left:90px;

	padding:15px;

	width:320px;

	background-color:#009091;

	border:solid 4px #FFFFFF;

	color:#FFFFFF;

	z-index:10;

	font:normal 12px arial;

	text-align:center;

}

.mensaje .cerrar {

	font:bold 13px arial;

	color: #FFFF33;

	cursor:pointer;

	text-decoration:none;

}

</style>

<!--JQuery Date Picker-->

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>

<script type="text/javascript" src="../js/date.js"></script>

<!--[if IE]><script type="text/javascript" src="../js/jquery.bgiframe.js"></script><![endif]-->

<script type="text/javascript" src="../js/jquery.datePicker.min-2.1.2.js"></script>

<link href="../js/datePicker.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" charset="utf-8">

$(function()

{

	$('.date-pick').datePicker({startDate:'01/01/2009'})

	$('#start-date').bind(

		'dpClosed',

		function(e, selectedDates)

		{

			var d = selectedDates[0];

			if (d) {

				d = new Date(d);

				$('#end-date').dpSetStartDate(d.addDays(1).asString());

			}

		}

	);

	$('#end-date').bind(

		'dpClosed',

		function(e, selectedDates)

		{

			var d = selectedDates[0];

			if (d) {

				d = new Date(d);

				$('#start-date').dpSetEndDate(d.addDays(-1).asString());

			}

		}

	);

});

</script>

<script language="javascript" type="text/javascript">

function vacio(q) {

		//funcion que chequea que los campos no sean espacios en blanco

        for ( i = 0; i < q.length; i++ ) {

                if ( q.charAt(i) != " " ) {

                        return true

                }

        }

        return false

}

function mail(texto){



    var mailres = true;

    var cadena = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890@._-";



    var arroba = texto.indexOf("@",0);

    if ((texto.lastIndexOf("@")) != arroba) arroba = -1;



    var punto = texto.lastIndexOf(".");



     for (var contador = 0 ; contador < texto.length ; contador++){

        if (cadena.indexOf(texto.substr(contador, 1),0) == -1){

            mailres = false;

            break;

     }

    }



    if ((arroba > 1) && (arroba + 1 < punto) && (punto + 1 < (texto.length)) && (mailres == true) && (texto.indexOf("..",0) == -1))

     mailres = true;

    else

     mailres = false;



    return mailres;

}

function isNum(q) {

		for ( i = 0; i < q.length; i++ ) {

			valor = parseInt(q.charAt(i));

			if (isNaN(valor)) {

			return true}

		}

		return false

}

function valida(F) {

      if(!vacio(F.retiro.value)) {

        alert("Por favor complete la fecha de retiro del vehiculo")

		window.document.form.retiro.focus();

        return false

        }

        if(!vacio(F.devolucion.value)) {

        alert("Por favor complete la fecha de devolucion del vehiculo")

		window.document.form.devolucion.focus();

        return false

        }

        if(F.unidad.value=="n") {

        alert("Por favor seleccione el unidad donde se alojo.")

		window.document.form.unidad.focus();

        return false

        }

        if(!vacio(F.nombre.value)) {

        alert("Por favor complete su nombre")

		window.document.form.nombre.focus();

        return false

        }

        if(!vacio(F.apellido.value)) {

        alert("Por favor complete su apellido")

		window.document.form.apellido.focus();

        return false

        }

        if(!vacio(F.email.value)) {

        alert("Por favor complete su correo electronico")

		window.document.form.email.focus();

        return false

        }

		if(!mail(F.email.value)){

		alert("El correo electronico ingresado no es correcto")

		window.document.form.email.focus();

        return false

        }

        if(!vacio(F.cod_area.value) || !vacio(F.telefono.value)) {

        alert("Por favor complete su telefono y codigo de area")

		window.document.form.telefono.focus();

        return false

        }

		if(isNum(F.cod_area.value)){

		alert("El codigo de area debe ser solo un numero")

		window.document.form.cod_area.focus();

        return false

        }

		if(isNum(F.telefono.value)){

		alert("El telefono debe ser solo un numero")

		window.document.form.telefono.focus();

        return false

        }

		if(!vacio(F.pais.value)){

		alert("Por favor ingrese su pais de residencia")

		window.document.form.pais.focus();

        return false

        }

		if(!vacio(F.nrodoc.value)){

		alert("Por favor ingrese su numero de documento")

		window.document.form.nrodoc.focus();

        return false

        }

		if(isNum(F.nrodoc.value)){

		alert("El numero de documento debe ser solo un numero")

		window.document.form.nrodoc.focus();

        return false

        }

		if(!vacio(F.provincia.value)){

		alert("Por favor ingrese su provincia")

		window.document.form.provincia.focus();

        return false

        }

        if(!vacio(F.calle.value) || !vacio(F.nropuerta.value)) {

        alert("Por favor complete su direccion")

		window.document.form.calle.focus();

        return false

        }

}

</script>

<style type="text/css">



a.dp-choose-date {

	float: left;

	width: 16px;

	height: 16px;

	padding: 0;

	margin: 5px 3px 0;

	display: block;

	text-indent: -2000px;

	overflow: hidden;

	background: url(../js/calendar.png) no-repeat;

}

a.dp-choose-date.dp-disabled {

	background-position: 0 -20px;

	cursor: default;

}

input.dp-applied {

	width: 70px;

	float: left;

}





.page-heading {

              background-color: #2a9ed9;

			  background-image: url(http://localhost//discoverushuaia/tienda/wp-content/uploads/2016/09/bg-home-v3-b-1.jpg);

			  background-size: cover;

			  background-repeat: no-repeat;

			  color:#fff;

			  }

</style>

<!--/JQuery Date Picker-->

</head>



<body class="page-heading">

<div id="alert" class="mensaje" style="display:none; z-index:100; left:33%; top:230px; width:370px;">

	<div id="alert_text" style="height:110px; overflow:auto;">

	<p>Ingrese el correo electr&oacute;nico con el que complet&oacute; el formulario</p>

	<form name="cliente_form" id="cliente_form" action="javascript:void(null);" onsubmit="xajax_buscaCliente(xajax.getFormValues('cliente_form'));">

	<p><input type="text" name="email" size="25" /> <input type="submit" value="Buscar" name="buscar" /></p>

	</form>

	</div>

	<a href="#" onclick="xajax_cerrarVentana();">

	<div class="cerrar">Cerrar</div></a>

</div>

<img src="../img/logo_blanco.png" alt="Rent a Car" width="200" height="61" class="logo-fixed" /></a> </div></div>

<?php if(isset($_POST['enviar'])){

	//cargo el cliente en la bd

	$sql="SELECT id FROM clientes WHERE email='".$_POST['email']."'";

	$rsTemp = mysqli_query($link,$sql,$link);

	if(mysqli_affected_rows($link)==1){

		$rs = mysqli_fetch_array($rsTemp);

		$cliente_id = $rs['id'];

		$sql="UPDATE clientes SET

				nombre = '".$_POST['nombre']."',

				apellido = '".$_POST['apellido']."',

				email = '".$_POST['email']."',

				telefono = '".$_POST['cod_area']." ".$_POST['telefono']."',

				tipodoc = '".$_POST['tipodoc']."',

				nrodoc = '".$_POST['nrodoc']."',

				pais = '".$_POST['pais']."',

				provincia = '".$_POST['provincia']."',

				ciudad = '".$_POST['ciudad']."',

				calle = '".$_POST['calle']."',

				nropuerta = '".$_POST['nropuerta']."'

			WHERE email = '".$_POST['email']."'";

		mysqli_query($link,$sql,$link);



		$persona = $_POST['nombre']." ".$_POST['apellido']." ha completado una encuesta de satisfaccion.  \r\n \r\n";



	}else{

		$sql =  "INSERT INTO `clientes`

				(`id`,`nombre`,`apellido`,`email`,`telefono`,`tipodoc`,`nrodoc`,`pais`,`provincia`,`ciudad`,`calle`,`nropuerta`)

				VALUES

				(NULL ,  '".$_POST['nombre']."',  '".$_POST['apellido']."','".$_POST['email']."','".$_POST['cod_area']." ".$_POST['telefono']."','".$_POST['tipodoc']."','".$_POST['nrodoc']."','".$_POST['pais']."','".$_POST['provincia']."','".$_POST['ciudad']."','".$_POST['calle']."','".$_POST['nropuerta']."')";



		$persona = $_POST['nombre']." ".$_POST['apellido']." ha completado una encuesta de satisfaccion.  \r\n \r\n";



		mysqli_query($link,$sql,$link);



		$cliente_id=mysqli_insert_id($link);

	}



	//guardo la encuesta

	$sql =  "INSERT INTO `encuesta`

			(`id`,`retiro`,`devolucion`,`unidad_id`,`cliente_id`,`comentarios_buenos`, comentarios_malos)

			VALUES

			(NULL ,  '".fechasql($_POST['retiro'])."',  '".fechasql($_POST['devolucion'])."','".$_POST['unidad']."','".$cliente_id."','".$_POST['comentarios_buenos']."','".$_POST['comentarios_malos']."')";

	//echo $sql;

	$estadia = "Los datos ingresados son de su alquiler desde el ".$_POST['retiro']." hasta el ".$_POST['devolucion']." a la unidad ".$_POST['unidad']." \r\n \r\n";



	mysqli_query($link,$sql,$link);



	$encuesta_id=mysqli_insert_id($link);



	$letras="abcdefghijklmnopq";

	for($i=1; $i<=10; $i++){

		/*if($i==7){

			for($j=0; $j<strlen($letras); $j++){

				if(isset($_POST[$i.$letras[$j]])){

					$sql = "INSERT INTO `encuesta_respuestas`

						(`encuesta_id`,`pregunta_id`,`valor`,`extra`)

						VALUES

						('".$encuesta_id."', '".$i.$letras[$j]."', '".$_POST[$i.$letras[$j]]."','')";

					$resultado.=$pregunta[$i.$letras[$j]].": ".$_POST[$i.$letras[$j]]." \r\n";



					mysqli_query($link,$sql,$link);

				}

			}

		}else{*/

			if(isset($_POST[$i])){

				$sql = "INSERT INTO `encuesta_respuestas`

						(`encuesta_id`,`pregunta_id`,`valor`,`extra`)

						VALUES

						('".$encuesta_id."', '".$i."', '".$_POST[$i]."','".$_POST[$i.$_POST[$i]."_extra"]."')";

				$resultado.=$pregunta[$i].": ".$respuesta[$i][$_POST[$i]]." ".$_POST[$i.$_POST[$i]."_extra"]."  \r\n";



				mysqli_query($link,$sql,$link);

			}

		//}

	}



	$mail.=$persona;

	$mail.=$estadia;

	$mail.="Los resultados de la encuesta son: \r\n";

	$mail.=$resultado;

	$mail.="Le gustÃ³: ".$_POST['comentarios_buenos']." \r\n";

                  $mail.="No le gustÃ³: ".$_POST['comentarios_malos'];











	$to=" blengioj@discoverushuaia.com.ar,pacec@doscoverushuaia.com.ar,minervinim@discoverushuaia.com.ar,Info@discoverushuaia.com.ar";



	//$to="marcos.pinero1976@gmail.com";





	//echo 'error: '.$exito;



	mail($to,"Nueva encuesta de satisfaccion",$mail,"From: Discover Ushuaia Rent a Car <info@discoverushuaia.com.ar>");





	?>

	<div id="gracias">

	<p align="center" class="titulo_principal">Gracias por tomarse el tiempo de completar la encuesta<br />

	Su opini&oacute;n es muy importante para nosotros.</p>

	</div>



<?php }elseif(isset($_POST['ingresar']) and $_POST['username']=="discover" and $_POST['password']=="discover"){ ?>

	<div id="formulario">

	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" name="form" onSubmit="return valida(this);">

	<div id="datos_personales">

		  <p class="titulo_principal">Datos personales (si ya ingres&oacute; sus datos alguna, vez haga <a href="#" onclick="xajax_muestraMsg();">click aqu&iacute;</a>)</p>

		<p class="titulo_secundario">

		<div class="titulo_secundario" style="float:left; margin-top:3px;">Fecha de retiro del veh&iacute;culo &nbsp;</div> <input name="retiro" size="5" id="start-date" class="date-pick" />

		<div class="titulo_secundario" style="float:left; margin-top:3px;"> hasta &nbsp; </div><input name="devolucion" size="5" id="end-date" class="date-pick" />

		<div class="titulo_secundario" style="float:left; margin-top:3px;"> &nbsp; unidad elegida: </div>

		<select size="1" name="unidad">

		<option value="n">Seleccionar...</option>

		<?php

		$sql = "SELECT * FROM unidads";

		$rsTemp = mysqli_query($link,$sql,$link);

		while($rs = mysqli_fetch_array($rsTemp)){

		?>

		<option value="<?php echo $rs['id']?>"><?php echo $rs['marca'].' '.$rs['modelo'].' Patente: '.$rs['patente']?></option>

		<?php } ?>

		</select>

		</p>

		<p class="titulo_secundario">

		Nombre <input type="text" id="nombre" name="nombre" size="20" />

		Apellido: <input type="text" id="apellido" name="apellido" size="20" />

		Documento:

		<select size="1" name="tipodoc" class="campo">

		<option id="DNI">DNI</option>

		<option id="CI">CI</option>

		<option id="LE">LE</option>

		<option id="LC">LC</option>

		</select>

		<input type="text" id="nrodoc" name="nrodoc" size="10" class="campo"/>

		</p>

		<p class="titulo_secundario">

		Pais: <input type="text" id="pais" name="pais" size="15" />

		Provincia: <input type="text" id="provincia" name="provincia" size="15" />

		Ciudad: <input type="text" id="ciudad" name="ciudad" size="15" />

		</p>

		<p class="titulo_secundario">

		Calle: <input type="text" id="calle" name="calle" size="20" />

		Numero: <input type="text" id="nropuerta" name="nropuerta" size="5" />

		</p>

		<p class="titulo_secundario">

		C&oacute;digo de &aacute;rea: <input type="text" id="cod_area" name="cod_area" size="5" />

		Telefono: <input type="text" id="telefono" name="telefono" size="15" />

		Correo electr&oacute;nico: <input type="text" id="email" name="email" size="50" />

		</p>

	</div>

	<p class="comentario">A continuacion debe seleccionar la/s opciones que desee</p>

	<div id="encuesta">

	<p class="titulo_secundario"><strong>1. Sobre su reserva</strong></p>

	  <p class="titulo_secundario"><strong>&iquest;Quienes lo acompa&ntilde;aron en su viaje?</strong><br>



		<input name="1" type="radio" value="1" />Solo<br />

		<input name="1" type="radio" value="2" />Pareja<br />

		<input name="1" type="radio" value="3" />Familia<br />



	  </p>

	  <p class="titulo_secundario"><strong>Relaci&oacute;n Calidad/Precio de su auto.(Califique de 1 a 5)</strong><br>



		<input name="2" type="radio" value="1" />1<br />

		<input name="2" type="radio" value="2" />2<br />

		<input name="2" type="radio" value="3" />3<br />

		<input name="2" type="radio" value="4" />4<br />

		<input name="2" type="radio" value="5" />5<br />



	  </p>

	  <p class="titulo_secundario"><strong>Amabilidad y tiempo de respuesta  del personal comercial al realizar su reserva (Califique de 1 a 5)</strong><br>



		<input name="3" type="radio" value="1" />1<br />

		<input name="3" type="radio" value="2" />2<br />

		<input name="3" type="radio" value="3" />3<br />

		<input name="3" type="radio" value="4" />4<br />

		<input name="3" type="radio" value="5" />5<br />



	  </p>

	  <p class="titulo_secundario"><strong>2. Sobre el coche</strong></p>

		<p class="titulo_secundario"><strong>Limpieza  del coche al momento de la entrega (Califique de 1 a 5)</strong><br>



		<input name="4" type="radio" value="1" />1<br />

		<input name="4" type="radio" value="2" />2<br />

		<input name="4" type="radio" value="3" />3<br />

		<input name="4" type="radio" value="4" />4<br />

		<input name="4" type="radio" value="5" />5<br />



	  	</p>

	  	<p class="titulo_secundario"><strong>Estado General del coche. (califique de 1 a 5)</strong><br>



		<input name="5" type="radio" value="1" />1<br />

		<input name="5" type="radio" value="2" />2<br />

		<input name="5" type="radio" value="3" />3<br />

		<input name="5" type="radio" value="4" />4<br />

		<input name="5" type="radio" value="5" />5<br />



	  	</p>

	  <p class="titulo_secundario"><strong>3. Sobre nuestra  empresa. </strong></p>



		<p class="titulo_secundario"><strong>Facilidad para encontrarnos al momento de la entrega (Califique de 1 a 5)</strong><br>



		<input name="6" type="radio" value="1" />1<br />

		<input name="6" type="radio" value="2" />2<br />

		<input name="6" type="radio" value="3" />3<br />

		<input name="6" type="radio" value="4" />4<br />

		<input name="6" type="radio" value="5" />5<br />



	  	</p>

	  	<p class="titulo_secundario"><strong>Tiempo de espera para retirar su coche (Califique de 1 a 5)</strong><br>



		<input name="7" type="radio" value="1" />1<br />

		<input name="7" type="radio" value="2" />2<br />

		<input name="7" type="radio" value="3" />3<br />

		<input name="7" type="radio" value="4" />4<br />

		<input name="7" type="radio" value="5" />5<br />



	  	</p>

	  	<p class="titulo_secundario"><strong>Amabilidad del personal al momento de la entrega del veh&iacute;culo (califique  de 1 a 5)</strong><br>



		<input name="8" type="radio" value="1" />1<br />

		<input name="8" type="radio" value="2" />2<br />

		<input name="8" type="radio" value="3" />3<br />

		<input name="8" type="radio" value="4" />4<br />

		<input name="8" type="radio" value="5" />5<br />



	  	</p>

	  	<p class="titulo_secundario"><strong>Dificultades al momento de la devoluci&oacute;n de su veh&iacute;culo (califique de 1 a 5)</strong><br>



		<input name="9" type="radio" value="1" />1<br />

		<input name="9" type="radio" value="2" />2<br />

		<input name="9" type="radio" value="3" />3<br />

		<input name="9" type="radio" value="4" />4<br />

		<input name="9" type="radio" value="5" />5<br />



	  	</p>

	  <p class="titulo_secundario"><strong>4. Si tuviera que volver a reservar un veh&iacute;culo para visitar Ushuaia. Volver&iacute;a a hacerlo con Discover Ushuaia Rent a Car.  </strong>

		<br />

		<input name="10" type="radio" value="1" /> Si<br />

		<input name="10" type="radio" value="2" /> No<br />



	  </p>

	<p class="titulo_secundario"><strong>Lo que le ha gustado</strong><br /><br />

	  <textarea name="comentarios_buenos" cols="100" rows="5" style="border-color: #06fb4e; border-width: 4px;"></textarea>

	</p>

          <p class="titulo_secundario"><strong>Lo que no le ha gustado</strong><br /><br />

	  <textarea name="comentarios_malos" cols="100" rows="5" style="border-color: #900303; border-width: 4px;"></textarea>

	</p>

	<p align="center"><input type="submit" value="Enviar" name="enviar"></p>





	</form>

	</div>

	<br/>

	</div>

<?php }else{ ?>

	<div id="main_container">



	<div class="header_login">

    <div class="logo">



    </div>



    </div>

      <p>&nbsp;</p>

      <p>&nbsp;</p>



         <div class="login_form">



         <h3>Encuesta de Satisfacci&oacute;n al cliente</h3>

         <?php echo $msj?>





         <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="niceform">



                <fieldset>

                    <dl>

                        <dt>

                          <label for="user">Usuario:</label></dt>

                        <dd><input type="text" name="username" id="" size="40" /></dd>

                    </dl>

                    <dl>

                        <dt><label for="password">Contrase&ntilde;a:</label></dt>

                        <dd><input type="password" name="password" id="" size="40" /></dd>

                    </dl>



                    <dl>

                        <dt><label></label></dt>



                    </dl>



                     <dl class="submit">

                    <input type="submit" name="ingresar" id="submit" value="Ingresar" />

                     </dl>



                </fieldset>



         </form>

         </div>











</div>

<?php } ?>

