-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 07, 2021 at 11:44 AM
-- Server version: 5.7.34-log
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sishokus_new_poinku`
--

-- --------------------------------------------------------

--
-- Table structure for table `aturan`
--

CREATE TABLE `aturan` (
  `ID_ATURAN` int(11) NOT NULL,
  `TAHUN` varchar(5) DEFAULT NULL,
  `KETERANGAN` varchar(280) DEFAULT NULL,
  `KATEGORI` int(11) NOT NULL DEFAULT '0',
  `AKTIF` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aturan`
--

INSERT INTO `aturan` (`ID_ATURAN`, `TAHUN`, `KETERANGAN`, `KATEGORI`, `AKTIF`) VALUES
(1, '2022', 'Reguler', 0, 1),
(3, '20211', 'Profesional', 0, 0),
(4, '2012', '2017/2018', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `ID_EVENT` int(11) NOT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `ID_JENIS` int(11) DEFAULT NULL,
  `ID_LINGKUP` int(11) DEFAULT NULL,
  `JUDUL` varchar(280) DEFAULT NULL,
  `DESKRIPSI` longtext,
  `TANGGAL_ACARA` date DEFAULT NULL,
  `JAM_MULAI` time DEFAULT NULL,
  `JAM_SELESAI` time DEFAULT NULL,
  `POSTER` varchar(500) DEFAULT NULL,
  `KUOTA` int(11) DEFAULT NULL,
  `PENDAFTAR` int(11) NOT NULL DEFAULT '0',
  `QR_CODE` varchar(250) NOT NULL,
  `TANGGAL_DATA` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`ID_EVENT`, `EMAIL`, `ID_JENIS`, `ID_LINGKUP`, `JUDUL`, `DESKRIPSI`, `TANGGAL_ACARA`, `JAM_MULAI`, `JAM_SELESAI`, `POSTER`, `KUOTA`, `PENDAFTAR`, `QR_CODE`, `TANGGAL_DATA`) VALUES
(4, NULL, 8, 10, '183921woeiqo', 'dioaidjask', '2021-05-07', '08:59:00', '08:59:00', 'http://localhost/poinku/assets/img/event/13.PNG', 89321, 0, '', '2021-05-08 13:04:21'),
(5, NULL, 5, 7, 'djak', 'kjdakj', '2021-05-08', '20:00:00', '21:59:00', 'http://localhost/poinku/assets/img/event/14.PNG', 321, 0, '', '2021-05-08 13:04:06'),
(6, 'eventmanager@poinku.com', 4, 6, 'Coaching Clinic – Strategi Sukses Lolos Hibah Pengabdian DRPM 2021', 'Selamat pagi!\r\n\r\nKhusus bapak ibu Dosen yang masih penasaran bagaimana\r\nTrik mudah untuk lolos hibah DRPM\r\nDan masih ingin tau lebih jauh soal mekanisme hibah ini\r\n\r\nMari ikuti webinar “Strategi Sukses Lolos Hibah Pengabdian DRPM 2021” Dengan pembicara Syamsuri, S.T., M.T., Ph. D tim Reviewer nasional pengabdian Institut Teknologi Aditama Surabaya.', '2021-05-22', '23:09:00', '00:09:00', 'https://www.stiki.ac.id/wp-content/uploads/2021/04/Coaching-Clinic-Strategi-Sukses-2-300x300.jpeg', 100, 0, '', '2021-05-08 16:09:25'),
(7, 'eventmanager@poinku.com', 9, 6, 'Business Talk 2 Go International with Sociopreneurship', 'djask', '2021-05-11', '00:13:00', '00:17:00', 'https://www.stiki.ac.id/wp-content/uploads/2021/04/Business-Talk-2-300x300.jpeg', 90, 3, '', '2021-05-08 16:14:05'),
(8, 'eventmanager@poinku.com', 5, 2, 'Abc', 'Abc', '2021-05-31', '13:00:00', '15:00:00', 'http://localhost/poinku/assets/img/event/ComingSoon.png', 100, 0, '', '2021-05-30 16:54:36'),
(9, 'eventmanager@poinku.com', 2, 2, 'abc', 'abc', '2021-05-31', '13:00:00', '15:00:00', 'http://localhost/poinku/assets/img/event/ComingSoon1.png', 100, 0, '', '2021-05-30 16:56:51'),
(10, 'eventmanager@poinku.com', 2, 2, 'abca', 'a', '2021-05-31', '13:00:00', '15:00:00', 'http://localhost/poinku/assets/img/event/ComingSoon2.png', 100, 0, '', '2021-05-30 16:59:01'),
(11, 'eventmanager@poinku.com', 2, 1, 'abc', 'a', '2021-05-31', '13:03:00', '15:00:00', 'http://localhost/poinku/assets/img/event/ComingSoon3.png', 100, 0, '', '2021-05-30 17:08:29'),
(12, 'eventmanager@poinku.com', 2, 1, 'abca', 'a', '2021-06-01', '13:01:00', '13:02:00', 'http://localhost/poinku/assets/img/event/ComingSoon4.png', 100, 0, '', '2021-05-30 17:11:00'),
(13, 'eventmanager@poinku.com', 2, 2, 'abc', 'a', '2021-05-31', '13:01:00', '13:01:00', 'http://localhost/poinku/assets/img/event/ComingSoon5.png', 100, 0, '', '2021-05-30 17:13:23'),
(14, 'eventmanager@poinku.com', 2, 1, 'abca', 'a', '2021-05-31', '13:01:00', '13:01:00', 'http://localhost/poinku/assets/img/event/ComingSoon6.png', 100, 0, '', '2021-05-30 17:16:38'),
(15, 'eventmanager@poinku.com', 2, 2, 'abc', 'a', '2021-05-31', '13:01:00', '13:01:00', 'http://localhost/poinku/assets/img/event/ComingSoon7.png', 100, 0, '', '2021-05-30 17:19:16'),
(16, 'eventmanager@poinku.com', 2, 1, 'abc', 'a', '2021-05-31', '13:01:00', '13:01:00', 'http://localhost/poinku/assets/img/event/ComingSoon8.png', 100, 0, '', '2021-05-30 17:26:05'),
(17, 'eventmanager@poinku.com', 2, 2, 'abca', 'a', '2021-05-31', '13:00:00', '15:00:00', 'http://localhost/poinku/assets/img/event/ComingSoon9.png', 100, 0, '', '2021-05-30 17:28:38'),
(18, 'eventmanager@poinku.com', 6, 2, 'abc', 'a', '2021-06-01', '13:01:00', '13:01:00', 'http://localhost/poinku/assets/img/event/ComingSoon10.png', 100, 0, '', '2021-05-30 17:31:07'),
(19, 'eventmanager@poinku.com', 2, 1, 'abca', 'a', '2021-05-31', '01:01:00', '01:01:00', 'http://localhost/poinku/assets/img/event/ComingSoon11.png', 100, 0, '', '2021-05-30 17:37:41'),
(20, 'eventmanager@poinku.com', 2, 1, 'abca', 'a', '2021-05-31', '01:01:00', '01:01:00', 'http://localhost/poinku/assets/img/event/ComingSoon12.png', 100, 0, '', '2021-05-30 17:41:02'),
(21, 'eventmanager@poinku.com', 2, 2, 'abc', 'a', '2021-05-31', '01:01:00', '01:01:00', 'http://localhost/poinku/assets/img/event/ComingSoon13.png', 100, 0, '', '2021-05-30 17:53:52'),
(22, 'eventmanager@poinku.com', 2, 1, 'abc', 'a', '2021-05-31', '01:01:00', '01:01:00', 'http://localhost/poinku/assets/img/event/ComingSoon14.png', 100, 0, '', '2021-05-30 17:57:44'),
(23, 'eventmanager@poinku.com', 2, 1, 'abc', 'a', '2021-05-31', '01:01:00', '01:01:00', 'http://localhost/poinku/assets/img/event/ComingSoon15.png', 100, 0, '', '2021-05-30 18:01:53'),
(24, 'eventmanager@poinku.com', 2, 2, 'QWE', 'qwe', '2021-05-31', '01:01:00', '01:01:00', 'http://localhost/poinku/assets/img/event/ComingSoon16.png', 100, 0, 'http://localhost/poinku/assets/img/qr/24_QR.png', '2021-05-30 18:07:30'),
(25, 'eventmanager@poinku.com', 2, 1, 'abca', '1', '2021-05-24', '01:01:00', '01:01:00', 'http://localhost/poinku/assets/img/event/ComingSoon17.png', 100, 0, 'http://localhost/poinku/assets/img/qr/25_QR.png', '2021-05-30 18:28:37'),
(26, 'eventmanager@poinku.com', 2, 2, 'Judul', 'Desc', '2021-06-08', '13:00:00', '15:00:00', 'http://s4ishoku.site/new_poinku/assets/img/event/43535475.jpg', 100, 1, 'http://s4ishoku.site/new_poinku/assets/img/qr/26_QR.png', '2021-06-07 02:33:34');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `ID_JENIS` int(11) NOT NULL,
  `JENIS` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis`
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
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `ID_KEGIATAN` int(11) NOT NULL,
  `ID_TUGAS_KHUSUS` int(11) NOT NULL,
  `KETERANGAN` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`ID_KEGIATAN`, `ID_TUGAS_KHUSUS`, `KETERANGAN`) VALUES
(1, 20, 'tes'),
(2, 9, 'tes'),
(3, 21, 'poi'),
(4, 22, 'poi'),
(5, 23, 'poi'),
(6, 27, 'Saya');

-- --------------------------------------------------------

--
-- Table structure for table `konten`
--

CREATE TABLE `konten` (
  `ID_KONTEN` int(11) NOT NULL,
  `ID_TUGAS_KHUSUS` int(11) NOT NULL,
  `MEDIA_KONTEN` varchar(255) NOT NULL,
  `JENIS_KONTEN` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konten`
--

INSERT INTO `konten` (`ID_KONTEN`, `ID_TUGAS_KHUSUS`, `MEDIA_KONTEN`, `JENIS_KONTEN`) VALUES
(1, 10, 'Blog', 'Artikel');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `ID_KRITERIA` int(11) NOT NULL,
  `ID_NILAI` int(11) DEFAULT NULL,
  `ID_JENIS` int(11) DEFAULT NULL,
  `ID_LINGKUP` int(11) DEFAULT NULL,
  `JUMLAH` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
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
-- Table structure for table `lingkup`
--

CREATE TABLE `lingkup` (
  `ID_LINGKUP` int(11) NOT NULL,
  `LINGKUP` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lingkup`
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
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `NRP` varchar(15) NOT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `ID_ATURAN` int(11) DEFAULT NULL,
  `NAMA` varchar(250) NOT NULL,
  `PRODI` varchar(5) DEFAULT NULL,
  `ANGKATAN` varchar(4) DEFAULT NULL,
  `NILAI` varchar(3) DEFAULT 'E',
  `TANGGAL_VALIDASI` timestamp NULL DEFAULT NULL,
  `STATUS` tinyint(1) DEFAULT '0',
  `TOKEN` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`NRP`, `EMAIL`, `ID_ATURAN`, `NAMA`, `PRODI`, `ANGKATAN`, `NILAI`, `TANGGAL_VALIDASI`, `STATUS`, `TOKEN`) VALUES
('171111001', '171111001@gmail.com', 4, '-', 'DKV', '2017', 'E', '2021-06-01 11:39:52', 1, NULL),
('171111020', '171111020@mhs.stiki.ac.id', 1, 'Ade', 'TI', '2018', 'E', '2021-06-01 11:39:55', 1, 'dhvixjq3SHawnWWW3UXbC4:APA91bE9PmB7ieZNeM_fVc4oxZ0eCFEV9Dl485CI861uGxI4I888QfkdnL-F11tV6HeCkLUR-aHCxxpUU9j9DwKzsjyjD9jegJ4xkvjy68sy83wZbCpnczC2KFgZ_wj3pM0ei2p5WqIz'),
('171111079', '171111079@mhs.stiki.ac.id', 1, 'Reyhan', 'TI', '2019', 'B+', '2021-06-06 19:51:16', 0, 'ftbisww7RnGkPgxmPJJLLF:APA91bFYQwdqP0GxhDFhCx_wLBuYghymN0BqLKtU0--dPVqtYsLH9AvAvs45SR2T-MGAA6Bm21mkDjpA0BROU_LPcdIav0H7XVeZbJFH09575hXEtWKNjS7AL7_Op9k7_Yc90o3XMpIT');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `ID_NILAI` int(11) NOT NULL,
  `ID_ATURAN` int(11) DEFAULT NULL,
  `NILAI` varchar(3) DEFAULT NULL,
  `POIN_MINIMAL` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`ID_NILAI`, `ID_ATURAN`, `NILAI`, `POIN_MINIMAL`) VALUES
(1, 1, 'A', 80),
(2, 1, 'B+', 75),
(3, 1, 'B', 70);

-- --------------------------------------------------------

--
-- Table structure for table `peran`
--

CREATE TABLE `peran` (
  `ID_PERAN` int(11) NOT NULL,
  `PERAN` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peran`
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
-- Table structure for table `poin`
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
-- Dumping data for table `poin`
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
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `ID_PRESENSI` int(11) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `ID_EVENT` int(11) NOT NULL,
  `STATUS` int(11) DEFAULT '0',
  `WAKTU_PRESENSI` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `SERTIFIKAT` varchar(250) DEFAULT NULL,
  `IS_SEEN` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`ID_PRESENSI`, `EMAIL`, `ID_EVENT`, `STATUS`, `WAKTU_PRESENSI`, `SERTIFIKAT`, `IS_SEEN`) VALUES
(9, '171111079@mhs.stiki.ac.id', 24, 1, '2021-06-07 02:34:37', 'http://s4ishoku.site/new_poinku/uploads/event/sertifikat/26/171111079.pdf', 1),
(13, '171111020@mhs.stiki.ac.id', 7, 0, '2021-06-03 18:47:10', 'http://localhost/poinku/uploads/event/sertifikat/7/171111020.pdf', 1),
(15, '171111001@gmail.com', 6, 1, '2021-06-03 18:47:22', NULL, 1),
(16, '171111079@mhs.stiki.ac.id', 26, 1, '2021-06-07 03:01:56', 'http://s4ishoku.site/new_poinku/uploads/event/sertifikat/26/171111079.pdf', 1);

--
-- Triggers `presensi`
--
DELIMITER $$
CREATE TRIGGER `DELETE_DATA` AFTER DELETE ON `presensi` FOR EACH ROW UPDATE event SET event.PENDAFTAR = event.PENDAFTAR - 1 WHERE event.ID_EVENT = old.ID_EVENT
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `INSERT_DATA` AFTER INSERT ON `presensi` FOR EACH ROW UPDATE event SET event.PENDAFTAR = event.PENDAFTAR + 1 WHERE event.ID_EVENT = new.ID_EVENT
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `ID_ROLE` int(11) NOT NULL,
  `ROLE` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`ID_ROLE`, `ROLE`) VALUES
(2, 'Admin'),
(3, 'Event Manager'),
(4, 'Kaprodi TI'),
(5, 'Kaprodi SI & MI'),
(6, 'Kaprodi DKV');

-- --------------------------------------------------------

--
-- Table structure for table `tugas_khusus`
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
-- Dumping data for table `tugas_khusus`
--

INSERT INTO `tugas_khusus` (`ID_TUGAS_KHUSUS`, `NRP`, `ID_JENIS`, `ID_LINGKUP`, `ID_PERAN`, `JUDUL`, `TANGGAL_KEGIATAN`, `BUKTI`, `TANGGAL_DATA`, `STATUS_VALIDASI`, `TANGGAL_VALIDASI`) VALUES
(1, '171111079', 2, 1, 2, 'Judul', '2021-04-28', 'https://cdn.idntimes.com/content-images/post/20210424/10-881bce895ca6c08611f7387e27548f38_600x400.JPG', '2021-04-27 18:03:44', 1, '2021-06-01 12:20:24'),
(2, '171111079', 2, 1, 2, 'Judul', '2021-04-28', 'www.google.com', '2021-04-27 18:03:44', 1, '0000-00-00 00:00:00'),
(3, '171111079', 2, 1, 2, 'Judul', '2021-04-28', 'www.google.com', '2021-04-27 18:03:44', 1, '0000-00-00 00:00:00'),
(4, '171111079', 3, 2, 2, 'Judul', '2021-04-28', 'www.google.com', '2021-04-27 18:03:44', 1, '0000-00-00 00:00:00'),
(5, '171111079', 3, 2, 2, 'Judul', '2021-04-28', 'www.google.com', '2021-04-27 18:03:44', 1, '0000-00-00 00:00:00'),
(6, '171111079', 4, 2, 2, 'Judul', '2021-04-28', 'www.google.com', '2021-04-27 18:03:44', 1, '0000-00-00 00:00:00'),
(7, '171111079', 4, 2, 2, 'Judul', '2021-04-28', 'www.google.com', '2021-04-27 18:03:44', 1, '0000-00-00 00:00:00'),
(9, '171111079', 6, 3, 2, 'Judul', '2021-04-28', 'www.google.com', '2021-04-27 18:03:44', 1, '0000-00-00 00:00:00'),
(10, '171111079', 6, 3, 2, 'Judul', '2021-04-28', 'www.google.com', '2021-04-27 18:03:44', 1, '0000-00-00 00:00:00'),
(11, '171111079', 7, 1, 2, 'Judul', '2021-04-28', 'www.google.com', '2021-04-27 18:03:44', 1, '0000-00-00 00:00:00'),
(12, '171111079', 7, 1, 2, 'Judul', '2021-04-28', 'www.google.com', '2021-04-27 18:03:44', 1, '0000-00-00 00:00:00'),
(13, '171111079', 13, 1, 1, 'Judul', '2021-04-28', 'www.google.com', '2021-04-27 18:03:44', 1, '0000-00-00 00:00:00'),
(14, '171111079', 15, 1, 1, 'Judul', '2021-04-28', 'www.google.com', '2021-04-27 18:03:44', 1, '0000-00-00 00:00:00'),
(15, '171111079', 6, 1, 1, 'Judul', '2021-04-28', 'www.google.com', '2021-04-27 18:05:19', 1, '0000-00-00 00:00:00'),
(16, '171111079', 5, 3, 2, 'Judul', '2021-04-28', 'www.google.com', '2021-04-27 18:19:32', 1, '0000-00-00 00:00:00'),
(17, '171111079', 6, 13, 2, 'Judul', '2021-04-28', 'www.google.com', '2021-04-27 18:19:32', 1, '0000-00-00 00:00:00'),
(18, '171111079', 7, 1, 2, 'Judul', '2021-04-28', 'www.google.com', '2021-04-27 18:19:32', 1, '0000-00-00 00:00:00'),
(19, '171111079', 2, 1, 1, 'asd', '2021-05-08', NULL, '2021-05-08 16:38:45', 0, '0000-00-00 00:00:00'),
(20, '171111079', 2, 1, 1, 'qwe', '2021-05-08', NULL, '2021-05-08 16:43:04', 0, '0000-00-00 00:00:00'),
(21, '171111079', 2, 1, 1, 'poi', '2021-05-09', 'http://s4ishoku.site/new_poinku/uploads/sertifikat/171111079/2/1620493517.JPEG', '2021-05-08 17:05:16', 0, '0000-00-00 00:00:00'),
(22, '171111079', 2, 1, 1, 'poi', '2021-05-09', 'http://s4ishoku.site/new_poinku/uploads/sertifikat/171111079/2/1620493540.JPEG', '2021-05-08 17:05:38', 0, '0000-00-00 00:00:00'),
(23, '171111079', 2, 1, 1, 'poi', '2021-05-09', 'http://s4ishoku.site/new_poinku/uploads/sertifikat/171111079/2/1620493694.JPEG', '2021-05-08 17:08:12', 0, '0000-00-00 00:00:00'),
(24, '171111079', 1, 1, 1, 'AABC', '2020-01-01', NULL, '2021-05-30 15:36:37', 0, '0000-00-00 00:00:00'),
(25, '171111079', 2, 2, 2, 'QWE', '2021-05-31', NULL, '2021-06-06 15:43:20', 1, '2021-06-06 08:43:20'),
(26, '171111079', 2, 2, 2, 'Judul', '2021-06-08', NULL, '2021-06-07 02:34:17', 1, '2021-06-06 19:34:17'),
(27, '171111079', 2, 2, 2, 'Judul Mob', '2021-06-07', 'http://s4ishoku.site/new_poinku/uploads/sertifikat/171111079/2/1623033636.JPEG', '2021-06-07 02:40:34', 1, '2021-06-06 19:41:34');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `EMAIL` varchar(50) NOT NULL,
  `ID_ROLE` int(11) DEFAULT NULL,
  `PASSWORD` varchar(8) DEFAULT NULL,
  `NAMA` varchar(100) DEFAULT NULL,
  `TELEPON` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`EMAIL`, `ID_ROLE`, `PASSWORD`, `NAMA`, `TELEPON`) VALUES
('admin@poinku.com', 2, 'admin', 'Admin Poinku', NULL),
('eventmanager@poinku.com', 3, 'event', 'Event Manager', NULL),
('kaprodi.ti@poinku.com', 4, 'proditi', 'Kaprodi TI', '085156263732');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_event`
-- (See below for the actual view)
--
CREATE TABLE `view_event` (
`ID_EVENT` int(11)
,`EMAIL` varchar(50)
,`ID_JENIS` int(11)
,`JENIS` varchar(100)
,`ID_LINGKUP` int(11)
,`LINGKUP` varchar(100)
,`JUDUL` varchar(280)
,`DESKRIPSI` longtext
,`TANGGAL_ACARA` date
,`JAM_MULAI` time
,`JAM_SELESAI` time
,`POSTER` varchar(500)
,`KUOTA` int(11)
,`PENDAFTAR` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_jenis_tugas_khusus`
-- (See below for the actual view)
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
-- Stand-in structure for view `view_kriteria`
-- (See below for the actual view)
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
-- Stand-in structure for view `view_kriteria_tugas_khusus`
-- (See below for the actual view)
--
CREATE TABLE `view_kriteria_tugas_khusus` (
`NRP` varchar(15)
,`ID_JENIS` int(11)
,`ID_LINGKUP` int(11)
,`JUMLAH` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_mahasiswa`
-- (See below for the actual view)
--
CREATE TABLE `view_mahasiswa` (
`NRP` varchar(15)
,`EMAIL` varchar(50)
,`ID_ATURAN` int(11)
,`TAHUN` varchar(5)
,`KETERANGAN` varchar(280)
,`NAMA` varchar(250)
,`PRODI` varchar(5)
,`ANGKATAN` varchar(4)
,`NILAI` varchar(3)
,`TANGGAL_VALIDASI` timestamp
,`STATUS` tinyint(1)
,`TOKEN` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_poin`
-- (See below for the actual view)
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
-- Stand-in structure for view `view_tugas_khusus`
-- (See below for the actual view)
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
-- Structure for view `view_event`
--
DROP TABLE IF EXISTS `view_event`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_event`  AS  select `event`.`ID_EVENT` AS `ID_EVENT`,`event`.`EMAIL` AS `EMAIL`,`event`.`ID_JENIS` AS `ID_JENIS`,`jenis`.`JENIS` AS `JENIS`,`event`.`ID_LINGKUP` AS `ID_LINGKUP`,`lingkup`.`LINGKUP` AS `LINGKUP`,`event`.`JUDUL` AS `JUDUL`,`event`.`DESKRIPSI` AS `DESKRIPSI`,`event`.`TANGGAL_ACARA` AS `TANGGAL_ACARA`,`event`.`JAM_MULAI` AS `JAM_MULAI`,`event`.`JAM_SELESAI` AS `JAM_SELESAI`,`event`.`POSTER` AS `POSTER`,`event`.`KUOTA` AS `KUOTA`,`event`.`PENDAFTAR` AS `PENDAFTAR` from ((`event` join `jenis` on((`event`.`ID_JENIS` = `jenis`.`ID_JENIS`))) join `lingkup` on(((`event`.`ID_LINGKUP` = `lingkup`.`ID_LINGKUP`) and (concat(`event`.`TANGGAL_ACARA`,' ',`event`.`JAM_MULAI`) >= now())))) order by `event`.`TANGGAL_DATA` desc ;

-- --------------------------------------------------------

--
-- Structure for view `view_jenis_tugas_khusus`
--
DROP TABLE IF EXISTS `view_jenis_tugas_khusus`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_jenis_tugas_khusus`  AS  select `view_tugas_khusus`.`NRP` AS `NRP`,`jenis`.`ID_JENIS` AS `ID_JENIS`,`jenis`.`JENIS` AS `JENIS`,count(`view_tugas_khusus`.`ID_JENIS`) AS `TOTAL`,sum(`view_tugas_khusus`.`POIN`) AS `JUMLAH` from (`jenis` join `view_tugas_khusus` on((`jenis`.`ID_JENIS` = `view_tugas_khusus`.`ID_JENIS`))) group by `view_tugas_khusus`.`ID_JENIS`,`view_tugas_khusus`.`NRP` ;

-- --------------------------------------------------------

--
-- Structure for view `view_kriteria`
--
DROP TABLE IF EXISTS `view_kriteria`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_kriteria`  AS  select `kriteria`.`ID_KRITERIA` AS `ID_KRITERIA`,`nilai`.`ID_ATURAN` AS `ID_ATURAN`,`kriteria`.`ID_NILAI` AS `ID_NILAI`,`nilai`.`NILAI` AS `NILAI`,`kriteria`.`ID_JENIS` AS `ID_JENIS`,`jenis`.`JENIS` AS `JENIS`,`kriteria`.`ID_LINGKUP` AS `ID_LINGKUP`,`lingkup`.`LINGKUP` AS `LINGKUP`,`kriteria`.`JUMLAH` AS `JUMLAH` from (((`kriteria` join `nilai` on((`kriteria`.`ID_NILAI` = `nilai`.`ID_NILAI`))) join `jenis` on((`kriteria`.`ID_JENIS` = `jenis`.`ID_JENIS`))) join `lingkup` on((`kriteria`.`ID_LINGKUP` = `lingkup`.`ID_LINGKUP`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_kriteria_tugas_khusus`
--
DROP TABLE IF EXISTS `view_kriteria_tugas_khusus`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_kriteria_tugas_khusus`  AS  select `tugas_khusus`.`NRP` AS `NRP`,`tugas_khusus`.`ID_JENIS` AS `ID_JENIS`,`tugas_khusus`.`ID_LINGKUP` AS `ID_LINGKUP`,count(`tugas_khusus`.`ID_TUGAS_KHUSUS`) AS `JUMLAH` from `tugas_khusus` where (`tugas_khusus`.`STATUS_VALIDASI` = 1) group by `tugas_khusus`.`NRP`,`tugas_khusus`.`ID_JENIS`,`tugas_khusus`.`ID_LINGKUP` ;

-- --------------------------------------------------------

--
-- Structure for view `view_mahasiswa`
--
DROP TABLE IF EXISTS `view_mahasiswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_mahasiswa`  AS  select `mahasiswa`.`NRP` AS `NRP`,`mahasiswa`.`EMAIL` AS `EMAIL`,`aturan`.`ID_ATURAN` AS `ID_ATURAN`,`aturan`.`TAHUN` AS `TAHUN`,`aturan`.`KETERANGAN` AS `KETERANGAN`,`mahasiswa`.`NAMA` AS `NAMA`,`mahasiswa`.`PRODI` AS `PRODI`,`mahasiswa`.`ANGKATAN` AS `ANGKATAN`,`mahasiswa`.`NILAI` AS `NILAI`,`mahasiswa`.`TANGGAL_VALIDASI` AS `TANGGAL_VALIDASI`,`mahasiswa`.`STATUS` AS `STATUS`,`mahasiswa`.`TOKEN` AS `TOKEN` from (`mahasiswa` join `aturan` on((`mahasiswa`.`ID_ATURAN` = `aturan`.`ID_ATURAN`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_poin`
--
DROP TABLE IF EXISTS `view_poin`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_poin`  AS  select `poin`.`ID_POIN` AS `ID_POIN`,`poin`.`ID_ATURAN` AS `ID_ATURAN`,`jenis`.`JENIS` AS `JENIS`,`lingkup`.`LINGKUP` AS `LINGKUP`,`peran`.`PERAN` AS `PERAN`,`poin`.`POIN` AS `POIN` from (((`poin` join `jenis` on((`poin`.`ID_JENIS` = `jenis`.`ID_JENIS`))) join `lingkup` on((`poin`.`ID_LINGKUP` = `lingkup`.`ID_LINGKUP`))) join `peran` on((`poin`.`ID_PERAN` = `peran`.`ID_PERAN`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_tugas_khusus`
--
DROP TABLE IF EXISTS `view_tugas_khusus`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_tugas_khusus`  AS  select `tugas_khusus`.`ID_TUGAS_KHUSUS` AS `ID_TUGAS_KHUSUS`,`tugas_khusus`.`NRP` AS `NRP`,`tugas_khusus`.`ID_JENIS` AS `ID_JENIS`,`jenis`.`JENIS` AS `JENIS`,`tugas_khusus`.`ID_LINGKUP` AS `ID_LINGKUP`,`lingkup`.`LINGKUP` AS `LINGKUP`,`tugas_khusus`.`ID_PERAN` AS `ID_PERAN`,`peran`.`PERAN` AS `PERAN`,`tugas_khusus`.`JUDUL` AS `JUDUL`,`tugas_khusus`.`TANGGAL_KEGIATAN` AS `TANGGAL_KEGIATAN`,`tugas_khusus`.`BUKTI` AS `BUKTI`,`tugas_khusus`.`TANGGAL_DATA` AS `TANGGAL_DATA`,`tugas_khusus`.`STATUS_VALIDASI` AS `STATUS_VALIDASI`,`tugas_khusus`.`TANGGAL_VALIDASI` AS `TANGGAL_VALIDASI`,`poin`.`POIN` AS `POIN` from ((((((`tugas_khusus` join `mahasiswa` on((`tugas_khusus`.`NRP` = `mahasiswa`.`NRP`))) join `aturan` on((`mahasiswa`.`ID_ATURAN` = `aturan`.`ID_ATURAN`))) join `jenis` on((`tugas_khusus`.`ID_JENIS` = `jenis`.`ID_JENIS`))) join `lingkup` on((`tugas_khusus`.`ID_LINGKUP` = `lingkup`.`ID_LINGKUP`))) join `peran` on((`tugas_khusus`.`ID_PERAN` = `peran`.`ID_PERAN`))) left join `poin` on(((`tugas_khusus`.`ID_JENIS` = `poin`.`ID_JENIS`) and (`tugas_khusus`.`ID_LINGKUP` = `poin`.`ID_LINGKUP`) and (`tugas_khusus`.`ID_PERAN` = `poin`.`ID_PERAN`)))) group by `tugas_khusus`.`ID_TUGAS_KHUSUS` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aturan`
--
ALTER TABLE `aturan`
  ADD PRIMARY KEY (`ID_ATURAN`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`ID_EVENT`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`ID_JENIS`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`ID_KEGIATAN`);

--
-- Indexes for table `konten`
--
ALTER TABLE `konten`
  ADD PRIMARY KEY (`ID_KONTEN`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`ID_KRITERIA`);

--
-- Indexes for table `lingkup`
--
ALTER TABLE `lingkup`
  ADD PRIMARY KEY (`ID_LINGKUP`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`NRP`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`ID_NILAI`);

--
-- Indexes for table `peran`
--
ALTER TABLE `peran`
  ADD PRIMARY KEY (`ID_PERAN`);

--
-- Indexes for table `poin`
--
ALTER TABLE `poin`
  ADD PRIMARY KEY (`ID_POIN`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`ID_PRESENSI`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`ID_ROLE`);

--
-- Indexes for table `tugas_khusus`
--
ALTER TABLE `tugas_khusus`
  ADD PRIMARY KEY (`ID_TUGAS_KHUSUS`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`EMAIL`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aturan`
--
ALTER TABLE `aturan`
  MODIFY `ID_ATURAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `ID_EVENT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `ID_JENIS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `ID_KEGIATAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `konten`
--
ALTER TABLE `konten`
  MODIFY `ID_KONTEN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `ID_KRITERIA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `lingkup`
--
ALTER TABLE `lingkup`
  MODIFY `ID_LINGKUP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `ID_NILAI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `peran`
--
ALTER TABLE `peran`
  MODIFY `ID_PERAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `poin`
--
ALTER TABLE `poin`
  MODIFY `ID_POIN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `ID_PRESENSI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tugas_khusus`
--
ALTER TABLE `tugas_khusus`
  MODIFY `ID_TUGAS_KHUSUS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
