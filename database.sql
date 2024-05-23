/*
SQLyog Community v13.2.1 (64 bit)
MySQL - 10.4.32-MariaDB : Database - savore1
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`savore1` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `savore1`;

/*Table structure for table `history` */

DROP TABLE IF EXISTS `history`;

CREATE TABLE `history` (
  `nota_pesanan` int(11) NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `waktu` date DEFAULT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `status_nota` int(11) DEFAULT NULL,
  PRIMARY KEY (`nota_pesanan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `history` */

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `kategori` */

insert  into `kategori`(`id_kategori`,`nama_kategori`) values 
(1,'Coffee and Latte'),
(2,'Frappe'),
(3,'Fruitie Series');

/*Table structure for table `pegawai` */

DROP TABLE IF EXISTS `pegawai`;

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pegawai` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `gaji` varchar(225) DEFAULT NULL,
  `telp` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `client_key` varchar(225) DEFAULT NULL,
  `server_key` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id_pegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pegawai` */

/*Table structure for table `pelanggan` */

DROP TABLE IF EXISTS `pelanggan`;

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pelanggan` varchar(255) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `telp` varchar(225) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pelanggan` */

insert  into `pelanggan`(`id_pelanggan`,`nama_pelanggan`,`email`,`telp`,`password`) values 
(5,'1','3','4','2'),
(6,'w','w','w','w');

/*Table structure for table `pesanan` */

DROP TABLE IF EXISTS `pesanan`;

CREATE TABLE `pesanan` (
  `nota_pesanan` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `harga_total` int(11) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  KEY `id_pelanggan` (`id_pelanggan`),
  CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pesanan` */

insert  into `pesanan`(`nota_pesanan`,`id_produk`,`quantity`,`harga_total`,`STATUS`,`id_pelanggan`) values 
(1,2,1,35000,1,5),
(1,3,1,35000,1,5),
(2,11,1,35000,1,6),
(2,12,3,120000,1,6);

/*Table structure for table `produk` */

DROP TABLE IF EXISTS `produk`;

CREATE TABLE `produk` (
  `id_produk` INT(11) NOT NULL AUTO_INCREMENT,
  `nama_produk` VARCHAR(255) NOT NULL,
  `id_kategori` INT(11) NOT NULL,
  `harga` DECIMAL(10,2) NOT NULL,
  `file_path` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=INNODB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `produk` */

insert  into `produk`(`id_produk`,`nama_produk`,`id_kategori`,`harga`) values 
(1,'Americano',1,30000),
(2,'Ice Espresso',1,35000),
(3,'Mocha',1,35000),
(4,'Caramel Macchiato',1,40000),
(5,'Ice Coffee with Milk',1,30000),
(6,'Caramel Frappe',2,40000),
(7,'Vanilla Frappe',2,35000),
(8,'Matcha Frappe',2,35000),
(9,'Strawbeey Jasmine Tea',3,30000),
(10,'Mango Green Tea',3,30000),
(11,'Dragon Fruit Lemonade',3,35000),
(12,'Pineapple Passionfruit Lemonade',3,40000);

/*Table structure for table `supplier` */

DROP TABLE IF EXISTS `supplier`;

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL AUTO_INCREMENT,
  `nama_supplier` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telp` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id_supplier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `supplier` */

/*Table structure for table `transaksi` */

DROP TABLE IF EXISTS `transaksi`;

CREATE TABLE `transaksi` (
  `nota_pesanan` int(11) NOT NULL AUTO_INCREMENT,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  PRIMARY KEY (`nota_pesanan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `transaksi` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
