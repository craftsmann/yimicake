-- Host: 127.0.0.1
-- Generation Time: 2017-02-08 03:33:16
-- PHP Version: 5.6.30-1+deb.sury.org~xenial+1
-- Link ME:https://github.com/craftsmann
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
--
-- Database: `.yimi`
 -- 
-- --------------------------------------------------------
DROP TABLE IF EXISTS `ym_auth_item_child`;-- 
-- 表的结构`ym_auth_item_child`
-- 
CREATE TABLE `ym_auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `ym_auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `ym_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ym_auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `ym_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci-- 
-- 转存表中的数据`ym_auth_item_child`
 -- 
INSERT INTO `ym_auth_item_child` (`parent`,`child`) VALUES
(普通管理员,auth/assign),	
(普通管理员,auth/route),	
(普通管理员,color/index),	
(普通管理员,color/view),	
(普通管理员,config/addconf),	
(普通管理员,config/otherconf),	
(普通管理员,config/ownconf),	
(普通管理员,config/webconf),	
(普通管理员,data/backup),	
(普通管理员,data/optimize),	
(普通管理员,design/index),	
(普通管理员,design/view),	
(普通管理员,fuser/list),	
(普通管理员,goods/cate),	
(普通管理员,goods/list),	
(普通管理员,holiday/index),	
(普通管理员,holiday/view),	
(普通管理员,index/index),	
(普通管理员,material/index),	
(普通管理员,material/view),	
(普通管理员,menu/flist),	
(普通管理员,menu/list),	
(普通管理员,object/index),	
(普通管理员,object/view),	
(普通管理员,oprater/list),	
(普通管理员,single/list),	
(普通管理员,single/view),	
(普通管理员,user/list),	
(普通管理员,ware/index),	
(普通管理员,ware/view);
