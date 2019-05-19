<?php

   session_start();
   
   include('configuracion.php');
   include('misFunciones.php');
   
   $idLibro=$_POST['idlibro'];
   
   $consultaLibro="SELECT * FROM $bbdd.libro WHERE IDLibro=$idLibro;";
   
   $datosLibro1=accesoBBDD($consultaLibro,$servidor, $bbdd, $usuario_mysql,$clave_mysql);
   $datosLibro = $datosLibro1[0]; //Lo guardamos en un array de una sola dimensión para que sea más fácil manejarlo.
   $datosID=$datosLibro['IDLibro'];
   $datosAutor=$datosLibro['autor'];
   
   //Comentarios
   $consultaComent="SELECT * FROM $bbdd.comentarios WHERE libro=$idLibro;";
   $listaComent=accesoBBDD($consultaComent,$servidor, $bbdd, $usuario_mysql,$clave_mysql);

?>

<div class="contenedorPerfil border border-dark row" >
    <div class="col-4">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8" >
                <a href="#" class="image"><img src="<?php echo $datosLibro["portada"];?>"></a>
            </div>
            <div class="col-2"></div>
        </div>
        <div class="row" >
            <button class="button primary fit datos" type="button"><?php echo $datosLibro["titulo"];?></button>
            <br>
            <button id="autorPgLibro" class="button primary fit datos" type="button" value="<?php echo $datosLibro["autor"];?>">
                <?php echo $datosLibro["autor"];?></button>
            <br>
            <button class="button primary fit datos" type="button"><?php echo $datosLibro["genero"];?></button>
            <br/>
            <?php
                    if($_SESSION['username'] == $datosAutor){
                ?>          
             <button id="mLibro" class="btn botonesenperfil" type="button">Modificar</button>
             <?php
                 }
             ?>
        </div>
    </div>
    <div id="principal3" class="col-8 border border-dark">
        <div class="row" ><a href="#"><img src="<?php echo $datosLibro["archivo10"];?>" id="textoMuestra"></a></div>
        <div class="row" >
            <div class="col-6">
                <button class="btn botonesCC" type="button">Comprar</button>
            </div>
            <div class="col-6"> 
                <button class="btn botonesCC" type="button" onclick="muestraModal();">Comentar</button>
            </div> 
        </div>
        <div class="row">
        
                 <?php
              if($listaComent!=NULL){
                foreach ($listaComent as $key => $value){
//                   echo '<pre>';
//                   print_r($value);
//                   echo '</pre>';
                   
                   ?>
   
            <div class="cajadelibros">
              <article>
	       <span><a href="#" class="image"><img src="<?php echo $value['fotouser'];?>"></a></span>
	          <div class="content">
		    <h2><?php echo $value['usuario'];?></h2>
		    <p><?php echo $value['contenido'];?></p>
	          </div>
	      </article>
          </div>
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

 <style>

.cajadelibros {
    border-bottom: #dc3545 5px solid;
    width: 84%;
    margin-bottom:50px;
    margin-left: 10%;
}


.content {
    width: 65%;
    float: left;
    margin-left: 4%;
}

a.image {

    float: left;
}

img {
    width: 150px;
    float: left;
}

.datos{
    margin-top: 2px;
    margin-bottom:2px;
    margin-left:10%;
    margin-right:10%;
}

.botonesenperfil{
    margin-top: 2px;
    margin-bottom:6px;
    margin-left:10%;
    margin-right:10%;
}

.fotoPerfil{
    margin:4%;
    max-width: 200px;
    max-height:300px;
}

.barraCentral{
    float:left;    
}

.descripcionUsuario{
    width:80%;
    height: 300px;
    margin:auto;
    padding: 6%;
}

#principal2{
    float:left;
}

#textoMuestra{
    margin:auto;
    width:100%;
    height:100%;
    padding:4%;
}

.botonesCC{
    margin-top: 2px;
    margin-bottom:6px;
    margin-left:2%;
    margin-right:2%;
}

    </style>

