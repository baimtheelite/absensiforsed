-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 11 Jan 2019 pada 12.05
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id4789675_forsed`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--

CREATE TABLE `peserta` (
  `Id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL DEFAULT '',
  `tingkat` varchar(10) NOT NULL DEFAULT '',
  `jenis_lomba` varchar(30) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`Id`, `nama`, `tingkat`, `jenis_lomba`) VALUES
(1, 'Achmad Fauzan', 'SMA', 'futsal'),
(2, 'Ibrahim Ahmad', 'Dewasa', 'badminton'),
(5, 'Imaduddin', 'SMP', 'futsal'),
(6, 'Ilham', 'SD', 'futsal'),
(7, 'Ibrahim Ahmad', 'Dewasa', 'futsal'),
(10, 'Ridho Kurnia', 'SMA', 'futsal'),
(11, 'Fauzi Azima', 'SMP', 'futsal'),
(14, 'Nurul Mukhlis', 'Dewasa', 'futsal'),
(16, 'Hafizh Riztyan', 'SMA', 'futsal'),
(19, 'Valen', 'SD', 'futsal'),
(20, 'Achmad Fauzan', 'SMA', 'badminton'),
(21, 'Fauzi Azima', 'SMP', 'badminton'),
(22, 'Akmal', 'SMP', 'badminton'),
(27, 'asd', 'Pilih Ting', 'sepakbola'),
(28, 'Tatang', 'SMP', 'futsal'),
(29, 'Dendy', 'SD', 'badminton'),
(30, 'Tamim', 'SMP', 'badminton'),
(31, 'Eka Jima', 'SMA', 'badminton'),
(32, 'Deden', 'SMA', 'badminton'),
(33, 'Rozak Vrisando', 'Dewasa', 'badminton'),
(34, 'Irsyad Waliuddin Wafi', 'Dewasa', 'badminton'),
(35, 'Valen', 'SD', 'badminton'),
(36, 'Fery', 'SD', 'badminton'),
(37, 'Sasa', 'SMP', 'badminton'),
(38, 'Rijal Mursalat', 'Dewasa', 'badminton'),
(39, 'Padlan Imaduddin', 'Dewasa', 'badminton'),
(40, 'Riko Purnama', 'SMA', 'futsal'),
(41, 'Madun', 'SMA', 'sepakbola');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(35) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_anggota`
--

CREATE TABLE `tbl_anggota` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `alamat` text NOT NULL,
  `notelp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_anggota`
--

INSERT INTO `tbl_anggota` (`id`, `nama`, `alamat`, `notelp`) VALUES
(1, 'Ibrahim Ahmad Jabar', 'RT 02', '-'),
(3, 'Achmad Fauzan', 'RT 03', '-'),
(4, 'Lulu Mujadidah', 'RT 01', '-'),
(5, 'Padlan Imaduddin', 'RT 03', '-'),
(6, 'Tamimma Riziq', 'RT 01', '-'),
(7, 'Ihda Malik Al-Ardla', 'RT 01', '-'),
(8, 'Lingga Asa Prabowo', 'RT 02', '-'),
(9, 'Habsari Nursholihah', 'RT 03', '-'),
(10, 'Amalia Tussholihah', 'RT 03', '-'),
(11, 'Nufur Sabilillah', 'RT 01', '-'),
(12, 'Rara Zakiah', 'RT 01', '-'),
(13, 'Ranni Willian', 'RT 01', '-'),
(14, 'Kautsaroh Alfi Naimah', 'RT 01', '-'),
(15, 'Qashratu Thorfi Ainun', 'RT 01', '-'),
(16, 'Inka Marliana Putri', 'RT 03', '-'),
(18, 'Hesti Ningrum', 'RT 01', '-'),
(19, 'Irsyad Waliuddin', 'RT 02', '-'),
(20, 'Siska Feronika', 'RT 02', '-'),
(21, 'Alvina Anggraeni', 'RT 01', '-'),
(22, 'Abdurrahman Al Faruq', 'RT 03', '-'),
(23, 'Nurlia Rahmawati', 'RT 03', '-'),
(44, 'Ridho Kurnia Aminulloh', 'RT 01', '-'),
(45, 'Rozak Vrisando', 'RT 02', '-'),
(46, 'Bella Silvia Lestari', 'RT 01', '-'),
(47, 'Muhammad Ilham Fauzi', 'RT 02', '-'),
(48, 'Rafida Ramadhani', 'RT 01', '-'),
(49, 'Naufal Dimas', 'RT 02', '-'),
(50, 'Istiqomah', 'RT 01', '-'),
(53, 'Mutiara Sari', 'RT 03', '-'),
(54, 'Ahmad Auzan Varian', 'RT 01', '-'),
(55, 'Dhea Fitria', 'RT 03', '-'),
(56, 'Rosdianatul Jannah', 'RT 03', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kehadiran`
--

CREATE TABLE `tbl_kehadiran` (
  `id_tgl` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `hadir` enum('Hadir','Alpha') NOT NULL,
  `muhadir` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kehadiran`
--

INSERT INTO `tbl_kehadiran` (`id_tgl`, `id`, `tanggal`, `hadir`, `muhadir`) VALUES
(1, 3, '2018-02-10', 'Hadir', 'Abi Indra'),
(1, 10, '2018-02-10', 'Hadir', 'Abi Indra'),
(1, 9, '2018-02-10', 'Hadir', 'Abi Indra'),
(1, 1, '2018-02-10', 'Hadir', 'Abi Indra'),
(1, 7, '2018-02-10', 'Hadir', 'Abi Indra'),
(1, 16, '2018-02-10', 'Hadir', 'Abi Indra'),
(1, 17, '2018-02-10', 'Hadir', 'Abi Indra'),
(1, 14, '2018-02-10', 'Hadir', 'Abi Indra'),
(1, 8, '2018-02-10', 'Hadir', 'Abi Indra'),
(1, 4, '2018-02-10', 'Hadir', 'Abi Indra'),
(1, 11, '2018-02-10', 'Hadir', 'Abi Indra'),
(1, 5, '2018-02-10', 'Hadir', 'Abi Indra'),
(1, 15, '2018-02-10', 'Hadir', 'Abi Indra'),
(1, 13, '2018-02-10', 'Hadir', 'Abi Indra'),
(1, 12, '2018-02-10', 'Hadir', 'Abi Indra'),
(1, 6, '2018-02-10', 'Hadir', 'Abi Indra'),
(2, 22, '2018-02-17', 'Hadir', 'Abi Undang'),
(2, 3, '2018-02-17', 'Hadir', 'Abi Undang'),
(2, 21, '2018-02-17', 'Hadir', 'Abi Undang'),
(2, 10, '2018-02-17', 'Hadir', 'Abi Undang'),
(2, 9, '2018-02-17', 'Hadir', 'Abi Undang'),
(2, 18, '2018-02-17', 'Hadir', 'Abi Undang'),
(2, 1, '2018-02-17', 'Hadir', 'Abi Undang'),
(2, 7, '2018-02-17', 'Hadir', 'Abi Undang'),
(2, 16, '2018-02-17', 'Hadir', 'Abi Undang'),
(2, 19, '2018-02-17', 'Hadir', 'Abi Undang'),
(2, 14, '2018-02-17', 'Hadir', 'Abi Undang'),
(2, 8, '2018-02-17', 'Hadir', 'Abi Undang'),
(2, 4, '2018-02-17', 'Alpha', 'Abi Undang'),
(2, 11, '2018-02-17', 'Hadir', 'Abi Undang'),
(2, 23, '2018-02-17', 'Hadir', 'Abi Undang'),
(2, 5, '2018-02-17', 'Hadir', 'Abi Undang'),
(2, 15, '2018-02-17', 'Hadir', 'Abi Undang'),
(2, 13, '2018-02-17', 'Alpha', 'Abi Undang'),
(2, 12, '2018-02-17', 'Hadir', 'Abi Undang'),
(2, 20, '2018-02-17', 'Hadir', 'Abi Undang'),
(2, 6, '2018-02-17', 'Hadir', 'Abi Undang'),
(3, 22, '2018-02-24', 'Alpha', 'Ustad Samsu'),
(3, 3, '2018-02-24', 'Hadir', 'Ustad Samsu'),
(3, 21, '2018-02-24', 'Alpha', 'Ustad Samsu'),
(3, 10, '2018-02-24', 'Hadir', 'Ustad Samsu'),
(3, 46, '2018-02-24', 'Hadir', 'Ustad Samsu'),
(3, 9, '2018-02-24', 'Hadir', 'Ustad Samsu'),
(3, 18, '2018-02-24', 'Alpha', 'Ustad Samsu'),
(3, 1, '2018-02-24', 'Hadir', 'Ustad Samsu'),
(3, 7, '2018-02-24', 'Hadir', 'Ustad Samsu'),
(3, 16, '2018-02-24', 'Hadir', 'Ustad Samsu'),
(3, 19, '2018-02-24', 'Alpha', 'Ustad Samsu'),
(3, 14, '2018-02-24', 'Hadir', 'Ustad Samsu'),
(3, 8, '2018-02-24', 'Hadir', 'Ustad Samsu'),
(3, 4, '2018-02-24', 'Alpha', 'Ustad Samsu'),
(3, 47, '2018-02-24', 'Hadir', 'Ustad Samsu'),
(3, 11, '2018-02-24', 'Hadir', 'Ustad Samsu'),
(3, 23, '2018-02-24', 'Alpha', 'Ustad Samsu'),
(3, 5, '2018-02-24', 'Hadir', 'Ustad Samsu'),
(3, 15, '2018-02-24', 'Hadir', 'Ustad Samsu'),
(3, 13, '2018-02-24', 'Alpha', 'Ustad Samsu'),
(3, 12, '2018-02-24', 'Hadir', 'Ustad Samsu'),
(3, 44, '2018-02-24', 'Hadir', 'Ustad Samsu'),
(3, 45, '2018-02-24', 'Hadir', 'Ustad Samsu'),
(3, 20, '2018-02-24', 'Alpha', 'Ustad Samsu'),
(3, 6, '2018-02-24', 'Hadir', 'Ustad Samsu'),
(4, 22, '2018-03-03', 'Hadir', 'Abi Ali Imron'),
(4, 3, '2018-03-03', 'Hadir', 'Abi Ali Imron'),
(4, 21, '2018-03-03', 'Alpha', 'Abi Ali Imron'),
(4, 10, '2018-03-03', 'Alpha', 'Abi Ali Imron'),
(4, 46, '2018-03-03', 'Alpha', 'Abi Ali Imron'),
(4, 9, '2018-03-03', 'Alpha', 'Abi Ali Imron'),
(4, 18, '2018-03-03', 'Alpha', 'Abi Ali Imron'),
(4, 1, '2018-03-03', 'Hadir', 'Abi Ali Imron'),
(4, 7, '2018-03-03', 'Hadir', 'Abi Ali Imron'),
(4, 16, '2018-03-03', 'Hadir', 'Abi Ali Imron'),
(4, 19, '2018-03-03', 'Hadir', 'Abi Ali Imron'),
(4, 14, '2018-03-03', 'Hadir', 'Abi Ali Imron'),
(4, 8, '2018-03-03', 'Hadir', 'Abi Ali Imron'),
(4, 4, '2018-03-03', 'Alpha', 'Abi Ali Imron'),
(4, 47, '2018-03-03', 'Hadir', 'Abi Ali Imron'),
(4, 49, '2018-03-03', 'Hadir', 'Abi Ali Imron'),
(4, 11, '2018-03-03', 'Hadir', 'Abi Ali Imron'),
(4, 23, '2018-03-03', 'Alpha', 'Abi Ali Imron'),
(4, 5, '2018-03-03', 'Hadir', 'Abi Ali Imron'),
(4, 15, '2018-03-03', 'Hadir', 'Abi Ali Imron'),
(4, 48, '2018-03-03', 'Hadir', 'Abi Ali Imron'),
(4, 13, '2018-03-03', 'Alpha', 'Abi Ali Imron'),
(4, 12, '2018-03-03', 'Hadir', 'Abi Ali Imron'),
(4, 44, '2018-03-03', 'Alpha', 'Abi Ali Imron'),
(4, 45, '2018-03-03', 'Hadir', 'Abi Ali Imron'),
(4, 20, '2018-03-03', 'Alpha', 'Abi Ali Imron'),
(4, 6, '2018-03-03', 'Hadir', 'Abi Ali Imron'),
(5, 22, '2018-03-10', 'Hadir', 'Abi Indra'),
(5, 3, '2018-03-10', 'Hadir', 'Abi Indra'),
(5, 21, '2018-03-10', 'Hadir', 'Abi Indra'),
(5, 10, '2018-03-10', 'Hadir', 'Abi Indra'),
(5, 46, '2018-03-10', 'Alpha', 'Abi Indra'),
(5, 9, '2018-03-10', 'Hadir', 'Abi Indra'),
(5, 18, '2018-03-10', 'Hadir', 'Abi Indra'),
(5, 1, '2018-03-10', 'Hadir', 'Abi Indra'),
(5, 7, '2018-03-10', 'Alpha', 'Abi Indra'),
(5, 16, '2018-03-10', 'Alpha', 'Abi Indra'),
(5, 19, '2018-03-10', 'Alpha', 'Abi Indra'),
(5, 50, '2018-03-10', 'Hadir', 'Abi Indra'),
(5, 14, '2018-03-10', 'Hadir', 'Abi Indra'),
(5, 8, '2018-03-10', 'Hadir', 'Abi Indra'),
(5, 4, '2018-03-10', 'Hadir', 'Abi Indra'),
(5, 47, '2018-03-10', 'Alpha', 'Abi Indra'),
(5, 49, '2018-03-10', 'Alpha', 'Abi Indra'),
(5, 11, '2018-03-10', 'Hadir', 'Abi Indra'),
(5, 23, '2018-03-10', 'Hadir', 'Abi Indra'),
(5, 5, '2018-03-10', 'Hadir', 'Abi Indra'),
(5, 15, '2018-03-10', 'Hadir', 'Abi Indra'),
(5, 48, '2018-03-10', 'Hadir', 'Abi Indra'),
(5, 13, '2018-03-10', 'Hadir', 'Abi Indra'),
(5, 12, '2018-03-10', 'Hadir', 'Abi Indra'),
(5, 44, '2018-03-10', 'Alpha', 'Abi Indra'),
(5, 45, '2018-03-10', 'Alpha', 'Abi Indra'),
(5, 20, '2018-03-10', 'Alpha', 'Abi Indra'),
(5, 6, '2018-03-10', 'Hadir', 'Abi Indra'),
(6, 22, '2018-03-17', 'Alpha', 'Abi Ali Imron'),
(6, 3, '2018-03-17', 'Alpha', 'Abi Ali Imron'),
(6, 21, '2018-03-17', 'Hadir', 'Abi Ali Imron'),
(6, 10, '2018-03-17', 'Hadir', 'Abi Ali Imron'),
(6, 46, '2018-03-17', 'Alpha', 'Abi Ali Imron'),
(6, 9, '2018-03-17', 'Hadir', 'Abi Ali Imron'),
(6, 18, '2018-03-17', 'Alpha', 'Abi Ali Imron'),
(6, 1, '2018-03-17', 'Hadir', 'Abi Ali Imron'),
(6, 7, '2018-03-17', 'Hadir', 'Abi Ali Imron'),
(6, 16, '2018-03-17', 'Hadir', 'Abi Ali Imron'),
(6, 19, '2018-03-17', 'Alpha', 'Abi Ali Imron'),
(6, 50, '2018-03-17', 'Hadir', 'Abi Ali Imron'),
(6, 14, '2018-03-17', 'Hadir', 'Abi Ali Imron'),
(6, 8, '2018-03-17', 'Hadir', 'Abi Ali Imron'),
(6, 4, '2018-03-17', 'Hadir', 'Abi Ali Imron'),
(6, 47, '2018-03-17', 'Alpha', 'Abi Ali Imron'),
(6, 49, '2018-03-17', 'Hadir', 'Abi Ali Imron'),
(6, 11, '2018-03-17', 'Alpha', 'Abi Ali Imron'),
(6, 23, '2018-03-17', 'Hadir', 'Abi Ali Imron'),
(6, 5, '2018-03-17', 'Alpha', 'Abi Ali Imron'),
(6, 15, '2018-03-17', 'Hadir', 'Abi Ali Imron'),
(6, 48, '2018-03-17', 'Hadir', 'Abi Ali Imron'),
(6, 13, '2018-03-17', 'Hadir', 'Abi Ali Imron'),
(6, 12, '2018-03-17', 'Hadir', 'Abi Ali Imron'),
(6, 44, '2018-03-17', 'Hadir', 'Abi Ali Imron'),
(6, 45, '2018-03-17', 'Alpha', 'Abi Ali Imron'),
(6, 20, '2018-03-17', 'Alpha', 'Abi Ali Imron'),
(6, 6, '2018-03-17', 'Hadir', 'Abi Ali Imron'),
(7, 22, '2018-03-24', 'Hadir', 'Abi Indra'),
(7, 3, '2018-03-24', 'Hadir', 'Abi Indra'),
(7, 21, '2018-03-24', 'Hadir', 'Abi Indra'),
(7, 10, '2018-03-24', 'Hadir', 'Abi Indra'),
(7, 46, '2018-03-24', 'Alpha', 'Abi Indra'),
(7, 9, '2018-03-24', 'Hadir', 'Abi Indra'),
(7, 52, '2018-03-24', 'Alpha', 'Abi Indra'),
(7, 18, '2018-03-24', 'Alpha', 'Abi Indra'),
(7, 1, '2018-03-24', 'Hadir', 'Abi Indra'),
(7, 7, '2018-03-24', 'Hadir', 'Abi Indra'),
(7, 16, '2018-03-24', 'Alpha', 'Abi Indra'),
(7, 19, '2018-03-24', 'Alpha', 'Abi Indra'),
(7, 50, '2018-03-24', 'Alpha', 'Abi Indra'),
(7, 14, '2018-03-24', 'Hadir', 'Abi Indra'),
(7, 8, '2018-03-24', 'Hadir', 'Abi Indra'),
(7, 4, '2018-03-24', 'Hadir', 'Abi Indra'),
(7, 47, '2018-03-24', 'Alpha', 'Abi Indra'),
(7, 53, '2018-03-24', 'Hadir', 'Abi Indra'),
(7, 49, '2018-03-24', 'Alpha', 'Abi Indra'),
(7, 11, '2018-03-24', 'Hadir', 'Abi Indra'),
(7, 23, '2018-03-24', 'Hadir', 'Abi Indra'),
(7, 5, '2018-03-24', 'Alpha', 'Abi Indra'),
(7, 15, '2018-03-24', 'Hadir', 'Abi Indra'),
(7, 48, '2018-03-24', 'Hadir', 'Abi Indra'),
(7, 13, '2018-03-24', 'Alpha', 'Abi Indra'),
(7, 12, '2018-03-24', 'Hadir', 'Abi Indra'),
(7, 44, '2018-03-24', 'Alpha', 'Abi Indra'),
(7, 45, '2018-03-24', 'Alpha', 'Abi Indra'),
(7, 20, '2018-03-24', 'Alpha', 'Abi Indra'),
(7, 6, '2018-03-24', 'Hadir', 'Abi Indra'),
(8, 22, '2018-03-31', 'Hadir', 'Abi Ali Imron'),
(8, 3, '2018-03-31', 'Hadir', 'Abi Ali Imron'),
(8, 54, '2018-03-31', 'Hadir', 'Abi Ali Imron'),
(8, 21, '2018-03-31', 'Hadir', 'Abi Ali Imron'),
(8, 10, '2018-03-31', 'Alpha', 'Abi Ali Imron'),
(8, 46, '2018-03-31', 'Hadir', 'Abi Ali Imron'),
(8, 9, '2018-03-31', 'Alpha', 'Abi Ali Imron'),
(8, 18, '2018-03-31', 'Alpha', 'Abi Ali Imron'),
(8, 1, '2018-03-31', 'Hadir', 'Abi Ali Imron'),
(8, 7, '2018-03-31', 'Hadir', 'Abi Ali Imron'),
(8, 16, '2018-03-31', 'Alpha', 'Abi Ali Imron'),
(8, 19, '2018-03-31', 'Hadir', 'Abi Ali Imron'),
(8, 50, '2018-03-31', 'Alpha', 'Abi Ali Imron'),
(8, 14, '2018-03-31', 'Hadir', 'Abi Ali Imron'),
(8, 8, '2018-03-31', 'Alpha', 'Abi Ali Imron'),
(8, 4, '2018-03-31', 'Hadir', 'Abi Ali Imron'),
(8, 47, '2018-03-31', 'Hadir', 'Abi Ali Imron'),
(8, 53, '2018-03-31', 'Alpha', 'Abi Ali Imron'),
(8, 49, '2018-03-31', 'Alpha', 'Abi Ali Imron'),
(8, 11, '2018-03-31', 'Hadir', 'Abi Ali Imron'),
(8, 23, '2018-03-31', 'Alpha', 'Abi Ali Imron'),
(8, 5, '2018-03-31', 'Hadir', 'Abi Ali Imron'),
(8, 15, '2018-03-31', 'Hadir', 'Abi Ali Imron'),
(8, 48, '2018-03-31', 'Alpha', 'Abi Ali Imron'),
(8, 13, '2018-03-31', 'Hadir', 'Abi Ali Imron'),
(8, 12, '2018-03-31', 'Hadir', 'Abi Ali Imron'),
(8, 44, '2018-03-31', 'Alpha', 'Abi Ali Imron'),
(8, 45, '2018-03-31', 'Hadir', 'Abi Ali Imron'),
(8, 20, '2018-03-31', 'Alpha', 'Abi Ali Imron'),
(8, 6, '2018-03-31', 'Hadir', 'Abi Ali Imron'),
(9, 22, '2018-04-07', 'Alpha', 'Abi Indra'),
(9, 3, '2018-04-07', 'Hadir', 'Abi Indra'),
(9, 54, '2018-04-07', 'Alpha', 'Abi Indra'),
(9, 21, '2018-04-07', 'Hadir', 'Abi Indra'),
(9, 10, '2018-04-07', 'Hadir', 'Abi Indra'),
(9, 46, '2018-04-07', 'Alpha', 'Abi Indra'),
(9, 55, '2018-04-07', 'Hadir', 'Abi Indra'),
(9, 9, '2018-04-07', 'Hadir', 'Abi Indra'),
(9, 18, '2018-04-07', 'Alpha', 'Abi Indra'),
(9, 1, '2018-04-07', 'Hadir', 'Abi Indra'),
(9, 7, '2018-04-07', 'Hadir', 'Abi Indra'),
(9, 16, '2018-04-07', 'Hadir', 'Abi Indra'),
(9, 19, '2018-04-07', 'Alpha', 'Abi Indra'),
(9, 50, '2018-04-07', 'Alpha', 'Abi Indra'),
(9, 14, '2018-04-07', 'Hadir', 'Abi Indra'),
(9, 8, '2018-04-07', 'Alpha', 'Abi Indra'),
(9, 4, '2018-04-07', 'Alpha', 'Abi Indra'),
(9, 47, '2018-04-07', 'Alpha', 'Abi Indra'),
(9, 53, '2018-04-07', 'Hadir', 'Abi Indra'),
(9, 49, '2018-04-07', 'Alpha', 'Abi Indra'),
(9, 11, '2018-04-07', 'Hadir', 'Abi Indra'),
(9, 23, '2018-04-07', 'Hadir', 'Abi Indra'),
(9, 5, '2018-04-07', 'Hadir', 'Abi Indra'),
(9, 15, '2018-04-07', 'Hadir', 'Abi Indra'),
(9, 48, '2018-04-07', 'Alpha', 'Abi Indra'),
(9, 13, '2018-04-07', 'Alpha', 'Abi Indra'),
(9, 12, '2018-04-07', 'Hadir', 'Abi Indra'),
(9, 44, '2018-04-07', 'Hadir', 'Abi Indra'),
(9, 45, '2018-04-07', 'Alpha', 'Abi Indra'),
(9, 20, '2018-04-07', 'Alpha', 'Abi Indra'),
(9, 6, '2018-04-07', 'Hadir', 'Abi Indra'),
(10, 22, '2018-04-14', 'Hadir', 'Abi Indra'),
(10, 3, '2018-04-14', 'Hadir', 'Abi Indra'),
(10, 54, '2018-04-14', 'Alpha', 'Abi Indra'),
(10, 21, '2018-04-14', 'Alpha', 'Abi Indra'),
(10, 10, '2018-04-14', 'Hadir', 'Abi Indra'),
(10, 46, '2018-04-14', 'Alpha', 'Abi Indra'),
(10, 55, '2018-04-14', 'Alpha', 'Abi Indra'),
(10, 9, '2018-04-14', 'Alpha', 'Abi Indra'),
(10, 18, '2018-04-14', 'Alpha', 'Abi Indra'),
(10, 1, '2018-04-14', 'Hadir', 'Abi Indra'),
(10, 7, '2018-04-14', 'Alpha', 'Abi Indra'),
(10, 16, '2018-04-14', 'Alpha', 'Abi Indra'),
(10, 19, '2018-04-14', 'Hadir', 'Abi Indra'),
(10, 50, '2018-04-14', 'Alpha', 'Abi Indra'),
(10, 14, '2018-04-14', 'Hadir', 'Abi Indra'),
(10, 8, '2018-04-14', 'Hadir', 'Abi Indra'),
(10, 4, '2018-04-14', 'Hadir', 'Abi Indra'),
(10, 47, '2018-04-14', 'Hadir', 'Abi Indra'),
(10, 53, '2018-04-14', 'Alpha', 'Abi Indra'),
(10, 49, '2018-04-14', 'Alpha', 'Abi Indra'),
(10, 11, '2018-04-14', 'Hadir', 'Abi Indra'),
(10, 23, '2018-04-14', 'Alpha', 'Abi Indra'),
(10, 5, '2018-04-14', 'Alpha', 'Abi Indra'),
(10, 15, '2018-04-14', 'Hadir', 'Abi Indra'),
(10, 48, '2018-04-14', 'Alpha', 'Abi Indra'),
(10, 13, '2018-04-14', 'Hadir', 'Abi Indra'),
(10, 12, '2018-04-14', 'Hadir', 'Abi Indra'),
(10, 44, '2018-04-14', 'Hadir', 'Abi Indra'),
(10, 56, '2018-04-14', 'Hadir', 'Abi Indra'),
(10, 45, '2018-04-14', 'Alpha', 'Abi Indra'),
(10, 20, '2018-04-14', 'Alpha', 'Abi Indra'),
(10, 6, '2018-04-14', 'Hadir', 'Abi Indra'),
(11, 22, '2018-06-23', 'Hadir', 'Abi Indra'),
(11, 3, '2018-06-23', 'Hadir', 'Abi Indra'),
(11, 54, '2018-06-23', 'Hadir', 'Abi Indra'),
(11, 21, '2018-06-23', 'Alpha', 'Abi Indra'),
(11, 10, '2018-06-23', 'Alpha', 'Abi Indra'),
(11, 46, '2018-06-23', 'Alpha', 'Abi Indra'),
(11, 55, '2018-06-23', 'Alpha', 'Abi Indra'),
(11, 9, '2018-06-23', 'Alpha', 'Abi Indra'),
(11, 18, '2018-06-23', 'Alpha', 'Abi Indra'),
(11, 1, '2018-06-23', 'Hadir', 'Abi Indra'),
(11, 7, '2018-06-23', 'Hadir', 'Abi Indra'),
(11, 16, '2018-06-23', 'Alpha', 'Abi Indra'),
(11, 19, '2018-06-23', 'Alpha', 'Abi Indra'),
(11, 50, '2018-06-23', 'Alpha', 'Abi Indra'),
(11, 14, '2018-06-23', 'Alpha', 'Abi Indra'),
(11, 8, '2018-06-23', 'Hadir', 'Abi Indra'),
(11, 4, '2018-06-23', 'Hadir', 'Abi Indra'),
(11, 47, '2018-06-23', 'Alpha', 'Abi Indra'),
(11, 53, '2018-06-23', 'Alpha', 'Abi Indra'),
(11, 49, '2018-06-23', 'Alpha', 'Abi Indra'),
(11, 11, '2018-06-23', 'Alpha', 'Abi Indra'),
(11, 23, '2018-06-23', 'Alpha', 'Abi Indra'),
(11, 5, '2018-06-23', 'Alpha', 'Abi Indra'),
(11, 15, '2018-06-23', 'Alpha', 'Abi Indra'),
(11, 48, '2018-06-23', 'Alpha', 'Abi Indra'),
(11, 13, '2018-06-23', 'Alpha', 'Abi Indra'),
(11, 12, '2018-06-23', 'Alpha', 'Abi Indra'),
(11, 44, '2018-06-23', 'Hadir', 'Abi Indra'),
(11, 56, '2018-06-23', 'Alpha', 'Abi Indra'),
(11, 45, '2018-06-23', 'Alpha', 'Abi Indra'),
(11, 20, '2018-06-23', 'Alpha', 'Abi Indra'),
(11, 6, '2018-06-23', 'Hadir', 'Abi Indra'),
(12, 22, '2018-06-30', 'Alpha', 'Ustadz Samsu'),
(12, 3, '2018-06-30', 'Hadir', 'Ustadz Samsu'),
(12, 54, '2018-06-30', 'Alpha', 'Ustadz Samsu'),
(12, 21, '2018-06-30', 'Hadir', 'Ustadz Samsu'),
(12, 10, '2018-06-30', 'Hadir', 'Ustadz Samsu'),
(12, 46, '2018-06-30', 'Hadir', 'Ustadz Samsu'),
(12, 55, '2018-06-30', 'Alpha', 'Ustadz Samsu'),
(12, 9, '2018-06-30', 'Hadir', 'Ustadz Samsu'),
(12, 18, '2018-06-30', 'Alpha', 'Ustadz Samsu'),
(12, 1, '2018-06-30', 'Alpha', 'Ustadz Samsu'),
(12, 7, '2018-06-30', 'Alpha', 'Ustadz Samsu'),
(12, 16, '2018-06-30', 'Alpha', 'Ustadz Samsu'),
(12, 19, '2018-06-30', 'Alpha', 'Ustadz Samsu'),
(12, 50, '2018-06-30', 'Alpha', 'Ustadz Samsu'),
(12, 14, '2018-06-30', 'Hadir', 'Ustadz Samsu'),
(12, 8, '2018-06-30', 'Alpha', 'Ustadz Samsu'),
(12, 4, '2018-06-30', 'Alpha', 'Ustadz Samsu'),
(12, 47, '2018-06-30', 'Alpha', 'Ustadz Samsu'),
(12, 53, '2018-06-30', 'Alpha', 'Ustadz Samsu'),
(12, 49, '2018-06-30', 'Alpha', 'Ustadz Samsu'),
(12, 11, '2018-06-30', 'Alpha', 'Ustadz Samsu'),
(12, 23, '2018-06-30', 'Alpha', 'Ustadz Samsu'),
(12, 5, '2018-06-30', 'Alpha', 'Ustadz Samsu'),
(12, 15, '2018-06-30', 'Hadir', 'Ustadz Samsu'),
(12, 48, '2018-06-30', 'Alpha', 'Ustadz Samsu'),
(12, 13, '2018-06-30', 'Alpha', 'Ustadz Samsu'),
(12, 12, '2018-06-30', 'Alpha', 'Ustadz Samsu'),
(12, 44, '2018-06-30', 'Alpha', 'Ustadz Samsu'),
(12, 56, '2018-06-30', 'Alpha', 'Ustadz Samsu'),
(12, 45, '2018-06-30', 'Alpha', 'Ustadz Samsu'),
(12, 20, '2018-06-30', 'Alpha', 'Ustadz Samsu'),
(12, 6, '2018-06-30', 'Hadir', 'Ustadz Samsu');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`Id`);

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_kehadiran`
--
ALTER TABLE `tbl_kehadiran`
  ADD KEY `ID` (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `peserta`
--
ALTER TABLE `peserta`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
