<?php 
   session_start();
?>

<div class="registroContainer">
<div class="row filas">
    <div class="col-6 border border-dark">
        <button class="button primary fit" type="button">Nombre de Usuario</button>
    </div>
    <div class="col-6 border border-dark">
        <input id="cajaUser" class="form-control" name="usuario_nombre" type="text" placeholder="Usuario">
    </div>
</div>
<div class="row filas">
    <div class="col-6 border border-dark">
        <button class="button primary fit" type="button">Contraseña</button>
    </div>
    <div class="col-6 border border-dark">
        <input id="cajaPassword" class="form-control" name="usuario_nombre" type="password" placeholder="Contraseña">
    </div>
</div>
<div class="row filas">
    <div class="col-6 border border-dark">
        <button class="button primary fit" type="button">Repetir Contraseña</button>
    </div>
    <div class="col-6 border border-dark">
        <input id="cajaPasswordRe" class="form-control" name="usuario_nombre" type="password" placeholder="Repetir Contraseña">
    </div>
</div>
<div class="row filas">
    <div class="col-6 border border-dark">
        <button class="button primary fit" type="button">E-Mail</button>
    </div>
    <div class="col-6 border border-dark">
        <input id="cajaEmail" class="form-control" name="usuario_nombre" type="text" placeholder="Email">
    </div>
</div>
<div class="row filas">
    <div class="col-6 border border-dark">
        <button class="button primary fit" type="button">Nombre</button>
    </div>
    <div class="col-6 border border-dark">
        <input id="cajaNombreUs" class="form-control" name="usuario_nombre" type="text" placeholder="Nombre">
    </div>
</div>
<div class="row filas">
    <div class="col-6 border border-dark">
        <button class="button primary fit" type="button">Apellidos</button>
    </div>
    <div class="col-6 border border-dark">
        <input id="cajaApellidos" class="form-control" name="usuario_nombre" type="text" placeholder="Apellidos">
    </div>
</div>
<div class="row filas">
    <div class="col-6 border border-dark">
        <button class="button primary fit" type="button">Género</button>
    </div>
    <div class="col-6 border border-dark">
        <input id="cajaGenero" class="form-control" name="usuario_nombre" type="text" placeholder="Género">
    </div>
</div>
<div class="row filas">
    <div class="col-6 border border-dark">
        <button class="button primary fit" type="button">Ciudad</button>
    </div>
    <div class="col-6 border border-dark">
        <input id="cajaCiudad" class="form-control" name="usuario_nombre" type="text" placeholder="Ciudad">
    </div>
</div>
<div class="row filas">
    <div class="col-6 border border-dark">
        <button class="button primary fit" type="button">País</button>
    </div>
    <div class="col-6 border border-dark">
        <input id="cajaPais" class="form-control" name="usuario_nombre" type="text" placeholder="País">
    </div>
</div>
<div class="row filas">
    <div class="col-12">
        <button ID="botonRegistroUser" class="btn " type="button" >Registrarse</button>
    </div>
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

<style>
    .botonesenperfil{
    margin-top: 2px;
    margin-bottom:6px;
    margin-left:2%;
    margin-right:2%;
}

.filas{
    margin-top:2px;
    margin-bottom:6px;
}

.registroContainer{
    width:90%;
    margin-left:30%;
    margin-right:20%;
    margin-top:6%;
}
    
</style>