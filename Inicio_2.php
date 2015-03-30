<?php 
session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="estilos_Otras.css" type="text/css" />
<title>Inicio</title>
<style type="text/css">
<!--
body {
	background-color: #3d1c00;
}
a:link {
	text-decoration: none;
	color: #FFFFFF;
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
}
.Estilo2 {color:#3d1c00;}
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
          <li class="flecha"><a href="Inicio_1.php"><span class="Estilo2">Inicio</span></a>
          <div id="punta"></div></li>
          <li><a href="Restaurantes.php"><span>Restaurantes</span></a></li>
          <li><a href="Categorias.php"><span>Categorias</span></a></li>
          <li><a href="#"><span>Favoritos</span></a></li>
          <li><a href="top5.php"><span>Top 5</span></a></li></ul></div>
</div>

<div id="cuerpo"> 
<div id="barra_inferior">
<p class="interlineado2">&nbsp;</p>
<p class="interlineado2" align="center"><a href="#">Nosotros</a> | <a href="#">@alacarta5 </a>| <a href="#">www.facebook.com/alacarta</a></p>
</div>

<div id="cuerpo_izquierdo">


<div class="letrasubmenu" id="submenu_noseleccionado" onclick="window.location = 'Inicio_1.php';"><p>&nbsp;</p><p>Actualizaciones</p><p> Recientes</p></div>
<div id="puntasubmenu2"></div>
<div id="ezquinasubmenu2"></div>

<div class="letrasubmenu" id="submenu_seleccionado2"><p>&nbsp;</p>
<p>Lo m&aacute;s nuevo</p></div>
<div id="puntasubmenu"></div>
<div id="ezquinasubmenu"></div>
</div>

<div id="cuerpo_derecho">
<div id="titulo">Restaurantes</div>
<div id="cuerpo_derecho_tabla">
  <table width="96%" height="325" border="0">
    <tr>
      <td height="126" width="175" valign="bottom"><img src="imagenes/Inicio_2/Restaurante1.png" width="126" height="100" /></td>
      <td height="126" width="175" valign="bottom"><img src="imagenes/Inicio_2/Restaurante2.png" width="126" height="100" /></td>
      <td height="126" width="175" valign="bottom"><img src="imagenes/Inicio_2/Restaurante3.png" width="126" height="100" /></td>
    </tr>
    <tr>
      <td height="34" class="textoentabla"><a href="#">AllFood</a></td>
      <td height="34" class="textoentabla"><a href="#">Gremium</a></td>
      <td height="34" class="textoentabla"><a href="#">MogiMirim</a></td>
    </tr>
    <tr>
      <td height="126" width="175" valign="bottom"><img src="imagenes/Inicio_2/Restaurante4.png" width="126" height="100" /></td>
      <td height="126" width="175" valign="bottom"><img src="imagenes/Inicio_2/Restaurante5.png" width="126" height="100" /></td>
      <td height="126" width="175" valign="bottom"><img src="imagenes/Inicio_2/Restaurante6.png" width="126" height="100" /></td>
    </tr>
    <tr>
        <td height="34" class="textoentabla"><a href="#">Almaharah</a></td>
      <td height="34" class="textoentabla"><a href="#">La Forcheta</a></td>
      <td height="34" class="textoentabla"><a href="#">Tsunami</a></td>
    </tr>
  </table>
</div>
</div>
</div>
</div>
</body>
</html>
