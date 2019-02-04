<?php
    session_start();
?>

<div class="cajaLogin">
  <div class="row">
      <div class="col-6 border border-dark">
          <p class="cajaTexto">Nombre de Usuario</p>
          <p class="cajaTexto">Contraseña</p>
      </div>
      <div class="col-6 border border-dark">
          <input id="cajaNombre" class="form-control cajaTexto" name="usuario_nombre" type="text" placeholder="Usuario">
          
          <input id="cajaPassword" class="form-control cajaTexto" name="usuario_nombre" type="password" placeholder="Contraseña">
      </div>
  </div>
  <div class="row">
      <div class="col-6"></div>
     <div class="col-6">
          <button id="botonLogin" class="btn" type="button" >Conectarse</button>
      </div>
  </div>
</div>

<script>
     
     $('#botonLogin').click(function () {
                                    // Read the input content
                                    var _nombreUsuario = $('#cajaNombre').val();
                                    var _passUsuario = $('#cajaPassword').val();
                                    console.log(_nombreUsuario);
                                    console.log(_passUsuario);
                                    
                                    $('.posts').load("login.php", {
                                        nombreUsuario: _nombreUsuario,
                                        passUsuario: _passUsuario
                                    });
                                    
                                    
                                });


</script>

<style>
    
    .cajaLogin{
        padding-top:10%;
        padding-left: 30%;
        padding-right:30%;
        padding-bottom: 10%;
    }
    
    .cajaTexto{
        margin-top: 6%;
        margin-right: 6%;
        
    }
    
</style>
