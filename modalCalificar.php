<link rel="stylesheet" href="estilos_Otras.css" type="text/css" />
<link type="text/css" rel="stylesheet" href="plugins/estilo-grupo.css" />
<script type='text/javascript' src='js/jquery-1.7.1.js'></script>
    <div class="modal-body calificar">
        <h2 style="text-align: center;">Calificanos y deja un comentario</h2>
        <form id="form2" name="form2" method="post" action="" onSubmit="return validate()">
            <div class="select rating-f">
                <label for="rating">Calificanos  </label>
                <select id="rating" name="rating">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div class="select">
                <label for="coment">Comentar</label>
                <textarea class="comentario" id="coment" name="coment"></textarea>
            </div>
            <button type="submit" name="submit" id="submit" class="button tam_button" style="float:right;">Enviar</button>
        </form>
    </div>
<script src="./plugins/jquery.barrating.js"></script>
<script>

    $(function () {
      $('#rating').barrating({
            showSelectedRating:false
        });
    });

    function validate()
    {
        var calificacion = document.getElementById("calificacion").value;
        var comenta = document.getElementById("coment").value;

        if( calificacion > 0 && comnet !== '' )
        {
            alert('si');
            
        }
        return false;
    }

</script>