<?php 
session_start();
?>
<!-- Modal para formulario de Reservación en el restautante -->
<!-------------------------------------------------------------------------------------------------------------->  
 
     <div class="modal-body reserva">
       <form id="form1" name="form1" method="post" action="" onSubmit="return validate();">
            <button type="button" onclick="delInfo();" style="color:black; font-size: 40px !important;" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h2 style="text-align: center;">Nueva Reservación</h2>
            <div class="row">
                <div class="col-xs-6">
                    <input type="text" name="nombreReserva" id="nombreReserva" placeholder="Nombre" value=<?php echo $_SESSION['nombre_ususario'];?> disabled/>
                    <input type="number" name="cantidadReserva" id="cantidadReserva"  min="1" placeholder="Cantidad de personas" required="required"/>                    
                </div>
                <div class="col-xs-6">   
                    <div id="sandbox-container">
                        <input type="text" name="fechaReserva" id="fechaReserva" placeholder="Fecha de reservación" required="required"/>
                    </div>                    
                    <input type="text"  name="horaReserva" id="horaReserva" placeholder="Hora de reservación" required="required"/>                   
                       
                </div> 
            </div> 
            <button type="submit" name="submit" id="submit" class="button tam_button" style="float:right;">Reservar</button>                    
         </form>    
    </div>
        
    <script type="text/javascript">
        $(function(){            
            $('#sandbox-container input').datepicker({
                format: "dd-mm-yyyy",
                autoclose: true,
                todayHighlight: true,
                startDate: "dateTody"
            });
            $("#horaReserva").timepicker({ 
                'step': 30,
                'showDuration': true
            });
            
        });   
   

         
        function validate(){
            var cantidadReserva = document.getElementById("cantidadReserva").value;
            var fechaReserva = document.getElementById("fechaReserva").value;
            var horaReserva = document.getElementById("horaReserva").value;
             
            if(cantidadReserva != "" || fechaReserva!= "" || horaReserva!=""){               
               return true;
            }
            return false;   
        }   
        function delInfo(){
            document.form1.reset();
        }
            
    </script>
     
<!-------------------------------------------------------------------------------------------------------------->   