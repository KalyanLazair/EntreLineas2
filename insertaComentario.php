<?php

   session_start();
   
   include('configuracion.php');
   include('misFunciones.php');
   
   $usuario=$_SESSION['username'];
   $userfoto=$_SESSION['foto'];
   $libro=$_POST['libro'];
   $contenido=$_POST['contenido'];
   
   echo $usuario . "<br/>";
   echo $libro . "<br/>";
   echo $contenido . "<br/>";
   echo $userfoto . "<br/>";
   
   $insertaC="INSERT INTO $bbdd.comentarios (usuario,libro,contenido,fotouser) VALUES ('$usuario',$libro,'$contenido','$userfoto');";
   $insertaComentario=guardaDatos($insertaC, $servidor, $bbdd, $usuario_mysql, $clave_mysql);
   
  // echo'<script>window.location.href = top.window.location.href</script> ';

 ?>

<script>
    
    var idDeLibro=<?php echo $libro?>;
    console.log(idDeLibro);
    
    volverPgLibro();
    
    function volverPgLibro(){
        var _idLibro=idDeLibro;
        
        $("#contenedor").load("PaginaLibro.php", {
            idlibro: _idLibro
        });
    };
      
</script>