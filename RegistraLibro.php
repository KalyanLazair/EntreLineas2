<?php
   session_start();
?>
<div>
 <form id="file-form" action="publicar.php" method="POST">
 <div class="row filas">
    <div class="col-6 border border-dark">
        <button class="button primary fit" type="button">Título</button>
    </div>
    <div class="col-6 border border-dark">
        <input id="cajaTitulo" class="form-control" name="titulo_libro" type="text" placeholder="Título">
    </div>
</div>
<div class="row filas">
    <div class="col-6 border border-dark">
        <button class="button primary fit" type="button">Descripción</button>
    </div>
    <div class="col-6 border border-dark">
        <input id="cajaDesc" class="form-control" name="descripcion_libro" type="text" placeholder="Descripción">
    </div>
</div>
<div class="row filas">
    <div class="col-6 border border-dark">
        <button class="button primary fit" type="button">Género</button>
    </div>
    <div class="col-6 border border-dark">
        <select name="demo-category" id="cajaGenero">
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
    <div class="col-6 border border-dark">
        <button class="button primary fit" type="button">Muestra</button>
    </div>
    <div class="col-6 border border-dark">
        
           Selecciona Imagen de Muestra PNG o JPG:
           <input type="file" name="archivoMuestra" id="cajaArchivo10">      
        
        
       <!-- <input id="cajaArchivo10" class="form-control" name="archivo10_libro" type="text" placeholder="Archivo 10pg."> -->
    </div>
</div>
<div class="row filas">
    <div class="col-6 border border-dark">
        <button class="button primary fit" type="button">Archivo E-Book</button>
    </div>
    <div class="col-6 border border-dark">
        
        
           Selecciona Archivo PDF:
           <input type="file" name="archivoPrincipal" id="cajaArchivo"> 
        
       <!-- <input id="cajaArchivo" class="form-control" name="archivo_libro" type="text" placeholder="Archivo e-Book"> -->
    </div>
</div>
<div class="row filas">
    <div class="col-6 border border-dark">
        <button class="button primary fit" type="button">Portada</button>
    </div>
    <div class="col-6 border border-dark">
        
           Selecciona Imagen de Portada PNG o JPG:
           <input type="file" name="archivoPortada" id="cajaPortada">      
        
        
        <!-- <input id="cajaPortada" class="form-control" name="portada_libro" type="text" placeholder="Portada"> -->
    </div>
</div>
<div class="row filas">
    <div class="col-12">
       <button id="botonPublicar" class="btn " type="submit">Publicar</button> 
    </div>
</div>

 </form>
    
</div>



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
    
    var form = document.getElementById('file-form');
    var fileSelect = document.getElementById('cajaArchivo');
    var otraputavariable = document.getElementById('cajaArchivo10');
    var comometoestoenunputoarray = document.getElementById('cajaPortada');
    var uploadButton = document.getElementById('botonPublicar'); 
    
    form.onsubmit = function(event) {
        event.preventDefault();

        var autor="<?php echo $_SESSION['username']?>";
                
                                    // Read the input content
                   var _titulo = $('#cajaTitulo').val();
                   var _autor = autor;
                   var _descripcion = $('#cajaDesc').val();
                   var _genero=$('#cajaGenero').val();
  
                   if(
                     document.getElementById("cajaArchivo10").files[0] != undefined && 
                     document.getElementById("cajaArchivo").files[0] != undefined && 
                     document.getElementById("cajaPortada").files[0] != undefined){
                      if(
                        document.getElementById("cajaArchivo10").files[0].name != "" && 
                        document.getElementById("cajaArchivo").files[0].name != "" && 
                        document.getElementById("cajaPortada").files[0].name != ""){
                       
                          var _archivo10 = document.getElementById("cajaArchivo10").files[0].name;
                          var _archivo = document.getElementById("cajaArchivo").files[0].name;
                          var _portada = document.getElementById("cajaPortada").files[0].name;
                       
                   
  
          // Update button text.
        uploadButton.innerHTML = 'Uploading...';

       // The rest of the code will go here...
       // Get the selected files from the input.
       var files = fileSelect.files; 
       var files2 = comometoestoenunputoarray.files; 
       var files3 = otraputavariable.files; 
       console.log(files.length);
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
            formData.append('archivoPrincipal', file, file.name);
            formData.append('archivoMuestra', files2[0], files2.name);
            formData.append('archivoPortada', files3[0], files3.name);
           }    
           
        formData.append("titulo", _titulo);
        formData.append("autor", _autor);
        formData.append("descripcion", _descripcion);
        formData.append("genero", _genero);
        formData.append("archivo10", _archivo10);
        formData.append("archivo", _archivo);
        formData.append("portada", _portada);
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
       xhr.open('POST', 'publicar.php', true);
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

    
   $('#botonPublicar').click(function () {
         
                   
      });
                                
                                
         
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
    margin-left:2%;
    margin-right:2%;
}

.filas{
    margin-top:2px;
    margin-bottom:6px;
}
    
</style>