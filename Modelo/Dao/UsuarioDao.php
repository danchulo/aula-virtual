<?php

require_once "../Util/Querys.php";
require_once "../Modelo/Bean/UsuarioBean.php";

   
class    UsuarioDao
{     
  
     public  function ValidarUsu(UsuarioBean $object)
   {  
         try {
     
            $sql="select * from persona p inner join usuario u on p.persona_id=u.usuario_id WHERE usuario='$object->usuario' AND password='$object->password';";
           
            $consulta= ejecutarConsulta($sql);
            $usuario_row = $consulta->fetch_object();
          
            $estado=$usuario_row->estado;
             if($estado=="A"){
                     $LISTA["USU"]=array();
                          array_push($LISTA["USU"], 
                          array('COD'=>$usuario_row->usuario_id,'NOMB'=>$usuario_row->nombres,'APA'=>$usuario_row->apellido_paterno,'AMA'=>$usuario_row->apellido_materno,'FOTO'=>$usuario_row->foto,'TIPO'=>$usuario_row->tipo_usuario_id));          
              }

            else if($estado=="I"){
                $LISTA="Inactivo";
            }else{$LISTA=0;}

          }catch (Exception $e){             
               $LISTA=0;
             }     
         return  $LISTA;       

       }
       
       public  function cantidadUsuarios()
   {  try {
     
       $sql="select count(*) as cantidad from usuario where estado='A';";
       $rs=ejecutarConsulta($sql);
      $fila=  mysqli_fetch_assoc($rs);
       $cantidad=$fila['cantidad'];
       
       } catch (Exception $e) {  
         $cantidad=null;
       }     
     return   $cantidad;        
   }
   
   public function listarUsuarios($id){
       
       try {
           $sql="select * from lista_usuarios where persona_id!='$id';";
             $rs= ejecutarConsulta($sql);
             $LISTA['LISTA']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['LISTA'], 
             array('CODIGO'=>$fila['persona_id'],'USUARIO'=>$fila['usuario'],'FOTO'=>$fila['foto'],'EMAIL'=>$fila['email'],'NOMBRE'=>$fila['nombre_completo'],'EDAD'=>$fila['edad'],
                 'DNI'=>$fila['dni'],'DIRECCION'=>$fila['direccion'],'CEL'=>$fila['numero_cel'],'TEL'=>$fila['numero_tel'],
                 'SEXO'=>$fila['sexo'],'TIPO'=>$fila['tipo_usuario_nombre'],'COD_TIPO'=>$fila['tipo_usuario_id'],'ESTADO'=>$fila['estado']));      
           }   
           
       } catch (Exception $ex) {
           $LISTA=null;
       }      
           return $LISTA;
   }
   
    public function cargarTipoUsuarios(){
       
       try {
           $sql="select * from tipo_usuario where tipo_usuario_nombre!='Estudiante' and tipo_usuario_nombre!='Profesor';";
             $rs= ejecutarConsulta($sql);
             $LISTA['LISTA']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['LISTA'], 
             array('CODIGO'=>$fila['tipo_usuario_id'],'TIPO'=>$fila['tipo_usuario_nombre']));      
           }   
           
       } catch (Exception $ex) {
           $LISTA=null;
       }      
           return $LISTA;
   }
   
   public function filtrarTipo($tipo_id){
       
       try {
           $sql="select * from tipo_usuario where tipo_usuario_id!='$tipo_id' and tipo_usuario_nombre!='Estudiante'"
                   . " and tipo_usuario_nombre!='Profesor';";
             $rs= ejecutarConsulta($sql);
             $LISTA['LISTA']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['LISTA'], 
             array('CODIGO'=>$fila['tipo_usuario_id'],'TIPO'=>$fila['tipo_usuario_nombre']));      
           }   
           
       } catch (Exception $ex) {
           $LISTA=null;
       }      
           return $LISTA;
   }
   
   public  function guardarUsu(UsuarioBean $objBean)
   {  try {
         $rs=0;
         $cel=$objBean->numero_cel;
      $query="select * from persona p inner join usuario u on p.persona_id=u.usuario_id;";
            $rst=ejecutarConsulta($query);
             while ($fila=  mysqli_fetch_assoc($rst))
           {
             if($fila['dni']==$objBean->dni ){
                 $rs="El dni ya existe";
                 @$x=2;
             }
             if($cel!=""){
             if($fila['numero_cel']==$cel){
                  $rs="El número de celular ya existe";
                  @$x=2;
            }}
           
           }
             
           if(@$x!=2){
               $sql="call SP_registro_usuario('$objBean->nombres','$objBean->apellido_paterno','$objBean->dni',"
               . "'$objBean->direccion','$objBean->numero_cel','$objBean->numero_tel','$objBean->fecha_nac',"
               . "'$objBean->foto','$objBean->sexo',$objBean->tipo_usuario_id','$objBean->usuario',"
               . "'$objBean->usuario_id','$objBean->apellido_materno','$objBean->distrito_id');";
               $rs=ejecutarConsulta($sql);
             }
      

       } catch (Exception $e) {  
         $rs=0;
       }     
     return  $rs;        
   }
   
   public  function accion($tipo,$id)
   {  
        try {

           if($tipo=="e"){
                $sql="call SP_eliminar_usuario('$id');";
             ejecutarConsulta($sql);
             }
             
             else if($tipo=="b"){
              $sql="select * from persona p inner join usuario u on p.persona_id=u.usuario_id "
                      . "inner join tipo_usuario t on u.tipo_usuario_id=t.tipo_usuario_id join distrito d on p.distrito_id=d.distrito_id  where persona_id='$id';";
             $rs= ejecutarConsulta($sql);
             $LISTA['LISTA']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['LISTA'], 
             array('CODIGO'=>$fila['persona_id'],'NOMBRES'=>$fila['nombres'],'APA'=>$fila['apellido_paterno'],
                   'AMA'=>$fila['apellido_materno'],'SEXO'=>$fila['Sexo'], 'EMAIL'=>$fila['email'],'DNI'=>$fila['dni'],'DIRECCION'=>$fila['direccion'],
                   'CEL'=>$fila['numero_cel'],'TEL'=>$fila['numero_tel'],'FECH_NAC'=>$fila['fecha_nac'],'DISTRITO'=>$fila['distrito_nombre'],'DISTRI_ID'=>$fila['distrito_id']
                    ,'TIPO'=>$fila['tipo_usuario_nombre'],'COD_TIPO'=>$fila['tipo_usuario_id'],'FOTO'=>$fila['foto'],'USU'=>$fila['usuario'],'PASS'=>$fila['password']));      
             }   
             }
           
    
       } catch (Exception $e) {                 
       }     
     return  $LISTA;       

   }
   
   public  function editarUsu(UsuarioBean $objBean)
   {  try {
      
       $rs=0;
       $cel=$objBean->numero_cel;
       $query="select * from persona p inner join usuario u on p.persona_id=u.usuario_id where persona_id!='$objBean->usuario_id';";
            $rst=ejecutarConsulta($query);
             while ($fila=  mysqli_fetch_assoc($rst))
           {
             if($fila['dni']==$objBean->dni ){
                 $rs="El dni ya existe";
                 @$x=2;
             }
             if($fila['usuario']==$objBean->usuario){
                  $rs="El usuario ya existe";
                  @$x=2;
             }
               if($cel!=""){
             if($fila['numero_cel']==$cel){
                  $rs="El número de celular ya existe";
                  @$x=2;
            }}
           
           }
             
           if(@$x!=2){
                 $sql="call SP_editar_usuario('$objBean->nombres','$objBean->apellido_paterno','$objBean->dni',"
               . "'$objBean->direccion','$cel','$objBean->numero_tel','$objBean->fecha_nac',"
               . "'$objBean->foto','$objBean->sexo','$objBean->tipo_usuario_id','$objBean->usuario','$objBean->usuario_id',"
               . "'$objBean->apellido_materno','$objBean->distrito_id');";
     
                 $rs=ejecutarConsulta($sql);
             }


       } catch (Exception $e) {  
         $rs="Falló la ejecuciòn";
       }     
     return  $rs;        
   }
   
   public function cambiarContra($nuevo_pass,$id){
       
       try {
           $sql="update usuario set password='$nuevo_pass' where usuario_id='$id';";
             $rspta= ejecutarConsulta($sql);

       } catch (Exception $ex) {
           $rspta=0;
       }      
           return $rspta;
   }
}
