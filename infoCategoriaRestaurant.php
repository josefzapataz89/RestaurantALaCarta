<?php 
include"database.php";
if($_GET["id"]){

        $query_pag_data = "SELECT
                            restaurante.id as id,
                            restaurante.nombre as nombre,
                            restaurante.descripcion as descripcion,
                            restaurante.direccion as direccion,
                            restaurante.telefono as telefono,
                            restaurante.email as email,
                            restaurante.pagina_web as pagina,
                            multimedia.ruta as ruta
                        FROM
                            restaurante,
                            multimedia
                        WHERE
                            restaurante.id = multimedia.Restaurante_id &&
                                restaurante.id = ".$_GET['id'];


        $accion = mysql_query($query_pag_data) or die('MySql Error' . mysql_error());

        if( $accion = mysql_fetch_array($accion) ){
                $id =  $accion['id'];
                $nombre = $accion['nombre'];
                $descripcion = $accion['descripcion'];
                $direccion = $accion['direccion'];
                $telefono = $accion['telefono'];
                $email = $accion['email'];
                $pagina = $accion['pagina'];
                $imagen = $accion['ruta'];
        }
}
else{
        echo "Error con la Base de Datos...";
}

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
         <meta charset="UTF-8">
         <link rel="stylesheet" href="estilos_Otras.css" type="text/css" />
         <title>Info Restaurante</title>
 </head>
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

/**/


</style>
 <body>
         <div id="contenedor">

<div id="cabecera"> 

<div id="barrausuario">
<div id="herramientas"></div>
<div id="imagenusuario"></div>
<div id="nombreusuario" align="center"><?php //echo $_SESSION["usuar"]; ?></div>
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
          <li><a href="Inicio_1.php"><span>Inicio</span></a></li>
          <li class="flecha"><a href="Restaurantes.php"><span class="Estilo2">Restaurantes</span></a>
                  <div id="punta"></div></li>
          <li><a href="categorias.php"><span>Categorias</span></a></li>
          <li><a href="#"><span>Favoritos</span></a></li>
          <li><a href="top5.php"><span>Top 5</span>
                  </a></li></ul></div>
                  
</div> 

<div id="cuerpo"> 
    <div id="barra_inferior">
        <p class="interlineado2">&nbsp;</p>
        <p class="interlineado2" align="center"><a href="#">Nosotros</a> | <a href="#">@alacarta5</a> | <a href="#">www.facebook.com/alacarta</a></p>
    </div>

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
       <p><a href="categorias.php">Atras</a></p>

    </div>

</div>
</div>

 </body>
 </html>