-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Waktu pembuatan: 21 Feb 2022 pada 05.45
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catalog`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_sepatu` int(11) NOT NULL,
  `gambar` varchar(250) NOT NULL,
  `merek_sepatu` varchar(128) NOT NULL,
  `jenis_sepatu` varchar(128) NOT NULL,
  `no_sepatu` int(11) NOT NULL,
  `harga_sepatu` int(11) NOT NULL,
  `id_pemasok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_sepatu`, `gambar`, `merek_sepatu`, `jenis_sepatu`, `no_sepatu`, `harga_sepatu`, `id_pemasok`) VALUES
(77, 'sport1.jpg', 'Adidas', 'Sports', 37, 300000, 39),
(78, 'kulit2.jpg', 'Heal', 'Kulit', 37, 350000, 39),
(79, 'sn1.jpg', 'Nike', 'Sport', 38, 250000, 39),
(80, 'girl2.jpg', 'Nike', 'High Hells', 36, 300000, 39),
(81, 'girl3.jpg', 'Paris', 'High Hells', 35, 300000, 39),
(83, 'sport4.jpg', 'Mercys', 'Sport', 36, 320000, 39),
(86, 'girl5.jpg', 'Christian Louboutin', 'High Hells', 36, 250000, 39),
(87, 'girl6.png', 'Saint Laurent', 'High Hells', 36, 400000, 39),
(88, 'kulit3.jpg', 'Aldo', 'Kulit', 37, 350000, 41),
(89, 'sport5.jpg', 'Reebok', 'Sport', 35, 300000, 39),
(90, 'sport6.jpg', 'Skechers Go Run', 'Sport', 37, 400000, 40),
(91, 'kulit4.jpg', 'Nappa Milano', 'Kulit', 38, 400000, 39),
(93, 'girl8.jpg', 'Laura', 'High Hells', 36, 320000, 40),
(94, 'girl10.jpg', 'Zara', 'High Hells', 37, 400000, 39),
(95, 'girl4.jpg', 'Obermain', 'High Hells', 38, 450000, 41),
(96, 'girl7.jpg', 'Buccheri', 'High Hells', 38, 500000, 39),
(97, 'sport3.jpg', 'Airwalk', 'Sport', 37, 350000, 39),
(98, 'kulit1.jpg', 'Txture', 'Kulit', 39, 450000, 40),
(100, 'girl9.jpg', 'Paris', 'High Hells', 35, 399000, 39),
(101, 'sn2.jpg', 'Adidas', 'Sport', 38, 357000, 40),
(102, 'sn3.jpg', 'Airwalk', 'Sport', 39, 456000, 39),
(104, 'sn5.jpg', 'Fila', 'Sport', 37, 360000, 40),
(105, 'sn6.jpg', 'Txture', 'Sport', 38, 348000, 41),
(106, 'sw1.jpg', 'Laura', 'Sport', 34, 35000, 39),
(107, 'sw2.jpg', 'Kythshoes', 'Sport', 38, 500000, 40),
(108, 'sw3.jpg', 'Aldo', 'Sport', 35, 430000, 39),
(109, 'sw4.jpg', 'Christian Louboutin', 'Sport', 38, 289000, 39);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasok`
--

CREATE TABLE `pemasok` (
  `id_pemasok` int(11) NOT NULL,
  `nama_pemasok` varchar(128) NOT NULL,
  `alamat_pemasok` varchar(128) NOT NULL,
  `no_telepon` int(11) NOT NULL,
  `catatan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemasok`
--

INSERT INTO `pemasok` (`id_pemasok`, `nama_pemasok`, `alamat_pemasok`, `no_telepon`, `catatan`) VALUES
(39, 'Sinta', 'Jakarta', 1234, '10 barang'),
(40, 'Yohana', 'Surabaya', 12345, '20 buah'),
(41, 'Sany', 'Bandung', 229344, '10 buah');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_sepatu`),
  ADD KEY `id_pemasok` (`id_pemasok`);

--
-- Indeks untuk tabel `pemasok`
--
ALTER TABLE `pemasok`
  ADD PRIMARY KEY (`id_pemasok`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_sepatu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT untuk tabel `pemasok`
--
ALTER TABLE `pemasok`
  MODIFY `id_pemasok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `FK_pemasokbarang` FOREIGN KEY (`id_pemasok`) REFERENCES `pemasok` (`id_pemasok`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
