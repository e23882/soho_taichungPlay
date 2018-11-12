-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-11-02 21:22:27
-- 伺服器版本: 10.1.21-MariaDB
-- PHP 版本： 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `taichung`
--

-- --------------------------------------------------------

--
-- 資料表結構 `attractions`
--

CREATE TABLE `attractions` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_520_ci NOT NULL,
  `region` varchar(30) COLLATE utf8_unicode_520_ci NOT NULL,
  `special` varchar(100) COLLATE utf8_unicode_520_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_520_ci NOT NULL,
  `type` varchar(30) COLLATE utf8_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `favorite`
--

CREATE TABLE `favorite` (
  `id` int(11) NOT NULL,
  `type` varchar(30) COLLATE utf8_unicode_520_ci NOT NULL,
  `userID` varchar(50) COLLATE utf8_unicode_520_ci NOT NULL,
  `logDate` date NOT NULL,
  `fid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `hotel`
--

CREATE TABLE `hotel` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_520_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_520_ci NOT NULL,
  `phoneNumber` varchar(30) COLLATE utf8_unicode_520_ci NOT NULL,
  `score` double NOT NULL,
  `special` varchar(200) COLLATE utf8_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL,
  `type` varchar(30) COLLATE utf8_unicode_520_ci NOT NULL,
  `region` varchar(30) COLLATE utf8_unicode_520_ci NOT NULL,
  `restName` varchar(30) COLLATE utf8_unicode_520_ci NOT NULL,
  `restType` varchar(30) COLLATE utf8_unicode_520_ci NOT NULL,
  `openTime` varchar(30) COLLATE utf8_unicode_520_ci NOT NULL,
  `address` varchar(50) COLLATE utf8_unicode_520_ci NOT NULL,
  `phoneNumber` varchar(30) COLLATE utf8_unicode_520_ci NOT NULL,
  `parkinSpace` tinyint(1) NOT NULL,
  `price` varchar(50) COLLATE utf8_unicode_520_ci NOT NULL,
  `visa` tinyint(1) NOT NULL,
  `evaluation` double NOT NULL,
  `menu` varchar(150) COLLATE utf8_unicode_520_ci NOT NULL,
  `reservation` tinyint(1) NOT NULL,
  `theme` varchar(50) COLLATE utf8_unicode_520_ci NOT NULL,
  `takeOut` tinyint(1) NOT NULL,
  `delivery` tinyint(1) NOT NULL,
  `bigSpace` tinyint(1) NOT NULL,
  `boxSpace` tinyint(1) NOT NULL,
  `serviceFee` tinyint(1) NOT NULL,
  `wifiNcharging` tinyint(1) NOT NULL,
  `timeLimit` tinyint(1) NOT NULL,
  `feature` varchar(300) COLLATE utf8_unicode_520_ci NOT NULL,
  `pet` tinyint(1) NOT NULL,
  `lowElimination` double NOT NULL,
  `vegetable` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- 資料表的匯出資料 `restaurant`
--

INSERT INTO `restaurant` (`id`, `type`, `region`, `restName`, `restType`, `openTime`, `address`, `phoneNumber`, `parkinSpace`, `price`, `visa`, `evaluation`, `menu`, `reservation`, `theme`, `takeOut`, `delivery`, `bigSpace`, `boxSpace`, `serviceFee`, `wifiNcharging`, `timeLimit`, `feature`, `pet`, `lowElimination`, `vegetable`) VALUES
(1, '西式', '西區', 'OOO寵物餐廳', '寵物餐廳', 'AM 9:00', '台中市OO區OO路一段1號3樓', '02-26212345', 1, '500~1000', 1, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0),
(2, '中式', '北區', 'XXX寵物餐廳', '寵物餐廳', 'AM 10:00', '台中市台中大道一段', '02-12345787', 1, '150~500', 1, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `uName` varchar(30) COLLATE utf8_unicode_520_ci NOT NULL,
  `uAccount` varchar(30) COLLATE utf8_unicode_520_ci NOT NULL,
  `uPassword` varchar(30) COLLATE utf8_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`uid`, `uName`, `uAccount`, `uPassword`) VALUES
(2, '王曉明', 'aa', ''),
(3, '王曉明', 'aa', 'bb'),
(4, 'aa', 'bb', '1234'),
(5, 'aa', 'bb', '1234'),
(6, 'aa', 'bb', '1234'),
(7, 'aa', 'bb', '1234'),
(8, 'aa', 'bb', '1234'),
(9, 'aa', 'bb', '1234'),
(10, 'aa', 'bb', '1234'),
(11, 'aa', 'bb', '1234'),
(12, 'aa', 'bb', '1234'),
(13, 'aa', 'bb', '1234'),
(14, 'aa', 'bb', '1234'),
(15, 'aa', 'bb', '1234'),
(16, 'aa', 'bb', '1234'),
(17, 'aa', 'bb', '1234'),
(18, 'aa', 'bb', '1234'),
(19, 'aa', 'bb', '1234'),
(20, 'aa', 'bb', '1234'),
(21, 'aa', 'bb', '1234'),
(22, 'aa', 'bb', '1234'),
(23, 'aa', 'bb', '1234'),
(24, 'aa', 'bb', '1234'),
(25, 'aa', 'bb', '1234'),
(26, 'aa', 'bb', '1234'),
(27, 'aa', 'bb', '1234'),
(28, 'aa', 'bb', '1234'),
(29, 'aa', 'bb', '123'),
(30, 'aa', 'bb', 'cc'),
(31, 'aa', 'bb', 'cc'),
(32, 'aa', 'bb', 'cc'),
(33, 'aa', 'bb', 'cc'),
(34, 'aa ', 'bb', 'cc'),
(35, 'aa ', ' bb', 'cc'),
(36, 'aa ', 'bb', 'cc'),
(37, 'aa', 'bb', 'cc'),
(38, 'aa', 'bb', 'cc'),
(39, 'aa', 'bb', 'cc'),
(40, 'aa', 'bb', 'cc'),
(41, 'aa', 'bb', 'cc'),
(42, 'aa', 'bb', 'cc'),
(43, '', '', ''),
(44, 'aa', 'bb', 'cc'),
(45, 'aa', 'bb', 'cc'),
(46, 'aa', 'bb ', 'cc');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `attractions`
--
ALTER TABLE `attractions`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `attractions`
--
ALTER TABLE `attractions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `favorite`
--
ALTER TABLE `favorite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用資料表 AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
