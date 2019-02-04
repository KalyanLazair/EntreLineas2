<?php

include('configuracion.php');
include('misFunciones.php');


//$nombreUsuario ="pepe@gmail.com"; 
//$passUsuario="1234";
//$resultado = conectaBBDD($servidor, $bbdd, $usuario_mysql, $clave_mysql, $nombreUsuario, $passUsuario);
//echo count($resultado);
//echo("<pre>");
//print_r($resultado);
//echo("</pre>");
//
//session_start(); // Inicia o continua la sesión del navegador en el servidor PHP
//    // Guarda el nombre de usuario en la variable de sesión nombreUsuario.
//echo($resultado['email']);
//$_SESSION['email'] = $resultado['email']; 
//$_SESSION['username'] = $resultado['username'];

//$IDusuario=$_SESSION['IDUser'];
//$consulta= "SELECT * FROM $bbdd.userdata WHERE IDUserData=$IDusuario;";
//
//$resultado = accesoBBDD($consulta, $servidor, $bbdd, $usuario_mysql,$clave_mysql);
//
//echo("<pre>");
//print_r($resultado);
//echo("</pre>");

////////////////////////////////////////////////

//$nombreUsuario="Koenig";
//$consultaUser="SELECT IDUser FROM $bbdd.usuario WHERE username='$nombreUsuario';";
//$resultadoUsuario=accesoBBDD($consultaUser, $servidor, $bbdd, $usuario_mysql,$clave_mysql);
//
////Conversión array to string
//foreach ($resultadoUsuario as $key => $value){
//    $claveUsuario=$value['IDUser'];   
//}
//
//$consultaDatosUser="SELECT * FROM $bbdd.userdata WHERE IDUserData=$claveUsuario";
//$resultadoDatosUser=accesoBBDD($consultaDatosUser, $servidor, $bbdd, $usuario_mysql,$clave_mysql);
//
//foreach($resultadoDatosUser as $key => $value){
//    $nombreUser=$value['nombre'];
//    $apellidoUser=$value['apellidos'];
//    $sexoUser=$value['sexo'];
//    $paisUser=$value['pais'];
//    $ciudadUser=$value['ciudad'];
//    $descripcionUser=$value['descripcion'];
//    $fotoUser=$value['foto'];
//}
//
//echo("<pre>");
//print_r($resultadoDatosUser);
//echo("</pre>");
//
//echo $nombreUser. "<br/>";
//echo $apellidoUser. "<br/>";
//echo $sexoUser. "<br/>";
//echo $paisUser. "<br/>";
//echo $ciudadUser. "<br/>";
//echo $descripcionUser. "<br/>";
//echo $fotoUser. "<br/>";

///////////////////////////////////////////

//$tituloLibro;
//$autorLibro;
//$descripcionLibro;
//$generoLibro;
//
//$generoLibro="Fantasia";
//
//$consultaPorGenero="SELECT * FROM $bbdd.libro WHERE genero='$generoLibro'";
//$listaLibroGenero=accesoBBDD($consultaPorGenero, $servidor, $bbdd, $usuario_mysql,$clave_mysql);
//
//foreach($listaLibroGenero as $key => $value){
//    $tituloLibro=$value['titulo'];
//    $autorLibro=$value['autor'];
//    $descripcionLibro=$value['descripcion'];
//    $generoLibro=$value['genero'];
//}

//////////////////////////////////////////

$consultaPgPrincipal="SELECT IDLibro, portada FROM $bbdd.libro ORDER BY IDLibro DESC LIMIT 6;";
$portadasInicio=accesoBBDD($consultaPgPrincipal,$servidor, $bbdd, $usuario_mysql,$clave_mysql);

foreach($portadasInicio as $key => $value){
    $arrayID[]=$value['IDLibro'];
    $arrayPortada[]=$value['portada'];
}

echo("<pre>");
print_r($arrayID);
echo("</pre>");

echo("<pre>");
print_r($arrayPortada);
echo("</pre>");
