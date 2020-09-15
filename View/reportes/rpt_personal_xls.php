      <?php
      header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;filename=reporte_de_estudiantes.xls");
session_start();
   $listaPersonal=$_SESSION['listaPersonal'];
 
   $fecha=$_SESSION['inicio'];
    $año= substr($fecha,0,4); 
    
  foreach ($listaPersonal as $IndiceP => $valPerso){}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
       <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title></title>
    </head>
    <body>
<center><h1>Institución Educativa Particular Carl Palmer</h1></center>
 <H2> Año escolar: <?php echo $año?></H2>
	<table border="1" cellspacing="0"  cellspandding="0"  width="100%" >

		<thead>
                    <tr>
                       <th colspan="10">LISTADO DE ESTUDIANTES</th>
                 </tr>
		<tr>
					
				   <th>Personal</th>
                                        <th>Sexo</th>
                                        <th>Cargo</th>
                                        <th>Edad</th>
                                        <th>Dni</th>
                                           <th>Dirección</th>
                                        <th>Celular</th>
                                        <th>Telefono</th>
                                         <th>E-mail</th>
                                       
                                        <th>Estado</th>
                                       
                                     
					
                                        
                                       
		</tr>
		</thead>
		<tbody>
	
	<?php foreach ($valPerso as $perso) { 
           $foto=$perso['FOTO'];
                if($foto==null){
               $foto="nodisponible.png";
                }
                
              $estado=$perso['ESTADO'];
              if($estado=="A"){
                  $esta='Activo';
              }else if($estado="I"){
                  $esta='Inactivo';
              }
              
              $sexo=$perso['SEXO'];
              if($estado=="M"){
                  $sex='Masculino';
              }else {
                  $sex='Femenino';
              }
            ?>
		<tr>
                               
		    <td><?php echo $perso['PERSONAL'] ?></td> 
                    
                    <td><?php echo $perso['CARGO'] ?></td>
	            <td><?php echo $sex ?></td> 
                    <td><?php echo $perso['EDAD'] ?></td> 
                    
	            <td><?php echo $perso['DNI'] ?></td> 
  <td><?php echo $perso['DIRECCION'] ?></td> 
                    <td><?php echo $perso['CEL'] ?></td> 
                    <td><?php echo $perso['TEL'] ?></td> 
                     
                          <td><?php echo $perso['EMAIL'] ?></td> 
	            <td><?php echo $esta ?></td>   
              
                  
		</tr>
        <?php } ?>
	
                
	</table>
	

    </body>
</html>
