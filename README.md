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
使用當前登入的會員id去抓取該會員的明細表
將明細表加入時間的欄位


# 0825 v2.0 註冊功能

註冊功能新增

# 0825 v2.1 註冊欄位判斷

用pattern做判斷
帳號在2~20碼間 開頭必為英文
密碼為6~20碼間 可為數字、英文、底線
電話限制  10碼  或可行的區碼 

# 0825 v3.0 提款以及存款限制

將提款限制每筆20000以下
且提款不能大於餘額
存款及提款不得為負數

# 0825 v3.1 餘額顯示*號

將三位數以上的部分顯示＊號

# 0826 v3.2 重新整理會有重複存款及扣款的問題解決 9:22
進入會員頁面存款或提款後重整會重新存款或提款
使用 window.history.replaceState( null, null, window.location.href );
修改歷史紀錄 把值清空



### 待解決問題
註冊辨識是否已經有同帳戶了


### 想新增的功能
計時系統  用戶登入後閒置一段時間後自動登出

# 圖片
![image](https://github.com/jianlin1217/RD5_Assignment/blob/master/localhost_8888_RD5_Assignment_RD5_Assignment_member.php.png)




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


//區碼來源 https://www.ifreesite.com/phone/taiwan-area-code.htm
02	臺北	Taipei	臺北市、新北市、桃園市龜山區迴龍、基隆市（包含金山、萬里、瑞芳、平溪、雙溪、貢寮）
03	桃園	Taoyuan	桃園市、中壢、南桃園、北桃園（不含龜山區迴龍）
03	新竹	Hsinchu	新竹市、新竹縣（不含新竹縣峨眉鄉部份）
03	花蓮	Hualien	花蓮縣（不含秀林鄉關原地區）
03	宜蘭	Yilan	宜蘭縣
037	苗栗	Miaoli	苗栗縣、新竹縣峨眉鄉部份（不含卓蘭鎮）
04	臺中	Taichung	臺中市、苗栗縣卓蘭鎮、南投縣仁愛鄉部分、花蓮縣秀林鄉富世村關原地區（不含烏日區溪尾里、新社區福興里部份）
04	彰化	Changhua	彰化縣（不含芬園鄉）
049	南投	Nantou	南投縣、彰化縣芬園鄉、臺中市烏日區溪尾里、新社區福興里部份（不含仁愛鄉部分地區）
05	嘉義	Chiayi	嘉義市、嘉義縣（六腳鄉及新港鄉部份地區除外）
05	雲林	Yunlin	雲林縣（包含嘉義縣六腳鄉及新港鄉部份地區）
06	臺南	Tainan	臺南市
06	澎湖	Penghu	澎湖縣
07	高雄	Kaohsiung	高雄市（包含東沙及南沙群島）
08	屏東	Pingtung	屏東縣（屏東、萬丹、潮州、萬巒、內埔、竹田、新埤、恆春、東港、枋寮、枋山）
089	臺東	Taitung	臺東縣
082	金門	Kinmen	金門縣（不含烏坵鄉）
0826	烏坵	Wuqiu	金門縣烏坵鄉
0836	馬祖	Matsu	連江縣
