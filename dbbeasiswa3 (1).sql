-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2024 at 04:14 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbbeasiswa3`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `role` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`username`, `password`, `role`) VALUES
('admin', '12345', 'admin'),
('fatur', '12345', 'mahasiswa'),
('yusuf', '12345', 'mahasiswa'),
('rudi', '12345', 'mahasiswa'),
('admin', '12345', 'mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `beasiswa`
--

CREATE TABLE `beasiswa` (
  `Id_beasiswa` int(11) NOT NULL,
  `Id_Admin` int(11) NOT NULL,
  `Nama_beasiswa` varchar(100) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `Syarat` text DEFAULT NULL,
  `deskripsi` varchar(25) NOT NULL,
  `open_date` date NOT NULL,
  `close_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beasiswa`
--

INSERT INTO `beasiswa` (`Id_beasiswa`, `Id_Admin`, `Nama_beasiswa`, `thumbnail`, `Syarat`, `deskripsi`, `open_date`, `close_date`) VALUES
(14, 1, 'Beasiswa Pendidikan Pemimpin Indonesia', 'bea1.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas posuere.', 'Lorem ipsum dolor sit ame', '2024-07-01', '2024-07-09'),
(15, 1, 'Beasiswa Pendidikan Prestasi Kita', 'bea2.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas posuere.', 'Lorem ipsum dolor sit ame', '2024-06-01', '2024-07-05'),
(16, 1, 'Program Beasiswa Digitalskillsarea', 'bea3.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas posuere.', 'Lorem ipsum dolor sit ame', '2024-06-01', '2024-07-31');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `NIM` char(10) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Tanggal_Lahir` date NOT NULL,
  `Alamat` text DEFAULT NULL,
  `No_Telp` varchar(15) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Prodi` varchar(50) DEFAULT NULL,
  `Semester` int(11) DEFAULT NULL,
  `IPK` decimal(3,2) DEFAULT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`NIM`, `Nama`, `Tanggal_Lahir`, `Alamat`, `No_Telp`, `Email`, `Prodi`, `Semester`, `IPK`, `Username`, `Password`) VALUES
('1322055', 'Fatur Rahman zaky', '2004-09-18', 'bekasi', '081234567890', 'fatur@example.com', 'siio', 4, '3.57', 'fatur', '12345'),
('1322056', 'Rafi Muhammad Yusuf F.', '2024-07-03', 'Tokore Seller', '089646977644', 'yusuf@ex.co', 'SIIO', 4, '3.79', 'yusuf', '12345'),
('1322058', 'Adrian Maliqy', '2024-07-03', 'Tambun', '081234567890', 'rapi150604@gmail.com', 'SIIO', 4, '3.31', 'rudi', '12345'),
('1322059', 'Admin', '2024-07-03', 'Babelan', '081234567890', 'admin@gmail.com', 'SIIO', 4, '4.00', 'admin', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `No_pendaftaran` int(11) NOT NULL,
  `NIM` char(10) NOT NULL,
  `Tanggal_daftar` date NOT NULL,
  `Id_beasiswa` int(11) NOT NULL,
  `berkas` varchar(255) DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL,
  `status_penerimaan` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`No_pendaftaran`, `NIM`, `Tanggal_daftar`, `Id_beasiswa`, `berkas`, `status`, `status_penerimaan`) VALUES
(18, '1322055', '2024-07-08', 14, 'berkas.pdf', 'Ditolak', 'Ditolak'),
(19, '1322055', '2024-07-08', 15, 'berkas.pdf', 'Divalidasi', 'Diterima'),
(20, '1322056', '2024-07-08', 15, 'berkas.pdf', 'Divalidasi', 'Diterima'),
(21, '1322056', '2024-07-08', 16, 'berkas.pdf', 'Ditolak', 'Ditolak'),
(22, '1322056', '2024-07-09', 14, 'berkas.pdf', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beasiswa`
--
ALTER TABLE `beasiswa`
  ADD PRIMARY KEY (`Id_beasiswa`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`NIM`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`No_pendaftaran`),
  ADD KEY `NIM` (`NIM`),
  ADD KEY `Id_beasiswa` (`Id_beasiswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beasiswa`
--
ALTER TABLE `beasiswa`
  MODIFY `Id_beasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `No_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_ibfk_1` FOREIGN KEY (`NIM`) REFERENCES `mahasiswa` (`NIM`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pendaftaran_ibfk_2` FOREIGN KEY (`Id_beasiswa`) REFERENCES `beasiswa` (`Id_beasiswa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
