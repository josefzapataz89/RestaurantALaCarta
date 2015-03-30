<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
<form action="" method="post">
	<input type="file" name="foto_r" class="borde_campo"/>
	<input name="fo" type="submit" />
		<?php 
		if(isset($_POST["fo"])){
			//echo $_POST["foto_r"];
		?>
	<input name="" type="image" src="imagenes/<?php echo $_POST["foto_r"];?>"/> <?php } ?>
</form>
</body>
</html>
