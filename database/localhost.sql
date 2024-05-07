-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 07 Bulan Mei 2024 pada 10.20
-- Versi server: 8.0.30
-- Versi PHP: 7.4.12

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
-- Struktur dari tabel `byprogram`
--

CREATE TABLE `byprogram` (
  `id` int NOT NULL,
  `kdprogram` varchar(50) NOT NULL,
  `jadwal_kelas` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `deskripsi` varchar(150) NOT NULL,
  `byawal` varchar(150) NOT NULL,
  `bybulan` varchar(150) NOT NULL,
  `tpertemuan` varchar(25) NOT NULL,
  `tbiaya` varchar(150) NOT NULL,
  `deskripsi2` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `byprogram`
--

INSERT INTO `byprogram` (`id`, `kdprogram`, `jadwal_kelas`, `nama`, `deskripsi`, `byawal`, `bybulan`, `tpertemuan`, `tbiaya`, `deskripsi2`) VALUES
(4, 'KAT001', '2023-08-26 14.00 - 15.45', 'bahasa inggris', 'dfadfadf', '50000', '75000', '4', '350000', 'ini adalah keterangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pembayaran`
--

CREATE TABLE `detail_pembayaran` (
  `id` int NOT NULL,
  `notransaksi` varchar(25) NOT NULL,
  `cicilanke` int NOT NULL,
  `nama_program` varchar(150) NOT NULL,
  `kategori` varchar(150) NOT NULL,
  `jumlahbayar` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `detail_pembayaran`
--

INSERT INTO `detail_pembayaran` (`id`, `notransaksi`, `cicilanke`, `nama_program`, `kategori`, `jumlahbayar`) VALUES
(11, 'PEMBA004', 1, 'bahasa inggris', 'pre school', '125000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_program`
--

CREATE TABLE `kategori_program` (
  `kdkatprgm` varchar(50) NOT NULL,
  `nmkatprgm` varchar(50) NOT NULL,
  `ketkatprgm` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `kategori_program`
--

INSERT INTO `kategori_program` (`kdkatprgm`, `nmkatprgm`, `ketkatprgm`) VALUES
('KAT001', 'pre school', 'trial kategori'),
('KAT002', 'umum', 'program umum'),
('KAT003', 'privat', 'progam privat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` int NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `icon` varchar(500) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `nama`, `icon`) VALUES
(1, 'master data', ''),
(2, 'transaksi', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nama`, `jenis_kelamin`, `tlahir`, `tgl_lahir`, `pendidikan`, `jurusan`, `notelp`, `alamat`, `email`, `tgl_mulai`) VALUES
('5245', 'Sahadat', NULL, 'fadfad', NULL, '525`', 'fadfadf', 'gsdfgsd', 'gsgsdfgsdf', 'bxvb', '2023-09-30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int NOT NULL,
  `notransaksi` varchar(25) NOT NULL,
  `nopendaftar` varchar(25) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `deskripsi` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `notransaksi`, `nopendaftar`, `tgl_bayar`, `deskripsi`) VALUES
(6, 'PEMBA001', 'PENDAF001', '2023-08-25', 'Pembayaran Biaya Awal dan Spp'),
(9, 'PEMBA002', 'PENDAF001', '2023-08-25', 'Pembayaran Cicilan Ke 2'),
(10, 'PEMBA003', 'PENDAF002', '2023-08-25', 'Pembayaran Biaya Awal dan Cicilan Ke 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` int NOT NULL,
  `tgl_pendaftaran` date NOT NULL,
  `nopendaftar` varchar(25) NOT NULL,
  `kdprogram` varchar(25) NOT NULL,
  `nama_program` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nama`, `jenis_kelamin`, `tlahir`, `tgl_lahir`, `pendidikan`, `notelp`, `alamat`, `email`, `nopendaftar`) VALUES
(2, '6356', 'rani', '2', 'gsgsfg', '2023-08-25', 'gsgg', 'gsgsf', 'jfjfj', 'hdhdh', 'PENDAF001'),
(3, '9999', 'dani eko pras', '1', 'demak', '2022-07-28', 'smp suka raja', '09999', 'fadfadf', 'dani@gmail.com', 'PENDAF002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `submenu`
--

CREATE TABLE `submenu` (
  `id` int NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `idmaster` int NOT NULL,
  `aktif` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `url` varchar(25) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `submenu`
--

INSERT INTO `submenu` (`id`, `nama`, `idmaster`, `aktif`, `url`) VALUES
(1, 'pegawai', 1, 'm', 'pegawai'),
(2, 'Pengguna (user)', 1, 'm', 'user'),
(3, 'siswa', 1, 'm', 'siswa'),
(4, 'kategori program', 1, 'm', 'kategori'),
(5, 'biaya program', 1, 'm', 'by'),
(6, 'pendaftaran', 2, 't', 'pendaftar'),
(7, 'pembayaran administrasi', 2, 't', 'pembayaran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(25) NOT NULL,
  `nip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`, `nip`) VALUES
(1, '1', 'c4ca4238a0b923820dcc509a6f75849b', 'admin', '5245');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `byprogram`
--
ALTER TABLE `byprogram`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_pembayaran`
--
ALTER TABLE `detail_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_program`
--
ALTER TABLE `kategori_program`
  ADD PRIMARY KEY (`kdkatprgm`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `byprogram`
--
ALTER TABLE `byprogram`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `detail_pembayaran`
--
ALTER TABLE `detail_pembayaran`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
