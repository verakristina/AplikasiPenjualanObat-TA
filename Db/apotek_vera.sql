-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12 Jun 2019 pada 10.15
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek_vera`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detailTransaksi` varchar(20) NOT NULL,
  `kode_obat` varchar(20) NOT NULL,
  `id_transaksi` varchar(20) NOT NULL,
  `harga` int(50) NOT NULL,
  `jumlah_obat` int(30) NOT NULL,
  `sub_total` int(20) NOT NULL,
  `pot` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detailTransaksi`, `kode_obat`, `id_transaksi`, `harga`, `jumlah_obat`, `sub_total`, `pot`) VALUES
('Trx0100', 'BR027 ', 'Trx0100', 1000, 1, 1000, 0),
('Trx020', 'BR001', 'Trx020', 1500, 1, 1500, 0),
('Trx079', 'BR002', 'Trx079', 1500, 1, 1500, 0),
('Trx093', 'BR001', 'Trx093', 1500, 2, 3000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(20) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'generik'),
(2, 'non generik'),
(3, 'askes'),
(4, 'bahan lab');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `kode_obat` varchar(15) NOT NULL,
  `nama_obat` varchar(20) NOT NULL,
  `supplier` varchar(32) NOT NULL,
  `id_kategori` int(32) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `tanggal_expired` date NOT NULL,
  `stok` int(30) NOT NULL,
  `harga_jual` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`kode_obat`, `nama_obat`, `supplier`, `id_kategori`, `satuan`, `tanggal_expired`, `stok`, `harga_jual`) VALUES
('BR001', 'Inzana ', 'FivA', 1, 'kapsul', '2019-03-02', 120, 1500),
('BR002', 'Mixagrip', 'Veraa', 1, 'Tablet', '2019-04-05', 100, 1500),
('BR003', 'Sirup', 'vera', 1, 'Botol', '2020-03-23', 10, 12000),
('BR007', 'Bodrexin', 'atena', 1, 'Tablet', '2019-08-01', 20, 2500),
('BR027 ', 'paramex', 'fara', 2, 'Kapsul', '2019-05-15', 20, 1000),
('BR070', 'Amoxcycillin', 'kristina', 1, 'Kapsul', '2019-06-11', 100, 2000),
('BR089', 'Promag', 'gg', 1, 'Tablet', '2019-06-20', 90, 1500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_penjualan`
--

CREATE TABLE `transaksi_penjualan` (
  `id_transaksi` varchar(15) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `Customer` varchar(50) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `total_harga` int(32) NOT NULL,
  `total_bayar` int(50) NOT NULL,
  `kembali` int(50) NOT NULL,
  `diskon` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_penjualan`
--

INSERT INTO `transaksi_penjualan` (`id_transaksi`, `id_user`, `Customer`, `tanggal_transaksi`, `total_harga`, `total_bayar`, `kembali`, `diskon`) VALUES
('Trx0100', 'Us001', '', '2019-06-12', 1000, 1000, 0, 0),
('Trx020', 'Us002', '', '2019-06-12', 1500, 2000, 500, 0),
('Trx077', 'Us001', '', '2019-06-12', 24000, 25000, 1000, 0),
('Trx079', 'Us002', '', '2019-06-12', 1500, 4000, 2500, 0),
('Trx093', 'Us002', '', '2019-06-12', 3000, 5000, 2000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `alamat` varchar(20) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `level` enum('Admin','Apoteker') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama`, `password`, `alamat`, `no_hp`, `level`) VALUES
('Us001', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Surabaya', '08551881259', 'Admin'),
('Us002', 'apoteker', 'budi', '326dd0e9d42a3da01b50028c51cf21fc', 'Malang', '081779494757', 'Apoteker'),
('Us048', 'kristina', 'vera kristina', '15ab465b07f1e770d2ca747ca567384a', 'Sidoarjo', '082278666521', 'Admin'),
('Us058', 'yan', 'Yanuar', '911f6332e7f90b94b87f15377263995c', 'malang', '089898', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detailTransaksi`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `kode_obat` (`kode_obat`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`kode_obat`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `transaksi_penjualan`
--
ALTER TABLE `transaksi_penjualan`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi_penjualan` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`kode_obat`) REFERENCES `obat` (`kode_obat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `obat_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
