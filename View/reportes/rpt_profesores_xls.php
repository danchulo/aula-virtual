      <?php
      header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;filename=reporte_de_profesores.xls");

session_start();
  $listaProfe=$_SESSION['listaProfe'];
   $fecha=$_SESSION['inicio'];
    $año= substr($fecha,0,4); 
  foreach ($listaProfe as $IndiceP => $valProfe){}

$html='
<!DOCTYPE html>
<html lang="es">
    <head>
       <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title></title>
    </head>
    <body>
<center><h1>Institución Educativa Particular Carl Palmer</h1></center>
 <H2> Año escolar: '.$año.'</H2>
	<table border="1" cellspacing="0"  cellspandding="0"  width="100%" >

		<thead>
                    <tr>
                       <th colspan="10">LISTADO DE PROFESORES</th>
                 </tr>
		<tr>
					
				   
					<th>Profesor</th>
                                        <th>Sexo</th>
                                        <th>Dni</th>
                                        <th>Edad</th>
                                        <th>Area(s)</th>
                                         <th>Dirección</th>
                                         <th>Celular</th>
                                        <th>Telefono</th>
					<th>E-mail</th>
                                         <th>Estado</th>
                                       
		</tr>
		</thead>
		<tbody>';
	
	foreach ($valProfe as $pro) { 
              
                
              $estado=$pro['ESTADO'];
              if($estado=="A"){
                  $esta='Activo';
              }else {
                  $esta='Inactivo';
              }
              
              $sexo=$pro['SEXO'];
              if($sexo=="M"){
                  $sex='Masculino';
              }else {
                  $sex='Femenino';
              }
              
		$html.='<tr>
                   <td>'.$pro['PROFESOR'].'</td>
                   <td>'.$sex.'</td> 
	           <td>'.$pro['DNI'].'</td> 
                   <td>'.$pro['EDAD'].'</td> 
                   <td>';
                    $are=$pro['AREA'];
                   foreach ($are as $area){
                   
                   $html.= '-'.$area['area_nombre'].'<br>'; 
                    
                   }
                    
                 $html.='</td>
                       
                   <td>'.$pro['DIRECCION'].'</td> 
                   <td>'.$pro['CEL'].'</td> 
                   <td>'.$pro['TEL'].'</td> 
                   <td>'.$pro['EMAIL'].'</td> 
                   <td>'.$esta.'</td>
                   </tr>';
        }
$html.='</tbody>
                
	</table>
	</form>	
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>


                </div>

    </body>
</html>';
                
                
echo $html;