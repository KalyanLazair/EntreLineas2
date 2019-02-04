<?php 
   session_start();
?>


<div class="row">
    <div class="col-6 border border-dark">
        <p>Nombre de Usuario</p>
        <p>Contraseña</p>
        <p>Repetir Contraseña</p>
        <p>email</p>
        <p>Nombre</p>
        <p>Apellidos</p>
        <p>Género</p>
        <p>Ciudad</p>
        <p>País</p> 
    </div>
    <div class="col-6 border border-dark">
        <input id="cajaUser" class="form-control" name="usuario_nombre" type="text" placeholder="Usuario">
        <input id="cajaPassword" class="form-control" name="usuario_nombre" type="password" placeholder="Contraseña">
        <input id="cajaPasswordRe" class="form-control" name="usuario_nombre" type="password" placeholder="Repetir Contraseña">
        <input id="cajaEmail" class="form-control" name="usuario_nombre" type="text" placeholder="Email">
        <input id="cajaNombreUs" class="form-control" name="usuario_nombre" type="text" placeholder="Nombre">
        <input id="cajaApellidos" class="form-control" name="usuario_nombre" type="text" placeholder="Apellidos">
        <input id="cajaGenero" class="form-control" name="usuario_nombre" type="text" placeholder="Género">
        <input id="cajaCiudad" class="form-control" name="usuario_nombre" type="text" placeholder="Ciudad">
        <input id="cajaPais" class="form-control" name="usuario_nombre" type="text" placeholder="País">
    </div>
</div>
<div class="row">
    <div class="col-12">
        <button ID="botonRegistroUser" class="btn " type="button" >Registrarse</button>
    </div>
</div>

<script>
   

             $('#botonRegistroUser').click(function () {
                      //Variables para hacer la comprobación
                       var passRepeticion = $('#cajaPasswordRe').val();
                       var passComprobacion = $('#cajaPassword').val();
                       
                       if(passRepeticion==passComprobacion){
                                    // Read the input content
                                    var _username = $('#cajaUser').val();
                                    var _passUsuario = $('#cajaPassword').val();
                                    var _nombreUsuario = $('#cajaNombreUs').val();
                                    var _correo=$('#cajaEmail').val();
                                    var _apellidos = $('#cajaApellidos').val();
                                    var _genero = $('#cajaGenero').val();
                                    var _ciudad = $('#cajaCiudad').val();
                                    var _pais = $('#cajaPais').val();
                                    
                                    
                                    $('.posts').load("registro.php", {
                                        username: _username,
                                        passUsuario: _passUsuario,
                                        nombreUsuario: _nombreUsuario,
                                        correo: _correo,
                                        apellidos: _apellidos,
                                        genero: _genero,
                                        ciudad: _ciudad,
                                        pais: _pais
                                        
                                    });
                                    
                        }else{
                            //modal que nos avise de que es incorrecto
                        }
                                    
                                    
                                });

       
       
       
</script>