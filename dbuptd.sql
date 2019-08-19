/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.1.41-MariaDB-cll-lve : Database - vpaoosto_dbuptd
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`vpaoosto_dbuptd` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `vpaoosto_dbuptd`;

/*Table structure for table `tbl_hak_akses` */

DROP TABLE IF EXISTS `tbl_hak_akses`;

CREATE TABLE `tbl_hak_akses` (
  `id` int(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_hak_akses` */

insert  into `tbl_hak_akses`(`id`,`nama`) values 
(001,'admin'),
(002,'kp');

/*Table structure for table `tbl_pegawai` */

DROP TABLE IF EXISTS `tbl_pegawai`;

CREATE TABLE `tbl_pegawai` (
  `id` int(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `nip` char(18) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `pangkat` varchar(100) DEFAULT NULL,
  `golongan` varchar(100) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `dihapus` enum('0','1') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_pegawai` */

insert  into `tbl_pegawai`(`id`,`nip`,`nama`,`pangkat`,`golongan`,`jabatan`,`dihapus`) values 
(001,'000000000000000000','UDIN','GM',NULL,'Tukang Sapu','0');

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id` int(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `pegawai_id` int(3) unsigned zerofill DEFAULT NULL,
  `username` char(18) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `id_hak_akses` int(3) unsigned zerofill DEFAULT NULL,
  `dihapus` enum('0','1') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_user_ibfk_1` (`pegawai_id`),
  KEY `id_hak_akses` (`id_hak_akses`),
  CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`pegawai_id`) REFERENCES `tbl_pegawai` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `tbl_user_ibfk_2` FOREIGN KEY (`id_hak_akses`) REFERENCES `tbl_hak_akses` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`id`,`pegawai_id`,`username`,`password`,`id_hak_akses`,`dihapus`) values 
(001,001,'1','$2y$10$nRYbhJ2.BdqQ8GF5MKruyeHE9sy.LLds0iYTg2CT1wjBgrtzKMyMO',001,'0');

/*Table structure for table `v_user_pegawai` */

DROP TABLE IF EXISTS `v_user_pegawai`;

/*!50001 DROP VIEW IF EXISTS `v_user_pegawai` */;
/*!50001 DROP TABLE IF EXISTS `v_user_pegawai` */;

/*!50001 CREATE TABLE  `v_user_pegawai`(
 `id` int(3) unsigned zerofill ,
 `pegawai_id` int(3) unsigned zerofill ,
 `username` char(18) ,
 `password` varchar(200) ,
 `id_hak_akses` int(3) unsigned zerofill ,
 `nama` varchar(100) ,
 `jabatan` varchar(100) ,
 `pangkat` varchar(100) ,
 `dihapus` enum('0','1') 
)*/;

/*View structure for view v_user_pegawai */

/*!50001 DROP TABLE IF EXISTS `v_user_pegawai` */;
/*!50001 DROP VIEW IF EXISTS `v_user_pegawai` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`vpaoosto_uptdpk`@`%` SQL SECURITY DEFINER VIEW `v_user_pegawai` AS (select `a`.`id` AS `id`,`a`.`pegawai_id` AS `pegawai_id`,`a`.`username` AS `username`,`a`.`password` AS `password`,`a`.`id_hak_akses` AS `id_hak_akses`,`b`.`nama` AS `nama`,`b`.`jabatan` AS `jabatan`,`b`.`pangkat` AS `pangkat`,`a`.`dihapus` AS `dihapus` from (`tbl_user` `a` left join `tbl_pegawai` `b` on((`a`.`pegawai_id` = `b`.`id`)))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
