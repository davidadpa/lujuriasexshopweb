
<?php


define("KEY", "moustro315"); /*llave para encriptar informacion*/
define("COD", "AES-128-ECB"); /*METODO DE INCRIPTACION*/

$host="localhost";
$bd="sexshop_bd";
$usuario="root";
$contrasenia="";

try {
  $conexion =new PDO("mysql:host=$host;dbname=$bd",$usuario,$contrasenia);
 
} catch (Exception $ex) {
 echo $ex->getMessage();
}


?>
