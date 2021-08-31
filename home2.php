<div class="page-heading">
        <div class="container">
        <link rel="stylesheet" type="text/css" href="css/slider.css" />
			<div id="da-slider" class="da-slider">

            			<?php
$laSQL = "SELECT * FROM  `sliderhome` where Activo='1' and Ubicacion='homeup' order By Orden asc";
$result = mysqli_query($link,$laSQL);
$i=1;
			while ($rowS = mysqli_fetch_array($result)) {
				$TituloS=utf8_encode($rowS['Titulo']);
				$BajadaS=utf8_encode($rowS['Bajada']);
				$FotoS=$rowS['Foto'];
				$LinkS=$rowS['Link'];
				if($rowS['Tipo']==1){$LinkS="index.php?p=categorias".$LinkS;}


echo "<div class='da-slide'>
  					<div class='da-img'><img src='$FotoS'/></div>
					<h2>$TituloS</h2>
					<p>$BajadaS</p>
					<a href='$LinkS' class='da-link'>CONSULTAR</a>
				</div>";

			}
			?>




				<nav class="da-arrows">
					<span class="da-arrows-prev"></span>
					<span class="da-arrows-next"></span>
				</nav>
			</div>
        </div>
		<script type="text/javascript" src="js/jquery.cslider.js"></script>
		<script type="text/javascript">
		jQuery.noConflict();
			jQuery(function() {

				jQuery('#da-slider').cslider({
					autoplay	: true,
					paginator: false

				});

			});

		</script>

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
				$Titulo[$Lugar]=utf8_encode($row['Titulo']);
				$Bajada[$Lugar]=utf8_encode($row['Bajada']);
				$Texto[$Lugar]=utf8_encode($row['Texto']);
				$Foto[$Lugar]=$row['Foto'];
				$Link[$Lugar]=$row['Link'];

			}
			?>
                    <div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid vc_custom_1475605877480 vc_row-no-padding"><div class="wpb_column vc_column_container vc_col-sm-6"><div class="vc_column-inner "><div class="wpb_wrapper"><div id="banner-9310" class="banner  banner-type-1 align-left responsive-fonts valign-middle font-style-light" ><img width="9" height="5" src="http://localhost//discoverushuaia/tienda/wp-content/uploads/2016/05/fondo-azul.jpg" class="attachment-full" alt="fondo-azul" /><div class="banner-content  vc_custom_1475605839110"><h2 class="banner-subtitle" ><?php echo $Bajada['2-izq']?></h2><h2 class="banner-title" ><?php echo $Titulo['2-izq']?></h2><div class="content-inner"></p>
<p style="opacity: 0.8; margin-bottom: 30px;"><?php echo $Texto['2-izq']?></p>
<p><a class="btn medium black" href="<?php echo $Link['2-izq']?>"><span>Ver Modelos</span></a></div></div></div><style type="text/css">#banner-9310 {background-color: #003382;}#banner-9310 img {opacity: 1;}#banner-9310:hover img {opacity: 1;}</style></div></div></div><div class="wpb_column vc_column_container vc_col-sm-6"><div class="vc_column-inner "><div class="wpb_wrapper"><div id="banner-6296" class="banner  banner-type-1 align-left responsive-fonts valign-middle font-style-light" ><img width="9" height="5" src="http://localhost//discoverushuaia/tienda/wp-content/uploads/2016/05/fondo-celeste.jpg" class="attachment-full" alt="fondo-celeste" /><div class="banner-content  vc_custom_1475605795223"><h2 class="banner-subtitle" ><?php echo $Bajada['2-izq']?></h2><h2 class="banner-title" ><?php echo $Titulo['2-izq']?></h2><div class="content-inner"></p>
<p style="opacity: 0.8; margin-bottom: 30px;"><?php echo $Texto['2-izq']?></p>
<p><a class="btn medium black" href="<?php echo $Link['2-izq']?>"><span>Ver Modelos</span></a></div></div></div><style type="text/css">#banner-6296 {background-color: #1e73be;}#banner-6296 img {opacity: 1;}#banner-6296:hover img {opacity: 1;}</style></div></div></div></div><div class="vc_row-full-width vc_clearfix"></div><div id="about-us" data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid vc_custom_1475606661572 vc_row-no-padding vc_row-o-equal-height vc_row-o-content-middle vc_row-flex"><div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-offset-0 vc_col-lg-12 vc_col-md-offset-0 vc_col-md-12 vc_col-sm-offset-1 vc_col-xs-offset-1 vc_col-xs-10"><div class="vc_column-inner vc_custom_1475605232054"><div class="wpb_wrapper">
	<div class="wpb_single_image wpb_content_element vc_align_right  wpb_animate_when_almost_visible wpb_left-to-right vc_custom_1475605692331">


		<figure class="wpb_wrapper vc_figure">
			<div id="da-slider2" class="da-slider" style=" position: inherit; height:500px">

                            			<?php
$laSQL = "SELECT * FROM  `sliderhome` where Activo='1' and Ubicacion='homeofer' order By Orden asc";
$result = mysqli_query($link,$laSQL);
$i=1;
			while ($rowS = mysqli_fetch_array($result)) {
				$TituloS=utf8_encode($rowS['Titulo']);
				$BajadaS=utf8_encode($rowS['Bajada']);
				$FotoS=$rowS['Foto'];
				$LinkS=$rowS['Link'];
				if($rowS['Tipo']==1){$LinkS="index.php?p=categorias".$LinkS;}
				if($i==1){$relative="style='position: relative'";}else{$relative="";}

echo "<div class='da-slide' $relative><img src='$FotoS'/></div>";
$i++;
			}
			?>




        </div>


		<script type="text/javascript">
		jQuery.noConflict();
			jQuery(function() {

				jQuery('#da-slider2').cslider({
					autoplay	: true,
					paginator: false

				});

			});

		</script>

		</figure>
	</div>
</div></div></div><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner "><div class="wpb_wrapper"><div id="banner-7280" class="banner  banner-type-1 align-center responsive-fonts valign-middle" ><img class="" src="<?php echo $Foto['3-nosotros'];?>" width="1000" height="300" alt="bg-nosotros-v3" title="bg-nosotros-v3" /><div class="banner-content  vc_custom_1475610556473"><h2 class="banner-title" ><?php echo $Titulo['3-nosotros'];?></h2><div class="content-inner"></p>
<div style=" width:100%"><center></p>
<div style="text-align: center;width:400px"><?php echo $Texto['3-nosotros'];?></div>
<p></center></div>
<p></div></div></div><style type="text/css">#banner-7280 {background-color: transparent;}#banner-7280 img {opacity: 1;}#banner-7280:hover img {opacity: 1;}</style></div></div></div></div>


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
		.home-bajo-nomobile{display: inherit;}

		@media screen and (max-width: 990px) {
		.home-bajo-mobile{display:inline;}
		.home-bajo-nomobile{display:none;}

		}
		</style>
        <center>
        <div style=" width:90%; text-align:center" class="home-bajo-mobile">
        <div style="margin:30px 0px; padding:30px 10px">
        <img width="200" src="<?php echo $Foto['4-box1']?>" style="float:left" />
        <h2 style="font-size: 32px;color: #0c0c0c;text-align: right;font-family:Lato;font-weight:900;font-style:normal" class="vc_custom_heading wpb_animate_when_almost_visible wpb_left-to-right"><?php echo $Titulo['4-box1']?></h2>
        <p style="text-align: right;"><?php echo $Texto['4-box1']?></p>

       </div>

       <div style="margin:30px 0px; padding:30px 10px">
        <img width="200" src="<?php echo $Foto['4-box2']?>" style="float:right" />
        <h2 style="font-size: 32px;color: #0c0c0c;text-align: right;font-family:Lato;font-weight:900;font-style:normal" class="vc_custom_heading wpb_animate_when_almost_visible wpb_left-to-right"><?php echo $Titulo['4-box2']?></h2>
        <p style="text-align: right;"><?php echo $Texto['4-box2']?></p>

       </div>

       <div style="margin:30px 0px; padding:30px 10px">
        <img width="200" src="<?php echo $Foto['4-box3']?>" style="float:left" />
        <h2 style="font-size: 32px;color: #0c0c0c;text-align: right;font-family:Lato;font-weight:900;font-style:normal" class="vc_custom_heading wpb_animate_when_almost_visible wpb_left-to-right"><?php echo $Titulo['4-box3']?></h2>
        <p style="text-align: right;"><?php echo $Texto['4-box3']?></p>

       </div>
        </div></center>

        <div class="home-bajo-nomobile">
        <div data-vc-full-width="true" data-vc-full-width-init="true" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid vc_custom_1462348334564 vc_row-o-equal-height vc_row-o-content-middle vc_row-flex"><div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-offset-2 vc_col-lg-4 vc_col-md-offset-0 vc_col-md-6 vc_hidden-sm vc_col-xs-12 vc_hidden-xs"><div class="vc_column-inner vc_custom_1462367980405"><div class="wpb_wrapper"><h2 style="font-size: 32px;color: #0c0c0c;text-align: right;font-family:Lato;font-weight:900;font-style:normal" class="vc_custom_heading wpb_animate_when_almost_visible wpb_left-to-right"><?php echo $Titulo['4-box1']?></h2>
	<div class="wpb_text_column wpb_content_element  wpb_animate_when_almost_visible wpb_left-to-right">
		<div class="wpb_wrapper">
			<p style="text-align: right;"><?php echo $Texto['4-box1']?></p>

		</div>
	</div>
</div></div></div>
<div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-6 vc_col-md-6 vc_col-sm-offset-0 vc_hidden-sm vc_col-xs-12 vc_hidden-xs"><div class="vc_column-inner vc_custom_1462367975422"><div class="wpb_wrapper">
	<div class="wpb_single_image wpb_content_element vc_align_left  wpb_animate_when_almost_visible wpb_right-to-left">

		<figure class="wpb_wrapper vc_figure">
			<div class="vc_single_image-wrapper   vc_box_border_grey"><img width="407" height="487" src="<?php echo $Foto['4-box1']?>" class="vc_single_image-img attachment-full"   sizes="(max-width: 407px) 100vw, 407px" /></div>
		</figure>
	</div>
</div></div></div></div><div class="vc_row-full-width vc_clearfix"></div><div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid vc_custom_1462348376708 vc_row-o-equal-height vc_row-o-content-middle vc_row-flex"><div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-6 vc_col-md-6 vc_col-xs-12"><div class="vc_column-inner vc_custom_1462367655426"><div class="wpb_wrapper">
	<div class="wpb_single_image wpb_content_element vc_align_right  wpb_animate_when_almost_visible wpb_left-to-right">

		<figure class="wpb_wrapper vc_figure">
			<div class="vc_single_image-wrapper   vc_box_border_grey"><img width="407" height="487" src="<?php echo $Foto['4-box2']?>"/></div>
		</figure>
	</div>
</div></div></div><div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-4 vc_col-md-6 vc_col-xs-12"><div class="vc_column-inner vc_custom_1462367898373"><div class="wpb_wrapper"><h2 style="font-size: 32px;color: #0c0c0c;text-align: left;font-family:Lato;font-weight:900;font-style:normal" class="vc_custom_heading wpb_animate_when_almost_visible wpb_right-to-left"><?php echo $Titulo['4-box2']?></h2>
	<div class="wpb_text_column wpb_content_element  wpb_animate_when_almost_visible wpb_right-to-left">
		<div class="wpb_wrapper">
			<p><?php echo $Texto['4-box2']?></p>

		</div>
	</div>
</div></div></div></div><div class="vc_row-full-width vc_clearfix"></div><div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid vc_custom_1462348334564 vc_row-o-equal-height vc_row-o-content-middle vc_row-flex"><div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-offset-2 vc_col-lg-4 vc_col-md-offset-0 vc_col-md-6 vc_hidden-sm vc_col-xs-12 vc_hidden-xs"><div class="vc_column-inner vc_custom_1462367980405"><div class="wpb_wrapper"><h2 style="font-size: 32px;color: #0c0c0c;text-align: right;font-family:Lato;font-weight:900;font-style:normal" class="vc_custom_heading wpb_animate_when_almost_visible wpb_left-to-right"><?php echo $Titulo['4-box3']?></h2>
	<div class="wpb_text_column wpb_content_element  wpb_animate_when_almost_visible wpb_left-to-right">
		<div class="wpb_wrapper">
			<p style="text-align: right;"><?php echo $Texto['4-box3']?></p>

		</div>
	</div>
</div></div></div><div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-6 vc_col-md-6 vc_col-sm-offset-0 vc_hidden-sm vc_col-xs-12 vc_hidden-xs"><div class="vc_column-inner vc_custom_1462367975422"><div class="wpb_wrapper">
	<div class="wpb_single_image wpb_content_element vc_align_left  wpb_animate_when_almost_visible wpb_right-to-left">

		<figure class="wpb_wrapper vc_figure">
			<div class="vc_single_image-wrapper   vc_box_border_grey"><img width="480" height="315" src="<?php echo $Foto['4-box3']?>"  sizes="(max-width: 480px) 100vw, 480px" /></div>
		</figure>
	</div>
</div></div></div></div><div class="vc_row-full-width vc_clearfix"></div><div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid vc_custom_1475606626849 vc_row-has-fill vc_row-no-padding"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner "><div class="wpb_wrapper"><div id="banner-3615" class="banner  banner-type-1 align-center responsive-fonts valign-middle font-style-light" ><img width="1280" height="300" src="http://localhost//discoverushuaia/tienda/wp-content/uploads/2016/05/bg-home-dos.jpg" class="attachment-full" alt="bg-home-dos" srcset="http://localhost//discoverushuaia/tienda/wp-content/uploads/2016/05/bg-home-dos.jpg 1280w, http://localhost//discoverushuaia/tienda/wp-content/uploads/2016/05/bg-home-dos-300x70.jpg 300w, http://localhost//discoverushuaia/tienda/wp-content/uploads/2016/05/bg-home-dos-768x180.jpg 768w, http://localhost//discoverushuaia/tienda/wp-content/uploads/2016/05/bg-home-dos-1024x240.jpg 1024w, http://localhost//discoverushuaia/tienda/wp-content/uploads/2016/05/bg-home-dos-205x48.jpg 205w, http://localhost//discoverushuaia/tienda/wp-content/uploads/2016/05/bg-home-dos-555x130.jpg 555w, http://localhost//discoverushuaia/tienda/wp-content/uploads/2016/05/bg-home-dos-720x169.jpg 720w, http://localhost//discoverushuaia/tienda/wp-content/uploads/2016/05/bg-home-dos-100x23.jpg 100w" sizes="(max-width: 1280px) 100vw, 1280px" /><div class="banner-content "><h2 class="banner-subtitle" >No se recuerdan los días, se recuerdan los momentos.</h2><div class="content-inner"><a class="btn medium" href=""><span>Empezá tu viaje ahora</span></a></div></div></div><style type="text/css">#banner-3615 {background-color: transparent;}#banner-3615 img {opacity: 1;}#banner-3615:hover img {opacity: 1;}</style></div></div></div></div><div class="vc_row-full-width vc_clearfix"></div>

                    <div class="post-navigation"></div>
            </div>


        </div><!-- end row-fluid -->

    </div>
</div>
