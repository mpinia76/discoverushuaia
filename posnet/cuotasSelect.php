<?php

	include("../conex.php");
	include("../db.php");
	$vdir = db_dir();
	$vusr = db_usr();
	$vpass = db_pass();
	$vbase = db_base();
	$link=Conectarse( $vdir, $vusr, $vpass, $vbase);

switch ($_GET['tarjeta']) {
	case 1:
	 $tarjeta = 'VISA';
	break;
	
	case 6:
	 $tarjeta = 'American Express';
	break;
	
	case 15:
	 $tarjeta = 'Mastercard';
	break;
	
	case 8:
	 $tarjeta = 'Diners';
	break;
}	


$html = '';
$html .= '<select name="CUOTAS" size="1" id="cuotas" style="display:inline">';
$laSQL = "SELECT * FROM cuotas WHERE tarjeta = '".$tarjeta."' order by cuota asc";
$result = mysqli_query($link,$laSQL);
$i=1;
while ($rowL = mysqli_fetch_array($result)) {
	//$Id=$rowL['id'];
 	if ($rowL['cuota']== $_GET['cuotaSeleccionada']) {
    	$selected = '  selected="selected"';
    } else {
        $selected = '';
    }
	$html .= '<option ' . $selected . '>' . $rowL['cuota'] . '</option>';
            }
        
        $html .= '</select>';



echo (utf8_encode($html));
?>