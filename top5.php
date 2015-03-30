<?php 
session_start();
include"database.php";
include('conex.php');
$link=Conectar();

if($_SESSION['nombre_ususario']=="")
{
  ?>
        <script language="JavaScript" type="text/javascript">
        alert("No has iniciado sesion, inicia sesion para acceder a el top 5");
      </script>
                  <script type="text/javascript">   
                document.location="index.php";  
                </script>
  <?php 
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="estilos_Otras.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="animate.css" />
<script type='text/javascript' src='js/jquery-1.7.1.js'></script>
<title>Top 5</title>
<style type="text/css">
<!--
body {
	background-color: #3d1c00;
}
a:link {
	color: #FFFFFF;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #FFFFFF;
}
a:hover {
	text-decoration: none;
	color: #ca7200;
}
a:active {
	text-decoration: none;
	color: #FFFFFF;
}
.Estilo2 {color: #3D1C00}
.letrasubmenu {
font-size: 18px;
color:#FFFFFF;
font-weight:bold;
text-align:right;
line-height:0px;
}
-->
</style></head>
<body>
<div id="contenedor">

<div id="cabecera"> 

<div id="barrausuario">
<div id="herramientas"></div>
<div id="imagenusuario"></div>
<div id="nombreusuario" align="center"><?php echo $_SESSION['nombre_ususario']; ?></div>
<div id="cerrarsesion"><a href="index.php"><span class="letracerrarsesion">Cerrar Sesi&oacute;n</span></a></div>
</div>

<div id="Eizquierda"></div>
<div id="Ederecha"></div>
<div id="busqueda">
  <label>
    <input type="text" name="textfield" id="textfield" value="B&uacute;squeda..." />
  </label>
</div>
<div id="logo">
 <h1 class="h">Restaurantes a la Carta</h1>
</div>

<div id="menu">

        <ul>
          <!-- CSS Tabs -->
          <li><a href="Inicio_1.php"><span>Inicio</span></a></li>
          <li><a href="Restaurantes.php"><span>Restaurantes</span></a></li>
          <li><a href="Categorias.php"><span>Categorias </span></a></li>
          <li><a href="#"><span>Favoritos</span></a></li>
          <li class="flecha"><a href="top5.php"><span class="Estilo2">Top 5</span>
		  </a><div id="punta"></div></li></ul></div>
		  
</div>
		  

<div id="cuerpo"> 
<div id="barra_inferior">
<p class="interlineado2">&nbsp;</p>
<p class="interlineado2" align="center"><a href="#">Nosotros</a> | <a href="#">@alacarta5</a> | <a href="#">www.facebook.com/alacarta</a></p></div>
<div id="fondo_top5">



<?php 
	$destino = '$DOCUMENT_ROOT/../imagesRestaurant/';
	$sql = "SELECT re.id, re.nombre, SUM(calificacion) calif, m.ruta 
			FROM comentario c, restaurante re, multimedia m 
			WHERE re.id = c.restaurante_id AND m.restaurante_id = c.restaurante_id AND m.plato_id IS NULL 
			GROUP BY c.restaurante_id 
			ORDER BY calif desc LIMIT 5";
	 $cons = mysql_query($sql) or die('MySql Error' . mysql_error());; 
	 if($cons){
	 	$top1 = mysql_fetch_row($cons);
	 	echo "<div id='nombre_numero1'> <a href='infoRestaurant.php?id=".$top1[0]."'>".$top1[1]."</a></div>";
	 		echo "<div id='numero1' class='animated zoomIn' onclick='mostrar(".$top1[0].")'><a href='infoRestaurant.php?id=".$top1[0]."'><img src='".$destino.$top1[3]."' width='300' height='211' /></a>";
				echo "<div id='num1' class='animated tada'></div>";
			echo "</div>";

			echo "<div id='tabla_top4'>";
				echo "<table width='759' height='150' border='0' align='center'>";
					echo "<tr>";
						$n = 2;
						while ($top5 = mysql_fetch_array($cons)) {
							echo "<td width='182' height='34' class='nombres_top4'>#2 ".$top5[1]."</td>";
						}			    
					echo "</tr>";
					echo "<tr>";
						while ($top5 = mysql_fetch_array($cons)) {
							echo "<td align='center' class='animated zoomIn'><a href='infoRestaurant.php?id=".$top5[0]."'><img  src='".$destino.$top5[3]."' /></a></td>";
						}			    
					echo "</tr>";
				echo "</table>";
			echo "</div>";
	 	echo "</div>";


	 }
	 
?>
</div>

</div>
</body>
</html>
