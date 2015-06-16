-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2015 at 12:41 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ta_feby`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_calonpeserta`
--

CREATE TABLE IF NOT EXISTS `tbl_calonpeserta` (
  `nisn` char(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jenis_kelamin` enum('Perempuan','Laki-Laki') DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `agama` enum('Islam','Kristen','Budha','Hindu','Lainnya') DEFAULT NULL,
  `kewarganegaraan` varchar(30) DEFAULT NULL,
  `anak_ke` varchar(10) DEFAULT NULL,
  `jumlah_saudara` varchar(30) DEFAULT NULL,
  `alamat_lengkap` text,
  `nomor_tlp` varchar(12) DEFAULT NULL,
  `tinggaldengan` varchar(30) DEFAULT NULL,
  `gol_darah` enum('O','A','B','AB') DEFAULT NULL,
  `asal_sekolah` varchar(30) DEFAULT NULL,
  `tahun_lulus` varchar(10) DEFAULT NULL,
  `kota` varchar(30) DEFAULT NULL,
  `kabupaten` varchar(30) DEFAULT NULL,
  `nama_bapak` varchar(50) DEFAULT NULL,
  `nama_ibu` varchar(50) DEFAULT NULL,
  `nama_wali` varchar(50) DEFAULT NULL,
  `umur_bapak` varchar(15) DEFAULT NULL,
  `umur_ibu` varchar(15) DEFAULT NULL,
  `umur_wali` varchar(15) DEFAULT NULL,
  `agama_bapak` enum('Islam','Kristen','Budha','Hindu','Lainnya') DEFAULT NULL,
  `agama_ibu` enum('Islam','Kristen','Budha','Hindu','Lainnya') DEFAULT NULL,
  `agama_wali` enum('Islam','Kristen','Budha','Hindu','Lainnya') DEFAULT NULL,
  `pendidikan_bapak` varchar(15) DEFAULT NULL,
  `pendidikan_ibu` varchar(15) DEFAULT NULL,
  `pendidikan_wali` varchar(15) DEFAULT NULL,
  `pekerjaan_bapak` varchar(20) DEFAULT NULL,
  `pekerjaan_ibu` varchar(20) DEFAULT NULL,
  `pekerjaan_wali` varchar(20) DEFAULT NULL,
  `alamat_bapak` varchar(50) DEFAULT NULL,
  `alamat_ibu` varchar(50) DEFAULT NULL,
  `alamat_wali` varchar(50) DEFAULT NULL,
  `tlp_bapak` varchar(12) DEFAULT NULL,
  `tlp_ibu` varchar(12) DEFAULT NULL,
  `tlp_wali` varchar(12) DEFAULT NULL,
  `hp_bapak` varchar(12) DEFAULT NULL,
  `hp_ibu` varchar(12) DEFAULT NULL,
  `hp_wali` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_calonpeserta`
--

INSERT INTO `tbl_calonpeserta` (`nisn`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `agama`, `kewarganegaraan`, `anak_ke`, `jumlah_saudara`, `alamat_lengkap`, `nomor_tlp`, `tinggaldengan`, `gol_darah`, `asal_sekolah`, `tahun_lulus`, `kota`, `kabupaten`, `nama_bapak`, `nama_ibu`, `nama_wali`, `umur_bapak`, `umur_ibu`, `umur_wali`, `agama_bapak`, `agama_ibu`, `agama_wali`, `pendidikan_bapak`, `pendidikan_ibu`, `pendidikan_wali`, `pekerjaan_bapak`, `pekerjaan_ibu`, `pekerjaan_wali`, `alamat_bapak`, `alamat_ibu`, `alamat_wali`, `tlp_bapak`, `tlp_ibu`, `tlp_wali`, `hp_bapak`, `hp_ibu`, `hp_wali`) VALUES
('123', 'sad', 'Laki-Laki', 'serang', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('456', 'sdam', 'Laki-Laki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hasiltest`
--

CREATE TABLE IF NOT EXISTS `tbl_hasiltest` (
  `id_test` char(11) NOT NULL,
  `id_pendaftaran` char(11) NOT NULL,
  `NISN` char(15) NOT NULL DEFAULT '',
  `nama` varchar(25) DEFAULT NULL,
  `id_petugas` char(11) DEFAULT NULL,
  `hasil` enum('Tidak Diterima','Diterima') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hasiltest`
--

INSERT INTO `tbl_hasiltest` (`id_test`, `id_pendaftaran`, `NISN`, `nama`, `id_petugas`, `hasil`) VALUES
('001', 'P001', '123', 'sad', 'A001', 'Diterima'),
('002', 'P002', '456', 'sadam', 'A003', 'Diterima');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_informasi`
--

CREATE TABLE IF NOT EXISTS `tbl_informasi` (
  `id_informasi` char(20) NOT NULL,
  `judul` varchar(30) DEFAULT NULL,
  `deskripsi` text,
  `id_petugas` char(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_informasi`
--

INSERT INTO `tbl_informasi` (`id_informasi`, `judul`, `deskripsi`, `id_petugas`) VALUES
('001', 'q', 'q', 'a001'),
('INFO-0001', 'hghgh', 'jjkhjkh', 'A001');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pendaftaran`
--

CREATE TABLE IF NOT EXISTS `tbl_pendaftaran` (
  `id_pendaftaran` char(11) NOT NULL,
  `tgl_pendaftaran` date DEFAULT NULL,
  `jurusan` enum('BB','TB','UPW') DEFAULT NULL,
  `NISN` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pendaftaran`
--

INSERT INTO `tbl_pendaftaran` (`id_pendaftaran`, `tgl_pendaftaran`, `jurusan`, `NISN`) VALUES
('P001', '2015-06-05', 'TB', '123'),
('p002', '2015-06-07', 'UPW', '456');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_petugas`
--

CREATE TABLE IF NOT EXISTS `tbl_petugas` (
  `id_petugas` char(11) NOT NULL,
  `nama_petugas` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_petugas`
--

INSERT INTO `tbl_petugas` (`id_petugas`, `nama_petugas`, `password`, `level`) VALUES
('A001', 'Hamidah', 'ad', '523af'),
('A003', 'feby', '5f39601acf39067fc179ba7272e0abac', '1'),
('A004', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1'),
('A007', 'lol', '9cdfb439c7876e703e307864c9167a15', '1'),
('A011', 'a', '0cc175b9c0f1b6a831c399e269772661', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_registrasi`
--

CREATE TABLE IF NOT EXISTS `tbl_registrasi` (
  `id_registrasi` char(11) NOT NULL DEFAULT '',
  `id_test` char(11) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `jurusan` enum('BB','TB','UPW') DEFAULT NULL,
  `tgl_registrasi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_registrasi`
--

INSERT INTO `tbl_registrasi` (`id_registrasi`, `id_test`, `nama`, `jurusan`, `tgl_registrasi`) VALUES
('001', '001', 'sad', 'BB', '2015-06-06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_calonpeserta`
--
ALTER TABLE `tbl_calonpeserta`
  ADD PRIMARY KEY (`nisn`);

--
-- Indexes for table `tbl_hasiltest`
--
ALTER TABLE `tbl_hasiltest`
  ADD PRIMARY KEY (`id_test`,`NISN`,`id_pendaftaran`), ADD UNIQUE KEY `id_pendaftaran` (`id_pendaftaran`) USING BTREE, ADD UNIQUE KEY `NISN` (`NISN`) USING BTREE, ADD UNIQUE KEY `id_petugas` (`id_petugas`) USING BTREE, ADD KEY `id_petugas_2` (`id_petugas`) USING BTREE;

--
-- Indexes for table `tbl_informasi`
--
ALTER TABLE `tbl_informasi`
  ADD PRIMARY KEY (`id_informasi`), ADD UNIQUE KEY `id_informasi` (`id_informasi`) USING BTREE, ADD UNIQUE KEY `judul` (`judul`) USING BTREE, ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`,`NISN`), ADD UNIQUE KEY `NISN` (`NISN`) USING BTREE, ADD UNIQUE KEY `id_pendaftaran` (`id_pendaftaran`) USING BTREE, ADD KEY `id_jurusan` (`jurusan`) USING BTREE;

--
-- Indexes for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tbl_registrasi`
--
ALTER TABLE `tbl_registrasi`
  ADD PRIMARY KEY (`id_registrasi`,`id_test`), ADD UNIQUE KEY `id_test` (`id_test`) USING BTREE, ADD UNIQUE KEY `id_registrasi` (`id_registrasi`) USING BTREE;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_hasiltest`
--
ALTER TABLE `tbl_hasiltest`
ADD CONSTRAINT `tbl_hasiltest_ibfk_1` FOREIGN KEY (`id_pendaftaran`) REFERENCES `tbl_pendaftaran` (`id_pendaftaran`) ON UPDATE CASCADE,
ADD CONSTRAINT `tbl_hasiltest_ibfk_2` FOREIGN KEY (`NISN`) REFERENCES `tbl_calonpeserta` (`nisn`) ON UPDATE CASCADE,
ADD CONSTRAINT `tbl_hasiltest_ibfk_3` FOREIGN KEY (`id_petugas`) REFERENCES `tbl_petugas` (`id_petugas`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_informasi`
--
ALTER TABLE `tbl_informasi`
ADD CONSTRAINT `tbl_informasi_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `tbl_petugas` (`id_petugas`);

--
-- Constraints for table `tbl_registrasi`
--
ALTER TABLE `tbl_registrasi`
ADD CONSTRAINT `tbl_registrasi_ibfk_1` FOREIGN KEY (`id_test`) REFERENCES `tbl_hasiltest` (`id_test`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
