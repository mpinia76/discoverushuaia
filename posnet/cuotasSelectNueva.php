<?php

	include("../conex.php");
	include("../db.php");
	/*$vdir = db_dir();
	$vusr = db_usr();
	$vpass = db_pass();
	$vbase = db_base();
	$link=Conectarse( $vdir, $vusr, $vpass, $vbase);*/
	$dbh2 = mysqli_connect(db_dir_gestion(), db_usr_gestion(), db_pass_gestion(), db_base_gestion());



$html = '';
$html .= '<select name="CUOTAS" size="1" id="cuotas" style="display:inline" onChange="seleccionarCuota(this);" required>';
$laSQL = "SELECT * FROM cobro_tarjeta_cuotas CTC INNER JOIN cobro_tarjeta_tipos CTT ON CTC.cobro_tarjeta_tipo_id = CTT.id  WHERE CTT.cobro_tarjeta_posnet_id=1 AND CTC.activa=1 AND CTT.id_decidir = '".$_GET['tarjeta']."' order by mascara_web asc";
//echo $laSQL.' - '.mysqli_affected_rows($link);
$result = mysqli_query($dbh2,$laSQL);
$i=1;
if(mysqli_affected_rows($link)!=0){
	while ($rowL = mysqli_fetch_array($result)) {
	//$Id=$rowL['id'];
 	if ($rowL['cuota']== $_GET['cuotaSeleccionada']) {
    	$selected = '  selected="selected"';
    } else {
        $selected = '';
    }
	$html .= '<option ' . $selected . ' value="'.$rowL['cuota'].'-'.$rowL['interes'].'">' . $rowL['mascara_web'] . '</option>';
            }
}


        $html .= '</select>';



echo (utf8_encode($html));
?>
