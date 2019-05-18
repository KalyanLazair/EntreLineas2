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
?>

<script>
    console.log('<?php echo $resultadoLibro; ?>');
</script>


<?php



if($resultadoLibro != null){
    ?>

   <script>
       
       $(document).ready(function(){
           muestraModalInserta();
       });
    
   </script>
 <?php   
  }else{
?>
   <script>
       
       $(document).ready(function(){
           muestraModalNoInserta();
       });
       
       
   </script>
   <?php
  }
  ?>
   
   <!-- modal inserta -->

   <div id="modalInserta" class="modal" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">El libro se ha publicado correctamente.</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick=volverPgPerfil();>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
</div>
   
   <!-- modal no inserta -->
   
   <div id="modalNoInserta" class="modal" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">No se ha podido publicar el libro.</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
</div>
   
   
   <script>
       
       function muestraModalInserta() {
        $('#modalInserta').modal('show');
    };
    
      function muestraModalNoInserta(){
         $('#modalNoInserta').modal('show'); 
      };
      
    
    var numeroPerfil=1;
    
    function volverPgPerfil(){
        var _numPerfil=numeroPerfil;
        
        $("#contenedor").load("PaginaPerfil.php", {
            numeroPerfil: _numPerfil
        });
    };
      
       
   </script>


