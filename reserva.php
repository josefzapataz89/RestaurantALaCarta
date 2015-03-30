<!-- Modal para formulario de Reservación en el restautante -->
<!-------------------------------------------------------------------------------------------------------------->  
 <link type="text/css" rel="stylesheet" href="datepicket.css" />
 <link type="text/css" rel="stylesheet" href="jquery.timepicker.css" />  
     <div class="modal-body reserva">
       <form id="form1" name="form1" method="post" action="" onSubmit="return validate()">
            <button type="button" onclick="delInfo()" style="color:black; font-size: 40px !important;" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3>Nueva Reservación</h3>
            <div class="row">
                <div class="col-xs-6">
                    <input type="text" name="nombreReserva" id="nombreReserva" placeholder="Nombre" />
                    <input type="number" name="cantidadReserva" id="cantidadReserva"  min="1" placeholder="Cantidad de personas" />                    
                </div>
                <div class="col-xs-6">
                    <input type="text" name="fechaReserva" id="fechaReserva" placeholder="Fecha de reservación" />
                    <input type="text" class="time"  name="horaReserva" id="horaReserva" placeholder="Hora de reservación" />
                </div> 
            </div> 
            <button type="submit" name="submit" id="submit" class="button tam_button" style="float:right;">Reservar</button>                    
         </form>    
    </div>
    <script type='text/javascript' src='jquery.timepicker.js'></script>
    
    <script type="text/javascript">
         $( "#fechaReserva" ).datepicker();
         $(function() {
            $( "#fechaReserva" ).datepicker();
        });
        $(function() {
             $('#horaReserva').timepicker({ 'step': 60 });
        });
        function validate(){
            var nombreReserva = document.getElementById("nombreReserva").value;
            var cantidadReserva = document.getElementById("cantidadReserva").value;
            var fechaReserva = document.getElementById("fechaReserva").value;
            var horaReserva = document.getElementById("horaReserva").value;
            var enter = false;        
            
            if(nombreReserva != "" || cantidadReserva != "" || fechaReserva!= "" || horaReserva!=""){
               return true;
            }
            return enter;   
        }   
        function delInfo(){
            document.form1.reset();
        }
            
    </script>
     
<!-------------------------------------------------------------------------------------------------------------->   