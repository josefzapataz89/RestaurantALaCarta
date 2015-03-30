<?php
session_start();
if($_SESSION['nombre_ususario']=="")
{
	?>
				<script language="JavaScript" type="text/javascript">
				alert("No has iniciado sesion, inicia sesion para observar los restaurantes");
				</script>
	                <script type="text/javascript">   
                document.location="index.php";  
                </script>
	<?php 
}

$posicionA=0;
//$posicionA=$HTTP_GET_VARS["posicion"];
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

</style>
<script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
</script>
</head>
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
          <li><a href="Inicio_1.php"><span>Inicio</span></a></li>
          <li class="flecha"><a href="Restaurantes.php"><span class="Estilo2">Restaurantes</span></a>
		  <div id="punta"></div></li>
          <li><a href="Categorias.php"><span>Categorias</span></a></li>
          <li><a href="#"><span>Favoritos</span></a></li>
          <li><a href="top5.php"><span>Top 5</span>
		  </a></li></ul></div>
		  
</div> 

<div id="cuerpo"> 
<div id="barra_inferior">
<p class="interlineado2">&nbsp;</p>
<p class="interlineado2" align="center"><a href="#">Nosotros</a> | <a href="#">@alacarta5</a>| <a href="#">www.facebook.com/alacarta</a></p></div>
    <div id="fondo_restaurantes">
    <?php 
	include('conex.php');
	$link=Conectar();
	
	function listarProducto() {
        $retorno = NULL;
        
 
        $query = "SELECT nombre FROM restaurante";
        $result = mysql_query($query);
 
        if ($result) {
            if (mysql_num_rows($result) > 0) {
                $i = 0;
                $retorno = array();
 
                while ($pdto = mysql_fetch_assoc($result)) {
                    $retorno[$i] = $pdto;
                    $i++;
                }
            }
            else {
                $retorno = "No se encontraron registros.";
            }
        }
        else {
            $retorno = "Error en la conexi&oacute;n a la base de datos.";
        }
 
        return $retorno;
    }
	
	
$listaPdtos = listarProducto();	

 
echo "<table width='821' height='436' border='0' id='tabla_rest' name='tabla_rest' align='center'>";

if (is_array($listaPdtos)){
		
	for($trs=0;$trs<8;$trs++){	
			echo "<tr>";
			for($tds=0;$tds<3;$tds++){
				
				if($trs==0){
					if($listaPdtos[$posicionA+$tds]["nombre"]!=''){
					echo "<td height='100' align='center'><input name='fotos' type='image' src='fotos_resta/".$listaPdtos[$posicionA+$tds]["foto_perfil"]."'/></td>";
					}
					}
					
									if($trs==4){
										if($listaPdtos[$posicionA+$tds+3]["nombre"]!=''){
					echo "<td height='100' align='center'><input name='fotos' type='image' src='fotos_resta/".$listaPdtos[$posicionA+$tds+3]["foto_perfil"]."'/></td>";
										}
					}
					
				if($trs==2){
					echo "<td height='20' align='center'><a href='#'>".$listaPdtos[$posicionA+$tds]["nombre"]."</a></td>";
					}
					
					if($trs==3){
						if($listaPdtos[$posicionA+$tds]["nombre"]==''){
						echo "<td height='45' align='left'>".$listaPdtos[$posicionA+$tds]["ubicacion"]."<br>".$listaPdtos[$posicionA+$tds]["telefono"]."</td>";	
							}
							else{
					echo "<td height='45' align='left'>".$listaPdtos[$posicionA+$tds]["ubicacion"]."<br>"."Teléfono: ".$listaPdtos[$posicionA+$tds]["telefono"]."</td>"; }
					}
					
				if($trs==6){
					echo "<td height='20' align='center'><a href='#'>".$listaPdtos[$posicionA+$tds+3]["nombre"]."</a></td>";
					}
					if($trs==7){
						if($listaPdtos[$posicionA+$tds+3]["nombre"]==''){
						echo "<td height='45' align='left'>".$listaPdtos[$posicionA+$tds+3]["ubicacion"]."<br>".$listaPdtos[$posicionA+$tds+3]["telefono"]."</td>";	
							}
							else{
					echo "<td height='45' align='left'>".$listaPdtos[$posicionA+$tds+3]["ubicacion"]."<br>"."Teléfono: ".$listaPdtos[$posicionA+$tds+3]["telefono"]."</td>"; }
					}
	
										
				}//for td
			}//for tr
			echo "</tr>";

}//if array

	echo "</table>";

//echo"<tr><a href='#'>".$registro[1].$registro[2]."</a></tr>";
	
	?>
    </div>
    
    
    <?php
	$cont_rest=count($listaPdtos);
	 $num_pag = ceil($cont_rest/6);
	
	
	?>
     <div id="pags">
  <ul>
          <!-- CSS Tabs -->
          <li><a><span>Págs.</span></a></li>
             <?php
          for($pag=1;$pag<=$num_pag;$pag++)
		  {
			  
				if($posicionA==0 && $pag==1)
				{ 
			 echo "
			 <li><a href='restaurantes.php?posicion=".($pag-1)*'6'."'><span class='Estilo3'>".$pag."</span></a></li>
			"; 
				}
				
				else
				{
					if($pag == (($posicionA/$pag)-1))
					{
						echo "
			 	<li><a href='restaurantes.php?posicion=".($pag-1)*'6'."'><span class='Estilo3'>".$pag."</span></a></li>
				"; 
					}
					else
					{
						echo "
							 <li><a href='restaurantes.php?posicion=".($pag-1)*'6'."'><span>".$pag."</span></a></li>
							"; 
					}
						
						
				}
						
						
						
							
	 
		  }
		  ?>
		 
  </ul>
 </div> 
</div>
</div>

  <?php
echo "imprimeee: ".$posicionA;
echo "qqqqqqqqqqqqq: ".($posicionA/($pag+1));
?>

</body>
</html>