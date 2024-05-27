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
  `id_detail` INT(11) NOT NULL AUTO_INCREMENT,
  `nota_pesanan` INT(11) NOT NULL,
  `id_produk` INT(11) DEFAULT NULL,
  `quantity` INT(11) DEFAULT NULL,
  `id_pelanggan` INT(11) DEFAULT NULL,
  PRIMARY KEY (`id_detail`),
  KEY `nota_pesanan` (`nota_pesanan`),
  CONSTRAINT `d_jual_ibfk_1` FOREIGN KEY (`nota_pesanan`) REFERENCES `h_jual` (`nota_pesanan`)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `d_jual` */

/*Table structure for table `h_jual` */

DROP TABLE IF EXISTS `h_jual`;

CREATE TABLE `h_jual` (
  `nota_pesanan` INT(11) NOT NULL AUTO_INCREMENT,
  `harga_total` INT(11) DEFAULT NULL,
  `STATUS` INT(11) DEFAULT NULL,
  PRIMARY KEY (`nota_pesanan`)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `h_jual` */

/*Table structure for table `history` */

DROP TABLE IF EXISTS `history`;

CREATE TABLE `history` (
  `id_history` INT(11) NOT NULL AUTO_INCREMENT,
  `id_pelanggan` INT(11) NOT NULL,
  `total_transaksi` INT(11) NOT NULL,
  `tanggal` DATE NOT NULL,
  PRIMARY KEY (`id_history`)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `history` */

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id_kategori` INT(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=INNODB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `kategori` */

INSERT  INTO `kategori`(`id_kategori`,`nama_kategori`) VALUES 
(1,'Coffee and Latte'),
(2,'Frappe'),
(3,'Fruitie Series');

/*Table structure for table `pegawai` */

DROP TABLE IF EXISTS `pegawai`;

CREATE TABLE `pegawai` (
  `id_pegawai` INT(11) NOT NULL AUTO_INCREMENT,
  `nama_pegawai` VARCHAR(255) DEFAULT NULL,
  `password` VARCHAR(255) DEFAULT NULL,
  `gaji` INT(11) DEFAULT NULL,
  `telp` VARCHAR(225) DEFAULT NULL,
  `email` VARCHAR(225) DEFAULT NULL,
  PRIMARY KEY (`id_pegawai`)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pegawai` */

/*Table structure for table `pelanggan` */

DROP TABLE IF EXISTS `pelanggan`;

CREATE TABLE `pelanggan` (
  `id_pelanggan` INT(11) NOT NULL AUTO_INCREMENT,
  `nama_pelanggan` VARCHAR(255) DEFAULT NULL,
  `email` VARCHAR(225) DEFAULT NULL,
  `telp` VARCHAR(225) DEFAULT NULL,
  `password` VARCHAR(225) DEFAULT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pelanggan` */

/*Table structure for table `produk` */

DROP TABLE IF EXISTS `produk`;

CREATE TABLE `produk` (
  `id_produk` INT(11) NOT NULL AUTO_INCREMENT,
  `nama_produk` VARCHAR(255) NOT NULL,
  `id_kategori` INT(11) NOT NULL,
  `harga` DECIMAL(10,2) NOT NULL,
  `file_path` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=INNODB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `produk` */

INSERT  INTO `produk`(`id_produk`,`nama_produk`,`id_kategori`,`harga`,`file_path`) VALUES 
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
  `id_stok` INT(11) NOT NULL AUTO_INCREMENT,
  `nama_stok` VARCHAR(255) NOT NULL,
  `quantity` INT(11) NOT NULL,
  PRIMARY KEY (`id_stok`)
) ENGINE=INNODB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `stok` */

INSERT  INTO `stok`(`id_stok`,`nama_stok`,`quantity`) VALUES 
(1,'Biji Kopi',4),
(2,'Kopi bubuk',3),
(3,'Susu',3),
(4,'Strawberry Syrup',4),
(5,'Mango Syrup',3),
(6,'Dragon Fruit Syrup',5),
(7,'Pineapple Syrup',9),
(8,'Matcha',2),
(9,'Vanilla',13),
(10,'Jasmine Tea',1);

/*Table structure for table `supplier` */

DROP TABLE IF EXISTS `supplier`;

CREATE TABLE `supplier` (
  `id_supplier` INT(11) NOT NULL AUTO_INCREMENT,
  `id_stok` INT(11) NOT NULL,
  `nama_supplier` VARCHAR(255) NOT NULL,
  `no_telp` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`id_supplier`),
  KEY `id_stok` (`id_stok`),
  CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`id_stok`) REFERENCES `stok` (`id_stok`)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `supplier` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
