-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2021 at 06:39 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poinku`
--

-- --------------------------------------------------------

--
-- Table structure for table `aturan`
--

CREATE TABLE `aturan` (
  `ID_ATURAN` int(11) NOT NULL,
  `TAHUN` varchar(5) DEFAULT NULL,
  `KETERANGAN` varchar(280) DEFAULT NULL,
  `KATEGORI` int(11) NOT NULL DEFAULT 0,
  `AKTIF` int(11) NOT NULL DEFAULT 0
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
  `DESKRIPSI` longtext DEFAULT NULL,
  `PEMBICARA` varchar(250) NOT NULL,
  `LOKASI` varchar(250) DEFAULT NULL,
  `TANGGAL_ACARA` date DEFAULT NULL,
  `JAM_MULAI` time DEFAULT NULL,
  `JAM_SELESAI` time DEFAULT NULL,
  `POSTER` varchar(500) DEFAULT NULL,
  `KUOTA` int(11) DEFAULT NULL,
  `PENDAFTAR` int(11) NOT NULL DEFAULT 0,
  `QR_CODE` varchar(250) NOT NULL,
  `TEMPLATE_SERTIFIKAT` varchar(250) DEFAULT NULL,
  `TANGGAL_DATA` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`ID_EVENT`, `EMAIL`, `ID_JENIS`, `ID_LINGKUP`, `JUDUL`, `DESKRIPSI`, `PEMBICARA`, `LOKASI`, `TANGGAL_ACARA`, `JAM_MULAI`, `JAM_SELESAI`, `POSTER`, `KUOTA`, `PENDAFTAR`, `QR_CODE`, `TEMPLATE_SERTIFIKAT`, `TANGGAL_DATA`) VALUES
(26, 'eventmanager@poinku.com', 5, 2, 'Finding Your Career on 3 steps', 'Sore Eagles !\r\nGimana kabarnya hari ini? ????\r\n\r\nSiapa yang sekarang lagi galau masalah karir kalian coba?\r\nMau jadi apa? Atau malah sekarang lagi kerja ga sesuai passion kalian?\r\n\r\nHarus apa nih biar perencanaan karir kita matang?\r\nNah yuk tonton aja seminar online “Finding Your Career on 3 steps” Bersama 3 narasumber terbaik persembahan STIKI Malang untuk kalian semua ????\r\n\r\nCatat dulu yuk jadwalnya\r\n???? Sabtu, 24 April 2021\r\n⏰ 13.00-15.00\r\n\r\nDan jangan lupa daftarkan dirimu ke link di bawah ini :\r\nhttp://bit.ly/SeminarWawasanKerjaSTIKI2021\r\n\r\nDapatkan juga free e-sertifikatnya yah ????\r\nYuk jangan sampai ketinggalan ya\r\nSee ya…', 'Narasumber', 'Zoom Meeting (Daring)', '2021-06-25', '13:00:00', '15:00:00', 'http://localhost/poinku/assets/img/event/Finding-Your-Career-300x300.jpeg', 100, 0, 'http://localhost/poinku/assets/img/qr/26_QR.png', NULL, '2021-06-11 14:55:03'),
(27, 'eventmanager@poinku.com', 7, 2, 'Basic Data Science with Phyton', 'Sore Eagles!\r\n\r\nSiapa nih yang anak IT coba ngacung dulu? ????\r\nNah kalo kalian anak IT dan pengen memperdalam data science\r\nYuk gabung aja ke kuliah tamu “Basic Data Science with Phyton”\r\n\r\nYang akan digelar pada\r\n???? Jum’at 9 april 2021\r\n⏰ 13.00-selesai\r\n\r\nBersama dengan pemateri kita Farida, S.Kom., M.Kom dari Data Science Indonesia\r\nPastinya ga cuma dapat ilmu gratis tapi kalian juga dapat e-sertofikat GRATIS!!\r\n\r\nPenasaran? Daftar dulu yuk ke link di bawah ini :\r\n\r\nhttp://bit.ly/BasicDataPython\r\n\r\nJangan sampai ketinggalan ya!\r\nAjak juga nih temen-temen kalian semuanya\r\n\r\nSee you', 'Narasumber', 'Zoom Meeting (Daring)', '2021-06-25', '13:00:00', '15:00:00', 'http://localhost/poinku/assets/img/event/Basic-Data-Science-with-Phyton-2-300x300.jpg', 100, 0, 'http://localhost/poinku/assets/img/qr/27_QR.png', NULL, '2021-06-11 15:02:57'),
(28, 'eventmanager@poinku.com', 5, 2, 'Strategi Peningkatan Motivasi serta Kualitas Penelitian dan Pengabdian Masyarakat Melalui Hibah DRPM', 'Dear Bpk/Ibu Dosen\r\n\r\nGuna meningkatkan motivasi serta persiapan untuk menghadapi Hibah DRPM pendanaan 2022, Bagi bpk/ibu dosen yang ingin belajar lebih dalam dan tuntas lagi Seputar peningkatan kualitas penelitian dan pengabdian Masyarakat,\r\n\r\nMari ikuti Seminar Online bertajuk\r\n*”Strategi Peningkatan Motivasi serta Kualitas Penelitian dan Pengabdian Masyarakat Melalui Hibah DRPM”*\r\ndengan pemateri *Prof. Dr. Heri Hermansyah, S.T., M.Eng* selaku _Plt. Direktur Riset dan Pengabdian Masyarakat Kemenristek/BRIN_ serta _opening speech_ dari Ka. LLDIKTI Wilayah 7 *Prof. Dr. Ir. Suprapto, DEA*\r\n\r\nAcara akan diselenggarakan pada:\r\n???? Jum’at, *16 April 2021*, daring via ZOOM\r\n⏰ 13.00- selesai.\r\n\r\nLink pendaftaran bisa langsung diakses secara online di :\r\nhttps://s.id/daftar_webinarLPPM2021\r\n\r\nLive Youtube channel: STIKI Malang\r\nJangan sampai ketinggalan ya', 'Narasumber', 'Zoom Meeting (Daring)', '2021-06-25', '13:00:00', '15:00:00', 'http://localhost/poinku/assets/img/event/Strategi-Peningkatan-Motivasi-serta-Kualitas-Penelitian-dan-Pengabdian-Masyarakat-Melalui-Hibah-DRPM-300x300.jpg', 100, 0, 'http://localhost/poinku/assets/img/qr/28_QR.png', NULL, '2021-06-11 15:04:27'),
(29, 'eventmanager@poinku.com', 6, 2, 'Workshop “Local Business Go Digital with Zoona”', 'Sore Eagles!\r\n\r\nKalian punya bisnis? Ato kalian pengen digitalisasi bisnis biar lebih meluas lagi?\r\nYuk ikuti Workship “Local Business Go Digital with Zoona”\r\nBersama Mo Taufik, CEO PT. Inovasi Muda Berkarya yang juga founder zoona langsung loh ????\r\n\r\nYuk catat dulu aja tanggalnya\r\n???? Selasa, 6 April 2021\r\n⏰ 10.00 – selesai\r\n\r\nDan jangan lupa! Daftarkan dulu diri kalian ke link\r\n\r\nhttps://s.id/Zoona\r\n\r\nYuk merapat dan jangan sampai ketinggalan ya!\r\nSee ya', 'Narasumber', 'Zoom Meeting (Daring)', '2021-06-25', '13:00:00', '15:00:00', 'http://localhost/poinku/assets/img/event/Workshop-Local-Business-Go-Digital-with-Zoona-1-300x300.jpg', 100, 2, 'http://localhost/poinku/assets/img/qr/29_QR.png', 'http://localhost/poinku/assets/img/template_sertifikat/E-Certificate-Muhammad_Reyhan_Firnas_Adani-Workshop-Laravel-Migration-CRUD_pages-to-jpg-000125.jpg', '2021-06-11 15:06:12');

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
(5, 23, 'poi');

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
-- Table structure for table `kuesioner`
--

CREATE TABLE `kuesioner` (
  `ID_KUESIONER` int(11) NOT NULL,
  `EMAIL` varchar(250) NOT NULL,
  `ID_EVENT` int(11) NOT NULL,
  `JAWAB_1` int(11) NOT NULL,
  `JAWAB_2` int(11) NOT NULL,
  `JAWAB_3` int(11) NOT NULL,
  `JAWAB_4` int(11) NOT NULL,
  `JAWAB_5` int(11) NOT NULL,
  `SARAN` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kuesioner`
--

INSERT INTO `kuesioner` (`ID_KUESIONER`, `EMAIL`, `ID_EVENT`, `JAWAB_1`, `JAWAB_2`, `JAWAB_3`, `JAWAB_4`, `JAWAB_5`, `SARAN`) VALUES
(8, '171111079@mhs.stiki.ac.id', 29, 5, 4, 3, 2, 1, ''),
(9, 'mreyhanfirnasa@gmail.com', 29, 3, 3, 2, 2, 3, '');

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
  `STATUS` tinyint(1) DEFAULT 0,
  `TOKEN` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`NRP`, `EMAIL`, `ID_ATURAN`, `NAMA`, `PRODI`, `ANGKATAN`, `NILAI`, `TANGGAL_VALIDASI`, `STATUS`, `TOKEN`) VALUES
('171111001', '171111001@gmail.com', 1, '-', 'DKV', '2017', 'E', '2021-06-01 11:39:52', 1, NULL),
('171111020', '171111020@mhs.stiki.ac.id', 1, 'Ade', 'TI', '2018', 'E', '2021-06-01 11:39:55', 1, 'dhvixjq3SHawnWWW3UXbC4:APA91bE9PmB7ieZNeM_fVc4oxZ0eCFEV9Dl485CI861uGxI4I888QfkdnL-F11tV6HeCkLUR-aHCxxpUU9j9DwKzsjyjD9jegJ4xkvjy68sy83wZbCpnczC2KFgZ_wj3pM0ei2p5WqIz'),
('171111079', '171111079@mhs.stiki.ac.id', 1, 'Reyhan', 'TI', '2019', 'E', '2021-06-01 11:46:08', 1, 'cZURI3E7RFiBU9E-PSo5ZO:APA91bG0t1JK6lBVTOhS_tw16tGtNunQ6C4JgTDo6HBjc5DvY65TmZ_1PmSbMntHPGYfOXZsgWmdVQcTgKyaLvGoiR7v0e26j_7g769nQDSPmwnnAa_lP3MjqTK-A9Ynf2y6UcJsAo71');

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
  `NAMA` varchar(250) DEFAULT NULL,
  `ID_EVENT` int(11) NOT NULL,
  `STATUS` int(11) DEFAULT 0,
  `WAKTU_PRESENSI` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `SERTIFIKAT` varchar(250) DEFAULT NULL,
  `IS_EKSTERNAL` int(11) NOT NULL,
  `IS_SEEN` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`ID_PRESENSI`, `EMAIL`, `NAMA`, `ID_EVENT`, `STATUS`, `WAKTU_PRESENSI`, `SERTIFIKAT`, `IS_EKSTERNAL`, `IS_SEEN`) VALUES
(19, 'firnasreyhan@gmail.com', 'Muhammad Reyhan Firnas Adani', 29, 1, '2021-06-11 18:20:40', 'http://localhost/poinku/uploads/event/sertifikat/29/firnasrey.pdf', 1, 1),
(20, '171111079@mhs.stiki.ac.id', 'Muhammad Reyhan Firnas Adani', 29, 1, '2021-06-13 16:35:15', 'http://localhost/poinku/uploads/event/sertifikat/29/171111079.pdf', 0, 1),
(22, 'mreyhanfirnasa@gmail.com', 'Reyhan Firnas', 29, 1, '2021-06-13 16:35:25', 'http://localhost/poinku/uploads/event/sertifikat/29/mreyhanfi.pdf', 1, 1);

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
  `TANGGAL_DATA` timestamp NULL DEFAULT current_timestamp(),
  `STATUS_VALIDASI` int(11) NOT NULL DEFAULT 0,
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
(28, '171111079', 6, 2, 2, 'Workshop “Local Business Go Digital with Zoona”', '2021-06-25', NULL, '2021-06-13 14:47:10', 1, '2021-06-13 09:47:10');

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
('171111079@mhs.stiki.ac.id', 2, '8fe831a', 'Reyhan', '085156263732'),
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
,`PEMBICARA` varchar(250)
,`LOKASI` varchar(250)
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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_event`  AS SELECT `event`.`ID_EVENT` AS `ID_EVENT`, `event`.`EMAIL` AS `EMAIL`, `event`.`ID_JENIS` AS `ID_JENIS`, `jenis`.`JENIS` AS `JENIS`, `event`.`ID_LINGKUP` AS `ID_LINGKUP`, `lingkup`.`LINGKUP` AS `LINGKUP`, `event`.`JUDUL` AS `JUDUL`, `event`.`DESKRIPSI` AS `DESKRIPSI`, `event`.`PEMBICARA` AS `PEMBICARA`, `event`.`LOKASI` AS `LOKASI`, `event`.`TANGGAL_ACARA` AS `TANGGAL_ACARA`, `event`.`JAM_MULAI` AS `JAM_MULAI`, `event`.`JAM_SELESAI` AS `JAM_SELESAI`, `event`.`POSTER` AS `POSTER`, `event`.`KUOTA` AS `KUOTA`, `event`.`PENDAFTAR` AS `PENDAFTAR` FROM ((`event` join `jenis` on(`event`.`ID_JENIS` = `jenis`.`ID_JENIS`)) join `lingkup` on(`event`.`ID_LINGKUP` = `lingkup`.`ID_LINGKUP` and concat(`event`.`TANGGAL_ACARA`,' ',`event`.`JAM_MULAI`) >= current_timestamp())) ORDER BY `event`.`TANGGAL_DATA` DESC ;

-- --------------------------------------------------------

--
-- Structure for view `view_jenis_tugas_khusus`
--
DROP TABLE IF EXISTS `view_jenis_tugas_khusus`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_jenis_tugas_khusus`  AS SELECT `view_tugas_khusus`.`NRP` AS `NRP`, `jenis`.`ID_JENIS` AS `ID_JENIS`, `jenis`.`JENIS` AS `JENIS`, count(`view_tugas_khusus`.`ID_JENIS`) AS `TOTAL`, sum(`view_tugas_khusus`.`POIN`) AS `JUMLAH` FROM (`jenis` join `view_tugas_khusus` on(`jenis`.`ID_JENIS` = `view_tugas_khusus`.`ID_JENIS`)) GROUP BY `view_tugas_khusus`.`ID_JENIS`, `view_tugas_khusus`.`NRP` ;

-- --------------------------------------------------------

--
-- Structure for view `view_kriteria`
--
DROP TABLE IF EXISTS `view_kriteria`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_kriteria`  AS SELECT `kriteria`.`ID_KRITERIA` AS `ID_KRITERIA`, `nilai`.`ID_ATURAN` AS `ID_ATURAN`, `kriteria`.`ID_NILAI` AS `ID_NILAI`, `nilai`.`NILAI` AS `NILAI`, `kriteria`.`ID_JENIS` AS `ID_JENIS`, `jenis`.`JENIS` AS `JENIS`, `kriteria`.`ID_LINGKUP` AS `ID_LINGKUP`, `lingkup`.`LINGKUP` AS `LINGKUP`, `kriteria`.`JUMLAH` AS `JUMLAH` FROM (((`kriteria` join `nilai` on(`kriteria`.`ID_NILAI` = `nilai`.`ID_NILAI`)) join `jenis` on(`kriteria`.`ID_JENIS` = `jenis`.`ID_JENIS`)) join `lingkup` on(`kriteria`.`ID_LINGKUP` = `lingkup`.`ID_LINGKUP`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_kriteria_tugas_khusus`
--
DROP TABLE IF EXISTS `view_kriteria_tugas_khusus`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_kriteria_tugas_khusus`  AS SELECT `tugas_khusus`.`NRP` AS `NRP`, `tugas_khusus`.`ID_JENIS` AS `ID_JENIS`, `tugas_khusus`.`ID_LINGKUP` AS `ID_LINGKUP`, count(`tugas_khusus`.`ID_TUGAS_KHUSUS`) AS `JUMLAH` FROM `tugas_khusus` WHERE `tugas_khusus`.`STATUS_VALIDASI` = 1 GROUP BY `tugas_khusus`.`NRP`, `tugas_khusus`.`ID_JENIS`, `tugas_khusus`.`ID_LINGKUP` ;

-- --------------------------------------------------------

--
-- Structure for view `view_mahasiswa`
--
DROP TABLE IF EXISTS `view_mahasiswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_mahasiswa`  AS SELECT `mahasiswa`.`NRP` AS `NRP`, `mahasiswa`.`EMAIL` AS `EMAIL`, `aturan`.`ID_ATURAN` AS `ID_ATURAN`, `aturan`.`TAHUN` AS `TAHUN`, `aturan`.`KETERANGAN` AS `KETERANGAN`, `mahasiswa`.`NAMA` AS `NAMA`, `mahasiswa`.`PRODI` AS `PRODI`, `mahasiswa`.`ANGKATAN` AS `ANGKATAN`, `mahasiswa`.`NILAI` AS `NILAI`, `mahasiswa`.`TANGGAL_VALIDASI` AS `TANGGAL_VALIDASI`, `mahasiswa`.`STATUS` AS `STATUS`, `mahasiswa`.`TOKEN` AS `TOKEN` FROM (`mahasiswa` join `aturan` on(`mahasiswa`.`ID_ATURAN` = `aturan`.`ID_ATURAN`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_poin`
--
DROP TABLE IF EXISTS `view_poin`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_poin`  AS SELECT `poin`.`ID_POIN` AS `ID_POIN`, `poin`.`ID_ATURAN` AS `ID_ATURAN`, `jenis`.`JENIS` AS `JENIS`, `lingkup`.`LINGKUP` AS `LINGKUP`, `peran`.`PERAN` AS `PERAN`, `poin`.`POIN` AS `POIN` FROM (((`poin` join `jenis` on(`poin`.`ID_JENIS` = `jenis`.`ID_JENIS`)) join `lingkup` on(`poin`.`ID_LINGKUP` = `lingkup`.`ID_LINGKUP`)) join `peran` on(`poin`.`ID_PERAN` = `peran`.`ID_PERAN`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_tugas_khusus`
--
DROP TABLE IF EXISTS `view_tugas_khusus`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_tugas_khusus`  AS SELECT `tugas_khusus`.`ID_TUGAS_KHUSUS` AS `ID_TUGAS_KHUSUS`, `tugas_khusus`.`NRP` AS `NRP`, `tugas_khusus`.`ID_JENIS` AS `ID_JENIS`, `jenis`.`JENIS` AS `JENIS`, `tugas_khusus`.`ID_LINGKUP` AS `ID_LINGKUP`, `lingkup`.`LINGKUP` AS `LINGKUP`, `tugas_khusus`.`ID_PERAN` AS `ID_PERAN`, `peran`.`PERAN` AS `PERAN`, `tugas_khusus`.`JUDUL` AS `JUDUL`, `tugas_khusus`.`TANGGAL_KEGIATAN` AS `TANGGAL_KEGIATAN`, `tugas_khusus`.`BUKTI` AS `BUKTI`, `tugas_khusus`.`TANGGAL_DATA` AS `TANGGAL_DATA`, `tugas_khusus`.`STATUS_VALIDASI` AS `STATUS_VALIDASI`, `tugas_khusus`.`TANGGAL_VALIDASI` AS `TANGGAL_VALIDASI`, `poin`.`POIN` AS `POIN` FROM ((((((`tugas_khusus` join `mahasiswa` on(`tugas_khusus`.`NRP` = `mahasiswa`.`NRP`)) join `aturan` on(`mahasiswa`.`ID_ATURAN` = `aturan`.`ID_ATURAN`)) join `jenis` on(`tugas_khusus`.`ID_JENIS` = `jenis`.`ID_JENIS`)) join `lingkup` on(`tugas_khusus`.`ID_LINGKUP` = `lingkup`.`ID_LINGKUP`)) join `peran` on(`tugas_khusus`.`ID_PERAN` = `peran`.`ID_PERAN`)) left join `poin` on(`tugas_khusus`.`ID_JENIS` = `poin`.`ID_JENIS` and `tugas_khusus`.`ID_LINGKUP` = `poin`.`ID_LINGKUP` and `tugas_khusus`.`ID_PERAN` = `poin`.`ID_PERAN`)) GROUP BY `tugas_khusus`.`ID_TUGAS_KHUSUS` ;

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
  ADD PRIMARY KEY (`ID_EVENT`),
  ADD KEY `FK_EVENT_RELATIONS_USER` (`EMAIL`),
  ADD KEY `FK_EVENT_RELATIONS_JENIS` (`ID_JENIS`),
  ADD KEY `FK_EVENT_RELATIONS_LINGKUP` (`ID_LINGKUP`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`ID_JENIS`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`ID_KEGIATAN`),
  ADD KEY `ID_TUGAS_KHUSUS` (`ID_TUGAS_KHUSUS`);

--
-- Indexes for table `konten`
--
ALTER TABLE `konten`
  ADD PRIMARY KEY (`ID_KONTEN`),
  ADD KEY `ID_TUGAS_KHUSUS` (`ID_TUGAS_KHUSUS`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`ID_KRITERIA`),
  ADD KEY `FK_KRITERIA_RELATIONS_JENIS` (`ID_JENIS`),
  ADD KEY `FK_KRITERIA_RELATIONS_LINGKUP` (`ID_LINGKUP`),
  ADD KEY `FK_KRITERIA_RELATIONS_NILAI` (`ID_NILAI`);

--
-- Indexes for table `kuesioner`
--
ALTER TABLE `kuesioner`
  ADD PRIMARY KEY (`ID_KUESIONER`);

--
-- Indexes for table `lingkup`
--
ALTER TABLE `lingkup`
  ADD PRIMARY KEY (`ID_LINGKUP`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`NRP`),
  ADD KEY `FK_MAHASISW_RELATIONS_USER` (`EMAIL`),
  ADD KEY `FK_MAHASISW_RELATIONS_ATURAN` (`ID_ATURAN`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`ID_NILAI`),
  ADD KEY `FK_NILAI_RELATIONS_ATURAN` (`ID_ATURAN`);

--
-- Indexes for table `peran`
--
ALTER TABLE `peran`
  ADD PRIMARY KEY (`ID_PERAN`);

--
-- Indexes for table `poin`
--
ALTER TABLE `poin`
  ADD PRIMARY KEY (`ID_POIN`),
  ADD KEY `FK_POIN_RELATIONS_JENIS` (`ID_JENIS`),
  ADD KEY `FK_POIN_RELATIONS_PERAN` (`ID_PERAN`),
  ADD KEY `FK_POIN_RELATIONS_LINGKUP` (`ID_LINGKUP`),
  ADD KEY `FK_POIN_RELATIONS_ATURAN` (`ID_ATURAN`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`ID_PRESENSI`),
  ADD KEY `FK_PRESENSI_RELATIONS_USER` (`EMAIL`),
  ADD KEY `FK_PRESENSI_RELATIONS_EVENT` (`ID_EVENT`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`ID_ROLE`);

--
-- Indexes for table `tugas_khusus`
--
ALTER TABLE `tugas_khusus`
  ADD PRIMARY KEY (`ID_TUGAS_KHUSUS`),
  ADD KEY `FK_TUGAS_KH_RELATIONS_MAHASISW` (`NRP`),
  ADD KEY `ID_JENIS` (`ID_JENIS`),
  ADD KEY `ID_LINGKUP` (`ID_LINGKUP`),
  ADD KEY `ID_PERAN` (`ID_PERAN`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`EMAIL`),
  ADD KEY `FK_USER_RELATIONS_ROLE` (`ID_ROLE`);

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
  MODIFY `ID_EVENT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `ID_KEGIATAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT for table `kuesioner`
--
ALTER TABLE `kuesioner`
  MODIFY `ID_KUESIONER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `ID_PRESENSI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `ID_ROLE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tugas_khusus`
--
ALTER TABLE `tugas_khusus`
  MODIFY `ID_TUGAS_KHUSUS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
