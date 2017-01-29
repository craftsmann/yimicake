-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-01-15 07:39:54
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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COMMENT='用户表';

--
-- 转存表中的数据 `ym_adminuser`
--

INSERT INTO `ym_adminuser` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `sex`, `login_ip`, `photo`, `qq`, `phone`, `times`, `status`, `updated_at`, `created_at`) VALUES
(1, 'zhangsan', 'i9R4k1UES7FAkOLByUNDdM5R1Bgvz26N', '$2y$13$eKI4GsL1Orz7iaiLbUP1Ue93SXbaC/YUL34sy/Vzlht3lKhdOPWAy', NULL, '1791502202@qq.com', '男', '::1', 'uploads/20170113/201701131033514307.jpg', 156165, 15616, NULL, 10, 1484303632, 1483358148),
(25, 'master', 'HoWKjODREmDuiDhRgF-GFUmvZIHrnrGW', '$2y$13$fUXtq7PPOqbpU6.2bDflUO1Q8YxLAHO0p1BzA8V0r9Ndgm/9WgwAG', NULL, 'master@qq.com', '女', '::1', 'uploads/20170113/201701130903113270.jpg', 155616, 151566, NULL, 10, 1484321229, 1484298193);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
