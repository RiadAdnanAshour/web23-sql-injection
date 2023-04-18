-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18 أبريل 2023 الساعة 23:28
-- إصدار الخادم: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web2`
--

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Gender` int(1) NOT NULL,
  `Img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `Name`, `Email`, `Password`, `Gender`, `Img`) VALUES
(9, 'riad', 'riadashour153@gmail.com', '$2y$10$rPlXD4y42N9e7RzVuUnc9.Dr4E9y9TbqhcTW/Y2qtiE', 0, 'جدول نصفي .png'),
(10, 'asd', 'riadashour153@gmail.com', '$2y$10$4xRFDhl2EMXUmk2REShdD.Irl9e/RRHtVZqz9L7qkTk', 0, 'جدول نصفي .png'),
(11, 'riad', 'riadashour153@gmail.com', '$2y$10$Tpd32v26bq2Is3tTjXSoLu/2xA1k.wwz2Nl20azKk1M', 0, 'b.png'),
(12, 'riad', 'riadashour153@gmail.com', '$2y$10$Tpd32v26bq2Is3tTjXSoLu/2xA1k.wwz2Nl20azKk1M', 0, 'b.png'),
(13, 'riad', 'riadashour153@gmail.com', '$2y$10$EzpzQMFnWUdpGvn73ck9HuTqYwq94P0cMgqz1LkcCRg', 0, 'WhatsApp Image 2020-09-28 at 9.55.29 AM.jpeg'),
(14, 'riad', 'riadashour153@gmail.com', '$2y$10$EzpzQMFnWUdpGvn73ck9HuTqYwq94P0cMgqz1LkcCRg', 0, 'WhatsApp Image 2020-09-28 at 9.55.29 AM.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
