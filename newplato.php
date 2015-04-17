<?php
session_start();
include('conex.php');
  $link=Conectar();
?> 

<script type="text/javascript">
    function MM_jumpMenu(targ,selObj,restore){ //v3.0
      eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
      if (restore) selObj.selectedIndex=0;
    }   
    function delInfo(){
            document.form2.reset();
    }    
</script>

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
                                
                                $carga = move_uploaded_file($_FILES['miimagen']['tmp_name'], $destino.$logo);
                                if( $carga ){
                                    
                                    $fecha = new DateTime('now');
                                    $fechaHora = $fecha->format('Y-m-d H:i:s');
                                    $sql1 = "insert into multimedia (ruta, fecha, Restaurante_id, plato_id) values ('".$logo."', '".$fechaHora."', '".$idRestaurant."','".$plato_id."')";
                                    
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

<div class="modal-body reserva">       
    <form action="newplato.php" method="post" name="form2" enctype="multipart/form-data">
        <button type="button" onclick="delInfo()" style="color:black; font-size: 40px !important;" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h2 style="text-align: center;">Agregar Nuevo Plato </h2>        
        <div class="registro">
            <div id="reg_nom">
                <div id="nom_r">&nbsp;<input type="text" name="nombre" placeholder="Nombre del Plato *" class="letras_ini" style="border:none" autofocus required="required" size="32"/></div>
            </div>
            <div id="reg_nom">
                <div id="reg_nom" style="width: 100%; margin-left:0;"><textarea cols="84" rows="4" name="descripcion" placeholder="Descripcion del plato.. *" required="required" ></textarea></div>
            </div>
            <input type="file" name="miimagen" class="carga-imagen" value="Cargar" id="miimagen" required="required" >
            <div id="obligatorio"> Los campos con (*) son obligatorios</div>
            <br/>
            <div id="boton_r"><input name="AgregarPlato" type="submit" class="button tam_button1" value="Agregar Plato" style="border:none; float:right;"/></div>           
        </div>
    </form> 
</div>