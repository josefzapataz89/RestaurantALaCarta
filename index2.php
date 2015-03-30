<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="estilos2.css" type="text/css" />
<link href="http://fonts.googleapis.com/css?family=Abel|Arvo" rel="stylesheet" type="text/css" />
<link href="jq1/style.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="jq1/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="jq1/jquery.dropotron-1.0.js"></script>
<script type="text/javascript" src="jq1/jquery.slidertron-1.0.js"></script>
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
<div id="contenedor">

	<div id="cabecera">
		<div id="logo">
		  <h1 class="h">Restaurantes a la Carta</h1>
	  </div>
	</div>
	
	<div id="centro">	
			<div id="slider"> <a class="button previous-button"></a> <a class="button next-button"></a>
				<div class="viewer">
					<div class="reel">
						<div class="slide">
							<h2> #1 Wakame Sushi Bar</h2>
							<img src="../Restaurant/example_images/410/1.png" alt="" /></div>
						<div class="slide">
							<h2> #2 La Forchetta</h2>
							<img src="../Restaurant/example_images/410/2.png" alt="" /></div>
						<div class="slide">
							<h2> #3 Bramasole</h2>
							<img src="../Restaurant/example_images/410/3.png" alt="" /></div>
						<div class="slide">
							<h2> #4 AllFood</h2>
							<img src="../Restaurant/example_images/410/4.png" alt="" /></div>
						<div class="slide">
							<h2> #5 Gremium</h2>
							<img src="../Restaurant/example_images/410/5.png" alt="" /></div>
					</div>
				</div>
	  </div>
			<script type="text/javascript">
				$('#slider').slidertron({
					viewerSelector: '.viewer',
					reelSelector: '.viewer .reel',
					slidesSelector: '.viewer .reel .slide',
					advanceDelay: 3000,
					speed: 'slow',
					navPreviousSelector: '.previous-button',
					navNextSelector: '.next-button',
					indicatorSelector: '.indicator ul li',
					slideLinkSelector: '.link'
				});
			</script> 



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
		<div id="inicio_sesion">
			<div id="texto_inicio_sesion">Iniciar Sesi&oacute;n </div>
			<div id="ini_correo">
				<div id="correo_i">
				  <input name="correo_in" type="text" value="Correo Electrónico" class="letras_ini" style="border:none"/>
				</div>
			</div>
			<div id="ini_contra">
				<div id="correo_c"><input name="correo_co" type="text" value="Contraseña" class="letras_ini" style="border:none"/></div>
			</div>
			<div id="olvido"><a href="#">¿Olvidaste tu contraseña?</a></div>
			<div id="boton_e"><input name="" type="button" class="button tam_button" value="Entrar" style="border:none"/></div>
		</div>
		<div id="registro">
			<div id="texto_registro">Reg&iacute;strate</div>
			<div id="reg_nom">
				<div id="nom_r"><input name="nombre" type="text" value="Nombre Completo" class="letras_ini" style="border:none"/></div>
			</div>
			<div id="reg_correo">
				<div id="correo_r"><input name="correo" type="text" value="Correo Electrónico" class="letras_ini" style="border:none"/></div>
			</div>
			<div id="reg_contra">
				<div id="contra_r"><input name="contra" type="text" value="Contraseña" class="letras_ini" style="border:none"/></div>
			</div>
			<div id="persona">
				<div id="check1"><input name="checkb1" type="radio"/>
				  Persona Particular </div>
			  <div id="check2"><input name="checkb2" type="radio" checked="checked"/> 
			    Restaurant </div>
			</div>
			<div id="boton_r"><input name="" type="button" class="button tam_button1" value="Regístrate" style="border:none"/></div>
		</div>
		<div id="barra_inferior">
		  <p class="interlineado2" align="center">&nbsp;</p>
		  <p class="interlineado2" align="center"><a href="#">Nosotros</a> | <a href="#">@alacarta5</a> | <a href="#">www.facebook.com/alacarta</a></p>
		</div>
	</div>
</div>
</body>
</html>
