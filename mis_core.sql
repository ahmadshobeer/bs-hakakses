/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 8.0.30 : Database - mis_core
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`mis_core` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `mis_core`;

/*Table structure for table `tbl_cabang` */

DROP TABLE IF EXISTS `tbl_cabang`;

CREATE TABLE `tbl_cabang` (
  `id_cabang` varchar(4) NOT NULL,
  `nama_cabang` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_cabang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_cabang` */

insert  into `tbl_cabang`(`id_cabang`,`nama_cabang`) values 
('0350','Kantor Cabang Utama'),
('0351','Kantor Cabang Godean');

/*Table structure for table `tbl_menu_access` */

DROP TABLE IF EXISTS `tbl_menu_access`;

CREATE TABLE `tbl_menu_access` (
  `kode_hakakses` varchar(20) DEFAULT NULL,
  `code_menu` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_menu_access` */

insert  into `tbl_menu_access`(`kode_hakakses`,`code_menu`) values 
('admin','CMX00101'),
('admin','CMX00102'),
('admin','CMX002'),
('admin','CMX00201'),
('admin','CMX001'),
('admin','CMX00202'),
('admin','CMX003'),
('admin','CMX00301'),
('admin','CMX00303'),
('admin','CMX00302'),
('admin','CMX00304'),
('admin','CMX00305'),
('admin','CMX004'),
('admin','CMX00401'),
('admin','CMX00402'),
('admin','CMX00403'),
('admin','CMX00404'),
('admin','CMX00405'),
('admin','CMX00406'),
('admin','CMX005'),
('admin','CMX00501'),
('admin','CMX00502'),
('admin','CMX00503'),
('admin','CMX00601'),
('admin','CMX006'),
('admin','CMX00602'),
('admin','CMX007'),
('admin','CMX00701'),
('admin','CMX008'),
('admin','CMX009'),
('admin','CMX00901'),
('admin','CMX00902'),
('admin','CMX00903'),
('admin','CMX010'),
('admin','CMX011'),
('admin','CMX012'),
('admin','CMX013'),
('admin','CMX014'),
('admin','CMX015'),
('admin','CMX01501'),
('admin','CMX01502'),
('admin','CMX01503'),
('admin','CMX01504'),
('admin','CMX016'),
('admin','CMX01601'),
('admin','CMX01602'),
('admin','CMX01603'),
('admin','CMX01604'),
('admin','CMX01605'),
('admin','CMX01606'),
('admin','CMX01607'),
('admin','CMX01608'),
('admin','CMX01609'),
('admin','CMX01610'),
('admin','CMX01611'),
('admin','CMX017'),
('admin','CMX01701'),
('admin','CMX01702');

/*Table structure for table `tbl_menu_group` */

DROP TABLE IF EXISTS `tbl_menu_group`;

CREATE TABLE `tbl_menu_group` (
  `code_menu` varchar(10) NOT NULL,
  `desk_menu` varchar(50) DEFAULT NULL,
  `module` varchar(30) DEFAULT NULL,
  `path` varchar(50) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL,
  `parent` varchar(10) DEFAULT NULL,
  `type` varchar(1) DEFAULT NULL,
  `show` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`code_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_menu_group` */

insert  into `tbl_menu_group`(`code_menu`,`desk_menu`,`module`,`path`,`icon`,`level`,`parent`,`type`,`show`) values 
('CMX000','Test Tanpa Child',NULL,NULL,'fas fa-tachometer-alt','1',NULL,'1','Y'),
('CMX001','Dashboard',NULL,NULL,'fas fa-tachometer-alt','1',NULL,'2','Y'),
('CMX00101','General Dasboard','GeneralDashboard','Dashboard/GeneralDashboarView.php',NULL,'2','CMX001','1','Y'),
('CMX00102','Dashboard HRD','DashboardHRD','Dashboard/HRDDashboarView.php',NULL,'2','CMX001','1','Y'),
('CMX002','Kredit',NULL,NULL,'fas fa-hand-holding-usd','1',NULL,'2','Y'),
('CMX00201','Realisasi Kredit','RegisterPPID','kredit/realisasi-kredit.php',NULL,'2','CMX002','1','Y'),
('CMX00202','Realisasi Kredit Produk','LaporanPPID',NULL,NULL,'2','CMX002','1','Y'),
('CMX003','Data Master',NULL,NULL,'fas fa-cogs','1',NULL,'2','Y'),
('CMX00301','Master Group User','GroupUser','m-group/group-user-view.php',NULL,'2','CMX003','1','Y');

/*Table structure for table `tbl_produk` */

DROP TABLE IF EXISTS `tbl_produk`;

CREATE TABLE `tbl_produk` (
  `id_produk` int NOT NULL AUTO_INCREMENT,
  `jenis_produk` varchar(3) DEFAULT NULL,
  `kode_produk` varchar(3) DEFAULT NULL,
  `nama_produk` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_produk` */

insert  into `tbl_produk`(`id_produk`,`jenis_produk`,`kode_produk`,`nama_produk`) values 
(1,'TAB','221','TABUNGAN BANK SLEMAN'),
(2,'KYD','KUM','KREDIT BANK SLEMAN');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
