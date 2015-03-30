<?php session_start();
$_SESSION["usuar"]="";
$_SESSION["contraseña"]="";
$_SESSION["tipo_usuario"]="0";
$_SESSION["id_usuario"]="";
unset($_SESSION["usuar"]); 
unset($_SESSION["contraseña"]);
$_SESSION["usuar2"]="";
$_SESSION["contraseña2"]="";
$_SESSION["tipo_usuario2"]="0";
$_SESSION["id_usuario2"]="";
unset($_SESSION["usuar2"]); 
unset($_SESSION["contraseña2"]);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="estilos_jquery.css" type="text/css" />
<link rel="stylesheet" href="estilos.css" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="s3Slider.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#slider').s3Slider({
            timeOut: 2000
        });
    });
</script>
<title>Home</title>


<style type="text/css">
<!--
body {
	background-color: #3d1c00;
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
-->
</style>

</head>

<body>




<?php 
if(isset($_POST["Registrate"]))
{
	
		?>

		<?php
	//validar si selecciono Persona Normal o Restaurant, y hacer el IF, para saber en que tabla agregar.
	
	include('conex.php');
	$link=Conectar();

if($_POST["nombre"]!="Nombre Completo" || $_POST["correo"]!="Correo Electrónico" || $_POST["contra"]!="Contraseña" || $_POST["nombre"]!="" || $_POST["correo"]!="" || $_POST["contra"]!="" || $_POST["rol"]!="" || $_POST["rol"]!="persona" || $_POST["rol"]!="restaurant"){

	if(isset($_POST["rol"])&&$_POST["rol"]=="persona"){
		$sql="insert into usuario 
		values('".$_POST["correo"]."','".$_POST["nombre"]."','".$_POST["contra"]."','1')";
	 ?>
	<script language="JavaScript" type="text/javascript">
		alert("Registro Exitoso");
		</script>
<?php	}
	
		if(isset($_POST["rol"])&&$_POST["rol"]=="restaurant"){
				
				$_SESSION["tipo_usuario2"]=2; $_SESSION["usuar2"]=$_POST["nombre"];  $_SESSION["contraseña2"]=$_POST["contra"];		
				$_SESSION["correo2"]=$_POST["correo"];
	
	$sql="insert into usuario 
	values('".$_POST["correo"]."','".$_POST["nombre"]."','".$_POST["contra"]."','2')";
	 ?>
	<script language="JavaScript" type="text/javascript">
		document.location='Registro_r.php';  
		</script>
<?php	
	
	}
}else{
?>
<script language="JavaScript" type="text/javascript">
		alert("Ingrese todos los campos");
		</script>
<?php
}	
	//inserto en el orden en que aparecen en la tabla, inserto lo que agarro de correo, nombre y contra y "1" que seria ROL - usuario (todo esto de los textfield de registro, el ROL será dependiendo del radiobuton que se seleccione, por eso hay que hacer el IF y copiar y pegar este mismo codigo pero con "2")
	

	if(mysql_query($sql,$link)){
	   echo  "Registro ingresado...";	   	
	}
	else
	   echo "Ha ocurrido un error al tratar de ingresar...";
}
?>

<?php
if(isset($_POST["entrar"]))
{
	include('conex.php');
	$link=Conectar();
	
	$sql1="select * from usuario where emailusuario='".$_POST["correo_in"]."' and contra='".$_POST["correo_co"]."'";
	$res=mysql_query($sql1,$link);

	
	if($fila=mysql_fetch_array($res)){
	if($fila[3]==1){
  			$_SESSION["tipo_usuario"]=1; $_SESSION["usuar"]=$fila[1]; $_SESSION["contraseña"]=$fila[2]; $_SESSION["correo3"]=$_POST["correo_in"];
			?> <script language="JavaScript" type="text/javascript"> document.location='Inicio_1.php'; </script> <?php
			}else{
				if($fila[3]==2){
				$_SESSION["tipo_usuario"]=2; $_SESSION["usuar"]=$fila[1]; $_SESSION["contraseña"]=$fila[2];  $_SESSION["correo3"]=$_POST["correo_in"];
				?> <script language="JavaScript" type="text/javascript"> document.location='perfil.php'; </script> <?php
				}
     		}			
	}
}//if1

?>


<div id="contenedor">
      
	<div id="cabecera">
		<div id="logo">
			<h1 class="h">Restaurantes a la Carta</h1>
		</div>
	</div>
	
	<div id="centro">	
<div id="slider">
 <ul id="sliderContent">
            <li class="sliderImage">
               <img src="example_images/410/1.png" />
                <span class="bottom"><strong>#1 Wakame Sushi Bar</strong><br /></span>            </li>
            <li class="sliderImage">
               <img src="example_images/410/2.png" />
                <span class="bottom"><strong>#2 La Forchetta</strong><br /></span>            </li>
            <li class="sliderImage">
                <img src="example_images/410/3.png" />
                <span class="bottom"><strong>#3 Brasamole</strong><br /></span>            </li>
            <li class="sliderImage">
                <img src="example_images/410/4.png" />
                <span class="bottom"><strong>#4 AllFood</strong><br /></span>            </li>
            <li class="sliderImage">
               <img src="example_images/410/5.png" />
                <span class="bottom"><strong>#5 Gremium</strong><br /></span>            </li>
            <div class="clear sliderImage"></div>
      </ul>
</div>



		<div id="twitter">
			<a class="twitter-timeline" href="https://twitter.com/AlaCarta5" data-widget-id="253617973967863808">Tweets por @AlaCarta5</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		</div>
		<div id="bienvenido">
			<p class="shadow" style="border:#3d1c00"><font face="Verdana, Arial, Helvetica, sans-serif">Bienvenidos a Restaurantes a la Carta</font></p>
		</div>			
		<div id="bienvenido2">
			<p class="bienv"><font face="Verdana, Arial, Helvetica, sans-serif">Entérate de lo último en restaurantes y escoge tu lugar preferido para vivir un momento diferente con tu familia o amigos</font></p>
		</div>
		  <form action="" method="post" name="form1">
		<div id="inicio_sesion">
		
			<div id="texto_inicio_sesion">Iniciar Sesi&oacute;n </div>
			<div id="ini_correo">
				<div id="correo_i">
				  <input name="correo_in" type="email"  class="letras_ini" style="border:none" required="required" size="39"/>
				</div>
			</div>
			<div id="ini_contra">
				<div id="correo_c"><input name="correo_co" type="password" class="letras_ini" style="border:none" required="required" size="22"/></div>
			</div>
			<div id="olvido"><a href="#">¿Olvidaste tu contraseña?</a></div>
			<div id="boton_e"><input name="entrar" type="submit" class="button tam_button" value="Entrar" style="border:none" /></div>
		</div>
      </form>
	   <form action="" method="post" name="form2">
		<div id="registro">
  
			<div id="texto_registro">Reg&iacute;strate</div>
			<div id="reg_nom">
				<div id="nom_r"><input name="nombre" type="text" value="Nombre Completo" class="letras_ini" style="border:none" required="required" size="38"/></div>
			</div>
			<div id="reg_correo">
				<div id="correo_r"><input name="correo" type="email" value="Correo Electrónico" class="letras_ini" style="border:none" required="required" size="38"/></div>
			</div>
			<div id="reg_contra">
				<div id="contra_r"><input name="contra" type="password" value="Contraseña" class="letras_ini" style="border:none" required="required" size="38"/></div>
			</div>
			<div id="persona">
				<div id="check1"><input name="rol" type="radio" id="radio2" value="persona" required="required"/>
				  Persona Particular </div>
			  <div id="check2"><input name="rol" type="radio" id="radio" value="restaurant" required="required"/> 
			    Restaurant </div>
			</div>
			<div id="boton_r"><input name="Registrate" type="submit" class="button tam_button1" value="Regístrate" style="border:none" /></div>
            
		</div>
      </form>
      <div id="barra_inferior">
	      <p class="interlineado2" align="center">&nbsp;</p>
	      <p class="interlineado2" align="center"><a href="#">Nosotros</a> | <a href="#">@alacarta5</a> | <a href="#">www.facebook.com/alacarta</a></p>
      </div>
	</div>
</div>
</body>
</html>
