/*
SQLyog Ultimate v13.1.1 (64 bit)
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

/*Table structure for table `tbl_ao` */

DROP TABLE IF EXISTS `tbl_ao`;

CREATE TABLE `tbl_ao` (
  `id_user` varchar(10) DEFAULT NULL,
  `waoaoco` varchar(3) DEFAULT NULL,
  `waodept` varchar(10) DEFAULT NULL,
  `waobrco` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_ao` */

insert  into `tbl_ao`(`id_user`,`waoaoco`,`waodept`,`waobrco`) values 
('1','LIS','KYD','0350');

/*Table structure for table `tbl_cabang` */

DROP TABLE IF EXISTS `tbl_cabang`;

CREATE TABLE `tbl_cabang` (
  `id_cabang` varchar(4) NOT NULL,
  `nama_cabang` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_cabang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_cabang` */

insert  into `tbl_cabang`(`id_cabang`,`nama_cabang`) values 
('0350','KANTOR CABANG UTAMA'),
('0351','KANTOR CABANG GODEAN');

/*Table structure for table `tbl_config` */

DROP TABLE IF EXISTS `tbl_config`;

CREATE TABLE `tbl_config` (
  `id_config` int NOT NULL AUTO_INCREMENT,
  `user` varchar(10) DEFAULT NULL,
  `pswrd` varchar(10) DEFAULT NULL,
  `connector` varchar(10) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id_config`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_config` */

insert  into `tbl_config`(`id_config`,`user`,`pswrd`,`connector`,`status`) values 
(1,'MIS','SLEMAN1','SLMProd','Y');

/*Table structure for table `tbl_hakakses` */

DROP TABLE IF EXISTS `tbl_hakakses`;

CREATE TABLE `tbl_hakakses` (
  `kode_hakakses` varchar(10) NOT NULL,
  `nama_hakakses` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kode_hakakses`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_hakakses` */

insert  into `tbl_hakakses`(`kode_hakakses`,`nama_hakakses`) values 
('admin','IT'),
('funding','Funding'),
('mkt','Marketing Kredit');

/*Table structure for table `tbl_menu_access` */

DROP TABLE IF EXISTS `tbl_menu_access`;

CREATE TABLE `tbl_menu_access` (
  `kode_hakakses` varchar(20) DEFAULT NULL,
  `code_menu` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_menu_access` */

insert  into `tbl_menu_access`(`kode_hakakses`,`code_menu`) values 
('funding','CMX001'),
('funding','CMX00101'),
('funding','CMX00102'),
('funding','CMX002'),
('funding','CMX00201'),
('funding','CMX00202'),
('funding','CMX00203'),
('funding','CMX003'),
('funding','CMX00301'),
('funding','CMX00302'),
('funding','CMX004'),
('funding','CMX00401'),
('funding','CMX00402'),
('admin','CMX001'),
('admin','CMX00101'),
('admin','CMX00102'),
('admin','CMX002'),
('admin','CMX00201'),
('admin','CMX00202'),
('admin','CMX00203'),
('admin','CMX003'),
('admin','CMX00301'),
('admin','CMX00302'),
('admin','CMX00303'),
('admin','CMX004'),
('admin','CMX00401'),
('admin','CMX00402'),
('admin','CMX006'),
('admin','CMX00601'),
('admin','CMX00602'),
('admin','CMX00603'),
('admin','CMX00604');

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
('CMX000','Test Tanpa Child',NULL,NULL,'fa fa-home','1',NULL,'1','N'),
('CMX001','Dashboard',NULL,NULL,'fa fa-home','1',NULL,'2','Y'),
('CMX00101','General Dasboard','GeneralDashboard','Dashboard/GeneralDashboarView.php',NULL,'2','CMX001','1','Y'),
('CMX00102','Dashboard HRD','DashboardHRD','Dashboard/HRDDashboarView.php',NULL,'2','CMX001','1','Y'),
('CMX002','Kredit',NULL,NULL,'fa fa-chalkboard','1',NULL,'2','Y'),
('CMX00201','Realisasi Kredit','realisasiPinjaman','kredit/realisasi-kredit.php',NULL,'2','CMX002','1','Y'),
('CMX00202','Realisasi Kredit Produk','realisasiPinjamanProduk','kredit/realisasiPinjamanProduk.php',NULL,'2','CMX002','1','Y'),
('CMX00203','Pinjaman Jatuh Tempo','pinjamanJT','kredit/pinjamanJT.php',NULL,'2','CMX002','1','Y'),
('CMX003','Tabungan',NULL,NULL,'fa fa-chalkboard','1',NULL,'2','Y'),
('CMX00301','Pembukaan Tabungan','LaporanPPID',NULL,NULL,'2','CMX003','1','Y'),
('CMX00302','Penutupan Tabungan','LaporanPPID',NULL,NULL,'2','CMX003','1','Y'),
('CMX00303','Rekening di Bawah Saldo Minimum',NULL,NULL,NULL,'2','CMX003','1','Y'),
('CMX004','Deposito',NULL,NULL,'fa fa-chalkboard','1',NULL,'2','Y'),
('CMX00401','Break Deposito',NULL,NULL,NULL,'2','CMX004','1','Y'),
('CMX00402','Pembukaan Deposito','Break Deposito',NULL,NULL,'2','CMX004','1','Y'),
('CMX006','Setting',NULL,NULL,'fa fa-chalkboard','1',NULL,'2','Y'),
('CMX00601','Hak Akses','hakAkses','setting/hakAkses-view.php',NULL,'2','CMX006','1','Y'),
('CMX00602','Produk','produk','setting/produk.php',NULL,'2','CMX006','1','Y'),
('CMX00603','Cabang','cabang','setting/cabang.php',NULL,'2','CMX006','1','Y'),
('CMX00604','User','user','setting/user.php',NULL,'2','CMX006','1','Y');

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

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
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

insert  into `tbl_user`(`id_user`,`id_cabang`,`nama_lengkap`,`username`,`password`,`hakakses`,`last_login`,`datein`,`status`) values 
(1,'0350','MUHAMMAD IQBAL','iqbal','iqbale','admin',NULL,NULL,'A');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
