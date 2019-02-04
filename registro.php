<?php

include('configuracion.php');
include('misFunciones.php');

$username=$_POST['username'];
$passUsuario=$_POST['passUsuario'];
$correo=$_POST['correo'];
$nombre=$_POST['nombreUsuario'];
$apellidos=$_POST['apellidos'];
$genero=$_POST['genero'];
$ciudad=$_POST['ciudad'];
$pais=$_POST['pais'];

echo $username . " " . $passUsuario. " ". $nombre. " ". $apellidos. " ". $genero. " ". $ciudad. " ". $pais;

$registroUser="INSERT INTO $bbdd.usuario(username,email,userPass) VALUES ('$username','$correo','$passUsuario');";
$registroDatos="INSERT INTO $bbdd.userdata(nombre,apellidos,sexo,ciudad,pais) VALUES('$nombre','$apellidos','$genero','$ciudad','$pais');";

$resultadoUser= guardaDatos($registroUser, $servidor, $bbdd, $usuario_mysql,$clave_mysql);
$resultadoDatos= guardaDatos($registroDatos, $servidor, $bbdd, $usuario_mysql,$clave_mysql);