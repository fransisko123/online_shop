-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jun 2020 pada 14.21
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'fransisko', '123456');

-- --------------------------------------------------------

--
-- Struktur dari tabel `handphone`
--

CREATE TABLE `handphone` (
  `id_hp` int(11) NOT NULL,
  `namahp` varchar(50) NOT NULL,
  `hargahp` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `handphone`
--

INSERT INTO `handphone` (`id_hp`, `namahp`, `hargahp`, `foto`, `deskripsi`) VALUES
(1, 'iPhone XS', 25499000, 'iphonexs.jpg', '                                    Spesifikasi\r\nRilis: September, 2018.\r\nChipset: Apple A12 Bionic.\r\nRAM: 4GB.\r\nMemori internal: 64GB, 256G, 512GB.\r\nUkuran HP: 143.6 x 70.9 x 7.7 mm.\r\nBerat HP: 177 gram.\r\nWaterproof: IP68 dust/water resistant (up to 2m for 30 mins)\r\nUkuran layar: 5.8 inci, 1125x2436 pixels.\"\r\n       \r\n        \"\r\n        \"\r\n        '),
(2, 'iPhone 11', 17650000, 'iphone11cw.jpg', 'iPhone 11 Pro dan iPhone 11 Pro Max merupakan penerus dari iPhone XS dan XS Max yang dirilis tahun lalu. Sementara iPhone 11 merupakan penerus iPhone XR.\r\n\r\n'),
(3, 'Oppo A9 ', 3199000, 'oppoA9.jpg', 'Sekilas spesifikasi Oppo A9 Pro, ponsel ini mengusung layar 6,5 inci resolusi HD Plus, chip Snapdragon 665, RAM hingga 8 GB, kapasitas penyimpanan 128 GB, dan baterai jumbo 5.000 mAh'),
(4, 'Samsung A51 ', 4050000, 'samsungA51.jpg', 'Smartphone ini dibekali  panel Super AMOLED yang menyajikan kualitas gambar lebih bersih, jernih dan juga tajam. Smartphone Samsung Galaxy A51 ini memiliki layar seluas 6.5 inci dan memiliki resolusi yang mencapai 1080 x 2340 pixels. Selain itu, hp ini juga memiliki kerapatan dengan sebesar 396 ppi dan rasio 19.5:9.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `nama_kabupaten` varchar(50) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kabupaten`, `tarif`) VALUES
(1, 'Denpasar', 10000),
(2, 'Badung', 15000),
(3, 'Bangli', 20000),
(4, 'Buleleng', 25000),
(5, 'Negara', 30000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(50) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `telepon_pelanggan` varchar(20) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `alamat`) VALUES
(1, 'iko@gmail.com', '123456', 'Fransisko Saverio', '081248916179', ''),
(2, 'chiko@gmail.com', 'chiko', 'Raychiko', '081248916182', ''),
(3, 'aldo@gmail.com', 'aldo', 'aldo', '0895700733772', 'Jl. Kenyeri\r\nSumerta Kaja, Kec. Denpasar Tim.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `nama_kabupaten` varchar(50) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status_pembelian` varchar(50) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `nama_kabupaten`, `tarif`, `alamat_pengiriman`, `status_pembelian`) VALUES
(1, 1, 1, '2020-05-27', 25509000, 'Denpasar', 10000, '', 'pending'),
(2, 1, 2, '2020-05-27', 3214000, 'Badung', 15000, '', 'pending'),
(3, 3, 1, '2020-05-27', 35310000, 'Denpasar', 10000, 'Jl. Kenyeri\r\nSumerta Kaja, Kec. Denpasar Tim.', 'pending');

-- --------------------------------------------------------


--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(1, 1, 'Fransisko Saverio Jcanggur', 'BANK BNI', 47460000, '2020-06-20', '20200620054122hacking_hacker_security.jpg');


--
-- Struktur dari tabel `pembelian_handphone`
--

CREATE TABLE `pembelian_handphone` (
  `id_pembelian_handphone` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_hp` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian_handphone`
--

INSERT INTO `pembelian_handphone` (`id_pembelian_handphone`, `id_pembelian`, `id_hp`, `jumlah`, `nama`, `harga`, `subharga`) VALUES
(1, 1, 1, 1, 'iPhone XS', 25499000, 25499000),
(2, 2, 3, 1, 'Oppo A9 ', 3199000, 3199000),
(3, 3, 2, 2, 'iPhone 11', 17650000, 35300000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `handphone`
--
ALTER TABLE `handphone`
  ADD PRIMARY KEY (`id_hp`);

--
-- Indeks untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pembelian_handphone`
--
ALTER TABLE `pembelian_handphone`
  ADD PRIMARY KEY (`id_pembelian_handphone`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `handphone`
--
ALTER TABLE `handphone`
  MODIFY `id_hp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pembelian_handphone`
--
ALTER TABLE `pembelian_handphone`
  MODIFY `id_pembelian_handphone` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
