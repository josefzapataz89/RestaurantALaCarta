<?php 
session_start();
include('conex.php');
  $link=Conectar();
if($_SESSION["tipo_usuario"]!="1")
{
  ?>
        <script language="JavaScript" type="text/javascript">
        alert("Debe Ingresar como Usuario");
      </script>
                  <script type="text/javascript">   
                document.location="index.php";  
                </script>
  <?php 
}

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="estilos_Otras.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="animate.css" />
<script type='text/javascript' src='js/jquery-1.7.1.js'></script>
<title>Inicio</title>
<style type="text/css">
<!--
body {
	background-color: #3d1c00;
}
a:link {
	color: #FFFFFF;
	text-decoration: none;
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

<div id="logo">
 <h1 class="h">Restaurantes a la Carta</h1>
</div>

<div id="menu">

        <ul>
          <!-- CSS Tabs -->
          <li class="flecha"><a href="Inicio_1.php"><span class="Estilo2">Inicio</span></a>
          <div id="punta"></div></li>
          <li><a href="Restaurantes.php"><span>Restaurantes</span></a></li>
          <li><a href="categorias.php"><span>Categorias</span></a></li>
          <li><a href="Reservas.php"><span>Reservas</span></a></li>
          <li><a href="top5.php"><span>Top 5</span></a></li></ul></div></div>

<div id="cuerpo"> 
<div id="barra_inferior">
<p class="interlineado2">&nbsp;</p>
<p class="interlineado2" align="center"><a href="#">Nosotros</a> | <a href="#">@alacarta5</a> | <a href="#">www.facebook.com/alacarta</a></p>
</div>

<div id="cuerpo_izquierdo">

<a href="#" style="font-family:Arial;"><div class="letrasubmenu" id="submenu_seleccionado"><p>&nbsp;</p><p>Actualizaciones</p><p> Recientes</p></div></a>
<div id="puntasubmenu3"></div>
<div id="ezquinasubmenu3"></div>

<a href="Inicio_2.php"  style="font-family:Arial;"><div class="letrasubmenu" id="submenu_noseleccionado"><p>&nbsp;</p>
<p>Lo m&aacute;s nuevo</p>
</div></a>
<div id="puntasubmenu2"></div>
<div id="ezquinasubmenu2"></div>
</div>

<div id="cuerpo_derecho">
 <table  class="displayy" id="tmaterial" width="100%" align="center" border="0">

                                                                   
                                                                    <tbody>


                                                                        <?php

                                                                        header ('Content-type: text/html; charset=utf-8');

                                                                        $result = mysql_query("select distinct m.ruta ruta, p.nombre nombre, p.descripcion descripcion, r.nombre nom
from plato p join multimedia m
on (p.id = m.plato_id)
join restaurante r
on(r.id = m.restaurante_id)
order by m.fecha desc
limit 4");

                                                                        while ($row = mysql_fetch_array($result)  or
die (mysql_error())) {
                                                                          $hola= "./imagesRestaurant/".$row["ruta"];

                                                                            echo utf8_decode("<tr class='actualizacion animated slideInUp'> 
                                      

                            <td style='width:22%;padding:0;'>
<div style='float:left;'>

<span style='font-weight: light;font-size:10px;color:#FFFFFF'><img src='".$hola."' alt='".$hola."' border='0'> </span>
</div>
</div>
</div>
                            </td>
               <td style='width:78%;padding:1px 2px 1px 5px;'>
<div style='float:left;'>
<span style='font-weight: light;font-size:18px; color:#000; font-family:Arial;' ><b>" . $row["nom"].'</b> Ha subido un nuevo plato: '."<br />" . $row["nombre"].': '. $row["descripcion"] ."</span>
</div>
</div>
</div>
                            </td>
                                      
                           
                           


                            </td>
                      
              
              
                      
                            
                </tr>");
                                                                        }
                                                                        ?>

                                                                    </tbody>


                                                                </table>

</div>

</div>
</div>
</body>
</html>
