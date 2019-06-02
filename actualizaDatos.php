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
  // $foto=$_POST['foto'];
   
   $modPerfil="UPDATE $bbdd.userdata SET nombre='$nombre', apellidos='$apellidos', sexo='$sexo', ciudad='$ciudad', pais='$pais', descripcion='$descripcion' WHERE IDUserData=$userID;";
   $datosPerfilM=guardaDatos($modPerfil, $servidor, $bbdd, $usuario_mysql, $clave_mysql);
   
   if($datosPerfilM != null){
     
   ?>
   
    <script>
       
       $(document).ready(function(){
           muestraModalActualiza();
       });
     
   </script>
   
 <?php
   }else{
 ?>
   <script>
       
       $(document).ready(function(){
           muestraModalNoActualiza();
       });
     
   </script>
 <?php
   }  
 ?>

<!-- modal actualiza -->

   <div id="modalActualiza" class="modal" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Los datos se han modificado correctamente.</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick=volverPgPerfil();>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- modal no actualiza -->

<div id="modalNoActualiza" class="modal" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">No se han podido modificar los datos.</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick=volverPgPerfil();>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    
    function muestraModalActualiza() {
        $('#modalActualiza').modal('show');
    };
    
    function muestraModalNoActualiza(){
      $('#modalNoActualiza').modal('show');  
    };
    
    var numeroPerfil=1;
    
    function volverPgPerfil(){
        var _numPerfil=numeroPerfil;
        
        $("#contenedor").load("PaginaPerfil.php", {
            numeroPerfil: _numPerfil
        });
    };
      
</script>