<?php 
session_start();
require('_drawrating.php'); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="estilos_Otras.css" type="text/css" />

<link rel="stylesheet" type="text/css" href="css/default.css" />
<link rel="stylesheet" type="text/css" href="css/rating.css" />
<script type="text/javascript" language="javascript" src="js/behavior.js"></script>
<script type="text/javascript" language="javascript" src="js/rating.js"></script>
<title>Calificación</title>
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
.Estilo2 {color: #3D1C00;}

.Estilo3 {
	background-image:url(imagenes/restaurantes/pag%20sel.png);
	background-repeat:repeat-x;
	padding:3px;
	z-index:6;
	}
	
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

  <?php 

include('conex.php');
	$link=Conectar();
	
		$sql="select round(avg(total_value),0) from rating";
		$res=mysql_query($sql,$link);
		$puntos= mysql_result($res,0);
	//	echo 'Prom: '.$puntos; 
		$_SESSION["prom"]=$puntos;
		
 
	
/*
$consulta=mysql_query("SELECT nombre, ubicacion, telefono FROM restaurante");
echo "<table width='821' height='436' border='1' id='tabla_rest' name='tabla_rest' align='center'>";

			while($registro=mysql_fetch_array($consulta)){
				


				
			}//while
	echo "</table>";*/

/*	
	if(isset($_POST["comentar"])){
	
	$sql="insert into comentario values('','".$_POST["comen"]."','qq','q111q','hola')";


	if(mysql_query($sql,$link)){
	   echo  "Registro ingresado...";	 ?>   	
<script language="JavaScript" type="text/javascript"> 
alert('comento');
<!-- document.location='index.php'; --></script>
<?php

	}
	else
	   echo "Ha ocurrido un error al tratar de ingresar...";
}
	
*/


	
	?>



<div id="contenedor3">

<div id="cabecera"> 

<div id="barrausuario">
<div id="herramientas"></div>
<div id="imagenusuario"></div>
<div id="nombreusuario" align="center"><?php echo $_POST["usuar"]; ?></div>
<div id="cerrarsesion"><a href="index.php"><span class="letracerrarsesion">Cerrar Sesión</span></a></div>
</div>

<div id="Eizquierda"></div>
<div id="Ederecha"></div>
<div id="busqueda">
  <label>
    <input type="text" name="textfield" id="textfield" value="Búsqueda..." />
  </label>
</div>
<div id="logo">
	<h1 class="h">Restaurantes a la Carta</h1>
</div>

<div id="menu">

        <ul>
          <!-- CSS Tabs -->
          <li><a href="perfil.php"><span>Perfil</span></a></li>
          <li><a href="platos_usuario.php"><span>Platos</span></a>
		  </li>
          <li class="flecha"><a href="calificacion.php"><span class="Estilo2">Calificación</span></a><div id="punta"></div></li>
		  
	  </ul>
		  
    </div>
		  
</div> 

<div id="cuerpo3"> 
<div id="barra_inferiorc">
<p class="interlineado2">&nbsp;</p>
<p class="interlineado2" align="center">&nbsp;</p>
<p class="interlineado2" align="center">&nbsp;</p>
<p class="interlineado2" align="center"><a href="#">Nosotros</a> | <a href="#">@alacarta5</a>| <a href="#">www.facebook.com/alacarta</a></p>
</div>
    <div id="fondo_perfil2">
     <p class="letra_calificacion">Para hacer la calificación de nuestro restaurante, debe ingresar el número de estrellas que prefiera de acuerdo a los siguientes criterios: </p>
	 <div id="califica">
     <table width="809" height="126" border="0" align="right" >
       <tr>
         <td width="265" height="67" class="letrastablacalif"><p align="left">Calidad de la Comida</p>
           <p align="left">  <?php echo rating_bar(1,5); ?></p></td>
         
         <td width="265"> <p align="left">Calidad del Servicio </p>
           <p align="left"><?php echo rating_bar(2,5); ?>              </p>
            </p></td>
         <td width="265"> <p align="left">Higiene</p>
           <p align="left"><?php echo rating_bar(3,5); ?>              </p>
            </p></td>
       </tr>
       <tr>
         <td> <p align="left">Instalaciones</p>
           <p align="left"><?php echo rating_bar(4,5); ?>              </p>
            </p></td>
         <td> <p align="left">Precios</p>
           <p align="left"><?php echo rating_bar(5,5); ?>              </p>
            </p></td>
         <td> <p align="left">Seguridad</p>
           <p align="left"> <?php echo rating_bar(6,5); ?>              </p>
            </p></td>
       </tr>
     </table>
	 </div>
	  <form action="" method="post">
	 <div id="califica2">
	
	  
	  <div id="comenta">

	  
<table width="340" height="180" border="1">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</div>
	  
	  <div id="area1"> <textarea name="comen" cols="40" rows="3" class="borde_campo" style="border:none"></textarea></div>
	 <div id="boton_c"><input name="comentar" type="submit" value="Comentar" class="tam_buttonc button"/>
	
	 </div>
	 
	 </div>
	 
	
	 </form>
    </div>  
</div>
</div>

</div>
</body>
</html>