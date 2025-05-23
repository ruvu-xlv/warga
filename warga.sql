-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 18, 2025 at 03:51 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_warga`
--

-- --------------------------------------------------------

--
-- Table structure for table `kk`
--

CREATE TABLE `kk` (
  `nomor_kk` varchar(20) NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kk`
--

INSERT INTO `kk` (`nomor_kk`, `tanggal_masuk`) VALUES
('1234567890431564', '2025-05-16'),
('3829475679247893', '2025-05-16'),
('5278767890987654', '2025-05-16'),
('8375908563764875', '2025-05-16');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(20) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `role` enum('admin','warga') NOT NULL,
  `status` int(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nik`, `role`, `status`) VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', '76876987', 'admin', 1),
(2, 'cia44', 'eed8cdc400dfd4ec85dff70a170066b7', '1246738592547984', 'warga', 1),
(3, 'kelip jagg', '5f4dcc3b5aa765d61d8327deb882cf99', '9283728378274687', 'warga', 1),
(4, 'rossyf', '5f4dcc3b5aa765d61d8327deb882cf99', '1234567890123982', 'warga', 1),
(5, 'yougharac3', '5f4dcc3b5aa765d61d8327deb882cf99', '1246738592547986', 'warga', 1);

-- --------------------------------------------------------

--
-- Table structure for table `warga`
--

CREATE TABLE `warga` (
  `nik` varchar(20) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `tempat_lahir` varchar(225) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `pendidikan` varchar(20) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `status` varchar(20) NOT NULL,
  `nomor_kk` varchar(20) NOT NULL,
  `id_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warga`
--

INSERT INTO `warga` (`nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `pendidikan`, `agama`, `pekerjaan`, `alamat`, `status`, `nomor_kk`, `id_user`) VALUES
('1234567890123982', 'Rosy', 'gurun', '2006-03-06', 'P', 'mahasiswa', 'konghucu', 'Penjaga toko', 'mars barat, guangan timur , katagua, mars', 'menikah', '3829475679247893', ''),
('1246738592547984', 'Yougha Dian', 'Wahlayag huyu', '2003-12-28', 'L', 'sma/smk', 'islam', 'Programmer', 'mars barat, guangan timur , katagua, mars', 'menikah', '5278767890987654', '3'),
('1246738592547986', 'Yougha Rakhsa', 'Wahlayag huyu', '2003-12-28', 'L', 'sma/smk', 'islam', 'Programmer', 'mars barat, guangan timur , katagua, mars', 'menikah', '5278767890987654', '5'),
('9283728378274687', 'kelip', 'gurun sahara', '2023-01-02', 'P', 'sma/smk', 'hindu', 'Penjaga Kebun', 'mars barat, guangan timur , katagua, mars', 'menikah', '5278767890987654', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kk`
--
ALTER TABLE `kk`
  ADD PRIMARY KEY (`nomor_kk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `warga`
--
ALTER TABLE `warga`
  ADD PRIMARY KEY (`nik`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD KEY `nomor_kk` (`nomor_kk`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
