-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2022 at 05:24 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mahasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_mahasiswa`
--

CREATE TABLE `data_mahasiswa` (
  `id_mhs` int(11) NOT NULL,
  `nama_mhs` varchar(50) DEFAULT NULL,
  `nim_mhs` int(20) DEFAULT NULL,
  `alamat_mhs` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `foto` varchar(50) NOT NULL,
  `jurusan_in` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_mahasiswa`
--

INSERT INTO `data_mahasiswa` (`id_mhs`, `nama_mhs`, `nim_mhs`, `alamat_mhs`, `tgl_lahir`, `foto`, `jurusan_in`) VALUES
(1, 'Ronal', 2016062, 'Lamongan', '2022-08-27', 'Arlecchino.full.3703035.jpg', 2),
(2, 'laila', 36129186, 'Probolinggo', '1999-08-09', '1261472.jpg', 4),
(3, 'laila', 36129186, 'Probolinggo', '1999-08-09', '1261472.jpg', 1),
(4, 'Dina', 17827367, 'Malang', '2022-09-12', 'Arlecchino.full.3703035.jpg', 2),
(5, 'Zunia', 428779238, 'Lombok', '2022-09-23', 'Arlecchino.full.3703035.jpg', 4),
(10, 'Suyono', 326876, 'Pamalang', '2022-09-06', 'Arlecchino.full.3703035.jpg', 3),
(17, 'Riani', 423982798, 'Malang', '2022-10-06', 'Arlecchino.full.3703035.jpg', 6),
(21, 'Rara', 35323234, 'Lombok', '2022-09-28', 'Arlecchino.full.3703035.jpg', 12),
(22, 'Lala', 32744224, 'Lombok', '2022-09-29', 'Arlecchino.full.3703035.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'Sosiologi'),
(2, 'Informatika'),
(3, 'Matematika'),
(4, 'Bahasa Indonesia'),
(6, 'Tataboga'),
(8, 'Pendidikan Bahasa Inggris'),
(9, 'Pendidikan Biologi'),
(10, 'Teknik Biometik'),
(11, 'Biokima'),
(12, 'Teknik Biologi'),
(54, 'Ryoji'),
(55, 'Bahasa Melayu');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_user` varchar(255) DEFAULT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_user`, `username`, `password`, `nama_user`, `id_role`) VALUES
(36, 'admin1', 'admin1', 'Diona', 1),
(37, 'admin2', 'admin2', 'Dinda', 1),
(49, 'user1', 'user1', 'Rina', 2),
(50, 'user2', 'user2', 'Amelia', 2),
(51, 'user3', 'user3', 'Roni', 2),
(52, 'user4', 'user4', 'Luni', 2);

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

CREATE TABLE `rol` (
  `id_role` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rol`
--

INSERT INTO `rol` (`id_role`, `role`) VALUES
(1, 'admin'),
(2, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_mahasiswa`
--
ALTER TABLE `data_mahasiswa`
  ADD PRIMARY KEY (`id_mhs`),
  ADD KEY `jurusan_in` (`jurusan_in`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- Indexes for table `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_mahasiswa`
--
ALTER TABLE `data_mahasiswa`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `rol`
--
ALTER TABLE `rol`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_mahasiswa`
--
ALTER TABLE `data_mahasiswa`
  ADD CONSTRAINT `data_mahasiswa_ibfk_1` FOREIGN KEY (`jurusan_in`) REFERENCES `jurusan` (`id_jurusan`);

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `rol` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
