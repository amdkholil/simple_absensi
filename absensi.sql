-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10 Sep 2017 pada 15.08
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id_absen` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jm_masuk` time NOT NULL,
  `st_masuk` varchar(15) NOT NULL,
  `jm_keluar` time NOT NULL,
  `st_keluar` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id_absen`, `id_user`, `tanggal`, `jm_masuk`, `st_masuk`, `jm_keluar`, `st_keluar`) VALUES
(1, 2, '2017-04-18', '07:00:00', 'Approved', '16:00:00', 'Approved'),
(2, 3, '2017-04-19', '02:48:57', 'Approved', '00:00:00', ''),
(4, 3, '2017-04-20', '03:31:06', 'Approved', '03:57:57', 'Approved'),
(5, 2, '2017-04-20', '03:59:40', 'Approved', '03:59:57', 'Approved'),
(6, 3, '2017-04-21', '04:21:47', 'Approved', '04:22:35', 'Approved'),
(7, 2, '2017-04-21', '04:52:12', 'Approved', '00:00:00', ''),
(8, 2, '2017-04-22', '04:00:15', 'Approved', '04:00:19', 'Approved'),
(9, 3, '2017-04-22', '04:43:49', 'Approved', '04:43:51', 'Approved'),
(10, 2, '2017-04-26', '01:14:14', 'Approved', '00:00:00', ''),
(11, 3, '2017-04-26', '02:00:16', 'Approved', '00:00:00', ''),
(12, 2, '2017-05-08', '03:09:48', 'Approved', '00:00:00', ''),
(13, 2, '2017-05-13', '04:22:51', 'Approved', '00:00:00', ''),
(14, 3, '2017-05-13', '05:36:38', 'Approved', '00:00:00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL,
  `email` varchar(32) NOT NULL,
  `level` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `level`) VALUES
(1, 'admin', 'admin', 'admin@admin', 'admin'),
(2, 'user', 'user', 'user@user', 'user'),
(3, 'ahmad', 'ahmad', 'ahmad@user', 'user'),
(4, 'kholil', 'kholil', 'kholil@admin', 'admin'),
(5, 'agus', 'agus', 'agus@user', 'user'),
(6, 'kharis', 'kharis', 'kharis@user', 'user'),
(7, 'yahya', 'yahya', 'yahya@user', 'user'),
(8, 'amin', 'amin', 'amin@user', 'user'),
(9, 'aaa', 'aaa', 'aaa@aaa', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
