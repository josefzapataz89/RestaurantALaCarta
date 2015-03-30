<?php session_start();
	$_SESSION["usuar"]="";
	$_SESSION['nombre_ususario']="";
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

<?php 
	setlocale(LC_TIME, 'es_VE'); # Localiza en español es_Venezuela
	date_default_timezone_set('America/Caracas');
	$fecha_actual = date('d-m-y h:i:a');

	include('conex.php');
		$link=Conectar();

	function generaSelect()
	{
		
		$consulta=mysql_query("SELECT * FROM categoria");
	   echo "<select name='lista_cat' id='lista_cat' class ='form-control' >";
		while($registro=mysql_fetch_row($consulta))
		{
			
			echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
			//$_SESSION["idespec"]=$_POST["select1"];
		}
		echo "</select>";
	}


	if(isset($_POST["Registrate"]))
	{	

	$bandera = 0;
	$bandera2 = 0;

	// 				REGISTRAR USUARIO

		if(isset($_POST["rol"]) && $_POST["rol"]=="persona"){

			if(isset($_POST["contra"]) && isset($_POST["contra2"]) && ($_POST["contra"] == $_POST["contra2"])){
					$consulta = mysql_query("select * from usuario where email= '" . $_POST["correo"] . "'");
	        		while($campos = mysql_fetch_array($consulta))
	        		{
	        			$bandera = 1;
	        		}
	        		if($bandera == 1){
	        			?>
	        			<script language="JavaScript" type="text/javascript">
							alert("Email ya registrado");
						</script>
						<?php
						
	        		}else{
	        			$consulta2 = mysql_query("select * from usuario where username= '" . $_POST["user"] . "'");
	        			while($campos2 = mysql_fetch_array($consulta2))
	        		{
	        			$bandera2 = 1;
	        		}
	        			if($bandera2 == 1){
							?>
	        				<script language="JavaScript" type="text/javascript">
								alert("Nombre de usuario no disponible. Seleccione otro");
							</script>
							<?php
						}else{
	        				$sql="insert into usuario (nombre, username, email, password,direccion, telefono) 
	        				values('".$_POST["nombre"]."','".$_POST["user"]."','".$_POST["correo"]."','".$_POST["contra"]."','".$_POST["direccion"]."','".$_POST["telf"]."')";
	        				mysql_query($sql);
	        				?>
	        				<script language="JavaScript" type="text/javascript">
								alert("Registro Exitoso");
							</script>
	        				<?php
	        			}
	        		}


			}else{
				?>
				<script language="JavaScript" type="text/javascript">
					alert("Las contraseñas no coinciden");
				</script> <?php
			}
			}

			// 			REGISTRAR RESTAURANTE


	if(isset($_POST["rol"]) && $_POST["rol"]=="restaurant"){

			if(isset($_POST["contra"]) && isset($_POST["contra2"]) && ($_POST["contra"] == $_POST["contra2"])){
					$consulta = mysql_query("select * from restaurante where email= '" . $_POST["correo"] . "'");
	        		while($campos = mysql_fetch_array($consulta)){
	        			$bandera = 1;
	        		}
	        		if($bandera == 1){
	        			?>
	        			<script language="JavaScript" type="text/javascript">
							alert("Email ya registrado");
						</script>
						<?php
						
	        		}else{
	        			$consulta2 = mysql_query("select * from restaurante where usuario= '" . $_POST["user"] . "'");

	        			while($campos2 = mysql_fetch_array($consulta2)){
	        			$bandera2 = 1;
	        			}

	        			if($bandera2 == 1){
							?>
	        				<script language="JavaScript" type="text/javascript">
								alert("Nombre de usuario no disponible. Seleccione otro");
							</script>
							<?php
						}else{
							$fecha = new DateTime('now');
										$fechaHora = $fecha->format('Y-m-d H:i:s');
	        				$sql="insert into restaurante (nombre, descripcion, usuario, contrasena, direccion, telefono, email, pagina_web, capacidad, fecha_registro, categoria_id ) 
	        				values ('".$_POST["nombre"]."','".$_POST["descripcion"]."','".$_POST["user"]."','".$_POST["contra"]."','".$_POST["direccion"]."','".$_POST["telf"]."','".$_POST["correo"]."','".$_POST["pagweb"]."', '".$_POST["capacidad"]."' ,'".$fechaHora."','".$_POST["lista_cat"]."')";
	        				mysql_query($sql);
	        				$consulta = mysql_query("select MAX(id) from restaurante");   
			        		$idRestaurant = mysql_fetch_row($consulta);			
			        		
	        			    $destino = '$DOCUMENT_ROOT/../imagesRestaurant/';
	        			    if(isset($_FILES['miimagen']['name'])){
	        			    	$extension = $_FILES['miimagen']['type'];
	        			    	if( is_uploaded_file($_FILES['miimagen']['tmp_name']) && comprobarImagen($extension) ){
	        			    		$logo ="Restaurante_".$idRestaurant[0].".".end(explode(".", $_FILES['miimagen']['name']));
	        			    		$carga = move_uploaded_file($_FILES['miimagen']['tmp_name'], $destino.$logo);
	        			    		if( $carga ){
										$fecha = new DateTime('now');
										$fechaHora = $fecha->format('Y-m-d H:i:s');
										$sql = "INSERT INTO multimedia (ruta, fecha, Restaurante_id) values ('".$logo."', '".$fechaHora."', '".$idRestaurant[0]."')";
										mysql_query($sql);
	        			    		}else{ echo "<script> alert('Error al subir la imagen'); </script>"; }
	        			    		
	        			    	}


	        			    }
	        				
	        				?>
	        				<script language="JavaScript" type="text/javascript">
								alert("Registro Exitoso");
							</script>
	        				<?php
	        			}
	        		}


			}else{
				?>
				<script language="JavaScript" type="text/javascript">
					alert("Las contraseñas no coinciden");
				</script> <?php
			}
			}

		}

		

	//                     INICIO DE SESION

	if(isset($_POST["entrar"]))
{

	
	$res=mysql_query("select * from usuario where email='".$_POST["correo_in"]."' and password='".$_POST["correo_co"]."'");
	$campos = mysql_fetch_array($res);

	$res2=mysql_query("select * from restaurante where email='".$_POST["correo_in"]."' and contrasena='".$_POST["correo_co"]."'");
	$camposRestaurante = mysql_fetch_array($res2);

if ($_POST["correo_co"] == $campos[4] && $_POST["correo_in"] == $campos[3]){
	 $_SESSION['id'] = $campos[0];
     $_SESSION['nombre_ususario'] = $campos[1];
     $_SESSION['username'] = $campos[2];
     $_SESSION['contrasena'] = $campos[4];
     $_SESSION['email'] = $campos[3];
     $_SESSION["tipo_usuario"]="1";
      ?>  
                <script type="text/javascript">   
                document.location="Inicio_1.php";  
                </script>  
                <?php
}

if($_POST["correo_co"] == $camposRestaurante[4] && $_POST["correo_in"] == $camposRestaurante[7]){

	$_SESSION['id'] = $camposRestaurante[0];
    $_SESSION['nombre_ususario'] = $camposRestaurante[1];
    $_SESSION["tipo_usuario"]="2";
      ?>  
                <script type="text/javascript">   
                document.location="perfil.php";  
                </script>  
                <?php
}
else{
	?>  
                <script language="JavaScript" type="text/javascript">
						alert("Usuario o contraseña invalida, verifique sus datos");
					</script>
                <?php

}

}

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

?>



<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="estilos_jquery.css" type="text/css" />
	<link rel="stylesheet" href="estilos.css" type="text/css" />
	<link type="text/css" rel="stylesheet" href="bootstrap.min.css" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
	<script type="text/javascript" src="jq1/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="s3Slider.js"></script>
	<script type="text/javascript">
	    $(document).ready(function() {
	        $('#slider').s3Slider({
	            timeOut: 3000
	        });
	    });
	</script>
	<title>Home - Restaurantes a la Carta</title>
</head>

<body>
	<div class="contenedor">
	      
		<div class="cabecera">
			<div class="logo">
				<img class="logoDim" src="imagenes/logo.png" alt="Restaurantes a la Carta"/>
				<h1 class="h">Restaurantes a la Carta</h1>
			</div>
		
		     <form action="" class="form-inline" id="inicio_sesion" method="post" name="form1">
		     	<div class="barra-flecha-inicio"> 
					<div class="texto_registro">Iniciar Sesi&oacute;n</div>
				</div>
				<div class="iniSesion" >					
					<input name="correo_co" type="password" class="form-control ini_correo" placeholder="Contraseña" style="border:none" required="required" size="13"/>
					<input name="correo_in" type="email"  class="form-control ini_correo" placeholder="Correo" style="border:none" required="required" size="14"/>
					<div id="boton_e"><input name="entrar" type="submit" class="button tam_button" value="Entrar" style="border:none" /></div>
		            <div class="olvido"><a href="#">¿Olvidaste tu contraseña?</a></div>
				</div>
		      </form>
	    </div> 

	    <div class="textitu">
			<p>Estamos dirigidos a aquellos que deseen obtener algún tipo de referencia de los lugares más novedosos donde disfrutar de un momento diferente en familia.</p> 
		</div>   
		
		<div class="centro">	
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

			<form action="" method="post" name="form2" enctype="multipart/form-data">				
			  		
					<div class="registro">
						<div class="barra-flecha"> 
							<div class="texto_registro">Reg&iacute;strate</div>
						</div>
						<div id="reg_nom">
							<div id="nom_r"><input type="text" maxlength="45" name="nombre" placeholder="Nombre Completo *" class="letras_ini" style="border:none" autofocus required="required" size="32"/></div>
						</div>
						

						<div id="reg_correo">
							<div id="correo_r"><input name="correo" type="email"  placeholder="Correo Electrónico *" class="letras_ini" style="border:none" required="required" size="32"/></div>
						</div>

						<div id="reg_user">
							<div id="user_r"><input type="text" name="user"  placeholder="Nombre de Usuario *" class="letras_ini" style="border:none" autofocus required="required" size="32"/></div>
						</div>

						<div id="reg_contra">
							<div id="contra_r"><input id="contra" name="contra" type="password" placeholder="Contraseña *" pattern="^[a-zA-Z0-9.!#$%'*+/=?^_`{|}~-]+[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" class="letras_ini" style="border:none" required="required" size="32"/></div>
						</div>

						<div id="reg_contra2">
							<div id="contra_r2"><input id="contra2" name="contra2" type="password" placeholder="Confirme Contraseña *"  class="letras_ini" style="border:none" required="required" size="32"/></div>
						</div>

						<div id="reg_direccion">
							<div id="direccion_r"><input type="text" placeholder="Dirección *" name="direccion" class="letras_ini" style="border:none"  size="32"/></div>
						</div>	
						<div id="reg_telf">
							<div id="telf_r"><input type="tel" pattern="[0-9]{11}" name="telf"  placeholder="Número Telefónico" class="letras_ini" style="border:none"  size="32"/></div>
						</div>
			        	<div class="reg_extra">
							<div id="reg_desc">&nbsp;<input type="text" name="descripcion"  placeholder="Descripción *" class="letras_ini" style="border:none"  size="32"/></div>
						</div>
			            <div class="reg_extra">
			            	<div id="reg_pagweb">&nbsp;<input type="text" name="pagweb"  placeholder="Página Web" class="letras_ini" style="border:none"  size="32"/></div>
						</div>
						<div class="reg_extra2">            	
			            	<p class="text">&nbsp;<?php echo "Especialidad: "; ?></p>
			            	<?php generaSelect(); ?>            	
						</div>
						<div class="reg_extra">     
						  	<p class="text">&nbsp; <?php echo "Foto de Perfil:"; ?></p>
			            	<input type="file" name="miimagen" class="carga-imagen" value="Cargar" id="miimagen">	
						</div>	
						<div class="letras_ini reg_capacidad reg_extra" id="reg_capacidad">
		                    <div class="cap_reg">
		                         Capacidad <input name="capacidad" id="capacidad" type="number" min="0" max="500" pattern="[0-9]{3}"> personas.
		                    </div>
		                </div>
						
						<div id="persona">
							<div id="check1"><input name="rol" type="radio" id="radio2" value="persona" required="required"/>
							  Persona Particular </div>
						  <div id="check2"><input name="rol" type="radio" id="radio" value="restaurant" required="required"/> 
						    Restaurant </div>
						</div>
						<div id="boton_r"><input name="Registrate" type="submit" class="button tam_button1" value="Regístrate" style="border:none"/></div>
			            <div id="obligatorio"> Los campos con (*) son obligatorios</div>
					</div>
			</form>				
		</div>
		<div id="barra_inferior">
			<p class="interlineado2" align="center">&nbsp;</p>
			<p class="interlineado2" align="center"><a href="#">Nosotros</a> | <a href="#">@alacarta5</a> | <a href="#">www.facebook.com/alacarta</a></p>
		</div>	
	</div>
</body>

<script>
	$("#persona").click(function(){
		if($("input[id=radio]:checked").val()) {
			$(".reg_extra").css("display","block");
			$(".reg_extra2").css("display","block");
		}else{
			$(".reg_extra").css("display","none");
			$(".reg_extra2").css("display","none");
		}
		
	});
	$(document).ready(function(e) {
        
    });
	
</script>
<?php ?>
<script type="text/javascript" >
	jQuery(document).ready(function() {
		$("#contra2").blur(function(event) {
		if($("#contra").val() != $("#contra2").val() ){
			alert("Las contraseñas no coinciden");
		}
		else
			var correcto=1;
		});
	});

</script>


</html>
