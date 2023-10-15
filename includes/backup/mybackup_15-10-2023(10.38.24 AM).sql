-- Simple Backup SQL Dump
-- Version 1.0
-- https://www.github.com/coderatio/simple-backup/
--
-- Host: localhost:3306
-- Generation Time: Oct 15, 2023 at 10:24 AM
-- MYSQL Server Version: 10.4.27-MariaDB
-- PHP Version: 8.2.0
-- Developer: Josiah O. Yahaya
-- Copyright: Coderatio

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00"

--
-- Database: `quiz_system`
-- Total Tables: 10
--

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `menus`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menus` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` tinyint(3) unsigned NOT NULL DEFAULT 0,
  `title` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `class` varchar(255) NOT NULL DEFAULT '',
  `position` tinyint(3) unsigned NOT NULL DEFAULT 0,
  `group_id` tinyint(3) unsigned NOT NULL DEFAULT 1,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `menus` VALUES (1,0,'About Us','about-us','1',1,1,'Active'),(3,0,'Contact Us','contact-us','1',4,1,'Active'),(2,0,'Services','#','1',3,1,'Active'),(4,0,'Why','why','3',2,1,'Active'),(5,2,'Life Coaching','service/life-coaching','3',1,1,'Active'),(6,2,'Business Coaching','service/business-coaching','3',2,1,'Active'),(7,2,'Personal Development Coach','service/personal-development-coach','3',3,1,'Active');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `menus` with 7 row(s)
--

--
-- Table structure for table `menu_group`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu_group` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_group`
--

LOCK TABLES `menu_group` WRITE;
/*!40000 ALTER TABLE `menu_group` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `menu_group` VALUES (1,'Main Menu'),(2,'Quick Link');
/*!40000 ALTER TABLE `menu_group` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `menu_group` with 2 row(s)
--

--
-- Table structure for table `menu_type`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_type`
--

LOCK TABLES `menu_type` WRITE;
/*!40000 ALTER TABLE `menu_type` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `menu_type` VALUES (1,'Page','Active'),(2,'Url','Active'),(3,'External Page','Active'),(4,'Category','Active');
/*!40000 ALTER TABLE `menu_type` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `menu_type` with 4 row(s)
--

--
-- Table structure for table `module`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `module` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `small_text` varchar(500) NOT NULL,
  `image` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `module`
--

LOCK TABLES `module` WRITE;
/*!40000 ALTER TABLE `module` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `module` VALUES (1,'Home content','Home content','','','','<div class=\"col-md-12\">\r\n<div class=\"wrap-iconbox\">\r\n<div class=\"iconbox style2 text-left\">\r\n<div class=\"box-header\">\r\n<div class=\"box-icon\"><i class=\"icon_globe\"></i></div>\r\n</div>\r\n\r\n<div class=\"box-content\">\r\n<div class=\"box-title\">Coaching Online</div>\r\n\r\n<p>Personalized guidance from expert coaches, empowering you to thrive in life, business, and relationships, all from the comfort of your home.</p>\r\n</div>\r\n\r\n<div class=\"readmore\"><button class=\"flat-button bg-gray box-shaw-hover\">Learn More</button></div>\r\n</div>\r\n\r\n<div class=\"iconbox style2\">\r\n<div class=\"box-header\">\r\n<div class=\"box-icon\"><i class=\"icon_calendar\"></i></div>\r\n</div>\r\n\r\n<div class=\"box-content\">\r\n<div class=\"box-title\">Book an Appointment</div>\r\n\r\n<p>Secure your spot for a one-on-one coaching session. Take a step toward personal growth and schedule your appointment now.</p>\r\n</div>\r\n\r\n<div class=\"readmore\"><button class=\"flat-button bg-gray box-shaw-hover\">Learn More</button></div>\r\n</div>\r\n\r\n<div class=\"iconbox style2 text-right\">\r\n<div class=\"box-header\">\r\n<div class=\"box-icon\"><i class=\"icon_wallet\"></i></div>\r\n</div>\r\n\r\n<div class=\"box-content\">\r\n<div class=\"box-title\">Book a Free Session</div>\r\n\r\n<p>Experience the transformative power of coaching with a complimentary session. Reserve your free slot today and begin your journey to a better you.</p>\r\n</div>\r\n\r\n<div class=\"readmore\"><button class=\"flat-button bg-gray box-shaw-hover\">Learn More</button></div>\r\n</div>\r\n</div>\r\n</div>\r\n',0,NULL,'2023-10-13 09:28:16'),(2,'Address','Address','','08 W 36th St, New York, NY 10001','','',0,'2023-09-14 08:01:00','2023-09-14 08:01:00'),(3,'Phone','Phone','','+234 802 210 3100','','',0,'2023-09-14 08:01:11','2023-09-14 08:01:11'),(4,'Email','Email','','info@beinfinite.club','','',0,'2023-09-14 08:01:22','2023-10-14 10:21:22'),(5,'About ','Hi, I’m Rakshita Kapoor','about-us','Owner/Founder, Be Infinite Club','3_8389445.jpg','<p>Hello, I&#39;m Rakshita Kapoor, your dedicated coach at Be.Infinite.club. With a heart full of compassion and a mind brimming with wisdom, I am here to guide you on your transformative journey towards a happier, more confident, and fulfilling life.</p>\r\n',0,'2023-09-14 08:05:19','2023-10-13 08:41:36'),(6,'Home Why','Why Coaching Works: Be Infinite Approach','',' I’m <br>Tinuola Akande.','','<div class=\"row\">\r\n<div class=\"col-md-12 py-4\">\r\n<div class=\"flat-whys\"><img alt=\"image\" src=\"asstes/images/work/2.jpg\" /> <img alt=\"image\" src=\"asstes/images/work/1.jpg\" /></div>\r\n</div>\r\n\r\n<div class=\"col-md-6\">\r\n<div class=\"iconbox left\">\r\n<div class=\"box-header\">\r\n<div class=\"box-icon\"><i class=\"icon_search-2\"></i></div>\r\n</div>\r\n\r\n<div class=\"box-content\">\r\n<div class=\"box-title\"><strong>Personalization:</strong> Tailored to Your Needs</div>\r\n\r\n<p>Our coaching services are highly personalised, aligning with your specific goals and aspirations. Whether you seek guidance in personal or professional realms, our coaches craft individualised strategies to address your unique challenges.</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"divider h14\">&nbsp;</div>\r\n\r\n<div class=\"iconbox left\">\r\n<div class=\"box-header\">\r\n<div class=\"box-icon mt4\"><i class=\"icon_toolbox_alt\"></i></div>\r\n</div>\r\n\r\n<div class=\"box-content\">\r\n<div class=\"box-title\"><strong>Expert Guidance</strong>: Certified Coaches, Proven Results</div>\r\n\r\n<p>Our team comprises certified coaches with extensive experience in their respective fields. Their expertise ensures you receive guidance that leads to tangible, transformative outcomes.</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-6\">\r\n<div class=\"iconbox left\">\r\n<div class=\"box-header\">\r\n<div class=\"box-icon\"><i class=\"icon_loading\"></i></div>\r\n</div>\r\n\r\n<div class=\"box-content\">\r\n<div class=\"box-title\"><strong>Holistic Approach</strong>: Balancing Life, Career, and Relationships</div>\r\n\r\n<p>We recognize the interconnectedness of life, career, and relationships. Our holistic approach addresses all aspects of your life, fostering balance and harmony. By focusing on your overall well-being, we guide you towards sustainable success and fulfilment.</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"divider h12\">&nbsp;</div>\r\n\r\n<div class=\"iconbox left\">\r\n<div class=\"box-header\">\r\n<div class=\"box-icon\"><i class=\"icon_calendar\"></i></div>\r\n</div>\r\n\r\n<div class=\"box-content\">\r\n<div class=\"box-title\"><strong>Confidence Building:</strong> Empowering You to Thrive</div>\r\n\r\n<p>Coaching at Be Infinite Club is about building your confidence and resilience. We empower you with the skills and mindset necessary to thrive, ensuring long-term success.</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-12\">\r\n<div class=\"iconbox left\">\r\n<div class=\"box-header\">\r\n<div class=\"box-icon\"><i class=\"icon_book\"></i></div>\r\n</div>\r\n\r\n<div class=\"box-content\">\r\n<div class=\"box-title\"><strong>Ongoing Support</strong>: Your Partner in Growth</div>\r\n\r\n<p>Coaching is an ongoing partnership. At Be Infinite Club, we provide continuous support, motivation, and accountability. Whether you&#39;re facing setbacks or celebrating victories, our coaches are by your side, ensuring you stay on the path to greatness.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"row\">\r\n<div class=\"readmore my-5 text-center\"><a class=\"flat-button box-shaw text-white\" href=\"why\">Read More</a></div>\r\n</div>\r\n',0,'2023-09-14 08:17:19','2023-10-13 12:15:41'),(7,'Testimonail Background','Testimonail Background','','','','',0,'2023-09-18 06:59:45','2023-09-18 07:00:12'),(8,'Breadcrumb Background','Breadcrumb Background','','','bg1_3484986.jpg','',0,'2023-09-18 07:02:05','2023-09-25 09:13:32');
/*!40000 ALTER TABLE `module` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `module` with 8 row(s)
--

--
-- Table structure for table `page`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mid` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `text` mediumtext NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `og_title` varchar(100) NOT NULL,
  `og_locale` varchar(10) NOT NULL,
  `og_type` varchar(10) NOT NULL,
  `og_description` varchar(250) NOT NULL,
  `og_url` varchar(20) NOT NULL,
  `og_site_name` varchar(20) NOT NULL,
  `og_image` varchar(100) NOT NULL,
  `og_image_alt` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page`
--

LOCK TABLES `page` WRITE;
/*!40000 ALTER TABLE `page` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `page` VALUES (1,'1','About Us','Reputation. Respect. Result.','','<p><br />\r\nHello, I&#39;m Rakshita Kapoor, your dedicated coach at Be.Infinite.club. With a heart full of compassion and a mind brimming with wisdom, I am here to guide you on your transformative journey towards a happier, more confident, and fulfilling life.<br />\r\n<br />\r\nHaving spent years dedicated to understanding the intricacies of human emotions, relationships, and personal development, I bring a wealth of experience and expertise to the table. My coaching style is rooted in empathy, understanding, and a firm belief in the infinite potential within each of us. I am deeply committed to empowering you to overcome challenges, embrace your uniqueness, and unlock the doors to a life filled with purpose and meaning.<br />\r\n<br />\r\nIn the realm of life coaching, I excel at helping individuals navigate the complexities of their journeys. Whether you&#39;re seeking clarity in your personal relationships, striving for a career change, or simply feeling stuck in life, I am here to assist you. My approach is tailored to your specific needs, focusing on building your self-awareness, resilience, and providing you with actionable strategies to conquer obstacles.<br />\r\n<br />\r\nIn the fast-paced world of business and career, I understand the demands and pressures professionals face. As your business and career coach, I offer strategic guidance and practical solutions to help you achieve your professional goals. Whether you&#39;re an aspiring entrepreneur, a mid-career professional, or a business leader aiming for growth, I provide expert advice on goal setting, leadership development, and effective communication in the workplace.<br />\r\n<br />\r\nAdditionally, my expertise extends to personal development, confidence building, and relationship coaching. I specialize in empowering individuals to enhance their self-confidence, improve their communication skills, and nurture meaningful connections with others. Through our coaching sessions, I guide you in overcoming limiting beliefs, embracing your true potential, and leading a life that aligns with your values and passions.<br />\r\nMy coaching journey is driven by a genuine passion for helping others thrive. I believe that everyone deserves to live a life they love, and my mission is to assist you in achieving just that. With a warm heart, a listening ear, and a strategic mind, I am here to be your partner in personal transformation.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />\r\n<br />\r\nLet&#39;s embark on this transformative journey together. With me as your coach, you can expect unwavering support, practical guidance, and a compassionate approach that empowers you to embrace your infinite potential. I am here to champion your dreams, celebrate your victories, and guide you towards a future filled with confidence, purpose, and authentic connections. Together, we can make your aspirations a reality.<br />\r\n&nbsp;</p>\r\n','','','','','','','','','','');
/*!40000 ALTER TABLE `page` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `page` with 1 row(s)
--

--
-- Table structure for table `slider`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `sub_title` varchar(100) NOT NULL,
  `btn_title` varchar(50) NOT NULL,
  `link` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slider`
--

LOCK TABLES `slider` WRITE;
/*!40000 ALTER TABLE `slider` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `slider` VALUES (1,'Slider-1','Online Coaching','Get motivation. Any time. Any place. Learn what life coaching can do for you!','Discover More','#','4_318290.jpg',0),(2,'Slider-2','Online Coaching','Get motivation. Any time. Any place. Learn what life coaching can do for you!','Discover More','#','5_8149741.jpg',0);
/*!40000 ALTER TABLE `slider` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `slider` with 2 row(s)
--

--
-- Table structure for table `social`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `social` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `social`
--

LOCK TABLES `social` WRITE;
/*!40000 ALTER TABLE `social` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `social` VALUES (1,'Facebook','https://www.facebook.com/','facebook',0),(2,'Twitter','https://twitter.com/seooutofthebox','twitter',0),(3,'Google','https://google.com/','google-plus',1),(4,'Instagram','https://www.instagram.com/','instagram',0);
/*!40000 ALTER TABLE `social` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `social` with 4 row(s)
--

--
-- Table structure for table `template`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `template` (
  `id` int(11) NOT NULL,
  `site_title` varchar(50) NOT NULL,
  `sitename` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `favicon_logo` varchar(255) NOT NULL,
  `site_map` varchar(100) NOT NULL,
  `robots` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `top_bar` int(11) NOT NULL,
  `theme` int(11) NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `analytics` varchar(500) NOT NULL,
  `canonical` varchar(50) NOT NULL,
  `google_site_verification` varchar(255) NOT NULL,
  `og_title` varchar(100) NOT NULL,
  `og_locale` varchar(10) NOT NULL,
  `og_type` varchar(10) NOT NULL,
  `og_description` varchar(250) NOT NULL,
  `og_url` varchar(100) NOT NULL,
  `og_site_name` varchar(20) NOT NULL,
  `article_modified_time` varchar(25) NOT NULL,
  `og_image` varchar(100) NOT NULL,
  `og_image_alt` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `template`
--

LOCK TABLES `template` WRITE;
/*!40000 ALTER TABLE `template` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `template` VALUES (1,'Be Infinite Club','Be Infinite Club: Your Pathway to Personal Growth, Career Success, and Fulfilling Relationships! ','','','','','info@beinfinite.club',1,1,'Personalized guidance from expert coaches, empowering you to thrive in life, business, and relationships, all from the comfort of your home','Coaching Excellence, Infinite Possibilities','','','','','','website','','','','','','');
/*!40000 ALTER TABLE `template` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `template` with 1 row(s)
--

--
-- Table structure for table `testimonials`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `testimonials` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `designation` varchar(60) NOT NULL,
  `text` varchar(500) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonials`
--

LOCK TABLES `testimonials` WRITE;
/*!40000 ALTER TABLE `testimonials` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `testimonials` VALUES (1,'Ollie Schneider','Creative Director','Coaching has provided a common language that is gaining popularity in the workplace as it creates new learning and sets people up for success.','2_7876978.jpg',0,'2023-07-17 13:51:47','2023-09-25 08:57:58'),(2,'Jack Powell','CEO Deer Creative','Even though I am a seasoned business owner myself, I am sure that there’s always room for growth, inspiration, and new ideas.','1_940749.jpg',0,'2023-07-17 13:52:33','2023-09-25 08:57:35');
/*!40000 ALTER TABLE `testimonials` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `testimonials` with 2 row(s)
--

--
-- Table structure for table `users`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `spass` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `full_name` varchar(32) NOT NULL,
  `avatar` varchar(60) DEFAULT NULL,
  `userlevel` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  `lastip` varchar(100) NOT NULL,
  `status` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `users` VALUES (1,'admin','$2y$04$OiEscKm.ieKCPGs7QBprnujstnfvUrrUkrVbiTADvFtCi/6X/YzdC','','hajari@gmails.com','Hajari Patel','6_2901216.jpg','admin','2015-05-25 02:05:09','2023-10-05 00:34:26','',0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `users` with 1 row(s)
--

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on: Sun, 15 Oct 2023 10:38:24 +0530
