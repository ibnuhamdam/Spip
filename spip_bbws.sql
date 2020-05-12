-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2020 at 10:10 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spip_bbws`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_form_8`
--

CREATE TABLE `detail_form_8` (
  `id_pernyataan` varchar(50) NOT NULL,
  `id_tahap_kegiatan` int(11) DEFAULT NULL,
  `id_form_8` varchar(50) DEFAULT NULL,
  `pernyataan_risiko` text NOT NULL,
  `penyebab` text NOT NULL,
  `sumber` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `dampak` text NOT NULL,
  `pemilik_risiko` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_form_8`
--

INSERT INTO `detail_form_8` (`id_pernyataan`, `id_tahap_kegiatan`, `id_form_8`, `pernyataan_risiko`, `penyebab`, `sumber`, `dampak`, `pemilik_risiko`) VALUES
('F82703200001-001', 1, 'F82703200001', 'Terjadinya tender ulang', 'Peserta tender yang memenuhi persayaratan kualifikasi kurang dari 3 peserta (paket pekerjaan Review LARAP Pembangunan Bendung Gerak Karangnongko dan Penyusunan Studi LARAP Pembangunan Jaringan Irigasi DI. Karangnongko)', '[\"internal\",\"eksternal\"]', 'Waktu pelaksanaan mundur dan dikhawatirkan progres pekerjaan terlambat', 'BBWS Bengawan Solo, Satker BBWS Bengawan Solo'),
('F82703200001-002', 1, 'F82703200001', 'Terjadinya gagal tender', 'Alokasi dana terblokir (paket pekerjaan Review Detail Desain Pembangunan Gedung BBWS Bengawan Solo)', '[\"eksternal\"]', 'Tidak dapat dilaksanakan pembangunan gedung kantor BBWS Bengawan Solo', 'BBWS Bengawan Solo'),
('F82703200001-003', 2, 'F82703200001', 'Team Leader maupun Tenaga Ahli mengundurkan diri di tengah pelaksanaan pekerjaan', 'Ketidakmampuan individu dalam dalam menjalankan tugas dan target yang dibebankan dalam KAK', '[\"eksternal\"]', 'Keterlambatan progres pekerjaan', 'BBWS Bengawan Solo, Satker BBWS Bengawan Solo'),
('F82703200001-004', 2, 'F82703200001', 'Team Leader maupun Tenaga Ahli tidak efektif bekerja di lokasi pekerjaan', 'Domisili Team Leader maupun Tenaga Ahli di luar lokasi pekerjaan', '[\"eksternal\"]', 'Menghambat koordinasi maupun pemantauan progres pekerjaan', 'BBWS Bengawan Solo, Satker BBWS Bengawan Solo'),
('F82703200001-005', 2, 'F82703200001', 'Keterlambatan penyelesaian hasil desain', 'Adanya kemungkinan personil yang terlibat dalam perencanaan desain memiliki kegiatan yang bersamaan selama masa kontrak', '[\"eksternal\"]', 'Menghambat progres pekerjaan serta menghambat Bidang/Satker lain (sesuai kegiatan)', 'BBWS Bengawan Solo, Satker BBWS Bengawan Solo'),
('F82703200001-006', 3, 'F82703200001', 'Hasil desain tidak sesuai arahan dan harapan dari PPK maupun Direksi', 'SDM Penyedia Jasa kurang berkualitas yang disebabkan adanya pergantian personil pada saat pelaksanaan', '[\"internal\",\"eksternal\"]', 'Menghambat koordinasi maupun pemantauan progres pekerjaan', 'BBWS Bengawan Solo, Satker BBWS Bengawan Solo'),
('F82803200001-001', 1, 'F82803200001', 'Digitalisasi arsip belum optimal dan pemusnahan arsip belum dilaksanakan', '- Klasifikasi arsip belum sesuai Permen No.16 Tahun 2018\r\n- Belum dibuat jadwal retensi arsip yang sudah lama tercipta atau yang sudah\r\ntidak memiliki nilai guna\r\n- Kurangnya kesadaran dan komitmen SDM dalam penataan dan pengelolaan\r\narsip\r\n- Jumlah arsip sangat banyak sehingga perlu waktu untuk membuat duplikat\r\narsip secara elektronik', '[\"internal\"]', '- Gedung arsip dipenuhi oleh arsip yang sudah lama tercipta dan perlu dimusnahkan\r\n- Laporan/ upload arsip secara elektronik ke aplikasi e-arsip terhambat', 'BBWS Bengawan Solo');

-- --------------------------------------------------------

--
-- Table structure for table `detail_form_11`
--

CREATE TABLE `detail_form_11` (
  `id_form_11` varchar(50) DEFAULT NULL,
  `id_pernyataan` varchar(50) DEFAULT NULL,
  `rata_skor_risiko` int(1) NOT NULL,
  `rata_skor_dampak` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_form_14`
--

CREATE TABLE `detail_form_14` (
  `id_form_14` varchar(50) DEFAULT NULL,
  `id_pernyataan` varchar(50) DEFAULT NULL,
  `pengendalian` text NOT NULL,
  `perbaikan_pengendalian` text NOT NULL,
  `dpk` longtext NOT NULL,
  `waktu` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_form_14`
--

INSERT INTO `detail_form_14` (`id_form_14`, `id_pernyataan`, `pengendalian`, `perbaikan_pengendalian`, `dpk`, `waktu`) VALUES
('F140104200001', 'F82703200001-001', 'Perpres No. 16 Tahun 2018 tentang Pengadaan Barang dan Jasa Pemerintah', 'Kooordinasi dan penelaahan dokumen kesiapan tender dengan BP2JK', '[\"detektif\"]', 'Selama masa tender'),
('F140104200001', 'F82703200001-002', 'Perpres No. 16 Tahun 2018 tentang Pengadaan Barang dan Jasa Pemerintah dan Permen Keuangan tentang Tata Cara Revisi DIPA', 'Pelaksanaan tender paralel dilaksanakan bersamaan saat pengajuan revisi DIPA', '[\"preventif\"]', 'Selama masa tahun anggaran'),
('F140104200001', 'F82703200001-003', 'Perpres No. 16 Tahun 2018 tentang Pengadaan Barang dan Jasa Pemerintah; Permen PUPR No. 7/PRT/M/2019 tentang Standar Pedoman Pengadaan Jasa; Dokumen Pemilihan', 'Meminta kesediaan dan komitmen dari Penyedia Jasa dalam Pre Award Meeting dan dituangkan dalam Berita Acara', '[\"detektif\",\"preventif\",\"korektif\"]', 'Selama masa pelaksanan pekerjaan'),
('F140104200001', 'F82703200001-004', 'Perpres No. 16 Tahun 2018 tentang Pengadaan Barang dan Jasa Pemerintah; Permen PUPR No. 7/PRT/M/2019 tentang Standar Pedoman Pengadaan Jasa; Dokumen Pemilihan; KAK', 'Meminta kesediaan dan komitmen dari Penyedia Jasa dalam Pre Award Meeting dan dituangkan dalam Berita Acara; Monitoring secara berkelanjutan oleh Pengguna Jasa', '[\"korektif\"]', 'Selama masa pelaksanan pekerjaan'),
('F140104200001', 'F82703200001-005', 'Perpres No. 16 Tahun 2018 tentang Pengadaan Barang dan Jasa Pemerintah', 'Meminta kesediaan dan komitmen dari Penyedia Jasa dalam Pre Award Meeting dan dituangkan dalam Berita Acara: Percepatan kegiatan-kegiatan lapangan', '[\"detektif\",\"preventif\",\"korektif\"]', 'Selama masa pelaksanan pekerjaan'),
('F140104200001', 'F82703200001-006', 'Dokumen Pemilihan; KAK', 'Meminta kesediaan dan komitmen dari Penyedia Jasa dalam Pre Award Meeting dan dituangkan dalam Berita Acara; Perbanyak frekuensi diskusi dengan Direksi', '[\"korektif\"]', 'Selama masa pelaksanan pekerjaan');

-- --------------------------------------------------------

--
-- Table structure for table `detail_form_17`
--

CREATE TABLE `detail_form_17` (
  `id_form_17` varchar(50) DEFAULT NULL,
  `id_pernyataan` varchar(50) DEFAULT NULL,
  `existing_infokom` varchar(60) NOT NULL,
  `perbaikan_informasi` varchar(160) NOT NULL,
  `perbaikan_komunikasi` varchar(120) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_form_17`
--

INSERT INTO `detail_form_17` (`id_form_17`, `id_pernyataan`, `existing_infokom`, `perbaikan_informasi`, `perbaikan_komunikasi`) VALUES
('F170304200001', 'F82703200001-001', 'Dokumen Tender 2', 'Perubahan dan penyesuaian doumen kelengkapan tender (KAK, HPS, dokumen pemilihan dll)', 'Koordinasi antara Satker, PPK dan BP2JK'),
('F170304200001', 'F82703200001-002', 'DIPA dan POK', 'Pengajuan usulan revisi DIPA', 'Koordinasi antara Satker, PPK, Pembina Pusat dan BP2JK'),
('F170304200001', 'F82703200001-003', 'Berita Acara Pre Award Meeting', 'Usulan pergantian personil', 'Koordinasi antara Satker, PPK, Direksi, Direktur dan Tim Konsultan'),
('F170304200001', 'F82703200001-004', 'Daftar hadir/time sheet', 'Usulan pergantian personil', 'Koordinasi antara Satker, PPK, Direksi, Direktur dan Tim Konsultan'),
('F170304200001', 'F82703200001-005', 'Daftar hadir/time sheet', 'Usulan pergantian personil; Pengawasan melekat', 'Koordinasi antara Satker, PPK, Direksi, D+J12:J16'),
('F170304200001', 'F82703200001-006', 'KAK Kegiatan; Laporan Akhir Desain', 'Pengarahan dan pemantauan hasil diskusi', 'Koordinasi antara Satker, PPK, Direksi, Direktur dan Tim Konsultan');

-- --------------------------------------------------------

--
-- Table structure for table `detail_form_22`
--

CREATE TABLE `detail_form_22` (
  `id_form_22` varchar(50) DEFAULT NULL,
  `id_pernyataan` varchar(50) DEFAULT NULL,
  `pemantauan` varchar(80) NOT NULL,
  `perbaikan_pemantauan` varchar(150) NOT NULL,
  `waktu_pemantauan` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_form_22`
--

INSERT INTO `detail_form_22` (`id_form_22`, `id_pernyataan`, `pemantauan`, `perbaikan_pemantauan`, `waktu_pemantauan`) VALUES
('F220404200001', 'F82703200001-001', 'Penelaahan dokumen kelengkapan tender', 'Koordinasi intensif dengan BP2JK', 'Masa penyusunan dokumen kelengkapan tender');

-- --------------------------------------------------------

--
-- Table structure for table `detail_ppk`
--

CREATE TABLE `detail_ppk` (
  `id_user` int(11) DEFAULT NULL,
  `id_ppk` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_ppk`
--

INSERT INTO `detail_ppk` (`id_user`, `id_ppk`) VALUES
(2, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `form_8`
--

CREATE TABLE `form_8` (
  `id_form_8` varchar(50) NOT NULL,
  `id_ppk` int(11) DEFAULT NULL,
  `is_done` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_8`
--

INSERT INTO `form_8` (`id_form_8`, `id_ppk`, `is_done`, `status`, `date_created`) VALUES
('F82703200001', 1, 1, 0, '2020-03-27 12:27:43'),
('F82803200001', 2, 1, 0, '2020-03-28 12:57:12');

-- --------------------------------------------------------

--
-- Table structure for table `form_11`
--

CREATE TABLE `form_11` (
  `id_form_11` varchar(50) NOT NULL,
  `id_form_8` varchar(50) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_11`
--

INSERT INTO `form_11` (`id_form_11`, `id_form_8`, `date_created`) VALUES
('F110104200001', 'F82703200001', '2020-04-01 12:12:06'),
('F110204200001', 'F82703200001', '2020-04-02 12:31:54'),
('F110405200001', 'F82803200001', '2020-05-04 04:25:24');

-- --------------------------------------------------------

--
-- Table structure for table `form_12`
--

CREATE TABLE `form_12` (
  `id_pernyataan` varchar(50) DEFAULT NULL,
  `total_skor` int(1) NOT NULL,
  `ranking` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `form_14`
--

CREATE TABLE `form_14` (
  `id_form_14` varchar(50) NOT NULL,
  `id_form_8` varchar(50) DEFAULT NULL,
  `is_done` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_14`
--

INSERT INTO `form_14` (`id_form_14`, `id_form_8`, `is_done`, `status`, `date_created`) VALUES
('F140104200001', 'F82703200001', 1, 0, '2020-04-01 13:23:07'),
('F141105200001', 'F82803200001', 1, 0, '2020-05-11 07:54:57');

-- --------------------------------------------------------

--
-- Table structure for table `form_17`
--

CREATE TABLE `form_17` (
  `id_form_17` varchar(50) NOT NULL,
  `id_form_8` varchar(50) DEFAULT NULL,
  `is_done` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_17`
--

INSERT INTO `form_17` (`id_form_17`, `id_form_8`, `is_done`, `status`, `date_created`) VALUES
('F170304200001', 'F82703200001', 1, 0, '2020-04-03 10:59:07'),
('F171205200001', 'F82803200001', 1, 0, '2020-05-12 06:33:11');

-- --------------------------------------------------------

--
-- Table structure for table `form_22`
--

CREATE TABLE `form_22` (
  `id_form_22` varchar(50) NOT NULL,
  `id_form_8` varchar(50) DEFAULT NULL,
  `is_done` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_22`
--

INSERT INTO `form_22` (`id_form_22`, `id_form_8`, `is_done`, `status`, `date_created`) VALUES
('F220404200001', 'F82703200001', 0, 0, '2020-04-04 13:02:08');

-- --------------------------------------------------------

--
-- Table structure for table `ppk`
--

CREATE TABLE `ppk` (
  `id_ppk` int(11) NOT NULL,
  `nama_ppk` varchar(60) NOT NULL,
  `deskripsi` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ppk`
--

INSERT INTO `ppk` (`id_ppk`, `nama_ppk`, `deskripsi`, `date_created`) VALUES
(1, 'PPK Perencanaan & Program', 'PPK yang mengurus', '2020-03-21 09:19:09'),
(2, 'PPK Ketatalaksanaan', 'PPK yang mengurus', '2020-03-28 10:23:14');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `role`) VALUES
(1, 'Admin'),
(2, 'PPK'),
(3, 'UKI');

-- --------------------------------------------------------

--
-- Table structure for table `skor_form_11`
--

CREATE TABLE `skor_form_11` (
  `id_form_11` varchar(50) DEFAULT NULL,
  `id_pernyataan` varchar(50) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `skor_risiko` int(1) NOT NULL,
  `skor_dampak` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skor_form_11`
--

INSERT INTO `skor_form_11` (`id_form_11`, `id_pernyataan`, `id_user`, `skor_risiko`, `skor_dampak`) VALUES
(NULL, 'F82703200001-006', 4, 2, 3),
(NULL, 'F82703200001-005', 4, 2, 4),
(NULL, 'F82703200001-004', 4, 3, 4),
(NULL, 'F82703200001-003', 4, 3, 3),
(NULL, 'F82703200001-002', 4, 2, 4),
(NULL, 'F82703200001-001', 4, 2, 4),
(NULL, 'F82703200001-006', 5, 3, 3),
(NULL, 'F82703200001-005', 5, 1, 2),
(NULL, 'F82703200001-004', 5, 2, 4),
(NULL, 'F82703200001-003', 5, 3, 2),
(NULL, 'F82703200001-002', 5, 3, 3),
(NULL, 'F82703200001-001', 5, 2, 2),
(NULL, 'F82703200001-006', 6, 1, 2),
(NULL, 'F82703200001-005', 6, 1, 2),
(NULL, 'F82703200001-004', 6, 3, 3),
(NULL, 'F82703200001-003', 6, 2, 3),
(NULL, 'F82703200001-002', 6, 2, 4),
(NULL, 'F82703200001-001', 6, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `status_form_11`
--

CREATE TABLE `status_form_11` (
  `id_form_11` varchar(50) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `is_done` int(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tahap_kegiatan`
--

CREATE TABLE `tahap_kegiatan` (
  `id_tahap_kegiatan` int(11) NOT NULL,
  `tahap_kegiatan` varchar(30) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='tahap kegiatan form 8';

--
-- Dumping data for table `tahap_kegiatan`
--

INSERT INTO `tahap_kegiatan` (`id_tahap_kegiatan`, `tahap_kegiatan`, `date_created`) VALUES
(1, 'Persiapan', '2020-03-26 13:16:20'),
(2, 'Pelaksanaan', '2020-03-27 12:17:58'),
(3, 'Output', '2020-03-31 11:32:58');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_role` int(11) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `is_active` int(1) NOT NULL,
  `token` varchar(150) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_role`, `email`, `password`, `is_active`, `token`, `date_created`) VALUES
(1, 1, 'admin@admin.com', '$2y$10$z23RRmDLe.kP215G6vuolO4aJiLcSHfaHASJnlxghNko9MLIiTqAm', 1, NULL, '2020-03-20 03:14:42'),
(2, 2, 'ppk_pp@bws.com', '$2y$10$z23RRmDLe.kP215G6vuolO4aJiLcSHfaHASJnlxghNko9MLIiTqAm', 1, NULL, '2020-03-25 12:26:48'),
(3, 2, 'ppk_k@bws.com', '$2y$10$z23RRmDLe.kP215G6vuolO4aJiLcSHfaHASJnlxghNko9MLIiTqAm', 1, NULL, '2020-03-28 12:30:59'),
(4, 3, 'uki@bws.com', '$2y$10$z23RRmDLe.kP215G6vuolO4aJiLcSHfaHASJnlxghNko9MLIiTqAm', 1, NULL, '2020-03-29 03:45:24'),
(5, 3, 'uki2@bws.com', '$2y$10$z23RRmDLe.kP215G6vuolO4aJiLcSHfaHASJnlxghNko9MLIiTqAm', 1, NULL, '2020-04-16 06:43:14'),
(6, 3, 'uki3@bws.com', '$2y$10$z23RRmDLe.kP215G6vuolO4aJiLcSHfaHASJnlxghNko9MLIiTqAm', 1, NULL, '2020-04-17 02:58:50'),
(9, 3, 'uki4@bws.com', '$2y$10$z23RRmDLe.kP215G6vuolO4aJiLcSHfaHASJnlxghNko9MLIiTqAm', 1, NULL, '2020-05-06 07:03:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `nip` varchar(50) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_form_8`
--
ALTER TABLE `detail_form_8`
  ADD PRIMARY KEY (`id_pernyataan`),
  ADD KEY `id_tahap_kegiatan` (`id_tahap_kegiatan`) USING BTREE,
  ADD KEY `id_form_8` (`id_form_8`);

--
-- Indexes for table `detail_form_11`
--
ALTER TABLE `detail_form_11`
  ADD KEY `id_pernyataan` (`id_pernyataan`),
  ADD KEY `id_form_11` (`id_form_11`);

--
-- Indexes for table `detail_form_14`
--
ALTER TABLE `detail_form_14`
  ADD KEY `id_pernyataan` (`id_pernyataan`) USING BTREE,
  ADD KEY `id_form_14` (`id_form_14`);

--
-- Indexes for table `detail_form_17`
--
ALTER TABLE `detail_form_17`
  ADD KEY `id_pernyataan` (`id_pernyataan`) USING BTREE,
  ADD KEY `id_form_17` (`id_form_17`) USING BTREE;

--
-- Indexes for table `detail_form_22`
--
ALTER TABLE `detail_form_22`
  ADD KEY `id_pernyataan` (`id_pernyataan`) USING BTREE,
  ADD KEY `id_form_22` (`id_form_22`) USING BTREE;

--
-- Indexes for table `detail_ppk`
--
ALTER TABLE `detail_ppk`
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_ppk` (`id_ppk`);

--
-- Indexes for table `form_8`
--
ALTER TABLE `form_8`
  ADD PRIMARY KEY (`id_form_8`),
  ADD KEY `id_ppk` (`id_ppk`);

--
-- Indexes for table `form_11`
--
ALTER TABLE `form_11`
  ADD PRIMARY KEY (`id_form_11`),
  ADD KEY `id_form_8` (`id_form_8`);

--
-- Indexes for table `form_12`
--
ALTER TABLE `form_12`
  ADD KEY `id_pernyataan` (`id_pernyataan`);

--
-- Indexes for table `form_14`
--
ALTER TABLE `form_14`
  ADD PRIMARY KEY (`id_form_14`),
  ADD KEY `id_form_8` (`id_form_8`);

--
-- Indexes for table `form_17`
--
ALTER TABLE `form_17`
  ADD PRIMARY KEY (`id_form_17`),
  ADD KEY `id_form_8` (`id_form_8`);

--
-- Indexes for table `form_22`
--
ALTER TABLE `form_22`
  ADD PRIMARY KEY (`id_form_22`),
  ADD KEY `id_form_8` (`id_form_8`);

--
-- Indexes for table `ppk`
--
ALTER TABLE `ppk`
  ADD PRIMARY KEY (`id_ppk`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `skor_form_11`
--
ALTER TABLE `skor_form_11`
  ADD KEY `id_user` (`id_user`) USING BTREE,
  ADD KEY `id_pernyataan` (`id_pernyataan`) USING BTREE,
  ADD KEY `id_form_11` (`id_form_11`);

--
-- Indexes for table `status_form_11`
--
ALTER TABLE `status_form_11`
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_form_11` (`id_form_11`);

--
-- Indexes for table `tahap_kegiatan`
--
ALTER TABLE `tahap_kegiatan`
  ADD PRIMARY KEY (`id_tahap_kegiatan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ppk`
--
ALTER TABLE `ppk`
  MODIFY `id_ppk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tahap_kegiatan`
--
ALTER TABLE `tahap_kegiatan`
  MODIFY `id_tahap_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
