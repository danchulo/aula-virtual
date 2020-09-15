<?php
require_once "../Util/Querys.php";  
require_once "../Modelo/Bean/CursoBean.php";
class CursoDao {
    public  function ListarCursos()
   {  try {
      
           $sql="select * from lista_cursos order by curso_id desc ;";
           $rs= ejecutarConsulta($sql);
           $LISTA['CURSOS']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['CURSOS'], 
             array('CODIGO'=>$fila['curso_id'],'COD_CURSO'=>$fila['curso_codigo'],'CURSO'=>$fila['curso_nombre'],'GRADO'=>$fila['grado']
                   ,'NIVEL'=>$fila['nivel_nombre'],'AREA'=>$fila['area_nombre'],'ESTADO'=>$fila['estado']));   
           }           
       } catch (Exception $e) {                 
       }     
     return  $LISTA;       
       
       
   }
   
   public  function cantCurso()
   {  try {
     
       $sql="select count(*) as cantidad from curso where estado='A';";
       $rs=ejecutarConsulta($sql);
      $fila=  mysqli_fetch_assoc($rs);
       $cantidad=$fila['cantidad'];
       
       } catch (Exception $e) {  
         $cantidad=null;
       }     
     return   $cantidad;        
   }
   
    public  function cargaCurso()
   {  try {
      
           $sql="select * from lista_cursos where estado='A' ;";
           $rs=ejecutarConsulta($sql);
             
           $LISTA['CURSO']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['CURSO'], 
             array('CODIGO'=>$fila['curso_id'],'CURSO'=>$fila['curso']));   
           }   
  
       } catch (Exception $e) {                 
       }     
     return  $LISTA;        
   }
   
    public  function filtrarCurso($id)
   {  try {
      
           $sql="select * from lista_cursos where curso_id!='$id';";
           $rs=ejecutarConsulta($sql);
             
           $LISTA['CURSO']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['CURSO'], 
             array('CODIGO'=>$fila['curso_id'],'CURSO'=>$fila['curso']));   
           }   
  
       } catch (Exception $e) {                 
       }     
     return  $LISTA;        
   }
   
   public  function guardarCurso(CursoBean $objbean)
   {  
         try 
         {
             
         $rspta=0;
         $grado_id=$objbean->grado_id;
         $niv_id=$objbean->nivel_id;
         $area_id=$objbean->area_id;
         $cod_cur=$objbean->curso_codigo;
         $curso=$objbean->curso_nombre;
          $query="select * from curso;";
          $rst=ejecutarConsulta($query);
             while ($fila=  mysqli_fetch_assoc($rst))
           {
              if($fila['curso_codigo']==$cod_cur && $fila['grado_id']==$grado_id && $fila['nivel_id']==$niv_id && $fila['area_id']==$area_id && $fila['curso_nombre']==$curso ){
                 $rspta="El registro ya existe!!!";
                 @$x=2;
             }else if($fila['grado_id']==$grado_id && $fila['nivel_id']==$niv_id && $fila['area_id']==$area_id && $fila['curso_nombre']==$curso ){
                 $rspta="El nombre, grado, nivel y area del curso ya existen!!!";
                 @$x=2;
             }
             else if($fila['curso_codigo']==$cod_cur ){
                 $rspta="El código ya existe!!!";
                 @$x=2;
             }
           }
 
             if(@$x!=2){
                $sql="insert into curso  values(null,'$cod_cur', '$curso','$grado_id',"
                . "'$niv_id','$area_id','A');";
             $rspta=ejecutarConsulta($sql);

             }

  
       } catch (Exception $e) {  
           $rspta=0;
       }     
     return  $rspta;        
   }
   
   public  function accion($tipo,$id)
   {  
        try {

           
           if($tipo=="e"){
                $sql="delete from curso where curso_id='$id';";
             ejecutarConsulta($sql);
             }
             
             else if($tipo=="b"){
              $sql="select * from lista_cursos where curso_id='$id';";
             $rsP= ejecutarConsulta($sql);
             $LISTA['LISTA']= array();
           while ($fila=  mysqli_fetch_assoc($rsP))
           {
             array_push($LISTA['LISTA'], 
             array('CODIGO'=>$fila['curso_id'],'CURSO'=>$fila['curso_nombre'],'COD_CURSO'=>$fila['curso_codigo'],'COD_NIVEL'=>$fila['nivel_id'],
                   'COD_GRADO'=>$fila['grado_id'], 'COD_AREA'=>$fila['area_id'], 'AREA'=>$fila['area_nombre'],
                   'NIVEL'=>$fila['nivel_nombre'],'GRADO'=>$fila['grado']));      
             }   
             $rs=ejecutarConsulta($sql);
             }
           
    
       } catch (Exception $e) {                 
       }     
     return  $LISTA;       

   }
      public  function editarCurso(CursoBean $objBean)
   {  

       try {
        $rspta=0;
        $curso=$objBean->curso_nombre;
        $cod_cur=$objBean->curso_codigo;
         $id=$objBean->curso_id;
         $grado_id=$objBean->grado_id;
         $niv_id=$objBean->nivel_id;
          $area_id=$objBean->area_id;
        $query="select * from curso where curso_id!='$id';";
          $rst=ejecutarConsulta($query);
             while ($fila=  mysqli_fetch_assoc($rst))
           {
              if($fila['curso_codigo']==$cod_cur && $fila['grado_id']==$grado_id && $fila['nivel_id']==$niv_id && $fila['area_id']==$area_id && $fila['curso_nombre']==$curso ){
                 $rspta="El registro ya existe!!!";
                 @$x=2;
             }else if($fila['grado_id']==$grado_id && $fila['nivel_id']==$niv_id && $fila['area_id']==$area_id && $fila['curso_nombre']==$curso ){
                 $rspta="El nombre, grado, nivel y area del curso ya existen!!!";
                 @$x=2;
             }
             else if($fila['curso_codigo']==$cod_cur ){
                 $rspta="El código ya existe!!!";
                 @$x=2;
             }

           }
 
             if(@$x!=2){
                $sql="update curso set grado_id='$grado_id', nivel_id='$niv_id', "
                    ."area_id='$area_id',curso_nombre='$curso',curso_codigo='$cod_cur' where curso_id='$id';";
             $rspta=ejecutarConsulta($sql);

             }
             
       } catch (Exception $e) {  
         $rspta=0;
       }     
     return  $rspta;        
   }
    
 
}
