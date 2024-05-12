-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 20, 2024 at 02:35 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_sepeda`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_akun`
--

CREATE TABLE `tbl_akun` (
  `id` int NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `foto` varchar(60) DEFAULT NULL,
  `level` enum('Administrator','Manager','Pelanggan') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `no_telp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_akun`
--

INSERT INTO `tbl_akun` (`id`, `nama`, `username`, `password`, `foto`, `level`, `alamat`, `no_telp`) VALUES
(8, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin-1709886462.png', 'Administrator', 'asdasd', '12312432'),
(9, 'Manager', 'manager', '1d0258c2440a8d19e716292b231e3190', 'manager-1709886585.jpg', 'Manager', 'manager', '31231'),
(10, 'User', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user-1709886677.jpeg', 'Pelanggan', 'User', '234234');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis`
--

CREATE TABLE `tbl_jenis` (
  `id` int NOT NULL,
  `jenis` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_jenis`
--

INSERT INTO `tbl_jenis` (`id`, `jenis`) VALUES
(5, 'Lipat'),
(6, 'Gunung'),
(7, 'BMX'),
(8, 'M2000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_bayar`
--

CREATE TABLE `tbl_jenis_bayar` (
  `id` int NOT NULL,
  `jenis_bayar` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penyewaan`
--

CREATE TABLE `tbl_penyewaan` (
  `id` int NOT NULL,
  `total_harga` int DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `lama_pinjam` int DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `id_pelanggan` int DEFAULT NULL,
  `id_sepeda` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_penyewaan`
--

INSERT INTO `tbl_penyewaan` (`id`, `total_harga`, `tgl_pinjam`, `lama_pinjam`, `tgl_kembali`, `id_pelanggan`, `id_sepeda`) VALUES
(41, 20000, '2024-03-08', 1, '2024-03-08', 10, 6),
(42, 10000, '2024-03-08', 1, '2024-03-08', 10, 4);

--
-- Triggers `tbl_penyewaan`
--
DELIMITER $$
CREATE TRIGGER `after_update_tbl_penyewaan` AFTER UPDATE ON `tbl_penyewaan` FOR EACH ROW BEGIN
    UPDATE tbl_sepeda
    SET status = 0
    WHERE tbl_sepeda.id = NEW.id_sepeda;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `penyewaan_trigger` AFTER INSERT ON `tbl_penyewaan` FOR EACH ROW BEGIN
    UPDATE tbl_sepeda SET tbl_sepeda.status = 1 WHERE tbl_sepeda.id = NEW.id_sepeda;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sepeda`
--

CREATE TABLE `tbl_sepeda` (
  `id` int NOT NULL,
  `harga` int NOT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `id_jenis` int DEFAULT NULL,
  `status` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_sepeda`
--

INSERT INTO `tbl_sepeda` (`id`, `harga`, `gambar`, `id_jenis`, `status`) VALUES
(4, 10000, '10000-1709886804.jpeg', 7, 0),
(5, 12000, '12000-1709886817.jpeg', 7, 0),
(6, 20000, '20000-1709886857.jpeg', 8, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jenis`
--
ALTER TABLE `tbl_jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jenis_bayar`
--
ALTER TABLE `tbl_jenis_bayar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_penyewaan`
--
ALTER TABLE `tbl_penyewaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_penyewaan_sepeda` (`id_sepeda`),
  ADD KEY `fk_penyewaan_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `tbl_sepeda`
--
ALTER TABLE `tbl_sepeda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sepeda_jenis` (`id_jenis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_jenis`
--
ALTER TABLE `tbl_jenis`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_jenis_bayar`
--
ALTER TABLE `tbl_jenis_bayar`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_penyewaan`
--
ALTER TABLE `tbl_penyewaan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_sepeda`
--
ALTER TABLE `tbl_sepeda`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
