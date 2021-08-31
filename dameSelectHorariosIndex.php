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

$HoraRetiro=date('H:i');
if (($_POST['HoraRetiro']!='')) {
	$HoraRetiro=$_POST['HoraRetiro'];
}

$HoraDevolucion=date('H:i');
if (($_POST['HoraDevolucion']!='')) {
	$HoraDevolucion=$_POST['HoraDevolucion'];
}


$array_dias['Sunday'] = "Domingo";
$array_dias['Monday'] = "Lunes";
$array_dias['Tuesday'] = "Martes";
$array_dias['Wednesday'] = "Miercoles";
$array_dias['Thursday'] = "Jueves";
$array_dias['Friday'] = "Viernes";
$array_dias['Saturday'] = "Sabado";

list($dia1,$mes1,$ano1) = explode("/",$dia1);
list($dia2,$mes2,$ano2) = explode("/",$dia2);
$desde = $ano1.'-'.$mes1.'-'.$dia1;
$hasta = $ano2.'-'.$mes2.'-'.$dia2;


$diaDesde = $array_dias[date('l', strtotime($desde))];
$diaHasta = $array_dias[date('l', strtotime($hasta))];




$html='<select name="HoraRetiro" id="HoraRetiro" required onChange="devolucion2()" style="width:150px">';
$laSQL = "SELECT * FROM feriados WHERE fecha = '".$desde."' AND abre = 0";



 $result = mysqli_query($dbh2,$laSQL);
$feriado=0;


if(mysqli_affected_rows($dbh2)>0){

	$feriado=1;
	$html .= '<option value="" disabled selected>'.utf8_encode(CERRADO).'</option>';
}

if (!$feriado) {

	$laSQL = "SELECT hora_inicio, hora_fin FROM feriados SD LEFT JOIN feriado_horarios DH ON SD.id = DH.feriado_id WHERE abre=1 AND SD.fecha = '".$desde."'";



	 $result = mysqli_query($dbh2,$laSQL);

	if(mysqli_affected_rows($dbh2)>0){
		$feriado=1;

		while ($rowL = mysqli_fetch_array($result)) {
			if ($rowL['hora_inicio']) {
				$start = $rowL['hora_inicio'];

				$end = $rowL['hora_fin'];



				$tStart = strtotime($start);

				$tEnd = strtotime($end);

				$tNow = $tStart;



				while($tNow <= $tEnd){

					$Hora=date("H:i",$tNow);

					if($Hora==$HoraDevolucion){

						$Horselected="selected";

					}

					else{

						$Horselected="";

					}



				  	$html .= "<option value='".$Hora."' $Horselected>$Hora</option>";

				  	$tNow = strtotime('+30 minutes',$tNow);

				}
			}
		}

	}
}

if (!$feriado) {
	$html .= '<option value="" disabled selected>'.utf8_encode(ELEGIR).'</option>';

$laSQL = "SELECT hora_inicio, hora_fin FROM semana_dias SD LEFT JOIN dia_horarios DH ON SD.id = DH.semana_dia_id WHERE SD.dia = '".$diaDesde."'";
$result = mysqli_query($dbh2,$laSQL);
if(mysqli_affected_rows($dbh2)!=-1){
	while ($rowL = mysqli_fetch_array($result)) {
		if ($rowL['hora_inicio']) {
			$start = $rowL['hora_inicio'];
			$end = $rowL['hora_fin'];

			$tStart = strtotime($start);
			$tEnd = strtotime($end);
			$tNow = $tStart;

			while($tNow <= $tEnd){
				$Hora=date("H:i",$tNow);
				if($Hora==$HoraRetiro){
					$Horselected="selected";
				}
				else{
					$Horselected="";
				}

			  	$html .= "<option value='$Hora' $Horselected>$Hora</option>";
			  	$tNow = strtotime('+30 minutes',$tNow);
			}
		}
	}
}
}

$html .= "</select>";





	$arrayResult["selectHoraRetiro"]=$html;

$html='<select name="HoraDevolucion" id="HoraDevolucion" required style="width:150px">';
$laSQL = "SELECT * FROM feriados WHERE fecha = '".$hasta."' AND abre = 0";



 $result = mysqli_query($dbh2,$laSQL);
$feriado=0;
if(mysqli_affected_rows($dbh2)>0){
	$feriado=1;
	$html .= '<option value="" disabled selected>'.utf8_encode(CERRADO).'</option>';
}

if (!$feriado) {
	$laSQL = "SELECT hora_inicio, hora_fin FROM feriados SD LEFT JOIN feriado_horarios DH ON SD.id = DH.feriado_id WHERE abre=1 AND SD.fecha = '".$hasta."'";



	 $result = mysqli_query($dbh2,$laSQL);

	if(mysqli_affected_rows($dbh2)>0){
		$feriado=1;

		while ($rowL = mysqli_fetch_array($result)) {
			if ($rowL['hora_inicio']) {
				$start = $rowL['hora_inicio'];

				$end = $rowL['hora_fin'];



				$tStart = strtotime($start);

				$tEnd = strtotime($end);

				$tNow = $tStart;



				while($tNow <= $tEnd){

					$Hora=date("H:i",$tNow);

					if($Hora==$HoraDevolucion){

						$Horselected="selected";

					}

					else{

						$Horselected="";

					}



				  	$html .= "<option value='".$Hora."' $Horselected>$Hora</option>";

				  	$tNow = strtotime('+30 minutes',$tNow);

				}
			}
		}

	}
}

if (!$feriado) {
	$html .= '<option value="" disabled selected>'.utf8_encode(ELEGIR).'</option>';
$laSQL = "SELECT hora_inicio, hora_fin FROM semana_dias SD LEFT JOIN dia_horarios DH ON SD.id = DH.semana_dia_id WHERE SD.dia = '".$diaHasta."'";
$result = mysqli_query($dbh2,$laSQL);
if(mysqli_affected_rows($dbh2)!=-1){
	while ($rowL = mysqli_fetch_array($result)) {
		if ($rowL['hora_inicio']) {
			$start = $rowL['hora_inicio'];
			$end = $rowL['hora_fin'];

			$tStart = strtotime($start);
			$tEnd = strtotime($end);
			$tNow = $tStart;

			while($tNow <= $tEnd){
				$Hora=date("H:i",$tNow);
				if($Hora==$HoraDevolucion){
					$Horselected="selected";
				}
				else{
					$Horselected="";
				}

			  	$html .= "<option value='$Hora' $Horselected>$Hora</option>";
			  	$tNow = strtotime('+30 minutes',$tNow);
			}
		}
	}
}

}
$html .= "</select>";





	$arrayResult["selectHoraDevolucion"]=$html;


	header("Content-Type: application/json", true);
	echo json_encode($arrayResult);
?>
