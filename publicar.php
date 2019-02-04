<?php

session_start();

include('configuracion.php');
include('misFunciones.php');

$titulo=$_POST['titulo'];
$autor=$_POST['autor'];
$descripcion=$_POST['descripcion'];
$genero=$_POST['genero'];
$archivo10=$_POST['archivo10'];
$archivo=$_POST['archivo'];
$portada=$_POST['portada'];

$registroLibro="INSERT INTO $bbdd.libro(titulo,autor,descripcion,genero,archivo10,archivo,portada) VALUES ('$titulo','$autor','$descripcion','$genero','$archivo10','$archivo','$portada');";

$resultadoLibro= guardaDatos($registroLibro, $servidor, $bbdd, $usuario_mysql,$clave_mysql);

