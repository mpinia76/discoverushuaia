<?php

include("conex.php");

include("db.php");

$vdir = db_dir();

$vusr = db_usr();

$vpass = db_pass();

$vbase = db_base();

$link=Conectarse( $vdir, $vusr, $vpass, $vbase);

$laSQL = "SELECT * FROM  banderas";

$result = mysqli_query($link,$laSQL);



if ($rowL = mysqli_fetch_array($result)) {

	$banderaEs = $rowL['es'];

	$banderaEn = $rowL['en'];

	$banderaPo = $rowL['po'];

}

$html = '<center>';

if ($banderaEs) {

	$html .= '<dd style="width:100%;"><a href="discoverpayes.html"><img class="HoverBorder" src="images/argentina.png" width="80px" height="56px" alt="Espa�ol" /> </a></dd>';

}

if ($banderaPo) {

	$html .= '<dd style="width:100%;"><a href="discoverpaypo.html"><img class="HoverBorder" src="images/brasil.png" width="80px" height="56px" alt="Portugues" /> </a></dd>';

}

if ($banderaEn) {

	$html .= '<dd style="width:100%;"><a href="discoverpayen.html"><img class="HoverBorder" src="images/eeuu.png" width="80px" height="56px" alt="Ingles" /> </a></dd>';

}







 $html .= '</center>';



echo $html;
