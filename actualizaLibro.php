<?php

   session_start();
   
   include('configuracion.php');
   include('misFunciones.php');

   $libroID=$_POST['libroID'];
   $tituloM=$_POST['titulo'];
   $autorM=$_POST['autor'];
   $descripcionM=$_POST['descripcion'];
   $generoM=$_POST['genero'];
   
   $modificaLibro="UPDATE $bbdd.libro SET titulo='$tituloM', autor='$autorM', descripcion='$descripcionM', genero='$generoM' WHERE IDLibro=$libroID;";
   
   $datosLibro1=guardaDatos($modificaLibro, $servidor, $bbdd, $usuario_mysql, $clave_mysql);
   
  if($datosLibro1 != null){
     
   ?>
   
    <script>
       
       $(document).ready(function(){
           muestraModalActualizaL();
       });
     
   </script>
   
 <?php
   }else{
 ?>
   <script>
       
       $(document).ready(function(){
           muestraModalNoActualizaL();
       });
     
   </script>
 <?php
   }  
 ?>

<!-- modal actualiza -->

   <div id="modalActualizaL" class="modal" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Los datos del libro se han modificado correctamente.</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick=volverPgLibro();>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- modal no actualiza -->

<div id="modalNoActualizaL" class="modal" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">No se han podido modificar los datos del libro.</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick=volverPgLibro();>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    
    function muestraModalActualizaL() {
        $('#modalActualizaL').modal('show');
    };
    
    function muestraModalNoActualizaL(){
      $('#modalNoActualizaL').modal('show');  
    };
    
    var idDeLibro=<?php echo $libroID?>;

    function volverPgLibro(){
        var _idLibro=idDeLibro;
        
        $("#contenedor").load("PaginaLibro.php", {
            idlibro: _idLibro
        });
    };
      
</script>
   
       

