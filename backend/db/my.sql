-- Host: 127.0.0.1
-- Generation Time: 2017-02-14 11:04:42
-- PHP Version: 5.6.30-1+deb.sury.org~xenial+1
-- Link ME:https://github.com/craftsmann
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
--
-- Database: `.yimi`
 -- 
-- --------------------------------------------------------
DROP TABLE IF EXISTS `ym_cart`;-- 
-- 表的结构`ym_cart`
-- 
CREATE TABLE `ym_cart` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `goods_id` int(10) unsigned NOT NULL,
  `num` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  `updated_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='购物车'-- 
-- 转存表中的数据`ym_cart`
 -- 
INSERT INTO `ym_cart` (`id`,`uid`,`goods_id`,`num`,`created_at`,`updated_at`) VALUES
(1,1,1,2,1486903612,1486903860);
