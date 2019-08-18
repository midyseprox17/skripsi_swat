-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2019 at 07:02 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbuptd`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hak_akses`
--

CREATE TABLE `tbl_hak_akses` (
  `id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hak_akses`
--

INSERT INTO `tbl_hak_akses` (`id`, `nama`) VALUES
(001, 'admin'),
(002, 'kp');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `nip` char(18) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `pangkat` varchar(100) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `dihapus` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`id`, `nip`, `nama`, `pangkat`, `jabatan`, `dihapus`) VALUES
(001, '000000000000000000', 'UDIN', 'GM', 'Tukang Sapu', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `pegawai_id` int(3) UNSIGNED ZEROFILL DEFAULT NULL,
  `username` char(18) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `id_hak_akses` int(3) UNSIGNED ZEROFILL DEFAULT NULL,
  `dihapus` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `pegawai_id`, `username`, `password`, `id_hak_akses`, `dihapus`) VALUES
(001, 001, '1', '$2y$10$nRYbhJ2.BdqQ8GF5MKruyeHE9sy.LLds0iYTg2CT1wjBgrtzKMyMO', 001, '0');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_user_pegawai`
-- (See below for the actual view)
--
CREATE TABLE `v_user_pegawai` (
`id` int(3) unsigned zerofill
,`pegawai_id` int(3) unsigned zerofill
,`username` char(18)
,`password` varchar(200)
,`id_hak_akses` int(3) unsigned zerofill
,`nama` varchar(100)
,`jabatan` varchar(100)
,`pangkat` varchar(100)
,`dihapus` enum('0','1')
);

-- --------------------------------------------------------

--
-- Structure for view `v_user_pegawai`
--
DROP TABLE IF EXISTS `v_user_pegawai`;

CREATE VIEW `v_user_pegawai`  AS  (select `a`.`id` AS `id`,`a`.`pegawai_id` AS `pegawai_id`,`a`.`username` AS `username`,`a`.`password` AS `password`,`a`.`id_hak_akses` AS `id_hak_akses`,`b`.`nama` AS `nama`,`b`.`jabatan` AS `jabatan`,`b`.`pangkat` AS `pangkat`,`a`.`dihapus` AS `dihapus` from (`tbl_user` `a` left join `tbl_pegawai` `b` on(`a`.`pegawai_id` = `b`.`id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_user_ibfk_1` (`pegawai_id`),
  ADD KEY `id_hak_akses` (`id_hak_akses`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  MODIFY `id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  MODIFY `id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`pegawai_id`) REFERENCES `tbl_pegawai` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `tbl_user_ibfk_2` FOREIGN KEY (`id_hak_akses`) REFERENCES `tbl_hak_akses` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
