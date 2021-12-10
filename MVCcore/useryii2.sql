-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2021 at 09:05 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yii2training_ha`
--

-- --------------------------------------------------------

--
-- Table structure for table `useryii2`
--

CREATE TABLE `useryii2` (
  `user_id` int(255) NOT NULL,
  `user_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `user_gender` int(1) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_tel` varchar(11) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `stop_using` int(1) NOT NULL,
  `created_at` varchar(20) NOT NULL,
  `updated_at` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `useryii2`
--

INSERT INTO `useryii2` (`user_id`, `user_name`, `user_gender`, `user_email`, `user_tel`, `user_password`, `stop_using`, `created_at`, `updated_at`) VALUES
(1, 'Phí Trung Hiếu', 0, 'khongbiet_hieu@gmaila.com', '98123456', '123', 0, '0000-00-00', '0000-00-00'),
(13, 'haibabon', 0, 'nguyensiu.77@gmail.com', '01234567788', 'setStopUsing123@#', 0, '0000-00-00', '0000-00-00'),
(15, 'haibabon', 1, 'haibanam@gmail.com', '01234567788', 'Hai123@@', 0, '0000-00-00', '05/12/2021 07:40'),
(20, 'hai', 0, 'sauthanh106@gmail.com', '01234567788', '0', 0, '05/12/2021 00:22', '05/12/2021 07:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `useryii2`
--
ALTER TABLE `useryii2`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `useryii2`
--
ALTER TABLE `useryii2`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
