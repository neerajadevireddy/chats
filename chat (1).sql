-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2021 at 02:04 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `messageid` int(11) NOT NULL,
  `receverId` int(11) NOT NULL,
  `senderId` int(11) NOT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`messageid`, `receverId`, `senderId`, `message`, `date`) VALUES
(1, 7, 8, 'asd', '2021-11-17 12:03:39'),
(2, 7, 8, 'as', '2021-11-17 12:12:48'),
(3, 7, 8, 'as', '2021-11-17 12:12:51'),
(4, 7, 8, 'hello how are you', '2021-11-17 12:13:12'),
(5, 9, 8, 'hi there', '2021-11-17 12:14:07'),
(6, 8, 10, 'hi yashhh', '2021-11-17 12:17:29'),
(7, 8, 10, 'how is going', '2021-11-17 12:17:35'),
(8, 10, 8, 'nothing much', '2021-11-17 12:18:06'),
(9, 10, 8, 'hi there', '2021-11-17 12:22:38'),
(10, 10, 8, 'em chesthunnav', '2021-11-17 12:24:34'),
(11, 8, 10, 'emledh ra ', '2021-11-17 12:24:41'),
(12, 8, 10, 'kaali', '2021-11-17 12:24:43'),
(13, 10, 8, 'sare yaadaina poi dhooku', '2021-11-17 12:24:56'),
(14, 8, 10, 'haa sare ra nuv kooda', '2021-11-17 12:25:05'),
(15, 10, 8, 'hey there', '2021-11-17 12:37:44'),
(16, 8, 10, 'heeee', '2021-11-17 12:41:21'),
(17, 10, 8, 'helloo', '2021-11-17 12:41:27'),
(18, 10, 8, 'asdasdasd', '2021-11-17 12:41:35'),
(19, 10, 8, 'asihd', '2021-11-17 12:42:04'),
(20, 10, 8, 'askhdas', '2021-11-17 12:42:05'),
(21, 10, 8, 'asdhasjdh', '2021-11-17 12:42:06'),
(22, 10, 8, 'asdjhasjdg', '2021-11-17 12:42:07'),
(23, 10, 8, 'asdagscdasgd', '2021-11-17 12:42:08'),
(24, 10, 8, 'asudgasgd', '2021-11-17 12:42:09'),
(25, 10, 8, 'asdgasdhgasd', '2021-11-17 12:42:10'),
(26, 8, 10, 'arey arey appara rey', '2021-11-17 12:42:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(14) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `phone`, `date`) VALUES
(7, 'neeraja', '$2y$10$Oc3yXerKMl6Z.1Lv8oxIBe8wxZZy.JqC/1TA4kce2VT6pzuPrS2o2', '7285999985', '2021-11-13 09:52:47'),
(8, 'yashh', '$2y$10$2lXJSoUpjwsS/DaDyD7Pbek7dJVlcOg1Q0zt0WPggUKdCteqINw/.', '9639639636', '2021-11-13 10:00:50'),
(9, 'huhuu', '$2y$10$7qoD81fREiPdmV79emPHCumMbligKlBvRtAKMXjET34ZOuCyWzbyq', '9393963696', '2021-11-13 10:02:23'),
(10, 'neeraj', '$2y$10$a/PVYS2NHk0AtrBX9L3OCuqojNCKvNUnYgw0UwIpPRRwk.kptmWyS', '789789789', '2021-11-17 12:17:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`messageid`),
  ADD KEY `FK_UserId` (`senderId`),
  ADD KEY `FK_RecevierId` (`receverId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `messageid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `FK_RecevierId` FOREIGN KEY (`receverId`) REFERENCES `users` (`userid`),
  ADD CONSTRAINT `FK_UserId` FOREIGN KEY (`senderId`) REFERENCES `users` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
