<?php

//Vamos a guardar funciones

//Conexión a la BBDD a la que le vamos a pasar un query para hacer la consulta, y ese query nos va a
//devolver un fetch_assoc().

function accesoBBDD($consulta, $servidor, $bbdd, $usuario_mysql, $clave_mysql){
    
    //Conexión
    $conn = new mysqli($servidor, $usuario_mysql, $clave_mysql);
    //Chequeamos la conexión
    if($conn->connect_error){
        die("Connection failed: ". $conn->connect_error);
    }
    //Encoding
    $conn->set_charset('utf8');
    $conn->query('SET NAMES utf8');
    
    $result = $conn->query($consulta);
    
    $rows=array();
    while($row= $result->fetch_assoc()){
        $rows[]=$row;
    }
    
    
//    print_r($result);
    
    return $rows;
    
    $conn->close();
}

function iniciaSesion($servidor, $bbdd, $usuario_mysql, $clave_mysql, $nombreUsuario, $passUsuario){
   // Create connection
  $conn = new mysqli($servidor, $usuario_mysql, $clave_mysql);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  } 
   $sql = "SELECT * FROM $bbdd.usuario WHERE email='$nombreUsuario' AND userPass='$passUsuario'";
   
   //Encoding
    $conn->set_charset('utf8');
    $conn->query('SET NAMES utf8');
   
   $result = $conn->query($sql);
   
   if ($result->num_rows > 0) {
       // output data of each row   
       $row = $result->fetch_assoc();
//       while($row = $result->fetch_assoc()) {
//          echo $row["username"]." / ". $row["email"]. "<br>";
//       }   
       return $row;
   } else {
       echo "0 results";
   }
   $conn->close();
}

//Función para guardar datos

function guardaDatos($consulta, $servidor, $bbdd, $usuario_mysql, $clave_mysql){
    //Conexión
    $conn = new mysqli($servidor, $usuario_mysql, $clave_mysql);
    //Chequeamos la conexión
    if($conn->connect_error){
        die("Connection failed: ". $conn->connect_error);
    }
    //Encoding
    $conn->set_charset('utf8');
    $conn->query('SET NAMES utf8');
    
    $result = $conn->query($consulta);

   // print_r($result);
      
    $conn->close();
}


