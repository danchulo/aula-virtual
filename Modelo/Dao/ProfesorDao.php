<?php
require_once "../Util/ConexionBD.php";
require_once "../Util/Querys.php";   
require_once "../Modelo/Bean/ProfesorBean.php";   
$objc = new ConexionBD();
$conection=$objc->getConexionBD(); 

class ProfesorDao
{     
 
      // INICIO DE FUNCIONES PARA EL SUB-MENU CLASES EN CURSO
    
   public  function listarClaseAño($id)
   {  
       try {
      
           $sql="call SP_mi_clase_anio_profe('$id');";
           $rs=ejecutarConsulta($sql);
             
           $LISTA['AÑO']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['AÑO'], 
             array('NOMBRE_AÑO'=>$fila['fecha'],'CODIGO'=>$fila['anio_escolar_id']));   
           }   
      
       } catch (Exception $e) {                 
       }     
     return  $LISTA;       
       
       
   }
   
   
    public  function ListarMiClase($id,$anio)
   {  try {
      $objc = new ConexionBD();
      $cn=$objc->getConexionBD();   
       $obt="call SP_mi_clase_profe ('$id','$anio');";
      
       $rs= mysqli_query($cn,$obt);

           $LISTA['MICLASE']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['MICLASE'], 
             array('CODIGO'=>$fila['clase_id'],'ESTUDIANTES'=>$fila['estudiantes'],'CLASE'=>$fila['clase']));   
           }   
      
       } catch (Exception $e) {                 
       }     
     return  $LISTA;       

   }
   
   // FIN DE FUNCIONES PARA EL SUB-MENU CLASES EN CURSO
   
   
   
   // INICIO DE FUNCIONES PARA EL MENU CURSOS QUE DICTO
   
    public  function ListarMisCursos($profe_id,$clase_id)
   {  try {
      
           $sql="call SP_mis_cursos_profe ('$profe_id','$clase_id')";
           $rs=ejecutarConsulta($sql);
            
           $LISTA['CURSOS']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['CURSOS'], 
             array('PROFE_CLASEID'=>$fila['profesor_clase_curso_id'],'CURSO'=>$fila['curso']));   
           }   
      
       } catch (Exception $e) {                 
       }     
     return  $LISTA;       
   }
   
   // FIN DE FUNCIONES PARA EL MENU CURSOS QUE DICTO
   
   
    public  function ListarMisEstudiantes($clase_id)
   {  
        try {
     
           $sql="call SP_mis_estudiantes ('$clase_id')";
           $rs=ejecutarConsulta($sql);
            
           $LISTA['ESTUDIANTES']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['ESTUDIANTES'], 
             array('CODIGO_E'=>$fila['estudiante_id'],'APELLIDOS'=>$fila['apellidos'],'NOMBRES'=>$fila['nombres'],'FOTO'=>$fila['foto']));   
           }   
      
       } catch (Exception $e) {                 
       }     
     return  $LISTA;       
  
   }
   
     // INICIO DE FUNCIONES PARA EL MENU INFORMACION
   
    public  function infoCurso($profe_id,$profe_clase_id)
   {  
        try {
    
           $sql="  call SP_info_curso_profe('$profe_id','$profe_clase_id')";
            $rs=ejecutarConsulta($sql);
            
           $LISTA['MICURSO']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['MICURSO'], 
             array('PROFE_CLASEID'=>$fila['profesor_clase_curso_id'],'GRADO'=>$fila['grado'],'SECCION'=>$fila['seccion_nombre'],'NIVEL'=>$fila['nivel_nombre'],
                 'AREA'=>$fila['area_nombre'],'CURSO'=>$fila['curso'],'CURSOCOD'=>$fila['curso_codigo'],'PERIODO'=>$fila['periodo']
                 ,'DIA'=>$fila['dia'],'SALON'=>$fila['salon_nombre'],'HORAS'=>$fila['horas']));   
           
           }   
      
       } catch (Exception $e) {                 
       }     
     return  $LISTA;       
       
       
   }
   
   // FIN DE FUNCIONES PARA EL MENU INFORMACION
   
   
   
   // INICIO DE FUNCIONES PARA EL MENU ASISTENCIA
   
      public  function asistencias($profe_clase_id)
   {  
        try {
    
           $sql="call  SP_listar_asistencias('$profe_clase_id');";
            $rs=ejecutarConsulta($sql);
            
            $LISTA['LISTAA']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['LISTAA'], 
             array('PROFE_CLASEID'=>$fila['profesor_clase_curso_id'],'ASISTENCIA_ID'=>$fila['asistencia_id'],'FECHA'=>$fila['fecha']));   
           }   
      
       } catch (Exception $e) {                 
       }     
     return  $LISTA;       
       
       
   }
   
     public  function mostrar($profe_clase_id)
   {  
        try {
    
           $sql="call  SP_mostrar('$profe_clase_id')";
            $rs= mysqli_query( $GLOBALS["conection"],$sql);
            
            $LISTA= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
           $LISTA[]=$fila;
           }   
      
        } catch (Exception $e) {                 
          }     
     return  $LISTA;       
       
       
   }
   
      public  function verAsistenciaEstu($profe_clase_id,$asistencia_id)
   {  
        try {
    
           $sql="call SP_ver_asistencias_mis_estu('$profe_clase_id','$asistencia_id')";
            
            $rs=ejecutarConsulta($sql);
           $LISTA['LISTAAE']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['LISTAAE'], 
             array('ASISTENCIA_ID'=>$fila['asistencia_id'],'FECHA'=>$fila['fecha'],'TIPOF'=>$fila['tipoF'],'TIPOT'=>$fila['tipoT'],'TIPOA'=>$fila['tipoA'],'TIPO'=>$fila['tipo'],'ESTUID'=>$fila['estudiante_id']
                     ,'N_COMPLETO'=>$fila['ape_nom'],'MOSTRAR'=>$fila['mostrar']));   
           }   
      
         
           
       } catch (Exception $e) {                 
       }     
     return  $LISTA;       
   }
   
   public  function verAsistenciaTema($profe_clase_id,$asistencia_id)
   {  
        try {
          $objc = new ConexionBD();
           $cn=$objc->getConexionBD(); 
           $sql="call SP_asistencias_temas('$profe_clase_id','$asistencia_id')";
           $rs= mysqli_query($cn,$sql);
           
           $LISTA['LISTAAT']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['LISTAAT'], 
             array('TEMA'=>$fila['nombre_tema'],'UNIDAD'=>$fila['nombre_unidad_tema'],'TEMA_ID'=>$fila['tema_id']));   
           }   
        mysqli_close($conection);
       } catch (Exception $e) {                 
       }     
     return  $LISTA;       
   }
   
    public  function nuevaAsistenciaEstu($profe_clase_id)
   {  
        try {
    
           $sql="call SP_nueva_asistencias_estu('$profe_clase_id')";
           $rs= mysqli_query( $GLOBALS["conection"],$sql);
            
           $LISTA['LISTAEA']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['LISTAEA'], 
             array('ESTUDIANTE_ID'=>$fila['estudiante_id'],'N_COMPLETO'=>$fila['ape_nom'],'FECHA'=>$fila['fecha']));   
           }   
      
           
       } catch (Exception $e) {                 
       }     
     return  $LISTA;       

   }
   
   
     public  function listarTema($profe_clase_id)
   {  
        try {
           $objc = new ConexionBD();
           $cn=$objc->getConexionBD(); 
           $sql="call SP_listar_tema('$profe_clase_id')";
           $rs= mysqli_query($cn,$sql);
            
           $LISTA['TEMAS']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['TEMAS'], 
             array('TEMA_ID'=>$fila['tema_id'],'TEMA'=>$fila['nombre_tema'],'UNIDAD'=>$fila['nombre_unidad_tema']));   
           }   
    
       } catch (Exception $e) {                 
       }     
     return  $LISTA;       
       
       
   }
   
   
   
     public  function guardarAsistencia($profe_clase_id,$estudiante_id,$letra,$tema_id,$fecha)
   {  
         
         $estado='0';
        try {
               $objc = new ConexionBD();
      $cn=$objc->getConexionBD(); 
     
      $verificacion="select * from asistencia where fecha='$fecha' and profesor_clase_curso_id='$profe_clase_id'";
      $result= mysqli_query($cn,$verificacion);//Verficación para saber si el id existe y asi poder insertar con seguridad
      $count = mysqli_num_rows($result);
      
       if($count>0){  
       $estado='2';
       }
       
       else{

      $sql="insert into asistencia  values (null,'$profe_clase_id','$fecha')";
      $asistencia_id=ejecutarConsulta_retornarID($sql);

          
    $num_elementos=0;       
      while ($num_elementos< count($estudiante_id) ){
            $sql2="insert into asistencia_estudiante (asistencia_id,estudiante_id,tipo) values ('$asistencia_id','$estudiante_id[$num_elementos]','$letra[$num_elementos]')";
             $rsE= mysqli_query($cn,$sql2);
             $num_elementos++;
      }
      
      $can=0;
      while($can< count($tema_id)){ 
      $sql1="insert into asistencia_tema (asistencia_id,tema_id) values ('$asistencia_id','$tema_id[$can]')";
      $rsT= mysqli_query($cn,$sql1);
      $can++;
      
         }  
     
              if($rsE==1 and $rsT==1){
                 $estado='1';
              }
          
       }
      
       } catch (Exception $e) {        
           
       }     
     return  $estado;       
       
   }
   
   
   
     public  function editarAsistencia($asistencia_id,$estudiante_id,$letra)
   {  
        try {
   
            $sql="call SP_editar_asistencia('$letra','$asistencia_id','$estudiante_id');";
            
            ejecutarConsulta($sql);
           

       } catch (Exception $e) { 
 
       }     

   }
   
   public  function eliminarAsistencia($asistencia_id)
   {  
         
        try {

      $sql="call SP_eliminar_asistencias('$asistencia_id')";
      $rs=ejecutarConsulta($sql);
  
      $estado=$rs;

       } catch (Exception $e) {                 
       }     
     return  $estado;       
       
   }
   
   
      public  function GenerarCodigo($id,$tabla)
   {  
         
        try {
             
      $sql="select max($id)+1 as id from $tabla";
      $rs= mysqli_query( $GLOBALS["conection"],$sql);
      
      $objeto = $rs->fetch_object();
      $codigo=$objeto->id;
       
       } catch (Exception $e) {                 
       }     
     return  $codigo;       
       
   }
   
   
    public  function accionTema($tema_id,$asistencia_id,$accion)
   {
        
        try {
               
      if($accion=='delete'){
          $sql="$accion from asistencia_tema where tema_id='$tema_id'";
       }

      else if($accion=='insert'){
          $sql="$accion into asistencia_tema values ('$asistencia_id','$tema_id')";
       }
      
        $rs=ejecutarConsulta($sql); 
        $estado=$rs;
       
       } catch (Exception $e) {  
           $estado=0;
       }     
       return $estado;
   }
   
   public  function accionArea($area_id,$profe_id,$accion)
   {
    try {        
      if($accion=='delete'){
         $sql="$accion from profesor_area where area_id='$area_id' and profesor_id='$profe_id'";
      }else if($accion=='insert'){
         $sql="$accion into profesor_area values (null,'$profe_id','$area_id')";
      }
      $estado=ejecutarConsulta($sql); 
    }catch (Exception $e) {  
           $estado=0;
    }     
    return $estado;
   }
   // FIN DE FUNCIONES PARA EL MENU ASISTENCIA
   
   
   // INICIO DE FUNCIONES PARA EL MENU CALIFICACIONES   
     public  function listarAlumnosNotas($profe_clase_id,$trimestre_id)
   {  
        try {
    
           $sql="call SP_listar_alumnos_notas('$profe_clase_id','$trimestre_id')";
           $rs= mysqli_query( $GLOBALS["conection"],$sql);
            
           $LISTA['LISTA_NOTAS_E']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['LISTA_NOTAS_E'], 
             array('ESTU_ID'=>$fila['estudiante_id'],'N_COMPLETO'=>$fila['ape_nom'],'TRIMESTRE_ID'=>$fila['trimestre_escolar_id'],
                 'TRIMESTRE'=>$fila['nombre_trimestre_escolar'],
                 'F_LIMITE'=>$fila['fecha_fin'],'MOSTRAR'=>$fila['mostrar'],'NOTA_1'=>$fila['n1'],'NOTA_2'=>$fila['n2'],'NOTA_T'=>$fila['nt'],
                 'NOTA_L'=>$fila['nl'],'NOTA_C'=>$fila['nc'],'NOTA_A'=>$fila['na'],'PONDERADO'=>$fila['p']));   
           }   
      
       } catch (Exception $e) {                 
       }     
     return  $LISTA;       

   }
 

    public  function guardarNotas($profe_clase_id,$trimestre_id,$estudiante_id,$n1,$n2,$nt,$nc,$nl,$na)
   {  
         
     try {
      $num=0;       
      while ($num< count($estudiante_id)) {
          if($n1[$num]>20 || $n2[$num]>20 || $nt[$num] >20 || $nc[$num]>20 || $nl[$num]>20 || $na[$num]>20){
                 $estado="La nota máxima es 20";
                 break;
          }
          else{
               $sp="call SP_registrar_notas('".$trimestre_id."','".$profe_clase_id."','".$estudiante_id[$num]."',"
            . "'".$n1[$num]."','".$n2[$num]."','".$nt[$num]."','".$nc[$num]."','".$nl[$num]."','".$na[$num]."')";
          $estado=ejecutarConsulta($sp);
          $num++;
       
          }
          
      }

       } catch (Exception $e) {  
           $estado=0;
       }     
     return  $estado;       
       
   }
   
  public  function guardarProfe(ProfesorBean $objBean)
   {  try {
         $rs=0;
         $cel=$objBean->numero_cel;
       $tel=$objBean->numero_tel;
      $query="select * from persona p inner join usuario u on p.persona_id=u.usuario_id;";
            $rst=ejecutarConsulta($query);
             while ($fila=  mysqli_fetch_assoc($rst))
           {
             if($fila['dni']==$objBean->dni ){
                 $rs="El dni ya existe";
                 @$x=2;
             }
             if($cel!=""){
             if($fila['numero_cel']==$objBean->numero_cel){
                  $rs="El número de celular ya existe";
                  @$x=2;
            }}
           
           }
             
           if(@$x!=2){
               
                $insert_profe=" insert into profesor (profesor_id,estado) values(null,'A');";
                 $id=ejecutarConsulta_retornarID($insert_profe);
                 
               $area_id=$objBean->area_id;
                $sql="call SP_registro_profesor('$objBean->nombres','$objBean->apellido_paterno','$objBean->dni',"
               . "'$objBean->direccion','$cel','$tel','$objBean->fecha_nac',"
               . "'$objBean->foto','$objBean->sexo','$objBean->apellido_materno','$id','$objBean->distrito_id');";
                ejecutarConsulta($sql);
                
               $cant=0;
               while($cant<count($area_id)){
                   $sql1="insert into profesor_area values(null,'$id','$area_id[$cant]]')";
                   $rs=ejecutarConsulta($sql1);
               
                   $cant++;
               }

             }
      

       } catch (Exception $e) {  
         $rs=0;
       }     
     return  $rs;        
   }
   
   public  function editarProfe(ProfesorBean $objBean)
   {  try {
      
       $rs=0;
         $cel=$objBean->numero_cel;
      $query="select * from persona p inner join usuario u on p.persona_id=u.usuario_id where persona_id!='$objBean->profesor_id';";
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
             if($fila['numero_cel']==$objBean->numero_cel){
                  $rs="El número de celular ya existe";
                  @$x=2;
            }}
            
           }
             
           if(@$x!=2){
                 $sql="call SP_editar_profesor('$objBean->nombres','$objBean->apellido_paterno','$objBean->dni',"
               . "'$objBean->direccion','$cel','$objBean->numero_tel','$objBean->fecha_nac',"
               . "'$objBean->foto','$objBean->sexo','$objBean->usuario',"
                         . "'$objBean->profesor_id','$objBean->apellido_materno','$objBean->distrito_id');";
     
                 $rs=ejecutarConsulta($sql);
             }


       } catch (Exception $e) {  
         $rs="";
       }     
     return  $rs;        
   }
   
   public  function listarAsignaciones()
   {  try {
      
       $sql="select * from asignaciones_profesores;";
       $rs=ejecutarConsulta($sql);

       $LISTA['ASIGNA']=array();
       while ($fila= mysqli_fetch_assoc($rs)){
           array_push($LISTA['ASIGNA'], 
       array('CLASE_ID'=>$fila['clase_id'],'CLASE'=>$fila['clase'],'PROFESOR'=>$fila['profesor'],
               'PROFE_CLASE_ID'=>$fila['profesor_clase_id'], 'T'=>$fila['turno_nombre'],'PROFE_ID'=>$fila['profesor_id']));
       }
       
       } catch (Exception $e) {  
         $LISTA=null;
       }     
     return   $LISTA;        
  }
  
  public  function buscarProfesor($entrada)
   {  try {

       $sql="select * from buscar_profesor where encontrar like '%$entrada%';";
       $rs=ejecutarConsulta($sql);
  
       $LISTA['PROFE']=array();
       while ($fila= mysqli_fetch_assoc($rs)){
           array_push($LISTA['PROFE'], array('PROFE_ID'=>$fila['persona_id'],'FOTO'=>$fila['foto'],'PROFESOR'=>$fila['profesor']
                   ,'DNI'=>$fila['dni']));
       }
       
       } catch (Exception $e) {  
         $LISTA=null;
       }     
     return   $LISTA;        
   }
   
   public  function profeAreas($id)
   {  try {
$objc = new ConexionBD();
           $cn=$objc->getConexionBD(); 
        
       $sql="select a.area_id,a.area_nombre from area a inner join profesor_area pa on a.area_id=pa.area_id where pa.profesor_id='$id';";
           $rs= mysqli_query($cn,$sql);  
  
       $LISTA=array();
       while ($fila= mysqli_fetch_assoc($rs)){
       $LISTA[]=$fila;
       }
       
       } catch (Exception $e) {  
         $LISTA=null;
       }     
     return   $LISTA;        
   }
   
      public  function profeAreas2($id)
   {  try {
$objc = new ConexionBD();
           $cn=$objc->getConexionBD(); 
        
       $sql="select a.area_id from area a inner join profesor_area pa on a.area_id=pa.area_id where pa.profesor_id='$id';";
           $rs= mysqli_query($cn,$sql);  
       $LISTA=array();
       $cant=0;
        while ($fila= mysqli_fetch_assoc($rs)){
      
           $LISTA[$cant]=$fila['area_id'];
       
       $cant++;
       }

       } catch (Exception $e) {  
         $LISTA=null;
       }     
     return   $LISTA;        
   }
   
    public  function profeCursos($id)
   {  try {
$objc = new ConexionBD();
           $cn=$objc->getConexionBD(); 
        
       $sql="select c.curso_id from curso c inner join profesor_clase_curso pcc on c.curso_id=pcc.curso_id inner join profesor_clase pc on pcc.profesor_clase_id=pc.profesor_clase_id where pc.profesor_clase_id='$id';";
       $rs= mysqli_query($cn,$sql);  
       $LISTA=array();
        while ($fila= mysqli_fetch_assoc($rs)){
     
           $LISTA[]=$fila;
      
       }

       } catch (Exception $e) {  
         $LISTA=null;
       }     
     return   $LISTA;        
   }
   
    public  function traerProfesor($id)
   {  try {

  $objc = new ConexionBD();
           $cn=$objc->getConexionBD(); 
         $area=array(); 
           $sql1="select a.area_id,a.area_nombre from area a inner join profesor_area pa on a.area_id=pa.area_id where pa.profesor_id='$id';";
           $rs1= mysqli_query($cn,$sql1);
           while ($row= mysqli_fetch_assoc($rs1)){
          
               $area[]=$row;
       }
          
       $sql="select * from lista_profesores_completa where persona_id='$id';";
           $rs= mysqli_query($cn,$sql);
          
           
       $LISTA['PROFE']=array();
       while ($fila= mysqli_fetch_assoc($rs)){
           array_push($LISTA['PROFE'], array('PROFE_ID'=>$fila['persona_id'],'FOTO'=>$fila['foto'],'PROFESOR'=>$fila['profesor'],'AREA'=>$area
                   ,'DNI'=>$fila['dni']));
       }
       
       } catch (Exception $e) {  
         $LISTA=null;
       }     
     return   $LISTA;        
   }
   
   public  function consultarCursos($clase_id,$area_id,$profe_Clase_id)
   {  try {
       $obt="select grado_id,nivel_id from clase where clase_id='$clase_id';";
      $objc = new ConexionBD();
      $cn=$objc->getConexionBD();   
       $obt2= mysqli_query($cn,$obt);
       $objeto = $obt2->fetch_object();
       $grado_id=$objeto->grado_id;
       $nivel_id=$objeto->nivel_id;
       $cant=0;
       while($cant<count($area_id)){
           $id=$area_id[$cant]['area_id'];
       $sql="call SP_nuevo_curso_asignacion('$grado_id','$nivel_id','$id','$profe_Clase_id');";
       $rs=mysqli_query($cn,$sql);
  
       $LISTA['CURSO']=array();
       while ($fila= mysqli_fetch_assoc($rs)){
           array_push($LISTA['CURSO'], array('CURSO_ID'=>$fila['curso_id'],'CURSO'=>$fila['curso']));
       }
       $cant++;
       }
       } catch (Exception $e) {  
         $LISTA=null;
       }     
     return   $LISTA;        
   }
   
//    public  function cursosFiltrado($clase_id,$area_id,$profe_Clase_id)
//   {  try {
//       $obt="select grado_id,nivel_id from clase where clase_id='$clase_id';";
//      $objc = new ConexionBD();
//      $cn=$objc->getConexionBD();   
//       $obt2= mysqli_query($cn,$obt);
//       $objeto = $obt2->fetch_object();
//       $grado_id=$objeto->grado_id;
//       $nivel_id=$objeto->nivel_id;
//       $cant=0;
//       while($cant<count($area_id)){
//           $id=$area_id[$cant]['area_id'];
//       $sql="call SP_nuevo_curso_asignacion('$grado_id','$nivel_id','$id','$profe_Clase_id');";
//       $rs=mysqli_query($cn,$sql);
//  
//       $LISTA['CURSO']=array();
//       while ($fila= mysqli_fetch_assoc($rs)){
//           array_push($LISTA['CURSO'], array('CURSO_ID'=>$fila['curso_id'],'CURSO'=>$fila['curso']));
//       }
//       $cant++;
//       }
//       } catch (Exception $e) {  
//         $LISTA=null;
//       }     
//     return   $LISTA;        
//   }
   
   public  function guardarAsignacion($profe_id,$clase_id)
   {  
         
        try 
       {
             $query="select * from profesor_clase where clase_id='$clase_id' and profesor_id='$profe_id';";
             $existe=existencia($query);

             if($existe==0){  
                 $sql="insert into profesor_clase (profesor_id,clase_id)  values ('$profe_id','$clase_id')";
                 $rspta=ejecutarConsulta($sql);
             }else if($existe==2){
                 $rspta="La clase ya ha sido asignada al profesor";
              }

       }catch (Exception $e) {        
           $rspta=0;
       }     
     return  $rspta;       
       
   }
   
   
   public  function guardarHoraNuevo($profe_id,$profe_clase_id,$curso_id,$hora_id,$clase_id)
   {  
         
        try {
                   
  $objc = new ConexionBD();
           $cn=$objc->getConexionBD(); 
        
        $cant=0;
        while($cant< count($hora_id)){ 
            
          $query="select concat('<br>El horario de: ',hora_de,' hasta: ',hora_a,' en el día ',dia,' "
                . "ya se encuentra registrado al profesor.<br>----------------------------------------------------------------------') as rs from profesor_clase_curso "
                . "pcc inner join profesor_clase pc on pcc.profesor_clase_id=pc.profesor_clase_id "
                . "inner join horario_profesor_clase h on pcc.profesor_clase_curso_id=h.profesor_clase_curso_id "
                . "inner join horario ho on h.horario_id=ho.horario_id and pc.profesor_id='$profe_id' "
                . "and h.horario_id='$hora_id[$cant]';";
          
           $consulta= mysqli_query($cn, $query);
           
           $rspta[]=array();
             while ($fila=  mysqli_fetch_array($consulta)){
                          $rspta[]=$fila;               
               }
         $existe=existencia($query);
         $cant++;
        }

       if(!$existe){  
        
      $sql1="insert into profesor_clase_curso (profesor_clase_id,curso_id) values ('$profe_clase_id','$curso_id')";
      $profe_clase_curso_id= ejecutarConsulta_retornarID($sql1);
      
      $call="call SP_registro_cursos_nota_profe('$clase_id','$profe_clase_curso_id');";
     mysqli_query($cn, $call);
       $count=0;
       while($count< count($hora_id)){ 
    $sql2="insert into horario_profesor_clase (profesor_clase_curso_id,horario_id) values ('$profe_clase_curso_id','$hora_id[$count]')";
     $rspta=ejecutarConsulta($sql2);
     
      $count++;
    } 
       }
  
       
        
       }catch (Exception $e) {        
           $estado=0;
       }     
     return  $rspta;       
       
   }
   
     public  function guardarHoraHabido($profe_id,$profesor_clase_curso_id,$hora_id)
   {  
         
        try {
           
        $cant=0;
        while($cant< count($hora_id)){ 
            
          $query="select concat('<br>El horario de: ',hora_de,' hasta: ',hora_a,' en el día ',dia,' "
                . "ya se encuentra registrado al profesor.<br>----------------------------------------------------------------------') as rs from profesor_clase_curso "
                . "pcc inner join profesor_clase pc on pcc.profesor_clase_id=pc.profesor_clase_id "
                . "inner join horario_profesor_clase h on pcc.profesor_clase_curso_id=h.profesor_clase_curso_id "
                . "inner join horario ho on h.horario_id=ho.horario_id and pc.profesor_id='$profe_id' "
                . "and h.horario_id='$hora_id[$cant]';";
          
           $consulta= ejecutarConsulta($query);
           
           $rspta[]=array();
             while ($fila=  mysqli_fetch_array($consulta)){
                          $rspta[]=$fila;               
               }
         $existe=existencia($query);
         $cant++;
        }

       if(!$existe){  
    
       $count=0;
       while($count< count($hora_id)){ 
    $sql2="insert into horario_profesor_clase (profesor_clase_curso_id,horario_id) values ('$profesor_clase_curso_id','$hora_id[$count]')";
     $rspta=ejecutarConsulta($sql2);
     
      $count++;
    } 
       }
  
       
        
       }catch (Exception $e) {        
           $estado=0;
       }     
     return  $rspta;       
       
   }
   
   
   public  function listarHorario($profe_id,$anio_id,$tipo)
   {  try {
     
       $sql="call SP_mi_horario_profe('$profe_id','$anio_id','$tipo');";
       $rs=ejecutarConsulta($sql);
  
       $LISTA['HORARIO']=array();
       while ($fila= mysqli_fetch_assoc($rs)){
           array_push($LISTA['HORARIO'], array('DIA'=>$fila['dia'],'DE'=>$fila['hora_de'],'A'=>$fila['hora_a'],'CURSO'=>$fila['curso']));
       }
       
       } catch (Exception $e) {  
         $LISTA=null;
       }     
     return   $LISTA;        
   }
   
   
   public  function cantidadProfesor()
   {  try {
     
       $sql="select count(*) as cantidad from usuario where estado='A' and tipo_usuario_id='2';";
       $rs=ejecutarConsulta($sql);
      $fila=  mysqli_fetch_assoc($rs);
       $cantidad=$fila['cantidad'];
       
       } catch (Exception $e) {  
         $cantidad=null;
       }     
     return   $cantidad;        
   }
   
   public  function cantidadProfeAsignado($añoid)
   {  try {

       $sql="select count(DISTINCT pc.profesor_id) as cantidad from profesor_clase pc inner join clase c on pc.clase_id=c.clase_id where anio_escolar_id='$añoid' ;";
       $rs=ejecutarConsulta($sql);
      $fila=  mysqli_fetch_assoc($rs);
       $cantidad=$fila['cantidad'];
       
       } catch (Exception $e) {  
         $cantidad=null;
       }     
     return   $cantidad;        
   }
   
   
   public  function listarProfesores()
   {  
        try {
            
            
  $objc = new ConexionBD();
           $cn=$objc->getConexionBD(); 
        
            
           $sql="select * from lista_profesores_completa;";
           $rs=ejecutarConsulta($sql);
            
           $LISTA['LISTA']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
               $profe_id=$fila['persona_id'];
                $area=array(); 
           $sql1="select pa.area_id,area_nombre from profesor_area pa inner join area a on pa.area_id=a.area_id where profesor_id='$profe_id';";
           $rs1= mysqli_query($cn,$sql1);
           while ($row= mysqli_fetch_assoc($rs1)){
          
               $area[]=$row;
       }
               
             array_push($LISTA['LISTA'], 
             array('PROFESOR'=>$fila['profesor'],'FOTO'=>$fila['foto'],'USUARIO'=>$fila['usuario'],'CODIGO'=>$fila['persona_id'],
                   'SEXO'=>$fila['sexo'], 'EMAIL'=>$fila['email'],'DNI'=>$fila['dni'],'DIRECCION'=>$fila['direccion'],
                   'CEL'=>$fila['numero_cel'],'TEL'=>$fila['numero_tel'],'EDAD'=>$fila['edad'],
                   'DIRECCION'=>$fila['direccion'],'AREA'=>$area,'ESTADO'=>$fila['estado']));      
           }   
    
       } catch (Exception $e) {                 
       }     
     return  $LISTA;       
   }
   
   public  function eliminarHorario($id)
   {  
        try {
           $sql="delete from horario_profesor_clase where horario_profesor_clase_id='$id';";
           mysqli_query( $GLOBALS["conection"],$sql);
       } catch (Exception $e) {                 
       }     
   }
   
   public  function eliminarCursoProfe($id)
   {  
        try {
           $sql="call SP_eliminar_curso_profe('$id');";
           mysqli_query( $GLOBALS["conection"],$sql);
       } catch (Exception $e) {                 
       }     
   }
   
   public  function eliminarClaseProfe($id)
   {  
        try {
           $sql="call SP_eliminar_clase_profe('$id');";
           ejecutarConsulta($sql);
       } catch (Exception $e) {                 
       }     
   }
   
   public  function listarProfeCursos($id)
   {  
        try {
           $sql="select curso,lc.curso_id,pcc.profesor_clase_curso_id from lista_cursos lc inner join profesor_clase_curso pcc on lc.curso_id=pcc.curso_id inner join profesor_clase pc on pcc.profesor_clase_id=pc.profesor_clase_id where pc.profesor_clase_id='$id';";
      
      $rs= mysqli_query( $GLOBALS["conection"],$sql);
            
           $LISTA['LISTA']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['LISTA'], 
             array('COD_CURSO'=>$fila['curso_id'],'COD_PROFE_CURSO'=>$fila['profesor_clase_curso_id'],
                 'CURSO'=>$fila['curso']));      
           }   
    
       } catch (Exception $e) {                 
       }     
     return  $LISTA;       

   }
   
   public  function accion($tipo,$profe_id)
   {  
        try {

           
           if($tipo=="e"){
                $sql="call SP_eliminar_profe('$profe_id');";
                ejecutarConsulta($sql);
             }
             
             else if($tipo=="b"){
                         
           $objc = new ConexionBD();
           $cn=$objc->getConexionBD(); 
        
           $sql="select * from persona p inner join usuario u on p.persona_id=u.usuario_id inner
                      join profesor pr on p.persona_id=pr.profesor_id join distrito d on p.distrito_id=d.distrito_id  where persona_id='$profe_id';";

             $rs= ejecutarConsulta($sql);
             $LISTA['LISTA']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
                 $area=array(); 
           $sql1="select pa.area_id,area_nombre from profesor_area pa inner join area a on pa.area_id=a.area_id where profesor_id='$profe_id';";
           $rs1= mysqli_query($cn,$sql1);
           while ($row= mysqli_fetch_assoc($rs1)){
          
               $area[]=$row;
                 }
                 
             array_push($LISTA['LISTA'], 
             array('CODIGO'=>$fila['persona_id'],'NOMBRES'=>$fila['nombres'],'APA'=>$fila['apellido_paterno'],
                   'AMA'=>$fila['apellido_materno'],'SEXO'=>$fila['Sexo'], 'EMAIL'=>$fila['email'],'DNI'=>$fila['dni'],'DIRECCION'=>$fila['direccion'],
                   'CEL'=>$fila['numero_cel'],'TEL'=>$fila['numero_tel'],'FECH_NAC'=>$fila['fecha_nac']
                    ,'AREA'=>$area,'FOTO'=>$fila['foto'] ,'DISTRITO'=>$fila['distrito_nombre'],'DISTRI_ID'=>$fila['distrito_id']
                 ,'USU'=>$fila['usuario']));      
             }   
             }
           
    
       } catch (Exception $e) {                 
       }     
     return  $LISTA;       

   }
   
   public  function infoTemas($id)
   {  
      try {
             $objc = new ConexionBD();
           $cn=$objc->getConexionBD(); 
        
       
 $sql="select nombre_unidad_tema,unidad_tematica_id from unidad_tematica;";
             $rs= mysqli_query($cn,$sql);
             $LISTA['TEMAS']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
               $uni_id=$fila['unidad_tematica_id'];
                 $tema=array(); 
                    $sql1="select nombre_tema from tema t inner join curso c on t.curso_id=c.curso_id inner join unidad_tematica u on t.unidad_tematica_id=u.unidad_tematica_id inner join profesor_clase_curso pcc on c.curso_id=pcc.curso_id where profesor_clase_curso_id='$id' and t.unidad_tematica_id='$uni_id';";
           $rs1= mysqli_query($cn,$sql1);
           while ($row= mysqli_fetch_assoc($rs1)){
          
               $tema[]=$row;
                 }

             array_push($LISTA['TEMAS'], 
             array('UNIDAD'=>$fila['nombre_unidad_tema']
                   ,'TEMA'=>$tema));   
           } 
    
   }
        catch (Exception $e) {                 
       }     
             
     return  $LISTA;       

   }
    public function filtrarCursos($listaCursos,$listaAreas,$clase_id){
        try {
            $objc = new ConexionBD();
      $cn=$objc->getConexionBD();   
       $obt="select grado_id,nivel_id from clase where clase_id='$clase_id';";
      
       $obt2= mysqli_query($cn,$obt);
       $objeto = $obt2->fetch_object();
       $grado_id=$objeto->grado_id;
       $nivel_id=$objeto->nivel_id;
      
       
       $count=count($listaCursos);
       if($count==0){
           $cant=0;
           while($cant<count($listaCursos)+1){
           
      $converArea= implode(",",$listaAreas);
          $curso_id=$listaCursos[$cant]['curso_id'];
                $sql="select c.curso_id,curso from lista_cursos c
                WHERE  nivel_id='$nivel_id' and grado_id='$grado_id' and area_id in ($converArea)  and curso_id!=(if ('$curso_id' is null,'','$curso_id'));";
               $rs= mysqli_query($cn,$sql);
            
           $LISTA['CURSO']=array();
     while ($fila= mysqli_fetch_assoc($rs)){
           array_push($LISTA['CURSO'], array('CURSO_ID'=>$fila['curso_id'],'CURSO'=>$fila['curso']));
           }
           $cant++;
       }
       }else{
           $cant=0;
           while($cant<count($listaCursos)){
           
      $converArea= implode(",",$listaAreas);
          $curso_id=$listaCursos[$cant]['curso_id'];
                $sql="select c.curso_id,curso from lista_cursos c
                WHERE  nivel_id='$nivel_id' and grado_id='$grado_id' and area_id in ($converArea)  and curso_id!=(if ('$curso_id' is null,'','$curso_id'));";
               $rs= mysqli_query($cn,$sql);
            
           $LISTA['CURSO']=array();
     while ($fila= mysqli_fetch_assoc($rs)){
           array_push($LISTA['CURSO'], array('CURSO_ID'=>$fila['curso_id'],'CURSO'=>$fila['curso']));
           }
           $cant++;
       }
       }
       
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $LISTA;
    }
}
