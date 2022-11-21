-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 21 Nov 2022 pada 15.31
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_informasipasien_native`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ktps`
--

CREATE TABLE `ktps` (
  `nik` varchar(20) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(30) DEFAULT NULL,
  `gol_darah` varchar(2) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kelurahan` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `status_kawin` varchar(30) DEFAULT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `kewarganegaraan` varchar(100) DEFAULT NULL,
  `berlaku` varchar(50) DEFAULT NULL,
  `tgl_buat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `ktps`
--

INSERT INTO `ktps` (`nik`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `gol_darah`, `alamat`, `kelurahan`, `kecamatan`, `agama`, `status_kawin`, `pekerjaan`, `kewarganegaraan`, `berlaku`, `tgl_buat`) VALUES
('5103050101010001', 'Ari Sanjaya', 'Badung', '2001-01-01', 'Laki-laki', 'A', 'Nusa Dua', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5103050101010002', 'Katon Jaya Deva Yogananada', 'Badung', '2001-01-01', 'Laki-laki', 'A', 'Nusa Dua', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5103050101010003', 'Iwan Sandhitama', 'Badung', '2001-01-01', 'Laki-laki', 'A', 'Nusa Dua', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5103050101010004', 'Dedo Karmanata', 'Badung', '2001-01-01', 'Laki-laki', 'A', 'Nusa Dua', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5103050101010005', 'Walter Andrian', 'Badung', '2001-01-01', 'Laki-laki', 'A', 'Nusa Dua', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5103050101010006', 'Meidi Dharma', 'Badung', '2001-01-01', 'Laki-laki', 'A', 'Nusa Dua', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5103050101010007', 'Arditha Kartika Putra', 'Badung', '2001-01-01', 'Laki-laki', 'A', 'Nusa Dua', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id_login` int NOT NULL,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id_login`, `username`, `password`, `role`) VALUES
(1, 'admin', '7b902e6ff1db9f560443f2048974fd7d386975b0', 'Administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasiens`
--

CREATE TABLE `pasiens` (
  `id_pasien` int NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `gol_darah` varchar(2) NOT NULL,
  `tempat_lahir` varchar(60) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `pasiens`
--

INSERT INTO `pasiens` (`id_pasien`, `nik`, `nama`, `jenis_kelamin`, `gol_darah`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `created_at`, `updated_at`) VALUES
(1, '5103050101010009', 'Ari Sanjaya', 'Laki-laki', 'A', 'Badung', '2001-01-01', 'Nusa Dua', '2021-09-19 16:24:13', '2022-11-21 05:35:19'),
(5, '5103050101010009', 'Walter Andrian', 'Perempuan', 'A', 'Badung', '2001-01-01', 'Nusa Dua', '2021-10-19 16:24:13', '2022-11-21 05:35:08'),
(6, '5103050101010006', 'Meidi Dharma', 'Perempuan', 'A', 'Badung', '2001-01-01', 'Nusa Dua', '2022-11-19 16:24:13', '2022-11-21 12:58:42'),
(7, '5103050101010007', 'Arditha Kartika Putra', 'Laki-laki', 'A', 'Badung', '2001-01-01', 'Nusa Dua', '2022-12-19 16:24:13', '2022-11-19 16:24:13'),
(8, '5103050101010002', 'Katon Jaya Deva Yogananada', 'Laki-laki', 'A', 'Badung', '2001-01-01', 'Nusa Dua', '2022-01-21 02:43:55', '2022-11-21 02:43:55'),
(9, '5103050101010003', 'Iwan Sandhitama', 'Perempuan', 'A', 'Badung', '2001-01-01', 'Nusa Dua', '2022-02-01 05:06:54', '2022-11-21 05:06:54'),
(10, '5103050101010004', 'Dedo Karmanata', 'Laki-laki', 'A', 'Badung', '2001-01-01', 'Nusa Dua', '2022-11-21 12:56:38', '2022-11-21 12:56:38');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `show_gender`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `show_gender` (
`jenis_kelamin` varchar(30)
,`jumlah` bigint
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `show_pasien_month`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `show_pasien_month` (
`labels` int
,`data` bigint
);

-- --------------------------------------------------------

--
-- Struktur untuk view `show_gender`
--
DROP TABLE IF EXISTS `show_gender`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `show_gender`  AS SELECT `pasiens`.`jenis_kelamin` AS `jenis_kelamin`, count(`pasiens`.`jenis_kelamin`) AS `jumlah` FROM `pasiens` GROUP BY `pasiens`.`jenis_kelamin``jenis_kelamin`  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `show_pasien_month`
--
DROP TABLE IF EXISTS `show_pasien_month`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `show_pasien_month`  AS SELECT month(`pasiens`.`created_at`) AS `labels`, count(month(`pasiens`.`created_at`)) AS `data` FROM `pasiens` WHERE (year(`pasiens`.`created_at`) = year(now())) GROUP BY `labels` ORDER BY `labels` ASC  ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indeks untuk tabel `pasiens`
--
ALTER TABLE `pasiens`
  ADD PRIMARY KEY (`id_pasien`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pasiens`
--
ALTER TABLE `pasiens`
  MODIFY `id_pasien` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
