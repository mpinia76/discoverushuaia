<?php
ini_set('memory_limit', '-1');
ini_set('max_execution_time', 300);
include("conex.php");
include("db.php");
include("funcionesComunes.php");
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
/*$date1 = strtotime('2017-04-20 18:00:00');
$date2 = time();
$subTime = $date1 - $date2;
$y = ($subTime/(60*60*24*365));
$d = ($subTime/(60*60*24))%365;
$h = ($subTime/(60*60))%24;
$m = ($subTime/60)%60;

echo "Difference between ".date('Y-m-d H:i:s',$date1)." and ".date('Y-m-d H:i:s',$date2)." is:\n";
echo $y." years\n";
echo $d." days\n";
echo $h." hours\n";
echo $m." minutes\n";*/
$nombreFile = 'Reserva_'.date('Ymd');
$_Log = fopen("logs/" . $nombreFile . ".log", "a+") or die("Operation Failed!");

$arrayResult=array();
$dbh2 = mysqli_connect(db_dir_gestion(), db_usr_gestion(), db_pass_gestion(), db_base_gestion());


$dia1=date('d/m/Y');
if (($_POST['retiro']!='')&&($_POST['retiro']!='//')) {
	$dia1=$_POST['retiro'];
}
$dia2=date('d/m/Y');
if (($_POST['devolucion']!='')&&($_POST['devolucion']!='//')) {
	$dia2=$_POST['devolucion'];
}

$hora1=date('H:i');
if (($_POST['HoraRetiro']!='')) {
	$hora1=$_POST['HoraRetiro'];
}

$hora2=date('H:i');
if (($_POST['HoraDevolucion']!='')) {
	$hora2=$_POST['HoraDevolucion'];
}

if (($_POST['auto']!='')) {
	$auto=$_POST['auto'];
}

$arrayHoras = horas($dia2, $dia1, $hora2, $hora1);

//print_r($arrayHoras);

//$dias = dias($dia2, $dia1, $hora2, $hora1);

$dias = $arrayHoras[1];
$horas = $arrayHoras[2];



$dias = ($dias>0)?$dias:0;
$horas = ($dias>0)?$horas:0;
$horasSeguro = $horas;
if ($hora2<$hora1) {
	$horas=0;
	$dias++;
}


if ($dias==0) {
	$dias = 1;
	$horas = 0;
}

$catMonto = array();
$catDescuento = array();
$catConMonto = array();
$catEstadiaMinima = array();
//mysql_select_db(db_base_gestion(), $dbh2);
$laSQL = "SELECT * FROM  categorias where activa='1' ORDER BY orden";
$result = mysqli_query($dbh2,$laSQL);

while ($rowL = mysqli_fetch_array($result)) {
	$catMonto[$rowL['id']]=0;

	$catDescuento[$rowL['id']]=$rowL['descuento'];
	$catEstadiaMinima[$rowLC['id']]=1;
}

if ($dias>=0) {

	list($dia1,$mes1,$ano1) = explode("/",$dia1);
	list($dia2,$mes2,$ano2) = explode("/",$dia2);
	$desde = $ano1.'-'.$mes1.'-'.$dia1;
	$hasta = $ano2.'-'.$mes2.'-'.$dia2;
	if ($desde==$hasta) {

		$hasta = date("Y-m-d", strtotime($desde ."+ 1 days"));
	}


	$laSQL = "SELECT * FROM  hora_adicionals where hora = '".$horas."'";
	fputs($_Log, date('Y-m-d G:i:s') . $laSQL ."\n");
	$result = mysqli_query($dbh2,$laSQL);
	if ($rowL = mysqli_fetch_array($result)) {
		$hora_adicional = $rowL['coheficiente'];
	}
	$laSQL = "SELECT * FROM  categorias where activa='1' ORDER BY orden";
	$result = mysqli_query($dbh2,$laSQL);

	while ($rowLC = mysqli_fetch_array($result)) {
		$catConMonto[$rowLC['id']]=1;

	}

	$faltaTarifa = 1;
	$faltaEstadia = 1;
	for($i=$desde;$i<$hasta;$i = date("Y-m-d", strtotime($i ."+ 1 days"))){
		$laSQL = "SELECT * FROM  categorias where activa='1' ORDER BY orden";
		$result = mysqli_query($dbh2,$laSQL);

		while ($rowLC = mysqli_fetch_array($result)) {

			//echo $i."<br>";
			$laSQL1 = "SELECT * FROM  categoria_tarifa where fecha = '".$i."' AND categoria_id = ".$rowLC['id'];
			//echo $laSQL1."<br>";
			fputs($_Log, date('Y-m-d G:i:s') . $laSQL1 ."\n");
			$result1 = mysqli_query($dbh2,$laSQL1);
			//

			if(mysqli_affected_rows($dbh2)<=0){
				//echo 'Afectadas:'.mysqli_affected_rows($link).' - '.$rowLC['id'];
				$catMonto[$rowLC['id']]=0;
				$catConMonto[$rowLC['id']]=0;
				//break;
			}
			else{
				while ($rowL = mysqli_fetch_array($result1)) {
					$catMonto[$rowL['categoria_id']]+=$rowL['importe'];
					$ultimo = date("Y-m-d", strtotime($i ."+ 1 days"));
					//echo $rowL['importe'].' - '.$ultimo.' - '.$hasta."<br>";
					fputs($_Log, date('Y-m-d G:i:s') . $rowL['importe'].' - '.$ultimo.' - '.$hasta ."\n");
					if ($ultimo==$hasta) {
						$laSQL2 = "SELECT * FROM  categoria_tarifa where fecha = '".$ultimo."' AND categoria_id = ".$rowLC['id'];
						fputs($_Log, date('Y-m-d G:i:s') . $laSQL2 ."\n");
						$result2 = mysqli_query($dbh2,$laSQL2);
						if(mysqli_affected_rows($dbh2)<=0){
							$catMonto[$rowLC['id']]=0;
							$catConMonto[$rowLC['id']]=0;
						}
						else{
							$catMonto[$rowL['categoria_id']]+=$rowL['importe']*$hora_adicional;
						}
					}
				}
			}
			$laSQL1 = "SELECT * FROM  categoria_estadia where fecha = '".$i."' AND categoria_id = ".$rowLC['id'];
			//echo mysqli_affected_rows($link)."<br>";
			fputs($_Log, date('Y-m-d G:i:s') . $laSQL1 ."\n");
			$result1 = mysqli_query($dbh2,$laSQL1);
			//

			if(mysqli_affected_rows($dbh2)<=0){

			}
			else{
				while ($rowL = mysqli_fetch_array($result1)) {
					//echo 'dias: '.$rowL['dias']."<br>";
					$catEstadiaMinima[$rowLC['id']]=($rowL['dias']>$catEstadiaMinima[$rowLC['id']])?$rowL['dias']:$catEstadiaMinima[$rowLC['id']];
					//echo 'minimo: '.$estadiaMinima."<br>";
				}
			}
		}


	}


	$laSQL = "SELECT * FROM  categoria_coheficiente where dia = '".$dias."'";
	//echo $laSQL."<br>";
	fputs($_Log, date('Y-m-d G:i:s') . $laSQL ."\n");
	$result = mysqli_query($dbh2,$laSQL);
	//echo mysqli_affected_rows($link);
	if(mysqli_affected_rows($dbh2)>0){
		while ($rowL = mysqli_fetch_array($result)) {
			//echo $catMonto[$rowL['categoria_id']].'*='.$rowL['coheficiente'];
			fputs($_Log, date('Y-m-d G:i:s') . $catMonto[$rowL['categoria_id']].'*='.$rowL['coheficiente'] ."\n");
			if ($catDescuento[$rowL['categoria_id']]) {
				$catMonto[$rowL['categoria_id']]*=$rowL['coheficiente'];
			}
			//$catMonto[$rowL['categoria_id']]+=$catMonto[$rowL['categoria_id']]*$hora_adicional;
		}
	}
	else{
		$laSQL = "SELECT * FROM  categoria_coheficiente where dia like '%+%'";
		//echo $laSQL."<br>";
		fputs($_Log, date('Y-m-d G:i:s') . $laSQL ."\n");
		$result = mysqli_query($dbh2,$laSQL);
		if(mysqli_affected_rows($dbh2)>0){
			while ($rowL = mysqli_fetch_array($result)) {
				if ($catDescuento[$rowL['categoria_id']]) {
					$catMonto[$rowL['categoria_id']]*=$rowL['coheficiente'];
				}
				//$catMonto[$rowL['categoria_id']]+=$catMonto[$rowL['categoria_id']]*$hora_adicional;
			}
		}
	}





	//echo 'Devolucion: '.$dia1.' - Hora retiro: '.$hora1.' Retiro: '.$dia2.' - Hora devolucion: '.$hora2;
}
//print_r($catMonto);
foreach ($catConMonto as $monto) {
	if ($monto !=0) {
		$faltaTarifa=0;
		break;
	}
}
foreach ($catEstadiaMinima as $catDias) {
	if ($catDias <=$dias) {
		$faltaEstadia=0;
		break;
	}
}

/*print_r($catEstadiaMinima);
echo $auto.' < '.$dias;*/
if ($faltaTarifa) {
	$html='<strong>'.utf8_encode(SIN_TARIFAS).'</strong>';
}
elseif ($faltaEstadia) {
	$html='<strong>'.utf8_encode(SIN_ESTADIA2).'</strong>';
}
else{
	$html=utf8_encode(CATEGORIA_DE_AUTO).':<br><select name="auto" style="width:100%; margin:2px 0px" id="auto" placeholder="Categoria de auto" onChange="dameSelectExtras()">';

	$laSQL = "SELECT * FROM  categorias where activa='1' ORDER BY orden";
	$result = mysqli_query($dbh2,$laSQL);

	while ($rowL = mysqli_fetch_array($result)) {


			$Id=($rowL['id']);
			$Categoria=($rowL['categoria']);
			if (isset($_SESSION['idioma'])) {
				switch ($_SESSION['idioma']) {
					case 'es':

						$Nombre=$rowL['vehiculos'];

					break;
					case 'po':
						$Nombre=$rowL['vehiculos_portugues'];
					break;
					case 'en':

						$Nombre=$rowL['vehiculos_ingles'];
					break;

				}

			}
			else{
				$Nombre=$rowL['vehiculos'];
			}

			if($Id==$auto){$autoselect="selected";}else{$autoselect="";}

			if ($catConMonto[$rowL['id']]==0) {
				$html .='<option disabled value="'.$Id.'-'.$catMonto[$Id].'" '.$autoselect.'>'.$Categoria.' - '.utf8_encode(SIN_TARIFAS2).'</option>';

			}
			elseif($catEstadiaMinima[$rowL['id']]>$dias){
				$msg = SIN_ESTADIA;
				$params = array ($catEstadiaMinima[$rowL['id']]);
				$sinEstadia=formatMessage( $msg, $params ).'<br />';
				$html .='<option disabled value="'.$Id.'-'.$catMonto[$Id].'" '.$autoselect.'>'.$Categoria.' - '.utf8_encode($sinEstadia).'</option>';
			}
			else{
				$html .='<option value="'.$Id.'-'.$catMonto[$Id].'" '.$autoselect.'>'.$Categoria.' - '.$Nombre.' '.formatMontoToView($catMonto[$Id]).'</option>';
			}

	}

	$html .='</select>';
}
	$arrayResult["categorias"]=$html;
if ($faltaTarifa) {
	$html='';
}
else{
	$html=utf8_encode(COBERTURA_SEGURO).':<br>
<select name="seguro" style="width:100%; margin:2px 0px" id="seguro" placeholder="'.utf8_encode(COBERTURA_SEGURO).'" onChange="sumarTotal()">';




	/*$laSQL = "SELECT * FROM seguros ORDER BY orden ASC";
	$result = mysqli_query($dbh2,$laSQL);

	while ($rowL = mysqli_fetch_array($result)) {
		$Id=($rowL['id']);
		if ($dias>0) {

			$diasSeguro = ($horasSeguro>0)?$dias+1:$dias;
			$importe=$rowL['importe']*$diasSeguro;
		}
		else $importe=$rowL['importe'];
		if (isset($_SESSION['idioma'])) {
			switch ($_SESSION['idioma']) {
				case 'es':

					$Nombre=$rowL['seguro'];

				break;
				case 'po':
					$Nombre=$rowL['seguro_portugues'];
				break;
				case 'en':

					$Nombre=$rowL['seguro_ingles'];
				break;

			}

		}
		else{
			$Nombre=$rowL['seguro'];
		}
		$style = ($Id=='3')?'':' class=\'opcionAzul\'';
		$html .="<option value='".$Id."-".$importe."' ".$style.">".$Nombre." ".formatMontoToView($importe)."</option>";
	}	*/

	$html .='</select>';
}
	$arrayResult["seguros"]=$html;
	fclose($_Log);
	header("Content-Type: application/json", true);
	echo json_encode($arrayResult);
//echo 'Devolucion: '.$dia1.' - Hora retiro: '.$hora1.' Retiro: '.$dia2.' - Hora devolucion: '.$_POST['HoraDevolucion'];
?>
