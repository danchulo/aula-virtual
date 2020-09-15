<?php
require_once "../Util/Querys.php";
require_once "../Modelo/Bean/AnioBean.php";
class    AnioDao
{     
  
     public  function ListarAnioActual()
   {  try {
           $sql="SELECT * FROM anio_escolar where estado='A' order by anio_Escolar_id desc;";
           $rs= ejecutarConsulta($sql);
           
            $lista= array();
            $fila=  mysqli_fetch_assoc($rs);
            $lista[0]=$fila['anio_escolar_id'];  
            $lista[1]=$fila['fecha_inicio'];  
            $lista[2]=$fila['fecha_fin'];  
              
        } catch (Exception $ex)
        {            
        }
         return $lista;
         
}

 public  function ListarAnio()
   {  try {
           $sql="select concat(fecha_inicio,' al ', fecha_fin) as anio,estado,anio_escolar_id from anio_escolar "
                   . "order by fecha_fin ";
           $rs= ejecutarConsulta($sql);
           
             $LISTA['ANIO']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['ANIO'], 
             array('CODIGO'=>$fila['anio_escolar_id'],'ANIO'=>$fila['anio'],'ESTADO'=>$fila['estado']));      
           }   
            
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $LISTA;
         
}

 public  function CargarAnio()
   {  try {
           $sql="select year(fecha_inicio) as anio,anio_escolar_id from anio_escolar";
           $rs= ejecutarConsulta($sql);
           
             $LISTA['ANIO']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['ANIO'], 
             array('CODIGO'=>$fila['anio_escolar_id'],'ANIO'=>$fila['anio']));      
           }   
            
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $LISTA;
         
}

public  function ListarAnioyTrime($anio_id)
   {  try {
           $sql="call  SP_listar_anio_trimestre('$anio_id') ";
           $rs= ejecutarConsulta($sql);
           
             $LISTA['ANIO_TRIME']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['ANIO_TRIME'], 
             array('CODIGO'=>$fila['anio_escolar_id'],'ANIO'=>$fila['anio'],'I1'=>$fila['fit1'],'I1'=>$fila['fit1']
                   ,'F1'=>$fila['fft1'],'I2'=>$fila['fit2'],'F2'=>$fila['fft2'],'I3'=>$fila['fit3'],'F3'=>$fila['fft3']));      
           }   
            
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $LISTA;
         
}

public  function buscarAnio($anio_id)
   {  try {
           $sql="select * from anio_escolar where anio_escolar_id='$anio_id' ";
           $rs= ejecutarConsulta($sql);
           
             $LISTA['ANIO']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['ANIO'], 
             array('CODIGO'=>$fila['anio_escolar_id'],'FI'=>$fila['fecha_inicio'],'FF'=>$fila['fecha_fin']));      
           }   
            
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $LISTA;
         
}

public  function guardarAnio(AnioBean $objbean)
   {  
         
         try 
         {
             $bien=false;
             $query="select date_format('$objbean->fecha_inicio','%Y') as anio ;";
             $campo=ejecutarConsulta($query);
             $anio = $campo->fetch_object();
             $year=$anio->anio;
             
             $sql="select * from anio_escolar where fecha_inicio like '%$year%' and estado='A';";
             $cant= existencia($sql);
             if($cant){
                 $rspta=5;
             }else{
             $query1="select date_format(curdate(),'%Y') as anioA ;";
             $campo1=ejecutarConsulta($query1);
             $anio1 = $campo1->fetch_object();
             $year1=$anio1->anioA;
             
             if($year==$year1){
                 $bien=true;
             }
                   
             if($bien){
             $sql="insert into anio_escolar values(null,'$objbean->fecha_inicio','$objbean->fecha_fin','I');";
             $rspta=ejecutarConsulta($sql);
             }
             else {
                $rspta=4;
             }
             
             }
  
       } catch (Exception $e) {  
           $rspta=0;
       }     
     return  $rspta;        
   }
   
   public  function editarAnio(AnioBean $objbean)
   {  
         
         try 
         {
             $bien=false;
             $query="select date_format('$objbean->fecha_inicio','%Y') as inicio ;";
             $campo=ejecutarConsulta($query);
             $anio = $campo->fetch_object();
             $year=$anio->inicio;
             
             $query1="select date_format(curdate(),'%Y') as inicio ;";
             $campo1=ejecutarConsulta($query1);
             $anio1 = $campo1->fetch_object();
             $year1=$anio1->inicio;
             
             if($year==$year1){
                 $bien=true;
             }
             
             if($bien){
             $sql="update anio_escolar set fecha_inicio='$objbean->fecha_inicio',fecha_fin='$objbean->fecha_fin',estado='$objbean->estado' "
                     . "where anio_escolar_id='$objbean->anio_escolar_id';";
             $rspta=ejecutarConsulta($sql);
             
             }else{
                 $rspta=4;
             }
       } catch (Exception $e) {  
           $rspta=0;
       }     
     return  $rspta;        
   }

public  function editarTrimestres($anio_id,$I1,$F1,$I2,$F2,$I3,$F3)
   {  
         try 
         {
             $bien=false;
             
             $query="select date_format(fecha_inicio,'%Y') as anio from anio_escolar where anio_escolar_id='$anio_id';";
             $campo=ejecutarConsulta($query);
             $anio = $campo->fetch_object();
             $year=$anio->anio;
             
             $query1="select date_format('$I1','%Y') as T1;";
             $campo1= ejecutarConsulta($query1);
             $anio1=$campo1->fetch_object();
             $year1=$anio1->T1;
             
             $query2="select date_format('$I2','%Y') as T2;";
             $campo2=ejecutarConsulta($query2);
             $anio2=$campo2->fetch_object();
             $year2=$anio2->T2;
             
             $query3="select date_format('$I3','%Y') as T3;";
             $campo3=ejecutarConsulta($query3);
             $anio3=$campo3->fetch_object();
             $year3=$anio3->T3;
             
             if($year==$year1 && $year==$year2 && $year==$year3){
                 $bien=true;
             }
             
             if($bien){
             $sql="update trimestre_escolar set fecha_inicio='$I1',fecha_fin='$F1' "
             . "where nombre_trimestre_escolar like '%1%' and anio_escolar_id='$anio_id';";
             $rs=ejecutarConsulta($sql);
             $sql1="update trimestre_escolar set fecha_inicio='$I2',fecha_fin='$F2' "
             . "where nombre_trimestre_escolar like '%2%' and anio_escolar_id='$anio_id';";
             $rs1=ejecutarConsulta($sql1);
             $sql2="update trimestre_escolar set fecha_inicio='$I3',fecha_fin='$F3' "
             . "where nombre_trimestre_escolar like '%3%' and anio_escolar_id='$anio_id';";
             $rs2=ejecutarConsulta($sql2);
             
             if($rs==1 and $rs1==1 and $rs2==1){
                 $rspta=1;
             }
             }else{
                 $rspta=3;
             }
  
       } catch (Exception $e) {  
           $rspta=0;
       }     
     return  $rspta;        
   }

}