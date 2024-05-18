-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2024 at 10:08 AM
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
-- Database: `toko_obat`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_distributor`
--

CREATE TABLE `t_distributor` (
  `id` int(11) NOT NULL,
  `kode` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_distributor`
--

INSERT INTO `t_distributor` (`id`, `kode`, `nama`, `alamat`, `email`, `telepon`, `pic`) VALUES
(7, 'D001', 'PT. Intralab Ekatama', 'Jakarta', 'intra@lab.com', '0123456', 'Agung'),
(8, 'D002', 'PT. GeneCraft Labs', 'Bandung', 'gene@craft.lab', '6543210', 'Deni');

-- --------------------------------------------------------

--
-- Table structure for table `t_obat`
--

CREATE TABLE `t_obat` (
  `id` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `id_distributor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_obat`
--

INSERT INTO `t_obat` (`id`, `kode`, `jenis`, `nama`, `harga`, `stok`, `id_distributor`) VALUES
(4, 'A001', 'Amoxilin', 'Generik', 7000, 6, 7),
(5, 'A002', 'As. Mafenamat', 'Generik', 9000, 50, 7),
(6, 'A003', 'Obat', 'Generik', 10000, 3, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_distributor`
--
ALTER TABLE `t_distributor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_obat`
--
ALTER TABLE `t_obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_distributor` (`id_distributor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_distributor`
--
ALTER TABLE `t_distributor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `t_obat`
--
ALTER TABLE `t_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_obat`
--
ALTER TABLE `t_obat`
  ADD CONSTRAINT `t_obat_ibfk_1` FOREIGN KEY (`id_distributor`) REFERENCES `t_distributor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
