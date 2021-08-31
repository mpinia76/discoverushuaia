<?php
session_start();
// Borramos toda la sesion
session_destroy();
	echo"<SCRIPT LANGUAGE='javascript'>location.href= 'index.php'</SCRIPT>";

?>