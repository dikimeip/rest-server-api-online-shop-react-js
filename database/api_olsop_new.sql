-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2019 at 03:53 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `api_olsop_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username_admin` varchar(50) NOT NULL,
  `email_admin` varchar(20) NOT NULL,
  `password_admin` varchar(30) NOT NULL,
  `foto_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username_admin`, `email_admin`, `password_admin`, `foto_admin`) VALUES
(1, 'one_admin', 'one', 'one@cell.com', 'one', 'admin.png'),
(7, 'ubah', 'aku', 'aku', 'ok', '');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_user` int(5) NOT NULL,
  `id_produk` int(5) NOT NULL,
  `count_produk` int(10) NOT NULL,
  `desk_pemesanan` varchar(50) NOT NULL,
  `namaproduk` varchar(50) NOT NULL,
  `hargaproduk` varchar(20) NOT NULL,
  `namauser` varchar(50) NOT NULL,
  `jumlahp` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pemesanan`, `id_user`, `id_produk`, `count_produk`, `desk_pemesanan`, `namaproduk`, `hargaproduk`, `namauser`, `jumlahp`) VALUES
(12, 27, 4, 1, 'PROSES PEMBAYARAN', 'updating', '123122', 'test', 1),
(13, 27, 4, 1, 'SUDAH DIBAYAR', 'updating', '123122', 'test', 1),
(14, 28, 2, 1, 'Belum Melakukan pembayaran', 'sabun', '888', 'test', 1),
(15, 4, 4, 1, 'Belum Melakukan pembayaran', 'updating', '123122', 'user', 1);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `kategori_produk` varchar(20) NOT NULL,
  `harga_produk` int(10) NOT NULL,
  `desk_produk` mediumtext NOT NULL,
  `foto_produk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `kategori_produk`, `harga_produk`, `desk_produk`, `foto_produk`) VALUES
(2, 'sabun', 'odol', 888, 'test', '6090484789343891_1.jpg'),
(4, 'updating', 'updating', 123122, 'pdateu@gmail.com', '9197907543445676_2.jpg'),
(5, 'test', 'test', 123, 'test', 'Disester.png'),
(6, 'test', 'test', 124, 'test', 'Disester.png'),
(7, 'test', 'tet', 87, 'test', 'Disester.png'),
(8, 'test', 'tee', 333, 'tes', 'Disester.png'),
(9, 'et', 'tee', 43, 'tet', 'Disester.png'),
(10, 'gegeg', 'gege', 33, 'GGD', 'Disester.png'),
(11, 'HUH', 'HH', 212, 'HH', 'Disester.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `alamat_user` varchar(100) NOT NULL,
  `no_hp_user` varchar(15) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `password_user` varchar(20) NOT NULL,
  `photo_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `alamat_user`, `no_hp_user`, `email_user`, `password_user`, `photo_user`) VALUES
(4, 'user', 'user', '0123', 'user', 'user', 'user.png'),
(28, 'test', 'test', '11', 'test', 'test', '1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
