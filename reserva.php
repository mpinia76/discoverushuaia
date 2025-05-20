<style>

    .form-barra
    {display:none}
    #gmap{
        left: 0;
        position: absolute !important;
        width: 100%;
        height:70%;
        z-index: 0;
        top:100px;} /* One increment smaller than the z-index of container */

    #container{
        margin: 0 auto;
        overflow: visible !important;
        position: relative;
        top: -35px;
        width: 500px;
        z-index: 2;
        float:left } /* One increment larger than the Google Maps z-index of iframe */

    .opcionAzul{
        color:#547da1;
    }
</style>
<div class="page-heading" style="height:100px;padding-top: 4px;padding-bottom: 20px;">
</div>

<div class="container content-page container-contacto" align="center">

    <iframe id="gmap" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d4599.090046188452!2d-68.307355!3d-54.80553900000001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xbc4c23206c5b8887%3A0xe4dfa0b392f22dab!2s25+de+Mayo+260%2C+V9410DFF+Ushuaia%2C+Tierra+del+Fuego%2C+Argentina!5e0!3m2!1ses!2sar!4v1476537668973" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" width="425" height="350"></iframe>

    <div id="container" class="container-contacto"><div dir="ltr" style="text-align: left;" trbidi="on">
            <br /></div>
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
        <div style="background:#FFF; padding:10px; text-align:left; font-size:11px;box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
" class="col-md-12"><h5><?php echo utf8_encode(DONDE_ESTAMOS);?></h5>

            <div class="vc_col-sm-6"><i class="fa fa-map-marker" aria-hidden="true"></i> USHUAIA<br>25 de Mayo 260 2° 9<br>Ushuaia, Tierra del Fuego, Argentina (9410) <br>Tel. (54) 2901 425337</div>
            <div class="vc_col-sm-6"><i class="fa fa-map-marker" aria-hidden="true"></i> BUENOS AIRES<br><?php echo utf8_encode(OFICINA_RESERVAS);?><br>
                CABA, Argentina (1107)<br>
                Tel. (54) 11 52547702 <br>
                0810-345-5002 <?php echo utf8_encode(SOLO_DESDE);?> CABA
            </div>
        </div>
        <p>&nbsp;<p>
        <form method="POST" name="form" id="form_decidir" action="https://sps.decidir.com/sps-ar/Validar">
            <input type="hidden" name="NROOPERACION" value="<?php echo $_POST['NROOPERACION']?>">
            <input type="hidden" name="NROCOMERCIO" value="00150809">
            <input type="hidden" name="IDTEMPLATES" value="discoverushuaia">
            <input type="hidden" name="NOMBRE" value="<?php echo $_POST['NOMBRE']?>">
            <input type="hidden" name="APELLIDO" value="<?php echo $_POST['APELLIDO']?>">
            <input type="hidden" name="CALLE" value="<?php echo $_POST['CALLE']?>">
            <input type="hidden" name="NROPUERTA" value="<?php echo $_POST['NROPUERTA']?>">
            <input type="hidden" name="FECHADENACIMIENTO" value="<?php echo $_POST['FECHADENACIMIENTO']?>">
            <input type="hidden" name="MONTO" value="<?php echo $_POST['MONTO']?>">
            <input type="hidden" name="NRODOC" value="<?php echo $_POST['NRODOC']?>" />
            <input type="hidden" name="EMAILCLIENTE" value="<?php echo $_POST['EMAILCLIENTE']?>" />
            <input type="hidden" id="CUOTAS" name="CUOTAS" value="<?php echo $_POST['CUOTAS']?>">
            <input type="hidden" id="MEDIODEPAGO" name="MEDIODEPAGO" value="<?php echo $_POST['MEDIODEPAGO']?>">
            <input type="hidden" name="URLDINAMICA" value="https://www.discoverushuaia.com.ar/posnet/index.php?ref=exito">
        </form>
        <form action="" method="post" name="contact-form" id="contact-form" style="background-color:#93b8d8;box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3); padding:20px; text-align:left" class="contact-form">
            <h5><?php echo utf8_encode(RESERVA_ONLINE);?></h5><p></p>

            <?php

            if($_GET['backDecidir']){
                if($_GET['backDecidir']==1){
                    echo '<strong>Su reserva ha sido realizada con &eacute;xito. Usted recibir&aacute; un correo electr&oacute;nico confirmando su pago. Gracias por elegirnos como su soluci&oacute;n de movilidad en el fin del mundo
		</strong><br><br>';
                }
                else{
                    echo '<strong>Su pago ha sido rechazado. Por favor, no inicie nuevamente el proceso, nos contactaremos muy pronto con usted para
		poder confirmar la solicitud que hemos guardado en nuestro sistema.<br><br>
		Muchas gracias.
		</strong><br><br>';
                }
                echo '<div align="center">
	<input type="button" name="nuevaReserva" id="nuevaReserva" value="Nueva reserva" onclick="window.location.href=\'reserva-alquiler-de-autos-en-ushuaia.html\'">
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="terminarProceso" id="terminarProceso" value="Terminar Proceso" onclick="window.location.href=\'index.html\'">
	</div>

	<br><br><br><br>';
            }
            elseif($_GET['backMercadoPago']){
                switch ($_SESSION['payment_status_detail']) {
                    case 'pending_waiting_payment':
                        echo '<strong>Su pago se encuentra en estado pendiente. Usted recibir&aacute; un correo electr&oacute;nico cuando se confirme. Gracias por elegirnos como su soluci&oacute;n de movilidad en el fin del mundo
		</strong><br><br>';
                        break;
                    case 'accredited':
                        echo '<strong>Su reserva ha sido realizada con &eacute;xito. Usted recibir&aacute; un correo electr&oacute;nico confirmando su pago. Gracias por elegirnos como su soluci&oacute;n de movilidad en el fin del mundo
		</strong><br><br>';
                        break;
                    case 'rejected':
                        echo '<strong>Su pago ha sido rechazado. Por favor, no inicie nuevamente el proceso, nos contactaremos muy pronto con usted para
		poder confirmar la solicitud que hemos guardado en nuestro sistema.<br><br>
		Muchas gracias.
		</strong><br><br>';
                        break;

                }


                //</editor-fold>
                echo '<div align="center">
	<input type="button" name="nuevaReserva" id="nuevaReserva" value="Nueva reserva" onclick="window.location.href=\'reserva-alquiler-de-autos-en-ushuaia.html\'">
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="terminarProceso" id="terminarProceso" value="Terminar Proceso" onclick="window.location.href=\'index.html\'">
	</div>

	<br><br><br><br>';
            }

            else{
                include("funcionesComunes.php");

                $laSQL = "SELECT * FROM  configuracion_reservas where id= 'activar_sistema'";
                $result = mysqli_query($dbh2,$laSQL);
                $activada=0;
                if ($rowL = mysqli_fetch_array($result)) {
                    if ($rowL['valor']==1) {
                        $activada=1;
                    }

                }
                if ($activada==0) {
                    echo '<strong>'.utf8_encode(RESERVA_ONLINE_DESACTIVADA).'</strong><br><br><br>';
                }
                elseif($_POST['finProceso']){
                    if($_POST['finProcesoTarjeta']){
                        /*echo '<strong>Su reserva ha sido realizada con &eacute;xito. Usted recibira&acute; un correo electr&oacute;nico confirmando su pago. Gracias por elegirnos como su soluci&oacute;n de movilidad en el fin del mundo
                        </strong><br><br><br><br><br><br>';*/
                        echo utf8_encode(PROCESANDO).'<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
                        echo '<script>$("#form_decidir").submit();</script>';
                    }
                    elseif($_POST['finProcesoMercadoPago']){
                        /*echo '<strong>Su reserva ha sido realizada con &eacute;xito. Usted recibira&acute; un correo electr&oacute;nico confirmando su pago. Gracias por elegirnos como su soluci&oacute;n de movilidad en el fin del mundo
                        </strong><br><br><br><br><br><br>';*/
                        echo utf8_encode(PROCESANDO).'<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
                        echo '<script>$("#form_mercadopago").submit();</script>';
                    }
                    else{
                        echo '<strong>'.utf8_encode(RESERVA_FIN_PROCESO_SIN_TARJETA).'
	</strong><br><br>
	<center>
	<input type="button" name="nuevaReserva" id="nuevaReserva" value="'.utf8_encode(NUEVA_RESERVA).'" onclick="window.location.href=\'reserva-alquiler-de-autos-en-ushuaia.html\'">
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="terminarProceso" id="terminarProceso" value="'.utf8_encode(TERMINAR_PROCESO).'" onclick="window.location.href=\'index.html\'">
	</center>

	<br><br><br><br>';


                    }


                }
                elseif($_POST['enviarConfirmacion']){
                    $laSQL = "SELECT * FROM  configuracion_reservas where id= 'hs_reservas'";
                    $result = mysqli_query($dbh2,$laSQL);

                    if ($rowL = mysqli_fetch_array($result)) {
                        $hs_reservas = $rowL['valor'];
                    }


                    $retiro=$_POST['retiro'];
                    $devolucion=$_POST['devolucion'];
                    $HoraRetiro=$_POST['HoraRetiro'];
                    $HoraDevolucion=$_POST['HoraDevolucion'];

                    list($dia1,$mes1,$ano1) = explode("/",$retiro);
                    list($dia2,$mes2,$ano2) = explode("/",$devolucion);
                    $desde = $ano1.'-'.$mes1.'-'.$dia1;
                    $hasta = $ano2.'-'.$mes2.'-'.$dia2;

                    $desdeH = $desde.' '.$HoraRetiro;
                    $horaResta = '-'.$hs_reservas.' hour';
                    $nuevafecha = strtotime ( $horaResta , strtotime ( $desdeH ) ) ;
                    $desdeH = date ( 'Y-m-d H:i:s' , $nuevafecha );

                    $horaSuma = '+'.$hs_reservas.' hour';
                    $hastaH = $hasta.' '.$HoraDevolucion;
                    $nuevafecha = strtotime ( $horaSuma , strtotime ( $hastaH ) ) ;
                    $hastaH = date ( 'Y-m-d H:i:s' , $nuevafecha );
                    $laSQL = "SELECT * FROM unidads where activa = 1 AND categoria_id= ".$_POST['categoria_id']." AND baja >= '".$hasta."' AND habilitacion <= '".$desde."'";
                    //echo $laSQL;
                    $result = mysqli_query($dbh2,$laSQL);
                    $disponible=0;
                    WHILE ($rowL = mysqli_fetch_array($result)) {
                        $laSQL = "SELECT * FROM reservas R WHERE R.unidad_id= ".$rowL['id']."
				AND (estado is null OR estado!=2) AND ((((CONCAT(R.retiro,' ',R.hora_retiro)<'".$desdeH."')
				AND (CONCAT(R.devolucion,' ',R.hora_devolucion)>'".$hastaH."')))
				OR (CONCAT(R.retiro,' ',R.hora_retiro) between '".$desdeH."' and '".$hastaH."')
				OR (CONCAT(R.devolucion,' ',R.hora_devolucion) between '".$desdeH."' and '".$hastaH."'))";

                        mysqli_query($dbh2,$laSQL);

                        if(mysqli_affected_rows($dbh2)==0){

                            $unidad_id = $rowL['id'];
                            $disponible=1;
                            break;
                        }
                    }
                    if ($disponible==1) {
                        $a1 = 1;
                        $a2 = 1;
                        $a3 = 1;
                        $a4 = 1;
                        $a5 = 1;
                        $a6 = 1;
                        $a7 = 1;
                        $nombreFile = 'Reserva_'.date('Ymd');


                        $_Log = fopen("logs/" . $nombreFile . ".log", "a+") or die("Operation Failed!");

                        mysqli_begin_transaction($dbh2);
                        /*$laSQL = "SELECT * FROM  clientes where email = '".$_POST['email']."' AND nombre_apellido LIKE '%".$_POST['apellido']."%'";
                        $result = mysqli_query($dbh2,$laSQL);
                        if(mysqli_affected_rows($dbh2)==0){ */
                        $sql = "INSERT INTO clientes (nombre_apellido, dni, telefono,celular, email)
			VALUES('".$_POST['nombre']." ".$_POST['apellido']."','','".$_POST['telefono']."','','".$_POST['email']."')";
                        //echo $sql."<br>";
                        fputs($_Log, date('Y-m-d G:i:s') . $sql ."\n");
                        $a1 = mysqli_query($dbh2,$sql);
                        if ($a1) {
                            $cliente_id = mysqli_insert_id($dbh2);

                            fputs($_Log, date('Y-m-d G:i:s') . 'a1: correcta cliente: '.$cliente_id .'\n');
                        }
                        else{
                            fputs($_Log, date('Y-m-d G:i:s') . 'a1: incorrecta cliente\n');
                        }
                        /*}
                        else{
                            if ($rowL = mysqli_fetch_array($result)) {
                                $cliente_id = $rowL['id'];
                            }

                        }*/

                        $total = $_POST['total'];



                        $extra=$_POST['extra'];
                        $total_extras=0;
                        $arrayExtras=explode(',',$extra);
                        if (count($arrayExtras)!=0) {
                            for ($i=0;$i<count($arrayExtras);$i++)
                            {
                                $arrayExtra=explode('-',$arrayExtras[$i]);
                                $total_extras += $arrayExtra[1];
                            }
                        }
                        $total_estadia = $total-$total_extras;

                        $discover=0;
                        $discover_plus=0;
                        $discover_advance=0;

                        switch ($_POST['seguroId']) {
                            case 1:
                            case 4:
                            case 7:
                            case 10:
                            case 15:
                            case 18:
                                $discover_advance=1;
                                break;
                            case 2:
                            case 5:
                            case 8:
                            case 11:
                            case 14:
                            case 17:
                                $discover_plus=1;
                                break;
                            case 3:
                            case 6:
                            case 9:
                            case 12:
                            case 13:
                            case 16:
                                $discover=1;
                                break;

                        }
                        $hoy = date ("Y-m-d");
                        $laSQL = "SELECT numero FROM  reservas ORDER BY id DESC";
                        $result = mysqli_query($dbh2,$laSQL);
                        if(mysqli_affected_rows($dbh2)>0){

                            if ($rowL = mysqli_fetch_array($result)) {
                                $ultimo_nro = $rowL['numero']+1;
                            }
                        }
                        else{
                            $ultimo_nro = 1;
                        }
                        $sql = "INSERT INTO reservas (numero, reservado_por, cliente_id, unidad_id, retiro, lugar_retiro_id, hora_retiro, devolucion, lugar_devolucion_id, hora_devolucion, pax_adultos, pax_menores, pax_bebes, discover, discover_plus, discover_advance, total_estadia, total, comentarios, creado, actualizado, cargado_por, subcanal_id)
							VALUES('".$ultimo_nro."','0', '".$cliente_id."','".$unidad_id."','".$desde."','".$_POST['localret']."','".$HoraRetiro."','".$hasta."','".$_POST['localdev']."','".$HoraDevolucion."',1,0,0,".$discover.", ".$discover_plus.", ".$discover_advance.", '".$total_estadia."','".$total."','','".$hoy."','".$hoy."',0,5)";
                        //echo $sql."<br>";
                        fputs($_Log, date('Y-m-d G:i:s') . $sql ."\n");
                        $a2 = mysqli_query($dbh2,$sql);
                        if ($a2) {
                            $reserva_id = mysqli_insert_id($dbh2);
                            fputs($_Log, date('Y-m-d G:i:s') . 'a2: correcta reserva: '.$reserva_id .'\n');
                        }
                        else{
                            fputs($_Log, date('Y-m-d G:i:s') . 'a2: incorrecta reserva\n');
                        }

                        if (count($arrayExtras)>0) {
                            for ($i=0;$i<count($arrayExtras);$i++)
                            {
                                $arrayExtra=explode('-',$arrayExtras[$i]);
                                if ($arrayExtra[0]) {
                                    $sql = "INSERT INTO reserva_extras (cantidad, reserva_id, extra_id, agregada, adelantada, precio) VALUES('1','".$reserva_id."','".$arrayExtra[0]."','".$hoy."','1','".$arrayExtra[1]."')";
                                    //echo $sql."<br>";
                                    fputs($_Log, date('Y-m-d G:i:s') . $sql ."\n");
                                    $a3 = mysqli_query($dbh2,$sql);
                                    if ($a3) {

                                        fputs($_Log, date('Y-m-d G:i:s') . 'a3: correcta extras\n');
                                    }
                                    else{
                                        fputs($_Log, date('Y-m-d G:i:s') . 'a3: incorrecta extras\n');
                                    }

                                }


                            }
                        }
                        $arrayPago=explode('-',$_POST['total_pago']);
                        $monto_pagado = $_POST['totalFinal'];
                        $intereses = $monto_pagado-$arrayPago[0];
                        $id_descuento = $arrayPago[2];

                        $laSQL = "SELECT * FROM  descuentos WHERE id = ".$id_descuento;
                        //echo $laSQL."<br>";
                        $result = mysqli_query($dbh2,$laSQL);

                        if ($rowL = mysqli_fetch_array($result)) {
                            $coheficiente_descuento = $rowL['coheficiente'];
                            $desc_descuento = $rowL['descuento'];
                            if (isset($_SESSION['idioma'])) {
                                switch ($_SESSION['idioma']) {
                                    case 'es':

                                        $permite_tajeta = $rowL['tarjeta'];
                                        $permite_mercadopago = $rowL['mercadopago'];

                                        break;
                                    case 'po':
                                        $permite_tajeta = $rowL['tarjeta_portugues'];
                                        $permite_mercadopago = $rowL['mercadopago_portugues'];
                                        break;
                                    case 'en':

                                        $permite_tajeta = $rowL['tarjeta_ingles'];
                                        $permite_mercadopago = $rowL['mercadopago_ingles'];
                                        break;

                                }

                            }
                            else{
                                $permite_tajeta = $rowL['tarjeta'];
                                $permite_mercadopago = $rowL['mercadopago'];
                            }

                            $coheficiente_parcial = $rowL['parcial'];
                        }
                        $monto_descuento=0;
                        /*echo $coheficiente_descuento."<br>";
                        echo $total."<br>";
                        echo $intereses."<br>";
                        echo $monto_pagado."<br>";*/
                        if (($coheficiente_descuento!=0)&&(($coheficiente_descuento!=1))) {
                            //$monto_descuento = ($total+$intereses)-$monto_pagado;
                            $monto_descuento = $total*(1-$coheficiente_descuento);

                            $sql = "INSERT INTO reserva_cobros (reserva_id, tipo, fecha, monto_cobrado, monto_neto) VALUES('".$reserva_id."','DESCUENTO','".$hoy."','0','".$monto_descuento."')";
                            //echo $sql."<br>";
                            fputs($_Log, date('Y-m-d G:i:s') . $sql ."\n");
                            $a4 = mysqli_query($dbh2,$sql);
                            if ($a4) {
                                $reserva_cobro_id = mysqli_insert_id($dbh2);
                                fputs($_Log, date('Y-m-d G:i:s') . 'a4: correcta cobro: '.$reserva_cobro_id .'\n');
                                $sql = "INSERT INTO reserva_descuentos (reserva_cobro_id, motivo, monto) VALUES('".$reserva_cobro_id."','".$desc_descuento."','".$monto_descuento."')";
                                //echo $sql."<br>";
                                fputs($_Log, date('Y-m-d G:i:s') . $sql ."\n");
                                $a5 = mysqli_query($dbh2,$sql);
                                if ($a5) {

                                    fputs($_Log, date('Y-m-d G:i:s') . 'a5: correcta descuento\n');
                                }
                                else{
                                    fputs($_Log, date('Y-m-d G:i:s') . 'a5: incorrecta descuento\n');
                                }
                            }
                            else{
                                fputs($_Log, date('Y-m-d G:i:s') . 'a4: incorrecta cobro\n');
                            }
                        }
                        $estado_text = "Cobro pendiente";
                        if ($permite_tajeta) {
                            $arrayCuotas=explode('-',$_POST['CUOTAS']);

                            $pago = $monto_pagado;
                            $monto_pendiente = (($total-$monto_descuento)+$intereses)-$pago;
                            if($monto_pendiente > 0){
                                $estado_text = "Cobro parcial";
                            }elseif($monto_pendiente == 0){
                                $estado_text = "Cobrado: pendiente de cierre";

                            }else{
                                $estado_text = "Revisar";

                            }
                            /*$sql = "INSERT INTO reserva_cobros (reserva_id, tipo, fecha, monto_neto, monto_cobrado, monto_pendiente) VALUES('".$reserva_id."','TARJETA','".$hoy."','".$arrayPago[0]."','".$pago."','".$monto_pendiente."')";
                            //echo $sql."<br>";
                            $a6 = mysqli_query($dbh2,$sql);
                            if ($a6) {
                                $reserva_cobro_id = mysqli_insert_id($dbh2);

                                $laSQL = "SELECT * FROM  cobro_tarjeta_tipos where cobro_tarjeta_posnet_id= '1' AND id_decidir = '".$_POST['MEDIODEPAGO']."'";
                                $result1 = mysqli_query($dbh2,$laSQL);
                                //echo $laSQL.'<br>';
                                if ($rowL = mysqli_fetch_array($result1)) {
                                    $cobro_tarjeta_tipo_id = $rowL['id'];
                                }

                                $sql = "INSERT INTO cobro_tarjetas (cobro_tarjeta_tipo_id, tarjeta_numero, cuotas, monto_neto, reserva_cobro_id, interes, lote, autorizacion, cupon, titular, dni,domicilio,nacimiento)
                                VALUES('".$cobro_tarjeta_tipo_id."','0000','".$arrayCuotas[0]."','".$arrayPago[0]."','".$reserva_cobro_id."','".$intereses."','0','','','', '','','')";
                                //echo $sql."<br>";
                                $a7 = mysqli_query($dbh2,$sql);*/

                            $pago = number_format($pago, 2, '.', '');
                            $pago = str_replace(',', '', $pago);
                            $monto_pendiente = number_format($monto_pendiente, 2);
                            $monto_pendiente = str_replace(',', '', $monto_pendiente);
                            $intereses = number_format($intereses, 2);
                            $intereses = str_replace(',', '', $intereses);
                            $nroOperacion = 'AUTO_'.$reserva_id.'_'.$arrayPago[0].'_'.$monto_pendiente.'_'.$intereses.'_'.$_POST['MEDIODEPAGO'].'_'.$id_descuento;
                            $monto_cobrado = str_replace('.', '', $pago);
                            echo '<input type="hidden" id="finProcesoTarjeta" name="finProcesoTarjeta" value="1">
				<input type="hidden" id="NROOPERACION" name="NROOPERACION" value="'.$nroOperacion.'">
				<input type="hidden" id="NOMBRE" name="NOMBRE" value="'.$_POST['nombre'].'">
				<input type="hidden" id="APELLIDO" name="APELLIDO" value="'.$_POST['apellido'].'">
				<input type="hidden" id="EMAILCLIENTE" name="EMAILCLIENTE" value="'.$_POST['email'].'">
				<input type="hidden" id="MONTO" name="MONTO" value="'.$monto_cobrado.'">
				<input type="hidden" id="CUOTAS" name="CUOTAS" value="'.$arrayCuotas[0].'">
				<input type="hidden" id="MEDIODEPAGO" name="MEDIODEPAGO" value="'.$_POST['MEDIODEPAGO'].'">
				';
                            //}
                        }
                        elseif($permite_mercadopago){
                            echo '<input type="hidden" id="finProcesoMercadoPago" name="finProcesoMercadoPago" value="1">';
                            $arrayCuotas=explode('-',$_POST['CUOTAS']);

                            $pago = $monto_pagado;
                            $monto_pendiente = (($total-$monto_descuento)+$intereses)-$pago;
                            if($monto_pendiente > 0){
                                $estado_text = "Cobro parcial";
                            }elseif($monto_pendiente == 0){
                                $estado_text = "Cobrado: pendiente de cierre";

                            }else{
                                $estado_text = "Revisar";

                            }
                            $pago = number_format($pago, 2, '.', '');
                            $pago = str_replace(',', '', $pago);
                            $monto_pendiente = number_format($monto_pendiente, 2);
                            $monto_pendiente = str_replace(',', '', $monto_pendiente);
                            $intereses = number_format($intereses, 2);
                            $intereses = str_replace(',', '', $intereses);
                            $nroOperacion = 'AUTO_'.$reserva_id.'_'.$arrayPago[0].'_'.$monto_pendiente.'_'.$intereses.'_'.$_POST['MEDIODEPAGO'].'_'.$id_descuento;
                            $monto_cobrado = str_replace('.', '', $pago);
                            // SDK de Mercado Pago
                            require __DIR__ .  '/vendor/autoload.php';

// Agrega credenciales
                            MercadoPago\SDK::setAccessToken('APP_USR-735757274935125-092821-0c531f8bc0263ca321bb6c5e1c2e8984-652228506');

// Crea un objeto de preferencia
                            $preference = new MercadoPago\Preference();

// Crea un ítem en la preferencia
                            $item = new MercadoPago\Item();
                            $item->title = 'Discover Ushuaia Rent a Car';
                            $item->quantity = 1;
                            $item->unit_price = $pago;
                            $preference->items = array($item);
                            $preference->back_urls = array(
                                "success" => "https://marcospinero.com/discoverushuaia/mercadopago.html",
                                "failure" => "https://marcospinero.com/discoverushuaia/mercadopago.html",
                                "pending" => "https://marcospinero.com/discoverushuaia/mercadopago.html"
                            );
                            $preference->auto_return = "approved";
                            $preference->statement_descriptor= "Discover Ushuaia Rent a Car";
                            $preference->binary_mode= true;
                            $preference->init_point;
                            $preference->external_reference= $nroOperacion;
                            $preference->save();

                            //print_r($preference);
                            echo '<form action="https://marcospinero.com/discoverushuaia/mercadopago.html" method="POST" id="form_mercadopago">
              <script
               src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
               data-preference-id='.$preference->id.'


              </script>

            </form>';
                        }

                        fclose($_Log);
                        //echo 'A1:'.$a1.' - A2:'.$a2.' - A3:'.$a3.' - A4:'.$a4.' - A5:'.$a5.' - A6:'.$a6.' - A7:'.$a7;
                        echo '<input type="hidden" id="finProceso" name="finProceso" value="1">';
                        echo '<input type="hidden" id="enviarConfirmacion" name="enviarConfirmacion" value="0">';
                        if ($a1 && $a2 && $a3 && $a4 && $a5 && $a6 && $a7) {


                            mysqli_commit($dbh2);



                            $cuerpo = "Ip:".$_SERVER['REMOTE_ADDR'] . "<p>";
                            $cuerpo .= "Datos de la Reserva: N°: ".$ultimo_nro."<br>";
                            $cuerpo .= "Nombre: ".$_POST['nombre']."<br>";
                            $cuerpo .= "Apellido: ".$_POST['apellido']."<br>";
                            $cuerpo .= "Email: ".$_POST['email']."<br>";
                            $cuerpo .= "Tel: ".$_POST['telefono']."<p>";

                            $cuerpo .= "Categoria: ".$_POST['categoriaString']."<br>";
                            $cuerpo .= "Extras: ".$_POST['extrasString']."<br>";
                            $cuerpo .= "Seguro: ".$_POST['seguroString']."<br>";
                            $cuerpo .= "<p><strong>Retiro</strong><br>".$_POST['retiroString']."<br>";

                            $cuerpo .= "<p><strong>Devolucion</strong><br>".$_POST['devolucionString']."<p>";
                            if ((!$permite_tajeta)&&(!$permite_mercadopago)) {
                                $cuerpo .= "Forma de Pago: ".$desc_descuento."<br>";
                                $cuerpo .= "Estatus de Pago: ".$estado_text."<br>";
                            }


                            $cuerpo .= "Enviado el ".date("d-m-Y")." a las ".date("H:i")."<p>";


                            $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
                            $cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";

                            // Cabeceras adicionales
                            //$cabeceras .= 'To: Discover Ushuaia Rent a Car<info@discoverushuaia.com.ar>' . "\r\n";
                            //$cabeceras .= "From: $nombre <" . $_POST['email'] . ">" . "\r\n";
                            $cabeceras .= 'From: Discover Ushuaia Rent a Car<info@discoverushuaia.com.ar>' . "\r\n";
                            //$cabeceras .= 'Cc: blengioj@discoverushuaia.com.ar,minervinim@discoverushuaia.com.ar,pacec@discoverushuaia.com.ar' . "\r\n";
                            if ((!$permite_tajeta) &&(!$permite_mercadopago)){
                                $asunto = "Nueva Reserva desde la web ($retiro)";
                            }
                            else{
                                $asunto = "Bloqueo de disponibilidad desde la Web ($retiro)";
                            }

                            $nombreFile = date('Ymd') . '_log';
                            $dt = date('Y-m-d G:i:s');

                            $_Log = fopen("logs/" . $nombreFile . ".log", "a+") or die("Operation Failed!");

                            $user_agent = $_SERVER['HTTP_USER_AGENT'];

                            $navegador = getBrowser($user_agent);

                            fputs($_Log, $dt . " --> Navegador: " . $navegador ."\n");

                            fputs($_Log, $dt . " --> Asunto: " . $asunto . "; Cuerpo: " . $cuerpo ."\n");

                            fclose($_Log);

                            @mail("marcospinero@yahoo.com.ar", $asunto, $cuerpo, $cabeceras);
                            /*@mail("blengioj@discoverushuaia.com.ar.test-google-a.com", $asunto, $cuerpo, $cabeceras);
                            @mail("minervinim@discoverushuaia.com.ar.test-google-a.com", $asunto, $cuerpo, $cabeceras);
                            @mail("pacec@discoverushuaia.com.ar.test-google-a.com", $asunto, $cuerpo, $cabeceras);*/

                            if ((!$permite_tajeta) &&(!$permite_mercadopago)){
                                $cuerpo = "<div style=\"font-family:tahoma,sans-serif;color:rgb(68,68,68)\">
					".utf8_encode(ESTIMADO)." ".$_POST['nombre']." ".$_POST['apellido']."<br>
					".utf8_encode(GRACIAS_POR_ELEGIRNOS)."<br>";

                                $cuerpo .= utf8_encode(NUESTRO_STAFF);
                                /*}
                                else {
                                    $cuerpo .= "Su reserva se encuentra confirmada. Nuestro staff se pondr� en contacto con usted para coordinar el env�o de su voucher.<br><br>
                                    �Nos vemos en el fin del mundo!";
                                }*/
                                $cuerpo .= "</div>
					<br><br>
					<div style=\"font-family:tahoma,sans-serif;color:rgb(68,68,68)\">
					<div style=\"color:rgb(102,102,102);text-align:center;font-family:arial\">
						<font size=\"1\" color=\"#666666\" face=\"verdana, sans-serif\"><b>".utf8_encode(OFICINA_RESERVAS2)."</b></font>
					</div>
					<div style=\"color:rgb(102,102,102);font-family:verdana,sans-serif;text-align:center\">
						<font size=\"1\" color=\"#666666\" face=\"verdana, sans-serif\"><b>Discover Rent a Car</b></font>
					</div>
					<div style=\"color:rgb(102,102,102);font-family:verdana,sans-serif;text-align:center\">
						<font size=\"1\" color=\"#666666\" face=\"verdana, sans-serif\"><b><br></b></font>
					</div>
					<div style=\"color:rgb(102,102,102);font-family:verdana,sans-serif\">
						<div style=\"text-align:center;font-size:12.8px;font-family:tahoma,sans-serif;color:rgb(68,68,68)\">
							<img src=\"http://www.discoverushuaia.com.ar/images/logo_mail.jpg\" style=\"margin-right:0px\" width=\"162\" height=\"51\">&nbsp;&nbsp;
						</div>
						<div style=\"text-align:center;font-size:12.8px;font-family:tahoma,sans-serif;color:rgb(68,68,68)\">
							<b style=\"font-size:12.8px\"><font size=\"1\">@discoverrentacar</font></b><br>
						</div>
					</div>
					<div style=\"color:rgb(102,102,102);font-family:verdana,sans-serif\">
						<p class=\"MsoNormal\" style=\"text-align:center;font-family:tahoma,sans-serif\">
						<span lang=\"ES-TRAD\"><font size=\"1\" color=\"#666666\" face=\"tahoma, sans-serif\"><br></font></span>
						</p>
						<p class=\"MsoNormal\" style=\"text-align:center\"><span lang=\"ES-TRAD\">
						<font size=\"1\" color=\"#666666\" face=\"verdana, sans-serif\">25 de Mayo 260; 2� piso; of: 9; Ushuaia; Tierra del Fuego; Argentina</font></span></p>
						<p class=\"MsoNormal\" style=\"text-align:center\"><font size=\"1\" color=\"#666666\" face=\"verdana, sans-serif\"><span lang=\"ES-TRAD\">Te</span>l./Fax.: (54) 2901 425337 -&nbsp;</font>
						<span style=\"font-size:x-small;text-align:start\">Whatsapp:+(549) 2901 646393</span></p><p class=\"MsoNormal\" style=\"text-align:center\">
						<font size=\"1\" color=\"#666666\" face=\"verdana, sans-serif\">".utf8_encode(OFICINA_RESERVAS)."; Buenos Aires; Argentina</font></p>
						<p class=\"MsoNormal\" style=\"text-align:center\"><font size=\"1\" color=\"#666666\" face=\"verdana, sans-serif\"><span lang=\"ES-TRAD\">Te</span>l./Fax.: (54) 011 52547702 -&nbsp;</font>
						<span style=\"font-size:x-small\">".utf8_encode(SOLO_DESDE)." CABA: 0810-345-5002</span></p><p class=\"MsoNormal\" style=\"text-align:center\"><b style=\"font-size:x-small\">
						<a href=\"mailto:info@discoverushuaia.com.ar\" target=\"_blank\">info@discoverushuaia.com.ar</a>&nbsp;</b><b style=\"font-size:x-small\">
						<a href=\"http://www.discoverushuaia.com.ar/\" target=\"_blank\">
						www.discoverushuaia.com.ar</a></b><span style=\"font-size:x-small\">&nbsp;</span></p></div></div>";

                                //if (!$permite_tajeta) {
                                $asunto = utf8_encode(SOLICITUD_RESERVA_RECIBIDA)." (".$retiro.")";
                                /*}
                                else {
                                    $asunto .= "Su reserva está confirmada (".$retiro.")";
                                }*/

                                $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
                                $cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";

                                // Cabeceras adicionales
                                $cabeceras .= 'To: '.$_POST['nombre']." ".$_POST['apellido'].'<'.$_POST['email'].'>' . "\r\n";
                                //$cabeceras .= "From: $nombre <" . $_POST['email'] . ">" . "\r\n";
                                $cabeceras .= 'From: Discover Ushuaia Rent a Car<info@discoverushuaia.com.ar>' . "\r\n";


                                $nombreFile = date('Ymd') . '_log';
                                $dt = date('Y-m-d G:i:s');

                                $_Log = fopen("logs/" . $nombreFile . ".log", "a+") or die("Operation Failed!");

                                fputs($_Log, $dt . " --> Asunto: " . $asunto . "; Cuerpo: " . $cuerpo ."\n");

                                fclose($_Log);

                                @mail($_POST['EMAILCLIENTE'], $asunto, $cuerpo, $cabeceras);
                            }


                        } else {

                            mysqli_rollback($dbh2);
                        }
                        echo
                            utf8_encode(PROCESANDO).'<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<script>$("#contact-form").submit();</script>';
                    }
                    else{
                        echo utf8_encode(SIN_DISPONIBILIDAD);
                    }
                }
                elseif(($_POST['enviarform'])&&($_POST['apellido']!='')&&($_POST['nombre']!='')&&($_POST['email']!='')&&($_POST['telefono']!='')&&($_POST['HoraRetiro']!='')&&($_POST['HoraDevolucion']!='')){


                    $laSQL = "SELECT * FROM  configuracion_reservas where id= 'hs_reservas'";
                    $result = mysqli_query($dbh2,$laSQL);

                    if ($rowL = mysqli_fetch_array($result)) {
                        $hs_reservas = $rowL['valor'];
                    }

                    $arrayCategoria=explode('-',$_POST['auto']);
                    $laSQL = "SELECT * FROM  categorias where id= ".$arrayCategoria[0];
                    $result = mysqli_query($dbh2,$laSQL);
                    if(mysqli_affected_rows($dbh2)>0){
                        if ($rowL = mysqli_fetch_array($result)) {
                            $categoria_nombre = utf8_encode($rowL['categoria'].' - '.$rowL['vehiculos']);
                        }
                    }

                    $retiro=$_POST['retiro'];
                    $devolucion=$_POST['devolucion'];
                    $HoraRetiro=$_POST['HoraRetiro'];
                    $HoraDevolucion=$_POST['HoraDevolucion'];

                    list($dia1,$mes1,$ano1) = explode("/",$retiro);
                    list($dia2,$mes2,$ano2) = explode("/",$devolucion);
                    $desde = $ano1.'-'.$mes1.'-'.$dia1;
                    $hasta = $ano2.'-'.$mes2.'-'.$dia2;

                    $desde = $desde.' '.$HoraRetiro;
                    $horaResta = '-'.$hs_reservas.' hour';
                    $nuevafecha = strtotime ( $horaResta , strtotime ( $desde ) ) ;
                    $desde = date ( 'Y-m-d H:i:s' , $nuevafecha );

                    $horaSuma = '+'.$hs_reservas.' hour';
                    $hasta = $hasta.' '.$HoraDevolucion;
                    $nuevafecha = strtotime ( $horaSuma , strtotime ( $hasta ) ) ;
                    $hasta = date ( 'Y-m-d H:i:s' , $nuevafecha );

                    $laSQL = "SELECT * FROM unidads where activa = 1 AND categoria_id= ".$arrayCategoria[0]." AND baja >= '".$hasta."' AND habilitacion <= '".$desde."'";
                    //echo $laSQL;
                    $result = mysqli_query($dbh2,$laSQL);
                    $disponible=0;
                    if(mysqli_affected_rows($dbh2)>0){
                        WHILE ($rowL = mysqli_fetch_array($result)) {
                            $laSQL = "SELECT * FROM reservas R WHERE R.unidad_id= ".$rowL['id']."
						AND (estado is null OR estado!=2) AND ((((CONCAT(R.retiro,' ',R.hora_retiro)<'".$desde."')
						AND (CONCAT(R.devolucion,' ',R.hora_devolucion)>'".$hasta."')))
						OR (CONCAT(R.retiro,' ',R.hora_retiro) between '".$desde."' and '".$hasta."')
						OR (CONCAT(R.devolucion,' ',R.hora_devolucion) between '".$desde."' and '".$hasta."'))";

                            mysqli_query($dbh2,$laSQL);
                            //echo $laSQL.' => '.mysqli_affected_rows($dbh2);
                            if(mysqli_affected_rows($dbh2)==0){
                                $unidad_id = $rowL['id'];
                                $disponible=1;
                                break;
                            }
                        }
                    }

                    if ($disponible==1) {

                        $nombre=$_POST['nombre'];
                        echo '<strong>'.utf8_encode(NOMBRE).':</strong><input type="hidden" id="categoria_id" name="categoria_id" value="'.$arrayCategoria[0].'"><input type="hidden" id="nombre" name="nombre" value="'.$nombre.'"> '.$nombre.'<br>';
                        $apellido=$_POST['apellido'];
                        echo '<strong>'.utf8_encode(APELLIDO).':</strong> <input type="hidden" id="apellido" name="apellido" value="'.$apellido.'">'.$apellido.'<br>';
                        $email=$_POST['email'];
                        echo '<strong>E-mail:</strong> <input type="hidden" id="email" name="email" value="'.$email.'">'.$email.'<br>';
                        $telefono=$_POST['telefono'];
                        echo '<strong>'.utf8_encode(TELEFONO).':</strong> <input type="hidden" id="telefono" name="telefono" value="'.$telefono.'">'.$telefono.'<br>';
                        /*$ciudad=$_POST['ciudad'];
                        echo '<strong>Ciudad:</strong> '.$ciudad.'<br>';
                        $pais=$_POST['pais'];
                        echo '<strong>Pa&iacute;s:</strong> '.$pais.'<br>';*/
                        $localret=$_POST['localret'];
                        $laSQL = "SELECT * FROM  lugars WHERE id=".$localret;
                        $result = mysqli_query($dbh2,$laSQL);
                        if ($rowL = mysqli_fetch_array($result)) {
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
                            $lugarRetiro_nombre = utf8_encode($Nombre);
                        }

                        $localdev=$_POST['localdev'];
                        $laSQL = "SELECT * FROM  lugars WHERE id=".$localdev;
                        $result = mysqli_query($dbh2,$laSQL);
                        if ($rowL = mysqli_fetch_array($result)) {
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
                            $lugarDevolucion_nombre = utf8_encode($Nombre);
                        }
                        echo "<p></p><h5>".utf8_encode(DETALLE_RESERVA)."</h5>";
                        echo '<strong>'.utf8_encode(RETIRO).':</strong> <input type="hidden" id="retiro" name="retiro" value="'.$retiro.'"><input type="hidden" id="HoraRetiro" name="HoraRetiro" value="'.$HoraRetiro.'"><input type="hidden" id="localret" name="localret" value="'.$localret.'"><input type="hidden" id="retiroString" name="retiroString" value="'.$lugarRetiro_nombre.' '.$retiro.' '.$HoraRetiro.'">'.$lugarRetiro_nombre.' '.$retiro.' '.$HoraRetiro.'<br>';
                        echo '<strong>'.utf8_encode(DEVOLUCION).':</strong> <input type="hidden" id="devolucion" name="devolucion" value="'.$devolucion.'"><input type="hidden" id="HoraDevolucion" name="HoraDevolucion" value="'.$HoraDevolucion.'"><input type="hidden" id="localdev" name="localdev" value="'.$localdev.'"><input type="hidden" id="devolucionString" name="devolucionString" value="'.$lugarDevolucion_nombre.' '.$devolucion.' '.$HoraDevolucion.'">'.$lugarDevolucion_nombre.' '.$devolucion.' '.$HoraDevolucion.'<br>';



                        echo '<strong>'.utf8_encode(SU_AUTO).':</strong> <input type="hidden" id="unidad_id" name="unidad_id" value="'.$unidad_id.'"><input type="hidden" id="categoriaString" name="categoriaString" value="'.$categoria_nombre.'">'.$categoria_nombre.' '.formatMontoToView($arrayCategoria[1]).'<br>';
                        $total=$_POST['total'];








                        $extra=$_POST['extra'];

                        if (!$extra) {
                            $extras = utf8_encode(SIN_EXTRAS);
                        }
                        else{
                            $arrayHidden = '';

                            for ($i=0;$i<count($extra);$i++)
                            {
                                $arrayExtra=explode('-',$extra[$i]);

                                $arrayHidden .= $arrayExtra[0].'-'.$arrayExtra[1].',';
                                $laSQL = "SELECT * FROM  extra_subrubros WHERE id=".$arrayExtra[0];
                                $result = mysqli_query($dbh2,$laSQL);
                                if ($rowL = mysqli_fetch_array($result)) {
                                    if (isset($_SESSION['idioma'])) {
                                        switch ($_SESSION['idioma']) {
                                            case 'es':

                                                $Nombre=$rowL['subrubro'];

                                                break;
                                            case 'po':
                                                $Nombre=$rowL['subrubro_portugues'];
                                                break;
                                            case 'en':

                                                $Nombre=$rowL['subrubro_ingles'];
                                                break;

                                        }

                                    }
                                    else{
                                        $Nombre=$rowL['subrubro'];
                                    }
                                    $extras .= utf8_encode($Nombre)." ".formatMontoToView($arrayExtra[1])." - ";
                                }

                                //$extra.= $extra[$i]." - ";
                            }
                            $extras = substr($extras, 0, (strlen($extras)-3));
                            $arrayHidden = substr($arrayHidden, 0, (strlen($arrayHidden)-1));
                            echo '<input type="hidden" id="extra" name="extra" value="'.$arrayHidden.'">';
                        }
                        echo '<input type="hidden" id="extrasString" name="extrasString" value="'.$extras.'"><strong>'.utf8_encode(EXTRAS).':</strong> '.$extras.'<br>';
                        $arraySeguro=explode('-', $_POST['seguro']);
                        $laSQL = "SELECT * FROM  seguros WHERE id=".$arraySeguro[0];
                        $result = mysqli_query($dbh2,$laSQL);
                        if ($rowL = mysqli_fetch_array($result)) {
                            $seguro_nombre = utf8_encode($rowL['seguro']);
                        }
                        echo '<strong>'.utf8_encode(COBERTURA_SEGURO).':</strong> <input type="hidden" id="seguroId" name="seguroId" value="'.$arraySeguro[0].'"> <input type="hidden" id="seguroString" name="seguroString" value="'.utf8_decode($seguro_nombre).'">'.utf8_decode($seguro_nombre)." ".formatMontoToView($arraySeguro[1]).'';


                        echo '<hr style="margin-bottom: 0";/>';
                        echo '<div align="right"><input type="hidden" id="total" name="total" value="'.$_POST['total'].'">'.utf8_encode(TOTAL_RESERVA).' '.formatMontoToView($_POST['total']).'</div>';
                        echo "<h5>".utf8_encode(INICIAR_PROCESO_PAGO)."</h5>";

                        /*$arrayTotal=explode('-', $_POST['total']);
                        $laSQL = "SELECT * FROM  descuentos WHERE id=".$arrayTotal[1];
                        $result = mysqli_query($dbh2,$laSQL);
                        if ($rowL = mysqli_fetch_array($result)) {
                            $total_nombre = utf8_encode($rowL['descuento']);
                        }
                        echo $total_nombre." ".formatMontoToView($arrayTotal[2]).'<br><br>';*/
                        echo '<div id="radiosDescuentos">';

                        /*$laSQL = "SELECT * FROM  descuentos ";*/
                        $laSQL = "SELECT DISTINCT d.*
                                    FROM descuentos d
                                    LEFT JOIN descuento_periodos dp 
                                        ON dp.descuento_id = d.id
                                        AND CURDATE() BETWEEN STR_TO_DATE(dp.desde, '%d/%m/%Y') AND STR_TO_DATE(dp.hasta, '%d/%m/%Y')
                                    WHERE (
                                        dp.id IS NOT NULL  -- hay al menos un periodo válido hoy
                                        OR NOT EXISTS (
                                            SELECT 1 FROM descuento_periodos dp2 WHERE dp2.descuento_id = d.id
                                        )  -- o no tiene ningún periodo cargado
                                    )
                                ";
                        if (isset($_SESSION['idioma'])) {
                            switch ($_SESSION['idioma']) {
                                case 'es':

                                    $laSQL .=' WHERE activo = 1';

                                    break;
                                case 'po':
                                    $laSQL .=' WHERE activo_portugues = 1';
                                    break;
                                case 'en':

                                    $laSQL .=' WHERE activo_ingles = 1';
                                    break;

                            }

                        }
                        else{
                            $laSQL .=' WHERE activo = 1';
                        }
                        $laSQL .=' ORDER BY orden ASC';
                        $result = mysqli_query($dbh2,$laSQL);

                        while ($rowL = mysqli_fetch_array($result)) {
                            //$totalRadio = $_POST['total'] - ($_POST['total']*$rowL['coheficiente']);
                            $totalRadio = $_POST['total'];

                            if ($rowL['coheficiente']!=0) {
                                $totalRadio *=$rowL['coheficiente'];
                                $montoDescuento = $totalRadio;
                            }
                            if (isset($_SESSION['idioma'])) {
                                switch ($_SESSION['idioma']) {
                                    case 'es':

                                        $Nombre=$rowL['descuento'];
                                        $tarjeta=($rowL['tarjeta'])?1:($rowL['mercadopago'])?2:0;

                                        break;
                                    case 'po':
                                        $Nombre=$rowL['descuento_portugues'];

                                        $tarjeta=($rowL['tarjetaportugues'])?1:($rowL['mercadopagoportugues'])?2:0;
                                        break;
                                    case 'en':

                                        $Nombre=$rowL['descuento_ingles'];

                                        $tarjeta=($rowL['tarjeta_ingles'])?1:($rowL['mercadopago_ingles'])?2:0;
                                        break;

                                }

                            }
                            else{
                                $Nombre=$rowL['descuento'];

                            }

                            if ($rowL['parcial']!=0) {
                                $totalRadio *=$rowL['parcial'];
                                $textoDescuento = $Nombre.' '.formatMontoToView($montoDescuento).' (Pagar ahora: <span id="spanTotal-'.$rowL['id'].'">'.formatMontoToView($totalRadio).'</span>)';
                            }
                            else{
                                $textoDescuento = $Nombre.' <span id="spanTotal-'.$rowL['id'].'">'.formatMontoToView($totalRadio).'</span>';
                            }

                            echo'<input onClick="mostrarTarjetas(this)" class="contact-form-name" id="total-'.$rowL['id'].'" coheficiente='.$rowL['coheficiente'].' name="total_pago" type="radio" value="'.$totalRadio.'-'.$tarjeta.'-'.$rowL['id'].'" required/>'.$textoDescuento.'<br>';
                        }



                        echo '</div><br><div id="selectTarjetas" style="display:none">

				'.utf8_encode(TARJETA).'
				<select name="MEDIODEPAGO" size="1" id="mediodepago" style="display:inline;width:80px;">';
                        $laSQL = "SELECT DISTINCT marca, id_decidir FROM cobro_tarjeta_tipos WHERE activa = 1 AND cobro_tarjeta_posnet_id = 1";
                        $result = mysqli_query($dbh2,$laSQL);

                        while ($rowL = mysqli_fetch_array($result)) {
                            echo '<option value="'.$rowL['id_decidir'].'">'.$rowL['marca'].'</option>';
                        }
                        echo '

				</select> '.utf8_encode(EN).'
				<span id="selectCuotas">
				<select name="CUOTAS" size="1" id="cuotas" style="display:inline">


				</select></span> '.utf8_encode(CUOTAS).'
			</div>
			<div id="divSaldoTarjeta" style="display:none">
				<div align="right"><strong>'.utf8_encode(INTERESES_FINANCIEROS).'*: <span id="spanIntereses">$0,00</span><br>
				'.utf8_encode(TOTAL_A_PAGAR).': <span id="spanTotalTarjeta">$0,00</span>
			</strong></div>
			<div style="font-size:8px;"><strong>*'.utf8_encode(INTERESES_FINANCIEROS_COMENTARIO).'</strong></div>
			</div>
			<div id="divSaldo" style="display:none">
				<div align="right"><strong>'.utf8_encode(TOTAL_A_PAGAR).': <span id="spanTotalSinTarjeta">$0,00</span>
			</strong></div>

			</div>';
                        echo '
			<input type="hidden" name="totalFinal" id="totalFinal" value="" >
			<input id="terminos" name="terminos" type="checkbox" required/><a href="#">'.utf8_encode(ACEPTAR_TERMINOS).'</a>
			<p></p>';
                        echo '<input type="submit" name="enviarConfirmacion" id="enviarConfirmacion" value="'.utf8_encode(ALQUILAR_AUTO).'" style=" width:100%">';
                    }
                    else{
                        echo utf8_encode(SIN_DISPONIBILIDAD);
                    }



                }else{
                    if (($_POST['enviarform'])&&(($_POST['apellido']=='')||($_POST['nombre']=='')||($_POST['email']=='')||($_POST['telefono']=='')||($_POST['HoraRetiro']=='')||($_POST['HoraDevolucion']==''))) {
                        echo '<div id="mensaje" style="color:red">'.utf8_encode(CAMPOS_OBLIGATORIOS).'</div>';
                    }
                    $auto=$_POST['auto'];
                    $localret=$_POST['localret'];
                    $localdev=$_POST['localdev'];
                    $retiro=date('Y-m-d');
                    $laSQL = "SELECT * FROM  configuracion_reservas where id= 'dias_antes'";
                    $result = mysqli_query($dbh2,$laSQL);

                    if ($rowL = mysqli_fetch_array($result)) {
                        $dias_antes = $rowL['valor'];
                    }
                    $dias_antes++;
                    $retiro = date("d/m/Y", strtotime($retiro ."+ ".$dias_antes." days"));
                    if (($_POST['retiro']!='')&&($_POST['retiro']!='//')) {
                        $retiro=$_POST['retiro'];
                    }
                    $devolucion=date('Y-m-d');
                    $devolucion = date("d/m/Y", strtotime($devolucion ."+ ".$dias_antes." days"));
                    if (($_POST['devolucion']!='')&&($_POST['devolucion']!='//')) {
                        $devolucion=$_POST['devolucion'];
                    }

                    $HoraRetiro=date('H:i');
                    if (($_POST['HoraRetiro']!='')) {
                        $HoraRetiro=$_POST['HoraRetiro'];
                    }

                    $HoraDevolucion=date('H:i');
                    if (($_POST['HoraDevolucion']!='')) {
                        $HoraDevolucion=$_POST['HoraDevolucion'];
                    }

                    $array_dias['Sunday'] = utf8_encode(DOMINGO);
                    $array_dias['Monday'] = utf8_encode(LUNES);
                    $array_dias['Tuesday'] = utf8_encode(MARTES);
                    $array_dias['Wednesday'] = utf8_encode(MIERCOLES);
                    $array_dias['Thursday'] = utf8_encode(JUEVES);
                    $array_dias['Friday'] = utf8_encode(VIERNES);
                    $array_dias['Saturday'] = utf8_encode(SABADO);

                    list($dia1,$mes1,$ano1) = explode("/",$retiro);
                    list($dia2,$mes2,$ano2) = explode("/",$devolucion);
                    $desde = $ano1.'-'.$mes1.'-'.$dia1;
                    $hasta = $ano2.'-'.$mes2.'-'.$dia2;


                    $diaDesde = $array_dias[date('l', strtotime($desde))];
                    $diaHasta = $array_dias[date('l', strtotime($hasta))];


                    ?>
                    <input class="contact-form-name" id="nombre" name="nombre" size="40" value="<?php echo $_POST['nombre'];?>" type="text" placeholder="<?php echo utf8_encode(NOMBRE);?>" required onChange="mostrarResto();"/>
                    <input class="contact-form-name" id="apellido" name="apellido" size="40" value="<?php echo $_POST['apellido'];?>" type="text" placeholder="<?php echo utf8_encode(APELLIDO);?>" required onChange="mostrarResto();"/>
                    <input class="contact-form-name" id="email" name="email" size="40" value="<?php echo $_POST['email'];?>" type="text" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" title="mail@ejemplo.com" placeholder="Email" required onChange="mostrarResto();"/>
                    <!--  <input class="contact-form-name" id="telefono" name="telefono" size="20" value="" type="text" placeholder="Teléfono" required pattern="^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$"/>-->
                    <input class="contact-form-name" id="telefono" name="telefono" size="20" value="<?php echo $_POST['telefono'];?>" type="text" placeholder="<?php echo utf8_encode(TELEFONO);?>" required/>
                    <!--  <input class="contact-form-name" id="ciudad" name="ciudad" size="30" value="" type="text" placeholder="Ciudad" required />
                    <input class="contact-form-name" id="pais" name="pais" size="30" value="" type="text" placeholder="Pais" required /> -->

                    <?php echo utf8_encode(LUGAR_DE_RETIRO);?>:
                    <select name="localret"  style="width:100%; margin:2px 0px" required>
                        <?php
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


                            if($Id==$localret){$Locselected="selected";}else{$Locselected="";}
                            echo "<option value='$Id' $Locselected>$Nombre</option>";

                        }
                        ?></select>
                    <div class="col-md-12" style="margin:10px 0px; padding:0px">
                        <div class="vc_col-sm-6"><?php echo utf8_encode(DIA_RETIRO);?>:<br><input name="retiro" type="text" required  id="retiro" value="<?php echo $retiro?>" onChange="dameSelectHorarios();" readonly="readonly"></div>
                        <input type="hidden" name="HoraRetiroRecibida" id="HoraRetiroRecibida" value="<?php echo $HoraRetiro;?>" >
                        <div class="vc_col-sm-6" id="selectHoraRetiro"><?php echo utf8_encode(HORA_RETIRO);?><br><select name="HoraRetiro" id="HoraRetiro" required style="width:150px" onChange="igualarDevolucion();dameSelectCategorias()">

                                <?php
                                $laSQL = "SELECT * FROM feriados WHERE fecha = '".$desde."' AND abre = 0";



                                $result = mysqli_query($dbh2,$laSQL);
                                $feriado=0;


                                if(mysqli_affected_rows($dbh2)>0){

                                    $feriado=1;
                                    echo '<option value="" disabled selected>'.utf8_encode(CERRADO).'</option>';
                                }

                                if (!$feriado) {

                                    $laSQL = "SELECT hora_inicio, hora_fin FROM feriados SD LEFT JOIN feriado_horarios DH ON SD.id = DH.feriado_id WHERE abre=1 AND SD.fecha = '".$desde."'";



                                    $result = mysqli_query($dbh2,$laSQL);

                                    if(mysqli_affected_rows($dbh2)>0){
                                        $feriado=1;

                                        while ($rowL = mysqli_fetch_array($result)) {

                                            $start = $rowL['hora_inicio'];

                                            $end = $rowL['hora_fin'];



                                            $tStart = strtotime($start);

                                            $tEnd = strtotime($end);

                                            $tNow = $tStart;



                                            while($tNow <= $tEnd){

                                                $Hora=date("H:i",$tNow);

                                                if($Hora==$HoraDevolucion){

                                                    $Horselected="selected";

                                                }

                                                else{

                                                    $Horselected="";

                                                }



                                                echo "<option value='".$Hora."' $Horselected>$Hora</option>";

                                                $tNow = strtotime('+30 minutes',$tNow);

                                            }

                                        }

                                    }
                                }

                                if (!$feriado) {
                                    echo '<option value="" disabled>'.utf8_encode(ELEGIR).'</option>';
                                    $laSQL = "SELECT hora_inicio, hora_fin FROM semana_dias SD LEFT JOIN dia_horarios DH ON SD.id = DH.semana_dia_id WHERE SD.dia = '".$diaDesde."'";
                                    $result = mysqli_query($dbh2,$laSQL);
                                    if(mysqli_affected_rows($dbh2)!=-1){
                                        while ($rowL = mysqli_fetch_array($result)) {
                                            $start = $rowL['hora_inicio'];
                                            $end = $rowL['hora_fin'];

                                            $tStart = strtotime($start);
                                            $tEnd = strtotime($end);
                                            $tNow = $tStart;

                                            while($tNow <= $tEnd){
                                                $Hora=date("H:i",$tNow);
                                                if($Hora==$HoraRetiro){
                                                    $Horselected="selected";
                                                }
                                                else{
                                                    $Horselected="";
                                                }

                                                echo "<option value='$Hora' $Horselected>$Hora</option>";
                                                $tNow = strtotime('+30 minutes',$tNow);
                                            }
                                        }
                                    }
                                }

                                ?></select></div>
                    </div>
                    <br>
                    <?php echo utf8_encode(LUGAR_DE_DEVOLUCION);?>:
                    <select name="localdev" style="width:100%; margin:2px 0px" required><?php
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


                            if($Id==$localdev){$Locselected="selected";}else{$Locselected="";}
                            echo "<option value='$Id' $Locselected>$Nombre</option>";

                        }
                        ?></select>

                    <div class="col-md-12" style="margin:10px 0px; padding:0px">
                        <div class="vc_col-sm-6"><?php echo utf8_encode(DIA_DEVOLUCION);?>:<br><input name="devolucion" id="devolucion" type="text" required  value="<?php echo $devolucion?>" onChange="dameSelectHorarios();" readonly="readonly"></div>
                        <input type="hidden" name="HoraDevolucionRecibida" id="HoraDevolucionRecibida" value="<?php echo $HoraDevolucion;?>" >
                        <div class="vc_col-sm-6" id="selectHoraDevolucion"><?php echo utf8_encode(HORA_DEVOLUCION);?><br><select name="HoraDevolucion" id="HoraDevolucion" required style="width:150px" onChange="dameSelectCategorias();">
                                <?php
                                $laSQL = "SELECT * FROM feriados WHERE fecha = '".$hasta."' AND abre = 0";



                                $result = mysqli_query($dbh2,$laSQL);
                                $feriado=0;
                                if(mysqli_affected_rows($dbh2)>0){
                                    $feriado=1;
                                    echo '<option value="" disabled selected>'.utf8_encode(CERRADO).'</option>';
                                }

                                if (!$feriado) {
                                    $laSQL = "SELECT hora_inicio, hora_fin FROM feriados SD LEFT JOIN feriado_horarios DH ON SD.id = DH.feriado_id WHERE abre=1 AND SD.fecha = '".$hasta."'";



                                    $result = mysqli_query($dbh2,$laSQL);

                                    if(mysqli_affected_rows($dbh2)>0){
                                        $feriado=1;

                                        while ($rowL = mysqli_fetch_array($result)) {

                                            $start = $rowL['hora_inicio'];

                                            $end = $rowL['hora_fin'];



                                            $tStart = strtotime($start);

                                            $tEnd = strtotime($end);

                                            $tNow = $tStart;



                                            while($tNow <= $tEnd){

                                                $Hora=date("H:i",$tNow);

                                                if($Hora==$HoraDevolucion){

                                                    $Horselected="selected";

                                                }

                                                else{

                                                    $Horselected="";

                                                }



                                                echo "<option value='".$Hora."' $Horselected>$Hora</option>";

                                                $tNow = strtotime('+30 minutes',$tNow);

                                            }

                                        }

                                    }
                                }

                                if (!$feriado) {
                                    echo '<option value="" disabled>'.utf8_encode(ELEGIR).'</option>';
                                    $laSQL = "SELECT hora_inicio, hora_fin FROM semana_dias SD LEFT JOIN dia_horarios DH ON SD.id = DH.semana_dia_id WHERE SD.dia = '".$diaHasta."'";
                                    $result = mysqli_query($dbh2,$laSQL);
                                    if(mysqli_affected_rows($dbh2)!=-1){
                                        while ($rowL = mysqli_fetch_array($result)) {
                                            $start = $rowL['hora_inicio'];
                                            $end = $rowL['hora_fin'];

                                            $tStart = strtotime($start);
                                            $tEnd = strtotime($end);
                                            $tNow = $tStart;

                                            while($tNow <= $tEnd){
                                                $Hora=date("H:i",$tNow);
                                                if($Hora==$HoraDevolucion){
                                                    $Horselected="selected";
                                                }
                                                else{
                                                    $Horselected="";
                                                }

                                                echo "<option value='$Hora' $Horselected>$Hora</option>";
                                                $tNow = strtotime('+30 minutes',$tNow);
                                            }
                                        }
                                    }
                                }

                                ?></select></div>
                    </div>
                    <div id="restoDatos" style="display: none">
                        <div id="selectAutos">
                            <?php echo utf8_encode(CATEGORIA_DE_AUTO);?>:<br>
                            <select name="auto" style="width:100%; margin:2px 0px" id="auto" placeholder="<?php echo utf8_encode(CATEGORIA_DE_AUTO);?>" onChange="dameSelectExtras()">

                                <?php
                                /*$laSQL = "SELECT * FROM  categorias where Activo='1' ";
                                $result = mysqli_query($link,$laSQL);
                                $i=1;
                                            while ($rowL = mysqli_fetch_array($result)) {
                                                $Id=utf8_encode($rowL['Id']);
                                                $Categoria=utf8_encode($rowL['Categoria']);
                                                $Nombre=utf8_encode($rowL['Nombre']);
                                                if($auto==$Nombre){$autoselect="selected";}else{$autoselect="";}
                                                echo"<option value='$Nombre' $autoselect>$Nombre</option>";
                                            }*/

                                $laSQL = "SELECT * FROM  categorias where activa='1' ORDER BY orden";
                                $result = mysqli_query($dbh2,$laSQL);
                                $i=1;
                                while ($rowL = mysqli_fetch_array($result)) {
                                    $Id=utf8_encode($rowL['id']);
                                    $Categoria=utf8_encode($rowL['categoria']);
                                    if (isset($_SESSION['idioma'])) {
                                        switch ($_SESSION['idioma']) {
                                            case 'es':

                                                $Nombre=$rowL['vehiculos'];

                                                break;
                                            case 'po':
                                                $Nombre=$rowL['vehiculos_portugues'];
                                                break;
                                            case 'en':

                                                $Nombre=$rowL['vehiculos_ingles'];
                                                break;

                                        }

                                    }
                                    else{
                                        $Nombre=$rowL['vehiculos'];
                                    }
                                    if($auto==$Nombre){$autoselect="selected";}else{$autoselect="";}
                                    echo"<option value='$Id' $autoselect>".$Categoria." - ".$Nombre."</option>";
                                }
                                ?>
                            </select>


                        </div>

                        <div id="selectExtras">
                            <?php echo utf8_encode(EXTRAS);?>:<br>
                            <select name="extra[]" multiple="multiple" class="SlectBox2" style="width:100%; margin:2px 0px" id="extra" placeholder="<?php echo utf8_encode(SIN_EXTRAS);?>" onChange="sumarTotal()">

                                <?php


                                $laSQL = "SELECT * FROM  extra_subrubros WHERE extra_rubro_id = 1 AND activo = 1";
                                $result = mysqli_query($dbh2,$laSQL);

                                while ($rowL = mysqli_fetch_array($result)) {
                                    $Id=utf8_encode($rowL['id']);
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

                                    echo"<option value='$Id'>$subrubro</option>";
                                }
                                ?>
                            </select>


                        </div>
                        <div id="selectSeguros">
                            <?php echo utf8_encode(COBERTURA_SEGURO);?>:<br>
                            <select name="seguro" style="width:100%; margin:2px 0px" id="seguro" placeholder="<?php echo utf8_encode(COBERTURA_SEGURO);?>" onChange="sumarTotal()">

                                <?php


                                $laSQL = "SELECT * FROM  seguros ORDER BY orden ASC";
                                $result = mysqli_query($dbh2,$laSQL);

                                while ($rowL = mysqli_fetch_array($result)) {
                                    $Id=utf8_encode($rowL['id']);
                                    $importe=formatMontoToView($rowL['importe']);
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

                                    $style = (($Id=='3')||($Id=='6')||($Id=='9')||($Id=='12')||($Id=='16'))?'':' class=\'opcionAzul\'';
                                    echo"<option value='".$Id."-".$rowL['importe']."' ".$style.">".$Nombre." ".$importe."</option>";
                                }
                                ?>
                            </select>

                        </div>

                        <div class="col-md-12" style="margin:10px 0px; padding:0px" id="divTotal">
                            Total:
                        </div>
                        <input type="hidden" name="total" id="total" value="" >
                    </div>
                    <input type="submit" name="enviarform" id="enviarform" value="<?php echo utf8_encode(VER_DISPONIBILIDAD);?>" style=" width:100%">
                    <p></p>


                <?php }
            }?>

        </form>



    </div>


</div>


<script type="text/javascript">
    jQuery.noConflict();
    jQuery(document).ready(function () {
        window.asd = jQuery('.SlectBox2').SumoSelect({ csvDispCount: 3, captionFormatAllSelected: "Todos" });
        $(".mercadopago-button").click();
    });
    $("#contact-form").submit(function(){
        var retiroArray =  $("#retiro").val().split("/");
        var retiroDate = new Date(retiroArray[2]+"-"+retiroArray[1]+"-"+retiroArray[0]+" "+$("#HoraRetiro").val());

        var devolucionArray =  $("#devolucion").val().split("/");
        var devolucionDate = new Date(devolucionArray[2]+"-"+devolucionArray[1]+"-"+devolucionArray[0]+" "+$("#HoraDevolucion").val());

        // Compare the two dates by comparing the millisecond
        // representations.
        //alert(retiroDate.getTime()+" > "+devolucionDate.getTime())
        if (retiroDate.getTime() > devolucionDate.getTime()){
            alert("Por favor controle las fechas y horas de retiro y devolucion");
            return false;
        }
        else{
            return true;
        }
    });
    function dameSelectCategorias() {
        $.ajax({
            type : 'POST',
            data : $('#contact-form').serialize(),
            url : 'dameSelectCategorias.php',
            datatype : 'json',
            success: function(data){


                $('#selectAutos').html(JSON.parse(data).categorias);
                if(JSON.parse(data).seguros!=''){
                    $('#selectSeguros').html(JSON.parse(data).seguros);
                    $('#auto').change();
                    sumarTotal();
                }
                else{
                    $('#selectSeguros').html('');
                    $('#selectExtras').html('');
                    $('#divTotal').html('');
                }

            }
        });
    }

    function dameSelectExtras() {
        //alert($('#selectExtras').html());
        //if($('#selectExtras').html()!=''){
        $.ajax({
            type : 'POST',
            data : $('#contact-form').serialize(),
            url : 'dameSelectExtras.php',
            datatype : 'json',
            success: function(data){

                $('#selectExtras').html(JSON.parse(data).extras);
                $('#selectSeguros').html(JSON.parse(data).seguros);
                window.asd = jQuery('.SlectBox2').SumoSelect({ csvDispCount: 3, captionFormatAllSelected: "Todos" });
                sumarTotal();
            }
        });
        //}

    }

    function dameSelectHorarios() {
        $.ajax({
            type : 'POST',
            data : $('#contact-form').serialize(),
            url : 'dameSelectHorarios.php',
            datatype : 'json',
            success: function(data){

                $('#selectHoraRetiro').html(JSON.parse(data).selectHoraRetiro);
                $('#selectHoraDevolucion').html(JSON.parse(data).selectHoraDevolucion);
                dameSelectCategorias();
            }
        });
    }

    function dameSelectTarjetas() {
        $.ajax({
            type : 'POST',
            data : $('#contact-form').serialize(),
            url : 'dameSelectTarjetas.php',
            datatype : 'json',
            success: function(data){
                $('#selectTarjetas').html(JSON.parse(data).tarjetas);

            }
        });
    }

    function igualarDevolucion() {

        $('#HoraDevolucion').val($('#HoraRetiro').val());
    }

    function limpiarDevolucion() {

        $('#devolucion').val('');
    }

    var formatNumber = {
        separador: ".", // separador para los miles
        sepDecimal: ',', // separador para los decimales
        formatear:function (num){
            num +='';
            var splitStr = num.split('.');
            var splitLeft = splitStr[0];
            var splitRight = splitStr.length > 1 ? this.sepDecimal + splitStr[1] : '';
            var regx = /(\d+)(\d{3})/;
            while (regx.test(splitLeft)) {
                splitLeft = splitLeft.replace(regx, '$1' + this.separador + '$2');
            }
            return this.simbol + splitLeft  +splitRight;
        },
        new:function(num, simbol){
            this.simbol = simbol ||'';
            return this.formatear(num);
        }
    }

    function sumarTotal(){
        var arrayAuto = $('#auto').val().split('-');
        var montoAuto = 0;
        if(arrayAuto[1]){
            montoAuto = arrayAuto[1];
        }
        var arrayExtras;
        var montoExtras = 0;

        $('#extra option:checked').each(function(){

            arrayExtras = $( this ).val().split('-');
            //alert($( this ).val());
            if(arrayExtras[1]){
                montoExtras = parseFloat(montoExtras)+parseFloat(arrayExtras[1]);
            }
        });
        var arraySeguro = $('#seguro').val().split('-');
        var montoSeguro = 0;
        if(arraySeguro[1]){
            montoSeguro = arraySeguro[1];
        }
        var total =  parseFloat(montoAuto)+parseFloat(montoExtras)+parseFloat(montoSeguro);
        $('#divTotal').html('Total: '+formatNumber.new(total, "$"));
        $('#total').val(parseFloat(total));
    }


    function itemsRadios(){
        $('#radiosDescuentos input[type=radio]').each(function() {
            //alert($( this ).attr('coheficiente'));
            totalRadio = parseFloat(total) - (parseFloat(total)*parseFloat($( this ).attr('coheficiente')));
            $( this ).attr('value',$( this ).attr('id')+'-'+totalRadio);
            var arrayID = $( this ).attr('id').split('-');
            $('#spanTotal-'+arrayID[1]).html(formatNumber.new(totalRadio, "$"));
        });
    }
    function mostrarResto(){
        if(($('#nombre').val()!='')&&($('#apellido').val()!='')&&($('#email').val()!='')){

            $('#restoDatos').show();
        }
        else $('#restoDatos').hide();

    }

    $(function() {
        mostrarResto();
        dameSelectCategorias();
        dameSelectHorarios();
    })


    $(function(){
        $("#mediodepago").change(function(){ // se activa el script cuando selecciono el select vehiculo
            tarjeta=$(this).val() // Tomo el valor seleccionado

            //envio a una pagina que hara la consulta sql y me devolvera los datos para poner en el select

            $.get("posnet/cuotasSelectNueva.php?tarjeta="+tarjeta,
                function(data){
                    $("#selectCuotas").html(data); // Tomo el resultado e inserto los datos en el select marca
                    $("#cuotas").change();
                });
        });

    });

    function seleccionarCuota(e){

        var res = e.value.split("-");
        var total = $("input[name='total_pago']:checked").val().split("-");

        var num_interes = Math.round(parseFloat(total[0])*(parseFloat(res[1])-1)*100)/100;

        $("#spanIntereses").html(formatNumber.new(num_interes, "$"));
        $("#spanTotalTarjeta").html(formatNumber.new(parseFloat(total[0])+parseFloat(num_interes), "$"));
        $('#totalFinal').val(parseFloat(total[0])+parseFloat(num_interes));
    }

    function mostrarTarjetas(e){
        var res = e.value.split("-");
        if(res[1]==1){

            $('#selectTarjetas').show();
            $("#mediodepago").change();
            $('#divSaldoTarjeta').show();
            $('#divSaldo').hide();

        }
        else {
            $('#selectTarjetas').hide();
            $('#divSaldoTarjeta').hide();
            $('#divSaldo').show();
            var total = $("input[name='total_pago']:checked").val().split("-");
            $("#spanTotalSinTarjeta").html(formatNumber.new(parseFloat(total[0]), "$"));
            $('#totalFinal').val(parseFloat(total[0]));
        }

    }
</script>

<script src="js/jquery.sumoselect.js"></script>
<link href="css/sumoselect.css" rel="stylesheet" />



