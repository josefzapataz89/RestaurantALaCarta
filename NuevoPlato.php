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

  ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="estilos_Otras.css" type="text/css" />
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

#loading{
        width: 100%;
        position: absolute;
        top: 100px;
        left: 100px;
        margin-top:200px;
    }
    #container .pagination ul li.inactive,
    #container .pagination ul li.inactive:hover{
        background-color:#ededed;
        color:#bababa;
        border:1px solid #bababa;
        cursor: default;
    }
    #container .data{
        width: 100%;
        height: 100%;
        border: 1px solid;
    }
    #container .data ul li{
        list-style: none;
        font-family: verdana;
        margin: 5px 0 5px 0;
        color: #000;
        font-size: 13px;
    }
    #container .data .item{
        width: 220px;
        margin-right: 30px;
        height: 140px;
        float: left;
        position: inherit;
        margin-left: 15px;
        margin-top: 15px;
        margin-bottom: -10px;
    }
    #container .data .item .foto{
        width: 220px;
        height: 120px;
        position: inherit;
        margin: 0;
        padding: 0;
    }
    #container .data .item .foto img{
        position: relative;
        width: 240px;
        height: 100px;
    }
    #container .data .item .texto{
        width: 240px;
        height: 20px;
        font-family:  arial;
        font-size: 12px;
        margin-top: -30px;
        text-align: center;
        padding: 0;
    }

    #container .pagination{
        width: 100%;
        height: 25px;
        top: 400px;
        position: absolute;
    }
    #container .pagination ul li{
        list-style: none;
        float: left;
        border: 1px solid #3D1C00;
        padding: 2px 6px 2px 6px;
        margin: 0 3px 0 3px;
        font-family: arial;
        font-size: 14px;
        color: #006699;
        font-weight: bold;
        background-color: #B58C55;
    }
    #container .pagination ul li:hover{
        color: #fff;
        background-color: #006699;
        cursor: pointer;
    }
.go_button
{
background-color:#f2f2f2;border:1px solid #006699;color:#cc0000;padding:2px 6px 2px 6px;cursor:pointer;position:absolute;margin-top:-1px;
}
.total
{
float:right;
font-family:arial;
color:#3D1C00;
}
-->
</style></head>


<script type="text/javascript" src="./js/jquery.min.js"></script> 
<script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
</script>

<body onload="loadData(1)">

<?php

function comprobarImagen( $ima )
   {
       switch( $ima )
       {
            //si es alguno de los tipos permitidos entonces retorno TRUE
            case 'image/jpeg':  return true; break;
            case 'image/jpg':   return true; break; 
            case 'image/JPG':   return true; break; 
            case 'image/JPEG':   return true; break; 
            case 'image/pjpeg': return true; break;
            case 'image/gif':   return true; break;
            case 'image/GIF':   return true; break;
            case 'image/png':   return true; break; 
            case 'image/PNG':   return true; break;       
            //sino retorno FALSE
            default: return false; break;
        }
    }




$idRestaurant=$_SESSION['id'];
echo $idRestaurant;

if(isset($_POST["AgregarPlato"]))
{

    $sql="insert into plato (nombre, descripcion) 
    values('".$_POST["nombre"]."','".$_POST["descripcion"]."')";
    mysql_query($sql);

$query="select p.id id from plato p where p.nombre= '".$_POST["nombre"]."'";
$consulta2= mysql_query($query);

$accion= mysql_fetch_array($consulta2);

$plato_id=$accion["id"];
        $destino = '$DOCUMENT_ROOT/../imagesRestaurant/';
                        if(isset($_FILES['miimagen']['name'])){
                            
                            $extension = $_FILES['miimagen']['type'];
                            if( is_uploaded_file($_FILES['miimagen']['tmp_name']) && comprobarImagen($extension) ){
                                $logo ="Restaurante_".$idRestaurant."_Plato_".$plato_id.".".end(explode(".", $_FILES['miimagen']['name']));
                                echo $logo;
                                $carga = move_uploaded_file($_FILES['miimagen']['tmp_name'], $destino.$logo);
                                if( $carga ){
                                    
                                    $fecha = new DateTime('now');
                                    $fechaHora = $fecha->format('Y-m-d H:i:s');
                                    $sql1 = "insert into multimedia (ruta, fecha, Restaurante_id, plato_id) values ('".$logo."', '".$fechaHora."', '".$idRestaurant."','".$plato_id."')";
                                    echo $sql1;
                                    mysql_query($sql1);
                                }else{ echo "<script> alert('Error al subir la imagen'); </script>"; }

                                }
                            }
    ?>
    <script language="JavaScript" type="text/javascript">
        alert("Plato Agregado");
        document.location="platos_usuario.php";
    </script>

    <?php

}

?>

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
    <input type="text" name="textfield" id="textfield" value="B&uacute;squeda..." />
  </label>
</div>
<div id="logo">
        <h1 class="h">Restaurantes a la Carta</h1>
</div>

<div id="menu">

        <ul>
          <!-- CSS Tabs -->
          <li ><a href="perfil.php"><span>Perfil</span></li></a>
          <li ><a href="platos_usuario.php"><span>platos</span></a></li>
          <li class="flecha"><a href="NuevoPlato.php"><span span class="Estilo2">Nuevo plato</span></a><div id="punta"></div></li></ul>
          
      
      </div>
                  
</div> 

<div id="cuerpo"> 

    <div id="barra_inferior">
        <p class="interlineado2">&nbsp;</p>
        <p class="interlineado2" align="center"><a href="#">Nosotros</a> | <a href="#">@alacarta5</a> | <a href="#">www.facebook.com/alacarta</a></p>
    </div>
    
    <div id="fondo_restaurantes">
        <div id="loading"></div>
        <div id="container">
            <div class="data">


<form action="" method="post" name="form2" enctype="multipart/form-data">
        
            <div class="barra-flecha"> 
                <h2>Agregar Nuevo Plato </h2><br>
            </div>
        <div class="registro">
            <div id="reg_nom">
                <div id="nom_r">&nbsp;<input type="text" name="nombre" placeholder="Nombre del Plato *" class="letras_ini" style="border:none" autofocus required="required" size="32"/></div>
            </div>
            <br></br>
            <div id="reg_nom">
                <div id="reg_nom">&nbsp;<textarea cols="50" rows="4" name="descripcion" placeholder="Descripcion del plato.. *"></textarea></div>
            </div>
            <br>
            <input type="file" name="miimagen" class="carga-imagen" value="Cargar" id="miimagen">

            <br></br>
            <div id="boton_r"><input name="AgregarPlato" type="submit" class="button tam_button1" value="Agregar Plato" style="border:none"/></div>
           <div id="obligatorio"> Los campos con (*) son obligatorios</div>
        </div>
      </form>


            </div>
        </div>
    </div>

</div>
</div>
</body>
</html>