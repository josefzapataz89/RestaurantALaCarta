<?php
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="estilos_Otras.css" type="text/css" />
<script src="src/js/jscal2.js"></script>
<script src="src/js/lang/es.js"></script>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css" />
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css" />
<link rel="stylesheet" type="text/css" href="css/steel/steel.css" />


<title>Registro Restaurante</title>
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

<?php 
include('conex.php');
	$link=Conectar();
	
function generaSelect()
{
	
	$consulta=mysql_query("SELECT * FROM tipo_especialidad");
echo "<select name='select1' id='select1' >";
	while($registro=mysql_fetch_row($consulta))
	{
		
		echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
		$_SESSION["idespec"]=$_POST["select1"];
	}
	echo "</select>";
}

if(isset($_POST["reg_datos"]))
{
	
	$sql="insert into restaurante 
	values('".$_SESSION["correo2"]."','".$_POST["desc_r"]."','".$_POST["nombre_r"]."','".$_SESSION["contraseña2"]."','".$_POST["dir_r"]."','".$_POST["telf_r"]."','".$_POST["f_date1"]."','".$_POST["foto_r"]."','".$_SESSION["correo2"]."','".$_POST["select1"]."')";

//echo $_SESSION["contraseña2"];
//echo $_SESSION["correo2"];
echo 'foto: '.$_POST["foto_r"];



	if(mysql_query($sql,$link)){
	   echo  "Registro ingresado...";	 ?>   	
<script language="JavaScript" type="text/javascript"> 
alert('Registro exitoso');
<!-- document.location='index.php'; --></script>
<?php

	}
	else
	   echo "Ha ocurrido un error al tratar de ingresar...";
}

?>






<div id="contenedor2">

<div id="cabecera"> 

<div id="barrausuario">
<div id="herramientas"></div>
<div id="imagenusuario"></div>
<div id="nombreusuario" align="center"><?php echo $_SESSION["usuar2"]; ?></div>
<div id="cerrarsesion"><a href="http://localhost/SistemasInfo/Restaurant/index.php"><span class="letracerrarsesion">Cerrar Sesión</span></a></div>
</div>

<div id="Eizquierda"></div>
<div id="Ederecha"></div>
<div id="busqueda">
  <label>
    <input type="text" name="textfield" id="textfield" value="Búsqueda..." class="borde_campo"/>
  </label>
</div>
<div id="logo">
 <h1 class="h">Restaurantes a la Carta</h1>
</div>

<div id="menu">
	<div id="titulo_reg_r" class="interlineado2">Registro de Restaurante </div>
</div></div>

<div id="cuerpo_r"> 

<div id="datos_registro_r">
<form action="" method="post" name="form1" id="form1">
  <p>&nbsp;</p>
  <table width="561" height="421" border="0" align="center" class="bienv">
  <tr>
    <td height="46">Nombre Completo: </td>
    <td><input type="text" name="nombre_r" class="borde_campo"/></td>
  </tr>
  <tr>
    <td height="43">Tel&eacute;fono:</td>
    <td><input type="text" name="telf_r" class="borde_campo"/></td>
  </tr>
  <tr>
    <td height="56">Direcci&oacute;n:</td>
    <td><textarea name="dir_r" cols="30" class="borde_campo" style="border:none"></textarea></td>
  </tr>
  <tr>
    <td width="239" height="50">Descripci&oacute;n: </td>
    <td width="312">
      <textarea name="desc_r" cols="30" class="borde_campo" style="border:none"></textarea>    </td>
  </tr>
  <tr>
    <td height="49">Fecha de Registro: </td>
    <td> <input size="10" id="f_date1" name="f_date1" class="borde_campo"/><button id="f_btn1">...</button></td>
    <!--CALENDARIO-->
 <script type="text/javascript">//<![CDATA[
      Calendar.setup({
        inputField : "f_date1",
        trigger    : "f_btn1",
        onSelect   : function() { this.hide() },
        dateFormat : "%Y-%m-%d"
      });
    //]]></script>
  </tr>
  <tr>
    <td height="32">Foto de Perfil: </td>
    <td><input type="file" name="foto_r" id="foto_r" class="borde_campo"/></td>
  </tr>
  <tr>
    <td height="65">Seleccione su especialidad (es): </td>
    <td><p>
	

	
      <?php generaSelect(); ?>
    </p>
      </td>
  </tr>
  
  <tr>
    <td height="43" colspan="2"><p>
	<div id="boton_r_d">
      <input type="submit" name="reg_datos" value="Registrar Datos"  class="button tam_button2" style="border:none" onclick="window.location = '#';" align="middle"/></div>
    </p></td>
    </tr>
</table>
</form>    
</div>


<div id="barra_inferior_r">
<p class="interlineado2">&nbsp;</p>
<p class="interlineado2" align="center"><a href="#">Nosotros</a> | <a href="#">@alacarta5</a> | <a href="#">www.facebook.com/alacarta</a></p>
</div>
</div>
</div>
</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
</body>
</html>
