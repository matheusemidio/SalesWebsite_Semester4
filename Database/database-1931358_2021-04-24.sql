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
	('15f40d35-a1d2-11eb-a0b5-3c7c3f5e1be6', 'Matheus', 'Emidio', '4897', 'Montréal', 'Quebec', 'H1X 2N9', 'matheus', 'emidio', '2021-04-20 08:15:24', '2021-04-22 11:30:53');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;

-- Dumping structure for procedure database-1931358.customers_delete
DELIMITER //
CREATE PROCEDURE `customers_delete`(
	IN `p_username` CHAR(36)
)
BEGIN
--	Revision History:

-- DEVELOPER					DATE					COMMENTS
-- Matheus Emidio 			2021-04-21			Created procedure to delete one data from the customers

-- This stored procedure is to delete one data from the customers table

DELETE FROM customers
WHERE 
				customers.customer_username = p_username;
		
END//
DELIMITER ;

-- Dumping structure for procedure database-1931358.customers_insert
DELIMITER //
CREATE PROCEDURE `customers_insert`(
	IN `p_firstName` VARCHAR(20),
	IN `p_lastName` VARCHAR(20),
	IN `p_address` VARCHAR(25),
	IN `p_city` VARCHAR(25),
	IN `p_province` VARCHAR(25),
	IN `p_postalCode` VARCHAR(7),
	IN `p_username` VARCHAR(12),
	IN `p_password` VARCHAR(255)
)
BEGIN
--	Revision History:

-- DEVELOPER					DATE					COMMENTS
-- Matheus Emidio 			2021-04-21			Created procedure to insert one data on the customers

-- This stored procedure is to insert one data on the customers table

INSERT INTO customers
(
				customers.customer_firstName,
				customers.customer_lastName,
				customers.customer_address,
				customers.customer_city,
				customers.customer_province,
				customers.customer_postalCode,
				customers.customer_username,
				customers.customer_password
)
VALUES
(
				p_firstName,
				p_lastName,
				p_address,
				p_city,
				p_province,
				p_postalCode,
				p_username,
				p_password
);
		
END//
DELIMITER ;

-- Dumping structure for procedure database-1931358.customers_select_all
DELIMITER //
CREATE PROCEDURE `customers_select_all`()
BEGIN
--	Revision History:

-- DEVELOPER					DATE					COMMENTS
-- Matheus Emidio 			2021-04-21			Created procedure to display all data from customers

-- This stored procedure is to display all the data from the customers table

SELECT 
		customers.customer_id AS 'Customer ID',
		customers.customer_firstName AS 'First Name',
		customers.customer_lastName AS 'Last Name',
		customers.customer_address AS 'Address',
		customers.customer_city AS 'City',
		customers.customer_province AS 'Province',
		customers.customer_postalCode AS 'Postal Code',
		customers.customer_username AS 'UserName',
		customers.customer_password AS 'Password',
		customers.customer_creationTime AS 'Customer Creation Time',
		customers.customer_modificationTime AS 'Customer Modification Time'
FROM
		customers;
		
END//
DELIMITER ;

-- Dumping structure for procedure database-1931358.customers_select_one
DELIMITER //
CREATE PROCEDURE `customers_select_one`(
	IN `p_username` VARCHAR(12)
)
BEGIN
--	Revision History:

-- DEVELOPER					DATE					COMMENTS
-- Matheus Emidio 			2021-04-21			Created procedure to display one data from customers

-- This stored procedure is to display one data from the customers table

SELECT 
		customers.customer_id AS 'Customer ID',
		customers.customer_firstName AS 'First Name',
		customers.customer_lastName AS 'Last Name',
		customers.customer_address AS 'Address',
		customers.customer_city AS 'City',
		customers.customer_province AS 'Province',
		customers.customer_postalCode AS 'Postal Code',
		customers.customer_username AS 'UserName',
		customers.customer_password AS 'Password',
		customers.customer_creationTime AS 'Customer Creation Time',
		customers.customer_modificationTime AS 'Customer Modification Time'
FROM
		customers
WHERE 
		customers.customer_username = p_username;
		
END//
DELIMITER ;

-- Dumping structure for procedure database-1931358.customers_select_password
DELIMITER //
CREATE PROCEDURE `customers_select_password`(
	IN `p_username` CHAR(36)
)
BEGIN
--	Revision History:

-- DEVELOPER					DATE					COMMENTS
-- Matheus Emidio 			2021-04-21			Created procedure to select the password from a given username from the customers

-- This stored procedure is to select the password from a given username from the customers table

SELECT 	customers.customer_password
FROM 		customers
WHERE 	customers.customer_username = p_username;
		
END//
DELIMITER ;

-- Dumping structure for procedure database-1931358.customers_update
DELIMITER //
CREATE PROCEDURE `customers_update`(
	IN `p_firstName` VARCHAR(20),
	IN `p_lastName` VARCHAR(20),
	IN `p_address` VARCHAR(25),
	IN `p_city` VARCHAR(25),
	IN `p_province` VARCHAR(25),
	IN `p_postalCode` VARCHAR(7),
	IN `p_username` VARCHAR(12),
	IN `p_password` VARCHAR(255)
)
BEGIN
--	Revision History:

-- DEVELOPER					DATE					COMMENTS
-- Matheus Emidio 			2021-04-21			Created procedure to update one data on the customers

-- This stored procedure is to update one data on the customers table

UPDATE customers
SET
		customers.customer_firstName = p_firstName,
		customers.customer_lastName = p_lastName,
		customers.customer_address = p_address,
		customers.customer_city = p_city,
		customers.customer_province = p_province,
		customers.customer_postalCode = p_postalCode,
		customers.customer_username = p_username,
		customers.customer_password = p_password,
		customers.customer_modificationTime = NOW()
WHERE 
		customers.customer_username = p_username;
		
END//
DELIMITER ;

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

-- Dumping structure for procedure database-1931358.products_delete
DELIMITER //
CREATE PROCEDURE `products_delete`(
	IN `p_product_id` CHAR(36)
)
BEGIN
--	Revision History:

-- DEVELOPER					DATE					COMMENTS
-- Matheus Emidio 			2021-04-21			Created procedure to delete one data from the products

-- This stored procedure is to delete one data from the products table

DELETE FROM products
WHERE
				products.product_id = p_product_id;
		
END//
DELIMITER ;

-- Dumping structure for procedure database-1931358.products_insert
DELIMITER //
CREATE PROCEDURE `products_insert`(
	IN `p_product_code` VARCHAR(12),
	IN `p_description` VARCHAR(100),
	IN `p_price` DECIMAL(7,2),
	IN `p_cost` DECIMAL(7,2)
)
BEGIN
--	Revision History:

-- DEVELOPER					DATE					COMMENTS
-- Matheus Emidio 			2021-04-21			Created procedure to insert one data on the products

-- This stored procedure is to insert one data on the products table

INSERT INTO products
(
				products.product_code,
				products.product_description,
				products.product_price,
				products.product_cost
)
VALUES
(
				p_product_code,
				p_description,
				p_price,
				p_cost
);
		
END//
DELIMITER ;

-- Dumping structure for procedure database-1931358.products_select_all
DELIMITER //
CREATE PROCEDURE `products_select_all`()
BEGIN
--	Revision History:

-- DEVELOPER					DATE					COMMENTS
-- Matheus Emidio 			2021-04-21			Created procedure to display all data from products

-- This stored procedure is to display all the data from the products table

SELECT 
		products.product_id AS 'Product ID',
		products.product_code AS 'Product Code',
		products.product_description AS 'Product Description',
		products.product_cost AS 'Cost',
		products.product_creationTime AS 'Product Creation Time',
		products.product_modificationTime AS 'Product Modification Time'
FROM
		products;
		
END//
DELIMITER ;

-- Dumping structure for procedure database-1931358.products_select_one
DELIMITER //
CREATE PROCEDURE `products_select_one`(
	IN `p_product_id` CHAR(36)
)
BEGIN
--	Revision History:

-- DEVELOPER					DATE					COMMENTS
-- Matheus Emidio 			2021-04-21			Created procedure to display one data from products

-- This stored procedure is to display one data from the products table

SELECT 
		products.product_id AS 'Product ID',
		products.product_code AS 'Product Code',
		products.product_description AS 'Product Description',
		products.product_cost AS 'Cost',
		products.product_creationTime AS 'Product Creation Time',
		products.product_modificationTime AS 'Product Modification Time'
FROM
		products
WHERE 
		products.product_id = p_product_id;
		
END//
DELIMITER ;

-- Dumping structure for procedure database-1931358.products_update
DELIMITER //
CREATE PROCEDURE `products_update`(
	IN `p_product_id` CHAR(36),
	IN `p_product_code` VARCHAR(12),
	IN `p_description` VARCHAR(100),
	IN `p_price` DECIMAL(7,2),
	IN `p_cost` DECIMAL(7,2)
)
BEGIN
--	Revision History:

-- DEVELOPER					DATE					COMMENTS
-- Matheus Emidio 			2021-04-21			Created procedure to update one data on the products

-- This stored procedure is to update one data on the products table

UPDATE products
SET
		products.product_code = p_product_code,
		products.product_description = p_description,
		products.product_price = p_price,
		products.product_cost =	p_cost,
		products.product_modificationTime = NOW()
WHERE
		products.product_id = p_product_id;
		
END//
DELIMITER ;

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

-- Dumping structure for procedure database-1931358.purchases_delete
DELIMITER //
CREATE PROCEDURE `purchases_delete`(
	IN `p_purchase_id` CHAR(36)
)
BEGIN
--	Revision History:

-- DEVELOPER					DATE					COMMENTS
-- Matheus Emidio 			2021-04-21			Created procedure to delete one data from the purchases

-- This stored procedure is to delete one data from the purchases table

DELETE FROM purchases
WHERE 
				purchases.purchase_id = p_purchase_id;
		
END//
DELIMITER ;

-- Dumping structure for procedure database-1931358.purchases_filter_date
DELIMITER //
CREATE PROCEDURE `purchases_filter_date`(
	IN `p_creationTime` DATETIME
)
BEGIN
--	Revision History:

-- DEVELOPER					DATE					COMMENTS
-- Matheus Emidio 			2021-04-21			Created procedure to filter purchases based on date

-- This stored procedure is to filter purchases from the purchases table based on a certain date

SELECT 
		purchases.purchase_id AS 'Purchase ID',
		purchases.purchase_quantity AS 'Quantity',
		purchases.product_price AS 'Price',
		purchases.purchase_comment AS 'Comments',
		purchases.purchase_creationTime AS 'Purchase Creation Time',
		purchases.purchase_modificationTime AS 'Purchase Modification Time',
		products.product_id AS 'Product ID',
		products.product_code AS 'Product Code',
		products.product_description AS 'Product Description',
		products.product_cost AS 'Cost',
		products.product_creationTime AS 'Product Creation Time',
		products.product_modificationTime AS 'Product Modification Time',
		customers.customer_id AS 'Customer ID',
		customers.customer_firstName AS 'First Name',
		customers.customer_lastName AS 'Last Name',
		customers.customer_address AS 'Address',
		customers.customer_city AS 'City',
		customers.customer_province AS 'Province',
		customers.customer_postalCode AS 'Postal Code',
		customers.customer_username AS 'UserName',
		customers.customer_password AS 'Password',
		customers.customer_creationTime AS 'Customer Creation Time',
		customers.customer_modificationTime AS 'Customer Modification Time'
FROM
		purchases
		INNER JOIN customers ON purchases.fk_customer_id = customers.customer_id
		INNER JOIN products ON purchases.fk_product_id = products.product_id
WHERE 
		(purchases.purchase_creationTime >= p_creationTime OR purchases.purchase_creationTime IS NULL)
ORDER BY purchases.purchase_creationTime;
		
END//
DELIMITER ;

-- Dumping structure for procedure database-1931358.purchases_insert
DELIMITER //
CREATE PROCEDURE `purchases_insert`(
	IN `p_customer_id` CHAR(36),
	IN `p_product_id` CHAR(36),
	IN `p_quantity` SMALLINT(3),
	IN `p_product_price` DECIMAL(7,2),
	IN `p_comment` VARCHAR(200)
)
BEGIN
--	Revision History:

-- DEVELOPER					DATE					COMMENTS
-- Matheus Emidio 			2021-04-21			Created procedure to insert one data on the purchases

-- This stored procedure is to insert one data on the purchases table

INSERT INTO purchases
(
				purchases.fk_customer_id,
				purchases.fk_product_id,
				purchases.purchase_quantity,
				purchases.product_price,
				purchases.purchase_comment
)
VALUES
(
				p_customer_id,
				p_product_id,
				p_quantity,
				p_product_price,
				p_comment
);
		
END//
DELIMITER ;

-- Dumping structure for procedure database-1931358.purchases_select_all
DELIMITER //
CREATE PROCEDURE `purchases_select_all`()
BEGIN
--	Revision History:

-- DEVELOPER					DATE					COMMENTS
-- Matheus Emidio 			2021-04-21			Created procedure to display all data from purchases

-- This stored procedure is to display all the data from the purchases table

SELECT 
		purchases.purchase_id AS 'Purchase ID',
		purchases.fk_customer_id AS 'Customer ID',
		purchases.fk_product_id AS 'Product ID',
		purchases.purchase_quantity AS 'Quantity',
		purchases.product_price AS 'Price',
		purchases.purchase_comment AS 'Comments',
		purchases.purchase_creationTime AS 'Purchase Creation Time',
		purchases.purchase_modificationTime AS 'Purchase Modification Time'
FROM 
		purchases;
		
END//
DELIMITER ;

-- Dumping structure for procedure database-1931358.purchases_select_one
DELIMITER //
CREATE PROCEDURE `purchases_select_one`(
	IN `p_purchase_id` CHAR(36)
)
BEGIN
--	Revision History:

-- DEVELOPER					DATE					COMMENTS
-- Matheus Emidio 			2021-04-21			Created procedure to display one data from purchases

-- This stored procedure is to display one data from the purchases table

SELECT 
		purchases.purchase_id AS 'Purchase ID',
		purchases.fk_customer_id AS 'Customer ID',
		purchases.fk_product_id AS 'Product ID',
		purchases.purchase_quantity AS 'Quantity',
		purchases.product_price AS 'Price',
		purchases.purchase_comment AS 'Comments',
		purchases.purchase_creationTime AS 'Purchase Creation Time',
		purchases.purchase_modificationTime AS 'Purchase Modification Time'
FROM 
		purchases
WHERE 
		purchases.purchase_id = p_purchase_id;
		
END//
DELIMITER ;

-- Dumping structure for procedure database-1931358.purchases_update
DELIMITER //
CREATE PROCEDURE `purchases_update`(
	IN `p_customer_id` CHAR(36),
	IN `p_product_id` CHAR(36),
	IN `p_quantity` SMALLINT(3),
	IN `p_product_price` DECIMAL(7,2),
	IN `p_comment` VARCHAR(200),
	IN `p_purchase_id` CHAR(36)
)
BEGIN
--	Revision History:

-- DEVELOPER					DATE					COMMENTS
-- Matheus Emidio 			2021-04-21			Created procedure to update one data on the customers

-- This stored procedure is to update one data on the customers table

UPDATE purchases
SET
		purchases.fk_customer_id = p_customer_id,
		purchases.fk_product_id = p_product_id,
		purchases.purchase_quantity = p_quantity,
		purchases.product_price = p_product_price,
		purchases.purchase_comment = p_comment,
		purchases.purchase_modificationTime = NOW()

WHERE 
		purchases.purchase_id = p_purchase_id;
		
END//
DELIMITER ;

-- Dumping structure for view database-1931358.purchases_view_all
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `purchases_view_all` (
	`Purchase ID` CHAR(36) NOT NULL COLLATE 'utf8mb4_general_ci',
	`Quantity` SMALLINT(6) NOT NULL,
	`Price` DECIMAL(7,2) NOT NULL,
	`Comments` VARCHAR(200) NULL COLLATE 'utf8mb4_general_ci',
	`Purchase Creation Time` DATETIME NOT NULL,
	`Purchase Modification Time` DATETIME NOT NULL,
	`Product ID` CHAR(36) NOT NULL COLLATE 'utf8mb4_general_ci',
	`Product Code` VARCHAR(12) NOT NULL COLLATE 'utf8mb4_general_ci',
	`Product Description` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`Cost` DECIMAL(7,2) NULL,
	`Product Creation Time` DATETIME NOT NULL,
	`Product Modification Time` DATETIME NOT NULL,
	`Customer ID` CHAR(36) NOT NULL COLLATE 'utf8mb4_general_ci',
	`First Name` VARCHAR(20) NOT NULL COLLATE 'utf8mb4_general_ci',
	`Last Name` VARCHAR(20) NOT NULL COLLATE 'utf8mb4_general_ci',
	`Address` VARCHAR(25) NOT NULL COLLATE 'utf8mb4_general_ci',
	`City` VARCHAR(25) NOT NULL COLLATE 'utf8mb4_general_ci',
	`Province` VARCHAR(25) NOT NULL COLLATE 'utf8mb4_general_ci',
	`Postal Code` VARCHAR(7) NOT NULL COLLATE 'utf8mb4_general_ci',
	`UserName` VARCHAR(12) NOT NULL COLLATE 'utf8mb4_general_ci',
	`Password` CHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`Customer Creation Time` DATETIME NOT NULL,
	`Customer Modification Time` DATETIME NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view database-1931358.purchases_view_all
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `purchases_view_all`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `purchases_view_all` AS select `purchases`.`purchase_id` AS `Purchase ID`,`purchases`.`purchase_quantity` AS `Quantity`,`purchases`.`product_price` AS `Price`,`purchases`.`purchase_comment` AS `Comments`,`purchases`.`purchase_creationTime` AS `Purchase Creation Time`,`purchases`.`purchase_modificationTime` AS `Purchase Modification Time`,`products`.`product_id` AS `Product ID`,`products`.`product_code` AS `Product Code`,`products`.`product_description` AS `Product Description`,`products`.`product_cost` AS `Cost`,`products`.`product_creationTime` AS `Product Creation Time`,`products`.`product_modificationTime` AS `Product Modification Time`,`customers`.`customer_id` AS `Customer ID`,`customers`.`customer_firstName` AS `First Name`,`customers`.`customer_lastName` AS `Last Name`,`customers`.`customer_address` AS `Address`,`customers`.`customer_city` AS `City`,`customers`.`customer_province` AS `Province`,`customers`.`customer_postalCode` AS `Postal Code`,`customers`.`customer_username` AS `UserName`,`customers`.`customer_password` AS `Password`,`customers`.`customer_creationTime` AS `Customer Creation Time`,`customers`.`customer_modificationTime` AS `Customer Modification Time` from ((`purchases` join `customers` on(`purchases`.`fk_customer_id` = `customers`.`customer_id`)) join `products` on(`purchases`.`fk_product_id` = `products`.`product_id`)) order by 'Purchase Creation Time';

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
