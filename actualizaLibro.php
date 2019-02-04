<?php

   session_start();
   
   include('configuracion.php');
   include('misFunciones.php');

   $libroID=$_POST['libroID'];
   $tituloM=$_POST['titulo'];
   $autorM=$_POST['autor'];
   $descripcionM=$_POST['descripcion'];
   $generoM=$_POST['genero'];
   $archivo10M=$_POST['archivo10'];
   $archivoM=$_POST['archivo'];
   $portadaM=$_POST['portada'];
   
   $modificaLibro="UPDATE $bbdd.libro SET titulo='$tituloM', autor='$autorM', descripcion='$descripcionM', genero='$generoM', archivo10='$archivo10M', archivo='$archivoM', portada='$portadaM' WHERE IDLibro=$libroID;";
   
   $datosLibro1=guardaDatos($modificaLibro, $servidor, $bbdd, $usuario_mysql, $clave_mysql);
   
   ?>

<script>
    
    var idDeLibro=<?php echo $libroID?>;
    console.log(idDeLibro);
    
    volverPgLibro();
    
    function volverPgLibro(){
        var _idLibro=idDeLibro;
        
        $("#contenedor").load("PaginaLibro.php", {
            idlibro: _idLibro
        });
    };
      
</script>
   
       

