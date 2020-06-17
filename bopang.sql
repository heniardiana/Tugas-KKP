-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2020 at 07:25 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bopang`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'Heni', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `chekout`
--

CREATE TABLE `chekout` (
  `id_chekout` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nomor_tlp` varchar(20) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `status_terima` enum('belum di terima','sudah diterima') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chekout`
--

INSERT INTO `chekout` (`id_chekout`, `id_pembeli`, `nama`, `alamat`, `nomor_tlp`, `tanggal`, `status_terima`) VALUES
(21, 38, 'Kilua Zoldick', 'Jalan Hunter', '0831231231', '15 January 2020', 'belum di terima'),
(22, 39, 'Monkey D. Luffy', 'Jalan One piece', '0853332345', '15 Januari 2020', 'sudah diterima'),
(23, 41, 'Kimberly Hidden', 'Jalan isekai', '0812993921', '11 Januari 2020', 'sudah diterima'),
(24, 43, 'qwe', 'qwe', '123123', '15 January 2020', 'sudah diterima');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_pembeli` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_pembeli`, `nama`, `username`, `password`) VALUES
(38, 'Kilua Zoldick', 'test1', 'test1'),
(39, 'Monkey D. Luffy', 'test2', 'test2'),
(41, 'Kimberly Hidden', 'test4', 'test4'),
(43, 'qwe', 'qwe', 'qwe'),
(44, 'test', 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_ketegori` int(11) NOT NULL,
  `kategori` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_ketegori`, `kategori`) VALUES
(15, 'Keripik ');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `total_harga` varchar(50) NOT NULL,
  `total_bayar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_pembeli`, `id_produk`, `qty`, `harga`, `total_harga`, `total_bayar`) VALUES
(80, 42, 30, '4', '10000', '40000', ''),
(81, 38, 29, '10', '10000', '100000', ''),
(82, 39, 28, '3', '10000', '30000', '30000'),
(83, 41, 29, '10', '10000', '100000', '50000'),
(90, 43, 32, '5', '10000', '50000', ''),
(91, 43, 31, '2', '10000', '20000', '');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_ketegori` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `tgl_produksi` varchar(30) NOT NULL,
  `tgl_kadaluarsa` varchar(30) NOT NULL,
  `rasa` varchar(15) NOT NULL,
  `harga` varchar(10) NOT NULL,
  `stok` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_ketegori`, `gambar`, `tgl_produksi`, `tgl_kadaluarsa`, `rasa`, `harga`, `stok`) VALUES
(28, 15, '20200113080504.jpg', '16 Desember 2019', '19 Desember 2020', 'Keju', '10000', '19'),
(29, 15, '20200113080518.jpg', '18 September 2019', '20 Desember 2020', 'Original', '10000', '55'),
(30, 15, '20200113080530.jpg', '13 Desember 2019', '09 Desember 2020', 'Balado', '10000', '66'),
(31, 15, '20200113080605.jpg', '13 Januari 2020', '18 Februari 2020', 'Pedas', '10000', '46'),
(32, 15, '20200115054402.jpg', '15 Januari 2020', '13 Februari 2020', 'Keju Asin', '10000', '95'),
(33, 15, '20200115054536.jpg', '15 Januari 2020', '19 Februari 2020', 'Jagung Bakar', '10000', '50'),
(34, 15, '20200115054558.jpg', '15 Januari 2020', '18 Februari 2020', 'BBQ', '10000', '90');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `chekout`
--
ALTER TABLE `chekout`
  ADD PRIMARY KEY (`id_chekout`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_ketegori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chekout`
--
ALTER TABLE `chekout`
  MODIFY `id_chekout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_pembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_ketegori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
