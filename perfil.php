<?php 
session_start();
include('conex.php');
  $link=Conectar();

if($_SESSION['nombre_ususario']=="")
{
	?>
			<script language="JavaScript" type="text/javascript">
				alert("No has iniciado sesion, inicia sesion antes de entrar al perfil de un restaurante");
			</script>
	                <script type="text/javascript">   
                document.location="index.php";  
                </script>
	<?php 
}
else
{

  if($_SESSION["tipo_usuario"]!="2")
{
  ?>
        <script language="JavaScript" type="text/javascript">
        alert("Debe Ingresar como un restaurante para acceder a esta pagina");
      </script>
                  <script type="text/javascript">   
                document.location="index.php";  
                </script>
  <?php 
}
}

$consulta = mysql_query("select * from comentario where restaurante_id= '" .$_SESSION["id"]. "'");
              $suma=0;
              $contador=0;
              $comentarios;
              while($campos = mysql_fetch_array($consulta))
              {
                $contador=$contador+1;
                $calificacion = $campos[2];
                $usuario1 = $campos[3];
                $suma=$suma+$campos[2];

              }
              $votos = $suma/$contador;

              
$usuario=$_SESSION['id'];
 $result = mysql_query("select m.ruta ruta, r.nombre nombre, r.descripcion descripcion, r.direccion direccion, r.telefono telefono, r.email email, r.pagina_web pagina
						from restaurante r join multimedia m
						on(r.id = m.restaurante_id)
						where r.id='".$_SESSION["id"]."'");

$accion= mysql_fetch_array($result);


				$imagen = $accion['ruta'];
                $nombre = $accion['nombre'];
                $descripcion = $accion['descripcion'];
                $direccion = $accion['direccion'];
                $telefono = $accion['telefono'];
                $email = $accion['email'];
                $pagina = $accion['pagina'];

                if(isset($_POST["comentarios"]))
                {
                ?>
                <script type="text/javascript">
                document.location="comentarios.php";
                </script>
                <?php
                }

                ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
         <link rel="stylesheet" href="estilos_Otras.css" type="text/css" />
      
         <link type="text/css" rel="stylesheet" href="plugins/estilo-grupo.css" />       
         <script type='text/javascript' src='js/jquery-1.7.1.js'></script>
         <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet"
          type="text/css"/>
<title>Restaurantes</title>
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
<div id="contenedor">

<div id="cabecera"> 

<div id="barrausuario">
<div id="herramientas"></div>
<div id="imagenusuario"></div>
<div id="nombreusuario" align="center"><?php echo $_SESSION['nombre_ususario']; ?></div>
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
          <li class="flecha"><a href="perfil.php"><span class="Estilo2">Perfil</span></a><div id="punta"></div></li>
          <li ><a href="platos_usuario.php"><span>Platos</span></a></li>
          <li><a href="NuevoPlato.php"><span>Nuevo plato</span></a></li>
        </ul>
		  
</div>
		  
</div> 

<div id="cuerpo"> 
<div id="barra_inferior">
<p class="interlineado2">&nbsp;</p>
<p class="interlineado2" align="center"><a href="#">Nosotros</a> | <a href="#">@alacarta5</a>| <a href="#">www.facebook.com/alacarta</a></p></div>
    <div id="fondo_restaurantes">

       <div class="informacion">
               <div class="imgperfil">
                       <img width="300px" height="300px" src="imagesRestaurant/<?php echo $imagen; ?>" alt="imagesRestaurant/<?php echo $imagen; ?>">
               </div>
               <div class="info">
                <h2>Informacion de Perfil</h2>
                       <p><b>Nombre: </b></p><p><?php echo $nombre; ?></p>
                       <p><b>Descripcion:</b></p><p><?php echo $descripcion; ?></p>
                       <p><b>Dirección: </b></p><p><?php echo $direccion; ?></p>
                       <p><b>Telefono:</b> </p><p><?php echo $telefono; ?></p>
                       <p><b>Email: </b></p><p><?php echo $email; ?></p>
                       <p><b>Sitio Web: </b></p><p><?php echo $pagina; ?></p>

               </div>
       </div>
              <br>



               <div class="input select rating-f estrella">
          <label for="calificacion">Calificación </label>          
          <select id="calificacion" name="rating" >
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
<br>
<form action="" class="form-inline" id="inicio_sesion" method="post" name="form1">
  <div id="boton_e"><input name="comentarios" type="submit" class="button tam_button" value="Comentarios" style="border:none" /></div>
</form>

           </div>


</div>
</div>

</div>
<script src="./plugins/jquery.barrating.js"></script>
<script>


    $(function () {
      $('#calificacion').barrating({ initialRating: <?php echo round($votos); ?>, readonly: true, showSelectedRating:false });

      
      

    });

</script>

</body>
</html>