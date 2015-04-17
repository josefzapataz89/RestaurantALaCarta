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

<?php 

 function listarReservas()
  {
    $bandera = 0;
    $fecha = new DateTime('now');
    $fechaHora = $fecha->format('Y-m-d H:i:s');
    $query = mysql_query("SELECT *
                          FROM reserva,restaurante
                          WHERE reserva.status = '1'
                          AND reserva.restaurante_id = restaurante.id
                          AND reserva.usuario_id = '" . $_SESSION['id']. "'");

   
 
echo "<form action=\"\" method=\"post\"> \n";
if (mysql_num_rows($query) > 0) {
  echo "<input type='submit' class='button tam_button' style='margin: 1% 0 3px 40%;'  name='cancelar' id='cancelar' value='Cancelar Reserva'><br/>"; 
}
while ($row = mysql_fetch_row($query)){   
      echo "<div class='reser animated zoomIn'>
                <input type=\"checkbox\" name=\"".'reserva[]'."\" value=\"".$row[0]."\" class='form-control'>
                    <b>Código: ".$row[7]."<br/></b> 
                    <b>Restaurante: </b>".$row[9]."<br/>
                    <b>A nombre de: </b>".$row[1]."<br/>
                    <b>Fecha: </b>".$row[2]."<br/>
                    <b>Comensales: </b>".$row[3]."<br/><br/>
            </div>";
}  
  
    

echo "</form>";

if (isset($_POST['cancelar'])) {
    if (is_array($_POST['reserva'])) {
        $selected = '';
        $num_selec = count($_POST['reserva']);
        $current = 0;
        foreach ($_POST['reserva'] as $key => $value) {
            if ($current != $num_selec-1)
                $selected .= $value.', ';
            else
                $selected .= $value.'.';
            $current++;
        }


         //echo '<div>Has seleccionado: '.$selected.'</div>';
         $reservasId = explode(",", $selected);
         $tamaño=count($reservasId);

         for($i=0;$i<=($tamaño-1);$i++)
         {

    $query2 = mysql_query("UPDATE reserva Set status= 0 Where id= '" . $reservasId[$i]. "'");

    ?>
        <script type="text/javascript">   
                document.location="Reservas.php";  
                </script>
  <?php 

         }

         //echo $reservasId[1];
    }
    else {

        ?>
        <script language="JavaScript" type="text/javascript">
        alert("Debe seleccionar una reserva");
        document.location="Reservas.php"; 

      </script>  
      <?php
    }

   
}


  }

?>

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
          <li><a href="Inicio_1.php"><span>Inicio</span></a></li>
          <li><a href="Restaurantes.php"><span>Restaurantes</span></a></li>
          <li><a href="Categorias.php"><span>Categorias</span></a></li>
          <li class="flecha"><a href="Reservas.php"><span  class="Estilo2">Reservas</span></a>
          <div id="punta"></div></li>
          <li><a href="top5.php"><span>Top 5</span></a></li></ul></div></div>

<div id="cuerpo"> 
<div id="barra_inferior">
<p class="interlineado2">&nbsp;</p>
<p class="interlineado2" align="center"><a href="#">Nosotros</a> | <a href="#">@alacarta5</a> | <a href="#">www.facebook.com/alacarta</a></p>
</div>

<div id="fondo_restaurantes">
 <?php listarReservas();?>
</div>


</div>
</div>
</body>
</html>
