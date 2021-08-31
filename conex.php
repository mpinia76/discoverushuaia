<?php



function Conectarse($host, $usr, $pass, $bd)

{

  /* if (!($link=mysql_connect($host, $usr, $pass)))

   {

      echo "Error conectando a la base de datos.";

      exit();

   }

   if (!mysql_select_db($bd,$link))

   {

      echo "Error seleccionando la base de datos.";

      exit();

   }*/

    $link=mysqli_connect($host, $usr, $pass, $bd);

   return $link;

}







?>

