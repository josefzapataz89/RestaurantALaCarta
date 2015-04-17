<?php 
session_start();
include('conex.php');

if($_SESSION['nombre_ususario']=="")
{
  ?>
        <script language="JavaScript" type="text/javascript">
        alert("No has iniciado sesion, inicia sesion para acceder las categorias");
      </script>
                  <script type="text/javascript">   
                document.location="index.php";  
                </script>
  <?php 
}

?>
<!-- funcion para generar el select de categorias -->
<?php
  $link = conectar();

  function listarCategorias()
  {
    $query = mysql_query("SELECT * FROM categoria");
    echo "<select class='sel_categoria' name='categoria_seleccionada' id='categoria_seleccionada'>";
    echo "<option value='0'>Seleccione una categoria</option>";
    while($result = mysql_fetch_row($query))
    {
      echo "<option value='".$result[0]."'>".$result[1]."</option>";
    }
    echo "</select>";
  }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="estilos_Otras2.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="animate.css" />
<script type='text/javascript' src='js/jquery-1.7.1.js'></script>
<title>Categorias</title>
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
	color: #000000;
}
a:active {
	text-decoration: none;
	color: #FFFFFF;
}
.Estilo2 {color:#3d1c00;}
.Estilo3 {	background-image:url(imagenes/categorias/pag%20sel.png);
	background-repeat:repeat-x;
	padding:3px;
	z-index:6;}
.letrasubmenu {
font-size: 18px;
color:#FFFFFF;
font-weight:bold;
line-height:0px;
text-align: center;
}
.drops{
  width: 80%;
  text-align: center; 
}
/**/
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
        width: 300px;
        margin-right: 30px;
        margin-left: 50px;
        height: 40%;
        float: left;
        position: inherit;
        padding-top: 20px;
    }
    #container .data .item .foto{
        width: 300px;
        height: 180px;
        position: inherit;
        margin: 0;
        padding: 0;
    }
    #container .data .item .foto img{
        position: relative;
        width: 200px;
        height: 150px;
    }
    #container .data .item .texto{
        width: 300px;
        height: 20px;
        font-family:  arial;
        font-size: 12px;
        margin-top: -35px;
        padding: 0;
        text-align: center;
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
</style>
<script type="text/javascript" src="./js/jquery.min.js"></script> 

<script type="text/javascript">
    $(document).ready(function(){
        $('#categoria_seleccionada').change(function(){
          var sel_cat = $('#categoria_seleccionada').val();
          sel_cat = ($('#categoria_seleccionada').val() > 0 ? sel_cat : 0);
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
                        url: "loadCategoria.php?cate="+sel_cat,
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
    });
</script>
</head>

<body onload="loadData(1)">

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
        <ul class="ulMenu">
          <!-- CSS Tabs -->
          <li><a href="Inicio_1.php"><span>Inicio</span></a></li>
          <li><a href="Restaurantes.php"><span>Restaurantes</span></a></li>
          <li class="flecha"><a href="Categorias.php"><span class="Estilo2">Categorias</span></a>
		  <div id="punta"></div></li>
          <li><a href="Reservas.php"><span>Reservas</span></a></li>
          <li><a href="top5.php"><span>Top 5</span></a></li></ul></div>
</div>

<div id="cuerpo"> 
    <div id="barra_inferior">
        <p class="interlineado2">&nbsp;</p>
        <p class="interlineado2" align="center"><a href="#">Nosotros</a> | <a href="#">@alacarta5</a> | <a href="#">www.facebook.com/alacarta</a></p>
    </div>
    <div class="filtroCategoria">
        <?php 
          listarCategorias();
        ?>
    </div>
    <div id="fondo_restaurantes">
        <div id="loading"></div>
        <div id="container">
            <div class="data">
            </div>
            <div class="pagination"></div>
        </div>
    </div>

</div>

</div>
</div>

</body>
</html>