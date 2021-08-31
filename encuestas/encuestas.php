<?php
require("favoritas.common.php");
include("reservas.inc.php");
include("inc_favoritas.php");
$favoritas=$_SESSION['reserva'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Page-Enter" content="revealTrans(Duration=1, Transition=5)" >
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Village de las Pampas - Reservas On-Line</title>
<meta name="description" content="Vea que opinan nuestros huespedes de nueestros servicios y apartamentos." />
<meta name="keywords" content="<?php echo $keys?>" />
<link href="village.css" rel="stylesheet" type="text/css" />
<?php $xajax->printJavascript(); ?>

<script type="text/javascript" src="swfobject.js"></script>
<script type="text/javascript">
	swfobject.embedSWF("promociones_menu.swf?id=122", "swf_promociones_menu", "100", "350", "0","","",{wmode: "transparent"});
</script>
<script type="text/javascript">
	swfobject.embedSWF("servicios_banner.swf?id=534", "swf_servicios_banner", "170", "350", "0","","",{wmode: "transparent"});
</script>

<!--JQuery Date Picker-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="scripts/date.js"></script>
<!--[if IE]><script type="text/javascript" src="scripts/jquery.bgiframe.js"></script><![endif]-->
<script type="text/javascript" src="scripts/jquery.datePicker.min-2.1.2.js"></script>
<link href="scripts/datePicker.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" charset="utf-8">
$(function()
{
	$('.date-pick').datePicker()
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
<style type="text/css">
a.dp-choose-date {
	float: right;
	width: 16px;
	height: 16px;
	padding: 0;
	margin: 5px 3px 0;
	display: block;
	text-indent: -2000px;
	overflow: hidden;
	background: url(scripts/calendar.png) no-repeat;
}
a.dp-choose-date.dp-disabled {
	background-position: 0 -20px;
	cursor: default;
}
input.dp-applied {
	width: 70px;
	float: right;
}
</style>
<!--/JQuery Date Picker-->

</head>
<div id="top">
	<?php include('top2.php'); ?>
</div>
<div id="contenido" style="background-image:url(images/back_encuestas.jpg)">
	<div id="swf_promociones_menu" style="width:100px; float:left;">
		<div id="mensaje">
			<br />
			<span style="font:normal 12px arial; color:#000; text-align:center;">
			<b>Su versi&oacute;n de Flash Player es antigua o no est&aacute; instalada.<br />
			Para navegar este sitio correctamente, por favor instale<br />
			la &uacute;ltima versi&oacute;n haciendo <a href="http://www.adobe.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash&Lang=Spanish" style="color:red;">click aqu&iacute;</a></b><br /><br />
			</span>
		</div>
	</div>
<div id="central" style="width:610px; padding-top:62px;">
        <div id="alert" class="mensaje" style="display:none; z-index:100; left:33%; top:170px;">
			<div id="alert_text" style="height:auto; overflow:auto;"></div>
            <a href="#" onclick="xajax_cerrarVentana();">
			<div class="cerrar">Cerrar</div></a>
        </div>
		<div style="padding:10px; width:590px; overflow:auto; height:230px;">
		<?php
		include("admin/config.php");
		$conn = mysqli_connect($host, $db_user, $db_pass, $db);
		$sql = "SELECT * FROM encuesta_web";

        $rsTemp = mysqli_query($conn, $sql);
		$rs=mysqli_fetch_array($rsTemp);
		?>
		<?php echo $rs['texto']?>
		</div>
</div>
<!--central-->
	<div id="swf_servicios_banner">
		<div id="mensaje">
		  <br />
		  <span style="font:normal 12px arial; color:#000; text-align:center;">
				<b>Su versi&oacute;n de Flash Player es antigua o no est&aacute; instalada.<br />
				Para navegar este sitio correctamente, por favor instale<br />
				la &uacute;ltima versi&oacute;n haciendo <a href="http://www.adobe.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash&Lang=Spanish" style="color:red;">click aqu&iacute;</a></b><br /><br />
		  </span>
		</div>
	</div>
</div>
<div id="bottom">
	<?php include('bottom2.php'); ?>
</div>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-2975430-1");
pageTracker._trackPageview();
} catch(err) {}</script>
</body>
</html>

