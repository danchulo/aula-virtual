function play() { $('#da-thumbs > li').hoverdir(); }

function verificarUsuarios(ruta,controlador,op){
 var usuario = document.getElementById("usuario").value;
 var password = document.getElementById("password").value;
 
 if(usuario==""){
     
     $.jGrowl("Ingrese el usuario, por favor!!!!", { header: 'Requisito' });
     usuario.focus();
     return;
 }
 else if(password==""){
       $.jGrowl("Ingrese el password, por favor!!!!", { header: 'Requisito' });
    password.focus();
     return;
 }
 else{
  
   
     var pagina=ruta+"/"+controlador+"?op="+op;

        $.ajax({
            
            type: 'POST',
            url: pagina,
            data:{"usuario":usuario,"password":password},
        success: function (rspta) {
            console.log(rspta);
            if(rspta=='ok')
           
				{
				$.jGrowl("Cargando archivos, por favor espere...", { sticky: true });
				$.jGrowl("Bienvenido a Sistema Carl Palmer", { header: 'Acceso permitido' });
				var delay = 1000;
					setTimeout(function(){ window.location = 'View/principal/principal.php'  }, delay);  
				}else if (rspta == 'invalid'){
					$.jGrowl("Usted se encuentra inhabilitado, por favor, comuniquese con el Administrador", { header: 'Usuario Inhabilitado' });
				
				}else
				{
                             
				$.jGrowl("Por favor verifique su nombre de usuario y/o contraseña", { header: 'Error de inicio de sesion' });
				}
                               
				}
            
        });
    
 
    }
}

function prom(numero) {
    
    var ponderado = document.getElementById("p" +numero);
   
   var nota1 = document.getElementById("nota1" +numero).value;
   var nota2 = document.getElementById("nota2" +numero).value;
   var notat = document.getElementById("notat" +numero).value;
   var notac = document.getElementById("notac" +numero).value;
   var notal = document.getElementById("notal" +numero).value;
   var notaa = document.getElementById("notaa" +numero).value;
   try{
      //Calculamos el número escrito:
       nota1 = (isNaN(parseFloat(nota1)))? 0 : parseFloat(nota1);
       nota2 = (isNaN(parseFloat(nota2)))? 0 : parseFloat(nota2);
       notat = (isNaN(parseFloat(notat)))? 0 : parseFloat(notat);
       notac = (isNaN(parseFloat(notac)))? 0 : parseFloat(notac);
       notal = (isNaN(parseFloat(notal)))? 0 : parseFloat(notal);
       notaa = (isNaN(parseFloat(notaa)))? 0 : parseFloat(notaa);
       var resultado=(nota1+nota2+notat+notac+notal+notaa)/6;
       ponderado.value = Math.round(resultado);
  
    }
   //Si se produce un error no hacemos nada
   catch(e) {}
}
    
    
function onlynumber(e)
{
        var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8) || (keynum == 46))
        return true;
         
        return /\d/.test(String.fromCharCode(keynum));
}
    
function validar(e) {
    
  var tecla = (document.all) ? e.keyCode : e.which;
  if (tecla==13){
      verificarUsuarios('Controlador','UsuarioControlador.php','1');
  };
}


function validarLetra(e) { // 1

tecla = (document.all) ? e.keyCode : e.which; // 2

if (tecla==8) return true; // 3

patron =/[A-Za-z-á-ú-Á-Ú\s]/; // 4

te = String.fromCharCode(tecla); // 5

return patron.test(te); // 6
}

function validarLetra2(e) { // 1

tecla = (document.all) ? e.keyCode : e.which; // 2

if (tecla==8) return true; // 3

patron =/[A-Za-z\s]/; // 4

te = String.fromCharCode(tecla); // 5

return patron.test(te); // 6
}

 function crearClase(){
      document.getElementById('agregar_clase').style.display="block";
    document.getElementById('buscar_clase').style.display="block";
     
 }

function MiClase(ruta,controlador,op,div)
{

    $('#menucurso').hide("slow");
    ajax(ruta,controlador, op,'',div);
                   
}

function filtro(ruta,controlador,div)
{
    
    var parametros = '';
     
    var cboAnio = $('select#cboAnio');
    var id_año = $('option:selected', cboAnio).val();
       
     if(id_año!=='0'){
    selector();
  
                    parametros = "&anio="+id_año;
                    ajax(ruta,controlador, 2, parametros,div);
                }
    
}
function filtroAnio2(ruta,controlador,op,op2,div,div2)
{
     var parametros = '';
     
    var cboAnio = $('select#cboAnio');
    var id_año = $('option:selected', cboAnio).val();
    document.getElementById('anio_id').value=""+id_año;
    var estu_id=$('#estu_id').val();
    var nom_estu = $('#nombre_estu').text();
     if(id_año!=='0'){
    notaFiltro(div2);
  
                    parametros = "&anio="+id_año+"&estu_id="+estu_id+"&nombre_estu="+nom_estu;
                ajax(ruta,controlador, op2, parametros,div2);          
        ajax(ruta,controlador, op, parametros,div);
            
                }
}
function nav_sistencias_estu(ruta,controlador,op,op2,div,div2)
{
     navAsis();
                ajax(ruta,controlador, op2, "",div2);          
        ajax(ruta,controlador, op, "",div);
            
}
function filtroAnio(ruta,controlador,op,div)
{
     var parametros = '';
     
    var cboAnio = $('select#cboAnio');
    var id_año = $('option:selected', cboAnio).val();
       
     if(id_año!=='0'){
    selector2();
  
                    parametros = "&anio="+id_año;
                    ajax(ruta,controlador, op, parametros,div);
                }
}
function filtroAnioAsis(ruta,controlador,op,div)
{
     var parametros = '';
     
    var cboAnio = $('select#cboAnio');
    var id_año = $('option:selected', cboAnio).val();
       
     if(id_año!=='0'){
    notaFiltro(div);
  
                    parametros = "&anio="+id_año;
                    ajax(ruta,controlador, op, parametros,div);
                }
}

function filtroClaseEstu(ruta,controlador,op,div)
{
     var parametros = '';
    
    var cboAnio = $('select#cboAnio');
    var id_anio = $('option:selected', cboAnio).val();
    var cboNivel = $('select#cboNivel');
    var id_nivel = $('option:selected', cboNivel).val();
    var cboGrado = $('select#cboGrado');
    var id_grado = $('option:selected', cboGrado).val();
    var cboSeccion = $('select#cboSeccion');
    var id_seccion = $('option:selected', cboSeccion).val();
     if(id_nivel!=='0' || id_grado!=='0' || id_seccion!=='0' || id_anio!=='0' ){
    notaFiltro(div);
  
                    parametros = "&nivel_id="+id_nivel+"&grado_id="+id_grado+"&seccion_id="+id_seccion+"&anio_id="+id_anio;
                    ajax(ruta,controlador, op, parametros,div);
     
    }
}

//function filtroGrado(ruta,controlador,op,op2,div,div2)
//{
//     var parametros = '';
//     
//    var cboNivel = $('select#cboNivel');
//    var id_nivel = $('option:selected', cboNivel).val();
//       
//     if(id_nivel!=='0'){
//    notaFiltro(div);
//  
//                    parametros = "&nivel_id="+id_nivel;
//                    ajax(ruta,controlador, op, parametros,div);
//                }
//}

function ingresoClase(ruta,controlador,op,cod,clase,div)
{
     
    var parametros = '';
   
                    parametros = "&cod="+cod+"&clase="+clase;
                    ajax(ruta,controlador, op, parametros,div);            
}


function ingresoCursos(ruta,controlador,op,cod,clase_id,clase,div)
{
    var parametros = '';
   
   if(cod==="" && clase_id==="" && clase===""){    
        var clase_id = document.getElementById('clase_id').value;
         var clase = $('#nombre_clas').text();
          var cod = $('#cursoid').val();
   }
                    
                    parametros = "&cod="+cod+"&clase="+clase+"&clase_id="+clase_id;
                    
                    
                    ajax(ruta,controlador, op, parametros,div);            
}

function ingresoClase2(ruta,controlador,op,div)
{
   
     var cod = document.getElementById('clase_id').value;
    
 var clase = $('#nombre_clas').text();

    var parametros = '';
   
                    parametros = "&cod="+cod+"&clase="+clase;
                    ajax(ruta,controlador, op, parametros,div);            
}


function menu_curso(ruta,controlador,op,div,idTri)

{
     var cantidad=$('#cantidadE').val();//Cantidad de Estudiantes
      var clase = $('#nombre_clas').text();
     var curso_id = document.getElementById('cursoid').value;
     var parametros = '';
   if(cantidad==='0'){
          parametros = "&mostrar=no";
   }else{
         parametros = "&cod="+curso_id+"&codtri="+idTri+"&clase="+clase;
   }   
      ajax(ruta,controlador, op, parametros,div);  
}

function ver_estu(ruta,controlador,op,div,estu,estu_id)

{
     
         var parametros = "&nombre_estu="+estu+"&estu_id="+estu_id;
      ajax(ruta,controlador, op, parametros,div);  
}

function nav_notas_estu(ruta,controlador,op,op2,div,div2)

{
     
          navNotas();
      ajax(ruta,controlador, op, "",div);  
      ajax(ruta,controlador, op2, "",div2);  
}
function filtrarTrimestre(ruta,controlador,op,div){
var curso_id = document.getElementById('cursoid').value;
    
     var parametros = '';
    var cboTri = $('select#cboTri');
    var idTri = $('option:selected', cboTri).val();
    if(idTri!=='0'){
        notaFiltro(div);
         parametros = "&cod="+curso_id+"&codtri="+idTri;
           ajax(ruta,controlador,op,parametros,div);  
    }
  
}
function filtrarTrimestreEst(ruta,controlador,op,div){
    
     var parametros = '';
    var cboTri = $('select#cboTri');
    var idTri = $('option:selected', cboTri).val();
        var id_año=$('#anio_id').val();
    if(idTri!=='0'){
        notaFiltro(div);
         parametros = "&codtri="+idTri+"&anio="+id_año;
           ajax(ruta,controlador,op,parametros,div);  
    }
  
}

function click(ruta,controlador,op,parametro,div)
{
       
     var curso_id = document.getElementById('cursoid').value;
    var parametros = '';
   
                    parametros = "&cod="+curso_id+"&parametro="+parametro;
                    ajax(ruta,controlador, op, parametros,div);            
}

function consultaSimple(ruta,controlador,op,div){
   $('#menucurso').hide("slow");
                    ajax(ruta,controlador,op,'',div);  
             
}

function accionMatri(ruta,controlador,op,op2,id,id2,div,tipo)
{
    var parametros = '';

       parametros = "&id="+id+"&tipo="+tipo+"&id2="+id2;
      if(tipo=="b"){

                $('#load').addClass('loader');
            
             $(".loader").fadeOut("slow");

     }  
    else if(tipo=="e"){
    if(confirm("¿Seguro que quiere eliminar la asignación?")){
		 $("#"+id).remove();
     }}
    else if(tipo=="h"){
    if(confirm("¿Seguro que quiere habilitar la asignación?")){
		
     }}
    else if(tipo=="i"){
    if(confirm("¿Seguro que quiere Inhabilitar la asignación?")){
		
     }

  }
 
       ajax(ruta,controlador,op,parametros,div);      
       ajax(ruta,controlador,op2,"",div);     
}
function accionTema(ruta,controlador,op,id,accion)

{
    
     var asistencia_id=$("#asistencia_id").val();

   if(typeof asistencia_id!=="undefined"){
   
    var curso_id=$("#cursoid").val();
    var parametros = '';
   
    parametros = "&tema_id="+id+"&asistencia_id="+asistencia_id+"&accion="+accion+"&profe_clase_id="+curso_id;
    ajax(ruta,controlador, op, parametros,'modalTema'); 
    
    }
}

function accionArea(ruta,controlador,op,id,area_nombre,accion)

{
      var profe_id=$("#cod").val();
      var cantidad=$("#cantidadArea").val();
       var parametros = '';
      parametros = "&area_id="+id+"&accion="+accion+"&profe_id="+profe_id;
    if(accion=="delete"){
        
    if(confirm("¿Seguro que quiere eliminar el área del profesor?")){
        
        if(cantidad!=1){
             $("#caja" + id).remove();//eliminamos la fila de la tabla
             ajax(ruta,controlador, op, parametros,'AjaxArea');
              ajax(ruta,controlador, '32', parametros,'modalArea');
        }else{
       $.jGrowl("El profesor debe de tener un área como mínimo", { header: 'Advertencia' });
    }
    } 
}
else if(accion="insert"){
       $("#area" + id).hide('slow');
    var add='';
    if (id!=="")
    {
        add=' <div style="border:solid 2px green" id="caja'+id+'">'+
'<button type="button" class="btn btn-danger btn-mini icon icon-remove"'+
'onclick=\'accionArea("../../Controlador","ProfeControlador.php","31",\"'+id+'\","","delete")\'></button>'+
             '<input type="hidden"  id="area_id" name="area_id[]" value="'+id+'"><b><i>'+area_nombre+'</b></i></div>'+
        '';
        $('#cajaArea').append(add);
    }

    else
    {
         $.jGrowl("Error al ingresar el area, revisar los datos del área", { header: 'Error' });
    }
    ajax(ruta,controlador, op, parametros,'AjaxArea'); 
    }
}



function accionCursos(ruta,controlador,op,id,profe_id,clase_id,profe_clase_id,area_id,div)

{
    if(confirm("¿Confirma su eliminación?")){

    $("#fil" + id).remove();
    var turno=$("#turno").val();
    var parametros='';
   parametros = "&id="+id;
   
   ajax(ruta,controlador,op,parametros,"");//cargamos el modal desde la bd con el curso que se ha eliminado 

    consultarHorario(ruta,controlador,'19',clase_id,profe_clase_id,profe_id,"",div,"1",turno);
    
}
}

function eliminarCurso(id)

{
   
    if(confirm("¿Confirma su eliminación?")){

        $("#fila" + id).remove();
        $("#curso" + id).show();//mostramos el elemento eliminado en el popup

     }
    
    
}

function anidado(id,ruta,controlador,op,accion,unidad,tema){
    
    accionTema(ruta,controlador,op,id,accion);
    agregarTema(id,unidad,tema);

}

function anidado2(id,ruta,controlador,op,accion,curso){
    
    accionCurso(ruta,controlador,op,id,accion);
    agregarCurso(id,curso);

}


function eliminar(ruta,controlador,op,id)
{
    
    if(confirm("¿Confirma su eliminación?")){
		
		 $("#"+id).hide("slow");
  
    var parametros = '';
   
                    parametros = "&id="+id;
                    ajax(ruta,controlador, op, parametros,'');   
		}

}

function consultarHorario(ruta,controlador,op,id,id2,id3,id4,div,type,turno)
{
    var parametros = '';
   
                    parametros = "&t="+turno+"&id="+id+"&id2="+id2+"&id3="+id3+"&id4="+id4+"&tipo="+type;
    console.log(id);              
    ajax(ruta,controlador, op, parametros,div);   
}

function accion(ruta,controlador,op,id,id2,div,tipo)
{
    if(tipo=="e"){
    if(confirm("¿Confirma su eliminación?")){
		
		 $("#"+id).remove();
  }}
 if(tipo=="i"){
    if(confirm("¿Confirma la anulación de la asignación?")){
		
		 $("#"+id).remove();
  }}
 
    var parametros = '';
   
                    parametros = "&id="+id+"&id2="+id2+"&tipo="+tipo;
                    ajax(ruta,controlador, op, parametros,div);   
}

function accionSubject(ruta,controlador,op,id,id2,div,tipo)
{
    if(tipo=="e"){
    if(confirm("¿Confirma su eliminación?")){
		
		 $("#tem"+id).empty();
                 $("#tem"+id).remove();
                 $("#tem"+id).hide();
  
  }}
 
 
    var parametros = '';
   
                    parametros = "&id="+id+"&id2="+id2+"&tipo="+tipo;
                    ajax(ruta,controlador, op, parametros,div);   
}

function accionSimple(ruta,controlador,op,id,div,tipo,tabla)
{
    var parametros = '';
    
    if(tipo=="e"){
    if(confirm("¿Confirma su eliminación?")){
		
		 $("#"+id).hide("slow");
     }
 }
  
 
       parametros = "&id="+id+"&tabla="+tabla+"&tipo="+tipo;
       ajax(ruta,controlador,op,parametros,div);             
   
}
//function enchufe(ruta,controlador,op,id){
//	var name=document.getElementsByName(id);
//	for(var i=0;i<name.length;i++){
//		
//		if(name[i].checked)
//		 name=name[i].value;
//	
//	}
//	 var pagina=ruta+"/"+controlador+"?op="+op;  
//	$.ajax({
//			type:"POST",
//			url:pagina,
//			data:{"id_grado":id,"interruptor":name},
//			
//			beforeSend:function(){
//				
//				$("#carga").show("fast");
//				
//			},
//			
//			success:function(respuesta){
//				
//				$("#carga").hide("fast");
//				$("#div-results2").html(respuesta);
//				$("#myModal2").modal("toggle");
//			
//			}
//			
//		});
//	
//
//}
function guardarNota(ruta,controlador,op){ 

  var profe_clase_id = document.getElementById('cursoid').value;

  var trimestre_id = document.getElementById('trimestre_id').value;
  var parametros='';
  parametros = "&profe_clase_id="+profe_clase_id+"&trimestre_id="+trimestre_id;
     var pagina=ruta+"/"+controlador+"?op="+op+parametros;  

	var formData = new FormData($("#formNotas")[0]);
	$.ajax({
            
	    url: pagina,
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(rspta)
	    {       
               
                     $.jGrowl(rspta, { header: 'Mesaje' });
	    }
	});

  }
  
  function editarAsistencia(ruta,controlador,op,id,tipo){
       var asistencia_id=$("#asistencia_id").val();
              var pagina=ruta+"/"+controlador+"?op="+op+"&estudiante_id="+id+"&asistencia_id="+asistencia_id+"&tipo="+tipo;
       
      $.ajax({
            url: pagina
        });
  
  }
  
function guardarAsistencia(ruta,controlador,op,div){
  
  var estudiante_cant=document.getElementsByName('cantidad');//obtenemos la cantidad de los alumnos 
  var indefinido=false;
  var letraArray = new Array();
   
    for(var i=0; i<estudiante_cant.length; i++) {//recorremos la cantidad de los alumnos
       var letrai='letra'+i;//asignamos el numero de posiciones de los alumnos a las letras
       var letraValor=$('input:radio[name='+letrai+']:checked').val();//obtenemos el valor de la letra de acuerdo al numero de posiciones del alumno
                  letraArray[i]=[letraValor];//asignamos la letra al array con el numero de orden correspondoente
                  
                  if(typeof letraValor==="undefined"){
                      indefinido=true;
                  }
             }
if(!indefinido){
      var tema=$("#tema_id").val();
      if(typeof tema !== "undefined"){//si el profesor no ha elegido un tema entonces no se ejecuta
         
          var profe_clase_id=$("#cursoid").val();
          var fecha=$("#fecha_hoy").val();
   
            var pagina=ruta+"/"+controlador+"?op="+op+"&profe_clase_id="+profe_clase_id+"&fecha_hoy="+fecha+"&letra="+letraArray;  
        
         var formData = new FormData($("#formAsis")[0]);

	 $.ajax({
            url: pagina,
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(rspta)
	    {        
                if(rspta==='1'){
                  document.getElementById('AjaxNavegacion').innerHTML='<div class="asistencia"><img src="../Imagenes/vueltitas.gif" alt=""/></div>';
                  $.jGrowl('La asistencia se registró correctamente!!!', { header: 'ÉXITO' });
                  $('#info').removeClass('active');
                  $('#nots').removeClass('active');
                  $('#asis').addClass('active');
                  menu_curso(ruta,controlador,6,div,''); 
                 
                }
             
                else if(rspta==='2'){$.jGrowl('La fecha ya se encuentra registrada', { header: 'Fecha Duplicada' });}
            
                else{$.jGrowl('Hubo un error', { header: 'Error' });}

	    }
	  });
    } 
     else{$.jGrowl('Debe agregar un tema', { header: 'Tema vacío' });}
} else{$.jGrowl('Debe completar todas las opciones', { header: 'Opcion vacía' });}
   }
  

  
function guardarAsignacion(ruta,controlador,op,profe_id,profe_clase_curso_id,curso_id,clase_id,profe_clase_id,area_id,div){
  
   var turno=$("#turno").val();
   
            var pagina=ruta+"/"+controlador+"?op="+op+"&profe_id="+profe_id+"&profe_clase_curso_id="+profe_clase_curso_id;  
         
         var formData = new FormData($("#formAsig"+curso_id)[0]);

	 $.ajax({
            url: pagina,
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(rspta)
           
	    {      
                if(rspta==1){
                  $.jGrowl('El horario se registró correctamente!!!', { header: 'ÉXITO' });
                   
                    consultarHorario(ruta,controlador,'19',clase_id,profe_clase_id,profe_id,"",div,"",turno);
                 
                }
            
                else{
                    
                        $.jGrowl(rspta, { header: 'Ya registrado' });}

	    }
	  });
    
} 

function guardarAsignacionNueva(ruta,controlador,op,profe_id,profe_clase_id,curso_id,clase_id,area_id){
  
   var turno=$("#turno").val();
            var pagina=ruta+"/"+controlador+"?op="+op+"&profe_id="+profe_id+"&profe_clase_id="+profe_clase_id
            +"&curso_id="+curso_id+"&clase_id="+clase_id;  
         
         var formData = new FormData($("#formAsig"+curso_id)[0]);

	 $.ajax({
            url: pagina,
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(rspta)
           
	    {      
                if(rspta==1){
                  $.jGrowl('El horario se registró correctamente!!!', { header: 'ÉXITO' });
                  consultarHorario(ruta,controlador,'19',clase_id,profe_clase_id,profe_id,"","AsignaAjax","1",turno);
                 
                 
                }
            
                else{
                    
                        $.jGrowl(rspta, { header: 'Ya registrado' });}

	    }
	  });
    
} 



function ajax(ruta,controlador,op,parametros,divid)
 { 
     
    var pagina=ruta+"/"+controlador+"?op="+op+parametros;  

    var xmlhttp;
     // en esta condicional Doble se valida la Version del Navegador
        if (window.XMLHttpRequest)
        {
            xmlhttp = new XMLHttpRequest();// creando un de Ajax Moderno
        } else
        {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function ()
        {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
            
                document.getElementById(divid).innerHTML = xmlhttp.responseText;
               
            }
        }
        xmlhttp.open("GET", pagina, true);
        xmlhttp.send(null);

}    
 
 
 
 function grabar(ruta,controlador,op,op2,div) {
    
        var pagina=ruta+"/"+controlador+"?op="+op;
        var formData = new FormData($("#FormMante")[0]);
        $.ajax({
            type: 'POST',
            url: pagina,
            data:formData,
	    contentType: false,
	    processData: false,	
        success: function (rspta) {
            console.log(rspta);
         
                if(rspta==1){
                     $.jGrowl("Acción realizada correctamente!!!", { header: 'Correcto' });
                     consultaSimple(ruta,controlador,op2,div);
                }
                
                  else if(rspta==2){
                    
                      $.jGrowl("El registro ya existe", { header: 'Existente' });
                }

                else if(rspta==3){
                    
                      $.jGrowl("La fecha no corresponde al año seleccionado", { header: 'Comprobar Año' });
                }
                
                else if(rspta==4){
                    
                      $.jGrowl("La fecha debe corresponder al año actual", { header: 'Corregir Fecha' });
                }
                
                 else if(rspta==5){
                    
                      $.jGrowl("El año escolar ya fue creado", { header: 'Año en curso' });
                }
                
                  else { $.jGrowl(rspta, { header: 'Mensaje' });}
            }
        });
    
}


function estado(ruta,controlador,op,estado,tipo,id,tabla) {
    
        var pagina=ruta+"/"+controlador+"?op="+op+"&estado="+estado+"&tipo="+tipo+"&id="+id+"&tabla="+tabla;
        $.ajax({
            url: pagina,
           
        success: function (rspta) {
         
                $.jGrowl(rspta, { header: 'Mensaje' });
        
        if(rspta=='1'){
            
        }
        
        
            }
        });
    
}
 
 
function ward(ruta) {
    
      var cboClase=document.formAgregarAula.clase_id.value;
	var txtAño=document.formAgregarAula.año_escolar.value;
   
        var pagina = ruta + "/ClaseControlador.php?op=2";
        $.ajax({
            type: 'POST',
            url: pagina,
            //    dataType: 'JSON',
          data:{"clase_id":cboClase,"año_escolar":txtAño},
			
        success: function (rspta) {
                if(rspta==='ok'){
                    
                     MiClase(ruta);
                }
                
                  else if(rspta==='vacio'){
                    
                      $.jGrowl("No hay ningun alumno registrado en esa aula", { header: 'Aula vacía' });
                }
                
else{
    
    $.jGrowl("El grado ya existe", { header: 'Agregar grado fallida' });
}
            }
        });
    
}

  function fecha_hoy(){
    var now = new Date();
	var day = ("0" + now.getDate()).slice(-2);
	var month = ("0" + (now.getMonth() + 1)).slice(-2);
	var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
    $('#fecha_hoy').val(today);}

function agregarCurso(curso_id,curso){
   
   
   
    $("#curso" + curso_id).hide('slow');
    var indefinido=false;
    var fila='';
    if (curso_id!=="")
    {   var cur_id=$("#subject_id").val();
        if(typeof cur_id==="undefined"){
                      indefinido=true;
                  }
        if(!indefinido){
        var c = document.getElementById("formAsig"+cur_id+"");
        var c2 = document.getElementById("modalHora"+cur_id+"");
        var clon = c.cloneNode(true);
        var clon2 = c2.cloneNode(true);
        c.id='formAsig'+curso_id;
        c2.id='modalHora'+curso_id;
        document.body.appendChild(clon);
        var nuevoForm = document.getElementById('formAsig' +curso_id);
        nuevoForm.appendChild(clon2);
          }else if(indefinido){
        var c3 = document.getElementById("formAsig0");
        var c4 = document.getElementById("modalHora0");
        var clon3 = c3.cloneNode(true);
        var clon4 = c4.cloneNode(true);
        c3.id='formAsig'+curso_id;
        c4.id='modalHora'+curso_id;
        document.body.appendChild(clon3);
        var nuevoForm2 = document.getElementById('formAsig' +curso_id);
        nuevoForm2.appendChild(clon4);
          }
        
        var profe_id=$("#teacher_id").val();
        var profe_clase_id=$("#teacher_class_id").val();
        var clase_id=$("#class_id").val();
        var area_id=$("#area_id").val();
        
        fila='<tr class="filas" id="fila'+curso_id+'">'+
         '<form id="formAsig'+curso_id+'">'+       
        '<td><button type="button" class="btn btn-danger" onclick=\'eliminarCurso(\"'+curso_id+'\")\'><span class="icon icon-remove"></span></button></td>'+
    	'<td>'+curso+'</td>'+
        '<td><a data-toggle="modal" href="#modalHora'+curso_id+'"> <button id="" type="button" class="btn btn-primary"> <span class="icon-plus"></span></button></a></td>'+
    	'<td><button id="btnGuardar" type="button"  onclick=\'guardarAsignacionNueva(\"../../Controlador\",\"ProfeControlador.php\",26,\"'+profe_id+'\",\"'+profe_clase_id+'\",\"'+curso_id+'\",\"'+clase_id+'\","")\'  class="btn btn-primary">Guardar</button></td>'+      
         '</form>'+
                '</tr>';
        $('#subjects').append(fila);
    
    }

    else
    {
         $.jGrowl("Error al ingresar el curso, revisar los datos del curso", { header: 'Error' });
    }
 
}

function agregarTema(tema_id,unidad,tema_nombre){
   
    $("#tema" + tema_id).hide('slow');
    var fila='';
    if (tema_id!=="")
    {
        fila='<tr class="filas" id="fila'+tema_id+'">'+
        '<td><button type="button" class="btn btn-danger" onclick=\'accionTema(\"../../Controlador\",\"ProfeControlador.php\",\"12\",\"'+tema_id+'\",\"delete\");eliminarTema(\"'+tema_id+'\")\'>X</button></td>'+
        '<td>'+unidad+'</td>'+
    	'<td><input type="hidden"  id="tema_id" name="tema_id[]" value="'+tema_id+'">'+tema_nombre+'</td>'+
    	'</tr>';
        $('#temas').append(fila);
    }

    else
    {
         $.jGrowl("Error al ingresar el detalle, revisar los datos del artículo", { header: 'Error' });
    }
 
}

function eliminarTema(id)
{
     $("#fila" + id).remove();//eliminamos la fila de la tabla
    $("#tema" + id).show();//mostramos el elemento eliminado en el popup
   
}

function agregarArea(id,area_nombre){
    $("#area" + id).hide('slow');
    var add='';
    if (id!=="")
    {
        add=' <div style="border:solid 2px green" id="caja'+id+'">'+
'<button type="button" class="btn btn-danger btn-mini icon icon-remove"'+
'onclick=\'eliminarArea(\"'+id+'\")\'></button>'+
             '<input type="hidden"  id="area_id" name="area_id[]" value="'+id+'"><b><i>'+area_nombre+'</b></i></div>'+
        '';
        $('#cajaArea').append(add);
    }

    else
    {
         $.jGrowl("Error al ingresar el area, revisar los datos del área", { header: 'Error' });
    } 

}

function eliminarArea(id)
{
     $("#caja" + id).remove();//eliminamos la fila de la tabla
    $("#area" + id).show();//mostramos el elemento eliminado en el popup
   
}

function eliminarHorario(ruta,controlador,op,id)
{
    
    if(confirm("¿Confirma su eliminación?")){
		
          $('#'+id).replaceWith("<td bgcolor='white'></td>");
     }
    
    var parametros='';
   parametros = "&id="+id;
       ajax(ruta,controlador,op,parametros,""); 
}


function buscarProfe(ruta,controlador,op,div){
    
    var entrada=$("#buscar_profe").val();
      var parametros = '';
   
    parametros = "&entrada="+entrada;
    ajax(ruta,controlador, op, parametros,div); 
}

function buscarEstu(ruta,controlador,op,div){
    
    var entrada=$("#buscar_profe").val();
      var parametros = '';
   
    parametros = "&entrada="+entrada;
    ajax(ruta,controlador, op, parametros,div); 
}

function cargarModalCurso(ruta,controlador,op,clase_id,area_id,div){
    
      var parametros = '';
    parametros = "&clase_id="+clase_id+"&area_id="+area_id;
    ajax(ruta,controlador, op, parametros,div); 
    
}

function cargarModalHorario(ruta,controlador,op,clase_id,div){
    
      var parametros = '';

    parametros = "&clase_id="+clase_id;
    ajax(ruta,controlador, op, parametros,div); 
}

function cambiarContra(ruta,controlador,op){				
 var pagina=ruta+"/"+controlador+"?op="+op;
        var formData = new FormData($("#FormPass")[0]);
        $.ajax({
            url: pagina,
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(rspta){
 if(rspta=='0'){
          $.jGrowl("Hubo un error al cambiar la contraseña", { header: 'Error' });
        }
      else  if(rspta=='1'){
          $.jGrowl("¡Su contraseña ha sido cambiada con éxito!", { header: 'ÈXITO' });
          var delay = 2000;
	setTimeout(function(){ window.location = 'principal.php'  }, delay);  
						
        }
        else  if(rspta=='2'){
          $.jGrowl("La contraseña ingresada no coincide con la contraseña actual", { header: 'Verificar contraseña actual' });
        }
        else  if(rspta=='3'){
          $.jGrowl("La contraseña repetida no coincide con la nueva contraseña", { header: 'Verificar contraseña repetida' });
        }
                
                else{
             $.jGrowl(rspta, { header: 'Mensaje' });
        }
    
    }
	  });

   }

                                
function  cargaTablaJQUERY()
{
    $(document).ready(function () {
        $('#datos').addClass( 'nowrap' ).DataTable({
            responsive: true,
            
            "language": {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningun dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Utimo",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        });
    });
    
}


function  cargaTablaJQUERY2()
{
    $(document).ready(function () {
        $('#data').addClass( 'nowrap' ).DataTable({
            responsive: true,
            
            "language": {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningun dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Utimo",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        });
    });
    
}