-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 24, 2024 at 07:17 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sil`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `id` int(11) NOT NULL,
  `no_rekam_medis` varchar(255) DEFAULT NULL,
  `nik` varchar(18) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customers`
--

INSERT INTO `tbl_customers` (`id`, `no_rekam_medis`, `nik`, `nama`, `email`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `no_hp`) VALUES
(1, '0001/SIL/RM/03/2024', '3209021706010002', 'Mohammad Irwansyah Somantri', 'mirwansyah1933@gmail.com', 'Jl. RA Kartini, RT 04, RW 01, Blok Pon No. 45', 'Cirebon', '2023-11-30', 'Laki-laki', '0838252879888'),
(3, '0002/SIL/RM/03/2024', '3209021706010003', 'admins', 'mirwansyahs989@gmail.com', 'Jl. RA Kartini, RT 04, RW 01, Blok Pon No. 45', 'Cirebon', '2024-11-28', 'Laki-laki', '083825287989'),
(9, '0003/SIL/RM/03/2024', '3209021706010001', 'Mohammad Teguh Adriansyah', 'mta99910@gmail.com', 'Ciledug', 'Cirebon', '2023-12-27', 'Laki-laki', '0811231231231');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hasil_pemeriksaan`
--

CREATE TABLE `tbl_hasil_pemeriksaan` (
  `hasil_id` int(11) NOT NULL,
  `kode_registrasi` varchar(255) DEFAULT NULL,
  `parameter` varchar(255) DEFAULT NULL,
  `hasil` double NOT NULL DEFAULT 0,
  `tgl_pengujian` datetime DEFAULT NULL,
  `tgl_selesai` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_hasil_pemeriksaan`
--

INSERT INTO `tbl_hasil_pemeriksaan` (`hasil_id`, `kode_registrasi`, `parameter`, `hasil`, `tgl_pengujian`, `tgl_selesai`) VALUES
(8, '0001/REG/SIL/03/2024', 'Kolesterol', 90, '2024-03-11 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_pemeriksaan`
--

CREATE TABLE `tbl_jenis_pemeriksaan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jenis_pemeriksaan`
--

INSERT INTO `tbl_jenis_pemeriksaan` (`id`, `nama`) VALUES
(1, 'Hitung Darah Lengkap'),
(2, 'Prothrombin Tim'),
(3, 'Tes Darah Panel Metabolik Dasar ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_parameter`
--

CREATE TABLE `tbl_parameter` (
  `id` int(11) NOT NULL,
  `jenis_pemeriksaan` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_parameter`
--

INSERT INTO `tbl_parameter` (`id`, `jenis_pemeriksaan`, `nama`) VALUES
(1, 'Hitung Darah Lengkap', 'Kolesterol');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemeriksaan`
--

CREATE TABLE `tbl_pemeriksaan` (
  `id` int(11) NOT NULL,
  `no_rekam_medis` varchar(255) NOT NULL,
  `kode_registrasi` varchar(255) NOT NULL,
  `jenis_pemeriksaan` varchar(255) NOT NULL,
  `catatan` text NOT NULL,
  `isCito` int(11) NOT NULL DEFAULT 0,
  `status` varchar(255) NOT NULL DEFAULT 'AKTIF',
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pemeriksaan`
--

INSERT INTO `tbl_pemeriksaan` (`id`, `no_rekam_medis`, `kode_registrasi`, `jenis_pemeriksaan`, `catatan`, `isCito`, `status`, `tanggal`) VALUES
(3, '0001/SIL/RM/03/2024', '0001/REG/SIL/03/2024', 'Hitung Darah Lengkap', '', 1, 'VALID', '2024-03-23 10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `status_id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `seq` int(11) NOT NULL DEFAULT 1,
  `status_nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`status_id`, `code`, `seq`, `status_nama`) VALUES
(1, 'AKTIF', 1, 'Sedang dalam antrian'),
(2, 'VERIF', 2, 'Belum divalidasi'),
(3, 'SELESAI', 4, 'Pemeriksaan sudah selesai'),
(4, 'VALID', 3, 'Sudah tervalidasi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(180) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `no_hp` varchar(16) DEFAULT NULL,
  `username` varchar(180) NOT NULL,
  `password` varchar(180) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama`, `photo`, `no_hp`, `username`, `password`, `role`) VALUES
(6, 'admin', NULL, NULL, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
(9, 'ATLM', NULL, NULL, 'atlm', 'c1ccf3876d0ea9219293aecc341e6413', 'ATLM'),
(10, 'Validator', NULL, NULL, 'validator', '8d6c391e7cb39133c91b73281a24f21f', 'Validator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD UNIQUE KEY `no_rekam_medis` (`no_rekam_medis`);

--
-- Indexes for table `tbl_hasil_pemeriksaan`
--
ALTER TABLE `tbl_hasil_pemeriksaan`
  ADD PRIMARY KEY (`hasil_id`),
  ADD KEY `kode_registrasi` (`kode_registrasi`),
  ADD KEY `parameter` (`parameter`);

--
-- Indexes for table `tbl_jenis_pemeriksaan`
--
ALTER TABLE `tbl_jenis_pemeriksaan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indexes for table `tbl_parameter`
--
ALTER TABLE `tbl_parameter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenis_pemeriksaan` (`jenis_pemeriksaan`),
  ADD KEY `nama` (`nama`);

--
-- Indexes for table `tbl_pemeriksaan`
--
ALTER TABLE `tbl_pemeriksaan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_registrasi` (`kode_registrasi`),
  ADD KEY `no_rekam_medis_2` (`no_rekam_medis`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`status_id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_hasil_pemeriksaan`
--
ALTER TABLE `tbl_hasil_pemeriksaan`
  MODIFY `hasil_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_jenis_pemeriksaan`
--
ALTER TABLE `tbl_jenis_pemeriksaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_parameter`
--
ALTER TABLE `tbl_parameter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_pemeriksaan`
--
ALTER TABLE `tbl_pemeriksaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_hasil_pemeriksaan`
--
ALTER TABLE `tbl_hasil_pemeriksaan`
  ADD CONSTRAINT `tbl_hasil_pemeriksaan_ibfk_1` FOREIGN KEY (`kode_registrasi`) REFERENCES `tbl_pemeriksaan` (`kode_registrasi`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_hasil_pemeriksaan_ibfk_2` FOREIGN KEY (`parameter`) REFERENCES `tbl_parameter` (`nama`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_parameter`
--
ALTER TABLE `tbl_parameter`
  ADD CONSTRAINT `tbl_parameter_ibfk_1` FOREIGN KEY (`jenis_pemeriksaan`) REFERENCES `tbl_jenis_pemeriksaan` (`nama`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pemeriksaan`
--
ALTER TABLE `tbl_pemeriksaan`
  ADD CONSTRAINT `tbl_pemeriksaan_ibfk_1` FOREIGN KEY (`status`) REFERENCES `tbl_status` (`code`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pemeriksaan_ibfk_2` FOREIGN KEY (`no_rekam_medis`) REFERENCES `tbl_customers` (`no_rekam_medis`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
