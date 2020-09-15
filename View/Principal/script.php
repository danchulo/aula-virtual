<script src="../../Public/Js/jquery-1.9.1.min_1.js" type="text/javascript"></script>
<script src="../../Public/bootstrap/bootstrap.min.js" type="text/javascript"></script>
<script src="../../Public/easypiechart/jquery.easy-pie-chart.js" type="text/javascript"></script>
 <script>
        $(function() {
            // Easy pie charts
            $('.chart').easyPieChart({animate: 1000});
        });
        </script>
        <script src="../../Public/Js/scripts.js" type="text/javascript"></script>
        
        
   <script src="../../Public/Js/modernizr-2.6.2-respond-1.1.0.min.js" type="text/javascript"></script>
   
                                
			<!-- data table -->
                        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
<script src="../../../public/datatables/dataTables.bootstrap.min1.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
			<!-- jgrowl -->
                        <script src="../../Public/jGrowl/jquery.jgrowl.js" type="text/javascript"></script>

				
  
		<!--  -->
		
                <script src="../../Public/Js/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="../../Public/Js/chosen.jquery.min.js" type="text/javascript"></script>
        <script src="../../Public/Js/bootstrap-datepicker.js" type="text/javascript"></script>
        
        <script src="../../Public/bootstrap/js/wysihtml5-0.3.0.js" type="text/javascript"></script>
    <script src="../../Public/bootstrap/js/bootstrap-wysihtml5.js" type="text/javascript"></script>
    <script src="../../Public/Js/ckeditor.js" type="text/javascript"></script>
    <script src="../../Public/Js/jquery.js" type="text/javascript"></script>
    <script src="../../Public/Js/tinymce.min.js" type="text/javascript"></script>
	
		<!-- <script type="text/javascript" src="admin/assets/modernizr.custom.86080.js"></script> -->
		
		
                        <script src="../../Public/fullcalendar/fullcalendar.js" type="text/javascript"></script>
                        <script src="../../Public/fullcalendar/gcal.js" type="text/javascript"></script>
                       
                       		
                                                <script src="../../Public/Js/jquery.hoverdir.js" type="text/javascript"></script>
               
                                                <script src="../../javascript/javascript.js" type="text/javascript"></script>

        <script src="../../Public/datetimepicker-master/build/jquery.datetimepicker.full.js" type="text/javascript"></script>
    
<script>  
       
 function picker(){

  $.datetimepicker.setLocale('es');
  jQuery('#hora_ini').datetimepicker({
  datepicker:false,
  step:60,
  format:'H:i',
  maxTime: '19:00',
  minTime: '08:00'
  
});

$(document).ready(function(){
  
 $('#hora_fin').click(function(e){
        var horainicio = document.getElementById('hora_ini').value;

$(this).datetimepicker({
  
  datepicker:false,
  step:60,
  format:'H:i',
  maxTime: '19:00',
  minTime: horainicio
  

        });
    });

});}

</script>
                                               
<script>  
       
 function fecha_nac_person(){
$.datetimepicker.setLocale('es');

    var now = new Date();
	
	var today1 = (now.getFullYear() - 18)+"-01-01" ;
      
var today2 = (now.getFullYear() - 65)+"-01-01" ;
 
$('#fec_nac').datetimepicker({
 maxDate: new Date(today1),
 minDate: new Date(today2),
timepicker:false,
format:'Y-m-d'

});
}



 function fecha_nac_estu(){

$.datetimepicker.setLocale('es');

    var now = new Date();
	
	var today1 = (now.getFullYear() - 5)+"-01-01" ;
      
var today2 = (now.getFullYear() - 25)+"-01-01" ;
 
$('#fec_nac').datetimepicker({
 maxDate: new Date(today1),
 minDate: new Date(today2),
timepicker:false,
format:'Y-m-d'

});


}

</script>


<script src="../../javascript/menu.js" type="text/javascript"></script>
       