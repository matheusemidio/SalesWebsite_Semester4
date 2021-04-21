-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.17-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for database-1931358
CREATE DATABASE IF NOT EXISTS `database-1931358` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `database-1931358`;

-- Dumping structure for table database-1931358.customers
CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` char(36) NOT NULL DEFAULT uuid(),
  `customer_firstName` varchar(20) NOT NULL,
  `customer_lastName` varchar(20) NOT NULL,
  `customer_address` varchar(25) NOT NULL,
  `customer_city` varchar(25) NOT NULL,
  `customer_province` varchar(25) NOT NULL,
  `customer_postalCode` varchar(7) NOT NULL,
  `customer_username` varchar(12) NOT NULL,
  `customer_password` char(255) NOT NULL,
  `customer_creationTime` datetime NOT NULL DEFAULT current_timestamp(),
  `customer_modificationTime` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`customer_id`),
  UNIQUE KEY `customer_username` (`customer_username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table database-1931358.customers: ~0 rows (approximately)
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` (`customer_id`, `customer_firstName`, `customer_lastName`, `customer_address`, `customer_city`, `customer_province`, `customer_postalCode`, `customer_username`, `customer_password`, `customer_creationTime`, `customer_modificationTime`) VALUES
	('15f40d35-a1d2-11eb-a0b5-3c7c3f5e1be6', 'Matheus', 'Cadena', '4897', 'Montréal', 'Quebec', 'H2N 2X9', 'matheus', 'cadena', '2021-04-20 08:15:24', '2021-04-20 08:15:24');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;

-- Dumping structure for table database-1931358.products
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` char(36) NOT NULL DEFAULT uuid(),
  `product_code` varchar(12) NOT NULL,
  `product_description` varchar(100) NOT NULL,
  `product_price` decimal(7,2) NOT NULL,
  `product_cost` decimal(7,2) DEFAULT NULL,
  `product_creationTime` datetime NOT NULL DEFAULT current_timestamp(),
  `product_modificationTime` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`product_id`),
  UNIQUE KEY `product_code` (`product_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table database-1931358.products: ~0 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`product_id`, `product_code`, `product_description`, `product_price`, `product_cost`, `product_creationTime`, `product_modificationTime`) VALUES
	('44eb4dd1-a1d2-11eb-a0b5-3c7c3f5e1be6', 'P45MOUSE', 'Computer', 10.45, 5.25, '2021-04-20 08:16:43', '2021-04-20 08:16:43');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table database-1931358.purchases
CREATE TABLE IF NOT EXISTS `purchases` (
  `purchase_id` char(36) NOT NULL DEFAULT uuid(),
  `fk_customer_id` char(36) NOT NULL,
  `fk_product_id` char(36) NOT NULL,
  `purchase_quantity` smallint(6) NOT NULL,
  `product_price` decimal(7,2) NOT NULL,
  `purchase_comment` varchar(200) DEFAULT NULL,
  `purchase_creationTime` datetime NOT NULL DEFAULT current_timestamp(),
  `purchase_modificationTime` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`purchase_id`),
  KEY `fk_customer_id` (`fk_customer_id`),
  KEY `fk_product_id` (`fk_product_id`),
  CONSTRAINT `fk_customer_id` FOREIGN KEY (`fk_customer_id`) REFERENCES `customers` (`customer_id`),
  CONSTRAINT `fk_product_id` FOREIGN KEY (`fk_product_id`) REFERENCES `products` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table database-1931358.purchases: ~0 rows (approximately)
/*!40000 ALTER TABLE `purchases` DISABLE KEYS */;
INSERT INTO `purchases` (`purchase_id`, `fk_customer_id`, `fk_product_id`, `purchase_quantity`, `product_price`, `purchase_comment`, `purchase_creationTime`, `purchase_modificationTime`) VALUES
	('7ee90a05-a1d2-11eb-a0b5-3c7c3f5e1be6', '15f40d35-a1d2-11eb-a0b5-3c7c3f5e1be6', '44eb4dd1-a1d2-11eb-a0b5-3c7c3f5e1be6', 5, 10.45, NULL, '2021-04-20 08:18:20', '2021-04-20 08:18:20');
/*!40000 ALTER TABLE `purchases` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
