<?php

   session_start();
   
   include('configuracion.php');
   include('misFunciones.php');
   
   $idLibro=$_POST['idlibro'];
   
   $consultaLibro="SELECT * FROM $bbdd.libro WHERE IDLibro=$idLibro;";
   
   $datosLibro1=accesoBBDD($consultaLibro,$servidor, $bbdd, $usuario_mysql,$clave_mysql);
   $datosLibro = $datosLibro1[0]; //Lo guardamos en un array de una sola dimensión para que sea más fácil manejarlo.
   $datosID=$datosLibro['IDLibro'];
   
   //Comentarios
   $consultaComent="SELECT * FROM $bbdd.comentarios WHERE libro=$idLibro;";
   $listaComent=accesoBBDD($consultaComent,$servidor, $bbdd, $usuario_mysql,$clave_mysql);

?>

<div class="contenedorPerfil row" >
    <div class="col-4 border border-dark">
        <div class="row border border-dark">
            <div class="col-2"></div>
            <div class="col-8 border border-dark" >
                <img src="<?php echo $datosLibro["portada"];?>"></div>
            <div class="col-2"></div>
        </div>
        <div class="row border border-dark" >
            <button class="btn  btn-block disabled" type="button"><?php echo $datosLibro["titulo"];?></button>
            <br>
            <button id="autorPgLibro" class="btn  btn-block" type="button" value="<?php echo $datosLibro["autor"];?>">
                <?php echo $datosLibro["autor"];?></button>
            <br>
            <button class="btn  btn-block disabled" type="button"><?php echo $datosLibro["genero"];?></button>
            <br/>
             <button id="mLibro" class="btn  btn-block" type="button">Modificar</button>
        </div>
    </div>
    <div id="principal3" class="col-8 border border-dark">
        <div class="row border border-dark" ><?php echo $datosLibro["archivo10"];?></div>
        <div class="row border border-dark" >
            <div class="col-6 border border-dark">
                <button class="btn  btn-block" type="button">Comprar</button>
            </div>
            <div class="col-6 border border-dark">
                <button class="btn  btn-block" type="button" onclick="muestraModal();">Comentar</button>
            </div> 
        </div>
        <div class="row border border-dark">
        
                 <?php
              if($listaComent!=NULL){
                foreach ($listaComent as $key => $value){
//                   echo '<pre>';
//                   print_r($value);
//                   echo '</pre>';
                   
                   ?>
            <div class="cajadecoment">
                      <div class="titulodelibro row"><?php echo $value['usuario'];?></div>
                      <div class="descripciondelibro row"><?php echo $value['contenido'];?></div>   
            </div>
            <br/>
            <br/>
            <?php
               }
              }
            ?>
        
        </div>
    </div>
</div>

<!--MODAL DE INSERCIÓN DE COMENTARIOS-->

<div id="myModal" class="modal" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Inserta Tu Comentario</h5>  
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
    
    function muestraModal() {
        $('#myModal').modal('show');
    };
    
    //Ir a la página del autor
     
    $("#autorPgLibro").click(function(){
        var _numeroPerfil=2;
        var _nombreUsuario=$("#autorPgLibro").val();
        
        $('#contenedor').load("PaginaPerfil.php", {
            numeroPerfil: _numeroPerfil,
            nombreUsuario:_nombreUsuario
        })
    })
    
    //Función para insertar comentarios
    var libro=<?php echo $datosID?>;
    console.log(libro);
    
    $("#botonComentar").click(function(){
        var _libro=libro;
        var _contenido=$("#comentario").val();
        
        $('#contenedor').load("insertaComentario.php", {
            libro: _libro,
            contenido: _contenido
        })
    })
    
    //Función para modificar libro
    
    $("#mLibro").click(function(){
        var _libro=libro;
        
        $('#principal3').load("ModificaLibro.php", {
            libro: _libro  
        })
    })



</script>