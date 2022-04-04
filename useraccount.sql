-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2022 at 02:51 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `useraccount`
--

-- --------------------------------------------------------

--
-- Table structure for table `msuser`
--

CREATE TABLE `msuser` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_tengah` varchar(50) NOT NULL,
  `nama_belakang` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `NIK` char(16) NOT NULL,
  `NoHp` varchar(15) NOT NULL,
  `Alamat` varchar(256) NOT NULL,
  `KodePos` char(5) NOT NULL,
  `warga_negara` varchar(50) NOT NULL,
  `foto_profil` varchar(256) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `msuser`
--

INSERT INTO `msuser` (`username`, `password`, `nama_depan`, `nama_tengah`, `nama_belakang`, `tempat_lahir`, `tanggal_lahir`, `NIK`, `NoHp`, `Alamat`, `KodePos`, `warga_negara`, `foto_profil`, `email`) VALUES
('bryanvalerian', 'asdasdasd', 'Bryan', 'Wat', 'Valerian', 'Tanjungpinang', '2002-05-07', '1234567890123456', '081234567890', 'Jl. ASDASD No.123456', '29112', 'Indonesia', '2021-sunkissed-ayaka-genshin-impact-game-video-anime-wallpaper-3000x2000_42.jpg', 'bryan.12345@gmail.com'),
('bryanvalerians', 'bryan123', 'Apa', 'Apa', 'Apa', 'asdasdasd', '2022-04-03', '1234567890123457', '082286122735', 'Jl. Potong Lembu No.61\r\nnone', '29112', 'Indonesia', '296133.jpg', 'bryan.valerian@binus.ac.id'),
('retardplayer03', 'retardplayer03', 'saya', 'Gatau', 'apapa', 'asdasdasd', '2022-04-12', '1234567890123459', '082286122735', 'Jl. gatau no gatau', '29112', 'Indonesia', 'thumb-350-787195.png', 'ebanproplayer@yahoo.com'),
('valerian', 'valerian123', 'a', 'Gatau', 'makan', 'asdasdasd', '2022-04-05', '1234567890123450', '082286122735', 'Jl. Potong Lembu No.61\r\nnone', '29112', 'Indonesia', '094731700_1596206149-Ilustrasi_ayam_2.png', 'aasd@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `msuser`
--
ALTER TABLE `msuser`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `NIK` (`NIK`),
  ADD UNIQUE KEY `email` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
