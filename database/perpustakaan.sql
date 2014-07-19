-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 17, 2014 at 01:49 PM
-- Server version: 5.5.37
-- PHP Version: 5.5.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE IF NOT EXISTS `buku` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul_buku` varchar(45) DEFAULT NULL,
  `kategori` varchar(45) DEFAULT NULL,
  `deskripsi` varchar(200) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `penerbit_id` int(11) NOT NULL,
  `penulis_id` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_buku_penerbit` (`penerbit_id`),
  KEY `fk_buku_penulis1` (`penulis_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE IF NOT EXISTS `penerbit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_penerbit` varchar(45) DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL,
  `no_tlp` varchar(45) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `sejarah` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=91 ;

-- --------------------------------------------------------

--
-- Table structure for table `penulis`
--

CREATE TABLE IF NOT EXISTS `penulis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_penulis` varchar(45) DEFAULT NULL,
  `gender` enum('Pria','Wanita') NOT NULL,
  `tgllahir` date NOT NULL,
  `status` enum('Lajang','Menikah') NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `Biografi` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `penulis`
--

INSERT INTO `penulis` (`id`, `nama_penulis`, `gender`, `tgllahir`, `status`, `alamat`, `Biografi`) VALUES
(1, 'dipa', 'Pria', '2014-07-15', 'Menikah', 'jalan', 'Lahir di Sebuah pedesaan yang sangat kumuh');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `remember_token`) VALUES
(1, 'admin', 'admin@gmail.com', 'eyJpdiI6IlEwSUxrZFE3QnpCZHlBRFwvQlFxYkI4YzJBS3B2RjFlempoVDVjb1I1dzRNPSIsInZhbHVlIjoicnpcL21HUUtKNjNGUDlja0tJQXN2cHUxQ1FJMWJGa091VytlTGhpVVliY0U9IiwibWFjIjoiMDRlZjM2OGI4NWQzZTAxYjczZDVlNDdiNTQ5MGMxNWNmYzgwODhiYjEzYzI5MDM4ZDRkM2VmNmFjNDg0ZWVjMiJ9', '8o9WW3fOepRcRXyvO89679PPcSZpPxV9WJmCeIxz9nEzOAfjkZgMqhetO1EN'),
(2, 'fandi', 'nunenuh@gmail.com', 'eyJpdiI6IkhKRlJNS0s2Y1FTbkp6cjBVdTh5SFE9PSIsInZhbHVlIjoiaVhvRStiYjJrZ1ZNbmFiMXkxR3B4Zz09IiwibWFjIjoiZTJkOTAyODllMjQwMDcwOTc2NzU4NDhiYjVhMWU1NTgyODdmZGUwYzcxN2M5YWQ0ZjEyZDU1NTUwOTg1ODIxZiJ9', NULL),
(3, 'haidar', 'haidar@gmail.com', 'eyJpdiI6ImZmM0loVnljeW53SkZRSGZPXC9ncUN3PT0iLCJ2YWx1ZSI6IkY1MTlReng1eGt5U0g0ZUoyZ1dOTWc9PSIsIm1hYyI6IjEyZDdlYmY2ZWQ4YmUwYzBjMjQyMDI0Y2IyMzYwNzQyNTFmZjUxZTA5NjdmMzM5YWMyOGRlMGIwZmE3ZmRlYTcifQ==', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `fk_buku_penerbit` FOREIGN KEY (`penerbit_id`) REFERENCES `penerbit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_buku_penulis1` FOREIGN KEY (`penulis_id`) REFERENCES `penulis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
