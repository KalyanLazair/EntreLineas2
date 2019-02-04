<?php
     session_start();
   
     include('configuracion.php');
     include('misFunciones.php');
     
     $idLibro=$_POST['libro'];
     
     echo $idLibro;
     
   $consultaLibro="SELECT * FROM $bbdd.libro WHERE IDLibro=$idLibro;";
   
   $datosLibro1=accesoBBDD($consultaLibro,$servidor, $bbdd, $usuario_mysql,$clave_mysql);
   $datosLibro = $datosLibro1[0]; //Lo guardamos en un array de una sola dimensión para que sea más fácil manejarlo.
?>

<div class="row">
    <div class="col-6 border border-dark">
        <p>Título</p>
        <p>Descripcion</p>
        <p>Género</p>
        <p>Archivo Diez Páginas</p>
        <p>Archivo E-Book</p>
        <p>Portada</p>
    </div>
    <div class="col-6 border border-dark">
        <input id="cajaTituloM" class="form-control" type="text" placeholder="Título">
        <input id="cajaDescM" class="form-control" type="text" placeholder="Descripción">
        <input id="cajaGeneroM" class="form-control" type="text" placeholder="Género">
        <input id="cajaArchivo10M" class="form-control" type="text" placeholder="Archivo 10pg.">
        <input id="cajaArchivoM" class="form-control" type="text" placeholder="Archivo e-Book">
        <input id="cajaPortadaM" class="form-control" type="text" placeholder="Portada">
    </div>
</div>
<div class="row">
    <div class="col-12">
        <button id="botonActualizaLibro" class="btn " type="button" >Actualizar</button>
    </div>
</div>

<script>
    
    rellenaDatosLibro();
    
    function rellenaDatosLibro(){
        cajaTituloM.value="<?php echo $datosLibro['titulo'] ?>";
        cajaDescM.value="<?php echo $datosLibro['descripcion'] ?>";
        cajaGeneroM.value="<?php echo $datosLibro['genero'] ?>";
        cajaArchivo10M.value="<?php echo $datosLibro['archivo10'] ?>";
        cajaArchivoM.value="<?php echo $datosLibro['archivo'] ?>";
        cajaPortadaM.value="<?php echo $datosLibro['portada'] ?>";
    }
    
$('#botonActualizaLibro').click(function () {
                 var autor="<?php echo $_SESSION['username']?>"; //Esta es un string, usando comillas por eso.
                 var libroID=<?php echo $idLibro?>;  //Esta es un int, por eso no usamos comillas.
                     
                   var _titulo = $('#cajaTituloM').val();
                   var _descripcion = $('#cajaDescM').val();
                   var _genero=$('#cajaGeneroM').val();
                   var _archivo10 = $('#cajaArchivo10M').val();
                   var _archivo = $('#cajaArchivoM').val();
                   var _portada = $('#cajaPortadaM').val();
                                    
                                    
                        $('#principal3').load("actualizaLibro.php", {
                                libroID: libroID,
                                titulo: _titulo,
                                autor: autor,
                                descripcion: _descripcion,
                                genero: _genero,
                                archivo10: _archivo10,
                                archivo: _archivo,
                                portada: _portada                
                                    });       
                                    
                                });

</script>


