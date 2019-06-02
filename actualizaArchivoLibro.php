<?php

session_start();
   
include('configuracion.php');
include('misFunciones.php');

$userID=$_SESSION['IDUser'];

$archivo=$_POST['archivo'];

$archivoPrincipal='./'.$_SESSION['username'].'/'.$archivo;

$modArchivo="UPDATE $bbdd.libro SET archivo='$archivoPrincipal' WHERE IDUserData=$userID;";
$datosPerfilM=guardaDatos($modArchivo, $servidor, $bbdd, $usuario_mysql, $clave_mysql);

//Función creación de carpeta

$path = $_SESSION['username'];

function makeDir($path)
{
     return is_dir($path) || mkdir($path);
}

$rutaUsuario = makeDir($path);


//Prueba de subida de archivos

$target_dir = $_SESSION['username'] . '/';                 /*"libros/";*/
$target_file = $target_dir . basename($_FILES["archivoLibro"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
       /* if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["archivoLibro"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        } */

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["archivoLibro"]["size"] > 500000) {
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
            if (move_uploaded_file($_FILES["archivoLibro"]["tmp_name"], $target_file)) {
                echo "success";
             //   echo "The file ". basename( $_FILES["archivoPrincipal"]["name"]). " has been uploaded.";
                // Añadir llamada a BBDD para la ruta

            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        


