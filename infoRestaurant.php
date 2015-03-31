<?php 
session_start();
include"database.php";
include('conex.php');
$link=Conectar();

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


   if(isset($_POST["nombreReserva"]) && isset($_POST["cantidadReserva"]) && isset($_POST["fechaReserva"]) && isset($_POST["horaReserva"])){
       $idRest = $_GET["id"];
       $idUsr =$_SESSION['id'];
       $cantidad = $_POST["cantidadReserva"];
       $nombre = $_POST["nombreReserva"];   
       $fechaHora = date_create($_POST["fechaReserva"]." ".$_POST["horaReserva"]);
       $fechaHora = $fechaHora->format('Y-m-d H:i:s');

       $consulta = "SELECT sum(cantidad) as Cantidad, (SELECT capacidad FROM restaurante WHERE id = ".$idRest.") as Capacidad FROM reserva WHERE fecha_reserva = '".$fechaHora."' and status = 1 and restaurante_id = ".$idRest;
       $cons = mysql_query($consulta);   
       $consultaReserva = mysql_fetch_row($cons);
       if($consultaReserva[0]==null){ $consultaReserva[0] = 0;}
       $disponibles = $consultaReserva[1] - $consultaReserva[0];
      
       if($disponibles >= $cantidad){
          $sql = "INSERT INTO reserva (nombre, fecha_reserva, cantidad, restaurante_id, usuario_id, status) VALUES ('".$nombre."', '".$fechaHora."', '".$cantidad."', '".$idRest."', '".$idUsr."', 1)";         
          if(mysql_query($sql)){
             echo "<script>alert('Se realizó exitosamente una reserva a nombre de: ".$nombre."');</script>";
          }
        }
        if($disponibles>0 && $disponibles < $cantidad){  echo "<script>alert('Lo sentimos, solo hay ".$disponibles." puestos disponibles');</script>"; }  
        if($disponibles == 0){ echo "<script>alert('Lo sentimos, en este momento no hay disponibilidad');</script>"; } 
   }   


 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
         <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
         <link rel="stylesheet" href="estilos_Otras.css" type="text/css" />
         <link type="text/css" rel="stylesheet" href="bootstrap.min.css" />  
         <link type="text/css" rel="stylesheet" href="datepicket.css" />       
         <link type="text/css" rel="stylesheet" href="plugins/estilo-grupo.css" />       
         <script type='text/javascript' src='js/jquery-1.7.1.js'></script>
         <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet"
          type="text/css"/>
         <title>Info Restaurante</title>
 </head>
<style type="text/css">
<!--
body {
        background-color: #3d1c00;
        margin-top: 8px !important;
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
<div id="nombreusuario" align="center"><?php echo $_SESSION["nombre_ususario"]; ?></div>
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

<div id="menu" style=" margin-top: 0 !important;">

        <ul style=" margin-top: 24px !important;">
          <!-- CSS Tabs -->
          <li><a href="Inicio_1.php"><span>Inicio</span></a></li>
          <li class="flecha"><a href="Restaurantes.php"><span class="Estilo2">Restaurantes</span></a>
                  <div id="punta"></div></li>
          <li><a href="Categorias.php"><span>Categorias</span></a></li>
          <li><a href="Reservas.php"><span>Reservas</span></a></li>
          <li><a href="top5.php"><span>Top 5</span>
                  </a></li></ul></div>
                  
</div> 

<div id="cuerpo" style=" margin-top: 20px !important;"> 
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
       <br />
        
       <a data-toggle="modal" href="modalCalificar.php" data-target="#myCalificacion" title="Calificanos" class="button"  style="margin-left: 5px;"><span>Calificar</span></a>
        
       
       <a data-toggle="modal" href="reserva.php" data-target="#myModal" title="Contact Us" class="button"  style="margin-left: 5px;"><span>Realizar Reservación</span></a>
       <br />
       <div class="btn-atras">
         <p><a href="Restaurantes.php">Atras</a></p>
       </div>

    </div>

</div>
</div>

<!----------------------------------------- RESERVACIÓN ---------------------------------------------------------->    
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    </div>
  </div>
</div>
<!-------------------------------------------------------------------------------------------------------------->   

<!---------------------------------------- Calificación -------------------------------------------------------->
<div class="modal fade" id="myCalificacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    </div>
  </div>
</div>

<!------------------------------------- Fin Calificación -------------------------------------------------------->

<script src="bootstrap.min.js"></script>
<script src="./plugins/jquery.barrating.js"></script>
<script>

    $(function () {
      $('#calificacion').barrating({ showSelectedRating:false });
    });

</script>

 </body>
 </html>