<?php
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "restaurante";
$prefix = "";

$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Opps... Algo ha salido mal conectando con la Base de Datos");
mysql_select_db($mysql_database, $bd) or die("Opps... Algo ha salido mal con la Base de Datos");

?>