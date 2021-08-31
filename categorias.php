        <script>
var query = location.href.split('#');
 
var categoriabuscada = query[1];
if (categoriabuscada) {
		jQuery.noConflict();
			jQuery(function() {
jQuery(".item-categoria").css("opacity", "0.1");

jQuery("#"+categoriabuscada).css("opacity", "1");
$( "#nombreauto" ).text(categoriabuscada);
			});
			
}
 </script>
 <style>


.cat-caracteristicas #puertas{background:url(img/icon_puerta.png) no-repeat left; padding:10px; margin:4px; background-size:100%}
.cat-caracteristicas #aire{background:url(img/icon_aire.png) no-repeat left; padding:10px; margin:4px; background-size:100%}
.cat-caracteristicas #personas{background:url(img/icon_persona.png) no-repeat left; padding:10px; margin:4px; background-size:100%}
.cat-caracteristicas #maletas{background:url(img/icon_maletas.png) no-repeat left; padding:10px; margin:4px; background-size:100%}

.cat-caracteristicas #kilos{background:url(img/icon_cantidad_kilos.png) no-repeat left; padding:10px; margin:4px; background-size:100%}
.cat-caracteristicas #maletaspeque{background:url(img/icon_maleta_pequena.png) no-repeat left; padding:10px; margin:4px; background-size:100%}
.cat-caracteristicas #centralizado{background:url(img/icon_cierre_centralizado.png) no-repeat left; padding:10px; margin:4px; background-size:100%}
.cat-caracteristicas #disel{background:url(img/icon_disel.png) no-repeat left; padding:10px; margin:4px; background-size:100%}
.cat-caracteristicas #alarma{background:url(img/icon_alarma.png) no-repeat left; padding:10px; margin:4px; background-size:100%}
.cat-caracteristicas #direccion{background:url(img/icon_direccion_asistida.png) no-repeat left; padding:10px; margin:4px; background-size:100%}
.cat-caracteristicas #levantavidrios{background:url(img/icon_levantavidrios_electrico.png) no-repeat left; padding:10px; margin:4px; background-size:100%}
.cat-caracteristicas #airbag{background:url(img/icon_air_bag.png) no-repeat left; padding:10px; margin:4px; background-size:100%}
.cat-caracteristicas #vidrio_electrico{background:url(img/icon_vidrio_electrico.png) no-repeat left; padding:10px; margin:4px; background-size:100%}
.cat-caracteristicas #abs{background:url(img/icon_abs.png) no-repeat left; padding:10px; margin:4px; background-size:100%}
.cat-caracteristicas #isofix{background:url(img/icon_isofix.png) no-repeat left; padding:10px; margin:4px; background-size:100%}
.cat-caracteristicas #traccion{background:url(img/icon_control_de_traccion.png) no-repeat left; padding:10px; margin:4px; background-size:100%}
.cat-caracteristicas #doble_cabina{background:url(img/icon_doble_cabina.png) no-repeat left; padding:10px; margin:4px; background-size:100%}


.reservado{
	background:#f4f4f4;
	font-size:16px;
	box-shadow: 5px 5px 5px 0px rgba(133,131,133,0.4);
	margin-bottom:30px;
	padding:10px;
}

.estrellas{
	float: right;
	font-size:18px;
	color:#FC0;
		
}
.page-heading {
	background-image: url("img/categorias_azull.jpg");
	
}
</style>

<style type="text/css">


        .item-categoria {
            border-radius: 4px!important;
            overflow: hidden!important;
            border: 1px solid #ddd!important;
            box-shadow: none!important;
            max-width: 900px;
            min-height: 350px;
            margin: 20px;
            position: relative;
        }
        .item-categoria:hover {
            -moz-box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.50)!important;
            -webkit-box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.50)!important;
            box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.50)!important;
        }
.cat-texto {
    width: 66.66666667%;
    padding: 15px;
    text-align: left;
}

.cat-texto-derecha {
    float: left;
}
.cat-texto-izquierda {
    float: right;
}
.cat-foto-der {
    width: 33.33333333%;
    position: absolute;
    overflow: hidden;
    top: 0;
    bottom: 0;
}

.cat-foto-derecha {
    background-color: #2762be;
    right: 0;
}

.cat-foto-izquierda {
    background-color: #203a55;
    left: 0;
}

		
        .estrellas {
            float: right;
        }
        .cat-caracteristicas {
            padding-left: 0;   
        }
        .cat-caracteristicas li {
            float: left;
            padding: 10px 3px 3px 3px;
            margin: 3px;
            background-color: #eee;
            list-style: none;
            min-width: 140px;
            height: 40px;
            text-align: left;
            vertical-align: middle;
        }
        .cat-foto img {
            width: 280px;
            text-align: center;
            margin: 40px auto;
            display: block;
        }
		
		.txt-categoria img{
			width:20px;
			margin:0;
			margin-right:10px;
			text-align:left;
			display: inline
		}
        .txt-categoria {
            color: #fff;
            padding: 10px;
            text-transform: uppercase;
			text-align:left;
        }
        .add-btn-categoria {
            clear: both;
            text-align: right;
            margin-top: 10px;
        }
        .cat-agregar {
            width: 180px !important;
            padding: 15px !important;
            border: 0; 
            background: #359cdf !important;
            color: #fff !important;
            float: right !important;
            text-align: center !important;
            font-size: 14px !important;
            margin-top: 20px !important;
            font-weight: 400 !important;
            letter-spacing: 1px !important;
            height: auto !important;
            line-height: 10px !important;
            text-transform: none !important;
            cursor: pointer;
        }
        .cat-agregarR {
            width: 180px !important;
            padding: 15px !important;
            border: 0; 
            background: #547da1 !important;
            color: #fff !important;
            float: right !important;
            text-align: center !important;
            font-size: 14px !important;
            margin-top: 20px !important;
            font-weight: 400 !important;
            letter-spacing: 1px !important;
            height: auto !important;
            line-height: 10px !important;
            text-transform: none !important;
            cursor: pointer;
        }
        .miga_pan {
            padding-left: 0;
            text-align: center;
        }
        .miga_pan li {
            display: inline-block;
            vertical-align: middle;
            list-style: none;
        }
        .miga_pan li a {
            vertical-align: middle;
            display: inline-block;
            height: 25px;
            color: #000;
            text-decoration: underline;
            margin-right: 10px;
        }
        .icon-arrow-categoria {
            width: 25px;
            height: 25px;
            vertical-align: middle;
            display: inline-block;
            background-repeat: no-repeat;
            background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz48c3ZnIHdpZHRoPSIxMXB4IiBoZWlnaHQ9IjE5cHgiIHZpZXdCb3g9IjAgMCAxMSAxOSIgdmVyc2lvbj0iMS4xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIj4gICAgICAgIDx0aXRsZT5TaGFwZTwvdGl0bGU+ICAgIDxkZXNjPkNyZWF0ZWQgd2l0aCBTa2V0Y2guPC9kZXNjPiAgICA8ZGVmcz48L2RlZnM+ICAgIDxnIGlkPSJQYWdlLTEiIHN0cm9rZT0ibm9uZSIgc3Ryb2tlLXdpZHRoPSIxIiBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPiAgICAgICAgPGcgaWQ9IjI1cHgiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC05OTguMDAwMDAwLCAtMjE4MC4wMDAwMDApIiBmaWxsPSIjMDAwMDAwIj4gICAgICAgICAgICA8cGF0aCBkPSJNMTAwOC45OTgsMjE4OS40OTkgQzEwMDguOTk3LDIxODkuNTE2IDEwMDguOTk4LDIxODkuNTMyIDEwMDguOTk1LDIxODkuNTQ5IEMxMDA4Ljk4OSwyMTg5LjcyNyAxMDA4LjkxMSwyMTg5Ljg5OSAxMDA4Ljc1OSwyMTg5Ljk5NCBMOTk4LjczMSwyMTk4LjkyOCBDOTk4LjQ5NywyMTk5LjA3NSA5OTguMTk4LDIxOTguOTg5IDk5OC4wNjIsMjE5OC43MzMgQzk5Ny45MjYsMjE5OC40NzggOTk4LjAwNiwyMTk4LjE1MiA5OTguMjQxLDIxOTguMDA0IEwxMDA3Ljc4OSwyMTg5LjQ5OSBMOTk4LjI0MSwyMTgwLjk5NCBDOTk4LjAwNywyMTgwLjg0OCA5OTcuOTI3LDIxODAuNTIxIDk5OC4wNjIsMjE4MC4yNjUgQzk5OC4xOTgsMjE4MC4wMSA5OTguNDk3LDIxNzkuOTIzIDk5OC43MzEsMjE4MC4wNzEgTDEwMDguNzU5LDIxODkuMDA0IEMxMDA4LjkxMSwyMTg5LjEgMTAwOC45ODksMjE4OS4yNzIgMTAwOC45OTUsMjE4OS40NDkgQzEwMDguOTk4LDIxODkuNDY3IDEwMDguOTk3LDIxODkuNDgyIDEwMDguOTk4LDIxODkuNDk5IEwxMDA4Ljk5OCwyMTg5LjQ5OSBaIiBpZD0iU2hhcGUiPjwvcGF0aD4gICAgICAgIDwvZz4gICAgPC9nPjwvc3ZnPg==);
            }
        </style>
        
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
<div class="page-heading">
        <h1 class="title" style="color:#FFF"><?php echo utf8_encode(CATEGORIAS);?>


</h1>

</div>

<div class="miga_pan">
        <ul>
            <li>
                <a href="index.html">Home</a>
                <span class="icon-arrow-categoria"></span>
            </li>
            <li>
                <a href="categorias-alquiler-de-autos-en-ushuaia.html"><?php echo utf8_encode(CATEGORIA);?></a>
                <span class="icon-arrow-categoria"></span>
            </li>
            <li>
                <span id="nombreauto"></span>
            </li>
        </ul>
    </div>
    
<?php
     
$laSQL = "SELECT * FROM  Locales order by Nombre asc";
$result = mysqli_query($link,$laSQL);

			while ($rowL = mysqli_fetch_array($result)) {
				$Id=$rowL['Id'];
				$Nombre=$rowL['Nombre'];
				$arrayLocal[$Id]=$Nombre;

			}
			
			$localret=$_POST['localret'];
$localdev=$_POST['localdev'];
$retiro=$_POST['retiro'];
$devolucion=$_POST['devolucion'];
$HoraRetiro=$_POST['HoraRetiro'];
$HoraDevolucion=$_POST['HoraDevolucion'];
			?>		
   
<div class="container content-page" align="center">

<?php


if($localret){
echo"<div class='reservado'><h5>Tus datos de reserva son:</h5><strong>Lugar de Retiro</strong>: $arrayLocal[$localret] - <strong>Lugar de devolución:</strong> $arrayLocal[$localdev] - <strong>Día de retiro:</strong> $retiro (".$HoraRetiro."hs) - <strong>Día de devolución:</strong> $devolucion (".$HoraDevolucion."hs)

<br><a href='#modal' style='font-size:14px;color:#223a56;'>Cambiar datos</a></div>

<style>#barrareservas{display:none}</style>

";}
?>

<!--Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias 
-->
<p>
<div id="categorias">

            			<?php
$laSQL = "SELECT * FROM  categorias where Activo='1' ORDER BY orden";
$result = mysqli_query($link,$laSQL);
$i2=1;
			while ($rowL = mysqli_fetch_array($result)) {
				if (isset($_SESSION['idioma'])) {
					switch ($_SESSION['idioma']) {
						case 'es':
							
							$Nombre=utf8_encode($rowL['Nombre']);
							$Marca=utf8_encode($rowL['Marca']);
							$Precio=utf8_encode($rowL['Precio']);
				
						break;
						case 'po':
							$Nombre=utf8_encode($rowL['Nombre_Portugues']);
							$Marca=utf8_encode($rowL['Marca_Portugues']);
							$Precio=utf8_encode($rowL['Precio_Portugues']);
						break;
						case 'en':
							
							$Nombre=utf8_encode($rowL['Nombre_Ingles']);
							$Marca=utf8_encode($rowL['Marca_Ingles']);
							$Precio=utf8_encode($rowL['Precio_Ingles']);
						break;
						
					}
					
				}
				else{
					$Nombre=utf8_encode($rowL['Nombre']);
					$Marca=utf8_encode($rowL['Marca']);
					$Precio=utf8_encode($rowL['Precio']);
				}
				$Id=utf8_encode($rowL['Id']);
				$Categoria=utf8_encode($rowL['Categoria']);
				
				$Foto=utf8_encode($rowL['Foto']);
				$Link=utf8_encode($rowL['Link']);
				$Bajada=utf8_encode($rowL['Bajada']);
				
				$Estrellas=utf8_encode($rowL['Estrellas']);
				$EstrellasT=utf8_encode($rowL['EstrellasT']);

	if ($i2%2==0){$class='izquierda';}else {$class='derecha';}	
	
for ($i = 1; $i <= $Estrellas; $i++) {
   $Estrellastext.="&#9733;";
}
echo "<div class='item-categoria ' id='$Link'>
<div class='cat-foto cat-foto-der cat-foto-$class''>
            <div class='txt-categoria'><img src='img/logo-cuadrado-20x20.png'width='20' height='20' />$Categoria</div>
            <img src='$Foto'>
        </div>
		
		<div class='cat-texto cat-texto-$class'>
            <div class='estrellas'><img src='images/logo_".$EstrellasT."_ncap.jpg'>$Estrellastext</div>
            <h4>$Bajada</h4>
            <h3>$Nombre</h3>
            <h5>$Marca</h5>
            <div>
                <h5>$Precio</h5>
            </div>
            <ul class='cat-caracteristicas'>";
			
			
              $laSQL2 = "SELECT * FROM  categorias_detalles where Categoria='$Id' ";
			$result2 = mysqli_query($link,$laSQL2);
			
						while ($rowL = mysqli_fetch_array($result2)) {
							$Tipo=utf8_encode($rowL['Tipo']);
							if (isset($_SESSION['idioma'])) {
								switch ($_SESSION['idioma']) {
									case 'es':
										$Detalle=utf8_encode($rowL['Detalle']);
							
									break;
									case 'po':
										$Detalle=utf8_encode($rowL['Detalle_Portugues']);
									break;
									case 'en':
										
										$Detalle=utf8_encode($rowL['Detalle_Ingles']);
									break;
									
								}
								
							}
							else{
								$Detalle=utf8_encode($rowL['Detalle']);
							}
						
				
				
            echo"
            <li><i id='$Tipo'>&nbsp;</i>$Detalle</li>
            ";
			
						}
			$activada=0;
			//if ($_SESSION['idioma']=='es') {
				//mysql_select_db(db_base_gestion(), $dbh2); 
				$laSQL1 = "SELECT count(U.id) as cant FROM  categorias C INNER JOIN unidads U ON C.id = U.categoria_id WHERE C.activa = 1 AND U.activa = 1 AND C.categoria= '".$Categoria."'";
				//echo $laSQL1;
				$result1 = mysqli_query($dbh2,$laSQL1);
				
				if ($rowL1 = mysqli_fetch_array($result1)) {
					
					if ($rowL1['cant']>0) {
						$activada=1;
					}
					
				}
			//}
			
           echo" </ul>
            <div class='add-btn-categoria'>
			
			<form method='post' action='contacto-alquiler-de-autos-en-ushuaia.html'>
			  <input name='localret' type='hidden' value='$localret'>
  <input name='localdev' type='hidden' value='$localdev'>
  <input name='retiro' type='hidden' value='$retiro'>
  <input name='devolucion' type='hidden' value='$devolucion'>
  <input name='HoraRetiro' type='hidden' value='$HoraRetiro'>
  <input name='HoraDevolucion' type='hidden' value='$HoraDevolucion'><input type='hidden' name='auto' value='$Nombre'>
            <input type='submit' name='submit' id='submit' value='".utf8_encode(CONSULTAR)."' class='cat-agregar' onclick=\"this.form.action='contacto-alquiler-de-autos-en-ushuaia.html'\">";
           if ($activada) {
           		echo "<input type='submit' name='submit' id='submit' value='".utf8_encode(RESERVAR_ON_LINE)."' class='cat-agregarR' onclick=\"this.form.action='reserva-alquiler-de-autos-en-ushuaia.html'\">";
           } 
           
            echo "</form>
            </div>
        </div>
		
		</div>";


			$i2++; $Estrellastext="";}
			?>
            			
            
            
        





</div>




</div>