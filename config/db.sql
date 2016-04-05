-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 06, 2016 at 12:40 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `created`, `modified`, `status`, `pos`) VALUES
(8, 1459050241, 1459087317, 0, 0),
(9, 1459086573, 1459087333, 0, 0);

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
(8, 'en-US', 'Vinhomes Central Park'),
(8, 'vi-VN', 'Vinhomes Central Park'),
(9, 'en-US', 'Vinhomes Golden River'),
(9, 'vi-VN', 'Vinhomes Golden River');

-- --------------------------------------------------------

--
-- Table structure for table `category_images`
--

CREATE TABLE IF NOT EXISTS `category_images` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `category_images`
--

INSERT INTO `category_images` (`id`, `category_id`, `image`) VALUES
(5, 8, 'http://www.prohouse.vn/upload/slide/H8.jpg'),
(7, 9, 'http://prohouse.vn/upload/Project/a.jpg'),
(8, 10, 'http://www.prohouse.vn/upload/2.PEARLPLAZA.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category_info`
--

CREATE TABLE IF NOT EXISTS `category_info` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `category_info`
--

INSERT INTO `category_info` (`id`, `category_id`) VALUES
(19, 8),
(20, 8),
(21, 8),
(22, 8),
(23, 8),
(24, 8),
(25, 9);

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
(19, 'en-US', 'OVERVIEW', '<p><strong>VINHOMES CENTRAL PARK &ndash; the MOST MODERN &amp; CLASSY TOWNSHIP in vietnam</strong></p>\r\n<p>With a total area of 43.9 hectares located on a prime stretch of Saigon&rsquo;s riverfront spanning more than 1km, <strong>Vinhomes Central Park</strong> promises to bring to its residents the ideal living environment, a 5-star modern lifestyle. Vinhomes Central Park is a best place for living, the most modern and comfortable life.</p>\r\n<p><img src="/upload/Project/hinh2.jpg" alt="" width="1000" height="557" /></p>\r\n<p>&nbsp;</p>\r\n<p><strong>VINHOMES CENTRAL PARK OVERVIEW</strong></p>\r\n<p><strong><em>Invested by Tan Lien Phat Construction and Investment Corporation &ndash; A Member of VINGROUP</em></strong></p>\r\n<p><strong><em>Total area : 43.9 ha</em></strong><strong><br /> <em>Total investment: 30,000 billion VND</em></strong></p>\r\n<p><strong><em>Construction density: 16%</em></strong><strong><br /> <em>Expected completion: 2018</em></strong></p>\r\n<p><strong><em>Riverside central park: 13.8ha</em></strong></p>\r\n<p><strong><em>The Marina, Vinmec International Hospital &amp; Vinschool</em></strong></p>\r\n<p>&nbsp;</p>\r\n<p><img src="/upload/Project/hinh1.jpg" alt="" width="750" height="400" /></p>\r\n<p>&nbsp;</p>\r\n<p><strong>&gt;&nbsp;VINHOMES CENTRAL PARK APARTMENTS</strong></p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;. <em>The Central (C1,2,3)<br /> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;. The Park (P1 - P7)<br /> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;. The Landmark (L1 - L6)</em></p>\r\n<p><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; . The Landmark Plus</em></p>\r\n<p><strong>&gt;&nbsp;VINHOMES CENTRAL PARK VILLAS</strong></p>\r\n<p><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; . 88 single and duplex Villas<br /> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;. Land area: 223 sqm &ndash; 275 sqm &ndash; 500 sqm &ndash; 700 sqm</em></p>\r\n<p><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; . Land price (excluding construction cost): 160mil. &ndash; 220mil. VND/sqm<br /> </em><br /> <strong>&gt; LANDMARK 81</strong><br /> <em>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Landmark 81 &ndash; The highest tower in Vietnam with 81 stories</em></p>\r\n<p><strong><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; . Ultra-luxury commercial complex<br /> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;. Service Apartments<br /> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;. Hotel</em></strong></p>\r\n<p>&nbsp;</p>'),
(19, 'vi-VN', 'TỔNG QUAN', ''),
(20, 'en-US', 'LOCATION', '<h3><strong>A PRIME LOCATION IN THE CENTRAL OF CITY</strong></h3>\r\n<p><strong>Vinhomes Central Park Project</strong> is located in Tan Cang, one of the most desirable locations in central of Ho Chi Minh City, smartly connected to the central of city via main roads, railway and waterway.&nbsp;</p>\r\n<p><strong><em>88 Vinhomes Central Park</em></strong><em> <strong>Villas</strong></em>, located amidst green trees providing clean air along the Saigon River, are smartly designed, comfort and luxury in a peaceful and private parkland.</p>\r\n<p>The <strong><em>Vinhomes Central Park Apartments</em></strong> (1-4 bedrooms, from 50m2 to 200m2) including <strong><em>Officetels, Duplexes, Penthouses and Shophouses </em></strong>are designed in a modern architectural style.</p>\r\n<p><img src="/upload/Project/hinh1.jpg" alt="" width="750" height="400" /></p>'),
(20, 'vi-VN', 'VỊ TRÍ', ''),
(21, 'en-US', 'AMENITIES', '<p><strong>OUTSTANDING CONVENIENCE</strong></p>\r\n<p>Vinhomes Central Park establishes a distinguished living standard. Residents of Vinhomes Central Park will be able to enjoy fresh air and endless greenery, all in harmony with nature.</p>\r\n<p><strong>FIVE-STAR HOME SERVICES</strong></p>\r\n<p><strong>Vinhomes Central Park</strong> provides the most comfortable living environment and world-class living standards for residents by focusing on customer care and offer the best five-star services:</p>\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Management service fees waived for 10 years</p>\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;24/7 customer service center</p>\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;24/7 security service</p>\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Home services: cleaning, laundry, gardening</p>\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Home catering service</p>\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Home repair, maintenance and technical support</p>\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Business services: photocopying, printing, travel booking, flowers, express delivery</p>\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Leasing support and management services</p>\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Each building will have its own luxury lounge for residents to receive guests and socialize</p>\r\n<p><img style="display: block; margin-left: auto; margin-right: auto;" src="/upload/Project/hinh3.jpg" alt="" width="800" height="530" /></p>\r\n<p>&nbsp;</p>\r\n<table style="width: 1090px; height: 311px;">\r\n<tbody>\r\n<tr style="height: 295px;">\r\n<td style="width: 476px; height: 295px;">\r\n<h4><strong>VINMEC HEALTHCARE, VINSCHOOL EDUCATION</strong></h4>\r\n<p>At Vinhomes Central Park, residents will not only be able to enjoy the confortable and modern living environment but also 5-star healthcare service at <strong>Vinmec International Hospital </strong>and high-quality education service at <strong>Vinschool</strong>, ensuring a sophisticated and secure lifestyle.</p>\r\n<p><strong><em>Vinmec Hospital</em></strong> has 3 basements and 7 aboveground levels, over 600 examination rooms fully equipped with modern technology, prestigious medical experts and impeccable service.</p>\r\n<p><strong><em>Vinschool</em></strong> offers outstanding kindergarten, primary and secondary education with professional teaching staffs and modern facilities will encourage the young generation living in Vinhomes Central Park to develop intellectually, physically and emotionally.</p>\r\n</td>\r\n<td style="width: 598px; height: 295px;"><img src="/upload/Project/hinh4.jpg" alt="" width="598" height="291" /></td>\r\n</tr>\r\n</tbody>\r\n</table>'),
(21, 'vi-VN', 'TIỆN NGHI', ''),
(22, 'en-US', 'INTERIOR & LAYOUT', ''),
(22, 'vi-VN', 'THIẾT KẾ ', ''),
(23, 'en-US', 'FOR SALES', '<p><strong>&gt;&nbsp;VINHOMES CENTRAL PARK APARTMENTS</strong></p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;. <em>The Central (C1,2,3)<br /> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;. The Park (P1 - P7)<br /> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;. The Landmark (L1 - L6)</em></p>\r\n<p><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; . The Landmark Plus</em></p>\r\n<p><strong>&gt;&nbsp;VINHOMES CENTRAL PARK VILLAS</strong></p>\r\n<p><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; . 88 single and duplex Villas<br /> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;. Land area: 223 sqm &ndash; 275 sqm &ndash; 500 sqm &ndash; 700 sqm</em></p>\r\n<p><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; . Land price (excluding construction cost): 160mil. &ndash; 220mil. VND/sqm<br /> </em><br /> <strong>&gt; LANDMARK 81</strong><br /> <em>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Landmark 81 &ndash; The highest tower in Vietnam with 81 stories</em></p>\r\n<p><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; . Ultra-luxury commercial complex<br /> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;. Service Apartments<br /> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;. Hotel</em></p>\r\n<p>&nbsp;</p>'),
(23, 'vi-VN', 'BÁN HÀNG', ''),
(24, 'en-US', 'LANDMARK 81', '<p><strong>VINCOM LANDMARK 81 COMMERCIAL COMPLEX</strong> - <strong>SHOPPING, DINING, ENTERTAINMENT</strong></p>\r\n<p>Apart from the world-class healthcare and education services, Vinhomes Central Park residents can also enjoy an all-in-one lifestyle at the <strong>59,000m2 Vincom Landmark 81 commercial complex</strong> that includes shopping, food courts and entertainment center (indoor skating, Vinpearl Land Games, state-of-the-art cinema, outdoor playground and many other modern entertainment facilities)</p>\r\n<p>&nbsp;</p>\r\n<p><img src="/upload/Project/hinh5.jpg" alt="" width="1000" height="622" /></p>'),
(24, 'vi-VN', 'LANDMARK 81', ''),
(25, 'en-US', 'Vinhomes Golden River', '<div class="main" style="width: 800px; margin: 0 auto;">\r\n<h3 style="text-align: center;"><strong>New Luxurious Condominium Vinhomes District 1</strong></h3>\r\n<h3 style="text-align: center;"><strong>VINHOMES GOLDEN RIVER</strong></h3>\r\n<p style="text-align: center;">&nbsp;</p>\r\n<p><strong><strong><img src="/upload/Project/g1.jpg" alt="" width="800" height="435" /></strong></strong></p>\r\n<p>&nbsp;</p>\r\n<p>Total area: 25.29 hectares</p>\r\n<p>The construction density of 18.6%</p>\r\n<p>Number of level: 1 &ndash; 60, number of basement: 1 &ndash; 4</p>\r\n<p>&ldquo;Residential Complex Premium&rdquo;: Apartment &ndash; Villa &ndash; Office</p>\r\n<p>Total building: Apartment buildings, Office &amp; Hotel buildings, 60-story building</p>\r\n<p>The Front: 3 apartment buildings</p>\r\n<p>The Luxury: 6 apartment buildings</p>\r\n<p>The Aqua: 4 apartment buildings</p>\r\n<p>The Victoria: 63 Villas 225 &ndash; 475sqm.</p>\r\n<h3 style="text-align: center;"><strong>VINHOMES GOLDEN RIVER</strong></h3>\r\n<h3 style="text-align: center;"><strong>&ldquo;DIAMOND LOCATION&rdquo;</strong></h3>\r\n<p>Vinhomes Golden River is constructed on the Ba Son Port adjacent to Saigon River, the heart of District 1 (No.2, Ton Duc Thang street, Ben Nghe ward, Dist.1, HCMC, Vietnam).</p>\r\n<p>Connect with the Ba Son Metro Station of Metro Ben Thanh &ndash; Suoi Tien.</p>\r\n<p>Focus on high-rise office buildings, luxury apartments and villas.</p>\r\n<p>Architecture of Vinhomes Golden River: Modern design, low construction density and structure lower toward the river. Every apartment has a wide vision and comfortable living space.</p>\r\n<p><img src="/upload/Project/g2.jpg" alt="" width="800" height="491" /></p>\r\n<h3 style="text-align: center;"><strong>A CITY WITHIN A CITY</strong></h3>\r\n<p>Vinhomes Golden River creates an integrity life with comprehensive infrastructure and fully facilities for residents</p>\r\n<p>Combination International School</p>\r\n<p>Shophouse, Boutique, Super Market, Restaurant</p>\r\n<p>Ba Son Historical Museum</p>\r\n<p>Parks, Gardens, Walkways&hellip;</p>\r\n<p>Sport center: Mini-golf courts, Tennis, Badminton, Basketball, Pool, Jacuzzi&hellip;</p>\r\n<p>2 minutes: International Vinmec Central Park, Commercial Center Vincom Landmark 81 and Riverside Central Park</p>\r\n<p>Marina.</p>\r\n<p>&nbsp;</p>\r\n<p><img src="/upload/Project/g3.jpg" alt="" width="800" height="495" /></p>\r\n<h3 style="text-align: center;"><strong>GREATEST MODERN</strong></h3>\r\n<p>All of the apartments are applied the most advanced technology in the world to ensure a comfortable, modern and green-space life.</p>\r\n<p>Low-E (Low-Emissivity) Glass: UVA protection, Thermal resistance, Light transmission</p>\r\n<p>Solar Energy System</p>\r\n<p>European standard Water Filters &amp; Filtration System</p>\r\n<p>Smart Home: integrate control of all of the electronic systems in your home &ndash; monitor and make adjustments from an easy-to-use interface on any mobile device</p>\r\n<p>High-end bathroom: Duravit &ndash; Germany</p>\r\n<p>High-end kitchen: Bosch &ndash; Germany</p>\r\n<p>Central Air-conditioning (Ducted Air Conditioning)</p>\r\n<p><img src="/upload/Project/g4.jpg" alt="" width="800" height="488" /></p>\r\n<h3 style="text-align: center;"><strong>SOPHISTICATED DESIGN</strong></h3>\r\n<p>Design Consultant by EDSA, Gensler (US-based),&nbsp;<strong>Vinhomes Golden River</strong>&nbsp;offers an impeccable indoor and outdoor living space according to international standards</p>\r\n<p><a href="http://en.vinhomesgoldenriverapartment.co/"><strong>Vinhomes Golden River Apartment</strong></a>s&nbsp;are luxuriously designed with high-end furniture trademark in the world such as Bosch, Hansgrohe, Duravit&hellip;</p>\r\n<p><img src="/upload/Project/g5.jpg" alt="" width="800" height="492" /></p>\r\n<h3 style="text-align: center;"><strong>VINHOMES GOLDEN RIVER</strong></h3>\r\n<h3 style="text-align: center;"><strong>LUXURY PROPERTIES &amp; HI-CLASS COMMUNITY</strong></h3>\r\n<p>The heart of District 1 HCMC Downtown, 2 sides face to Saigon River, 1 side face to Saigon Zoo and Botanical Gardens</p>\r\n<p>The most prestigious and massive complex of residential area in HCMC Downtown along with fully facilities and services.</p>\r\n<p>Unique apartments in the center District 1 HCMC own Saigon river frontage</p>\r\n<p>Developed by most renowned and prestigious real estate Developer in Vietnam</p>\r\n<p>Built and Designed by the leading contractors in Vietnam and the World</p>\r\n<p>Metro Station No.3 is located on-site of project</p>\r\n<p><img src="/upload/Project/g6.jpg" alt="" width="800" height="559" />&nbsp;</p>\r\n<h3 style="text-align: center;"><strong>DEVELOPER</strong></h3>\r\n<p><strong>Vinhomes</strong> offers luxury serviced apartments and villas developed by <strong>Vingroup</strong></p>\r\n<p><a href="http://vinhomestancang.co/"><strong>Vinhomes Central Park</strong></a>; Vinhomes Đồng Khởi;</p>\r\n<p>Vinhomes Riverside; Vinhomes Times City;</p>\r\n<p>Vinhomes Royal City; Vinhomes Liễu Giai&hellip;</p>\r\n<p><strong>Community building</strong></p>\r\n<p>Always appreciate the importance of community service, fully meet the facilities and services to proceed the idea of a model urban areas, sustainable development and reach the leading class.</p>\r\n<p><strong>Convergence of exceptional value</strong></p>\r\n<p>High-end properties; Professional services; Green &amp; clean living environment; Community building activities; Security &amp; safety; Comprehensive amenities.</p>\r\n<p>&nbsp;<img src="/upload/Project/g7.jpg" alt="" width="800" height="572" /></p>\r\n<p><img src="/upload/Project/g8.jpg" alt="" width="800" height="433" /></p>\r\n<p><img src="/upload/Project/g9.jpg" alt="" width="800" height="710" /></p>\r\n<p><strong>VINHOMES GOLDEN RIVER</strong></p>\r\n<p><em>No. 2, Ton Duc Thang Street, Ben Nghe Ward, District 1, Ho Chi Minh City, Vietnam</em></p>\r\n<p><strong>HOTLINE +84(0) 917 187 909</strong></p>\r\n<p>&nbsp;</p>\r\n</div>'),
(25, 'vi-VN', 'Vinhomes Golden River', '');

-- --------------------------------------------------------

--
-- Table structure for table `legal`
--

CREATE TABLE IF NOT EXISTS `legal` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` int(10) unsigned NOT NULL,
  `modified` int(10) unsigned NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `legal_detail`
--

CREATE TABLE IF NOT EXISTS `legal_detail` (
  `legal_id` int(10) unsigned NOT NULL,
  `lang` varchar(10) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `content` text,
  PRIMARY KEY (`legal_id`,`lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `created`, `name`, `phone`, `email`, `address`, `message`) VALUES
(3, 1459079787, 'Phạm Thanh Hải', '0969474475', 'info@grapic.co', 'TPHCM', 'call me'),
(4, 1459087655, 'ANH TUAN', '0969474475', 'prohousevietnam@gmail.com', 'TPHCM', 'TEST');

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
(1, 1459832175);

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
(1, 'en-US', 'About', '0', '"Lorem ipsum dolor sit amet, rebum molestie referrentur at pro, vix ne habeo latine urbanitas, cum errem nobis eloquentiam ut. Modus adversarium ad usu, pri ei prima falli quaeque. Choro constituam signiferumque pri in, his erant graecis interesset ut."', '<p><strong>ProHouse, founded in 2015, aims to help people''s aspirations to have their own home and support business growth.<span class="text_exposed_show"><br /><br />Not&nbsp;only a trusted Real Estate Broker but also Financial Advisor for both Vietnamese and Foreigner living in Ho Chi Minh City, Vietnam.</span></strong></p>\r\n<p style="text-align: justify;"><span class="text_exposed_show">Residential &amp; Commercial Real Estate for lease and for sale in HCMC - HOTLINE: +84(0)917-187-909<br />- Apartment, Officetel, Villas<br />- Shophouse, Penthouse<br />- Office</span></p>\r\n<p style="text-align: justify;"><img src="/upload/Project/hinh2.jpg" alt="" width="1489" height="829" /></p>'),
(1, 'vi-VN', 'Giới thiệu', '0', '', '<p><strong>ProHouse, founded in 2015, aims to help people''s aspirations to have their own home and support business growth.<span class="text_exposed_show"><br /><br />Not&nbsp;only a trusted Real Estate Broker but also Financial Advisor for both Vietnamese and Foreigner living in Ho Chi Minh City, Vietnam.</span></strong></p>\r\n<p style="text-align: justify;"><span class="text_exposed_show">Residential &amp; Commercial Real Estate for lease and for sale in HCMC - HOTLINE: +84(0)917-187-909<br />- Apartment, Officetel, Villas<br />- Shophouse, Penthouse<br />- Office</span></p>\r\n<p style="text-align: justify;"><img src="/upload/Project/hinh2.jpg" alt="" width="1489" height="829" /></p>');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `price`, `created`, `modified`, `status`, `for`, `type`, `location`) VALUES
(8, 8, 30000, 1459051200, 1459051200, 0, 1, 0, 136),
(9, 8, 68500000, 1459080346, 1459080346, 0, 0, 1, 137);

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
(8, 'vi-VN', '', '', '', ''),
(9, 'en-US', 'VINMEC PHU QUOC INTERNATIONAL HOSPITAL', 'http://www.prohouse.vn/upload/Project/vinhomes-central-park-overview.jpg', 'Vinmec Phu Quoc International Hospital is the first international-standard hospital in Phu Quoc (KienGiang province) that provides high quality healthcare services for locals and tourists', '<p><span style="font-size: small;">Vinmec Phu Quoc International Hospital is the first international-standard hospital in Phu Quoc (KienGiang province) that provides high quality healthcare services for locals and tourists. Being the second hospital in Vinmec''s hospital chain across the country, Vinmec Phu Quoc receives a total investment of&nbsp;1,000 billion VND, within a&nbsp;19,000&nbsp;m2 building area, consisting of&nbsp;6 floors, 150 beds, 11 functional rooms&nbsp;and&nbsp;10 specialties&nbsp;with world-class facilities and medical equipment.</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style="font-size: small;">Beside its advantages of location and readiness, Vinmec Phu Quoc International Hospital also provides customers with international-standard medical services with appropriate cost, offering a variety of service packages for locals as well as tourists. Furthermore, Vinmec Phu Quoc International Hospital together with Vinpearl Phu Quoc Resorts and other high-class hotels in the area will offer short-term insurance options for tourists to guarantee their safety during vacation on the island; this will also help improve local travel. In the first period, Vinmec Phu Quoc International Hospital expects to see 26.000 outpatients per year and treat more than 4000 inpatients per year.<br />Located in Bai Dai &ndash; one of the five most beautiful beaches in the world, close to Vinpearl Phu Quoc, Vinmec Phu Quoc International Hospital is designed and built in harmony with nature, ensuring aesthetic requirements, optimizing the use of natural light, friendly with environment, providing a relaxing space and perfect convalescence for all customers. Vinmec Phu Quoc International Hospital has been qualified by World Health Organization with design that optimizes patient&rsquo;s safety, strictly adherence to JCI standards &ndash; World&rsquo;s best assessment for health facilities.</span></p>'),
(9, 'vi-VN', '', '', '', '');

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
(1, 0, 'admin', '$2y$13$ixmyAk4SfJZss7pTJ2wfR.vNGLYOG7JevRatv9aVq5GcnDfWMBBCy', NULL, 'prohousevietnam@gmail.com', NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
