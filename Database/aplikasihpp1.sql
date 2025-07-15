-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Agu 2022 pada 06.54
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasihpp1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `biaya_bahan_baku_aktual`
--

CREATE TABLE `biaya_bahan_baku_aktual` (
  `id_bb_aktual` int(11) NOT NULL,
  `nama_bb_aktual` varchar(200) NOT NULL,
  `panjang_bb_aktual` int(11) NOT NULL,
  `lebar_bb_aktual` int(11) NOT NULL,
  `tinggi_bb_aktual` int(11) NOT NULL,
  `satuan_bb_aktual` varchar(50) NOT NULL,
  `harga_bb_aktual` float NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `id_rincian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `biaya_bahan_baku_aktual`
--

INSERT INTO `biaya_bahan_baku_aktual` (`id_bb_aktual`, `nama_bb_aktual`, `panjang_bb_aktual`, `lebar_bb_aktual`, `tinggi_bb_aktual`, `satuan_bb_aktual`, `harga_bb_aktual`, `id_pesanan`, `id_rincian`) VALUES
(53, 'batu kali 60x60x60', 60, 60, 60, 'pcs', 70000, 12, 0),
(54, 'Batu kali 200x150x100', 200, 150, 100, 'pcs', 3000000, 15, 0),
(55, 'Batu Kali 50x50x50', 50, 50, 50, 'pcs', 60000, 16, 0),
(56, 'Batu kali 200x150x100', 200, 150, 100, 'pcs', 3000000, 17, 0),
(57, 'Batu Kali 50x50x50', 50, 50, 50, 'pcs', 60000, 13, 0),
(58, 'marmer 200x150x100', 200, 150, 100, 'pcs', 3200000, 18, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `biaya_bahan_baku_standar`
--

CREATE TABLE `biaya_bahan_baku_standar` (
  `id_bb_standar` int(5) NOT NULL,
  `nama_bb_standar` varchar(200) NOT NULL,
  `satuan_bb_standar` varchar(50) NOT NULL,
  `panjang_bb_standar` int(11) NOT NULL,
  `lebar_bb_standar` int(11) NOT NULL,
  `tinggi_bb_standar` int(11) NOT NULL,
  `harga_bb_standar` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `biaya_bahan_baku_standar`
--

INSERT INTO `biaya_bahan_baku_standar` (`id_bb_standar`, `nama_bb_standar`, `satuan_bb_standar`, `panjang_bb_standar`, `lebar_bb_standar`, `tinggi_bb_standar`, `harga_bb_standar`) VALUES
(1, 'batu kali 40x40x40', 'pcs', 40, 40, 40, 50000),
(2, 'Batu Kali 50x50x50', 'pcs', 50, 50, 50, 60000),
(3, 'batu kali 60x60x60', 'pcs', 60, 60, 60, 70000),
(4, 'Batu kali 70x70x70', 'pcs', 70, 70, 70, 100000),
(5, 'Batu kali 80x80x80', 'pcs', 80, 80, 80, 200000),
(6, 'Batu kali 100x100x100', 'pcs', 100, 100, 100, 400000),
(7, 'Batu kali 150x150x100', 'pcs', 150, 150, 100, 1000000),
(8, 'Batu kali 170x150x100', 'pcs', 170, 150, 100, 1700000),
(9, 'Batu kali 180x150x100', 'pcs', 180, 150, 100, 2000000),
(10, 'Batu kali 200x150x100', 'pcs', 200, 150, 100, 3000000),
(15, 'marmer 50x50', 'pcs', 50, 50, 50, 70000),
(16, 'marmer 60x60', 'pcs', 60, 60, 60, 80000),
(17, 'marmer 70x70', 'pcs', 70, 70, 70, 120000),
(18, 'marmer 80x80', 'pcs', 80, 80, 80, 210000),
(19, 'marmer 100x100x100', 'pcs', 100, 100, 100, 500000),
(20, 'marmer 150x150x100', 'pcs', 150, 150, 100, 1500000),
(21, 'Marmer 170x150x100', 'pcs', 170, 150, 100, 2000000),
(22, 'marmer 180x150x100', 'pcs', 180, 150, 100, 2500000),
(23, 'marmer 200x150x100', 'pcs', 200, 150, 100, 3200000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `biaya_tenaga_kerja_langsung_aktual`
--

CREATE TABLE `biaya_tenaga_kerja_langsung_aktual` (
  `id_btkl_aktual` int(11) NOT NULL,
  `nama_btkl_aktual` varchar(250) NOT NULL,
  `type_btkl_aktual` varchar(150) NOT NULL,
  `upah_btkl_aktual` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `id_rincian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `biaya_tenaga_kerja_langsung_aktual`
--

INSERT INTO `biaya_tenaga_kerja_langsung_aktual` (`id_btkl_aktual`, `nama_btkl_aktual`, `type_btkl_aktual`, `upah_btkl_aktual`, `id_pesanan`, `id_rincian`) VALUES
(74, 'watafel 60x60', 'pengrajin', 40000, 12, 0),
(75, 'Tenaga bantu', 'Serabut', 70000, 12, 0),
(76, 'meja 100x100', 'pengrajin', 40000, 15, 0),
(77, 'Tenaga bantu', 'Serabut', 70000, 15, 0),
(78, 'watafel 50x50', 'pengrajin', 35000, 16, 0),
(79, 'Tenaga bantu', 'Serabut', 70000, 16, 0),
(80, 'meja 100x100', 'pengrajin', 40000, 17, 0),
(81, 'Tenaga bantu', 'Serabut', 70000, 17, 0),
(82, 'watafel 50x50', 'pengrajin', 35000, 13, 0),
(83, 'Tenaga bantu', 'Serabut', 70000, 13, 0),
(84, 'bathub 180+', 'pengrajin', 75000, 18, 0),
(85, 'Tenaga bantu', 'Serabut', 70000, 18, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `biaya_tenaga_kerja_langsung_standar`
--

CREATE TABLE `biaya_tenaga_kerja_langsung_standar` (
  `id_btkl_standar` int(11) NOT NULL,
  `nama_btkl_standar` varchar(250) NOT NULL,
  `type_btkl_standar` varchar(150) NOT NULL,
  `upah_btkl_standar` float NOT NULL,
  `satuan_btkl_standar` varchar(20) NOT NULL,
  `jumlah_satuan_btkl_standar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `biaya_tenaga_kerja_langsung_standar`
--

INSERT INTO `biaya_tenaga_kerja_langsung_standar` (`id_btkl_standar`, `nama_btkl_standar`, `type_btkl_standar`, `upah_btkl_standar`, `satuan_btkl_standar`, `jumlah_satuan_btkl_standar`) VALUES
(1, 'watafel 40x40', 'pengrajin', 30000, 'jam', 1),
(2, 'watafel 50x50', 'pengrajin', 35000, 'jam', 1),
(3, 'watafel 60x60', 'pengrajin', 40000, 'jam', 1),
(4, 'watafel 70x70', 'pengrajin', 45000, 'jam', 1),
(5, 'watafel 80x80', 'pengrajin', 50000, 'jam', 1),
(6, 'watafel 100x100', 'pengrajin', 60000, 'jam', 1),
(7, 'wastafel 100+', 'pengrajin', 75000, 'jam', 1),
(8, 'bathub 150', 'pengeajin', 50000, 'jam', 1),
(9, 'bathub 160', 'pengrajin', 55000, 'jam', 1),
(10, 'bathub 170', 'pengrajin', 60000, 'jam', 1),
(11, 'bathub 180', 'pengrajin', 65000, 'jam', 1),
(12, 'bathub 180+', 'pengrajin', 75000, 'jam', 1),
(13, 'meja 50x50', 'pengrajin', 25000, 'jam', 1),
(14, 'meja 60x60', 'pengrajin', 30000, 'jam', 1),
(15, 'meja 70x70', 'pengrajin', 35000, 'jam', 1),
(16, 'meja 100x100', 'pengrajin', 40000, 'jam', 1),
(17, 'meja 150', 'pengrajin', 50000, 'jam', 1),
(18, 'meja 150+', 'pengrajin', 65000, 'jam', 1),
(19, 'Tenaga bantu', 'Serabut', 70000, 'kemampuan', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bop_tetap_aktual`
--

CREATE TABLE `bop_tetap_aktual` (
  `id_tetap_aktual` int(11) NOT NULL,
  `nama_tetap_aktual` varchar(250) NOT NULL,
  `satuan_tetap_aktual` varchar(20) NOT NULL,
  `harga_tetap_aktual` float NOT NULL,
  `id_pesanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bop_tetap_aktual`
--

INSERT INTO `bop_tetap_aktual` (`id_tetap_aktual`, `nama_tetap_aktual`, `satuan_tetap_aktual`, `harga_tetap_aktual`, `id_pesanan`) VALUES
(54, 'depresiasi gergaji mesin', 'jam', 1000, 12),
(55, 'Servis Brostel Skrap		', 'jam', 500, 12),
(56, 'Servis Laker dan Angker Skrap		', 'jam', 1900, 12),
(57, 'Listrik gergaji mesin', 'jam', 720, 12),
(58, 'listrik gergaji skrap', 'jam', 360, 12),
(59, 'depresiasi gergaji mesin', 'jam', 1000, 15),
(60, 'Servis Brostel Skrap		', 'jam', 500, 15),
(61, 'Servis Laker dan Angker Skrap		', 'jam', 1900, 15),
(62, 'Listrik gergaji mesin', 'jam', 720, 15),
(63, 'listrik gergaji skrap', 'jam', 360, 15),
(64, 'Asuransi kerusakan wastafel 40x40', 'pesanan', 11000, 15),
(65, 'depresiasi gergaji mesin', 'jam', 1000, 16),
(66, 'Servis Brostel Skrap		', 'jam', 500, 16),
(67, 'Servis Laker dan Angker Skrap		', 'jam', 1900, 16),
(68, 'Listrik gergaji mesin', 'jam', 720, 16),
(69, 'listrik gergaji skrap', 'jam', 360, 16),
(70, 'depresiasi gergaji mesin', 'jam', 1000, 17),
(71, 'Servis Brostel Skrap		', 'jam', 500, 17),
(72, 'Servis Laker dan Angker Skrap		', 'jam', 1900, 17),
(73, 'Listrik gergaji mesin', 'jam', 720, 17),
(74, 'listrik gergaji skrap', 'jam', 360, 17),
(75, 'Asuransi kerusakan wastafel 40x40', 'pesanan', 11000, 17),
(76, 'depresiasi gergaji mesin', 'jam', 1000, 13),
(77, 'Servis Brostel Skrap		', 'jam', 500, 13),
(78, 'Servis Laker dan Angker Skrap		', 'jam', 1900, 13),
(79, 'Listrik gergaji mesin', 'jam', 720, 13),
(80, 'listrik gergaji skrap', 'jam', 360, 13),
(81, 'depresiasi gergaji mesin', 'jam', 1000, 18),
(82, 'Servis Brostel Skrap		', 'jam', 500, 18),
(83, 'Servis Laker dan Angker Skrap		', 'jam', 1900, 18),
(84, 'Listrik gergaji mesin', 'jam', 720, 18),
(85, 'listrik gergaji skrap', 'jam', 360, 18);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bop_tetap_standar`
--

CREATE TABLE `bop_tetap_standar` (
  `id_tetap_standar` int(11) NOT NULL,
  `nama_tetap_standar` varchar(250) NOT NULL,
  `satuan_tetap_standar` varchar(20) NOT NULL,
  `harga_tetap_standar` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bop_tetap_standar`
--

INSERT INTO `bop_tetap_standar` (`id_tetap_standar`, `nama_tetap_standar`, `satuan_tetap_standar`, `harga_tetap_standar`) VALUES
(3, 'depresiasi gergaji mesin', 'jam', 1000),
(4, 'Servis Brostel Skrap		', 'jam', 500),
(5, 'Servis Laker dan Angker Skrap		', 'jam', 1900),
(6, 'Listrik gergaji mesin', 'jam', 720),
(7, 'listrik gergaji skrap', 'jam', 360),
(8, 'Asuransi kerusakan wastafel 40x40', 'pesanan', 11000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bop_variabel_aktual`
--

CREATE TABLE `bop_variabel_aktual` (
  `id_variabel_aktual` int(11) NOT NULL,
  `nama_variabel_aktual` varchar(250) NOT NULL,
  `satuan_variabel_aktual` varchar(20) NOT NULL,
  `jumlah_satuan_variabel_aktual` int(11) NOT NULL,
  `harga_variabel_aktual` float NOT NULL,
  `id_pesanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bop_variabel_aktual`
--

INSERT INTO `bop_variabel_aktual` (`id_variabel_aktual`, `nama_variabel_aktual`, `satuan_variabel_aktual`, `jumlah_satuan_variabel_aktual`, `harga_variabel_aktual`, `id_pesanan`) VALUES
(41, 'Paku', 'packing', 1, 1000, 12),
(42, 'kayu', 'packing', 1, 14000, 12),
(43, 'piso poles', 'kemampuan', 8, 50000, 12),
(44, 'piso potong', 'kemampuan', 8, 50000, 12),
(45, 'makan', 'jam', 8, 1000, 12),
(46, 'Paku', 'packing', 1, 1000, 15),
(47, 'kayu', 'packing', 1, 14000, 15),
(48, 'piso poles', 'kemampuan', 8, 50000, 15),
(49, 'piso potong', 'kemampuan', 8, 50000, 15),
(50, 'makan', 'jam', 8, 1000, 15),
(51, 'Paku', 'packing', 1, 1000, 16),
(52, 'kayu', 'packing', 1, 14000, 16),
(53, 'piso poles', 'kemampuan', 8, 50000, 16),
(54, 'piso potong', 'kemampuan', 8, 50000, 16),
(55, 'makan', 'jam', 8, 1000, 16),
(56, 'Paku', 'packing', 1, 1000, 17),
(57, 'kayu', 'packing', 1, 14000, 17),
(58, 'piso poles', 'kemampuan', 8, 50000, 17),
(59, 'piso potong', 'kemampuan', 8, 50000, 17),
(60, 'makan', 'jam', 8, 1000, 17),
(61, 'Paku', 'packing', 1, 1000, 13),
(62, 'kayu', 'packing', 1, 14000, 13),
(63, 'piso poles', 'kemampuan', 8, 50000, 13),
(64, 'piso potong', 'kemampuan', 8, 50000, 13),
(65, 'makan', 'jam', 8, 1000, 13),
(66, 'Paku', 'packing', 1, 1000, 18),
(67, 'kayu', 'packing', 1, 14000, 18),
(68, 'piso poles', 'kemampuan', 8, 50000, 18),
(69, 'piso potong', 'kemampuan', 8, 50000, 18),
(70, 'makan', 'jam', 8, 1000, 18);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bop_variabel_standar`
--

CREATE TABLE `bop_variabel_standar` (
  `id_variabel_standar` int(11) NOT NULL,
  `nama_variabel_standar` varchar(250) NOT NULL,
  `satuan_variabel_standar` varchar(25) NOT NULL,
  `jumlah_satuan_variabel_standar` int(11) NOT NULL,
  `harga_variabel_standar` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bop_variabel_standar`
--

INSERT INTO `bop_variabel_standar` (`id_variabel_standar`, `nama_variabel_standar`, `satuan_variabel_standar`, `jumlah_satuan_variabel_standar`, `harga_variabel_standar`) VALUES
(3, 'Paku', 'packing', 1, 1000),
(4, 'kayu', 'packing', 1, 14000),
(8, 'piso poles', 'kemampuan', 8, 50000),
(9, 'piso potong', 'kemampuan', 8, 50000),
(10, 'makan', 'jam', 8, 1000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `custom_aktual`
--

CREATE TABLE `custom_aktual` (
  `id_custom_aktual` int(11) NOT NULL,
  `nama_custom_aktual` varchar(250) NOT NULL,
  `harga_custom_aktual` float NOT NULL,
  `satuan_custom_aktual` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `custom_standar`
--

CREATE TABLE `custom_standar` (
  `id_custom_standar` int(11) NOT NULL,
  `nama_custom_standar` varchar(250) NOT NULL,
  `harga_custom_standar` float NOT NULL,
  `satuan_custom_standar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `custom_standar`
--

INSERT INTO `custom_standar` (`id_custom_standar`, `nama_custom_standar`, `harga_custom_standar`, `satuan_custom_standar`) VALUES
(1, 'wastafel dari 40x40', 20000, 'produk'),
(2, 'bathub dari 180 x 100 x 70', 50000, 'produk'),
(3, 'meja dari 100 x 50', 10000, 'produk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hpp_actual`
--

CREATE TABLE `hpp_actual` (
  `id` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `id_rincian` int(11) NOT NULL,
  `kategori` longtext NOT NULL,
  `harga` float NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hpp_actual`
--

INSERT INTO `hpp_actual` (`id`, `id_pesanan`, `id_rincian`, `kategori`, `harga`, `qty`, `total`) VALUES
(111, 12, 3, '1', 70000, 1, 70000),
(112, 12, 3, '2', 40000, 2, 80000),
(113, 12, 19, '2', 70000, 8, 8750),
(114, 12, 3, '3', 1000, 2, 2000),
(115, 12, 4, '3', 500, 2, 1000),
(116, 12, 5, '3', 1900, 2, 3800),
(117, 12, 6, '3', 720, 2, 1440),
(118, 12, 7, '3', 360, 2, 720),
(119, 12, 3, '4', 1000, 1, 1000),
(120, 12, 4, '4', 14000, 1, 14000),
(121, 12, 8, '4', 50000, 8, 6250),
(122, 12, 9, '4', 50000, 8, 6250),
(123, 12, 10, '4', 1000, 2, 2000),
(124, 12, 1, '5', 20000, 1, 20000),
(129, 13, 2, '1', 60000, 1, 60000),
(130, 13, 2, '2', 35000, 2, 70000),
(131, 13, 19, '2', 70000, 8, 8750),
(132, 13, 3, '3', 1000, 2, 2000),
(133, 13, 4, '3', 500, 2, 1000),
(134, 13, 5, '3', 1900, 2, 3800),
(135, 13, 6, '3', 720, 2, 1440),
(136, 13, 7, '3', 360, 2, 720),
(137, 13, 3, '4', 1000, 1, 1000),
(138, 13, 4, '4', 14000, 1, 14000),
(139, 13, 8, '4', 50000, 8, 6250),
(140, 13, 9, '4', 50000, 8, 6250),
(141, 13, 10, '4', 1000, 2, 2000),
(142, 13, 1, '5', 20000, 1, 20000),
(144, 15, 10, '1', 3500000, 1, 3500000),
(145, 15, 16, '2', 40000, 2, 80000),
(146, 15, 19, '2', 70000, 5, 14000),
(147, 15, 3, '3', 1000, 2, 2000),
(148, 15, 4, '3', 500, 2, 1000),
(149, 15, 5, '3', 1900, 2, 3800),
(150, 15, 6, '3', 720, 2, 1440),
(151, 15, 7, '3', 360, 2, 720),
(152, 15, 8, '3', 11000, 1, 11000),
(153, 15, 3, '4', 1000, 1, 1000),
(154, 15, 4, '4', 14000, 1, 14000),
(155, 15, 8, '4', 50000, 5, 10000),
(156, 15, 9, '4', 50000, 5, 10000),
(157, 15, 10, '4', 1000, 2, 2000),
(158, 15, 3, '5', 10000, 1, 10000),
(202, 16, 2, '1', 60000, 1, 60000),
(203, 16, 2, '2', 35000, 2, 70000),
(204, 16, 19, '2', 70000, 8, 8750),
(205, 16, 3, '3', 1000, 2, 2000),
(206, 16, 4, '3', 500, 2, 1000),
(207, 16, 5, '3', 1900, 2, 3800),
(208, 16, 6, '3', 720, 2, 1440),
(209, 16, 7, '3', 360, 2, 720),
(210, 16, 3, '4', 1000, 1, 1000),
(211, 16, 4, '4', 14000, 1, 14000),
(212, 16, 8, '4', 50000, 8, 6250),
(213, 16, 9, '4', 50000, 8, 6250),
(214, 16, 10, '4', 1000, 1, 1000),
(215, 16, 3, '5', 10000, 1, 10000),
(216, 17, 10, '1', 3500000, 1, 3500000),
(217, 17, 16, '2', 40000, 4, 160000),
(218, 17, 19, '2', 70000, 4, 17500),
(219, 17, 3, '3', 1000, 4, 4000),
(220, 17, 4, '3', 500, 4, 2000),
(221, 17, 5, '3', 1900, 4, 7600),
(222, 17, 6, '3', 720, 4, 2880),
(223, 17, 7, '3', 360, 4, 1440),
(224, 17, 8, '3', 11000, 1, 11000),
(225, 17, 3, '4', 1000, 1, 1000),
(226, 17, 4, '4', 14000, 1, 14000),
(227, 17, 8, '4', 50000, 5, 10000),
(228, 17, 9, '4', 50000, 5, 10000),
(229, 17, 10, '4', 1000, 4, 4000),
(230, 17, 3, '5', 10000, 1, 10000),
(231, 18, 23, '1', 3200000, 1, 3200000),
(232, 18, 12, '2', 75000, 9, 675000),
(233, 18, 19, '2', 70000, 1, 70000),
(234, 18, 3, '3', 1000, 8, 8000),
(235, 18, 4, '3', 500, 8, 4000),
(236, 18, 5, '3', 1900, 8, 15200),
(237, 18, 6, '3', 720, 8, 5760),
(238, 18, 7, '3', 360, 8, 2880),
(239, 18, 3, '4', 1000, 1, 1000),
(240, 18, 4, '4', 14000, 1, 14000),
(241, 18, 8, '4', 50000, 1, 50000),
(242, 18, 9, '4', 50000, 1, 50000),
(243, 18, 10, '4', 1000, 8, 8000),
(244, 18, 2, '5', 50000, 1, 50000),
(259, 19, 2, '1', 60000, 1, 60000),
(260, 19, 2, '2', 35000, 3, 105000),
(261, 19, 19, '2', 70000, 3, 23333),
(262, 19, 3, '3', 1000, 2, 2000),
(263, 19, 4, '3', 500, 2, 1000),
(264, 19, 5, '3', 1900, 2, 3800),
(265, 19, 6, '3', 720, 2, 1440),
(266, 19, 7, '3', 360, 2, 720),
(267, 19, 3, '4', 1000, 1, 1000),
(268, 19, 4, '4', 14000, 1, 14000),
(269, 19, 8, '4', 50000, 8, 6250),
(270, 19, 9, '4', 50000, 8, 6250),
(271, 19, 10, '4', 1000, 2, 2000),
(272, 19, 1, '5', 20000, 1, 20000),
(301, 21, 1, '1', 45000, 1, 45000),
(302, 21, 3, '2', 40000, 2, 80000),
(303, 21, 19, '2', 70000, 8, 8750),
(304, 21, 3, '3', 1000, 2, 2000),
(305, 21, 4, '3', 500, 2, 1000),
(306, 21, 5, '3', 1900, 2, 3800),
(307, 21, 6, '3', 720, 2, 1440),
(308, 21, 7, '3', 360, 2, 720),
(309, 21, 3, '4', 1000, 1, 1000),
(310, 21, 4, '4', 14000, 1, 14000),
(311, 21, 8, '4', 50000, 8, 6250),
(312, 21, 9, '4', 50000, 8, 6250),
(313, 21, 10, '4', 1000, 2, 2000),
(314, 21, 1, '5', 20000, 1, 20000),
(315, 22, 10, '1', 3500000, 1, 3500000),
(316, 22, 16, '2', 40000, 2, 80000),
(317, 22, 19, '2', 70000, 5, 14000),
(318, 22, 3, '3', 1000, 2, 2000),
(319, 22, 4, '3', 500, 2, 1000),
(320, 22, 5, '3', 1900, 2, 3800),
(321, 22, 6, '3', 720, 2, 1440),
(322, 22, 7, '3', 360, 2, 720),
(323, 22, 8, '3', 11000, 1, 11000),
(324, 22, 3, '4', 1000, 1, 1000),
(325, 22, 4, '4', 14000, 1, 14000),
(326, 22, 8, '4', 50000, 5, 10000),
(327, 22, 9, '4', 50000, 5, 10000),
(328, 22, 10, '4', 1000, 2, 2000),
(329, 22, 3, '5', 10000, 1, 10000),
(330, 12, 0, '0', 0, 0, 0),
(331, 12, 0, '0', 0, 0, 0),
(332, 12, 0, '0', 0, 0, 0),
(333, 12, 0, '0', 0, 0, 0),
(334, 12, 0, '0', 0, 0, 0),
(335, 12, 0, '0', 0, 0, 0),
(336, 12, 0, '0', 0, 0, 0),
(337, 12, 0, '0', 0, 0, 0),
(338, 12, 0, '0', 0, 0, 0),
(339, 23, 6, '1', 380000, 1, 380000),
(340, 23, 16, '2', 40000, 2, 80000),
(341, 23, 19, '2', 70000, 6, 420000),
(342, 23, 3, '3', 1000, 2, 2000),
(343, 23, 4, '3', 500, 2, 1000),
(344, 23, 5, '3', 1900, 2, 3800),
(345, 23, 6, '3', 720, 2, 1440),
(346, 23, 7, '3', 360, 2, 720),
(347, 23, 8, '3', 11000, 1, 11000),
(348, 23, 3, '4', 1000, 1, 1000),
(349, 23, 4, '4', 14000, 1, 14000),
(350, 23, 8, '4', 50000, 5, 10000),
(351, 23, 9, '4', 50000, 5, 10000),
(352, 23, 10, '4', 1000, 2, 2000),
(353, 23, 3, '5', 10000, 1, 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hpp_standart`
--

CREATE TABLE `hpp_standart` (
  `id` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `id_rincian` int(11) NOT NULL,
  `kategori` longtext NOT NULL,
  `harga` float NOT NULL,
  `qty` int(11) NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `hpp_standart`
--

INSERT INTO `hpp_standart` (`id`, `id_pesanan`, `id_rincian`, `kategori`, `harga`, `qty`, `total`) VALUES
(214, 12, 3, '1', 70000, 1, 70000),
(215, 12, 3, '2', 40000, 2, 80000),
(216, 12, 19, '2', 70000, 8, 8750),
(217, 12, 3, '3', 1000, 2, 2000),
(218, 12, 4, '3', 500, 2, 1000),
(219, 12, 5, '3', 1900, 2, 3800),
(220, 12, 6, '3', 720, 2, 1440),
(221, 12, 7, '3', 360, 2, 720),
(222, 12, 3, '4', 1000, 1, 1000),
(223, 12, 4, '4', 14000, 1, 14000),
(224, 12, 8, '4', 50000, 8, 6250),
(225, 12, 9, '4', 50000, 8, 6250),
(226, 12, 10, '4', 1000, 2, 2000),
(227, 12, 1, '5', 20000, 1, 20000),
(256, 14, 3, '1', 70000, 1, 70000),
(257, 14, 3, '2', 40000, 2, 80000),
(258, 14, 19, '2', 70000, 8, 8750),
(259, 14, 3, '3', 1000, 2, 2000),
(260, 14, 4, '3', 500, 2, 1000),
(261, 14, 5, '3', 1900, 2, 3800),
(262, 14, 6, '3', 720, 2, 1440),
(263, 14, 7, '3', 360, 2, 720),
(264, 14, 3, '4', 1000, 1, 1000),
(265, 14, 4, '4', 14000, 1, 14000),
(266, 14, 8, '4', 50000, 8, 6250),
(267, 14, 9, '4', 50000, 8, 6250),
(268, 14, 10, '4', 1000, 2, 2000),
(269, 14, 1, '5', 20000, 1, 20000),
(274, 13, 2, '1', 60000, 1, 60000),
(275, 13, 2, '2', 35000, 2, 70000),
(276, 13, 19, '2', 70000, 8, 8750),
(277, 13, 3, '3', 1000, 2, 2000),
(278, 13, 4, '3', 500, 2, 1000),
(279, 13, 5, '3', 1900, 2, 3800),
(280, 13, 6, '3', 720, 2, 1440),
(281, 13, 7, '3', 360, 2, 720),
(282, 13, 3, '4', 1000, 1, 1000),
(283, 13, 4, '4', 14000, 1, 14000),
(284, 13, 8, '4', 50000, 8, 6250),
(285, 13, 9, '4', 50000, 8, 6250),
(286, 13, 10, '4', 1000, 2, 2000),
(287, 13, 1, '5', 20000, 1, 20000),
(290, 15, 10, '1', 3000000, 1, 3000000),
(291, 15, 16, '2', 40000, 2, 80000),
(292, 15, 19, '2', 70000, 5, 14000),
(293, 15, 3, '3', 1000, 2, 2000),
(294, 15, 4, '3', 500, 2, 1000),
(295, 15, 5, '3', 1900, 2, 3800),
(296, 15, 6, '3', 720, 2, 1440),
(297, 15, 7, '3', 360, 2, 720),
(298, 15, 8, '3', 11000, 1, 11000),
(299, 15, 3, '4', 1000, 1, 1000),
(300, 15, 4, '4', 14000, 1, 14000),
(301, 15, 8, '4', 50000, 5, 10000),
(302, 15, 9, '4', 50000, 5, 10000),
(303, 15, 10, '4', 1000, 2, 2000),
(304, 15, 3, '5', 10000, 1, 10000),
(391, 16, 2, '1', 60000, 1, 60000),
(392, 16, 2, '2', 35000, 2, 70000),
(393, 16, 19, '2', 70000, 8, 8750),
(394, 16, 3, '3', 1000, 2, 2000),
(395, 16, 4, '3', 500, 2, 1000),
(396, 16, 5, '3', 1900, 2, 3800),
(397, 16, 6, '3', 720, 2, 1440),
(398, 16, 7, '3', 360, 2, 720),
(399, 16, 3, '4', 1000, 1, 1000),
(400, 16, 4, '4', 14000, 1, 14000),
(401, 16, 8, '4', 50000, 8, 6250),
(402, 16, 9, '4', 50000, 8, 6250),
(403, 16, 10, '4', 1000, 2, 2000),
(404, 16, 3, '5', 10000, 1, 10000),
(405, 17, 10, '1', 3500000, 1, 3500000),
(406, 17, 16, '2', 40000, 4, 160000),
(407, 17, 19, '2', 70000, 4, 17500),
(408, 17, 3, '3', 1000, 4, 4000),
(409, 17, 4, '3', 500, 4, 2000),
(410, 17, 5, '3', 1900, 4, 7600),
(411, 17, 6, '3', 720, 4, 2880),
(412, 17, 7, '3', 360, 4, 1440),
(413, 17, 8, '3', 11000, 1, 11000),
(414, 17, 3, '4', 1000, 1, 1000),
(415, 17, 4, '4', 14000, 1, 14000),
(416, 17, 8, '4', 50000, 5, 10000),
(417, 17, 9, '4', 50000, 5, 10000),
(418, 17, 10, '4', 1000, 4, 4000),
(419, 17, 3, '5', 10000, 1, 10000),
(420, 18, 23, '1', 3200000, 1, 3200000),
(421, 18, 12, '2', 75000, 8, 600000),
(422, 18, 19, '2', 70000, 1, 70000),
(423, 18, 3, '3', 1000, 8, 8000),
(424, 18, 4, '3', 500, 8, 4000),
(425, 18, 5, '3', 1900, 8, 15200),
(426, 18, 6, '3', 720, 8, 5760),
(427, 18, 7, '3', 360, 8, 2880),
(428, 18, 3, '4', 1000, 1, 1000),
(429, 18, 4, '4', 14000, 1, 14000),
(430, 18, 8, '4', 50000, 1, 50000),
(431, 18, 9, '4', 50000, 1, 50000),
(432, 18, 10, '4', 1000, 8, 8000),
(433, 18, 2, '5', 50000, 1, 50000),
(448, 19, 2, '1', 60000, 1, 60000),
(449, 19, 2, '2', 35000, 3, 105000),
(450, 19, 19, '2', 70000, 3, 23333.3),
(451, 19, 3, '3', 1000, 2, 2000),
(452, 19, 4, '3', 500, 2, 1000),
(453, 19, 5, '3', 1900, 2, 3800),
(454, 19, 6, '3', 720, 2, 1440),
(455, 19, 7, '3', 360, 2, 720),
(456, 19, 3, '4', 1000, 1, 1000),
(457, 19, 4, '4', 14000, 1, 14000),
(458, 19, 8, '4', 50000, 8, 6250),
(459, 19, 9, '4', 50000, 8, 6250),
(460, 19, 10, '4', 1000, 2, 2000),
(461, 19, 1, '5', 20000, 1, 20000),
(490, 21, 1, '1', 50000, 1, 50000),
(491, 21, 3, '2', 40000, 2, 80000),
(492, 21, 19, '2', 70000, 8, 8750),
(493, 21, 3, '3', 1000, 2, 2000),
(494, 21, 4, '3', 500, 2, 1000),
(495, 21, 5, '3', 1900, 2, 3800),
(496, 21, 6, '3', 720, 2, 1440),
(497, 21, 7, '3', 360, 2, 720),
(498, 21, 3, '4', 1000, 1, 1000),
(499, 21, 4, '4', 14000, 1, 14000),
(500, 21, 8, '4', 50000, 8, 6250),
(501, 21, 9, '4', 50000, 8, 6250),
(502, 21, 10, '4', 1000, 2, 2000),
(503, 21, 1, '5', 20000, 1, 20000),
(504, 22, 10, '1', 3500000, 1, 3500000),
(505, 22, 16, '2', 40000, 2, 80000),
(506, 22, 19, '2', 70000, 5, 14000),
(507, 22, 3, '3', 1000, 2, 2000),
(508, 22, 4, '3', 500, 2, 1000),
(509, 22, 5, '3', 1900, 2, 3800),
(510, 22, 6, '3', 720, 2, 1440),
(511, 22, 7, '3', 360, 2, 720),
(512, 22, 8, '3', 11000, 1, 11000),
(513, 22, 3, '4', 1000, 1, 1000),
(514, 22, 4, '4', 14000, 1, 14000),
(515, 22, 8, '4', 50000, 5, 10000),
(516, 22, 9, '4', 50000, 5, 10000),
(517, 22, 10, '4', 1000, 2, 2000),
(518, 22, 3, '5', 10000, 1, 10000),
(519, 23, 6, '1', 400000, 1, 400000),
(520, 23, 16, '2', 40000, 2, 80000),
(521, 23, 19, '2', 70000, 5, 14000),
(522, 23, 3, '3', 1000, 2, 2000),
(523, 23, 4, '3', 500, 2, 1000),
(524, 23, 5, '3', 1900, 2, 3800),
(525, 23, 6, '3', 720, 2, 1440),
(526, 23, 7, '3', 360, 2, 720),
(527, 23, 8, '3', 11000, 1, 11000),
(528, 23, 3, '4', 1000, 1, 1000),
(529, 23, 4, '4', 14000, 1, 14000),
(530, 23, 8, '4', 50000, 5, 10000),
(531, 23, 9, '4', 50000, 5, 10000),
(532, 23, 10, '4', 1000, 2, 2000),
(533, 23, 3, '5', 10000, 1, 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(250) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `phone_pelanggan` varchar(20) NOT NULL,
  `email_pelanggan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `phone_pelanggan`, `email_pelanggan`) VALUES
(1, 'PT Mobil Le', 'Surabaya', '0817777778', 'MobilLet@gmail.com'),
(2, 'Kunadi', 'Jl. raya popoh dsn. blumbang rt/rw 03/05', '085791404521', 'ukun.cahyo.uc@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(5) NOT NULL,
  `nama` char(30) NOT NULL,
  `id_pelanggan` varchar(200) NOT NULL,
  `id_kategoriproduk` int(11) NOT NULL,
  `panjang` int(11) NOT NULL,
  `lebar` int(11) NOT NULL,
  `tinggi` int(11) NOT NULL,
  `tgl_pesanan` date NOT NULL,
  `tgl_jatuhtempo` date NOT NULL,
  `laba` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `nama`, `id_pelanggan`, `id_kategoriproduk`, `panjang`, `lebar`, `tinggi`, `tgl_pesanan`, `tgl_jatuhtempo`, `laba`) VALUES
(12, 'Kunadi', '1', 1, 60, 60, 60, '2022-08-05', '2022-08-12', 50),
(13, 'wastafel 50x20', '1', 1, 50, 50, 20, '2022-08-05', '2022-08-09', 0),
(14, 'wastafel 50x30', '1', 1, 50, 50, 30, '2022-08-05', '2022-08-12', 0),
(15, 'meja 100 x 50', '1', 2, 100, 50, 100, '2022-08-07', '2022-08-14', 0),
(16, 'meja 50 x 50', '1', 2, 50, 50, 50, '2022-08-07', '2022-08-14', 50),
(17, 'meja besar', '2', 2, 200, 100, 70, '2022-08-07', '2022-08-14', 70),
(18, 'pesanan kunandi bathub 200 cm', '1', 3, 200, 100, 70, '2022-08-08', '2022-08-15', 50),
(19, 'Kunadi wastafel kecil', '2', 1, 50, 40, 27, '2022-08-08', '2022-08-15', 0),
(20, 'wastqfel unik', '1', 1, 80, 40, 24, '2022-08-12', '2022-08-19', 0),
(21, 'wastafel unik 50x20', '1', 1, 45, 43, 24, '0000-00-00', '0000-00-00', 0),
(22, 'meja rafli', '1', 2, 87, 70, 55, '2022-08-18', '2022-08-25', 0),
(23, 'meja seminar', '1', 2, 88, 45, 70, '2022-08-18', '2022-08-25', 65);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`) VALUES
(1, 'Wastafel'),
(2, 'meja'),
(3, 'bathhub');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rincian_produk`
--

CREATE TABLE `rincian_produk` (
  `ID_PRODUK` int(11) NOT NULL,
  `KODE_RINCIAN_PRODUK` char(5) NOT NULL,
  `NAMA_BB_STANDAR` varchar(200) NOT NULL,
  `NAMA_BOPTS` varchar(200) NOT NULL,
  `NAMA_BOPVS` varchar(200) NOT NULL,
  `NAMA_BTKLS` varchar(200) NOT NULL,
  `NAMA_RINCIAN_PRODUK` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` longtext NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `type`) VALUES
(1, 'admin', 'fcea920f7412b5da7be0cf42b8c93759', 0),
(3, 'Alex', '827ccb0eea8a706c4c34a16891f84e7b', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `biaya_bahan_baku_aktual`
--
ALTER TABLE `biaya_bahan_baku_aktual`
  ADD PRIMARY KEY (`id_bb_aktual`);

--
-- Indeks untuk tabel `biaya_bahan_baku_standar`
--
ALTER TABLE `biaya_bahan_baku_standar`
  ADD PRIMARY KEY (`id_bb_standar`);

--
-- Indeks untuk tabel `biaya_tenaga_kerja_langsung_aktual`
--
ALTER TABLE `biaya_tenaga_kerja_langsung_aktual`
  ADD PRIMARY KEY (`id_btkl_aktual`);

--
-- Indeks untuk tabel `biaya_tenaga_kerja_langsung_standar`
--
ALTER TABLE `biaya_tenaga_kerja_langsung_standar`
  ADD PRIMARY KEY (`id_btkl_standar`);

--
-- Indeks untuk tabel `bop_tetap_aktual`
--
ALTER TABLE `bop_tetap_aktual`
  ADD PRIMARY KEY (`id_tetap_aktual`);

--
-- Indeks untuk tabel `bop_tetap_standar`
--
ALTER TABLE `bop_tetap_standar`
  ADD PRIMARY KEY (`id_tetap_standar`);

--
-- Indeks untuk tabel `bop_variabel_aktual`
--
ALTER TABLE `bop_variabel_aktual`
  ADD PRIMARY KEY (`id_variabel_aktual`);

--
-- Indeks untuk tabel `bop_variabel_standar`
--
ALTER TABLE `bop_variabel_standar`
  ADD PRIMARY KEY (`id_variabel_standar`);

--
-- Indeks untuk tabel `custom_standar`
--
ALTER TABLE `custom_standar`
  ADD PRIMARY KEY (`id_custom_standar`);

--
-- Indeks untuk tabel `hpp_actual`
--
ALTER TABLE `hpp_actual`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hpp_standart`
--
ALTER TABLE `hpp_standart`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `rincian_produk`
--
ALTER TABLE `rincian_produk`
  ADD PRIMARY KEY (`ID_PRODUK`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `biaya_bahan_baku_aktual`
--
ALTER TABLE `biaya_bahan_baku_aktual`
  MODIFY `id_bb_aktual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `biaya_bahan_baku_standar`
--
ALTER TABLE `biaya_bahan_baku_standar`
  MODIFY `id_bb_standar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `biaya_tenaga_kerja_langsung_aktual`
--
ALTER TABLE `biaya_tenaga_kerja_langsung_aktual`
  MODIFY `id_btkl_aktual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT untuk tabel `biaya_tenaga_kerja_langsung_standar`
--
ALTER TABLE `biaya_tenaga_kerja_langsung_standar`
  MODIFY `id_btkl_standar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `bop_tetap_aktual`
--
ALTER TABLE `bop_tetap_aktual`
  MODIFY `id_tetap_aktual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT untuk tabel `bop_tetap_standar`
--
ALTER TABLE `bop_tetap_standar`
  MODIFY `id_tetap_standar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `bop_variabel_aktual`
--
ALTER TABLE `bop_variabel_aktual`
  MODIFY `id_variabel_aktual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT untuk tabel `bop_variabel_standar`
--
ALTER TABLE `bop_variabel_standar`
  MODIFY `id_variabel_standar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `custom_standar`
--
ALTER TABLE `custom_standar`
  MODIFY `id_custom_standar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `hpp_actual`
--
ALTER TABLE `hpp_actual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=354;

--
-- AUTO_INCREMENT untuk tabel `hpp_standart`
--
ALTER TABLE `hpp_standart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=534;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
