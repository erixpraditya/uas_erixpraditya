-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 22, 2025 at 10:54 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `karyawan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_divisi`
--

CREATE TABLE `tabel_divisi` (
  `id_divisi` int(11) NOT NULL,
  `nama_divisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_divisi`
--

INSERT INTO `tabel_divisi` (`id_divisi`, `nama_divisi`) VALUES
(12, 'Keuangan'),
(120, 'Keamanan');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_karyawan`
--

CREATE TABLE `tabel_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama_karyawan` varchar(255) NOT NULL,
  `posisi` varchar(255) NOT NULL,
  `id_divisi` int(255) NOT NULL,
  `foto` varchar(255) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_karyawan`
--

INSERT INTO `tabel_karyawan` (`id_karyawan`, `nama_karyawan`, `posisi`, `id_divisi`, `foto`) VALUES
(987654321, 'Praditya', 'Manager', 12, '999821_OIHEO01.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `nama`) VALUES
(1, 'admin@gmail.com', '751cb3f4aa17c36186f4856c8982bf27', 'Administor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_divisi`
--
ALTER TABLE `tabel_divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `tabel_karyawan`
--
ALTER TABLE `tabel_karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD UNIQUE KEY `id_karyawan` (`id_karyawan`),
  ADD KEY `divisi_id` (`id_divisi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_divisi`
--
ALTER TABLE `tabel_divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `tabel_karyawan`
--
ALTER TABLE `tabel_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=987654322;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_karyawan`
--
ALTER TABLE `tabel_karyawan`
  ADD CONSTRAINT `tabel_karyawan_ibfk_1` FOREIGN KEY (`id_divisi`) REFERENCES `tabel_divisi` (`id_divisi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
