SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `sms`;
CREATE TABLE `sms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(256) CHARACTER SET latin1 NOT NULL,
  `date` int(10) unsigned NOT NULL,
  `type` int(10) unsigned NOT NULL,
  `body` text CHARACTER SET latin1 NOT NULL,
  `read` tinyint(3) unsigned NOT NULL,
  `status` tinyint(4) NOT NULL,
  `date_sent` int(11) NOT NULL,
  `readable_date` varchar(255) CHARACTER SET latin1 NOT NULL,
  `contact_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `checksum` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;