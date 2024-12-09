-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2024 at 02:54 AM
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
(1, 'Rohis', 'Rohis (Rohani Islam) adalah kegiatan keagamaan di sekolah yang bertujuan memperdalam pemahaman tentang Islam, memperkuat iman, dan membentuk akhlak mulia siswa.', 'img/Srohis.jpg', 'Mohamad Safrudin', 'Rabu, 15:30, Halaman Masjid'),
(2, 'Band', 'Band adalah kelompok musisi yang berkolaborasi untuk menciptakan dan menampilkan musik secara harmonis.', 'img/Sband.jpeg', 'Ahmad Riyanto', 'Rabu, 15:30, Ruang Band'),
(3, 'PBB', 'Peraturan Baris-Berbaris (PBB) adalah kegiatan yang melatih kedisiplinan, kekompakan, dan keterampilan baris-berbaris melalui gerakan yang terstruktur dan terorganisir.', 'img/Spbb.jpg', 'Cahyono', 'Sabtu, 08.00, Lapangan Basket'),
(4, 'PMR', 'Palang Merah Remaja (PMR) adalah organisasi di sekolah yang bertujuan melatih keterampilan pertolongan pertama, kesehatan, dan kepedulian sosial siswa.', 'img/Spmr.jpg', 'Nathalia Andi', 'Rabu, 15.30, UKS'),
(5, 'Jurnalistik', 'Jurnalistik adalah kegiatan mengolah, menulis, dan menyampaikan informasi melalui berbagai media, melatih keterampilan komunikasi, observasi, dan berpikir kritis.', 'img/Smakrejpg.jpg', 'Shinta Herwidyaningtyas', 'Sabtu, 09.00, Kampus SMK 1'),
(6, 'Basket', 'Basket adalah olahraga tim yang dimainkan dengan tujuan memasukkan bola ke dalam ring lawan untuk mencetak poin, mengandalkan keterampilan, kecepatan, dan strategi.', 'img/Sbasketjpg.jpg', 'Bejo Wibowo', 'Sabtu, 13.00, Lapangan Basket'),
(7, 'Voice', 'Paduan suara adalah kegiatan seni vokal yang melatih kemampuan bernyanyi secara harmonis dalam kelompok, mengutamakan kekompakan, teknik vokal, dan interpretasi lagu.', 'img/voicejpg.jpg', 'Dinta Chandra', 'Selasa, 15.20, Kampus SMK 1'),
(9, 'KIR', 'Karya Ilmiah Remaja (KIR) adalah kegiatan yang mengembangkan kreativitas dan kemampuan penelitian siswa melalui pembuatan karya ilmiah berbasis metode ilmiah.', 'img/kirjpg.jpg', 'Aries Suyanto', 'Selasa, 15.30, Kampus SMK 1');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
