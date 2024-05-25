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

/*Table structure for table `d_jual` */

DROP TABLE IF EXISTS `d_jual`;

CREATE TABLE `d_jual` (
  `id_detail` int(11) NOT NULL AUTO_INCREMENT,
  `nota_pesanan` int(11) NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_detail`),
  KEY `nota_pesanan` (`nota_pesanan`),
  CONSTRAINT `d_jual_ibfk_1` FOREIGN KEY (`nota_pesanan`) REFERENCES `h_jual` (`nota_pesanan`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `d_jual` */

insert  into `d_jual`(`id_detail`,`nota_pesanan`,`id_produk`,`quantity`,`id_pelanggan`) values 
(10,5,13,12,3),
(11,6,10,5,3),
(12,7,8,1,3);

/*Table structure for table `h_jual` */

DROP TABLE IF EXISTS `h_jual`;

CREATE TABLE `h_jual` (
  `nota_pesanan` int(11) NOT NULL AUTO_INCREMENT,
  `harga_total` int(11) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  PRIMARY KEY (`nota_pesanan`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `h_jual` */

insert  into `h_jual`(`nota_pesanan`,`harga_total`,`STATUS`) values 
(4,95000,0),
(5,480000,0),
(6,150000,0),
(7,35000,1);

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
  `password` varchar(255) DEFAULT NULL,
  `gaji` int(11) DEFAULT NULL,
  `telp` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id_pegawai`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pegawai` */

insert  into `pegawai`(`id_pegawai`,`nama_pegawai`,`password`,`gaji`,`telp`,`email`) values 
(1,'Siapa','pegawai',5000000,'0812345678','pegawai@gmail.com');

/*Table structure for table `pelanggan` */

DROP TABLE IF EXISTS `pelanggan`;

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pelanggan` varchar(255) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `telp` varchar(225) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pelanggan` */

insert  into `pelanggan`(`id_pelanggan`,`nama_pelanggan`,`email`,`telp`,`password`) values 
(3,'1','1@gmail.com','1','1');

/*Table structure for table `produk` */

DROP TABLE IF EXISTS `produk`;

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `produk` */

insert  into `produk`(`id_produk`,`nama_produk`,`id_kategori`,`harga`,`file_path`) values 
(1,'Americano',1,30000.00,''),
(2,'Cappuccino',1,30000.00,''),
(3,'Ice Espresso',1,35000.00,''),
(4,'Mocha',1,35000.00,''),
(5,'Caramel Macchiato',1,40000.00,''),
(6,'Ice Coffee with Milk',1,30000.00,''),
(7,'Caramel Frappe',2,40000.00,''),
(8,'Vanilla Frappe',2,35000.00,''),
(9,'Matcha Frappe',2,35000.00,''),
(10,'Strawberry Jasmine Tea',3,30000.00,''),
(11,'Mango Green Tea',3,30000.00,''),
(12,'Dragon Fruit Lemonade',3,35000.00,''),
(13,'Pineapple Passionfruit Lemonade',3,40000.00,'');

/*Table structure for table `stok` */

DROP TABLE IF EXISTS `stok`;

CREATE TABLE `stok` (
  `id_stok` int(11) NOT NULL AUTO_INCREMENT,
  `nama_stok` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id_stok`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `stok` */

insert  into `stok`(`id_stok`,`nama_stok`,`quantity`) values 
(1,'Biji Kopi',7),
(2,'Kopi bubuk',3),
(3,'Susu',3),
(4,'Strawberry Syrup',4),
(5,'Mango Syrup',3),
(6,'Dragon Fruit Syrup',5),
(7,'Pineapple Syrup',8),
(8,'Matcha',2),
(9,'Vanilla',5),
(10,'Jasmine Tea',2);

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
