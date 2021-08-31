<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="js/date.js"></script>
<!--[if IE]><script type="text/javascript" src="../scripts/jquery.bgiframe.js"></script><![endif]-->
<script type="text/javascript" src="js/jquery.datePicker.min-2.1.2.js"></script>
<link href="js/datePicker.css" rel="stylesheet" type="text/css" />
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
<?PHP
function fechasql($fecha){
	$part=explode("/",$fecha);
	$mysql=$part[2]."-".$part[1]."-".$part[0];
	return $mysql;
}


?>

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
	background: url(http://localhost//discoverushuaia/admin/js/calendar.png) no-repeat;
}
a.dp-choose-date.dp-disabled {
	background-position: 0 -20px;
	cursor: default;
}
input.dp-applied {
	width: 70px;
	float: left;
}
.titulo_secundario {
	font-family: Arial, Helvetica, sans-serif;
	font-size:small;
}
#titulo_pregunta{
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
	font-weight:bold;
	border-bottom:#CCCCCC solid 1px;
	padding:3px;
	margin-top:10px;
}
#respuestas{
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
	text-align:center;
	padding:5px;
}
#tabla{
	float:left;
	width:160px;
	height:120px;
	padding:5px;
	text-align:center;
	font-size:10px;
}
</style>

<font face="Arial" style="font-size: 11pt">Estas consultando: <b>Encuestas de satisfacci&oacute;n</b></font>
<form method="post" action="">
<p><div class="titulo_secundario" style="float:left; margin-top:3px;">Desde &nbsp;</div>
<input name="retiro" size="5" id="start-date" class="date-pick" value="<?php echo $_POST['retiro']?>" />
<div class="titulo_secundario" style="float:left; margin-top:3px;"> &nbsp; hasta &nbsp; </div>
<input name="devolucion" size="5" id="end-date" class="date-pick" value="<?php echo $_POST['devolucion']?>" />
<div class="titulo_secundario" style="float:left; margin-top:3px;">
&nbsp; <input type="submit" name="buscar" value="Buscar" /> <input type="submit" name="todos" value="Todas las encuestas" />
</div></p>
<div style="clear:both;"></div>
</form>
<?php
include("preguntas.inc.php");
if(isset($_POST['buscar']) and $_POST['retiro']!="" and $_POST['devolucion']!=""){
	$sql = "SELECT encuesta_respuestas.*,encuesta.id FROM encuesta INNER JOIN encuesta_respuestas ON encuesta.id=encuesta_respuestas.encuesta_id WHERE
			encuesta.retiro>='".fechasql($_POST['retiro'])."' AND encuesta.devolucion<='".fechasql($_POST['devolucion'])."'";
}elseif(isset($_POST['todos'])){
	$sql = "SELECT encuesta_respuestas.*,encuesta.id FROM encuesta INNER JOIN encuesta_respuestas ON encuesta.id=encuesta_respuestas.encuesta_id";
}
if(isset($_POST)){
	$rsTemp = mysqli_query($link,$sql);
	if(mysqli_affected_rows($link)>0){
		while($rs = mysqli_fetch_array($rsTemp)){
			$encuestas[$rs['id']]=1;
			if(!isset($respuestas[$rs['pregunta_id']][$rs['valor']])){
				$respuestas[$rs['pregunta_id']][$rs['valor']] = 1;
			}else{
				$respuestas[$rs['pregunta_id']][$rs['valor']]++;
			}
		}
		foreach($respuestas as $preg=>$resp){
			foreach($resp as $valor=>$cant){
				if($preg=="2" or $preg=="3"){
					$reservas[$valor]=$reservas[$valor] + 1;
				}elseif($preg=="4" or $preg=="5"){
					$coche[$valor]=$coche[$valor] + 1;
				}elseif($preg=="6" or $preg=="7" or $preg=="8" or $preg=="9"){
					$empresa[$valor]=$empresa[$valor] + 1;
				}
			}
		}


		foreach($respuestas as $preg=>$resp){
			$total = array_sum($resp);
			//if($preg!=7){
?>
				<div id="titulo_pregunta">
				<?php echo $pregunta[$preg]?>
				</div>
				<div id="respuestas">
<?php
				foreach($resp as $valor=>$cant){ //genero los valores para los graficos
					//if($preg!=7){
						$etiquetas[]=$respuesta[$preg][$valor];
					/*}else{
						$etiquetas[]=$valor;
					}*/
					$valores[]=round($cant/$total*100,2);
				}
?>
				<img src="
				http://chart.apis.google.com/chart?
				chs=600x120
				&chd=t:<?php echo implode(",",$valores)?>
				&cht=p3
				&chco=00FF00
				&chl=<?php echo implode("|",$etiquetas)?>&chdl=<?php echo implode("|",$valores)?>"
				/>
				<br />Esta pregunta obtuvo <?php echo $total?> respuestas en <?php echo count($encuestas)?> encuestas encontradas
				</div>
<?php
				$etiquetas="";
				$valores="";
			//}
		} //foreach que recorre las respuesats
?>
		<!--Servicios-->
		<div id="titulo_pregunta">
		Reservas
		</div>
		<div id="respuestas">
		<table cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td width="50%">
<?php
				$total = array_sum($reservas);
				foreach($reservas as $valor=>$cant){
					$etiquetas[]=$valor;
					$valores[]=round($cant/$total*100,2);
				}
?>
					<img src="
					http://chart.apis.google.com/chart?
					chs=300x120
					&chd=t:<?php echo implode(",",$valores)?>
					&cht=p3
					&chco=00FF00
					&chl=<?php echo implode("|",$etiquetas)?>&chdl=<?php echo implode("|",$valores)?>"
					/>
					<br /><br />
<?php
				$etiquetas="";
				$valores="";
				$promedio=($reservas['5']*100+$reservas['4']*75+$reservas['3']*50+$reservas['2']*25+$reservas['1']*10)/$total;
?>
					<img src="
					http://chart.apis.google.com/chart?
					chs=300x120
					&cht=gom
					&chd=t:<?php echo $promedio?>
					&chl=Promedio"
					/>
				</td>
				<td>
<?php
				foreach($respuestas as $preg=>$resp){
					$total = array_sum($resp);
					if($preg=="2" or $preg=="3"){
						foreach($resp as $valor=>$cant){ //genero los valores para los graficos
							/*if($preg!=7){
								$etiquetas[]=$respuesta[$preg][$valor];
							}else{*/
								$etiquetas[]=$valor;
							//}
							$valores[]=round($cant/$total*100,2);
						}
?>
						<div id="tabla">
						<strong><?php echo $pregunta[$preg]?></strong><br />
						<img src="
						http://chart.apis.google.com/chart?
						chs=150x70
						&chd=t:<?php echo implode(",",$valores)?>
						&cht=p3
						&chco=00FF00
						&chl=<?php echo implode("|",$etiquetas)?>&chdl=<?php echo implode("|",$valores)?>"
						/>
						<br /><?php echo $total?> / <?php echo count($encuestas)?>
						</div>
<?php
						$etiquetas="";
						$valores="";
					}
				} //foreach que recorre las respuesats
?>
				</td>
			</tr>
		</table>
		</div>
		<!--/Servicios-->

		<!--Limpieza-->
		<div id="titulo_pregunta">
		Coches
		</div>
		<div id="respuestas">
		<table cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td width="50%">
<?php
				$total = array_sum($coche);
				foreach($coche as $valor=>$cant){
					$etiquetas[]=$valor;
					$valores[]=round($cant/$total*100,2);
				}
?>
					<img src="
					http://chart.apis.google.com/chart?
					chs=300x120
					&chd=t:<?php echo implode(",",$valores)?>
					&cht=p3
					&chco=00FF00
					&chl=<?php echo implode("|",$etiquetas)?>&chdl=<?php echo implode("|",$valores)?>"
					/>
					<br /><br />
<?php
				$etiquetas="";
				$valores="";
				$promedio=($coche['5']*100+$coche['4']*75+$coche['3']*50+$coche['2']*25+$coche['1']*10)/$total;
?>
					<img src="
					http://chart.apis.google.com/chart?
					chs=300x120
					&cht=gom
					&chd=t:<?php echo $promedio?>
					&chl=Promedio"
					/>
				</td>
				<td>
<?php
				foreach($respuestas as $preg=>$resp){
					$total = array_sum($resp);
					if($preg=="4" or $preg=="5"){
						foreach($resp as $valor=>$cant){ //genero los valores para los graficos
							/*if($preg!=7){
								$etiquetas[]=$respuesta[$preg][$valor];
							}else{*/
								$etiquetas[]=$valor;
							//}
							$valores[]=round($cant/$total*100,2);
						}
?>
						<div id="tabla">
						<strong><?php echo $pregunta[$preg]?></strong><br />
						<img src="
						http://chart.apis.google.com/chart?
						chs=150x70
						&chd=t:<?php echo implode(",",$valores)?>
						&cht=p3
						&chco=00FF00
						&chl=<?php echo implode("|",$etiquetas)?>&chdl=<?php echo implode("|",$valores)?>"
						/>
						<br /><?php echo $total?> / <?php echo count($encuestas)?>
						</div>
<?php
						$etiquetas="";
						$valores="";
					}
				} //foreach que recorre las respuesats
?>
				</td>
			</tr>
		</table>
		</div>
		<!--/Limpieza-->

		<!--Restaurante-->
		<div id="titulo_pregunta">
		Empresa
		</div>
		<div id="respuestas">
		<table cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td width="50%">
<?php
				$total = array_sum($empresa);
				foreach($empresa as $valor=>$cant){
					$etiquetas[]=$valor;
					$valores[]=round($cant/$total*100,2);
				}
?>
					<img src="
					http://chart.apis.google.com/chart?
					chs=300x120
					&chd=t:<?php echo implode(",",$valores)?>
					&cht=p3
					&chco=00FF00
					&chl=<?php echo implode("|",$etiquetas)?>&chdl=<?php echo implode("|",$valores)?>"
					/>
					<br /><br />
<?php
				$etiquetas="";
				$valores="";
				$promedio=($empresa['5']*100+$empresa['4']*75+$empresa['3']*50+$empresa['2']*25+$empresa['1']*10)/$total;
				/*echo $promedio."<br>";
				echo $total."<br>";*/
?>
					<img src="
					http://chart.apis.google.com/chart?
					chs=300x120
					&cht=gom
					&chd=t:<?php echo $promedio?>
					&chl=Promedio"
					/>
				</td>
				<td>
<?php
				foreach($respuestas as $preg=>$resp){
					$total = array_sum($resp);
					if($preg=="6" or $preg=="7" or $preg=="8" or $preg=="9"){
						foreach($resp as $valor=>$cant){ //genero los valores para los graficos
							/*if($preg!=7){
								$etiquetas[]=$respuesta[$preg][$valor];
							}else{*/
								$etiquetas[]=$valor;
							//}
							$valores[]=round($cant/$total*100,2);
						}
?>
						<div id="tabla">
						<strong><?php echo $pregunta[$preg]?></strong><br />
						<img src="
						http://chart.apis.google.com/chart?
						chs=150x70
						&chd=t:<?php echo implode(",",$valores)?>
						&cht=p3
						&chco=00FF00
						&chl=<?php echo implode("|",$etiquetas)?>&chdl=<?php echo implode("|",$valores)?>"
						/>
						<br /><?php echo $total?> / <?php echo count($encuestas)?>
						</div>
<?php
						$etiquetas="";
						$valores="";
					}
				} //foreach que recorre las respuesats
?>
				</td>
			</tr>
		</table>
		</div>
		<!--/Restaurante-->
<?php
	}else{ //sino hay resultados
?>
	<p class="titulo_secundario" align="center">No se encontraron encuestas en las fechas seleccionadas</p>
<?php
	}
}
?>
