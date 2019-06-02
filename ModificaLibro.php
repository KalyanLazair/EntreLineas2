<?php
     session_start();
   
     include('configuracion.php');
     include('misFunciones.php');
     
     $idLibro=$_POST['libro'];
     
     
   $consultaLibro="SELECT * FROM $bbdd.libro WHERE IDLibro=$idLibro;";
   
   $datosLibro1=accesoBBDD($consultaLibro,$servidor, $bbdd, $usuario_mysql,$clave_mysql);
   $datosLibro = $datosLibro1[0]; //Lo guardamos en un array de una sola dimensión para que sea más fácil manejarlo.
?>

<div class="row filas">
    <h2>Actualiza datos del libro</h2>
</div>
<div class="row filas">
    <h5>Todos los campos tienen que ser cumplimentados de acuerdo a las instrucciones. De no ser así el libro no podrá modificarse.</h5>
</div>

<div class="row filas">
    <div class="col-6 border border-dark">
        <button class="button primary fit" type="button">Título</button>
    </div>
    <div class="col-6 border border-dark">
        <input id="cajaTituloM" class="form-control" type="text" placeholder="Título">
    </div>
</div>
<div class="row filas">
    <div class="col-6 border border-dark">
        <button class="button primary fit" type="button">Desripción</button>
    </div>
    <div class="col-6 border border-dark">
        <input id="cajaDescM" class="form-control" type="text" placeholder="Descripción">
    </div>
</div>
<div class="row filas">
    <div class="col-6 border border-dark">
        <button class="button primary fit" type="button">Género</button>
    </div>
    <div class="col-6 border border-dark">
        <select name="demo-category" id="cajaGeneroM">
		<option value="Aventuras">Aventuras</option>
		<option value="Romantico">Romántico</option>
		<option value="Terror">Terror</option>
		<option value="Fantasia">Fantasía</option>
		<option value="Policiaca">Policiaca</option>
                <option value="Ciencia Ficcion">Ciencia Ficción</option>
                <option value="Infantil">Infantil</option>
                <option value="Biografia">Biografía</option>
                <option value="Ensayo">Ensayo</option>
                <option value="Politica">Política</option>
	</select>
    </div>
</div>
<div class="row filas">
    <div class="col-1"></div>
    <div class="col-10">
        <button id="botonActualizaLibro" class="btn " type="button" >Actualizar</button>
    </div>
    <div class="col-1"></div>
</div>

<div class="row filas">
    <h2>Actualiza archivo de muestra</h2>
</div>
<div class="row filas">
    <h4>El archivo de muestra tiene que ser una imagen PNG o JPG de alguna página del libro.</h4>
</div>
<form id="file-form" action="actualizaMuestra.php" method="POST">
    <div class="row filas">
        <div class="col-6 border border-dark">
            <button class="button primary fit" type="button">Muestra</button>
        </div>
        <div class="col-6 border border-dark">

                 Selecciona archivo de muestra:
               <input type="file" name="archivoMuestra" id="cajaMuestra"> 

            <!--<input id="cajaF" class="form-control" type="text" placeholder="Foto">-->
        </div>
    </div>
    <div class="row filas">
        <div class="col-1"></div>
        <div class="col-10">
            <button id="botonFoto" class="btn" type="submit">Actualiza Muestra</button>
        </div>
        <div class="col-1"></div>
    </div>
</form>


<div class="row filas">
    <h2>Actualiza archivo PDF</h2>
</div>
<div class="row filas">
    <h4>El archivo principal del libro tiene que ser en formato PDF.</h4>
</div>

<form id="filePrincipal" action="actualizaArchivoL.php" method="POST">
    <div class="row filas">
        <div class="col-6 border border-dark">
            <button class="button primary fit" type="button">Libro</button>
        </div>
        <div class="col-6 border border-dark">

                 Selecciona Imagen de Portada PNG o JPG:
               <input type="file" name="archivoLibro" id="cajaLibro"> 

            <!--<input id="cajaF" class="form-control" type="text" placeholder="Foto">-->
        </div>
    </div>
    <div class="row filas">
        <div class="col-1"></div>
        <div class="col-10">
            <button id="botonArchivoP" class="btn" type="submit">Actualiza Libro</button>
        </div>
        <div class="col-1"></div>
    </div>
</form>


<div class="row filas">
    <h2>Actualiza imagen de portada</h2>
</div>
<div class="row filas">
    <h4>La portada tiene que ser una imagen en formato PNG o JPG.</h4>
</div>

<form id="file-form" action="actualizaPortada.php" method="POST">
    <div class="row filas">
        <div class="col-6 border border-dark">
            <button class="button primary fit" type="button">Portada</button>
        </div>
        <div class="col-6 border border-dark">

                 Selecciona Imagen de Portada PNG o JPG:
               <input type="file" name="archivoPortada" id="cajaPortada"> 

            <!--<input id="cajaF" class="form-control" type="text" placeholder="Foto">-->
        </div>
    </div>
    <div class="row filas">
        <div class="col-1"></div>
        <div class="col-10">
            <button id="botonFoto" class="btn" type="submit">Actualiza Portada</button>
        </div>
        <div class="col-1"></div>
    </div>
</form>

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
    
    rellenaDatosLibro();
    
    function rellenaDatosLibro(){
        cajaTituloM.value="<?php echo $datosLibro['titulo'] ?>";
        cajaDescM.value="<?php echo $datosLibro['descripcion'] ?>";
        cajaGeneroM.value="<?php echo $datosLibro['genero'] ?>";
    }
    
$('#botonActualizaLibro').click(function () {
                 var autor="<?php echo $_SESSION['username']?>"; //Esta es un string, usando comillas por eso.
                 var libroID=<?php echo $idLibro?>;  //Esta es un int, por eso no usamos comillas.
                     
                   var _titulo = $('#cajaTituloM').val();
                   var _descripcion = $('#cajaDescM').val();
                   var _genero=$('#cajaGeneroM').val();
                                    
 
                        $('#principal3').load("actualizaLibro.php", {
                                libroID: libroID,
                                titulo: _titulo,
                                autor: autor,
                                descripcion: _descripcion,
                                genero: _genero              
                                    });       
                                    
                                });
                                
    //Actualiza Archivo Principal
     
    var form = document.getElementById('filePrincipal');
    var fileSelect = document.getElementById('cajaLibro');
    var uploadButton = document.getElementById('botonArchivoP'); 
    
    form.onsubmit = function(event) {
        event.preventDefault();

              if(document.getElementById("cajaLibro").files[0] != undefined){
                      if(
                        document.getElementById("cajaLibro").files[0].name != ""){
                       
                          var _archivo = document.getElementById("cajaLibro").files[0].name;

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
          /* if (!file.type.match('image.*')) {
              continue;
           }*/

           // Add the file to the request.
            formData.append('archivoLibro', file, file.name);
           }
           
           formData.append("archivo", _archivo);
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
       xhr.open('POST', 'actualizaArchivoLibro.php', true);
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



//Funciones modales

 function muestraModalArchivos() {
        $('#modalArchivos').modal('show');
    };
    
     function muestraModalInserta() {
        $('#modalActualizaL').modal('show');
    };
    
      function muestraModalNoInserta(){
         $('#modalNoActualizaL').modal('show'); 
      };
      

    
     var idDeLibro=<?php echo $idLibro?>;

    function volverPgLibro(){
        var _idLibro=idDeLibro;
        
        $("#contenedor").load("PaginaLibro.php", {
            idlibro: _idLibro
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


