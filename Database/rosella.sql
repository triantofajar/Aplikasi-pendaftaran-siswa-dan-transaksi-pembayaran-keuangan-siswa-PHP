-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 19, 2017 at 04:58 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rosella`
--

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `id_utama` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kel` enum('Laki-Laki','Perempuan') NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tgl_daftar` date NOT NULL,
  `agama` varchar(20) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `ayah` varchar(500) NOT NULL,
  `kerja_ayah` varchar(20) NOT NULL,
  `ibu` varchar(500) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'calon'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`id_utama`, `nama`, `jenis_kel`, `tempat_lahir`, `tgl_lahir`, `tgl_daftar`, `agama`, `photo`, `ayah`, `kerja_ayah`, `ibu`, `telepon`, `alamat`, `status`) VALUES
(100, 'AJI PRIYA', 'Laki-Laki', 'JAKARTA', '2016-06-13', '2016-08-11', 'Islam', '', 'BAGAS ADI', 'PNS', 'DITA', '089439938339', 'JL DUREN TIGA BARAT 6', 'aktif'),
(101, 'FAJRI RIZKI', 'Perempuan', 'JAKARTA', '2016-08-11', '2016-08-11', 'Islam', '', 'GILANG', 'PNS', 'Ayu Ting ip', '0894833993', 'JL WARUNG JATI BARAT 8', 'aktif'),
(104, 'ATANG PRABU', 'Laki-Laki', 'BANDUNG', '2016-06-07', '2016-08-11', 'Islam', '20150722141516.JPG', 'ASDSAD', 'Wiraswasta', 'DASDSADSADA', '3232311', 'JL PETUKANGAN 5', 'aktif'),
(106, 'PUTRI SOFIYA', 'Perempuan', 'MANADO', '2006-04-04', '2016-08-11', 'Islam', '20150722141601.JPG', 'AJI', 'Pegawai Swasta', 'MARSINAH', '0876747484', 'JL KAMPUNG RAWA 3', 'aktif'),
(109, 'NOVIANI WIDYA', 'Perempuan', 'KARAWANG', '2008-03-08', '2016-08-13', 'Islam', '.20150722141511.jpg', 'YANTO', 'Pegawai Swasta', 'NUR', '097484488494', 'JL KEMANGGISAN 67', 'aktif'),
(110, 'TRIANTO FAJAR', 'Laki-Laki', 'JAKARTA', '2006-08-08', '2016-08-21', 'Islam', '.20150722141556.JPG', 'GILANG', 'Buruh', 'OLEH', '021383938736', 'JL DUREN TIGA BARAT 6', 'aktif'),
(125, 'MUHAMMAD SALIM', 'Laki-Laki', 'BANDUNG', '2016-08-08', '2016-08-25', 'Islam', '.20150723073953.jpg', 'GILANG', 'Pegawai Swasta', 'DIER', '021-474843930', 'JL WARUNG JATI BARAT 8', 'aktif'),
(128, 'WARDATUL JANNAH', 'Perempuan', 'JAKARTA', '2000-12-04', '2016-11-22', 'Islam', '', 'JAMAL', 'PNS', 'IBU', '021232424', 'TEBET', 'aktif'),
(129, 'LELI ATIKOH', 'Perempuan', 'KEBUMEN', '2012-05-11', '2016-11-29', 'Islam', '', 'AYAH', 'PNS', 'IBU', '0213930940', 'KEBUMEN', 'aktif'),
(130, 'MUHAMMAD ADITYA', 'Laki-Laki', 'BANDUNG', '2014-04-11', '2016-11-30', 'Islam', '', 'INTO', 'PNS', 'AQIL', '02132344434', 'JL KEBAGUSAN', 'aktif'),
(131, 'ADIT KARNO', 'Laki-Laki', 'SEMARANG', '2013-01-11', '2016-11-30', 'Islam', '', 'POLI', 'Wiraswasta', 'IDEM', '021348483930', 'JL.PASAR MINGGU 20', 'aktif'),
(133, 'SYARIF', 'Laki-Laki', 'JAKARTA', '2012-04-12', '2016-12-06', 'Islam', '101729_christian-gonzales - Copy.jpg', 'BAYU', 'Wiraswasta', 'IBU', '02134849400', 'JL PASAR MINGGU 12', 'aktif'),
(134, 'AMATULLAH', 'Laki-Laki', 'SURABAYA', '2014-01-12', '2016-12-06', 'Islam', '', 'HILMAN', 'PNS', 'AAK', '02132344434', 'JL PASAR MINGGU 12', 'aktif'),
(137, 'NUR AINI', 'Perempuan', 'JAKARTA', '2013-09-05', '2016-12-29', 'Islam', '3.jpg', 'MARI', 'Buruh', 'MIRA', '085777333400', 'PULO JAHE', 'aktif'),
(139, 'INDAH PRATIWI', 'Perempuan', 'JAKARTA', '2014-01-09', '2017-01-02', 'Islam', '6.jpg', 'HARTONO', 'Pegawai Swasta', 'TIA NINGSIH', '083821921008', 'JL. KALIBATA 2 JAKARTA SELATAN', 'aktif'),
(140, 'MUHAMMAD HAIDAR', 'Laki-Laki', 'JAKARTA', '2016-01-05', '2017-01-11', 'Islam', '8.jpg', 'ILHAM ANTO', 'PNS', 'RUMANA', '0213039229', 'JL PASAR MINGGU 78', 'calon'),
(141, 'SULIS', 'Perempuan', 'BANDUNG', '2014-02-19', '2017-02-18', 'Islam', '', 'BANU', 'Pegawai Swasta', 'ANI', '08893023231', 'JL. Kalimalang 2', 'calon'),
(142, 'DIRGA', 'Laki-Laki', 'JAKARTA', '2013-02-19', '2017-02-18', 'Islam', 'photo/dada.jpg', 'HILMAN', 'Wiraswasta', 'FARIDA', '0921389131', 'JL DUREN TIGA BARAT 5', 'calon'),
(143, 'HAMAM', 'Laki-Laki', 'JAKARTA', '2013-02-18', '2017-02-18', 'Islam', '10.jpg', 'DADANG', 'Wiraswasta', 'DINA', '09338242983', 'JL BUNCIT RAYA NO 9', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` varchar(20) NOT NULL,
  `nama_kelas` varchar(30) NOT NULL,
  `daya_tampung` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `daya_tampung`) VALUES
('A101', 'A-1', 30),
('A102', 'A-2', 30),
('A103', 'B-1', 30),
('A104', 'B-2', 30);

-- --------------------------------------------------------

--
-- Table structure for table `kelas_siswa`
--

CREATE TABLE `kelas_siswa` (
  `id_siswa` int(11) NOT NULL,
  `id_biodata` int(20) NOT NULL,
  `kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas_siswa`
--

INSERT INTO `kelas_siswa` (`id_siswa`, `id_biodata`, `kelas`) VALUES
(3, 0, 'A-2'),
(4, 125, 'A-1'),
(8, 0, 'A103'),
(9, 0, 'A103'),
(10, 0, 'A102'),
(11, 0, 'A102'),
(12, 0, 'A102'),
(13, 0, 'A101'),
(14, 0, 'A101'),
(15, 0, 'A103'),
(16, 110, 'A-2'),
(18, 101, 'A-2'),
(20, 109, 'A-2'),
(22, 100, 'A-1'),
(25, 104, 'A-2'),
(26, 128, 'A-2'),
(27, 129, 'A-2'),
(28, 130, 'A-1'),
(29, 131, 'A-2'),
(30, 133, 'A-2'),
(32, 137, 'A-1'),
(33, 139, 'A-1'),
(34, 134, 'A-1'),
(35, 143, 'B-1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bayar`
--

CREATE TABLE `tbl_bayar` (
  `id_bayar` int(20) NOT NULL,
  `id_biodata` int(30) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `total` int(40) NOT NULL,
  `bayar` int(40) NOT NULL,
  `kembali` int(40) NOT NULL,
  `tgl` date NOT NULL,
  `invoice` int(30) NOT NULL,
  `confirm` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bayar`
--

INSERT INTO `tbl_bayar` (`id_bayar`, `id_biodata`, `nama`, `total`, `bayar`, `kembali`, `tgl`, `invoice`, `confirm`) VALUES
(51, 109, '', 220000, 700000, 480000, '0000-00-00', 0, 0),
(52, 106, '', 300000, 500000, 200000, '0000-00-00', 0, 0),
(53, 106, 'PUTRI SOFIYA', 300000, 500000, 200000, '0000-00-00', 0, 0),
(54, 109, 'NOVIANI WIDYA', 220000, 230000, 10000, '0000-00-00', 0, 0),
(55, 109, 'NOVIANI WIDYA', 220000, 250000, 30000, '0000-00-00', 0, 0),
(56, 109, 'NOVIANI WIDYA', 220000, 300000, 80000, '0000-00-00', 0, 0),
(57, 103, '', 230000, 250000, 20000, '0000-00-00', 0, 0),
(58, 103, 'SISKA AMALIA', 230000, 300000, 70000, '0000-00-00', 0, 0),
(59, 109, 'NOVIANI WIDYA', 220000, 250000, 30000, '0000-00-00', 0, 0),
(60, 109, 'NOVIANI WIDYA', 220000, 300000, 80000, '0000-00-00', 0, 0),
(61, 106, 'PUTRI SOFIYA', 300000, 500000, 200000, '0000-00-00', 0, 0),
(62, 106, 'PUTRI SOFIYA', 300000, 500000, 200000, '0000-00-00', 0, 0),
(63, 106, 'PUTRI SOFIYA', 90000, 100000, 10000, '0000-00-00', 0, 0),
(64, 104, '', 90000, 100000, 10000, '2016-11-25', 0, 0),
(65, 104, 'ATANG PRABU', 50000, 70000, 20000, '2016-11-25', 0, 0),
(66, 109, 'NOVIANI WIDYA', 220000, 250000, 30000, '2016-11-19', 0, 0),
(67, 109, 'NOVIANI WIDYA', 40000, 50000, 10000, '2016-11-25', 0, 0),
(68, 109, 'NOVIANI WIDYA', 130000, 150000, 20000, '2016-11-25', 0, 0),
(69, 109, 'NOVIANI WIDYA', 50000, 1200000, 1150000, '2016-11-25', 0, 0),
(70, 109, 'NOVIANI WIDYA', 130000, 20000000, 1870000, '2016-11-25', 0, 0),
(71, 106, 'PUTRI SOFIYA', 50000, 60000, 10000, '2016-11-26', 0, 0),
(72, 103, 'SISKA AMALIA', 230000, 230000, 0, '2016-11-19', 0, 0),
(73, 101, '', 130000, 150000, 20000, '2016-11-27', 0, 0),
(74, 101, 'FAJRI RIZKI', 50000, 60000, 10000, '2016-11-28', 0, 0),
(75, 101, 'FAJRI RIZKI', 50000, 90000, 40000, '2016-11-28', 0, 0),
(76, 109, 'NOVIANI WIDYA', 130000, 150000, 20000, '2016-11-28', 0, 0),
(77, 109, 'NOVIANI WIDYA', 40000, 50000, 10000, '2016-11-28', 0, 0),
(78, 104, 'ATANG PRABU', 50000, 70000, 20000, '2016-11-28', 0, 0),
(79, 101, 'FAJRI RIZKI', 50000, 80000, 30000, '2016-11-28', 0, 0),
(80, 109, 'NOVIANI WIDYA', 130000, 150000, 20000, '2016-11-28', 0, 0),
(81, 106, 'PUTRI SOFIYA', 40000, 50000, 10000, '2016-11-28', 0, 0),
(82, 103, 'SISKA AMALIA', 50000, 100000, 50000, '2016-11-28', 0, 0),
(83, 106, 'PUTRI SOFIYA', 50000, 80000, 30000, '2016-11-28', 0, 0),
(84, 106, 'PUTRI SOFIYA', 50000, 100000, 50000, '2016-11-28', 0, 0),
(85, 106, 'PUTRI SOFIYA', 50000, 100000, 50000, '2016-11-28', 0, 0),
(86, 106, 'PUTRI SOFIYA', 50000, 60000, 10000, '2016-11-28', 0, 0),
(87, 103, 'SISKA AMALIA', 50000, 100000, 50000, '2016-11-28', 0, 0),
(88, 101, 'FAJRI RIZKI', 40000, 500000, 460000, '2016-11-28', 0, 0),
(89, 106, 'PUTRI SOFIYA', 50000, 60000, 10000, '2016-11-28', 0, 0),
(90, 103, 'SISKA AMALIA', 50000, 60000, 10000, '2016-11-28', 0, 0),
(91, 103, 'SISKA AMALIA', 180000, 200000, 20000, '2016-11-28', 0, 0),
(92, 106, 'PUTRI SOFIYA', 90000, 100000, 10000, '2016-11-28', 0, 0),
(93, 101, 'FAJRI RIZKI', 180000, 1500000, 1320000, '2016-07-23', 720, 1),
(94, 103, 'SISKA AMALIA', 90000, 100000, 10000, '2016-07-21', 307, 1),
(95, 129, '', 260000, 500000, 240000, '2016-11-29', 394, 0),
(96, 129, 'LELI ATIKOH', 90000, 100000, 10000, '2016-07-29', 11, 1),
(97, 130, '', 100000, 200000, 100000, '2016-11-30', 707, 1),
(98, 131, 'ADIT KARNO', 170000, 200000, 30000, '2016-09-14', 500, 1),
(99, 131, 'ADIT KARNO', 40000, 0, 0, '2016-11-30', 908, 1),
(100, 132, 'AJENG NI', 370000, 400000, 30000, '2016-08-12', 672, 1),
(101, 132, 'AJENG NI', 420000, 500000, 80000, '2016-08-16', 474, 1),
(102, 132, 'AJENG NI', 40000, 50000, 10000, '2016-08-22', 960, 1),
(103, 106, 'PUTRI SOFIYA', 40000, 50000, 10000, '2016-12-08', 630, 1),
(104, 132, 'AJENG NI', 50000, 70000, 20000, '2016-08-24', 857, 1),
(105, 132, 'AJENG NI', 180000, 200000, 20000, '2016-09-07', 477, 1),
(106, 103, 'SISKA AMALIA', 170000, 200000, 30000, '2016-09-12', 272, 1),
(107, 132, 'AJENG NI', 50000, 60000, 10000, '2016-12-03', 845, 1),
(108, 130, 'MUHAMMAD ADITYA', 170000, 200000, 30000, '2016-09-14', 619, 0),
(109, 129, 'LELI ATIKOH', 90000, 100000, 10000, '2016-09-19', 423, 1),
(110, 128, 'WARDATUL JANNAH', 180000, 200000, 20000, '2016-12-03', 164, 1),
(111, 130, 'MUHAMMAD ADITYA', 180000, 200000, 20000, '2016-09-20', 482, 1),
(112, 109, 'NOVIANI WIDYA', 130000, 150000, 20000, '2016-12-06', 516, 1),
(113, 133, 'SYARIF', 50000, 100000, 50000, '2016-09-23', 394, 1),
(114, 133, 'SYARIF', 170000, 200000, 30000, '2016-09-24', 232, 1),
(115, 132, 'AJENG NI', 50000, 100000, 50000, '2016-09-18', 921, 1),
(116, 134, 'AMATULLAH', 50000, 100000, 50000, '2016-12-06', 68, 1),
(117, 135, 'INDRIANI', 50000, 100000, 50000, '2016-09-27', 46, 1),
(118, 134, 'AMATULLAH', 130000, 150000, 20000, '2016-12-07', 427, 1),
(119, 106, 'PUTRI SOFIYA', 130000, 150000, 20000, '2016-10-05', 622, 1),
(120, 129, 'LELI ATIKOH', 170000, 200000, 30000, '2016-10-14', 215, 1),
(121, 134, 'AMATULLAH', 100000, 150000, 50000, '2016-10-17', 622, 1),
(122, 134, 'AMATULLAH', 40000, 50000, 10000, '2016-10-17', 904, 1),
(123, 135, 'INDRIANI', 50000, 100000, 50000, '2016-12-14', 519, 1),
(124, 128, 'WARDATUL JANNAH', 180000, 200000, 20000, '2016-10-28', 515, 1),
(125, 135, 'INDRIANI', 50000, 100000, 50000, '2016-09-29', 565, 1),
(126, 134, 'AMATULLAH', 50000, 100000, 50000, '2016-11-02', 68, 1),
(127, 134, 'AMATULLAH', 130000, 150000, 20000, '2016-11-11', 258, 1),
(128, 132, 'AJENG NI', 50000, 70000, 20000, '2016-11-13', 194, 1),
(129, 130, 'MUHAMMAD ADITYA', 160000, 200000, 40000, '2016-12-20', 205, 1),
(130, 135, 'INDRIANI', 50000, 70000, 20000, '2016-11-15', 239, 1),
(131, 132, 'AJENG NI', 40000, 50000, 10000, '2016-12-24', 900, 0),
(132, 134, 'AMATULLAH', 130000, 200000, 70000, '2016-11-07', 470, 1),
(133, 136, 'SAMSUL HIDAYAT', 30000, 50000, 20000, '2016-12-24', 358, 1),
(134, 128, 'WARDATUL JANNAH', 130000, 150000, 20000, '2016-12-24', 689, 1),
(135, 134, 'AMATULLAH', 30000, 50000, 20000, '2016-12-24', 753, 1),
(136, 103, 'SISKA AMALIA', 40000, 50000, 10000, '2016-12-25', 934, 1),
(137, 134, 'AMATULLAH', 130000, 200000, 70000, '2016-12-28', 697, 0),
(138, 137, 'NUR AINI', 30000, 50000, 20000, '2016-12-29', 648, 1),
(139, 139, 'INDAH PRATIWI', 160000, 200000, 40000, '2017-01-02', 252, 1),
(140, 139, 'INDAH PRATIWI', 40000, 50000, 10000, '2017-01-11', 37, 1),
(141, 130, 'MUHAMMAD ADITYA', 40000, 50000, 10000, '2017-01-14', 904, 1),
(142, 130, 'MUHAMMAD ADITYA', 40000, 50000, 10000, '2017-01-14', 746, 1),
(143, 110, 'TRIANTO FAJAR', 130000, 150000, 20000, '2017-01-14', 101, 1),
(144, 110, 'TRIANTO FAJAR', 210000, 250000, 40000, '2017-02-05', 559, 1),
(145, 143, 'HAMAM', 220000, 250000, 30000, '2017-02-18', 576, 1),
(146, 110, 'TRIANTO FAJAR', 330000, 350000, 20000, '2017-02-19', 498, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `kode_bayar` varchar(20) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `harga` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pembayaran`
--

INSERT INTO `tbl_pembayaran` (`kode_bayar`, `jenis`, `harga`) VALUES
('A001', 'SPP BULANAN', 30000),
('A002', 'SERAGAM ( PAKET )', 130000),
('A003', 'BUKU PAKET', 40000),
('A004', 'FORMULIR PENDAFTARAN', 50000),
('A005', 'STUDY TOUR', 200000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengeluaran`
--

CREATE TABLE `tbl_pengeluaran` (
  `id_keluar` int(20) NOT NULL,
  `jenisKeluar` varchar(50) NOT NULL,
  `qty` int(30) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `harga` int(50) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `bendahara` varchar(40) NOT NULL,
  `total` int(40) NOT NULL,
  `konfirmasi` int(10) NOT NULL,
  `invoice` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengeluaran`
--

INSERT INTO `tbl_pengeluaran` (`id_keluar`, `jenisKeluar`, `qty`, `tgl_keluar`, `harga`, `jumlah`, `bendahara`, `total`, `konfirmasi`, `invoice`) VALUES
(22, 'MEJA', 3, '2016-12-06', 12000, 80000, '', 0, 1, 0),
(24, 'KOMPUTER', 2, '2016-12-06', 1000000, 2000000, '', 0, 1, 0),
(25, 'PRINTER', 2, '2016-12-06', 700000, 1400000, '', 0, 1, 0),
(26, 'SPIDOL', 2, '2016-12-06', 5000, 10000, '', 0, 1, 182),
(27, 'PENGHAPUS', 3, '2016-12-06', 2000, 6000, '', 0, 1, 182),
(28, 'MEJA', 2, '2016-12-06', 100000, 200000, '', 0, 1, 245),
(31, 'JAM', 2, '2016-12-07', 5000, 10000, '', 100000, 1, 630),
(32, 'LAMPU', 3, '2016-12-07', 10000, 30000, '', 100000, 1, 89),
(33, 'MEJA', 2, '2016-12-07', 40000, 80000, '', 100000, 1, 89),
(34, 'PAYUNG', 2, '2016-12-07', 12000, 24000, '', 100000, 1, 771),
(35, 'JAM TANGAN', 2, '2016-12-07', 2000, 4000, '', 100000, 1, 771),
(36, 'PINTU', 2, '2016-12-07', 80000, 160000, '', 100000, 1, 134),
(37, 'KOMPUTER', 2, '2016-07-21', 1000000, 2000000, 'Administrator', 100000, 1, 846),
(38, 'KABEL ROL', 4, '2016-07-16', 30000, 120000, 'Administrator', 100000, 1, 846),
(39, 'ALAT TULIS KANTOR', 2, '2016-08-18', 40000, 80000, 'Administrator', 100000, 1, 165),
(40, 'KACA', 1, '2016-08-20', 20000, 20000, 'Administrator', 100000, 1, 165),
(41, 'ALAT KEBERSIHAN', 2, '2016-09-13', 100000, 200000, 'Administrator', 200000, 1, 637),
(42, 'BUKU PANDUAN BAHASA INGGRIS', 6, '2016-09-14', 40000, 240000, 'Administrator', 240000, 1, 939),
(43, 'KIPAS ANGIN', 2, '2016-10-13', 150000, 300000, 'Administrator', 720000, 1, 953),
(45, 'ORDER SERAGAM', 8, '2016-11-12', 45000, 360000, 'Administrator', 720000, 1, 953),
(46, 'KOMPUTER', 3, '2016-11-06', 120000, 36000, 'Administrator', 36000, 1, 301),
(47, 'JAM', 4, '2016-12-24', 70000, 280000, 'Sri Wahyuni', 280000, 1, 980),
(48, 'DISPENSER', 1, '2016-12-29', 50000, 50000, 'Sri Wahyuni', 50000, 1, 290),
(49, 'ALAT TULIS KANTOR', 2, '2017-01-02', 50000, 100000, 'Sri Wahyuni', 100000, 1, 76),
(50, 'ALAT KEBERSIHAN', 3, '2017-02-18', 10000, 30000, 'Sri Wahyuni', 30000, 1, 460);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_trans` int(30) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `kelas` varchar(40) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `harga` int(50) NOT NULL,
  `kasir` varchar(40) NOT NULL,
  `konfirm` int(5) NOT NULL,
  `invoice` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_trans`, `nama`, `kelas`, `tgl_bayar`, `jenis`, `harga`, `kasir`, `konfirm`, `invoice`) VALUES
(13, 'NOVIANI WIDYA', 'A-2', '2016-11-19', 'SERAGAM ( PAKET )', 130000, '', 1, 0),
(14, 'NOVIANI WIDYA', 'A-2', '2016-11-19', 'SPP BULANAN', 50000, '', 1, 0),
(15, 'SISKA AMALIA', 'B-1', '2016-11-19', 'SPP BULANAN', 50000, '', 1, 0),
(16, 'AJI PRIYA', 'A-1', '2016-11-19', 'SPP BULANAN', 50000, '', 0, 0),
(17, 'SISKA AMALIA', 'B-1', '2016-11-19', 'SPP BULANAN', 50000, '', 1, 400),
(18, 'SISKA AMALIA', 'B-1', '2016-11-19', 'SERAGAM ( PAKET )', 130000, '', 1, 400),
(19, 'AJI PRIYA', 'A-1', '2016-11-19', 'SERAGAM ( PAKET )', 130000, '', 0, 0),
(21, 'PUTRI SOFIYA', 'A-2', '2016-11-19', 'SERAGAM ( PAKET )', 130000, '', 1, 0),
(22, 'PUTRI SOFIYA', 'A-2', '2016-11-19', 'BUKU PAKET', 40000, '', 1, 0),
(23, 'NOVIANI WIDYA', 'A-2', '2016-11-20', 'BUKU PAKET', 40000, '', 1, 0),
(24, 'PUTRI SOFIYA', 'A-2', '2016-11-23', 'SERAGAM ( PAKET )', 130000, '', 1, 0),
(25, 'PUTRI SOFIYA', 'A-2', '2016-11-25', 'FORMULIR PENDAFTARAN', 50000, '', 1, 0),
(26, 'PUTRI SOFIYA', 'A-2', '2016-11-25', 'BUKU PAKET', 40000, '', 1, 0),
(27, 'ATANG PRABU', 'A-2', '2016-11-25', 'SPP BULANAN', 50000, '', 1, 0),
(28, 'ATANG PRABU', 'A-2', '2016-11-25', 'BUKU PAKET', 40000, '', 1, 0),
(29, 'ATANG PRABU', 'A-2', '2016-11-25', 'FORMULIR PENDAFTARAN', 50000, '', 1, 0),
(30, 'NOVIANI WIDYA', 'A-2', '2016-11-25', 'BUKU PAKET', 40000, '', 1, 0),
(31, 'NOVIANI WIDYA', 'A-2', '2016-11-25', 'SERAGAM ( PAKET )', 130000, '', 1, 0),
(32, 'NOVIANI WIDYA', 'A-2', '2016-11-25', 'SPP BULANAN', 50000, '', 1, 0),
(33, 'NOVIANI WIDYA', 'A-2', '2016-11-25', 'SERAGAM ( PAKET )', 130000, '', 1, 0),
(34, 'PUTRI SOFIYA', 'A-2', '2016-11-26', 'FORMULIR PENDAFTARAN', 50000, '', 1, 0),
(35, 'FAJRI RIZKI', 'A103', '2016-11-27', 'SERAGAM ( PAKET )', 130000, '', 1, 0),
(36, 'FAJRI RIZKI', 'A103', '2016-11-28', 'SPP BULANAN', 50000, '', 1, 0),
(37, 'FAJRI RIZKI', 'A103', '2016-11-28', 'FORMULIR PENDAFTARAN', 50000, '', 1, 0),
(38, 'NOVIANI WIDYA', 'A-2', '2016-11-28', 'SERAGAM ( PAKET )', 130000, '', 1, 0),
(39, 'NOVIANI WIDYA', 'A-2', '2016-11-28', 'BUKU PAKET', 40000, '', 1, 0),
(40, 'ATANG PRABU', 'A-2', '2016-11-28', 'SPP BULANAN', 50000, '', 1, 0),
(41, 'FAJRI RIZKI', 'A103', '2016-11-28', 'SPP BULANAN', 50000, '', 1, 0),
(42, 'NOVIANI WIDYA', 'A-2', '2016-11-28', 'SERAGAM ( PAKET )', 130000, '', 1, 0),
(43, 'PUTRI SOFIYA', 'A-2', '2016-11-28', 'BUKU PAKET', 40000, '', 1, 0),
(44, 'SISKA AMALIA', 'B-1', '2016-11-28', 'FORMULIR PENDAFTARAN', 50000, '', 1, 0),
(45, 'PUTRI SOFIYA', 'A-2', '2016-11-28', 'FORMULIR PENDAFTARAN', 50000, '', 1, 0),
(46, 'PUTRI SOFIYA', 'A-2', '2016-11-28', 'SPP BULANAN', 50000, '', 1, 0),
(47, 'PUTRI SOFIYA', 'A-2', '2016-11-28', 'SPP BULANAN', 50000, '', 1, 0),
(48, 'SISKA AMALIA', 'B-1', '2016-11-28', 'SPP BULANAN', 50000, '', 1, 0),
(49, 'FAJRI RIZKI', 'A103', '2016-11-28', 'BUKU PAKET', 40000, '', 1, 0),
(50, 'PUTRI SOFIYA', 'A-2', '2016-11-28', 'SPP BULANAN', 50000, '', 1, 0),
(51, 'SISKA AMALIA', 'B-1', '2016-11-28', 'SPP BULANAN', 50000, '', 1, 0),
(52, 'PUTRI SOFIYA', 'A-2', '2016-11-28', 'SPP BULANAN', 50000, '', 1, 140),
(53, 'PUTRI SOFIYA', 'A-2', '2016-11-28', 'BUKU PAKET', 40000, '', 1, 140),
(54, 'SISKA AMALIA', 'B-1', '2016-11-28', 'SERAGAM ( PAKET )', 130000, '', 1, 837),
(55, 'SISKA AMALIA', 'B-1', '2016-11-28', 'SPP BULANAN', 50000, '', 1, 837),
(56, 'FAJRI RIZKI', 'A103', '2016-11-28', 'SERAGAM ( PAKET )', 130000, '', 1, 720),
(57, 'FAJRI RIZKI', 'A103', '2016-11-28', 'FORMULIR PENDAFTARAN', 50000, '', 1, 720),
(58, 'SISKA AMALIA', 'B-1', '2016-11-29', 'BUKU PAKET', 40000, '', 1, 307),
(59, 'SISKA AMALIA', 'B-1', '2016-11-29', 'SPP BULANAN', 50000, '', 1, 307),
(60, 'LELI ATIKOH', 'A-2', '2016-11-29', 'SERAGAM ( PAKET )', 130000, '', 1, 0),
(61, 'LELI ATIKOH', 'A-2', '2016-11-29', 'SERAGAM ( PAKET )', 130000, '', 1, 0),
(62, 'LELI ATIKOH', 'A-2', '2016-11-29', 'SPP BULANAN', 50000, '', 1, 11),
(63, 'LELI ATIKOH', 'A-2', '2016-11-29', 'BUKU PAKET', 40000, '', 1, 11),
(64, 'MUHAMMAD ADITYA', 'A-1', '2016-11-30', 'FORMULIR PENDAFTARAN', 50000, '', 1, 0),
(65, 'MUHAMMAD ADITYA', 'A-1', '2016-11-30', 'SPP BULANAN', 50000, '', 1, 0),
(66, 'ADIT KARNO', 'A-2', '2016-11-30', 'BUKU PAKET', 40000, '', 1, 500),
(67, 'ADIT KARNO', 'A-2', '2016-11-30', 'SERAGAM ( PAKET )', 130000, '', 1, 500),
(68, 'AJENG NI', '', '2016-11-30', 'FORMULIR PENDAFTARAN', 50000, '', 1, 474),
(69, 'AJENG NI', '', '2016-11-30', 'SPP BULANAN', 50000, '', 1, 474),
(70, 'ADIT KARNO', 'A-2', '2016-11-30', 'BUKU PAKET', 40000, '', 1, 908),
(71, 'AJENG NI', '', '2016-11-30', 'SERAGAM ( PAKET )', 130000, '', 1, 474),
(73, 'AJENG NI', '', '2016-11-30', 'FORMULIR PENDAFTARAN', 50000, '', 1, 474),
(74, 'MUHAMMAD ADITYA', 'A-1', '2016-11-30', 'BUKU PAKET', 40000, '', 1, 619),
(75, 'AJENG NI', '', '2016-11-30', 'FORMULIR PENDAFTARAN', 50000, '', 1, 474),
(76, 'AJENG NI', '', '2016-12-02', 'BUKU PAKET', 40000, '', 1, 474),
(77, 'AJENG NI', '', '2016-12-02', 'SPP BULANAN', 50000, '', 1, 474),
(78, 'AJENG NI', '', '2016-12-02', 'BUKU PAKET', 40000, '', 1, 960),
(79, 'PUTRI SOFIYA', 'A-2', '2016-12-02', 'BUKU PAKET', 40000, '', 1, 630),
(80, 'AJENG NI', '', '2016-12-02', 'SPP BULANAN', 50000, '', 1, 857),
(81, 'AJENG NI', '', '2016-12-02', 'SERAGAM ( PAKET )', 130000, '', 1, 477),
(82, 'AJENG NI', '', '2016-12-02', 'SPP BULANAN', 50000, '', 1, 477),
(83, 'SISKA AMALIA', 'B-1', '2016-12-03', 'BUKU PAKET', 40000, '', 1, 272),
(84, 'SISKA AMALIA', 'B-1', '2016-12-03', 'SERAGAM ( PAKET )', 130000, '', 1, 272),
(85, 'AJENG NI', '', '2016-12-03', 'FORMULIR PENDAFTARAN', 50000, '', 1, 845),
(86, 'MUHAMMAD ADITYA', 'A-1', '2016-12-03', 'SERAGAM ( PAKET )', 130000, '', 1, 619),
(87, 'LELI ATIKOH', 'A-2', '2016-12-03', 'SPP BULANAN', 50000, '', 1, 423),
(88, 'LELI ATIKOH', 'A-2', '2016-12-03', 'BUKU PAKET', 40000, '', 1, 423),
(89, 'WARDATUL JANNAH', 'A-2', '2016-12-03', 'SERAGAM ( PAKET )', 130000, '', 1, 164),
(90, 'WARDATUL JANNAH', 'A-2', '2016-12-03', 'SPP BULANAN', 50000, '', 1, 164),
(91, 'MUHAMMAD ADITYA', 'A-1', '2016-12-06', 'SERAGAM ( PAKET )', 130000, '', 1, 482),
(92, 'MUHAMMAD ADITYA', 'A-1', '2016-12-06', 'SPP BULANAN', 50000, '', 1, 482),
(93, 'NOVIANI WIDYA', 'A-2', '2016-12-06', 'SERAGAM ( PAKET )', 130000, '', 1, 516),
(94, 'SYARIF', '', '2016-12-06', 'FORMULIR PENDAFTARAN', 50000, '', 1, 394),
(95, 'SYARIF', 'A-2', '2016-12-06', 'BUKU PAKET', 40000, '', 1, 232),
(96, 'SYARIF', 'A-2', '2016-12-06', 'SERAGAM ( PAKET )', 130000, '', 1, 232),
(97, 'AJENG NI', '', '2016-12-06', 'FORMULIR PENDAFTARAN', 50000, '', 1, 921),
(98, 'AMATULLAH', '', '2016-12-06', 'FORMULIR PENDAFTARAN', 50000, '', 1, 68),
(99, 'INDRIANI', '', '2016-12-07', 'FORMULIR PENDAFTARAN', 50000, '', 1, 46),
(100, 'AMATULLAH', '', '2016-12-07', 'SERAGAM ( PAKET )', 130000, '', 1, 427),
(101, 'PUTRI SOFIYA', 'A-2', '2016-12-07', 'SERAGAM ( PAKET )', 130000, '', 1, 622),
(102, 'LELI ATIKOH', 'A-2', '2016-12-07', 'BUKU PAKET', 40000, 'Administrator', 1, 215),
(103, 'LELI ATIKOH', 'A-2', '2016-12-07', 'SERAGAM ( PAKET )', 130000, 'Administrator', 1, 215),
(104, 'AMATULLAH', '', '2016-12-07', 'FORMULIR PENDAFTARAN', 50000, 'Administrator', 1, 622),
(105, 'AMATULLAH', '', '2016-12-07', 'SPP BULANAN', 50000, 'Administrator', 1, 622),
(106, 'AMATULLAH', '', '2016-12-07', 'BUKU PAKET', 40000, 'Administrator', 1, 904),
(107, 'INDRIANI', '', '2016-12-07', 'FORMULIR PENDAFTARAN', 50000, 'Administrator', 1, 519),
(108, 'WARDATUL JANNAH', 'A-2', '2016-12-09', 'SERAGAM ( PAKET )', 130000, 'Administrator', 1, 515),
(109, 'WARDATUL JANNAH', 'A-2', '2016-12-09', 'SPP BULANAN', 50000, 'Administrator', 1, 515),
(110, 'INDRIANI', '', '2016-12-12', 'SPP BULANAN', 50000, 'Administrator', 1, 565),
(111, 'AMATULLAH', '', '2016-12-13', 'SPP BULANAN', 50000, 'Administrator', 1, 68),
(112, 'AMATULLAH', '', '2016-12-13', 'SERAGAM ( PAKET )', 130000, 'Administrator', 1, 258),
(113, 'AJENG NI', '', '2016-12-16', 'FORMULIR PENDAFTARAN', 50000, 'Administrator', 1, 194),
(114, 'MUHAMMAD ADITYA', 'A-1', '2016-12-22', 'SERAGAM ( PAKET )', 130000, 'Administrator', 1, 205),
(115, 'MUHAMMAD ADITYA', 'A-1', '2016-12-22', 'SPP BULANAN', 30000, 'Administrator', 1, 205),
(116, 'INDRIANI', '', '2016-12-23', 'FORMULIR PENDAFTARAN', 50000, 'Administrator', 1, 239),
(117, 'AJENG NI', '', '2016-12-24', 'BUKU PAKET', 40000, 'Administrator', 1, 900),
(118, 'AMATULLAH', '', '2016-12-24', 'SERAGAM ( PAKET )', 130000, 'Marwani', 1, 470),
(119, 'SAMSUL HIDAYAT', 'A-1', '2016-12-24', 'SPP BULANAN', 30000, 'Marwani', 1, 358),
(121, 'WARDATUL JANNAH', 'A-2', '2016-12-24', 'SERAGAM ( PAKET )', 130000, 'Marwani', 1, 689),
(122, 'AMATULLAH', '', '2016-12-24', 'SPP BULANAN', 30000, 'Marwani', 1, 753),
(123, 'SISKA AMALIA', 'B-1', '2016-12-25', 'BUKU PAKET', 40000, 'Marwani', 1, 934),
(124, 'AMATULLAH', '', '2016-12-28', 'SERAGAM ( PAKET )', 130000, 'Administrator', 1, 697),
(125, 'NUR AINI', 'A-1', '2016-12-29', 'SPP BULANAN', 30000, 'Marwani', 1, 648),
(126, 'INDAH PRATIWI', 'A-1', '2017-01-02', 'SPP BULANAN', 30000, 'Marwani', 1, 252),
(127, 'INDAH PRATIWI', 'A-1', '2017-01-02', 'SERAGAM ( PAKET )', 130000, 'Marwani', 1, 252),
(129, 'INDAH PRATIWI', 'A-1', '2017-01-11', 'BUKU PAKET', 40000, 'Marwani', 1, 37),
(130, 'MUHAMMAD ADITYA', 'A-1', '2017-01-14', 'BUKU PAKET', 40000, 'Marwani', 1, 904),
(131, 'MUHAMMAD ADITYA', 'A-1', '2017-01-14', 'BUKU PAKET', 40000, 'Marwani', 1, 746),
(132, 'TRIANTO FAJAR', 'A-2', '2017-01-14', 'SERAGAM ( PAKET )', 130000, 'Marwani', 1, 101),
(133, 'TRIANTO FAJAR', 'A-2', '2017-02-05', 'FORMULIR PENDAFTARAN', 50000, 'Marwani', 1, 559),
(134, 'TRIANTO FAJAR', 'A-2', '2017-02-05', 'SERAGAM ( PAKET )', 130000, 'Marwani', 1, 559),
(135, 'TRIANTO FAJAR', 'A-2', '2017-02-05', 'SPP BULANAN', 30000, 'Marwani', 1, 559),
(136, 'HAMAM', 'B-1', '2017-02-18', 'FORMULIR PENDAFTARAN', 50000, 'Marwani', 1, 576),
(137, 'HAMAM', 'B-1', '2017-02-18', 'SERAGAM ( PAKET )', 130000, 'Marwani', 1, 576),
(138, 'HAMAM', 'B-1', '2017-02-18', 'BUKU PAKET', 40000, 'Marwani', 1, 576),
(139, 'TRIANTO FAJAR', 'A-2', '2017-02-19', 'SERAGAM ( PAKET )', 130000, 'Marwani', 1, 498),
(140, 'TRIANTO FAJAR', 'A-2', '2017-02-19', 'STUDY TOUR', 200000, 'Marwani', 1, 498);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(20) NOT NULL,
  `TUser` varchar(50) NOT NULL,
  `TPass` varchar(80) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `TUser`, `TPass`, `nama`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'admin'),
(9, 'novi', 'e5aef89fdd6afdd63e0114c852b0f74c', 'NOVIANI', 'TUsaha'),
(11, 'tini', '9403f9495ba5e4fab4197e21a9118814', 'Sumartini', 'TUsaha'),
(12, 'marwani', 'c7911af3adbd12a035b289556d96470a', 'Marwani', 'Kasir'),
(13, 'yuni', 'c9ccd7f3c1145515a9d3f7415d5bcbea', 'Sri Wahyuni', 'Bendahara'),
(14, 'lia', '870f669e4bbbfa8a6fde65549826d1c4', 'Hj. Fahmalia', 'Kepala');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id_utama`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tbl_bayar`
--
ALTER TABLE `tbl_bayar`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`kode_bayar`);

--
-- Indexes for table `tbl_pengeluaran`
--
ALTER TABLE `tbl_pengeluaran`
  ADD PRIMARY KEY (`id_keluar`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_trans`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id_utama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;
--
-- AUTO_INCREMENT for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `tbl_bayar`
--
ALTER TABLE `tbl_bayar`
  MODIFY `id_bayar` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;
--
-- AUTO_INCREMENT for table `tbl_pengeluaran`
--
ALTER TABLE `tbl_pengeluaran`
  MODIFY `id_keluar` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_trans` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
