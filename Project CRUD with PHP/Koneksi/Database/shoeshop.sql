-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Waktu pembuatan: 21 Feb 2022 pada 05.43
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
-- Database: `shoeshop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_sepatu` int(11) NOT NULL,
  `merek_sepatu` varchar(128) NOT NULL,
  `jenis_sepatu` varchar(128) NOT NULL,
  `no_sepatu` int(11) NOT NULL,
  `harga_sepatu` int(11) NOT NULL,
  `id_pemasok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_sepatu`, `merek_sepatu`, `jenis_sepatu`, `no_sepatu`, `harga_sepatu`, `id_pemasok`) VALUES
(68, 'Nike', 'Sport', 35, 350000, 40),
(69, 'Adidas', 'Sport', 35, 450000, 42),
(70, 'Pria', 'Sport', 38, 350000, 41);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kartu_member`
--

CREATE TABLE `kartu_member` (
  `id_kartu` int(11) NOT NULL,
  `level` varchar(200) NOT NULL,
  `potongan_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kartu_member`
--

INSERT INTO `kartu_member` (`id_kartu`, `level`, `potongan_harga`) VALUES
(6, 'Gold', 50000),
(7, 'Premium', 30000),
(8, 'Light', 45000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nota_pemasok`
--

CREATE TABLE `nota_pemasok` (
  `id_notaPemasok` int(11) NOT NULL,
  `id_sepatu` int(11) NOT NULL,
  `id_pemasok` int(11) NOT NULL,
  `tanggal_penerimaan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nota_penjualan`
--

CREATE TABLE `nota_penjualan` (
  `id_notaPenjualan` int(11) NOT NULL,
  `id_sepatu` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `jumlah_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(200) NOT NULL,
  `id_sepatu` int(11) NOT NULL,
  `id_kartu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `id_sepatu`, `id_kartu`) VALUES
(27, 'Yohana', 68, 6),
(28, 'Jeen', 68, 8);

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
(40, 'Yohana', 'Surabaya', 121212, '20 buah'),
(41, 'Andi', 'Lampung', 332211, '10 barang'),
(42, 'Wendy', 'Malang', 334455, '20 buah sepatu');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_sepatu`),
  ADD KEY `FK_pemasokbarang` (`id_pemasok`);

--
-- Indeks untuk tabel `kartu_member`
--
ALTER TABLE `kartu_member`
  ADD PRIMARY KEY (`id_kartu`);

--
-- Indeks untuk tabel `nota_pemasok`
--
ALTER TABLE `nota_pemasok`
  ADD PRIMARY KEY (`id_notaPemasok`),
  ADD KEY `FK_pemasokanbarang` (`id_sepatu`),
  ADD KEY `Fk_pemasokann` (`id_pemasok`);

--
-- Indeks untuk tabel `nota_penjualan`
--
ALTER TABLE `nota_penjualan`
  ADD PRIMARY KEY (`id_notaPenjualan`),
  ADD KEY `FK_penjualanKePelanggan` (`id_pelanggan`),
  ADD KEY `FK_barangPenjualan` (`id_sepatu`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `FK_barangpelanggan` (`id_sepatu`),
  ADD KEY `FK_kartumember` (`id_kartu`);

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
  MODIFY `id_sepatu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT untuk tabel `kartu_member`
--
ALTER TABLE `kartu_member`
  MODIFY `id_kartu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `nota_pemasok`
--
ALTER TABLE `nota_pemasok`
  MODIFY `id_notaPemasok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `nota_penjualan`
--
ALTER TABLE `nota_penjualan`
  MODIFY `id_notaPenjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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

--
-- Ketidakleluasaan untuk tabel `nota_pemasok`
--
ALTER TABLE `nota_pemasok`
  ADD CONSTRAINT `FK_pemasokanbarang` FOREIGN KEY (`id_sepatu`) REFERENCES `barang` (`id_sepatu`),
  ADD CONSTRAINT `Fk_pemasokann` FOREIGN KEY (`id_pemasok`) REFERENCES `pemasok` (`id_pemasok`);

--
-- Ketidakleluasaan untuk tabel `nota_penjualan`
--
ALTER TABLE `nota_penjualan`
  ADD CONSTRAINT `FK_barangPenjualan` FOREIGN KEY (`id_sepatu`) REFERENCES `barang` (`id_sepatu`),
  ADD CONSTRAINT `FK_penjualanKePelanggan` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);

--
-- Ketidakleluasaan untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `FK_barangpelanggan` FOREIGN KEY (`id_sepatu`) REFERENCES `barang` (`id_sepatu`),
  ADD CONSTRAINT `FK_kartumember` FOREIGN KEY (`id_kartu`) REFERENCES `kartu_member` (`id_kartu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
