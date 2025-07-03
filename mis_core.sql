/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.35-MariaDB : Database - mis_core
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`mis_core` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `mis_core`;

/*Table structure for table `tbl_ao` */

DROP TABLE IF EXISTS `tbl_ao`;

CREATE TABLE `tbl_ao` (
  `id_user` varchar(10) DEFAULT NULL,
  `waoaoco` varchar(3) DEFAULT NULL,
  `waodept` varchar(10) DEFAULT NULL,
  `waobrco` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_ao` */

LOCK TABLES `tbl_ao` WRITE;

insert  into `tbl_ao`(`id_user`,`waoaoco`,`waodept`,`waobrco`) values ('1','LIS','KYD','0350');

UNLOCK TABLES;

/*Table structure for table `tbl_cabang` */

DROP TABLE IF EXISTS `tbl_cabang`;

CREATE TABLE `tbl_cabang` (
  `id_cabang` varchar(4) NOT NULL,
  `nama_cabang` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_cabang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_cabang` */

LOCK TABLES `tbl_cabang` WRITE;

insert  into `tbl_cabang`(`id_cabang`,`nama_cabang`) values ('0350','KANTOR CABANG UTAMA'),('0351','KANTOR CABANG GODEAN');

UNLOCK TABLES;

/*Table structure for table `tbl_config` */

DROP TABLE IF EXISTS `tbl_config`;

CREATE TABLE `tbl_config` (
  `id_config` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(10) DEFAULT NULL,
  `pswrd` varchar(10) DEFAULT NULL,
  `connector` varchar(10) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id_config`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_config` */

LOCK TABLES `tbl_config` WRITE;

insert  into `tbl_config`(`id_config`,`user`,`pswrd`,`connector`,`status`) values (1,'MIS','SLEMAN1','SLMProd','Y');

UNLOCK TABLES;

/*Table structure for table `tbl_hakakses` */

DROP TABLE IF EXISTS `tbl_hakakses`;

CREATE TABLE `tbl_hakakses` (
  `kode_hakakses` varchar(10) NOT NULL,
  `nama_hakakses` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kode_hakakses`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_hakakses` */

LOCK TABLES `tbl_hakakses` WRITE;

insert  into `tbl_hakakses`(`kode_hakakses`,`nama_hakakses`) values ('admin','IT'),('funding','Funding'),('mkt','Marketing Kredit');

UNLOCK TABLES;

/*Table structure for table `tbl_menu_access` */

DROP TABLE IF EXISTS `tbl_menu_access`;

CREATE TABLE `tbl_menu_access` (
  `kode_hakakses` varchar(20) DEFAULT NULL,
  `code_menu` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_menu_access` */

LOCK TABLES `tbl_menu_access` WRITE;

insert  into `tbl_menu_access`(`kode_hakakses`,`code_menu`) values ('admin','CMX00101'),('admin','CMX00102'),('admin','CMX002'),('admin','CMX00201'),('admin','CMX001'),('admin','CMX00202'),('admin','CMX003'),('admin','CMX00301'),('admin','CMX00303'),('admin','CMX00302'),('admin','CMX00304'),('admin','CMX00305'),('admin','CMX004'),('admin','CMX00401'),('admin','CMX00402'),('admin','CMX00403'),('admin','CMX00404'),('admin','CMX00405'),('admin','CMX00406'),('admin','CMX005'),('admin','CMX00501'),('admin','CMX00502'),('admin','CMX00503'),('admin','CMX00601'),('admin','CMX006'),('admin','CMX00602'),('admin','CMX00603'),('admin','CMX00701'),('admin','CMX008'),('admin','CMX009'),('admin','CMX00901'),('admin','CMX00902'),('admin','CMX00903'),('admin','CMX010'),('admin','CMX011'),('admin','CMX012'),('admin','CMX013'),('admin','CMX014'),('admin','CMX015'),('admin','CMX01501'),('admin','CMX01502'),('admin','CMX01503'),('admin','CMX01504'),('admin','CMX016'),('admin','CMX01601'),('admin','CMX01602'),('admin','CMX01603'),('admin','CMX01604'),('admin','CMX01605'),('admin','CMX01606'),('admin','CMX01607'),('admin','CMX01608'),('admin','CMX01609'),('admin','CMX01610'),('admin','CMX01611'),('admin','CMX017'),('admin','CMX01701'),('admin','CMX01702'),('admin','CMX00203'),('admin','CMX00604');

UNLOCK TABLES;

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

LOCK TABLES `tbl_menu_group` WRITE;

insert  into `tbl_menu_group`(`code_menu`,`desk_menu`,`module`,`path`,`icon`,`level`,`parent`,`type`,`show`) values ('CMX000','Test Tanpa Child',NULL,NULL,'collection','1',NULL,'1','Y'),('CMX001','Dashboard',NULL,NULL,'chalkboard','1',NULL,'2','Y'),('CMX00101','General Dasboard','GeneralDashboard','Dashboard/GeneralDashboarView.php',NULL,'2','CMX001','1','Y'),('CMX00102','Dashboard HRD','DashboardHRD',NULL,NULL,'2','CMX001','1','Y'),('CMX002','Kredit',NULL,NULL,'chalkboard','1',NULL,'2','Y'),('CMX00201','Realisasi Kredit','realisasiPinjaman','kredit/realisasiPinjaman.php',NULL,'2','CMX002','1','Y'),('CMX00202','Realisasi Kredit Produk','realisasiPinjamanProduk','kredit/realisasiPinjamanProduk.php',NULL,'2','CMX002','1','Y'),('CMX00203','Pinjaman Jatuh Tempo','pinjamanJT','kredit/pinjamanJT.php',NULL,'2','CMX002','1','Y'),('CMX003','Tabungan',NULL,NULL,'chalkboard','1',NULL,'2','Y'),('CMX00301','Pembukaan Tabungan','LaporanPPID',NULL,NULL,'2','CMX003','1','Y'),('CMX00302','Penutupan Tabungan','LaporanPPID',NULL,NULL,'2','CMX003','1','Y'),('CMX00303','Rekening di Bawah Saldo Minimum',NULL,NULL,NULL,'2','CMX003','1','Y'),('CMX004','Deposito',NULL,NULL,'chalkboard','1',NULL,'2','Y'),('CMX00401','Break Deposito',NULL,NULL,NULL,'2','CMX004','1','Y'),('CMX00402','Pembukaan Deposito','Break Deposito',NULL,NULL,'2','CMX004','1','Y'),('CMX006','Setting',NULL,NULL,'chalkboard','1',NULL,'2','Y'),('CMX00601','Hak Akses','hakAkses','setting/hakAkses.php',NULL,'2','CMX006','1','Y'),('CMX00602','Produk','produk','setting/produk.php',NULL,'2','CMX006','1','Y'),('CMX00603','Cabang','cabang','setting/cabang.php',NULL,'2','CMX006','1','Y'),('CMX00604','User','user','setting/user.php',NULL,'2','CMX006','1','Y');

UNLOCK TABLES;

/*Table structure for table `tbl_produk` */

DROP TABLE IF EXISTS `tbl_produk`;

CREATE TABLE `tbl_produk` (
  `id_produk` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_produk` varchar(3) DEFAULT NULL,
  `kode_produk` varchar(3) DEFAULT NULL,
  `nama_produk` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_produk` */

LOCK TABLES `tbl_produk` WRITE;

insert  into `tbl_produk`(`id_produk`,`jenis_produk`,`kode_produk`,`nama_produk`) values (1,'TAB','221','TABUNGAN BANK SLEMAN'),(2,'KYD','KUM','KREDIT BANK SLEMAN');

UNLOCK TABLES;

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `id_cabang` varchar(4) DEFAULT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `username` varchar(10) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `hakakses` varchar(20) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `datein` datetime DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_user` */

LOCK TABLES `tbl_user` WRITE;

insert  into `tbl_user`(`id_user`,`id_cabang`,`nama_lengkap`,`username`,`password`,`hakakses`,`last_login`,`datein`,`status`) values (1,'0350','MUHAMMAD IQBAL','iqbal','iqbale','admin',NULL,NULL,'A');

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
