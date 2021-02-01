-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 31, 2021 at 05:04 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce1`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `shopping_cart_add_product` (IN `InCartId` CHAR(32), IN `InProductId` INT(32), IN `InAttributes` VARCHAR(1000))  NO SQL
BEGIN
DECLARE productQuantity INT;
SELECT quantity
FROM  shopping_cart
WHERE cart_id=inCartId
AND product_id=inProductId
AND attributes= inAttributes
INTO productQuantity;
IF productQuantity IS NULL THEN
INSERT INTO shopping_cart( cart_id, product_id, attributes, quantity,  added_on) VALUES (InCartId,InProductId,inAttributes,1,NOW());
ELSE
UPDATE shopping_cart SET cart_id=inCartId AND product_id=InProductId,attributes=inAttributes;
END IF;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `amministratore`
--

CREATE TABLE `amministratore` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL DEFAULT 'amministratore'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `amministratore`
--

INSERT INTO `amministratore` (`id`, `email`, `password`, `categoria`) VALUES
(1, 'admin@test.it', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', 'amministratore');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Vegetali'),
(2, 'Beveraggi'),
(3, 'Frutta'),
(5, 'Aperitivi'),
(6, 'Dolci'),
(8, 'Pane');

-- --------------------------------------------------------

--
-- Table structure for table `dettaglio_ordine`
--

CREATE TABLE `dettaglio_ordine` (
  `item_id` int(255) NOT NULL,
  `ordine_id` int(11) NOT NULL,
  `prodotto_id` int(11) NOT NULL,
  `nome_prodotto` varchar(255) NOT NULL,
  `quantità` int(20) NOT NULL,
  `costo_unitario` mediumint(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dettaglio_ordine`
--

INSERT INTO `dettaglio_ordine` (`item_id`, `ordine_id`, `prodotto_id`, `nome_prodotto`, `quantità`, `costo_unitario`) VALUES
(1, 1, 22, 'Sprite', 1, 5),
(2, 1, 23, 'Stuzzichini', 1, 4),
(3, 2, 22, 'Sprite', 1, 5),
(4, 2, 23, 'Stuzzichini', 1, 4),
(5, 3, 22, 'Sprite', 1, 5),
(6, 3, 23, 'Stuzzichini', 1, 4),
(7, 4, 23, 'Stuzzichini', 1, 4),
(8, 5, 23, 'Stuzzichini', 1, 4),
(9, 5, 28, 'Banane', 1, 7),
(10, 6, 28, 'Banane', 1, 7),
(11, 6, 29, 'Cavolfiori ', 1, 9),
(12, 7, 30, 'Melanzane', 1, 9),
(13, 8, 22, 'Sprite', 1, 5),
(14, 9, 23, 'Stuzzichini', 1, 4),
(15, 10, 23, 'Stuzzichini', 1, 4),
(16, 11, 28, 'Banane', 1, 7),
(17, 12, 23, 'Stuzzichini', 1, 4),
(18, 13, 29, 'Cavolfiori ', 2, 9),
(19, 13, 23, 'Stuzzichini', 2, 4),
(20, 14, 23, 'Stuzzichini', 2, 4),
(21, 14, 31, 'Limoni', 2, 8),
(22, 15, 23, 'Stuzzichini', 1, 4),
(23, 16, 23, 'Stuzzichini', 1, 4),
(24, 17, 31, 'Limoni', 1, 8),
(25, 18, 31, 'Limoni', 1, 8),
(26, 19, 28, 'Banane', 1, 7),
(27, 19, 33, 'Meloni', 2, 12),
(28, 19, 29, 'Cavolfiori ', 2, 9),
(29, 19, 32, 'Cipolle', 1, 6),
(30, 19, 37, 'Pane', 1, 3),
(31, 19, 44, 'Yougurt', 1, 6),
(32, 19, 47, 'Bull', 1, 13),
(33, 20, 29, 'Cavolfiori ', 1, 9),
(34, 20, 41, 'Paste', 1, 15),
(35, 20, 37, 'Pane', 1, 3),
(36, 21, 29, 'Cavolfiori ', 1, 9),
(37, 21, 40, 'Cioccolato', 1, 7),
(38, 21, 45, 'Succo', 2, 9),
(39, 22, 29, 'Cavolfiori ', 1, 9),
(40, 22, 40, 'Cioccolato', 1, 7),
(41, 22, 45, 'Succo', 2, 9),
(42, 23, 29, 'Cavolfiori ', 1, 9),
(43, 23, 40, 'Cioccolato', 1, 7),
(44, 23, 45, 'Succo', 2, 9);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`) VALUES
(1, 'admin@gmail.com'),
(2, 'admin2@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `creato` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `totale_ordine` int(255) NOT NULL DEFAULT '0',
  `data_spedizione` timestamp(6) NULL DEFAULT CURRENT_TIMESTAMP(6),
  `stato` int(10) NOT NULL DEFAULT '0',
  `commenti` varchar(255) NOT NULL DEFAULT 'commenti',
  `Customer_id` int(11) NOT NULL,
  `indirizzo_spedizione` varchar(255) NOT NULL,
  `citta` varchar(255) NOT NULL,
  `Customer_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `creato`, `totale_ordine`, `data_spedizione`, `stato`, `commenti`, `Customer_id`, `indirizzo_spedizione`, `citta`, `Customer_email`) VALUES
(19, '2020-12-30 10:45:07.292418', 77, '2020-12-30 10:45:07.292418', 1, 'commenti', 114, 'indirizzo', ' città', 'admin4@test.it'),
(20, '2020-12-30 22:42:17.736348', 27, '2020-12-30 22:42:17.736348', 1, 'commenti', 109, 'duomo', ' milano', 'admin@test.it'),
(21, '2020-12-30 22:45:32.240471', 34, '2020-12-30 22:45:32.240471', 1, 'commenti', 109, 'duomo', ' milano', 'admin@test.it'),
(22, '2020-12-30 22:48:11.903402', 34, '2020-12-30 22:48:11.903402', 1, 'commenti', 109, 'duomo', ' milano', 'admin@test.it'),
(23, '2020-12-30 22:48:39.680172', 34, '2020-12-30 22:48:39.680172', 1, 'commenti', 109, 'duomo', ' milano', 'admin@test.it');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `discount` float(8,2) DEFAULT NULL,
  `date` datetime NOT NULL,
  `category` int(11) NOT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `discount`, `date`, `category`, `image`) VALUES
(1, 'Insalata ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut condimentum ex. Nulla eu ultrices purus. Morbi lectus magna, auctor et ultrices aliquet, finibus ut mauris. Curabitur mattis, orci non lobortis scelerisque, erat orci posuere sem, in pellentesque turpis ipsum scelerisque magna. Ut id dolor ac nisi efficitur efficitur.', '16.25', 0.00, '2020-10-01 22:58:30', 1, 'Images/9.png'),
(2, 'Frutta esotica', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut condimentum ex. Nulla eu ultrices purus. Morbi lectus magna, auctor et ultrices aliquet, finibus ut mauris. Curabitur mattis, orci non lobortis scelerisque, erat orci posuere sem, in pellentesque turpis ipsum scelerisque magna. Ut id dolor ac nisi efficitur efficitur.', '17.50', 0.00, '2020-10-09 23:01:23', 3, 'Images/10.png'),
(3, 'Mele', 'VLorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut condimentum ex. Nulla eu ultrices purus. Morbi lectus magna, auctor et ultrices aliquet, finibus ut mauris. Curabitur mattis, orci non lobortis scelerisque, erat orci posuere sem, in pellentesque turpis ipsum scelerisque magna. Ut id dolor ac nisi efficitur efficitur.', '28.56', 23.00, '2020-09-19 23:03:29', 3, 'Images/11.png'),
(13, 'Cavoli', 'Mauris blandit est et nisl dignissim consequat. Morbi volutpat ligula dapibus sapien posuere posuere. Sed semper quam nisl, id porttitor odio ultrices vel. Mauris laoreet quam id arcu ultricies, in volutpat metus cursus. Sed blandit dapibus diam, quis mattis ante pharetra sit amet. Nulla volutpat, metus non sagittis scelerisque, felis magna lobortis magna, ut tincidunt nisi tellus nec magna. Suspendisse sit amet ultrices neque.\r\n\r\n', '18.54', 0.00, '2020-07-19 23:13:48', 1, 'Images/12.png'),
(14, 'Sunsweet', 'MMauris blandit est et nisl dignissim consequat. Morbi volutpat ligula dapibus sapien posuere posuere. Sed semper quam nisl, id porttitor odio ultrices vel. Mauris laoreet quam id arcu ultricies, in volutpat metus cursus. Sed blandit dapibus diam, quis mattis ante pharetra sit amet. Nulla volutpat, metus non sagittis scelerisque, felis magna lobortis magna, ut tincidunt nisi tellus nec magna. Suspendisse sit amet ultrices neque.\r\n\r\n', '9.68', 0.00, '2020-07-19 23:19:08', 2, 'Images/14.png'),
(17, 'India Gate', 'Maecenas porta massa a velit fermentum, ac molestie nibh luctus. In vestibulum urna id fermentum ultrices. In volutpat in nisl vel ultrices. Duis varius erat et accumsan sodales. Aliquam erat volutpat. Sed gravida, risus sed tincidunt sagittis, nunc nunc iaculis velit, eget hendrerit ligula mauris ac elit. Vestibulum bibendum, mauris vel efficitur varius, augue massa suscipit justo, sed congue elit purus eget augue. Nunc sodales, nibh ac condimentum sollicitudin, massa tellus auctor metus, ut gravida urna risus sit amet leo. Suspendisse eget bibendum lorem. Nunc quis mollis nisl, ac sollicitudin ligula. Sed quis purus tincidunt, feugiat dolor nec, pulvinar urna. Fusce dictum neque nec ex gravida, vitae bibendum nibh rutrum.', '18.67', 0.00, '2020-07-19 23:27:01', 5, 'Images/3.png'),
(18, 'Patatine', 'Maecenas porta massa a velit fermentum, ac molestie nibh luctus. In vestibulum urna id fermentum ultrices. In volutpat in nisl vel ultrices. Duis varius erat et accumsan sodales. Aliquam erat volutpat. Sed gravida, risus sed tincidunt sagittis, nunc nunc iaculis velit, eget hendrerit ligula mauris ac elit. Vestibulum bibendum, mauris vel efficitur varius, augue massa suscipit justo, sed congue elit purus eget augue. Nunc sodales, nibh ac condimentum sollicitudin, massa tellus auctor metus, ut gravida urna risus sit amet leo. Suspendisse eget bibendum lorem. Nunc quis mollis nisl, ac sollicitudin ligula. Sed quis purus tincidunt, feugiat dolor nec, pulvinar urna. Fusce dictum neque nec ex gravida, vitae bibendum nibh rutrum.', '28.91', 0.00, '2010-07-19 23:28:58', 5, 'Images/7.png'),
(19, 'Britania', 'Maecenas porta massa a velit fermentum, ac molestie nibh luctus. In vestibulum urna id fermentum ultrices. In volutpat in nisl vel ultrices. Duis varius erat et accumsan sodales. Aliquam erat volutpat. Sed gravida, risus sed tincidunt sagittis, nunc nunc iaculis velit, eget hendrerit ligula mauris ac elit. Vestibulum bibendum, mauris vel efficitur varius, augue massa suscipit justo, sed congue elit purus eget augue. Nunc sodales, nibh ac condimentum sollicitudin, massa tellus auctor metus, ut gravida urna risus sit amet leo. Suspendisse eget bibendum lorem. Nunc quis mollis nisl, ac sollicitudin ligula. Sed quis purus tincidunt, feugiat dolor nec, pulvinar urna. Fusce dictum neque nec ex gravida, vitae bibendum nibh rutrum.', '18.95', 0.00, '2010-07-20 10:45:16', 5, 'Images/8.png'),
(22, 'Sprite', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras a mattis justo, in venenatis justo. Integer laoreet tincidunt eros. Praesent porttitor malesuada mattis. Vestibulum condimentum ex et vehicula tincidunt. In tincidunt lacinia risus, sed pretium purus elementum eu. Sed ut tincidunt eros, eget tincidunt nibh. Nullam fermentum, enim et blandit accumsan, quam ipsum dictum dolor, hendrerit laoreet eros eros non turpis.', '5.00', 4.00, '2020-11-25 15:35:50', 2, 'Images/16.png'),
(23, 'Stuzzichini', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras a mattis justo, in venenatis justo. Integer laoreet tincidunt eros. Praesent porttitor malesuada mattis. Vestibulum condimentum ex et vehicula tincidunt. In tincidunt lacinia risus, sed pretium purus elementum eu. Sed ut tincidunt eros, eget tincidunt nibh. Nullam fermentum, enim et blandit accumsan, quam ipsum dictum dolor, hendrerit laoreet eros eros non turpis.', '4.00', NULL, '2020-11-24 15:37:46', 5, 'Images/37.png'),
(28, 'Banane', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras a mattis justo, in venenatis justo. Integer laoreet tincidunt eros. Praesent porttitor malesuada mattis. Vestibulum condimentum ex et vehicula tincidunt. In tincidunt lacinia risus, sed pretium purus elementum eu. Sed ut tincidunt eros, eget tincidunt nibh. Nullam fermentum, enim et blandit accumsan, quam ipsum dictum dolor, hendrerit laoreet eros eros non turpis.', '7.00', NULL, '2020-11-15 15:49:59', 3, 'Images/29.png'),
(29, 'Cavolfiori ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras a mattis justo, in venenatis justo. Integer laoreet tincidunt eros. Praesent porttitor malesuada mattis. Vestibulum condimentum ex et vehicula tincidunt. In tincidunt lacinia risus, sed pretium purus elementum eu. Sed ut tincidunt eros, eget tincidunt nibh. Nullam fermentum, enim et blandit accumsan, quam ipsum dictum dolor, hendrerit laoreet eros eros non turpis.', '9.00', 8.00, '2020-11-25 15:51:14', 1, 'Images/30.png'),
(30, 'Melanzane', '', '9.00', 7.00, '2020-11-23 15:51:59', 1, 'Images/31.png'),
(31, 'Limoni', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras a mattis justo, in venenatis justo. Integer laoreet tincidunt eros. Praesent porttitor malesuada mattis. Vestibulum condimentum ex et vehicula tincidunt. In tincidunt lacinia risus, sed pretium purus elementum eu. Sed ut tincidunt eros, eget tincidunt nibh. Nullam fermentum, enim et blandit accumsan, quam ipsum dictum dolor, hendrerit laoreet eros eros non turpis.', '8.00', NULL, '2020-11-24 15:52:55', 3, 'Images/32.png'),
(32, 'Cipolle', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras a mattis justo, in venenatis justo. Integer laoreet tincidunt eros. Praesent porttitor malesuada mattis. Vestibulum condimentum ex et vehicula tincidunt. In tincidunt lacinia risus, sed pretium purus elementum eu. Sed ut tincidunt eros, eget tincidunt nibh. Nullam fermentum, enim et blandit accumsan, quam ipsum dictum dolor, hendrerit laoreet eros eros non turpis.', '6.00', NULL, '2020-11-24 15:54:28', 1, 'Images/33.png'),
(33, 'Meloni', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras a mattis justo, in venenatis justo. Integer laoreet tincidunt eros. Praesent porttitor malesuada mattis. Vestibulum condimentum ex et vehicula tincidunt. In tincidunt lacinia risus, sed pretium purus elementum eu. Sed ut tincidunt eros, eget tincidunt nibh. Nullam fermentum, enim et blandit accumsan, quam ipsum dictum dolor, hendrerit laoreet eros eros non turpis.', '12.00', 9.00, '2020-11-24 15:55:08', 3, 'Images/34.png'),
(34, 'Funghi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras a mattis justo, in venenatis justo. Integer laoreet tincidunt eros. Praesent porttitor malesuada mattis. Vestibulum condimentum ex et vehicula tincidunt. In tincidunt lacinia risus, sed pretium purus elementum eu. Sed ut tincidunt eros, eget tincidunt nibh. Nullam fermentum, enim et blandit accumsan, quam ipsum dictum dolor, hendrerit laoreet eros eros non turpis.', '18.00', 12.00, '2020-11-25 15:56:13', 1, 'Images/35.png'),
(35, 'Fragole', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras a mattis justo, in venenatis justo. Integer laoreet tincidunt eros. Praesent porttitor malesuada mattis. Vestibulum condimentum ex et vehicula tincidunt. In tincidunt lacinia risus, sed pretium purus elementum eu. Sed ut tincidunt eros, eget tincidunt nibh. Nullam fermentum, enim et blandit accumsan, quam ipsum dictum dolor, hendrerit laoreet eros eros non turpis.', '10.00', NULL, '2020-11-17 15:57:14', 3, 'Images/36.png'),
(36, 'Brioches', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras a mattis justo, in venenatis justo. Integer laoreet tincidunt eros. Praesent porttitor malesuada mattis. Vestibulum condimentum ex et vehicula tincidunt. In tincidunt lacinia risus, sed pretium purus elementum eu. Sed ut tincidunt eros, eget tincidunt nibh. Nullam fermentum, enim et blandit accumsan, quam ipsum dictum dolor, hendrerit laoreet eros eros non turpis.', '4.00', 2.00, '2020-11-26 15:58:02', 6, 'Images/38.png'),
(37, 'Pane', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras a mattis justo, in venenatis justo. Integer laoreet tincidunt eros. Praesent porttitor malesuada mattis. Vestibulum condimentum ex et vehicula tincidunt. In tincidunt lacinia risus, sed pretium purus elementum eu. Sed ut tincidunt eros, eget tincidunt nibh. Nullam fermentum, enim et blandit accumsan, quam ipsum dictum dolor, hendrerit laoreet eros eros non turpis.', '2.50', 2.00, '2020-11-24 15:59:50', 8, 'Images/39.png'),
(38, 'Grissini', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras a mattis justo, in venenatis justo. Integer laoreet tincidunt eros. Praesent porttitor malesuada mattis. Vestibulum condimentum ex et vehicula tincidunt. In tincidunt lacinia risus, sed pretium purus elementum eu. Sed ut tincidunt eros, eget tincidunt nibh. Nullam fermentum, enim et blandit accumsan, quam ipsum dictum dolor, hendrerit laoreet eros eros non turpis.', '6.00', NULL, '2020-11-24 16:00:55', 8, 'Images/40.png'),
(39, 'Bauletto', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras a mattis justo, in venenatis justo. Integer laoreet tincidunt eros. Praesent porttitor malesuada mattis. Vestibulum condimentum ex et vehicula tincidunt. In tincidunt lacinia risus, sed pretium purus elementum eu. Sed ut tincidunt eros, eget tincidunt nibh. Nullam fermentum, enim et blandit accumsan, quam ipsum dictum dolor, hendrerit laoreet eros eros non turpis.', '8.00', NULL, '2020-11-24 16:02:07', 8, 'Images/41.png'),
(40, 'Cioccolato', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras a mattis justo, in venenatis justo. Integer laoreet tincidunt eros. Praesent porttitor malesuada mattis. Vestibulum condimentum ex et vehicula tincidunt. In tincidunt lacinia risus, sed pretium purus elementum eu. Sed ut tincidunt eros, eget tincidunt nibh. Nullam fermentum, enim et blandit accumsan, quam ipsum dictum dolor, hendrerit laoreet eros eros non turpis.', '7.00', NULL, '2020-11-23 16:02:51', 6, 'Images/42.png'),
(41, 'Paste', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras a mattis justo, in venenatis justo. Integer laoreet tincidunt eros. Praesent porttitor malesuada mattis. Vestibulum condimentum ex et vehicula tincidunt. In tincidunt lacinia risus, sed pretium purus elementum eu. Sed ut tincidunt eros, eget tincidunt nibh. Nullam fermentum, enim et blandit accumsan, quam ipsum dictum dolor, hendrerit laoreet eros eros non turpis.', '15.00', NULL, '2020-11-16 16:03:38', 6, 'Images/46.png'),
(42, 'Frollini', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras a mattis justo, in venenatis justo. Integer laoreet tincidunt eros. Praesent porttitor malesuada mattis. Vestibulum condimentum ex et vehicula tincidunt. In tincidunt lacinia risus, sed pretium purus elementum eu. Sed ut tincidunt eros, eget tincidunt nibh. Nullam fermentum, enim et blandit accumsan, quam ipsum dictum dolor, hendrerit laoreet eros eros non turpis.', '12.00', NULL, '2020-11-24 16:07:45', 6, 'Images/47.png'),
(43, 'Aranciate', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras a mattis justo, in venenatis justo. Integer laoreet tincidunt eros. Praesent porttitor malesuada mattis. Vestibulum condimentum ex et vehicula tincidunt. In tincidunt lacinia risus, sed pretium purus elementum eu. Sed ut tincidunt eros, eget tincidunt nibh. Nullam fermentum, enim et blandit accumsan, quam ipsum dictum dolor, hendrerit laoreet eros eros non turpis.', '9.00', NULL, '2020-11-23 16:14:49', 2, 'Images/2.png'),
(44, 'Yougurt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras a mattis justo, in venenatis justo. Integer laoreet tincidunt eros. Praesent porttitor malesuada mattis. Vestibulum condimentum ex et vehicula tincidunt. In tincidunt lacinia risus, sed pretium purus elementum eu. Sed ut tincidunt eros, eget tincidunt nibh. Nullam fermentum, enim et blandit accumsan, quam ipsum dictum dolor, hendrerit laoreet eros eros non turpis.', '6.00', 5.00, '2020-11-24 16:15:46', 2, 'Images/51.png'),
(45, 'Succo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras a mattis justo, in venenatis justo. Integer laoreet tincidunt eros. Praesent porttitor malesuada mattis. Vestibulum condimentum ex et vehicula tincidunt. In tincidunt lacinia risus, sed pretium purus elementum eu. Sed ut tincidunt eros, eget tincidunt nibh. Nullam fermentum, enim et blandit accumsan, quam ipsum dictum dolor, hendrerit laoreet eros eros non turpis.', '9.00', NULL, '2020-11-25 16:16:47', 2, 'Images/52.png'),
(46, 'Schweeps', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras a mattis justo, in venenatis justo. Integer laoreet tincidunt eros. Praesent porttitor malesuada mattis. Vestibulum condimentum ex et vehicula tincidunt. In tincidunt lacinia risus, sed pretium purus elementum eu. Sed ut tincidunt eros, eget tincidunt nibh. Nullam fermentum, enim et blandit accumsan, quam ipsum dictum dolor, hendrerit laoreet eros eros non turpis.', '12.00', 10.00, '2020-11-26 17:16:38', 2, 'Images/65.png'),
(47, 'Bull', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras a mattis justo, in venenatis justo. Integer laoreet tincidunt eros. Praesent porttitor malesuada mattis. Vestibulum condimentum ex et vehicula tincidunt. In tincidunt lacinia risus, sed pretium purus elementum eu. Sed ut tincidunt eros, eget tincidunt nibh. Nullam fermentum, enim et blandit accumsan, quam ipsum dictum dolor, hendrerit laoreet eros eros non turpis.', '13.00', NULL, '2020-11-26 17:18:13', 2, 'Images/56.png');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `id_subs` int(11) NOT NULL,
  `subscription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nome` varchar(255) DEFAULT 'nome',
  `cognome` varchar(255) DEFAULT 'cognome',
  `indirizzo` varchar(255) DEFAULT 'indirizzo',
  `citta` varchar(255) DEFAULT 'città',
  `nazione` varchar(255) DEFAULT 'nazione',
  `inserimento` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `nome`, `cognome`, `indirizzo`, `citta`, `nazione`, `inserimento`) VALUES
(109, 'admin@test.it', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', 'livio', 'bollini9', 'duomo2', 'Torino', 'italiani', '2020-12-30 09:51:05.050222');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amministratore`
--
ALTER TABLE `amministratore`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dettaglio_ordine`
--
ALTER TABLE `dettaglio_ordine`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`id_subs`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amministratore`
--
ALTER TABLE `amministratore`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `dettaglio_ordine`
--
ALTER TABLE `dettaglio_ordine`
  MODIFY `item_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `id_subs` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
