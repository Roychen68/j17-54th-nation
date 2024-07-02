-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024 年 07 月 02 日 07:20
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `web03`
--

-- --------------------------------------------------------

--
-- 資料表結構 `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- 資料表結構 `bus`
--

CREATE TABLE `bus` (
  `id` int(11) NOT NULL,
  `plate` text NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `bus`
--

INSERT INTO `bus` (`id`, `plate`, `time`) VALUES
(5, 'AUTO1234', 15),
(6, 'AUTO2345', 20);

-- --------------------------------------------------------

--
-- 資料表結構 `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `mail` text NOT NULL,
  `bus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `mail`, `bus`) VALUES
(7, 'Roy', '234@gmail.com', 'AUTO-9945'),
(8, 'Rion', '1207@gmail.com', 'AUTO-9945'),
(9, 'Roy', '234@mail.com', 'AUTO-9945'),
(10, 'Rion', '1207@gmail.com', 'AUTO-9945'),
(11, 'Roy', '234@mail.com', 'AUTO-9945'),
(12, 'Rion', '1207@gmail.com', 'AUTO-9945'),
(13, 'Roy', '234@mail.com', 'AUTO-1843'),
(14, 'Rion', '1207@gmail.com', 'AUTO-1843'),
(15, 'Roy', '234@mail.com', 'AUTO-1843'),
(16, 'Rion', '1207@gmail.com', 'AUTO-1843'),
(17, 'Roy', '234@mail.com', 'AUTO-1843'),
(18, 'Rion', '1207@gmail.com', 'AUTO-1843'),
(19, 'Roy', '234@mail.com', 'AUTO-3401'),
(20, 'Rion', '1207@gmail.com', 'AUTO-3401'),
(21, 'Roy', '234@mail.com', 'AUTO-3401'),
(22, 'Rion', '1207@gmail.com', 'AUTO-3401');

-- --------------------------------------------------------

--
-- 資料表結構 `form`
--

CREATE TABLE `form` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `mail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `form`
--

INSERT INTO `form` (`id`, `name`, `mail`) VALUES
(3, 'Roy', '234@mail.com'),
(4, 'Rion', '1207@gmail.com'),
(5, 'Roy', '234@mail.com'),
(6, 'Rion', '1207@gmail.com');

-- --------------------------------------------------------

--
-- 資料表結構 `station`
--

CREATE TABLE `station` (
  `id` int(11) NOT NULL,
  `station` text NOT NULL,
  `stop` int(11) NOT NULL,
  `drive` int(11) NOT NULL,
  `rank` int(11) NOT NULL,
  `closest` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `station`
--

INSERT INTO `station` (`id`, `station`, `stop`, `drive`, `rank`, `closest`) VALUES
(17, '台北車站', 5, 6, 1, ''),
(18, '臺大醫院', 4, 3, 2, ''),
(19, '中正紀念堂', 4, 3, 3, ''),
(20, '大安', 3, 5, 4, ''),
(21, '大安森林公園', 3, 5, 5, ''),
(22, '東門', 3, 6, 6, ''),
(23, '信義安和', 6, 8, 7, ''),
(24, '台北101', 7, 8, 8, ''),
(33, '南港展覽館', 1, 3, 9, '');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `bus`
--
ALTER TABLE `bus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `station`
--
ALTER TABLE `station`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
