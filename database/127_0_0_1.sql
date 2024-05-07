-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2023 at 05:52 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `axelledb`
--
CREATE DATABASE IF NOT EXISTS `axelledb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `axelledb`;

-- --------------------------------------------------------

--
-- Table structure for table `byprogram`
--

CREATE TABLE `byprogram` (
  `id` int(11) NOT NULL,
  `kdprogram` varchar(50) NOT NULL,
  `jadwal_kelas` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `deskripsi` varchar(150) NOT NULL,
  `byawal` varchar(150) NOT NULL,
  `bybulan` varchar(150) NOT NULL,
  `tpertemuan` varchar(25) NOT NULL,
  `tbiaya` varchar(150) NOT NULL,
  `deskripsi2` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `byprogram`
--

INSERT INTO `byprogram` (`id`, `kdprogram`, `jadwal_kelas`, `nama`, `deskripsi`, `byawal`, `bybulan`, `tpertemuan`, `tbiaya`, `deskripsi2`) VALUES
(4, 'KAT001', '2023-08-26 14.00 - 15.45', 'bahasa inggris', 'dfadfadf', '50000', '75000', '4', '350000', 'ini adalah keterangan');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembayaran`
--

CREATE TABLE `detail_pembayaran` (
  `id` int(11) NOT NULL,
  `notransaksi` varchar(25) NOT NULL,
  `cicilanke` int(11) NOT NULL,
  `jumlahbayar` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_pembayaran`
--

INSERT INTO `detail_pembayaran` (`id`, `notransaksi`, `cicilanke`, `jumlahbayar`) VALUES
(6, 'PEMBA001', 1, '125000'),
(9, 'PEMBA002', 2, '125000'),
(10, 'PEMBA003', 1, '125000');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_program`
--

CREATE TABLE `kategori_program` (
  `kdkatprgm` varchar(50) NOT NULL,
  `nmkatprgm` varchar(50) NOT NULL,
  `ketkatprgm` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_program`
--

INSERT INTO `kategori_program` (`kdkatprgm`, `nmkatprgm`, `ketkatprgm`) VALUES
('KAT001', 'pre school', 'trial kategori'),
('KAT002', 'umum', 'program umum'),
('KAT003', 'privat', 'progam privat');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` varchar(100) NOT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `jenis_kelamin` varchar(1) DEFAULT NULL,
  `tlahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `pendidikan` varchar(50) DEFAULT NULL,
  `jurusan` varchar(50) DEFAULT NULL,
  `notelp` varchar(20) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nama`, `jenis_kelamin`, `tlahir`, `tgl_lahir`, `pendidikan`, `jurusan`, `notelp`, `alamat`, `email`, `tgl_mulai`) VALUES
('123', 'elvira', '2', 'DEMAK', '2023-08-09', 'SLTA', 'Komputer', '52452345', 'demak raya', 'el@gmail.com', '2023-08-01');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `notransaksi` varchar(25) NOT NULL,
  `nopendaftar` varchar(25) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `deskripsi` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `notransaksi`, `nopendaftar`, `tgl_bayar`, `deskripsi`) VALUES
(6, 'PEMBA001', 'PENDAF001', '2023-08-25', 'Pembayaran Biaya Awal dan Spp'),
(9, 'PEMBA002', 'PENDAF001', '2023-08-25', 'Pembayaran Cicilan Ke 2'),
(10, 'PEMBA003', 'PENDAF002', '2023-08-25', 'Pembayaran Biaya Awal dan Cicilan Ke 1');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` int(11) NOT NULL,
  `tgl_pendaftaran` date NOT NULL,
  `nopendaftar` varchar(25) NOT NULL,
  `kdprogram` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `tgl_pendaftaran`, `nopendaftar`, `kdprogram`) VALUES
(5, '2023-08-25', 'PENDAF001', 'KAT001'),
(6, '2023-08-25', 'PENDAF002', 'KAT001');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nis` varchar(100) NOT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `jenis_kelamin` varchar(1) DEFAULT NULL,
  `tlahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `pendidikan` varchar(50) DEFAULT NULL,
  `notelp` varchar(20) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nopendaftar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nama`, `jenis_kelamin`, `tlahir`, `tgl_lahir`, `pendidikan`, `notelp`, `alamat`, `email`, `nopendaftar`) VALUES
(2, '6356', 'rani', '2', 'gsgsfg', '2023-08-25', 'gsgg', 'gsgsf', 'jfjfj', 'hdhdh', 'PENDAF001'),
(3, '9999', 'dani eko pras', '1', 'demak', '2022-07-28', 'smp suka raja', '09999', 'fadfadf', 'dani@gmail.com', 'PENDAF002');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(25) NOT NULL,
  `nip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`, `nip`) VALUES
(1, '1', '0cc175b9c0f1b6a831c399e269772661', 'admin', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `byprogram`
--
ALTER TABLE `byprogram`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_pembayaran`
--
ALTER TABLE `detail_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_program`
--
ALTER TABLE `kategori_program`
  ADD PRIMARY KEY (`kdkatprgm`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `byprogram`
--
ALTER TABLE `byprogram`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detail_pembayaran`
--
ALTER TABLE `detail_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
