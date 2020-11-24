/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.5.53 : Database - mvc_demo
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `cart` */

DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
  `cart_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '购物车id',
  `course_id` int(11) unsigned NOT NULL COMMENT '课程id',
  `course_name` varchar(50) COLLATE utf8_bin NOT NULL COMMENT '课程名称',
  `course_price` decimal(7,2) NOT NULL COMMENT '课程价格',
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `cart` */

insert  into `cart`(`cart_id`,`course_id`,`course_name`,`course_price`) values (1,33,'HTML','200.00'),(2,32,'UI','344.00');

/*Table structure for table `course` */

DROP TABLE IF EXISTS `course`;

CREATE TABLE `course` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '课程id',
  `name` varchar(50) COLLATE utf8_bin NOT NULL COMMENT '名称',
  `price` decimal(7,2) unsigned NOT NULL COMMENT '价格',
  `type` varchar(15) COLLATE utf8_bin NOT NULL COMMENT '所属方向',
  `content` varchar(120) COLLATE utf8_bin NOT NULL COMMENT '简介',
  `level` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '级别',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `course` */

insert  into `course`(`id`,`name`,`price`,`type`,`content`,`level`) values (1,'Python','200.00','Python','Python简介','初级'),(2,'Python','200.00','Python','Python简介','初级'),(3,'Python','200.00','Python','Python简介','初级'),(4,'Python','200.00','Python','Python简介','初级'),(5,'Python','200.00','Python','Python简介','初级'),(6,'Python','200.00','Python','Python简介','初级'),(7,'Python','200.00','Python','Python简介','初级'),(8,'Python','200.00','Python','Python简介','初级'),(9,'Python','200.00','Python','Python简介','初级'),(10,'Python','200.00','Python','Python简介','初级'),(11,'Python','200.00','Python','Python简介','初级'),(12,'Python','200.00','Python','Python简介','初级'),(14,'Python','200.00','Python','Python简介','初级'),(15,'Python','200.00','Python','Python简介','初级'),(16,'Python','200.00','Python','Python简介','初级'),(17,'Python','200.00','Python','Python简介','初级'),(18,'Python','200.00','Python','Python简介','初级'),(20,'Python','200.00','Python','Python简介','初级'),(21,'Python','200.00','Python','Python简介','初级'),(22,'Python','200.00','Python','Python简介','初级'),(23,'Python','200.00','Python','Python简介','初级'),(24,'html','100.00','Html/css','html 简介','初级'),(25,'HTML','100.00','Php','HTML简介','初级'),(26,'css','240.00','Html/css','css 简介','初级'),(27,'ajax','100.00','Php','ajax 课程','中级'),(28,'ajax 2','100.00','Php','ajax 课程','初级'),(29,'Java','300.00','Java','Java 简介','中级'),(30,'Android','300.00','Android','Android 简介','中级'),(31,'iOS','200.00','Ios','iOS 简介','中级'),(32,'UI','344.00','Php','UI 简介','初级'),(33,'HTML','200.00','Html/css','HTML 简介','中级');

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `order_id` int(9) unsigned NOT NULL AUTO_INCREMENT COMMENT '订单id',
  `course_id` varchar(50) COLLATE utf8_bin NOT NULL COMMENT '课程id',
  `total_price` decimal(7,2) unsigned NOT NULL COMMENT '总价格',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `orders` */

insert  into `orders`(`order_id`,`course_id`,`total_price`) values (1,'123','400.00'),(2,'123','400.00'),(3,'32,28,29,','744.00'),(4,'32,28,29,','744.00'),(5,'32,28,29,','744.00'),(6,'32,28,29,','744.00'),(7,'32,28,29,','744.00'),(8,'25,26,27,','440.00'),(9,'25,30,','800.00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
