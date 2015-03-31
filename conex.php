<?php 
function Conectar(){
 if($link=mysql_connect("localhost","root","root"))
 {
     if(mysql_select_db("restaurante",$link))
	 {
	    return $link;
	 }
	 else
	    die('Imposible seleccionar la base de datos');	 
 }
 else
 {
   die('No se pudo conectar al servidor de base de datos');
 }
 
}
?>
