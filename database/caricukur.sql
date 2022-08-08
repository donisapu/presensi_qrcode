-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 06, 2021 at 09:52 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caricukur`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `jam_buka`
--

CREATE TABLE `jam_buka` (
  `id_jam_buka` int(11) NOT NULL,
  `id_store` int(11) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam_buka` time(6) NOT NULL,
  `jam_tutup` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `status_pengguna` enum('aktif','block') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama`, `email`, `password`, `status_pengguna`) VALUES
(1, 'Hirosima', 'hiro@gmail.com', 'hiro', 'block'),
(2, 'Hayang', 'hayang@gmail.com', 'hayang123', 'aktif'),
(3, 'imanudin', 'iman@gmail.com', '5', 'aktif'),
(4, 'amin', 'amin@gmail.com', 'amin', 'aktif'),
(5, 'Doni ganteng', 'sdonisaputra36@gmail.com', '12345', 'aktif'),
(6, 'Imanudin s', 'udin@gmail.com', '1', 'aktif'),
(7, 'imanudin', 'imanud@gmail.com', '5', 'block'),
(8, 'Ram pappa', 'r@gmail.com', '1', 'aktif'),
(9, 'saefur', 'rochmansaef@yahoo.com', '1234567', 'block'),
(10, 'Uli', 'uli@gmail.com', 'uli', 'aktif'),
(12, 'imanudin', 'imanudin@gmail.com', '5', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tempat_cukur`
--

CREATE TABLE `tempat_cukur` (
  `id_tempat_cukur` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `latitude` varchar(25) NOT NULL,
  `longitude` varchar(25) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tempat_cukur`
--

INSERT INTO `tempat_cukur` (`id_tempat_cukur`, `nama`, `alamat`, `kontak`, `gambar`, `latitude`, `longitude`, `deskripsi`) VALUES
(1, 'budia', 'tanah abanga', '0843349a', 'barber-s-pole-barbershop-wall_136930-2094.jpg', '-7.482876198740194', '109.24757584650898', 'oke banget broa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `jam_buka`
--
ALTER TABLE `jam_buka`
  ADD PRIMARY KEY (`id_jam_buka`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tempat_cukur`
--
ALTER TABLE `tempat_cukur`
  ADD PRIMARY KEY (`id_tempat_cukur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jam_buka`
--
ALTER TABLE `jam_buka`
  MODIFY `id_jam_buka` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tempat_cukur`
--
ALTER TABLE `tempat_cukur`
  MODIFY `id_tempat_cukur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
