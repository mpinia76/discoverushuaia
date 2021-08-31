<?php

function formatMontoToView( $monto ){

		if( empty($monto) )
		$monto = 0;

		$res = $monto;
		//si es negativo, le quito el signo para agregarlo antes de la moneda.
		if( $monto < 0 ){
			$res = $res * (-1);
		}

		$res = number_format ( $res , 2 , ',', '.' );


		$res = '$' . $res;





		return $res;
	}

function dias($fecha1, $fecha2, $hora1, $hora2){
	list($dia1,$mes1,$ano1) = explode("/",$fecha1);
	list($dia2,$mes2,$ano2) = explode("/",$fecha2);
	list($h1,$m1) = explode(":",$hora1);
	list($h2,$m2) = explode(":",$hora2);
	$timestamp1 = mktime($h1,$m1,0,$mes1,$dia1,$ano1);
	$timestamp2 = mktime($h2,$m2,0,$mes2,$dia2,$ano2);
	$dias_diferencia = floor(($timestamp1 - $timestamp2) / (60 * 60 * 24));
	return $dias_diferencia;
}



function horas($fecha1, $fecha2, $hora1, $hora2){
	list($dia1,$mes1,$ano1) = explode("/",$fecha1);
	list($dia2,$mes2,$ano2) = explode("/",$fecha2);

	$date1 = strtotime($ano1.'-'.$mes1.'-'.$dia1.' '.$hora1.':00');
	$date2 = strtotime($ano2.'-'.$mes2.'-'.$dia2.' '.$hora2.':00');
	$subTime = $date1 - $date2;
	$y = ($subTime/(60*60*24*365));
	$d = ($subTime/(60*60*24))%365;
	$h = ($subTime/(60*60))%24;
	$m = ($subTime/60)%60;

	return array($y,$d,$h,$m);
}

function formatMessage($msg, $params){

		if(!empty($params)){

			$count = count ( $params );
			$i=1;
			while ( $i <= $count ) {
				$param = $params [$i-1];

				$msg = str_replace('$'.$i, $param, $msg);

				$i ++;
			}

		}
		return $msg;


	}

function getBrowser_old($user_agent){

    if(strpos($user_agent, 'MSIE') !== FALSE)
        return 'Internet explorer';
    elseif(strpos($user_agent, 'Edge') !== FALSE) //Microsoft Edge
        return 'Microsoft Edge';
    elseif(strpos($user_agent, 'Trident') !== FALSE) //IE 11
        return 'Internet explorer';
    elseif(strpos($user_agent, 'Opera Mini') !== FALSE)
        return "Opera Mini";
    elseif(strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR') !== FALSE)
        return "Opera";
    elseif(strpos($user_agent, 'Firefox') !== FALSE)
        return 'Mozilla Firefox';
    elseif(strpos($user_agent, 'Chrome') !== FALSE)
        return 'Google Chrome';
    elseif(strpos($user_agent, 'Safari') !== FALSE)
        return "Safari";
    else
        return 'No hemos podido detectar su navegador';


}

function getBrowser($user_agent)
{
    // Make case insensitive.
    $t = strtolower($user_agent);

    // If the string *starts* with the string, strpos returns 0 (i.e., FALSE). Do a ghetto hack and start with a space.
    // "[strpos()] may return Boolean FALSE, but may also return a non-Boolean value which evaluates to FALSE."
    //     http://php.net/manual/en/function.strpos.php
    $t = " " . $t;

    // Humans / Regular Users
    if     (strpos($t, 'opera'     ) || strpos($t, 'opr/')     ) return 'Opera'            ;
    elseif (strpos($t, 'edge'      )                           ) return 'Edge'             ;
    elseif (strpos($t, 'chrome'    )                           ) return 'Chrome'           ;
    elseif (strpos($t, 'safari'    )                           ) return 'Safari'           ;
    elseif (strpos($t, 'firefox'   )                           ) return 'Firefox'          ;
    elseif (strpos($t, 'msie'      ) || strpos($t, 'trident/7')) return 'Internet Explorer';

    // Search Engines
    elseif (strpos($t, 'google'    )                           ) return '[Bot] Googlebot'   ;
    elseif (strpos($t, 'bing'      )                           ) return '[Bot] Bingbot'     ;
    elseif (strpos($t, 'slurp'     )                           ) return '[Bot] Yahoo! Slurp';
    elseif (strpos($t, 'duckduckgo')                           ) return '[Bot] DuckDuckBot' ;
    elseif (strpos($t, 'baidu'     )                           ) return '[Bot] Baidu'       ;
    elseif (strpos($t, 'yandex'    )                           ) return '[Bot] Yandex'      ;
    elseif (strpos($t, 'sogou'     )                           ) return '[Bot] Sogou'       ;
    elseif (strpos($t, 'exabot'    )                           ) return '[Bot] Exabot'      ;
    elseif (strpos($t, 'msn'       )                           ) return '[Bot] MSN'         ;

    // Common Tools and Bots
    elseif (strpos($t, 'mj12bot'   )                           ) return '[Bot] Majestic'     ;
    elseif (strpos($t, 'ahrefs'    )                           ) return '[Bot] Ahrefs'       ;
    elseif (strpos($t, 'semrush'   )                           ) return '[Bot] SEMRush'      ;
    elseif (strpos($t, 'rogerbot'  ) || strpos($t, 'dotbot')   ) return '[Bot] Moz or OpenSiteExplorer';
    elseif (strpos($t, 'frog'      ) || strpos($t, 'screaming')) return '[Bot] Screaming Frog';

    // Miscellaneous
    elseif (strpos($t, 'facebook'  )                           ) return '[Bot] Facebook'     ;
    elseif (strpos($t, 'pinterest' )                           ) return '[Bot] Pinterest'    ;

    // Check for strings commonly used in bot user agents
    elseif (strpos($t, 'crawler' ) || strpos($t, 'api'    ) ||
        strpos($t, 'spider'  ) || strpos($t, 'http'   ) ||
        strpos($t, 'bot'     ) || strpos($t, 'archive') ||
        strpos($t, 'info'    ) || strpos($t, 'data'   )    ) return '[Bot] Other'   ;

    return 'Other (Unknown)';
}

?>
