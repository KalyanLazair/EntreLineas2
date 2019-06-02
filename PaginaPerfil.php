<?php
   session_start();
   
   include('configuracion.php');
   include('misFunciones.php');
   
//Declaramos las variables que vamos a utilizar
 
$nombreUser;
$apellidoUser;
$sexoUser;
$paisUser;
$ciudadUser;
$descripcionUser;
$fotoUser;
//En esta variable vamos a guardar el nombre de usuario cuando no se trate del usuario que ha abierto la sesión.
$nombreUsuario;
//Autor que vamos a usar en las siguientes consultas
$autor;

//Esta variable la vamos a utilizar asignándole por post valor 1/2 en función de si es el botón de sesión o el de
//otro usuario el que hemos pulsado.
$numeroPerfil=$_POST['numeroPerfil'];
   
//echo $numeroPerfil;

//Vamos a cargar los datos de usuario cuando este sea otro que no el de sesión.
if($numeroPerfil==2){
    $nombreUsuario=$_POST['nombreUsuario']; //Lo que le pasamos si es otro usuario distinto al de sesión.
    $consultaUser="SELECT IDUser FROM $bbdd.usuario WHERE username='$nombreUsuario';";
    $resultadoUsuario=accesoBBDD($consultaUser, $servidor, $bbdd, $usuario_mysql,$clave_mysql);

    //Conversión array to string
    foreach ($resultadoUsuario as $key => $value){
        $claveUsuario=$value['IDUser'];   
    }

    $consultaDatosUser="SELECT * FROM $bbdd.userdata WHERE IDUserData=$claveUsuario";
    $resultadoDatosUser=accesoBBDD($consultaDatosUser, $servidor, $bbdd, $usuario_mysql,$clave_mysql);
//procesamos el array para sacar los valores.
    foreach($resultadoDatosUser as $key => $value){
        $nombreUser=$value['nombre'];
        $apellidoUser=$value['apellidos'];
        $sexoUser=$value['sexo'];
        $paisUser=$value['pais'];
        $ciudadUser=$value['ciudad'];
        $descripcionUser=$value['descripcion'];
        $fotoUser=$value['foto'];
    }
    
    $autor=$nombreUsuario;   
}else if($numeroPerfil==1){
    
    //Vamos a sacar los datos del usuario que tenga el IDUser igual al que le pasamos como parámetro.
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
    
    $autor=$_SESSION['username'];
    //Datos
    $nombreUser=$_SESSION['nombre'];
    $apellidoUser=$_SESSION['apellidos'];
    $sexoUser=$_SESSION['sexo'];
    $paisUser=$_SESSION['pais'];
    $ciudadUser=$_SESSION['ciudad'];
    $descripcionUser=$_SESSION['descripcion'];
    $fotoUser=$_SESSION['foto'];
}  

//Lista de libros publicados por el usuario que le vamos a pasar como parámetro.

$consultaLibros="SELECT * FROM bbddel.libro WHERE autor='$autor';";
$listaLibros = accesoBBDD($consultaLibros, $servidor, $bbdd, $usuario_mysql,$clave_mysql);

//$libros = array();
//echo '<pre>';
//print_r($listaLibros);
//echo '</pre>';
//
//$myJson = json_encode($listaLibros);
//
//print_r($myJson);


//if($listaLibros != NULL){
//    foreach ($listaLibros as $key => $value) {
//           $libros[$key]['IDLibro']=$value['IDLibro'];
//           $libros[$key]['titulo']=$value['titulo'];
//            $libros[$key]['descripcion']=$value['descripcion'];
//            $libros[$key]['genero']=$value['genero'];
//            $libros[$key]['archivo10']=$value['archivo10'];
//            $libros[$key]['archivo']=$value['archivo'];
//           $libros[$key]['portada']=$value['portada'];   
//    }
//}
//echo '<pre>';
//print_r($libros);
//echo '</pre>';

?>

<div class="contenedorPerfil row" >
    <div class="col-4 border border-dark barraCentral">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8 border border-dark fotoPerfil" >
                <a href="#" class="image"><img src="<?php echo $fotoUser;?>"></a>
            <div class="col-2"></div>
        </div>
        </div>
        <div class="row" >
            <a href="#" class="button primary fit datos"><?php echo $nombreUser. " " . $apellidoUser;?></a>
            <br/>
            <a href="#" class="button primary fit datos"><?php echo $sexoUser;?></a> 
            <br>
            <a href="#" class="button primary fit datos"><?php echo $ciudadUser;?></a>
            <br>
            <a href="#" class="button primary fit datos"><?php echo $paisUser;?></a>
            <br>
            <h3>Acciones</h3>
            <br>
            <button class="btn botonesenperfil" type="button">Favoritos</button>
            <br>
            <?php
          //isset busca si la variable $_Session existe.
          if ($_SESSION['username'] == $autor) {
              ?>
                <button id="botonModifica" class="btn botonesenperfil" type="button" onclick="modificar();">Modificar Perfil</button>                 
         <?php
         }
          ?>
            <br/>
            
            <?php
          //isset busca si la variable $_Session existe.
          if ($_SESSION['username'] == $autor) {
              ?>
            <button class="btn botonesenperfil" type="button" onclick="publicaLibro();">Publicar Libro</button>
          <?php
         }
          ?>
        </div>
    </div>
    <div id="principal2" class="col-8 border border-dark">
        <div class="row border border-dark descripcionUsuario" >
            <h2>Sobre el Autor;</h2>
            <p><?php echo $descripcionUser;?></p></div>
        <div id="listaLibros" class="row" >
            
            <?php
               foreach ($listaLibros as $key => $value){
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
	    </div>
	  </article>
      </div>
            
            
            <?php
               }
            ?>
        </div>
    </div>
  </div>


<script>
    
    $(".botondelibro").click(function(){
         var _idlibro=$(this).val();
        
         $('#contenedor').load("PaginaLibro.php", {
                 idlibro: _idlibro
          });   
    });
   
   function publicaLibro(){
       $('#principal2').load('RegistraLibro.php');
   }
   
   function modificar(){
       $('#principal2').load('ModificaPerfil.php');
   }

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
    margin-top:4%;
    margin-bottom:4%;
    padding: 6%;
}

#principal2{
    float:left;
}

    </style>
