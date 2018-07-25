-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2018 at 06:40 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci3kelompok`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(8) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` smallint(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `NIK` varchar(20) NOT NULL,
  `nomorhp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `level`, `nama`, `alamat`, `NIK`, `nomorhp`) VALUES
(1, 'fany', '361a8e7255c308e4362fff2ca3e726ff', 3, 'sdasdasda', 'sdasdasdasd', 'dasdasdasd', '098769098'),
(4, 'fanyajah', '61effa358e362f3e131e5c6a3c9e53c2', 3, 'Fany Ervansyah', 'Probolinggo', '0987789087', '09876545678');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id` int(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `NIK` varchar(20) NOT NULL,
  `nomorhp` varchar(20) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `tgl_lahir` datetime NOT NULL,
  `jenis_kelamin` varchar(45) NOT NULL,
  `tgl_kerja` datetime NOT NULL,
  `gaji` int(9) NOT NULL,
  `status_kerja` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id`, `nama`, `alamat`, `NIK`, `nomorhp`, `foto`, `tgl_lahir`, `jenis_kelamin`, `tgl_kerja`, `gaji`, `status_kerja`) VALUES
(1, 'Mulyanto', 'Malang Jember', '3456789076', '9864561111', '3456789076Coba_Update_Data1.jpg', '1985-01-01 00:00:00', 'wanita', '2019-01-01 00:00:00', 400000, 'kosong'),
(2, 'Supriyono', 'Probolinggo', '34567890764', '9864567891', 'profile3.jpg', '2018-04-27 00:00:00', 'pria', '2018-04-01 00:00:00', 300000, 'dipesan'),
(12, 'Nanik Kore', 'di Kampung Halaman', '123123', '08212345665', 'Blanc_Render.png', '1999-11-29 00:00:00', 'pria', '2018-12-31 00:00:00', 300000, 'kosong'),
(679, 'Kopri Batal Ion', 'aasdasdasd', '17689', '10987654321', '17689Coba_Rename_Gambar679.jpg', '2017-10-27 00:00:00', 'wanita', '2018-12-31 00:00:00', 350000, 'dipesan'),
(681, 'Erwin', 'Malang', '98767898', '09876567890', 'WIN_20180503_13_46_21_Pro1.jpg', '1995-09-29 00:00:00', 'pria', '2016-12-31 00:00:00', 567898, 'kosong'),
(682, 'Sulaidi', 'Malang Raya', '5365677', '08674189876', 'd1e589ccc516cbec88da10415a77c947.png', '1988-12-31 00:00:00', 'pria', '2018-06-30 00:00:00', 300000, 'kosong'),
(683, 'Yae Sakura', 'Lumajang', '64171918176', '09876568989', 'Blanc_Render1.png', '1999-01-06 00:00:00', 'wanita', '2018-12-31 00:00:00', 224356, 'kosong');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(3) NOT NULL,
  `namaKota` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `namaKota`) VALUES
(2, 'Malang'),
(1, 'Purbalingga');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `level` smallint(6) NOT NULL,
  `nama_level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`level`, `nama_level`) VALUES
(0, 'free user'),
(1, 'premium user'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tarif`
--

CREATE TABLE `tarif` (
  `id_tarif` int(8) NOT NULL,
  `kota_tujuan` varchar(40) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tarif`
--

INSERT INTO `tarif` (`id_tarif`, `kota_tujuan`, `harga`) VALUES
(5, 'Malang', 500000),
(6, 'Purbalingga', 450000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(6) NOT NULL,
  `id_user` int(8) NOT NULL,
  `id_driver` int(8) DEFAULT NULL,
  `tanggal_berangkat` datetime NOT NULL,
  `kota_tujuan` varchar(40) NOT NULL,
  `jumlah_hari` int(3) NOT NULL,
  `tanggal_kembali` datetime NOT NULL,
  `status` varchar(200) NOT NULL,
  `metode_bayar` varchar(45) NOT NULL,
  `foto_bukti_bayar` varchar(200) DEFAULT NULL,
  `harga_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_driver`, `tanggal_berangkat`, `kota_tujuan`, `jumlah_hari`, `tanggal_kembali`, `status`, `metode_bayar`, `foto_bukti_bayar`, `harga_total`) VALUES
(2, 2, 679, '2018-07-11 00:00:00', 'Malang', 3, '2018-07-14 00:00:00', 'Baru Dibuat', '', NULL, 1500000),
(3, 2, 2, '2018-07-11 00:00:00', 'Malang', 0, '2018-07-11 00:00:00', 'Baru Dibuat', '', NULL, 500000),
(6, 2, NULL, '2018-12-31 00:00:00', 'Purbalingga', 0, '2018-12-31 00:00:00', 'Baru Dibuat', 'langsung', NULL, 450000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(8) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` smallint(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tgl_lahir` datetime NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `NIK` varchar(20) NOT NULL,
  `nomorhp` varchar(20) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`, `nama`, `tgl_lahir`, `alamat`, `NIK`, `nomorhp`, `foto`, `jenis_kelamin`) VALUES
(2, 'fanyspenda', '80a7a7944891e0d03b32bd963cd702c7', 0, 'Elmi Risqi Amalia', '1997-11-25 00:00:00', 'Mayangan', '17689', '0987656987', 'x8sP1756_400x4002.jpg', 'wanita'),
(3, 'fanyspanex', '3ee5ab5ab22fc421e05ee2c2bd59a93e', 1, 'Fany Ervansyah', '1996-05-16 00:00:00', 'bumi Pertiwi', '123123123123', '9883967898', 'user_3Fany_Ervansyah123123123123.png', 'wanita'),
(4, 'elmi', '3491921714ffb45af687b6789005ce89', 1, 'Elmi Fany Semoga', '1997-11-25 00:00:00', 'Probolinggo', '1212323123', '098765456789', 'user_Elmi_Fany_Semoga1212323123.jpg', 'wanita');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `NIK_UNIQUE` (`NIK`),
  ADD UNIQUE KEY `nomorhp_UNIQUE` (`nomorhp`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `NIK_UNIQUE` (`NIK`),
  ADD UNIQUE KEY `nomorhp_UNIQUE` (`nomorhp`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`),
  ADD UNIQUE KEY `namaKota_UNIQUE` (`namaKota`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`level`);

--
-- Indexes for table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`id_tarif`),
  ADD UNIQUE KEY `kota_tujuan_UNIQUE` (`kota_tujuan`),
  ADD KEY `fk_nama_kota_idx` (`kota_tujuan`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_id_user_idx` (`id_user`),
  ADD KEY `fk_id_driver_idx` (`id_driver`),
  ADD KEY `fk_kota_tujuan_idx` (`kota_tujuan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `NIK_UNIQUE` (`NIK`),
  ADD UNIQUE KEY `nomorhp_UNIQUE` (`nomorhp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=684;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tarif`
--
ALTER TABLE `tarif`
  MODIFY `id_tarif` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tarif`
--
ALTER TABLE `tarif`
  ADD CONSTRAINT `fk_nama_kota` FOREIGN KEY (`kota_tujuan`) REFERENCES `kota` (`namaKota`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_id_driver` FOREIGN KEY (`id_driver`) REFERENCES `driver` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kota_tujuan` FOREIGN KEY (`kota_tujuan`) REFERENCES `tarif` (`kota_tujuan`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
