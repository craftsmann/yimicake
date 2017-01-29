-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-01-29 14:25:55
-- 服务器版本： 5.7.9-log
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yimi`
--

-- --------------------------------------------------------

--
-- 表的结构 `ym_adminuser`
--

DROP TABLE IF EXISTS `ym_adminuser`;
CREATE TABLE IF NOT EXISTS `ym_adminuser` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `auth_key` char(32) NOT NULL,
  `password_hash` char(255) NOT NULL,
  `password_reset_token` char(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `sex` enum('男','女') NOT NULL DEFAULT '男',
  `login_ip` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `qq` int(11) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `times` int(11) DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '10',
  `updated_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='用户表';

--
-- 转存表中的数据 `ym_adminuser`
--

INSERT INTO `ym_adminuser` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `sex`, `login_ip`, `photo`, `qq`, `phone`, `times`, `status`, `updated_at`, `created_at`) VALUES
(1, 'wangmazi', 'YYtOQ6wLmadn2KVF5P4PP3jvAThGZRGr', '$2y$13$3HcYRfGWSfx3baHRwShzwOJjC9TujeP8IAci09YDfUWz7xTapBuh6', NULL, '1791502202@qq.com', '男', '::1', 'uploads/20170122/201701220445171474.jpg', 1516515315, 45152122, NULL, 10, 1485060319, 1480934109),
(6, 'zhangsan', 'ZiCY4EeVFGr3qSXm2oiI9GHqFCcu8Wup', '$2y$13$4uejIQKf19jaokFbEMUYkeYBDbO51UbjXVWykSYrmYnYXwRutp9ae', NULL, '15153@qq.com', '男', '::1', '', 5616516, 616516, NULL, 10, 1485061656, 1485061656);

-- --------------------------------------------------------

--
-- 表的结构 `ym_auth_assignment`
--

DROP TABLE IF EXISTS `ym_auth_assignment`;
CREATE TABLE IF NOT EXISTS `ym_auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `ym_auth_assignment`
--

INSERT INTO `ym_auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('普通管理员', '6', 1485061716);

-- --------------------------------------------------------

--
-- 表的结构 `ym_auth_item`
--

DROP TABLE IF EXISTS `ym_auth_item`;
CREATE TABLE IF NOT EXISTS `ym_auth_item` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  UNIQUE KEY `id` (`id`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `ym_auth_item`
--

INSERT INTO `ym_auth_item` (`id`, `name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
(42, 'auth/*', 2, '权限管理', NULL, 's:1:"0";', 1485054289, 1485054289),
(47, 'auth/addrole', 2, '角色添加', NULL, 's:2:"42";', 1485054427, 1485054427),
(44, 'auth/addroute', 2, '路由添加', NULL, 's:2:"42";', 1485054357, 1485054357),
(51, 'auth/assign', 2, '用户展示', NULL, 's:2:"42";', 1485054553, 1485054553),
(52, 'auth/assignrole', 2, '角色分配', NULL, 's:2:"42";', 1485054586, 1485054586),
(50, 'auth/assignroute', 2, '权限分配', NULL, 's:2:"42";', 1485054517, 1485054517),
(49, 'auth/delrole', 2, '角色删除', NULL, 's:2:"42";', 1485054480, 1485054480),
(45, 'auth/delroute', 2, '路由删除', NULL, 's:2:"42";', 1485054377, 1485054377),
(46, 'auth/role', 2, '角色管理', NULL, 's:2:"42";', 1485054402, 1485054402),
(43, 'auth/route', 2, '路由列表', NULL, 's:2:"42";', 1485054325, 1485054325),
(48, 'auth/uprole', 2, '角色修改', NULL, 's:2:"42";', 1485054452, 1485054452),
(88, 'color/create', 2, '颜色创建', NULL, 's:2:"64";', 1485059152, 1485059152),
(90, 'color/delete', 2, '颜色删除', NULL, 's:2:"64";', 1485059176, 1485059176),
(86, 'color/index', 2, '颜色列表', NULL, 's:2:"64";', 1485059127, 1485059127),
(89, 'color/update', 2, '颜色更新', NULL, 's:2:"64";', 1485059164, 1485059164),
(87, 'color/view', 2, '颜色查看', NULL, 's:2:"64";', 1485059140, 1485059140),
(35, 'config/*', 2, '配置管理', NULL, 's:1:"0";', 1485053858, 1485053858),
(38, 'config/addconf', 2, '添加配置', NULL, 's:2:"35";', 1485054096, 1485054096),
(40, 'config/otherconf', 2, '其他配置', NULL, 's:2:"35";', 1485054165, 1485054165),
(39, 'config/ownconf', 2, '自定义配置', NULL, 's:2:"35";', 1485054124, 1485054124),
(41, 'config/upwebconf', 2, '配置更新', NULL, 's:2:"35";', 1485054221, 1485054221),
(36, 'config/webconf', 2, '站点配置', NULL, 's:2:"35";', 1485053942, 1485053942),
(29, 'data/*', 2, '数据库管理', NULL, 's:1:"0";', 1485053577, 1485053577),
(30, 'data/backup', 2, '数据库列表', NULL, 's:2:"29";', 1485053622, 1485053622),
(32, 'data/backupall', 2, '备份整表', NULL, 's:2:"29";', 1485053711, 1485053711),
(31, 'data/backupone', 2, '备份单表', NULL, 's:2:"29";', 1485053661, 1485053661),
(33, 'data/optimize', 2, '优化单表', NULL, 's:2:"29";', 1485053742, 1485053742),
(34, 'data/optimizeall', 2, '优化整表', NULL, 's:2:"29";', 1485053781, 1485053781),
(83, 'design/create', 2, '模型创建', NULL, 's:2:"64";', 1485059071, 1485059071),
(85, 'design/delete', 2, '模型删除', NULL, 's:2:"64";', 1485059096, 1485059096),
(81, 'design/index', 2, '模型列表', NULL, 's:2:"64";', 1485059020, 1485059020),
(84, 'design/update', 2, '模型更新', NULL, 's:2:"64";', 1485059083, 1485059083),
(82, 'design/view', 2, '模型查看', NULL, 's:2:"64";', 1485059037, 1485059037),
(23, 'fuser/*', 2, '用户管理', NULL, 's:1:"0";', 1485053426, 1485053426),
(25, 'fuser/add', 2, '用户添加', NULL, 's:2:"23";', 1485053469, 1485053469),
(26, 'fuser/del', 2, '用户单个删除', NULL, 's:2:"23";', 1485053491, 1485053491),
(27, 'fuser/delall', 2, '管理员部分删除', NULL, 's:2:"23";', 1485053517, 1485053517),
(24, 'fuser/list', 2, '用户列表', NULL, 's:2:"23";', 1485053446, 1485053446),
(28, 'fuser/update', 2, '用户更新', NULL, 's:2:"23";', 1485053536, 1485053536),
(53, 'goods/*', 2, '商品管理', NULL, 's:1:"0";', 1485054650, 1485054650),
(56, 'goods/add', 2, '商品添加', NULL, 's:2:"53";', 1485054709, 1485054709),
(61, 'goods/addcate', 2, '分类添加', NULL, 's:2:"53";', 1485054836, 1485054836),
(60, 'goods/cate', 2, '商品分类', NULL, 's:2:"53";', 1485054815, 1485054815),
(63, 'goods/delcate', 2, '分类删除', NULL, 's:2:"53";', 1485054881, 1485054881),
(57, 'goods/delone', 2, '商品删除', NULL, 's:2:"53";', 1485054745, 1485054745),
(54, 'goods/list', 2, '商品列表', NULL, 's:2:"53";', 1485054668, 1485054668),
(58, 'goods/update', 2, '商品修改', NULL, 's:2:"53";', 1485054774, 1485054774),
(62, 'goods/updatecate', 2, '分类更新', NULL, 's:2:"53";', 1485054862, 1485054862),
(59, 'goods/upshow', 2, '商品上下架', NULL, 's:2:"53";', 1485054796, 1485054796),
(55, 'goods/upview', 2, '状态修改', NULL, 's:2:"53";', 1485054692, 1485054692),
(93, 'holiday/create', 2, '节日创建', NULL, 's:2:"64";', 1485059246, 1485059246),
(95, 'holiday/delete', 2, '节日删除', NULL, 's:2:"64";', 1485059273, 1485059273),
(91, 'holiday/index', 2, '节日列表', NULL, 's:2:"64";', 1485059212, 1485059212),
(94, 'holiday/update', 2, '节日更新', NULL, 's:2:"64";', 1485059260, 1485059260),
(92, 'holiday/view', 2, '节日查看', NULL, 's:2:"64";', 1485059224, 1485059224),
(1, 'index/*', 2, '首页', NULL, 's:1:"0";', 1485052622, 1485052622),
(2, 'index/index', 2, '仪表盘', NULL, 's:1:"1";', 1485052639, 1485052639),
(73, 'material/create', 2, '材料创建', NULL, 's:2:"64";', 1485058818, 1485058818),
(75, 'material/delete', 2, '材料删除', NULL, 's:2:"64";', 1485058861, 1485058861),
(71, 'material/index', 2, '材料列表', NULL, 's:2:"64";', 1485058770, 1485058770),
(74, 'material/update', 2, '材料更新', NULL, 's:2:"64";', 1485058835, 1485058835),
(72, 'material/view', 2, '材料查看', NULL, 's:2:"64";', 1485058794, 1485058794),
(3, 'menu/*', 2, '菜单管理', NULL, 's:1:"0";', 1485052657, 1485052657),
(7, 'menu/add', 2, '后台菜单添加', NULL, 's:1:"3";', 1485052891, 1485052891),
(9, 'menu/del', 2, '后台菜单单个删除', NULL, 's:1:"3";', 1485052945, 1485052945),
(10, 'menu/delall', 2, '后台菜单部分删除', NULL, 's:1:"3";', 1485052978, 1485052978),
(12, 'menu/fadd', 2, '前台菜单添加', NULL, 's:1:"3";', 1485053027, 1485053027),
(13, 'menu/fdel', 2, '前台菜单删除', NULL, 's:1:"3";', 1485053055, 1485053055),
(11, 'menu/flist', 2, '前台菜单列表', NULL, 's:1:"3";', 1485053002, 1485053002),
(14, 'menu/fupdate', 2, '前台菜单更新', NULL, 's:1:"3";', 1485053085, 1485053085),
(4, 'menu/list', 2, '后台菜单列表', NULL, 's:1:"3";', 1485052697, 1485052697),
(8, 'menu/update', 2, '后台菜单更新', NULL, 's:1:"3";', 1485052911, 1485052911),
(6, 'menu/upview', 2, '后台菜单状态管理', NULL, 's:1:"3";', 1485052860, 1485052860),
(78, 'object/create', 2, '对象创建', NULL, 's:2:"64";', 1485058941, 1485058941),
(79, 'object/delete', 2, '对象删除', NULL, 's:2:"64";', 1485058961, 1485058961),
(76, 'object/index', 2, '对象列表', NULL, 's:2:"64";', 1485058908, 1485058908),
(80, 'object/update', 2, '对象更新', NULL, 's:2:"64";', 1485058995, 1485058995),
(77, 'object/view', 2, '对象查看', NULL, 's:2:"64";', 1485058924, 1485058924),
(96, 'oprater/*', 2, '系统管理', NULL, 's:1:"0";', 1485059333, 1485059333),
(98, 'oprater/clear', 2, '日志清除', NULL, 's:2:"96";', 1485059418, 1485059418),
(97, 'oprater/list', 2, '操作记录列表', NULL, 's:2:"96";', 1485059391, 1485059391),
(99, 'oprater/see', 2, '查看详情', NULL, 's:2:"96";', 1485059439, 1485059439),
(102, 'single/add', 2, '单页添加', NULL, 's:2:"96";', 1485059554, 1485059554),
(104, 'single/del', 2, '单页删除', NULL, 's:2:"96";', 1485059586, 1485059586),
(100, 'single/list', 2, '单页列表', NULL, 's:2:"96";', 1485059480, 1485059480),
(103, 'single/update', 2, '单页更新', NULL, 's:2:"96";', 1485059570, 1485059570),
(101, 'single/view', 2, '单页查看', NULL, 's:2:"96";', 1485059540, 1485059540),
(105, 'upload/*', 2, '上传管理', NULL, 's:1:"0";', 1485059648, 1485059648),
(107, 'upload/loadsingle', 2, '单个上传', NULL, 's:3:"105";', 1485059721, 1485059721),
(15, 'user/*', 2, '管理员管理', NULL, 's:1:"0";', 1485053134, 1485053134),
(18, 'user/add', 2, '管理员添加', NULL, 's:2:"15";', 1485053209, 1485053209),
(19, 'user/del', 2, '管理员单个删除', NULL, 's:2:"15";', 1485053236, 1485053236),
(20, 'user/delall', 2, '管理员部分删除', NULL, 's:2:"15";', 1485053258, 1485053258),
(17, 'user/list', 2, '管理员列表', NULL, 's:2:"15";', 1485053190, 1485053190),
(16, 'user/set', 2, '管理员个人中心', NULL, 's:2:"15";', 1485053170, 1485053170),
(21, 'user/update', 2, '管理员更新', NULL, 's:2:"15";', 1485053296, 1485053296),
(22, 'user/upstatus', 2, '管理员状态更新', NULL, 's:2:"15";', 1485053323, 1485053323),
(64, 'ware/*', 2, '商品配置', NULL, 's:1:"0";', 1485055006, 1485055006),
(67, 'ware/create', 2, '用途创建', NULL, 's:2:"64";', 1485055143, 1485055143),
(69, 'ware/delete', 2, '用途删除', NULL, 's:2:"64";', 1485055187, 1485055187),
(65, 'ware/index', 2, '用途列表', NULL, 's:2:"64";', 1485055102, 1485055102),
(68, 'ware/update', 2, '用途修改', NULL, 's:2:"64";', 1485055165, 1485055165),
(66, 'ware/view', 2, '用途展示', NULL, 's:2:"64";', 1485055123, 1485055123),
(70, '普通管理员', 1, '享有查看公开信息的权限', NULL, NULL, 1485055337, 1485055337);

-- --------------------------------------------------------

--
-- 表的结构 `ym_auth_item_child`
--

DROP TABLE IF EXISTS `ym_auth_item_child`;
CREATE TABLE IF NOT EXISTS `ym_auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `ym_auth_item_child`
--

INSERT INTO `ym_auth_item_child` (`parent`, `child`) VALUES
('普通管理员', 'auth/assign'),
('普通管理员', 'auth/route'),
('普通管理员', 'color/index'),
('普通管理员', 'color/view'),
('普通管理员', 'config/addconf'),
('普通管理员', 'config/otherconf'),
('普通管理员', 'config/ownconf'),
('普通管理员', 'config/webconf'),
('普通管理员', 'data/backup'),
('普通管理员', 'data/optimize'),
('普通管理员', 'design/index'),
('普通管理员', 'design/view'),
('普通管理员', 'fuser/list'),
('普通管理员', 'goods/cate'),
('普通管理员', 'goods/list'),
('普通管理员', 'holiday/index'),
('普通管理员', 'holiday/view'),
('普通管理员', 'index/index'),
('普通管理员', 'material/index'),
('普通管理员', 'material/view'),
('普通管理员', 'menu/flist'),
('普通管理员', 'menu/list'),
('普通管理员', 'object/index'),
('普通管理员', 'object/view'),
('普通管理员', 'oprater/list'),
('普通管理员', 'single/list'),
('普通管理员', 'single/view'),
('普通管理员', 'user/list'),
('普通管理员', 'ware/index'),
('普通管理员', 'ware/view');

-- --------------------------------------------------------

--
-- 表的结构 `ym_auth_rule`
--

DROP TABLE IF EXISTS `ym_auth_rule`;
CREATE TABLE IF NOT EXISTS `ym_auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `ym_cart`
--

DROP TABLE IF EXISTS `ym_cart`;
CREATE TABLE IF NOT EXISTS `ym_cart` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uid` int(10) UNSIGNED NOT NULL,
  `goods_id` int(10) UNSIGNED NOT NULL,
  `num` int(10) UNSIGNED NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  `updated_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='购物车';

-- --------------------------------------------------------

--
-- 表的结构 `ym_category`
--

DROP TABLE IF EXISTS `ym_category`;
CREATE TABLE IF NOT EXISTS `ym_category` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  `updated_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ym_category`
--

INSERT INTO `ym_category` (`id`, `pid`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 0, '蛋糕', '蛋糕顶级分类', 1484997342, 1484997342),
(2, 0, '鲜花', '鲜花顶级分类', 1484997358, 1484997358);

-- --------------------------------------------------------

--
-- 表的结构 `ym_collection`
--

DROP TABLE IF EXISTS `ym_collection`;
CREATE TABLE IF NOT EXISTS `ym_collection` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `gid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  `updated_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='收藏';

-- --------------------------------------------------------

--
-- 表的结构 `ym_color`
--

DROP TABLE IF EXISTS `ym_color`;
CREATE TABLE IF NOT EXISTS `ym_color` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cate_id` int(11) NOT NULL DEFAULT '0' COMMENT '分类id',
  `coname` varchar(255) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='商品颜色表';

--
-- 转存表中的数据 `ym_color`
--

INSERT INTO `ym_color` (`id`, `cate_id`, `coname`, `updated_at`, `created_at`) VALUES
(3, 2, '粉色', 1485188335, 1484811657),
(4, 2, '蓝色', 1485187171, 1484811668),
(9, 2, '紫色', 1485227757, 1485227757),
(10, 2, '白色', 1485227773, 1485227773),
(11, 2, '香槟色', 1485227785, 1485227785);

-- --------------------------------------------------------

--
-- 表的结构 `ym_comments`
--

DROP TABLE IF EXISTS `ym_comments`;
CREATE TABLE IF NOT EXISTS `ym_comments` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `goods_id` int(11) NOT NULL COMMENT '商品id',
  `user_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  `updated_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品评价表';

-- --------------------------------------------------------

--
-- 表的结构 `ym_conf`
--

DROP TABLE IF EXISTS `ym_conf`;
CREATE TABLE IF NOT EXISTS `ym_conf` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `type` tinyint(3) UNSIGNED NOT NULL,
  `value` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  `updated_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='配置表';

--
-- 转存表中的数据 `ym_conf`
--

INSERT INTO `ym_conf` (`id`, `name`, `type`, `value`, `description`, `created_at`, `updated_at`) VALUES
(1, 'SITE_NAME', 1, '伊米蛋糕屋', '站点名称', 1484117032, 1484117032),
(2, 'SITE_KEY_WORDS', 1, '蛋糕|鲜花|美女蛋糕|鲜花|美女蛋糕|鲜花|美女蛋糕|鲜花|美女', '关键词', 1484117032, 1484117032),
(3, 'SITE_DESCRIPTION', 1, '这是一个美丽的站点啊......', '站点描述', 1484117126, 1484117126),
(5, 'SITE_NUMBER', 1, '陕4613213256', '备案号', 1484202107, 1484202107),
(6, 'SITE_DOMINNAME', 1, 'www.yimicake.com', '站点域名', 1484206014, 1484206014),
(8, 'SITE_VARIFY', 2, '5', '验证码', 1484206391, 1484206391),
(10, 'SITE_COMMENT', 2, '1', '评论关闭', 1484206516, 1484206516),
(11, 'SITE_GOODS', 2, '11', '商品显示条数', 1484206651, 1484206651),
(12, 'SMTP_ADDRESS', 3, 'smtp.163.com', 'SMTP地址', 1484207124, 1484207124),
(13, 'SMTP_PORT', 3, '25', 'SMTP端口', 1484207168, 1484207168),
(14, 'SMTP_PASSWORD', 3, '1234565562', 'SMTP密码', 1484207222, 1484207222),
(16, 'SMTP_USERNMAE', 3, 'm13993334619@163.com', 'SMTP用户名', 1484207636, 1484207636),
(17, 'SMTP_CONNECT', 3, 'tls', 'SMTP连接类型', 1484207887, 1484207887),
(18, 'SITE_EDITOR', 2, '10', '编辑器(0:ueditor,非0:rediacter)', 1484209725, 1484209725);

-- --------------------------------------------------------

--
-- 表的结构 `ym_credit`
--

DROP TABLE IF EXISTS `ym_credit`;
CREATE TABLE IF NOT EXISTS `ym_credit` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uid` int(10) UNSIGNED NOT NULL,
  `points` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='积分表';

-- --------------------------------------------------------

--
-- 表的结构 `ym_detail`
--

DROP TABLE IF EXISTS `ym_detail`;
CREATE TABLE IF NOT EXISTS `ym_detail` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `goods_id` int(11) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='商品详情表';

--
-- 转存表中的数据 `ym_detail`
--

INSERT INTO `ym_detail` (`id`, `goods_id`, `content`) VALUES
(1, 1, '<p>[材 料]</p><p>33枝混搭玫瑰（红玫瑰+粉玫瑰+紫玫瑰）</p><p>[包 装]</p><p>高档浅色礼品纸圆形包装，搭配金色系美丽束带</p><p>[花 语]</p><p>珍惜你丝丝缕缕绽放的珍贵，用爱守护内心的永恒！</p><p>[适合场合]</p><p>恋情,生日,祝福,节日,</p>'),
(2, 2, '<p>[材 料]</p><p>19朵A级Diana粉玫瑰，高级辅助花材相思梅或栀子叶点缀。</p><p>[包 装]</p><p>粉色棉纸、雪梨纸包装，网带花结</p><p>[花 语]</p><p>那个如花般的女孩，谢谢你，让我遇见你，爱上你，陪伴你，只要和你在一起，我生命的每一天都像阳光般明媚。</p><p>[适合场合]</p><p>爱人 老师 客户 领导 长辈 朋友</p>'),
(3, 3, '<p>[材 料]</p><p>精心挑选11朵康乃馨，点缀栀子叶、满天星，美丽迷人。</p><p>[包 装]</p><p>粉色心型礼盒</p><p>[花 语]</p><p>只要心中有爱，一切都会变得温暖</p><p>[适合场合]</p><p>爱意表达 生日 祝福 道歉 探望 求婚 友情 周年纪念</p>'),
(4, 4, '<p>[材 料]</p><p>66枝昆明顶级红玫瑰，黄莺间插</p><p>[包 装]</p><p>红色卷边纸圆形艺术包装，点缀拉菲草束</p><p>[花 语]</p><p>你的不期而至是可遇不可求的简单幸福。爱情只是简单的相知相守相恋，爱情只是彼此看对了眼然后想要一直牵手走完余生。</p><p>[适合场合]</p><p>恋情,生日,节日,生子</p>'),
(5, 5, '<p>[材 料]</p><p>66枝红玫瑰，满天星围</p><p>[包 装]</p><p>红色皱纹纸圆形精美包装，同色丝带</p><p>[花 语]</p><p>虽然离你很远，虽然你听不到我的声音，但是你传给我的话，都可以让我感觉到你的存在，感觉到你对我一丝丝一点点的爱。</p><p>[适合场合]</p><p>恋情,生日,祝福,婚庆,节日,接待,</p>'),
(6, 6, '<p>[材 料]</p><p>精选33枝白玫瑰，33枝粉玫瑰，33枝香槟玫瑰组合花束</p><p>[包 装]</p><p>黄色瓦楞纸圆形包装，精美蝴蝶结束扎。</p><p>[花 语]</p><p>有了地球，月球从未走出它的轨道；有了天空，星星总在它的怀抱闪耀；有了你，我无法说出思念的美妙。用流星，来划出爱的信号。</p><p>[适合场合]</p><p>爱意表达 生日 祝福 道歉 婚礼 求婚 周年纪念</p>'),
(7, 7, '<p>[材 料]</p><p>精选99朵优质蓝玫瑰，栀子叶围边。</p><p>[包 装]</p><p>蓝色瓦楞纸圆形包装，美丽蝴蝶结束扎。</p><p>[花 语]</p><p>我爱你从见到你的上个世纪，我爱你直到我离去的那个世纪，我不会说永远，但爱你的期限总是比永远多一天！</p><p>[适合场合]</p><p>爱意表达 生日 祝福 道歉 婚礼 求婚</p>');

-- --------------------------------------------------------

--
-- 表的结构 `ym_feature`
--

DROP TABLE IF EXISTS `ym_feature`;
CREATE TABLE IF NOT EXISTS `ym_feature` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uid` int(10) UNSIGNED NOT NULL,
  `material` int(11) DEFAULT NULL,
  `obj` int(11) DEFAULT NULL,
  `model` int(11) DEFAULT NULL,
  `color` int(11) DEFAULT NULL,
  `holiday` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='特征表';

-- --------------------------------------------------------

--
-- 表的结构 `ym_goods`
--

DROP TABLE IF EXISTS `ym_goods`;
CREATE TABLE IF NOT EXISTS `ym_goods` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `cateid` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `salesnum` int(11) DEFAULT '0' COMMENT '销量',
  `shopprice` int(11) NOT NULL,
  `marketprice` int(11) NOT NULL,
  `trueprice` int(11) NOT NULL COMMENT '进价',
  `words` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL COMMENT '材料',
  `material` varchar(255) DEFAULT NULL,
  `package` varchar(255) DEFAULT NULL,
  `value` int(11) DEFAULT NULL COMMENT '用途',
  `object` int(11) DEFAULT NULL COMMENT '对象',
  `models` int(11) DEFAULT NULL,
  `color` int(11) DEFAULT NULL COMMENT '颜色',
  `holiday` int(11) DEFAULT NULL COMMENT '节日',
  `isshow` tinyint(4) NOT NULL DEFAULT '10',
  `istime` int(11) NOT NULL DEFAULT '10' COMMENT '促销',
  `isbanner` int(11) NOT NULL DEFAULT '10' COMMENT '轮播',
  `midimg` varchar(255) NOT NULL,
  `smimg1` varchar(255) DEFAULT NULL,
  `smimg2` varchar(255) DEFAULT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  `updated_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='商品表';

--
-- 转存表中的数据 `ym_goods`
--

INSERT INTO `ym_goods` (`id`, `title`, `cateid`, `num`, `salesnum`, `shopprice`, `marketprice`, `trueprice`, `words`, `detail`, `material`, `package`, `value`, `object`, `models`, `color`, `holiday`, `isshow`, `istime`, `isbanner`, `midimg`, `smimg1`, `smimg2`, `created_at`, `updated_at`) VALUES
(1, '缤纷爱恋', 2, 200, 0, 398, 400, 50, '珍惜你丝丝缕缕绽放的珍贵，用爱守护内心的永恒！', '33枝混搭玫瑰（红玫瑰+粉玫瑰+紫玫瑰）', '8', '高档浅色礼品纸圆形包装，搭配金色系美丽束带', NULL, 1, NULL, 3, 3, 10, 1, 10, 'uploads/20170124/201701240724332898.jpg', 'uploads/20170124/201701240724486348.jpg', 'uploads/20170124/201701240724486735.jpg', 1485242854, 1485242854),
(2, '幸福包围', 2, 260, 0, 346, 400, 20, '那个如花般的女孩，谢谢你，让我遇见你，爱上你，陪伴你，只要和你在一起，我生命的每一天都像阳光般明媚。', '19朵A级Diana粉玫瑰，高级辅助花材相思梅或栀子叶点缀。', '8', '粉色棉纸、雪梨纸包装，网带花结', 11, 1, NULL, 3, 8, 10, 1, 10, 'uploads/20170124/201701240730568895.jpg', 'uploads/20170124/201701240730562771.jpg', 'uploads/20170124/201701240730565164.jpg', 1485243086, 1485243086),
(3, '我心依旧', 2, 200, 0, 238, 400, 100, '只要心中有爱，一切都会变得温暖', '精心挑选11朵康乃馨，点缀栀子叶、满天星，美丽迷人。', '', '粉色心型礼盒', 11, 1, NULL, 9, 3, 10, 1, 10, 'uploads/20170124/201701240734015570.jpg', 'uploads/20170124/201701240734011824.jpg', 'uploads/20170124/201701240734134069.jpg', 1485243272, 1485243272),
(4, '盛放的爱', 2, 200, 0, 618, 650, 100, '你的不期而至是可遇不可求的简单幸福。爱情只是简单的相知相守相恋，爱情只是彼此看对了眼然后想要一直牵手走完余生。', '66枝昆明顶级红玫瑰，黄莺间插', '8', '红色卷边纸圆形艺术包装，点缀拉菲草束', 11, NULL, NULL, 3, 3, 10, 10, 1, 'uploads/20170125/201701250429161728.jpg', 'uploads/20170125/201701250429177464.jpg', 'uploads/20170125/201701250429176354.jpg', 1485318585, 1485318585),
(5, '缘定三生', 2, 200, 0, 638, 670, 300, '虽然离你很远，虽然你听不到我的声音，但是你传给我的话，都可以让我感觉到你的存在，感觉到你对我一丝丝一点点的爱', '66枝红玫瑰，满天星围', '9', '红色皱纹纸圆形精美包装，同色丝带', 11, NULL, NULL, 3, 1, 10, 10, 1, 'uploads/20170125/201701250432186338.jpg', 'uploads/20170125/201701250432189255.jpg', 'uploads/20170125/201701250432183348.jpg', 1485318755, 1485318755),
(6, '唯爱一生', 2, 200, 0, 869, 869, 200, '有了地球，月球从未走出它的轨道；有了天空，星星总在它的怀抱闪耀；有了你，我无法说出思念的美妙。用流星，来划出爱的信号。', '精选33枝白玫瑰，33枝粉玫瑰，33枝香槟玫瑰组合花束', '12', '黄色瓦楞纸圆形包装，精美蝴蝶结束扎。', NULL, 1, NULL, 3, 4, 10, 10, 1, 'uploads/20170125/201701250434568573.jpg', 'uploads/20170125/201701250434564088.jpg', 'uploads/20170125/201701250434565619.jpg', 1485318908, 1485318908),
(7, '海澜之心', 2, 200, 0, 1688, 1688, 200, '我爱你从见到你的上个世纪，我爱你直到我离去的那个世纪，我不会说永远，但爱你的期限总是比永远多一天！', '精选99朵优质蓝玫瑰，栀子叶围边。', '13', '蓝色瓦楞纸圆形包装，美丽蝴蝶结束扎。', 11, 1, NULL, 9, 3, 10, 10, 1, 'uploads/20170125/201701250437476627.jpg', 'uploads/20170125/201701250437478351.jpg', 'uploads/20170125/201701250437474535.jpg', 1485319084, 1485319084);

-- --------------------------------------------------------

--
-- 表的结构 `ym_holiday`
--

DROP TABLE IF EXISTS `ym_holiday`;
CREATE TABLE IF NOT EXISTS `ym_holiday` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cate_id` int(11) NOT NULL,
  `hname` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='商品节日表';

--
-- 转存表中的数据 `ym_holiday`
--

INSERT INTO `ym_holiday` (`id`, `cate_id`, `hname`, `created_at`, `updated_at`) VALUES
(1, 2, '圣诞节', 1484811737, 1485188226),
(2, 2, '春节', 1484811745, 1485188298),
(3, 2, '七夕节', 1484811756, 1485188375),
(4, 2, '感恩节', 1485179960, 1485188383),
(6, 2, '母亲节', 1485227555, 1485227555),
(7, 2, '教师节', 1485227580, 1485227580),
(8, 2, '双11', 1485227600, 1485227600);

-- --------------------------------------------------------

--
-- 表的结构 `ym_log`
--

DROP TABLE IF EXISTS `ym_log`;
CREATE TABLE IF NOT EXISTS `ym_log` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uid` int(10) UNSIGNED NOT NULL,
  `url` varchar(255) NOT NULL COMMENT '路由',
  `ip` varchar(255) NOT NULL,
  `tablename` varchar(255) NOT NULL COMMENT '表名',
  `methods` varchar(255) NOT NULL COMMENT '表操作',
  `oprater` varchar(255) NOT NULL,
  `description` varchar(300) NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  `updated_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=142 DEFAULT CHARSET=utf8 COMMENT='操作日志';

--
-- 转存表中的数据 `ym_log`
--

INSERT INTO `ym_log` (`id`, `uid`, `url`, `ip`, `tablename`, `methods`, `oprater`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, '/site/yimicake/backend/web/index.php?r=menu%2Fadd', '::1', 'ym_menu', 'INSERT', 'wangmazi', 'wangmazi操作表ym_menu,方法展示:INSERT,字段展示:name:,type:,order:,pid:,route:,data:,created_at:,updated_at:,id:,路由:/site/yimicake/backend/web/index.php?r=menu%2Fadd', 1485013085, 1485013085),
(2, 1, '/site/yimicake/backend/web/index.php?r=menu%2Fupdate', '::1', 'ym_menu', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_menu,方法展示:UPDATE,字段展示:pid:38,order:3,updated_at:1484981889,路由:/site/yimicake/backend/web/index.php?r=menu%2Fupdate', 1485013122, 1485013122),
(3, 1, '/site/yimicake/backend/web/index.php?r=single%2Fadd', '::1', 'ym_singlepage', 'INSERT', 'wangmazi', 'wangmazi操作表ym_singlepage,方法展示:INSERT,字段展示:name:,view:,description:,content:,created_at:,updated_at:,id:,路由:/site/yimicake/backend/web/index.php?r=single%2Fadd', 1485015831, 1485015831),
(4, 1, '/site/yimicake/backend/web/index.php?r=menu%2Fupdate', '::1', 'ym_menu', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_menu,方法展示:UPDATE,字段展示:pid:38,order:1,route:/Single/list,updated_at:1484489595,路由:/site/yimicake/backend/web/index.php?r=menu%2Fupdate', 1485016170, 1485016170),
(5, 1, '/site/yimicake/backend/web/index.php?r=single%2Fupdate&id=1', '::1', 'ym_singlepage', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_singlepage,方法展示:UPDATE,字段展示:content:<p>阿德飒飒飒飒的撒的撒</p>,updated_at:1485015831,路由:/site/yimicake/backend/web/index.php?r=single%2Fupdate&id=1', 1485017871, 1485017871),
(6, 1, '/site/yimicake/backend/web/index.php?r=single%2Fupdate&id=1', '::1', 'ym_singlepage', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_singlepage,方法展示:UPDATE,字段展示:content:<p>这位是？</p>,updated_at:1485017871,路由:/site/yimicake/backend/web/index.php?r=single%2Fupdate&id=1', 1485017883, 1485017883),
(7, 1, '/site/yimicake/backend/web/index.php?r=single%2Fupdate&id=1', '::1', 'ym_singlepage', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_singlepage,方法展示:UPDATE,字段展示:,路由:/site/yimicake/backend/web/index.php?r=single%2Fupdate&id=1', 1485017893, 1485017893),
(8, 1, '/site/yimicake/backend/web/index.php?r=goods%2Fdelone&id=1', '::1', 'ym_goods', 'DELETE', 'wangmazi', 'wangmazi操作表ym_goods,方法展示:DELETE,字段展示:,路由:/site/yimicake/backend/web/index.php?r=goods%2Fdelone&id=1', 1485017941, 1485017941),
(9, 1, '/site/yimicake/backend/web/index.php?r=goods%2Fdelone&id=1', '::1', 'ym_detail', 'DELETE', 'wangmazi', 'wangmazi操作表ym_detail,方法展示:DELETE,字段展示:,路由:/site/yimicake/backend/web/index.php?r=goods%2Fdelone&id=1', 1485017941, 1485017941),
(10, 1, '/site/yimicake/backend/web/index.php?r=single%2Fdel&id=1', '::1', 'ym_singlepage', 'DELETE', 'wangmazi', 'wangmazi操作表ym_singlepage,方法展示:DELETE,字段展示:,路由:/site/yimicake/backend/web/index.php?r=single%2Fdel&id=1', 1485018259, 1485018259),
(11, 1, '/site/yimicake/backend/web/index.php?r=comment%2Fupview&id=1&type=1', '::1', 'ym_comments', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_comments,方法展示:UPDATE,字段展示:type:1,updated_at:1485006537,路由:/site/yimicake/backend/web/index.php?r=comment%2Fupview&id=1&type=1', 1485050631, 1485050631),
(12, 1, '/site/yimicake/backend/web/index.php?r=comment%2Fupview&id=1&type=2', '::1', 'ym_comments', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_comments,方法展示:UPDATE,字段展示:type:2,updated_at:1485050631,路由:/site/yimicake/backend/web/index.php?r=comment%2Fupview&id=1&type=2', 1485050635, 1485050635),
(13, 1, '/site/yimicake/backend/web/index.php?r=comment%2Fupview&type=1&id=1', '::1', 'ym_comments', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_comments,方法展示:UPDATE,字段展示:type:1,updated_at:1485050635,路由:/site/yimicake/backend/web/index.php?r=comment%2Fupview&type=1&id=1', 1485050639, 1485050639),
(14, 1, '/site/yimicake/backend/web/index.php?r=comment%2Fupview&type=2&id=1', '::1', 'ym_comments', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_comments,方法展示:UPDATE,字段展示:type:2,updated_at:1485050639,路由:/site/yimicake/backend/web/index.php?r=comment%2Fupview&type=2&id=1', 1485050643, 1485050643),
(15, 1, '/site/yimicake/backend/web/index.php?r=user%2Fadd', '::1', 'ym_adminuser', 'INSERT', 'wangmazi', 'wangmazi操作表ym_adminuser,方法展示:INSERT,字段展示:username:,password_hash:,auth_key:,login_ip:,email:,phone:,qq:,sex:,photo:,status:,created_at:,updated_at:,id:,路由:/site/yimicake/backend/web/index.php?r=user%2Fadd', 1485060182, 1485060182),
(16, 1, '/site/yimicake/backend/web/index.php?r=user%2Fupdate', '::1', 'ym_adminuser', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_adminuser,方法展示:UPDATE,字段展示:photo:,qq:,phone:,status:10,updated_at:1480934109,路由:/site/yimicake/backend/web/index.php?r=user%2Fupdate', 1485060196, 1485060196),
(17, 1, '/site/yimicake/backend/web/index.php?r=user%2Fset', '::1', 'ym_adminuser', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_adminuser,方法展示:UPDATE,字段展示:login_ip:127.0.0.1,photo:,updated_at:1485060196,路由:/site/yimicake/backend/web/index.php?r=user%2Fset', 1485060319, 1485060319),
(18, 1, '/site/yimicake/backend/web/index.php?r=user%2Fdel&id=2', '::1', 'ym_adminuser', 'DELETE', 'wangmazi', 'wangmazi操作表ym_adminuser,方法展示:DELETE,字段展示:,路由:/site/yimicake/backend/web/index.php?r=user%2Fdel&id=2', 1485060333, 1485060333),
(19, 1, '/site/yimicake/backend/web/index.php?r=user%2Fadd', '::1', 'ym_adminuser', 'INSERT', 'wangmazi', 'wangmazi操作表ym_adminuser,方法展示:INSERT,字段展示:username:,password_hash:,auth_key:,login_ip:,email:,phone:,qq:,sex:,photo:,status:,created_at:,updated_at:,id:,路由:/site/yimicake/backend/web/index.php?r=user%2Fadd', 1485060575, 1485060575),
(20, 1, '/site/yimicake/backend/web/index.php?r=user%2Fdel&id=3', '::1', 'ym_adminuser', 'DELETE', 'wangmazi', 'wangmazi操作表ym_adminuser,方法展示:DELETE,字段展示:,路由:/site/yimicake/backend/web/index.php?r=user%2Fdel&id=3', 1485061087, 1485061087),
(21, 1, '/site/yimicake/backend/web/index.php?r=user%2Fadd', '::1', 'ym_adminuser', 'INSERT', 'wangmazi', 'wangmazi操作表ym_adminuser,方法展示:INSERT,字段展示:username:,password_hash:,auth_key:,login_ip:,email:,phone:,qq:,sex:,photo:,status:,created_at:,updated_at:,id:,路由:/site/yimicake/backend/web/index.php?r=user%2Fadd', 1485061112, 1485061112),
(22, 1, '/site/yimicake/backend/web/index.php?r=user%2Fdel&id=4', '::1', 'ym_adminuser', 'DELETE', 'wangmazi', 'wangmazi操作表ym_adminuser,方法展示:DELETE,字段展示:,路由:/site/yimicake/backend/web/index.php?r=user%2Fdel&id=4', 1485061376, 1485061376),
(23, 1, '/site/yimicake/backend/web/index.php?r=user%2Fadd', '::1', 'ym_adminuser', 'INSERT', 'wangmazi', 'wangmazi操作表ym_adminuser,方法展示:INSERT,字段展示:username:,password_hash:,auth_key:,login_ip:,email:,phone:,qq:,sex:,photo:,status:,created_at:,updated_at:,id:,路由:/site/yimicake/backend/web/index.php?r=user%2Fadd', 1485061398, 1485061398),
(24, 1, '/site/yimicake/backend/web/index.php?r=user%2Fdel&id=5', '::1', 'ym_adminuser', 'DELETE', 'wangmazi', 'wangmazi操作表ym_adminuser,方法展示:DELETE,字段展示:,路由:/site/yimicake/backend/web/index.php?r=user%2Fdel&id=5', 1485061633, 1485061633),
(25, 1, '/site/yimicake/backend/web/index.php?r=user%2Fadd', '::1', 'ym_adminuser', 'INSERT', 'wangmazi', 'wangmazi操作表ym_adminuser,方法展示:INSERT,字段展示:username:,password_hash:,auth_key:,login_ip:,email:,phone:,qq:,sex:,photo:,status:,created_at:,updated_at:,id:,路由:/site/yimicake/backend/web/index.php?r=user%2Fadd', 1485061656, 1485061656),
(26, 6, '/site/yimicake/backend/web/index.php?r=menu%2Fdel&id=1', '::1', 'ym_menu', 'DELETE', 'zhangsan', 'zhangsan操作表ym_menu,方法展示:DELETE,字段展示:,路由:/site/yimicake/backend/web/index.php?r=menu%2Fdel&id=1', 1485063732, 1485063732),
(27, 1, '/site/yimicake/backend/web/index.php?r=menu%2Fadd', '::1', 'ym_menu', 'INSERT', 'wangmazi', 'wangmazi操作表ym_menu,方法展示:INSERT,字段展示:name:,type:,order:,pid:,route:,data:,created_at:,updated_at:,id:,路由:/site/yimicake/backend/web/index.php?r=menu%2Fadd', 1485063775, 1485063775),
(28, 1, '/site/yimicake/backend/web/index.php?r=menu%2Fupdate', '::1', 'ym_menu', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_menu,方法展示:UPDATE,字段展示:pid:0,order:1,data:,updated_at:1485063774,路由:/site/yimicake/backend/web/index.php?r=menu%2Fupdate', 1485063810, 1485063810),
(29, 1, '/site/yimicake/backend/web/index.php?r=menu%2Fadd', '::1', 'ym_menu', 'INSERT', 'wangmazi', 'wangmazi操作表ym_menu,方法展示:INSERT,字段展示:name:,type:,order:,pid:,route:,data:,created_at:,updated_at:,id:,路由:/site/yimicake/backend/web/index.php?r=menu%2Fadd', 1485063839, 1485063839),
(30, 6, '/site/yimicake/backend/web/index.php?r=fuser%2Fdel&id=5', '::1', 'ym_user', 'DELETE', 'zhangsan', 'zhangsan操作表ym_user,方法展示:DELETE,字段展示:,路由:/site/yimicake/backend/web/index.php?r=fuser%2Fdel&id=5', 1485065803, 1485065803),
(31, 6, '/site/yimicake/backend/web/index.php?r=menu%2Fdel&id=62', '::1', 'ym_menu', 'DELETE', 'zhangsan', 'zhangsan操作表ym_menu,方法展示:DELETE,字段展示:,路由:/site/yimicake/backend/web/index.php?r=menu%2Fdel&id=62', 1485066413, 1485066413),
(32, 6, '/site/yimicake/backend/web/index.php?r=menu%2Fdel&id=65', '::1', 'ym_menu', 'DELETE', 'zhangsan', 'zhangsan操作表ym_menu,方法展示:DELETE,字段展示:,路由:/site/yimicake/backend/web/index.php?r=menu%2Fdel&id=65', 1485066423, 1485066423),
(33, 1, '/site/yimicake/backend/web/index.php?r=menu%2Fadd', '::1', 'ym_menu', 'INSERT', 'wangmazi', 'wangmazi操作表ym_menu,方法展示:INSERT,字段展示:name:,type:,order:,pid:,route:,data:,created_at:,updated_at:,id:,路由:/site/yimicake/backend/web/index.php?r=menu%2Fadd', 1485066676, 1485066676),
(34, 1, '/site/yimicake/backend/web/index.php?r=goods%2Fupdatecate', '::1', 'ym_category', 'INSERT', 'wangmazi', 'wangmazi操作表ym_category,方法展示:INSERT,字段展示:name:,pid:,description:,created_at:,updated_at:,id:,路由:/site/yimicake/backend/web/index.php?r=goods%2Fupdatecate', 1485066735, 1485066735),
(35, 1, '/site/yimicake/backend/web/index.php?r=goods%2Fdelcate&id=4', '::1', 'ym_category', 'DELETE', 'wangmazi', 'wangmazi操作表ym_category,方法展示:DELETE,字段展示:,路由:/site/yimicake/backend/web/index.php?r=goods%2Fdelcate&id=4', 1485066741, 1485066741),
(36, 1, '/site/yimicake/backend/web/index.php?r=goods%2Fupdatecate', '::1', 'ym_category', 'INSERT', 'wangmazi', 'wangmazi操作表ym_category,方法展示:INSERT,字段展示:name:,pid:,description:,created_at:,updated_at:,id:,路由:/site/yimicake/backend/web/index.php?r=goods%2Fupdatecate', 1485066744, 1485066744),
(37, 1, '/site/yimicake/backend/web/index.php?r=goods%2Fdelcate&id=5', '::1', 'ym_category', 'DELETE', 'wangmazi', 'wangmazi操作表ym_category,方法展示:DELETE,字段展示:,路由:/site/yimicake/backend/web/index.php?r=goods%2Fdelcate&id=5', 1485066747, 1485066747),
(38, 1, '/site/yimicake/backend/web/index.php?r=comment%2Fdel&id=1', '::1', 'ym_comments', 'DELETE', 'wangmazi', 'wangmazi操作表ym_comments,方法展示:DELETE,字段展示:,路由:/site/yimicake/backend/web/index.php?r=comment%2Fdel&id=1', 1485073304, 1485073304),
(39, 1, '/site/yimicake/backend/web/index.php?r=goods%2Fadd', '::1', 'ym_goods', 'INSERT', 'wangmazi', 'wangmazi操作表ym_goods,方法展示:INSERT,字段展示:title:,cateid:,num:,shopprice:,marketprice:,trueprice:,words:,detail:,package:,material:,value:,object:,models:,color:,holiday:,isshow:,istime:,isbanner:,midimg:,smimg1:,smimg2:,created_at:,updated_at:,id:,路由:/site/yimicake/backend/web/index.php?r=goods%2Fadd', 1485074260, 1485074260),
(40, 1, '/site/yimicake/backend/web/index.php?r=goods%2Fadd', '::1', 'ym_detail', 'INSERT', 'wangmazi', 'wangmazi操作表ym_detail,方法展示:INSERT,字段展示:goods_id:,content:,id:,路由:/site/yimicake/backend/web/index.php?r=goods%2Fadd', 1485074261, 1485074261),
(41, 1, '/site/yimicake/backend/web/index.php?r=goods%2Fupdate&id=2', '::1', 'ym_goods', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_goods,方法展示:UPDATE,字段展示:cateid:0,num:1242,shopprice:124,marketprice:124,trueprice:124,value:1,object:2,models:3,color:2,holiday:1,isshow:10,istime:1,isbanner:1,updated_at:1485074314,路由:/site/yimicake/backend/web/index.php?r=goods%2Fupdate&id=2', 1485074389, 1485074389),
(42, 1, '/site/yimicake/backend/web/index.php?r=goods%2Fupdate&id=2', '::1', 'ym_goods', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_goods,方法展示:UPDATE,字段展示:cateid:0,num:1242,shopprice:124,marketprice:124,trueprice:124,value:1,object:2,models:3,color:2,holiday:1,isshow:10,istime:1,isbanner:1,updated_at:1485074389,路由:/site/yimicake/backend/web/index.php?r=goods%2Fupdate&id=2', 1485074394, 1485074394),
(43, 1, '/site/yimicake/backend/web/index.php?r=goods%2Fupdate&id=2', '::1', 'ym_goods', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_goods,方法展示:UPDATE,字段展示:title:牧场蛋糕 奶条400g,cateid:0,num:1242,shopprice:124,marketprice:124,trueprice:124,value:1,object:2,models:3,color:2,holiday:1,isshow:10,istime:1,isbanner:1,updated_at:1485074394,路由:/site/yimicake/backend/web/index.php?r=goods%2Fupdate&id=2', 1485074418, 1485074418),
(44, 1, '/site/yimicake/backend/web/index.php?r=goods%2Fupdate&id=2', '::1', 'ym_goods', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_goods,方法展示:UPDATE,字段展示:cateid:0,num:1242,shopprice:124,marketprice:124,trueprice:124,value:1,object:2,models:3,color:2,holiday:1,isshow:10,istime:1,isbanner:1,updated_at:1485074417,路由:/site/yimicake/backend/web/index.php?r=goods%2Fupdate&id=2', 1485074429, 1485074429),
(45, 1, '/site/yimicake/backend/web/index.php?r=goods%2Fupdate&id=2', '::1', 'ym_goods', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_goods,方法展示:UPDATE,字段展示:cateid:0,num:1242,shopprice:124,marketprice:124,trueprice:124,value:1,object:2,models:3,color:2,holiday:1,isshow:10,istime:1,isbanner:1,updated_at:1485074429,路由:/site/yimicake/backend/web/index.php?r=goods%2Fupdate&id=2', 1485074465, 1485074465),
(46, 1, '/site/yimicake/backend/web/index.php?r=goods%2Fupdate&id=2', '::1', 'ym_goods', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_goods,方法展示:UPDATE,字段展示:title:牧场蛋糕,cateid:0,num:1242,shopprice:124,marketprice:124,trueprice:124,value:1,object:2,models:3,color:2,holiday:1,isshow:10,istime:1,isbanner:1,updated_at:1485074465,路由:/site/yimicake/backend/web/index.php?r=goods%2Fupdate&id=2', 1485074483, 1485074483),
(47, 1, '/site/yimicake/backend/web/index.php?r=goods%2Fupdate&id=2', '::1', 'ym_goods', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_goods,方法展示:UPDATE,字段展示:cateid:0,num:1242,shopprice:124,marketprice:124,trueprice:124,value:1,object:2,models:3,color:2,holiday:1,isshow:10,istime:1,isbanner:1,updated_at:1485074483,路由:/site/yimicake/backend/web/index.php?r=goods%2Fupdate&id=2', 1485074496, 1485074496),
(48, 1, '/site/yimicake/backend/web/index.php?r=goods%2Fupdate&id=2', '::1', 'ym_goods', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_goods,方法展示:UPDATE,字段展示:title:糖水新鲜黄桃罐头,cateid:0,num:1242,shopprice:124,marketprice:124,trueprice:124,value:1,object:2,models:3,color:2,holiday:1,isshow:10,istime:1,isbanner:1,updated_at:1485074496,路由:/site/yimicake/backend/web/index.php?r=goods%2Fupdate&id=2', 1485074503, 1485074503),
(49, 1, '/site/yimicake/backend/web/index.php?r=goods%2Fupdate&id=2', '::1', 'ym_goods', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_goods,方法展示:UPDATE,字段展示:cateid:0,num:1242,shopprice:124,marketprice:124,trueprice:124,value:1,object:2,models:3,color:2,holiday:1,isshow:10,istime:1,isbanner:1,updated_at:1485074503,路由:/site/yimicake/backend/web/index.php?r=goods%2Fupdate&id=2', 1485074509, 1485074509),
(50, 1, '/site/yimicake/backend/web/index.php?r=menu%2Fupdate', '::1', 'ym_menu', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_menu,方法展示:UPDATE,字段展示:pid:0,order:12,updated_at:1484875747,路由:/site/yimicake/backend/web/index.php?r=menu%2Fupdate', 1485152228, 1485152228),
(51, 1, '/site/yimicake/backend/web/index.php?r=menu%2Fupdate', '::1', 'ym_menu', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_menu,方法展示:UPDATE,字段展示:pid:0,order:13,updated_at:1484875763,路由:/site/yimicake/backend/web/index.php?r=menu%2Fupdate', 1485152245, 1485152245),
(52, 1, '/site/yimicake/backend/web/index.php?r=menu%2Fupdate', '::1', 'ym_menu', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_menu,方法展示:UPDATE,字段展示:pid:0,order:13,updated_at:1484981625,路由:/site/yimicake/backend/web/index.php?r=menu%2Fupdate', 1485152270, 1485152270),
(53, 1, '/site/yimicake/backend/web/index.php?r=menu%2Fupdate', '::1', 'ym_menu', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_menu,方法展示:UPDATE,字段展示:pid:0,order:4,updated_at:1484215483,路由:/site/yimicake/backend/web/index.php?r=menu%2Fupdate', 1485152288, 1485152288),
(54, 1, '/site/yimicake/backend/web/index.php?r=material%2Fdelete&id=6', '::1', 'ym_material', 'DELETE', 'wangmazi', 'wangmazi操作表ym_material,方法展示:DELETE,字段展示:,路由:/site/yimicake/backend/web/index.php?r=material%2Fdelete&id=6', 1485175470, 1485175470),
(55, 1, '/site/yimicake/backend/web/index.php?r=holiday%2Fcreate', '::1', 'ym_holiday', 'INSERT', 'wangmazi', 'wangmazi操作表ym_holiday,方法展示:INSERT,字段展示:hname:,created_at:,updated_at:,id:,路由:/site/yimicake/backend/web/index.php?r=holiday%2Fcreate', 1485179960, 1485179960),
(56, 1, '/site/yimicake/backend/web/index.php?r=holiday%2Fcreate', '::1', 'ym_holiday', 'INSERT', 'wangmazi', 'wangmazi操作表ym_holiday,方法展示:INSERT,字段展示:hname:,created_at:,updated_at:,id:,路由:/site/yimicake/backend/web/index.php?r=holiday%2Fcreate', 1485179980, 1485179980),
(57, 1, '/site/yimicake/backend/web/index.php?r=ware%2Fcreate', '::1', 'ym_value', 'INSERT', 'wangmazi', 'wangmazi操作表ym_value,方法展示:INSERT,字段展示:vname:,created_at:,updated_at:,id:,路由:/site/yimicake/backend/web/index.php?r=ware%2Fcreate', 1485184058, 1485184058),
(58, 1, '/site/yimicake/backend/web/index.php?r=ware%2Fdelete&id=9', '::1', 'ym_value', 'DELETE', 'wangmazi', 'wangmazi操作表ym_value,方法展示:DELETE,字段展示:,路由:/site/yimicake/backend/web/index.php?r=ware%2Fdelete&id=9', 1485184067, 1485184067),
(59, 1, '/site/yimicake/backend/web/index.php?r=color%2Fdelete&id=1', '::1', 'ym_color', 'DELETE', 'wangmazi', 'wangmazi操作表ym_color,方法展示:DELETE,字段展示:,路由:/site/yimicake/backend/web/index.php?r=color%2Fdelete&id=1', 1485186193, 1485186193),
(60, 1, '/site/yimicake/backend/web/index.php?r=color%2Fdelete&id=2', '::1', 'ym_color', 'DELETE', 'wangmazi', 'wangmazi操作表ym_color,方法展示:DELETE,字段展示:,路由:/site/yimicake/backend/web/index.php?r=color%2Fdelete&id=2', 1485186197, 1485186197),
(61, 1, '/site/yimicake/backend/web/index.php?r=color%2Fdelete&id=6', '::1', 'ym_color', 'DELETE', 'wangmazi', 'wangmazi操作表ym_color,方法展示:DELETE,字段展示:,路由:/site/yimicake/backend/web/index.php?r=color%2Fdelete&id=6', 1485186200, 1485186200),
(62, 1, '/site/yimicake/backend/web/index.php?r=color%2Fdelete&id=5', '::1', 'ym_color', 'DELETE', 'wangmazi', 'wangmazi操作表ym_color,方法展示:DELETE,字段展示:,路由:/site/yimicake/backend/web/index.php?r=color%2Fdelete&id=5', 1485186215, 1485186215),
(63, 1, '/site/yimicake/backend/web/index.php?r=color%2Fupdate&id=4', '::1', 'ym_color', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_color,方法展示:UPDATE,字段展示:cate_id:0,updated_at:1484811668,路由:/site/yimicake/backend/web/index.php?r=color%2Fupdate&id=4', 1485187016, 1485187016),
(64, 1, '/site/yimicake/backend/web/index.php?r=color%2Fupdate&id=3', '::1', 'ym_color', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_color,方法展示:UPDATE,字段展示:cate_id:0,updated_at:1484811657,路由:/site/yimicake/backend/web/index.php?r=color%2Fupdate&id=3', 1485187043, 1485187043),
(65, 1, '/site/yimicake/backend/web/index.php?r=color%2Fupdate&id=4', '::1', 'ym_color', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_color,方法展示:UPDATE,字段展示:cate_id:1,updated_at:1485187016,路由:/site/yimicake/backend/web/index.php?r=color%2Fupdate&id=4', 1485187171, 1485187171),
(66, 1, '/site/yimicake/backend/web/index.php?r=ware%2Fupdate&id=1', '::1', 'ym_value', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_value,方法展示:UPDATE,字段展示:cate_id:0,updated_at:1484556378,路由:/site/yimicake/backend/web/index.php?r=ware%2Fupdate&id=1', 1485187767, 1485187767),
(67, 1, '/site/yimicake/backend/web/index.php?r=ware%2Fupdate&id=2', '::1', 'ym_value', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_value,方法展示:UPDATE,字段展示:cate_id:0,updated_at:1484556387,路由:/site/yimicake/backend/web/index.php?r=ware%2Fupdate&id=2', 1485187776, 1485187776),
(68, 1, '/site/yimicake/backend/web/index.php?r=ware%2Fupdate&id=3', '::1', 'ym_value', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_value,方法展示:UPDATE,字段展示:cate_id:0,updated_at:1484556395,路由:/site/yimicake/backend/web/index.php?r=ware%2Fupdate&id=3', 1485187784, 1485187784),
(69, 1, '/site/yimicake/backend/web/index.php?r=ware%2Fupdate&id=5', '::1', 'ym_value', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_value,方法展示:UPDATE,字段展示:cate_id:0,updated_at:1484556404,路由:/site/yimicake/backend/web/index.php?r=ware%2Fupdate&id=5', 1485187790, 1485187790),
(70, 1, '/site/yimicake/backend/web/index.php?r=ware%2Fupdate&id=7', '::1', 'ym_value', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_value,方法展示:UPDATE,字段展示:cate_id:0,updated_at:1484654025,路由:/site/yimicake/backend/web/index.php?r=ware%2Fupdate&id=7', 1485187799, 1485187799),
(71, 1, '/site/yimicake/backend/web/index.php?r=ware%2Fupdate&id=8', '::1', 'ym_value', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_value,方法展示:UPDATE,字段展示:cate_id:0,updated_at:1484654033,路由:/site/yimicake/backend/web/index.php?r=ware%2Fupdate&id=8', 1485187807, 1485187807),
(72, 1, '/site/yimicake/backend/web/index.php?r=material%2Fupdate&id=1', '::1', 'ym_material', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_material,方法展示:UPDATE,字段展示:cate_id:0,updated_at:1484556417,路由:/site/yimicake/backend/web/index.php?r=material%2Fupdate&id=1', 1485188040, 1485188040),
(73, 1, '/site/yimicake/backend/web/index.php?r=material%2Fupdate&id=2', '::1', 'ym_material', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_material,方法展示:UPDATE,字段展示:cate_id:0,updated_at:1484556427,路由:/site/yimicake/backend/web/index.php?r=material%2Fupdate&id=2', 1485188047, 1485188047),
(74, 1, '/site/yimicake/backend/web/index.php?r=material%2Fupdate&id=3', '::1', 'ym_material', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_material,方法展示:UPDATE,字段展示:cate_id:0,updated_at:1484556434,路由:/site/yimicake/backend/web/index.php?r=material%2Fupdate&id=3', 1485188054, 1485188054),
(75, 1, '/site/yimicake/backend/web/index.php?r=material%2Fupdate&id=4', '::1', 'ym_material', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_material,方法展示:UPDATE,字段展示:cate_id:0,updated_at:1484556442,路由:/site/yimicake/backend/web/index.php?r=material%2Fupdate&id=4', 1485188061, 1485188061),
(76, 1, '/site/yimicake/backend/web/index.php?r=material%2Fupdate&id=5', '::1', 'ym_material', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_material,方法展示:UPDATE,字段展示:cate_id:0,updated_at:1484556449,路由:/site/yimicake/backend/web/index.php?r=material%2Fupdate&id=5', 1485188067, 1485188067),
(77, 1, '/site/yimicake/backend/web/index.php?r=object%2Fupdate&id=1', '::1', 'ym_object', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_object,方法展示:UPDATE,字段展示:cate_id:0,updated_at:1484558191,路由:/site/yimicake/backend/web/index.php?r=object%2Fupdate&id=1', 1485188178, 1485188178),
(78, 1, '/site/yimicake/backend/web/index.php?r=object%2Fupdate&id=2', '::1', 'ym_object', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_object,方法展示:UPDATE,字段展示:cate_id:0,updated_at:1484558200,路由:/site/yimicake/backend/web/index.php?r=object%2Fupdate&id=2', 1485188187, 1485188187),
(79, 1, '/site/yimicake/backend/web/index.php?r=object%2Fupdate&id=4', '::1', 'ym_object', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_object,方法展示:UPDATE,字段展示:cate_id:0,updated_at:1484558219,路由:/site/yimicake/backend/web/index.php?r=object%2Fupdate&id=4', 1485188194, 1485188194),
(80, 1, '/site/yimicake/backend/web/index.php?r=object%2Fupdate&id=3', '::1', 'ym_object', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_object,方法展示:UPDATE,字段展示:cate_id:0,updated_at:1484558208,路由:/site/yimicake/backend/web/index.php?r=object%2Fupdate&id=3', 1485188201, 1485188201),
(81, 1, '/site/yimicake/backend/web/index.php?r=object%2Fupdate&id=5', '::1', 'ym_object', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_object,方法展示:UPDATE,字段展示:cate_id:0,updated_at:1484558231,路由:/site/yimicake/backend/web/index.php?r=object%2Fupdate&id=5', 1485188208, 1485188208),
(82, 1, '/site/yimicake/backend/web/index.php?r=object%2Fupdate&id=6', '::1', 'ym_object', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_object,方法展示:UPDATE,字段展示:cate_id:0,updated_at:1484654119,路由:/site/yimicake/backend/web/index.php?r=object%2Fupdate&id=6', 1485188215, 1485188215),
(83, 1, '/site/yimicake/backend/web/index.php?r=holiday%2Fupdate&id=1', '::1', 'ym_holiday', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_holiday,方法展示:UPDATE,字段展示:cate_id:0,updated_at:1484811737,路由:/site/yimicake/backend/web/index.php?r=holiday%2Fupdate&id=1', 1485188226, 1485188226),
(84, 1, '/site/yimicake/backend/web/index.php?r=holiday%2Fupdate&id=2', '::1', 'ym_holiday', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_holiday,方法展示:UPDATE,字段展示:cate_id:0,updated_at:1484811745,路由:/site/yimicake/backend/web/index.php?r=holiday%2Fupdate&id=2', 1485188299, 1485188299),
(85, 1, '/site/yimicake/backend/web/index.php?r=color%2Fupdate&id=3', '::1', 'ym_color', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_color,方法展示:UPDATE,字段展示:cate_id:2,updated_at:1485187043,路由:/site/yimicake/backend/web/index.php?r=color%2Fupdate&id=3', 1485188335, 1485188335),
(86, 1, '/site/yimicake/backend/web/index.php?r=holiday%2Fupdate&id=3', '::1', 'ym_holiday', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_holiday,方法展示:UPDATE,字段展示:cate_id:0,updated_at:1484811756,路由:/site/yimicake/backend/web/index.php?r=holiday%2Fupdate&id=3', 1485188375, 1485188375),
(87, 1, '/site/yimicake/backend/web/index.php?r=holiday%2Fupdate&id=4', '::1', 'ym_holiday', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_holiday,方法展示:UPDATE,字段展示:cate_id:0,updated_at:1485179960,路由:/site/yimicake/backend/web/index.php?r=holiday%2Fupdate&id=4', 1485188383, 1485188383),
(88, 1, '/site/yimicake/backend/web/index.php?r=holiday%2Fupdate&id=5', '::1', 'ym_holiday', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_holiday,方法展示:UPDATE,字段展示:cate_id:0,updated_at:1485179980,路由:/site/yimicake/backend/web/index.php?r=holiday%2Fupdate&id=5', 1485188389, 1485188389),
(89, 1, '/site/yimicake/backend/web/index.php?r=design%2Fupdate&id=1', '::1', 'ym_model', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_model,方法展示:UPDATE,字段展示:cate_id:0,updated_at:1484558265,路由:/site/yimicake/backend/web/index.php?r=design%2Fupdate&id=1', 1485188441, 1485188441),
(90, 1, '/site/yimicake/backend/web/index.php?r=design%2Fupdate&id=2', '::1', 'ym_model', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_model,方法展示:UPDATE,字段展示:cate_id:0,updated_at:1484558278,路由:/site/yimicake/backend/web/index.php?r=design%2Fupdate&id=2', 1485188447, 1485188447),
(91, 1, '/site/yimicake/backend/web/index.php?r=design%2Fupdate&id=4', '::1', 'ym_model', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_model,方法展示:UPDATE,字段展示:cate_id:0,updated_at:1484558313,路由:/site/yimicake/backend/web/index.php?r=design%2Fupdate&id=4', 1485188453, 1485188453),
(92, 1, '/site/yimicake/backend/web/index.php?r=design%2Fupdate&id=3', '::1', 'ym_model', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_model,方法展示:UPDATE,字段展示:cate_id:0,updated_at:1484558297,路由:/site/yimicake/backend/web/index.php?r=design%2Fupdate&id=3', 1485188459, 1485188459),
(93, 1, '/site/yimicake/backend/web/index.php?r=design%2Fupdate&id=6', '::1', 'ym_model', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_model,方法展示:UPDATE,字段展示:cate_id:0,updated_at:1484558339,路由:/site/yimicake/backend/web/index.php?r=design%2Fupdate&id=6', 1485188466, 1485188466),
(94, 1, '/site/yimicake/backend/web/index.php?r=design%2Fupdate&id=5', '::1', 'ym_model', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_model,方法展示:UPDATE,字段展示:cate_id:0,updated_at:1484558326,路由:/site/yimicake/backend/web/index.php?r=design%2Fupdate&id=5', 1485188475, 1485188475),
(95, 1, '/site/yimicake/backend/web/index.php?r=design%2Fupdate&id=7', '::1', 'ym_model', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_model,方法展示:UPDATE,字段展示:cate_id:0,updated_at:1484558356,路由:/site/yimicake/backend/web/index.php?r=design%2Fupdate&id=7', 1485188483, 1485188483),
(96, 1, '/site/yimicake/backend/web/index.php?r=design%2Fupdate&id=8', '::1', 'ym_model', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_model,方法展示:UPDATE,字段展示:cate_id:0,updated_at:1484558364,路由:/site/yimicake/backend/web/index.php?r=design%2Fupdate&id=8', 1485188490, 1485188490),
(97, 1, '/site/yimicake/backend/web/index.php?r=material%2Fdelete&id=4', '::1', 'ym_material', 'DELETE', 'wangmazi', 'wangmazi操作表ym_material,方法展示:DELETE,字段展示:,路由:/site/yimicake/backend/web/index.php?r=material%2Fdelete&id=4', 1485188795, 1485188795),
(98, 1, '/site/yimicake/backend/web/index.php?r=material%2Fcreate', '::1', 'ym_material', 'INSERT', 'wangmazi', 'wangmazi操作表ym_material,方法展示:INSERT,字段展示:cate_id:,mname:,created_at:,updated_at:,id:,路由:/site/yimicake/backend/web/index.php?r=material%2Fcreate', 1485188807, 1485188807),
(99, 1, '/site/yimicake/backend/web/index.php?r=holiday%2Fdelete&id=5', '::1', 'ym_holiday', 'DELETE', 'wangmazi', 'wangmazi操作表ym_holiday,方法展示:DELETE,字段展示:,路由:/site/yimicake/backend/web/index.php?r=holiday%2Fdelete&id=5', 1485188974, 1485188974),
(100, 1, '/site/yimicake/backend/web/index.php?r=material%2Fcreate', '::1', 'ym_material', 'INSERT', 'wangmazi', 'wangmazi操作表ym_material,方法展示:INSERT,字段展示:cate_id:,mname:,created_at:,updated_at:,id:,路由:/site/yimicake/backend/web/index.php?r=material%2Fcreate', 1485227259, 1485227259),
(101, 1, '/site/yimicake/backend/web/index.php?r=material%2Fcreate', '::1', 'ym_material', 'INSERT', 'wangmazi', 'wangmazi操作表ym_material,方法展示:INSERT,字段展示:cate_id:,mname:,created_at:,updated_at:,id:,路由:/site/yimicake/backend/web/index.php?r=material%2Fcreate', 1485227277, 1485227277),
(102, 1, '/site/yimicake/backend/web/index.php?r=material%2Fcreate', '::1', 'ym_material', 'INSERT', 'wangmazi', 'wangmazi操作表ym_material,方法展示:INSERT,字段展示:cate_id:,mname:,created_at:,updated_at:,id:,路由:/site/yimicake/backend/web/index.php?r=material%2Fcreate', 1485227289, 1485227289),
(103, 1, '/site/yimicake/backend/web/index.php?r=material%2Fcreate', '::1', 'ym_material', 'INSERT', 'wangmazi', 'wangmazi操作表ym_material,方法展示:INSERT,字段展示:cate_id:,mname:,created_at:,updated_at:,id:,路由:/site/yimicake/backend/web/index.php?r=material%2Fcreate', 1485227320, 1485227320),
(104, 1, '/site/yimicake/backend/web/index.php?r=material%2Fcreate', '::1', 'ym_material', 'INSERT', 'wangmazi', 'wangmazi操作表ym_material,方法展示:INSERT,字段展示:cate_id:,mname:,created_at:,updated_at:,id:,路由:/site/yimicake/backend/web/index.php?r=material%2Fcreate', 1485227335, 1485227335),
(105, 1, '/site/yimicake/backend/web/index.php?r=holiday%2Fcreate', '::1', 'ym_holiday', 'INSERT', 'wangmazi', 'wangmazi操作表ym_holiday,方法展示:INSERT,字段展示:cate_id:,hname:,created_at:,updated_at:,id:,路由:/site/yimicake/backend/web/index.php?r=holiday%2Fcreate', 1485227556, 1485227556),
(106, 1, '/site/yimicake/backend/web/index.php?r=holiday%2Fcreate', '::1', 'ym_holiday', 'INSERT', 'wangmazi', 'wangmazi操作表ym_holiday,方法展示:INSERT,字段展示:cate_id:,hname:,created_at:,updated_at:,id:,路由:/site/yimicake/backend/web/index.php?r=holiday%2Fcreate', 1485227580, 1485227580),
(107, 1, '/site/yimicake/backend/web/index.php?r=holiday%2Fcreate', '::1', 'ym_holiday', 'INSERT', 'wangmazi', 'wangmazi操作表ym_holiday,方法展示:INSERT,字段展示:cate_id:,hname:,created_at:,updated_at:,id:,路由:/site/yimicake/backend/web/index.php?r=holiday%2Fcreate', 1485227600, 1485227600),
(108, 1, '/site/yimicake/backend/web/index.php?r=color%2Fcreate', '::1', 'ym_color', 'INSERT', 'wangmazi', 'wangmazi操作表ym_color,方法展示:INSERT,字段展示:coname:,cate_id:,created_at:,updated_at:,id:,路由:/site/yimicake/backend/web/index.php?r=color%2Fcreate', 1485227711, 1485227711),
(109, 1, '/site/yimicake/backend/web/index.php?r=color%2Fcreate', '::1', 'ym_color', 'INSERT', 'wangmazi', 'wangmazi操作表ym_color,方法展示:INSERT,字段展示:coname:,cate_id:,created_at:,updated_at:,id:,路由:/site/yimicake/backend/web/index.php?r=color%2Fcreate', 1485227734, 1485227734),
(110, 1, '/site/yimicake/backend/web/index.php?r=color%2Fdelete&id=8', '::1', 'ym_color', 'DELETE', 'wangmazi', 'wangmazi操作表ym_color,方法展示:DELETE,字段展示:,路由:/site/yimicake/backend/web/index.php?r=color%2Fdelete&id=8', 1485227742, 1485227742),
(111, 1, '/site/yimicake/backend/web/index.php?r=color%2Fcreate', '::1', 'ym_color', 'INSERT', 'wangmazi', 'wangmazi操作表ym_color,方法展示:INSERT,字段展示:coname:,cate_id:,created_at:,updated_at:,id:,路由:/site/yimicake/backend/web/index.php?r=color%2Fcreate', 1485227758, 1485227758),
(112, 1, '/site/yimicake/backend/web/index.php?r=color%2Fcreate', '::1', 'ym_color', 'INSERT', 'wangmazi', 'wangmazi操作表ym_color,方法展示:INSERT,字段展示:coname:,cate_id:,created_at:,updated_at:,id:,路由:/site/yimicake/backend/web/index.php?r=color%2Fcreate', 1485227773, 1485227773),
(113, 1, '/site/yimicake/backend/web/index.php?r=color%2Fdelete&id=7', '::1', 'ym_color', 'DELETE', 'wangmazi', 'wangmazi操作表ym_color,方法展示:DELETE,字段展示:,路由:/site/yimicake/backend/web/index.php?r=color%2Fdelete&id=7', 1485227777, 1485227777),
(114, 1, '/site/yimicake/backend/web/index.php?r=color%2Fcreate', '::1', 'ym_color', 'INSERT', 'wangmazi', 'wangmazi操作表ym_color,方法展示:INSERT,字段展示:coname:,cate_id:,created_at:,updated_at:,id:,路由:/site/yimicake/backend/web/index.php?r=color%2Fcreate', 1485227785, 1485227785),
(115, 1, '/site/yimicake/backend/web/index.php?r=material%2Fcreate', '::1', 'ym_material', 'INSERT', 'wangmazi', 'wangmazi操作表ym_material,方法展示:INSERT,字段展示:cate_id:,mname:,created_at:,updated_at:,id:,路由:/site/yimicake/backend/web/index.php?r=material%2Fcreate', 1485227837, 1485227837),
(116, 1, '/site/yimicake/backend/web/index.php?r=material%2Fcreate', '::1', 'ym_material', 'INSERT', 'wangmazi', 'wangmazi操作表ym_material,方法展示:INSERT,字段展示:cate_id:,mname:,created_at:,updated_at:,id:,路由:/site/yimicake/backend/web/index.php?r=material%2Fcreate', 1485227878, 1485227878),
(117, 1, '/site/yimicake/backend/web/index.php?r=material%2Fcreate', '::1', 'ym_material', 'INSERT', 'wangmazi', 'wangmazi操作表ym_material,方法展示:INSERT,字段展示:cate_id:,mname:,created_at:,updated_at:,id:,路由:/site/yimicake/backend/web/index.php?r=material%2Fcreate', 1485227916, 1485227916),
(118, 1, '/site/yimicake/backend/web/index.php?r=ware%2Fdelete&id=8', '::1', 'ym_value', 'DELETE', 'wangmazi', 'wangmazi操作表ym_value,方法展示:DELETE,字段展示:,路由:/site/yimicake/backend/web/index.php?r=ware%2Fdelete&id=8', 1485229238, 1485229238),
(119, 1, '/site/yimicake/backend/web/index.php?r=ware%2Fdelete&id=7', '::1', 'ym_value', 'DELETE', 'wangmazi', 'wangmazi操作表ym_value,方法展示:DELETE,字段展示:,路由:/site/yimicake/backend/web/index.php?r=ware%2Fdelete&id=7', 1485229240, 1485229240),
(120, 1, '/site/yimicake/backend/web/index.php?r=ware%2Fdelete&id=5', '::1', 'ym_value', 'DELETE', 'wangmazi', 'wangmazi操作表ym_value,方法展示:DELETE,字段展示:,路由:/site/yimicake/backend/web/index.php?r=ware%2Fdelete&id=5', 1485229242, 1485229242),
(121, 1, '/site/yimicake/backend/web/index.php?r=ware%2Fdelete&id=3', '::1', 'ym_value', 'DELETE', 'wangmazi', 'wangmazi操作表ym_value,方法展示:DELETE,字段展示:,路由:/site/yimicake/backend/web/index.php?r=ware%2Fdelete&id=3', 1485229246, 1485229246),
(122, 1, '/site/yimicake/backend/web/index.php?r=ware%2Fcreate', '::1', 'ym_value', 'INSERT', 'wangmazi', 'wangmazi操作表ym_value,方法展示:INSERT,字段展示:cate_id:,vname:,created_at:,updated_at:,id:,路由:/site/yimicake/backend/web/index.php?r=ware%2Fcreate', 1485229265, 1485229265),
(123, 1, '/site/yimicake/backend/web/index.php?r=ware%2Fcreate', '::1', 'ym_value', 'INSERT', 'wangmazi', 'wangmazi操作表ym_value,方法展示:INSERT,字段展示:cate_id:,vname:,created_at:,updated_at:,id:,路由:/site/yimicake/backend/web/index.php?r=ware%2Fcreate', 1485229282, 1485229282),
(124, 1, '/site/yimicake/backend/web/index.php?r=goods%2Fadd', '::1', 'ym_goods', 'INSERT', 'wangmazi', 'wangmazi操作表ym_goods,方法展示:INSERT,字段展示:title:,cateid:,num:,shopprice:,marketprice:,trueprice:,words:,detail:,package:,material:,value:,object:,models:,color:,holiday:,isshow:,istime:,isbanner:,midimg:,smimg1:,smimg2:,created_at:,updated_at:,id:,路由:/site/yimicake/backend/web/index.php?r=goods%2Fadd', 1485242855, 1485242855),
(125, 1, '/site/yimicake/backend/web/index.php?r=goods%2Fadd', '::1', 'ym_detail', 'INSERT', 'wangmazi', 'wangmazi操作表ym_detail,方法展示:INSERT,字段展示:goods_id:,content:,id:,路由:/site/yimicake/backend/web/index.php?r=goods%2Fadd', 1485242855, 1485242855),
(126, 1, '/site/yimicake/backend/web/index.php?r=goods%2Fadd', '::1', 'ym_goods', 'INSERT', 'wangmazi', 'wangmazi操作表ym_goods,方法展示:INSERT,字段展示:title:,cateid:,num:,shopprice:,marketprice:,trueprice:,words:,detail:,package:,material:,value:,object:,models:,color:,holiday:,isshow:,istime:,isbanner:,midimg:,smimg1:,smimg2:,created_at:,updated_at:,id:,路由:/site/yimicake/backend/web/index.php?r=goods%2Fadd', 1485243086, 1485243086),
(127, 1, '/site/yimicake/backend/web/index.php?r=goods%2Fadd', '::1', 'ym_detail', 'INSERT', 'wangmazi', 'wangmazi操作表ym_detail,方法展示:INSERT,字段展示:goods_id:,content:,id:,路由:/site/yimicake/backend/web/index.php?r=goods%2Fadd', 1485243086, 1485243086),
(128, 1, '/site/yimicake/backend/web/index.php?r=goods%2Fadd', '::1', 'ym_goods', 'INSERT', 'wangmazi', 'wangmazi操作表ym_goods,方法展示:INSERT,字段展示:title:,cateid:,num:,shopprice:,marketprice:,trueprice:,words:,detail:,package:,material:,value:,object:,models:,color:,holiday:,isshow:,istime:,isbanner:,midimg:,smimg1:,smimg2:,created_at:,updated_at:,id:,路由:/site/yimicake/backend/web/index.php?r=goods%2Fadd', 1485243272, 1485243272),
(129, 1, '/site/yimicake/backend/web/index.php?r=goods%2Fadd', '::1', 'ym_detail', 'INSERT', 'wangmazi', 'wangmazi操作表ym_detail,方法展示:INSERT,字段展示:goods_id:,content:,id:,路由:/site/yimicake/backend/web/index.php?r=goods%2Fadd', 1485243273, 1485243273),
(130, 1, '/site/yimicake/backend/web/index.php?r=single%2Fadd', '::1', 'ym_singlepage', 'INSERT', 'wangmazi', 'wangmazi操作表ym_singlepage,方法展示:INSERT,字段展示:name:,view:,description:,content:,created_at:,updated_at:,id:,路由:/site/yimicake/backend/web/index.php?r=single%2Fadd', 1485246483, 1485246483),
(131, 1, '/site/yimicake/backend/web/index.php?r=single%2Fupdate&id=1', '::1', 'ym_singlepage', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_singlepage,方法展示:UPDATE,字段展示:,路由:/site/yimicake/backend/web/index.php?r=single%2Fupdate&id=1', 1485246506, 1485246506),
(132, 1, '/site/yimicake/backend/web/index.php?r=single%2Fadd', '::1', 'ym_singlepage', 'INSERT', 'wangmazi', 'wangmazi操作表ym_singlepage,方法展示:INSERT,字段展示:name:,view:,description:,content:,created_at:,updated_at:,id:,路由:/site/yimicake/backend/web/index.php?r=single%2Fadd', 1485246865, 1485246865),
(133, 1, '/site/yimicake/backend/web/index.php?r=single%2Fupdate&id=2', '::1', 'ym_singlepage', 'UPDATE', 'wangmazi', 'wangmazi操作表ym_singlepage,方法展示:UPDATE,字段展示:,路由:/site/yimicake/backend/web/index.php?r=single%2Fupdate&id=2', 1485246881, 1485246881),
(134, 1, '/site/yimicake/backend/web/index.php?r=goods%2Fadd', '::1', 'ym_goods', 'INSERT', 'wangmazi', 'wangmazi操作表ym_goods,方法展示:INSERT,字段展示:title:,cateid:,num:,shopprice:,marketprice:,trueprice:,words:,detail:,package:,material:,value:,object:,models:,color:,holiday:,isshow:,istime:,isbanner:,midimg:,smimg1:,smimg2:,created_at:,updated_at:,id:,路由:/site/yimicake/backend/web/index.php?r=goods%2Fadd', 1485318585, 1485318585),
(135, 1, '/site/yimicake/backend/web/index.php?r=goods%2Fadd', '::1', 'ym_detail', 'INSERT', 'wangmazi', 'wangmazi操作表ym_detail,方法展示:INSERT,字段展示:goods_id:,content:,id:,路由:/site/yimicake/backend/web/index.php?r=goods%2Fadd', 1485318585, 1485318585),
(136, 1, '/site/yimicake/backend/web/index.php?r=goods%2Fadd', '::1', 'ym_goods', 'INSERT', 'wangmazi', 'wangmazi操作表ym_goods,方法展示:INSERT,字段展示:title:,cateid:,num:,shopprice:,marketprice:,trueprice:,words:,detail:,package:,material:,value:,object:,models:,color:,holiday:,isshow:,istime:,isbanner:,midimg:,smimg1:,smimg2:,created_at:,updated_at:,id:,路由:/site/yimicake/backend/web/index.php?r=goods%2Fadd', 1485318755, 1485318755),
(137, 1, '/site/yimicake/backend/web/index.php?r=goods%2Fadd', '::1', 'ym_detail', 'INSERT', 'wangmazi', 'wangmazi操作表ym_detail,方法展示:INSERT,字段展示:goods_id:,content:,id:,路由:/site/yimicake/backend/web/index.php?r=goods%2Fadd', 1485318755, 1485318755),
(138, 1, '/site/yimicake/backend/web/index.php?r=goods%2Fadd', '::1', 'ym_goods', 'INSERT', 'wangmazi', 'wangmazi操作表ym_goods,方法展示:INSERT,字段展示:title:,cateid:,num:,shopprice:,marketprice:,trueprice:,words:,detail:,package:,material:,value:,object:,models:,color:,holiday:,isshow:,istime:,isbanner:,midimg:,smimg1:,smimg2:,created_at:,updated_at:,id:,路由:/site/yimicake/backend/web/index.php?r=goods%2Fadd', 1485318908, 1485318908),
(139, 1, '/site/yimicake/backend/web/index.php?r=goods%2Fadd', '::1', 'ym_detail', 'INSERT', 'wangmazi', 'wangmazi操作表ym_detail,方法展示:INSERT,字段展示:goods_id:,content:,id:,路由:/site/yimicake/backend/web/index.php?r=goods%2Fadd', 1485318908, 1485318908),
(140, 1, '/site/yimicake/backend/web/index.php?r=goods%2Fadd', '::1', 'ym_goods', 'INSERT', 'wangmazi', 'wangmazi操作表ym_goods,方法展示:INSERT,字段展示:title:,cateid:,num:,shopprice:,marketprice:,trueprice:,words:,detail:,package:,material:,value:,object:,models:,color:,holiday:,isshow:,istime:,isbanner:,midimg:,smimg1:,smimg2:,created_at:,updated_at:,id:,路由:/site/yimicake/backend/web/index.php?r=goods%2Fadd', 1485319085, 1485319085),
(141, 1, '/site/yimicake/backend/web/index.php?r=goods%2Fadd', '::1', 'ym_detail', 'INSERT', 'wangmazi', 'wangmazi操作表ym_detail,方法展示:INSERT,字段展示:goods_id:,content:,id:,路由:/site/yimicake/backend/web/index.php?r=goods%2Fadd', 1485319085, 1485319085);

-- --------------------------------------------------------

--
-- 表的结构 `ym_material`
--

DROP TABLE IF EXISTS `ym_material`;
CREATE TABLE IF NOT EXISTS `ym_material` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cate_id` int(11) NOT NULL,
  `mname` varchar(255) NOT NULL COMMENT '商品材料',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='商品材料表';

--
-- 转存表中的数据 `ym_material`
--

INSERT INTO `ym_material` (`id`, `cate_id`, `mname`, `created_at`, `updated_at`) VALUES
(1, 1, '水果', 1484554839, 1485188039),
(2, 1, '鲜奶', 1484555406, 1485188047),
(3, 1, '巧克力', 1484555425, 1485188054),
(5, 1, '芝士', 1484555466, 1485188067),
(7, 1, '提拉米苏', 1485188807, 1485188807),
(8, 2, '康乃馨', 1485227259, 1485227259),
(9, 2, '郁金香', 1485227277, 1485227277),
(10, 2, '马蹄莲', 1485227289, 1485227289),
(11, 2, '满天星', 1485227319, 1485227319),
(12, 2, '勿忘我', 1485227335, 1485227335),
(13, 2, '紫罗兰', 1485227837, 1485227837),
(14, 2, '雏菊', 1485227877, 1485227877),
(15, 2, '红掌', 1485227916, 1485227916);

-- --------------------------------------------------------

--
-- 表的结构 `ym_menu`
--

DROP TABLE IF EXISTS `ym_menu`;
CREATE TABLE IF NOT EXISTS `ym_menu` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `pid` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `order` int(10) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL DEFAULT '1' COMMENT '1为后台，2为前台',
  `data` varchar(255) DEFAULT NULL,
  `visiable` int(11) NOT NULL DEFAULT '1' COMMENT '显示：1显示，2：不显示',
  `route` varchar(255) NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  `updated_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8 COMMENT='菜单表';

--
-- 转存表中的数据 `ym_menu`
--

INSERT INTO `ym_menu` (`id`, `name`, `pid`, `order`, `type`, `data`, `visiable`, `route`, `created_at`, `updated_at`) VALUES
(2, '菜单管理', 0, 2, 1, '{"icon":"fa fa-th-list"}', 1, '#', 1483762361, 1483795558),
(3, '后台菜单', 2, 1, 1, '{"icon":"fa fa-list"}', 1, '/menu/list', 1483762449, 1484489395),
(4, '仪表盘', 1, 2, 1, '{"icon":"fa fa-user"}', 1, '/index/index', 1483766659, 1483795537),
(7, '配置管理', 0, 10, 1, '{"icon":"fa fa-tags"}', 1, '#', 1483774047, 1484804486),
(13, '权限管理', 0, 11, 1, '{"icon":"fa fa-shield"}', 1, '#', 1483845520, 1484803313),
(15, '路由管理', 13, 1, 1, '{"icon":"fa fa-user"}', 1, '/auth/route', 1483854821, 1484880374),
(16, '角色管理', 13, 2, 1, '{"icon":"fa fa-user"}', 1, '/auth/role', 1483855042, 1483855042),
(17, '角色分配', 13, 3, 1, '{"icon":"fa fa-user"}', 1, '/auth/assign', 1483855125, 1483958811),
(18, '站点配置', 7, 1, 1, '{"icon":"fa fa-user"}', 1, '/config/webconf', 1484034977, 1484473931),
(19, '自定义配置', 7, 2, 1, '{"icon":"fa fa-fa"}', 1, '/config/ownconf', 1484035049, 1484473939),
(20, '其他配置', 7, 3, 1, '{"icon":"fa fa-user"}', 1, 'config/otherconf', 1484035137, 1484035137),
(21, '前台菜单', 2, 2, 1, '{"icon":"fa fa-user"}', 1, '/menu/flist', 1484208049, 1484210767),
(27, '首页', 0, 1, 2, '', 1, '/', 1484213765, 1484493270),
(29, '蛋糕', 0, 2, 2, '', 1, 'index/cate', 1484214094, 1484214094),
(30, '鲜花', 0, 3, 2, '', 1, '/index/flower', 1484215284, 1484215284),
(31, '会员管理', 0, 6, 1, '{"icon":"fa fa-user"}', 1, '#', 1484215483, 1485152288),
(32, '后台会员', 31, 1, 1, '{"icon":"fa fa-user"}', 1, '/user/list', 1484216245, 1484216245),
(33, '前台会员', 31, 2, 1, '{"icon":"fa fa-user"}', 1, '/fuser/list', 1484216279, 1484298751),
(34, '商品管理', 0, 3, 1, '{"icon":"fa fa-shopping-cart"}', 1, '#', 1484313719, 1485152228),
(35, '添加配置', 7, 4, 1, '{"icon":"fa fa-user"}', 1, '/config/addconf', 1484324279, 1484324358),
(36, '数据库管理', 0, 9, 1, '{"icon":"fa fa-tasks"}', 1, '#', 1484372468, 1484818984),
(37, '数据库备份', 36, 1, 1, '{"icon":"fa fa-user"}', 1, 'data/backup', 1484373170, 1484373170),
(38, '系统管理', 0, 14, 1, '{"icon":"fa fa-cog"}', 1, '#', 1484473525, 1484875788),
(39, '操作记录', 38, 1, 1, '{"icon":"fa fa-user"}', 1, '/oprater/list', 1484473570, 1484473570),
(40, '单页管理', 38, 1, 1, '{"icon":"fa fa-user"}', 1, 'single/list', 1484489595, 1485016170),
(41, '商品列表', 34, 1, 1, '', 1, '/goods/list', 1484543210, 1484543210),
(42, '订单管理', 34, 5, 1, '', 1, '/goods/order', 1484543251, 1484543700),
(43, '商品分类', 34, 2, 1, '', 1, '/goods/cate', 1484543551, 1484711620),
(45, '商品配置', 0, 4, 1, '{"icon":"fa fa-qrcode"}', 1, '/shop/config', 1484544000, 1485152245),
(46, '商品用途', 45, 1, 1, '', 1, '/ware/index', 1484544360, 1484550701),
(47, '商品材料', 45, 2, 1, '', 1, '/material/index', 1484544390, 1484554476),
(48, '商品对象', 45, 3, 1, '', 1, '/object/index', 1484544427, 1484556231),
(50, '商品模型', 45, 4, 1, '', 1, '/design/index', 1484544475, 1484556246),
(53, '商品节日', 45, 6, 1, '', 1, '/holiday/index', 1484544607, 1484556258),
(54, '商品颜色', 45, 5, 1, '', 1, '/color/index', 1484544643, 1484556273),
(55, '添加属性', 45, 12, 1, '', 2, '/shop/addvalue', 1484548769, 1484548769),
(56, '添加商品', 34, 2, 1, '', 1, '/goods/add', 1484657749, 1484657749),
(57, '评论管理', 0, 5, 1, '{"icon":"fa fa-comments"}', 1, '#', 1484981512, 1485152270),
(59, '评论列表', 57, 1, 1, '', 1, '/comment/list', 1484981739, 1484981739),
(61, '意见反馈', 57, 2, 1, '', 1, 'suggest/list', 1484981822, 1485007199),
(63, '添加单页', 38, 3, 1, '', 1, 'single/add', 1485013085, 1485013085),
(64, '首页', 0, 1, 1, '{"icon":"fa fa-home"}', 1, '#', 1485063774, 1485063810),
(66, '仪表盘', 64, 1, 1, '', 1, 'index/index', 1485066676, 1485066676);

-- --------------------------------------------------------

--
-- 表的结构 `ym_migration`
--

DROP TABLE IF EXISTS `ym_migration`;
CREATE TABLE IF NOT EXISTS `ym_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ym_migration`
--

INSERT INTO `ym_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1483884280),
('m140506_102106_rbac_init', 1483884284);

-- --------------------------------------------------------

--
-- 表的结构 `ym_model`
--

DROP TABLE IF EXISTS `ym_model`;
CREATE TABLE IF NOT EXISTS `ym_model` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cate_id` int(11) NOT NULL,
  `moname` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='商品模型表';

--
-- 转存表中的数据 `ym_model`
--

INSERT INTO `ym_model` (`id`, `cate_id`, `moname`, `created_at`, `updated_at`) VALUES
(1, 1, '圆形', 1484558265, 1485188441),
(2, 1, '方形', 1484558278, 1485188447),
(3, 1, '心形', 1484558297, 1485188459),
(4, 1, '欧式', 1484558313, 1485188453),
(5, 1, '卡通', 1484558326, 1485188475),
(6, 1, '星座', 1484558339, 1485188466),
(7, 1, '麻将', 1484558356, 1485188483),
(8, 1, '创意', 1484558364, 1485188490);

-- --------------------------------------------------------

--
-- 表的结构 `ym_object`
--

DROP TABLE IF EXISTS `ym_object`;
CREATE TABLE IF NOT EXISTS `ym_object` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cate_id` int(11) NOT NULL,
  `oname` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='商品对象表';

--
-- 转存表中的数据 `ym_object`
--

INSERT INTO `ym_object` (`id`, `cate_id`, `oname`, `created_at`, `updated_at`) VALUES
(1, 1, '恋人', 1484558191, 1485188178),
(2, 1, '家人', 1484558200, 1485188187),
(3, 1, '长辈', 1484558208, 1485188201),
(4, 1, '儿童', 1484558219, 1485188194),
(5, 1, '朋友', 1484558231, 1485188208),
(6, 1, '领导', 1484654119, 1485188215);

-- --------------------------------------------------------

--
-- 表的结构 `ym_online`
--

DROP TABLE IF EXISTS `ym_online`;
CREATE TABLE IF NOT EXISTS `ym_online` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uid` int(10) UNSIGNED NOT NULL,
  `time` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='在线';

-- --------------------------------------------------------

--
-- 表的结构 `ym_order`
--

DROP TABLE IF EXISTS `ym_order`;
CREATE TABLE IF NOT EXISTS `ym_order` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `orders_id` int(11) NOT NULL COMMENT '订单号',
  `sum` int(11) NOT NULL COMMENT '价格',
  `uid` int(11) NOT NULL COMMENT '用户id',
  `created_at` int(10) UNSIGNED NOT NULL COMMENT '创建时间',
  `updated_at` int(10) UNSIGNED NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='订单表';

-- --------------------------------------------------------

--
-- 表的结构 `ym_orderdetail`
--

DROP TABLE IF EXISTS `ym_orderdetail`;
CREATE TABLE IF NOT EXISTS `ym_orderdetail` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `oid` int(11) NOT NULL COMMENT '订单id',
  `num` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `gid` int(11) NOT NULL COMMENT '商品id',
  `detail` varchar(300) NOT NULL COMMENT '详情',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='订单详情';

-- --------------------------------------------------------

--
-- 表的结构 `ym_singlepage`
--

DROP TABLE IF EXISTS `ym_singlepage`;
CREATE TABLE IF NOT EXISTS `ym_singlepage` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `view` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL COMMENT '描述',
  `content` text NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  `updated_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='单页管理';

--
-- 转存表中的数据 `ym_singlepage`
--

INSERT INTO `ym_singlepage` (`id`, `name`, `view`, `description`, `content`, `created_at`, `updated_at`) VALUES
(1, '付款方式', 'payway', '描述付款的流程和操作', '<aside>我们为您提供了<span class="cr" style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; color: rgb(201, 3, 59);">网银在线支付、支付平台支付</span>（支付宝、财付通、支付扫码支付、微信扫码支付）、<span class="cr" style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; color: rgb(201, 3, 59);">银行柜台转账汇款、pos支付、现金支付</span>五种支付方式，您可以根据您的具体情况选择合适的支付方式。</aside><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 12px; vertical-align: baseline; font-family: &quot;Microsoft YaHei&quot;, Arial; white-space: normal;"><br/></p><h1 class="h1" style="margin: 10px 0px 0px; padding: 0px; border: 0px; outline: 0px; font-size: 14px; vertical-align: baseline; height: 30px; line-height: 30px; color: rgb(51, 51, 51); font-family: 微软雅黑; white-space: normal;"><span class="Left" style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; float: left; display: inline-block; height: 30px; line-height: 30px;">一、网银在线支付方式</span></h1><p class="p cb" style="margin-top: 10px; margin-bottom: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 12px; vertical-align: baseline; color: rgb(51, 51, 51); text-indent: 2em; line-height: 20px; font-family: &quot;Microsoft YaHei&quot;, Arial; white-space: normal;">您可以通过自己所持有的借记卡、信用卡申请开通网上银行，然后通过网上银行直接支付的方式将款项支付到我方网银账户，我们收到货款后会第一时间开始备货。</p><p class="p cb" style="margin-top: 10px; margin-bottom: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 12px; vertical-align: baseline; color: rgb(51, 51, 51); text-indent: 2em; line-height: 20px; font-family: &quot;Microsoft YaHei&quot;, Arial; white-space: normal;">开通网银银行列表：</p><ul class="bank_list clearfix list-paddingleft-2" style="list-style-type: none;"><li><p><img src="http://image.meilele.com/themes/paipai/images/bank_logo/gongshang.gif" alt=""/></p></li><li><p><img src="http://image.meilele.com/themes/paipai/images/bank_logo/zhaohang.gif" alt=""/></p></li><li><p><img src="http://image.meilele.com/themes/paipai/images/bank_logo/buohai.gif" alt=""/></p></li><li><p><img src="http://image.meilele.com/themes/paipai/images/bank_logo/dongya.gif" alt=""/></p></li><li><p><img src="http://image.meilele.com/themes/paipai/images/bank_logo/nongye.gif" alt=""/></p></li><li><p><img src="http://image.meilele.com/themes/paipai/images/bank_logo/jianshe.gif" alt=""/></p></li><li><p><img src="http://image.meilele.com/themes/paipai/images/bank_logo/ningbo.gif" alt=""/></p></li><li><p><img src="http://image.meilele.com/themes/paipai/images/bank_logo/zhongxin.gif" alt=""/></p></li><li><p><img src="http://image.meilele.com/themes/paipai/images/bank_logo/beijing.gif" alt=""/></p></li><li><p><img src="http://image.meilele.com/themes/paipai/images/bank_logo/jiaotong.gif" alt=""/></p></li><li><p><img src="http://image.meilele.com/themes/paipai/images/bank_logo/shenfa.gif" alt=""/></p></li><li><p><img src="http://image.meilele.com/themes/paipai/images/bank_logo/guangfa.gif" alt=""/></p></li><li><p><img src="http://image.meilele.com/themes/paipai/images/bank_logo/xingye.gif" alt=""/></p></li><li><p><img src="http://image.meilele.com/themes/paipai/images/bank_logo/nanjing.gif" alt=""/></p></li><li><p><img src="http://image.meilele.com/themes/paipai/images/bank_logo/shanghaibank.gif" alt=""/></p></li><li><p><img src="http://image.meilele.com/themes/paipai/images/bank_logo/shangpufa.gif" alt=""/></p></li><li><p><img src="http://image.meilele.com/themes/paipai/images/bank_logo/minsheng.gif" alt=""/></p></li><li><p><img src="http://image.meilele.com/themes/paipai/images/bank_logo/guangda.gif" alt=""/></p></li><li><p><img src="http://image.meilele.com/themes/paipai/images/bank_logo/youzheng.gif" alt=""/></p></li><li><p><img src="http://image.meilele.com/themes/paipai/images/bank_logo/nongcunshangye.gif" alt=""/></p></li><li><p><img src="http://image.meilele.com/themes/paipai/images/bank_logo/zhongguo.gif" alt=""/></p></li><li><p><img src="http://image.meilele.com/themes/paipai/images/bank_logo/pingan.gif" alt=""/></p></li><li><p><img src="http://image.meilele.com/themes/paipai/images/bank_logo/zheshang.gif" alt=""/></p></li></ul><h4 class="h4 cg" style="margin: 30px 0px 0px; padding: 0px; border: 0px; outline: 0px; font-size: 12px; vertical-align: baseline; color: rgb(153, 153, 153); font-family: &quot;Microsoft YaHei&quot;, Arial; white-space: normal;">温馨提示</h4><p class="p cg" style="margin-top: 10px; margin-bottom: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 12px; vertical-align: baseline; color: rgb(153, 153, 153); text-indent: 2em; line-height: 20px; font-family: &quot;Microsoft YaHei&quot;, Arial; white-space: normal;">1、我们目前采用的网银付款方式为即时到账，即顾客自愿通过其网银账户即时向对方帐户支付的一种方式，付款成功后，所支付的款项将立刻进入我们的账户。</p><p class="p cg bb pb" style="margin-top: 10px; margin-bottom: 0px; padding: 0px 0px 20px; border-width: 0px 0px 1px; border-top-style: initial; border-right-style: initial; border-bottom-style: dashed; border-left-style: initial; border-top-color: initial; border-right-color: initial; border-bottom-color: rgb(221, 221, 221); border-left-color: initial; border-image: initial; outline: 0px; font-size: 12px; vertical-align: baseline; color: rgb(153, 153, 153); text-indent: 2em; line-height: 20px; font-family: &quot;Microsoft YaHei&quot;, Arial; white-space: normal;">2、退款时，只支持退到付款时所用的卡，根据银行办理规定，借记卡3-5个工作日到账。</p><h1 class="h1" style="margin: 10px 0px 0px; padding: 0px; border: 0px; outline: 0px; font-size: 14px; vertical-align: baseline; height: 30px; line-height: 30px; color: rgb(51, 51, 51); font-family: 微软雅黑; white-space: normal;">二、支付平台方式</h1><p class="p cb" style="margin-top: 10px; margin-bottom: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 12px; vertical-align: baseline; color: rgb(51, 51, 51); text-indent: 2em; line-height: 20px; font-family: &quot;Microsoft YaHei&quot;, Arial; white-space: normal;">支付宝、财付通、支付宝扫描支付、微信扫描支付支持绝大多数银行借记卡及信用卡，即时到帐，准确快捷，我们推荐您在支付货款时使用！</p><h4 class="h4 cb" style="margin: 30px 0px 0px; padding: 0px; border: 0px; outline: 0px; font-size: 12px; vertical-align: baseline; color: rgb(51, 51, 51); font-family: &quot;Microsoft YaHei&quot;, Arial; white-space: normal;">1、支付宝</h4><table class="table" width="719"><tbody style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;"><tr style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;" class="firstRow"><th style="margin: 0px; padding: 0px; border-top: 0px; border-left: 0px; border-right-color: rgb(204, 204, 204); border-bottom-color: rgb(204, 204, 204); outline: 0px; font-size: 14px; vertical-align: middle; text-align: center; background: rgb(234, 234, 234); height: 30px; line-height: 30px;">支付平台</th><th style="margin: 0px; padding: 0px; border-top: 0px; border-left: 0px; border-right-color: rgb(204, 204, 204); border-bottom-color: rgb(204, 204, 204); outline: 0px; font-size: 14px; vertical-align: middle; text-align: center; background: rgb(234, 234, 234); height: 30px; line-height: 30px;">说 明</th><th style="margin: 0px; padding: 0px; border-top: 0px; border-left: 0px; border-right-color: rgb(204, 204, 204); border-bottom-color: rgb(204, 204, 204); outline: 0px; font-size: 14px; vertical-align: middle; text-align: center; background: rgb(234, 234, 234); height: 30px; line-height: 30px;">其他信息</th></tr><tr style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;"><td style="margin: 0px; padding: 10px 0px; border-top: 0px; border-left: 0px; border-right-color: rgb(204, 204, 204); border-bottom-color: rgb(204, 204, 204); outline: 0px; vertical-align: middle; text-align: center;"><img width="142" height="42" alt="支付宝" src="http://image.meilele.com/themes/paipai/images/acticle/pay/zhifubao.jpg"/></td><td class="cblue" style="margin: 0px; padding: 10px 0px; border-top: 0px; border-left: 0px; border-right-color: rgb(204, 204, 204); border-bottom-color: rgb(204, 204, 204); outline: 0px; vertical-align: middle; color: rgb(2, 38, 145); text-align: center;">支付宝公司支付平台 快捷安全</td><td style="margin: 0px; padding: 10px 0px; border-top: 0px; border-left: 0px; border-right-color: rgb(204, 204, 204); border-bottom-color: rgb(204, 204, 204); outline: 0px; vertical-align: middle; text-align: center;"><a href="https://www.alipay.com/" target="_blank" title="支付宝平台" class="cblue" style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; text-decoration: none; color: rgb(2, 38, 145);">支付宝平台</a></td></tr></tbody></table><h4 class="h4 cg" style="margin: 30px 0px 0px; padding: 0px; border: 0px; outline: 0px; font-size: 12px; vertical-align: baseline; color: rgb(153, 153, 153); font-family: &quot;Microsoft YaHei&quot;, Arial; white-space: normal;">温馨提示</h4><p class="p cg" style="margin-top: 10px; margin-bottom: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 12px; vertical-align: baseline; color: rgb(153, 153, 153); text-indent: 2em; line-height: 20px; font-family: &quot;Microsoft YaHei&quot;, Arial; white-space: normal;">您需要开通一张网上任何银行的借记卡和一个支付宝账户，通过网上转账的方式将钱存入支付宝，然后向我们支付货款，我们见到货款后会马上开始备货。（推荐使用）</p><p class="p cg bb pb" style="margin-top: 10px; margin-bottom: 0px; padding: 0px 0px 20px; border-width: 0px 0px 1px; border-top-style: initial; border-right-style: initial; border-bottom-style: dashed; border-left-style: initial; border-top-color: initial; border-right-color: initial; border-bottom-color: rgb(221, 221, 221); border-left-color: initial; border-image: initial; outline: 0px; font-size: 12px; vertical-align: baseline; color: rgb(153, 153, 153); text-indent: 2em; line-height: 20px; font-family: &quot;Microsoft YaHei&quot;, Arial; white-space: normal;"><strong style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;">注明：</strong>如果您在操作的时候遇到网络中断或其他原因而导致支付流程未完成时，请重新支付；如您无法确定订单支付是否成功，可致电400-009-8666或联系在线客服进行查询；如果您确定订单支付未成功，您可以重新进行支付。</p><h4 class="h4 cb" style="margin: 30px 0px 0px; padding: 0px; border: 0px; outline: 0px; font-size: 12px; vertical-align: baseline; color: rgb(51, 51, 51); font-family: &quot;Microsoft YaHei&quot;, Arial; white-space: normal;">2、支付宝扫码支付</h4><table class="table" width="719"><tbody style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;"><tr style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;" class="firstRow"><th style="margin: 0px; padding: 0px; border-top: 0px; border-left: 0px; border-right-color: rgb(204, 204, 204); border-bottom-color: rgb(204, 204, 204); outline: 0px; font-size: 14px; vertical-align: middle; text-align: center; background: rgb(234, 234, 234); height: 30px; line-height: 30px;">支付平台</th><th style="margin: 0px; padding: 0px; border-top: 0px; border-left: 0px; border-right-color: rgb(204, 204, 204); border-bottom-color: rgb(204, 204, 204); outline: 0px; font-size: 14px; vertical-align: middle; text-align: center; background: rgb(234, 234, 234); height: 30px; line-height: 30px;">说 明</th><th style="margin: 0px; padding: 0px; border-top: 0px; border-left: 0px; border-right-color: rgb(204, 204, 204); border-bottom-color: rgb(204, 204, 204); outline: 0px; font-size: 14px; vertical-align: middle; text-align: center; background: rgb(234, 234, 234); height: 30px; line-height: 30px;">其他信息</th></tr><tr style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;"><td style="margin: 0px; padding: 10px 0px; border-top: 0px; border-left: 0px; border-right-color: rgb(204, 204, 204); border-bottom-color: rgb(204, 204, 204); outline: 0px; vertical-align: middle; text-align: center;"><img width="146" height="44" alt="支付宝扫码" src="http://image.meilele.com/images/upload/201512/12f42e126b37920fc5fa643bc74d91fa.gif"/></td><td class="cblue" style="margin: 0px; padding: 10px 0px; border-top: 0px; border-left: 0px; border-right-color: rgb(204, 204, 204); border-bottom-color: rgb(204, 204, 204); outline: 0px; vertical-align: middle; color: rgb(2, 38, 145); text-align: center;">支付宝支付平台 便捷安全</td><td style="margin: 0px; padding: 10px 0px; border-top: 0px; border-left: 0px; border-right-color: rgb(204, 204, 204); border-bottom-color: rgb(204, 204, 204); outline: 0px; vertical-align: middle; text-align: center;"><a title="支付宝平台" target="_blank" href="https://www.alipay.com/" class="cblue" style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; text-decoration: none; color: rgb(2, 38, 145);">支付宝平台</a></td></tr></tbody></table><h4 class="h4 cg" style="margin: 30px 0px 0px; padding: 0px; border: 0px; outline: 0px; font-size: 12px; vertical-align: baseline; color: rgb(153, 153, 153); font-family: &quot;Microsoft YaHei&quot;, Arial; white-space: normal;">温馨提示</h4><p class="p cg" style="margin-top: 10px; margin-bottom: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 12px; vertical-align: baseline; color: rgb(153, 153, 153); text-indent: 2em; line-height: 20px; font-family: &quot;Microsoft YaHei&quot;, Arial; white-space: normal;">您需要开通一张网上任何银行的借记卡和一个支付宝账户，在支付宝中使用不同付款方式向我们支付货款，我们收到货款后会马上开始备货。</p><p class="p cg bb pb" style="margin-top: 10px; margin-bottom: 0px; padding: 0px 0px 20px; border-width: 0px 0px 1px; border-top-style: initial; border-right-style: initial; border-bottom-style: dashed; border-left-style: initial; border-top-color: initial; border-right-color: initial; border-bottom-color: rgb(221, 221, 221); border-left-color: initial; border-image: initial; outline: 0px; font-size: 12px; vertical-align: baseline; color: rgb(153, 153, 153); text-indent: 2em; line-height: 20px; font-family: &quot;Microsoft YaHei&quot;, Arial; white-space: normal;"><strong style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;">注明：</strong>如果您在操作的时候遇到网络中断或其他原因而导致支付流程未完成时，请重新支付；如您无法确定订单支付是否成功，可致电400-009-8666或联系在线客服进行查询；如果您确定订单支付未成功，您可以重新进行支付。</p><h4 class="h4 cb" style="margin: 30px 0px 0px; padding: 0px; border: 0px; outline: 0px; font-size: 12px; vertical-align: baseline; color: rgb(51, 51, 51); font-family: &quot;Microsoft YaHei&quot;, Arial; white-space: normal;">4、微信扫码支付</h4><table class="table" width="719"><tbody style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;"><tr style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;" class="firstRow"><th style="margin: 0px; padding: 0px; border-top: 0px; border-left: 0px; border-right-color: rgb(204, 204, 204); border-bottom-color: rgb(204, 204, 204); outline: 0px; font-size: 14px; vertical-align: middle; text-align: center; background: rgb(234, 234, 234); height: 30px; line-height: 30px;">支付平台</th><th style="margin: 0px; padding: 0px; border-top: 0px; border-left: 0px; border-right-color: rgb(204, 204, 204); border-bottom-color: rgb(204, 204, 204); outline: 0px; font-size: 14px; vertical-align: middle; text-align: center; background: rgb(234, 234, 234); height: 30px; line-height: 30px;">说 明</th><th style="margin: 0px; padding: 0px; border-top: 0px; border-left: 0px; border-right-color: rgb(204, 204, 204); border-bottom-color: rgb(204, 204, 204); outline: 0px; font-size: 14px; vertical-align: middle; text-align: center; background: rgb(234, 234, 234); height: 30px; line-height: 30px;">其他信息</th></tr><tr style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;"><td style="margin: 0px; padding: 10px 0px; border-top: 0px; border-left: 0px; border-right-color: rgb(204, 204, 204); border-bottom-color: rgb(204, 204, 204); outline: 0px; vertical-align: middle; text-align: center;"><img width="156" height="44" alt="微信扫码支付" src="http://image.meilele.com/images/upload/201512/0e454588254ac857249e74a2b0d1dba5.gif"/></td><td class="cgreen2" style="margin: 0px; padding: 10px 0px; border-top: 0px; border-left: 0px; border-right-color: rgb(204, 204, 204); border-bottom-color: rgb(204, 204, 204); outline: 0px; vertical-align: middle; color: rgb(0, 200, 0); text-align: center;">微信支付平台 便捷安全</td><td style="margin: 0px; padding: 10px 0px; border-top: 0px; border-left: 0px; border-right-color: rgb(204, 204, 204); border-bottom-color: rgb(204, 204, 204); outline: 0px; vertical-align: middle; text-align: center;"><a title="微信支付平台" target="_blank" href="https://pay.weixin.qq.com/i" class="cgreen2" style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; text-decoration: none; color: rgb(0, 200, 0);">微信支付平台</a></td></tr></tbody></table><h4 class="h4 cg" style="margin: 30px 0px 0px; padding: 0px; border: 0px; outline: 0px; font-size: 12px; vertical-align: baseline; color: rgb(153, 153, 153); font-family: &quot;Microsoft YaHei&quot;, Arial; white-space: normal;">温馨提示</h4><p class="p cg" style="margin-top: 10px; margin-bottom: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 12px; vertical-align: baseline; color: rgb(153, 153, 153); text-indent: 2em; line-height: 20px; font-family: &quot;Microsoft YaHei&quot;, Arial; white-space: normal;">微信扫描支付是集成在微信客户端的支付功能，您需要在微信中关联一张银行卡 ，在微信里使用扫码完成支付，我们收到货款后会马上开始备货。</p><p class="p cg bb pb" style="margin-top: 10px; margin-bottom: 0px; padding: 0px 0px 20px; border-width: 0px 0px 1px; border-top-style: initial; border-right-style: initial; border-bottom-style: dashed; border-left-style: initial; border-top-color: initial; border-right-color: initial; border-bottom-color: rgb(221, 221, 221); border-left-color: initial; border-image: initial; outline: 0px; font-size: 12px; vertical-align: baseline; color: rgb(153, 153, 153); text-indent: 2em; line-height: 20px; font-family: &quot;Microsoft YaHei&quot;, Arial; white-space: normal;"><strong style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;">注明：</strong>如果您在操作的时候遇到网络中断或其他原因而导致支付流程未完成时，请重新支付；如您无法确定订单支付是否成功，可致电400-009-8666或联系在线客服进行查询；如果您确定订单支付未成功，您可以重新进行支付。</p><h1 class="h1" style="margin: 10px 0px 0px; padding: 0px; border: 0px; outline: 0px; font-size: 14px; vertical-align: baseline; height: 30px; line-height: 30px; color: rgb(51, 51, 51); font-family: 微软雅黑; white-space: normal;">三、银行柜台汇款</h1><p class="p cb" style="margin-top: 10px; margin-bottom: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 12px; vertical-align: baseline; color: rgb(51, 51, 51); text-indent: 2em; line-height: 20px; font-family: &quot;Microsoft YaHei&quot;, Arial; white-space: normal;">如果您是在各地体验馆购买商品，具体的付款方式及收款账号请咨询当地体验馆。</p><p class="p cb" style="margin-top: 10px; margin-bottom: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 12px; vertical-align: baseline; color: rgb(51, 51, 51); text-indent: 2em; line-height: 20px; font-family: &quot;Microsoft YaHei&quot;, Arial; white-space: normal;">如果您是在网站上购买商品，具体的付款方式及收款账号请咨询<a target="_blank" style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; color: rgb(255, 102, 0);">在线客服</a>或销售人员。</p><p class="p cg" style="margin-top: 10px; margin-bottom: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 12px; vertical-align: baseline; color: rgb(153, 153, 153); text-indent: 2em; line-height: 20px; font-family: &quot;Microsoft YaHei&quot;, Arial; white-space: normal;"><strong style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;">注明：</strong></p><p class="p cg" style="margin-top: 10px; margin-bottom: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 12px; vertical-align: baseline; color: rgb(153, 153, 153); text-indent: 2em; line-height: 20px; font-family: &quot;Microsoft YaHei&quot;, Arial; white-space: normal;">A 汇款时，您只需持本人身份证到附近的银行柜台办理异地（或同城）汇款业务即可。</p><p class="p cg" style="margin-top: 10px; margin-bottom: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 12px; vertical-align: baseline; color: rgb(153, 153, 153); text-indent: 2em; line-height: 20px; font-family: &quot;Microsoft YaHei&quot;, Arial; white-space: normal;">B 为了方便汇款，你也可以选择开通网上银行，这样就可以直接通过网上银行进行汇款操作。</p><p class="p cg bb pb" style="margin-top: 10px; margin-bottom: 0px; padding: 0px 0px 20px; border-width: 0px 0px 1px; border-top-style: initial; border-right-style: initial; border-bottom-style: dashed; border-left-style: initial; border-top-color: initial; border-right-color: initial; border-bottom-color: rgb(221, 221, 221); border-left-color: initial; border-image: initial; outline: 0px; font-size: 12px; vertical-align: baseline; color: rgb(153, 153, 153); text-indent: 2em; line-height: 20px; font-family: &quot;Microsoft YaHei&quot;, Arial; white-space: normal;">C 如果您的银行卡尚未开通网上银行功能，您可以携带本人有效证件到所在银行各营业网点办理。</p><h1 class="h1" style="margin: 10px 0px 0px; padding: 0px; border: 0px; outline: 0px; font-size: 14px; vertical-align: baseline; height: 30px; line-height: 30px; color: rgb(51, 51, 51); font-family: 微软雅黑; white-space: normal;">四、pos机刷卡支付或现金支付</h1><p class="p cb bb pb" style="margin-top: 10px; margin-bottom: 0px; padding: 0px 0px 20px; border-width: 0px 0px 1px; border-top-style: initial; border-right-style: initial; border-bottom-style: dashed; border-left-style: initial; border-top-color: initial; border-right-color: initial; border-bottom-color: rgb(221, 221, 221); border-left-color: initial; border-image: initial; outline: 0px; font-size: 12px; vertical-align: baseline; color: rgb(51, 51, 51); text-indent: 2em; line-height: 20px; font-family: &quot;Microsoft YaHei&quot;, Arial; white-space: normal;">购买的客户可以使用pos刷卡支付或现金支付。</p><h1 class="h1" style="margin: 10px 0px 0px; padding: 0px; border: 0px; outline: 0px; font-size: 14px; vertical-align: baseline; height: 30px; line-height: 30px; color: rgb(51, 51, 51); font-family: 微软雅黑; white-space: normal;">五、付款注意事项</h1><p class="p cb" style="margin-top: 10px; margin-bottom: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 12px; vertical-align: baseline; color: rgb(51, 51, 51); text-indent: 2em; line-height: 20px; font-family: &quot;Microsoft YaHei&quot;, Arial; white-space: normal;">第一、为了您的资金安全，不推荐您使用现金支付。</p><p class="p cb" style="margin-top: 10px; margin-bottom: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 12px; vertical-align: baseline; color: rgb(51, 51, 51); text-indent: 2em; line-height: 20px; font-family: &quot;Microsoft YaHei&quot;, Arial; white-space: normal;">第二、汇款完成后，请及时通知我们查帐，款到后即可为您办理相关业务。</p><p class="p cb" style="margin-top: 10px; margin-bottom: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 12px; vertical-align: baseline; color: rgb(51, 51, 51); text-indent: 2em; line-height: 20px; font-family: &quot;Microsoft YaHei&quot;, Arial; white-space: normal;">第三、为了保证您的汇款时效性，请勿跨行办理。异地及跨行汇款会产生手续费，具体额度以各银行规定为准，手续费自行承担。</p><p><br/></p>', 1485246481, 1485246481),
(2, '物流配送', ' logistics', '关于物流配送的常见问题和解决办法', '<p style="margin-top: 0px; margin-bottom: 0px; padding: 10px; border: 0px; outline: 0px; font-size: 12px; vertical-align: baseline; line-height: 24px; color: rgb(51, 51, 51); font-family: &quot;Microsoft YaHei&quot;, Arial; white-space: normal;"><span class="r ra" style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; text-align: right !important;">提问：</span><strong class="fb" style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;">家具怎么运输？</strong><br/><span class="r ra" style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; text-align: right !important;">解答：</span>我们与全国各地的物流都建立了合作关系，货物备好后我们将通过物流发货到您当地的物流点。具体发货方式包括以下三种：<br/>1、体验馆所在地区可以提供付费送货+配送服务；<br/>2、通过物流向全国发货到当地物流点，需要客户自提；<br/>3、部分小件商品可发快递。</p><p style="margin-top: 0px; margin-bottom: 0px; padding: 10px; border: 0px; outline: 0px; font-size: 12px; vertical-align: baseline; line-height: 24px; color: rgb(51, 51, 51); font-family: &quot;Microsoft YaHei&quot;, Arial; white-space: normal;"><span class="r ra" style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; text-align: right !important;">提问：</span><strong class="fb" style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;">运费怎么收取的？</strong><br/><span class="r ra" style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; text-align: right !important;">解答：</span>当您提交订单时，提交页面会自动显示您所订购商品的运费。若您选择物流运送或快递，运费是根据家具体积、重量和所在城市物流单价来计算的；若您选择体验馆三包服务，运费是按照“<a class="red" href="http://www.meilele.com/article_cat-23/article-3206.html" style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; text-decoration: none; color: rgb(207, 0, 14);">体验馆服务费</a>”收取的。</p><p style="margin-top: 0px; margin-bottom: 0px; padding: 10px; border: 0px; outline: 0px; font-size: 12px; vertical-align: baseline; line-height: 24px; color: rgb(51, 51, 51); font-family: &quot;Microsoft YaHei&quot;, Arial; white-space: normal;"><span class="r ra" style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; text-align: right !important;">提问：</span><strong class="fb" style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;">你们可不可以送货上门？</strong><br/><span class="r ra" style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; text-align: right !important;">解答：</span>开设有体验馆的城市在服务范围内可以提供送货上门服务，详情请点击进入“<a class="red" href="http://www.meilele.com/article_cat-23/article-3206.html" style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; text-decoration: none; color: rgb(207, 0, 14);">全国体验馆服务费</a>”查询，其他城市均通过物流发货。物流发货只能到物流点，需要您到物流点提货。如果需要物流送货上门，物流则需要另收取一部分送货费用（偏远地区暂不支持物流送货服务）。</p><p style="margin-top: 0px; margin-bottom: 0px; padding: 10px; border: 0px; outline: 0px; font-size: 12px; vertical-align: baseline; line-height: 24px; color: rgb(51, 51, 51); font-family: &quot;Microsoft YaHei&quot;, Arial; white-space: normal;"><span class="r ra" style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; text-align: right !important;">提问：</span><strong class="fb" style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;">运输损坏了怎么办？</strong><br/><span class="r ra" style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; text-align: right !important;">解答：</span>发货前，我们都会对商品进行防摔包装以保证运输中的安全。当然，全国各地路途遥远有时难免出现意外，如有物流损坏问题我们会联系维修师傅上门为您处理；若您当地没有我们的维修师傅您可以联系本地的师傅为您处理，费用由我们来承担。如果物流损坏严重影响使用，我们会免费为您提供更换，详情请查看“<a class="red" target="_blank" href="http://www.meilele.com/article_cat-26/article-2838.html" style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; text-decoration: none; color: rgb(207, 0, 14);">维修补件说明</a>”。</p><p><br/></p>', 1485246865, 1485246865);

-- --------------------------------------------------------

--
-- 表的结构 `ym_suggest`
--

DROP TABLE IF EXISTS `ym_suggest`;
CREATE TABLE IF NOT EXISTS `ym_suggest` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `nickname` varchar(20) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `oprater` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` varchar(300) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ym_suggest`
--

INSERT INTO `ym_suggest` (`id`, `type`, `nickname`, `ip`, `oprater`, `email`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, '芝士', '127.0.0.1', '谷歌浏览器', '179502202@qq.com', '关于商品的包装问题', '商品包装存在着很大的问题', 1485008216, 1485008216);

-- --------------------------------------------------------

--
-- 表的结构 `ym_tips`
--

DROP TABLE IF EXISTS `ym_tips`;
CREATE TABLE IF NOT EXISTS `ym_tips` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(45) NOT NULL,
  `url` varchar(255) NOT NULL,
  `timg` varchar(255) DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1:广告；2.友链',
  `created_at` int(10) UNSIGNED NOT NULL,
  `updated_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='部件配置';

-- --------------------------------------------------------

--
-- 表的结构 `ym_user`
--

DROP TABLE IF EXISTS `ym_user`;
CREATE TABLE IF NOT EXISTS `ym_user` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `auth_key` char(32) NOT NULL,
  `password_hash` char(255) NOT NULL,
  `password_reset_token` char(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `sex` enum('男','女') NOT NULL DEFAULT '男',
  `login_ip` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `site` varchar(255) DEFAULT NULL,
  `qq` int(11) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '10',
  `updated_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表';

-- --------------------------------------------------------

--
-- 表的结构 `ym_value`
--

DROP TABLE IF EXISTS `ym_value`;
CREATE TABLE IF NOT EXISTS `ym_value` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cate_id` int(11) NOT NULL,
  `vname` varchar(255) DEFAULT NULL,
  `created_at` int(10) NOT NULL,
  `updated_at` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='用途';

--
-- 转存表中的数据 `ym_value`
--

INSERT INTO `ym_value` (`id`, `cate_id`, `vname`, `created_at`, `updated_at`) VALUES
(1, 1, '生日', 1484547299, 1485187767),
(2, 1, '祝寿', 1484547299, 1485187776),
(10, 1, '儿童', 1485229265, 1485229265),
(11, 1, '爱情', 1485229282, 1485229282);

--
-- 限制导出的表
--

--
-- 限制表 `ym_auth_assignment`
--
ALTER TABLE `ym_auth_assignment`
  ADD CONSTRAINT `ym_auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `ym_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `ym_auth_item`
--
ALTER TABLE `ym_auth_item`
  ADD CONSTRAINT `ym_auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `ym_auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- 限制表 `ym_auth_item_child`
--
ALTER TABLE `ym_auth_item_child`
  ADD CONSTRAINT `ym_auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `ym_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ym_auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `ym_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
