<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset = "UTF-8">
        <title></title>
  
   
    <link href="../../Public/datetimepicker-master/jquery.datetimepicker.css" rel="stylesheet" type="text/css"/>
   
    </head>
    <body>
        <div class="container">
            <label><p>Ingrese año escolar</p>
                <input id="fechai" type="text" placeholder="fecha inicio"/>
         <input id="fechaf" type="text"  placeholder="fecha fin"/>
        </label>
            <label><p>Horario Inicio</p>
          <input id="hora_ini" type="text"/>
             </label>
             <label><p>Hora Fin</p>
          <input id="hora_fin" type="text"/>
             </label>

        </div>
        
        <script src="../../Public/datetimepicker-master/jquery.js" type="text/javascript"></script>
        <script src="../../Public/datetimepicker-master/build/jquery.datetimepicker.full.js" type="text/javascript"></script>
    
      <?php
          //<---------------- AÑO ESCOLAR -------->
      $fecha= "2018-12-12";
      $año= substr($fecha,0,4);  //extrae los cuatro primeros valores
      $mes= substr($fecha,-5,-3); // cuenta cinco hacia la izquierda y desde ahi 
                                   // empieza a extraer en adelante pero sin traer los 3 ultimos valores  
      $dia= substr($fecha,-2); //extrae los dos valores de la izquierda
      
      // <---------------- AÑO ESCOLAR -------->
      
      // <---------------- HORARIO ESCOLAR -------->
     $horainicio= '08:00';
      $horafin= '15:00';
    

    //<---------------- HORARIO ESCOLAR -------->
      ?>
    
        
         <script>

$.datetimepicker.setLocale('es');

    var now = new Date();
	
	var today1 = (now.getFullYear() - 5)+"-01-01" ;
      
var today2 = (now.getFullYear() - 25)+"-01-01" ;
 
$('#fechai').datetimepicker({
 maxDate: new Date(today1),
 minDate: new Date(today2),
timepicker:false,
format:'Y-m-d'

});

$(document).ready(function(){
  
 $('#fechaf').click(function(e){
        var fechainicio = document.getElementById('fechai').value;

$(this).datetimepicker({
  
 minDate: fechainicio,
timepicker:false,
format:'Y-m-d'

        });
    });

});






        </script>
        
        <script>
        jQuery('#hora_ini').datetimepicker({
  datepicker:false,
  step:15,
  format:'H:i',
  maxTime: '<?php   echo $horafin;?>',
  minTime: '<?php echo $horainicio?>'
  
});

$(document).ready(function(){
  
 $('#hora_fin').click(function(e){
        var horainicio = document.getElementById('hora_ini').value;

$(this).datetimepicker({
  
  datepicker:false,
  step:15,
  format:'H:i',
  maxTime: '<?php echo $horafin;?>',
  minTime: horainicio
  

        });
    });

});


        </script>
        
       
        
    </body>
         
      
</html>
