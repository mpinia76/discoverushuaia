<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style type="text/css">
.da-img{
	height:350px

}
.item{
text-align: center;
height: 100% !important;

}

.item .bajada{
	text-align: center;

	width: 50%;
	top: 300px;
	font-size: 12px;
	line-height: 14px;
	height: 80px;
	overflow: hidden;
	font-family: Arial, sans-serif;
	color:#FFF
}
.item h2{
		color: #fff;
	font-size: 40px;
	white-space: nowrap;
	text-transform: uppercase;
	z-index: 10;
	text-shadow: 1px 1px 1px rgba(0,0,0,0.1);
	font-weight: bold;
	top:250px;

    line-height: 36px;
    font-weight: 900;
    font-family: Lato;
	}



.da-link{
	top: 360px; /*depends on p height*/
	box-shadow: 0px 1px 1px rgba(0,0,0,0.1);
	color: #fff;
	text-shadow: 1px 1px 1px rgba(0,0,0,0.2);
	font-size: 18px;
	line-height: 30px;
	width: 160px;
	text-align: center;

		border: 0!important;
    border-radius: 0!important;
    background: #4D86E1!important;
    padding: 18px 15px!important;
}

.da-arrows-prev2{
	 background-image: url(images/arrows_rent.png);
	 background-position:left;
	 padding:0px 8px;

}
.da-arrows-next2{
	 background-image: url(images/arrows_rent.png);
	 background-position:right;
	 padding:0px 8px;

}

.page-heading {
  margin-bottom: 0px !important;
}
</style>


<div class="page-heading">
        <div class="container">
<div class="bs-example">
<div id="Home-up" class="carousel slide" data-interval="3000" data-ride="carousel">
<div class="carousel-inner">

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
$laSQL = "SELECT * FROM  `sliderhome` where Activo='1' and Ubicacion='homeup' order By Orden asc";
$result = mysqli_query($link,$laSQL);
$i=1;
			while ($rowS = mysqli_fetch_array($result)) {
				if (isset($_SESSION['idioma'])) {
					switch ($_SESSION['idioma']) {
						case 'es':

							$TituloS=utf8_encode($rowS['Titulo']);
							$BajadaS=utf8_encode($rowS['Bajada']);

						break;
						case 'po':
							$TituloS=utf8_encode($rowS['Titulo_Portugues']);
							$BajadaS=utf8_encode($rowS['Bajada_Portugues']);
						break;
						case 'en':

							$TituloS=utf8_encode($rowS['Titulo_Ingles']);
							$BajadaS=utf8_encode($rowS['Bajada_Ingles']);
						break;

					}

				}
				else{
					$TituloS=utf8_encode($rowS['Titulo']);
					$BajadaS=utf8_encode($rowS['Bajada']);
				}
				$FotoS=$rowS['Foto'];
				$LinkS=$rowS['Link'];
				if($rowS['Tipo']==1){$LinkS="categorias.html".$LinkS;}

if($i==1){$activo="active";}else{$activo="";}
echo "<div class='da-slider item $activo'>
<div class='da-img'><img src='$FotoS' height='350px'/></div>
<h2>$TituloS</h2>
<center><div class='bajada'>$BajadaS</div></center>
<p><a href='$LinkS' class='da-link'>".utf8_encode(CONSULTAR)."</a></p>

</div>

";

			$i++;
			}
			?>

</div>


<a class="left carousel-control" href="#Home-up" role="button" data-slide="prev">
<span class="da-arrows-prev2">&nbsp;</span>
</a>
<a class="right carousel-control" href="#Home-up" role="button" data-slide="next">
<span class="da-arrows-next2">&nbsp;</span>
</a>

</div>
</div>

<script type="text/javascript">
jQuery.noConflict();
			jQuery(document).ready(function(){
jQuery("#Home-up").carousel({
interval : 10000,//sliding time
pause: false
});
});
</script>
        </div>


</div>

<div class="container content-page">
    <div class="sidebar-position-without">
        <div class="row">

            <div class="content col-md-12">
                            			<?php
$laSQL = "SELECT * FROM  `home` where Visible='1'";
$result = mysqli_query($link,$laSQL);
$i=1;
			while ($row = mysqli_fetch_array($result)) {
				$Lugar=$row['Lugar'];
				if (isset($_SESSION['idioma'])) {
					switch ($_SESSION['idioma']) {
						case 'es':

							$Titulo[$Lugar]=utf8_encode($row['Titulo']);
							$Bajada[$Lugar]=utf8_encode($row['Bajada']);
							$Texto[$Lugar]=utf8_encode($row['Texto']);

						break;
						case 'po':
							$Titulo[$Lugar]=utf8_encode($row['Titulo_Portugues']);
							$Bajada[$Lugar]=utf8_encode($row['Bajada_Portugues']);
							$Texto[$Lugar]=utf8_encode($row['Texto_Portugues']);
						break;
						case 'en':

							$Titulo[$Lugar]=utf8_encode($row['Titulo_Ingles']);
							$Bajada[$Lugar]=utf8_encode($row['Bajada_Ingles']);
							$Texto[$Lugar]=utf8_encode($row['Texto_Ingles']);
						break;

					}

				}
				else{
					$Titulo[$Lugar]=utf8_encode($row['Titulo']);
					$Bajada[$Lugar]=utf8_encode($row['Bajada']);
					$Texto[$Lugar]=utf8_encode($row['Texto']);
				}
				$Foto[$Lugar]=$row['Foto'];
				$Link[$Lugar]=$row['Link'];

			}

			?>
            <?php if ($Texto['2-izq'] && $Texto['2-der']){include("box-home-2.php");}?>



<div class="vc_row-full-width vc_clearfix"></div><div id="about-us" data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid vc_custom_1475606661572 vc_row-no-padding vc_row-o-equal-height vc_row-o-content-middle vc_row-flex">





<?php
$laSQL = "SELECT * FROM  `sliderhome` where Activo='1' and Ubicacion='homeofer' ";
if (isset($_SESSION['idioma'])) {
	switch ($_SESSION['idioma']) {
		case 'es':

			$laSQL .= " AND Idioma = 'Es' ";

		break;
		case 'po':
			$laSQL .= " AND Idioma = 'Po' ";

		break;
		case 'en':
			$laSQL .= " AND Idioma = 'En' ";

		break;

	}

}
else{
	$laSQL .= " AND Idioma = 'Es' ";
}
$laSQL .= "order By Orden asc";
$result = mysqli_query($link,$laSQL);
$cantidaddefilas = mysqli_num_rows($result);

if($cantidaddefilas>0){echo'<div id="Home-slider2" class="carousel slide" data-interval="3000" data-ride="carousel">
<div class="carousel-inner">';};
$i=1;
			while ($rowS = mysqli_fetch_array($result)) {
				if (isset($_SESSION['idioma'])) {
					switch ($_SESSION['idioma']) {
						case 'es':

							$TituloS=utf8_encode($rowS['Titulo']);
							$BajadaS=utf8_encode($rowS['Bajada']);

						break;
						case 'po':
							$TituloS=utf8_encode($rowS['Titulo_Portugues']);
							$BajadaS=utf8_encode($rowS['Bajada_Portugues']);
						break;
						case 'en':

							$TituloS=utf8_encode($rowS['Titulo_Ingles']);
							$BajadaS=utf8_encode($rowS['Bajada_Ingles']);
						break;

					}

				}
				else{
					$TituloS=utf8_encode($rowS['Titulo']);
					$BajadaS=utf8_encode($rowS['Bajada']);
				}
				$FotoS=$rowS['Foto'];
				$LinkS=$rowS['Link'];
				if($rowS['Tipo']==1){$LinkS="index.php?p=categorias".$LinkS;}

if($i==1){$activo="active";}else{$activo="";}
echo "<div class='da-slider item $activo'><img src='$FotoS'/></div>";
$i++;
			}

			$cantidaddefilas = mysqli_num_rows($result);
if($cantidaddefilas>0){echo'</div>
</div>';};
			?>



<script type="text/javascript">
jQuery.noConflict();
			jQuery(document).ready(function(){
jQuery("#Home-slider2").carousel({
interval : 10000,//sliding time
pause: false
});
});
</script>
        </div>
 <br>
<div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner caja_sobre_nosotros"><div class="wpb_wrapper"><div id="banner-7280" class="banner  banner-type-1 align-center responsive-fonts valign-middle" ><img class="" src="<?=$Foto['3-nosotros'];?>" width="1000" height="800" alt="bg-nosotros-v3" title="bg-nosotros-v3" /><div class="banner-content  vc_custom_1475610556473"><h2 class="banner-title" ><?=$Titulo['3-nosotros'];?></h2>

<div class="content-inner">
<div style=" width:100%"><center>
<div style="text-align: center;width:400px"><?=$Texto['3-nosotros'];?></div>
</center></div>
</div></div></div><style type="text/css">#banner-7280 {background-color: transparent;}#banner-7280 img {opacity: 1;}#banner-7280:hover img {opacity: 1;}</style></div></div></div></div>


<div class="vc_row-full-width vc_clearfix" style="width:100%" id="videos">

                            			<?php
$laSQL = "SELECT * FROM  `videohome` where Activo='1'  order By rand() limit 0,1";
$result = mysqli_query($link,$laSQL);
$i=1;
			while ($rowV = mysqli_fetch_array($result)) {

				$LinkV=$rowV['Link'];

echo "<iframe width='560' height='315' src='https://www.youtube.com/embed/$LinkV' frameborder='0' allowfullscreen></iframe>";
$i++;
			}
			?>

        </div>
        <style>
		.home-bajo-mobile{display:none;}
		.home-bajo-nomobile{display: block;}

		@media screen and (max-width: 990px) {
		.home-bajo-mobile{display:block;}
		.home-bajo-nomobile{display:none;}

		}
		</style>
        <center>
        <div style=" width:90%; text-align:center" class="home-bajo-mobile">
        <div style="margin:30px 0px; padding:30px 10px">
        <img width="200" src="<?=$Foto['4-box1']?>" style="float:left" />
        <h2 style="font-size: 32px;color: #0c0c0c;text-align: right;font-family:Lato;font-weight:900;font-style:normal" class="vc_custom_heading wpb_animate_when_almost_visible wpb_left-to-right"><?=$Titulo['4-box1']?></h2>
        <p style="text-align: right;"><?=$Texto['4-box1']?></p>

       </div>

       <div style="margin:30px 0px; padding:30px 10px">
        <img width="200" src="<?=$Foto['4-box2']?>" style="float:right" />
        <h2 style="font-size: 32px;color: #0c0c0c;text-align: right;font-family:Lato;font-weight:900;font-style:normal" class="vc_custom_heading wpb_animate_when_almost_visible wpb_left-to-right"><?=$Titulo['4-box2']?></h2>
        <p style="text-align: right;"><?=$Texto['4-box2']?></p>

       </div>

       <div style="margin:30px 0px; padding:30px 10px">
        <img width="200" src="<?=$Foto['4-box3']?>" style="float:left" />
        <h2 style="font-size: 32px;color: #0c0c0c;text-align: right;font-family:Lato;font-weight:900;font-style:normal" class="vc_custom_heading wpb_animate_when_almost_visible wpb_left-to-right"><?=$Titulo['4-box3']?></h2>
        <p style="text-align: right;"><?=$Texto['4-box3']?></p>

       </div>
        </div></center>

        <div class="home-bajo-nomobile">
        <div data-vc-full-width="true" data-vc-full-width-init="true" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid vc_custom_1462348334564 vc_row-o-equal-height vc_row-o-content-middle vc_row-flex"><div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-offset-2 vc_col-lg-4 vc_col-md-offset-0 vc_col-md-6 vc_hidden-sm vc_col-xs-12 vc_hidden-xs"><div class="vc_column-inner vc_custom_1462367980405"><div class="wpb_wrapper"><h2 style="font-size: 32px;color: #0c0c0c;text-align: right;font-family:Lato;font-weight:900;font-style:normal" class="vc_custom_heading wpb_animate_when_almost_visible wpb_left-to-right"><?=$Titulo['4-box1']?></h2>
	<div class="wpb_text_column wpb_content_element  wpb_animate_when_almost_visible wpb_left-to-right">
		<div class="wpb_wrapper">
			<p style="text-align: right;"><?=$Texto['4-box1']?></p>

		</div>
	</div>
</div></div></div>
<div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-6 vc_col-md-6 vc_col-sm-offset-0 vc_hidden-sm vc_col-xs-12 vc_hidden-xs"><div class="vc_column-inner vc_custom_1462367975422"><div class="wpb_wrapper">
	<div class="wpb_single_image wpb_content_element vc_align_left  wpb_animate_when_almost_visible wpb_right-to-left">

		<figure class="wpb_wrapper vc_figure">
			<div class="vc_single_image-wrapper   vc_box_border_grey"><img width="407" height="487" src="<?=$Foto['4-box1']?>" class="vc_single_image-img attachment-full"   sizes="(max-width: 407px) 100vw, 407px" /></div>
		</figure>
	</div>
</div></div></div></div><div class="vc_row-full-width vc_clearfix"></div><div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid vc_custom_1462348376708 vc_row-o-equal-height vc_row-o-content-middle vc_row-flex"><div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-6 vc_col-md-6 vc_col-xs-12"><div class="vc_column-inner vc_custom_1462367655426"><div class="wpb_wrapper">
	<div class="wpb_single_image wpb_content_element vc_align_right  wpb_animate_when_almost_visible wpb_left-to-right">

		<figure class="wpb_wrapper vc_figure">
			<div class="vc_single_image-wrapper   vc_box_border_grey"><img width="407" height="487" src="<?=$Foto['4-box2']?>"/></div>
		</figure>
	</div>
</div></div></div><div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-4 vc_col-md-6 vc_col-xs-12"><div class="vc_column-inner vc_custom_1462367898373"><div class="wpb_wrapper"><h2 style="font-size: 32px;color: #0c0c0c;text-align: left;font-family:Lato;font-weight:900;font-style:normal" class="vc_custom_heading wpb_animate_when_almost_visible wpb_right-to-left"><?=$Titulo['4-box2']?></h2>
	<div class="wpb_text_column wpb_content_element  wpb_animate_when_almost_visible wpb_right-to-left">
		<div class="wpb_wrapper">
			<p><?=$Texto['4-box2']?></p>

		</div>
	</div>
</div></div></div></div><div class="vc_row-full-width vc_clearfix"></div><div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid vc_custom_1462348334564 vc_row-o-equal-height vc_row-o-content-middle vc_row-flex"><div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-offset-2 vc_col-lg-4 vc_col-md-offset-0 vc_col-md-6 vc_hidden-sm vc_col-xs-12 vc_hidden-xs"><div class="vc_column-inner vc_custom_1462367980405"><div class="wpb_wrapper"><h2 style="font-size: 32px;color: #0c0c0c;text-align: right;font-family:Lato;font-weight:900;font-style:normal" class="vc_custom_heading wpb_animate_when_almost_visible wpb_left-to-right"><?=$Titulo['4-box3']?></h2>
	<div class="wpb_text_column wpb_content_element  wpb_animate_when_almost_visible wpb_left-to-right">
		<div class="wpb_wrapper">
			<p style="text-align: right;"><?=$Texto['4-box3']?></p>

		</div>
	</div>
</div></div></div><div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-6 vc_col-md-6 vc_col-sm-offset-0 vc_hidden-sm vc_col-xs-12 vc_hidden-xs"><div class="vc_column-inner vc_custom_1462367975422"><div class="wpb_wrapper">
	<div class="wpb_single_image wpb_content_element vc_align_left  wpb_animate_when_almost_visible wpb_right-to-left">

		<figure class="wpb_wrapper vc_figure">
			<div class="vc_single_image-wrapper   vc_box_border_grey"><img width="480" height="315" src="<?=$Foto['4-box3']?>"  sizes="(max-width: 480px) 100vw, 480px" /></div>
		</figure>
	</div>
</div></div></div></div><div class="vc_row-full-width vc_clearfix"></div><div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid vc_custom_1475606626849 vc_row-has-fill vc_row-no-padding"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner "><div class="wpb_wrapper"><div id="banner-3615" class="banner  banner-type-1 align-center responsive-fonts valign-middle font-style-light" ><img width="1280" height="300" src="https://www.discoverushuaia.com.ar/tienda/wp-content/uploads/2016/05/bg-home-dos.jpg" class="attachment-full" alt="bg-home-dos" srcset="https://www.discoverushuaia.com.ar/tienda/wp-content/uploads/2016/05/bg-home-dos.jpg 1280w, https://www.discoverushuaia.com.ar/tienda/wp-content/uploads/2016/05/bg-home-dos-300x70.jpg 300w, https://www.discoverushuaia.com.ar/tienda/wp-content/uploads/2016/05/bg-home-dos-768x180.jpg 768w, https://www.discoverushuaia.com.ar/tienda/wp-content/uploads/2016/05/bg-home-dos-1024x240.jpg 1024w, https://www.discoverushuaia.com.ar/tienda/wp-content/uploads/2016/05/bg-home-dos-205x48.jpg 205w, https://www.discoverushuaia.com.ar/tienda/wp-content/uploads/2016/05/bg-home-dos-555x130.jpg 555w, https://www.discoverushuaia.com.ar/tienda/wp-content/uploads/2016/05/bg-home-dos-720x169.jpg 720w, https://www.discoverushuaia.com.ar/tienda/wp-content/uploads/2016/05/bg-home-dos-100x23.jpg 100w" sizes="(max-width: 1280px) 100vw, 1280px" /><div class="banner-content "><h2 class="banner-subtitle" ><?php echo utf8_encode(NO_SE_RECUERDAN);?></h2><div class="content-inner"><a class="btn medium" href="categorias.html"><span><?php echo utf8_encode(EMPEZA_AHORA);?></span></a></div></div></div><style type="text/css">#banner-3615 {background-color: transparent;}#banner-3615 img {opacity: 1;}#banner-3615:hover img {opacity: 1;}</style></div></div></div></div><div class="vc_row-full-width vc_clearfix"></div>

                    <div class="post-navigation"></div>
            </div>


        </div><!-- end row-fluid -->

    </div>
</div>
