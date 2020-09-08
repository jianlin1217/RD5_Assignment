-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- 主機： localhost:8889
-- 產生時間： 2020 年 09 月 08 日 09:08
-- 伺服器版本： 5.7.26
-- PHP 版本： 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- 資料庫： `WebBank`
--

-- --------------------------------------------------------

--
-- 資料表結構 `historyList`
--

CREATE TABLE `historyList` (
  `historyId` int(11) NOT NULL,
  `transactionMoney` int(11) DEFAULT NULL,
  `memberId` int(11) DEFAULT NULL,
  `addOrsub` char(5) DEFAULT NULL,
  `transactionDate` datetime DEFAULT NULL,
  `remain` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `historyList`
--

INSERT INTO `historyList` (`historyId`, `transactionMoney`, `memberId`, `addOrsub`, `transactionDate`, `remain`) VALUES
(172, 6000, 1, '存入', '2020-09-08 16:32:35', 41362),
(173, 5000, 1, '提出', '2020-09-08 16:32:40', 36362);

-- --------------------------------------------------------

--
-- 資料表結構 `memberAccount`
--

CREATE TABLE `memberAccount` (
  `memberId` int(11) NOT NULL,
  `money` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `memberAccount`
--

INSERT INTO `memberAccount` (`memberId`, `money`) VALUES
(1, 36362),
(4, 489800),
(14, -1000),
(18, 113637);

-- --------------------------------------------------------

--
-- 資料表結構 `memberList`
--

CREATE TABLE `memberList` (
  `memberID` int(11) NOT NULL,
  `memberName` varchar(20) NOT NULL,
  `memberPass` varchar(20) NOT NULL,
  `address` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` char(10) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `memberList`
--

INSERT INTO `memberList` (`memberID`, `memberName`, `memberPass`, `address`, `phone`, `email`) VALUES
(1, 'Duo', 'Duo0727', NULL, '', ''),
(4, 'Jian', 'Chungyo0824', NULL, '', ''),
(14, 'Bear', 'Bear0825', '森林', '0958285996', 'BearTest0825@gmail.com'),
(18, 'Fox0825', 'Foxpwd0825', '草原', '02-8465244', 'Fox08@yahoo.com.tw');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `historyList`
--
ALTER TABLE `historyList`
  ADD PRIMARY KEY (`historyId`);

--
-- 資料表索引 `memberAccount`
--
ALTER TABLE `memberAccount`
  ADD PRIMARY KEY (`memberId`);

--
-- 資料表索引 `memberList`
--
ALTER TABLE `memberList`
  ADD PRIMARY KEY (`memberID`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `historyList`
--
ALTER TABLE `historyList`
  MODIFY `historyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `memberAccount`
--
ALTER TABLE `memberAccount`
  MODIFY `memberId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `memberList`
--
ALTER TABLE `memberList`
  MODIFY `memberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
