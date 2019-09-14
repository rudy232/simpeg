-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 15 Jan 2018 pada 14.54
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rsudcili_simpeg`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `chart_jenis_kelamin`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `chart_jenis_kelamin` (
`total` bigint(21)
,`jenis_kelamin` varchar(1)
,`unit_kerja` varchar(40)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `chart_jenis_kelamin2`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `chart_jenis_kelamin2` (
`total` bigint(21)
,`jenis_kelamin` varchar(1)
,`unit_kerja` varchar(40)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_cuti`
--

CREATE TABLE `data_cuti` (
  `id_cuti` int(11) NOT NULL,
  `id_data_pegawai` int(11) NOT NULL,
  `id_pengganti` int(11) NOT NULL,
  `tanggal_pengajuan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bulan_surat` varchar(20) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `panggilan` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `nrk` varchar(15) NOT NULL,
  `pangkat` varchar(15) NOT NULL,
  `golongan` varchar(10) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `unit_kerja` varchar(50) NOT NULL,
  `lama_angka` int(11) NOT NULL,
  `lama_huruf` varchar(25) NOT NULL,
  `awal` date NOT NULL,
  `bulan_awal` varchar(2) NOT NULL,
  `akhir` date NOT NULL,
  `bulan_akhir` varchar(2) NOT NULL,
  `jml_hari_libur` int(11) NOT NULL,
  `tanggal_libur` varchar(50) NOT NULL,
  `lokasi` varchar(20) NOT NULL,
  `nomor` varchar(15) NOT NULL,
  `pengganti` varchar(50) NOT NULL,
  `nip_pengganti` varchar(25) NOT NULL,
  `pangkat_pengganti` varchar(15) NOT NULL,
  `atasan_langsung` varchar(50) NOT NULL,
  `nip_atasan` varchar(25) NOT NULL,
  `sisa_cuti` int(11) NOT NULL,
  `total_cuti` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `status_print` varchar(6) NOT NULL,
  `status_cuti` varchar(5) NOT NULL,
  `alasan_cuti` varchar(522) NOT NULL,
  `tahun` varchar(50) NOT NULL,
  `real_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_cuti`
--

INSERT INTO `data_cuti` (`id_cuti`, `id_data_pegawai`, `id_pengganti`, `tanggal_pengajuan`, `bulan_surat`, `gender`, `panggilan`, `nama`, `nip`, `nrk`, `pangkat`, `golongan`, `jabatan`, `unit_kerja`, `lama_angka`, `lama_huruf`, `awal`, `bulan_awal`, `akhir`, `bulan_akhir`, `jml_hari_libur`, `tanggal_libur`, `lokasi`, `nomor`, `pengganti`, `nip_pengganti`, `pangkat_pengganti`, `atasan_langsung`, `nip_atasan`, `sisa_cuti`, `total_cuti`, `status`, `status_print`, `status_cuti`, `alasan_cuti`, `tahun`, `real_time`) VALUES
(19, 1776, 0, '2017-12-04 04:54:41', 'December 2017', 'l', 'Sdra', 'Hendri Powan', '', '', '', '', 'Perawat Umum  ', 'PERAWAT IGD', 12, 'Dua Belas', '2018-01-01', '1', '2018-01-12', '1', 0, '0', 'Kalimantan', '85773463346', 'Reno Anggriyanto', '', '', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', 0, 12, 'Setujui', 'Sudah', 'Cuti', '', '01-2018', '2017-12-04'),
(20, 1788, 0, '2017-12-04 07:41:51', 'December 2017', 'p', 'Sdri', 'Difa Ariestha', '', '', '', '', '', 'LOKET', 7, 'Tujuh', '2018-03-22', '3', '2018-03-29', '3', 1, '25', 'Jepara', '87830591427', 'Rusniansyah', '', '', 'Mustomi, SE.MM', '196404181986031010', 11, 18, 'Menunggu', 'Belum', 'Cuti', '', '03-2018', '2017-12-04'),
(21, 1745, 0, '2017-12-04 07:49:23', 'December 2017', 'p', 'Sdri', 'Ulfah Armita', '', '', '', '', '', 'LOKET', 9, 'Sembilan', '2018-06-20', '6', '2018-06-28', '6', 0, '0', 'Padang', '82173040442', 'Dwi Eva Nurvega', '', '', 'Mustomi, SE.MM', '196404181986031010', 3, 12, 'Menunggu', 'Belum', 'Cuti', '', '06-2018', '2017-12-04'),
(25, 1808, 0, '2017-12-05 00:49:25', 'December 2017', 'p', 'Sdri', 'Risky Annisa', '', '', '', '', 'Administrasi ', 'LOKET', 6, 'Enam', '2018-04-03', '4', '2018-04-08', '4', 0, '0', 'Pacitan', '89653205429', 'Novia Chilfi', '', '', 'Mustomi, SE.MM', '196404181986031010', 12, 18, 'Menunggu', 'Belum', 'Cuti', '', '04-2018', '2017-12-05'),
(26, 1810, 0, '2017-12-05 00:51:17', 'December 2017', 'p', 'Sdri', 'Leistyana Maharinie', '', '', '', '', 'Administrasi ', 'LOKET', 7, 'Tujuh', '2018-01-13', '1', '2018-01-19', '1', 0, '0', 'Jakarta', '89519367234', 'Ayu Sintya', '', '', 'Mustomi, SE.MM', '196404181986031010', 5, 12, 'Setujui', 'Sudah', 'Cuti', '', '01-2018', '2017-12-05'),
(28, 1691, 0, '2017-12-05 05:44:22', 'December 2017', 'l', 'Sdra', 'dr. Dwian Andhika', '198311072010011021', '179714', 'Penata', 'III.c', 'Kepala Seksi Pelayanan Me ', 'KEPALA SEKSI PELAYANAN MEDIS', 9, 'Sembilan', '2018-01-16', '1', '2018-01-26', '1', 2, '20,21', 'Makkah', '87784530379', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', 'Pembina Tk.1 ', 'dr. Netty Siahaan, M.K.M', '196104241987112001', 3, 12, 'Setujui', 'Sudah', 'Cuti', '', '01-2018', '2017-12-05'),
(29, 1809, 0, '2017-12-05 07:11:23', 'December 2017', 'p', 'Sdri', 'Novia Chilfi', '', '', '', '', '', 'LOKET', 5, 'Lima', '2018-01-22', '1', '2018-01-26', '1', 0, '0', 'Lampung', '82112951054', 'Risky Annisa', '', '', 'Mustomi, SE.MM', '196404181986031010', 7, 12, 'Setujui', 'Belum', 'Cuti', '', '01-2018', '2017-12-05'),
(30, 1802, 0, '2017-12-05 07:33:09', 'December 2017', 'p', 'Sdri', 'Nurhayati', '', '', '', '', '', 'RAWAT INAP', 12, 'Dua Belas', '2018-01-04', '1', '2018-01-15', '1', 0, '0', 'Bandung', '81212812573', 'Evi Apniasari', '', '', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', 17, 5, 'Setujui', 'Sudah', 'Cuti', '', '01-2018', '2017-12-05'),
(33, 1723, 0, '2017-12-05 08:13:01', 'December 2017', 'p', 'Sdri', 'Indah Gayuh Prestanty', '', '', '', '', 'Perawat Umum ', 'LABORATURIUM', 6, 'Enam', '2018-03-06', '3', '2018-03-11', '3', 0, '0', 'Yogyakarta', '083875261519', 'Sri Herlinah', '', '', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', 12, 18, 'Menunggu', 'Belum', 'Cuti', '', '03-2018', '2017-12-05'),
(34, 1720, 0, '2017-12-05 08:42:31', 'December 2017', 'p', 'Sdri', 'Sri Herlinah', '', '', '', '', '', 'RAWAT INAP', 6, 'Enam', '2018-02-23', '02', '2018-02-28', '02', 0, '', 'Pekalongan', '85776665369', 'Dita Tias Tiara', '', '', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', 12, 18, 'Setujui', 'Belum', 'Cuti', '', '02-2018', '2017-12-05'),
(35, 1731, 0, '2017-12-06 01:00:30', 'December 2017', 'p', 'Sdri', 'Ratna Dewi Pujawati', '', '', '', '', 'Bidan  ', 'RUANG BERSALIN', 5, 'Lima', '2018-01-04', '1', '2018-01-08', '1', 0, '0', 'Semarang', '82122688828', 'Astrid Septeria Debora', '', '', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', 12, 17, 'Setujui', 'Sudah', 'Cuti', '', '01-2018', '2017-12-06'),
(38, 1774, 0, '2017-12-11 01:11:45', 'December 2017', 'l', 'Sdra', 'Ayep Wijaya', '', '', '', '', '', 'PERAWAT IGD', 3, 'Tiga', '2018-01-16', '01', '2018-01-18', '01', 0, '', 'Pandeglang', '85814391218', 'Dwi Soffyan N.A', '', '', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', 9, 12, 'Setujui', 'Sudah', 'Cuti', '', '01-2018', '2017-12-11'),
(39, 1721, 0, '2017-12-11 01:17:07', 'December 2017', 'p', '', 'Lutfiyah Anggraini', '', '', '', '', 'Perawat Umum  ', 'RAWAT INAP', 3, 'Tiga', '2018-01-01', '1', '2018-01-03', '1', 0, '0', 'Lampung', '81280891124', 'Sri Herlinah', '', '', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', 13, 16, 'Setujui', 'Sudah', 'Cuti', '', '01-2018', '2017-12-11'),
(43, 1817, 0, '2017-12-11 11:06:50', 'December 2017', 'l', 'Sdra', 'Asido Partogi.Manurung', '', '', '', '', 'Administrasi ', 'KEPEGAWAIAN', 6, 'Enam', '2018-04-12', '4', '2018-04-19', '4', 2, '15,16', 'Medan', '81376179196', 'Deni Muhamad Syahrul', '', '', 'Mustomi, SE.MM', '196404181986031010', 6, 12, 'Menunggu', 'Belum', 'Cuti', '', '04-2018', '2017-12-11'),
(48, 1749, 0, '2017-12-14 00:46:56', 'December 2017', 'p', 'Sdri', 'Vita Pratiwi', '', '', '', '', '', 'APOTEKER', 12, 'Dua Belas', '2018-02-01', '2', '2018-02-12', '2', 0, '0', 'Jawa Timur', '81291369629', 'Hartyaningsih Lumintu', '', '', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', 6, 18, 'Menunggu', 'Belum', 'Cuti', '', '02-2018', '2017-12-14'),
(50, 1704, 0, '2017-12-18 05:47:20', 'December 2017', 'p', 'Sdri', 'Mei Duma Ria Purba', '197505161997032002', '123140', 'Penata Muda ', 'III.a', 'Pranata Laboraturium Kese ', 'LABORATURIUM', 8, 'Delapan', '2017-12-20', '12', '2018-01-02', '1', 6, '23,24,25,30,31,1', 'Medan', '81288231163', 'Nurhidayat', '', '', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', 4, 12, 'Setujui', 'Belum', 'Cuti', '', '12-2017', '2017-12-18'),
(55, 1775, 0, '2017-12-19 07:56:03', 'December 2017', 'l', 'Sdra', 'Ma\'Sum', '', '', '', '', 'Perawat Umum  ', 'PERAWAT IGD', 3, 'Tiga', '2018-01-06', '1', '2018-01-08', '1', 0, '0', 'Cirebon', '817777580', 'Yudendi', '', '', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', 9, 12, 'Setujui', 'Sudah', 'Cuti', '', '01-2018', '2017-12-19'),
(58, 1767, 0, '2017-12-20 01:08:10', 'December 2017', 'p', 'Sdri', 'Putri Reno Yori', '', '', '', '', 'bidan', 'RUANG BERSALIN', 8, 'Delapan', '2018-04-21', '4', '2018-04-28', '4', 0, '0', 'nikah', '81284666053', 'Astrid Septeria Debora', '', '', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', 7, 17, 'Menunggu', '', 'Cuti', '', '04-2018', '0000-00-00'),
(59, 1767, 0, '2017-12-20 01:09:39', 'December 2017', 'p', 'Sdri', 'Putri Reno Yori', '', '', '', '', 'bidan', 'RUANG BERSALIN', 4, 'Empat', '2018-06-16', '6', '2018-06-19', '6', 0, '0', 'pulang kampung', '81284666053', 'Astrid Septeria Debora', '', '', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', 3, 17, 'Menunggu', '', 'Cuti', '', '06-2018', '0000-00-00'),
(60, 1791, 0, '2017-12-20 08:01:09', 'December 2017', 'p', 'Sdri', 'Dwi Jayanti Mursidah', '', '', '', '', '', 'POLI RAWAT JALAN', 8, 'Delapan', '2018-02-15', '02', '2018-02-24', '02', 2, '16,17', 'kebumen', '87878371696', 'Citra Sherly Febriyanty', '', '', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', 10, 18, 'Setujui', '', 'Cuti', '', '02-2018', '0000-00-00'),
(65, 1805, 1802, '2017-12-21 03:57:59', 'December 2017', 'p', 'Sdri', 'Evi Apniasari', '', '', '', '', 'Perawat Umum  ', 'RAWAT INAP', 12, 'Dua Belas', '2018-01-17', '1', '2018-01-28', '1', 0, '0', 'Yogyakarta', '81323035914', 'Nurhayati', '', '', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', 6, 18, 'Setujui', 'Sudah', 'Cuti', '', '01-2018', '2017-12-21'),
(66, 1793, 1804, '2017-12-21 04:04:06', 'December 2017', 'p', 'Sdri', 'Darojatul Hulwiyah', '', '', '', '', 'Perawat Umum  ', 'RAWAT INAP', 12, 'Dua Belas', '2018-01-29', '1', '2018-02-09', '2', 0, '0', 'Makkah', '89622026945', 'Vina Rahayu', '', '', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', 6, 18, 'Setujui', 'Sudah', 'Cuti', '', '01-2018', '2017-12-21'),
(69, 1712, 1720, '2017-12-21 07:03:42', 'December 2017', 'p', 'Sdri', 'Elin Budiani', '', '', '', '', 'PERAWAT', 'RAWAT INAP', 12, 'Dua Belas', '2018-06-11', '6', '2018-06-25', '6', 3, '15,16,17', 'PALEMBANG', '81290931988', 'Sri Herlinah', '', '', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', 0, 12, 'Menunggu', 'Belum', 'Cuti', '', '06-2018', '0000-00-00'),
(70, 1787, 1755, '2017-12-21 07:13:55', 'December 2017', 'l', 'Sdra', 'Shidiq Umar Muchtar', '', '', '', '', '', 'LOKET', 5, 'Lima', '2018-01-08', '1', '2018-01-12', '1', 0, '0', 'bandung', '8989732821', 'Dwi Eva Nurvega', '', '', 'Mustomi, SE.MM', '196404181986031010', 10, 15, 'Setujui', 'Sudah', 'Cuti', '', '01-2018', '0000-00-00'),
(72, 1743, 1753, '2017-12-21 07:30:22', 'December 2017', 'l', 'Sdra', 'Pijar Dwi Aditia', '', '', '', '', 'administrasi', 'KEUANGAN', 5, 'Lima', '2018-01-22', '1', '2018-01-26', '1', 0, '0', 'bandung', '82110968553', 'Theresia Oktavina. T', '', '', 'Mustomi, SE.MM', '196404181986031010', 13, 18, 'Setujui', 'Sudah', 'Cuti', '', '01-2018', '0000-00-00'),
(73, 1826, 1718, '2017-12-21 07:36:21', 'December 2017', 'l', 'Sdra', 'Asep Supriyatna', '', '', '', '', 'PERAWAT UMUM', 'POLI RAWAT JALAN', 4, 'Empat', '2018-08-11', '8', '2018-08-15', '8', 1, '12', 'yogyakarta', '83898091639', 'Siti Fazriyah', '', '', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', 8, 12, 'Menunggu', 'Belum', 'Cuti', '', '08-2018', '0000-00-00'),
(77, 1702, 1703, '2017-12-21 08:08:55', 'December 2017', 'p', 'Sdri', 'Dian Khairunisa, S.Kep', '197910242006042003', '165753', 'Penata Muda Tk ', 'III.b ', 'Bendahara', 'KEUANGAN', 6, 'Enam', '2018-06-11', '6', '2018-06-21', '6', 5, '14,15,16,17,18', 'Padang', '0852 8547 4495', 'Enggum Gumih, A.Md.Kep', '197408081997032002', 'Penata Muda', 'Mustomi, SE.MM', '196404181986031010', 6, 15, 'Menunggu', 'Belum', 'Cuti', '', '06-2018', '0000-00-00'),
(80, 1761, 1772, '2017-12-21 09:45:08', 'December 2017', 'p', 'Sdri', 'Rismalia', '', '', '', '', '', 'PERAWAT IGD', 6, 'Enam', '2018-06-16', '06', '2018-06-21', '06', 0, '0', 'Solo', '85719098929', 'Dwi Soffyan N.A', '', '', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', 6, 12, 'Menunggu', 'Belum', 'Cuti', '', '06-2018', '2017-12-21'),
(81, 1765, 1776, '2017-12-21 09:47:12', 'December 2017', 'l', 'Sdra', 'Reno Anggriyanto', '', '', '', '', '', 'PERAWAT IGD', 7, 'Tujuh', '2018-06-09', '06', '2018-06-15', '06', 0, '0', 'Brebes', '085894532894', 'Hendri Powan', '', '', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', 11, 18, 'Menunggu', 'Belum', 'Cuti', '', '06-2018', '2017-12-21'),
(83, 1759, 1749, '2017-12-21 14:32:14', 'December 2017', 'p', 'Sdri', 'Putri Utami', '', '', '', '', '', 'APOTEKER', 5, 'Lima', '2018-06-15', '6', '2018-06-19', '6', 0, '0', 'madura', '8568805838', 'Vita Pratiwi', '', '', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', 7, 12, 'Menunggu', 'Belum', 'Cuti', '', '06-2018', '0000-00-00'),
(84, 1717, 1776, '2017-12-22 01:31:31', 'December 2017', 'p', 'Sdri', 'Nuurul Awaliatun Ni\'Mah', '', '', '', '', 'Perawat Umum', 'PERAWAT IGD', 7, 'Tujuh', '2018-06-24', '6', '2018-06-30', '6', 0, '0', 'Lamongan', '8973837507', 'Hendri Powan', '', '', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', 5, 12, 'Menunggu', 'Belum', 'Cuti', '', '06-2018', '0000-00-00'),
(85, 1688, 0, '2017-12-04 14:27:51', 'December 2017', 'p', 'Sdri', 'dr. Netty Siahaan, M.K.M', '196104241987112001', '127822', 'Pembina Tk.1 ', 'IV.b', 'Direktur ', 'DIREKTUR', 1, 'Satu', '2017-02-13', '2', '2017-02-13', '2', 0, '0', 'Jakarta', '8158778633', 'dr. Nailah, M.Si', '197710212006042000', 'III.c', 'dr. R. Koesmedi Priharto, Sp.OT.M.Kes', '195808071987031007', 11, 12, 'Setujui', 'Sudah', 'Cuti', '', '02-2017', '2017-12-04'),
(86, 1688, 0, '2017-12-04 14:31:01', 'December 2017', 'p', 'Sdri', 'dr. Netty Siahaan, M.K.M', '196104241987112001', '127822', 'Pembina Tk.1 ', 'IV.b', 'Direktur ', 'DIREKTUR', 8, 'Delapan', '2017-09-11', '9', '2017-09-20', '9', 2, '16,17', 'Jakarta', '8158778633', 'dr. Nailah, M.Si', '197710212006042000', 'III.c', 'dr. R. Koesmedi Priharto, Sp.OT.M.Kes', '195808071987031007', 3, 12, 'Setujui', 'Sudah', 'Cuti', '', '09-2017', '2017-12-04'),
(87, 1690, 0, '2017-12-04 14:35:13', 'December 2017', 'p', 'Sdri', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', '125483', 'Pembina Tk.1 ', 'IV.b', 'Kepala Seksi Penunjang Me ', 'KEPALA SESKSI PENUNJANG MEDIS', 6, 'Enam', '2017-05-10', '5', '2017-05-18', '5', 3, '11,13,14', 'Makkah', '87823804550', 'dr. Dwian Andhika', '198311072010011000', 'Penata', 'dr. Netty Siahaan, M.K.M', '196104241987112001', 6, 12, 'Setujui', 'Sudah', 'Cuti', '', '05-2017', '2017-12-04'),
(88, 1690, 0, '2017-12-04 14:37:15', 'December 2017', 'p', 'Sdri', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', '125483', 'Pembina Tk.1 ', 'IV.b', 'Kepala Seksi Penunjang Me ', 'KEPALA SESKSI PENUNJANG MEDIS', 3, 'Tiga', '2017-10-19', '10', '2017-10-23', '10', 2, '21,22', 'Jakarta', '87823804550', 'dr. Dwian Andhika', '198311072010011000', 'Penata', 'dr. Netty Siahaan, M.K.M', '196104241987112001', 3, 12, 'Setujui', 'Sudah', 'Cuti', '', '10-2017', '2017-12-04'),
(89, 1689, 0, '2017-12-04 14:42:44', 'December 2017', 'l', 'Sdra', 'Mustomi, Se.Mm', '196404181986031010', '107484', 'Pembina ', 'IV.a', 'Kepala Sub Bagian Tata Us', 'KEPALA SUB BAGIAN TATA USAHA', 5, 'Lima', '2017-01-04', '1', '2017-01-10', '1', 2, '7,8', 'Jakarta', '081381127168', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032000', 'Pembina Tk.1 ', 'dr. Netty Siahaan, M.K.M', '196104241987112001', 7, 12, 'Setujui', 'Sudah', 'Cuti', '', '01-2017', '2017-12-04'),
(91, 1692, 0, '2017-12-04 14:48:41', 'December 2017', 'l', 'Sdra', 'dr. Riki Tsan, Sp.M', '196212121988121002', '162195', 'Pembina', ' IV.a', 'Dokter Madya ', 'DOKTER SPESIALIS', 3, 'Tiga', '2017-03-02', '3', '2017-03-04', '3', 0, '0', 'Bandung', '81316919313', 'dr. Layli Rahmawati', '197707092006042000', 'Penata Tk.1 ', 'dr. Dwian Andhika', '198311072010011021', 9, 12, 'Setujui', 'Sudah', 'Cuti', '', '03-2017', '2017-12-04'),
(92, 1692, 0, '2017-12-04 14:54:46', 'December 2017', 'l', 'Sdra', 'dr. Riki Tsan, Sp.M', '196212121988121002', '162195', 'Pembina', ' IV.a', 'Dokter Madya ', 'DOKTER SPESIALIS', 4, 'Empat', '2017-05-31', '5', '2017-06-05', '6', 2, '1,4', 'Jakarta', '81316919313', 'dr. Layli Rahmawati', '197707092006042000', 'Penata Tk.1 ', 'dr. Dwian Andhika', '198311072010011021', 5, 12, 'Setujui', 'Sudah', 'Cuti', '', '05-2017', '2017-12-04'),
(93, 1692, 0, '2017-12-04 14:58:22', 'December 2017', 'l', 'Sdra', 'dr. Riki Tsan, Sp.M', '196212121988121002', '162195', 'Pembina', ' IV.a', 'Dokter Madya ', 'DOKTER SPESIALIS', 3, 'Tiga', '2017-09-27', '9', '2017-09-29', '9', 0, '0', 'Jakarta', '81316919313', 'dr. Layli Rahmawati', '197707092006042000', 'Penata Tk.1 ', 'dr. Dwian Andhika', '198311072010011021', 2, 12, 'Setujui', 'Sudah', 'Cuti', '', '09-2017', '2017-12-04'),
(94, 1697, 0, '2017-12-04 15:01:22', 'December 2017', 'l', 'Sdra', 'dr.Noviandri Cahyadi Basir', '198711242014031003', '184409', 'Penata Muda Tk ', ' III.b', 'Staf ', 'DOKTER UMUM POLI', 6, 'Enam', '2017-02-09', '2', '2017-02-16', '2', 2, '11,12', 'Padang', '85377391880', 'dr. Layli Rahmawati', '197707092006042000', 'Penata Tk.1 ', 'dr. Dwian Andhika', '198311072010011021', 6, 12, 'Setujui', 'Sudah', 'Cuti', '', '02-2017', '2017-12-04'),
(95, 1697, 0, '2017-12-04 15:05:02', 'December 2017', 'l', 'Sdra', 'dr.Noviandri Cahyadi Basir', '198711242014031003', '184409', 'Penata Muda Tk ', ' III.b', 'Staf ', 'DOKTER UMUM POLI', 3, 'Tiga', '2017-08-28', '8', '2017-08-30', '8', 0, '0', 'Jakarta', '85377391880', 'dr. Layli Rahmawati', '197707092006042000', 'Penata Tk.1 ', 'dr. Dwian Andhika', '198311072010011021', 3, 12, 'Setujui', 'Sudah', 'Cuti', '', '08-2017', '2017-12-04'),
(96, 1696, 0, '2017-12-04 15:12:07', 'December 2017', 'p', 'Sdri', 'Sapti Agustini, Bsc', '196008071985032005', '115708', 'Penata', 'III.c', 'Nutrisionis Penyelia ', 'INSTALASI GIZI', 5, 'Lima', '2017-08-25', '8', '2017-08-31', '8', 2, '26,27', 'Jakarta', '81293635718', 'Sari Mulyaningsih', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 7, 12, 'Setujui', 'Sudah', 'Cuti', '', '08-2017', '2017-12-04'),
(97, 1696, 0, '2017-12-04 15:14:45', 'December 2017', 'p', 'Sdri', 'Sapti Agustini, Bsc', '196008071985032005', '115708', 'Penata', 'III.c', 'Nutrisionis Penyelia ', 'INSTALASI GIZI', 7, 'Tujuh', '2017-11-16', '11', '2017-11-24', '11', 2, '18,19', 'Bekasi', '81293635718', 'Sari Mulyaningsih', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 0, 12, 'Setujui', 'Sudah', 'Cuti', '', '11-2017', '2017-12-04'),
(98, 1695, 0, '2017-12-04 15:18:43', 'December 2017', 'p', 'Sdri', 'Hamidah Rahmawati, S.Farm, Apt', '198106052008012026', '171774', 'Penata', 'III.c', 'Apoteker Muda ', 'FARMASI', 3, 'Tiga', '2017-05-03', '5', '2017-05-05', '5', 0, '0', 'Jakarta', '81281154984', 'Maharani Pratiwi, S.Farm, Apt', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 9, 12, 'Setujui', 'Sudah', 'Cuti', '', '05-2017', '2017-12-04'),
(99, 1695, 0, '2017-12-04 15:23:03', 'December 2017', 'p', 'Sdri', 'Hamidah Rahmawati, S.Farm, Apt', '198106052008012026', '171774', 'Penata', 'III.c', 'Apoteker Muda ', 'FARMASI', 6, 'Enam', '2017-11-01', '11', '2017-11-08', '11', 2, '4,5', 'Jakarta', '81281154984', 'Maharani Pratiwi, S.Farm, Apt', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 3, 12, 'Setujui', 'Sudah', 'Cuti', '', '11-2017', '2017-12-04'),
(100, 1694, 0, '2017-12-04 15:29:11', 'December 2017', 'p', 'Sdri', 'Purnama Saragi', '196208191985022002', '123286', 'Penata Tk.1', 'III.d', 'Sanitarian Penyelia ', 'KESLING', 12, 'Dua Belas', '2017-12-13', '12', '2017-12-29', '12', 5, '16,17,23,2', 'Jakarta', '81281817780', 'Yusnani', '196412141987032000', 'Penata Muda Tk ', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 0, 12, 'Setujui', 'Sudah', 'Cuti', '', '12-2017', '2017-12-04'),
(101, 1700, 0, '2017-12-04 15:33:30', 'December 2017', 'p', 'Sdri', 'Insupiani ', '196212031987032008', '162303', 'Penata Muda Tk ', ' III.b', 'Staf Administrasi Tingkat ', 'KASIR', 6, 'Enam', '2017-02-27', '2', '2017-03-06', '3', 2, '4,5', 'Makkah', '85210808033', 'Jumiya', '196307271987031000', 'Penata Muda Tk.', 'Mustomi, SE.MM', '196404181986031010', 6, 12, 'Setujui', 'Sudah', 'Cuti', '', '02-2017', '2017-12-04'),
(102, 1700, 0, '2017-12-04 15:37:04', 'December 2017', 'p', 'Sdri', 'Insupiani ', '196212031987032008', '162303', 'Penata Muda Tk ', ' III.b', 'Staf Administrasi Tingkat ', 'KASIR', 6, 'Enam', '2017-09-20', '9', '2017-09-28', '9', 3, '21,23,24', 'Jakarta', '85210808033', 'Jumiya', '196307271987031000', 'Penata Muda Tk.', 'Mustomi, SE.MM', '196404181986031010', 0, 12, 'Setujui', 'Sudah', 'Cuti', '', '09-2017', '2017-12-04'),
(103, 1701, 0, '2017-12-04 15:40:33', 'December 2017', 'p', 'Sdri', 'Yusnani', '196412141987032004', '110491', 'Penata Muda Tk ', ' III.b', 'Staf Administrasi Tingkat ', 'KASIR', 6, 'Enam', '2017-11-23', '11', '2017-11-30', '11', 2, '25,26', 'Jakarta', '81284242585', 'Insupiani ', '196212031987032000', 'Penata Muda Tk ', 'Mustomi, SE.MM', '196404181986031010', 6, 12, 'Setujui', 'Sudah', 'Cuti', '', '11-2017', '2017-12-04'),
(104, 1705, 0, '2017-12-04 15:49:08', 'December 2017', 'p', 'Sdri', 'Yeni Yusnita Lumban Raja, A.Md.Kep', '197312231998032005', '128490', 'Penata Muda ', 'III.a', 'Perawat Pelaksana Lanjutan', 'PERAWAT UMUM POLI', 6, 'Enam', '2017-12-21', '12', '2018-01-02', '1', 7, '', 'Jakarta', '87786326660', 'Alek Subagyo, A.Md.Kep', '197710062008011000', 'Pengatur Tk.1', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', 6, 12, 'Setujui', 'Sudah', 'Cuti', '', '12-2017', '2017-12-04'),
(105, 1706, 0, '2017-12-04 15:58:11', 'December 2017', 'l', 'Sdra', 'Alek Subagyo, A.Md.Kep', '197710062008011020', '171235', 'Pengatur Tk.1', 'II.d', 'Perawat Pelksana ', 'PERAWAT IGD', 3, 'Tiga', '2017-03-08', '3', '2017-03-10', '3', 0, '0', 'Jawa Barat', '82111272154', 'Yuliyanti Rostaningsih', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 9, 12, 'Setujui', 'Sudah', 'Cuti', '', '03-2017', '2017-12-04'),
(106, 1706, 0, '2017-12-04 16:00:02', 'December 2017', 'l', 'Sdra', 'Alek Subagyo, A.Md.Kep', '197710062008011020', '171235', 'Pengatur Tk.1', 'II.d', 'Perawat Pelksana ', 'PERAWAT IGD', 6, 'Enam', '2017-06-12', '6', '2017-06-17', '6', 0, '0', 'Jakarta', '82111272154', 'Yuliyanti Rostaningsih', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 3, 12, 'Setujui', 'Sudah', 'Cuti', '', '06-2017', '2017-12-04'),
(107, 1706, 0, '2017-12-04 16:01:15', 'December 2017', 'l', 'Sdra', 'Alek Subagyo, A.Md.Kep', '197710062008011020', '171235', 'Pengatur Tk.1', 'II.d', 'Perawat Pelksana ', 'PERAWAT IGD', 3, 'Tiga', '2017-10-13', '10', '2017-10-16', '10', 1, '15', 'Jakarta', '82111272154', 'Yuliyanti Rostaningsih', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 0, 12, 'Setujui', 'Sudah', 'Cuti', '', '10-2017', '2017-12-04'),
(108, 1703, 0, '2017-12-05 01:45:25', 'December 2017', 'p', 'Sdri', 'Enggum Gumih, A.Md.Kep', '197408081997032002', '123466', 'Penata Muda', 'III.a ', 'Perawat Pelaksana ', 'KEUANGAN', 3, 'Tiga', '2017-04-17', '4', '2017-04-20', '4', 1, '19', 'Karawang', '82122520441', 'Dian Khairunisa, S.Kep', '197910242006042000', 'Penata Muda Tk ', 'Mustomi, SE.MM', '196404181986031010', 9, 12, 'Setujui', 'Sudah', 'Cuti', '', '04-2017', '2017-12-05'),
(109, 1703, 0, '2017-12-05 01:50:11', 'December 2017', 'p', 'Sdri', 'Enggum Gumih, A.Md.Kep', '197408081997032002', '123466', 'Penata Muda', 'III.a ', 'Perawat Pelaksana ', 'KEUANGAN', 5, 'Lima', '2017-11-13', '11', '2017-11-17', '11', 0, '0', 'Karawang', '82122520441', 'Dian Khairunisa, S.Kep', '197910242006042000', 'Penata Muda Tk ', 'Mustomi, SE.MM', '196404181986031010', 4, 12, 'Setujui', 'Sudah', 'Cuti', '', '11-2017', '2017-12-05'),
(110, 1708, 0, '2017-12-05 01:55:39', 'December 2017', 'l', 'Sdra', 'Ulus Komartono', '196806151987031001', '110531', 'Pengatur ', ' II.c', 'Staf Operasional Tingkat  ', 'JENAZAH', 5, 'Lima', '2017-11-23', '11', '2017-11-28', '11', 1, '26', 'Jakarta', '89624385871', 'Insupiani ', '196212031987032000', 'Penata Muda Tk ', 'Mustomi, SE.MM', '196404181986031010', 7, 12, 'Setujui', 'Sudah', 'Cuti', '', '11-2017', '2017-12-05'),
(111, 1698, 0, '2017-12-05 02:03:52', 'December 2017', 'l', 'Sdra', 'Jumiya', '196307271987031008', '110379', 'Penata Muda Tk.', 'III.b', 'Staf Teknis Tingkat Ahli ', 'PENGADAAN BARANG DAN JASA', 3, 'Tiga', '2017-03-29', '3', '2017-03-31', '3', 0, '0', 'Yogyakarta', '8996888847', 'Insupiani ', '196212031987032000', 'Penata Muda Tk ', 'Mustomi, SE.MM', '196404181986031010', 9, 12, 'Setujui', 'Sudah', 'Cuti', '', '03-2017', '2017-12-05'),
(112, 1698, 0, '2017-12-05 02:33:10', 'December 2017', 'l', 'Sdra', 'Jumiya', '196307271987031008', '110379', 'Penata Muda Tk.', 'III.b', 'Staf Teknis Tingkat Ahli ', 'PENGADAAN BARANG DAN JASA', 4, 'Empat', '2017-09-12', '9', '2017-09-15', '9', 0, '0', 'Yogyakarta', '81286377226', 'Insupiani ', '196212031987032000', 'Penata Muda Tk ', 'Mustomi, SE.MM', '196404181986031010', 5, 12, 'Setujui', 'Sudah', 'Cuti', '', '09-2017', '2017-12-05'),
(113, 1698, 0, '2017-12-05 02:36:28', 'December 2017', 'l', 'Sdra', 'Jumiya', '196307271987031008', '110379', 'Penata Muda Tk.', 'III.b', 'Staf Teknis Tingkat Ahli ', 'PENGADAAN BARANG DAN JASA', 5, 'Lima', '2017-12-11', '12', '2017-12-15', '12', 0, '0', 'Yogyakarta', '8996888847', 'Insupiani ', '196212031987032000', 'Penata Muda Tk ', 'Mustomi, SE.MM', '196404181986031010', 0, 12, 'Setujui', 'Sudah', 'Cuti', '', '12-2017', '2017-12-05'),
(114, 1711, 0, '2017-12-05 02:43:23', 'December 2017', 'p', 'Sdri', 'dr. Derry Ratih Ariyanti Pratika', '', '', '', '', 'Dokter Umum  ', 'DOKTER UMUM IGD', 5, 'Lima', '2017-05-10', '5', '2017-05-14', '5', 0, '0', 'Jakarta', '85710997007', 'dr. Erlangga X. D,M.Sc', '', '', 'dr. Dwian Andhika', '198311072010011021', 7, 12, 'Setujui', 'Sudah', 'Cuti', '', '05-2017', '2017-12-05'),
(115, 1750, 0, '2017-12-05 09:24:16', 'December 2017', 'l', 'Sdra', 'Drg. Fusiana', '', '', '', '', 'Dokter Gigi ', 'POLI RAWAT JALAN', 6, 'Enam', '2017-06-22', '6', '2017-06-29', '6', 2, '25,26', 'Jakarta', '8,78887E+11', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032000', 'Pembina Tk.1 ', 'dr. Dwian Andhika', '198311072010011021', 6, 12, 'Setujui', 'Sudah', 'Cuti', '', '06-2017', '2017-12-05'),
(116, 1754, 0, '2017-12-05 09:29:31', 'December 2017', 'l', 'Sdra', 'dr. Erlangga X. D,M.Sc', '', '', '', '', 'Dokter Umum  ', 'DOKTER UMUM IGD', 12, 'Dua Belas', '2017-01-07', '1', '2017-01-19', '1', 1, '8', 'Jakarta', '8125036700', 'dr.Siti Mulyati', '', '', 'dr. Dwian Andhika', '198311072010011021', 5, 17, 'Setujui', 'Sudah', 'Cuti', '', '01-2017', '2017-12-05'),
(117, 1778, 0, '2017-12-05 09:35:37', 'December 2017', 'p', 'Sdri', 'dr. Rr. Vebi Adeliana Dara', '', '', '', '', 'Dokter Umum  ', 'DOKTER UMUM IGD', 12, 'Dua Belas', '2017-12-16', '12', '2017-12-27', '12', 0, '0', 'Jakarta', '81255584708', 'dr. Hermansyah Pattyranie', '', '', 'dr. Dwian Andhika', '198311072010011021', 0, 12, 'Setujui', 'Sudah', 'Cuti', '', '12-2017', '2017-12-05'),
(118, 1783, 0, '2017-12-05 09:55:46', 'December 2017', 'p', 'Sdri', 'dr.Siti Mulyati', '', '', '', '', 'Dokter Umum  ', 'DOKTER UMUM IGD', 8, 'Delapan', '2017-03-14', '3', '2017-03-21', '3', 0, '0', 'Jakarta', '85322225950', 'dr.Arif Rahman Hakim', '', '', 'dr. Dwian Andhika', '198311072010011021', 4, 12, 'Setujui', 'Sudah', 'Cuti', '', '03-2017', '2017-12-05'),
(119, 1783, 0, '2017-12-05 09:57:25', 'December 2017', 'p', 'Sdri', 'dr.Siti Mulyati', '', '', '', '', 'Dokter Umum  ', 'DOKTER UMUM IGD', 4, 'Empat', '2017-12-28', '12', '2017-12-31', '12', 0, '0', 'Jakarta', '85322225950', 'dr.Arif Rahman Hakim', '', '', 'dr. Dwian Andhika', '198311072010011021', 0, 12, 'Setujui', 'Sudah', 'Cuti', '', '12-2017', '2017-12-05'),
(120, 1800, 0, '2017-12-05 10:03:45', 'December 2017', 'p', 'Sdri', 'dr.Arif Rahman Hakim', '', '', '', '', 'Dokter Umum ', 'DOKTER UMUM IGD', 8, 'Delapan', '2017-09-20', '9', '2017-09-27', '9', 0, '0', 'NTB', '81280394746', 'dr.Rafael Nanda Raudranisala', '', '', 'dr. Dwian Andhika', '198311072010011021', 4, 12, 'Setujui', 'Sudah', 'Cuti', '', '09-2017', '2017-12-05'),
(121, 1800, 0, '2017-12-05 10:05:13', 'December 2017', 'l', 'Sdra', 'dr.Arif Rahman Hakim', '', '', '', '', 'Dokter Umum ', 'DOKTER UMUM IGD', 4, 'Empat', '2017-12-08', '12', '2017-12-11', '12', 0, '0', 'Riau', '81280394746', 'dr.Siti Mulyati', '', '', 'dr. Dwian Andhika', '198311072010011021', 0, 12, 'Setujui', 'Sudah', 'Cuti', '', '12-2017', '2017-12-05'),
(122, 1712, 0, '2017-12-05 13:15:50', 'December 2017', 'p', 'Sdri', 'Elin Budiani', '', '', '', '', 'Perawat Umum  ', 'RAWAT INAP', 5, 'Lima', '2017-06-22', '6', '2017-06-28', '6', 2, '25,26', 'Jakarta', '81290931988', 'Pujiati Rahayu', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 7, 12, 'Setujui', 'Sudah', 'Cuti', '', '06-2017', '2017-12-05'),
(123, 1712, 0, '2017-12-05 13:19:25', 'December 2017', 'p', 'Sdri', 'Elin Budiani', '', '', '', '', '', 'RAWAT INAP', 7, 'Tujuh', '2017-11-20', '11', '2017-11-26', '11', 0, '0', 'Jakarta', '81290931988', 'Pujiati Rahayu', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 0, 12, 'Setujui', 'Sudah', 'Cuti', '', '11-2017', '2017-12-05'),
(124, 1713, 0, '2017-12-05 13:24:27', 'December 2017', 'l', 'Sdra', 'Agus Hayu Kurniawan', '', '', '', '', 'Perawat Umum  ', 'PERAWAT IGD', 4, 'Empat', '2017-03-04', '3', '2017-03-07', '3', 0, '0', 'Cilacap', '8159549052', 'Ayep Wijaya', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 8, 12, 'Setujui', 'Sudah', 'Cuti', '', '03-2017', '2017-12-05'),
(125, 1713, 0, '2017-12-05 13:28:16', 'December 2017', 'l', 'Sdra', 'Agus Hayu Kurniawan', '', '', '', '', 'Perawat Umum  ', 'PERAWAT IGD', 5, 'Lima', '2017-06-21', '6', '2017-06-25', '6', 0, '0', 'Cilacap', '8159549052', 'Ayep Wijaya', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 3, 12, 'Setujui', 'Sudah', 'Cuti', '', '06-2017', '2017-12-05'),
(126, 1713, 0, '2017-12-05 13:29:50', 'December 2017', 'l', 'Sdra', 'Agus Hayu Kurniawan', '', '', '', '', '', 'PERAWAT IGD', 3, 'Tiga', '2017-12-21', '12', '2017-12-23', '12', 0, '0', 'Jakarta', '8159549052', 'Ayep Wijaya', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 0, 12, 'Setujui', 'Sudah', 'Cuti', '', '12-2017', '2017-12-05'),
(127, 1715, 0, '2017-12-05 13:33:07', 'December 2017', 'p', 'Sdri', 'Fitri Iznilah', '', '', '', '', 'Perawat Umum  ', 'PERAWAT IGD', 6, 'Enam', '2017-07-03', '7', '2017-07-08', '7', 0, '0', 'Tasikmalaya', '81382166484', 'Rismalia', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 6, 12, 'Setujui', 'Sudah', 'Cuti', '', '07-2017', '2017-12-05'),
(128, 1715, 0, '2017-12-05 13:35:51', 'December 2017', 'p', 'Sdri', 'Fitri Iznilah', '', '', '', '', 'Perawat Umum  ', 'PERAWAT IGD', 3, 'Tiga', '2017-09-02', '9', '2017-09-04', '9', 0, '0', 'Tasikmalaya', '81382166484', 'Rismalia', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 3, 12, 'Setujui', 'Sudah', 'Cuti', '', '09-2017', '2017-12-05'),
(129, 1715, 0, '2017-12-05 14:47:20', 'December 2017', 'p', 'Sdri', 'Fitri Iznilah', '', '', '', '', 'Perawat Umum  ', 'PERAWAT IGD', 3, 'Tiga', '2017-12-18', '12', '2017-12-20', '12', 0, '0', 'Jakarta', '81382166484', 'Rismalia', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 0, 12, 'Setujui', 'Sudah', 'Cuti', '', '12-2017', '2017-12-05'),
(130, 1716, 0, '2017-12-05 14:53:02', 'December 2017', 'p', 'Sdri', 'Fitri Fauziah', '', '', '', '', 'Perawat Umum  ', 'POLI RAWAT JALAN', 3, 'Tiga', '2017-03-25', '3', '2017-03-29', '3', 2, '26,28', 'Bogor', '85770286560', 'Nawang Wulan Indriasari', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 9, 12, 'Setujui', 'Sudah', 'Cuti', '', '03-2017', '2017-12-05'),
(131, 1716, 0, '2017-12-05 14:54:54', 'December 2017', 'p', 'Sdri', 'Fitri Fauziah', '', '', '', '', 'Perawat Umum  ', 'POLI RAWAT JALAN', 3, 'Tiga', '2017-05-23', '5', '2017-05-26', '5', 1, '25', 'Bogor', '85770286560', 'Nawang Wulan Indriasari', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 6, 12, 'Setujui', 'Sudah', 'Cuti', '', '05-2017', '2017-12-05'),
(132, 1716, 0, '2017-12-05 14:57:39', 'December 2017', 'p', 'Sdri', 'Fitri Fauziah', '', '', '', '', 'Perawat Umum  ', 'POLI RAWAT JALAN', 3, 'Tiga', '2017-07-17', '7', '2017-07-19', '7', 0, '0', 'Bogor', '85770286560', 'Nawang Wulan Indriasari', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 3, 12, 'Setujui', 'Sudah', 'Cuti', '', '07-2017', '2017-12-05'),
(133, 1719, 0, '2017-12-05 15:06:43', 'December 2017', 'p', 'Sdri', 'Sutpiyatu Sadiyah', '', '', '', '', 'Perawat Umum  ', 'RAWAT INAP', 5, 'Lima', '2017-01-13', '1', '2017-01-17', '1', 0, '0', 'Jakarta', '89663012482', 'Cella Balynda', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 7, 12, 'Setujui', 'Sudah', 'Cuti', '', '01-2017', '2017-12-05'),
(134, 1721, 0, '2017-12-05 15:11:21', 'December 2017', 'p', 'Sdri', 'Lutfiyah Anggraini', '', '', '', '', 'Perawat Umum  ', 'RAWAT INAP', 8, 'Delapan', '2017-07-02', '7', '2017-07-09', '7', 0, '0', 'Lampung', '81280891124', 'Novy Nurfadhillah', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 4, 12, 'Setujui', 'Sudah', 'Cuti', '', '07-2017', '2017-12-05'),
(135, 1722, 0, '2017-12-05 15:14:02', 'December 2017', 'p', 'Sdri', 'Yuliyanti Rostaningsih', '', '', '', '', 'Perawat Umum  ', 'PERAWAT IGD', 6, 'Enam', '2017-09-25', '9', '2017-09-30', '9', 0, '0', 'Yogyakarta', '8,13157E+11', 'Alek Subagyo, A.Md.Kep', '197710062008011000', 'Pengatur Tk.1', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 6, 12, 'Setujui', 'Sudah', 'Cuti', '', '09-2017', '2017-12-05'),
(136, 1724, 0, '2017-12-05 15:18:38', 'December 2017', 'p', 'Sdri', 'Nawang Wulan Indriasari', '', '', '', '', 'Perawat Gigi ', 'POLI RAWAT JALAN', 4, 'Empat', '2017-04-21', '4', '2017-04-26', '4', 2, '23,24', 'Jakarta', '89642765821', 'Nining Suningsih', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 8, 12, 'Setujui', 'Sudah', 'Cuti', '', '04-2017', '2017-12-05'),
(137, 1724, 0, '2017-12-05 15:21:01', 'December 2017', 'p', 'Sdri', 'Nawang Wulan Indriasari', '', '', '', '', 'Perawat Gigi ', 'POLI RAWAT JALAN', 4, 'Empat', '2017-07-31', '7', '2017-08-03', '8', 0, '0', 'Jakarta', '89642765821', 'Fitri Fauziah', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 4, 12, 'Setujui', 'Sudah', 'Cuti', '', '07-2017', '2017-12-05'),
(138, 1751, 0, '2017-12-05 15:26:48', 'December 2017', 'p', 'Sdri', 'Dita Tias Tiara', '', '', '', '', 'Perawat Umum  ', 'RAWAT INAP', 8, 'Delapan', '2017-11-27', '11', '2017-12-04', '12', 0, '0', 'Jakarta', '89691315337', 'Cella Balynda', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 4, 12, 'Setujui', 'Sudah', 'Cuti', '', '11-2017', '2017-12-05'),
(139, 1758, 0, '2017-12-06 00:54:36', 'December 2017', 'p', 'Sdri', 'Cella Balynda', '', '', '', '', 'Perawat Umum  ', 'RAWAT INAP', 8, 'Delapan', '2017-01-24', '1', '2017-01-31', '1', 0, '0', 'Indramayu', '85776386159', 'Sutpiyatu Sadiyah', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 4, 12, 'Setujui', 'Sudah', 'Cuti', '', '01-2017', '2017-12-06'),
(140, 1758, 0, '2017-12-06 01:02:41', 'December 2017', 'p', 'Sdri', 'Cella Balynda', '', '', '', '', 'Perawat Umum  ', 'RAWAT INAP', 4, 'Empat', '2017-08-28', '8', '2017-08-31', '8', 0, '0', 'Indramayu', '85776786159', 'Dita Tias Tiara', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 0, 12, 'Setujui', 'Sudah', 'Cuti', '', '08-2017', '2017-12-06'),
(141, 1760, 0, '2017-12-06 01:08:01', 'December 2017', 'p', 'Sdri', 'Pujiati Rahayu', '', '', '', '', 'Perawat Umum  ', 'RAWAT INAP', 3, 'Tiga', '2017-04-08', '4', '2017-04-10', '4', 0, '0', 'Jakarta', '81280254439', 'Cella Balynda', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 9, 12, 'Setujui', 'Sudah', 'Cuti', '', '04-2017', '2017-12-06'),
(142, 1760, 0, '2017-12-06 01:12:38', 'December 2017', 'p', 'Sdri', 'Pujiati Rahayu', '', '', '', '', 'Perawat Umum  ', 'RAWAT INAP', 3, 'Tiga', '2017-11-16', '11', '2017-11-18', '11', 0, '0', 'Jawa Tengah', '81280254439', 'Asep Supriyatna', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 6, 12, 'Setujui', 'Sudah', 'Cuti', '', '11-2017', '2017-12-06'),
(143, 1761, 0, '2017-12-06 01:15:59', 'December 2017', 'p', 'Sdri', 'Rismalia', '', '', '', '', 'Perawat Umum  ', 'RAWAT INAP', 7, 'Tujuh', '2017-07-09', '7', '2017-07-15', '7', 0, '0', 'Yogyakarta', '85719098929', 'Yudendi', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 5, 12, 'Setujui', 'Sudah', 'Cuti', '', '07-2017', '2017-12-06'),
(144, 1761, 0, '2017-12-06 01:17:46', 'December 2017', 'p', 'Sdri', 'Rismalia', '', '', '', '', '', 'RAWAT INAP', 5, 'Lima', '2017-09-08', '9', '2017-09-12', '9', 0, '0', 'Solo', '85719098929', 'Fitri Iznilah', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 0, 12, 'Setujui', 'Sudah', 'Cuti', '', '09-2017', '2017-12-06'),
(145, 1765, 0, '2017-12-06 01:28:38', 'December 2017', 'p', 'Sdri', 'Reno Anggriyanto', '', '', '', '', 'Perawat Umum  ', 'PERAWAT IGD', 6, 'Enam', '2017-08-16', '8', '2017-08-21', '8', 0, '0', 'Brebes', '85894532894', 'Hendri Powan', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 6, 12, 'Setujui', 'Sudah', 'Cuti', '', '08-2017', '2017-12-06'),
(146, 1766, 0, '2017-12-06 01:37:20', 'December 2017', 'p', 'Sdri', 'Mardiana Tri Cahyanti', '', '', '', '', 'Perawat Umum  ', 'PERAWAT IGD', 12, 'Dua Belas', '2017-11-25', '11', '2017-12-06', '12', 0, '0', 'Jakarta', '82110967276', 'Bayu Setiawan', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 0, 12, 'Setujui', 'Sudah', 'Cuti', '', '11-2017', '2017-12-06'),
(147, 1771, 0, '2017-12-08 07:08:14', 'December 2017', 'l', 'Sdra', 'Aris Subiyanto', '', '', '', '', 'Perawat Umum  ', 'RAWAT INAP', 6, 'Enam', '2017-08-11', '8', '2017-08-16', '8', 0, '0', 'Tasikmalaya', '81295952729', 'Cella Balynda', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 6, 12, 'Setujui', 'Sudah', 'Cuti', '', '08-2017', '2017-12-08'),
(148, 1772, 0, '2017-12-08 07:10:26', 'December 2017', 'l', 'Sdra', 'Dwi Soffyan N.A', '', '', '', '', 'Perawat Umum  ', 'PERAWAT IGD', 6, 'Enam', '2017-05-22', '5', '2017-05-27', '5', 0, '0', 'Jakarta', '83872761309', 'Rismalia', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 6, 12, 'Setujui', 'Sudah', 'Cuti', '', '05-2017', '2017-12-08'),
(149, 1772, 0, '2017-12-08 07:12:47', 'December 2017', 'l', 'Sdra', 'Dwi Soffyan N.A', '', '', '', '', 'Perawat Umum  ', 'PERAWAT IGD', 6, 'Enam', '2017-10-21', '10', '2017-10-26', '10', 0, '0', 'Jakarta', '83872761309', 'Rismalia', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 0, 12, 'Setujui', 'Sudah', 'Cuti', '', '10-2017', '2017-12-08'),
(150, 1773, 0, '2017-12-08 07:20:18', 'December 2017', 'p', 'Sdri', 'Nurul Rachmasari', '', '', '', '', 'Perawat Umum  ', 'RAWAT INAP', 6, 'Enam', '2017-01-16', '1', '2017-01-21', '1', 0, '0', 'Jakarta', '85796611450', 'Siti Fazriyah', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 6, 12, 'Setujui', 'Sudah', 'Cuti', '', '01-2017', '2017-12-08'),
(151, 1773, 0, '2017-12-08 07:21:37', 'December 2017', 'p', 'Sdri', 'Nurul Rachmasari', '', '', '', '', 'Perawat Umum  ', 'RAWAT INAP', 6, 'Enam', '2017-09-04', '9', '2017-09-09', '9', 0, '0', 'Malang', '89519517487', 'Siti Fazriyah', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 0, 12, 'Setujui', 'Sudah', 'Cuti', '', '09-2017', '2017-12-08'),
(152, 1774, 0, '2017-12-08 07:24:54', 'December 2017', 'l', 'Sdra', 'Ayep Wijaya', '', '', '', '', 'Perawat Umum  ', 'PERAWAT IGD', 6, 'Enam', '2017-06-30', '6', '2017-07-05', '7', 0, '0', 'Padeglang', '85814391218', 'Hendri Powan', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 6, 12, 'Setujui', 'Sudah', 'Cuti', '', '06-2017', '2017-12-08'),
(153, 1774, 0, '2017-12-08 07:28:44', 'December 2017', 'l', 'Sdra', 'Ayep Wijaya', '', '', '', '', 'Perawat Umum  ', 'PERAWAT IGD', 6, 'Enam', '2017-11-06', '11', '2017-11-11', '11', 0, '0', 'Pandeglang', '85814391218', 'Yudendi', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 0, 12, 'Setujui', 'Sudah', 'Cuti', '', '11-2017', '2017-12-08'),
(154, 1775, 0, '2017-12-08 07:32:22', 'December 2017', 'l', 'Sdra', 'Ma\'Sum', '', '', '', '', 'Perawat Umum  ', 'PERAWAT IGD', 6, 'Enam', '2017-01-26', '1', '2017-01-31', '1', 0, '0', 'Belitung', '816213199', 'Dwi Soffyan N.A', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 6, 12, 'Setujui', 'Sudah', 'Cuti', '', '01-2017', '2017-12-08'),
(155, 1775, 0, '2017-12-08 07:33:45', 'December 2017', 'l', 'Sdra', 'Ma\'Sum', '', '', '', '', 'Perawat Umum  ', 'PERAWAT IGD', 6, 'Enam', '2017-08-07', '8', '2017-08-12', '8', 0, '0', 'Belitung', '816213199', 'Yudendi', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 0, 12, 'Setujui', 'Sudah', 'Cuti', '', '08-2017', '2017-12-08'),
(156, 1776, 0, '2017-12-08 07:36:08', 'December 2017', 'l', 'Sdra', 'Hendri Powan', '', '', '', '', 'Perawat Umum  ', 'PERAWAT IGD', 12, 'Dua Belas', '2017-01-01', '1', '2017-01-12', '1', 0, '0', 'Kalimantan', '85287535760', 'Reno Anggriyanto', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 0, 12, 'Setujui', 'Sudah', 'Cuti', '', '01-2017', '2017-12-08'),
(157, 1792, 0, '2017-12-08 09:21:59', 'December 2017', 'l', 'Sdra', 'Yudendi', '', '', '', '', 'Perawat Umum  ', 'PERAWAT IGD', 5, 'Lima', '2017-07-15', '7', '2017-07-19', '7', 0, '0', 'NTT', '82213101848', 'Bayu Setiawan', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 7, 12, 'Setujui', 'Sudah', 'Cuti', '', '07-2017', '2017-12-08'),
(158, 1794, 0, '2017-12-11 01:55:20', 'December 2017', 'p', 'Sdri', 'Anissa Hanan Fauziyyah', '', '', '', '', 'Perawat Umum  ', 'RAWAT INAP', 12, 'Dua Belas', '2017-12-05', '12', '2017-12-16', '12', 0, '0', 'Jakarta', '81298804900', 'Purmawansyah', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 0, 12, 'Setujui', 'Sudah', 'Cuti', '', '12-2017', '2017-12-11'),
(159, 1796, 0, '2017-12-11 01:59:40', 'December 2017', 'l', 'Sdra', 'Bayu Setiawan', '', '', '', '', 'Perawat Umum  ', 'PERAWAT IGD', 3, 'Tiga', '2017-05-06', '5', '2017-05-08', '5', 0, '0', 'Jakarta', '81212671745', 'Ma\'Sum', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 9, 12, 'Setujui', 'Sudah', 'Cuti', '', '05-2017', '2017-12-11'),
(160, 1796, 0, '2017-12-11 02:02:05', 'December 2017', 'l', 'Sdra', 'Bayu Setiawan', '', '', '', '', 'Perawat Umum  ', 'PERAWAT IGD', 5, 'Lima', '2017-10-06', '10', '2017-10-10', '10', 0, '0', 'Jakarta', '8129700034', 'Yudendi', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 4, 12, 'Setujui', 'Sudah', 'Cuti', '', '10-2017', '2017-12-11'),
(161, 1796, 0, '2017-12-11 02:02:59', 'December 2017', 'l', 'Sdra', 'Bayu Setiawan', '', '', '', '', 'Perawat Umum  ', 'PERAWAT IGD', 4, 'Empat', '2017-12-09', '12', '2017-12-12', '12', 0, '0', 'Jakarta', '8129700034', 'Yudendi', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 0, 12, 'Setujui', 'Sudah', 'Cuti', '', '12-2017', '2017-12-11'),
(162, 1804, 0, '2017-12-11 02:07:59', 'December 2017', 'p', 'Sdri', 'Vina Rahayu', '', '', '', '', 'Perawat Umum  ', 'RAWAT INAP', 5, 'Lima', '2017-08-05', '8', '2017-08-09', '8', 0, '0', 'Subang', '89636257729', 'Yeni Wulandari', '', '', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', 7, 12, 'Setujui', 'Sudah', 'Cuti', '', '08-2017', '2017-12-11'),
(163, 1807, 0, '2017-12-11 02:11:41', 'December 2017', 'p', 'Sdri', 'Novenda Norina.N', '', '', '', '', 'Perawat Umum  ', 'RAWAT INAP', 12, 'Dua Belas', '2017-12-17', '12', '2017-12-28', '12', 0, '0', 'Kupang', '82144737822', 'Sri Herlinah', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 0, 12, 'Setujui', 'Sudah', 'Cuti', '', '12-2017', '2017-12-11'),
(164, 1725, 0, '2017-12-11 02:13:50', 'December 2017', 'p', 'Sdri', 'Dwi Wahyuningsih', '', '', '', '', 'Bidan  ', 'RUANG BERSALIN', 12, 'Dua Belas', '2017-11-16', '11', '2017-11-27', '11', 0, '0', 'Bekasi', '81290732583', 'Roma Jayanti', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 0, 12, 'Setujui', 'Sudah', 'Cuti', '', '11-2017', '2017-12-11'),
(165, 1726, 0, '2017-12-11 02:15:47', 'December 2017', 'p', 'Sdri', 'Vianti Prihatini', '', '', '', '', 'Bidan  ', 'RUANG BERSALIN', 5, 'Lima', '2017-07-18', '7', '2017-07-22', '7', 0, '0', 'Cikampek', '83876393609', 'Heny Berliana Wijayanti', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 7, 12, 'Setujui', 'Sudah', 'Cuti', '', '07-2017', '2017-12-11'),
(166, 1726, 0, '2017-12-11 02:17:25', 'December 2017', 'p', 'Sdri', 'Vianti Prihatini', '', '', '', '', 'Bidan  ', 'RUANG BERSALIN', 7, 'Tujuh', '2017-11-19', '11', '2017-11-25', '11', 0, '0', 'Cikampek', '83876393609', 'Heny Berliana Wijayanti', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 0, 12, 'Setujui', 'Sudah', 'Cuti', '', '11-2017', '2017-12-11'),
(167, 1727, 0, '2017-12-11 02:20:12', 'December 2017', 'p', 'Sdri', 'Heny Berliana Wijayanti', '', '', '', '', 'Bidan  ', 'POLI KANDUNGAN', 5, 'Lima', '2017-04-25', '4', '2017-04-29', '4', 0, '0', 'Jakarta', '81283789112', 'Ratna Dewi Pujawati', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 7, 12, 'Setujui', 'Sudah', 'Cuti', '', '04-2017', '2017-12-11'),
(168, 1727, 0, '2017-12-11 02:21:22', 'December 2017', 'p', 'Sdri', 'Heny Berliana Wijayanti', '', '', '', '', 'Bidan  ', 'POLI KANDUNGAN', 4, 'Empat', '2017-12-27', '12', '2017-12-30', '12', 0, '0', 'Jakarta', '81283789112', 'Dewi Trisnawati', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 3, 12, 'Setujui', 'Sudah', 'Cuti', '', '12-2017', '2017-12-11'),
(169, 1728, 0, '2017-12-11 02:23:31', 'December 2017', 'p', 'Sdri', 'Roma Jayanti', '', '', '', '', 'Bidan  ', 'RUANG BERSALIN', 7, 'Tujuh', '2017-07-26', '7', '2017-08-01', '8', 0, '0', 'Bekasi', '81315297316', 'Dwi Wahyuningsih', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 5, 12, 'Setujui', 'Sudah', 'Cuti', '', '07-2017', '2017-12-11'),
(170, 1728, 0, '2017-12-11 02:26:02', 'December 2017', 'p', 'Sdri', 'Roma Jayanti', '', '', '', '', 'Bidan  ', 'RUANG BERSALIN', 5, 'Lima', '2017-09-15', '9', '2017-09-19', '9', 0, '0', 'Surabaya', '81315297316', 'Dwi Wahyuningsih', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 0, 12, 'Setujui', 'Sudah', 'Cuti', '', '09-2017', '2017-12-11'),
(171, 1729, 0, '2017-12-11 02:27:49', 'December 2017', 'p', 'Sdri', 'Dewi Trisnawati', '', '', '', '', 'Bidan  ', 'POLI KANDUNGAN', 6, 'Enam', '2017-10-09', '10', '2017-10-14', '10', 0, '0', 'Semarang', '85310910772', 'Heny Berliana Wijayanti', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 6, 12, 'Setujui', 'Sudah', 'Cuti', '', '10-2017', '2017-12-11'),
(172, 1729, 0, '2017-12-11 02:29:24', 'December 2017', 'p', 'Sdri', 'Dewi Trisnawati', '', '', '', '', 'Bidan  ', 'POLI KANDUNGAN', 6, 'Enam', '2017-12-19', '12', '2017-12-24', '12', 0, '0', 'Jakarta', '85310910772', 'Heny Berliana Wijayanti', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 0, 12, 'Setujui', 'Sudah', 'Cuti', '', '12-2017', '2017-12-11'),
(173, 1730, 0, '2017-12-11 02:32:28', 'December 2017', 'p', 'Sdri', 'Hendi Setyowati', '', '', '', '', 'Bidan  ', 'RUANG BERSALIN', 7, 'Tujuh', '2017-06-19', '6', '2017-06-25', '6', 0, '0', 'Jakarta', '87837866745', 'Astrid Septeria Debora', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 5, 12, 'Setujui', 'Sudah', 'Cuti', '', '06-2017', '2017-12-11'),
(174, 1731, 0, '2017-12-11 02:35:37', 'December 2017', 'p', 'Sdri', 'Ratna Dewi Pujawati', '', '', '', '', 'Bidan  ', 'RUANG BERSALIN', 7, 'Tujuh', '2017-06-26', '6', '2017-07-02', '7', 0, '0', 'Jakarta', '82122688828', 'Roma Jayanti', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 5, 12, 'Setujui', 'Sudah', 'Cuti', '', '06-2017', '2017-12-11'),
(175, 1732, 0, '2017-12-11 02:46:35', 'December 2017', 'p', 'Sdri', 'Fya Yunita Sanggian', '', '', '', '', 'Bidan  ', 'RUANG BERSALIN', 7, 'Tujuh', '2017-09-08', '9', '2017-09-14', '9', 0, '0', 'Jakarta', '81280087230', 'Dwi Wahyuningsih', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 5, 12, 'Setujui', 'Sudah', 'Cuti', '', '09-2017', '2017-12-11'),
(176, 1767, 0, '2017-12-11 02:48:28', 'December 2017', 'p', 'Sdri', 'Putri Reno Yori', '', '', '', '', 'Bidan  ', 'RUANG BERSALIN', 7, 'Tujuh', '2017-12-11', '12', '2017-12-17', '12', 0, '0', 'Jakarta', '81284666053', 'Ratna Dewi Pujawati', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 5, 12, 'Menunggu', 'Sudah', 'Cuti', '', '12-2017', '2017-12-11'),
(177, 1768, 0, '2017-12-11 02:54:18', 'December 2017', 'p', 'Sdri', 'Astrid Septeria Debora', '', '', '', '', 'Bidan  ', 'RUANG BERSALIN', 12, 'Dua Belas', '2017-11-02', '11', '2017-11-13', '11', 0, '0', 'Jakarta', '85213853022', 'Heny Berliana Wijayanti', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 0, 12, 'Setujui', 'Sudah', 'Cuti', '', '11-2017', '2017-12-11'),
(178, 1789, 0, '2017-12-11 02:55:40', 'December 2017', 'p', 'Sdri', 'Rini Pakpahan', '', '', '', '', 'Bidan  ', 'RUANG BERSALIN', 6, 'Enam', '2017-07-03', '7', '2017-07-08', '7', 0, '0', 'Cianjur', '81906564059', 'Nahdhiya Sofiana Cahyani', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 6, 12, 'Setujui', 'Sudah', 'Cuti', '', '07-2017', '2017-12-11'),
(179, 1789, 0, '2017-12-11 02:57:11', 'December 2017', 'p', 'Sdri', 'Rini Pakpahan', '', '', '', '', 'Bidan  ', 'RUANG BERSALIN', 6, 'Enam', '2017-12-26', '12', '2017-12-31', '12', 0, '0', 'Cianjur', '81906564059', 'Nahdhiya Sofiana Cahyani', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 0, 12, 'Setujui', 'Sudah', 'Cuti', '', '12-2017', '2017-12-11'),
(180, 1790, 0, '2017-12-11 02:59:57', 'December 2017', 'p', 'Sdri', 'Nahdhiya Sofiana Cahyani', '', '', '', '', 'Bidan  ', 'RUANG BERSALIN', 6, 'Enam', '2017-09-27', '9', '2017-10-02', '10', 0, '0', 'Malang', '81212511481', 'Rini Pakpahan', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 6, 12, 'Setujui', 'Sudah', 'Cuti', '', '09-2017', '2017-12-11'),
(181, 1790, 0, '2017-12-11 03:00:49', 'December 2017', 'p', 'Sdri', 'Nahdhiya Sofiana Cahyani', '', '', '', '', 'Bidan  ', 'RUANG BERSALIN', 6, 'Enam', '2017-12-01', '12', '2017-12-06', '12', 0, '0', 'Madiun', '8121511481', 'Rini Pakpahan', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 0, 12, 'Setujui', 'Sudah', 'Cuti', '', '12-2017', '2017-12-11'),
(182, 1749, 0, '2017-12-11 03:05:50', 'December 2017', 'p', 'Sdri', 'Vita Pratiwi', '', '', '', '', 'Asisten Apoteker ', 'APOTEKER', 5, 'Lima', '2017-09-01', '9', '2017-09-05', '9', 0, '0', 'Jakarta', '81291369629', 'Hartyaningsih Lumintu', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 7, 12, 'Setujui', 'Sudah', 'Cuti', '', '09-2017', '2017-12-11');
INSERT INTO `data_cuti` (`id_cuti`, `id_data_pegawai`, `id_pengganti`, `tanggal_pengajuan`, `bulan_surat`, `gender`, `panggilan`, `nama`, `nip`, `nrk`, `pangkat`, `golongan`, `jabatan`, `unit_kerja`, `lama_angka`, `lama_huruf`, `awal`, `bulan_awal`, `akhir`, `bulan_akhir`, `jml_hari_libur`, `tanggal_libur`, `lokasi`, `nomor`, `pengganti`, `nip_pengganti`, `pangkat_pengganti`, `atasan_langsung`, `nip_atasan`, `sisa_cuti`, `total_cuti`, `status`, `status_print`, `status_cuti`, `alasan_cuti`, `tahun`, `real_time`) VALUES
(183, 1757, 0, '2017-12-11 03:08:41', 'December 2017', 'p', 'Sdri', 'Syarah Yuanita', '', '', '', '', 'Asisten Apoteker ', 'APOTEKER', 3, 'Tiga', '2017-05-06', '5', '2017-05-08', '5', 0, '0', 'Bangkabelitung', '82125931559', 'Adde Septiana.R', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 9, 12, 'Setujui', 'Sudah', 'Cuti', '', '05-2017', '2017-12-11'),
(184, 1757, 0, '2017-12-11 03:10:47', 'December 2017', 'p', 'Sdri', 'Syarah Yuanita', '', '', '', '', 'Asisten Apoteker ', 'APOTEKER', 6, 'Enam', '2017-09-23', '9', '2017-09-28', '9', 0, '0', 'Jakarta', '82125931559', 'Reno Anggriyanto', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 3, 12, 'Setujui', 'Sudah', 'Cuti', '', '09-2017', '2017-12-11'),
(185, 1757, 0, '2017-12-11 03:12:52', 'December 2017', 'p', 'Sdri', 'Syarah Yuanita', '', '', '', '', 'Asisten Apoteker ', 'APOTEKER', 3, 'Tiga', '2017-11-07', '11', '2017-11-09', '11', 0, '0', 'Jakarta', '82125931559', 'Retno Dwi Handayani', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 0, 12, 'Setujui', 'Sudah', 'Cuti', '', '11-2017', '2017-12-11'),
(186, 1759, 0, '2017-12-11 03:16:02', 'December 2017', 'p', 'Sdri', 'Putri Utami', '', '', '', '', '', 'APOTEKER', 6, 'Enam', '2017-10-04', '10', '2017-10-09', '10', 0, '0', 'Jakarta', '8568805838', 'Hartyaningsih Lumintu', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 6, 12, 'Setujui', 'Sudah', 'Cuti', '', '10-2017', '2017-12-11'),
(187, 1759, 0, '2017-12-11 03:18:26', 'December 2017', 'p', 'Sdri', 'Putri Utami', '', '', '', '', 'Asisten Apoteker ', 'APOTEKER', 6, 'Enam', '2017-12-01', '12', '2017-12-06', '12', 0, '0', 'Jakarta', '8568805838', 'Hartyaningsih Lumintu', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 0, 12, 'Setujui', 'Sudah', 'Cuti', '', '12-2017', '2017-12-11'),
(188, 1780, 0, '2017-12-11 03:22:15', 'December 2017', 'p', 'Sdri', 'Hartyaningsih Lumintu', '', '', '', '', 'Asisten Apoteker ', 'APOTEKER', 7, 'Tujuh', '2017-07-02', '7', '2017-07-08', '7', 0, '0', 'Yogyakarta', '81219562215', 'Putri Utami', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 5, 12, 'Setujui', 'Sudah', 'Cuti', '', '07-2017', '2017-12-11'),
(189, 1780, 0, '2017-12-11 03:23:40', 'December 2017', 'p', 'Sdri', 'Hartyaningsih Lumintu', '', '', '', '', 'Asisten Apoteker ', 'APOTEKER', 5, 'Lima', '2017-11-17', '11', '2017-11-21', '11', 0, '0', 'Yogyakarta', '81219562218', 'Putri Utami', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 0, 12, 'Setujui', 'Sudah', 'Cuti', '', '11-2017', '2017-12-11'),
(190, 1815, 0, '2017-12-11 03:27:26', 'December 2017', 'p', 'Sdri', 'Retno Dwi Handayani', '', '', '', '', 'Asisten Apoteker ', 'APOTEKER', 5, 'Lima', '2017-11-10', '11', '2017-11-14', '11', 0, '0', 'Bandung', '89648741952', 'Adde Septiana.R', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 7, 12, 'Setujui', 'Sudah', 'Cuti', '', '11-2017', '2017-12-11'),
(191, 1733, 0, '2017-12-11 03:30:48', 'December 2017', 'l', 'Sdra', 'Rudi Hartono', '', '', '', '', 'Analis Kesehatan ', 'LABORATURIUM', 12, 'Dua Belas', '2017-06-23', '6', '2017-07-04', '7', 0, '0', 'Cirebon', '81293598002', 'Nurhidayat', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 0, 12, 'Setujui', 'Sudah', 'Cuti', '', '06-2017', '2017-12-11'),
(192, 1756, 0, '2017-12-11 03:33:51', 'December 2017', 'l', 'Sdra', 'Nurhidayat', '', '', '', '', 'Analis Kesehatan ', 'LABORATURIUM', 6, 'Enam', '2017-03-19', '3', '2017-03-24', '3', 0, '0', 'Malang', '85776307870', 'Moh.Purnama Aji', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 6, 12, 'Setujui', 'Sudah', 'Cuti', '', '03-2017', '2017-12-11'),
(193, 1756, 0, '2017-12-11 03:34:57', 'December 2017', 'l', 'Sdra', 'Nurhidayat', '', '', '', '', 'Analis Kesehatan ', 'LABORATURIUM', 6, 'Enam', '2017-09-29', '9', '2017-10-04', '10', 0, '0', 'Bogor', '8,57776E+11', 'Moh.Purnama Aji', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 0, 12, 'Setujui', 'Sudah', 'Cuti', '', '09-2017', '2017-12-11'),
(194, 1781, 0, '2017-12-11 03:36:51', 'December 2017', 'l', 'Sdra', 'Moh.Purnama Aji', '', '', '', '', 'Analis Kesehatan ', 'LABORATURIUM', 6, 'Enam', '2017-07-24', '7', '2017-07-29', '7', 0, '0', 'Kuningan', '82297764226', 'Nurhidayat', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 6, 12, 'Setujui', 'Sudah', 'Cuti', '', '07-2017', '2017-12-11'),
(195, 1781, 0, '2017-12-11 03:38:43', 'December 2017', 'l', 'Sdra', 'Moh.Purnama Aji', '', '', '', '', 'Analis Kesehatan ', 'LABORATURIUM', 6, 'Enam', '2017-11-15', '11', '2017-11-20', '11', 0, '0', 'Kuningan', '82297764226', 'Nurhidayat', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 0, 12, 'Setujui', 'Sudah', 'Cuti', '', '11-2017', '2017-12-11'),
(196, 1779, 0, '2017-12-11 03:43:16', 'December 2017', 'l', 'Sdra', 'Tomi Ardianto', '', '', '', '', 'Juru Masak ', 'JURU MASAK', 3, 'Tiga', '2017-06-24', '6', '2017-06-26', '6', 0, '0', 'Jakarta', '81902844380', 'Deni Muhamad Furkon ', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 9, 12, 'Setujui', 'Sudah', 'Cuti', '', '06-2017', '2017-12-11'),
(197, 1797, 0, '2017-12-11 03:45:45', 'December 2017', 'p', 'Sdri', 'Rima Astuti', '', '', '', '', 'Juru Masak ', 'JURU MASAK', 3, 'Tiga', '2017-07-17', '7', '2017-07-19', '7', 0, '0', 'Jakarta', '81287600887', 'Sari Mulyaningsih', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 9, 12, 'Setujui', 'Sudah', 'Cuti', '', '07-2017', '2017-12-11'),
(198, 1797, 0, '2017-12-11 03:46:48', 'December 2017', 'p', 'Sdri', 'Rima Astuti', '', '', '', '', 'Juru Masak ', 'JURU MASAK', 3, 'Tiga', '2017-11-06', '11', '2017-11-08', '11', 0, '0', 'Jakarta', '81294752877', 'Tomi Ardianto', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 6, 12, 'Setujui', 'Sudah', 'Cuti', '', '11-2017', '2017-12-11'),
(199, 1799, 0, '2017-12-11 03:48:21', 'December 2017', 'p', 'Sdri', 'Sari Mulyaningsih', '', '', '', '', 'Nutrisionist', 'INSTALASI GIZI', 3, 'Tiga', '2017-07-20', '7', '2017-07-22', '7', 0, '0', 'Jakarta', '085716937256', 'Sapti Agustini, Bsc', '196008071985032000', 'Penata', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 9, 12, 'Setujui', 'Sudah', 'Cuti', '', '07-2017', '2017-12-11'),
(200, 1736, 0, '2017-12-11 03:51:47', 'December 2017', 'l', 'Sdra', 'Jajang Subarja', '', '', '', '', 'Administrasi ', 'KEPEGAWAIAN', 3, 'Tiga', '2017-04-11', '4', '2017-04-13', '4', 0, '0', 'Jakarta', '8990801789', 'Nurromadlona Zikri Fadli', '', '', 'Mustomi, SE.MM', '196404181986031010', 9, 12, 'Setujui', 'Sudah', 'Cuti', '', '04-2017', '2017-12-11'),
(201, 1736, 0, '2017-12-11 03:53:13', 'December 2017', 'l', 'Sdra', 'Jajang Subarja', '', '', '', '', 'Administrasi ', 'KEPEGAWAIAN', 5, 'Lima', '2017-09-04', '9', '2017-09-08', '9', 0, '0', 'Jakarta', '8990801789', 'Nurromadlona Zikri Fadli', '', '', 'Mustomi, SE.MM', '196404181986031010', 4, 12, 'Setujui', 'Sudah', 'Cuti', '', '09-2017', '2017-12-11'),
(202, 1736, 0, '2017-12-11 03:54:13', 'December 2017', 'l', 'Sdra', 'Jajang Subarja', '', '', '', '', 'Administrasi ', 'KEPEGAWAIAN', 4, 'Empat', '2017-11-27', '11', '2017-11-30', '11', 0, '0', 'Jakarta', '8990801789', 'Nurromadlona Zikri Fadli', '', '', 'Mustomi, SE.MM', '196404181986031010', 0, 12, 'Setujui', 'Sudah', 'Cuti', '', '11-2017', '2017-12-11'),
(203, 1737, 0, '2017-12-11 03:58:40', 'December 2017', 'p', 'Sdri', 'Ernik Murniasih', '', '', '', '', 'Administrasi ', 'SEKRETARIS', 3, 'Tiga', '2017-02-03', '2', '2017-02-07', '2', 2, '4,5', 'Jakarta', '81510018232', 'Asido Partogi.Manurung', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 9, 12, 'Setujui', 'Sudah', 'Cuti', '', '02-2017', '2017-12-11'),
(204, 1737, 0, '2017-12-11 04:00:19', 'December 2017', 'p', 'Sdri', 'Ernik Murniasih', '', '', '', '', 'Administrasi ', 'SEKRETARIS', 5, 'Lima', '2017-09-15', '9', '2017-09-21', '9', 2, '16,17', 'Surabaya', '81510018232', 'Wulandari', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 4, 12, 'Setujui', 'Sudah', 'Cuti', '', '09-2017', '2017-12-11'),
(205, 1738, 0, '2017-12-11 04:04:24', 'December 2017', 'l', 'Sdra', 'Moh Fahri Husaini', '', '', '', '', 'Administrasi ', 'LOKET', 5, 'Lima', '2017-08-23', '8', '2017-08-28', '8', 1, '20', 'Jakarta', '8990761416', 'Ahmad Rawi', '', '', 'Mustomi, SE.MM', '196404181986031010', 7, 12, 'Setujui', 'Sudah', 'Cuti', '', '08-2017', '2017-12-11'),
(206, 1738, 0, '2017-12-11 04:06:43', 'December 2017', 'l', 'Sdra', 'Moh Fahri Husaini', '', '', '', '', 'Administrasi ', 'LOKET', 7, 'Tujuh', '2017-11-09', '11', '2017-11-15', '11', 0, '0', 'Jakarta', '8990761416', 'Ahmad Rawi', '', '', 'Mustomi, SE.MM', '196404181986031010', 0, 12, 'Setujui', 'Sudah', 'Cuti', '', '11-2017', '2017-12-11'),
(207, 1740, 0, '2017-12-11 04:38:36', 'December 2017', 'p', 'Sdri', 'Rusniansyah', '', '', '', '', 'Administrasi ', 'LOKET', 7, 'Tujuh', '2017-03-31', '3', '2017-04-07', '4', 1, '2', 'Jakarta', '81381466554', 'Dwi Eva Nurvega', '', '', 'Mustomi, SE.MM', '196404181986031010', 5, 12, 'Setujui', 'Sudah', 'Cuti', '', '03-2017', '2017-12-11'),
(208, 1742, 0, '2017-12-11 04:42:35', 'December 2017', 'l', 'Sdra', 'Khari Saddam', '', '', '', '', 'Administrasi ', 'PENGADAAN BARANG DAN JASA', 3, 'Tiga', '2017-02-09', '2', '2017-02-13', '2', 2, '11,12', 'Jakarta', '8998771930', 'Raeza Rifda', '', '', 'Mustomi, SE.MM', '196404181986031010', 9, 12, 'Setujui', 'Sudah', 'Cuti', '', '02-2017', '2017-12-11'),
(209, 1742, 0, '2017-12-11 04:43:32', 'December 2017', 'l', 'Sdra', 'Khari Saddam', '', '', '', '', 'Administrasi ', 'PENGADAAN BARANG DAN JASA', 3, 'Tiga', '2017-08-14', '8', '2017-08-16', '8', 0, '0', 'Jakarta', '8998771930', 'Raeza Rifda', '', '', 'Mustomi, SE.MM', '196404181986031010', 6, 12, 'Setujui', 'Sudah', 'Cuti', '', '08-2017', '2017-12-11'),
(210, 1742, 0, '2017-12-11 04:44:40', 'December 2017', 'l', 'Sdra', 'Khari Saddam', '', '', '', '', 'Administrasi ', 'PENGADAAN BARANG DAN JASA', 6, 'Enam', '2017-11-06', '11', '2017-11-11', '11', 0, '0', 'Jakarta', '8998771930', 'Raeza Rifda', '', '', 'Mustomi, SE.MM', '196404181986031010', 0, 12, 'Setujui', 'Sudah', 'Cuti', '', '11-2017', '2017-12-11'),
(211, 1743, 0, '2017-12-11 04:53:05', 'December 2017', 'l', 'Sdra', 'Pijar Dwi Aditia', '', '', '', '', 'Administrasi ', 'KEUANGAN', 4, 'Empat', '2017-08-28', '8', '2017-08-31', '8', 0, '0', 'Bandung', '8,96374E+11', 'Theresia Oktavina. T', '', '', 'Mustomi, SE.MM', '196404181986031010', 12, 16, 'Setujui', 'Sudah', 'Cuti', '', '08-2017', '2017-12-11'),
(212, 1744, 0, '2017-12-11 04:55:34', 'December 2017', 'p', 'Sdri', 'Retno Arum Imaniati', '', '', '', '', 'Administrasi ', 'SEKRETARIS', 5, 'Lima', '2017-07-17', '7', '2017-07-21', '7', 0, '0', 'Jakarta', '87887211753', 'Ernik Murniasih', '', '', 'Mustomi, SE.MM', '196404181986031010', 7, 12, 'Setujui', 'Sudah', 'Cuti', '', '07-2017', '2017-12-11'),
(213, 1747, 0, '2017-12-11 06:29:13', 'December 2017', 'p', 'Sdri', 'Kartika Yuli Handayani', '', '', '', '', 'Administrasi', 'ADMISI', 4, 'Empat', '2017-09-13', '9', '2017-09-18', '9', 2, '16,17', 'Sukabumi', '82299080421', 'Rusniansyah', '', '', 'Mustomi, SE.MM', '196404181986031010', 8, 12, 'Setujui', 'Sudah', 'Cuti', '', '09-2017', '2017-12-11'),
(214, 1747, 0, '2017-12-11 06:31:46', 'December 2017', 'p', 'Sdri', 'Kartika Yuli Handayani', '', '', '', '', 'Administrasi ', 'ADMISI', 5, 'Lima', '2017-11-15', '11', '2017-11-21', '11', 2, '18,19', 'Jakarta', '82299080421', 'Ratu Makhrani', '', '', 'Mustomi, SE.MM', '196404181986031010', 3, 12, 'Setujui', 'Sudah', 'Cuti', '', '11-2017', '2017-12-11'),
(215, 1753, 0, '2017-12-11 06:37:49', 'December 2017', 'p', 'Sdri', 'Theresia Oktavina. T', '', '', '', '', 'Administrasi ', 'KEUANGAN', 4, 'Empat', '2017-09-13', '9', '2017-09-18', '9', 2, '16,17', 'Medan', '85210481291', 'Pijar Dwi Aditia', '', '', 'Mustomi, SE.MM', '196404181986031010', 8, 12, 'Setujui', 'Sudah', 'Cuti', '', '09-2017', '2017-12-11'),
(216, 1755, 0, '2017-12-11 06:40:04', 'December 2017', 'p', 'Sdri', 'Dwi Eva Nurvega', '', '', '', '', 'Administrasi ', 'LOKET', 4, 'Empat', '2017-07-04', '7', '2017-07-07', '7', 0, '0', 'Jakarta', '89652796774', 'Rusniansyah', '', '', 'Mustomi, SE.MM', '196404181986031010', 8, 12, 'Setujui', 'Sudah', 'Cuti', '', '07-2017', '2017-12-11'),
(217, 1782, 0, '2017-12-11 06:44:52', 'December 2017', 'p', 'Sdri', 'Raeza Rifda', '', '', '', '', 'Administrasi ', 'PENGADAAN BARANG DAN JASA', 3, 'Tiga', '2017-07-26', '7', '2017-07-28', '7', 0, '0', 'Yogyakarta', '81298989996', 'Khari Saddam', '', '', 'Mustomi, SE.MM', '196404181986031010', 9, 12, 'Setujui', 'Sudah', 'Cuti', '', '07-2017', '2017-12-11'),
(218, 1782, 0, '2017-12-11 06:45:50', 'December 2017', 'p', 'Sdri', 'Raeza Rifda', '', '', '', '', 'Administrasi ', 'PENGADAAN BARANG DAN JASA', 6, 'Enam', '2017-09-22', '9', '2017-09-29', '9', 2, '23,24', 'Jakarta', '81298989996', 'Khari Saddam', '', '', 'Mustomi, SE.MM', '196404181986031010', 3, 12, 'Setujui', 'Sudah', 'Cuti', '', '09-2017', '2017-12-11'),
(219, 1785, 0, '2017-12-11 06:49:07', 'December 2017', 'p', 'Sdri', 'Nurlaelah', '', '', '', '', 'Administrasi ', 'LOKET', 4, 'Empat', '2017-07-27', '7', '2017-07-30', '7', 0, '0', 'Jakarta', '87883816455', 'Ahmad Rawi', '', '', 'Mustomi, SE.MM', '196404181986031010', 8, 12, 'Setujui', 'Sudah', 'Cuti', '', '07-2017', '2017-12-11'),
(220, 1785, 0, '2017-12-11 06:50:16', 'December 2017', 'p', 'Sdri', 'Nurlaelah', '', '', '', '', 'Administrasi ', 'LOKET', 4, 'Empat', '2017-12-15', '12', '2017-12-18', '12', 0, '0', 'Jakarta', '87883816455', 'Ahmad Rawi', '', '', 'Mustomi, SE.MM', '196404181986031010', 4, 12, 'Setujui', 'Sudah', 'Cuti', '', '12-2017', '2017-12-11'),
(221, 1786, 0, '2017-12-11 06:53:20', 'December 2017', 'p', 'Sdri', 'Ayu Sintya', '', '', '', '', 'Administrasi ', 'LOKET', 7, 'Tujuh', '2017-10-13', '10', '2017-10-19', '10', 0, '0', 'Jakarta', '87887212002', 'Leistyana Maharinie', '', '', 'Mustomi, SE.MM', '196404181986031010', 5, 12, 'Setujui', 'Sudah', 'Cuti', '', '10-2017', '2017-12-11'),
(222, 1787, 0, '2017-12-11 06:56:08', 'December 2017', 'l', 'Sdra', 'Shidiq Umar Muchtar', '', '', '', '', 'Administrasi ', 'LOKET', 6, 'Enam', '2017-07-10', '7', '2017-07-15', '7', 0, '0', 'Bandung', '8989732821', 'Dwi Eva Nurvega', '', '', 'Mustomi, SE.MM', '196404181986031010', 6, 12, 'Setujui', 'Sudah', 'Cuti', '', '07-2017', '2017-12-11'),
(223, 1787, 0, '2017-12-11 06:58:00', 'December 2017', 'l', 'Sdra', 'Shidiq Umar Muchtar', '', '', '', '', 'Administrasi ', 'LOKET', 3, 'Tiga', '2017-10-21', '10', '2017-10-23', '10', 0, '0', 'Bandung', '8989732821', 'Dwi Eva Nurvega', '', '', 'Mustomi, SE.MM', '196404181986031010', 3, 12, 'Setujui', 'Sudah', 'Cuti', '', '10-2017', '2017-12-11'),
(224, 1788, 0, '2017-12-11 07:00:07', 'December 2017', 'p', 'Sdri', 'Difa Ariestha', '', '', '', '', 'Administrasi ', 'LOKET', 5, 'Lima', '2017-09-22', '9', '2017-09-26', '9', 0, '0', 'NTT', '85770001461', 'Risky Annisa', '', '', 'Mustomi, SE.MM', '196404181986031010', 7, 12, 'Setujui', 'Sudah', 'Cuti', '', '09-2017', '2017-12-11'),
(225, 1808, 0, '2017-12-11 07:02:04', 'December 2017', 'p', 'Sdri', 'Risky Annisa', '', '', '', '', 'Administrasi ', 'LOKET', 5, 'Lima', '2017-09-01', '9', '2017-09-05', '9', 0, '0', 'Semarang', '89653205429', 'Novia Chilfi', '', '', 'Mustomi, SE.MM', '196404181986031010', 7, 12, 'Setujui', 'Sudah', 'Cuti', '', '09-2017', '2017-12-11'),
(226, 1810, 0, '2017-12-11 07:06:47', 'December 2017', 'p', 'Sdri', 'Leistyana Maharinie', '', '', '', '', 'Administrasi ', 'LOKET', 5, 'Lima', '2017-11-04', '11', '2017-11-08', '11', 0, '0', 'Jakarta', '89519367234', 'Ayu Sintya', '', '', 'Mustomi, SE.MM', '196404181986031010', 7, 12, 'Setujui', 'Sudah', 'Cuti', '', '11-2017', '2017-12-11'),
(227, 1814, 0, '2017-12-11 07:08:56', 'December 2017', 'l', 'Sdra', 'Ahmad Rawi', '', '', '', '', 'Administrasi ', 'LOKET', 6, 'Enam', '2017-12-04', '12', '2017-12-09', '12', 0, '0', 'Malang', '82261252012', 'Nurlaelah', '', '', 'Mustomi, SE.MM', '196404181986031010', 6, 12, 'Setujui', 'Sudah', 'Cuti', '', '12-2017', '2017-12-11'),
(228, 1813, 0, '2017-12-11 07:10:43', 'December 2017', 'l', 'Sdra', 'Deni Muhamad Syahrul', '', '', '', '', 'Administrasi ', 'PERENCANAAN', 6, 'Enam', '2017-11-17', '11', '2017-11-24', '11', 2, '18,19', 'Bogor', '81382413974', 'Asido Partogi.Manurung', '', '', 'Mustomi, SE.MM', '196404181986031010', 6, 12, 'Setujui', 'Sudah', 'Cuti', '', '11-2017', '2017-12-11'),
(229, 1763, 0, '2017-12-11 07:16:48', 'December 2017', 'l', 'Sdra', 'Herman Dwi Ariendis', '', '', '', '', 'Administrasi ', 'DRIVER', 5, 'Lima', '2017-01-23', '1', '2017-01-27', '1', 0, '0', 'Jawa', '0838-7250-8315', 'Iwan Setiawan', '', '', 'Mustomi, SE.MM', '196404181986031010', 7, 12, 'Setujui', 'Sudah', 'Cuti', '', '01-2017', '2017-12-11'),
(230, 1764, 0, '2017-12-11 07:18:51', 'December 2017', 'l', 'Sdra', 'Rayendra Aprialdi', '', '', '', '', 'Driver ', 'DRIVER', 8, 'Delapan', '2017-01-06', '1', '2017-01-13', '1', 0, '0', 'Purwokerto', '0812-8375-0237', 'Charles Parulian Wesly', '', '', 'Mustomi, SE.MM', '196404181986031010', 4, 12, 'Setujui', 'Sudah', 'Cuti', '', '01-2017', '2017-12-11'),
(231, 1798, 0, '2017-12-11 07:20:51', 'December 2017', 'l', 'Sdra', 'Iwan Setiawan', '', '', '', '', 'Driver ', 'DRIVER', 3, 'Tiga', '2017-11-02', '11', '2017-11-07', '11', 3, '3,4,6', 'Jakarta', '81283387752', 'Charles Parulian Wesly', '', '', 'Mustomi, SE.MM', '196404181986031010', 9, 12, 'Setujui', 'Sudah', 'Cuti', '', '11-2017', '2017-12-11'),
(233, 1750, 0, '2017-12-13 06:27:56', 'December 2017', 'l', 'Sdra', 'Drg. Fusiana', '', '', '', '', 'Dokter Gigi ', 'POLI RAWAT JALAN', 3, 'Tiga', '2017-12-22', '12', '2017-12-26', '12', 2, '24,25', 'Yogyakarta', '87887444464', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032000', 'Pembina Tk.1 ', 'dr. Dwian Andhika', '198311072010011021', 3, 12, 'Setujui', 'Sudah', 'Cuti', '', '12-2017', '2017-12-13'),
(234, 1763, 0, '2017-12-14 09:13:32', 'December 2017', '', '', 'Herman Dwi Ariendis', '', '', '', '', 'Administrasi ', 'DRIVER', 3, 'Tiga', '2017-12-27', '12', '2017-12-29', '12', 0, '0', 'Jakarta', '83872508315', 'Iwan Setiawan', '', '', 'Mustomi, SE.MM', '196404181986031010', 4, 12, 'Setujui', 'Sudah', 'Cuti', '', '12-2017', '2017-12-14'),
(236, 1777, 0, '2017-12-15 14:29:53', 'December 2017', 'p', 'Sdri', 'Adde Septiana.R', '', '', '', '', 'Asisten Apoteker ', 'APOTEKER', 4, 'Empat', '2017-03-17', '3', '2017-03-20', '3', 0, '0', 'Jakarta', '81219147121', 'Hartyaningsih Lumintu', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 8, 12, 'Setujui', 'Sudah', 'Cuti', '', '03-2017', '2017-12-15'),
(237, 1777, 0, '2017-12-15 14:30:57', 'December 2017', 'p', 'Sdri', 'Adde Septiana.R', '', '', '', '', 'Asisten Apoteker ', 'APOTEKER', 8, 'Delapan', '2017-10-14', '10', '2017-10-21', '10', 0, '0', 'Jakarta', '81219147121', 'Hartyaningsih Lumintu', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 0, 12, 'Setujui', 'Sudah', 'Cuti', '', '10-2017', '2017-12-15'),
(238, 1740, 0, '2017-12-15 14:36:35', 'December 2017', 'p', 'Sdri', 'Rusniansyah', '', '', '', '', 'Administrasi ', 'LOKET', 5, 'Lima', '2017-06-27', '6', '2017-07-01', '7', 0, '0', 'Jakarta', '0813-8146-6554', 'Dwi Eva Nurvega', '', '', 'Mustomi, SE.MM', '196404181986031010', 0, 12, 'Setujui', 'Sudah', 'Cuti', '', '06-2017', '2017-12-15'),
(239, 1702, 0, '2017-12-15 14:49:28', 'December 2017', 'p', 'Sdri', 'Dian Khairunisa, S.Kep', '197910242006042003', '165753', 'Penata Muda Tk ', 'III.b ', 'Bendahara', 'KEUANGAN', 6, 'Enam', '2017-10-13', '10', '2017-10-20', '10', 2, '14,15', 'Jakarta', '0852 8547 4495', 'Enggum Gumih, A.Md.Kep', '197408081997032000', 'Penata Muda', 'Mustomi, SE.MM', '196404181986031010', 3, 12, 'Setujui', 'Sudah', 'Cuti', '', '10-2017', '2017-12-15'),
(240, 1770, 0, '2017-12-15 14:52:50', 'December 2017', 'l', 'Sdra', 'Hafiz Rizky Alvian', '', '', '', '', 'Radiografer ', 'RADIOLOGI', 5, 'Lima', '2017-04-25', '4', '2017-04-29', '4', 0, '0', 'Jakarta', '81289432922', 'Difa Ariestha', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 7, 12, 'Setujui', 'Sudah', 'Cuti', '', '04-2017', '2017-12-15'),
(241, 1770, 0, '2017-12-15 14:56:53', 'December 2017', 'l', 'Sdra', 'Hafiz Rizky Alvian', '', '', '', '', 'Radiografer ', 'RADIOLOGI', 4, 'Empat', '2017-08-09', '8', '2017-08-12', '8', 0, '0', 'Jakarta', '81289432922', 'Difa Ariestha', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 3, 12, 'Setujui', 'Sudah', 'Cuti', '', '08-2017', '2017-12-15'),
(242, 1711, 0, '2017-12-15 15:00:22', 'December 2017', 'p', 'Sdri', 'dr. Derry Ratih Ariyanti Pratika', '', '', '', '', 'Dokter Umum  ', 'DOKTER UMUM IGD', 7, 'Tujuh', '2017-06-23', '6', '2017-06-29', '6', 0, '0', 'Jakarta', '85710997007', 'dr. Erlangga X. D,M.Sc', '', '', 'dr. Dwian Andhika', '198311072010011021', 0, 12, 'Setujui', 'Sudah', 'Cuti', '', '06-2017', '2017-12-15'),
(243, 1718, 0, '2017-12-15 15:11:58', 'December 2017', 'p', 'Sdri', 'Siti Fazriyah', '', '', '', '', 'Perawat Umum  ', 'POLI RAWAT JALAN', 4, 'Empat', '2017-03-02', '3', '2017-03-05', '3', 0, '0', 'Jakarta', '85716534232', 'Nurul Rachmasari', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 8, 12, 'Setujui', 'Sudah', 'Cuti', '', '03-2017', '2017-12-15'),
(244, 1792, 0, '2017-12-15 15:25:45', 'December 2017', 'l', 'Sdra', 'Yudendi', '', '', '', '', 'Perawat Umum  ', 'PERAWAT IGD', 3, 'Tiga', '2017-10-01', '10', '2017-10-03', '10', 0, '0', 'NTT', '82213101848', 'Bayu Setiawan', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 4, 12, 'Setujui', 'Sudah', 'Cuti', '', '10-2017', '2017-12-15'),
(245, 1754, 0, '2017-12-15 15:35:03', 'December 2017', 'l', 'Sdra', 'dr. Erlangga X. D,M.Sc', '', '', '', '', 'Dokter Umum  ', 'DOKTER UMUM IGD', 5, 'Lima', '2017-08-07', '8', '2017-08-11', '8', 0, '0', 'Jakarta', '8125036700', 'dr.Muhammad Fachri Ibrahim', '', '', 'dr. Dwian Andhika', '198311072010011021', 0, 17, 'Setujui', 'Sudah', 'Cuti', '', '08-2017', '2017-12-15'),
(246, 1784, 0, '2017-12-15 15:38:41', 'December 2017', 'l', 'Sdra', 'dr. Hermansyah Pattyranie', '', '', '', '', 'Dokter Umum  ', 'DOKTER UMUM IGD', 12, 'Dua Belas', '2017-08-30', '8', '2017-09-10', '9', 0, '0', 'Jakarta', '81290005551', 'dr.Arif Rahman Hakim', '', '', 'dr. Dwian Andhika', '198311072010011021', 0, 12, 'Setujui', 'Sudah', 'Cuti', '', '08-2017', '2017-12-15'),
(247, 1722, 0, '2017-12-15 15:47:18', 'December 2017', 'p', 'Sdri', 'Yuliyanti Rostaningsih', '', '', '', '', 'Perawat Umum  ', 'PERAWAT IGD', 6, 'Enam', '2017-12-23', '12', '2017-12-30', '12', 2, '24,25', 'Jakarta', '81315711369', 'Rismalia', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 0, 12, 'Setujui', 'Sudah', 'Cuti', '', '12-2017', '2017-12-15'),
(248, 1802, 0, '2017-12-15 15:56:45', 'December 2017', 'p', 'Sdri', 'Nurhayati', '', '', '', '', 'Perawat Umum  ', 'RAWAT INAP', 7, 'Tujuh', '2017-09-11', '9', '2017-09-17', '9', 0, '0', 'Bandung', '81212812573', 'Evi Apniasari', '', '', 'drg. Cut Yuliza Irawani, SP.ORT,MARS', '196607151991032007', 5, 12, 'Setujui', 'Sudah', 'Cuti', '', '09-2017', '2017-12-15'),
(249, 1723, 1720, '2017-12-22 07:08:00', 'December 2017', 'p', 'Sdri', 'Indah Gayuh Prestanty', '', '', '', '', 'Perawat Umum ', 'LABORATURIUM', 6, 'Enam', '2018-06-14', '06', '2018-06-19', '06', 0, '0', 'jogyakarta', '083875261519', 'Sri Herlinah', '', '', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', 6, 18, 'Menunggu', 'Belum', 'Cuti', '', '06-2018', '0000-00-00'),
(250, 1755, 1745, '2017-12-22 11:23:21', 'December 2017', 'p', 'Sdri', 'Dwi Eva Nurvega', '', '', '', '', '', 'LOKET', 7, 'Tujuh', '2018-02-22', '02', '2018-02-28', '02', 0, '0', 'JOGYAKARTA', '089652796774', 'Ulfah Armita', '', '', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', 11, 18, 'Menunggu', 'Sudah', 'Cuti', '', '02-2018', '0000-00-00'),
(252, 1730, 1790, '2017-12-23 17:48:27', 'December 2017', 'p', 'Sdri', 'Hendi Setyowati', '', '', '', '', 'BIDAN', 'RUANG BERSALIN', 3, 'Tiga', '2018-08-21', '08', '2018-08-23', '08', 0, '0', 'KEBUMEN', '087837866745', 'Nahdhiya Sofiana Cahyani', '', '', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', 2, 12, 'Menunggu', 'Belum', 'Cuti', '', '08-2018', '0000-00-00'),
(253, 1751, 1758, '2017-12-24 00:28:41', 'December 2017', 'p', 'Sdri', 'Dita Tias Tiara', '', '', '', '', '', 'RAWAT INAP', 4, 'Empat', '2018-02-17', '02', '2018-02-20', '02', 0, '0', 'jawa', '089691315337', 'Cella Balynda', '', '', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', 12, 16, 'Setujui', 'Sudah', 'Cuti', '', '02-2018', '0000-00-00'),
(254, 1752, 1717, '2017-12-24 01:45:05', 'December 2017', 'p', 'Sdri', 'Ina Merdekawati Papat', '', '', '', '', 'perawat ', 'PERAWAT IGD', 6, 'Enam', '2018-08-17', '08', '2018-08-22', '08', 0, '0', 'malang', '083876754123', 'Nuurul Awaliatun Ni\'Mah', '', '', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', 6, 12, 'Menunggu', 'Belum', 'Cuti', '', '08-2018', '0000-00-00'),
(255, 1801, 1793, '2017-12-24 06:54:07', 'December 2017', 'l', 'Sdra', 'Hegar Laksana.P', '', '', '', '', '', 'PERAWAT IGD', 6, 'Enam', '2018-03-23', '03', '2018-03-28', '03', 0, '0', 'jawa barat', '08981436267', 'Darojatul Hulwiyah', '', '', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', 12, 18, 'Menunggu', 'Belum', 'Cuti', '', '03-2018', '0000-00-00'),
(256, 1769, 1827, '2017-12-26 01:13:36', 'December 2017', 'p', 'Sdri', 'Ratu Makhrani', '', '', '', '', '', 'REKAM MEDIS', 3, 'Tiga', '2018-03-19', '03', '2018-03-21', '03', 0, '0', 'bandung', '089635483525', 'Rina Fauziah', '', '', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', 9, 12, 'Menunggu', 'Belum', 'Cuti', '', '03-2018', '0000-00-00'),
(257, 1769, 1828, '2017-12-26 01:16:49', 'December 2017', 'p', 'Sdri', 'Ratu Makhrani', '', '', '', '', '', 'REKAM MEDIS', 4, 'Empat', '2018-06-18', '06', '2018-06-21', '06', 0, '0', 'bandung', '089635483525', 'Iin sariningsih', '', '', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', 5, 12, 'Menunggu', 'Belum', 'Cuti', '', '06-2018', '0000-00-00'),
(259, 1811, 1779, '2017-12-27 03:03:47', 'December 2017', 'l', 'Sdra', 'Deni Muhamad Furkon ', '', '', '', '', '', 'JURU MASAK', 3, 'Tiga', '2018-01-04', '01', '2018-01-06', '01', 0, '0', 'BOGOR', '085714482626', 'Tomi Ardianto', '', '', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', 12, 12, 'Tolak', 'Sudah', 'Cuti', '', '01-2018', '0000-00-00'),
(261, 1695, 1822, '2017-12-27 07:06:43', 'December 2017', 'p', 'Sdri', 'Hamidah Rahmawati, S.Farm, Apt', '198106052008012026', '171774', 'Apoteker Muda', 'III.c', 'Apoteker', 'APOTEKER', 6, 'Enam', '2018-02-05', '02', '2018-02-12', '02', 2, '10,11', 'Makkah', '0812 8115 4984', 'Maharani Pratiwi, S.Farm, Apt', '', '', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', 9, 15, 'Setujui', 'Belum', 'Cuti', '', '02-2018', '0000-00-00'),
(262, 1732, 1731, '2017-12-28 00:54:07', 'December 2017', 'p', 'Sdri', 'Fya Yunita Sanggian', '', '', '', '', 'Bidan', 'RUANG BERSALIN', 5, 'Lima', '2018-03-29', '03', '2018-04-02', '04', 0, '0', 'Subang', '081280087230', 'Ratna Dewi Pujawati', '', '', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', 12, 17, 'Menunggu', 'Belum', 'Cuti', '', '03-2018', '0000-00-00'),
(263, 1719, 1721, '2017-12-28 01:21:46', 'December 2017', 'p', 'Sdri', 'Sutpiyatu Sadiyah', '', '', '', '', 'Perawat Umum', 'RAWAT INAP', 7, 'Tujuh', '2018-03-10', '03', '2018-03-16', '03', 0, '0', 'Madura', '089663012482', 'Lutfiyah Anggraini', '', '', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', 11, 18, 'Menunggu', 'Belum', 'Cuti', '', '03-2018', '2018-01-13'),
(266, 1753, 1743, '2017-12-28 03:23:51', 'December 2017', 'p', 'Sdri', 'Theresia Oktavina. T', '', '', '', '', 'Administrasi ', 'KEUANGAN', 3, 'Tiga', '2018-01-02', '01', '2018-01-04', '01', 0, '0', 'Medan', '085210481291', 'Pijar Dwi Aditia', '', '', 'Mustomi, SE.MM', '196404181986031010', 15, 18, 'Setujui', 'Sudah', 'Cuti', '', '01-2018', '2017-12-28'),
(272, 1688, 1830, '2017-12-29 02:23:11', 'December 2017', 'p', 'Sdri', 'dr. Netty Siahaan, M.K.M', '196104241987112001', '127822', 'IV.b', '-', 'Direktur', 'DIREKTUR', 5, 'Lima', '2018-01-02', '01', '2018-01-08', '01', 2, '6,7', 'Jakarta', '0812 1888 5312', 'dr. Nailah, M.Si', '197710212006042025', '-', 'dr. R. Koesmedi Priharto, Sp.OT.M.Kes', '195808071987031007', 10, 15, 'Setujui', 'Sudah', 'Cuti', '', '01-2018', '0000-00-00'),
(273, 1825, 1823, '2017-12-29 07:04:46', 'December 2017', 'p', 'Sdri', 'dr.Maya Ramadhani Ningtyas', '', '', '', '', 'dokter', 'DOKTER UMUM IGD', 6, 'Enam', '2018-08-16', '08', '2018-08-21', '08', 0, '0', 'padang', '081290774948', 'dr.Muhammad Fachri Ibrahim', '', '', 'dr. Dwian Andhika', '198311072010011021', 6, 12, 'Menunggu', 'Belum', 'Cuti', '', '08-2018', '0000-00-00'),
(274, 1800, 1820, '2017-12-29 08:56:48', 'December 2017', 'l', 'Sdra', 'dr.Arif Rahman Hakim', '', '', '', '', 'dokter umum', 'DOKTER UMUM IGD', 6, 'Enam', '2018-03-22', '03', '2018-03-27', '03', 0, '0', 'kalimantan', '081280394746', 'dr.Rafael Nanda Raudranisala', '', '', 'dr. Dwian Andhika', '198311072010011021', 6, 12, 'Menunggu', 'Belum', 'Cuti', '', '03-2018', '0000-00-00'),
(275, 1702, 1703, '2017-12-29 10:02:24', 'December 2017', 'p', 'Sdri', 'Dian Khairunisa, S.Kep', '197910242006042003', '165753', 'Penata Muda Tk ', 'III.b ', 'Bendahara', 'KEUANGAN', 3, 'Tiga', '2018-01-09', '01', '2018-01-11', '01', 0, '0', 'Jakarta', '0852 8547 4495', 'Enggum Gumih, A.Md.Kep', '197408081997032002', 'Penata Muda', 'Mustomi, SE.MM', '196404181986031010', 12, 15, 'Setujui', 'Sudah', 'Cuti', '', '01-2018', '2017-12-29'),
(276, 1702, 1703, '2017-12-29 10:03:45', 'December 2017', 'p', 'Sdri', 'Dian Khairunisa, S.Kep', '197910242006042003', '165753', 'Penata Muda Tk ', 'III.b ', 'Bendahara', 'KEUANGAN', 3, 'Tiga', '2018-11-04', '11', '2018-11-06', '11', 0, '0', 'Jakarta', '0852 8547 4495', 'Enggum Gumih, A.Md.Kep', '197408081997032002', 'Penata Muda', 'Mustomi, SE.MM', '196404181986031010', 3, 15, 'Menunggu', 'Belum', 'Cuti', '', '11-2018', '2017-12-29'),
(277, 1790, 1789, '2017-12-31 04:42:07', 'December 2017', 'p', 'Sdri', 'Nahdhiya Sofiana Cahyani', '', '', '', '', 'Bidan Pelaksana Lanjutan', 'RUANG BERSALIN', 5, 'Lima', '2018-04-10', '04', '2018-04-14', '04', 0, '0', 'ntt', '081212511481', 'Rini Pakpahan', '', '', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', 7, 12, 'Menunggu', 'Belum', 'Cuti', '', '04-2018', '0000-00-00'),
(279, 1690, 1691, '2018-01-10 05:57:20', 'January 2018', 'p', 'Sdri', 'drg. Cut Yuliza I. Sp.Ort,MARS', '196607151991032007', '125483', 'Pembina Tk.1 ', 'IV.b', 'Kepala Seksi Penunjang Medis ', 'KEPALA SESKSI PENUNJANG MEDIS', 8, 'Delapan', '2018-04-09', '04', '2018-04-18', '04', 2, '14,15', 'Eropa', '087823804550', 'dr. Dwian Andhika', '198311072010011021', 'Penata', 'dr. Netty Siahaan, M.K.M', '196104241987112001', 7, 15, 'Setujui', 'Sudah', 'Cuti', 'Liburan', '04-2018', '2018-01-10'),
(280, 1783, 1800, '2018-01-10 09:23:44', 'January 2018', 'p', 'Sdri', 'dr.Siti Mulyati', '', '', '', '', 'Dokter Umum  ', 'DOKTER UMUM IGD', 5, 'Lima', '2018-06-14', '06', '2018-06-18', '06', 0, '0', 'Bayah Banten', '085322225950', 'dr.Arif Rahman Hakim', '', '', 'dr. Dwian Andhika', '198311072010011021', 7, 12, 'Menunggu', 'Belum', 'Cuti', 'Keperluan Keluarga', '06-2018', '2018-01-10'),
(284, 1815, 1780, '2018-01-11 13:59:56', 'January 2018', 'l', 'Sdra', 'Retno Dwi Handayani', '', '', '', '', 'Asisten Apoteker ', 'APOTEKER', 7, 'Tujuh', '2018-01-03', '01', '2018-01-09', '01', 0, '0', 'Jakarta', '089648741952', 'Hartyaningsih Lumintu', '', '', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', 11, 18, 'Menunggu', 'Sudah', 'Cuti', 'Liburan Keluarga', '01-2018', '2018-01-11'),
(289, 1754, 1823, '2018-01-11 14:49:30', 'January 2018', 'l', 'Sdra', 'dr. Erlangga X. D,M.Sc', '', '', '', '', 'Dokter Umum  ', 'DOKTER UMUM IGD', 7, 'Tujuh', '2018-02-05', '02', '2018-02-11', '02', 0, '0', 'Jakarta', '085710997007', 'dr.Muhammad Fachri Ibrahim', '', '', 'dr. Dwian Andhika', '198311072010011021', 5, 12, 'Menunggu', 'Belum', 'Cuti', 'Liburan Keluarga', '02-2018', '2018-01-11'),
(292, 1761, 1775, '2018-01-13 14:47:43', 'January 2018', 'p', 'Sdri', 'Rismalia', '', '', '', '', '', 'PERAWAT IGD', 6, 'Enam', '2018-03-10', '03', '2018-03-15', '03', 0, '0', 'gombong', '085719098929', 'Ma\'Sum', '', '', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', 6, 12, 'Menunggu', 'Belum', 'Cuti', 'urusan keluarga', '03-2018', '0000-00-00'),
(293, 1692, 0, '2018-01-13 15:04:24', 'January 2018', 'l', 'Sdra', 'dr. Riki Tsan, Sp.M', '196212121988121002', '162195', 'Pembina', ' IV.a', 'Dokter Madya ', 'DOKTER SPESIALIS', 10, 'Sepuluh', '2018-01-11', '01', '2018-01-22', '01', 2, '14,21', 'Makkah', '081316919313', '-', '', '', 'dr. Dwian Andhika', '198311072010011021', 4, 14, 'Menunggu', 'Sudah', 'Cuti', 'Pergi Umrah', '01-2018', '2018-01-13'),
(294, 1747, 1739, '2018-01-13 15:10:55', 'January 2018', 'p', 'Sdri', 'Kartika Yuli Handayani', '', '', '', '', 'Adminisi', 'ADMISI', 4, 'Empat', '2018-01-22', '01', '2018-01-27', '01', 2, '24,25', 'Jakarta', '082299080421', 'Mega Firdianti', '', '', 'Mustomi, SE.MM', '196404181986031010', 11, 15, 'Menunggu', 'Sudah', 'Cuti', 'Liburan Keluarga', '01-2018', '2018-01-13'),
(295, 1742, 1782, '2018-01-13 15:18:58', 'January 2018', 'l', 'Sdra', 'Khari Saddam', '', '', '', '', 'Administrasi ', 'PENGADAAN BARANG DAN JASA', 3, 'Tiga', '2018-03-29', '03', '2018-04-03', '04', 3, '30,31,1', 'Yogyakarta', '08998771930', 'Raeza Rifda', '', '', 'Mustomi, SE.MM', '196404181986031010', 9, 12, 'Menunggu', 'Belum', 'Cuti', 'Liburan Keluarga', '03-2018', '2018-01-13'),
(296, 1796, 1792, '2018-01-13 15:29:34', 'January 2018', 'l', 'Sdra', 'Bayu Setiawan', '', '', '', '', 'Perawat Umum  ', 'PERAWAT IGD', 3, 'Tiga', '2018-04-11', '04', '2018-04-13', '04', 0, '0', 'Jakarta', '081297000034', 'Yudendi', '', '', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', 9, 12, 'Menunggu', 'Belum', 'Cuti', 'Liburan Keluarga', '04-2018', '2018-01-13'),
(297, 1799, 1696, '2018-01-13 15:35:45', 'January 2018', 'p', 'Sdri', 'Sari Mulyaningsih', '', '', '', '', 'Nutrisionist ', 'INSTALASI GIZI', 4, 'Empat', '2018-06-18', '06', '2018-06-21', '06', 0, '0', 'Jakarta', '0895322325964', 'Sapti Agustini, Bsc', '196008071985032005', 'Penata', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', 14, 18, 'Menunggu', 'Belum', 'Cuti', 'Liburan Keluarga', '06-2018', '2018-01-13'),
(298, 1731, 1728, '2018-01-13 15:39:13', 'January 2018', 'p', 'Sdri', 'Ratna Dewi Pujawati', '', '', '', '', 'Bidan  ', 'RUANG BERSALIN', 5, 'Lima', '2018-06-20', '06', '2018-06-24', '06', 0, '0', 'Jakarta', '082122688828', 'Roma Jayanti', '', '', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', 12, 17, 'Menunggu', 'Belum', 'Cuti', 'Liburan Keluarga', '06-2018', '2018-01-13'),
(299, 1716, 1724, '2018-01-15 07:16:22', 'January 2018', 'p', 'Sdri', 'Fitri Fauziah', '', '', '', '', 'Perawat Umum  ', 'POLI RAWAT JALAN', 3, 'Tiga', '2018-01-15', '01', '2018-01-17', '01', 0, '0', 'Bogor', '082120732623', 'Nawang Wulan Indriasari', '', '', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', 12, 15, 'Setujui', 'Belum', 'Cuti', 'Liburan Keluarga', '01-2018', '2018-01-15'),
(300, 1806, 1771, '2018-01-15 07:28:27', 'January 2018', 'l', 'Sdra', 'Purmawansyah', '', '', '', '', 'Perawat Umum  ', 'RAWAT INAP', 12, 'Dua Belas', '2018-02-01', '02', '2018-02-14', '02', 2, '4,11', 'Kalimantan', '085282683169', 'Aris Subiyanto', '', '', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', 0, 12, 'Setujui', 'Belum', 'Cuti', 'Liburan', '02-2018', '2018-01-15'),
(301, 1729, 1727, '2018-01-15 07:46:33', 'January 2018', 'p', 'Sdri', 'Dewi Trisnawati', '', '', '', '', 'Bidan Pelaksana Lanjutan', 'RUANG BERSALIN', 6, 'Enam', '2018-05-05', '05', '2018-05-12', '05', 2, '6,10', 'Yogyakarta', '085310910772', 'Heny Berliana Wijayanti', '', '', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', 6, 12, 'Menunggu', 'Belum', 'Cuti', 'Menikah', '05-2018', '0000-00-00'),
(302, 1729, 1727, '2018-01-15 07:50:22', 'January 2018', 'p', 'Sdri', 'Dewi Trisnawati', '', '', '', '', 'Bidan Pelaksana Lanjutan', 'RUANG BERSALIN', 6, 'Enam', '2018-12-24', '12', '2018-12-31', '12', 2, '25,30', 'Bandung', '085310910772', 'Heny Berliana Wijayanti', '', '', 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', 0, 12, 'Menunggu', 'Belum', 'Cuti', 'Liburan', '12-2018', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_hukuman`
--

CREATE TABLE `data_hukuman` (
  `id_hukuman` int(50) NOT NULL,
  `id_data_pegawai` int(50) NOT NULL,
  `id_master_hukuman` int(50) NOT NULL,
  `uraian` text NOT NULL,
  `nomor_sk` varchar(100) NOT NULL,
  `tanggal_sk` varchar(100) NOT NULL,
  `tanggal_mulai` varchar(50) NOT NULL,
  `tanggal_selesai` varchar(50) NOT NULL,
  `masa_berlaku` varchar(100) NOT NULL,
  `pejabat_menetapkan` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_jabatan`
--

CREATE TABLE `data_jabatan` (
  `id_riwayat_jabatan` int(50) NOT NULL,
  `id_data_pegawai` int(50) NOT NULL,
  `id_master_jabatan` int(11) NOT NULL,
  `id_unit_kerja` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `penempatan` varchar(50) NOT NULL,
  `uraian` text NOT NULL,
  `nomor_sk` varchar(50) NOT NULL,
  `tanggal_sk` varchar(50) NOT NULL,
  `tanggal_mulai` varchar(50) NOT NULL,
  `tanggal_selesai` varchar(50) NOT NULL,
  `lokasi` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_keluarga`
--

CREATE TABLE `data_keluarga` (
  `id_data_keluarga` int(50) NOT NULL,
  `id_data_pegawai` int(50) NOT NULL,
  `no_ktp_keluarga` varchar(18) NOT NULL,
  `no_kk` varchar(18) NOT NULL,
  `nama_anggota_keluarga` varchar(150) NOT NULL,
  `tanggal_lahir` varchar(100) NOT NULL,
  `status_kawin` varchar(50) NOT NULL,
  `uraian` text NOT NULL,
  `pekerjaan` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kirim_pesan`
--

CREATE TABLE `data_kirim_pesan` (
  `id` int(11) NOT NULL,
  `id_cuti` int(11) NOT NULL,
  `id_data_pegawai` int(11) NOT NULL,
  `bulan_surat` varchar(225) NOT NULL,
  `judul` varchar(225) NOT NULL,
  `dari` varchar(225) NOT NULL,
  `ke` varchar(225) NOT NULL,
  `jenis_pesan` varchar(225) NOT NULL,
  `isi_pesan` text NOT NULL,
  `status_baca` varchar(10) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_kirim_pesan`
--

INSERT INTO `data_kirim_pesan` (`id`, `id_cuti`, `id_data_pegawai`, `bulan_surat`, `judul`, `dari`, `ke`, `jenis_pesan`, `isi_pesan`, `status_baca`, `tanggal`) VALUES
(1, 0, 1813, 'January 2018', 'Test Kirim Pesan', 'Admin', '1813', 'Pengumuman', 'Ini adalah pesan uji coba fitur kirim pesan melalui aplikasi simpeg RSUD Cilincing', 'Sudah', '2018-01-09 14:09:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kuota_cuti`
--

CREATE TABLE `data_kuota_cuti` (
  `id_kuota` int(11) NOT NULL,
  `nama_unit_kerja` varchar(225) NOT NULL,
  `jml_kuota` int(11) NOT NULL,
  `batas_pengajuan` int(2) NOT NULL,
  `jml_cuti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_kuota_cuti`
--

INSERT INTO `data_kuota_cuti` (`id_kuota`, `nama_unit_kerja`, `jml_kuota`, `batas_pengajuan`, `jml_cuti`) VALUES
(27, 'DOKTER SPESIALIS', 10, 1, 1),
(28, 'DOKTER UMUM POLI', 10, 1, 1),
(29, 'RUANG BERSALIN', 10, 1, 2),
(30, 'FARMASI', 10, 1, 1),
(31, 'INSTALASI GIZI', 10, 1, 1),
(32, 'LOKET', 10, 1, 1),
(33, 'KASIR', 10, 1, 1),
(34, 'KEPEGAWAIAN', 10, 1, 1),
(35, 'SECURITY', 10, 1, 1),
(36, 'KESLING', 10, 1, 1),
(37, 'KEUANGAN', 10, 1, 1),
(38, 'ADMISI', 10, 1, 1),
(39, 'RM', 10, 1, 1),
(40, 'ADMINISTRASI', 10, 1, 1),
(41, 'SEKERTARIS', 10, 1, 1),
(42, 'LABORATURIUM', 10, 1, 1),
(43, 'POLI RAWAT JALAN', 10, 1, 1),
(44, 'PERAWAT IGD', 10, 1, 1),
(45, 'JENAZAH', 10, 1, 1),
(46, 'DRIVER', 10, 1, 1),
(47, 'RAWAT INAP', 10, 1, 1),
(48, 'APOTEKER', 10, 1, 1),
(49, 'RUMAH SAKIT UMUM DAERAH CILINCING', 10, 1, 1),
(50, 'ASISTEN APOTEKER', 10, 1, 1),
(51, 'KEPALA SUB BAGIAN TATA USAHA', 10, 1, 1),
(52, 'KEPALA SEKSI PELAYANAN MEDIS', 10, 1, 1),
(53, 'REKAM MEDIS', 10, 1, 1),
(54, 'KEPALA SESKSI PENUNJANG MEDIS', 10, 1, 1),
(55, 'DOKTER UMUM IGD', 10, 1, 1),
(56, 'PENGADAAN BARANG DAN JASA', 10, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_mou`
--

CREATE TABLE `data_mou` (
  `id_mou` int(11) NOT NULL,
  `id_data_pegawai` int(11) NOT NULL,
  `nomor_mou` varchar(15) NOT NULL,
  `tanggal_mou` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pegawai`
--

CREATE TABLE `data_pegawai` (
  `id_data_pegawai` int(11) NOT NULL,
  `id_atasan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `nrk` varchar(10) NOT NULL,
  `nopeg` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `akses_level` varchar(15) NOT NULL,
  `pangkat` varchar(100) NOT NULL,
  `golongan_ruang` varchar(50) NOT NULL,
  `tahun_masa_kerja` int(3) NOT NULL,
  `bulan_masa_kerja` int(3) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `tempat_lhr` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `pendidikan_trkh` varchar(20) NOT NULL,
  `no_rekening` varchar(25) NOT NULL,
  `no_ktp` varchar(25) NOT NULL,
  `no_npwp` varchar(25) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `gaji` int(11) NOT NULL,
  `tkd` int(11) NOT NULL,
  `jenis_tunjangan` varchar(50) NOT NULL,
  `unit_kerja` varchar(40) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_pegawai`
--

INSERT INTO `data_pegawai` (`id_data_pegawai`, `id_atasan`, `nama`, `nip`, `nrk`, `nopeg`, `password`, `akses_level`, `pangkat`, `golongan_ruang`, `tahun_masa_kerja`, `bulan_masa_kerja`, `jabatan`, `jenis_kelamin`, `tempat_lhr`, `tgl_lahir`, `alamat`, `pendidikan_trkh`, `no_rekening`, `no_ktp`, `no_npwp`, `no_hp`, `gaji`, `tkd`, `jenis_tunjangan`, `unit_kerja`, `gambar`, `email`, `tanggal_daftar`, `tanggal`) VALUES
(1, 2, 'Ridwan Arifin', '', '', '701001', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'SECURITY', 'L', 'JAKARTA', '1980-09-09', 'JL.KEBANTENAN III NO.16 RT.06/07 KEL.SEMPER TIMUR/ CILINCING JAKARTA UTARA', 'SMA', '20520083711', '3172040909800004', '481637817045000', '089637290909', 0, 0, '', 'SECURITY', '', 'unknow@gmail.com', '2013-10-01', '2018-01-04 03:02:33'),
(2, 2, 'Hilman Hamadi', '', '', '701002', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'SECURITY', 'L', 'TANGERANG', '1984-08-04', 'RUSUN BLOK A LT.VI NO.28 RT.05/10 KEL.CILINCING/ CILINCING-JAKUT', 'SMA', '20520083771', '3603050408840004', '354968737045000', '089602501243', 0, 0, '', 'SECURITY', '', 'unknow@gmail.com', '2013-10-01', '2018-01-04 03:02:33'),
(3, 2, 'Zaenal Zaprinal', '', '', '701003', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'SECURITY', 'L', 'JAKARTA', '1979-04-23', 'JL. BARU GG.II RT.12/02 KEL. CILINCING/ CILINCING JAKARTA UTARA', 'SMA', '20520083797', '3171012304790007', '727317356045000', '08989702011', 0, 0, '', 'SECURITY', '', 'unknow@gmail.com', '2015-04-01', '2018-01-04 03:02:33'),
(4, 2, 'Abdul Malik', '', '', '701004', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'SECURITY', 'L', 'CIREBON', '1983-08-20', 'JL. JATINEGARA KAUM UTARA RT.08/04 KEL.PULOGADUNG/PULOGADUNG JAKARTA TIMUR', 'SMA', '52920002149', '3175022008830004', '587220914003000', '087883946983', 0, 0, '', 'SECURITY', '', 'unknow@gmail.com', '2015-05-04', '2018-01-04 03:02:33'),
(5, 2, 'Rudi Prayitno', '', '', '701005', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'SECURITY', 'L', 'PEKALONGAN', '1993-01-19', 'JL. TIPAR CAKUNG RT.01/04 KEL..SEMPER BARAT/ CILINCING JAKARTA UTARA', 'SMA', '20520085447', '3326111901930002', '985186428502000', '089607683957', 0, 0, '', 'SECURITY', '', 'unknow@gmail.com', '2015-05-04', '2018-01-04 03:02:33'),
(6, 2, 'Muhayar', '', '', '701006', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'SECURITY', 'L', 'JAKARTA', '1984-03-10', 'JL. TIPAR TIMUR RT.03/04 NO. 44 KEL..SEMPER BARAT/ CILINCING JAKARTA UTARA', 'SMA', '20520085561', '3172041003840007', '985186642045000', '089688080009', 0, 0, '', 'SECURITY', '', 'unknow@gmail.com', '2015-05-04', '2018-01-04 03:02:33'),
(7, 2, 'Ade Maulana', '', '', '701007', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'SECURITY', 'L', 'BOGOR', '1990-03-04', 'JL. TIPAR TIMUR RT.05/04 NO. 23 KEL..SEMPER BARAT/ CILINCING JAKARTA UTARA', 'SMA', '20520084068', '3271010403900018', '729246686045000', '089649961730', 0, 0, '', 'SECURITY', '', 'unknow@gmail.com', '2015-05-04', '2018-01-04 03:02:33'),
(8, 2, 'Hari Santoso', '', '', '701008', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'SECURITY', 'L', 'JAKARTA', '1985-05-06', 'JL. KEBANTENAN III NO.14 RT.09/06 KEL..SEMPER TIMUR/ CILINCING JAKARTA UTARA', 'SMA', '20220094255', '3172040605850004', '729214916045000', '08991674671', 0, 0, '', 'SECURITY', '', 'unknow@gmail.com', '2015-05-04', '2018-01-04 03:02:33'),
(9, 2, 'Roby Sunjaya', '', '', '701009', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'SECURITY', 'L', 'BOGOR', '1985-01-02', 'JL. KEBANTENAN RT.06/02 KEL..SEMPER TIMUR/ CILINCING JAKARTA UTARA', 'SMA', '20520085412', '3271050201850003', '729834507404000', '08973961189', 0, 0, '', 'SECURITY', '', 'unknow@gmail.com', '2015-05-04', '2018-01-04 03:02:33'),
(10, 2, 'Joko', '', '', '701010', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'SECURITY', 'L', 'JAKARTA', '1984-02-11', 'JL. KELAPA DUA RT. 014/ 03 NO. 25 KEL.CILINCING, CILINCING 14120 JAKARTA UTARA', 'SMA', '20520087024', '3172041102840006', '734020803045000', '089620143426', 0, 0, '', 'SECURITY', '', 'unknow@gmail.com', '2015-07-01', '2018-01-04 03:02:33'),
(11, 2, 'Asep Wahyudin', '', '', '701011', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'SECURITY', 'L', 'SUBANG', '1983-09-22', 'JL. NARAYANA RT 006/020 N0. 06 HARAPAN JAYA BEKASI UTARA ', 'SMA', '60023016190', '3275031209830029', '784038234407000', '081934181897', 0, 0, '', 'SECURITY', '', 'unknow@gmail.com', '2015-07-01', '2018-01-04 03:02:33'),
(12, 2, 'Rizal Mutaqin', '', '', '701012', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'SECURITY', 'L', 'BOGOR', '1988-05-09', 'KP.DUKUH RT.01/01 DS.DUKUH/ CIBUNGBULANG KAB.BOGOR JA-BAR', 'SMA', '20520088365', '3201160905880005', '742002561434000', '086951225464', 0, 0, '', 'SECURITY', '', 'unknow@gmail.com', '2015-10-01', '2018-01-04 03:02:33'),
(13, 2, 'Dwi Wahyuni', '', '', '701013', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'SECURITY', 'P', 'JAKARTA', '1989-10-30', 'JL.MARUNDA GG.4 NO.28 RT.06/06 KEL.MARUNDA/ CILINCING JAKARTA UTARA', 'SMA', '20523169625', '3216017010890001', '641714134414000', '081293719934', 0, 0, '', 'SECURITY', '', 'unknow@gmail.com', '2017-02-01', '2018-01-04 03:02:33'),
(14, 2, 'Jumadi Apriyanto', '', '', '702001', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'CLEANING SERVICE', 'L', 'JAKARTA', '1993-04-10', 'JL.KALIBARU TIMUR RT.15/03 KEL.KALIBARU/ CILINCING JAKARTA UTARA', 'SMK', '20520083789', '3172041004930007', '721350007045000', '089619350736', 0, 0, '', 'CLEANING SERVICE', '', 'unknow@gmail.com', '2014-08-01', '2018-01-04 03:02:33'),
(15, 2, 'Mujaenah', '', '', '702002', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'CLEANING SERVICE', 'P', 'JAKARTA', '1977-04-07', 'JL.KALIBARU BARAT IV RT.02/07 KEL.KALIBARU/ CILINCING JAKARTA UTARA', 'SMP', '20520083762', '3172044704770003', '875548844045000', '089611269843', 0, 0, '', 'CLEANING SERVICE', '', 'unknow@gmail.com', '2012-09-01', '2018-01-04 03:02:33'),
(16, 2, 'Stefanie', '', '', '702003', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'CLEANING SERVICE', 'P', 'JAKARTA', '1995-01-18', 'JL.KEBANTENAN III RT.02/02 KEL.SEMPER TIMUR/ CILINCING JAKARTA UTARA', 'SMK', '20520083754', '3173035801950001', '723044558045000', '08996634979', 0, 0, '', 'CLEANING SERVICE', '', 'unknow@gmail.com', '2014-08-01', '2018-01-04 03:02:33'),
(17, 2, 'Siti Indah Namirah', '', '', '702004', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'CLEANING SERVICE', 'P', 'TANGERANG', '1996-08-10', 'JL.KALIBARU TIMUR IV RT.06/13 KEL.KALIBARU/ CILINCING JAKARTA UTARA', 'SMP', '20520083738', '3172045008960008', '721481885045000', '089625747290', 0, 0, '', 'CLEANING SERVICE', '', 'unknow@gmail.com', '2013-12-01', '2018-01-04 03:02:33'),
(18, 2, 'Nina Novita Halim', '', '', '702006', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'CLEANING SERVICE', 'P', 'JAKARTA', '1980-03-21', 'JL.KALIBARU TIMUR III NO.10 RT.02/02 KEL.KALIBARU/ CILINCING JAKARTA UTARA', 'SMK', '20520083746', '3172046103800002', '595797747045000', '082111268524', 0, 0, '', 'CLEANING SERVICE', '', 'unknow@gmail.com', '2014-09-01', '2018-01-04 03:02:33'),
(19, 2, 'Sumarni', '', '', '702007', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'CLEANING SERVICE', 'P', 'JAKARTA', '0000-00-00', 'JL. SUNGAI LANDAK RT.011/008 NO. 17 KEL.CILINCING, CILINCING JAKARTA UTARA 14120', 'SMA', '20520086443', '3172044311840002', '799981089045000', '082298181400', 0, 0, '', 'CLEANING SERVICE', '', 'unknow@gmail.com', '2015-07-01', '2018-01-04 03:02:33'),
(20, 2, 'Sutisna', '', '', '702008', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'CLEANING SERVICE', 'L', 'PANDEGLANG', '1995-03-13', 'JL.KP CIKADUEUN RT. 003/002 KEL. CIKADUEUN, CIPEUCANG', 'SMK', '20520087083', '3601151412950002', '734476229045000', '087773501647', 0, 0, '', 'CLEANING SERVICE', '', 'unknow@gmail.com', '2015-07-01', '2018-01-04 03:02:33'),
(21, 2, 'Rahmatang', '', '', '702009', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'CLEANING SERVICE', 'P', 'RIAU', '1987-03-31', 'JL. KALI BARU TIMUR RT.012/003 NO. 75 KEL.KALIBARU, CILINCING JAKARTA UTARA', 'SMA', '20520086435', '3172037103870008', '973174568045000', '089651867144', 0, 0, '', 'CLEANING SERVICE', '', 'unknow@gmail.com', '2015-07-01', '2018-01-04 03:02:33'),
(22, 2, 'Maryanah', '', '', '702011', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'CLEANING SERVICE', 'P', 'JAKARTA', '1989-03-20', 'KP.SUKAPURA NO. 20 RT. 07/04   KEL.SUKAPURA KEC. CILINCING JAK-UT', 'SMK', '20520087261', '3172046003890004', '892137217417000', '087886602610', 0, 0, '', 'CLEANING SERVICE', '', 'unknow@gmail.com', '2015-07-01', '2018-01-04 03:02:33'),
(23, 2, 'Andri Sukman', '', '', '702012', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'CLEANING SERVICE', 'L', 'JAKARTA', '0000-00-00', 'JL.KEBON JAHE IV NO.20 RT.08/02 KEL.PETOJO SELATAN/ GAMBIR-JAKPUS', 'STM', '20523162612', '3171010505780002', '670422781028000', '083815876814', 0, 0, '', 'CLEANING SERVICE', '', 'unknow@gmail.com', '2016-04-01', '2018-01-04 03:02:33'),
(24, 2, 'Ramdani Pratama.P', '', '', '702013', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'CLEANING SERVICE', 'L', 'PURWOREJO', '1994-03-08', 'JL.KAMPUNG MELAYU RT.06/01 KEL.TUGU SELATAN/ KOJA-JAKUT', 'SMA', '20523162604', '3172030803940006', '665853933531000', '089676151840', 0, 0, '', 'CLEANING SERVICE', '', 'unknow@gmail.com', '2016-04-01', '2018-01-04 03:02:33'),
(25, 2, 'Cawiri', '', '', '702014', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'CLEANING SERVICE', 'L', 'INDRAMAYU', '1998-08-06', 'BLOK MUSTA NO.-RT.08/03 DS.LAMARAN TARUNG/CANTIGI KAB.INDRAMAYU JABAR', 'SMA', '20523167177', '3212174608940001', '800300360437000', '087888812023', 0, 0, '', 'CLEANING SERVICE', '', 'unknow@gmail.com', '2016-10-01', '2018-01-04 03:02:33'),
(27, 2, 'Abdul Hamid', '', '', '702017', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'CLEANING SERVICE', 'L', 'BEKASI', '1998-04-28', 'KP.LAGOA RT.03/06 DESA.PAHLAWANSETIA/ TARUMAJAYA KAB.BEKASI JAWA BARAT', 'SMA', '20523170321', '3216012804980007', '814592416435000', '085891455264', 0, 0, '', 'CLEANING SERVICE', '', 'unknow@gmail.com', '2017-03-01', '2018-01-04 03:02:33'),
(28, 2, 'Nur Adha', '', '', '702018', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'CLEANING SERVICE', 'P', 'BEKASI', '1992-06-11', 'UJUNG HARAPAN RT.02/15 DS.BAHAGIA/ BABELAN KAB.BEKASI JAWA BARAT', 'SMA', '20523170755', '3216021106920006', '455251249435000', '089644305903', 0, 0, '', 'CLEANING SERVICE', '', 'unknow@gmail.com', '2017-04-03', '2018-01-04 03:02:33'),
(29, 2, 'Abdul Azis Syawaldin', '', '', '702019', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'CLEANING SERVICE', 'L', 'BEKASI', '1993-04-04', 'JL. DUREN JAYA A 11 NO.29 RT.09/10 KEL. DUREN JAYA/ BEKASI TIMUR KOTA BEKASI JAWA BARAT', 'SMA', '60020041819', '3275010404930022', '817983240407000', '085727115183', 0, 0, '', 'CLEANING SERVICE', '', 'unknow@gmail.com', '2017-04-03', '2018-01-04 03:02:33'),
(1688, 5, 'dr. Netty Siahaan, M.K.M', '196104241987112001', '127822', '0', '69c5fcebaa65b560eaf06c3fbeb481ae44b8d618', 'User', 'Pembina Tk.1 ', 'IV.b', 29, 8, 'Direktur', 'P', 'GUNUNG TUA', '1961-04-24', 'Jl. Pulomas Barat X RT.03/ 10 No. 20, Kel. Kayuputih Kec. Pulogadung  Jakarta Timur  Telp. 081218885312', 'S.2', '12220046241', '3175026404610013', '250805256003000', '0812 1888 5312', 0, 0, '-', 'DIREKTUR', '', 'nettysia.inet@gmail.com', '1987-11-02', '2017-11-03 08:10:58'),
(1689, 1, 'Mustomi, Se.Mm', '196404181986031010', '107484', '0', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Superadmin', 'Pembina ', 'IV.a', 31, 4, 'Kepala Sub Bagian Tata Us', 'L', 'LEBAK', '1964-04-18', 'Jl. Kp. Mangga RT.01/ 05 Kel. Tugu Selatan Kec.Koja Jakarta Utara 081381127168', 'S.2', '20120027088', '3172031804640009', '672506680045000', '081381127168', 0, 0, '-', 'KEPALA SUB BAGIAN TATA USAHA', '', 'must_64@yahoo.co.id', '1986-03-01', '2017-11-03 08:10:58'),
(1690, 1, 'drg. Cut Yuliza I. Sp.Ort,MARS', '196607151991032007', '125483', '0', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Admin', 'Pembina Tk.1 ', 'IV.b', 26, 4, 'Kepala Seksi Penunjang Medis', 'P', 'MEDAN', '1966-07-15', 'Jl. Koala IV Blok A6 RT.01/14, No. 35 Kel. Jaka Mulya Kec. Bekasi Selatan, Bekasi Telp. 087823804550', 'S.2', '11120130751', '3275045507660010', '489660951121000', '0878 2380 4550', 0, 0, '-', 'KEPALA SESKSI PENUNJANG MEDIS', '', 'cutyulizairawan@gmail.com', '1991-03-01', '2017-11-03 08:10:58'),
(1691, 1, 'dr. Dwian Andhika', '198311072010011021', '179714', '0', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Admin', 'Penata', 'III.c', 7, 6, 'Kepala Seksi Pelayanan Me', 'L', 'JAKARTA', '1983-11-07', 'Jl. Utan Kayu No. 66 B RT .13/06, Kel. Utan Kayu Utara Kec. Matraman, Jakarta Timur 087784530379', 'PROFESI ', '50620028645', '3175010711830011', '896100641001000', '0877 8453 0379', 0, 0, '-', 'KEPALA SEKSI PELAYANAN MEDIS', '', 'dwi4ndhika@gmail.com', '2010-01-01', '2017-11-03 08:10:58'),
(1692, 4, 'dr. Riki Tsan, Sp.M', '196212121988121002', '162195', '0', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', 'Pembina', ' IV.a', 20, 8, 'Dokter Madya', 'L', 'PADANG PANJANG', '1962-12-12', 'PERUMAHAN BUMI ANGGREK BLOK H RT 001/007 NO. 115, KEC. TAMBUN UTARA, KEL. KARANG SATRIA, BEKASI 17112', 'S3', '20120098406', '3216051212620004', '248473803435000', '0813 1697 9313', 0, 0, '-', 'DOKTER SPESIALIS', '', '', '1988-12-01', '2017-11-03 08:10:58'),
(1693, 4, 'dr. Layli Rahmawati', '197707092006042003', '182826', '0', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', 'Penata Tk.1 ', ' III.d', 11, 3, 'Staf Teknis Tingkat Ahli', 'P', 'KEDIRI', '1977-07-09', 'KAV. TAMAN WISATA E3 NO. 12 PONDOK UNGU PERMAI, KEC. BABELAN, KEL. BAHAGIA, BEKASI', 'PROFESI ', '10820275902', '3175074907770008', '697610061008000', '0813 8111 1840', 0, 0, '-', 'DOKTER UMUM POLI', '', 'laylirahmawati@gmail.com', '2006-04-01', '2017-11-03 08:10:58'),
(1694, 2, 'Purnama Saragi', '196208191985022002', '123286', '0', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', 'Penata Tk.1', 'III.d', 32, 5, 'Sanitarian Penyelia', 'P', 'BESAMPURAN', '0000-00-00', 'JL. H. AMSIR NO. 54 RT.09/03  KEL. SUNTER JAYA/ TANJUNG PRIOK-JAKUT', 'SPPH', '20120031824', '3172025908620014', '253687255048000', '0812 8181 7780', 0, 0, '-', 'KESLING', '', 'purnamasaragi19@gmail.com', '1985-02-01', '2017-11-03 08:10:58'),
(1695, 3, 'Hamidah Rahmawati, S.Farm, Apt', '198106052008012026', '171774', '0', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', 'Penata', 'III.c', 7, 6, 'Apoteker Muda', 'P', 'JAKARTA', '1981-06-05', 'JL. BHAKTI III RT 010/006 NO.10 KEC. CILINCING, KEL. CILINCING, JAKARTA UTARA 14120', 'PROFESI ', '20520058679', '3172044506810008', '259304392045000', '0812 8115 4984', 0, 0, '-', 'APOTEKER', '', 'hamidah.rahmawati81@gmail.com', '2008-01-01', '2017-11-03 08:10:58'),
(1696, 3, 'Sapti Agustini, Bsc', '196008071985032005', '115708', '0', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', 'Penata', 'III.c', 32, 5, 'Nutrisionis Penyelia', 'P', 'JAKARTA', '1960-08-07', 'JL.KOPERPU II NO.102 RT.02/25 KEL.MARGAHAYU/ BEKASI TIMUR-KOTA BEKASI', 'D.3', '20120029595', '3275014708600017', '359911971407000', '0812 9363 5718', 0, 0, '-', 'INSTALASI GIZI', '', 'sapti.agustini60@gmail.com', '1985-03-01', '2017-11-03 08:10:58'),
(1698, 2, 'Jumiya', '196307271987031008', '110379', '0', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', 'Penata Muda Tk.1', 'III.b', 30, 5, 'Staf Teknis Tingkat Ahli', 'L', 'GUNUNG KIDUL ', '0000-00-00', 'JL.VILLA MUTIARA GADING BLOK E-9 NO.7 RT.03/15 KEL. SETIA ASIH/ TARUMA JAYA-KAB.BEKASI', 'SMA', '20120027185', '3216012707630001', '257587758045000', '0899 6888 847', 0, 0, '-', 'PENGADAAN BARANG DAN JASA', '', 'jumiyogk@yahoo.co.id', '1987-03-01', '2017-11-03 08:10:58'),
(1699, 4, 'Sri Naryuti, A.Md.Keb', '196404181993032003', '164358', '0', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', 'Penata Muda Tk.1 ', ' III.b', 24, 5, 'Bidan Pelaksana Lanjutan', 'P', 'GUMENGGENG', '1964-04-18', 'KOMPLEK PELINDO II BLOK C.I. RT 012/009 NO. 3, KEC. CILINCING, KEL. CILINCING, JAKARTA UTARA 14120', 'D.3', '20120105313', '3172035804640001', '344890918045000', '0813 8420 0875', 0, 0, '-', 'RUANG BERSALIN', '', 'naryutisri@gmail.com', '1993-03-01', '2017-11-03 08:10:58'),
(1700, 2, 'Insupiani ', '196212031987032008', '162303', '0', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', 'Penata Muda Tk 1 ', ' III.b', 20, 8, 'Staf Administrasi Tingkat', 'P', 'ACEH TIMUR', '1962-12-03', 'JL.KP.MANGGA NO. RT.03/05 KEL.TUGU SELATAN/ KOJA-JAKUT', 'SMA', '20120066521', '3172034312620001', '253585277045000', '0852 1080 8033', 0, 0, '-', 'KASIR', '', '', '1987-03-01', '2017-11-03 08:10:58'),
(1701, 2, 'Yusnani', '196412141987032004', '110491', '0', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', 'Penata Muda Tk 1', ' III.b', 30, 5, 'Staf Administrasi Tingkat', 'P', 'PADANG', '1964-12-14', 'JL.MARUNDA BARU III NO.18 RT.08/06 KEL.MARUNDA/ CILINCING-JAKUT', 'SMA', '20120027258', '3172045412641001', '471393116045999', '0812 8424 2585', 0, 0, '-', 'KASIR', '', 'yunanirsucilincing@gmail.com', '1987-03-01', '2017-11-03 08:10:58'),
(1702, 2, 'Dian Khairunisa, S.Kep', '197910242006042003', '165753', '0', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', 'Penata Muda Tk 1 ', 'III.b ', 11, 4, 'Bendahara', 'P', 'PADANG', '1979-10-24', 'JL. TIPAR CAKUNG, GG. KOMPI JENGGOT RT 003/001 NO. 51, KEC. CILINCING, KEL. SUKAPURA, JAKARTA UTARA 14140', 'S.1', '10820258579', '3172046410790007', '362980054045000', '0852 8547 4495', 0, 0, '-', 'KEUANGAN', '', 'dian.syifa.irsyad.evan5@gmail.com', '2006-04-01', '2017-11-03 08:10:58'),
(1703, 2, 'Enggum Gumih, A.Md.Kep', '197408081997032002', '123466', '0', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', 'Penata Muda', 'III.a ', 20, 5, 'Perawat Pelaksana', 'P', 'BEKASI', '1974-08-08', 'PERUM KARABA INDAH BLOK R RT005/010 NO. 12, KEC. TELUKJAMBE TIMUR, KEL. WADAS, KARAWANG', 'D.3', '20120028734', '3215034608740007', '353261217408000', '0821 2252 0441', 0, 0, '-', 'KEUANGAN', '', 'enggum88@gmail.com', '1997-03-01', '2017-11-03 08:10:58'),
(1704, 3, 'Mei Duma Ria Purba', '197505161997032002', '123140', '0', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', 'Penata Muda ', 'III.a', 20, 5, 'Pranata Laboraturium Kese', 'P', 'MEDAN', '1975-05-16', 'PERUMAHAN CANDIA BOGA BLOK AS2 RT 029/019 NO. 16 KEC. BABELAN, KEL. BAHAGIA, BEKASI UTARA', 'SMAK', '20120028653', '3216025605750014', '350583217045000', '0895 0246 8565', 0, 0, '-', 'LABORATURIUM', '', 'meipurba673@yahoo.co.id', '1997-03-01', '2017-11-03 08:10:58'),
(1705, 3, 'Yeni Yusnita Lumban Raja, A.Md.Kep', '197312231998032005', '128490', '0', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', 'Penata Muda ', 'III.a', 19, 5, 'Perawat Pelaksana Lanjuta', 'P', 'AEK KANOPAN', '0000-00-00', 'JL. CEMPAKA V NO. 51 RT 06/09 KEL. CAKUNG TIMUR/ CAKUNG-JAKTIM', 'D.3', '30620025660', '3175066312730001', '360109938006000', '0857 1458 6202', 0, 0, '-', 'PERAWAT UMUM POLI', '', 'yeniyusnita74@gmail.com', '1998-03-01', '2017-11-03 08:10:58'),
(1706, 3, 'Alek Subagyo, A.Md.Kep', '197710062008011020', '171235', '0', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', 'Pengatur Tk.1', 'II.d', 9, 7, 'Perawat Pelksana', 'L', 'JAKARTA', '1977-10-06', 'JL. MALAKA III HB RT 011/006 NO. 27 A KEC. CILINCING, KEL. ROROTAN, JAKARTA UTARA 14140', 'D.3', '11120146096', '3172040610770011', '784145906045000', '0821 1127 2154', 0, 0, '-', 'PERAWAT IGD', '', 'alxsubagya@gmail.com', '2008-01-01', '2017-11-03 08:10:58'),
(1708, 3, 'Ulus Komartono', '196806151987031001', '110531', '0', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', 'Pengatur ', ' II.c', 30, 5, 'Staf Operasional Tingkat ', 'L', 'JAKARTA', '1968-06-15', 'JL. RAYA CILINCING RT 003/008 NO. 5, KEC. CILINCING, KEL. CILINCING 14120', 'SMA', '20120240211', '3172041506680020', '174428300043000', '0896 2438 5871', 0, 0, '-', 'JENAZAH', '', 'ulus_komartono@yahoo.co.id', '1987-03-01', '2017-11-03 08:10:58'),
(1709, 2, 'Sugiadi', '196110071992021001', '116685', '0', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', 'Pengatur Muda', 'II.a', 32, 7, 'Pelayanan Tingkat Terampi', 'L', 'JAKARTA', '1961-10-07', 'KP. BIDARA JL. H. DEMPET NO.17 RT.07/01 KEL. MARUNDA/ CILINCING-JAKUT', 'SD', '20120027878', '3172040710610003', '737676874045000', '0853 1302 8205', 0, 0, '-', 'DRIVER', '', '', '1992-02-01', '2017-11-03 08:10:58'),
(1710, 4, 'dr. Sri Santi Tivens', '', '', '201401019', '60149a289a3623cd214943af2892e103f4bddafb', 'User', '', '', 0, 0, 'Dokter Umum ', 'P', 'YOGYAKARTA', '1986-05-30', 'JL. KEBON BARU RT.09/10 KEL.SEMPER BARAT/KEC.CILINCING JAK-UT', 'PROFESI', '20523131563', '8171027005860007', '243738887045999', '085228880005', 5306982, 0, 'Menikah Anak-1', 'DOKTER UMUM IGD', '', '', '2014-01-02', '2017-11-03 08:10:58'),
(1711, 4, 'dr. Derry Ratih Ariyanti Pratika', '', '', '201408029', '60149a289a3623cd214943af2892e103f4bddafb', 'User', '', '', 0, 0, 'Dokter Umum ', 'P', 'TANGERANG', '1985-12-12', 'IKIP BLOK IV NO.62 RT.07/002 KEL.JATI KRAMAT / KEC.JATIASIH BEKASI JABAR', 'PROFESI', '51223166555', '3275095212850021', '443047287432000', '085710997007', 5212215, 0, 'Menikah Anak-0', 'DOKTER UMUM IGD', '', '', '2014-08-01', '2017-11-03 08:10:58'),
(1712, 3, 'Elin Budiani', '', '', '201210007', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Perawat Umum ', 'P', 'TARAMAN', '1988-05-24', 'ASRAMA AIRUD BLOK.E1/08 RT.07/09 KEL.SEMPER TIMUR/ KEC.CILINCING JAKUT', 'D3 ', '20523131555', '3172046405881002', '448472027045999', '081290931988', 4180921, 3344736, 'Menikah Anak-1', 'RAWAT INAP', '', '', '2014-01-02', '2017-11-03 08:10:58'),
(1713, 3, 'Agus Hayu Kurniawan', '', '', '201305012', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Perawat Umum ', 'L', 'BOYOLALI', '1991-08-10', 'JL.CILINCING LAMA NO.1 RT.04/04 KEL.CILINCING/ CILINCING-JAKUT', 'D3 ', '20523131024', '3309051008919002', '640976403527000', '089506889760', 4885406, 3428355, 'Menikah Anak-2', 'PERAWAT IGD', '', '', '2013-05-10', '2017-11-03 08:10:58'),
(1714, 3, 'Novy Nurfadhillah', '', '', '201210008', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Perawat Umum ', 'P', 'JAKARTA', '1988-11-30', 'KP. MALAKA I NO.99 RT.04/12 KEL. ROROTAN/ KEC.CILINCING JAKUT', 'D3 ', '20523131512', '3172047011880005', '700813512045000', '082123586607', 4682632, 3344736, 'Menikah Anak-1', 'RAWAT INAP', '', '', '2014-01-02', '2017-11-03 08:10:58'),
(1715, 3, 'Fitri Iznilah', '', '', '201210009', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Perawat Umum ', 'P', 'JAKARTA', '1984-07-04', 'JL. KEBANTENAN III NO.31 RT.06/07 KEL.SEMPER TIMUR/ KEC.CILINCING JAKUT', 'D3 ', '20523131547', '3172044407840006', '581425113045000', '081382166484', 4766250, 3344736, 'Menikah Anak-3', 'PERAWAT IGD', '', '', '2014-01-02', '2017-11-03 08:10:58'),
(1716, 3, 'Fitri Fauziah', '', '', '201309014', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Perawat Umum ', 'P', 'JAKARTA', '1987-12-17', 'JL. GARUDA II SELAKOPI NO.35 RT.02/04 KEL.PASIR MULYA/BOGOR BARAT KOTA BOGOR', 'D3 ', '20523131482', '3271045712870012', '700757529404000', '085770286560', 4766250, 3344736, 'Menikah Anak-2', 'POLI RAWAT JALAN', '', '', '2013-09-23', '2017-11-03 08:10:58'),
(1717, 3, 'Nuurul Awaliatun Ni\'Mah', '', '', '201312015', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Perawat Umum ', 'P', 'JAKARTA', '1992-07-20', 'KRESNA 3 C22 NO.5 RT.11/12 KEL.SETIAMEKAR/KEC.TAMBUN SELATAN BKS', 'D3 ', '20523131521', '3216066007920013', '700359508435000', '08973837507', 4180921, 3344736, 'Menikah Anak-0', 'PERAWAT IGD', '', '', '2014-01-02', '2017-11-03 08:10:58'),
(1718, 3, 'Siti Fazriyah', '', '', '201312016', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Perawat Umum ', 'P', 'JAKARTA', '1993-05-29', 'KP.BATU TUMBUH RT.05/04 KEL. TUGU SELATAN/ KEC.KOJA JAKUT', 'D3 ', '20523131491', '3172036905930009', '700822067045000', '085775025464', 4180921, 3344736, 'Menikah Anak-0', 'POLI RAWAT JALAN', '', '', '2014-01-02', '2017-11-03 08:10:58'),
(1719, 3, 'Sutpiyatu Sadiyah', '', '', '201312017', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Perawat Umum', 'P', 'Jakarta', '1992-03-03', 'Jl. Mantang Blok Y No.31 RT 02 RW 08', 'D4', '20523131466', '3172034303920001', '700512254045000', '089663012482', 4180921, 0, 'Single', 'RAWAT INAP', '', 'sutpi32@gmail.com', '2014-01-02', '2017-12-28 01:03:06'),
(1720, 3, 'Sri Herlinah', '', '', '201312018', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Perawat Umum ', 'P', 'PEMALANG', '1992-02-06', 'JL. KEBON BARU RT.9/10 KEL.SEMPER BARAT/ KEC.CILINCING JAKUT', 'D3 ', '20523131474', '3172044602960006', '700844178045000', '085776665369', 4180921, 3344736, 'Single', 'RAWAT INAP', '', '', '2014-01-02', '2017-11-03 08:10:58'),
(1721, 3, 'Lutfiyah Anggraini', '', '', '201405023', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Perawat Umum ', 'P', 'JAKARTA', '1989-05-31', 'BULAK INDAH RT.03/05 KEL.CAKUNG TIMUR/ KEC.CAKUNG JAK-TIM', 'D3 ', '20523131679', '3175067105890010', '703230995006000', '081280891124', 4682632, 3344736, 'Menikah Anak-1', 'RAWAT INAP', '', '', '2014-05-12', '2017-11-03 08:10:58'),
(1722, 3, 'Yuliyanti Rostaningsih', '', '', '201408030', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Perawat Umum ', 'P', 'JAKARTA', '1979-07-21', 'CAKUNG CILINCING NO.55 RT.09/02 KEL.SEMPER TIMUR /KEC.CILINCING JAKUT', 'D3 ', '20523150061', '3172046107790006', '678794736045000', '081315711369', 4180921, 3344736, 'Single', 'PERAWAT IGD', '', '', '2014-08-11', '2017-11-03 08:10:58'),
(1723, 3, 'Indah Gayuh Prestanty', '', '', '201408031', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Perawat Umum ', 'P', 'JAKARTA', '1987-02-20', 'KOMP.DEPERLA BLOK.C/5 RT.06/14 KEL. TUGU UTARA/ KEC.KOJA JAKUT', 'D3 ', '20020172411', '3172036002870012', '700314016045000', '083875261519', 4180921, 0, 'Single', 'LABORATURIUM', '', '', '2014-08-11', '2017-11-03 08:10:58'),
(1724, 3, 'Nawang Wulan Indriasari', '', '', '201307013', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Perawat Gigi', 'P', 'JAKARTA', '1981-11-23', 'JL. KEBANTENAN V NO.33 RT.01/06 KEL.SEMPER TIMUR/ KEC.CILINCING JAKUT', 'D3 ', '20523131181', '3172046311810002', '591190459045999', '085711400428', 4799697, 3428355, 'Menikah Anak-1', 'POLI RAWAT JALAN', '', '', '2013-07-12', '2017-11-03 08:10:58'),
(1725, 3, 'Dwi Wahyuningsih', '', '', '201102004', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Bidan ', 'P', 'JAKARTA', '1988-08-05', 'JL.H .SUIT NO.42 RT.07/06 KEL. SEMPER BARAT / KEC. CILINCING JAKUT', 'D3', '20523120537', '3172044508880012', '705570521045000', '085780701378', 4392580, 3514064, 'Menikah Anak-1', 'RUANG BERSALIN', '', '', '2011-02-07', '2017-11-03 08:10:58'),
(1726, 3, 'Vianti Prihatini', '', '', '201405024', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Bidan ', 'P', 'JAKARTA', '1988-08-22', 'JL.BHAKTI IV NO.10 RT.011/05 KEL. CILINCING / KEC. CILINCING JAKUT', 'D3', '20520018162', '3172046208880003', '703860593045000', '083876393609', 4682632, 3344736, 'Menikah Anak-1', 'RUANG BERSALIN', '', '', '2014-05-12', '2017-11-03 08:10:58'),
(1727, 3, 'Heny Berliana Wijayanti', '', '', '200908001', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Bidan ', 'P', 'JAKARTA', '1986-09-15', 'JL.CEMPAKA PUTIH TENGAH NO.2 RT.17/04 KEL.CEMPAKA PUTIH TIMUR/CEMPAKA PUTIH-JAKPUS', 'D3', '20523131288', '3172045509860002', '096640404045000', '081283789112', 5042682, 3601916, 'Menikah Anak-1', 'RUANG BERSALIN', '', '', '2009-08-01', '2017-11-03 08:10:58'),
(1728, 3, 'Roma Jayanti', '', '', '201102005', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Bidan ', 'P', 'JAKARTA', '1988-06-19', 'KP.RAWA SEMUT NO.64 RT.09/11 KEL. MARGAHAYU/ BEKASI TIMUR', 'D3', '20523120740', '3275015906880027', '660892647407000', '085710169338', 4392580, 3514064, 'Single', 'RUANG BERSALIN', '', '', '2011-02-07', '2017-11-03 08:10:58'),
(1729, 3, 'Dewi Trisnawati', '', '', '201408027', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Bidan ', 'P', 'JAKARTA', '1991-09-09', 'JL.TIPAR CAKUNG KMP SUKAPURA GG BAMBU KUNING  NO.22 RT.07/04 KEL. SUKAPURA / KEC. CILINCING JAK-UT', 'D3', '20620016478', '3172044909910007', '709397293045000', '085310910772', 4180921, 3344736, 'Single', 'RUANG BERSALIN', '', '', '2014-08-11', '2017-11-03 08:10:58'),
(1730, 3, 'Hendi Setyowati', '', '', '201405025', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Bidan ', 'P', 'KEBUMEN', '1990-10-27', 'JL.REKREASI RT.08/04 KEL.CILINCING / KEC. CILINCING JAKUT', 'D3', '20523131911', '3305056710906385', '704346733045000', '087837866745', 4180921, 3344736, 'Single', 'RUANG BERSALIN', '', '', '2014-05-12', '2017-11-03 08:10:58'),
(1731, 3, 'Ratna Dewi Pujawati', '', '', '201408028', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Bidan ', 'P', 'SEMARANG', '1987-01-22', 'JL. PONCOWOLO BARAT I NO.687 RT.9/6 KEL. PENDRIKAN LOR/ SEMARANG TENGAH JATENG 50141 ', 'D3', '20520081905', '3374076201870001', '088085865509000', '08112776768', 4682632, 3344736, 'Menikah Anak-1', 'RUANG BERSALIN', '', '', '2014-08-11', '2017-11-03 08:10:58'),
(1732, 3, 'Fya Yunita Sanggian', '', '', '201405026', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Bidan ', 'P', 'SUBANG', '1990-06-06', 'JL.MAHONI BLOK A GG.IV NO.37 KEL.LAGOA / KEC. KOJA / JAKARTA UTARA', 'D3', '20523131822', '3213254606900003', '704714815045999', '081280087230', 4682632, 3344736, 'Menikah Anak-1', 'RUANG BERSALIN', '', '', '2014-05-12', '2017-11-03 08:10:58'),
(1733, 3, 'Rudi Hartono', '', '', '201206006', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Analis Kesehatan', 'L', 'CIREBON', '1988-05-04', 'JL. MALAKA 1 RT.04/12  KEL.ROROTAN/KEC.CILINCING JAKUT', 'D3 ', '20523131237', '3172040405880017', '549078103045000', '081293598002', 4285444, 3428355, 'Menikah Anak-1', 'LABORATURIUM', '', '', '2012-06-11', '2017-11-03 08:10:58'),
(1734, 3, 'Muzalifah', '', '', '201408032', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Analis Kesehatan', 'P', 'JAKARTA', '1991-05-07', 'KP. SUNGAI BEGOG NO.1 RT.09/03 KEL.SEMPER TIMUR / KEC.CILINCING JAKUT', 'D3 ', '21520000198', '3172044705910005', '982642746045000', '082231844071', 4599013, 3344736, 'Menikah Anak-0', 'LABORATURIUM', '', '', '2014-08-11', '2017-11-03 08:10:58'),
(1735, 3, 'Meliya Widianingsih', '', '', '201408033', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Analis Kesehatan', 'P', 'CILACAP', '1992-05-24', 'JL. PAGELARANG RT.09/03 KEL.LUBANG BUAYA/ KEC.CIPAYUNG JAK-TIM ', 'D3 ', '21520000201', '3301016405920009', '709998694009000', '089658507540', 4180921, 3344736, 'Single', 'LABORATURIUM', '', '', '2014-08-11', '2017-11-03 08:10:58'),
(1736, 2, 'Jajang Subarja', '', '', '201005002', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Administrasi', 'L', 'JAKARTA', '1986-02-28', 'JL. RUMBIA III NO.11A RT.02/02 KEL. TUGU UTARA/KEC.KOJA JAKUT', 'SLTA', '20523131008', '3172032802860006', '641785001045000', '08990801789', 4099742, 2869819, 'Menikah Anak-1', 'KEPEGAWAIAN', '', '', '2010-05-17', '2017-11-03 08:10:58'),
(1737, 2, 'Ernik Murniasih', '', '', '201405020', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Administrasi', 'P', 'JAKARTA', '1983-05-16', 'JL.KP.KANDANG SAPI RT.01/06 KEL.CAKUNG TIMUR /JAKARTA TIMUR', 'SLTA', '20523131695', '3175065605830002', '787258656006000', '081510018232', 4448500, 2341315, 'Menikah Anak-2', 'SEKRETARIS', '', '', '2014-05-12', '2017-11-03 08:10:58'),
(1738, 2, 'Moh Fahri Husaini', '', '', '201304011', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Administrasi', 'L', 'INDRAMAYU', '1993-02-26', 'JL.I GUSTI NGURAH RAI NO.5 RT.04/05 KEL.CIPINANG MUARA/ KEC.JATINEGARA JAKTIM', 'SLTA', '20523131229', '3175032602930006', '703472761002000', '08990761416', 3999748, 2399848, 'Single', 'LOKET', '', '', '2013-04-23', '2017-11-03 08:10:58'),
(1739, 2, 'Mega Firdianti', '', '', '201303010', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Administrasi', 'P', 'SURABAYA', '1988-11-01', 'KOMP GREEN GARDEN C9 NO.4 RT.5/3 KEL ROROTAN/KEC.CILINCING JAKUT', 'SLTA', '20523131253', '3172044111880003', '661472746045000', '081283212244', 4479718, 2399848, 'Menikah Anak-1', 'REKAM MEDIS', '', '', '2013-03-11', '2017-11-03 08:10:58'),
(1740, 2, 'Rusniansyah', '', '', '201405021', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Administrasi', 'P', 'JAKARTA', '1989-03-01', 'JL.KALIBARU BARAT RT.11/07 KEL.KALIBARU/ KEC.CILINCING JAKUT', 'SLTA', '20523131636', '3172044103890006', '871168654045000', '081381466554', 4448500, 2341315, 'Menikah Anak-2', 'LOKET', '', '', '2014-05-12', '2017-11-03 08:10:58'),
(1741, 3, 'Aida', '', '', '201405022', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Laundry', 'P', 'JAKARTA', '1978-05-01', 'BLOK X GG.1 NO.21 RT.02/12 KEL.SEMPER BARAT/ KEC.CILINCING JAKUT', 'SLTA', '20523131652', '3172044105780020', '705451607045000', '085959982792', 4370456, 1951096, 'Menikah Anak-1', 'LAUNDRY', '', '', '2014-04-01', '2017-11-03 08:10:58'),
(1742, 2, 'Khari Saddam', '', '', '201506038', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Administrasi', 'L', 'JAKARTA', '1991-03-05', 'CIPINANG MUARA RT.04/05, KEL.CIPINANG MUARA/KEC. JATINEGARA JAKTIM', 'SLTA', '20523157023', '3175030503910003', '794886317002000', '08998771930', 4292412, 2341315, 'Menikah Anak-0', 'PENGADAAN BARANG DAN JASA', '', '', '2015-06-04', '2017-11-03 08:10:58'),
(1743, 2, 'Pijar Dwi Aditia', '', '', '201506039', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Administrasi', 'L', 'JAKARTA', '1995-06-27', 'CIPINANG MUARA RT.05/05 KEL. CIPINANG MUARA/ KEC. JATINEGARA, JAKARTA TIMUR', 'SLTA', '20523157082', '3175032706950008', '661063891002000', '089637444761', 3902193, 2341315, 'Single', 'KEUANGAN', '', '', '2015-06-04', '2017-11-03 08:10:58'),
(1744, 2, 'Retno Arum Imaniati', '', '', '201506040', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Administrasi', 'P', 'JAKARTA', '1996-03-22', 'JL. KAMPUNG SAWAH RT.03/02 NO.08 KEL.JOHAR BARU JAKPUS', 'SLTA', '20523157031', '3171086203961001', '709628416024000', '089654950844', 3902193, 2341315, 'Single', 'SEKRETARIS', '', '', '2015-06-04', '2017-11-03 08:10:58'),
(1745, 2, 'Ulfah Armita', '', '', '201506041', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Administrasi', 'P', 'SUAYAN', '1991-08-08', 'JL. TIPAR CAKUNG GG. KOMPI JENGGOT NO 232 RT 03/01 KEL.SUKAPURA/KEC.CILINCING JAKUT', 'SLTA', '20523156981', '1307134808910002', '733682421204000', '083180695331', 3902193, 2341315, 'Single', 'LOKET', '', '', '2015-06-04', '2017-11-03 08:10:58'),
(1746, 4, 'Wulandari', '', '', '201506042', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Administrasi', 'P', 'JAKARTA', '1989-08-25', 'JL. CILINCING LAMA 1 RT.08/04 KEL.CILINCING/ KEC. CILINCING JAKUT', 'SLTA', '20523003832', '3216016508890004', '643448285045999', '081290726666', 3902193, 2341315, 'Menikah Anak-1', 'SEKRETARIS', '', '', '2015-06-04', '2017-11-03 08:10:58'),
(1747, 2, 'Kartika Yuli Handayani', '', '', '201506043', '56136fc330019e0e526cfbe08f940fa08610be81', 'User', '', '', 0, 0, 'Administrasi', 'P', 'JAKARTA', '1993-07-16', 'JL. KALIBARU BARAT RT.05/04, KEL. KALIBARU KEC. CILINCING JAKUT', 'D3 ', '20523157040', '3172045607930005', '733131817045000', '085715725236', 4180921, 0, 'Single', 'ADMISI', '', 'kartika', '2015-06-04', '2017-11-03 08:10:58'),
(1749, 3, 'Vita Pratiwi', '', '', '201506045', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Asisten Apoteker', 'P', 'JAKARTA', '1994-12-21', 'JL. RAWA BINANGUN VI NO.2 RT.09/08 KEL.RAWA BADAK KEC. KOJA JAKUT', 'SMKF', '20320032053', '3172036112940001', '723267244045000', '081291369629', 3902193, 1951096, 'Single', 'APOTEKER', '', '', '2015-06-04', '2017-11-03 08:10:58'),
(1750, 4, 'Drg. Fusiana', '', '', '201506046', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Dokter Gigi', 'L', 'JAKARTA', '1986-07-04', 'JL. KEBANTENAN 5 RT.03/06 KEC.CILINCING KEL. SEMPER TIMUR JAKUT', 'PROFESI', '20523157007', '3172040407860001', '660716622045000', '087887444464', 5306982, 7581403, 'Menikah Anak-1', 'POLI RAWAT JALAN', '', '', '2015-06-04', '2017-11-03 08:10:58'),
(1751, 3, 'Dita Tias Tiara', '', '', '201506047', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Perawat Umum ', 'P', 'MANADO', '1993-08-03', 'JL. MAHONI BLOK E GG2/11 RT.04/15 KEL. LAGOA KEC.KOJA JAKUT', 'D3 ', '21123091957', '3172034308930002', '732290127045000', '089691315337', 4180921, 3344736, 'Single', 'RAWAT INAP', '', '', '2015-06-04', '2017-11-03 08:10:58'),
(1752, 3, 'Ina Merdekawati Papat', '', '', '201506048', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Perawat Umum ', 'P', 'TANGERANG', '1989-08-17', 'PURI HARAPAN BLOK D17 NO.08 RT. 003/021 KEL. SETIA ASIH, TARUMAJAYA BEKASI UTARA', 'D3 ', '60420005572', '3275035708890041', '353260417435000', '083876754123', 4682632, 3344736, 'Menikah Anak-1', 'PERAWAT IGD', '', '', '2015-06-04', '2017-11-03 08:10:58'),
(1753, 2, 'Theresia Oktavina. T', '', '', '201506050', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Administrasi', 'P', 'MEDAN', '1992-10-30', 'JL.CEMPAKA BARU IV N0.31 RT.12/07 KEL.CEMPAKA BARU/ KEMAYORAN-JAKPUS', 'S1', '20523156990', '1271047010920002', '731527172122000', '085206479472', 4459649, 4459649, 'Single', 'KEUANGAN', '', '', '2015-06-04', '2017-11-03 08:10:58'),
(1754, 4, 'dr. Erlangga X. D,M.Sc', '', '', '201506051', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Dokter Umum ', 'L', 'BANJARMASIN', '1986-02-09', 'DUREN SAWIT BLOK R.2 NO.28 RT.08/08 KEL.DUREN SAWIT/DUREN SAWIT-JAKTIM', 'PROFESI', '51223188761', '6371020902860003', '150000974731000', '082187606740', 5306982, 7581403, 'Menikah Anak-1', 'DOKTER UMUM IGD', '', '', '2015-06-04', '2017-11-03 08:10:58'),
(1755, 2, 'Dwi Eva Nurvega', '', '', '201506052', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Administrasi', 'P', 'JAKARTA', '1991-06-20', 'KOMP. DEWA KEMBAR A/51, RT.01/RW.01 KEL.SEMPER TIMUR/KEC.CILINCING JAKUT', 'SLTA', '20523156957', '3172046006910006', '732608153045000', '089652796774', 3902193, 2341315, 'Menikah Anak-0', 'LOKET', '', '', '2015-06-04', '2017-11-03 08:10:58'),
(1756, 3, 'Nurhidayat', '', '', '201506053', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Analis Kesehatan', 'L', 'BEKASI', '1989-05-01', 'KP. KEDUNG RINGIN, RT.003/02 KEL. SUKARINGIN KEC. SUKARINGIN', 'D3 ', '60423045231', '3216030105890004', '733942668435000', '085776307870', 4599013, 3344736, 'Menikah Anak-0', 'LABORATURIUM', '', '', '2015-06-04', '2017-11-03 08:10:58'),
(1758, 3, 'Cella Balynda', '', '', '201507055', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Perawat Umum ', 'P', 'JAKARTA', '1993-01-24', 'JL. LAGOA TRS GG.1 B1, RT.013/002 KEL. LAGOA KEC. KOJA JAKUT', 'D3 ', '21120010280', '3172036401930003', '713183531045000', '085776386159', 4180921, 3344736, 'Single', 'RAWAT INAP', '', '', '2015-07-01', '2017-11-03 08:10:58'),
(1759, 3, 'Putri Utami', '', '', '201507056', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Asisten Apoteker', 'P', 'JAKARTA', '1991-12-27', 'JL. RAYA CILINCING NO.45 RT.002/RW.004, KEL. CILINCING/CILINCING JAKUT', 'D3 ', '21123091973', '3172046712910010', '802908269045000', '08568805838', 4180921, 3344736, 'Single', 'APOTEKER', '', '', '2015-07-01', '2017-11-03 08:10:58'),
(1760, 3, 'Pujiati Rahayu', '', '', '201507057', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Perawat Umum ', 'P', 'JAKARTA', '1989-01-14', 'JL. LAGOA TERUSAN GG.IV D1 NO.2A RT.017/003 KEL.LAGOA KEC. KOJA JAKUT', 'D3 ', '20123106591', '3172035401890009', '452224819045000', '081280254439', 4180921, 3344736, 'Menikah Anak-0', 'RAWAT INAP', '', '', '2015-07-01', '2017-11-03 08:10:58'),
(1761, 3, 'Rismalia', '', '', '201507058', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Perawat Umum ', 'P', 'JAKARTA', '1990-05-30', 'JL. BARU GG4 NO.28, RT.006/001 KEL. CILINCING KEC. CILINCING JAKUT', 'D3 ', '20023237476', '3173017005900003', '445088990034000', '085719098929', 4180921, 3344736, 'Menikah Anak-1', 'PERAWAT IGD', '', '', '2015-07-01', '2017-11-03 08:10:58'),
(1762, 3, 'Zahra Rah Gangga', '', '', '201507059', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Perawat Umum ', 'P', 'JAKARTA', '1989-08-01', 'JL. KALI BARU TIMUR III RT.012/002. KEL. KALI BARU, KEC. CILINCING JAKUT', 'D3 ', '20520086303', '3172044108890011', '870165313045000', '082299101989', 4599013, 3344736, 'Menikah Anak-0', 'RAWAT INAP', '', '', '2015-07-01', '2017-11-03 08:10:58'),
(1763, 3, 'Herman Dwi Ariendis', '', '', '201510061', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Administrasi', 'L', 'TANGGERANG', '1984-05-24', 'JL.KEBANTENAN III NO.4 RT.04/02 KEL. SEMPER TIMUR KEC. CILINCING 14130-JAKUT', 'SLTA', '62720004117', '3603122405840005', '740992300418000', '089663249064', 4263860, 1903509, 'Menikah Anak-1', 'DRIVER', '', '', '2015-10-01', '2017-11-03 08:10:58'),
(1764, 2, 'Rayendra Aprialdi', '', '', '201510062', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Driver', 'L', 'JAKARTA', '1992-04-02', 'PONDOK UNGU PERMAI E2 NO. 17 RT.07/14, KEL. KALIABANG TENGAH, KEC. BEKASI UTARA, BEKASI', 'SLTA', '60423064413', '3275030204920017', '463125351407000', '081283750237', 3807018, 1903509, 'Single', 'DRIVER', '', '', '2015-10-01', '2017-11-03 08:10:58'),
(1765, 3, 'Reno Anggriyanto', '', '', '201510063', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Perawat Umum ', 'L', 'BREBES', '1990-12-24', 'JL. CEMPAKA PUTIH BARAT XIX NO. 27 RT.07/11, KEL. CEMPAKA PUTIH BARAT, KEC. CEMPAKA PUTIH JAKPUS', 'D3 ', '10923064048', '3329172412900003', '741910558024000', '085714218630', 4078947, 3263157, 'Single', 'PERAWAT IGD', '', '', '2015-10-01', '2017-11-03 08:10:58'),
(1766, 3, 'Mardiana Tri Cahyanti', '', '', '201510064', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Perawat Umum ', 'P', 'JAKARTA', '1992-03-08', 'ASRAMA POLRI EX BRIMOB RT.05/07, KEL. CILINCING, KEC. CILINCING, JAKUT', 'D3 ', '20023238910', '3172044803920012', '667329411045000', '082110967276', 4078947, 3263157, 'Single', 'PERAWAT IGD', '', '', '2015-10-01', '2017-11-03 08:10:58'),
(1767, 3, 'Putri Reno Yori', '', '', '201510065', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Bidan ', 'P', 'LHOKSMAWE', '1992-07-04', 'JL. LOGISTIK RT. 05/04 KEL. TUGU SELATAN. KEC. KOJA, JAKARTA UTARA', 'D3', '21123092104', '3172034407920001', '742413206045000', '081284666053', 4078947, 3263157, 'Single', 'RUANG BERSALIN', '', '', '2015-10-01', '2017-11-03 08:10:58'),
(1768, 3, 'Astrid Septeria Debora', '', '', '201510066', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Bidan ', 'P', 'JAKARTA', '1990-09-29', 'JL. MUNDU DALAM BLOK K GG III/24 RT.03/13 KEL. LAGOA, KEC. KOJA, JAKARTA UTARA', 'D3', '20023094918', '3172036909900010', '548824416045000', '085213853022', 4078947, 3263157, 'Single', 'RUANG BERSALIN', '', '', '2015-10-01', '2017-11-03 08:10:58'),
(1769, 3, 'Ratu Makhrani', '', '', '201510067', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Perekam Medis', 'P', 'BANDUNG', '1991-09-21', 'KP. RENGAS BANDUNG RT.01/02 KARANGSAMBUNG/ KEDUNGWARINGIN KAB.BEKASI', 'D3 ', '12323108873', '3204326109910003', '889600003445000', '085811798396', 4486842, 3263157, 'Menikah Anak-0', 'REKAM MEDIS', '', '', '2015-10-01', '2017-11-03 08:10:58'),
(1770, 3, 'Hafiz Rizky Alvian', '', '', '201510068', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Radiografer', 'L', 'JAKARTA', '1993-07-16', 'BOJONG RANGKONG RT. 005 RW. 008 NO. 169, KEL. PULO GEBANG, KEC. CAKUNG, JAKTIM', 'D3 ', '12323108814', '3175061607930004', '741115182006000', '081289432922', 4078947, 3263157, 'Single', 'RADIOLOGI', '', '', '2015-10-01', '2017-11-03 08:10:58'),
(1771, 3, 'Aris Subiyanto', '', '', '201511069', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Perawat Umum ', 'L', 'BEKASI', '1991-03-21', 'PONDOK UNGU MEDAN SATRIA RT.05/03 KEL.MEDAN SATRIA/ MEDAN SATRIA BEKASI JABAR', 'D3 ', '60423038889', '3275062103910008', '742802382427000', '081295952729', 4486842, 3263157, 'Menikah Anak-0', 'RAWAT INAP', '', '', '2015-11-02', '2017-11-03 08:10:58'),
(1772, 3, 'Dwi Soffyan N.A', '', '', '201511070', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Perawat Umum ', 'L', 'MAGETAN', '1991-10-21', 'JL.ONTOREJO NO.467 RT.04/02 KEL.HALIM PERDANA KUSUMAH/ MAKASAR JAKTIM', 'D3 ', '51323138690', '3175082110910001', '663835791005000', '083872761309', 4078947, 3263157, 'Single', 'PERAWAT IGD', '', '', '2015-11-02', '2017-11-03 08:10:58'),
(1773, 3, 'Nurul Rachmasari', '', '', '201511071', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Perawat Umum ', 'P', 'JAKARTA', '1994-09-03', 'JL. KAYU TINGGI RT.09/05 KEL.CAKUNG TIMUR/ CAKUNG JAKTIM', 'D3 ', '12323109080', '3175064309940002', '743978652006000', '089692832284', 4078947, 3263157, 'Single', 'POLI RAWAT JALAN', '', '', '2015-11-02', '2017-11-03 08:10:58'),
(1774, 3, 'Ayep Wijaya', '', '', '201512075', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Perawat Umum ', 'L', 'PANDEGLANG', '1993-03-22', 'KP. MONGGOR RT.01/01 DS.SALAPRAYA/JIPUT KAB.PANDEGLANG BANTEN ', 'D3 ', '20523158917', '3601162203920001', '745578591045000', '085814391218', 4078947, 3263157, 'Single', 'PERAWAT IGD', '', '', '2015-12-01', '2017-11-03 08:10:58'),
(1775, 3, 'Ma\'Sum', '', '', '201512076', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Perawat Umum ', 'L', 'JAKARTA', '1994-02-26', 'PERUM MALAKA INDAH RT.15/06 KEL.ROROTAN/ CILINCING JAKUT ', 'D3 ', '20123110831', '3172042602940002', '745858373045000', '08989728010', 4078947, 3263157, 'Single', 'PERAWAT IGD', '', '', '2015-12-01', '2017-11-03 08:10:58'),
(1776, 3, 'Hendri Powan', '', '', '201512077', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Perawat Umum ', 'L', 'BELABAN ELLA', '1991-12-02', 'JL. GEMBIRA NO.2 RT.10/01 KEL.SUNGAI BAMBU/ TG.PRIOK JAK-UT ', 'D3 ', '20023244189', '6110040212910001', '745401182048000', '085773463346', 4078947, 3263157, 'Single', 'PERAWAT IGD', '', '', '2015-12-01', '2017-11-03 08:10:58'),
(1778, 4, 'dr. Rr. Vebi Adeliana Dara', '', '', '201512079', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Dokter Umum ', 'P', 'JEMBER', '1989-02-13', 'JL.JERUK 7 BLOK D29 NO.49 RT.05/15 KEL.TELUK PUCUNG/BEKASI UTARA BEKASI JABAR', 'PROFESI', '60023018206', '3275035302890006', '446570442407000', '081255584708', 4622807, 7396491, 'Single', 'DOKTER UMUM IGD', '', '', '2015-12-01', '2017-11-03 08:10:58'),
(1779, 3, 'Tomi Ardianto', '', '', '201512080', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Juru Masak', 'L', 'JAKARTA', '1991-11-30', 'JL.LORONG 22 NO.12 RT.05/07 KEL.KOJA/KOJA JAK-UT', 'SMK', '21623078757', '3172033011910003', '746066810045000', '081902844380', 3807018, 1903509, 'Single', 'JURU MASAK', '', '', '2015-12-01', '2017-11-03 08:10:58'),
(1780, 3, 'Hartyaningsih Lumintu', '', '', '201601082', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Asisten Apoteker', 'P', 'JAKARTA', '1989-08-24', 'JL.KEBANTENAN V NO.6A RT.01/06 KEL.SEMPER TIMUR/ CILINCING-JAKUT', 'D3', '20523160431', '3172046408890002', '581409638045000', '085781642443', 4486842, 3263157, 'Menikah Anak-0', 'APOTEKER', '', '', '2016-01-04', '2017-11-03 08:10:58'),
(1781, 3, 'Moh.Purnama Aji', '', '', '201601083', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Analis Kesehatan', 'L', 'BEKASI', '1994-11-16', 'KP.PONDOK RANGGON NO.57 RT.01/03 KEL.JATIMURNI/PONDOK MELATI KOTA BEKASI', 'D3 ', '60120015492', '3275121611940003', '749390597447000', '08567199125', 4078947, 3263157, 'Single', 'LABORATURIUM', '', '', '2016-01-04', '2017-11-03 08:10:58'),
(1782, 2, 'Raeza Rifda', '', '', '201602084', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Administrasi', 'P', 'JAKARTA', '1990-12-20', 'KAMPUNG GUSTI RT. 06/15 KEL.PEJAGALAN/ KEC. PENJARINGAN JAKUT', 'SLTA', '30723006524', '3172016012900008', '886714104041000', '081298989996', 4263860, 2284210, 'Menikah Anak-1', 'PENGADAAN BARANG DAN JASA', '', '', '2016-02-01', '2017-11-03 08:10:58'),
(1783, 4, 'dr.Siti Mulyati', '', '', '201602085', '69c5fcebaa65b560eaf06c3fbeb481ae44b8d618', 'User', '', '', 0, 0, 'Dokter Umum ', 'P', 'JAKARTA', '1990-05-10', 'JL.MANGGIS II NO.40 RT.04/28 KEL.KALIABANG TENGAH/ BEKASI UTARA', 'PROFESI', '20523161241', '3275035005900017', '711051441407000', '085322225950', 4622807, 0, 'Single', 'DOKTER UMUM IGD', '', '', '2016-02-01', '2017-11-03 08:10:58'),
(1784, 4, 'dr. Hermansyah Pattyranie', '', '', '201603086', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Dokter Umum ', 'L', 'JAKARTA', '1986-06-24', 'JL.TAMAN JUANDA P-1 NO.07 RT.09/04 KEL.DUREN JAYA/ BEKASI TIMUR KOTA.BEKASI', 'PROFESI', '20523161705', '3275012406860028', '776982647407000', '081290005551', 5177544, 7396491, 'Menikah Anak-1', 'DOKTER UMUM IGD', '', '', '2016-03-01', '2017-11-03 08:10:58');
INSERT INTO `data_pegawai` (`id_data_pegawai`, `id_atasan`, `nama`, `nip`, `nrk`, `nopeg`, `password`, `akses_level`, `pangkat`, `golongan_ruang`, `tahun_masa_kerja`, `bulan_masa_kerja`, `jabatan`, `jenis_kelamin`, `tempat_lhr`, `tgl_lahir`, `alamat`, `pendidikan_trkh`, `no_rekening`, `no_ktp`, `no_npwp`, `no_hp`, `gaji`, `tkd`, `jenis_tunjangan`, `unit_kerja`, `gambar`, `email`, `tanggal_daftar`, `tanggal`) VALUES
(1785, 2, 'Nurlaelah', '', '', '201604087', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Administrasi', 'P', 'JAKARTA', '1992-05-10', 'JL. KALIBARU BARAT IIA NO.42 RT.01/10 KEL. KALIBARU/ CILINCING JAKUT', 'SLTA', '20523162680', '3172045005920006', '757604673045000', '085776218220', 3807018, 2284210, 'Single', 'LOKET', '', '', '2016-04-01', '2017-11-03 08:10:58'),
(1786, 2, 'Ayu Sintya', '', '', '201604088', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Administrasi', 'P', 'JAKARTA', '1993-11-21', 'JL. KESATRIAN RT 004 / RW 005 NO. 14 KEL. CILINCING, KEC. CILINCING, JAKARTA UTARA ', 'SLTA', '20523162671', '3172046111930006', '757588843045000', '082111988448', 3807018, 2284210, 'Single', 'LOKET', '', '', '2016-04-01', '2017-11-03 08:10:58'),
(1787, 2, 'Shidiq Umar Muchtar', '', '', '201604089', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Administrasi', 'L', 'JAKARTA', '1996-07-15', 'JL. CEMARA BLOK I GG II NO .16 RT 005 / RW 016 KEL. LAGOA KEC. KOJA JAKARTA UTARA', 'SLTA', '21523052466', '3216011507960013', '758268452045000', '08989732821', 3807018, 2284210, 'Single', 'LOKET', '', '', '2016-04-01', '2017-11-03 08:10:58'),
(1788, 2, 'Difa Ariestha', '', '', '201604090', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Administrasi', 'P', 'JAKARTA', '1994-03-28', 'ALINDA KENCANA BLOK F2 NO.18 RT.07 RW.21 BEKASI UTARA', 'SLTA', '60023019474', '3275036803940018', '757402029407000', '085770001461', 3807018, 2284210, 'Single', 'LOKET', '', '', '2016-04-01', '2017-11-03 08:10:58'),
(1789, 3, 'Rini Pakpahan', '', '', '201604092', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Bidan ', 'P', 'CIANJUR', '1995-06-16', 'JL. KEBANTENAN V RT 002/ RW 006 KEL. SEMPER TIMUR, KEC. CILINCING, JAKARTA UTARA', 'D3', '20523163546', '3203015606950008', '759637226045000', '081906564059', 4078947, 3263157, 'Single', 'RUANG BERSALIN', '', '', '2016-04-01', '2017-11-03 08:10:58'),
(1790, 3, 'Nahdhiya Sofiana Cahyani', '', '', '201604093', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Bidan ', 'P', 'TEGAL', '1994-12-11', 'KP. PANGKALAN RT. 002 / RW 007 BEKASI UTARA', 'D3', '20523163074', '3216015112940004', '758043756435000', '081212511481', 4078947, 3263157, 'Single', 'RUANG BERSALIN', '', '', '2016-04-01', '2017-11-03 08:10:58'),
(1791, 3, 'Dwi Jayanti Mursidah', '', '', '201604094', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Perawat Umum ', 'P', 'JAKARTA', '1994-09-16', 'JL. RAWA KUNING RT 003 / 002 NO. 51 KEL. PULOGEBANG, KEC. CAKUNG, JAKARTA TIMUR ', 'D3 ', '12323113320', '3175065609940002', '745185926006000', '087878371696', 4078947, 3263157, 'Single', 'POLI RAWAT JALAN', '', '', '2016-04-01', '2017-11-03 08:10:58'),
(1792, 3, 'Yudendi', '', '', '201604095', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Perawat Umum ', 'L', 'TANGERANG', '1995-01-05', 'Kp. GAGA RT.002/002 Ds. ONYAM KEC. GUNUNG KALER, KAB. TANGERANG', 'D3 ', '60420013443', '3603320501950004', '742601263451000', '082213101848', 4078947, 3263157, 'Single', 'PERAWAT IGD', '', '', '2016-04-01', '2017-11-03 08:10:58'),
(1793, 3, 'Darojatul Hulwiyah', '', '', '201604096', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Perawat Umum ', 'P', 'JAKARTA', '1993-11-17', 'JL.KP.BUARAN RT.04/03 KEL.CAKUNG BARAT/ CAKUNG JAKTIM', 'D3 ', '12523080321', '3175065711930007', '725900823006000', '0896 2202 6945', 4078947, 3263157, 'Single', 'RAWAT INAP', '', '', '2016-04-01', '2017-11-03 08:10:58'),
(1794, 3, 'Anissa Hanan Fauziyyah', '', '', '201604097', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Perawat Umum ', 'P', 'JAKARTA', '1993-10-07', 'JL. MALAKA JAYA NO. 20 RT 002/ RW 011 KEL. ROROTAN KEC. CILINCING, JAKARTA UTARA', 'D3 ', '20523162582', '3172044710930004', '745780726045000', '082298830631', 4078947, 3263157, 'Single', 'RAWAT INAP', '', '', '2016-04-01', '2017-11-03 08:10:58'),
(1795, 3, 'Citra Sherly Febriyanty', '', '', '201604098', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Perawat Umum ', 'P', 'JAKARTA', '1992-02-15', 'VILA MUTIARA GADING NO.21 RT.02/13 TARUMAJAYA BEKASI', 'D3 ', '60423075971', '3216015502920001', '751431933435000', '085710207930', 4078947, 3263157, 'Single', 'POLI RAWAT JALAN', '', '', '2016-04-01', '2017-11-03 08:10:58'),
(1796, 3, 'Bayu Setiawan', '', '', '201604099', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Perawat Umum ', 'L', 'JAKARTA', '1993-04-07', 'JL. PEDONGKELAN NO. RT.06/05 KEL. CILINCING/ CILINCING JAKUT', 'D3 ', '20123118203', '3172040704930012', '756715249045000', '081212671745', 4078947, 3263157, 'Single', 'PERAWAT IGD', '', '', '2016-04-01', '2017-11-03 08:10:58'),
(1797, 3, 'Rima Astuti', '', '', '201604101', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Juru Masak', 'P', 'JAKARTA', '1984-05-29', 'JL.KEBANTENAN III NO.16 RT.04/02 KEL.SEMPER TIMUR/ CILINCING-JAKUT', 'SMK', '20523162884', '3172046905841002', '472620707075000', '081287600887', 4340000, 1903509, 'Menikah Anak-2', 'JURU MASAK', '', '', '2016-04-01', '2017-11-03 08:10:58'),
(1798, 2, 'Iwan Setiawan', '', '', '201604102', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Driver', 'L', 'JAKARTA', '1982-12-27', 'JL.BATU SARI BARAT NO.- RT.03/01 KEL.BATUSARI/ BATUCEPER KOTA TANGERANG', 'SLTA', '30023149123', '3173062712820020', '730793833416000', '081283387752', 4340000, 1903509, 'Menikah Anak-2', 'DRIVER', '', '', '2016-04-01', '2017-11-03 08:10:58'),
(1799, 3, 'Sari Mulyaningsih', '', '', '201604103', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Nutrisionist', 'P', 'JAKARTA', '1984-05-14', 'JL.KOPERPU I NO.19 RT.02/25 KEL. MARGAHAYU/ BEKASI TIMUR-KOTA BEKASI', 'D3 ', '60023019580', '3275015405840032', '883374043407000', '085716937256', 4486842, 0, 'Menikah Anak-0', 'INSTALASI GIZI', '', '', '2016-04-01', '2017-11-03 08:10:58'),
(1800, 4, 'dr.Arif Rahman Hakim', '', '', '201605105', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Dokter Umum', 'L', 'BEKASI', '1990-09-16', 'JL.BUNI BAKTI NO.-RT.13/07 DS.BUNI BAKTI/ BABELAN KAB.BEKASI', 'PROFESI', '20523163651', '3216021609900001', '707531539435000', '081280394746', 4622807, 7396491, 'Single', 'DOKTER UMUM IGD', '', '', '2016-05-02', '2017-11-03 08:10:58'),
(1801, 3, 'Hegar Laksana.P', '', '', '201606106', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Perawat Umum ', 'L', 'KUNINGAN', '1993-11-12', 'JL.TERATAI IV BLOK D28 NO.9 RT.03/24 DS. WANASARI/ CIBITUNG-KAB.BEKASI ', 'D3 ', '60423080729', '3216071211930013', '742787559435000', '08981436267', 4078947, 0, 'Single', 'PERAWAT IGD', '', '', '2016-06-01', '2017-11-03 08:10:58'),
(1802, 3, 'Nurhayati', '', '', '201606107', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Perawat Umum ', 'P', 'BEKASI', '1992-04-10', 'KP.PALJAYA NO.- RT.02/01 DS. SEGARAJAYA/ TARUMAJAYA KAB.BEKASI ', 'D3 ', '20523164241', '3216016006920006', '763050630435000', '81212812573', 4078947, 3263157, 'Menikah Anak-0', 'RAWAT INAP', '', '', '2016-06-01', '2017-11-03 08:10:58'),
(1803, 3, 'Nining Suningsih', '', '', '201606108', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Perawat Umum ', 'P', 'CIREBON', '1987-06-19', 'KP.BAMBU KUNING NO.- RT.02/02 KEL. MARUNDA/ CILINCING-JAKUT ', 'D3 ', '20523164267', '3209105906860003', '499152346407000', '082122036954', 4078947, 3263157, 'Menikah Anak-1', 'POLI RAWAT JALAN', '', '', '2016-06-01', '2017-11-03 08:10:58'),
(1804, 3, 'Vina Rahayu', '', '', '201606109', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Perawat Umum ', 'P', 'JAKARTA', '1995-03-08', 'JL.PEMUDA IV NO.27 RT.11/03 KEL.RAWAMANGUN/ PULO GADUNG-JAKTIM ', 'D3 ', '50123090111', '3175024803950003', '762801132003000', '089636257729', 4078947, 3263157, 'Single', 'RAWAT INAP', '', '', '2016-06-01', '2017-11-03 08:10:58'),
(1805, 3, 'Evi Apniasari', '', '', '201606110', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Perawat Umum ', 'P', 'CILACAP', '1985-04-24', 'JL. KP MANGGA GG.SAWAL II NO.57 RT.02/03 KEL. TUGU SELATAN/ KOJA JAKUT ', 'D3 ', '60423080303', '3301166404850003', '573152758042000', '087880225344', 4650000, 3263157, 'Menikah Anak-2', 'RAWAT INAP', '', '', '2016-06-01', '2017-11-03 08:10:58'),
(1806, 3, 'Purmawansyah', '', '', '201606111', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Perawat Umum ', 'L', 'SEBEMBAN', '1990-01-31', 'KAV. TIPAR TIMUR NO.- RT. 13/ 04 KEL. SEMPER BARAT/ CILINCING-JAKUT ', 'D3 ', '20323030124', '6103113101900001', '763396801045000', '085282683169', 4078947, 3263157, 'Single', 'RAWAT INAP', '', '', '2016-06-01', '2017-11-03 08:10:58'),
(1807, 3, 'Novenda Norina.N', '', '', '201606112', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Perawat Umum ', 'P', 'OINLASI', '1993-11-30', 'JL.TUGU INDAH RT.11/06 KEL.SEMPER BARAT/ CILINCING-JAKUT ', 'D3 ', '23023233383', '5302087011930001', '262174779043000', '081219635632', 4078947, 3263157, 'Single', 'RAWAT INAP', '', '', '2016-06-01', '2017-11-03 08:10:58'),
(1808, 2, 'Risky Annisa', '', '', '201606113', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Administrasi', 'P', 'JAKARTA', '1995-12-23', 'KOMP.DEWA KEMBAR NO.27 RT.10/01 KEL.SEMPER TIMUR/ CILINCING-JAKUT ', 'SLTA', '20923107932', '3172046312950006', '762495158045000', '089653205429', 3807018, 2284210, 'Single', 'LOKET', '', '', '2016-06-01', '2017-11-03 08:10:58'),
(1809, 2, 'Novia Chilfi', '', '', '201606115', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Administrasi', 'P', 'JAKARTA', '1995-11-26', 'JL.KRAMAT SAWAH XII RT.13/2 KEL.PASEBAN/ SENEN-JAKPUS ', 'SLTA', '10923069422', '3171046611950001', '558381992023000', '082112951054', 3807018, 2284210, 'Single', 'LOKET', '', '', '2016-06-01', '2017-11-03 08:10:58'),
(1810, 2, 'Leistyana Maharinie', '', '', '201606116', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Administrasi', 'P', 'JAKARTA', '1995-03-10', 'JL.BHAKTI NO.56 RT.05/06 KEL. CILINCING / KEC. CILINCING JAKUT', 'SLTA', '20523164062', '3172045003950005', '762402535045000', '087886759456', 3807018, 2284210, 'Single', 'LOKET', '', '', '2016-06-01', '2017-11-03 08:10:58'),
(1811, 3, 'Deni Muhamad Furkon ', '', '', '201606118', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Juru Masak', 'L', 'BOGOR', '1989-05-01', 'KP.CIKUPA RT.02/05 DS.CIBEUTEUNG UDIK/ CISEENG-KAB.BOGOR JAWA BARAT', 'SMK', '43220006474', '3201140105890006', '762995181434000', '085714482626', 4263860, 1903509, 'Menikah Anak-1', 'JURU MASAK', '', '', '2016-06-01', '2017-11-03 08:10:58'),
(1812, 3, 'Yeni Wulandari', '', '', '201606119', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Perawat Umum ', 'P', 'BEKASI', '1995-05-10', 'JL. PONDOK UNGU NO.- RT.01/02 KEL.MEDAN SATRIA/ MEDAN SATRIA-KOTA BEKASI', 'D3 ', '15323085174', '3275065005950008', '763105574427000', '085777880490', 4078947, 3263157, 'Single', 'PERAWAT IGD', '', '', '2016-06-01', '2017-11-03 08:10:58'),
(1813, 2, 'Deni Muhamad Syahrul', '', '', '201609122', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Administrasi', 'L', 'BOGOR', '1985-03-22', 'PERUMDA BCE BLOK B6 NO.5 RT.06/11 DS.SUKAHATI KEC.CIBINONG KAB.BOGOR-JABAR', 'SLTA', '21123108728', '3201012203850003', '705698074403000', '081382413974', 4263860, 2664912, 'Menikah Anak-1', 'PERENCANAAN', '', '', '2016-09-01', '2017-11-03 08:10:58'),
(1814, 2, 'Ahmad Rawi', '', '', '201609123', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Administrasi', 'L', 'TANGERANG', '1993-08-27', 'JL.PANGLIMA POLIM NO.82 RT.04/03 KEL.PORIS PLAWAT KEC.CIPONDOH KOTA TANGERANG-BANTEN', 'SLTA', '62023032548', '3671052708930001', '754995116416000', '085945297753', 3807018, 2284210, 'Single', 'LOKET', '', '', '2016-09-01', '2017-11-03 08:10:58'),
(1815, 3, 'Retno Dwi Handayani', '', '', '201610125', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Asisten Apoteker', 'P', 'JAKARTA', '1989-01-15', 'KP.TELUK BUYUNG NO.480E RT.04/02 KEL.MARGA MULYA/ BEKASI UTARA KOTA BEKASI-JABAR', 'D3 ', '60023021363', '3275035501890017', '440074243407000', '089648741952', 4486842, 3263157, 'Menikah Anak-0', 'APOTEKER', '', '', '2016-10-01', '2017-11-03 08:10:58'),
(1816, 2, 'Nurromadlona Zikri Fadli', '', '', '201701127', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Superadmin', '', '', 0, 0, 'Administrasi', 'L', 'BOGOR', '1989-04-15', 'KP.TARIKOLOT RT.01/07 DS. NANGGEWER/ CIBINONG KAB.BOGOR JAWA BARAT', 'SLTA', '21123111931', '3201011604890019', '548767110403000', '081288231163', 4263860, 2284210, 'Menikah Anak-1', 'KEPEGAWAIAN', '', '', '2017-01-01', '2017-11-03 08:10:58'),
(1817, 2, 'Asido Partogi.Manurung', '', '', '201701128', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Administrasi', 'L', 'PEMATANG SIANTAR', '1992-04-12', 'JL.BAN BIRONG UJUNG RT.-/- KEL. SIGULANGGULANG/ SIANTAR UTARA KOTA PEMATANG SIANTAR', 'SLTA', '20523169544', '1272031204920003', '810029405117000', '081376179196', 3807018, 2284210, 'Single', 'KEPEGAWAIAN', '', '', '2017-01-01', '2017-11-03 08:10:58'),
(1818, 4, 'dr.Natasha Yuwanita,Sp.A', '', '', '201703129', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Dokter Spesialis', 'P', 'PALEMBANG', '1982-10-20', 'JL.KELAPA CENGKIR BARAT VII FN 1/7 RT.08/11 KEL.KELAPA GADING TIMUR/ KELAPA GADING JAKARTA UTARA', 'S3', '23023264483', '3172066010820005', '694948084043000', '081398822555', 4894737, 12236842, 'Single', 'DOKTER SPESIALIS', '', '', '2017-03-01', '2017-11-03 08:10:58'),
(1819, 4, 'I Komang Yudhistira', '', '', '201704130', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Fisioterapis', 'L', 'JAKARTA', '1992-07-10', 'KOMP. PELINDO II BLOK C1 NO.15 RT.12/09 KEL.CILINCING/ CILINCING JAKARTA UTARA 14120', 'D3 ', '21523077043', '3172041007920008', '757095054045000', '087794386702', 4078947, 3263157, 'Single', 'POLI RAWAT JALAN', '', '', '2017-04-03', '2017-11-03 08:10:58'),
(1820, 4, 'dr.Rafael Nanda Raudranisala', '', '', '201704131', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Dokter Umum ', 'L', 'JAKARTA', '1989-11-05', 'KOMP.PCI BLOK B.22 NO.07 RT.02/06 KEL.KEDALEMAN/ CIBEBER KOTA CILEGON-BANTEN', 'PROFESI', '20523170721', '3672010511890001', '737230946417000', '081318151558', 4622807, 7396491, 'Single', 'DOKTER UMUM IGD', '', '', '2017-04-03', '2017-11-03 08:10:58'),
(1821, 3, 'Victor, S.Farm, Apt', '', '', '201705132', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Apoteker', 'L', 'JAKARTA', '1991-03-28', 'JL.PADEMANGAN II GG.6 NO.31A RT.12/06 KEL.PADEMANGAN TIMUR/ PADEMANGAN JAKARTA UTARA', 'PROFESI', '14023099998', '3172052803910004', '818034753044000', '0818400123', 4622807, 6934210, 'Single', 'APOTEKER', '', '', '2017-05-02', '2017-11-03 08:10:58'),
(1822, 3, 'Maharani Pratiwi, S.Farm, Apt', '', '', '201705133', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Apoteker', 'P', 'JAKARTA', '1992-12-21', 'KP. PONDOK RANGON NO.32 RT.01/08 KEL. JATISAMPURNA/ JATIRANGGON KOTA BEKASI-JABAR', 'PROFESI', '60020041991', '3275106112920002', '818818635447000', '081287519715', 4622807, 6934210, 'Single', 'APOTEKER', '', '', '2017-05-02', '2017-11-03 08:10:58'),
(1823, 4, 'dr.Muhammad Fachri Ibrahim', '', '', '201706134', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Dokter Umum ', 'L', 'BEKASI', '1991-09-30', 'JL.INTAN BLOK D NO.483 RT.01/09 KEL.JAKA SAMPURNA KEC.BEKASI BARAT KOTA BEKASI', 'PROFESI', '60023023137', '3275023009910010', '737003814407000', '082188697840', 4622807, 7396491, 'Single', 'DOKTER UMUM IGD', '', '', '2017-06-02', '2017-11-03 08:10:58'),
(1824, 4, 'dr.Fitria Oktaviani', '', '', '201706135', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Dokter Umum ', 'P', 'JAKARTA', '1991-10-14', 'JL.BLUE SAFIR NO.114 RT.01/40 KEL.BOJONG RAWALUMBU KEC.RAWALUMBU KOTABEKASI', 'PROFESI', '60023023111', '3275045410910015', '718496631432000', '081220106627', 4622807, 7396491, 'Single', 'DOKTER UMUM IGD', '', '', '2017-06-02', '2017-11-03 08:10:58'),
(1825, 4, 'dr.Maya Ramadhani Ningtyas', '', '', '201706136', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Dokter Umum ', 'P', 'JAKARTA', '1991-03-18', 'JL.BERLIAN 8 NO.108 RT.08/13 KEL.HARAPAN JAYA KEC.BEKASI UTARA KOTABEKASI', 'PROFESI', '60023023129', '3275035803910027', '727523953407000', '081290774948', 4622807, 7396491, 'Single', 'DOKTER UMUM IGD', '', '', '2017-06-02', '2017-11-03 08:10:58'),
(1826, 3, 'Asep Supriyatna', '', '', '201707137', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Perawat Umum ', 'L', 'JAKARTA', '1988-04-21', 'JL.KALIBARU TIMUR NO.31 RT.10/01 KEL.KALIBARU KEC.CILINCING0-JAKARTA UTARA ', 'D3 ', '20220094174', '3172042104880008', '665887923045000', '083898091639', 3059210, 2447368, 'Menikah Anak-0', 'POLI RAWAT JALAN', '', '', '2017-07-03', '2017-11-03 08:10:58'),
(1827, 3, 'Rina Fauziah', '', '', '201708139', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Rekam Medis', 'P', 'KEBUMEN', '1994-05-06', 'DK KADEMANGAN RT/ 02 RW. 02 DESA LAJER', 'D4', '20523172120', '3305074605940001', '737301556523000', '089680129881', 4078947, 3263157, 'Single', 'REKAM MEDIS', '', 'rinafaa@gmail.com', '2017-08-07', '2017-12-23 07:55:40'),
(1828, 3, 'Iin sariningsih', '', '', '201708138', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Rekam Medis', 'P', 'BANDUNG', '1991-04-07', 'Blok Pintu I No.5/126c RT.01/04 Kel.Kebongedang Kec.Batununggal Kota Bandung Jabar', 'D4', '1320012856614', '3273127105910002', '350635496424000', '089636497903', 4078947, 3263, 'Single', 'REKAM MEDIS', '', 'perindoedimoed@gmail.com', '2017-08-07', '2017-12-23 08:34:57'),
(1831, 4, 'dr. M. FARHAN. D.H, Sp.Og', '', '', '701061501', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Dokter Spesialis', 'L', 'Banda Aceh', '1984-02-22', 'JL.JOHAR BARU II NO.33 RT.05/09 KEL.JOHAR BARU KEC.JOHAR BARU JAK-PUS', 'S3', '20523157121', '3171082202840001', '718626856024000', '08121763476', 5862488, 0, 'Menikah Anak-2', 'DOKTER SPESIALIS', '', 'unknow@gmail.com', '2015-06-04', '2018-01-08 04:23:33'),
(1832, 4, 'dr. NIKKO DARNINDRO, Sp.PD', '', '', '701101503', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Dokter Spesialis', 'L', 'Jakarta', '1984-06-10', 'JL.PULO GEBANG PERMAI BLOK I.2/16 RT.09/13 KEL. PULO GEBANG/ CAKUNG JAKARTA TIMUR', 'S3', '50320912745', '3175061006840016', '584147300006000', '08129734458', 5862488, 0, 'Menikah Anak-2', 'DOKTER SPESIALIS', '', 'unknow@gmail.com', '2015-10-01', '2018-01-08 04:29:33'),
(1833, 4, 'dr. MEIRDHANIA ANDINA, Sp.A', '', '', '701031604', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Dokter Spesialis', 'P', 'Poso', '1982-08-13', 'JL. CEMPAKA NO.237-238 KOMP.BARATA RT.01/06 KEL.HARAPAN JAYA/ BEKASI UTARA-BEKASI ', 'S3', '60023019415', '3275035308820023', '753807189407000', '081220022896', 5862488, 0, 'Menikah Anak-2', 'DOKTER SPESIALIS', '', 'unknow@gmail.com', '2016-03-01', '2018-01-08 04:31:59'),
(1834, 4, 'dr.STANLEY ALOYSIUS TANUWIDJAJA,Sp.Og', '', '', '701021708', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Dokter Spesialis', 'L', 'Jakarta', '1983-03-03', 'JL.TANJUNG NO.38 RT.07/01 KEL.GONDANGDIA/ MENTENG JAK-PUS 10350', 'S3', '11823056699', '3171060303830002', '766977995076000', '082193319981', 5580000, 0, 'Menikah Anak-2', 'DOKTER SPESIALIS', '', 'unknow@gmail.com', '2017-02-01', '2018-01-08 04:34:15'),
(1835, 4, 'dr.GINA ADRIANA NAINGGOLAN,Sp.An', '', '', '701021709', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Dokter Spesialis', 'P', 'Medan', '1980-10-22', 'JAKARTA GARDEN CITY CLUSTER CASSIA NO.55 RT.02/14 KEL. CAKUNG TIMUR/ CAKUNG JAK-TIM', 'S3', '12320182827', '1271016210800003', '590503181416000', '081383181324', 5580000, 0, 'Menikah Anak-2', 'DOKTER SPESIALIS', '', 'unknow@gmail.com', '2017-02-01', '2018-01-08 04:36:25'),
(1836, 4, 'dr.HELEN DEWI SANTOSO,Sp.PK', '', '', '701021710', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Dokter Spesialis', 'P', 'Jakarta', '1950-09-05', 'JL.JANUR HIJAU II TJ 1/4 RT.02/01 KEL.KLP.GADING TIMUR/ KLP.GADING JAK-UT', 'S3', '20620032511', '3172064509500002', '258564780043000', '082122528899', 5580000, 0, 'Menikah Anak-2', 'DOKTER SPESIALIS', '', 'unknow@gmail.com', '2017-02-01', '2018-01-08 04:39:04'),
(1837, 4, 'dr. TEUKU REYHAN GAMAL,Sp.S', '', '', '702051711', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Dokter Spesialis', 'L', 'Jakarta', '1984-01-16', 'JL.KAYU PUTIH TIMUR II NO.4 1/4 RT.06/08 KEL.PULO GADUNG/ PULO GADUNG JAKARTA TIMUR', 'S3', '15323103032', '3175021601840002', '798642062003000', '085883188723', 5580000, 0, 'Menikah Anak-2', 'DOKTER SPESIALIS', '', 'unknow@gmail.com', '2017-05-02', '2018-01-08 04:42:01'),
(1838, 4, 'dr. ROS EVA SERIOSNA S.D,Sp.P', '', '', '702061712', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Dokter Spesialis', 'P', 'Medan', '1974-10-04', 'JL.KELAPA PUAN TIMUR VII NB-8 NO.26 RT.07/ 12 KEL. PEGANGSAAN DUA/ KELAPA GADING-JAKARTA UTARA', 'S3', '20320037888', '3172064410740002', '095806808043000', '081291649854', 5580000, 0, 'Menikah Anak-2', 'DOKTER SPESIALIS', '', 'unknow@gmail.com', '2017-06-02', '2018-01-08 04:44:44'),
(1839, 4, 'dr. NURFANIDA LIBRIANTY,Sp.P', '', '', '703071713', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Dokter Spesialis', 'P', 'Palembang', '1984-10-19', 'JL.SUMPAH PEMUDABLOK J NO.3B RT.32/09 KEL.LOROK PAKJO/ KEC.ILIR BARAT I KOTA PALEMBANG  ', 'S3', '20023087270', '1671045910840009', '143905164307000', '08127382332', 5580000, 0, 'Menikah Anak-2', 'DOKTER SPESIALIS', '', 'unknow@gmail.com', '2017-07-03', '2018-01-08 04:46:37'),
(1840, 4, 'dr. RENNY PRATIWI,Sp.Og', '', '', '703071714', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Dokter Spesialis', 'P', '0', '1985-10-31', 'JL.IR.H.JUANDA NO.41 RT.04/04 KEL.BEKASI JAYA KEC.BEKASI TIMUR KOTA BEKASI,JAWA BARAT', 'S3', '51123717286', '3275017110850007', '811498666407000', '082347774985', 5580000, 0, 'Menikah Anak-2', 'DOKTER SPESIALIS', '', 'unknow@gmail.com', '2017-07-03', '2018-01-08 04:49:00'),
(1841, 4, 'dr. RIVO MARIO.WAROUW,Sp.KJ', '', '', '701081715', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Dokter Spesialis', 'L', 'Tondano', '1982-06-18', 'JL.PERMATA TIMUR II BLOK DD NO.21 RT.09/02 KEL.JATICEMPAKA KEC.PONDOKGEDE KOTA BEKASI,JAWA BARAT', 'S3', '21523078945', '3275081806820015', '795993815953000', '0811183229', 5580000, 0, 'Menikah Anak-2', 'DOKTER SPESIALIS', '', 'unknow@gmail.com', '2017-08-01', '2018-01-08 04:50:58'),
(1842, 4, 'dr.YUHANA FITRA, Sp.PD', '', '', '701091716', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Dokter Spesialis', 'P', 'Bandung', '1984-03-07', 'JL.KEMANG CEMPAKA 4 BLOK BJ IA KEMANG PRATAMA 5 RT.03/12 KEL.BOJONG MENTENG/ RAWALUMBU KOTA BEKASI', 'S3', '60020043552', '3671034703840004', '496021262432000', '082124105737', 5580000, 0, 'Menikah Anak-2', 'DOKTER SPESIALIS', '', 'unknow@gmail.com', '2017-09-01', '2018-01-08 04:52:50'),
(1843, 4, 'dr.MARLINA TANJUNG, Sp.A', '', '', '701091717', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Dokter Spesialis', 'P', 'Medan', '1982-08-07', 'JL.BENDUNGAN JAGO NO.4B RT.12/01 KEL.UTAN PANJANG/ KEMAYORAN JAKARTA PUSAT', 'S3', '15520002037', '1271014708820002', '243077658122000', '081263587202', 5580000, 0, 'Menikah Anak-2', 'DOKTER SPESIALIS', '', 'unknow@gmail.com', '2017-09-01', '2018-01-08 04:54:37'),
(1844, 4, 'dr.WRESTY ARIEF, Sp.THT', '', '', '701111718', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Dokter Spesialis', 'L', '-', '2018-01-08', '-', 'S3', '50023297231', '3175057006850007', '974367831009000', '0', 5580000, 0, 'Menikah Anak-2', 'DOKTER SPESIALIS', '', 'unknow@gmail.com', '2017-09-01', '2018-01-08 04:58:05'),
(1845, 4, 'dr.KADEK SUMANTRA, Sp.PD', '', '', '701121719', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Dokter Spesialis', 'L', 'Klungkung', '1966-06-16', 'JL.TAWAKAL RAYA NO.48 RT.08/016 KEL.TOMANG KEC.GROGOL PETAMBURAN, JAKARTA BARAT', 'S3', '51323175951', '5171041607660001', '084208917901000', '0', 5580000, 0, 'Menikah Anak-2', 'DOKTER SPESIALIS', '', 'unknow@gmail.com', '2017-12-01', '2018-01-08 04:59:53'),
(1846, 4, 'HENDRA PURNAMA, Sp. B,DR', '', '', '201709141', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Dokter Spesialis', 'L', 'Jakarta', '1974-06-12', 'JL.KAV.TUGU NO.28 RT.05/06 KEL.BEKASI JAYA KEC. BEKASI TIMUR KOTA BEKASI', 'S3', '60423108801', '3275011206740022', '258218668542000', '082311479450', 5580000, 0, 'Menikah Anak-2', 'DOKTER SPESIALIS', '', 'unknow@gmail.com', '2017-09-01', '2018-01-08 05:07:58'),
(1847, 3, 'IKE AMELIA', '', '', '201708140', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'RADIOGRAFER', 'P', 'Jakarta', '1990-03-27', 'JL.PERUM PERJUANGAN PRATAMA BLOK G NO.18 RT.02/06 KEL.PEJUANG KEC.MEDAN SATRIA KOTA BEKASI-JABAR', 'D4', '60423107988', '3275066703900009', '818772543427000', '08881790176', 4078947, 0, 'Single', 'RADIOLOGI', '', 'unknow@gmail.com', '2017-08-01', '2018-01-08 06:08:00'),
(1848, 4, 'dr. NOVIANDRI CAHYADI BASIR', '198711242014031003', '184409', 'Operator ', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', 'Penata Muda Tk I', 'III/B', 0, 0, 'Dokter Umum', 'L', 'Jakarta', '1987-11-24', 'JL. TIPAR CAKUNG RT 007/001 NO. 35, KEC. CILINCING, KEL. SUKAPURA, JAKARTA UTARA 14140', 'PROFESI', '23020000639', '3172042411870005', '548935949045000', '0853 7739 1880', 5306982, 0, 'Menikah Anak-1', 'DOKTER UMUM POLI', '', 'noviandricahyadi@gmail.com', '2016-11-01', '2018-01-08 06:23:05'),
(1850, 3, 'Bayu Eriyanto', '', '', '201801142', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', '', '', 0, 0, 'Asisten Apoteker Pelaksana', 'L', 'Jakarta', '1996-11-26', 'Jl. Cibadak Utara RT 001/008 Ke. Rawa Badak Utara Kec. Koja', 'D4', '2147483647', '3172032311960004', '836245837045000', '085880804127', 4078947, 3263157, 'Single', 'APOTEKER', '', 'bayueriyanto@gmail.com', '2018-01-01', '2018-01-15 02:11:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pelatihan`
--

CREATE TABLE `data_pelatihan` (
  `id_data_pelatihan` int(50) NOT NULL,
  `id_data_pegawai` int(50) NOT NULL,
  `id_master_pelatihan` int(50) NOT NULL,
  `uraian` text NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `tanggal_sertifikat` varchar(50) NOT NULL,
  `jam_pelatihan` varchar(50) NOT NULL,
  `negara` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_pelatihan`
--

INSERT INTO `data_pelatihan` (`id_data_pelatihan`, `id_data_pegawai`, `id_master_pelatihan`, `uraian`, `lokasi`, `tanggal_sertifikat`, `jam_pelatihan`, `negara`) VALUES
(15, 1, 1, 'Tidak Ada', 'Jakarta', '9 April 2017', '08:00 - 09:00', 'Indonesia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pendidikan`
--

CREATE TABLE `data_pendidikan` (
  `id_data_pendidikan` int(50) NOT NULL,
  `id_data_pegawai` int(50) NOT NULL,
  `id_master_pendidikan` int(50) NOT NULL,
  `jurusan_pendidikan` varchar(50) NOT NULL,
  `uraian` text NOT NULL,
  `teknik_non_teknik` varchar(50) NOT NULL,
  `sekolah` varchar(100) NOT NULL,
  `tempat_sekolah` text NOT NULL,
  `nomor_sttb` varchar(100) NOT NULL,
  `tanggal_sttb` varchar(100) NOT NULL,
  `tanggal_lulus` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_penghargaan`
--

CREATE TABLE `data_penghargaan` (
  `id_data_penghargaan` int(50) NOT NULL,
  `id_data_pegawai` int(50) NOT NULL,
  `id_master_penghargaan` int(50) NOT NULL,
  `uraian` text NOT NULL,
  `nomor_sk` varchar(100) NOT NULL,
  `tanggal_sk` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_rs`
--

CREATE TABLE `data_rs` (
  `id_rs` int(11) NOT NULL,
  `nama_rs` varchar(100) NOT NULL,
  `alamat_rs` text NOT NULL,
  `telpon` varchar(50) NOT NULL,
  `logo` varchar(225) NOT NULL,
  `gmbr_gedung` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_surat_cuti`
--

CREATE TABLE `data_surat_cuti` (
  `id_srt_cuti` int(11) NOT NULL,
  `jenis_cuti` varchar(255) NOT NULL,
  `lampiran` varchar(255) NOT NULL,
  `nomor_surat` varchar(255) NOT NULL,
  `tanggal_surat` varchar(255) NOT NULL,
  `pejabat_rumah_sakit` varchar(255) NOT NULL,
  `dari_wilayah` varchar(225) NOT NULL,
  `wilayah` varchar(255) NOT NULL,
  `isi_line_1` varchar(225) NOT NULL,
  `isi_line_2` varchar(255) NOT NULL,
  `isi_line_3` varchar(255) NOT NULL,
  `isi_line_4` varchar(255) NOT NULL,
  `isi_line_5` varchar(255) NOT NULL,
  `isi_line_6` varchar(255) NOT NULL,
  `isi_line_7` varchar(255) NOT NULL,
  `isi_line_8` varchar(255) NOT NULL,
  `isi_line_9` varchar(255) NOT NULL,
  `isi_line_10` varchar(225) NOT NULL,
  `isi_line_11` varchar(225) NOT NULL,
  `isi_line_12` varchar(225) NOT NULL,
  `isi_line_13` varchar(225) NOT NULL,
  `isi_line_14` varchar(225) NOT NULL,
  `isi_line_15` varchar(25) NOT NULL,
  `satuan_organisasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_surat_cuti`
--

INSERT INTO `data_surat_cuti` (`id_srt_cuti`, `jenis_cuti`, `lampiran`, `nomor_surat`, `tanggal_surat`, `pejabat_rumah_sakit`, `dari_wilayah`, `wilayah`, `isi_line_1`, `isi_line_2`, `isi_line_3`, `isi_line_4`, `isi_line_5`, `isi_line_6`, `isi_line_7`, `isi_line_8`, `isi_line_9`, `isi_line_10`, `isi_line_11`, `isi_line_12`, `isi_line_13`, `isi_line_14`, `isi_line_15`, `satuan_organisasi`) VALUES
(1, 'PERMOHONAN CUTI TAHUNAN', 'Peraturan Pemerintah<br/>Republik Indonesia', 'PP/11/2017', '30 Maret 2017', 'Direktur Rumah Sakit Umum Daerah Cilincing', 'Jakarta', 'Jakarta', 'Yang bertanda tangan dibawah ini :', 'Dengan ini mengajukan permohonan cuti tahunan untuk tahun', 'selama', 'Hari kerja', 'terhitung mulai tanggal', 's/d', 'selama cuti di', 'nomor telpon yang dapat di hubungi : ', 'Demikian permohonan cuti saya buat dengan dipergunakan dan dipertimbangkan sebagaimana mestinnya.', 'Catatan Pejabat Kepegawaian', 'Catatan Pertimbangan Atasan Langsung', 'Catatan Pertimbangan Atasan Langsung', 'Kepala Sub Bagian Tata Usaha', 'Mustomi, SE.MM', '196404181986031010', 'Rumah Sakit Umum Daerah Cilincing');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_atasan`
--

CREATE TABLE `master_atasan` (
  `id_atasan` int(11) NOT NULL,
  `nama_atasan` varchar(50) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `nrk` varchar(8) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `golongan` varchar(50) NOT NULL,
  `jabatan2` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_atasan`
--

INSERT INTO `master_atasan` (`id_atasan`, `nama_atasan`, `nip`, `nrk`, `jabatan`, `golongan`, `jabatan2`) VALUES
(1, 'dr. Netty Siahaan, M.K.M', '196104241987112001', '127822', 'Direktur', 'IV.b', 'Direktur'),
(2, 'Mustomi, SE.MM', '196404181986031010', '107484', 'Pembina', 'IV.a', 'Kepala Sub Bagian Tata Usaha'),
(3, 'drg. Cut Yuliza Irawani, Sp.Ort,MARS', '196607151991032007', '125483', 'Kepala Seksi Penunjang', 'IV.b', 'Kepala Seksi Penunjang'),
(4, 'dr. Dwian Andhika', '198311072010011021', '179714', 'Penata', 'III.c', 'Kepala Seksi Pelayanan Medis'),
(5, 'dr. R. Koesmedi Priharto, Sp.OT.M.Kes', '195808071987031007', '-', '-', '-', '-'),
(6, 'dr. Nailah, M.Si', '197710212006042025', '-', '-', 'III.c', '-'),
(7, 'Purnama Saragih', '196208191985022002', '123286', 'Penata Tk.1', 'III.d', 'Sanitarian Penyelia ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_eselon`
--

CREATE TABLE `master_eselon` (
  `id_eselon` int(50) NOT NULL,
  `nama_eselon` varchar(150) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_eselon`
--

INSERT INTO `master_eselon` (`id_eselon`, `nama_eselon`, `level`) VALUES
(23, 'I.a', '1'),
(24, 'I.b', '2'),
(25, 'II.a', '3'),
(26, 'II.b', '4'),
(27, 'III.a', '5'),
(28, 'III.b', '6'),
(29, 'IV.a', '7'),
(30, 'IV.b', '8'),
(31, 'V', '9'),
(32, '-', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_golongan`
--

CREATE TABLE `master_golongan` (
  `id_golongan` int(50) NOT NULL,
  `golongan` varchar(100) NOT NULL,
  `pangkat` text NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_golongan`
--

INSERT INTO `master_golongan` (`id_golongan`, `golongan`, `pangkat`, `level`) VALUES
(4, 'CPNS', 'Calon Pegawai Negeri Sipil', '18'),
(5, 'I/A', 'Juru Muda', '17'),
(6, 'I/B', 'Juru Muda Tingkat I', '16'),
(7, 'I/C', 'Juru', '15'),
(8, 'I/D', 'Juru Tingkat I', '14'),
(9, 'II/A', 'Pengatur Muda', '13'),
(10, 'II/B', 'Pengatur Muda Tk I', '12'),
(11, 'II/C', 'Pengatur', '11'),
(12, 'II/D', 'Pengatur Tingkat I', '10'),
(13, 'III/A', 'Penata Muda', '9'),
(14, 'III/B', 'Penata Muda Tk I', '8'),
(15, 'III/C', 'Penata', '7'),
(16, 'III/D', 'Penata Tingkat I', '6'),
(17, 'IV/A', 'Pembina', '5'),
(18, 'IV/B', 'Pembina Tingkat I', '4'),
(19, 'IV/C', 'Pembina Utama Muda', '3'),
(20, 'IV/D', 'Pembina Utama Madya', '2'),
(21, '-', '-', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_hukuman`
--

CREATE TABLE `master_hukuman` (
  `id_master_hukuman` int(50) NOT NULL,
  `nama_hukuman` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_hukuman`
--

INSERT INTO `master_hukuman` (`id_master_hukuman`, `nama_hukuman`) VALUES
(4, 'TEGURAN LISAN'),
(5, 'TEGURAN TERTULIS'),
(6, 'PERNYATAAN TAK PUAS TERTULIS'),
(7, 'PENUNDAAN KGB'),
(8, 'PENUNDAAN Kp'),
(9, 'PENURUNAN PANGKAT'),
(10, 'PEMBEBASAN DARI JABATAN'),
(11, 'PEMBERHENTIAN DENGAN HORMAT TAPS'),
(12, 'PEMBERHENTIAN TIDAK DENGAN HORMAT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_jabatan`
--

CREATE TABLE `master_jabatan` (
  `id_jabatan` int(50) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_jabatan`
--

INSERT INTO `master_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(2344, 'Direktur'),
(2345, 'Kepala Sub Bagian Tata Usaha'),
(2346, 'Kepala Seksi Penunjang Medis'),
(2347, 'Kepala Seksi Pelayanan Medis'),
(2348, 'Staf Teknis Tingkat Ahli'),
(2363, 'Perawat Umum'),
(2351, 'Sanitarian Penyelia'),
(2352, 'Nutrisionis Penyelia'),
(2372, 'Bendahara'),
(2354, 'Staf Teknis Tingkat Ahli'),
(2355, 'Bidan Pelaksana Lanjutan'),
(2356, 'Staf Administrasi Tingkat Terampil'),
(2357, 'Perawat Pertama'),
(2358, 'Perawat Pelaksana'),
(2359, 'Pranata Laboraturium Kesehatan Pelaksana Lanjutan'),
(2360, 'Perawat Pelaksana Lanjutan'),
(2361, 'Asisten Apoteker Pelaksana'),
(2362, 'Staf Operasional Tingkat Terampil'),
(2364, 'Apoteker'),
(2365, 'Dokter Umum'),
(2366, 'Dokter Spesialis'),
(2367, 'Fisioterapi'),
(2368, 'Cleaning Service'),
(2369, 'Security'),
(2373, 'Administrasi'),
(2371, 'Rekam Medis'),
(2374, 'Dokter Madya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_pelatihan`
--

CREATE TABLE `master_pelatihan` (
  `id_pelatihan` int(50) NOT NULL,
  `nama_pelatihan` varchar(150) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_pelatihan`
--

INSERT INTO `master_pelatihan` (`id_pelatihan`, `nama_pelatihan`, `level`) VALUES
(1, 'LEMHANNAS', '1'),
(2, 'SESPA', '2'),
(3, 'SESPASUS', '0'),
(4, 'SESKOAD', '0'),
(5, 'KM-III', '0'),
(6, 'SEPADYA', '3'),
(7, 'KM-IV', '0'),
(8, 'SEPALA', '4'),
(9, 'SEPADA', '0'),
(10, 'SESPUT', '0'),
(11, 'TARPADNAS', '0'),
(12, 'UJIAN DINAS TK I', '0'),
(13, 'UJIAN DINAS TK II', '0'),
(14, 'UJIAN DINAS TK III', '0'),
(15, 'SPATI', '1'),
(16, 'SPAMEN (DIKLATPIM TK.II)', '2'),
(17, 'SPAMA (DIKLATPIM TK.III)', '3'),
(18, 'ADUM (DIKLATPIM TK.IV)', '4'),
(19, 'EVALUASI & PELAPORAN', '0'),
(20, 'PENATARAN P4', '0'),
(21, 'ADMINISTRASI & KEUANGAN', '0'),
(22, 'ANALISA JABATAN', '0'),
(23, 'MATERIAL MANAGEMENT', '0'),
(24, 'NETWORK PLANNING', '0'),
(25, 'PENATARAN ATLAS', '0'),
(26, 'PENGAWASAN MELEKAT', '0'),
(27, 'P.T.K.', '0'),
(28, 'PROCUREMENT', '0'),
(29, 'MANAGEMENT PROYEK', '0'),
(30, 'SCREENING', '0'),
(31, 'PUBLIC ADMINISTRATION', '0'),
(32, 'ADMINISTRASI KEPEGAWAIAN', '0'),
(33, 'ADMINISTRASI PERKANTORAN', '0'),
(34, 'AKUNTANSI', '0'),
(35, 'ADMINISTRASI TEKNIS', '0'),
(36, 'ASPAL BETON', '0'),
(37, 'BAHASA INGGRIS', '0'),
(38, 'BENDAHARAWAN', '0'),
(39, 'BENDAHARAWAN', '0'),
(40, 'BREVET', '0'),
(41, 'BREVET A', '0'),
(42, 'BREVET B', '0'),
(43, 'BREVET C', '0'),
(44, 'DRAFTER REPRODUKSI GRAFIKA', '0'),
(45, 'DRAINASE', '0'),
(46, 'DRIVER', '0'),
(47, 'E & P', '0'),
(48, 'E & P IRIGASI', '0'),
(49, 'ENGINEERING & MANAGEMENT', '0'),
(50, 'GAMBAR', '0'),
(51, 'GROUND WATER MONITORING PROCEDURE', '0'),
(52, 'HIDROMETRI', '0'),
(53, 'INSTRUKTUR DIKLAT KEPENDUDUKAN', '0'),
(54, 'INSTRUKTUR MEKANIK', '0'),
(55, 'INSTRUKTUR MEKANIK & PERALATAN', '0'),
(56, 'INSTRUKTUR OPERATOR', '0'),
(57, 'INSTRUKTUR OPERATOR PERALATAN', '0'),
(58, 'INTERPRET FOTO UDARA', '0'),
(59, 'INVENTARISASI BARANG', '0'),
(60, 'IRIGASI SEDERHANA', '0'),
(61, 'JURU AIR', '0'),
(62, 'JURU UKUR', '0'),
(63, 'KADER TEKNIK TK C (OPSETER)', '0'),
(64, 'KEARSIPAN', '0'),
(65, 'KEINSTRUKTURAN', '0'),
(66, 'KOMPUTER', '0'),
(67, 'KEPROTOKOLAN', '0'),
(68, 'KESELAMATAN & KESEHATAN KERJA', '0'),
(69, 'KETERTIBAN & KEAMANAN', '0'),
(70, 'KOMPUTER BASIC', '0'),
(71, 'KOMPUTER FORTRAN', '0'),
(72, 'KOMPUTER INTRODUCTION', '0'),
(73, 'KOMPUTER PROGRAMMING', '0'),
(74, 'MANAGEMENT LOGISTIK', '0'),
(75, 'MANDOR/FOREMAN', '0'),
(76, 'MEKANIK', '0'),
(77, 'MEKANIK LAPANGAN', '0'),
(78, 'MEKANIK LISTRIK', '0'),
(79, 'MEKANIK UMUM', '0'),
(80, 'OPERATION RESEARCH', '0'),
(81, 'OPERATOR KOMPUTER', '0'),
(82, 'OPERATOR MEKANIK', '0'),
(83, 'PADAT KARYA GAYA BARU', '0'),
(84, 'PEJABAT INTI PROYEK', '0'),
(85, 'PEMADAM KEBAKARAN', '0'),
(86, 'PEMASANGAN BATA & PELESTERAN', '0'),
(87, 'PEMBINAAN HUKUM', '0'),
(88, 'PEMIMPIN PROYEK JALAN (PPJ)', '0'),
(89, 'PENGAMAT BID PENGAIRAN', '0'),
(90, 'PENGAWASAN BANGUNAN', '0'),
(91, 'PENGETAHUAN BARANG', '0'),
(92, 'PENGGUNAAN MESIN TIK IBM', '0'),
(93, 'PENINGKATAN PENGEMUDI', '0'),
(94, 'PENYIMPANAN & PENYALURAN', '0'),
(95, 'IKMN', '0'),
(96, 'PENYUSUNAN ANGGARAN', '0'),
(97, 'PERENC DETAIL KOTA', '0'),
(98, 'PERENC SOSIAL PENGEMBANGAN AREA', '0'),
(99, 'PERENC SOSIAL PENGEMBANGAN KOTA', '0'),
(100, 'PERINTIS PERBAIKAN PERUMAHAN KOTA', '0'),
(101, 'PRATUGAS BID BINA MARGA', '0'),
(102, 'PRATUGAS BID CIPTA KARYA', '0'),
(103, 'PRATUGAS BID PENGAIRAN', '0'),
(104, 'PRATUGAS PENGAWASAN', '0'),
(105, 'PRATUGAS PERENCANAAN', '0'),
(106, 'PROFFESIONAL STAFF', '0'),
(107, 'PROG PENGAWASAN TATA PENGAIRAN', '0'),
(108, 'PROG TEKNIK MENGGAMBAR', '0'),
(109, 'QUALITY CONTROL', '0'),
(110, 'SATPAM', '0'),
(111, 'SEISMOLOGI & TEKNOLOGI GEMPA', '0'),
(112, 'SINDER BID BM', '0'),
(113, 'SISTEM AKUNTANSI', '0'),
(114, 'SURVEY & MAPPING', '0'),
(115, 'TATA KEARSIPAN', '0'),
(116, 'TEKNIS PADAT KARYA GAYA BARU', '0'),
(117, 'TEKNOLOGI BETON', '0'),
(118, 'TEKNOLOGI GEMPA', '0'),
(119, 'TENAGA INTI', '0'),
(120, 'TENAGA PELAKSANA PEMBANGUNAN PERUMAHAN RAKYAT', '0'),
(121, 'UKUR TANAH', '0'),
(122, 'VERIFIKASI', '0'),
(123, 'UKUR TANAH & PEMETAAN', '0'),
(124, 'UKUR TANAH BID KE-AIR-AN', '0'),
(125, 'UKUR TANAH BID KE-BM-AN', '0'),
(126, 'UKUR TANAH BID KE-CK-AN', '0'),
(127, 'UKUR TANAH TK A/B', '0'),
(128, 'HYDROLOGY', '0'),
(129, 'LAND CAPABILITY EVALUATION', '0'),
(130, 'PLANNING & DESIGN', '0'),
(131, 'DESIGN OF SMALL HYDRAULIC STRUCTURES', '0'),
(132, 'IRRIGATION AND DRAINAGE LAYOUT', '0'),
(133, 'OVERVIEW OF PROJECT SELECTION THROUGH TH', '0'),
(134, 'REVIEW OF SSIMP STRUCTURE DESIGNS', '0'),
(135, 'MATHEMATICAL MODEL SIMULATION', '0'),
(136, 'SITE SELECTION-GROUND WATER', '0'),
(137, 'PENGAWASAN & PELAKSANAAN KONSTRUKSI', '0'),
(138, 'CONSTRUCTION SUPERVISION', '0'),
(139, 'WELL DESIGN & WELL CONSTRUCTION', '0'),
(140, 'CONSTRUCTION SUPERVISION TRAINING', '0'),
(141, 'LAB. TECHNICIAN TRAINING', '0'),
(142, 'KERJASAMA TEKNIK ANTAR NEGARA BERKEMBANG', '0'),
(143, 'INSTITUTIONAL DEVELOPMENT', '0'),
(144, 'WOMEN IN DEVELOPMENT', '0'),
(145, 'IRIGASI TAMBAK', '0'),
(146, 'O & M - AIR TANAH', '0'),
(147, 'O & M - IRIGASI', '0'),
(148, 'OPERATION & MAINTENANCE', '0'),
(149, 'WATER OPERATION CENTRE', '0'),
(150, 'OPERATION-ADVANCED OPERATION PROJECT', '0'),
(151, 'OPERATION-BUDGETTING', '0'),
(152, 'OPERATION-INTRODUCTION & MAINTENANCE', '0'),
(153, 'OPERATION-REQUIREMENT & MAINTENANCE', '0'),
(154, 'OPERATION-WATER DISTRIBUTION', '0'),
(155, 'INFORMATION FILM', '0'),
(156, 'KEY FARMERS', '0'),
(157, 'TRAINING IN FARM MACHINERY - OPERATORS', '0'),
(158, 'TRAINING OF ACTION GROUP', '0'),
(159, 'TRAINING OF FIELD GROUPS', '0'),
(160, 'WATER USE MANAGEMENT', '0'),
(161, 'INVENTARISASI LAPANGAN', '0'),
(162, 'PENELITIAN PENGAIRAN (PTGA)', '0'),
(163, 'PENGEMBANGAN POLA SOCIO-TECHNICAL ASSOSI', '0'),
(164, 'AGRICULTURAL DEVELOPMENT', '0'),
(165, 'ENUMERATOR TRAINING', '0'),
(166, 'TRAINING OF SURVEYORS', '0'),
(167, 'AGRO-ECONOMIC ANALYSIS', '0'),
(168, 'TEKNIK PANTAI', '0'),
(169, 'COASTAL ZONE MANAGEMENT', '0'),
(170, 'O & M - RAWA', '0'),
(171, 'KEAMANAN BENDUNGAN', '0'),
(172, 'OVERVIEW OF DAM DESIGN AND CONSTRUCTION', '0'),
(173, 'PERENCANAAN & PEMBUATAN PROGRAM', '0'),
(174, 'MANAJEMEN LALU LINTAS', '0'),
(175, 'KEAMANAN JALAN', '0'),
(176, 'KEBISINGAN LALULINTAS', '0'),
(177, 'KESELAMATAN JALAN RAYA', '0'),
(178, 'PENCEMARAN UDARA', '0'),
(179, 'PARKIR', '0'),
(180, 'PENAKSIRAN CEPAT PERGERAKAN DIPERKOTAAN', '0'),
(181, 'TANAH LEMBEK', '0'),
(182, 'PENINGKATAN KEMAMPUAN TEKNISI LABORATORIUM', '0'),
(183, 'PENGENDALIAN MUTU JALAN & JEMBATAN', '0'),
(184, 'PELAKSANAAN PEKERJAAN KONSTRUKSI JALAN', '0'),
(185, 'PELAKSANAAN PERCOBAAN PENGHAMPARAN ASPAL', '0'),
(186, 'PENANGGULANGAN EROSI LERENG JALAN', '0'),
(187, 'PENGAWAS PELAKSANA KONSTRUKSI JALAN', '0'),
(188, 'OPERATOR PERALATAN JALAN', '0'),
(189, 'PENANGANAN & PERAWATAN ALAT-ALAT KONSTR.', '0'),
(190, 'DRIVING/RIDING TRAINING', '0'),
(191, 'LEGGER JALAN', '0'),
(192, 'TATA CARA PENULISAN LAPORAN', '0'),
(193, 'PEMASYARAKATAN PRODUK HASIL PUSLITBANG', '0'),
(194, 'KOMPUTERISASI INVENTARISASI BAHAN JALAN', '0'),
(195, 'INTEGRASI KOMPUTERISASI LEGER JALAN', '0'),
(196, 'MODEL PROJECT-SEMINAR', '0'),
(197, 'METODOLOGI PENELITIAN', '0'),
(198, 'PENGGUNAAN ALAT FWD', '0'),
(199, 'PENGGUNAAN X-RAY FLOURESCENE', '0'),
(200, 'DAUR ULANG KONSTRUKSI PEKERJAAN JALAN', '0'),
(201, 'PENYEMPURNAAN STANDAR SPESIFIKASI ASPAL', '0'),
(202, 'PEMELIHARAAN RUTIN DAN BERKALA', '0'),
(203, 'PENDATAAN JALAN', '0'),
(204, 'HASIL PENELITIAN ASPAL KARET DILAPANGAN', '0'),
(205, 'DESAIN JEMBATAN', '0'),
(206, 'PERENCANAAN DAN PEMROGRAMAN JEMBATAN', '0'),
(207, 'PROSEDUR UMUM', '0'),
(208, 'GENERAL HIGHWAY COURSE', '0'),
(209, 'BRIDGE PLANNING & PROGRAMMING INSTRUCTOR', '0'),
(210, 'PLANNING & PROGRAMMING WORKSHOP', '0'),
(211, 'KONSTRUKSI EKSPANSION JOINT', '0'),
(212, 'INSPEKSI KONDISI JEMBATAN', '0'),
(213, 'PENGAWASAN PEMBANGUNAN JEMBATAN', '0'),
(214, 'KONSULTAN P3KT', '0'),
(215, 'PERKUATAN JEMBATAN', '0'),
(216, 'BRIDGE ROUTINE INSPECTION', '0'),
(217, 'BRIDGE CONSTRUCTION SUPERVISION', '0'),
(218, 'PEMELIHARAAN JEMBATAN', '0'),
(219, 'PEMELIHARAAN RUTIN & BERKALA JALAN KOTA', '0'),
(220, 'PENATAAN UNTUK TROUBLE SHOOTER', '0'),
(221, 'DESIMINASI KETATABANGUNAN', '0'),
(222, 'PENGELOLAAN & PEMANFAATAN GEDUNG NEGARA', '0'),
(223, 'KEPALA SEKSI BID.PERSAMPAHAN', '0'),
(224, 'TEKNOLOGI BANGUNAN BID PEMUKIMAN', '0'),
(225, 'LAB. BIDANG PENGUJIAN', '0'),
(226, 'MANAJEMEN PEMBANGUANAN KOTA DE', '0'),
(227, 'PEMANTAPAN MATERI TEKNIS PELATIHAN', '0'),
(228, 'PENATAAN RUANG DAERAH', '0'),
(229, 'PENATAAN RUANG', '0'),
(230, 'PENATAAN RUANG KOTA METROPOLITAN', '0'),
(231, 'PENATAAN RUANG TERBUKA UMUM', '0'),
(232, 'PENGEMBANGAN PROFESI PERENCANA', '0'),
(233, 'PENYIAPAN PROGRAM P3KT', '0'),
(234, 'MANAJEMEN KAWASAN PERKOTAAN', '0'),
(235, 'PENINGKATAN KEMAMPUAN TENAGA PENATAAN', '0'),
(236, 'PENATAAN RUANG KAWASAN PARIWISATA', '0'),
(237, 'LOKAKARYA P3KT BAGI STAF PROFESIONAL', '0'),
(238, 'PENATAAN RUANG KOTA METROPOLITAN', '0'),
(239, 'PENATAAN RUANG KOTA BARU', '0'),
(240, 'PRE COURSE IUDM', '0'),
(241, 'SISTIM INFORMASI GEOGRAFI', '0'),
(242, 'DESAIN JALAN/JEMBATAN', '0'),
(243, 'TRAINING TEHNIK KOMUNIKASI', '0'),
(244, 'COMUNICATION SAMS', '0'),
(245, 'TATA KEARSIPAN DAN PERSURATAN', '0'),
(246, 'TATALAKSANA ADMINISTRASI', '0'),
(247, 'KESEKRETARIATAN', '0'),
(248, 'PENGELOLAAN ARSIP AKTIF', '0'),
(249, 'PENYEGARAN SATPAM', '0'),
(250, 'MANAJEMEN PERKANTORAN', '0'),
(251, 'INFORMASI & KOMUNIKASI', '0'),
(252, 'KEHUMASAN', '0'),
(253, 'OPERATOR TELEX', '0'),
(254, 'PENINGKATAN KEMAMPUAN BAHASA INGGRIS', '0'),
(255, 'DHARMA WANITA CONVERSATION CLASS', '0'),
(256, 'ENGLISH FOR INKINDO ENGINEERS', '0'),
(257, 'ENGLISH FOR INTERNATIONAL COOPERATION', '0'),
(258, 'ENGLISH LEVEL II', '0'),
(259, 'ENGLISH LEVEL III', '0'),
(260, 'KETERAMPILAN PEGAWAI/ BAHASA INGGRIS', '0'),
(261, 'BPBLAV', '0'),
(262, 'TRAINING OF TRAINERS', '0'),
(263, 'TEKNIK KEINSTRUKTURAN', '0'),
(264, 'INSTRUKTUR', '0'),
(265, 'TEKNIK INSTRUKSIONAL I', '0'),
(266, 'TOT FOR ENGLISH TEACHERS', '0'),
(267, 'PENGEMBANGAN KURIKULUM DAN MEDIA', '0'),
(268, 'CURRICULUM DEVELOPMENT', '0'),
(269, 'AUDIO VISUAL', '0'),
(270, 'MANAJEMEN PELATIHAN', '0'),
(271, 'INDONESIA TRAINING NETWORK (INTN)', '0'),
(272, 'PENYEGARAN PEDIKPROP', '0'),
(273, 'MONITORING DAN EVALUASI DIKLAT', '0'),
(274, 'MANAJEMEN DIKLAT', '0'),
(275, 'RENCANA DIKLAT DAERAH', '0'),
(276, 'MANAJEMEN KOMPUTER', '0'),
(277, 'PERPUSTAKAAN', '0'),
(278, 'MANAGEMENT INFORMATION SYSTEMS', '0'),
(279, 'PENGINDRAAN JAUH & SIST INFO GEOGRAFI', '0'),
(280, 'BENDAHARAWAN PENERIMA', '0'),
(281, 'MANAJEMEN KEUANGAN', '0'),
(282, 'TATA USAHA ADMINISTRASI KEUANGAN', '0'),
(283, 'PEMBUKUAN & PENYUSUNAN LAPORAN KEUANGAN', '0'),
(284, 'FINANCIAL MANAGEMENT', '0'),
(285, 'CARA PENGADAAN KONSULTAN', '0'),
(286, 'PENGADAAN JASA KONSTRUKSI', '0'),
(287, 'PENGADAAN BARANG DAN JASA KONSULTAN', '0'),
(288, 'BIMBINGAN TEKNIS IKMN', '0'),
(289, 'MANAJEMEN PERALATAN', '0'),
(290, 'PENGADAAN BARANG', '0'),
(291, 'MANAJEMEN AUDIT', '0'),
(292, 'ADMINISTRASI BANTUAN LUAR NEGERI', '0'),
(293, 'ABLN', '0'),
(294, 'PENYULUHAN ADM. PINJAMAN LUAR NEGERI', '0'),
(295, 'MANAGEMENT DEVELOPMENT', '0'),
(296, 'PERENCANAAN TENAGA KERJA', '0'),
(297, 'PSYKOLOGI TERAPAN', '0'),
(298, 'SISTEM PENILAIAN PERFORMANCE PEGAWAI', '0'),
(299, 'SIST PEMBGN. KARIER & PENGKAJIAN KINERJA', '0'),
(300, 'KESEHATAN DAN KESELAMATAN KERJA', '0'),
(301, 'MANPOWER PLANNING INFORMATION SYSTEM', '0'),
(302, 'COORDINATION OF PLANNING & PROGRAMMING', '0'),
(303, 'MANAJEMEN PROYEK', '0'),
(304, 'PEMIMPIN PROYEK FISIK/P3F', '0'),
(305, 'TECHNICAL ASPECTS OF PROJECT MANAGEMENT', '0'),
(306, 'MANAJEMEN SKILL DAN DINAMIKA KELOMPOK', '0'),
(307, 'PRAJABATAN UMUM TINGKAT I', '0'),
(308, 'PRAJABATAN UMUM TINGKAT II', '0'),
(309, 'ASPEK HUKUM', '0'),
(310, 'PRAJABATAN UMUM TINGKAT III', '0'),
(311, 'TATA CARA PEMAKAIAN STANDAR BIDANG PU', '0'),
(312, 'INFORMASI TENTANG PTUN', '0'),
(313, 'HUKUM PERBURUHAN', '0'),
(314, 'PENERAPAN HUKUM & PERUNDANG-UNDANGAN', '0'),
(315, 'KOLOKIUM HASIL PENELITIAN & PENGEMBANGAN', '0'),
(316, 'PERENCANAAN PENANGGULANGAN BENCANA ALAM', '0'),
(317, 'PREPARATION OF TENDER DOCUMENTS', '0'),
(318, 'PROSEDUR TENDER', '0'),
(319, 'GAMBAR & ANGGARAN', '0'),
(320, 'GRAFIKA', '0'),
(321, 'TEKNIK GAMBAR & ANGGARAN', '0'),
(322, 'INSTRUKTUR WORKSHOP P3KT', '0'),
(323, 'ASISTEN TEKNISI LABORATORIUM', '0'),
(324, 'TEKNISI LABORATORIUM & REKAYASA', '0'),
(325, 'PENGAWAS LAPANGAN', '0'),
(326, 'TRAINING JOB SITE (OECF)', '0'),
(327, 'VALUE CONTROL', '0'),
(328, 'QUALITY SURVEYOR', '0'),
(329, 'SUPERVISI KONSTRUKSI', '0'),
(330, 'KETERAMPILAN MEKANIK', '0'),
(331, 'KETERAMPILAN OPERATOR', '0'),
(332, 'KETERAMPILAN OPERATOR DUMP TRUCK', '0'),
(333, 'MEKANIK DASAR', '0'),
(334, 'SIMKA', '0'),
(335, 'PENINGKATAN MEKANIK OPERATOR BUMAR WHEEL', '0'),
(336, 'PENINGKATAN MEKANIK STONE CRUSHER', '0'),
(337, 'BAHAN BANGUNAN DAN LABORATORIUM', '0'),
(338, 'PENINGKATAN LABORATORIUM', '0'),
(339, 'PENGUJIAN BAHAN (LABORATORIUM)', '0'),
(340, 'PENANGGULANGAN PENDERITA GAWAT DARURAT', '0'),
(341, 'PAKET STATISTIK', '0'),
(342, 'PENCEGAHAN BAHAYA KEBAKARAN', '0'),
(343, 'ANALISA DAMPAK LINGKUNGAN', '0'),
(344, 'STONE COLOUMN SEBAGAI REDUKSI PENURUNAN', '0'),
(345, 'SIMD UNTUK MANAJER', '0'),
(346, 'SIMD UNTUK OPERATOR', '0'),
(347, 'TRAINING LABORAN', '0'),
(348, 'FUNGSI PENGT.BID.KE-PU-AN', '0'),
(349, 'PENINGK.FUNGSI.PENGAT.BID.KE-PU-AN', '0'),
(350, 'PENGEMBANGAN SISTEM PERENC & KARIER', '0'),
(351, 'BIMBINGAN TEKNIK HUKUM', '0'),
(352, 'TEKNIK PELAKS. PROG. BUDAYA KERJA', '0'),
(353, 'TEKNIK PENYUSUNAN PEDOMAN KERJA', '0'),
(354, 'PEMBINAAN TEKNIS PASCA GEMPA', '0'),
(355, 'PENANGANAN TEKNIS BID.PERSAMPAHAN', '0'),
(356, 'APPLIED ENGINEERING', '0'),
(357, 'TEKNIS PENGT. PENATAAN BANGUNAN', '0'),
(358, 'TEKNIS PENGELOLAAN ADM. LAN', '0'),
(359, 'SINKRONISASI PERENCANAAN DAN PROGRAM', '0'),
(360, 'DESIMINASI TATACARA APLK.KEU.PROYEK', '0'),
(361, 'PENGELOLAAN ADMINISTRASI PROYEK', '0'),
(362, 'MANAJEMEN KONSTRUKSI PENGAIRAN', '0'),
(363, 'INSTRUKTUR TATAGUNA AIR', '0'),
(364, 'PENGAWAS UTAMA', '0'),
(365, 'PROGRAM D.III DALAM NAGERI', '0'),
(366, 'PROGRAM D.IV', '0'),
(367, 'PROGRAM S1 DALAM NEGERI', '0'),
(368, 'PROGRAM S2 DALAM NEGERI', '0'),
(369, 'PROGRAM S3 DALAM NEGERI', '0'),
(370, 'SIM KLN', '0'),
(371, 'PEMERIKSAAN PROGRAM/KOMPREHENSHIF', '0'),
(372, 'STANDARD PENGADAAN BARANG DAN JASA', '0'),
(373, 'PENINGK.FUNGSI PEL.TUGAS BID.KE-PU-AN', '0'),
(374, 'DASAR KEARSIPAN', '0'),
(375, 'MANAJEMEN PERPUSTAKAAN', '0'),
(376, 'APRESIASI PUSDOKINFO', '0'),
(377, 'OVERSEAS TRAINING LUAR NEGERI', '0'),
(378, 'ELECTRICAL INSTALLATION & INSTRUMENT', '0'),
(379, 'WATER SUPPLY MASTER PLANNING', '0'),
(380, 'WATER SUPPLY MANAGEMENT', '0'),
(381, 'WATER TREATMENT FACILITY PLAN & DESIGN', '0'),
(382, 'DISTRIBUTION SYSTEM PLANNING & DESIGN', '0'),
(383, 'WATER PURIFICATION', '0'),
(384, 'MAINTENANCE OF PIPELINE', '0'),
(385, 'LEAKAGE CONTROL', '0'),
(386, 'PENINGKATAN KOORDINASI PERENCANAAN', '0'),
(387, 'SINKRONISASI PROGRAM', '0'),
(388, 'AIR LIMBAH', '0'),
(389, 'MECHANICAL INSTALLATION', '0'),
(390, 'BIDANG PERSAMPAHAN', '0'),
(391, 'ORGANISASI & MANAJEMEN', '0'),
(392, 'PERSYARATAN JABATAN', '0'),
(393, 'TEKNIS KEPEGAWAIAN', '0'),
(394, '-', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_pendidikan`
--

CREATE TABLE `master_pendidikan` (
  `id_pendidikan` int(50) NOT NULL,
  `nama_pendidikan` varchar(150) NOT NULL,
  `jurusan` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_pendidikan`
--

INSERT INTO `master_pendidikan` (`id_pendidikan`, `nama_pendidikan`, `jurusan`) VALUES
(1, 'SD', '-'),
(2, 'SMP', '-'),
(3, 'SMA', '-'),
(4, 'SMK', '-'),
(5, 'DI', '-'),
(6, 'DII', '-'),
(7, 'DIII', '-'),
(8, 'DIV', '-'),
(9, 'S1', '-'),
(10, 'S2', '-'),
(11, 'S3', '-'),
(251, 'PROFESI', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_penghargaan`
--

CREATE TABLE `master_penghargaan` (
  `id_penghargaan` int(50) NOT NULL,
  `nama_penghargaan` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_penghargaan`
--

INSERT INTO `master_penghargaan` (`id_penghargaan`, `nama_penghargaan`) VALUES
(1, 'BINTANG REPUBLIK INDONESIA'),
(2, 'BINTANG REPUBLIK INDONESIA ADIPURNA'),
(3, 'BINTANG REPUBLIK INDONESIA ADIPRADANA'),
(4, 'BINTANG REPUBLIK INDONESIA UTAMA'),
(5, 'BINTANG REPUBLIK INDONESIA PRATAMA'),
(6, 'BINTANG REPUBLIK INDONESIA NARARYA'),
(7, 'BINTANG MAHAPUTERA'),
(8, 'BINTANG MAHAPUTERA ADIPURNA'),
(9, 'BINTANG MAHAPUTERA ADIPRADANA'),
(10, 'BINTANG MAHAPUTERA UTAMA'),
(11, 'BINTANG MAHAPUTERA PRATAMA'),
(12, 'BINTANG MAHAPUTERA NARARYA'),
(13, 'BINTANG JASA'),
(14, 'BINTANG JASA UTAMA'),
(15, 'BINTANG JASA PRATAMA'),
(16, 'BINTANG JASA NARARYA'),
(17, 'BINTANG YUDHA DHARMA'),
(18, 'BINTANG YUDHA DHARMA UTAMA'),
(19, 'BINTANG YUDHA DHARMA PRATAMA'),
(20, 'BINTANG YUDHA DHARMA NARARYA'),
(21, 'BINTANG KARTIKA EKA PAKSI'),
(22, 'BINTANG KARTIKA EKA PAKSI UTAMA'),
(23, 'BINTANG KARTIKA EKA PAKSI PRATAMA'),
(24, 'BINTANG KARTIKA EKA PAKSI NARARYA'),
(25, 'BINTANG JALASENA'),
(26, 'BINTANG JALASENA UTAMA'),
(27, 'BINTANG JALASENA PRATAMA'),
(28, 'BINTANG JALASENA NARARYA'),
(29, 'BINTANG SWA BHUWANA PAKSA'),
(30, 'BINTANG SWA BHUWANA PAKSA UTAMA'),
(31, 'BINTANG SWA BHUWANA PAKSA PRATAMA'),
(32, 'BINTANG SWA BHUWANA PAKSA NARARYA'),
(33, 'BINTANG BHAYANGKARA'),
(34, 'BINTANG BHAYANGKARA UTAMA'),
(35, 'BINTANG BHAYANGKARA PRATAMA'),
(36, 'BINTANG BHAYANGKARA NARARYA'),
(37, 'BINTANG GARUDA'),
(38, 'BINTANG SEWINDU ANGKATAN PERANG RI'),
(39, 'SATYALANCANA BHAKTI'),
(40, 'SATYALANCANA TELADAN'),
(41, 'SATYALANCANA KESETIAAN'),
(42, 'SATYALANCANA KESETIAAN 8 TAHUN'),
(43, 'SATYALANCANA KESETIAAN 16 TAHUN'),
(44, 'SATYALANCANA KESETIAAN 24 TAHUN'),
(45, 'SATYALANCANA PERANG KEMERDEKAAN'),
(46, 'SATYALANCANA PERANG KEMERDEKAAN KELAS I'),
(47, 'SATYALANCANA PERANG KEMERDEKAAN KELAS II'),
(48, 'SATYALANCANA SAPTAMARGA'),
(49, 'SATYALANCANA GOM'),
(50, 'SATYALANCANA GOM KELAS I'),
(51, 'SATYALANCANA GOM KELAS II'),
(52, 'SATYALANCANA GOM KELAS III'),
(53, 'SATYALANCANA GOM KELAS IV'),
(54, 'SATYALANCANA GOM KELAS V'),
(55, 'SATYALANCANA GOM KELAS VI'),
(56, 'SATYALANCANA GOM KELAS VII'),
(57, 'SATYALANCANA GOM KELAS VIII'),
(58, 'SATYALANCANA GOM KELAS IX'),
(59, 'SATYALANCANA PERINTIS PERGERAKAN KEMERDEKAAN'),
(60, 'SATYALANCANA PERINGATAN PERJUANGAN KEMERDEKAAN'),
(61, 'SATYALANCANA PEMBANGUNAN'),
(62, 'SATYALANCANA KARYA SATYA'),
(63, 'SATYALANCANA KARYA SATYA KELAS I'),
(64, 'SATYALANCANA KARYA SATYA KELAS II'),
(65, 'SATYALANCANA KARYA SATYA KELAS III'),
(66, 'SATYALANCANA KARYA SATYA KELAS IV'),
(67, 'SATYALANCANA KARYA SATYA KELAS V'),
(68, 'SATYALANCANA KARYA SATYA XXX TAHUN'),
(69, 'SATYALANCANA KARYA SATYA XX TAHUN'),
(70, 'SATYALANCANA KARYA SATYA X TAHUN'),
(71, 'SATYALANCANA KEBAKTIAN SOSIAL'),
(72, 'SATYALANCANA KEBUDAYAAN'),
(73, 'SATYALANCANA JASA DHARMA ANGKATAN LAUT'),
(74, 'SATYALANCANA SATYA DASA WARSA POLRI'),
(75, 'SATYALANCANA JANA UTAMA'),
(76, 'SATYALANCANA KSATRYA TAMTAMA'),
(77, 'SATYALANCANA KARYA BHAKTI'),
(78, 'SATYALANCANA PRASETYA PANCA WARSA'),
(79, 'SATYALANCANA KEAMANAN'),
(80, 'SATYALANCANA WIRA KARYA'),
(81, 'SATYALANCANA SATYA DHARMA'),
(82, 'SATYALANCANA WIRA DHARMA'),
(83, 'SATYALANCANA YUDHA UTAMA KKO-AL'),
(84, 'SATYALANCANA YUDHA UTAMA KKO-AL KELAS I'),
(85, 'SATYALANCANA YUDHA UTAMA KKO-AL KELAS II'),
(86, 'SATYALANCANA DWIYA SISTHA'),
(87, 'SATYALANCANA PENEGAK'),
(88, 'SATYALANCANA PEPERA'),
(89, 'PIAGAM SATYA KARYA'),
(90, 'PIAGAM SATYA KARYA 20 TAHUN'),
(91, 'PIAGAM SATYA KARYA 30 TAHUN'),
(92, 'PIAGAM PENGHARGAAN ATAS JASA KHUSUS TEK.KEKARYAAN'),
(93, 'PIAGAM PENGHARGAAN TELADAN'),
(94, 'PIAGAM PENGHARGAAN TELADAN KEPEMIMPINAN'),
(95, 'PIAGAM PENGHARGAAN TELADAN KEPEGAWAIAN'),
(96, 'PIAGAM PENGHARGAAN TELADAN PELAK. TUGAS'),
(97, 'PIAGAM PENGHARGAAN ANUMERTA'),
(98, 'PIAGAM PENGHARGAAN KHUSUS'),
(99, 'SATYALANCANA SANTI DHARMA'),
(100, 'SATYALANCANA SEROJA'),
(101, 'SATYALANCANA PENDIDIKAN'),
(102, 'NUGRAHA SAKANTI JANA UTAMA'),
(103, 'NUGRAHA SAKANTI KSATRYA TAMTAMA'),
(104, 'NUGRAHA SAKANTI KARYA BHAKTI'),
(105, 'SAM KARYA NUGRAHA'),
(106, 'PRASAMYA PURNAKARYA NUGRAHA'),
(107, 'BINTANG SAKTI'),
(108, 'BINTANG DHARMA'),
(109, 'BINTANG GERILYA'),
(110, 'BINTANG BUDAYA PARAMA DHARMA'),
(111, 'SATYALANCANA PERISTIWA'),
(112, 'LAIN-LAIN'),
(113, '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_status_jabatan`
--

CREATE TABLE `master_status_jabatan` (
  `id_status_jabatan` int(50) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_status_jabatan`
--

INSERT INTO `master_status_jabatan` (`id_status_jabatan`, `nama_jabatan`) VALUES
(2, 'STRUKTURAL'),
(3, 'DPK'),
(4, 'DPB'),
(5, 'DITUGASKAN'),
(6, 'FUNGSIONAL'),
(7, '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_status_pegawai`
--

CREATE TABLE `master_status_pegawai` (
  `id_status_pegawai` int(50) NOT NULL,
  `nama_status` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_status_pegawai`
--

INSERT INTO `master_status_pegawai` (`id_status_pegawai`, `nama_status`) VALUES
(1, 'MENINGGAL DUNIA'),
(2, 'OUTSOURCING'),
(3, 'HONORER'),
(4, 'CPNS PUSAT'),
(5, 'PNS PUSAT'),
(6, 'CPNS DAERAH'),
(7, 'PNS DAERAH'),
(8, 'ABRI'),
(9, 'PENSIUN'),
(10, 'BERHENTI/PINDAH'),
(12, '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_unit_kerja`
--

CREATE TABLE `master_unit_kerja` (
  `id_unit_kerja` int(50) NOT NULL,
  `nama_unit_kerja` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_unit_kerja`
--

INSERT INTO `master_unit_kerja` (`id_unit_kerja`, `nama_unit_kerja`) VALUES
(1, 'DOKTER SPESIALIS'),
(2, 'DOKTER UMUM POLI'),
(31, 'RUANG BERSALIN'),
(32, 'FARMASI'),
(33, 'INSTALASI GIZI'),
(34, 'LOKET'),
(239, 'KASIR'),
(249, 'KEPEGAWAIAN'),
(250, 'SECURITY'),
(251, 'KESLING'),
(252, 'KEUANGAN'),
(253, 'ADMISI'),
(254, 'RM'),
(255, 'ADMINISTRASI'),
(256, 'SEKERTARIS'),
(257, 'LABORATURIUM'),
(258, 'POLI RAWAT JALAN'),
(259, 'PERAWAT IGD'),
(260, 'JENAZAH'),
(261, 'DRIVER'),
(262, 'RAWAT INAP'),
(265, 'APOTEKER'),
(264, 'RUMAH SAKIT UMUM DAERAH CILINCING'),
(266, 'ASISTEN APOTEKER'),
(267, 'CLEANING SERVICE'),
(268, 'RADIOLOGI'),
(269, 'RADIOLOGI'),
(270, 'KEPALA SESKSI PENUNJANG MEDIS'),
(271, 'KEPALA SUB BAGIAN TATA USAHA'),
(272, 'KEPALA SEKSI PELAYANAN MEDIS'),
(273, 'REKAM MEDIS'),
(274, 'DOKTER UMUM IGD'),
(275, 'RSUD Cilincing'),
(276, 'PENGADAAN BARANG DAN JASA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile_rs`
--

CREATE TABLE `profile_rs` (
  `id_profile` int(11) NOT NULL,
  `nama_rs` varchar(125) NOT NULL,
  `alamat_rs` text NOT NULL,
  `no_telpon` varchar(45) NOT NULL,
  `email` varchar(125) NOT NULL,
  `tanggal_berdiri` date NOT NULL,
  `logo` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `profile_rs`
--

INSERT INTO `profile_rs` (`id_profile`, `nama_rs`, `alamat_rs`, `no_telpon`, `email`, `tanggal_berdiri`, `logo`) VALUES
(1, 'Rumah Sakit Umum Daerah Cilincing', 'Jl. Madya Kebantenan No.4\r\nKel. Semper Timur \r\nKec. Cilincing \r\nJakarta Utara 14130', '(021) 4412889', 'rsukcilincing@gmail.com', '2015-02-03', 'logo_baru.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_tunjangan`
--

CREATE TABLE `status_tunjangan` (
  `id_pendidikan` int(11) NOT NULL,
  `masa_kerja` int(2) NOT NULL,
  `status` varchar(20) NOT NULL,
  `sd` int(8) NOT NULL,
  `smp` int(8) NOT NULL,
  `slta_smk_smkf` int(8) NOT NULL,
  `smk` int(11) NOT NULL,
  `smkf` int(11) NOT NULL,
  `d4` int(11) NOT NULL,
  `d3_d4` int(8) NOT NULL,
  `s1` int(8) NOT NULL,
  `profesi` int(8) NOT NULL,
  `s3` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status_tunjangan`
--

INSERT INTO `status_tunjangan` (`id_pendidikan`, `masa_kerja`, `status`, `sd`, `smp`, `slta_smk_smkf`, `smk`, `smkf`, `d4`, `d3_d4`, `s1`, `profesi`, `s3`) VALUES
(1, 2, 'Menikah Anak-2', 3100000, 3720000, 4340000, 4340000, 4340000, 4650000, 4650000, 4960000, 5270000, 5580000),
(2, 2, 'Menikah Anak-1', 3045614, 3654736, 4263859, 4263859, 4263859, 4568421, 4568421, 4872982, 5177543, 5482105),
(3, 2, 'Menikah Anak-0', 2991228, 3263157, 3807017, 3807017, 3807017, 4078947, 4078947, 4350877, 4622807, 4894736),
(4, 2, 'Single', 2719298, 3263157, 3807017, 3807017, 3807017, 4078947, 4078947, 4350877, 4622807, 4894736),
(5, 4, 'Menikah Anak-2', 3177500, 3813000, 4448500, 4448500, 4448500, 4766250, 4766250, 5084000, 5401750, 5719500),
(6, 4, 'Menikah Anak-1', 3121754, 3746105, 4370456, 4370456, 4370456, 4682631, 4682631, 4994807, 5306982, 5619157),
(7, 4, 'Menikah Anak-0', 3066008, 3679210, 4292412, 4292412, 4292412, 4599013, 4599013, 4905614, 5212214, 5518815),
(8, 4, 'Single', 2787280, 3344736, 3902192, 3902192, 3902192, 4180921, 4180921, 4459649, 4738377, 5017105),
(9, 6, 'Menikah Anak-2', 3256938, 3908325, 4559713, 4559713, 4559713, 4885406, 4885406, 5211100, 5536794, 5862488),
(10, 6, 'Menikah Anak-1', 3199798, 3839757, 4479718, 4479718, 4479718, 4799697, 4799697, 5119677, 5439657, 5759637),
(11, 6, 'Menikah Anak-0', 3142659, 3771190, 4399723, 4399723, 4399723, 4713988, 4713988, 5028254, 5342520, 5656786),
(12, 6, 'Single', 2856963, 3428355, 3999748, 3999748, 3999748, 4285443, 4285443, 4571140, 4856836, 5142533),
(13, 8, 'Menikah Anak-2', 3338361, 4006033, 4673705, 4673705, 4673705, 5007541, 5007541, 5341378, 5675214, 6009050),
(14, 8, 'Menikah Anak-1', 3279793, 3935751, 4591710, 4591710, 4591710, 4919690, 4919690, 5247669, 5575648, 5903628),
(15, 8, 'Menikah Anak-0', 3221225, 3865471, 4509716, 4509716, 4509716, 4831837, 4831837, 5153961, 5476083, 5798206),
(16, 8, 'Single', 2928386, 3514064, 4099742, 4099742, 4099742, 4392579, 4392579, 4685419, 4978257, 5271096),
(17, 10, 'Menikah Anak-2', 3421820, 4106184, 4790548, 4790548, 4790548, 5132730, 5132730, 5474912, 5817094, 6159276),
(18, 10, 'Menikah Anak-1', 3361788, 4034145, 4706503, 4706503, 4706503, 5042682, 5042682, 5378860, 5715039, 6051218),
(19, 10, 'Menikah Anak-0', 3301756, 3962107, 4622458, 4622458, 4622458, 4952634, 4952634, 5282809, 5612985, 5943161),
(20, 10, 'Single', 3001596, 3601915, 4202235, 4202235, 4202235, 4502394, 4502394, 4802554, 5102714, 5402873);

-- --------------------------------------------------------

--
-- Struktur untuk view `chart_jenis_kelamin`
--
DROP TABLE IF EXISTS `chart_jenis_kelamin`;

CREATE ALGORITHM=UNDEFINED DEFINER=`rsudcilincing`@`localhost` SQL SECURITY DEFINER VIEW `chart_jenis_kelamin`  AS  select count(`data_pegawai`.`jenis_kelamin`) AS `total`,`data_pegawai`.`jenis_kelamin` AS `jenis_kelamin`,`data_pegawai`.`unit_kerja` AS `unit_kerja` from `data_pegawai` where (`data_pegawai`.`jenis_kelamin` = 'P') group by `data_pegawai`.`unit_kerja` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `chart_jenis_kelamin2`
--
DROP TABLE IF EXISTS `chart_jenis_kelamin2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`rsudcilincing`@`localhost` SQL SECURITY DEFINER VIEW `chart_jenis_kelamin2`  AS  select count(`data_pegawai`.`jenis_kelamin`) AS `total`,`data_pegawai`.`jenis_kelamin` AS `jenis_kelamin`,`data_pegawai`.`unit_kerja` AS `unit_kerja` from `data_pegawai` where (`data_pegawai`.`jenis_kelamin` = 'L') group by `data_pegawai`.`unit_kerja` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_cuti`
--
ALTER TABLE `data_cuti`
  ADD PRIMARY KEY (`id_cuti`);

--
-- Indexes for table `data_hukuman`
--
ALTER TABLE `data_hukuman`
  ADD PRIMARY KEY (`id_hukuman`);

--
-- Indexes for table `data_jabatan`
--
ALTER TABLE `data_jabatan`
  ADD PRIMARY KEY (`id_riwayat_jabatan`);

--
-- Indexes for table `data_keluarga`
--
ALTER TABLE `data_keluarga`
  ADD PRIMARY KEY (`id_data_keluarga`);

--
-- Indexes for table `data_kirim_pesan`
--
ALTER TABLE `data_kirim_pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_kuota_cuti`
--
ALTER TABLE `data_kuota_cuti`
  ADD PRIMARY KEY (`id_kuota`);

--
-- Indexes for table `data_mou`
--
ALTER TABLE `data_mou`
  ADD PRIMARY KEY (`id_mou`);

--
-- Indexes for table `data_pegawai`
--
ALTER TABLE `data_pegawai`
  ADD PRIMARY KEY (`id_data_pegawai`);

--
-- Indexes for table `data_pelatihan`
--
ALTER TABLE `data_pelatihan`
  ADD PRIMARY KEY (`id_data_pelatihan`);

--
-- Indexes for table `data_pendidikan`
--
ALTER TABLE `data_pendidikan`
  ADD PRIMARY KEY (`id_data_pendidikan`);

--
-- Indexes for table `data_penghargaan`
--
ALTER TABLE `data_penghargaan`
  ADD PRIMARY KEY (`id_data_penghargaan`);

--
-- Indexes for table `data_rs`
--
ALTER TABLE `data_rs`
  ADD PRIMARY KEY (`id_rs`);

--
-- Indexes for table `data_surat_cuti`
--
ALTER TABLE `data_surat_cuti`
  ADD PRIMARY KEY (`id_srt_cuti`);

--
-- Indexes for table `master_atasan`
--
ALTER TABLE `master_atasan`
  ADD PRIMARY KEY (`id_atasan`);

--
-- Indexes for table `master_eselon`
--
ALTER TABLE `master_eselon`
  ADD PRIMARY KEY (`id_eselon`);

--
-- Indexes for table `master_golongan`
--
ALTER TABLE `master_golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indexes for table `master_hukuman`
--
ALTER TABLE `master_hukuman`
  ADD PRIMARY KEY (`id_master_hukuman`);

--
-- Indexes for table `master_jabatan`
--
ALTER TABLE `master_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `master_pelatihan`
--
ALTER TABLE `master_pelatihan`
  ADD PRIMARY KEY (`id_pelatihan`);

--
-- Indexes for table `master_pendidikan`
--
ALTER TABLE `master_pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `master_penghargaan`
--
ALTER TABLE `master_penghargaan`
  ADD PRIMARY KEY (`id_penghargaan`);

--
-- Indexes for table `master_status_jabatan`
--
ALTER TABLE `master_status_jabatan`
  ADD PRIMARY KEY (`id_status_jabatan`);

--
-- Indexes for table `master_status_pegawai`
--
ALTER TABLE `master_status_pegawai`
  ADD PRIMARY KEY (`id_status_pegawai`);

--
-- Indexes for table `master_unit_kerja`
--
ALTER TABLE `master_unit_kerja`
  ADD PRIMARY KEY (`id_unit_kerja`);

--
-- Indexes for table `profile_rs`
--
ALTER TABLE `profile_rs`
  ADD PRIMARY KEY (`id_profile`);

--
-- Indexes for table `status_tunjangan`
--
ALTER TABLE `status_tunjangan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_cuti`
--
ALTER TABLE `data_cuti`
  MODIFY `id_cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;
--
-- AUTO_INCREMENT for table `data_hukuman`
--
ALTER TABLE `data_hukuman`
  MODIFY `id_hukuman` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `data_jabatan`
--
ALTER TABLE `data_jabatan`
  MODIFY `id_riwayat_jabatan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `data_keluarga`
--
ALTER TABLE `data_keluarga`
  MODIFY `id_data_keluarga` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `data_kirim_pesan`
--
ALTER TABLE `data_kirim_pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `data_kuota_cuti`
--
ALTER TABLE `data_kuota_cuti`
  MODIFY `id_kuota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `data_mou`
--
ALTER TABLE `data_mou`
  MODIFY `id_mou` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `data_pegawai`
--
ALTER TABLE `data_pegawai`
  MODIFY `id_data_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1851;
--
-- AUTO_INCREMENT for table `data_pelatihan`
--
ALTER TABLE `data_pelatihan`
  MODIFY `id_data_pelatihan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `data_pendidikan`
--
ALTER TABLE `data_pendidikan`
  MODIFY `id_data_pendidikan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `data_penghargaan`
--
ALTER TABLE `data_penghargaan`
  MODIFY `id_data_penghargaan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `data_rs`
--
ALTER TABLE `data_rs`
  MODIFY `id_rs` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `data_surat_cuti`
--
ALTER TABLE `data_surat_cuti`
  MODIFY `id_srt_cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `master_atasan`
--
ALTER TABLE `master_atasan`
  MODIFY `id_atasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `master_eselon`
--
ALTER TABLE `master_eselon`
  MODIFY `id_eselon` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `master_golongan`
--
ALTER TABLE `master_golongan`
  MODIFY `id_golongan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `master_hukuman`
--
ALTER TABLE `master_hukuman`
  MODIFY `id_master_hukuman` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `master_jabatan`
--
ALTER TABLE `master_jabatan`
  MODIFY `id_jabatan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2375;
--
-- AUTO_INCREMENT for table `master_pelatihan`
--
ALTER TABLE `master_pelatihan`
  MODIFY `id_pelatihan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=395;
--
-- AUTO_INCREMENT for table `master_pendidikan`
--
ALTER TABLE `master_pendidikan`
  MODIFY `id_pendidikan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=395;
--
-- AUTO_INCREMENT for table `master_penghargaan`
--
ALTER TABLE `master_penghargaan`
  MODIFY `id_penghargaan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
--
-- AUTO_INCREMENT for table `master_status_jabatan`
--
ALTER TABLE `master_status_jabatan`
  MODIFY `id_status_jabatan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `master_status_pegawai`
--
ALTER TABLE `master_status_pegawai`
  MODIFY `id_status_pegawai` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `master_unit_kerja`
--
ALTER TABLE `master_unit_kerja`
  MODIFY `id_unit_kerja` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=278;
--
-- AUTO_INCREMENT for table `profile_rs`
--
ALTER TABLE `profile_rs`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `status_tunjangan`
--
ALTER TABLE `status_tunjangan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
