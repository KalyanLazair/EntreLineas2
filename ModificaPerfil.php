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


?>
<div class="row filas">
    <h2>Actualiza datos personales</h2>
</div>
<div class="row filas">
    <div class="col-6 border border-dark">
        <button class="button primary fit" type="button">Nombre</button>
    </div>
    <div class="col-6 border border-dark">
        <input id="cajaN" class="form-control" type="text" placeholder="Nombre">
    </div>
</div>
<div class="row filas">
    <div class="col-6 border border-dark">
        <button class="button primary fit" type="button">Apellidos</button>
    </div>
    <div class="col-6 border border-dark">
        <input id="cajaA" class="form-control" type="text" placeholder="Apellidos">
    </div>
</div>
<div class="row filas">
    <div class="col-6 border border-dark">
        <button class="button primary fit" type="button">Género</button>
    </div>
    <div class="col-6 border border-dark">
        <input id="cajaG" class="form-control" type="text" placeholder="Género">
    </div>
</div>
<div class="row filas">
    <div class="col-6 border border-dark">
        <button class="button primary fit" type="button">Ciudad</button>
    </div>
    <div class="col-6 border border-dark">
        <input id="cajaC" class="form-control" type="text" placeholder="Ciudad">
    </div>
</div>
<div class="row filas">
    <div class="col-6 border border-dark">
        <button class="button primary fit" type="button">País</button>
    </div>
    <div class="col-6 border border-dark">
        <input id="cajaP" class="form-control" type="text" placeholder="País">
    </div>
</div>
<div class="row filas">
    <div class="col-6 border border-dark">
        <button class="button primary fit" type="button">Descripción</button>
    </div>
    <div class="col-6 border border-dark">
        <input id="cajaD" class="form-control" type="text" placeholder="Descripción">
    </div>
</div>
<div class="row filas">
    <div class="col-12">
        <button id="botonActualizar" class="btn " type="button" >Actualizar</button>
    </div>
</div>

<div class="row filas">
    <h2>Actualiza imagen de perfil</h2>
</div>
<form id="file-form" action="actualizaFoto.php" method="POST">
    <div class="row filas">
        <div class="col-6 border border-dark">
            <button class="button primary fit" type="button">Foto</button>
        </div>
        <div class="col-6 border border-dark">

                 Selecciona Imagen de Portada PNG o JPG:
               <input type="file" name="archivoFoto" id="cajaF"> 
            <
            <!--<input id="cajaF" class="form-control" type="text" placeholder="Foto">-->
        </div>
    </div>
    <div class="row filas">
        <div class="col-1"></div>
        <div class="col-10">
            <button id="botonFoto" class="btn" type="submit">Actualiza Foto</button>
        </div>
        <div class="col-1"></div>
    </div>
</form>


<!--MODALES -->


<!--MODAL error faltan archivos-->

<<div id="modalArchivos" class="modal" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Faltan archivos. Compruebe que todos los campos se han rellenado correctamente.</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
</div>

 <!-- modal inserta -->

   <div id="modalInserta" class="modal" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">La imagen se ha actualizado correctamente.</h3>
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
                <h3 class="modal-title">No se ha podido actualizar la imagen.</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
</div>


<script>
    
    //Modifica perfil

   rellenaDatosPerfil();
    
    function rellenaDatosPerfil(){
        cajaN.value="<?php echo $_SESSION['nombre']; ?>";
        cajaA.value="<?php echo $_SESSION['apellidos']; ?>";
        cajaG.value="<?php echo $_SESSION['sexo']; ?>";
        cajaC.value="<?php echo $_SESSION['ciudad']; ?>";
        cajaP.value="<?php echo $_SESSION['pais']; ?>";
        cajaD.value="<?php echo $_SESSION['descripcion']; ?>";
    }
    
    $('#botonActualizar').click(function () {
                 var userID=<?php echo $_SESSION['IDUser']?>; 
                     
                   var _nombre = $('#cajaN').val();
                   var _apellidos = $('#cajaA').val();
                   var _sexo=$('#cajaG').val();
                   var _ciudad = $('#cajaC').val();
                   var _pais = $('#cajaP').val();
                   var _descripcion = $('#cajaD').val();
                                    
                                    
                        $('#principal2').load("actualizaDatos.php", {
                                userID: userID,
                                nombre: _nombre,
                                apellidos: _apellidos,
                                sexo: _sexo,
                                ciudad: _ciudad,
                                pais: _pais,
                                descripcion: _descripcion              
                                    });       
                                    
                                });
                                
     //Actualiza foto
     
    var form = document.getElementById('file-form');
    var fileSelect = document.getElementById('cajaF');
    var uploadButton = document.getElementById('botonFoto'); 
    
    form.onsubmit = function(event) {
        event.preventDefault();

              if(document.getElementById("cajaF").files[0] != undefined){
                      if(
                        document.getElementById("cajaF").files[0].name != ""){
                       
                          var _foto = document.getElementById("cajaF").files[0].name;

          // Update button text.
        uploadButton.innerHTML = 'Uploading...';

       // The rest of the code will go here...
       // Get the selected files from the input.
       var files = fileSelect.files; 
       // Create a new FormData object.
       var formData = new FormData();
       // Loop through each of the selected files.
       for (var i = 0; i < files.length; i++) {
           var file = files[i];

           // Check the file type.
           if (!file.type.match('image.*')) {
              continue;
           }

           // Add the file to the request.
            formData.append('archivoFoto', file, file.name);
           }
           
           formData.append("foto", _foto);
       // Set up the request.
       var xhr = new XMLHttpRequest();
       xhr.onreadystatechange = function() {
            if (xhr.readyState == 4) {
                var responseStatus = xhr.response.replace(/^\s\n+|\s\n+$/g,'');
                if(responseStatus == "success"){
                   muestraModalInserta(); 
                }else{
                    muestraModalNoInserta();
                }       
            }
        }
       // Open the connection.
       xhr.open('POST', 'actualizaFoto.php', true);
       // Set up a handler for when the request finishes.
         xhr.onload = function () {
           if (xhr.status === 200) {
             // File(s) uploaded.
             uploadButton.innerHTML = 'Upload';
           } else {
              alert('An error occurred!');
           }
        };
        
        // Send the Data.
        xhr.send(formData);

                     }   
                   }else{
                       muestraModalArchivos();
                   }

};

   function muestraModalArchivos() {
        $('#modalArchivos').modal('show');
    };
    
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

<style>
    .botonesenperfil{
    margin-top: 2px;
    margin-bottom:6px;
    margin-left:1%;
    margin-right:2%;
}

.filas{
    margin-top:2px;
    margin-bottom:6px;
    margin-right: 4%;
    margin-left:2%;
}
    
</style>

