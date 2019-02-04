<?php
  session_start();
   
   include('configuracion.php');
   include('misFunciones.php');
   
$IDusuario=$_SESSION['IDUser'];
$consulta= "SELECT * FROM $bbdd.userdata WHERE IDUserData=$IDusuario;";

$resultado2 = accesoBBDD($consulta, $servidor, $bbdd, $usuario_mysql,$clave_mysql);

if($resultado2 != NULL){
    //Datos procesados, se procesa el array /array to string/ con el foreach.
    foreach ($resultado2 as $key => $value) {
           $_SESSION['nombre']=$value['nombre'];
            $_SESSION['apellidos']=$value['apellidos'];
            $_SESSION['sexo']=$value['sexo'];
            $_SESSION['ciudad']=$value['ciudad'];
            $_SESSION['pais']=$value['pais'];
             $_SESSION['descripcion']=$value['descripcion'];
            $_SESSION['foto']=$value['foto'];   
    }
    
}

echo $_SESSION['nombre'];

?>

<div class="row">
    <div class="col-6 border border-dark">
        <p>Nombre</p>
        <p>Apellidos</p>
        <p>Género</p>
        <p>Ciudad</p>
        <p>País</p>
        <p>Descripción</p>
        <p>Foto</p>
    </div>
    <div class="col-6 border border-dark">
        <input id="cajaN" class="form-control" type="text" placeholder="Nombre">
        <input id="cajaA" class="form-control" type="text" placeholder="Apellidos">
        <input id="cajaG" class="form-control" type="text" placeholder="Género">
        <input id="cajaC" class="form-control" type="text" placeholder="Ciudad">
        <input id="cajaP" class="form-control" type="text" placeholder="País">
        <input id="cajaD" class="form-control" type="text" placeholder="Descripción">
        <input id="cajaF" class="form-control" type="text" placeholder="Foto">
    </div>
</div>
<div class="row">
    <div class="col-12">
        <button id="botonActualizar" class="btn " type="button" >Actualizar</button>
    </div>
</div>

<script>

   rellenaDatosPerfil();
    
    function rellenaDatosPerfil(){
        cajaN.value="<?php echo $_SESSION['nombre']; ?>";
        cajaA.value="<?php echo $_SESSION['apellidos']; ?>";
        cajaG.value="<?php echo $_SESSION['sexo']; ?>";
        cajaC.value="<?php echo $_SESSION['ciudad']; ?>";
        cajaP.value="<?php echo $_SESSION['pais']; ?>";
        cajaD.value="<?php echo $_SESSION['descripcion']; ?>";
        cajaF.value="<?php echo $_SESSION['foto']; ?>";
    }
    
    $('#botonActualizar').click(function () {
                 var userID=<?php echo $_SESSION['IDUser']?>; 
                     
                   var _nombre = $('#cajaN').val();
                   var _apellidos = $('#cajaA').val();
                   var _sexo=$('#cajaG').val();
                   var _ciudad = $('#cajaC').val();
                   var _pais = $('#cajaP').val();
                   var _descripcion = $('#cajaD').val();
                   var _foto= $('#cajaF').val();
                                    
                                    
                        $('#principal2').load("actualizaDatos.php", {
                                userID: userID,
                                nombre: _nombre,
                                apellidos: _apellidos,
                                sexo: _sexo,
                                ciudad: _ciudad,
                                pais: _pais,
                                descripcion: _descripcion,
                                foto: _foto                
                                    });       
                                    
                                });
     

</script>

