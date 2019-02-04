<?php
session_start(); // Inicia o continua la sesión del navegador en el servidor PHP

//header("Content-Type: text/html;charset=utf-8");

include('configuracion.php');
include('misFunciones.php');

$consultaPgPrincipal = "SELECT * FROM $bbdd.libro ORDER BY IDLibro DESC LIMIT 6;";
$portadasInicio = accesoBBDD($consultaPgPrincipal, $servidor, $bbdd, $usuario_mysql, $clave_mysql);
/*
  echo "<pre>";
  print_r($portadasInicio);
  echo "</pre>";
 */
foreach ($portadasInicio as $key => $value) {
    $arrayID[] = $value['IDLibro'];
    $arrayPortada[] = $value['portada'];
}
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title></title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="assets/css/main.css" />
    </head>
    <body >
        <div id="wrapper">
            <div id="main">
                <div class="inner">

                    <!-- Header -->
                    <header id="header">
                        <a href="index.html" class="logo"><strong>Editorial</strong> by HTML5 UP</a>
                        <ul class="icons">
                            <li>
                                <div class="volverIndex" >Banner</div>
                            </li>
                            <li>
                                <div class="" >
                                    <button id="perfilPrueba" class="btn " type="button" onclick="" value="Koenig">Perfil Usuario Prueba</button> 
                                </div>
                            </li>
                            <li>
                                <div class="" >
                                    <button class="btn " type="button" onclick="cargaRegistro();">Registrarse</button>
                                </div>
                            </li>
<?php
//isset busca si la variable $_Session existe.
if (isset($_SESSION['username'])) {
    ?>
                                <li>
                                    <div class="" > 
                                        <button id="buttonProfile" class="btn  " type="submit" onclick=""><?php echo $_SESSION['username'] ?></button>
                                        <a href="/EntreLineas/logoff.php">Log Off</a>
                                    </div>
                                </li>    
    <?php
} else {
    ?>
                                <li>
                                    <div class="">
                                        <button id="botonLoginPrincipal" class="btn" type="button" onclick="cargaLogin();">Login</button>
                                    </div>
                                </li>   
    <?php
}
?>




                        </ul>
                    </header>
                    <div id="contenedor" class="container">


                        <div class="row">
                            <!--<div class="col-3 border border-dark" >
            
                            </div>-->
                            <div class="posts">
<?php
$posicionLibro = 0;
foreach ($portadasInicio as &$valorLibro) {
    ?>
                <article>
                   <a href="#" class="image"><img src="<?php
                if ($portadasInicio[$posicionLibro]['portada'] !== "") {
                   echo $portadasInicio[$posicionLibro]['portada'];
                 } else {
                   echo "https://via.placeholder.com/150";
                 }
                  ?>"></a>
                  <h3><?php echo $portadasInicio[$posicionLibro]['titulo']; ?></h3>
                   <p><?php echo ($portadasInicio[$posicionLibro]['descripcion']); ?></p>
                   <ul class="actions">
                     <li><button class="btn  botonPerfilLibro" value="<?php echo $arrayID[$posicionLibro] ?>">Libro</button></li>
                    </ul>
                   </article>
                    <?php
                      $posicionLibro++;
                     }
                    ?>


                            </div>


                        </div>      
                    </div>
                </div>

            </div>




            <!-- Sidebar -->
            <div id="sidebar">
                
                <section id="search" class="alt">
			<form method="post" action="#">
				<input id="cajaBuscar" type="text" name="buscar_libros" placeholder="Buscar" />
			</form>
		</section>
                <button class="btn  botonBuscar" type="submit">Buscar</button>
                <br>
                <!--<div class="dropdown">
                  <button class="btn  dropbtn" type="button">Libros Por Género</button>
                  <div class="dropdown-content">
                      <button class="btn  btn-block botonGenero" value="Aventuras">Aventuras</button>
                      <button class="btn  btn-block botonGenero" value="Romantico">Romántico</button>
                      <button class="btn  btn-block botonGenero" value="Terror">Terror</button>
                      <button class="btn  btn-block botonGenero" value="Fantasia">Fantasía</button>
                      <button class="btn  btn-block botonGenero" value="Policiaca">Policiaca</button>
                      <button class="btn  btn-block botonGenero" value="Ciencia Ficcion">Ciencia Ficción</button>
                      <button class="btn  btn-block botonGenero" value="Infantil">Infantil</button>
                      <button class="btn  btn-block botonGenero" value="Biografia">Biografía</button>
                      <button class="btn  btn-block botonGenero" value="Ensayo">Ensayo</button>
                      <button class="btn  btn-block botonGenero" value="Politica">Política</button>
                  </div>
                </div>-->
                <!--<br>
                <br>
                <div class="dropdown">
                  <button class="btn  dropbtn" type="button">Lo Más y Menos</button>
                  <div class="dropdown-content">
                         <a href="#">Lo Más Valorado</a>
                         <a href="#">Lo Menos valorado</a>
                  </div>
                </div>
                <br>
                <br>-->
                <!-- <button class="btn " type="button">En Qué Consiste</button>
                 <br>
                 <br>
                 <button class="btn " type="button">Foro</button>-->
                <div class="inner">

                    <!-- Search -->
                    <!-- 	<section id="search" class="alt">
                                    <form method="post" action="#">
                                            <input type="text" name="query" id="query" placeholder="Search" />
                                    </form>
                            </section>-->

                    <!-- Menu -->
                    <nav id="menu">
                        <header class="major">
                            <h2>Menu</h2>
                        </header>
                        <ul>
                            <li><a class="botonGenero" data-value="Aventuras">Aventuras</a></li>
                            <li><a class="botonGenero" data-value="Romantico">Romántico</a></li>
                            <li><a class="botonGenero" data-value="Terror">Terror</a></li>
                            <li><a class="botonGenero" data-value="Fantasia">Fantasía</a></li>
                            <li><a class="botonGenero" data-value="Policiaca">Policiaca</a></li>
                            <li><a class="botonGenero" data-value="Ciencia Ficcion">Ciencia Ficción</a></li>
                            <li><a class="botonGenero" data-value="Infantil">Infantil</a></li>
                            <li><a class="botonGenero" data-value="Biografia">Biografía</a></li>
                            <li><a class="botonGenero" data-value="Ensayo">Ensayo</a></li>
                            <li><a class="botonGenero" data-value="Politica">Política</a></li>

                        </ul>
                    </nav>

                    <!-- Section -->
                    <section>
                        <header class="major">
                            <h2>Ante interdum</h2>
                        </header>
                        <div class="mini-posts">
                            <article>
                                <a href="#" class="image"><img src="images/pic07.jpg" alt="" /></a>
                                <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
                            </article>
                            <article>
                                <a href="#" class="image"><img src="images/pic08.jpg" alt="" /></a>
                                <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
                            </article>
                            <article>
                                <a href="#" class="image"><img src="images/pic09.jpg" alt="" /></a>
                                <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
                            </article>
                        </div>
                        <ul class="actions">
                            <li><a href="#" class="button">More</a></li>
                        </ul>
                    </section>

                    <!-- Section -->
                    <section>
                        <header class="major">
                            <h2>Get in touch</h2>
                        </header>
                        <p>Sed varius enim lorem ullamcorper dolore aliquam aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin sed aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
                        <ul class="contact">
                            <li class="fa-envelope-o"><a href="#">information@untitled.tld</a></li>
                            <li class="fa-phone">(000) 000-0000</li>
                            <li class="fa-home">1234 Somewhere Road #8254<br />
                                Nashville, TN 00000-0000</li>
                        </ul>
                    </section>

                    <!-- Footer -->
                    <footer id="footer">
                        <p class="copyright">&copy; Untitled. All rights reserved. Demo Images: <a href="https://unsplash.com">Unsplash</a>. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
                    </footer>

                </div>
            </div>



        </div>
    </body>
    <!-- Scripts -->

    <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>
    <script>


                                        function cargaRegistro() {
                                            $('.posts').load("PaginaRegistro.php");
                                        }
                                        ;

                                        function cargaLogin() {
                                            $('.posts').load("PaginaLogin.php");
                                        }
                                        ;

                                        function cargaPerfil() {
                                            $('#contenedor').load("PaginaPerfil.php");
                                        }
                                        ;

                                        function cargaLibro() {
                                            $('#contenedor').load("PaginaLibro.php");
                                        }
                                        ;



                                        $('.volverIndex').click(function () {
                                            window.location.reload();
                                        })

                                        //Funciones que nos permiten acceder al perfil de un usuario dependiendo de si es sesión o no.

                                        $("#buttonProfile").click(function () {
                                            var _numeroPerfil = 1;

                                            $('#contenedor').load("PaginaPerfil.php", {
                                                numeroPerfil: _numeroPerfil
                                            });
                                        });

                                        $("#perfilPrueba").click(function () {
                                            var _numeroPerfil = 2;
                                            var _nombreUsuario = $('#perfilPrueba').val();

                                            $('#contenedor').load("PaginaPerfil.php", {
                                                numeroPerfil: _numeroPerfil,
                                                nombreUsuario: _nombreUsuario
                                            })
                                        })

                                        //Funciones para obtener la lista de libros dependiendo de su género.

                                        $(".botonGenero").click(function () {
                                            var _gen = $(this).attr('data-value');
                                            var _num = 1; //Nos va a permitir variar la consulta en caso de buscar por género o por búsqueda.

                                            $('#contenedor').load("ListaLibros.php", {
                                                genero: _gen,
                                                num: _num
                                            });
                                        });

                                        //Función de buscar

                                        $(".botonBuscar").click(function () {
                                            var _buscar = $("#cajaBuscar").val();
                                            var _num = 2; //Nos va a permitir variar la consulta en caso de buscar por género o por búsqueda.

                                            $('.posts').load("ListaLibros.php", {
                                                buscar: _buscar,
                                                num: _num
                                            });
                                        });

                                        //Función de los botones de los seis libros de la portada

                                        $(".botonPerfilLibro").click(function () {
                                            var _idlibro = $(this).val();

                                            $('#contenedor').load("PaginaLibro.php", {
                                                idlibro: _idlibro
                                            });
                                        });


    </script>
    <style>
        .posts article .image img {
            width: 150px;
        }

        button.btn.btn-block.botonGenero {

            font-size: inherit;
        }



        div#contenedor .btn {
            width: 100%;

        }

    </style>

</html>
