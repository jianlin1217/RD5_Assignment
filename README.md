# RD5_Assignment

# 檔案總覽
```
index.php
login.php
regAccount.php
connectDB.php
```

# 0824  v1.1 三個網頁
index.php
login.php
regAccount.php
```
index.php 首頁
login.php 登入畫面
regAccount.php 註冊畫面
```
# 0824  v1.2 新增資料庫以及連結資料庫設定
connectDB.php
資料庫為WebBank
資料表：      memberList （放會員的資料
            memberAccount (會員金額有多少
            historyList   (歷史明細

# 0824  v1.3 登入畫面設定，三個網頁可以切換
簡單登入畫面（使用Bootstrap）



# 0824  v1.4 接收使用者登入資訊並比對
將使用者的資料和資料庫中的做比對
兩者皆相符者則進入，否則無法進入

# 0824  v1.5 創一個登入後管理的畫面
功能四種
存款
提款
查詢餘額
查詢明細

# 0824 v1.6 新增存款及提款功能(和資料庫連線)
尚未除去可能輸入負數小數等非合法問題
也尚未考慮一般提款上限金額

# 0824 v1.7 新增明細表單



-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- 主機： localhost:8889
-- 產生時間： 2020 年 08 月 24 日 09:37
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
  `transactionDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `historyList`
--

INSERT INTO `historyList` (`historyId`, `transactionMoney`, `memberId`, `addOrsub`, `transactionDate`) VALUES
(24, 500, 1, '存入', '2020-08-24');

-- --------------------------------------------------------

--
-- 資料表結構 `memberAccount`
--

CREATE TABLE `memberAccount` (
  `memberId` int(11) NOT NULL,
  `money` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `memberAccount`
--

INSERT INTO `memberAccount` (`memberId`, `money`) VALUES
(1, 43500),
(4, 230000);

-- --------------------------------------------------------

--
-- 資料表結構 `memberList`
--

CREATE TABLE `memberList` (
  `memberID` int(11) NOT NULL,
  `memberName` varchar(30) NOT NULL,
  `accountId` int(11) NOT NULL DEFAULT '1',
  `memberPass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `memberList`
--

INSERT INTO `memberList` (`memberID`, `memberName`, `accountId`, `memberPass`) VALUES
(1, 'Duo', 12, 'Duo0727'),
(4, 'Jian', 17, 'Chungyo0824');

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
  ADD PRIMARY KEY (`memberID`),
  ADD UNIQUE KEY `accountId` (`accountId`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `historyList`
--
ALTER TABLE `historyList`
  MODIFY `historyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `memberAccount`
--
ALTER TABLE `memberAccount`
  MODIFY `memberId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `memberList`
--
ALTER TABLE `memberList`
  MODIFY `memberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
