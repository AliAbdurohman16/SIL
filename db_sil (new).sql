-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 07, 2024 at 09:37 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

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
  `alamat` text,
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
(9, '0003/SIL/RM/03/2024', '3209021706010001', 'Mohammad Teguh Adriansyah', 'mta99910@gmail.com', 'Ciledug', 'Cirebon', '2023-12-27', 'Laki-laki', '0811231231231'),
(15, '32372979', '2323', 'asas', 'sasa@gmail.com', 'sdds', 'sdsd', '2001-03-01', 'Perempuan', '0876267367'),
(16, '2323', '323', 'dwdsd', 'sdsds@gmail.com', 'dssd', 'dsdsd', '2012-01-31', 'Laki-laki', '23232323'),
(18, '232323', '778394934', 'sasa', 'asasa@gmail.com', 'saasa', 'asas', '2001-05-06', 'Perempuan', '086863273'),
(19, '9239372', '686673523', 'Mohammad Teguh Adriansyah', 'aasas@gmail.com', 'asasas', 'sasa', '2004-02-03', 'Perempuan', '0866657253');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hasil_pemeriksaan`
--

CREATE TABLE `tbl_hasil_pemeriksaan` (
  `hasil_id` int(11) NOT NULL,
  `kode_registrasi` varchar(255) DEFAULT NULL,
  `parameter` varchar(255) DEFAULT NULL,
  `hasil` double DEFAULT '0',
  `tgl_pengujian` datetime DEFAULT NULL,
  `tgl_selesai` datetime DEFAULT NULL,
  `dokter` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_hasil_pemeriksaan`
--

INSERT INTO `tbl_hasil_pemeriksaan` (`hasil_id`, `kode_registrasi`, `parameter`, `hasil`, `tgl_pengujian`, `tgl_selesai`, `dokter`) VALUES
(22, '0001/REG/SIL/06/2024', 'Kolesterol', 40, '2024-06-07 00:00:00', '2024-06-07 00:00:00', 'dr. Nelly Ratnasari');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_pemeriksaan`
--

CREATE TABLE `tbl_jenis_pemeriksaan` (
  `id` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `tarif` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jenis_pemeriksaan`
--

INSERT INTO `tbl_jenis_pemeriksaan` (`id`, `kode`, `nama`, `tarif`) VALUES
(1, '1.1.3', 'Hitung Darah Lengkap', '2000'),
(2, '1.1.1', 'Prothrombin Tim', '1000'),
(3, '1.1.2', 'Tes Darah Panel Metabolik Dasar ', '3000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_parameter`
--

CREATE TABLE `tbl_parameter` (
  `id` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `jenis_pemeriksaan` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `satuan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_parameter`
--

INSERT INTO `tbl_parameter` (`id`, `kode`, `jenis_pemeriksaan`, `nama`, `satuan`) VALUES
(1, '2121', 'Hitung Darah Lengkap', 'Kolesterol', 'g/dL');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `invoice` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `kode_registrasi` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `jenis_pemeriksaan` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(255) NOT NULL DEFAULT 'Sudah Bayar',
  `total` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_pembayaran`
--

INSERT INTO `tbl_pembayaran` (`invoice`, `kode_registrasi`, `nama`, `jenis_pemeriksaan`, `tanggal`, `status`, `total`) VALUES
('INV6753', '0001/REG/SIL/06/2024', 'Mohammad Irwansyah Somantri', 'Hitung Darah Lengkap', '2024-06-07 14:50:26', 'Sudah Bayar', '3000'),
('INV8229', '0001/REG/SIL/06/2024', 'Mohammad Teguh Adriansyah', 'Hitung Darah Lengkap', '2024-06-07 09:20:26', 'Sudah Bayar', '2000');

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
  `isCito` int(11) NOT NULL DEFAULT '0',
  `status` varchar(255) NOT NULL DEFAULT 'AKTIF',
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pemeriksaan`
--

INSERT INTO `tbl_pemeriksaan` (`id`, `no_rekam_medis`, `kode_registrasi`, `jenis_pemeriksaan`, `catatan`, `isCito`, `status`, `tanggal`) VALUES
(13, '9239372', '0001/REG/SIL/06/2024', 'Hitung Darah Lengkap', 'sasas', 1, 'VALID', '2024-06-07 09:20:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `status_id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `seq` int(11) NOT NULL DEFAULT '1',
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
  `nama` varchar(255) DEFAULT NULL,
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
(10, 'dr. Nelly Ratnasari', NULL, NULL, 'validator', '8d6c391e7cb39133c91b73281a24f21f', 'Validator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD UNIQUE KEY `no_rekam_medis` (`no_rekam_medis`),
  ADD KEY `nama` (`nama`);

--
-- Indexes for table `tbl_hasil_pemeriksaan`
--
ALTER TABLE `tbl_hasil_pemeriksaan`
  ADD PRIMARY KEY (`hasil_id`),
  ADD KEY `kode_registrasi` (`kode_registrasi`),
  ADD KEY `parameter` (`parameter`),
  ADD KEY `dokter` (`dokter`);

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
-- Indexes for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`invoice`),
  ADD KEY `kode_registrasi` (`kode_registrasi`),
  ADD KEY `jenis_pemeriksaan` (`jenis_pemeriksaan`),
  ADD KEY `nama` (`nama`);

--
-- Indexes for table `tbl_pemeriksaan`
--
ALTER TABLE `tbl_pemeriksaan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_registrasi` (`kode_registrasi`),
  ADD KEY `no_rekam_medis_2` (`no_rekam_medis`),
  ADD KEY `status` (`status`),
  ADD KEY `jenis_pemeriksaan` (`jenis_pemeriksaan`);

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
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `nama` (`nama`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_hasil_pemeriksaan`
--
ALTER TABLE `tbl_hasil_pemeriksaan`
  MODIFY `hasil_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_jenis_pemeriksaan`
--
ALTER TABLE `tbl_jenis_pemeriksaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_parameter`
--
ALTER TABLE `tbl_parameter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_pemeriksaan`
--
ALTER TABLE `tbl_pemeriksaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  ADD CONSTRAINT `tbl_hasil_pemeriksaan_ibfk_1` FOREIGN KEY (`kode_registrasi`) REFERENCES `tbl_pemeriksaan` (`kode_registrasi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_hasil_pemeriksaan_ibfk_2` FOREIGN KEY (`parameter`) REFERENCES `tbl_parameter` (`nama`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_hasil_pemeriksaan_ibfk_3` FOREIGN KEY (`dokter`) REFERENCES `tbl_user` (`nama`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_parameter`
--
ALTER TABLE `tbl_parameter`
  ADD CONSTRAINT `tbl_parameter_ibfk_1` FOREIGN KEY (`jenis_pemeriksaan`) REFERENCES `tbl_jenis_pemeriksaan` (`nama`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD CONSTRAINT `tbl_pembayaran_ibfk_1` FOREIGN KEY (`kode_registrasi`) REFERENCES `tbl_pemeriksaan` (`kode_registrasi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pembayaran_ibfk_2` FOREIGN KEY (`jenis_pemeriksaan`) REFERENCES `tbl_pemeriksaan` (`jenis_pemeriksaan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pembayaran_ibfk_3` FOREIGN KEY (`nama`) REFERENCES `tbl_customers` (`nama`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pemeriksaan`
--
ALTER TABLE `tbl_pemeriksaan`
  ADD CONSTRAINT `tbl_pemeriksaan_ibfk_1` FOREIGN KEY (`status`) REFERENCES `tbl_status` (`code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pemeriksaan_ibfk_2` FOREIGN KEY (`no_rekam_medis`) REFERENCES `tbl_customers` (`no_rekam_medis`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
