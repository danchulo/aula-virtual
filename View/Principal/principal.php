<?php include('header_principal.php'); ?>
<?php include('../Seguridad/session.php'); ?>


<body id="class_div">

    <?php include('../Seguridad/configuracion.php'); ?>
    
    <?php $añoid=$año_escolar[0];
    $inicio=$año_escolar[1];
    $_SESSION['anio_id']=$añoid;
    $_SESSION['inicio']=$inicio;
      $añoescolar=$inicio." a ".$año_escolar[2];

    ?>

    <?php include('menu.php'); ?>

        <div class="container-fluid" id="ajuste">
            <div class="row-fluid" id="MiAjax">
				       
                
                <div class="span8" id="content">
                     <div class="row-fluid">
					    <!-- breadcrumb -->	
					     <ul class="breadcrumb">
						 <li><a  href="#"><b>Año Escolar:</b> <?php echo $añoescolar;?></a></li>
             
                                             </ul> 
                                                       
						 <!-- end breadcrumb -->
                        <!-- block -->
                         
                      
           <?php  if($opcion==2 || $opcion==3 ){ ?>
                        
                        
                        <div class="block" id="block"  >
                         
                          
                            <img  style="width: 99%; height:30em" id="img" src="../Imagenes/inicio.png"  class="img-polaroid">	
                                
                        </div>
                        
                        
           <?php  } ?>     
                    
                       <?php  if($opcion==1 || $opcion==5 || $opcion==4){include('dashboard.php');} ?>
                      
                        <!-- /block -->
                    </div>
                   
                </div>
            
      
        
            <?php  if($opcion==3)include('../Estudiante/menu_curso.php') ?>
                
        <?php  if($opcion==2)include('../Profesor/menu_curso.php') ?>
                
                </div>
          
		<?php include('footer.php'); ?>
        </div>

		<?php include('script.php'); ?>
    </body>
</html>