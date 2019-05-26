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
    <div class="col-6 border border-dark">
        <button class="button primary fit" type="button">Muestra</button>
    </div>
    <div class="col-6 border border-dark">
        <input id="cajaArchivo10M" class="form-control" type="text" placeholder="Archivo 10pg.">
    </div>
</div>
<div class="row filas">
    <div class="col-6 border border-dark">
        <button class="button primary fit" type="button">Archivo E-Book</button>
    </div>
    <div class="col-6 border border-dark">
        <input id="cajaArchivoM" class="form-control" type="text" placeholder="Archivo e-Book">
    </div>
</div>
<div class="row filas">
    <div class="col-6 border border-dark">
        <button class="button primary fit" type="button">Portada</button>
    </div>
    <div class="col-6 border border-dark">
        <input id="cajaPortadaM" class="form-control" type="text" placeholder="Portada">
    </div>
</div>
<div class="row filas">
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


