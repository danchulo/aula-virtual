$(document).ready(function(){
    
    $('.menues li:has(ul)').click(function(e){
        e.preventDefault();
       if($(this).hasClass('active')){
            $(this).removeClass('active');
              $(this).children('ul').slideUp();

        }
        
        else{
           $(this).addClass('active');
               $(this).children('ul').slideDown();
        }
 
    });
    
     $('.menues li ul li a').click(function(){
         
         window.location.href= $(this).attr("href");
     });
    });
    
    
    function navNotas(){
           $('#nav_notas').addClass('active');
       $('#nav_asistencia').removeClass('active');
        document.getElementById('filtroInfoEstu').innerHTML='<div class="carga_nota"> <img src="../Imagenes/25.gif" alt=""/><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></div>';

    }
    function navAsis(){
            $('#nav_notas').removeClass('active');
       $('#nav_asistencia').addClass('active');
        document.getElementById('filtroInfoEstu').innerHTML='<div class="carga_nota"> <img src="../Imagenes/25.gif" alt=""/><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></div>';
        
    }
    $(document).ready(function(){

    $('#informacion').click(function(){
       
          $('#asis').removeClass('active');
       $('#nots').removeClass('active');
         $('#info').addClass('active');
         document.getElementById('AjaxNavegacion').innerHTML='<div class="silabo"><img src="../Imagenes/vueltitas.gif" alt=""/></div>\n\
                                                              <div class="cursos"><img src="../Imagenes/vueltitas.gif" alt=""/></div>\n\
                                                              <div class="horario"><img src="../Imagenes/vueltitas.gif" alt=""/></div>';
        
    });
    
    $('#asistencia').click(function(){
        $('#info').removeClass('active');
       $('#nots').removeClass('active');
       $('#asis').addClass('active');
        document.getElementById('AjaxNavegacion').innerHTML='<div class="asistencia"><img src="../Imagenes/vueltitas.gif" alt=""/></div>';
    });
    
     $('#nota').click(function(){
         $('#info').removeClass('active');
          $('#asis').removeClass('active');
       $('#nots').addClass('active');
        document.getElementById('AjaxNavegacion').innerHTML='<div class="asistencia"><img src="../Imagenes/vueltitas.gif" alt=""/></div>';
        
        
        
    });
    
   
});


function clickClase(){
//$('#AjaxClase').removeClass('CLASE');
   document.getElementById('menu').style.display="none";
    $('#menu_profe').show('slow');

}

function infoCurso(){
//     $('#AjaxClase').addClass('CLASE');
         $('#asis').removeClass('active');
       $('#nots').removeClass('active');
       $('#menucurso').show("slow");
    $('#info').addClass('active');
      document.getElementById('block').innerHTML='<div class="alert curso-titulo"><p><img src="../Imagenes/linea.gif" alt=""/></p></div>\n\
                                                        <div id="AjaxNavegacion" class="block-content1 collapse in">\n\
                                                        <div class="silabo"><img src="../Imagenes/vueltitas.gif" alt=""/></div>\n\
                                                              <div class="cursos"><img src="../Imagenes/vueltitas.gif" alt=""/></div>\n\
                                                              <div class="horario"><img src="../Imagenes/vueltitas.gif" alt=""/></div>';
  
  
}

function misEstus(){
     $('#menucurso').hide('slow');
     $('#menuMisEstus').addClass('activar');
     $('#menuCurso').removeClass('activar');
}

function misCursos(){
     $('#menucurso').hide('slow');
     $('#menuCurso').addClass('activar');
     $('#menuMisEstus').removeClass('activar'); 
}

//function remueveClase(){
//     $('#AjaxClase').removeClass('CLASE');
//    
//}

function selector(){
    
    document.getElementById('cantidad').innerHTML='<img class="circular" src="../Imagenes/circular.gif" alt=""/>';
    
         document.getElementById('AjaxCurso').innerHTML='<div class="Clases"><div class="alert tituloClase">\n\
    <div class="carga_aula"> <img src="../Imagenes/ajax-loader(1).gif" alt=""/></div></div>\n\
   <div class="block-content collapse in">\n\
                                <div class="span13 aula_gif">\n\
 <img  src="../Imagenes/carga.gif" alt=""/>\n\
 </div></div>';
}


function selector2(){
    
    document.getElementById('cantidad').innerHTML='<img class="circular" src="../Imagenes/circular.gif" alt=""/>';
    
         document.getElementById('AjaxClasePro').innerHTML='<div class="span13 aula_gif"><img  src="../Imagenes/carga.gif" alt=""/>\n\
 </div>';
}

  function cantidad(){
    
      var valor = document.getElementById("canti").value;
      document.getElementById('cantidad').innerHTML=valor;
}


function notaFiltro(div){
    document.getElementById(div).innerHTML='<div id="tablaFiltro"> </div><div class="carga_nota"> <img src="../Imagenes/25.gif" alt=""/><br><br><br><br><br><br><br><br><br><br><br><br></div>'
   ;
}

function miClase(){
     $('#menuMisEstus').addClass('activar');
     $('#menuCurso').removeClass('activar');
$('#menucurso').hide();
             document.getElementById('menu').style.display="block";
               document.getElementById('menu_profe').style.display="none";
        document.getElementById('block').innerHTML='<div class="MiClase">\n\
        <div class="navbar navbar-inner block-header cabecera-clase">\n\
        <div id="count_class" class="muted pull-right"><span>Cantidad de cursos: </span><span class="badge badge-info">  <img class="circular" src="../Imagenes/circular.gif" alt=""/></span></div>\n\
          </div>\n\
<div  class="alert alert-info filtro-clase" >\n\
    \n\
     <select   class="span3 select1">\n\
<option>Seleccione año</option></select>\n\
</div>\n\<div class="Clases"><div class="alert tituloClase">\n\
    <div class="carga_aula"> <img src="../Imagenes/ajax-loader(1).gif" alt=""/></div></div>\n\
   <div class="block-content collapse in">\n\
                                <div class="span13 aula_gif">\n\
 <img  src="../Imagenes/carga.gif" alt=""/>\n\
 </div></div></div></div>';
 
}