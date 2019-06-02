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

$varMuestra='./'.$_SESSION['username'].'/'.$archivo10;
$varArchivo='./'.$_SESSION['username'].'/'.$archivo;
$varPortada='./'.$_SESSION['username'].'/'.$portada;

$registroLibro="INSERT INTO $bbdd.libro(titulo,autor,descripcion,genero,archivo10,archivo,portada) VALUES ('$titulo','$autor','$descripcion','$genero','$varMuestra','$varArchivo','$varPortada');";

$resultadoLibro= guardaDatos($registroLibro, $servidor, $bbdd, $usuario_mysql,$clave_mysql);

//Función creación de carpeta

$path = $_SESSION['username'];

function makeDir($path)
{
     return is_dir($path) || mkdir($path);
}

$rutaUsuario = makeDir($path);


//Prueba de subida de archivos

$target_dir = $_SESSION['username'] . '/';                 /*"libros/";*/
$target_file = $target_dir . basename($_FILES["archivoPrincipal"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
     /*   if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["archivoPrincipal"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }*/

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["archivoPrincipal"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "pdf" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["archivoPrincipal"]["tmp_name"], $target_file)) {
                echo "success";
             //   echo "The file ". basename( $_FILES["archivoPrincipal"]["name"]). " has been uploaded.";
                // Añadir llamada a BBDD para la ruta

            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        
        //Muestra

$target_dir2 = $_SESSION['username'] . '/';                 /*"libros/";*/
$target_file2 = $target_dir2 . basename($_FILES["archivoMuestra"]["name"]);
$uploadOk2 = 1;
$imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["archivoMuestra"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk2 = 1;
            } else {
                echo "File is not an image.";
                $uploadOk2 = 0;
            }
        }

        // Check if file already exists
        if (file_exists($target_file2)) {
            echo "Sorry, file already exists.";
            $uploadOk2 = 0;
        }
        // Check file size
        if ($_FILES["archivoMuestra"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk2 = 0;
        }
        // Allow certain file formats
        if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg"
        && $imageFileType2 != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk2 = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk2 == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["archivoMuestra"]["tmp_name"], $target_file2)) {
                echo "success";
             //   echo "The file ". basename( $_FILES["archivoPrincipal"]["name"]). " has been uploaded.";
                // Añadir llamada a BBDD para la ruta

            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

//Portada
        
$target_dir3 = $_SESSION['username'] . '/';                 /*"libros/";*/
$target_file3 = $target_dir3 . basename($_FILES["archivoPortada"]["name"]);
$uploadOk3 = 1;
$imageFileType3 = strtolower(pathinfo($target_file3,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["archivoPortada"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk3 = 1;
            } else {
                echo "File is not an image.";
                $uploadOk3 = 0;
            }
        }

        // Check if file already exists
        if (file_exists($target_file3)) {
            echo "Sorry, file already exists.";
            $uploadOk3 = 0;
        }
        // Check file size
        if ($_FILES["archivoPortada"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk3 = 0;
        }
        // Allow certain file formats
        if($imageFileType3 != "jpg" && $imageFileType3 != "png" && $imageFileType3 != "jpeg"
        && $imageFileType3 != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk3 = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk3 == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["archivoPortada"]["tmp_name"], $target_file3)) {
                echo "success";
             //   echo "The file ". basename( $_FILES["archivoPrincipal"]["name"]). " has been uploaded.";
                // Añadir llamada a BBDD para la ruta

            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }