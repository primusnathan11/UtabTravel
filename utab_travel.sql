-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jun 2021 pada 14.26
-- Versi server: 10.3.15-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `utab_travel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bukti_pembayaran`
--

CREATE TABLE `bukti_pembayaran` (
  `id_bukti` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `foto_bukti` varchar(255) NOT NULL,
  `tgl_upload` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bukti_pembayaran`
--

INSERT INTO `bukti_pembayaran` (`id_bukti`, `id_pemesanan`, `foto_bukti`, `tgl_upload`) VALUES
(1, 3, '7eaa52313d5c33158f5c421a0601350c.jpg', '0000-00-00 00:00:00'),
(2, 5, '81aTawcGdmL__AC_SL1500_.jpg', '0000-00-00 00:00:00'),
(3, 4, '2keui7.jpg', '2021-06-02 14:13:11'),
(4, 6, 'john_doe.jpg', '2021-06-02 19:22:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_place` int(11) NOT NULL,
  `isi_comment` varchar(255) NOT NULL,
  `tgl_comment` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `comment`
--

INSERT INTO `comment` (`id_comment`, `id_user`, `id_place`, `isi_comment`, `tgl_comment`) VALUES
(4, 6, 1, 'bagus banget', '2021-05-05 16:23:07'),
(5, 6, 1, 'tes tes', '2021-05-06 13:15:22'),
(6, 6, 1, 'tes', '2021-05-06 14:14:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_place` varchar(255) NOT NULL,
  `id_place` int(11) NOT NULL,
  `tgl_pemesanan` datetime NOT NULL,
  `qty` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `payment` enum('BCA','Mandiri','BNI') NOT NULL,
  `status` enum('Menunggu Pembayaran','Pembayaran Terkonfirmasi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_user`, `nama_place`, `id_place`, `tgl_pemesanan`, `qty`, `total_harga`, `payment`, `status`) VALUES
(3, 6, 'Jatim Park 3', 1, '2021-05-29 14:02:23', 1, 100000, 'BCA', 'Pembayaran Terkonfirmasi'),
(4, 6, 'Jatim Park 1', 3, '2021-06-01 17:10:38', 3, 300000, 'BNI', 'Menunggu Pembayaran'),
(5, 6, 'Jatim Park 3', 1, '2021-06-02 14:08:28', 3, 300000, 'BCA', 'Pembayaran Terkonfirmasi'),
(6, 6, 'Batu Flower Garden', 2, '2021-06-02 19:21:47', 4, 140000, 'BCA', 'Menunggu Pembayaran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `places`
--

CREATE TABLE `places` (
  `id_place` int(11) NOT NULL,
  `nama_place` varchar(30) NOT NULL,
  `alamat_place` varchar(100) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `telp_place` varchar(12) NOT NULL,
  `harga` int(7) NOT NULL,
  `rating` float NOT NULL,
  `jenis` enum('Penginapan','Wisata') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `places`
--

INSERT INTO `places` (`id_place`, `nama_place`, `alamat_place`, `deskripsi`, `telp_place`, `harga`, `rating`, `jenis`) VALUES
(1, 'Jatim Park 3', 'Jl. Ir Sukarno No.144, Beji, Kec. Junrejo, Kota Batu, Jawa Timur 65236', 'Jawa Timur Park 3, memilih Dino Park sebagai spot unggulan karena Dinosaurus adalah binatang purbakala yang semua orang pun tahu dan menyukainya. Di dalam Dino Park anda akan dibawa ke area yang belum anda bayangkan sebelumnya, seperti area Zaman Ice Age,', '5103030', 100000, 5, 'Wisata'),
(2, 'Batu Flower Garden', 'Oro-Oro Ombo, Kehutanan, Kec. Batu, Kota Batu, Jawa Timur 65151', '', '', 35000, 4, 'Wisata'),
(3, 'Jatim Park 1', 'Jl. Dewi Sartika Atas, Sisir Kecamatan Batu Kota Batu, Jawa Timur 65314', '', '', 100000, 5, 'Wisata');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(20) NOT NULL,
  `email_user` varchar(30) NOT NULL,
  `password` varchar(25) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `level` enum('Admin','User') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email_user`, `password`, `no_telp`, `level`) VALUES
(4, 'Primus Nathan', 'nathan.primus77@gmail.com', 'primus', '', 'User'),
(5, 'Barry Allen', 'barry_allen@gmail.com', 'barry', '', 'User'),
(6, 'Nathan Primus', 'primusnathan@gmail.com', 'nathan', '08192198430', 'User'),
(7, 'admin', 'admin@gmail.com', 'admin', '081124391', 'Admin'),
(8, 'Jake Peralta', 'jake@gmail.com', 'jake', '08129124', 'User');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bukti_pembayaran`
--
ALTER TABLE `bukti_pembayaran`
  ADD PRIMARY KEY (`id_bukti`),
  ADD KEY `id_transaksi` (`id_pemesanan`);

--
-- Indeks untuk tabel `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_place` (`id_place`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_place` (`id_place`);

--
-- Indeks untuk tabel `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id_place`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bukti_pembayaran`
--
ALTER TABLE `bukti_pembayaran`
  MODIFY `id_bukti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `places`
--
ALTER TABLE `places`
  MODIFY `id_place` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bukti_pembayaran`
--
ALTER TABLE `bukti_pembayaran`
  ADD CONSTRAINT `bukti_pembayaran_ibfk_1` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_place`) REFERENCES `places` (`id_place`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`id_place`) REFERENCES `places` (`id_place`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
