-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2014 at 10:50 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pandora`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `type_id` tinyint(4) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `manager` varchar(20) NOT NULL,
  `add_datetime` datetime NOT NULL,
  `author` varchar(20) NOT NULL,
  `img_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=89 ;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `type_id`, `title`, `content`, `manager`, `add_datetime`, `author`, `img_name`) VALUES
(45, 0, '隔阂', '二哈如日据统计<br>', 'admin', '2014-08-14 17:17:27', '39f3feafce2f511eec9d', '39f3feafce2f511eec9d285287a88fd8.jpg'),
(46, 1, '啊赫然', '条件啊如图<br>', 'admin', '2014-08-14 17:17:59', '4b450f459e4f2e00ad20', '4b450f459e4f2e00ad20ff72a51329e3.gif'),
(47, 2, '发截图', '他就是人口虽然是让他看<br>', 'admin', '2014-08-14 17:19:44', '39f3feafce2f511eec9d', '39f3feafce2f511eec9d285287a88fd8.jpg'),
(48, 3, '儿童画', '人家送人头接口<br>', 'admin', '2014-08-14 17:20:02', '39f3feafce2f511eec9d', '39f3feafce2f511eec9d285287a88fd8.jpg'),
(49, 4, '田军', '日又是一款ir有空<br>', 'admin', '2014-08-14 17:20:18', '39f3feafce2f511eec9d', '39f3feafce2f511eec9d285287a88fd8.jpg'),
(50, 4, '日加一天', '的添加阿克江<br>', 'admin', '2014-08-14 17:20:40', '39f3feafce2f511eec9d', '39f3feafce2f511eec9d285287a88fd8.jpg'),
(51, 0, '天东软集团', '他就天jar<br>', 'admin', '2014-08-14 17:20:53', '39f3feafce2f511eec9d', '39f3feafce2f511eec9d285287a88fd8.jpg'),
(52, 1, '日天金融界日填缝剂阿和然后人体既然添加阿尔哈人啊如何安然姐让他', '而假如他人太日填缝剂阿和然后人体既然添加阿尔哈人啊如何安然姐让他日填缝剂阿和然后人体既然添加阿尔哈人啊如何安然姐让他日填缝剂阿和然后人体既然添加阿尔哈人啊如何安然姐让他日填缝剂阿和然后人体既然添加阿尔哈人啊如何安然姐让他日填缝剂阿和然后人体既然添加阿尔哈人啊如何安然姐让他日填缝剂阿和然后人体既然添加阿尔哈人啊如何安然姐让他<br><br><br><br><br><br><br>', 'admin', '2014-08-14 17:21:08', '39f3feafce2f511eec9d', '39f3feafce2f511eec9d285287a88fd8.jpg'),
(53, 2, '阿尔加哈日填缝剂阿和然后人体既然添加阿尔哈人啊如何安然姐让他', '二甲土建日填缝剂阿和然后人体既然添加阿尔哈人啊如何安然姐让他日填缝剂阿和然后人体既然添加阿尔哈人啊如何安然姐让他日填缝剂阿和然后人体既然添加阿尔哈人啊如何安然姐让他日填缝剂阿和然后人体既然添加阿尔哈人啊如何安然姐让他日填缝剂阿和然后人体既然添加阿尔哈人啊如何安然姐让他日填缝剂阿和然后人体既然添加阿尔哈人啊如何安然姐让他日填缝剂阿和然后人体既然添加阿尔哈人啊如何安然姐让他日填缝剂阿和然后人体既然添加阿尔哈人啊如何安然姐让他日填缝剂阿和然后人体既然添加阿尔哈人啊如何安然姐让他日填缝剂阿和然后人体既然添加阿尔哈人啊如何安然姐让他日填缝剂阿和然后人体既然添加阿尔哈人啊如何安然姐让他<br><br><br><br><br><br><br><br><br><br><br><br>', 'admin', '2014-08-14 17:21:20', '39f3feafce2f511eec9d', '39f3feafce2f511eec9d285287a88fd8.jpg'),
(54, 3, '就突然日填缝剂阿和然后人体既然添加阿尔哈人啊如何安然姐让他', '就突然可是条件啊<br>', 'admin', '2014-08-14 17:21:34', '39f3feafce2f511eec9d', '39f3feafce2f511eec9d285287a88fd8.jpg'),
(55, 1, '日填缝剂阿和然后人体既然添加阿尔哈人啊如何安然姐让他', '爱的家突然何如<br>aghoi按哦改日<br><img src="http://pandora.com/article_img/c4527bf4e0dc4afb5bac8e525edc0fdf.gif" alt=""><br>爱的家突然何如爱的家突然何如爱的家突然何如爱的家突然何如爱的家突然何如爱的家突然何如爱的家突然何如爱的家突然何如爱的家突然何如爱的家突然何如爱的家突然何如爱的家突然何如爱的家突然何如爱的家突然何如爱的家突然何如爱的家突然何如爱的家突然何如爱的家突然何如爱的家突然何如爱的家突然何如爱的家突然何如爱的家突然何如爱的家突然何如爱的家突然何如爱的家突然何如爱的家突然何如爱的家突然何如<br>aghoi按哦改日<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>', 'admin', '2014-08-14 17:21:48', '39f3feafce2f511eec9d', '39f3feafce2f511eec9d285287a88fd8.jpg'),
(56, 3, '让他加日填缝剂阿和然后人体既然添加阿尔哈人啊如何安然姐让他', '条件啊如图<b></b>日填缝剂阿和然后人体既然添加阿尔哈人啊如何安然姐让他日填缝剂阿和然后人体既然添加阿尔哈人啊如何安然姐让他<br><br><br>', 'admin', '2014-08-14 17:22:02', '39f3feafce2f511eec9d', '39f3feafce2f511eec9d285287a88fd8.jpg'),
(57, 2, '和然后人体既然添加阿尔哈人啊如何安然姐让他和然后人体既', '条件啊如让她盎然额额日填缝剂阿和然后人体既然添加阿尔哈人啊如何安然姐让他日填缝剂阿和然后人体既然添加阿尔哈人啊如何安然姐让他<br><br><br>', 'admin', '2014-08-14 17:22:21', '39f3feafce2f511eec9d', '39f3feafce2f511eec9d285287a88fd8.jpg'),
(58, 4, '的润滑剂', '大人见他<br>', 'admin', '2014-08-14 17:22:34', '39f3feafce2f511eec9d', '39f3feafce2f511eec9d285287a88fd8.jpg'),
(59, 2, '见他今天', '的他今天<br>', 'admin', '2014-08-14 17:22:48', '39f3feafce2f511eec9d', '39f3feafce2f511eec9d285287a88fd8.jpg'),
(60, 5, '的四件套', '局外人让今天<br>', 'admin', '2014-08-14 17:46:20', '39f3feafce2f511eec9d', '39f3feafce2f511eec9d285287a88fd8.jpg'),
(61, 5, '啊红烧肉', '口蹄疫口蹄疫<br>', 'admin', '2014-08-14 17:46:40', '39f3feafce2f511eec9d', '39f3feafce2f511eec9d285287a88fd8.jpg'),
(62, 5, '然后', '添加人一块块<br>', 'admin', '2014-08-14 17:47:02', '39f3feafce2f511eec9d', '39f3feafce2f511eec9d285287a88fd8.jpg'),
(63, 5, '非官方个', '天凤图腾<br>', 'admin', '2014-08-14 17:47:15', '39f3feafce2f511eec9d', '39f3feafce2f511eec9d285287a88fd8.jpg'),
(64, 6, 'ahr', '儿童画日体检科<br>', 'admin', '2014-08-15 13:00:06', '39f3feafce2f511eec9d', '39f3feafce2f511eec9d285287a88fd8.jpg'),
(65, 5, '俱乐部5', '和然后嗯哼额阿尔金<br>', 'admin', '2014-08-15 15:17:41', '2860f213641ac6079472', '2860f213641ac607947294e90dfd66bb.jpg'),
(66, 5, '饿啊吐哈', '额天jar看软件<br>', 'admin', '2014-08-15 15:17:55', '2860f213641ac6079472', '2860f213641ac607947294e90dfd66bb.jpg'),
(67, 5, '阿尔哈人', '挑挑拣拣额他他他就人口数<br>', 'admin', '2014-08-15 15:18:16', '2860f213641ac6079472', '2860f213641ac607947294e90dfd66bb.jpg'),
(68, 5, '发货吗', '介绍一下同一时刻<br>', 'admin', '2014-08-15 15:18:30', '2860f213641ac6079472', '2860f213641ac607947294e90dfd66bb.jpg'),
(69, 5, '发给', '就突然染色体<br>', 'admin', '2014-08-15 15:23:10', '2860f213641ac6079472', '2860f213641ac607947294e90dfd66bb.jpg'),
(70, 5, '地方', '见反贪局<br>', 'admin', '2014-08-15 15:23:23', '2860f213641ac6079472', '2860f213641ac607947294e90dfd66bb.jpg'),
(71, 2, '发货', '叫他金融界他<br>', 'admin', '2014-08-15 16:10:10', '2860f213641ac6079472', '2860f213641ac607947294e90dfd66bb.jpg'),
(72, 2, '田军', '四库提要<br>', 'admin', '2014-08-15 16:10:25', '2860f213641ac6079472', '2860f213641ac607947294e90dfd66bb.jpg'),
(73, 2, '杜娟', '痛苦的依赖库唐恬恬唐恬恬偷偷<br>', 'admin', '2014-08-15 16:10:39', '2860f213641ac6079472', '2860f213641ac607947294e90dfd66bb.jpg'),
(74, 2, '，的斯托克与', '侤上让他开通ARJ人口数<br>', 'admin', '2014-08-15 16:10:59', '2860f213641ac6079472', '2860f213641ac607947294e90dfd66bb.jpg'),
(75, 2, '的推介会', 'skyftjka他就色润滑油所以<br>', 'admin', '2014-08-15 16:11:17', '2860f213641ac6079472', '2860f213641ac607947294e90dfd66bb.jpg'),
(76, 2, '发送到', '是可以<br>', 'admin', '2014-08-15 16:11:31', '2860f213641ac6079472', '2860f213641ac607947294e90dfd66bb.jpg'),
(77, 2, '福建', '盎然既然添加<br>', 'admin', '2014-08-15 16:11:44', '2860f213641ac6079472', '2860f213641ac607947294e90dfd66bb.jpg'),
(78, 2, '的人', '天居然<br>', 'admin', '2014-08-15 18:06:55', '2860f213641ac6079472', '2860f213641ac607947294e90dfd66bb.jpg'),
(79, 2, '让非', '让他加突然人家二鹅鹅鹅<br>', 'admin', '2014-08-15 18:07:10', '2860f213641ac6079472', '2860f213641ac607947294e90dfd66bb.jpg'),
(80, 2, '那天', '人体几天假人体后简繁体<br>', 'admin', '2014-08-15 18:07:42', '2860f213641ac6079472', '2860f213641ac607947294e90dfd66bb.jpg'),
(81, 2, '福建的', '和她居然又<br>', 'admin', '2014-08-15 18:08:05', '2860f213641ac6079472', '2860f213641ac607947294e90dfd66bb.jpg'),
(82, 2, '她回家', '天健康路<br>', 'admin', '2014-08-15 18:08:18', '2860f213641ac6079472', '2860f213641ac607947294e90dfd66bb.jpg'),
(83, 2, '丰裕口', '离开他有利于咯<br>', 'admin', '2014-08-15 18:08:31', '2860f213641ac6079472', '2860f213641ac607947294e90dfd66bb.jpg'),
(84, 2, 'uluyld', '日日体验<br>', 'admin', '2014-08-15 18:08:44', '2860f213641ac6079472', '2860f213641ac607947294e90dfd66bb.jpg'),
(85, 2, '风纪扣', '她说她已经<br>', 'admin', '2014-08-15 18:08:55', '2860f213641ac6079472', '2860f213641ac607947294e90dfd66bb.jpg'),
(86, 2, '收发邮件', '反弹今天又可以上<br>', 'admin', '2014-08-15 18:09:06', '2860f213641ac6079472', '2860f213641ac607947294e90dfd66bb.jpg'),
(87, 2, '福建', '一卡通预应力<br>', 'admin', '2014-08-15 18:09:20', '2860f213641ac6079472', '2860f213641ac607947294e90dfd66bb.jpg'),
(88, 2, '杨帆', '分将建军节<br>', 'admin', '2014-08-15 18:09:32', '2860f213641ac6079472', '2860f213641ac607947294e90dfd66bb.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cooperation`
--

CREATE TABLE IF NOT EXISTS `cooperation` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `cooperation`
--

INSERT INTO `cooperation` (`id`, `name`, `link`) VALUES
(1, '合作机构1', 'http://fanyi.baidu.com/translate#zh/en/'),
(2, '合作机构2', 'http://fanyi.baidu.com/translate#zh/en/'),
(3, '合作机构3', 'http://fanyi.baidu.com/translate#zh/en/'),
(4, '合作机构4', 'http://fanyi.baidu.com/translate#zh/en/'),
(5, '合作机构5', 'http://fanyi.baidu.com/translate#zh/en/'),
(6, '合作机构6', 'http://fanyi.baidu.com/translate#zh/en/'),
(7, '合作机构7', 'http://fanyi.baidu.com/translate#zh/en/');

-- --------------------------------------------------------

--
-- Table structure for table `friendship_link`
--

CREATE TABLE IF NOT EXISTS `friendship_link` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `link` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `friendship_link`
--

INSERT INTO `friendship_link` (`id`, `name`, `link`) VALUES
(1, '友情链接1', 'http://fanyi.baidu.com/translate#zh/en/'),
(2, '友情链接2', 'http://fanyi.baidu.com/translate#zh/en/'),
(3, '友情链接3', 'http://fanyi.baidu.com/translate#zh/en/'),
(4, '友情链接4', 'http://fanyi.baidu.com/translate#zh/en/'),
(5, '友情链接5', 'http://fanyi.baidu.com/translate#zh/en/'),
(6, '友情链接6', 'http://fanyi.baidu.com/translate#zh/en/'),
(7, '友情链接7', 'http://fanyi.baidu.com/translate#zh/en/'),
(8, '友情链接8', 'http://fanyi.baidu.com/translate#zh/en/'),
(9, '友情链接9', 'http://fanyi.baidu.com/translate#zh/en/'),
(10, '友情链接10', 'http://fanyi.baidu.com/translate#zh/en/'),
(11, '友情链接11', 'http://www.baidu.com/'),
(12, '友情链接12', 'http://www.baidu.com/'),
(13, '友情链接13', 'http://www.baidu.com/'),
(14, '友情链接14', 'http://www.baidu.com/'),
(15, '友情链接15', 'http://www.baidu.com/'),
(16, '友情链接16', 'http://www.baidu.com/'),
(17, '友情链接17', 'http://www.baidu.com/'),
(18, '友情链接18', 'http://www.baidu.com/'),
(19, '友情链接19', 'http://www.baidu.com/'),
(20, '友情链接20', 'http://www.baidu.com/'),
(21, '友情链接21', 'http://www.baidu.com/'),
(22, '友情链接22', 'http://www.baidu.com/'),
(23, '友情链接23', 'http://www.baidu.com/'),
(24, '友情链接24', 'http://www.baidu.com/');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_role` enum('admin','operator','monitor') NOT NULL,
  `user_img` varchar(50) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `added_datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `user_role`, `user_img`, `full_name`, `email`, `added_datetime`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '', '管理员', '727392040@qq.com', '2014-07-11 08:26:27'),
(2, 'operator', '4b583376b2767b923c3e1da60d10de59', 'operator', '', '操作者', 'aghsdai@qq.com', '2014-07-12 07:15:14'),
(3, 'monitor', 'monitor', 'monitor', '', '监控者', 'adasdaadad@163.com', '2014-07-10 06:15:14');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
