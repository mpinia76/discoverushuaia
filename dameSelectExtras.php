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



$hora1=date('H:i');

if (($_POST['HoraRetiro']!='')) {

	$hora1=$_POST['HoraRetiro'];

}



$hora2=date('H:i');

if (($_POST['HoraDevolucion']!='')) {

	$hora2=$_POST['HoraDevolucion'];

}



if (($_POST['auto']!='')) {

	

	$arrayCategoria=explode('-',$_POST['auto']);

	$auto=$arrayCategoria[0];

}



$arrayHoras = horas($dia2, $dia1, $hora2, $hora1);



//print_r($arrayHoras);



//$dias = dias($dia2, $dia1, $hora2, $hora1);



$dias = $arrayHoras[1];

$horas = $arrayHoras[2];

if ($dias==0) {

	$dias = 1;

	$horas = 0;

}



$dias = ($dias>0)?$dias:0;

$horas = ($dias>0)?$horas:0;

if ($hora2<$hora1) {
	$horas=0;
	$dias++;
}
$horasSeguro = $horas;
//mysql_select_db(db_base_gestion(), $dbh2);  



$laSQL = "SELECT * FROM  hora_adicionals where hora = '".$horas."'";

	//echo $laSQL."<br>";

$result = mysqli_query($dbh2,$laSQL);

if ($rowL = mysqli_fetch_array($result)) {

	$hora_adicional = $rowL['coheficiente'];

}



	$catMonto = array();

	  

	$laSQL = "SELECT ES.id, ES.impacto, ES.descuento, E.tarifa AS importe FROM extra_subrubros ES LEFT JOIN extras E ON ES.id = E.extra_subrubro_id WHERE E.activo = 1";

	$result = mysqli_query($dbh2,$laSQL);

	//echo $laSQL."<br>";

	while ($rowL = mysqli_fetch_array($result)) {

		if ($rowL['impacto']==1) {

			$catMonto[$rowL['id']]=$dias*$rowL['importe'];

			$catMonto[$rowL['id']]+=$catMonto[$rowL['id']]*$hora_adicional;

		}

		else{

			$catMonto[$rowL['id']]=$rowL['importe'];

		}

		if ($rowL['descuento']==1) {

			$laSQL = "SELECT * FROM  categoria_coheficiente where dia = '".$dias."' AND categoria_id = ".$auto;

			//echo $laSQL."<br>";

			$result1 = mysqli_query($dbh2,$laSQL);

			if(mysqli_affected_rows($dbh2)!=-1){ 

				if ($rowL1 = mysqli_fetch_array($result1)) {

					//echo $catMonto[$rowL['categoria_id']].'*='.$rowL['coheficiente'];

					$catMonto[$rowL['id']]*=$rowL1['coheficiente'];

				}

			}

			else{

				$laSQL = "SELECT * FROM  categoria_coheficiente where dia like '%+%' AND categoria_id = ".$auto;

				//echo $laSQL."<br>";

				$result1 = mysqli_query($dbh2,$laSQL);

				if(mysqli_affected_rows($dbh2)!=-1){ 

					if ($rowL1 = mysqli_fetch_array($result1)) {			

						$catMonto[$rowL['id']]*=$rowL1['coheficiente'];

					}

				}

			}

		}

	}

	

	

	

	





$html=utf8_encode(EXTRAS).':<br>

<select name="extra[]" multiple="multiple" class="SlectBox2" style="width:100%; margin:2px 0px" id="extra" placeholder="'.utf8_encode(SIN_EXTRAS).'" onChange="sumarTotal()">';



                   		



                  			

	$laSQL = "SELECT * FROM extra_subrubros WHERE extra_rubro_id = 1 AND activo = 1";

	$result = mysqli_query($dbh2,$laSQL);



	while ($rowL = mysqli_fetch_array($result)) {

		$Id=($rowL['id']);
		if (isset($_SESSION['idioma'])) {
			switch ($_SESSION['idioma']) {
				case 'es':
					
					$subrubro=$rowL['subrubro'];
		
				break;
				case 'po':
					$subrubro=$rowL['subrubro_portugues'];
				break;
				case 'en':
					
					$subrubro=$rowL['subrubro_ingles'];
				break;
				
			}
			
		}
		else{
			$subrubro=$rowL['subrubro'];
		}
		

		$Nombre=$subrubro;

		

		$html .='<option value="'.$Id.'-'.$catMonto[$Id].'">'.$Nombre.' '.formatMontoToView($catMonto[$Id]).'</option>';

	}			

        

	$html .='</select>';

	$arrayResult["extras"]=$html;

	$html=utf8_encode(COBERTURA_SEGURO).':<br>
	<select name="seguro" style="width:100%; margin:2px 0px" id="seguro" placeholder="'.utf8_encode(COBERTURA_SEGURO).'" onChange="sumarTotal()">';

                   		

                  			
	$laSQL = "SELECT * FROM seguros WHERE categoria_id = '".$auto."' ORDER BY orden ASC";
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
	}		
        
	$html .='</select>';

	$arrayResult["seguros"]=$html;

	

	header("Content-Type: application/json", true);

	echo json_encode($arrayResult);

