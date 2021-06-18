-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jun 2021 pada 10.44
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
-- Database: `travelutab`
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
(4, 6, 'john_doe.jpg', '2021-06-02 19:22:06'),
(5, 7, 'cvg70u95vmw31.jpg', '2021-06-16 11:32:24'),
(6, 8, 'index.jpg', '2021-06-16 15:40:38');

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
(6, 6, 1, 'tes', '2021-05-06 14:14:25'),
(7, 6, 21, 'tes', '2021-06-16 15:39:18'),
(8, 6, 21, 'tes2', '2021-06-16 15:39:44');

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
(6, 6, 'Batu Flower Garden', 2, '2021-06-02 19:21:47', 4, 140000, 'BCA', 'Menunggu Pembayaran'),
(7, 9, 'Omah Kayu', 9, '2021-06-16 11:31:42', 3, 15000, 'BNI', 'Pembayaran Terkonfirmasi'),
(8, 6, 'Batu Night Spectacular', 8, '2021-06-16 15:40:13', 3, 120000, 'BCA', 'Pembayaran Terkonfirmasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `places`
--

CREATE TABLE `places` (
  `id_place` int(11) NOT NULL,
  `img_place` varchar(50) NOT NULL,
  `nama_place` varchar(30) NOT NULL,
  `alamat_place` varchar(100) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `telp_place` varchar(12) NOT NULL,
  `harga` int(7) DEFAULT NULL,
  `rating` float NOT NULL,
  `jenis` enum('Wisata','Hotel','Villa','Kuliner') NOT NULL,
  `cat1` enum('Instagramable','Kids Friendly','Education','Nature') NOT NULL,
  `cat2` enum('Instagramable','Kids Friendly','Education','Nature') NOT NULL,
  `jam_buka` time DEFAULT NULL,
  `jam_tutup` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `places`
--

INSERT INTO `places` (`id_place`, `img_place`, `nama_place`, `alamat_place`, `deskripsi`, `telp_place`, `harga`, `rating`, `jenis`, `cat1`, `cat2`, `jam_buka`, `jam_tutup`) VALUES
(1, '1.jpg', 'Jatim Park 3', 'Jl. Ir Sukarno No.144, Beji, Kec. Junrejo, Kota Batu, Jawa Timur 65236', 'Jawa Timur Park 3, memilih Dino Park sebagai spot unggulan karena Dinosaurus adalah binatang purbakala yang semua orang pun tahu dan menyukainya. Di dalam Dino Park anda akan dibawa ke area yang belum anda bayangkan sebelumnya, seperti area Zaman Ice Age,', '5103030', 100000, 5, 'Wisata', 'Kids Friendly', 'Education', '11:00:00', '23:00:00'),
(2, '2.jpg', 'Batu Flower Garden', 'Oro-Oro Ombo, Kehutanan, Kec. Batu, Kota Batu, Jawa Timur 65151', 'Taman bunga coban rais(Batu Flower Garden) adalah salah satu taman bunga yang hits di malang disamping karena lokasi nya yang cukup mudah di jangkau, taman bunga coban rais juga mempunyai spot foto yang unik dan kekinian kesukaan traveler jaman now.', '', 35000, 4, 'Wisata', 'Nature', 'Instagramable', '08:00:00', '16:00:00'),
(3, '3.jpg', 'Jatim Park 1', 'Jl. Dewi Sartika Atas, Sisir Kecamatan Batu Kota Batu, Jawa Timur 65314', 'Jatim Park 1 merupakan tempat wisata Malang yang sudah lama berdiri di Kota Batu. Dari dulu hingga sekarang Jatim Park 1 menjadi destinasi favorit terutama bagi pengunjung pelajar. Karena di dalamnya selain terdapat berbagai macam permainan juga teradapat', '', 100000, 5, 'Wisata', 'Education', 'Kids Friendly', '08:30:00', '16:30:00'),
(4, '4.jpg', 'Jatim Park 2', 'Jl. Oro-Oro Ombo No.9, Temas, Kec. Batu, Kota Batu, Jawa Timur 65315', 'Jatim Park 2 berbeda dengan Jatim Park 1, Jatim Park 2 menawarkan konsep kepada Modern Zoo, di dalamnya terdapat banyak sekali koleksi hewan dari berbagai negara di dunia. Ada 2 wahana utama di dalam Jatim Park 2, Batu Secret Zoo dan Museum Satwa. Di Jati', '', 130000, 4, 'Wisata', 'Education', 'Kids Friendly', '09:30:00', '18:00:00'),
(5, '5.jpg', 'Museum Angkut', 'Jl. Terusan Sultan Agung No.2, Ngaglik, Kec. Batu, Kota Batu, Jawa Timur 65314', 'Museum Angkut adalah museum yang terdapat lebih dari 300 koleksi kendaraan dari berbagai negara di dunia. Mulai dari yang klasik hingga yang paling modern. Terdapat koleksi motor, mobil, pesawat hingga roket. Museum Angkut juga merupakan museum transporta', '', 100000, 5, 'Wisata', 'Instagramable', 'Education', '12:00:00', '20:00:00'),
(6, '6.jpg', 'Coban Talun', 'Tulungrejo, Kec. Bumiaji, Kota Batu, Jawa Timur', 'Coban atau air terjun ini memiliki ketinggian sekitar 75 meter. Airnya berasal dari Sungai Brantas dan masuk ke dalam kawasan hutan lindung. <br><br>\r\nCoban Talun yang terletak di tengah hutan menawarkan keindahan alami dengan air nya yang selalu mengalir deras.', '', 15000, 4, 'Wisata', 'Nature', '', '07:00:00', '17:00:00'),
(7, '7.jpg', 'Paralayang', 'Jl. Gn. Banyak, Songgokerto, Kec. Batu, Kota Batu, Jawa Timur 65315', 'Kini di Kota Batu, Jawa Timur, terdapat wisata pemacu adrenalin, paralayang. Memang belum banyak wisata paralayang di Indonesia, karena pengaruh pemilihan medan dan lokasi yang tidak mudah. Hanya dataran tinggi ataupun perbukitanlah yang dapat menjadi lokasi olahraga ekstrim ini.', '', 10000, 5, 'Wisata', 'Instagramable', '', '07:00:00', '17:00:00'),
(8, '8.jpg', 'Batu Night Spectacular', 'Jl. Hayam Wuruk No.1, Oro-Oro Ombo, Kec. Batu, Kota Batu, Jawa Timur 65316', 'Batu Night Spectacular atau banyak dikenal BNS, adalah salah satu tempat wisata Malang Batu yang buka malam hari. BNS menawarkan sensasi berwisata yang berbeda dari yang lain, di dalam BNS terdapat banyak sekali wahana permainan dan ada juga taman lampion. <br><br>\r\nObjek wisata ini sangat pas dikunjungi oleh kalangan muda. Hawa dingin Kota Batu pada malam hari, semakin membuat anda tidak ingin pulang dari kota apel ini.', '', 40000, 5, 'Wisata', 'Kids Friendly', '', '15:00:00', '23:00:00'),
(9, '9.jpg', 'Omah Kayu', 'Jl. Gn. Banyak, Gunungsari, Kec. Bumiaji, Kota Batu, Jawa Timur 65312', 'Ingin bersantai di tengah hutan pinus sekaligus menikmati kota Batu dari ketinggian? Omah Kayu adalah spot wisata alam di Batu yang paling tepat! Tempat ini merupakan penginapan yang dikonsep sebagai tree house dengan teras yang menghadap pemandangan kota Batu di antara pepohonan pinus. Berfoto di sini pastinya bakal epik banget deh!', '', 5000, 5, 'Wisata', 'Instagramable', '', '09:00:00', '17:00:00'),
(10, '10.jpg', 'Coban Putri', 'Desa Oro-Oro Ombo, Kecamatan Batu, Kota Batu, Jawa Timur', 'Destinasi wisata alam di Batu ini bisa dikatakan masih baru dan belum banyak yang mengetahui keindahannya. Selain air terjun yang sejuk dan indah, ada gardu pandang untuk kalian yang ingin menikmati keindahan alam perbukitan dan lembah di kota Batu. Keren abis!', '', 5000, 4, 'Wisata', 'Nature', 'Instagramable', '09:00:00', '17:00:00'),
(11, '11.jpg', 'Golden Tulip Holland Resort', 'Jl. Matoa, Sisir, Kec. Batu, Kota Batu, Jawa Timur 65315', 'Hotel Golden Tulip Holland Resort bintang 4 terletak di jantung tempat rekreasi di Batu dengan akses mudah ke tempat rekreasi dan hiburan keluarga, dua tempat makanan & minuman, kolam renang, spa, pusat kebugaran, taman bermain anak-anak, fungsi dan fasilitas ruang pertemuan yang melayani hingga 2000 orang.', '(0341) 33020', 2000000, 5, 'Hotel', '', '', '00:00:00', NULL),
(12, '12.jpg', 'Amarta Hills Hotel and Resort ', 'Jl. Abdul Gani Atas, Ngaglik, Kec. Batu, Kota Batu, Jawa Timur 65311', 'Amartahills Hotel and Resort terletak di Batu, 700 meter dari Kusuma Agrowisata dan 1,3 km dari Jatim Park 1. Anda dapat bersantap di restoran akomodasi. Tempat parkir pribadi di lokasi tersedia gratis.\r\n<br><br>\r\nSemua kamar dilengkapi dengan TV layar datar. Beberapa unit tertentu meliputi area untuk duduk bersantai. Ketel juga tersedia di kamar. Setiap kamar memiliki kamar mandi pribadi. Sandal dan perlengkapan mandi gratis disediakan untuk kenyamanan Anda. Amartahills Hotel and Resort menawarkan WiFi gratis di seluruh area properti.\r\n', '(0341) 52588', 1200000, 4, 'Hotel', '', '', NULL, NULL),
(13, '13.png', 'Senyum World Hotel', 'Jl. Ir Sukarno No.144, Beji, Kec. Junrejo, Kota Batu, Jawa Timur 65236', 'Terletak di Batu, Senyum World Hotel memiliki pusat kebugaran, bar, lounge bersama, dan taman. Akomodasi ini menyediakan resepsionis 24 jam, restoran, taman air, dan kolam renang outdoor. Akomodasi ini menawarkan hot tub, Wi-Fi gratis, dan kamar-kamar keluarga.', '(0341) 30739', 1250000, 5, 'Hotel', '', '', NULL, NULL),
(14, '14.jpg', 'Kusuma Agrowisata Resort', 'Kawasan Wisata Kusuma Agro, Jalan Abdul Gani Atas, Ngaglik, Kecamatan Batu, Ngaglik, Batu, ', 'Hotel Kusuma Agrowisata memiliki daya tarik sendiri dalam menarik minat pengunjung untuk sekedar mengisi hari libur bersama keluarga. Kusuma Agrowisata Malang Hotel  mempunyai daya tarik utama berupa perkebunan apel yang sudah terkenal apel khas dari daerah Batu. Selain kebun apel, Kusuma Agrowisata juga  memiliki kebun jeruk dan tanaman hias. Hotel ini terletak di daerah tinggi Batu yang terkenal suasana yang sejuk dan asrinya, selain kesejukan dan keindahan suasana disana, Hotel ini juga jauh dari bising suara kendaraan dan polusi asap yang setiap hari tidak dapat kita hindari.\r\n<br><br>	\r\nKusuma Agrowisata Hotel  juga dilatar belakangi panorama Gunung Panderman, Gunung Arjuna dan pegunungan lainnya disekitar hotel. Fasilitas yang diberikan juga tidak kalah dengan hotel lainnya di Kota Malang, mulai dari taman bermain, kolam renang, tempat berkuda dan masih banyak fasilitas lainnya siap memanjakan hari libur Anda bersama keluarga. Tidak ada salahnya Hotel Kusuma Agrowisata menjadi tempat bersantai di waktu libur bersama keluarga. \r\n', '(0341) 593 3', 500000, 4, 'Hotel', '', '', NULL, NULL),
(15, '15.jpg', 'Kontena Hotel', 'Jln. KH, Jl. Agus Salim No.106, Temas, Batu, Batu City, East Java 65315', 'Hotel bintang 3 ini berada di Jl. KH Agus Salim No.106 Batu Malang, 65315 Batu Jawa timur. Kontena Hotel menawarkan berbagai fasilitas penunjang bagi para tamu, mulai dari restoran, kolam renang lengkap dengan permainan mini waterboom, taman hijau, area playground yang semuanya tentu menjadi spot foto instagramable bagi Anda. Dekorasi ruangan didesain minimalis dengan konsep industrial menjadi daya pikat tersendiri bagi para tamu.', '', 350000, 4, 'Hotel', '', '', NULL, NULL),
(16, '16.jpg', 'Aston Inn batu', 'Jl. Abdul Gani Atas No.42, Ngaglik, Kec. Batu, Kota Batu, Jawa Timur 65311', 'Hadir di kawasan kota wisata Batu yang terletak 15 Km dari kota Malang Jawa Timur, Aston INN memiliki 105 unit terbaik untuk menjadi pilihan Anda untuk menginap, dengan iklim sejuk pegunungan dan berdekatan dengan destinasi wisata favorit keluarga.\r\n<br><br>\r\nMemiliki lokasi yang berdekatan dengan beberapa destinasi wisata populer di Jawa Timur seperti : Museum Angkut, Jatim Park, Eco Green Park & Batu Wonderland menjadikan ASTON INN Batu Malang pilihan terbaik untuk  Anda.\r\n', '(0341) 59555', 500000, 4, 'Hotel', '', '', NULL, NULL),
(17, '17.jpg', 'The Singhasari Resort Batu', 'Jl. Ir Sukarno No.120, Beji, Kec. Batu, Kota Batu, Jawa Timur 65236', 'The Singhasari Resort Batu menawarkan akomodasi bintang 5 dengan kolam renang luar ruangan, restoran, dan berbagai fasilitas rekreasi. Wi-Fi tersedia gratis di area umum.\r\n<br><br>\r\nSinghasari Batu Resort dapat dicapai dalam 15 menit berkendara dari Jatim Park dan Batu Night Spectacular. Akomodasi ini dapat dicapai dalam 20 menit berkendara dari Stasiun Kereta Kota Baru dan 30 menit berkendara dari Gunung Panderman.\r\n', '(0341) 51333', 900000, 5, 'Hotel', '', '', NULL, NULL),
(18, '18.jpg', 'Klub Bunga Butik Resort', 'Jl. Kartika No.2, Sisir, Kec. Batu, Kota Batu, Jawa Timur 65315', 'Klub Bunga Butik Resort terletak di dekat Jatim Park 1, menawarkan sebuah kolam renang outdoor, pusat kebugaran, dan restoran. Fasilitas bowling, biliar, dan karaoke juga tersedia di resor. Wi-Fi gratis dapat diakses di area umumnya.\r\n\r\nKlub Bunga Butik Resort berjarak 10 menit jalan kaki dari Jatim Park 2, 10 menit berkendara dari Batu Night Spectacular, dan 1 jam berkendara dari Bandara Abdul Rachman Saleh.\r\n\r\nSemua kamar menawarkan pemandangan taman, juga dilengkapi dengan TV kabel layar datar, ketel listrik, dan minibar. Kamar mandi dalamnya menyediakan shower, handuk, dan satu set perlengkapan mandi gratis. Sandal juga tersedia.\r\n\r\nResor ini menawarkan berbagai fasilitas rekreasi di areanya seperti spa, ruang permainan, dan perpustakaan. Anda juga dapat memanfaatkan fasilitas hot tub, squash, dan tenis meja, sementara anak-anak bisa bermain di klub anak-anak. Staf di meja depan 24 jam dapat membantu dengan layanan binatu dan menjaga anak.\r\n\r\nTeratai Coffee Shop menyajikan hidangan favorit internasional, sedangkan Bar & Wine Corner menyediakan minuman beralkohol, dan Tea Lounge menawarkan teh, kopi, dan makanan ringan. Anda juga dapat menikmati hidangan di dalam kamar melalui layanan kamar.\r\n', '(0341) 59477', 650000, 4, 'Hotel', '', '', NULL, NULL),
(19, '19.jpg', 'Spencer Green Hotel ', 'Jl. Raya Punten No.86, Punten, Kec. Bumiaji, Kota Batu, Jawa Timur 65338v', 'Spencer Green Hotel beralamat di Jl. Raya Punten No. 86, Kecamatan Bumiaji, Kota Batu, Jawa Timur. Berada di ketinggian 1.300 meter dpl, hotel ini menawarkan pemandangan Gunung Arjuno dan Welirang yang memesona.', '(0341) 59782', 492000, 4, 'Hotel', '', '', NULL, NULL),
(20, '20.jpg', 'De Lobby Suite Hotel', 'Jl. Imam Bonjol No.5, Sisir, Kec. Batu, Kota Batu, Jawa Timur 65314', 'De Lobby Suite Hotel merupakan pilihan terbaik bagi Anda yang ingin berlibur bersama keluarga. Berjarak hanya sekitar 1 menit ke Batu Wonderland, 3 menit ke Batu Secret Zoo, Jatim Park I, dan Jatim Park II, serta 4 menit dari Eco Green Park, membuat Anda memiliki banyak pilihan tempat wisata yang bisa dikunjungi selama anda berwisata di kota Batu.\r\n<br><br>\r\nDe Lobby Suite Hotel juga menawarkan kamar yang dilengkapi dengan TV, shower, air conditioner, sandal hotel, dan safety box di semua akomodasinya. Pada kamar mandi DeLobby Suite Hotel pun telah disediakan berbagai perlengkapan mandi seperti sampo, sabun, handuk mandi, pasta gigi, sikat gigi, dan penutup rambut. Seluruh area DeLobby Suite Hotel memiliki akses Wi-Fi gratis tak berbatas demi menunjang kebutuhan komunikasi Anda.\r\n<br><br>\r\nJika ingin berenang, Anda tidak perlu pergi ke kolam renang karena DeLobby Suite Hotel memiliki fasilitas kolam renang indoor. DeLobby Suite Hotel berjarak sekitar 45 menit dari Terminal Bus Arjosari dan 45 menit dari Stasiun Malang Kota Baru. Untuk keperluan oleh-oleh, Anda hanya membutuhkan sekitar 5 menit perjalanan ke Brawijaya Oleh oleh yang merupakan pusat oleh-oleh terkenal di kota Batu.\r\n', '(0341) 51000', 420000, 4, 'Hotel', '', '', NULL, NULL),
(21, '21.jpg', 'Omah Kitir Cafe Factory', 'Jl. Ridwan No. 1, Ngaglik, Batu', 'Omah Kitir menjadi urutan teratas di kategori tempat kuliner terbaik di Kota Batu. Model bangunan semi kolonial, mungkin itulah kesan pertama yang dirasakan setiap pengunjung ketika melihat Omah Kitir Batu. Selain terkesan nyaman dan rapi, nuansa romantis khas Omah Kitir Batu juga sangat kental dirasakan apalagi ketika waktu sore hari menjelang malam, benar-benar “The Most Romantic Place in Town”. <br<br>\r\nUntuk menu hidangan yang disajikan juga beragam mulai dari baked pasta, pizza, chicken noodle, fried rice, klappertaart, steak, pie corner, sandwich, side dish dan aneka menu snack lainnya yang siap menemani waktu bersantai di Omah Kitir Cafe Factory Batu.', '524988', NULL, 5, 'Kuliner', '', '', '11:00:00', '23:30:00'),
(22, '22.jpg', 'Waroeng Bamboe Lesehan', 'Jalan Raya Sidomulyo, Punten, Batu', 'Waroeng Bamboe Lesehan Sidomulyo terkenal akan sensasi berkuliner yang dijamin membuat Anda terkesan. Makanan tradisional seperti aneka olahan ikan, ayam, bebek dan sayuran menjadi hidangan utama yang terdapat di Waroeng Lesehan Bamboe Batu. Bukan hanya makanannya saja yang terkenal enak dan tersaji dalam berbagai macam varian, nuansa alam khas daerah Batu yang terkenal akan hawa sejuk dan pemandangannya yang asri juga siap memanjakan Anda. Sesuatu yang pastinya membuat Anda kerasan di Warung Bambu Batu adalah ketika Anda menyantap makanan ditemani oleh gemericik air dan ribuan ikan koi yang berada dibawah lesehan semakin membuat waktu makan terasa menakjubkan. Tempat kuliner ini buka setiap harinya mulai pukul 09.00 sampai dengan 20.30 WIB.\r\n<br><br>\r\nHarga menu kuliner : Rp 5000 – 50.000', '590754', NULL, 4, 'Kuliner', '', '', '09:00:00', '21:00:00'),
(23, '23.jpg', 'Pupuk Bawang Cafe & Dining', 'Jl. Panglima Sudirman No.116, Pesanggrahan, Kota Batu, Jawa Timur ', 'Pupuk Bawang Cafe & Dining berlokasi di Jalan Panglima Sudirman Nomor 116, Pesanggrahan, Kecamatan Batu, Kota Batu. Tempat ini cocok buat kamu yang ingin menikmati beragam menu makanan sembari menikmati pemandangan gunung dan persawahan.\r\n<br><br>\r\nSuasana tempat makan yang tenang juga menjadi daya tarik lainnya. Saat malam hari, pemandangan yang dapat kamu saksikan adalah kerlip lampu kota di kejauhan. Harga yang ditawarkan mulai dari Rp15 ribuan', '081217926767', NULL, 4, 'Kuliner', '', '', '11:00:00', '21:00:00'),
(24, '24.jpg', 'Sate Hotplet', 'Jl. Patimura No.40, Temas, Kec. Batu', 'Depot Sate Hotplet merupakan salah satu tempat kuliner di Kota Batu yang menyajikan menu hidangan utama berupa sate ayam dan sate kambing. Cara penyajian yang dihidangkan diatas hotplet bersama bumbu kacang serta irisan bawang merah dan jeruk nipis semakin menambah sensasi makan lebih bergairah. Selain Sate Hotplet Batu, terdapat menu lain yang tidak kalah nikmat untuk dinikmati bersama keluarga diantaranya seperti tongseng daging, sop kikil, gule, otak goreng, bacem hingga tengkleng. Adapun Sate Ayam, Rawon dan Krengseng untuk para pengunjung yang kurang suka dengan menu utama berbahan daging kambing.\r\n<br><br>\r\nKisaran harga sate : Rp 10.000 – 20.000 an', '593662', NULL, 4, 'Kuliner', '', '', '08:00:00', '21:00:00'),
(25, '25.jpg', 'Warung Wareg', 'Jl. Raya Dieng No.9, Sidomulyo, Kec. Batu, Kota Batu, Jawa Timur 65317', 'Terletak di lokasi yang strategis yakni jalan utama menuju ke pusat Kota Batu menjadikan tempat kuliner Warung Wareg pilihan tempat makan ketika bingung mau mencari makan dimana. Warung Wareg Batu menawarkan aneka macam masakan yang menurut komentar dari banyak orang “taste very good”. Menu utama yang menjadi primadona di Warung Wareg adalah olahan gurami yang tersaji dalam kondisi goreng dan bakar. Selain Gurami, adapun menu olahan lain seperti ayam goreng/bakar, bakso, lele, aneka gorengan, nasi goreng dan bakmi. Soal harga juga cukup terjangkau, untuk aneka oalahn Gurami Warung Wareg dibandrol kisaran harga Rp.50.000, sedangkan menu lainnya dibawah Rp.20.000.\r\n<br><br>\r\nHarga menu masakan : Rp 20.000 – 60.000 an\r\n\r\nHarga minuman : Rp. 5000 – 18.000 an\r\n', '0853-7771-40', NULL, 5, 'Kuliner', '', '', '10:00:00', '20:30:00'),
(26, '26.jpg', 'Pos Ketan Legenda', 'Jalan Kartini No. 6, Ngaglik, Batu, Sisir, Kec. Batu, Malang, Jawa Timur 65311', 'Pos Ketan Legenda merupakan salah satu kuliner andalan Kota Batu. Lokasinya di sebelah barat Alun-alun Kota Batu, tepatnya di Jalan Kartini Nomor 6, Sisir, Kecamatan Batu, Kota Batu.\r\n<br><br>\r\nWarung yang sudah ada sejak 1967 ini menyajikan beragam menu serba ketan. Kamu bisa memilih berbagai menu ketan seperti ketan bubuk, ketan susu keju, ketan kacang, ketan keju meses, ketan campur, ketan kicir, dan lain-lain.\r\n<br><br>\r\nSelain ketan, kamu juga bisa menikmati aneka menu minuman seperti teh, kopi, josua, sogem, jahe, STMJ murni, hingga susu.', '081334313353', NULL, 4, 'Kuliner', '', '', '09:00:00', '00:00:00'),
(27, '27.jpg', 'Ria Djenaka Batu', 'Jl. Ir. Soekarno No. 142, Beji, Junrejo, Batu', 'Berbeda dengan Ria Djenaka yang berlokasi di Malang, Cafe Ria jenaka yang terletak di jalur utama arah Kota Batu ini menjadi tempat kuliner sekaigus tempat hangout yang begitu cozy dan nyaman. Tatanan bangunan yang terkesan modern dan cocok untuk tempat berkumpul membuatnya selalu ramai dipenuhi oleh para kawula muda yang mayoritas mahasiswa dan pembisnis muda. Menu kulinernya pun beragam mulai dari dessert, main course sampai dengan snack tersedia untuk menemani waktu bersantai di Ria Djenaka Batu. Yang menjadi unik dan berbeda di Ria Djenaka Batu ini adalah konsep tempat duduk yang tersedia dalam beberapa nuansa. Di lantai 1 kental akan atmosfer tradisionalnya, sedangkan di lantai 2 terdapat box kontainer yang di dalamnya sudah ditata sedemikian rupa, dan di lantai 3 hadir dengan konsep teras terbuka yang memungkinkan para pengunjung melihat sekitar Cafe Ria Djenaka dari atas.', '', NULL, 4, 'Kuliner', '', '', '09:00:00', '01:00:00'),
(28, '28.jpg', 'Jungle Fast Food Resto', 'Jl. Oro-Oro Ombo No.9, Temas, Kec. Batu, Kota Batu, Jawa Timur 65316', 'Model interior bergaya hutan rimba dan makan ditemani oleh hewan hewan Secret Zoo terutama Leopard dan Cheetah menjadi kesan yang akan anda dapatkan ketika berkuliner di Jungle Fast Food ini. Tidak perlu khawatir akan keberadaan hewan buas tersebut dikarenakan, tempat makan yang berada satu tempat dengan Hotel Pohon Inn sudah menjamin keselamatan Anda dengan membatasi interaksi para pengunjung dengan kaca tebal. Untuk menu masakan yang terdapat di Restoran Jungle Fast Food beragam dan hadir dalam varian tipe masakan mulai dari tradisional, chinnese hingga western.', '(0341) 59611', NULL, 4, 'Kuliner', '', '', '10:00:00', '22:00:00'),
(29, '29.jpg', 'Kopi Sontoloyo', 'Rekesan, Bulukerto, Bumiaji, Batu City, East Java 65334', 'Tidak hanya interior dan pernik jadul saja yang membuat pengunjung betah berlama-lama, panorama juga. Di sini pengunjung bisa melihat sawah, perkebunan teh, dan satu hal lagi, gunung. Yup, kamu bisa bersantai dengan panorama-panorama cantik yang ditawarkan. Kamu akan betah lama-lama di tempat ini. Udaranya sejuk, panorama cantik dan Instagramable.\r\n<br><br>\r\nSementara untuk menu-menu yang ditawarkan ada banyak jenisnya. Minumannya, ada jamu sampai wedang uwuh juga ada. Pecinta kopi, bisa memilih menu seperti halnya arabika-robusta. Udara yang dingin memang paling enak minum yang hangat-hangat ya Teman Traveler.\r\n\r\nUntuk menu makanannya, ada nasi goreng Jawa, bakmi Jawa, kikil pedas, dadar telor, soto seger, lodeh pedes, mi Instan dan lain-lain. Harganya juga murah meriah, makanan berat paling mahal Rp18.000. Sementara untuk camilannya dan minumannya harga paling mahal Rp10.000 saja.', '(0341) 59044', NULL, 5, 'Kuliner', '', '', '10:00:00', '21:00:00'),
(30, '30.jpg', 'Payung Batu', 'Jl. Brigadir Jenderal M. Manan, Songgokerto, Songgokerto, Kec. Batu.', 'Sementara untuk menu-menu yang ditawarkan ada banyak jenisnya. Minumannya, ada jamu sampai wedang uwuh juga ada. Pecinta kopi, bisa memilih menu seperti halnya arabika-robusta. Udara yang dingin memang paling enak minum yang hangat-hangat ya Teman Traveler.\r\n<br><br>\r\nUntuk menu makanannya, ada nasi goreng Jawa, bakmi Jawa, kikil pedas, dadar telor, soto seger, lodeh pedes, mi Instan dan lain-lain. Harganya juga murah meriah, makanan berat paling mahal Rp18.000. Sementara untuk camilannya dan minumannya harga paling mahal Rp10.000 saja.\r\n<br><br>\r\nAneka Menu : Jagung Bakar/Rebus, Mie Instant, Nasi Goreng, Lalapan, Roti Bakar dan banyak lainnya.', '', NULL, 4, 'Kuliner', '', '', '07:00:00', '23:00:00');

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
(8, 'Jake Peralta', 'jake@gmail.com', 'jake', '08129124', 'User'),
(9, 'John McClane', 'camaba.2k20@gmail.com', 'john', '081294211', 'User');

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
  MODIFY `id_bukti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `places`
--
ALTER TABLE `places`
  MODIFY `id_place` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
