-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2024 at 12:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ekstra`
--

-- --------------------------------------------------------

--
-- Table structure for table `aktivitas`
--

CREATE TABLE `aktivitas` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `teacher` varchar(50) NOT NULL,
  `schedule` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aktivitas`
--

INSERT INTO `aktivitas` (`id`, `name`, `description`, `image`, `teacher`, `schedule`) VALUES
(1, 'Rohis', 'Kegiatan keagamaan Islam yang membantu siswa memperdalam ilmu agama dan memperkuat ukhuwah Islamiyah.', 'img/Srohis.jpg', 'farel', 'Rabu\r\n\r\nPukul 15:30\r\n\r\nHalaman Masjid'),
(2, 'Band', 'badum tss', 'img/Sband.jpeg', 'Ahmad Riyanto, S.Pd', 'Rabu\r\n\r\nPukul 15:30\r\n\r\nRuang Band'),
(3, 'PBB', 'Pasukan Baris Berbaris', 'img/Spbb.jpg', '', ''),
(4, 'PMR', 'Palang Merah Remaja', 'img/Spmr.jpg', '', ''),
(5, 'Jurnalistik', 'Brief description of the activity.', 'img/Smakrejpg.jpg', '', ''),
(6, 'Basket', 'Brief description of the activity.', 'img/Sbasketjpg.jpg', '', ''),
(7, 'Voice', 'Brief description of the activity.', 'img/voicejpg.jpg', '', ''),
(8, 'KIR', 'Brief description of the activity.', 'img/kirjpg.jpg', '', ''),
(9, 'Pramuka', 'Brief description of the activity.', 'img/Spmr.jpg', '', ''),
(10, 'test', 'wasd', 'sd', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aktivitas`
--
ALTER TABLE `aktivitas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aktivitas`
--
ALTER TABLE `aktivitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
