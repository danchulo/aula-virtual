<?php
require_once "../Util/ConexionBD.php";  
require_once "../Util/Querys.php";   
require_once '../Modelo/Bean/EstudianteBean.php';
$objc = new ConexionBD();
$conection=$objc->getConexionBD(); 
class    EstudianteDao
{     
   
   public  function listarClaseAño($id)
   {  try {
       $objc = new ConexionBD();
      $cn=$objc->getConexionBD();   
           $sql="call SP_mi_clase_anio_estudiante('$id');";
           $rs= mysqli_query($cn,$sql);
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
    
    
    public  function ListarMiClase($id,$año)
   {  try {
          $objc = new ConexionBD();
      $cn=$objc->getConexionBD();   
      $sql="call sp_mi_clase_estudiante('$id','$año');";
      
       $rs= mysqli_query($cn,$sql);

           $LISTA['MICLASE']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['MICLASE'], 
             array('CODIGO'=>$fila['profesor_clase_id'],'CLASE'=>$fila['clase2'],'PROFE'=>$fila['profesor'],
                   'CURSOID'=>$fila['curso_id'],'FOTO'=>$fila['foto'],'CURSO'=>$fila['curso_nombre']));   
           }   
     
                 
       } catch (Exception $e) {                 
       }     
     return  $LISTA;       
       
       
   }
   
   public  function ListarInfoCurso($id,$id_curso)
   {  try {
      
           $sql="call SP_info_curso('$id','$id_curso');";
          $rs=ejecutarConsulta($sql);
           $LISTA['MICURSO']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['MICURSO'], 
             array('CURSOID'=>$fila['curso_id'],'GRADO'=>$fila['grado'],'SECCION'=>$fila['seccion_nombre'],'NIVEL'=>$fila['nivel_nombre'],
                 'AREA'=>$fila['area_nombre'],'PROFESOR'=>$fila['profesor'],'CURSO'=>$fila['curso_nombre'],'CURSOCOD'=>$fila['curso_codigo'],'PERIODO'=>$fila['periodo']
                 ,'DIA'=>$fila['dia'],'SALON'=>$fila['salon_nombre'],'HORAS'=>$fila['horas']));   
           
           }   
     
                 
       } catch (Exception $e) {                 
       }     
     return  $LISTA;        
   }
   
   
    public  function verMisNotas($id,$id_curso,$tri_id)
   {  try {
      
           $sql="call sp_ver_mis_notas('$id','$id_curso','$tri_id');";
         $rs=ejecutarConsulta($sql);
           $LISTA['MISNOTAS']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['MISNOTAS'], 
             array('TRIMESTRE'=>$fila['nombre_trimestre_escolar'],'F_LIMITE'=>$fila['fecha_fin'],'NOTA1'=>$fila['n1'],'NOTA2'=>$fila['n2'],
                 'NOTA_TRI'=>$fila['nt'],'NOTA_LIBRO'=>$fila['nl'],'NOTA_CUA'=>$fila['nc'],'NOTA_ACTITUD'=>$fila['na'],'PONDERADO'=>$fila['p']));   
           }   
  
       } catch (Exception $e) {                 
       }     
     return  $LISTA;       
       
       
   }
   
    public  function notasCursos($id,$tri_id)
   {  try {
      
           $sql="call SP_mis_notas_completa ('$id','$tri_id');";
         $rs=ejecutarConsulta($sql);
           $LISTA['MISNOTAS']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['MISNOTAS'], 
             array('TRIMESTRE'=>$fila['nombre_trimestre_escolar'],'CURSO'=>$fila['curso_nombre'],'E1'=>$fila['n1'],'E2'=>$fila['n2'],
                 'ET'=>$fila['nt'],'NL'=>$fila['nl'],'NC'=>$fila['nc'],'NA'=>$fila['na'],'P'=>$fila['p']));   
           }   
  
       } catch (Exception $e) {                 
       }     
     return  $LISTA;       
       
       
   }
   
    public  function verNotasEstu($id,$tri_id,$anio_id)
   {  try {
         $objc = new ConexionBD();
      $cn=$objc->getConexionBD();  
          $sql="call SP_ver_notas_completa_estu ('$id','$tri_id','$anio_id');";
          $rs= mysqli_query($cn,$sql);
        
           $LISTA['MISNOTAS']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['MISNOTAS'], 
             array('TRIMESTRE'=>$fila['nombre_trimestre_escolar'],'CURSO'=>$fila['curso_nombre'],'E1'=>$fila['n1'],'E2'=>$fila['n2'],
                 'ET'=>$fila['nt'],'NL'=>$fila['nl'],'NC'=>$fila['nc'],'NA'=>$fila['na'],'P'=>$fila['p']));   
           }   
  
       } catch (Exception $e) {                 
       }     
     return  $LISTA;       
       
       
   }
  
     public  function AsistenciaCurso($id,$id_curso)
   {  try {
      $objc = new ConexionBD();
           $cn=$objc->getConexionBD(); 
        
           $sql="call SP_mis_asistencias_estu2('$id');";
          $rs= mysqli_query($cn,$sql);
           $LISTA['ASISTENCIA']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
           $estu_id= $fila['estudiante_id'];
           $asis_id= $fila['asistencia_id'];
                $tema=array(); 
           $sq="SELECT DISTINCT ast.tema_id,ae.tipo,nombre_unidad_tema,nombre_tema FROM asistencia a 
 join asistencia_tema ast on a.asistencia_id=ast.asistencia_id
  join asistencia_estudiante ae on a.asistencia_id=ae.asistencia_id
 JOIN tema t  ON t.tema_id = ast.tema_id
 JOIN unidad_tematica ut  ON ut.unidad_tematica_id = t.unidad_tematica_id
       
                 
                  where a.asistencia_id='$asis_id' and ae.estudiante_id='$estu_id' order by a.asistencia_id ;";
        
           $rs2= ejecutarConsulta($sq);
           while ($row= mysqli_fetch_assoc($rs2)){
          
               $tema[]=$row;
                 }
                 
             array_push($LISTA['ASISTENCIA'], 
             array('TIPO'=>$fila['tipo'],
                 'FECHA'=>$fila['fecha'],
                 'TEMA'=>$tema));   
           
           }   
 
                 
       } catch (Exception $e) {                 
       }     
     return  $LISTA;       
       
   }
   
   public  function listarEstu()
   {  try {
      
           $sql="select * from lista_estudiantes_completa order by persona_id desc;";
           $rs=ejecutarConsulta($sql);
           $LISTA['ESTU']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['ESTU'], 
             array('CODIGO'=>$fila['persona_id'],'FOTO'=>$fila['foto'],'ESTUDIANTE'=>$fila['estudiante'],'USUARIO'=>$fila['usuario'],'ESTADO'=>$fila['estado'],
                   'CEL'=>$fila['numero_cel'],'TEL'=>$fila['numero_tel'],'EMAIL'=>$fila['email'],'DISTRITO'=>$fila['distrito'],
                 'DIRECCION'=>$fila['direccion'],'DNI'=>$fila['dni'],'SEXO'=>$fila['sexo'],'EDAD'=>$fila['edad']));   
           }   
           
       } catch (Exception $e) {                 
       }     
     return  $LISTA;        
   }
   
   public  function buscarEstu($estu_id)
   {  try {
      
           $sql="select * from lista_estudiantes_completa where persona_id='$estu_id';";
           $rs=ejecutarConsulta($sql);
           $LISTA['ESTU']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['ESTU'], 
             array('ESTUDIANTE'=>$fila['estudiante'],'FOTO'=>$fila['foto'],
                   'SEXO'=>$fila['sexo'], 'EMAIL'=>$fila['email'],'DNI'=>$fila['dni'],'DIRECCION'=>$fila['direccion'],
                   'CEL'=>$fila['numero_cel'],'TEL'=>$fila['numero_tel'],'EDAD'=>$fila['edad'],
                   'DIRECCION'=>$fila['direccion'],'CLASE'=>$fila['clase'],'ESTADO'=>$fila['estado']));      
           }   
           
       } catch (Exception $e) {                 
       }     
     return  $LISTA;        
   }
   
   public  function guardarEstu(EstudianteBean $objBean)
   {  try {
      
       $rs=0;
       $cel=$objBean->numero_cel;

      $query="select * from persona;";
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
                
       $dni=$objBean->dni;
       $sql="call SP_registro_estudiante('$objBean->nombres','$objBean->apellido_paterno','$dni',"
               . "'$objBean->direccion','$objBean->numero_cel','$objBean->numero_tel','$objBean->fecha_nac',"
               . "'$objBean->foto','$objBean->sexo','$objBean->apellido_materno','$objBean->distrito_id');";
      
       $rs=ejecutarConsulta($sql);
             }
       } catch (Exception $e) {  
         $rs=0;
       }     
     return  $rs;        
   }
   
    public  function editarEstu(EstudianteBean $objBean)
   {  try {
       

      $rs=0;
      $cel=$objBean->numero_cel;
      $query="select * from persona p inner join usuario u on p.persona_id=u.usuario_id where persona_id!='$objBean->estudiante_id';";
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
           
               
                 $sql="call SP_editar_estudiante ('$objBean->nombres','$objBean->apellido_paterno','$objBean->dni',
                '$objBean->direccion','$objBean->numero_cel','$objBean->numero_tel','$objBean->fecha_nac',
                '$objBean->foto','$objBean->sexo','$objBean->usuario',
                '$objBean->estudiante_id','$objBean->apellido_materno','$objBean->distrito_id');";
                 $rs=ejecutarConsulta($sql);

           }

       } catch (Exception $e) {  
         $rs=0;
       }     
     return  $rs;        
   }
     public  function eliminarMatriEstu($matri_id)
   {  try {
        $objc = new ConexionBD();
           $cn=$objc->getConexionBD(); 
        
       
       } catch (Exception $e) {  

       }          
   }
    public  function cambiarSeccion($clase_id,$estu_id,$matri_id)
   {  try {
        $objc = new ConexionBD();
           $cn=$objc->getConexionBD(); 
        
     
  $call="call SP_eliminar_matricula('$matri_id')";
              mysqli_query($cn,$call);

        $sql="insert into matricula values (null,'$clase_id','$estu_id',now(),'A')";
              $matricula_id= ejecutarConsulta_retornarID($sql);
             $call2="call SP_registro_matricula('$clase_id','$estu_id','$matricula_id')";
            $rs= mysqli_query($cn,$call2);
           
       } catch (Exception $e) {  
         $rs=0;
       }     
     return  $rs;        
   }
   
   public  function cantidadEstudiante()
   {  try {
     
       $sql="select count(*) as cantidad from usuario where estado='A' and tipo_usuario_id='3';";
       $rs=ejecutarConsulta($sql);
      $fila=  mysqli_fetch_assoc($rs);
       $cantidad=$fila['cantidad'];
       
       } catch (Exception $e) {  
         $cantidad=null;
       }     
     return   $cantidad;        
   }
   
   public  function listarEstudiantes()
   {  try {
      
           $sql="select * from lista_estudiantes_completa order by estudiante;";
           $rs=ejecutarConsulta($sql);
           $LISTA['ESTUC']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['ESTUC'], 
             array('CODIGO'=>$fila['persona_id'],'ESTUDIANTE'=>$fila['estudiante'],'FOTO'=>$fila['foto'],
                   'SEXO'=>$fila['sexo'], 'EMAIL'=>$fila['email'],'DNI'=>$fila['dni'],'DIRECCION'=>$fila['direccion'],
                   'CEL'=>$fila['numero_cel'],'TEL'=>$fila['numero_tel'],'EDAD'=>$fila['edad'],
                   'DISTRITO'=>$fila['distrito'],'ESTADO'=>$fila['estado'],'USUARIO'=>$fila['usuario']));   
           }   
           
       } catch (Exception $e) {                 
       }     
     return  $LISTA;        
   }
   public  function listarEstudiantesMatricula()
   {  try {
      
           $sql="select * from lista_estudiantes_matricula;";
           $rs=ejecutarConsulta($sql);
           $LISTA['ESTUC']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['ESTUC'], 
             array('CODIGO'=>$fila['persona_id'],'ESTUDIANTE'=>$fila['estudiante'],'FOTO'=>$fila['foto'],
                   'SEXO'=>$fila['sexo'],'DNI'=>$fila['dni'],'FECHA'=>$fila['fecha'],'ESTADO'=>$fila['estado'],
                   'GRADO_ID'=>$fila['grado_id'],'SECCION_ID'=>$fila['seccion_id'],'CLASE'=>'Todos los estudiantes','MATRI_ID'=>$fila['matricula_id'],
                 'SECCION_ID'=>$fila['seccion_id'],'ANIO'=>$fila['anio']));   
           }   
           
       } catch (Exception $e) {                 
       }     
     return  $LISTA;        
   }
    public  function listarMatriculaNivel($nivel_id)
   {  try {
      
           $sql="select * from lista_estudiantes_matricula where nivel_id='$nivel_id' ;";
           $rs=ejecutarConsulta($sql);
           $LISTA['ESTUC']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['ESTUC'], 
             array('CODIGO'=>$fila['persona_id'],'ESTUDIANTE'=>$fila['estudiante'],'FOTO'=>$fila['foto'],
                   'SEXO'=>$fila['sexo'],'DNI'=>$fila['dni'],'FECHA'=>$fila['fecha'],'ESTADO'=>$fila['estado'],
                   'GRADO_ID'=>$fila['grado_id'],'SECCION_ID'=>$fila['seccion_id']));   
           }   
           
       } catch (Exception $e) {                 
       }     
     return  $LISTA;        
   }

   
   public  function listarMatriNivelGradoSec($nivel_id,$grado_id,$seccion_id,$anio_id,$year_id)
   {  try {
      
           if($nivel_id=="0" && $grado_id=="0" && $seccion_id=="0" && $anio_id=="0"){
          $sql="select * from lista_estudiantes_matricula where anio_escolar_id='$year_id';";
           
       }  
       if($nivel_id=="0" && $grado_id=="0" && $seccion_id=="0" && $anio_id!="0"){
          $sql="select * from lista_estudiantes_matricula where anio_escolar_id='$anio_id';";
           
       }  
   
       if($nivel_id!="0" &&  $grado_id=="0" && $seccion_id=="0" && $anio_id=="0" ){
          $sql="select * from lista_estudiantes_matricula where nivel_id='$nivel_id';";
           
       }  
        if($grado_id!="0" && $seccion_id=="0" && $anio_id=="0" && $nivel_id=="0"){
          $sql="select * from lista_estudiantes_matricula where grado_id='$grado_id';";
           
       }  
        if($seccion_id!="0" &&  $grado_id=="0" && $anio_id=="0" && $nivel_id=="0"){
          $sql="select * from lista_estudiantes_matricula where seccion_id='$seccion_id';";
           
       }   if($seccion_id!="0" && $grado_id!="0" && $anio_id=="0" && $nivel_id=="0"){
          $sql="select * from lista_estudiantes_matricula where seccion_id='$seccion_id' and grado_id='$grado_id' ;";
           
       }  
        if($nivel_id!="0" && $grado_id!="0" && $seccion_id=="0" && $anio_id=="0"){
          $sql="select * from lista_estudiantes_matricula where nivel_id='$nivel_id' and grado_id='$grado_id' ;";
           
       }  
        if($seccion_id!="0" && $nivel_id!="0" &&  $grado_id=="0" && $anio_id=="0"){
          $sql="select * from lista_estudiantes_matricula where nivel_id='$nivel_id' and seccion_id='$seccion_id' ;";
           
       }  
         if($seccion_id!="0" && $nivel_id!="0" && $grado_id!="0" && $anio_id=="0"){
          $sql="select * from lista_estudiantes_matricula where nivel_id='$nivel_id' and grado_id='$grado_id' and seccion_id='$seccion_id';";
          
       }  if($seccion_id!="0" && $nivel_id!="0" && $grado_id!="0" && $anio_id!="0"){
          $sql="select * from lista_estudiantes_matricula where nivel_id='$nivel_id' and grado_id='$grado_id' and seccion_id='$seccion_id' and anio_escolar_id='$anio_id';";
          
       }  
       
       
          
           $rs=ejecutarConsulta($sql);
           $LISTA['ESTUC']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['ESTUC'], 
             array('CODIGO'=>$fila['persona_id'],'ESTUDIANTE'=>$fila['estudiante'],'FOTO'=>$fila['foto'],
                   'SEXO'=>$fila['sexo'],'DNI'=>$fila['dni'],'FECHA'=>$fila['fecha'],'ESTADO'=>$fila['estado'],
                   'GRADO_ID'=>$fila['grado_id'],'SECCION_ID'=>$fila['seccion_id'],'MATRI_ID'=>$fila['matricula_id'],'CLASE'=>$fila['clase'],'ANIO'=>$fila['anio']));   
           }   
           
       } catch (Exception $e) {                 
       }     
     return  $LISTA;        
   } 
 
   
    public  function cantAsistencias($id,$anio_id)
   {  try {
      
           $sql="select a.profesor_clase_curso_id,curso_nombre,faltas,asistencias,Tardanzas from asistencia_cantidad a inner join
              profesor_clase_curso pcc on a.profesor_clase_curso_id=pcc.profesor_clase_curso_id
              JOIN profesor_clase pc on pcc.profesor_clase_id=pc.profesor_clase_id join clase ca on pc.clase_id=ca.clase_id
                   inner join curso c on pcc.curso_id=c.curso_id where estudiante_id='$id' and ca.anio_escolar_id='$anio_id';";
           $rs=ejecutarConsulta($sql);
           $LISTA['LISTA_ASIS']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['LISTA_ASIS'], 
             array('CURSO'=>$fila['curso_nombre'],'F'=>$fila['faltas'],
                   'T'=>$fila['Tardanzas'], 'A'=>$fila['asistencias'], 'PROFE_CURSO_ID'=>$fila['profesor_clase_curso_id']));   
           }   
           
       } catch (Exception $e) {                 
       }     
     return  $LISTA;        
   }
   
   public  function listarHorario($estu_id,$anio_id)
   {  try {
     
       $sql="call Sp_mi_horario_estu('$estu_id','$anio_id');";
       $rs=ejecutarConsulta($sql);
  
       $LISTA['HORARIO']=array();
       while ($fila= mysqli_fetch_assoc($rs)){
           array_push($LISTA['HORARIO'], array('DIA'=>$fila['dia'],'T'=>$fila['turno_nombre'],'DE'=>$fila['hora_de'],'A'=>$fila['hora_a'],'CURSO'=>$fila['curso']));
       }
       
       } catch (Exception $e) {  
         $LISTA=null;
       }     
     return   $LISTA;        
   }
   
   public  function accion($tipo,$id,$id2)
   {  
      
         try 
         {
             if($tipo=="e"){
                $sql="call SP_eliminar_estudiante('$id');";
             ejecutarConsulta($sql);
             }
             
             else if($tipo=="b"){
             $sql="select * from usuario u join  persona p on u.usuario_id=p.persona_id join estudiante e on p.persona_id=e.estudiante_id 
                                  JOIN distrito d on p.distrito_id=d.distrito_id where persona_id='$id' and tipo_usuario_id='3';     ";
                     
             $rs= ejecutarConsulta($sql);
             $rspta['LISTA']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($rspta['LISTA'], 
             array('CODIGO'=>$fila['persona_id'],'NOMBRES'=>$fila['nombres'],'APA'=>$fila['apellido_paterno'],
                   'AMA'=>$fila['apellido_materno'],'SEXO'=>$fila['Sexo'], 'EMAIL'=>$fila['email'],'DNI'=>$fila['dni'],'DIRECCION'=>$fila['direccion'],
                   'CEL'=>$fila['numero_cel'],'TEL'=>$fila['numero_tel'],'DISTRI_ID'=>$fila['distrito_id'],'DISTRITO'=>$fila['distrito_nombre'],'FECH_NAC'=>$fila['fecha_nac']
                  ,'FOTO'=>$fila['foto'],'USU'=>$fila['usuario']));      
             }   
             }
          
       } catch (Exception $e) {  
           $rspta=null;
       }
       return $rspta;
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
                    $sql1="select nombre_tema from tema where curso_id='$id' and unidad_tematica_id='$uni_id';";
           $rs1= mysqli_query($cn,$sql1);
           while ($row= mysqli_fetch_assoc($rs1)){
          
               $tema[]=$row;
                 }

             array_push($LISTA['TEMAS'], 
             array('UNIDAD'=>$fila['nombre_unidad_tema'],
                 'UNIDAD_ID'=>$fila['unidad_tematica_id']
                   ,'TEMA'=>$tema));   
           } 
   }
        catch (Exception $e) {                 
       }     
         
     return  $LISTA;       

   }
   
      public  function accionMatri($tipo,$id,$id2)
   {  
      
         try 
         {
             if($tipo=="e"){
                $sql="call SP_eliminar_matricula('$id');";
             ejecutarConsulta($sql);
             }
             
             else if($tipo=="i"){
              $sql="update matricula set estado='I' where matricula_id='$id';";
             ejecutarConsulta($sql);
             $rspta=null;
             }
             else if($tipo=="h"){
              $sql="update matricula set estado='A' where matricula_id='$id';";
             ejecutarConsulta($sql);
               $rspta=null;
             }
           else if($tipo=="b"){
             $sql="select matricula_id,lc.clase_id,persona_id,clase2,estudiante,dni,foto from estudiante e join lista_estudiantes_completa le on e.estudiante_id =le.persona_id join matricula m on e.estudiante_id 
                    =m.estudiante_id join lista_clase lc on m.clase_id=lc.clase_id where m.matricula_id='$id';";
             $rs= ejecutarConsulta($sql);
             $rspta['LISTA']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($rspta['LISTA'], 
             array('CODIGO'=>$fila['persona_id'],'ESTUDIANTE'=>$fila['estudiante'],'DNI'=>$fila['dni'],
                   'FOTO'=>$fila['foto'],'CLASE'=>$fila['clase2'],'COD_CLASE'=>$fila['clase_id']
                     ,'COD_MATRI'=>$fila['matricula_id']));      
             }   
             }
             
       } catch (Exception $e) {  
           $rspta=null;
       }
       return $rspta;
   }
   
    public  function buscarEstudiante($entrada)
   {  try {

       $sql="select * from buscar_estu where encontrar like '%$entrada%';";
       $rs=ejecutarConsulta($sql);
  
       $LISTA['ESTU']=array();
       while ($fila= mysqli_fetch_assoc($rs)){
           array_push($LISTA['ESTU'], array('CODIGO'=>$fila['persona_id'],'FOTO'=>$fila['foto'],'ESTU'=>$fila['estudiante']
                   ,'DNI'=>$fila['dni'],'EDAD'=>$fila['edad']));
       }
       
       } catch (Exception $e) {  
         $LISTA=null;
       }     
     return   $LISTA;        
   }
   public  function guardarAsignacion($estu_id,$anio_id,$clase_id)
   {  
         
        try 
       {  $objc = new ConexionBD();
           $cn=$objc->getConexionBD(); 
        
   
              $query="select * from matricula m join clase c on m.clase_id=c.clase_id where c.anio_escolar_id='$anio_id' and estudiante_id='$estu_id' and m.estado='A';";
             $existe=existencia($query);

             if($existe==0){  
               $sql="insert into matricula values (null,'$clase_id','$estu_id',now(),'A');";
              $matricula_id= ejecutarConsulta_retornarID($sql);
             $call="call SP_registro_matricula ('$clase_id','$estu_id','$matricula_id');";   
             $rspta= mysqli_query($cn,$call);
             }else if($existe==2){
                 $rspta="El estudiante ya fue asignado a una clase el presente año escolar!!!";
              }
 

       }catch (Exception $e) {        
           $rspta=0;
       }     
     return  $rspta;       
       
   }
   
     public  function cantidadEstuAsignado($añoid)
   {  try {

       $sql="select count(DISTINCT m.estudiante_id) as cantidad from matricula m join estudiante e on m.estudiante_id=e.estudiante_id join clase c on m.clase_id=c.clase_id where anio_escolar_id='$añoid' and m.estado='A' ;";
       $rs=ejecutarConsulta($sql);
      $fila=  mysqli_fetch_assoc($rs);
       $cantidad=$fila['cantidad'];
       
       } catch (Exception $e) {  
         $cantidad=null;
       }     
     return   $cantidad;        
   }
}

