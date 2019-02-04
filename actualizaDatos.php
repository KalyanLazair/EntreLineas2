<?php

   session_start();
   
   include('configuracion.php');
   include('misFunciones.php');

   $userID=$_POST['userID'];
   $nombre=$_POST['nombre'];
   $apellidos=$_POST['apellidos'];
   $sexo=$_POST['sexo'];
   $ciudad=$_POST['ciudad'];
   $pais=$_POST['pais'];
   $descripcion=$_POST['descripcion'];
   $foto=$_POST['foto'];
   
   $modPerfil="UPDATE $bbdd.userdata SET nombre='$nombre', apellidos='$apellidos', sexo='$sexo', ciudad='$ciudad', pais='$pais', descripcion='$descripcion', foto='$foto' WHERE IDUserData=$userID;";
   $datosPerfilM=guardaDatos($modPerfil, $servidor, $bbdd, $usuario_mysql, $clave_mysql);
   
   ?>

<script>
    
    var numeroPerfil=1;
    
    volverPgPerfil();
    
    function volverPgPerfil(){
        var _numPerfil=numeroPerfil;
        
        $("#contenedor").load("PaginaPerfil.php", {
            numeroPerfil: _numPerfil
        });
    };
      
</script>