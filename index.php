<?php

	include("conex.php");
	include("db.php");
	$vdir = db_dir();
	$vusr = db_usr();
	$vpass = db_pass();
	$vbase = db_base();
	$link=Conectarse( $vdir, $vusr, $vpass, $vbase);



	//$dbh2 = mysql_connect(db_dir_gestion(), db_usr_gestion(), db_pass_gestion(), true);
    $dbh2 = mysqli_connect(db_dir_gestion(), db_usr_gestion(), db_pass_gestion(), db_base_gestion()) ;
	$page=$_GET['p'];


	@session_start();


	switch ($_GET['i']) {
		case 2:
			$_SESSION['idioma']='es';
			include("messages_es.php");
		break;
		case 3:
			$_SESSION['idioma']='po';
			include("messages_po.php");
		break;
		case 4:
			$_SESSION['idioma']='en';
			include("messages_en.php");
		break;
		default:
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
				$_SESSION['idioma']='es';
				include("messages_es.php");
			}
		break;
	}
	?>


<!DOCTYPE html>
<html lang="es-ES" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="user-scalable=0, width=device-width, initial-scale=1, maximum-scale=2.0"/>
	<title>Discover Ushuaia &#8211; Rent a Car &#8211; Alquiler de autos en Ushuaia</title>
<link rel='dns-prefetch' href='//fonts.googleapis.com' />
<link rel='stylesheet' id='parent-style-css'  href='css/rent.css' type='text/css' media='all' />
<link rel="stylesheet" href="css/rent_mobile.css">
		<script type="text/javascript">
			window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/2\/72x72\/","ext":".png","svgUrl":"https:\/\/s.w.org\/images\/core\/emoji\/2\/svg\/","svgExt":".svg","source":{"concatemoji":"http:\/\/localhost/discoverushuaia\/tienda\/wp-includes\/js\/wp-emoji-release.min.js?ver=4.6.1"}};
			!function(a,b,c){function d(a){var c,d,e,f,g,h=b.createElement("canvas"),i=h.getContext&&h.getContext("2d"),j=String.fromCharCode;if(!i||!i.fillText)return!1;switch(i.textBaseline="top",i.font="600 32px Arial",a){case"flag":return i.fillText(j(55356,56806,55356,56826),0,0),!(h.toDataURL().length<3e3)&&(i.clearRect(0,0,h.width,h.height),i.fillText(j(55356,57331,65039,8205,55356,57096),0,0),c=h.toDataURL(),i.clearRect(0,0,h.width,h.height),i.fillText(j(55356,57331,55356,57096),0,0),d=h.toDataURL(),c!==d);case"diversity":return i.fillText(j(55356,57221),0,0),e=i.getImageData(16,16,1,1).data,f=e[0]+","+e[1]+","+e[2]+","+e[3],i.fillText(j(55356,57221,55356,57343),0,0),e=i.getImageData(16,16,1,1).data,g=e[0]+","+e[1]+","+e[2]+","+e[3],f!==g;case"simple":return i.fillText(j(55357,56835),0,0),0!==i.getImageData(16,16,1,1).data[0];case"unicode8":return i.fillText(j(55356,57135),0,0),0!==i.getImageData(16,16,1,1).data[0];case"unicode9":return i.fillText(j(55358,56631),0,0),0!==i.getImageData(16,16,1,1).data[0]}return!1}function e(a){var c=b.createElement("script");c.src=a,c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var f,g,h,i;for(i=Array("simple","flag","unicode8","diversity","unicode9"),c.supports={everything:!0,everythingExceptFlag:!0},h=0;h<i.length;h++)c.supports[i[h]]=d(i[h]),c.supports.everything=c.supports.everything&&c.supports[i[h]],"flag"!==i[h]&&(c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&c.supports[i[h]]);c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&!c.supports.flag,c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.everything||(g=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",g,!1),a.addEventListener("load",g,!1)):(a.attachEvent("onload",g),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),f=c.source||{},f.concatemoji?e(f.concatemoji):f.wpemoji&&f.twemoji&&(e(f.twemoji),e(f.wpemoji)))}(window,document,window._wpemojiSettings);
		</script>
		<style type="text/css">
img.wp-smiley,
img.emoji {
	display: inline !important;
	border: none !important;
	box-shadow: none !important;
	height: 1em !important;
	width: 1em !important;
	margin: 0 .07em !important;
	vertical-align: -0.1em !important;
	background: none !important;
	padding: 0 !important;
}

.btn-whatsapp {
       display:block;
       width:70px;
       height:70px;
       color:#fff;
       position: fixed;
       right:80px;
       bottom:20px;
       border-radius:50%;
       line-height:80px;
       text-align:center;
       z-index:999;
}
        </style>
<link rel='stylesheet' id='js_composer_front-css'  href='css/js_composer.min.css?ver=4.12.1' type='text/css' media='all' />
<link rel='stylesheet' id='fa-css'  href='css/font-awesome.min.css?ver=4.6.1' type='text/css' media='all' />
<link rel='stylesheet' id='bootstrap-css'  href='css/bootstrap.min.css?ver=4.6.1' type='text/css' media='all' />
<link rel='stylesheet' id='parent-style-css'  href='css/style.css?ver=4.6.1' type='text/css' media='all' />

<style id='theme-styles-inline-css' type='text/css'>
.chat-whatsapp-desk{
	display:block;
	position:fixed;
	bottom:20px;
	right:80px;
	z-index:99999;
}
.chat-whatsapp-movil{
	display:block;
	position:fixed;
	bottom:20px;
	left:30px;
	z-index:99999;
}

@media (max-width:770px) {
	.chat-whatsapp-desk{
		display:none!important;
	}
}

@media (min-width:770px) {
	.chat-whatsapp-movil{
		display:none!important;
	}
}
</style>


<link rel='stylesheet' id='google-fonts-css'  href='http://fonts.googleapis.com/css?family=Lato%3A300%2C400%2C700%2C900%2C300italic%2C400italic&#038;ver=4.6.1' type='text/css' media='all' />
<script type='text/javascript' src='js/jquery.js?ver=1.12.4'></script>
<script type='text/javascript' src='js/jquery-migrate.min.js?ver=1.4.1'></script>
<script type='text/javascript' src='js/head.min.js?ver=4.6.1'></script>
    <script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>

    <script>
  /*(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-87967507-1', 'auto');
  ga('send', 'pageview');*/

</script>
<link rel="canonical" href="http://localhost//discoverushuaia/" />
<link rel='shortlink' href='http://localhost//discoverushuaia/' />

<link rel="icon" href="favicon.ico">
  <link rel="apple-touch-icon" href="apple-touch-icon.png">



        <style type="text/css">
            @media screen and (max-width: 735px) {
	#beneficios .item-beneficio {
		height: auto!important;
	}
	#beneficios .item-beneficio .benf-foto {
		display: block!important;
    	float: none!important;
	}
	#beneficios .item-beneficio .benf-texto {
		float: none!important;
    	padding-bottom: 70px!important;
	}
	#beneficios .item-beneficio .benf-texto .benf-consultar {
	 	display: block!important;
    	width: 100%!important;
	 }
}
            .page-heading {
              background-color: #2a9ed9;
			  background-image: url(http://localhost//discoverushuaia/tienda/wp-content/uploads/2016/09/bg-home-v3-b-1.jpg);
			  background-size: cover;
			  background-repeat: no-repeat;
			  }

            .fixed-header.fixed-enabled {
    background:#003382;
        border-color: #003382;
    color:#fff;
}

.fixed-header .menu-wrapper .menu > li.current-menu-item > a{
    color:#fff !important;
}

div#basket {
    display: none;
}

            .bordered .body-border-left,
            .bordered .body-border-top,
            .bordered .body-border-right,
            .bordered .body-border-bottom {
                        }


            .header-logo img {
                max-width: 200px;
            }

            footer {
                background-color: #242e3a;
                padding: 30px;
            }
            .footer-widgets ul {
                padding-left: 0;
            }
            .footer-widgets ul li {
                list-style: none;
                font-weight: 400;
                color: #fff;
            }

            .footer-widgets ul li a {
                color: #fff;
                opacity: .7;
                text-decoration: none;
                transition: all .5s;
            }

            .footer-widgets ul li a:hover {
                opacity: 1;
            }
            .footer-widgets mark {
                color: #fff;
                background-color: transparent!important;
            }

            @media only screen and (max-width: 600px) {
                footer {
                    text-align: center;
                }
            }

                    </style>


<style type="text/css">
    .active-color,.cart-widget-products a:hover,.star-rating span:before,.price ins .amount,.big-coast .amount,.tabs .tab-title.opened,.tabs .tab-title:hover,.product-brands .view-products,.shipping-calculator-button,.views-count,.post-comments-count,.read-more,span.active,.active-link,.active-link:hover,ul.active > li:before,.author-info .author-link,.comment-reply-link,.lost_password a,.mobile-menu-wrapper .links li a:hover,.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab.vc_active>a,.page-404 .largest,.meta-post-timeline .time-mon,.portfolio-filters .active,.tabs .accordion-title.opened-parent:after,.item-design-mega-menu .nav-sublist-dropdown .item-level-1:hover > a,.text-color-dark .category-grid .categories-mask span,.header-standard .navbar-header .et-wishlist-widget .fa,.team-member .member-details h5,.team-member .member-content .menu-social-icons li:hover i,.fixed-header .menu-wrapper .menu > li.current-menu-item > a,.et-header-not-overlap.header-wrapper .menu-wrapper .menu > li.current-menu-item > a,.sidebar-widget ul li > ul.children li > a:hover,.product-information .out-of-stock,.sidebar-widget li a:hover,#etheme-popup .mfp-close:hover:before,.etheme_widget_brands li a strong,.widget_product_categories.sidebar-widget ul li.current-cat > a,.shipping-calculator-button:focus,table.cart .product-details a:hover,.mobile-menu-wrapper .menu li a:hover,.mobile-menu-wrapper .menu > li .sub-menu li a:hover,.mobile-menu-wrapper .menu > li .sub-menu .menu-show-all a,#review_form .stars a:hover:before, #review_form .stars a.active:before,.item-design-mega-menu .nav-sublist-dropdown .nav-sublist li.current-menu-item a,.item-design-dropdown .nav-sublist-dropdown ul > li.current-menu-item > a,.mobile-menu-wrapper .mobile-sidebar-widget.etheme_widget_socials a:hover,.mobile-sidebar-widget.etheme_widget_socials .et-follow-buttons.buttons-size-large a:hover,.product-view-mask2.view-color-transparent .footer-product .button:hover:before, .product-view-mask2.view-color-transparent .show-quickly:hover:before,.product-view-mask2.view-color-transparent .yith-wcwl-add-button a.add_to_wishlist:hover:before,.product-view-default .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse.show a:before, .product-view-default .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse.show a:before,.yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse.show a:before, .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse.show a:before,.product-view-mask2.view-color-transparent .yith-wcwl-wishlistexistsbrowse a:hover:before, .product-view-mask2.view-color-transparent .yith-wcwl-wishlistaddedbrowse a:hover:before,.product-information .yith-wcwl-add-to-wishlist a:hover:before, .product-info-wrapper .yith-wcwl-add-to-wishlist a:hover:before, .product-summary-center .yith-wcwl-add-to-wishlist a:hover:before,.widget_product_categories.sidebar-widget ul li a:hover,.et-wishlist-widget .wishlist-dropdown li .product-title a:hover,.woocommerce-MyAccount-navigation li.is-active a,.wcpv-sold-by-single a,.sb-infinite-scroll-load-more:not(.finished):hover              { color: #2a9ed9; }
    .tagcloud a:hover,.button.active,.btn.active,.btn.active:hover,.btn-checkout,.btn-checkout:hover,.button:hover, .btn:hover, input[type=submit]:hover,.type-label-2,.et-loader svg .outline,.header-search.act-default #searchform .btn:hover,.widget_product_categories .widget-title,.price_slider_wrapper .ui-slider .ui-slider-handle,.price_slider_wrapper .ui-slider-range,.pagination-cubic ul li span.current,.pagination-cubic ul li a:hover,.view-switcher .switch-list:hover a,.view-switcher .switch-grid:hover a,.view-switcher .switch-list.switcher-active a,.view-switcher .switch-grid.switcher-active a,.tabs .tab-title.opened span:after,.wpb_tabs .wpb_tabs_nav li a.opened span:after,table.shop_table .remove-item:hover,.checkout-button,.active-link:before,.block-title .label,.form-row.place-order input[type=submit],.wp-picture .post-categories,.single-tags a:hover,.portfolio-filters li a:after,.form-submit input[type=submit],.woocommerce table.wishlist_table .product-remove a:hover,.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab.vc_active > a:after,.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-heading a span:after,.posts-nav-btn:hover .button,.posts-nav-btn .post-info,.global-post-template-large .post-categories,.global-post-template-large2 .post-categories,.portfolio-item .portfolio-image,.header-standard.header-color-dark .ico-design-1 .cart-bag,.testimonials-slider .owl-buttons .owl-prev:hover, .testimonials-slider .owl-buttons .owl-next:hover,.item-design-posts-subcategories .posts-content .post-preview-thumbnail .post-category,.sidebar-slider .owl-carousel .owl-controls .owl-next:hover,.sidebar-slider .owl-carousel .owl-controls .owl-prev:hover,.ibox-block .ibox-symbol i,ol.active > li:before,span.dropcap.dark,.fixed-header .menu-wrapper .menu > li.current-menu-item > a:after,.etheme_widget_entries_tabs .tabs .tab-title:after,.articles-pagination .current, .articles-pagination a:hover,.product-information .yith-wcwl-add-to-wishlist a:hover:before,.product-information .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a:before,.product-information .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse a:before,.top-panel-container .menu-social-icons a:hover,.wp-picture .blog-mask:before,.main-images .owl-controls .owl-prev:hover,.main-images .owl-controls .owl-next:hover,.thumbnails-list .owl-controls .owl-next:hover,.thumbnails-list .owl-controls .owl-prev:hover,.portfolio-single-item .menu-social-icons a:hover i,.flexslider .flex-direction-nav a:hover,.back-top:hover,.tagcloud a:hover,.footer.text-color-light .tagcloud a:hover,.widget_search button:hover,.thumbnails-list .video-thumbnail span,.carousel-area .owl-prev:hover,.carousel-area .owl-next:hover,.brands-carousel .owl-prev:hover, .owl-images-carousel .owl-prev:hover, .brands-carousel .owl-next:hover, .owl-images-carousel .owl-next:hover,.post-gallery-slider .owl-controls .owl-buttons >div:hover,.quantity.buttons_added span:hover,.openswatch_widget_layered_nav ul li.chosen, .openswatch_widget_layered_nav ul li:hover,ul.swatch li.selected,.open-filters-btn a:hover,.owl-carousel .owl-pagination .owl-page:hover, .owl-carousel .owl-pagination .owl-page.active,.zoom-images-button:hover, .open-video-popup:hover, .open-360-popup:hover,.et-products-navigation > div:hover,.et-looks .et-looks-nav li.active a,.et-looks .et-looks-nav li:hover a,.quick-view-popup .mfp-close:hover,.read-more:before,.team-member .member-image:before,#cookie-notice .button,#cookie-notice .button.bootstrap,#cookie-notice .button.wp-default,#cookie-notice .button.wp-default:hover,.mfp-image-holder .mfp-close:hover, .mfp-iframe-holder .mfp-close:hover,#product-video-popup .mfp-close:hover,.et-products-navigation > div:hover .swiper-nav-arrow,.product-view-default .footer-product .show-quickly                 { background-color: #2a9ed9; }
    .tagcloud a:hover,.button.active,.btn.active,.btn.active:hover,.btn-checkout,.btn-checkout:hover,.button:hover, input[type=submit]:hover, .btn:hover,.form-row.place-order input[type=submit],.pagination-cubic ul li span.current,.pagination-cubic ul li a:hover,.form-submit input[type=submit],.fixed-header,.single-product-center .quantity.buttons_added span:hover,.header-standard.header-color-dark .cart-bag:before,.articles-pagination .current, .articles-pagination a:hover,.widget_search button:hover,table.cart .remove-item:hover,.checkout-button,.openswatch_widget_layered_nav ul li.chosen,.openswatch_widget_layered_nav ul li:hover,.open-filters-btn a:hover,.header-standard.header-color-dark .cart-bag,.header-standard.header-color-dark .cart-summ:hover .cart-bag,.header-standard .header-standard.header-color-dark,.header-standard .shopping-container.ico-design-1.ico-bg-yes .cart-bag:before,.header-standard .shopping-container .cart-summ:hover .cart-bag:before,.header-standard .shopping-container.ico-design-1.ico-bg-yes .cart-bag             { border-color: #2a9ed9; }
    .et-loader svg .outline,.et-timer.dark .time-block .circle-box svg circle             { stroke: #2a9ed9; }

	.et-header-full-width .main-header .container,
	.et-header-full-width .fixed-header .container {
		max-width: 1600px;
	}

	</style>

<!--[if lte IE 9]><link rel="stylesheet" type="text/css" href="css/vc_lte_ie9.min.css" media="screen"><![endif]-->
<!--[if IE  8]><link rel="stylesheet" type="text/css" href="css/vc-ie8.min.css" media="screen"><![endif]-->



<style type="text/css" title="dynamic-css" class="options-output">.main-header{background-color:transparent;}.select2-results, .select2-drop, .select2-container .select2-choice, .form-control, select, .quantity input[type="number"], .emodal, input[type="text"], input[type="email"], input[type="password"], input[type="tel"], textarea, textarea.form-control, textarea{background-color:#f4f4f4;}footer.footer{background-color:#242e3a;    padding: 30px;}.menu-wrapper .menu > li > a{color:#f7f7f7;} .mobile-menu-wrapper .menu > li > a, .mobile-menu-wrapper .links li a{color:#359cdf;}</style><style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1475605877480{margin-top: -35px !important;margin-bottom: -35px !important;}.vc_custom_1475606661572{margin-right: 0px !important;margin-bottom: -35px !important;margin-left: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}.vc_custom_1475605992365{margin-top: -25px !important;margin-bottom: 10vh !important;}.vc_custom_1462348334564{padding-bottom: 10vh !important;}.vc_custom_1462348376708{padding-bottom: 10vh !important;}.vc_custom_1462348334564{padding-bottom: 10vh !important;}.vc_custom_1475606626849{margin-right: 0px !important;margin-left: 0px !important;padding-right: 0px !important;padding-left: 0px !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1475605839110{margin-bottom: -30px !important;padding-right: 40% !important;padding-bottom: 0px !important;padding-left: 3vw !important;}.vc_custom_1475605795223{margin-bottom: -30px !important;padding-right: 40% !important;padding-bottom: 0px !important;padding-left: 3vw !important;}.vc_custom_1475605232054{padding-right: 0px !important;padding-left: 0px !important;}.vc_custom_1475605692331{margin-top: -30px !important;padding-top: -30px !important;}.vc_custom_1475610556473{padding-left: 0px !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1462367980405{padding-right: 5vh !important;}.vc_custom_1462367975422{padding-right: 5vh !important;padding-left: 5vh !important;}.vc_custom_1462367655426{padding-right: 5vh !important;padding-left: 5vh !important;}.vc_custom_1462367898373{padding-left: 5vh !important;}.vc_custom_1462367980405{padding-right: 5vh !important;}.vc_custom_1462367975422{padding-right: 5vh !important;padding-left: 5vh !important;}</style><noscript><style type="text/css"> .wpb_animate_when_almost_visible { opacity: 1; }</style></noscript>

</head>

<body class="home page page-id-4341 page-template-default fixed- breadcrumbs-type-default wide cart-widget-on search-widget-off et-header-full-width et-header-overlap et-header-fixed et-toppanel-off et-preloader-off et-catalog-off global-post-template-default global-header-xstore iphone-browser wpb-js-composer js-comp-ver-4.12.1 vc_responsive">


<style>
    .remodal-bg.with-red-theme.remodal-is-opening,
    .remodal-bg.with-red-theme.remodal-is-opened {
      filter: none;
    }

    .remodal-overlay.with-red-theme {
      background-color: rgba(30,30,30,.8);
    }

    .remodal.with-red-theme {
      background: #fff;
    }
    .link_modal_reserva_rent_card {
        display: none;
    }
    .link_modal_reserva_rent_card a {
      display: block;
    }
    @media only screen and (max-width: 993px){
        .link_modal_reserva_rent_card {
color: #FFF;
position: fixed; /*El div será ubicado con relación a la pantalla*/
right:0px; /*A la izquierda deje un espacio de 0px*/
bottom:0px; /*Abajo deje un espacio de 0px*/
z-index:50;
padding:15px;
text-align:center;
background: #428BCA;
    box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.50);
    border-radius: 0;
    border-color: transparent;
    color: #fff;
    width: 100%;
    text-transform: uppercase;
    transition: all .5s;
	display:block
        }
    }
  </style>

  <link rel="stylesheet" href="css/remodal.css">

    <link rel="stylesheet" href="css/remodal-default-theme.css">
  <div class="remodal-bg link_modal_reserva_rent_card">
  <a href="#modal"><?php echo utf8_encode(HACE_TU_RESERVA);?></a>

</div>

<div class="remodal" data-remodal-id="modal" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
  <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
  <div>
    <p id="modal1Desc">
     <form method="post" action="categorias-alquiler-de-autos-en-ushuaia.html" >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2"><h3><?php echo utf8_encode(RETIRO);?></h3></td>
    </tr>
  <tr>
    <td width="40%" align="right"><?php echo utf8_encode(LUGAR_DE_RETIRO);?>:</td>
    <td><select name="localret" id="localret" required>
      <option value="" disabled selected><?php echo utf8_encode(ELEGIR);?></option>
       <?php
			/*$dbh2 = mysql_connect(db_dir_gestion(), db_usr_gestion(), db_pass_gestion(), true);
mysql_select_db(db_base_gestion(), $dbh2); */

       $dbh2 = mysqli_connect(db_dir_gestion(), db_usr_gestion(), db_pass_gestion(), db_base_gestion()) ;

$laSQL = "SELECT * FROM  lugars WHERE activo = 1 order by lugar asc";
$result = mysqli_query($dbh2,$laSQL);
$i=1;
			while ($rowL = mysqli_fetch_array($result)) {
				$Id=$rowL['id'];
				$Locales[$Id]=$rowL['lugar'];
				if (isset($_SESSION['idioma'])) {
					switch ($_SESSION['idioma']) {
						case 'es':

							$Nombre=$rowL['lugar'];

						break;
						case 'po':
							$Nombre=$rowL['lugar_portugues'];
						break;
						case 'en':

							$Nombre=$rowL['lugar_ingles'];
						break;

					}

				}
				else{
					$Nombre=$rowL['lugar'];
				}




				echo "<option value='".$Id."'>".$Nombre."</option>";

			}
			?>
    </select></td>
  </tr>
  <tr>
    <td align="right"><?php echo utf8_encode(DIA_RETIRO);?></td>
    <td><input name="retiro" type="text" required id="retiro2" placeholder="<?php echo utf8_encode(ELEGIR);?>"  ></td>
  </tr>
  <tr>
    <td align="right"><?php echo utf8_encode(HORA_RETIRO);?></td>
    <td><select name="HoraRetiro" id="HoraRetiro" required  style="width:150px">
      <option value="" disabled selected><?php echo utf8_encode(ELEGIR);?></option>
      <?php $start = "08:30";
$end = "22:00";

$tStart = strtotime($start);
$tEnd = strtotime($end);
$tNow = $tStart;

while($tNow <= $tEnd){
  echo "<option value='".date("H:i",$tNow)."'>".date("H:i",$tNow)."</option>";
  $tNow = strtotime('+30 minutes',$tNow);
}

?>
    </select></td>
  </tr>
  <tr>
    <td colspan="2"><h3><?php echo utf8_encode(DEVOLUCION);?></h3></td>
    </tr>
  <tr>
    <td align="right"><?php echo utf8_encode(LUGAR_DE_DEVOLUCION);?>: </td>
    <td><select name="localdev" id="localdev" required>
      <option value="" disabled selected><?php echo utf8_encode(ELEGIR);?></option>
      <?php
/*$dbh2 = mysql_connect(db_dir_gestion(), db_usr_gestion(), db_pass_gestion(), true);
mysql_select_db(db_base_gestion(), $dbh2);*/
      $dbh2 = mysqli_connect(db_dir_gestion(), db_usr_gestion(), db_pass_gestion(), db_base_gestion()) ;
$laSQL = "SELECT * FROM  lugars WHERE activo = 1 order by lugar asc";
$result = mysqli_query($dbh2,$laSQL);
$i=1;
			while ($rowL = mysqli_fetch_array($result)) {
				$Id=$rowL['id'];
				$Locales[$Id]=$rowL['lugar'];
				if (isset($_SESSION['idioma'])) {
					switch ($_SESSION['idioma']) {
						case 'es':

							$Nombre=$rowL['lugar'];

						break;
						case 'po':
							$Nombre=$rowL['lugar_portugues'];
						break;
						case 'en':

							$Nombre=$rowL['lugar_ingles'];
						break;

					}

				}
				else{
					$Nombre=$rowL['lugar'];
				}


echo "<option value='".$Id."'>".$Nombre."</option>";

			}
			?>
    </select></td>
  </tr>
  <tr>
    <td align="right"><?php echo utf8_encode(DIA_DEVOLUCION);?></td>
    <td><input name="devolucion" placeholder="<?php echo utf8_encode(ELEGIR);?>" type="text"  id="devolucion2"></td>
  </tr>
  <tr>
    <td align="right"><?php echo utf8_encode(HORA_DEVOLUCION);?></td>
    <td><select name="HoraDevolucion" id="HoraDevolucion" required style="width:150px">
      <option value="" disabled selected><?php echo utf8_encode(ELEGIR);?></option>
      <?php $start = "08:30";
$end = "22:00";

$tStart = strtotime($start);
$tEnd = strtotime($end);
$tNow = $tStart;

while($tNow <= $tEnd){
  echo "<option value='".date("H:i",$tNow)."'>".date("H:i",$tNow)."</option>";
  $tNow = strtotime('+30 minutes',$tNow);
}

?>
    </select></td>
  </tr>
</table>

    </p>
    <input type="submit" name="submit" id="submit" value="<?php echo utf8_encode(SEGUIR);?>" class="btn medium black" style=" width:80%">

    </form>
  </div>
  <br>
</div>




<script src="http://cdnjs.cloudflare.com/ajax/libs/zepto/1.1.4/zepto.js"></script>
<script>window.Zepto || document.write('<script src="../libs/zepto/zepto.min.js"><\/script>')</script>
<script src="js/remodal.js"></script>

<!-- Events -->

<?php
$botonera='<div class="menu-main-container"><ul id="menu-main-menu-1" class="menu"><li id="menu-item-4414" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-4341 current_page_item menu-item-4414 item-level-0 item-design-dropdown columns-2"><a href="index.html" class="item-link">Home</a></li>
<li id="menu-item-4437" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4437 item-level-0 item-design-dropdown columns-2"><a href="porque.html" class="item-link">'.utf8_encode(POR_QUE_ALQUILAR_UN_AUTO).'</a></li>
<li id="menu-item-4436" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4436 item-level-0 item-design-dropdown columns-2"><a href="categorias-alquiler-de-autos-en-ushuaia.html" class="item-link">'.utf8_encode(CATEGORIA).'</a></li>';

$laSQL = "SELECT count(Id) as cant FROM  beneficios ";
if (isset($_SESSION['idioma'])) {
	switch ($_SESSION['idioma']) {
		case 'es':

			$laSQL .= " WHERE Activo = 1 ";

		break;
		case 'po':
			$laSQL .= " WHERE Activo_Portugues = 1 ";

		break;
		case 'en':
			$laSQL .= " WHERE Activo_Ingles = 1 ";

		break;

	}

}
else{
	$laSQL .= " WHERE Activo = 1 ";
}
//echo $laSQL;
$result = mysqli_query($link,$laSQL);
if ($rowL = mysqli_fetch_array($result)) {

	if ($rowL['cant']>0) {
		$botonera.='<li id="menu-item-4435" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4435 item-level-0 item-design-dropdown columns-2"><a href="beneficios.html" class="item-link">'.utf8_encode(BENEFICIOS).'</a></li>';
	}

}

$botonera.='<li id="menu-item-4289" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4289 item-level-0 item-design-dropdown columns-2"><a href="contacto-alquiler-de-autos-en-ushuaia.html" class="item-link">'.utf8_encode(CONTACTO).'</a></li>';
//if ($_SESSION['idioma']=='es') {
	//mysql_select_db(db_base_gestion(), $dbh2);
	$laSQL = "SELECT * FROM  configuracion_reservas where id= 'activar_sistema'";
	$result = mysqli_query($dbh2,$laSQL);

	if ($rowL = mysqli_fetch_array($result)) {

		if ($rowL['valor']==1) {
			$botonera.='<li id="menu-item-4289" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4289 item-level-0 item-design-dropdown columns-2" style="background-color: white;"><a href="reserva-alquiler-de-autos-en-ushuaia.html" class="item-link" style="color:#041e35;">'.utf8_encode(RESERVA_ONLINE).'</a></li>';
		}

	}
//}


$botonera.='<li id="menu-item-4290" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4289 item-level-0 item-design-dropdown columns-2 link_footer_menu"><a href="faq.html" class="item-link">Preguntas</a></li>
<li id="menu-item-4290" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4289 item-level-0 item-design-dropdown columns-2 link_footer_menu"><a href="https://www.facebook.com/discoverrentacar/" target="_blank"><img src="img/footfb.png"></a>&nbsp;&nbsp;<a href="https://www.instagram.com/discoverrentacar/" target="_blank"><img src="img/footinsta.png"></a></li>
<!--
<li id="menu-item-4291" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4289 item-level-0 item-design-dropdown columns-2 link_footer_menu" ><a href="terminos.html" class="item-link">Terminos y Condiciones</a></li>-->
</ul></div>';
$botonera = ($page!="discoverpay")?$botonera:'';
?>


<div class="fixed-header header-color-dark" ><div class="container"><div class="header-logo" style="width:10%"><a href="index.html">
<img src="img/logo_blanco.png" alt="Rent a Car" width="200" height="61" class="logo-fixed" /></a> </div><div class="menu-wrapper menu-align-center" style="width:67%"><?php echo $botonera?></div>
<div style="text-align: right; padding-right: 15px;">
<ul>
<?php


$laSQL = "SELECT * FROM  banderas";
$result = mysqli_query($link,$laSQL);

if ($rowL = mysqli_fetch_array($result)) {
	$banderaEs = $rowL['es'];
	$banderaEn = $rowL['en'];
	$banderaPo = $rowL['po'];
}
if ($banderaEs) {?>
	<li style="text-decoration: none; list-style: none;  display:inline;"><a href="indexes.html"><img src="img/argentina.png" alt="Español"/></a></li>
<?php }?>
<?php if ($banderaPo) {?>
	<li style="text-decoration: none; list-style: none;  display:inline;"><a href="indexpo.html"><img src="img/brasil.png" alt="Portugues"/></a></li>
<?php }?>
<?php if ($banderaEn) {?>
	<li style="text-decoration: none; list-style: none;  display:inline;"><a href="indexen.html"><img src="img/eeuu.png" alt="Ingles"/></a></li>
<?php }?>


</ul>
</div>
</div>

<style>
.devolucion{ display:none}
</style>

<script>jQuery.noConflict();
		function devolucion2(){
		jQuery(".devolucion").css("display", "block");
		$('#HoraDevolucion').val($('#HoraRetiro').val());
		}
		</script>
<?php
if(($page!="contacto")&&($page!="reserva")&&($page!="discoverpay")){?><div style="background-color:#2762be; width:100%;text-align:center; padding:10px 0px" id="barrareservas"><form name="form_categorias" id="form_categorias" method="post" action="categorias-alquiler-de-autos-en-ushuaia.html" class="form-barra"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td width="30%" align="center" valign="middle"><span style="font-size:16px"><?php echo utf8_encode(HACE_TU_RESERVA_AQUI);?></span></td><td width="21%" align="left" valign="middle">

<?php echo utf8_encode(LUGAR_DE_RETIRO);?>
      <br>
      <select name="localret" id="select" onChange="devolucion2()" required>
            		<option value="" disabled selected><?php echo utf8_encode(ELEGIR);?></option>
                    	<?php
/*$dbh2 = mysql_connect(db_dir_gestion(), db_usr_gestion(), db_pass_gestion(), true);
mysql_select_db(db_base_gestion(), $dbh2); */
$laSQL = "SELECT * FROM  lugars WHERE activo = 1 order by lugar asc";
$result = mysqli_query($dbh2,$laSQL);
$i=1;
			while ($rowL = mysqli_fetch_array($result)) {
				$Id=$rowL['id'];
				$Locales[$Id]=$rowL['lugar'];
				if (isset($_SESSION['idioma'])) {
					switch ($_SESSION['idioma']) {
						case 'es':

							$Nombre=$rowL['lugar'];

						break;
						case 'po':
							$Nombre=$rowL['lugar_portugues'];
						break;
						case 'en':

							$Nombre=$rowL['lugar_ingles'];
						break;

					}

				}
				else{
					$Nombre=$rowL['lugar'];
				}


echo "<option value='$Id'>$Nombre</option>";

			}
			?>
            </select>

            <br>
           <div class="devolucion">
            <?php echo utf8_encode(LUGAR_DE_DEVOLUCION);?>
      <br>
      <select name="localdev" id="select" required>
            		<option value="" disabled selected><?php echo utf8_encode(ELEGIR);?></option>	<?php
/*$dbh2 = mysql_connect(db_dir_gestion(), db_usr_gestion(), db_pass_gestion(), true);
mysql_select_db(db_base_gestion(), $dbh2); */
$laSQL = "SELECT * FROM  lugars WHERE activo = 1 order by lugar asc";
$result = mysqli_query($dbh2,$laSQL);
$i=1;
			while ($rowL = mysqli_fetch_array($result)) {
				$Id=$rowL['id'];

				if (isset($_SESSION['idioma'])) {
					switch ($_SESSION['idioma']) {
						case 'es':

							$Nombre=$rowL['lugar'];

						break;
						case 'po':
							$Nombre=$rowL['lugar_portugues'];
						break;
						case 'en':

							$Nombre=$rowL['lugar_ingles'];
						break;

					}

				}
				else{
					$Nombre=$rowL['lugar'];
				}




echo "<option value='$Id'>$Nombre</option>";

			}
			?>
            </select></div>

            </td><td width="12%" align="left" valign="middle"><?php echo utf8_encode(DIA_RETIRO);?><br><input name="retiro" type="text" required id="retiro" placeholder="<?php echo utf8_encode(ELEGIR);?>" onBlur="devolucion2();" onChange="dameSelectHorariosIndex();"><br>
            <div class="devolucion">
            <?php echo utf8_encode(DIA_DEVOLUCION);?><br>
            <input name="devolucion" placeholder="<?php echo utf8_encode(ELEGIR);?>" type="text"  id="devolucion" required onChange="dameSelectHorariosIndex();">
            </div>

            </td><td width="12%" align="left" valign="middle"><?php echo utf8_encode(HORA_RETIRO);?><br>
            <span id="selectHoraRetiro"><select name="HoraRetiro" id="HoraRetiro" required onChange="devolucion2()" style="width:150px"><option value="" disabled selected><?php echo utf8_encode(ELEGIR);?></option>

           <? /*$start = "08:30";
$end = "22:00";

$tStart = strtotime($start);
$tEnd = strtotime($end);
$tNow = $tStart;

while($tNow <= $tEnd){
  echo "<option value='".date("H:i",$tNow)."'>".date("H:i",$tNow)."</option>";
  $tNow = strtotime('+30 minutes',$tNow);
}*/

?></select></span><br>

            <div class="devolucion">
            <?php echo utf8_encode(HORA_DEVOLUCION);?><br>
            <span id="selectHoraDevolucion"><select name="HoraDevolucion" id="HoraDevolucion" required style="width:150px"><option value="" disabled selected><?php echo utf8_encode(ELEGIR);?></option>
<? /*$start = "08:30";
$end = "22:00";

$tStart = strtotime($start);
$tEnd = strtotime($end);
$tNow = $tStart;

while($tNow <= $tEnd){
  echo "<option value='".date("H:i",$tNow)."'>".date("H:i",$tNow)."</option>";
  $tNow = strtotime('+30 minutes',$tNow);
}*/

?></select></span>

            </div></td><td width="30%" align="left" valign="middle"><input type="submit" name="submit" id="submit" value="<?php echo utf8_encode(SEGUIR);?>" class="btn medium black"></td></tr></table></form></div><?php }?></div>



<div class="template-container">
		<div class="mobile-menu-wrapper">
		<div class="container">
			<div class="navbar-collapse"><?php echo $botonera?></div><!-- /.navbar-collapse -->
		</div>
	</div>
	<div class="template-content">
		<div class="page-wrapper">


<div class="header-wrapper header-xstore header-color-white">
        <header class="header main-header">
        <div class="container">
            <div class="container-wrapper">
                <div class="header-logo">            <a href="index.html">
                <img src="img/logo_blanco.png" alt="Rent Car" width="200" height="61" class="logo-default" />
            	<img src="img/logo_blanco.png" alt="Rent Car" width="200" height="61" class="logo-fixed" />
            </a>
        </div>
                <div class="menu-wrapper menu-align-center"><?php echo $botonera?></div>

                <div class="navbar-toggle">
                    <span class="sr-only">Menu</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </div>
                <div class="navbar-header">
                    <ul class="menu">

					<?php


					$laSQL = "SELECT * FROM  banderas";
					$result = mysqli_query($link,$laSQL);
					//echo mysql_error();
					if ($rowL = mysqli_fetch_array($result)) {
						$banderaEs = $rowL['es'];
						$banderaEn = $rowL['en'];
						$banderaPo = $rowL['po'];
					}
					if ($banderaEs) {?>
						<li style="text-decoration: none; list-style: none;  display:inline;"><a href="indexes.html"><img src="img/argentina.png" alt="Español"/></a></li>
					<?php }?>
					<?php if ($banderaPo) {?>
						<li style="text-decoration: none; list-style: none;  display:inline;"><a href="indexpo.html"><img src="img/brasil.png" alt="Portugues"/></a></li>
					<?php }?>
					<?php if ($banderaEn) {?>
						<li style="text-decoration: none; list-style: none;  display:inline;"><a href="indexen.html"><img src="img/eeuu.png" alt="Ingles"/></a></li>
					<?php }?>
					</ul>

              </div>



            </div>

        </div>
    </header>
</div><?php if($page){$page="$page.php";}else{$page="home.php";}include($page);
$laSQL = "SELECT * FROM  whatsapp";
$result = mysqli_query($link,$laSQL);
$whatsappActivo=0;
if ($rowL = mysqli_fetch_array($result)) {
	$whatsappActivo = $rowL['activo'];

}
if ($whatsappActivo) {

?>
<div id="text-block-25" class="mk-text-block   ">


	<p><a class="chat-whatsapp-desk" href="https://web.whatsapp.com/send?phone=5492901646393&text=<?php echo utf8_encode(MENSAJE_WHATSAPP);?>" target="_blank" rel="noopener noreferrer"><img class="alignnone size-medium wp-image-4955" src="img/whatsapp-logo-300x300.png" alt="" width="60" height="60" srcset="img/whatsapp-logo-300x300.png 300w, img/whatsapp-logo-150x150.png 150w, img/whatsapp-logo.png 660w" sizes="(max-width: 60px) 100vw, 60px" /></a></p>

	<div class="clearboth"></div>
</div>

	</div>
	<div class=" vc_custom_1553199791848">

<div id="text-block-26" class="mk-text-block   ">


	<p><a class="chat-whatsapp-movil" href="https://api.whatsapp.com/send?phone=5492901646393&text=<?php echo utf8_encode(MENSAJE_WHATSAPP);?>" target="_blank" rel="noopener noreferrer"><img class="alignnone size-medium wp-image-4955" src="img/whatsapp-logo-300x300.png" alt="" width="60" height="60" srcset="img/whatsapp-logo-300x300.png 300w, img/whatsapp-logo-150x150.png 150w, img/whatsapp-logo.png 660w" sizes="(max-width: 60px) 100vw, 60px" /></a></p>

	<div class="clearboth"></div>
</div>
<?php }?>
<footer class="footer text-color-light">
        <div class="container">


        <div class="row">
            <div class="footer-widgets col-md-6">
                <ul>
                    <li>
                        Email: <mark><a href="mailto:info@discoverushuaia.com.ar">info@discoverushuaia.com.ar</a></mark>
                        <br>
                        <a href="https://www.facebook.com/discoverrentacar/" target="_blank"><img src="img/footfb.png"></a>

						<a href="https://www.instagram.com/discoverrentacar/?hl=es-la" target="_blank"><img src="img/footinsta.png"></a>
                    </li>
                </ul>
            </div>

            <div class="footer-widgets col-md-6 footer-widgets col-md-6 text-right">
                <ul>
                    <li><?php echo utf8_encode(ATENCION_AL_CLIENTE);?>: <mark>(54) 11 52547702  (CABA) // (54) 2901 425337 (USHUAIA)</mark></li>

                    <li><a href="faq.html"><?php echo utf8_encode(PREGUNTAS_FRECUENTES);?></a> </li>
                       <?php
                       if ($_SESSION['idioma']=='es') {
	                       $laSQL = "SELECT * FROM  `home` where Visible='1' and Lugar='Terminos'";
							$result = mysqli_query($link,$laSQL);
							$activo=0;
							while ($rowS = mysqli_fetch_array($result)) {

								$activo=1;


							}
							if($activo){echo'<li><a href="terminos.html">Terminos y Condiciones</a> </li>';}
						}

			?>

                </ul>
            </div>
            </div>
        </div>
    </footer>


</div> <!-- page wrapper -->
</div> <!-- template-content -->
			<div id="back-top" class="back-top  bounceOut">
				<a href="#top">
					<span></span>
				</a>
			</div>
		<!-- Root element of PhotoSwipe. Must have class pswp. -->

</div> <!-- template-container -->


<link rel='stylesheet' id='vc_google_fonts_lato100100italic300300italicregularitalic700700italic900900italic-css'  href='http://fonts.googleapis.com/css?family=Lato%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C700%2C700italic%2C900%2C900italic&#038;ver=4.6.1' type='text/css' media='all' />

<script type='text/javascript' src='js/plugins.min.js?ver=4.6.1'></script>
<script type='text/javascript' src='js/hoverIntent.min.js?ver=1.8.1'></script>


<script type='text/javascript'>
/* <![CDATA[ */
var etConfig = {"ajaxurl":"http:\/\/localhost/discoverushuaia\/tienda\/wp-admin\/admin-ajax.php","noresults":"No results were found!","successfullyAdded":"Product added.","checkCart":"Please check your cart.","catsAccordion":"1","contBtn":"Continue shopping","checkBtn":"Checkout","menuBack":"Back","woocommerce":""};
/* ]]> */
</script>
<script type='text/javascript' src='js/etheme.js?ver=4.6.1'></script>


<script type='text/javascript' src='js/wp-embed.min.js?ver=4.6.1'></script>
<script type='text/javascript' src='js/js_composer_front.min.js?ver=4.12.1'></script>
<script type='text/javascript' src='js/waypoints.min.js?ver=4.12.1'></script>
<link rel='stylesheet' id='parent-style-css'  href='css/rent.css' type='text/css' media='all' />


 <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<?php
$retiro=date('Y-m-d');
//$dbh2 = mysql_connect(db_dir_gestion(), db_usr_gestion(), db_pass_gestion(), true);
$laSQL = "SELECT * FROM  configuracion_reservas where id= 'dias_antes'";
$result = mysqli_query($dbh2,$laSQL);

if ($rowL = mysqli_fetch_array($result)) {
	$dias_antes = $rowL['valor'];
}
$dias_antes;
$retiro = date("d/m/Y", strtotime($retiro ."+ ".$dias_antes." days"));

?>
<script>
  jQuery.noConflict();
			jQuery( function() {
    var dateFormat = "dd/mm/yy",
      from = jQuery( "#retiro" )
        .datepicker({
					minDate: '<?php echo $retiro;?>',
		  dateFormat: 'dd/mm/yy',
          defaultDate: "+1w",
          numberOfMonths: 2,
		  monthNames: [ "<?php echo utf8_encode(ENERO);?>", "<?php echo utf8_encode(FEBRERO);?>", "<?php echo utf8_encode(MARZO);?>", "<?php echo utf8_encode(ABRIL);?>", "<?php echo utf8_encode(MAYO);?>", "<?php echo utf8_encode(JUNIO);?>", "<?php echo utf8_encode(JULIO);?>", "<?php echo utf8_encode(AGOSTO);?>", "<?php echo utf8_encode(SEPTIEMBRE);?>", "<?php echo utf8_encode(OCTUBRE);?>", "<?php echo utf8_encode(NOVIEMBRE);?>", "<?php echo utf8_encode(DICIEMBRE);?>" ],
		 dayNamesMin: [ "<?php echo utf8_encode(DOMINGO);?>", "<?php echo utf8_encode(LUNES);?>", "<?php echo utf8_encode(MARTES);?>", "<?php echo utf8_encode(MIERCOLES);?>", "<?php echo utf8_encode(JUEVES);?>", "<?php echo utf8_encode(VIERNES);?>", "<?php echo utf8_encode(SABADO);?>" ]
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = jQuery( "#devolucion" ).datepicker({
    	dateFormat: 'dd/mm/yy',
        defaultDate: "+1w",
        numberOfMonths: 2,
        monthNames: [ "<?php echo utf8_encode(ENERO);?>", "<?php echo utf8_encode(FEBRERO);?>", "<?php echo utf8_encode(MARZO);?>", "<?php echo utf8_encode(ABRIL);?>", "<?php echo utf8_encode(MAYO);?>", "<?php echo utf8_encode(JUNIO);?>", "<?php echo utf8_encode(JULIO);?>", "<?php echo utf8_encode(AGOSTO);?>", "<?php echo utf8_encode(SEPTIEMBRE);?>", "<?php echo utf8_encode(OCTUBRE);?>", "<?php echo utf8_encode(NOVIEMBRE);?>", "<?php echo utf8_encode(DICIEMBRE);?>" ],
        dayNamesMin: [ "<?php echo utf8_encode(DOMINGO);?>", "<?php echo utf8_encode(LUNES);?>", "<?php echo utf8_encode(MARTES);?>", "<?php echo utf8_encode(MIERCOLES);?>", "<?php echo utf8_encode(JUEVES);?>", "<?php echo utf8_encode(VIERNES);?>", "<?php echo utf8_encode(SABADO);?>" ]
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });

    function getDate( element ) {

      var date;
      try {
        date = jQuery.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }

      return date;
    }
  } );
			function dameSelectHorariosIndex() {
				$.ajax({
						type : 'POST',
						data : $('#form_categorias').serialize(),
						url : 'dameSelectHorariosIndex.php',
						datatype : 'json',
						success: function(data){
							$('#selectHoraRetiro').html(data.selectHoraRetiro);
							$('#selectHoraDevolucion').html(data.selectHoraDevolucion);

						}
					});
			}
  </script>


<script>
  jQuery.noConflict();
			jQuery( function() {
    var dateFormat = "dd/mm/yy",
      from = jQuery( "#retiro2" )
        .datepicker({
					minDate: Number(1),
					dateFormat: 'dd/mm/yy',
          defaultDate: "+1w",
          numberOfMonths: 2,
          monthNames: [ "<?php echo utf8_encode(ENERO);?>", "<?php echo utf8_encode(FEBRERO);?>", "<?php echo utf8_encode(MARZO);?>", "<?php echo utf8_encode(ABRIL);?>", "<?php echo utf8_encode(MAYO);?>", "<?php echo utf8_encode(JUNIO);?>", "<?php echo utf8_encode(JULIO);?>", "<?php echo utf8_encode(AGOSTO);?>", "<?php echo utf8_encode(SEPTIEMBRE);?>", "<?php echo utf8_encode(OCTUBRE);?>", "<?php echo utf8_encode(NOVIEMBRE);?>", "<?php echo utf8_encode(DICIEMBRE);?>" ],
          dayNamesMin: [ "<?php echo utf8_encode(DOMINGO);?>", "<?php echo utf8_encode(LUNES);?>", "<?php echo utf8_encode(MARTES);?>", "<?php echo utf8_encode(MIERCOLES);?>", "<?php echo utf8_encode(JUEVES);?>", "<?php echo utf8_encode(VIERNES);?>", "<?php echo utf8_encode(SABADO);?>" ]
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = jQuery( "#devolucion2" ).datepicker({
    	  dateFormat: 'dd/mm/yy',
        defaultDate: "+1w",
        numberOfMonths: 2,
        monthNames: [ "<?php echo utf8_encode(ENERO);?>", "<?php echo utf8_encode(FEBRERO);?>", "<?php echo utf8_encode(MARZO);?>", "<?php echo utf8_encode(ABRIL);?>", "<?php echo utf8_encode(MAYO);?>", "<?php echo utf8_encode(JUNIO);?>", "<?php echo utf8_encode(JULIO);?>", "<?php echo utf8_encode(AGOSTO);?>", "<?php echo utf8_encode(SEPTIEMBRE);?>", "<?php echo utf8_encode(OCTUBRE);?>", "<?php echo utf8_encode(NOVIEMBRE);?>", "<?php echo utf8_encode(DICIEMBRE);?>" ],
        dayNamesMin: [ "<?php echo utf8_encode(DOMINGO);?>", "<?php echo utf8_encode(LUNES);?>", "<?php echo utf8_encode(MARTES);?>", "<?php echo utf8_encode(MIERCOLES);?>", "<?php echo utf8_encode(JUEVES);?>", "<?php echo utf8_encode(VIERNES);?>", "<?php echo utf8_encode(SABADO);?>" ]
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });

    function getDate( element ) {
      var date;
      try {
        date = jQuery.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }

      return date;
    }
  } );

  </script>
<?php
	if (isset($_SESSION['idioma'])) {
		switch ($_SESSION['idioma']) {
			case 'es':?>

				<!--Start of Tawk.to Script-->
				<script type="text/javascript">
				var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
				(function(){
				var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
				s1.async=true;
				s1.src='https://embed.tawk.to/5b460e146d961556373d9ecd/default';
				s1.charset='UTF-8';
				s1.setAttribute('crossorigin','*');
				s0.parentNode.insertBefore(s1,s0);
				})();
				</script>
				<!--End of Tawk.to Script-->
		<?php break;
			case 'po': ?>
				<!--Start of Tawk.to Script-->
				<script type="text/javascript">
				var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
				(function(){
				var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
				s1.async=true;
				s1.src='https://embed.tawk.to/5b460e146d961556373d9ecd/1ci5k0a16';
				s1.charset='UTF-8';
				s1.setAttribute('crossorigin','*');
				s0.parentNode.insertBefore(s1,s0);
				})();
				</script>
				<!--End of Tawk.to Script-->
		<?php break;
			case 'en': ?>


				<!--Start of Tawk.to Script-->
				<script type="text/javascript">
				var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
				(function(){
				var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
				s1.async=true;
				s1.src='https://embed.tawk.to/5b460e146d961556373d9ecd/1ci5j8hur';
				s1.charset='UTF-8';
				s1.setAttribute('crossorigin','*');
				s0.parentNode.insertBefore(s1,s0);
				})();
				</script>
				<!--End of Tawk.to Script-->
		<?php	break;

		}

	}
	else{ ?>
		<!--Start of Tawk.to Script-->
		<script type="text/javascript">
		var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
		(function(){
		var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
		s1.async=true;
		s1.src='https://embed.tawk.to/5b460e146d961556373d9ecd/default';
		s1.charset='UTF-8';
		s1.setAttribute('crossorigin','*');
		s0.parentNode.insertBefore(s1,s0);
		})();
		</script>
		<!--End of Tawk.to Script-->
	<?php }
?>


</body>

</html>
