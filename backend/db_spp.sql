-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2024 at 12:52 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spp`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_kelas`
--

CREATE TABLE `data_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `jurusan` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_kelas`
--

INSERT INTO `data_kelas` (`id_kelas`, `nama_kelas`, `jurusan`) VALUES
(1, 'Ilmu Pengetahuan Alam', 'IPA'),
(4, 'Ilmu Pengetahuan Sosial', 'IPS'),
(5, 'Ilmu Pengetahuan Bahasa', 'IPB');

-- --------------------------------------------------------

--
-- Table structure for table `data_spp`
--

CREATE TABLE `data_spp` (
  `id_data_spp` bigint(11) NOT NULL,
  `sisa_spp` decimal(10,2) NOT NULL,
  `jumlah_spp` decimal(10,2) NOT NULL,
  `jumlah_dibayar` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_spp`
--

INSERT INTO `data_spp` (`id_data_spp`, `sisa_spp`, `jumlah_spp`, `jumlah_dibayar`) VALUES
(29520732, 0.00, 150000.00, 150000.00),
(48331425, 0.00, 160000.00, 470000.00),
(123435461, 30000.00, 150000.00, 120000.00),
(123435467890, 0.00, 160000.00, 320000.00);

-- --------------------------------------------------------

--
-- Table structure for table `history_spp`
--

CREATE TABLE `history_spp` (
  `id_spp` int(11) NOT NULL,
  `nisn` bigint(10) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `nominal` decimal(10,2) NOT NULL,
  `id_data_spp` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history_spp`
--

INSERT INTO `history_spp` (`id_spp`, `nisn`, `id_admin`, `tanggal_pembayaran`, `nominal`, `id_data_spp`) VALUES
(98, 48331425, 2, '2024-02-25', 150000.00, 48331425),
(102, 123435467890, 2, '2024-02-26', 14000.00, 123435467890),
(103, 123435467890, 2, '2024-02-26', 146000.00, 123435467890),
(104, 48331425, 2, '2024-02-26', 10000.00, 48331425),
(105, 48331425, 2, '2024-02-26', 10000.00, 48331425),
(106, 48331425, 2, '2024-02-26', 10000.00, 48331425),
(107, 48331425, 2, '2024-02-26', 10000.00, 48331425),
(108, 48331425, 2, '2024-02-26', 10000.00, 48331425),
(109, 48331425, 2, '2024-02-26', 10000.00, 48331425),
(110, 48331425, 2, '2024-02-26', 10000.00, 48331425),
(111, 48331425, 2, '2024-02-26', 10000.00, 48331425),
(112, 48331425, 2, '2024-02-26', 100000.00, 48331425),
(113, 48331425, 2, '2024-02-26', 15000.00, 48331425),
(114, 48331425, 2, '2024-02-26', 12500.00, 48331425),
(115, 48331425, 2, '2024-02-26', 112500.00, 48331425),
(116, 123435467890, 2, '2024-02-26', 160000.00, 123435467890),
(117, 29520732, 2, '2024-03-01', 100000.00, 29520732),
(118, 29520732, 2, '2024-03-01', 50000.00, 29520732),
(119, 123435461, 2, '2024-03-04', 100000.00, 123435461),
(120, 123435461, 2, '2024-03-04', 10000.00, 123435461),
(121, 123435461, 2, '2024-03-04', 10000.00, 123435461);

-- --------------------------------------------------------

--
-- Table structure for table `profile_siswa`
--

CREATE TABLE `profile_siswa` (
  `nisn` bigint(10) NOT NULL,
  `nama_siswa` varchar(25) NOT NULL,
  `jk` enum('Laki-Laki','Perempuan') NOT NULL,
  `kelas` enum('X','XI','XII') NOT NULL,
  `hp` int(12) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile_siswa`
--

INSERT INTO `profile_siswa` (`nisn`, `nama_siswa`, `jk`, `kelas`, `hp`, `id_kelas`) VALUES
(29520732, 'Asep Udin ', 'Laki-Laki', 'X', 2147483647, 4),
(48331425, 'sasa', 'Perempuan', 'XII', 89832, 4),
(123435461, 'IDA BAGUS PRAWITA YASA', 'Laki-Laki', 'X', 8983, 5),
(123435467890, 'Suharna, SE, M.Pd', 'Laki-Laki', 'XII', 8983, 1);

--
-- Triggers `profile_siswa`
--
DELIMITER $$
CREATE TRIGGER `update_sisa_spp` AFTER UPDATE ON `profile_siswa` FOR EACH ROW BEGIN
    IF NEW.kelas <> OLD.kelas THEN
        UPDATE data_spp
        SET sisa_spp = sisa_spp +
            CASE NEW.kelas
                WHEN 'X' THEN 150000.00
                WHEN 'XI' THEN 160000.00
                WHEN 'XII' THEN 160000.00
                ELSE 0.00
            END
        WHERE id_data_spp = NEW.nisn;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `remembered_devices`
--

CREATE TABLE `remembered_devices` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `device_identifier` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `remembered_devices`
--

INSERT INTO `remembered_devices` (`id`, `user_id`, `device_identifier`) VALUES
(1, 2, '782ac7da63b36f401c5568493d2f3762');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `password` varchar(8) NOT NULL,
  `level` enum('Super admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `nama`, `password`, `level`) VALUES
(2, 'admin1', 'admin1', 'admin1', 'Super admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_kelas`
--
ALTER TABLE `data_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `data_spp`
--
ALTER TABLE `data_spp`
  ADD PRIMARY KEY (`id_data_spp`);

--
-- Indexes for table `history_spp`
--
ALTER TABLE `history_spp`
  ADD PRIMARY KEY (`id_spp`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `nisn` (`nisn`),
  ADD KEY `id_data_spp` (`id_data_spp`);

--
-- Indexes for table `profile_siswa`
--
ALTER TABLE `profile_siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `remembered_devices`
--
ALTER TABLE `remembered_devices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_device` (`user_id`,`device_identifier`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_kelas`
--
ALTER TABLE `data_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `history_spp`
--
ALTER TABLE `history_spp`
  MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `remembered_devices`
--
ALTER TABLE `remembered_devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
