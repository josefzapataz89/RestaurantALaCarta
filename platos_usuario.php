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
         <meta charset="UTF-8">
         <link rel="stylesheet" href="estilos_Otras.css" type="text/css" />
         <link type="text/css" rel="stylesheet" href="bootstrap.min.css" />  
         <script type='text/javascript' src='js/jquery-1.7.1.js'></script>

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
</style>
</head>

<script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
</script>
<script type="text/javascript">
            $(document).ready(function(){
                function loading_show(){
                    $('#loading').html("<img src='images/working.gif'/>").fadeIn('fast');
                }
                function loading_hide(){
                    $('#loading').fadeOut('fast');
                }                
                function loadData(page){
                    loading_show();                    
                    $.ajax
                    ({
                        type: "POST",
                        url: "LoadPlatos.php",
                        data: "page="+page,
                        success: function(msg)
                        {
                            $("#container").ajaxComplete(function(event, request, settings)
                            {
                                loading_hide();
                                $("#container").html(msg);
                            });
                        }
                    });
                }
                loadData(1);  // For first time page load default results
                $('#container .pagination li.active').live('click',function(){
                    var page = $(this).attr('p');
                    loadData(page);
                    
                });           
                $('#go_btn').live('click',function(){
                    var page = parseInt($('.goto').val());
                    var no_of_pages = parseInt($('.total').attr('a'));
                    if(page != 0 && page <= no_of_pages){
                        loadData(page);
                    }else{
                        alert('Seleccione una pagina entre 1 and '+no_of_pages);
                        $('.goto').val("").focus();
                        return false;
                    }
                    
                });
            });
        </script>

<body onload="loadData(1)">
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

<div id="logo">
        <h1 class="h">Restaurantes a la Carta</h1>
</div>

<div id="menu" style=" margin-top: 0 !important;">

        <ul style=" margin-top: 24px !important;">
          <!-- CSS Tabs -->
          <li ><a href="perfil.php"><span>Perfil</span></li></a>
          <li class="flecha"><a href="platos_usuario.php"><span span class="Estilo2">Platos</span></a><div id="punta"></div></li>
          <li><a data-toggle="modal" href="newplato.php" data-target="#myPlato" title="Agregar Nuevo Plato"><span>Nuevo Plato</span></a></li>
        </ul>
      
      </div>
                  
</div> 

<div id="cuerpo" style=" margin-top: 20px !important;"> 
    <div id="barra_inferior">
        <p class="interlineado2">&nbsp;</p>
        
    </div>
    
    <div id="fondo_restaurantes">
        <div id="loading"></div>
        <div id="container" style="overflow: auto;">
            <div class="data">
            </div>
            <div class="pagination"></div>
        </div>
    </div>

</div>
</div>

<!----------------------------------------- NUEVO PLATO ---------------------------------------------------------->    
<div class="modal fade" id="myPlato" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    </div>
  </div>
</div>
<!-------------------------------------------------------------------------------------------------------------->
<script src="bootstrap.min.js"></script>
</body>
</html>