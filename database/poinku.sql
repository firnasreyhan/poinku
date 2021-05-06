-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 06 Bulan Mei 2021 pada 23.46
-- Versi server: 5.7.34-log
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `root_new_poinku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aturan`
--

CREATE TABLE `aturan` (
  `ID_ATURAN` int(11) NOT NULL,
  `TAHUN` varchar(5) DEFAULT NULL,
  `KETERANGAN` varchar(280) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `aturan`
--

INSERT INTO `aturan` (`ID_ATURAN`, `TAHUN`, `KETERANGAN`) VALUES
(1, '2022', 'Reguler'),
(3, '20211', 'Profesional');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `ID_EVENT` int(11) NOT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `ID_JENIS` int(11) DEFAULT NULL,
  `ID_LINGKUP` int(11) DEFAULT NULL,
  `JUDUL` varchar(280) DEFAULT NULL,
  `DESKRIPSI` varchar(280) DEFAULT NULL,
  `TANGGAL_ACARA` date DEFAULT NULL,
  `JAM_MULAI` time DEFAULT NULL,
  `JAM_SELESAI` time DEFAULT NULL,
  `POSTER` varchar(500) DEFAULT NULL,
  `KUOTA` int(11) DEFAULT NULL,
  `TANGGAL_DATA` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `ID_JENIS` int(11) NOT NULL,
  `JENIS` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`ID_JENIS`, `JENIS`) VALUES
(2, 'Kelompok Keilmuan'),
(3, 'Lomba / Kompetisi Ilmiah'),
(4, 'Pameran Produk'),
(5, 'Seminar'),
(6, 'Workshop'),
(7, 'Kuliah Tamu'),
(8, 'Studi ekskursi /  Kunjungan Industri'),
(9, 'Penelitian'),
(10, 'Publikasi Tulisan Ilmiah'),
(11, 'Pengabdian Pada Masyarakat'),
(12, 'HAKI'),
(13, 'Sertifikasi Kompetensi / Penguasaan Bahasa Asing'),
(14, 'Internasional Program (Internship / Summer Camp / Transfer kredit / dll)'),
(15, 'Konten Berita / Youtube Keilmuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `ID_KEGIATAN` int(11) NOT NULL,
  `ID_TUGAS_KHUSUS` int(11) NOT NULL,
  `KETERANGAN` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`ID_KEGIATAN`, `ID_TUGAS_KHUSUS`, `KETERANGAN`) VALUES
(1, 8, 'tes'),
(2, 9, 'tes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kondisi_kriteria`
--

CREATE TABLE `kondisi_kriteria` (
  `ID_KONDISI_KRITERIA` int(11) NOT NULL,
  `ID_JENIS` int(11) DEFAULT NULL,
  `ID_NILAI` int(11) DEFAULT NULL,
  `KONDISI` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kondisi_kriteria`
--

INSERT INTO `kondisi_kriteria` (`ID_KONDISI_KRITERIA`, `ID_JENIS`, `ID_NILAI`, `KONDISI`) VALUES
(1, 4, 1, 'OR');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konten`
--

CREATE TABLE `konten` (
  `ID_KONTEN` int(11) NOT NULL,
  `ID_TUGAS_KHUSUS` int(11) NOT NULL,
  `MEDIA_KONTEN` varchar(255) NOT NULL,
  `JENIS_KONTEN` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konten`
--

INSERT INTO `konten` (`ID_KONTEN`, `ID_TUGAS_KHUSUS`, `MEDIA_KONTEN`, `JENIS_KONTEN`) VALUES
(1, 10, 'Blog', 'Artikel');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `ID_KRITERIA` int(11) NOT NULL,
  `ID_NILAI` int(11) DEFAULT NULL,
  `ID_JENIS` int(11) DEFAULT NULL,
  `ID_LINGKUP` int(11) DEFAULT NULL,
  `JUMLAH` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`ID_KRITERIA`, `ID_NILAI`, `ID_JENIS`, `ID_LINGKUP`, `JUMLAH`) VALUES
(1, 1, 2, 1, 3),
(2, 1, 3, 1, 2),
(3, 1, 4, 1, 2),
(4, 1, 5, 4, 1),
(5, 1, 6, 1, 2),
(6, 1, 7, 1, 2),
(7, 1, 13, 1, 1),
(8, 1, 15, 1, 1),
(9, 2, 2, 1, 2),
(10, 2, 3, 1, 1),
(11, 2, 4, 1, 2),
(12, 2, 5, 3, 1),
(13, 2, 6, 1, 3),
(14, 2, 7, 1, 3),
(15, 2, 13, 1, 1),
(16, 2, 15, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `lingkup`
--

CREATE TABLE `lingkup` (
  `ID_LINGKUP` int(11) NOT NULL,
  `LINGKUP` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lingkup`
--

INSERT INTO `lingkup` (`ID_LINGKUP`, `LINGKUP`) VALUES
(1, '-'),
(2, 'Lokal'),
(3, 'Nasional'),
(4, 'Internasional'),
(5, 'Anggota Tim Penelitian'),
(6, 'Jurnal Terakreditasi'),
(7, 'Jurnal Tidak Terakreditasi'),
(8, 'Media Online'),
(9, 'Asisten Laboratorium'),
(10, 'Anggota Tim Pengabdian Masyarakat / Kepanitiaan'),
(11, 'Volunteer Kegiatan Kampus'),
(13, 'Regional');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `NRP` varchar(15) NOT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `ID_ATURAN` int(11) DEFAULT NULL,
  `PRODI` varchar(5) DEFAULT NULL,
  `ANGKATAN` varchar(4) DEFAULT NULL,
  `NILAI` varchar(3) DEFAULT 'E',
  `TANGGAL_VALIDASI` timestamp NULL DEFAULT NULL,
  `STATUS` tinyint(1) DEFAULT '0',
  `TOKEN` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`NRP`, `EMAIL`, `ID_ATURAN`, `PRODI`, `ANGKATAN`, `NILAI`, `TANGGAL_VALIDASI`, `STATUS`, `TOKEN`) VALUES
('171111001', '171111001@gmail.com', 1, 'TI', '2017', 'E', '2021-04-27 16:15:00', 0, NULL),
('171111079', '171111079@mhs.stiki.ac.id', 1, 'TI', '2017', 'E', NULL, 0, 'eOIRftnhS0GKXOXtUCks4p:APA91bHdQ2nyp2_o5KwiWad3gVrsF-sfVP7gTN9lgM8EIVJ-QTRBKWkSHY2ghfdULC-vaVcEOQrTkTS1YBaCO9VphRK-WUm6GC2tW913VJwbqbPRzd8oVZ--NFSezYs6Xp5gHQSJ-aUH');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `ID_NILAI` int(11) NOT NULL,
  `ID_ATURAN` int(11) DEFAULT NULL,
  `NILAI` varchar(3) DEFAULT NULL,
  `POIN_MINIMAL` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`ID_NILAI`, `ID_ATURAN`, `NILAI`, `POIN_MINIMAL`) VALUES
(1, 1, 'A', 80),
(2, 1, 'B+', 75),
(3, 1, 'B', 70);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peran`
--

CREATE TABLE `peran` (
  `ID_PERAN` int(11) NOT NULL,
  `PERAN` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peran`
--

INSERT INTO `peran` (`ID_PERAN`, `PERAN`) VALUES
(1, '-'),
(2, 'Peserta'),
(3, 'Pemateri'),
(4, 'Pemenang'),
(5, 'Panitia'),
(6, 'Anggota Tim'),
(7, 'Asisten'),
(8, 'Volunteer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `poin`
--

CREATE TABLE `poin` (
  `ID_POIN` int(11) NOT NULL,
  `ID_ATURAN` int(11) DEFAULT NULL,
  `ID_JENIS` int(11) DEFAULT NULL,
  `ID_LINGKUP` int(11) DEFAULT NULL,
  `ID_PERAN` int(11) DEFAULT NULL,
  `POIN` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `poin`
--

INSERT INTO `poin` (`ID_POIN`, `ID_ATURAN`, `ID_JENIS`, `ID_LINGKUP`, `ID_PERAN`, `POIN`) VALUES
(1, 1, 2, 1, 2, 5),
(2, 1, 2, 1, 3, 7),
(3, 1, 3, 2, 2, 5),
(4, 1, 3, 13, 2, 7),
(5, 1, 3, 3, 2, 10),
(6, 1, 3, 4, 2, 15),
(7, 1, 3, 2, 4, 10),
(8, 1, 3, 13, 4, 12),
(9, 1, 3, 3, 4, 15),
(10, 1, 3, 4, 4, 20),
(11, 1, 4, 2, 2, 5),
(12, 1, 4, 13, 2, 7),
(13, 1, 4, 3, 2, 10),
(14, 1, 4, 4, 2, 15),
(15, 1, 5, 2, 2, 4),
(16, 1, 5, 13, 2, 5),
(17, 1, 5, 3, 2, 7),
(18, 1, 5, 4, 2, 10),
(19, 1, 5, 2, 3, 7),
(20, 1, 5, 13, 3, 10),
(21, 1, 5, 3, 3, 12),
(22, 1, 5, 4, 3, 15),
(23, 1, 6, 1, 1, 100),
(24, 1, 6, 13, 2, 5),
(25, 1, 6, 3, 2, 7),
(26, 1, 6, 4, 2, 10),
(27, 1, 6, 2, 3, 7),
(28, 1, 6, 13, 3, 10),
(29, 1, 6, 3, 3, 12),
(30, 1, 6, 4, 3, 15),
(31, 1, 7, 1, 2, 5),
(32, 1, 8, 1, 2, 5),
(33, 1, 8, 1, 5, 8),
(34, 1, 9, 1, 6, 8),
(35, 1, 10, 6, 1, 15),
(36, 1, 10, 7, 1, 10),
(37, 1, 10, 8, 1, 5),
(38, 1, 11, 1, 7, 10),
(39, 1, 11, 10, 6, 8),
(40, 1, 11, 11, 8, 10),
(41, 1, 12, 1, 1, 20),
(42, 1, 13, 1, 1, 15),
(43, 1, 14, 1, 1, 20),
(44, 1, 15, 1, 1, 0),
(46, 1, 2, 1, 2, 5),
(47, 1, 2, 1, 3, 10),
(48, 1, 2, 1, 2, 1),
(49, 1, 2, 1, 3, 2),
(50, 1, 3, 2, 2, 3),
(51, 1, 3, 3, 2, 4),
(52, 1, 3, 4, 2, 5),
(53, 1, 4, 2, 2, 6),
(54, 1, 4, 3, 2, 7),
(55, 1, 5, 2, 2, 8),
(56, 1, 5, 13, 2, 9),
(57, 1, 5, 3, 2, 10),
(59, 1, 3, 4, 4, 23),
(60, 1, 4, 4, 4, 67);

-- --------------------------------------------------------

--
-- Struktur dari tabel `presensi`
--

CREATE TABLE `presensi` (
  `ID_PRESENSI` int(11) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `ID_EVENT` int(11) NOT NULL,
  `STATUS` int(11) DEFAULT NULL,
  `WAKTU_PRESENSI` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `ID_ROLE` int(11) NOT NULL,
  `ROLE` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`ID_ROLE`, `ROLE`) VALUES
(1, 'Mahasiswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas_khusus`
--

CREATE TABLE `tugas_khusus` (
  `ID_TUGAS_KHUSUS` int(11) NOT NULL,
  `NRP` varchar(15) DEFAULT NULL,
  `ID_JENIS` int(11) NOT NULL,
  `ID_LINGKUP` int(11) NOT NULL,
  `ID_PERAN` int(11) NOT NULL,
  `JUDUL` varchar(280) DEFAULT NULL,
  `TANGGAL_KEGIATAN` date DEFAULT NULL,
  `BUKTI` varchar(255) DEFAULT NULL,
  `TANGGAL_DATA` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `STATUS_VALIDASI` int(11) NOT NULL DEFAULT '0',
  `TANGGAL_VALIDASI` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tugas_khusus`
--

INSERT INTO `tugas_khusus` (`ID_TUGAS_KHUSUS`, `NRP`, `ID_JENIS`, `ID_LINGKUP`, `ID_PERAN`, `JUDUL`, `TANGGAL_KEGIATAN`, `BUKTI`, `TANGGAL_DATA`, `STATUS_VALIDASI`, `TANGGAL_VALIDASI`) VALUES
(1, '171111079', 2, 1, 2, 'Judul', '2021-04-28', 'https://cdn.idntimes.com/content-images/post/20210424/10-881bce895ca6c08611f7387e27548f38_600x400.JPG', '2021-04-27 18:03:44', 0, '0000-00-00 00:00:00'),
(2, '171111079', 2, 1, 2, 'Judul', '2021-04-28', 'www.google.com', '2021-04-27 18:03:44', 0, '0000-00-00 00:00:00'),
(3, '171111079', 2, 1, 2, 'Judul', '2021-04-28', 'www.google.com', '2021-04-27 18:03:44', 0, '0000-00-00 00:00:00'),
(4, '171111079', 3, 2, 2, 'Judul', '2021-04-28', 'www.google.com', '2021-04-27 18:03:44', 0, '0000-00-00 00:00:00'),
(5, '171111079', 3, 2, 2, 'Judul', '2021-04-28', 'www.google.com', '2021-04-27 18:03:44', 0, '0000-00-00 00:00:00'),
(6, '171111079', 4, 2, 2, 'Judul', '2021-04-28', 'www.google.com', '2021-04-27 18:03:44', 0, '0000-00-00 00:00:00'),
(7, '171111079', 4, 2, 2, 'Judul', '2021-04-28', 'www.google.com', '2021-04-27 18:03:44', 0, '0000-00-00 00:00:00'),
(9, '171111079', 6, 3, 2, 'Judul', '2021-04-28', 'www.google.com', '2021-04-27 18:03:44', 0, '0000-00-00 00:00:00'),
(10, '171111079', 6, 3, 2, 'Judul', '2021-04-28', 'www.google.com', '2021-04-27 18:03:44', 0, '0000-00-00 00:00:00'),
(11, '171111079', 7, 1, 2, 'Judul', '2021-04-28', 'www.google.com', '2021-04-27 18:03:44', 0, '0000-00-00 00:00:00'),
(12, '171111079', 7, 1, 2, 'Judul', '2021-04-28', 'www.google.com', '2021-04-27 18:03:44', 0, '0000-00-00 00:00:00'),
(13, '171111079', 13, 1, 1, 'Judul', '2021-04-28', 'www.google.com', '2021-04-27 18:03:44', 0, '0000-00-00 00:00:00'),
(14, '171111079', 15, 1, 1, 'Judul', '2021-04-28', 'www.google.com', '2021-04-27 18:03:44', 0, '0000-00-00 00:00:00'),
(15, '171111079', 6, 1, 1, 'Judul', '2021-04-28', 'www.google.com', '2021-04-27 18:05:19', 0, '0000-00-00 00:00:00'),
(16, '171111079', 5, 3, 2, 'Judul', '2021-04-28', 'www.google.com', '2021-04-27 18:19:32', 0, '0000-00-00 00:00:00'),
(17, '171111079', 6, 13, 2, 'Judul', '2021-04-28', 'www.google.com', '2021-04-27 18:19:32', 0, '0000-00-00 00:00:00'),
(18, '171111079', 7, 1, 2, 'Judul', '2021-04-28', 'www.google.com', '2021-04-27 18:19:32', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `EMAIL` varchar(50) NOT NULL,
  `ID_ROLE` int(11) DEFAULT NULL,
  `PASSWORD` varchar(8) DEFAULT NULL,
  `NAMA` varchar(100) DEFAULT NULL,
  `TELEPON` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`EMAIL`, `ID_ROLE`, `PASSWORD`, `NAMA`, `TELEPON`) VALUES
('171111079@mhs.stiki.ac.id', 1, NULL, 'Muhammad Reyhan Firnas Adani', '085156263732');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_jenis_tugas_khusus`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_jenis_tugas_khusus` (
`NRP` varchar(15)
,`ID_JENIS` int(11)
,`JENIS` varchar(100)
,`TOTAL` bigint(21)
,`JUMLAH` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_kriteria`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_kriteria` (
`ID_KRITERIA` int(11)
,`ID_ATURAN` int(11)
,`ID_NILAI` int(11)
,`NILAI` varchar(3)
,`ID_JENIS` int(11)
,`JENIS` varchar(100)
,`ID_LINGKUP` int(11)
,`LINGKUP` varchar(100)
,`JUMLAH` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_kriteria_tugas_khusus`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_kriteria_tugas_khusus` (
`NRP` varchar(15)
,`ID_JENIS` int(11)
,`ID_LINGKUP` int(11)
,`JUMLAH` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_mahasiswa`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_mahasiswa` (
`NRP` varchar(15)
,`EMAIL` varchar(50)
,`ID_ATURAN` int(11)
,`TAHUN` varchar(5)
,`KETERANGAN` varchar(280)
,`PRODI` varchar(5)
,`ANGKATAN` varchar(4)
,`NILAI` varchar(3)
,`TANGGAL_VALIDASI` timestamp
,`STATUS` tinyint(1)
,`TOKEN` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_poin`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_poin` (
`ID_POIN` int(11)
,`ID_ATURAN` int(11)
,`JENIS` varchar(100)
,`LINGKUP` varchar(100)
,`PERAN` varchar(100)
,`POIN` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_tugas_khusus`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_tugas_khusus` (
`ID_TUGAS_KHUSUS` int(11)
,`NRP` varchar(15)
,`ID_JENIS` int(11)
,`JENIS` varchar(100)
,`ID_LINGKUP` int(11)
,`LINGKUP` varchar(100)
,`ID_PERAN` int(11)
,`PERAN` varchar(100)
,`JUDUL` varchar(280)
,`TANGGAL_KEGIATAN` date
,`BUKTI` varchar(255)
,`TANGGAL_DATA` timestamp
,`STATUS_VALIDASI` int(11)
,`TANGGAL_VALIDASI` timestamp
,`POIN` int(11)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `view_jenis_tugas_khusus`
--
DROP TABLE IF EXISTS `view_jenis_tugas_khusus`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_jenis_tugas_khusus`  AS  select `view_tugas_khusus`.`NRP` AS `NRP`,`jenis`.`ID_JENIS` AS `ID_JENIS`,`jenis`.`JENIS` AS `JENIS`,count(`view_tugas_khusus`.`ID_JENIS`) AS `TOTAL`,sum(`view_tugas_khusus`.`POIN`) AS `JUMLAH` from (`jenis` join `view_tugas_khusus` on((`jenis`.`ID_JENIS` = `view_tugas_khusus`.`ID_JENIS`))) group by `view_tugas_khusus`.`ID_JENIS`,`view_tugas_khusus`.`NRP` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_kriteria`
--
DROP TABLE IF EXISTS `view_kriteria`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_kriteria`  AS  select `kriteria`.`ID_KRITERIA` AS `ID_KRITERIA`,`nilai`.`ID_ATURAN` AS `ID_ATURAN`,`kriteria`.`ID_NILAI` AS `ID_NILAI`,`nilai`.`NILAI` AS `NILAI`,`kriteria`.`ID_JENIS` AS `ID_JENIS`,`jenis`.`JENIS` AS `JENIS`,`kriteria`.`ID_LINGKUP` AS `ID_LINGKUP`,`lingkup`.`LINGKUP` AS `LINGKUP`,`kriteria`.`JUMLAH` AS `JUMLAH` from (((`kriteria` join `nilai` on((`kriteria`.`ID_NILAI` = `nilai`.`ID_NILAI`))) join `jenis` on((`kriteria`.`ID_JENIS` = `jenis`.`ID_JENIS`))) join `lingkup` on((`kriteria`.`ID_LINGKUP` = `lingkup`.`ID_LINGKUP`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_kriteria_tugas_khusus`
--
DROP TABLE IF EXISTS `view_kriteria_tugas_khusus`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_kriteria_tugas_khusus`  AS  select `tugas_khusus`.`NRP` AS `NRP`,`tugas_khusus`.`ID_JENIS` AS `ID_JENIS`,`tugas_khusus`.`ID_LINGKUP` AS `ID_LINGKUP`,count(`tugas_khusus`.`ID_TUGAS_KHUSUS`) AS `JUMLAH` from `tugas_khusus` group by `tugas_khusus`.`NRP`,`tugas_khusus`.`ID_JENIS`,`tugas_khusus`.`ID_LINGKUP` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_mahasiswa`
--
DROP TABLE IF EXISTS `view_mahasiswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_mahasiswa`  AS  select `mahasiswa`.`NRP` AS `NRP`,`mahasiswa`.`EMAIL` AS `EMAIL`,`aturan`.`ID_ATURAN` AS `ID_ATURAN`,`aturan`.`TAHUN` AS `TAHUN`,`aturan`.`KETERANGAN` AS `KETERANGAN`,`mahasiswa`.`PRODI` AS `PRODI`,`mahasiswa`.`ANGKATAN` AS `ANGKATAN`,`mahasiswa`.`NILAI` AS `NILAI`,`mahasiswa`.`TANGGAL_VALIDASI` AS `TANGGAL_VALIDASI`,`mahasiswa`.`STATUS` AS `STATUS`,`mahasiswa`.`TOKEN` AS `TOKEN` from (`mahasiswa` join `aturan` on((`mahasiswa`.`ID_ATURAN` = `aturan`.`ID_ATURAN`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_poin`
--
DROP TABLE IF EXISTS `view_poin`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_poin`  AS  select `poin`.`ID_POIN` AS `ID_POIN`,`poin`.`ID_ATURAN` AS `ID_ATURAN`,`jenis`.`JENIS` AS `JENIS`,`lingkup`.`LINGKUP` AS `LINGKUP`,`peran`.`PERAN` AS `PERAN`,`poin`.`POIN` AS `POIN` from (((`poin` join `jenis` on((`poin`.`ID_JENIS` = `jenis`.`ID_JENIS`))) join `lingkup` on((`poin`.`ID_LINGKUP` = `lingkup`.`ID_LINGKUP`))) join `peran` on((`poin`.`ID_PERAN` = `peran`.`ID_PERAN`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_tugas_khusus`
--
DROP TABLE IF EXISTS `view_tugas_khusus`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_tugas_khusus`  AS  select `tugas_khusus`.`ID_TUGAS_KHUSUS` AS `ID_TUGAS_KHUSUS`,`tugas_khusus`.`NRP` AS `NRP`,`tugas_khusus`.`ID_JENIS` AS `ID_JENIS`,`jenis`.`JENIS` AS `JENIS`,`tugas_khusus`.`ID_LINGKUP` AS `ID_LINGKUP`,`lingkup`.`LINGKUP` AS `LINGKUP`,`tugas_khusus`.`ID_PERAN` AS `ID_PERAN`,`peran`.`PERAN` AS `PERAN`,`tugas_khusus`.`JUDUL` AS `JUDUL`,`tugas_khusus`.`TANGGAL_KEGIATAN` AS `TANGGAL_KEGIATAN`,`tugas_khusus`.`BUKTI` AS `BUKTI`,`tugas_khusus`.`TANGGAL_DATA` AS `TANGGAL_DATA`,`tugas_khusus`.`STATUS_VALIDASI` AS `STATUS_VALIDASI`,`tugas_khusus`.`TANGGAL_VALIDASI` AS `TANGGAL_VALIDASI`,`poin`.`POIN` AS `POIN` from ((((((`tugas_khusus` join `jenis` on((`tugas_khusus`.`ID_JENIS` = `jenis`.`ID_JENIS`))) join `lingkup` on((`tugas_khusus`.`ID_LINGKUP` = `lingkup`.`ID_LINGKUP`))) join `peran` on((`tugas_khusus`.`ID_PERAN` = `peran`.`ID_PERAN`))) join `mahasiswa` on((`tugas_khusus`.`NRP` = `mahasiswa`.`NRP`))) join `aturan` on((`mahasiswa`.`ID_ATURAN` = `aturan`.`ID_ATURAN`))) left join `poin` on(((`aturan`.`ID_ATURAN` = `poin`.`ID_ATURAN`) and (`tugas_khusus`.`ID_JENIS` = `poin`.`ID_JENIS`) and (`tugas_khusus`.`ID_LINGKUP` = `poin`.`ID_LINGKUP`) and (`tugas_khusus`.`ID_PERAN` = `peran`.`ID_PERAN`)))) group by `tugas_khusus`.`ID_TUGAS_KHUSUS` ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aturan`
--
ALTER TABLE `aturan`
  ADD PRIMARY KEY (`ID_ATURAN`);

--
-- Indeks untuk tabel `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`ID_EVENT`),
  ADD KEY `FK_EVENT_RELATIONS_USER` (`EMAIL`),
  ADD KEY `FK_EVENT_RELATIONS_JENIS` (`ID_JENIS`),
  ADD KEY `FK_EVENT_RELATIONS_LINGKUP` (`ID_LINGKUP`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`ID_JENIS`);

--
-- Indeks untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`ID_KEGIATAN`),
  ADD KEY `ID_TUGAS_KHUSUS` (`ID_TUGAS_KHUSUS`);

--
-- Indeks untuk tabel `kondisi_kriteria`
--
ALTER TABLE `kondisi_kriteria`
  ADD PRIMARY KEY (`ID_KONDISI_KRITERIA`),
  ADD KEY `FK_KONDISI__RELATIONS_NILAI` (`ID_NILAI`),
  ADD KEY `FK_KONDISI__RELATIONS_JENIS` (`ID_JENIS`);

--
-- Indeks untuk tabel `konten`
--
ALTER TABLE `konten`
  ADD PRIMARY KEY (`ID_KONTEN`),
  ADD KEY `ID_TUGAS_KHUSUS` (`ID_TUGAS_KHUSUS`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`ID_KRITERIA`),
  ADD KEY `FK_KRITERIA_RELATIONS_JENIS` (`ID_JENIS`),
  ADD KEY `FK_KRITERIA_RELATIONS_LINGKUP` (`ID_LINGKUP`),
  ADD KEY `FK_KRITERIA_RELATIONS_NILAI` (`ID_NILAI`);

--
-- Indeks untuk tabel `lingkup`
--
ALTER TABLE `lingkup`
  ADD PRIMARY KEY (`ID_LINGKUP`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`NRP`),
  ADD KEY `FK_MAHASISW_RELATIONS_USER` (`EMAIL`),
  ADD KEY `FK_MAHASISW_RELATIONS_ATURAN` (`ID_ATURAN`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`ID_NILAI`),
  ADD KEY `FK_NILAI_RELATIONS_ATURAN` (`ID_ATURAN`);

--
-- Indeks untuk tabel `peran`
--
ALTER TABLE `peran`
  ADD PRIMARY KEY (`ID_PERAN`);

--
-- Indeks untuk tabel `poin`
--
ALTER TABLE `poin`
  ADD PRIMARY KEY (`ID_POIN`),
  ADD KEY `FK_POIN_RELATIONS_JENIS` (`ID_JENIS`),
  ADD KEY `FK_POIN_RELATIONS_PERAN` (`ID_PERAN`),
  ADD KEY `FK_POIN_RELATIONS_LINGKUP` (`ID_LINGKUP`),
  ADD KEY `FK_POIN_RELATIONS_ATURAN` (`ID_ATURAN`);

--
-- Indeks untuk tabel `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`ID_PRESENSI`),
  ADD KEY `FK_PRESENSI_RELATIONS_USER` (`EMAIL`),
  ADD KEY `FK_PRESENSI_RELATIONS_EVENT` (`ID_EVENT`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`ID_ROLE`);

--
-- Indeks untuk tabel `tugas_khusus`
--
ALTER TABLE `tugas_khusus`
  ADD PRIMARY KEY (`ID_TUGAS_KHUSUS`),
  ADD KEY `FK_TUGAS_KH_RELATIONS_MAHASISW` (`NRP`),
  ADD KEY `ID_JENIS` (`ID_JENIS`),
  ADD KEY `ID_LINGKUP` (`ID_LINGKUP`),
  ADD KEY `ID_PERAN` (`ID_PERAN`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`EMAIL`),
  ADD KEY `FK_USER_RELATIONS_ROLE` (`ID_ROLE`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aturan`
--
ALTER TABLE `aturan`
  MODIFY `ID_ATURAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `event`
--
ALTER TABLE `event`
  MODIFY `ID_EVENT` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `ID_KEGIATAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `konten`
--
ALTER TABLE `konten`
  MODIFY `ID_KONTEN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `ID_KRITERIA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `ID_ROLE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tugas_khusus`
--
ALTER TABLE `tugas_khusus`
  MODIFY `ID_TUGAS_KHUSUS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
