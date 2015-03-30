<?php 
session_start();

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
<div id="nombre_numero1">Wakame Sushi Bar</div>
	<div id="numero1"><img src="imagenes/Top5/1.png" width="300" height="211" />
		<div id="num1"></div>
	</div>
	<div id="tabla_top4">
  <table width="759" height="150" border="0" align="center">
  <tr>
    <td width="182" height="34" class="nombres_top4">#2 La Forchetta</td>
    <td width="182" class="nombres_top4">#3 Brasamole</td>
    <td width="182" class="nombres_top4">#4 AllFood</td>
    <td width="185" class="nombres_top4">#5 Gremium</td>
  </tr>
  <tr>
    <td align="center"><img src="imagenes/Top5/2.png" /></td>
    <td align="center"><img src="imagenes/Top5/3.png" /></td>
    <td align="center"><img src="imagenes/Top5/4.png" /></td>
    <td align="center"><img src="imagenes/Top5/5.png" /></td>
  </tr>
</table>
	</div>
</div>
</div>

</div>
</body>
</html>
