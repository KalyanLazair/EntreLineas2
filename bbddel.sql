-- MySQL dump 10.16  Distrib 10.1.35-MariaDB, for Win32 (AMD64)
--
-- Host: 127.0.0.1    Database: bbddel
-- ------------------------------------------------------
-- Server version	10.1.35-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comentarios` (
  `IDComment` int(15) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) NOT NULL,
  `libro` int(15) NOT NULL,
  `contenido` text,
  PRIMARY KEY (`IDComment`),
  UNIQUE KEY `IDComment` (`IDComment`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentarios`
--

LOCK TABLES `comentarios` WRITE;
/*!40000 ALTER TABLE `comentarios` DISABLE KEYS */;
INSERT INTO `comentarios` VALUES (1,'Kalyan',1,'Lorem ipsum dolor sit amet consectetur adipiscing elit integer, vulputate tincidunt turpis potenti scelerisque at nulla dictum, mattis ultricies primis conubia curabitur eros nascetur.'),(2,'Kalyan',1,'Lorem ipsum dolor sit amet consectetur adipiscing elit integer, vulputate tincidunt turpis potenti scelerisque at nulla dictum, mattis ultricies primis conubia curabitur eros nascetur.'),(3,'Koenig',2,'Lorem ipsum dolor sit amet consectetur adipiscing elit integer, vulputate tincidunt turpis potenti scelerisque at nulla dictum, mattis ultricies primis conubia curabitur eros nascetur.'),(4,'Q',3,'Lorem ipsum dolor sit amet consectetur adipiscing elit integer, vulputate tincidunt turpis potenti scelerisque at nulla dictum, mattis ultricies primis conubia curabitur eros nascetur.'),(5,'Kalyan',4,'Lorem ipsum dolor sit amet consectetur adipiscing elit integer, vulputate tincidunt turpis potenti scelerisque at nulla dictum, mattis ultricies primis conubia curabitur eros nascetur.'),(6,'Q',2,'Lorem ipsum dolor sit amet consectetur adipiscing elit integer, vulputate tincidunt turpis potenti scelerisque at nulla dictum, mattis ultricies primis conubia curabitur eros nascetur.'),(7,'Koenig',1,'Lorem ipsum dolor sit amet consectetur adipiscing elit integer, vulputate tincidunt turpis potenti scelerisque at nulla dictum, mattis ultricies primis conubia curabitur eros nascetur.'),(8,'Kalyan',3,'Lorem ipsum dolor sit amet consectetur adipiscing elit integer, vulputate tincidunt turpis potenti scelerisque at nulla dictum, mattis ultricies primis conubia curabitur eros nascetur.'),(9,'Q',4,'Lorem ipsum dolor sit amet consectetur adipiscing elit integer, vulputate tincidunt turpis potenti scelerisque at nulla dictum, mattis ultricies primis conubia curabitur eros nascetur.'),(10,'Koenig',3,'Lorem ipsum dolor sit amet consectetur adipiscing elit integer, vulputate tincidunt turpis potenti scelerisque at nulla dictum, mattis ultricies primis conubia curabitur eros nascetur.'),(11,'Koenig',4,'Lorem ipsum dolor sit amet consectetur adipiscing elit integer, vulputate tincidunt turpis potenti scelerisque at nulla dictum, mattis ultricies primis conubia curabitur eros nascetur.'),(12,'Kalyan',9,'Lorem ipsum dolor sit amet consectetur adipiscing elit integer, vulputate tincidunt turpis potenti scelerisque at nulla dictum, mattis ultricies primis conubia curabitur eros nascetur.'),(13,'Q',9,'El libro me ha parecido muy aburrido'),(14,'Q',9,'Lorem ipsum dolor sit amet consectetur adipiscing elit integer, vulputate tincidunt turpis potenti scelerisque at nulla dictum, mattis ultricies primis conubia curabitur eros nascetur.'),(15,'Q',9,'Nuevo intento retorno de pÃ¡gina'),(16,'Q',9,'Otra prueba de reload'),(17,'Q',8,'reload pagina prueba'),(18,'Q',8,'prueba js'),(19,'Q',8,'ppp'),(20,'Q',8,'hhh'),(21,'Kalyan',9,'este es un comentario de prueba'),(22,'Kalyan',9,'Hola Mundo!');
/*!40000 ALTER TABLE `comentarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `libro`
--

DROP TABLE IF EXISTS `libro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `libro` (
  `IDLibro` int(15) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(120) NOT NULL,
  `autor` varchar(120) NOT NULL,
  `descripcion` text NOT NULL,
  `genero` varchar(20) NOT NULL,
  `archivo10` varchar(120) NOT NULL,
  `archivo` varchar(120) NOT NULL,
  `portada` varchar(120) NOT NULL,
  PRIMARY KEY (`IDLibro`),
  UNIQUE KEY `IDLibro` (`IDLibro`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `libro`
--

LOCK TABLES `libro` WRITE;
/*!40000 ALTER TABLE `libro` DISABLE KEYS */;
INSERT INTO `libro` VALUES (1,'Harry Potter','Koenig','Es la historia de un niño mago que...','Fantasía','ruta10pg','./archivo/harrypotter.pdf','./imagenes/harrypotter.jpg'),(2,'Caso Cerrado','Pepe','Lidia Pérez, una investigadora del FBI, se encontrará con los archivos de un caso cerrado que la llevará a descubrir...','Policiaca','ruta10pg','./archivo/coldcase.pdf','./imagenes/coldcase.jpg'),(3,'Belleza Negra','Kalyan','Trata sobre la vida de un caballo en la Inglaterra del siglo XIX...','Aventuras','ruta10pg','./archivo/bellezanegra.pdf','./imagenes/blackbeauty.jpg'),(4,'The Way of Kings','Koenig','El mundo está al borde del colapso. Viene la Gran Tormenta, pero Kaladin descubre que tiene un poder que...','Fantasía','ruta10pg','./archivo/twok.pdf','./imagenes/twok.jpg'),(5,'Storm Front','Kalyan','Harry Dresden se ve envuelto en la investigación de un asesinato. Tendrá que correr a contrarreloj para encontrar al otro mago que...','Fantasía','ruta10pg','./archivo/stormfront.pdf','./imagenes/stormfront.jpg'),(6,'Fool Moon','Kalyan','Un grupo de hombres lobo están sembrando el terror en la ciudad. Harry Dresden, el detective mago, tendrá que...','Fantasía','ruta10pg','./archivo/foolmoon.pdf','./imagenes/portada.jpg'),(7,'El Señor de los Anillos','Koenig','Sauron, el señor oscuro, se ha hecho con el anillo único y amenaza con llevar la Tierra Media a su destrucción. La esperanza de salvación recaerá en un pequeño hobbit...','Aventuras','archivo10paginas','./archivo/lotr.pdf','./imagenes/lotr.jpg'),(8,'Loco por Ti','Kalyan','Un pequeño perro vendrá a cambiar la vida de Nina, quién se replanteará toda la realidad que conocía hasta ese momento','Romantico','archivo10paginas','./archivo/locoporti.pdf','./imagenes/locoporti.jpg'),(9,'White Fang','Pepe','Un perro lobo en el Yukón...','Aventuras','ruta10','./archivo/wf.pdf','./imagenes/whitefang.jpg');
/*!40000 ALTER TABLE `libro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userdata`
--

DROP TABLE IF EXISTS `userdata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userdata` (
  `IDUserData` int(15) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) DEFAULT NULL,
  `apellidos` varchar(120) DEFAULT NULL,
  `sexo` varchar(20) DEFAULT NULL,
  `ciudad` varchar(120) DEFAULT NULL,
  `pais` varchar(120) DEFAULT NULL,
  `descripcion` text,
  `foto` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`IDUserData`),
  UNIQUE KEY `IDUserData` (`IDUserData`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userdata`
--

LOCK TABLES `userdata` WRITE;
/*!40000 ALTER TABLE `userdata` DISABLE KEYS */;
INSERT INTO `userdata` VALUES (1,'Fulanito','deTal','hombre','París','Francia','Cubilia nascetur aliquam orci sollicitudin himenaeos lobortis luctus varius erat turpis, sagittis suscipit faucibus enim mattis felis commodo maecenas accumsan, dis euismod nunc tempus parturient sociis lacus urna per. ','./imagenes/Cat-icon.png'),(2,'Kalyan','Lazair','mujer','Madrid','España','Cubilia nascetur aliquam orci sollicitudin himenaeos lobortis luctus varius erat turpis, sagittis suscipit faucibus enim mattis felis commodo maecenas accumsan, dis euismod nunc tempus parturient sociis lacus urna per. ','./imagenes/malinois.jpg'),(3,'Koenig','Yazria','hombre','Madrid','España','Cubilia nascetur aliquam orci sollicitudin himenaeos lobortis luctus varius erat turpis, sagittis suscipit faucibus enim mattis felis commodo maecenas accumsan, dis euismod nunc tempus parturient sociis lacus urna per. ','./imagenes/galgo.png'),(4,'Pepito','Grillo','hombre','Rivendell','Lothlorien','Cubilia nascetur aliquam orci sollicitudin himenaeos lobortis luctus varius erat turpis, sagittis suscipit faucibus enim mattis felis commodo maecenas accumsan, dis euismod nunc tempus parturient sociis lacus urna per. ','./imagenes/gato.jpg'),(5,'hh','fs','kkjk','kjk','jkj',NULL,NULL),(6,'Julián','Martinez','hombre','Sevilla','España',NULL,NULL);
/*!40000 ALTER TABLE `userdata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `IDUser` int(15) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `email` varchar(120) NOT NULL,
  `userPass` varchar(20) NOT NULL,
  PRIMARY KEY (`IDUser`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Fulanito','fulanito@gmail.com','1234'),(2,'Kalyan','kalyan@gmail.com','1234'),(3,'Koenig','koenig@gmail.com','1234'),(4,'Pepe','pepe@gmail.com','q'),(5,'Prueba','prueba@gmail.com','1'),(6,'Inno','inoo@gmail.com','1234');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'bbddel'
--

--
-- Dumping routines for database 'bbddel'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-02-11 23:52:25
