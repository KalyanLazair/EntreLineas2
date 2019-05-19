<?php
   session_start();
?>

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
        <input id="cajaGenero" class="form-control" name="genero_libro" type="text" placeholder="Género">
    </div>
</div>
<div class="row filas">
    <div class="col-6 border border-dark">
        <button class="button primary fit" type="button">Muestra</button>
    </div>
    <div class="col-6 border border-dark">
        <input id="cajaArchivo10" class="form-control" name="archivo10_libro" type="text" placeholder="Archivo 10pg.">
    </div>
</div>
<div class="row filas">
    <div class="col-6 border border-dark">
        <button class="button primary fit" type="button">Archivo E-Book</button>
    </div>
    <div class="col-6 border border-dark">
        <input id="cajaArchivo" class="form-control" name="archivo_libro" type="text" placeholder="Archivo e-Book">
    </div>
</div>
<div class="row filas">
    <div class="col-6 border border-dark">
        <button class="button primary fit" type="button">Portada</button>
    </div>
    <div class="col-6 border border-dark">
        <input id="cajaPortada" class="form-control" name="portada_libro" type="text" placeholder="Portada">
    </div>
</div>
<div class="row filas">
    <div class="col-12">
        <button id="botonPublicar" class="btn " type="button" >Publicar</button>
    </div>
</div>


<!-- MODAL -->

<div id="modalInserta" class="modal" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">El libro se ha publicado correctamente</h5>  
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="comment">Comment:</label>
                    <textarea id="comentario" class="form-control" rows="5"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button id="botonComentar" type="button" class="btn btn-secondary" data-dismiss="modal">Comentar</button>
            </div>
        </div>
    </div>
</div>

<script>
    

    
   $('#botonPublicar').click(function () {
                 var autor="<?php echo $_SESSION['username']?>";
                
                                    // Read the input content
                   var _titulo = $('#cajaTitulo').val();
                   var _autor = autor;
                   var _descripcion = $('#cajaDesc').val();
                   var _genero=$('#cajaGenero').val();
                   var _archivo10 = $('#cajaArchivo10').val();
                   var _archivo = $('#cajaArchivo').val();
                   var _portada = $('#cajaPortada').val();
                                    
                                    
                        $('#principal2').load("publicar.php", {
                                titulo: _titulo,
                                autor: _autor,
                                descripcion: _descripcion,
                                genero: _genero,
                                archivo10: _archivo10,
                                archivo: _archivo,
                                portada: _portada                
                                    });       
                                    
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
    
</style>