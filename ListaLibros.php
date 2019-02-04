<?php

   session_start();
   
   header("Content-Type: text/html;charset=utf-8");
   
   include('configuracion.php');
   include('misFunciones.php');
   
   //Vamos a obtener el género del libro
   
   
   $num=$_POST['num'];
   
   $consultaPorGenero;
   
   if($num==1){
       $generoLibro=$_POST['genero'];
       $consultaPorGenero="SELECT * FROM $bbdd.libro WHERE genero='$generoLibro'";
   }else if($num==2){
       $buscar=$_POST['buscar'];
       $consultaPorGenero="SELECT * FROM $bbdd.libro WHERE genero LIKE '%$buscar%' OR autor LIKE '%$buscar%' OR descripcion LIKE '%$buscar%' OR titulo LIKE '%$buscar%';"; 
   }
$listaLibroGenero=accesoBBDD($consultaPorGenero, $servidor, $bbdd, $usuario_mysql,$clave_mysql);


?>

<div>
    <?php
               foreach ($listaLibroGenero as $key => $value){
//                   echo '<pre>';
//                   print_r($value);
//                   echo '</pre>';
                   
                   ?>
    
    <div class="cajadelibros">
        <article>
	    <span><a href="#" class="image"><img src="<?php echo $value['portada'];?>"></a></span>
	    <div class="content">
		<h2><?php echo $value['titulo'];?></h2>
                <h3><?php echo $value['autor'];?></h3>
		<p>Sinópsis; <?php echo $value['descripcion'];?></p>
                <h4>Género; <?php echo $value['genero'];?></h4>
                <button class="botondelibro" value="<?php echo $value['IDLibro'];?>">Libro</button>
                <button class="botondeautor" value="<?php echo $value['autor'];?>">Autor</button>
	    </div>
	</article>
    </div>
<!--        <div class="cajadelibros border border-dark">
            <div class="row">
              <div class="portadadelibro col-3">
                  <a href="#" class="image"><img src="<?php echo $value['portada'];?>"></a></div>
              <div class="col-8">
                  <div class="titulodelibro row"><h2><?php echo $value['titulo'];?></3></div>
                  <div class="autordelibro row"><h3><?php echo $value['autor'];?></h3></div>
                  <div class="descripciondelibro row">Sinópsis; <?php echo $value['descripcion'];?></div>
                  <div class="generodelibro row"><h4>Género; <?php echo $value['genero'];?></h4></div>
                      <div class="row">
                          <div class="col-4"></div>
                          <div class="col-3">
                          <button class="botondelibro" value="<?php echo $value['IDLibro'];?>">Libro</button>
                          </div>
                          <div class="col-3">
                          <button class="botondeautor" value="<?php echo $value['autor'];?>">Autor</button>
                          </div>
                          <div class="col-2"></div>
                      </div>

              </div>
            </div>
        </div>-->
            <br/>
            <br/>
            <?php
               }
            ?>
</div>

<script>
    
    
    //Pagina de libro
    
    $(".botondelibro").click(function(){
         var _idlibro=$(this).val();
        
         $('#contenedor').load("PaginaLibro.php", {
                 idlibro: _idlibro
          });   
    });
    
    //Pagina de autor
    
    $(".botondeautor").click(function(){
        var _numeroPerfil=2;
        var _nombreUsuario=$(this).val();
        
        
        $('#contenedor').load("PaginaPerfil.php", {
            numeroPerfil: _numeroPerfil,
            nombreUsuario:_nombreUsuario
        })
    })
    
    



</script>

 <style>
     
     .cajadelibros {
    border-bottom: #dc3545 5px solid;
    height: 50%;
    width: 84%;
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


    </style>

