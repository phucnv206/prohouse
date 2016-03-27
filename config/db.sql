-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 27, 2016 at 02:42 PM
-- Server version: 5.5.45-cll-lve
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `prohou13_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE IF NOT EXISTS `ads` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `image`, `url`) VALUES
(1, 'http://prohouse.vn/upload/slide/slider2.jpg', ''),
(2, 'http://www.prohouse.vn/upload/slide/slider1.jpg', 'http://www.vingroup.net/en-us/news-events/news-events/news-activity/phat-tich-center-starting-to-admit-lonely-old-people-and-orphans-965.aspx');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` int(10) unsigned NOT NULL,
  `modified` int(10) unsigned NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `pos` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `created`, `modified`, `status`, `pos`) VALUES
(8, 1459050241, 1459051276, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category_detail`
--

CREATE TABLE IF NOT EXISTS `category_detail` (
  `category_id` int(10) unsigned NOT NULL,
  `lang` varchar(10) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`category_id`,`lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category_detail`
--

INSERT INTO `category_detail` (`category_id`, `lang`, `title`) VALUES
(8, 'en-US', 'Vinhomes'),
(8, 'vi-VN', 'Vinhomes');

-- --------------------------------------------------------

--
-- Table structure for table `category_images`
--

CREATE TABLE IF NOT EXISTS `category_images` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `category_images`
--

INSERT INTO `category_images` (`id`, `category_id`, `image`) VALUES
(5, 8, 'http://www.prohouse.vn/upload/slide/H8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category_info`
--

CREATE TABLE IF NOT EXISTS `category_info` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `category_info`
--

INSERT INTO `category_info` (`id`, `category_id`) VALUES
(15, 8),
(16, 8);

-- --------------------------------------------------------

--
-- Table structure for table `category_info_detail`
--

CREATE TABLE IF NOT EXISTS `category_info_detail` (
  `category_info_id` int(10) unsigned NOT NULL,
  `lang` varchar(10) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `content` text,
  PRIMARY KEY (`category_info_id`,`lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category_info_detail`
--

INSERT INTO `category_info_detail` (`category_info_id`, `lang`, `title`, `content`) VALUES
(15, 'en-US', '  LOCATION', '<p>FIVE-STAR HOME SERVICES<br />Vinhomes Central Park provides the most comfortable living environment and world-class living standards for residents by focusing on customer care and offer the best five-star services:<br />- Management service fees waived for 10 years<br />- 24/7 customer service center<br />- 24/7 security service<br />- Home services: cleaning, laundry, gardening<br />- Home catering service<br />- Home repair, maintenance and technical support<br />- Business services: photocopying, printing, travel booking, flowers, express delivery<br />- Leasing support and management services<br />- Each building will have its own luxury lounge for residents to receive guests and socialize<br />TRULY ENJOYING THE LUXURY LIFE AND PROSPEROUS COMMUNITY<br />Vinhomes Central Park offers superlative living experience to thriving communities. Home owners are able to discover the Saigon&rsquo;s beauty over the river and enjoy the breathtaking view every day on their luxurious yacht</p>'),
(15, 'vi-VN', 'VỊ TRÍ', ''),
(16, 'en-US', 'OVERVIEW', '<p>FIVE-STAR HOME SERVICES<br />Vinhomes Central Park provides the most comfortable living environment and world-class living standards for residents by focusing on customer care and offer the best five-star services:<br />- Management service fees waived for 10 years<br />- 24/7 customer service center<br />- 24/7 security service<br />- Home services: cleaning, laundry, gardening<br />- Home catering service<br />- Home repair, maintenance and technical support<br />- Business services: photocopying, printing, travel booking, flowers, express delivery<br />- Leasing support and management services<br />- Each building will have its own luxury lounge for residents to receive guests and socialize<br />TRULY ENJOYING THE LUXURY LIFE AND PROSPEROUS COMMUNITY<br />Vinhomes Central Park offers superlative living experience to thriving communities. Home owners are able to discover the Saigon&rsquo;s beauty over the river and enjoy the breathtaking view every day on their luxurious yacht</p>'),
(16, 'vi-VN', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `created` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `phone` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `address` varchar(255) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `modified` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `modified`) VALUES
(1, 1453402372);

-- --------------------------------------------------------

--
-- Table structure for table `page_detail`
--

CREATE TABLE IF NOT EXISTS `page_detail` (
  `page_id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `lang` varchar(10) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `thumbnail` varchar(255) DEFAULT NULL,
  `summary` varchar(500) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`page_id`,`lang`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `page_detail`
--

INSERT INTO `page_detail` (`page_id`, `lang`, `title`, `thumbnail`, `summary`, `content`) VALUES
(1, 'en-US', 'About', '0', '"Lorem ipsum dolor sit amet, rebum molestie referrentur at pro, vix ne habeo latine urbanitas, cum errem nobis eloquentiam ut. Modus adversarium ad usu, pri ei prima falli quaeque. Choro constituam signiferumque pri in, his erant graecis interesset ut."', '<p>"Lorem ipsum dolor sit amet, rebum molestie referrentur at pro, vix ne habeo latine urbanitas, cum errem nobis eloquentiam ut. Modus adversarium ad usu, pri ei prima falli quaeque. Choro constituam signiferumque pri in, his erant graecis interesset ut.""Lorem ipsum dolor sit amet, rebum molestie referrentur at pro, vix ne habeo latine urbanitas, cum errem nobis eloquentiam ut. Modus adversarium ad usu, pri ei prima falli quaeque. Choro constituam signiferumque pri in, his erant graecis interesset ut.""Lorem ipsum dolor sit amet, rebum molestie referrentur at pro, vix ne habeo latine urbanitas, cum errem nobis eloquentiam ut. Modus adversarium ad usu, pri ei prima falli quaeque. Choro constituam signiferumque pri in, his erant graecis interesset ut.""Lorem ipsum dolor sit amet, rebum molestie referrentur at pro, vix ne habeo latine urbanitas, cum errem nobis eloquentiam ut. Modus adversarium ad usu, pri ei prima falli quaeque. Choro constituam signiferumque pri in, his erant graecis interesset ut."</p>'),
(1, 'vi-VN', 'Giới thiệu', '0', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` int(10) unsigned NOT NULL,
  `modified` int(10) unsigned NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `post_detail`
--

CREATE TABLE IF NOT EXISTS `post_detail` (
  `post_id` int(10) unsigned NOT NULL,
  `lang` varchar(10) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `thumbnail` varchar(255) NOT NULL DEFAULT '',
  `summary` varchar(500) DEFAULT '',
  `content` text,
  PRIMARY KEY (`post_id`,`lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `price` bigint(20) unsigned NOT NULL DEFAULT '0',
  `created` int(10) unsigned NOT NULL,
  `modified` int(10) unsigned NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `for` tinyint(1) NOT NULL DEFAULT '0',
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `location` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `price`, `created`, `modified`, `status`, `for`, `type`, `location`) VALUES
(8, 8, 30000, 1459051200, 1459051200, 0, 1, 0, 136);

-- --------------------------------------------------------

--
-- Table structure for table `product_detail`
--

CREATE TABLE IF NOT EXISTS `product_detail` (
  `product_id` int(10) unsigned NOT NULL,
  `lang` varchar(10) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `thumbnail` varchar(255) NOT NULL DEFAULT '',
  `summary` varchar(500) DEFAULT '',
  `content` text,
  PRIMARY KEY (`product_id`,`lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_detail`
--

INSERT INTO `product_detail` (`product_id`, `lang`, `title`, `thumbnail`, `summary`, `content`) VALUES
(8, 'en-US', 'VINHOMES CENTRAL PARK – THE MOST MODERN & CLASSY TOWNSHIP IN VIETNAM', 'http://www.prohouse.vn/upload/Project/vinhomes-central-park-overview.jpg', 'With a total area of 43.9 hectares located on a prime stretch of Saigon’s riverfront spanning more than 1km, Vinhomes Central Park promises to bring to its residents the ideal living environment, a 5-star modern lifestyle. Vinhomes Central Park is a best place for living, the most modern and comfortable life.', '<p>VINHOMES CENTRAL PARK OVERVIEW<br />Invested by Tan Lien Phat Construction and Investment Corporation &ndash; A Member of VINGROUP<br />Total area : 43.9 ha<br />Total investment: 30,000 billion VND<br />Construction density: 16%<br />Expected completion: 2018<br />Riverside central park: 13.8ha<br />The Marina, Vinmec International Hospital &amp; Vinschool<br /> <br />&gt; VINHOMES CENTRAL PARK APARTMENTS<br /> . The Central (C1,2,3)<br /> . The Park (P1 - P7)<br /> . The Landmark (L1 - L6)<br /> . The Landmark Plus<br />&gt; VINHOMES CENTRAL PARK VILLAS<br /> . 88 single and duplex Villas<br /> . Land area: 223 sqm &ndash; 275 sqm &ndash; 500 sqm &ndash; 700 sqm<br /> . Land price (excluding construction cost): 160mil. &ndash; 220mil. VND/sqm</p>\r\n<p>&gt; LANDMARK 81<br /> Landmark 81 &ndash; The highest tower in Vietnam with 81 stories<br /> . Ultra-luxury commercial complex<br /> . Service Apartments<br /> . Hotel</p>\r\n<p>A PRIME LOCATION IN THE CENTRAL OF CITY<br />Vinhomes Central Park Project is located in Tan Cang, one of the most desirable locations in central of Ho Chi Minh City, smartly connected to the central of city via main roads, railway and waterway. <br />88 Vinhomes Central Park Villas, located amidst green trees providing clean air along the Saigon River, are smartly designed, comfort and luxury in a peaceful and private parkland.<br />The Vinhomes Central Park Apartments (1-4 bedrooms, from 50m2 to 200m2) including Officetels, Duplexes, Penthouses and Shophouses are designed in a modern architectural style.</p>\r\n<p>OUTSTANDING CONVENIENCE<br />Vinhomes Central Park establishes a distinguished living standard. Residents of Vinhomes Central Park will be able to enjoy fresh air and endless greenery, all in harmony with nature.</p>\r\n<p><img src="/upload/Project/vinhomes-central-park-overview.jpg" alt="" width="900" height="336" /></p>\r\n<p>VINMEC HEALTHCARE, VINSCHOOL EDUCATION<br />At Vinhomes Central Park, residents will not only be able to enjoy the confortable and modern living environment but also 5-star healthcare service at Vinmec International Hospital and high-quality education service at Vinschool, ensuring a sophisticated and secure lifestyle.<br />Vinmec Hospital has 3 basements and 7 aboveground levels, over 600 examination rooms fully equipped with modern technology, prestigious medical experts and impeccable service.<br />Vinschool offers outstanding kindergarten, primary and secondary education with professional teaching staffs and modern facilities will encourage the young generation living in Vinhomes Central Park to develop intellectually, physically and emotionally.</p>\r\n<p>&nbsp;</p>'),
(8, 'vi-VN', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE IF NOT EXISTS `slide` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `image`, `url`) VALUES
(3, 'http://prohouse.vn/upload/slide/slider2.jpg', 'http://vinhomes.vn/'),
(4, 'http://www.prohouse.vn/upload/slide/H8.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `level` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `username` varchar(100) NOT NULL DEFAULT '',
  `password_hash` varchar(100) NOT NULL DEFAULT '',
  `password_token` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `auth_key` varchar(100) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `level`, `username`, `password_hash`, `password_token`, `email`, `auth_key`, `status`) VALUES
(1, 0, 'admin', '$2y$13$OyjzeJ1vhNsj4vvXw.xujeQOClubjFX/n3.TXp0.rI9PqmfFHylFe', NULL, 'piktr206@gmail.com', NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
