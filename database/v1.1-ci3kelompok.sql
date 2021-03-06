-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2018 at 01:08 AM
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
  `password` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `NIK` varchar(20) NOT NULL,
  `nomorhp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`, `alamat`, `NIK`, `nomorhp`) VALUES
(1, 'fany', 'fany', 'sdasdasda', 'sdasdasdasd', 'dasdasdasd', '098769098');

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
(1, 'Coba Update Data', 'Malang Jember', '3456789076', '9864561111', '3456789076Coba_Update_Data1.jpg', '1985-01-01 00:00:00', 'wanita', '2019-01-01 00:00:00', 400000, 'kosong'),
(2, 'Supriyono', 'Probolinggo', '34567890764', '9864567891', 'profile3.jpg', '2018-04-27 00:00:00', 'pria', '2018-04-01 00:00:00', 300000, 'kosong'),
(12, 'Coba Create dan Upload', 'di Kampung Halaman', '123123', '08212345665', 'Blanc_Render.png', '1999-11-29 00:00:00', 'pria', '2018-12-31 00:00:00', 300000, 'kosong'),
(679, 'Coba Rename Gambar', 'aasdasdasd', '17689', '10987654321', '17689Coba_Rename_Gambar679.jpg', '2017-10-27 00:00:00', 'wanita', '2018-12-31 00:00:00', 350000, 'kosong');

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

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(8) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
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

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `tgl_lahir`, `alamat`, `NIK`, `nomorhp`, `foto`, `jenis_kelamin`) VALUES
(2, 'fanyspenda', 'cobasaja', 'Coba Create dan Upload', '1994-12-31 00:00:00', 'Mayangan', '17689', '0987656987', 'user_2Coba_Create_dan_Upload17689.jpg', 'pria'),
(3, 'fanyspanex', 'dewalah', 'Fany Ervansyah', '1996-05-16 00:00:00', 'bumi Pertiwi', '123123123123', '9883967898', 'user_3Fany_Ervansyah123123123123.png', 'wanita');

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
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=680;

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
  MODIFY `id_transaksi` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
