<?php

function Conectarse($host, $usr, $pass, $bd)
{
   if (!($link=mysqli_connect($host, $usr, $pass, $bd)))
   {
      echo "Error conectando a la base de datos.";
      exit();
   }
   /*if (!mysql_select_db($bd,$link))
   {
      echo "Error seleccionando la base de datos.";
      exit();
   }*/
   return $link;
}


?>
