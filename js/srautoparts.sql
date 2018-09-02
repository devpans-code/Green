-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2016 at 02:28 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `srautoparts`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`username`, `password`) VALUES
('shashi', 'shashi');

-- --------------------------------------------------------

--
-- Table structure for table `admin_notification`
--

CREATE TABLE IF NOT EXISTS `admin_notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `admin_notification`
--

INSERT INTO `admin_notification` (`id`, `message`) VALUES
(7, '05.09.16 - New user yogesq patel registered on your site.'),
(8, '05.09.16 - A new order has placed on your site.'),
(9, '05.09.16 - New user jigir shah registered on your site.'),
(10, '05.09.16 - A new order has placed on your site.'),
(11, '05.09.16 - New user Parth Wadhwa registered on your site.'),
(12, '05.09.16 - A new order has placed on your site.'),
(13, '05.09.16 - A new order has placed on your site.'),
(14, '06.09.16 - New user joy patel registered on your site.'),
(15, '06.09.16 - A new order has placed on your site.'),
(16, '06.09.16 - New user afg sfgsd registered on your site.'),
(17, '06.09.16 - A new order has placed on your site.'),
(18, '06.09.16 - New user Shashank panchal registered on your site.'),
(19, '06.09.16 - New user jignesh vora registered on your site.'),
(20, '06.09.16 - A new order has placed on your site.'),
(21, '28.09.16 - New user jay patel registered on your site.'),
(22, '05.10.16 - New user xyz xyx registered on your site.');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_id` int(11) NOT NULL,
  `cart_items` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `cust_id`, `cart_items`) VALUES
(4, 1, '[{"id":"2","img":"images/parts/tulsi.jpg","name":"Tulsi","company":"Virat Prime","suitable_for":"TATA","size":"80x12","qty":"1","price":"320","total":320}]'),
(5, 1, '[{"id":"2","img":"images/parts/tulsi.jpg","name":"Tulsi","company":"Virat Prime","suitable_for":"TATA","size":"80x12","qty":"1","price":"320","total":320}]'),
(6, 1, '[{"id":"2","img":"images/parts/tulsi.jpg","name":"Tulsi","company":"Virat Prime","suitable_for":"TATA","size":"80x12","qty":"1","price":"320","total":320},{"id":"7","img":"images/parts/stand3.jpeg","name":"Stand","company":"Virat Prime","suitable_for":"MAHINDRA","size":"45x6","qty":"1","price":"980","total":980}]'),
(7, 1, '[{"id":"2","img":"images/parts/tulsi.jpg","name":"Tulsi","company":"Virat Prime","suitable_for":"TATA","size":"80x12","qty":"1","price":"320","total":320},{"id":"7","img":"images/parts/stand3.jpeg","name":"Stand","company":"Virat Prime","suitable_for":"MAHINDRA","size":"45x6","qty":"1","price":"980","total":980},{"id":"2","img":"images/parts/tulsi.jpg","name":"Tulsi","company":"Virat Prime","suitable_for":"TATA","size":"80x12","qty":"11","price":"320","total":3520}]'),
(8, 1, 'null'),
(9, 1, 'null'),
(10, 1, 'null'),
(11, 2, '[{"id":"5","img":"images/parts/glove.jpeg","name":"Glove","company":"Virat Prime","suitable_for":"LEYLAND","size":"3x1-2","qty":"1","price":"550","total":550}]'),
(12, 2, '[{"id":"5","img":"images/parts/glove.jpeg","name":"Glove","company":"Virat Prime","suitable_for":"LEYLAND","size":"3x1-2","qty":"1","price":"550","total":550},{"id":"5","img":"images/parts/glove.jpeg","name":"Glove","company":"Virat Prime","suitable_for":"LEYLAND","size":"3x1-2","qty":"1","price":"550","total":550}]'),
(13, 2, 'null'),
(14, 3, '[{"id":"9","img":"images/parts/stand4.jpeg","name":"Stans","company":"Virat Prime","suitable_for":"MAHINDRA","size":"45x6","qty":"1","price":"780","total":780},{"id":"7","img":"images/parts/stand3.jpeg","name":"Stand","company":"Virat Prime","suitable_for":"MAHINDRA","size":"45x6","qty":"1","price":"980","total":980}]'),
(15, 3, '[{"id":"9","img":"images/parts/stand4.jpeg","name":"Stans","company":"Virat Prime","suitable_for":"MAHINDRA","size":"45x6","qty":"1","price":"780","total":780},{"id":"7","img":"images/parts/stand3.jpeg","name":"Stand","company":"Virat Prime","suitable_for":"MAHINDRA","size":"45x6","qty":"1","price":"980","total":980}]'),
(16, 3, '[{"id":"9","img":"images/parts/stand4.jpeg","name":"Stans","company":"Virat Prime","suitable_for":"MAHINDRA","size":"45x6","qty":"1","price":"780","total":780},{"id":"7","img":"images/parts/stand3.jpeg","name":"Stand","company":"Virat Prime","suitable_for":"MAHINDRA","size":"45x6","qty":"1","price":"980","total":980}]'),
(17, 4, '[{"id":"8","img":"images/parts/mix.jpg","name":"MIX PEBBS","company":"Virat Prime","suitable_for":"GGN-PEBBS","size":"3x7-16","qty":"3","price":"480","total":1440}]'),
(18, 4, '[{"id":"8","img":"images/parts/mix.jpg","name":"MIX PEBBS","company":"Virat Prime","suitable_for":"GGN-PEBBS","size":"3x7-16","qty":"3","price":"480","total":1440},{"id":"2","img":"images/parts/tulsi.jpg","name":"Tulsi","company":"Virat Prime","suitable_for":"GGN-PLANTS","size":"80x12","qty":"1","price":"320","total":320}]'),
(19, 5, '[{"id":"10","img":"images/parts/sim.jpeg","name":"Pots","company":"Virat Prime","suitable_for":"GGN-POT","size":"---","qty":"2","price":"670","total":1340}]'),
(20, 7, '[{"id":"9","img":"images/parts/stand4.jpeg","name":"Stans","company":"Virat Prime","suitable_for":"GGN-STAND","size":"---","qty":"1","price":"780","total":780}]');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address`) VALUES
(1, 'yogesq', 'patel', 'shashi7567@gmail.com', 'sfGvTZmCUxJkw', '7802060937', 'oirqwieropwqemce'),
(2, 'jigir', 'shah', 'ther90@gmail.com', 'sffJDcNdcYS4g', '4536372890', 'saga'),
(4, 'joy', 'patel', 'joypatel@gmail.com', 'sfvvzHpHOFeIw', '8465739204', 'adgt'),
(5, 'afg', 'sfgsd', '234@gmail.com', 'sfKSwveNQ3chE', '3452345465', 'fsgbfg s'),
(6, 'Shashank', 'panchal', 'shashi7567@gmail.com', 'sfhrVs/3lBPfM', '8568954712', 'dfa'),
(7, 'jignesh', 'vora', 'jig@gmail.com', 'sfVCyJKPEqGO.', '8754693214', 'dfadf'),
(8, 'jay', 'patel', 'jigar@xp.in', 'sfaTmqdD9jzKw', '1234567890', 'xyz'),
(9, 'xyz', 'xyx', 'shas@gmail.com', 'sffJDcNdcYS4g', '1234567899', 'sdfe');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE IF NOT EXISTS `inquiry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`id`, `name`, `email`, `mobile`, `message`) VALUES
(1, 'jignesh', 'jignesh@yahoo.in', '7856942156', 'kuvar pathu chhe k nai');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_id` int(11) NOT NULL,
  `items` text NOT NULL,
  `status` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `cust_id`, `items`, `status`) VALUES
(1, 1, '[{"id":"2","img":"images/parts/tulsi.jpg","name":"Tulsi","company":"Virat Prime","suitable_for":"TATA","size":"80x12","qty":"1","price":"320","total":320},{"id":"7","img":"images/parts/stand3.jpeg","name":"Stand","company":"Virat Prime","suitable_for":"MAHINDRA","size":"45x6","qty":"1","price":"980","total":980},{"id":"2","img":"images/parts/tulsi.jpg","name":"Tulsi","company":"Virat Prime","suitable_for":"TATA","size":"80x12","qty":"11","price":"320","total":3520}]', 'completed'),
(2, 2, '[{"id":"5","img":"images/parts/glove.jpeg","name":"Glove","company":"Virat Prime","suitable_for":"LEYLAND","size":"3x1-2","qty":"1","price":"550","total":550},{"id":"5","img":"images/parts/glove.jpeg","name":"Glove","company":"Virat Prime","suitable_for":"LEYLAND","size":"3x1-2","qty":"1","price":"550","total":550}]', 'pending'),
(3, 3, '[{"id":"9","img":"images/parts/stand4.jpeg","name":"Stans","company":"Virat Prime","suitable_for":"MAHINDRA","size":"45x6","qty":"1","price":"780","total":780},{"id":"2","img":"images/parts/tulsi.jpg","name":"Tulsi","company":"Virat Prime","suitable_for":"TATA","size":"80x12","qty":"1","price":"320","total":320},{"id":"4","img":"images/parts/pebbs.jpg","name":"Pebbs","company":"Virat Prime","suitable_for":"parabolic","size":"3x7-16","qty":"1","price":"780","total":780}]', 'completed'),
(4, 3, '[{"id":"9","img":"images/parts/stand4.jpeg","name":"Stans","company":"Virat Prime","suitable_for":"MAHINDRA","size":"45x6","qty":"1","price":"780","total":780},{"id":"7","img":"images/parts/stand3.jpeg","name":"Stand","company":"Virat Prime","suitable_for":"MAHINDRA","size":"45x6","qty":"1","price":"980","total":980}]', 'pending'),
(5, 4, '[{"id":"8","img":"images/parts/mix.jpg","name":"MIX PEBBS","company":"Virat Prime","suitable_for":"GGN-PEBBS","size":"3x7-16","qty":"3","price":"480","total":1440},{"id":"2","img":"images/parts/tulsi.jpg","name":"Tulsi","company":"Virat Prime","suitable_for":"GGN-PLANTS","size":"80x12","qty":"1","price":"320","total":320}]', 'completed'),
(6, 5, '[{"id":"10","img":"images/parts/sim.jpeg","name":"Pots","company":"Virat Prime","suitable_for":"GGN-POT","size":"---","qty":"2","price":"670","total":1340}]', 'pending'),
(7, 7, '[{"id":"9","img":"images/parts/stand4.jpeg","name":"Stans","company":"Virat Prime","suitable_for":"GGN-STAND","size":"---","qty":"1","price":"780","total":780}]', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

CREATE TABLE IF NOT EXISTS `parts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image` varchar(50) NOT NULL,
  `size` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `company` varchar(30) NOT NULL,
  `suitable_for` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `parts`
--

INSERT INTO `parts` (`id`, `name`, `image`, `size`, `price`, `company`, `suitable_for`, `stock`) VALUES
(1, 'lemon', 'images/parts/lemon.jpeg', '---', 450, 'Greenery Shop', 'GGN-PLANTS', 0),
(2, 'Tulsi', 'images/parts/tulsi.jpg', '---', 320, 'Greenery Shop', 'GGN-PLANTS', 86),
(3, 'Pots', 'images/parts/pot.jpeg', '---', 590, 'Greenery Shop', 'GGN-POT', 100),
(4, 'Pebbs', 'images/parts/pebbs.jpg', '---', 780, 'Greenery Shop', 'GGN-PEBBS', 99),
(5, 'Glove', 'images/parts/glove.jpeg', '---', 550, 'Greenery Shop', 'GGN-TOOLS', 98),
(6, 'simple Glove', 'images/parts/gloves.jpg', '---', 320, 'Greenery Shop', 'GGN-TOOLS', 100),
(7, 'Stand', 'images/parts/stand3.jpeg', '---', 980, 'Greenery Shop', 'GGN-STAND', 98),
(8, 'MIX PEBBS', 'images/parts/mix.jpg', '---', 480, 'Greenery Shop', 'GGN-PEBBS', 87),
(9, 'Stans', 'images/parts/stand4.jpeg', '---', 780, 'Greenery Shop', 'GGN-STAND', 37),
(10, 'Pots', 'images/parts/sim.jpeg', '---', 670, 'Greenery Shop', 'GGN-POT', 43),
(11, 'Sickle', 'images/parts/Sickle.jpg', '---', 520, 'Greenery Shop', 'GGN-TOOLS', 10),
(12, 'Urea', 'images/parts/urea.jpg', '---', 600, 'Greenery Shop', 'GGN-FER', 50),
(13, 'ALL PURPOSE', 'images/parts/bag.jpg', '---', 800, 'Greenery Shop', 'GGN-FER', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
