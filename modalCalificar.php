<link rel="stylesheet" href="estilos_Otras.css" type="text/css" />
<link type="text/css" rel="stylesheet" href="plugins/estilo-grupo.css" />
<script type='text/javascript' src='js/jquery-1.7.1.js'></script>
    <div class="modal-body calificar">
        <h2 style="text-align: center;">Calificanos y deja un comentario</h2>
        <form id="form1" name="form1" method="post" action="" onSubmit="return validate()">
            <div class="select rating-f">
                <label for="calificacion">Calificanos  </label>
                <select id="calificacion" name="rating">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div class="select">
                <label for="coment">Comentar</label>
                <textarea class="comentario" id="coment" name="coment">
                    <?php echo $_SESSION["id_usuario"]; 
                    echo $_SESSION['nombre_ususario']; ?>

                </textarea>
            </div>
            <button type="submit" name="submit" id="submit" class="button buton_tam">Enviar</button>
        </form>
    </div>
<script src="./plugins/jquery.barrating.js"></script>
<script>

    $(function () {
      $('#calificacion').barrating({
            showSelectedRating:false
        });
    });

    function validate()
    {
        return true;
    }

</script>