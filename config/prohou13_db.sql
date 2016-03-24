-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 24, 2016 at 10:33 PM
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
(2, 'http://www.prohouse.vn/upload/slide/slider1.jpg', 'http://www.vingroup.net/en-us/news-events/news-events/news-activity/phat-tich-center-starting-to-admit-lonely-old-people-and-orphans-965.aspx'),
(3, 'http://www.prohouse.vn/upload/slide/ab.jpg', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `created`, `modified`, `status`, `pos`) VALUES
(1, 1458155196, 1458482100, 0, 0),
(2, 1458433838, 1458481830, 0, 2),
(3, 1458482214, 1458482288, 0, 5),
(4, 1458482264, 1458482264, 0, 3),
(5, 1458482306, 1458482306, 0, 6),
(6, 1458482321, 1458482321, 0, 7),
(7, 1458482351, 1458482351, 0, 8);

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
(1, 'en-US', 'BinhAnPerl'),
(1, 'vi-VN', 'BinhAnPerl'),
(2, 'en-US', 'Vinpearl'),
(2, 'vi-VN', ''),
(3, 'en-US', 'SaigonPearl Villas'),
(3, 'vi-VN', ''),
(4, 'en-US', 'Cape Pearl'),
(4, 'vi-VN', ''),
(5, 'en-US', 'ThaoDienPearl'),
(5, 'vi-VN', ''),
(6, 'en-US', 'Pearl Plaza'),
(6, 'vi-VN', ''),
(7, 'en-US', 'ThanhDa Pearl'),
(7, 'vi-VN', '');

-- --------------------------------------------------------

--
-- Table structure for table `category_images`
--

CREATE TABLE IF NOT EXISTS `category_images` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `category_info`
--

CREATE TABLE IF NOT EXISTS `category_info` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `category_info`
--

INSERT INTO `category_info` (`id`, `category_id`) VALUES
(1, 2),
(2, 2),
(3, 1),
(4, 1),
(5, 1),
(6, 1);

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
(1, 'en-US', 'Hjbccjk', '<p>Ihgcmlob</p>'),
(1, 'vi-VN', '', ''),
(2, 'en-US', 'Jouggcf', '<p>Iutbbbbc</p>'),
(2, 'vi-VN', '', ''),
(3, 'en-US', 'OVERVIEW', '<p>CCA l&agrave; t&ecirc;n viết tắt của Confetti Creative Awards, l&agrave; cuộc thi d&agrave;nh cho c&aacute;c sinh vi&ecirc;n đang theo học thiết kế đồ họa tại Việt Nam, được tổ chức 2 năm một lần. Cuộc thi được tổ chức bởi Giấy Lan Vi v&agrave; được sự hỗ trợ về chuy&ecirc;n m&ocirc;n bởi c&aacute;c trường: ĐH Kiến Tr&uacute;c TP.HCM, ĐH Mỹ Thuật TP.HCM v&agrave; ĐH SPKT TP.HCM. Mục đ&iacute;ch của cuộc thi l&agrave; chọn ra những sản phẩm mỹ thuật ứng dụng tr&ecirc;n chất liệu giấy mỹ thuật xuất sắc nhất, nhằm ph&aacute;t huy hết khả năng s&aacute;ng tạo từ mỗi sinh vi&ecirc;n. Định hướng v&agrave; hỗ trợ sinh vi&ecirc;n ho&agrave;n thiện sản phẩm thiết kế trong thực tế một c&aacute;ch chuy&ecirc;n nghiệp.</p>'),
(3, 'vi-VN', '', ''),
(4, 'en-US', '  LOCATION', '<p>Build a front page for your WooCommerce store in a matter of minutes. The neat and clean presentation will help your sales and make your store accessible to everyone.</p>'),
(4, 'vi-VN', '', ''),
(5, 'en-US', '  FACILITIES', '<p>Showcase your team, products, clients, about info, testimonials, latest posts from the blog, contact form, additional calls to action. Everything translation ready.</p>'),
(5, 'vi-VN', '', ''),
(6, 'en-US', 'CONSTRUCTION PROGRESS', '<p><strong>The high-end apartments for lease in Vinhomes Royal City are in the premier and most modern urban area,</strong>situated in a prime location at southwestern gateway to Ha Noi &ndash; <strong>Royal City (72A Nguyen Trai Street, Thanh Xuan District, Hanoi), covering an area of approximately 12 hectares.</strong></p>\r\n<p><strong>As the most prominent project in Hanoi, Royal City</strong> is the convergence of outstanding modern facilities including the Class A <em>Vincom Office</em>, Asia&rsquo;s largest underground shopping mall, unique amusement parks (an indoor water park, ice rink, Vinpearl Game, cinema, etc.), international schools, <em>Vinmec International Clinic &ndash; Royal City</em>, underground parking, outdoor and indoor heated all-weather swimming pools and sports facilities.</p>\r\n<p>Inspired by elegant European style, <strong>Vinhomes Royal City high-end premium apartments</strong> are surrounded by large green, clean and safe open spaces&mdash;an ideal international-style living environment with <strong>&ldquo;All-in-one&rdquo; </strong>services. Vinhomes Royal City apartments for lease include 39 types of apartments with areas ranging from 88 m2 to 187 m2.</p>\r\n<p>Vinhomes Royal City offers its residents a pleasant and clean living environment, helping them quickly recharge after a day at the office.</p>'),
(6, 'vi-VN', '', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `created`, `modified`, `status`) VALUES
(1, 1458482995, 1458482995, 0),
(2, 1458483022, 1458483022, 0);

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

--
-- Dumping data for table `post_detail`
--

INSERT INTO `post_detail` (`post_id`, `lang`, `title`, `thumbnail`, `summary`, `content`) VALUES
(1, 'en-US', ' Soviet Union veteran delegation revisiting Vietnam', 'http://www.prohouse.vn/upload/slide/slider1.jpg', 'Dr. Philippe Jacob - Head of Orthopaedic Surgery of Creil Center Hospital - France to visit and work at Vinmec International Hospital', '<div class="zonepage-ccl">\r\n<div class="menubar clearfix">\r\n<ul>\r\n<li><a href="http://www.vingroup.net/en-us/news-events/press-information.aspx">Press Information</a></li>\r\n</ul>\r\n</div>\r\n<div class="hr">&nbsp;</div>\r\n</div>\r\n<div class="zonepage-ccr">\r\n<div class="zoneteaser clearfix">\r\n<div class="zoneteaser-i clearfix">\r\n<ul>\r\n<li>\r\n<h4><a id="ctl03_ctl04_rptContent_ctl00_hlHeadline" href="http://www.vingroup.net/en-us/news-events/news-events/news-activity/dr-philippe-jacob-head-of-orthopaedic-surgery-of-creil-center-hospital-france-to-2026.aspx">Dr. Philippe Jacob - Head of Orthopaedic Surgery of Creil Center Hospital - France to visit and work at Vinmec International Hospital</a></h4>\r\n<h5>10/24/2012 02:57</h5>\r\n<p>From 16/10/2012 Dr Philippe Jacob will start his journey at Vinmec. During his visit here Dr Jacob will act as medical consultant, supporting orthopedic doctors of Vinmec International Hospital and provide consultation advice for treatment of patients.</p>\r\n</li>\r\n<li class="sep"></li>\r\n<li>\r\n<h4><a id="ctl03_ctl04_rptContent_ctl02_hlHeadline" href="http://www.vingroup.net/en-us/news-events/news-events/news-activity/soviet-union-veteran-delegation-revisiting-vietnam-968.aspx">Soviet Union veteran delegation revisiting Vietnam</a></h4>\r\n<h5>01/05/2012 09:20</h5>\r\n<p>A Soviet delegation of 35 veterans of Russian Federation, Belarus and Ukraine &ndash; who devoted to the American War in Vietnam are revisiting the country from April 24 to May 03, 2010.</p>\r\n</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>'),
(1, 'vi-VN', '', '', '', ''),
(2, 'en-US', 'The trophy “For the Peace and Friendship of Nations” to Vincom JSC and An Vien JSC', 'http://www.prohouse.vn/upload/slide/slider2.jpg', 'Morning June 24, 2010, at the Head Office of The Vietnam Union of Friendship Organizations (VUFO), Chairman Vu Xuan Hong gave the trophy “For the Peace and Friendship of Nations” to Vincom JSC and An Vien JSC.', '<p>Morning June 24, 2010, at the Head Office of The Vietnam Union of Friendship Organizations (VUFO), Chairman Vu Xuan Hong gave the trophy &ldquo;For the Peace and Friendship of Nations&rdquo; to Vincom JSC and An Vien JSC.Morning June 24, 2010, at the Head Office of The Vietnam Union of Friendship Organizations (VUFO), Chairman Vu Xuan Hong gave the trophy &ldquo;For the Peace and Friendship of Nations&rdquo; to Vincom JSC and An Vien JSC.</p>'),
(2, 'vi-VN', '', '', '', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `price`, `created`, `modified`, `status`, `for`, `type`, `location`) VALUES
(1, 1, 29000000, 1458156253, 1458482544, 0, 0, 0, 140),
(2, 1, 52000000, 1458200230, 1458482600, 0, 1, 1, 140),
(3, 2, 54000000, 1458482693, 1458482693, 0, 0, 2, 131),
(4, 6, 540000, 1458482826, 1458482826, 0, 1, 0, 131),
(5, 7, 87000000, 1458482916, 1458482916, 0, 0, 0, 143);

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
(1, 'en-US', 'Vingroup opens 5-star resorts in Ha Long and Phu Quoc', 'http://www.prohouse.vn/upload/slide/slider2.jpg', '', '<p><span style="font-size: small;">Vinpearl Ha Long Bay is a reasonably priced 5-star beach getaway only a short 3-hour drive from Hanoi, an outstanding feature sure to be welcomed by residents of the capital. Designed to meet the demands of tourism, entertainment and MICE, this first-of-its-kind facility in North Vietnam will help transform Ha Long from a sight-seeing destination into the first choice for holiday retreats and corporate events.</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style="font-size: small;">On the same day, 31 October 2015, Vingroup also launched Vinpearl Phu Quoc Resort &amp; Golf, the second phase of Vinpearl&rsquo;s mega project on Phu Quoc Island. Distinctively styled compared with the first phase of Vinpearl Phu Quoc Resort, Resort &amp; Golf is clad in classical beauty, where the exquisite French design is in perfect harmony with European classical decorative touches. The resort boasts 402 guest rooms and 220 international-standard villas, meeting the holiday needs from individual customers to large groups, and accommodating a range of prices from a flexible Bed &amp; Breakfast package to full-board.</span></p>\r\n<p><span style="font-size: small;">Together with the 27-hole Vinpearl Golf Club, Vinpearl Land outdoor amusement park and the upcoming Vinpearl Safari and Conservation Park which is expected to open in December this year, Vinpearl Phu Quoc Resort &amp; Golf promises a unique beach holiday experience.</span></p>\r\n<p><span style="font-size: small;">With its diversification of products, competitive pricing and opening more large-scale luxury resorts nation-wide, Vingroup continues to deliver on its promise to bring world-class hospitality products and services closer to the public, fulfilling the mission &ldquo;To create a better life for the Vietnamese people.&rdquo; Vinpearl projects are integral to Vingroup&rsquo;s strategy to promote Vienamese tourism and make the country a favored destination for international visitors.</span></p>\r\n<p><u><span style="font-size: small;">Additional information:</span></u></p>\r\n<p><em><span style="font-size: small;">Vinpearl Hotel Management LLC., a subsidiary of Vingroup, operates and manages 7 resorts in Vietnam under the Vinpearl brand: Vinpearl Phu Quoc Resort, Vinpearl Phu Quoc Resort &amp; Golf, Vinpearl Da Nang Resort &amp; Villas, Vinpearl Nha Trang Resort, Vinpearl Luxury Nha Trang, Vinpearl Nha Trang Bay Resort &amp; Villas, and Vinpearl Ha Long Bay Resort.</span></em></p>\r\n<p><em><span style="font-size: small;">There will soon be 8 properties in the portfolio by the end of this year following the opening of Vinpearl Golf Land Resort &amp; Villas.</span></em></p>\r\n<p><em><span style="font-size: small;">&nbsp;</span></em></p>'),
(1, 'vi-VN', 'Căn hộ Bình An Pearl Quận 2 TP.HCM', 'https://blogs.intel.com/iot/files/2015/01/SmartBuilding.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s</p>'),
(2, 'en-US', 'Vincharm Spa – For the benefits of customers', 'http://www.prohouse.vn/upload/slide/slider1.jpg', '', '<p>With a total area of 43.9 hectares situated on a prime stretch of Saigon&rsquo;s riverfront spanning more than one</p>\r\n<p>kilometer, Vinhomes Central Park promises to bring to its residents the ideal living environment - harmony with</p>\r\n<p>nature combined with a five-star city lifestyle. Vinhomes Central Park is a place to build true life values worthy of</p>\r\n<p>this most modern and classy township development.</p>\r\n<p>Total area : 43.9 ha</p>\r\n<p>Construction density: Approx. 15,77%</p>\r\n<p>Expected completion: 2018</p>\r\n<p>Components:</p>\r\n<p>&gt;&nbsp;The Apartments&nbsp; &nbsp; &nbsp;&nbsp;</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;. The Central</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;. The Park</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;. The Landmark</p>\r\n<p>&gt;&nbsp;The Villas&nbsp;</p>\r\n<p>&gt; Landmark 81</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;. Ultra-luxury commercial &amp; recreational complex</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;. Apartments</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;. Hotel</p>\r\n<p>&gt;&nbsp;The Marina</p>\r\n<p>&gt;&nbsp; Vinmec International Hospital</p>\r\n<p>&gt;&nbsp; Vinschool K-12 education</p>\r\n<p>&gt;&nbsp; 14ha riverside Central Park</p>\r\n<p>A PRIME LOCATION IN THE CITY CENTER</p>\r\n<p>The project is located in Tan Cang, one of the most desirable locations in central Ho Chi Minh City, smartly</p>\r\n<p>connected to the city&rsquo;s key points via road, railway, riverway and the underground metro running from Ben</p>\r\n<p>Thanh to Suoi Tien.&nbsp;</p>\r\n<p>Located amidst green trees providing clean air along the Saigon River, 88 Vinhomes Central Park Villas in</p>\r\n<p>total, are smartly designed, comfort and luxury with the backdrop of natural lighting set in a peaceful and private</p>\r\n<p>parkland setting.</p>\r\n<p>The Apartments (1-4 bedrooms, ranging from 50m2 to 200m2), Duplexes and Penthouses in Vinhomes</p>\r\n<p>Central Park are designed in a contemporary architectural style.</p>'),
(2, 'vi-VN', 'VINHOMES CENTRAL PARK – VIETNAM’S MOST MODERN, CLASSY  TOWNSHIP DEVELOPMENT', 'http://prohouse.vn/upload/slide/slider2.jpg', '', '<p>With a total area of 43.9 hectares situated on a prime stretch of Saigon&rsquo;s riverfront spanning more than one</p>\r\n<p>kilometer, Vinhomes Central Park promises to bring to its residents the ideal living environment - harmony with</p>\r\n<p>nature combined with a five-star city lifestyle. Vinhomes Central Park is a place to build true life values worthy of</p>\r\n<p>this most modern and classy township development.</p>\r\n<p>Total area : 43.9 ha</p>\r\n<p>Construction density: Approx. 15,77%</p>\r\n<p>Expected completion: 2018</p>\r\n<p>Components:</p>\r\n<p>&gt;&nbsp;The Apartments&nbsp; &nbsp; &nbsp;&nbsp;</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;. The Central</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;. The Park</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;. The Landmark</p>\r\n<p>&gt;&nbsp;The Villas&nbsp;</p>\r\n<p>&gt; Landmark 81</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;. Ultra-luxury commercial &amp; recreational complex</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;. Apartments</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;. Hotel</p>\r\n<p>&gt;&nbsp;The Marina</p>\r\n<p>&gt;&nbsp; Vinmec International Hospital</p>\r\n<p>&gt;&nbsp; Vinschool K-12 education</p>\r\n<p>&gt;&nbsp; 14ha riverside Central Park</p>\r\n<p>A PRIME LOCATION IN THE CITY CENTER</p>\r\n<p>The project is located in Tan Cang, one of the most desirable locations in central Ho Chi Minh City, smartly</p>\r\n<p>connected to the city&rsquo;s key points via road, railway, riverway and the underground metro running from Ben</p>\r\n<p>Thanh to Suoi Tien.&nbsp;</p>\r\n<p>Located amidst green trees providing clean air along the Saigon River, 88 Vinhomes Central Park Villas in</p>\r\n<p>total, are smartly designed, comfort and luxury with the backdrop of natural lighting set in a peaceful and private</p>\r\n<p>parkland setting.</p>\r\n<p>The Apartments (1-4 bedrooms, ranging from 50m2 to 200m2), Duplexes and Penthouses in Vinhomes</p>\r\n<p>Central Park are designed in a contemporary architectural style.</p>'),
(3, 'en-US', 'Press Information Vincom Center Officially Launches Loyalty Membership Cardsca', 'http://www.prohouse.vn/upload/slide/S15d-Opto-Banner-Slide3.jpg', ' On November 1st, 2010, Vincom JSC officially launched the “Vincom Center Loyalty Membership Card” program for customers of Vincom Center Shopping Mall.', '<p align="justify">Shopping Mall, customers will receive a Vincom Center Loyalty Membership Card. With this card, customers can accumulate points at participating POS enabled mall retailers where every VND 1,000 purchase is equivalent to 1 point. In addition, customers will be entitled to discounts offered by representative shops of famous brands that are registered program members. A list of member shops will be regularly updated on <a href="http://www.vincomcenter.com/">www.vincomcenter.com</a> and available at each member store location.</p>\r\n<p align="justify">&nbsp;</p>\r\n<p align="justify"><br />Another outstanding feature of the Vincom Center Loyalty Membership Card is its payment function, whereby cardholders can deposit money into the card and turn it into a Vincom Center Loyalty &ndash; Techcombank payment card in accordance with procedures and conditions prescribed by Techcombank. Cardholders will then be able to use the card for all transactions at domestic payment counters, bank counters, ATMs etc.</p>\r\n<p align="justify"><br />For further details regarding the program, please contact:</p>\r\n<p align="justify">Vincom Center Loyalty Card Services &ndash; 72 Le Thanh Ton &amp; 47 Ly Tu Trong, District 1, HCMC</p>\r\n<p align="justify">Fax (08) 3521 0515</p>\r\n<p align="justify">Email: <a href="mailto:info@vinclub.com.vn">info@vinclub.com.vn</a></p>\r\n<p align="justify">Website: <a href="http://www.vincomcenter.com/">www.vincomcenter.com</a></p>'),
(3, 'vi-VN', '', '', '', ''),
(4, 'en-US', 'Press Information Soviet Union veteran delegation revisiting Vietnam', 'http://www.prohouse.vn/upload/slide/slider2.jpg', 'A Soviet delegation of 35 veterans of Russian Federation, Belarus and Ukraine – who devoted to the American War in Vietnam are revisiting the country from April 24 to May 03, 2010.', '<p align="justify">This program is organized by the Vietnam Union of Friendship Organizations in cooperation with Vincom Joint Stock Company and An Vien Joint Stock Company on the occasion of 35<sup>th</sup> Anniversay the Unification Day of Vietnam and as the appreciation of the national tradition &ldquo;Drinking water, remember its spring&rdquo; and the lofty international friendship.</p>\r\n<p align="justify"><br />During their stay in Vietnam, the delegation will attend meetings, receptions and other activities Hanoi and Ho Chi Minh city to celebrate the 35th anniversary of the Liberation Day of Vietnam.<br /><br />&ldquo;One of the core values in Vincom&rsquo;s development strategy is to build the corporate culture based on the desire for pioneering and the pride on Vietnamese intelligence and spirit; as well as to show the responsibility towards the country,&rdquo; said Mr. Le Khac Hiep, Chairman of the Board of Management of Vincom Joint Stock Company.</p>\r\n<p align="justify"><br />Therefore, over the last years, Vincom has started an initiative on sponsoring of quite a few of socio-political programs as a way of paying homage to the country. Especially, the Company has the special affection for the former Soviet Union countries because these are the countries where a lot of managers and staff of the Company studied and grew up.</p>\r\n<p align="justify"><br />The Company has engaged in the organization and funding of many activities that tighten the mutal friendship, such as the program &ldquo;Comrade Gather&rdquo;, &ldquo;Soviet teachers and Vietnamese students&rdquo; and the program &ldquo;Revisiting Vietnam&rdquo; this time has the same objectives.</p>\r\n<p align="justify"><br />With such an initiative of organizing and fully funding the program &ldquo;Revisiting Vietnam&rdquo;, the Company wished to express the gratitude of the two companies in particular and Vietnamese people in general to former Soviet friends, especially for those who were willing to face danger and sacrificed their youth to contribute to the glorious victory of American War for the lofty international spirit.</p>\r\n<p align="justify"><br />In the American War, many Soviet experts went to Vietnam and made great support to Vietnam. It&rsquo;s 30 years since the Warbut the image of Vietnam has been embedded into their mind.</p>'),
(4, 'vi-VN', '', '', '', ''),
(5, 'en-US', 'Dr. Philippe Jacob - Head of Orthopaedic Surgery of Creil Center ', 'http://www.prohouse.vn/upload/slide/slider1.jpg', 'Dr. Philippe Jacob - Head of Orthopaedic Surgery of Creil Center Hospital - France to visit and work at Vinmec International Hospital\r\n10/24/2012 02:57\r\nFrom 16/10/2012 Dr Philippe Jacob will start his journey at Vinmec. During his visit here Dr Jacob will act as medical consultant, supporting orthopedic doctors', ''),
(5, 'vi-VN', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE IF NOT EXISTS `slide` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `image`, `url`) VALUES
(3, 'http://prohouse.vn/upload/slide/slider2.jpg', 'http://vinhomes.vn/'),
(4, 'http://prohouse.vn/upload/slide/slider1.jpg', '');

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
