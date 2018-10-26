/*
SQLyog Professional v10.42 
MySQL - 5.5.5-10.1.26-MariaDB : Database - aauth
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `aauth_groups` */

DROP TABLE IF EXISTS `aauth_groups`;

CREATE TABLE `aauth_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `definition` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `aauth_groups` */

insert  into `aauth_groups`(`id`,`name`,`definition`) values (1,'Admin','Super Admin Group'),(2,'Public','Public Access Group'),(3,'Default','Default Access Group');

/*Table structure for table `aauth_perm_to_group` */

DROP TABLE IF EXISTS `aauth_perm_to_group`;

CREATE TABLE `aauth_perm_to_group` (
  `perm_id` int(11) unsigned NOT NULL,
  `group_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`perm_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `aauth_perm_to_group` */

/*Table structure for table `aauth_perm_to_user` */

DROP TABLE IF EXISTS `aauth_perm_to_user`;

CREATE TABLE `aauth_perm_to_user` (
  `perm_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`perm_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `aauth_perm_to_user` */

/*Table structure for table `aauth_perms` */

DROP TABLE IF EXISTS `aauth_perms`;

CREATE TABLE `aauth_perms` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `definition` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `aauth_perms` */

/*Table structure for table `aauth_pms` */

DROP TABLE IF EXISTS `aauth_pms`;

CREATE TABLE `aauth_pms` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) unsigned NOT NULL,
  `receiver_id` int(11) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text,
  `date` datetime DEFAULT NULL,
  `read` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `full_index` (`id`,`sender_id`,`receiver_id`,`read`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `aauth_pms` */

/*Table structure for table `aauth_system_variables` */

DROP TABLE IF EXISTS `aauth_system_variables`;

CREATE TABLE `aauth_system_variables` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(100) NOT NULL,
  `value` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `aauth_system_variables` */

/*Table structure for table `aauth_user_to_group` */

DROP TABLE IF EXISTS `aauth_user_to_group`;

CREATE TABLE `aauth_user_to_group` (
  `user_id` int(11) unsigned NOT NULL DEFAULT '0',
  `group_id` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `aauth_user_to_group` */

insert  into `aauth_user_to_group`(`user_id`,`group_id`) values (1,1),(1,3),(2,1),(3,3),(4,3),(5,3),(6,3),(7,3),(8,3),(9,3),(10,3),(11,3),(12,3);

/*Table structure for table `aauth_user_variables` */

DROP TABLE IF EXISTS `aauth_user_variables`;

CREATE TABLE `aauth_user_variables` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `key` varchar(100) NOT NULL,
  `value` text,
  PRIMARY KEY (`id`),
  KEY `user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `aauth_user_variables` */

/*Table structure for table `aauth_users` */

DROP TABLE IF EXISTS `aauth_users`;

CREATE TABLE `aauth_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `pass` varchar(64) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `banned` tinyint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `last_activity` datetime DEFAULT NULL,
  `last_login_attempt` datetime DEFAULT NULL,
  `forgot_exp` text,
  `remember_time` datetime DEFAULT NULL,
  `remember_exp` text,
  `verification_code` text,
  `ip_address` text,
  `login_attempts` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `aauth_users` */

insert  into `aauth_users`(`id`,`email`,`pass`,`name`,`banned`,`last_login`,`last_activity`,`last_login_attempt`,`forgot_exp`,`remember_time`,`remember_exp`,`verification_code`,`ip_address`,`login_attempts`) values (1,'admin@example.com','dd5073c93fb477a167fd69072e95455834acd93df8fed41a2c468c45b394bfe3','Admin',0,NULL,NULL,NULL,NULL,NULL,NULL,'4YAzDmQqk132HNhF',NULL,0),(2,'aero438@yahoo.com','f2f2117a2ab3f449169764066bdf1bbd875926752b4036f959acb0dc4f6908b3','sandi',0,'2018-09-16 02:00:28','2018-09-16 02:00:28','2018-09-16 02:00:00',NULL,'2018-08-30 00:00:00','zUFbVdX6tEHfMTNZ',NULL,'::1',NULL),(3,'sandy.saryono@gmail.com','079efb937bffdaa0600d40a18ee4f5273e9ff73dfeee27c55c7838008549d395','sandi saryono',0,'2018-08-02 11:38:59','2018-08-02 11:38:59','2018-08-02 11:00:00',NULL,NULL,NULL,NULL,'192.168.100.110',NULL),(4,'julia@yahoo.com','600462fe259ead0051a7c3e3b0248fc2f61583ff6584ac32bbd223dd09343552','julia',0,'2018-08-27 12:16:08','2018-08-27 12:16:08','2018-08-27 12:00:00',NULL,'2018-08-30 00:00:00','tbaKAgrIiqGwzdyU',NULL,'::1',NULL),(5,'doddol@yahoo.com','2b5a7142e2014cb591dda3b37af411bfa6d2ac4adc24adacd997a864ee57b6c3','dodol',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(6,'fadli@yahoo.com','3913228818759cd846b475d3106a4ecc9bf9bd91746cab4e88a8750c11d15914','fadli',0,'2018-08-08 07:39:31','2018-08-08 07:39:31','2018-08-08 07:00:00',NULL,NULL,NULL,NULL,'::1',NULL),(7,'aa@yahoo.com','47d8209036ae5fe022a0d80d958d925e01aca57801d71eaf1cd90b6386d5401e','yunita',0,'2018-08-14 06:00:46','2018-08-14 06:00:46','2018-08-14 06:00:00',NULL,NULL,NULL,NULL,'192.168.100.112',NULL),(8,'adek@yahoo.com','8e7d10c7c802e6cc70ddc57bcb1477eb8f3083b0f088f9427e4d56600b065bbe','adek',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(9,'jj@yahoo.com','f5db70e1a575c4c3aacf4fa53ad78c154e7f488e1a3de64aa0563b2b0ac1e646','jj',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(10,'hh@yahoo.com','06f3b03c31a6c3851d7b0bec7fc046134890f3892708158ccceea0a8f08fb9a4','jjs',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(11,'kk@yahoo.com','bb379240c399e7ed9d46af06db1c2b6159502a3459475e5c5181dfd8976938dc','tg',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(12,'jjr4@yahoo.com','9a90741a24c29a3511cad6568e6a7d1fa2ea09b8c86a50d09d1fef74f4bf840f','fga',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0);

/*Table structure for table `barang` */

DROP TABLE IF EXISTS `barang`;

CREATE TABLE `barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kdbrg` varchar(12) DEFAULT NULL,
  `namabarang` varchar(50) DEFAULT '-',
  `idgrup` char(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `barang` */

/*Table structure for table `grupbarang` */

DROP TABLE IF EXISTS `grupbarang`;

CREATE TABLE `grupbarang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` char(2) DEFAULT '-',
  `gbarang` varchar(20) DEFAULT '-',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `grupbarang` */

insert  into `grupbarang`(`id`,`kode`,`gbarang`) values (1,'01','Minuman'),(2,'02','Makanan');

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` char(2) DEFAULT NULL,
  `kategori` varchar(30) DEFAULT '-',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kategori` */

/*Table structure for table `persons` */

DROP TABLE IF EXISTS `persons`;

CREATE TABLE `persons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) DEFAULT '-',
  `lastname` varchar(30) DEFAULT '-',
  `gender` varchar(20) DEFAULT '-',
  `address` varchar(30) DEFAULT '-',
  `dob` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `persons` */

insert  into `persons`(`id`,`firstname`,`lastname`,`gender`,`address`,`dob`) values (22,'sandi','saryono','female','Banda Aceh','2018-08-01'),(23,'Julia','Rahmawati','female','Bandung','2018-08-15'),(25,'dwa','dawd','female','dwada','2018-08-23');

/* Trigger structure for table `barang` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `trkodebarang` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `trkodebarang` BEFORE INSERT ON `barang` FOR EACH ROW BEGIN
	if new.kdbrg is null then
	   set new.kdbrg := (select concat(MID(CURDATE(),3,2) + 0,lpad(ifnull(cast(max(right(kdbrg,3)) as unsigned integer),0) + 1,4,'0'))
	   from barang where left(kdbrg,2)=MID(CURDATE(),3,2));
	end if;
    END */$$


DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
