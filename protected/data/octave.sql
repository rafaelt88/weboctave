/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.31 : Database - octave
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`octave` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `octave`;

/*Table structure for table `instituto` */

DROP TABLE IF EXISTS `instituto`;

CREATE TABLE `instituto` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `name` (`name`),
  KEY `Id` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `instituto` */

insert  into `instituto`(`Id`,`name`) values (4,'Instituto Universitario Antonio Jose de Sucre'),(2,'Instituto Universitario Cristobal Mendoza'),(6,'Universidad Central de Venezuela'),(1,'Universidad de Los Andes'),(3,'Universidad Politécnica Territorial de Mérida'),(5,'Universidad Simon Bolivar');

/*Table structure for table `ocupacion` */

DROP TABLE IF EXISTS `ocupacion`;

CREATE TABLE `ocupacion` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `name` (`name`),
  KEY `Id` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `ocupacion` */

insert  into `ocupacion`(`Id`,`name`) values (1,'Estudiante'),(4,'Otros'),(3,'Profesor Posrgrado'),(2,'Profesor Pregrado');

/*Table structure for table `repositorio` */

DROP TABLE IF EXISTS `repositorio`;

CREATE TABLE `repositorio` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `UsuarioId` int(10) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(15) NOT NULL,
  `text` longtext NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Id` (`Id`),
  KEY `FKrepositori304586` (`UsuarioId`),
  CONSTRAINT `FKrepositori304586` FOREIGN KEY (`UsuarioId`) REFERENCES `usuario` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `repositorio` */

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `nick` varchar(15) NOT NULL,
  `pass` varchar(15) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(45) NOT NULL,
  `OcupacionId` int(10) NOT NULL,
  `InstitutoId` int(10) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `nick` (`nick`),
  UNIQUE KEY `email` (`email`),
  KEY `Id` (`Id`),
  KEY `FKUsuario328396` (`OcupacionId`),
  KEY `FKUsuario290735` (`InstitutoId`),
  CONSTRAINT `FKUsuario290735` FOREIGN KEY (`InstitutoId`) REFERENCES `instituto` (`Id`),
  CONSTRAINT `FKUsuario328396` FOREIGN KEY (`OcupacionId`) REFERENCES `ocupacion` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `usuario` */

insert  into `usuario`(`Id`,`nick`,`pass`,`name`,`email`,`OcupacionId`,`InstitutoId`) values (1,'rafael','123456','Rafael Torres','rafaelt88@gmail.com',1,1);

/*Table structure for table `visitas` */

DROP TABLE IF EXISTS `visitas`;

CREATE TABLE `visitas` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `ip` varchar(15) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `ip` (`ip`),
  KEY `Id` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `visitas` */

insert  into `visitas`(`Id`,`ip`) values (1,'127.0.0.1');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
