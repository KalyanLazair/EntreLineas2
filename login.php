<?php

session_start(); // Inicia o continua la sesión del navegador en el servidor PHP

include('configuracion.php');
include('misFunciones.php');

$nombreUsuario=$_POST['nombreUsuario'];
$passUsuario=$_POST['passUsuario'];


$resultado = iniciaSesion($servidor, $bbdd, $usuario_mysql, $clave_mysql, $nombreUsuario, $passUsuario);

if($resultado != NULL){
   //Cookies
   $_SESSION['email'] = $resultado['email']; 
   $_SESSION['username'] = $resultado['username'];
   $_SESSION['IDUser']=$resultado['IDUser'];
   
  echo'<script>window.location.href = top.window.location.href</script> ';
 
}

////Vamos a sacar los datos del usuario que tenga el IDUser igual al que le pasamos como parámetro.
//$IDusuario=$_SESSION['IDUser'];
//$consulta= "SELECT * FROM $bbdd.userdata WHERE IDUserData=$IDusuario;";
//
//$resultado2 = accesoBBDD($consulta, $servidor, $bbdd, $usuario_mysql,$clave_mysql);
//
//if($resultado2 != NULL){
//    //Datos procesados, se procesa el array /array to string/ con el foreach.
//    foreach ($resultado2 as $key => $value) {
//           $_SESSION['nombre']=$value['nombre'];
//            $_SESSION['apellidos']=$value['apellidos'];
//            $_SESSION['sexo']=$value['sexo'];
//            $_SESSION['ciudad']=$value['ciudad'];
//            $_SESSION['pais']=$value['pais'];
//             $_SESSION['descripcion']=$value['descripcion'];
//            $_SESSION['foto']=$value['foto'];   
//    }
//    
//}


