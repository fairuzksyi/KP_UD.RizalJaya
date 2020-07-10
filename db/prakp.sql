-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2020 at 09:59 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prakp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'septian', 'septian123', 'septian'),
(2, 'admin', 'admin', 'Admin Rizal Jaya');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `banner_id` int(11) NOT NULL,
  `banner_title` varchar(200) NOT NULL,
  `banner_image` varchar(200) NOT NULL,
  `banner_deskripsi` text NOT NULL,
  `banner_link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`banner_id`, `banner_title`, `banner_image`, `banner_deskripsi`, `banner_link`) VALUES
(10, 'Rizal Jaya 1', 'rizaljaya1.jpg', 'Banner 1', '#'),
(11, 'Rizal Jaya 2', 'rizaljaya2.jpg', 'Banner 2', '#'),
(12, 'Rizal Jaya 3', 'rizaljaya3.jpg', 'Banner 3', '#');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(50) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telp_pelanggan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telp_pelanggan`) VALUES
(1, 'testpelanggan1@gmail.com', 'testpelanggan1', 'Pelanggan 1', '08123456789'),
(2, 'testpelanggan5@gmail.com', 'testpelanggan', 'test pelanggan 5', '082225522131'),
(5, 'pelanggan@gmail.com', 'pelanggan123', 'Pelanggan', '082225522131'),
(6, 'septianmuhammadadi@gmail.com', 'septian', 'Septian', '082225522131'),
(7, 'fairuzksyi', 'fairuzksyi', 'fay', '098868757654'),
(10, 'testpelanggan5@gmail.com', 'testpelanggan', 'test pelanggan 5', '082225522131'),
(11, 'fairuzksyi@gmail.com', 'lestari123', 'Rico bintang', '089453753'),
(12, 'fairuzksyi4@gmail.com', 'meirisa123', '', '0248451756'),
(13, 'fairuzksyi4@gmail.com', 'meirisa123', '', '0248451756'),
(14, 'fairuzksyi4@gmail.com', 'meirisa123', '', '0248451756'),
(15, 'fairuzksyi1@gmail.com', 'meirisa123', '', '0248451756'),
(16, 'fairuzksyi1@gmail.com', 'fairuz123', 'elkaf', '0248451756'),
(18, 'fairuzksyi@gmail.com', 'meirisa', 'Rico bintang', ''),
(19, '', '', '', ''),
(20, '', '', '', ''),
(21, 'fairuzksyi4@gmail.com', '1234', 'sultan', '0248451756'),
(22, 'diah@gmail.com', '123', 'diah', '089332323424'),
(23, 'diahayu@gmail.com', 'cobacoba', 'diahpitaloka', '023764731');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `alamat_pembelian` text NOT NULL,
  `status_pembelian` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `tanggal_pembelian`, `total_pembelian`, `alamat_pembelian`, `status_pembelian`) VALUES
(68, 1, '2020-02-23', 64000, 'Jalan Wiroto IV No 13b', '1'),
(69, 1, '2020-02-23', 1000, 'Jalan Wiroto IV No 13b', '2'),
(70, 1, '2020-06-23', 1000, 'jl.lempngsari', 'Menunggu Pembayaran'),
(71, 1, '2020-06-23', 0, 'jl.lempngsari', 'Menunggu Pembayaran'),
(72, 1, '2020-06-23', 8500000, 'pedurungan', 'Menunggu Pembayaran'),
(73, 1, '2020-06-24', 3500, 'pedurungan', 'Menunggu Pembayaran'),
(74, 1, '2020-06-24', 3800, 'jl.lempongsari timur III No.16 Rt.03/Rw.06 Semarang', 'Menunggu Pembayaran'),
(75, 11, '2020-07-04', 500000, 'jl.lempongsari timur III No.16 Rt.03/Rw.06 Semarang', 'Menunggu Pembayaran'),
(76, 15, '2020-07-04', 3800, 'pedurungan', 'Menunggu Pembayaran'),
(77, 21, '2020-07-10', 500000, 'jl.lempngsari 3', 'Menunggu Pembayaran'),
(78, 22, '2020-07-10', 7600, 'pedurungan', 'Menunggu Pembayaran');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `subharga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `nama`, `harga`, `berat`, `subharga`, `jumlah`) VALUES
(57, 0, 12, 'Kardus 4', 50000, 10000, 50000, 1),
(58, 0, 12, 'Kardus 4', 50000, 10000, 100000, 2),
(80, 59, 12, 'Kardus 4', 50000, 10000, 100000, 2),
(81, 59, 11, 'Kardus 3', 10000, 1000, 20000, 2),
(82, 60, 12, 'Kardus 4', 50000, 10000, 100000, 2),
(83, 60, 11, 'Kardus 3', 10000, 1000, 20000, 2),
(84, 61, 7, 'Kardus 1', 1000, 1000, 2000, 2),
(85, 61, 10, 'Produk 2', 1000, 10000, 3000, 3),
(86, 61, 11, 'Kardus 3', 10000, 1000, 20000, 2),
(87, 61, 12, 'Kardus 4', 50000, 10000, 200000, 4),
(88, 62, 7, 'Kardus 1', 1000, 1, 3000, 3),
(89, 62, 10, 'Produk 2', 1000, 2, 2000, 2),
(90, 62, 11, 'Kardus 3', 10000, 5, 30000, 3),
(91, 62, 12, 'Kardus 4', 50000, 10, 100000, 2),
(92, 63, 10, 'Produk 2', 1000, 2, 1000, 1),
(93, 64, 7, 'Kardus 1', 1000, 1, 3000, 3),
(94, 64, 10, 'Produk 2', 1000, 2, 2000, 2),
(95, 64, 11, 'Kardus 3', 10000, 5, 30000, 3),
(96, 64, 12, 'Kardus 4', 50000, 10, 100000, 2),
(97, 65, 7, 'Kardus 1', 1000, 1, 2000, 2),
(98, 65, 10, 'Produk 2', 1000, 2, 3000, 3),
(99, 65, 11, 'Kardus 3', 10000, 5, 30000, 3),
(100, 65, 12, 'Kardus 4', 50000, 10, 150000, 3),
(101, 66, 7, 'Kardus 1', 1000, 1, 2000, 2),
(102, 67, 7, 'Kardus 1', 1000, 1, 2000, 2),
(103, 68, 7, 'Kardus 1', 1000, 1, 3000, 3),
(104, 68, 10, 'Produk 2', 1000, 2, 1000, 1),
(105, 68, 11, 'Kardus 3', 10000, 5, 10000, 1),
(106, 68, 12, 'Kardus 4', 50000, 10, 50000, 1),
(107, 69, 10, 'Produk 2', 1000, 2, 1000, 1),
(108, 70, 10, 'Produk 2', 1000, 2, 1000, 1),
(109, 72, 10, 'Box Press Kardus', 500000, 500, 8500000, 17),
(110, 73, 7, 'kardus satuan', 3500, 1, 3500, 1),
(111, 74, 7, 'Kardus Satuan Berukuran Besar', 3800, 350, 3800, 1),
(112, 75, 10, 'Box Press Kardus', 500000, 500, 500000, 1),
(113, 76, 7, 'Kardus Satuan Berukuran Besar', 3800, 350, 3800, 1),
(114, 77, 10, 'Box Press Kardus', 500000, 500, 500000, 1),
(115, 78, 7, 'Kardus Satuan Berukuran Besar', 3800, 350, 7600, 2);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`) VALUES
(7, 'Kardus Satuan Berukuran Besar', 3800, 350, 'IMG_3349.jpg', 'Kardus satuan berukuran besar bisa untuk mengemas barang dan tanpa logo/polos'),
(10, 'Box Press Kardus', 500000, 500, 'IMG_3346.jpg', 'kardus box pres untuk pabrik daur ulang'),
(11, 'Box Press Kertas Marga', 350000, 500, 'IMG_33582.jpg', 'Box press kertas marga untuk pabrik daur ulang'),
(12, 'Box Kardus Satuan Ukuran Sedang', 3300, 250, 'IMG_3358.jpg', 'Kardus satuan berukuran sedang untuk mengemas barang dan tanpa logo/polos');

-- --------------------------------------------------------

--
-- Table structure for table `request_pelanggan`
--

CREATE TABLE `request_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(50) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telp_pelanggan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request_pelanggan`
--

INSERT INTO `request_pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telp_pelanggan`) VALUES
(4, 'testpelanggan7@gmail.com', 'testpelanggan', 'Pelanggan 7', '082225522131');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `request_pelanggan`
--
ALTER TABLE `request_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `request_pelanggan`
--
ALTER TABLE `request_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
