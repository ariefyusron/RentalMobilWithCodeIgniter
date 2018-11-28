-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 28, 2018 at 10:20 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `uname` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`uname`, `pass`, `foto`) VALUES
('admin', '$2y$10$CQvMpEl5d7BICVvnTVwRbeE4UJHppZMdtItMPGx5Ku.xDaIhcKaeC', 'avatar5.png'),
('user', '$2y$10$.9jMuU4LvPaBUXAflD2zDu95uqkDC4c1R4aYzGXeMrAXj6VUXw2Qq', 'avatar5.png');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama`, `merk`, `harga`, `jumlah`, `waktu`) VALUES
(21, 'Avanza', 'Honda', 120000, 3, '2018-11-22 02:54:56'),
(23, 'Mobilio', 'Honda', 140000, 2, '2018-11-22 02:55:21');

-- --------------------------------------------------------

--
-- Table structure for table `barang_laku`
--

CREATE TABLE `barang_laku` (
  `id` int(11) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_hp` varchar(25) NOT NULL,
  `mobil` int(11) NOT NULL,
  `lama_pinjam` int(11) NOT NULL,
  `waktu_pinjam` datetime NOT NULL,
  `waktu_pemesanan` datetime NOT NULL,
  `status` enum('Memesan','Pinjam','Selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_laku`
--

INSERT INTO `barang_laku` (`id`, `nik`, `nama`, `no_hp`, `mobil`, `lama_pinjam`, `waktu_pinjam`, `waktu_pemesanan`, `status`) VALUES
(3, '1201211', 'Arief Yusron', '082312319879', 21, 2, '2016-11-29 23:58:00', '2018-11-22 03:40:39', 'Selesai'),
(4, '68768678`jgjhg`', 'jkkj', 'kjggkg', 21, 9, '2018-11-29 00:59:00', '2018-11-29 03:57:04', 'Selesai'),
(5, '9878978', 'hjh', '89789', 21, 9, '2018-11-28 22:58:00', '2018-11-29 03:58:38', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keperluan` text NOT NULL,
  `nama` text NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `tanggal`, `keperluan`, `nama`, `jumlah`) VALUES
(1, '2015-02-06', 'de', 'diki', 1234);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`uname`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang_laku`
--
ALTER TABLE `barang_laku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `barang_laku`
--
ALTER TABLE `barang_laku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
