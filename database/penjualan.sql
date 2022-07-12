-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 21, 2022 at 10:17 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id_bank` char(15) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `no_rek` varchar(30) NOT NULL,
  `atas_nama_pemilik` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id_bank`, `nama_bank`, `no_rek`, `atas_nama_pemilik`) VALUES
('123456', 'Mandiri', '84901849', 'Vano'),
('IBSI987654', 'Bank BSI', '4519897653', 'Aminah');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `no` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_produk` char(10) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `pilihan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(6, 'Muslimah'),
(8, 'Hijab'),
(9, 'Accesories'),
(10, 'Kids');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` varchar(100) NOT NULL,
  `ongkos_kirim` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`, `ongkos_kirim`) VALUES
(3, 'Tegal Barat', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `id_bank` char(15) NOT NULL,
  `gambar_bukti` varchar(256) NOT NULL,
  `status_pembayaran` enum('Belum bayar','Sudah bayar') NOT NULL,
  `atas_nama` varchar(150) NOT NULL,
  `no_rek` varchar(30) NOT NULL,
  `id_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` char(10) NOT NULL,
  `nama_produk` varchar(200) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `harga_awal` int(11) NOT NULL,
  `harga_diskon` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `size` varchar(8) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `tanggal_dibuat` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `id_kategori`, `harga_awal`, `harga_diskon`, `stok`, `size`, `deskripsi_produk`, `gambar`, `tanggal_dibuat`) VALUES
('ANYDRS', 'Anya Dress', 6, 200000, 200000, 15, 'M', 'Detail bahan : Motif : rayon Armani  -Resleting dada depan (busui friendly) -Model manset karet (Wudhu friendly) -Saku kanan kiri -Model ban pita yang unik -Tali terpisah dengan dress -Tersedia size XS, S,M, L dan XL', 'img1654662522.png', '2022-06-08'),
('AUFDRS', 'Aufa Dress', 6, 300000, 290000, 10, 'L', 'Dress casual to semi formal dengan bahan yang adem, cocok banget buat nemenin lebaran kamu nanti. Detail unik di bagian lengan dan lipit di bagian rok depan nya bikin penampilan kamu di hari raya makin manis. Detail unik • Pleated di bagian depan rok agar terlihat slim dan jenjang • Ada aksen lipit di bagian lengan • Aksen kain tempelan di bagian rok yang menyerupai kantong tempel Detail Dress ✓ Resleting dada depan (busui friendly) ✓ Saku kanan-kiri ✓ Manset kancing satu (wudhu friendly) ✓ Tali menyatu dengan dress ✓ Tersedia size XS, S, M, L, dan XL Detail Bahan Lengan: Rayon Twill - Handfeel lembut - Menyerap keringat Badan dan rok: Madina Cotton - Adem - Halus - Two tone fabric', 'img1654600144.png', '2022-06-07'),
('BRBFMN', 'Brooch Mini Butterfly 2', 9, 8000, 8000, 14, 'All Size', 'Mata zircon original dengan logam copper anti karat. Tidak luntur/berubah warna. Jarum super tajam tidak merusak hijab. Kemas box eksklusif', 'img1654674801.png', '2022-06-08'),
('BRBTMN', 'Brooch Mini Butterfly 1', 9, 5000, 5000, 15, 'All Size', 'Mata zircon original dengan logam copper anti karat. Tidak luntur/berubah warna. Jarum super tajam tidak merusak hijab. Kemas box eksklusif', 'img1654674568.png', '2022-06-08'),
('BRTPMN', 'Brooch Mini Tangkai Padi', 9, 10000, 10000, 13, 'All Size', 'Mata zircon original dengan logam copper anti karat. Tidak luntur/berubah warna. Jarum super tajam tidak merusak hijab. Kemas box eksklusif', 'img1654674716.png', '2022-06-08'),
('CIRJPR', 'Ciput Rajut Premium', 9, 8000, 8000, 12, 'All Size', 'Kualitas premium, menyerap keringat, nyaman dipakai serta awet dan tidak mudah melebar', 'img1654675699.png', '2022-06-08'),
('CRLDRS', 'Carla Dress', 6, 210000, 210000, 12, 'M', 'Detail Bahan : Polos : Madina Catton Motif : Linen  -Kancing hidup dibagian dada (busui friendly) -Manset kancing satu (Wudhu friendly) -Saku kanan kiri -Tali terpisah dari dress -Akses layer tambahan didepan rok Tersedia size XS, S,M, L dan XL', 'img1654662345.png', '2022-06-08'),
('FRSDRS', 'Frisa Dress', 6, 230000, 230000, 15, 'S', 'Bahan Dress : Toyobo catton Kotak : Semi woll  Detail Dress -Resleting dada depan (busui friendly) -Kancing hidup dua buah dibagian dada -Manset kancing satu (Wudhu friendly) -Kancing variasi dibagian rok -Tali serut dibagian belakang dress -Layer tambahan dibagian rok -Saku di kanan kiri dress -Tersedia size XS, S,M, L dan XL', 'img1654661986.png', '2022-06-08'),
('HNSRJT', 'Handsock Rajut', 9, 230000, 230000, 12, 'All Size', 'Manset rajut ini panjang sampai siku. Dipakai nyaman dan tidak gerah. Tidak gampang melar', 'img1654675812.png', '2022-06-08'),
('HYEOVA', 'Hyejin Overall', 6, 300000, 275000, 5, 'M', 'Detail Unik • Aksen kerut di bagian manset tangan • Layer kerut di sekeliling rok bawah • Lipit di bagian pinggang depan dan belakang • Motif bunga kecil di bagian overall Detail Overall ✓ Inner resleting depan (busui friendly) ✓ Overall depan kancing hidup ✓ Ujung lengan manset kancing 1 (wudhu friendly) ✓ Saku kanan-kiri ✓ Tali pinggang dijahit menyatu ✓ Tersedia size XS, S, M, L, dan XL Detail Bahan Motif : Shakila - Tidak mudah kusut - Halus dan adem Polos : Cotton toyobo - Menyerap keringat - Lembut', 'img1654599996.png', '2022-06-07'),
('KAIHNS', 'Kaira Handsock', 9, 18000, 18000, 15, 'All Size', 'premium fabric dengan panjang +-34cm. Bahan strech dan banyak pilihan warna', 'img1654674459.jpg', '2022-06-08'),
('KIADRS', 'Kiara Dress', 6, 230000, 230000, 12, 'S', 'Bahan Dress Motif : Rayon Armani Polos : Bosanova -Resleting dada depan (busui friendly) -Saku kanan kiri -Manset kancing satu (Wudhu friendly) -Tali menyatu dengan dress -Ada layer di depan dan belakang Tersedia size XS, S,M, L dan XL', 'img1654660376.png', '2022-06-08'),
('KKMTBG', 'Kaus Kaki Motif Bunga', 9, 8000, 8000, 15, 'M', 'Bahan halus dan nyaman dipakai. Dengan motif bunga yang elegan. Tersedia ukuran S,M,L', 'img1654675011.png', '2022-06-08'),
('KKMTPL', 'Kaus Kaki Motif Polos', 9, 15000, 15000, 15, 'All Size', 'Bahan halus dan nyaman untuk dipakai. Tersedia varian warna cream, putih, navy, dan abu-abu', 'img1654675355.png', '2022-06-08'),
('KKMTSQ', 'Kaus Kaki Motif Safiqa', 9, 18000, 18000, 12, 'All Size', 'Bahan halus dan nyaman dipakai. Dengan motif safiqa yang elegan. Tersedia ukuran S,M,L', 'img1654675283.png', '2022-06-08'),
('LPTHNS', 'Lipita Handsock', 9, 20000, 20000, 15, 'All Size', 'Material : ity premium korea import, handfeel halus dan lembut, seratnya sangat rapat sehingga tidak menerawang namun tetap \'breathable\', strech, bagian rufflenya unik sesuai warna kainya', 'img1654674256.png', '2022-06-08'),
('LUCDRS', 'Lucia Dress', 6, 225000, 225000, 12, 'M', 'Detail Bahan : Motif : Cotton Stripe Polos : Cotton Madinah -Resleting dada depan (busui friendly) -Manset kancing satu (Wudhu friendly) -Saku kanan kiri -Tali pinggang dijahit menyatu dengan dress Tersedia size XS, S,M, L dan XL', 'img1654660823.png', '2022-06-08'),
('NODRS', 'Noora Dress', 6, 150000, 145000, 12, 'M', 'Detail unik • Tambahan layer di bagian pinggang dengan detail kancing variasi • Aksen layer di pundak depan hingga belakang • Lipit di bagian rok depan Detail Dress ✓ Resleting dada depan (busui friendly) ✓ Saku kanan-kiri ✓ Manset kancing satu (wudhu friendly) ✓ Tali dijahit menyatu dengan dress ✓ Layer di pinggang dijahit menyatu dengan dress ✓ Tersedia size XS, S, M, L, dan XL Detail Bahan Atasan: Amirah Cotton - Handfeel lembut - Ada sedikit efek kilap - Fabric two tone Lengan dan rok: Wollycrepe - Flowy dan ringan - Lembut - Tidak mudah kusut', 'img1654598664.png', '2022-06-07'),
('NYXDRS', 'Nyiex Dress', 6, 210000, 210000, 12, 'S', 'Detail bahan :  Motif : Catton Japan  Polos : Cassia crepe  -Knacing depan (busui friendly) -Ujing lengan manset kancing 1 (Wudhu friendly) -Model lengan semi balon -Aksen layer dibagian bawah -Detail rampel dibagain atas dress -Saku kanan kiri -Tali serut dibagian belakang dress Tersedia size XS, S,M, L dan XL', 'img1654662917.png', '2022-06-08'),
('ORBAMD', 'Oribelle Amanda Kids', 10, 205000, 205000, 15, 'All Size', 'AMANDA daily wear series by Oribelle kini hadir dengan pattern semangka yang cute banget. AMANDA daily wear ini adalah dress cantik dengan full karet di bagian pinggang yang memberikan look seperti menggunakan set blouse dan rok. Terbuat dari bahan Valencia rayoon yang terkenal sangat nyaman dikenakan, adem, dan lembut. Sehingga AMANDA dress bisa menjadi pilihan tepat untuk menemani aktivitas buah hati bunda. Selain itu, AMANDA dress tidak hanya cocok dikenakan dirumah saja, jika dipakai saat beraktivitas di luar rumahpun tetap terlihat fashionable.  -- MATERIAL -- DRESS : VALENCIA RAYOON (Spesifikasi : Sejenis rayon premium,Jatuh , adem, lembut, dan nyaman dikenakan.)  -- SIZE PACK -- SIZE 6 LD 74cm/ PT 41cm / PB 95cm SIZE 8 LD 80cm/ PT 47cm / PB 105cm SIZE 10 LD 86cm/ PT 53cm / PB 125cm SIZE 12 LD 90cm/ PT 56cm / PB 130cm SIZE XS LD 94 CM /PT 57CM / PB 135cm  KETERANGAN LD = Lebar Dada PT = Panjang Tangan PB = Panjang Baju  -- COLOURS -- LILAC | BLACK | PINK | SILVER | GREY |MINT', 'img1654672028.png', '2022-06-08'),
('ORBAMT', 'Oribelle Amanta Tunik One Set', 10, 300000, 295000, 8, 'S', 'Tunik Amanta dipadukan dengan inner dress tanpa lengan, ditambah floral patternnya bikin si buah hati makin cute saat memakainya.  MATERIAL : Tunik : Monalisa Premium (spesifikasi : bahannya ringan, jatuh, tidak mudah kusut, adem dan nyaman dikenakan) Inner dress dan kerudung : Shakila (Spesifikasi : bahan ringan, Strech , lembut, dan nyaman dikenakan)  SIZE :  SIZE 6 / 8 / 10 / 12 / XS  WARNA : BROWN / PINK / GREY / BLUE', 'img1654673536.png', '2022-06-08'),
('ORBCLO', 'Oribelle Cleo', 10, 250000, 250000, 12, 'All Size', 'MATERIAL = Vest + Celana : Waffle Knit Uni*lo Blouse : ITY jersey SIZE : 6/8/10/12/XS COLOURS  : CORRAL | TAUPE | MILLO | OLIVE', 'img1654664224.png', '2022-06-08'),
('ORBINY', 'Oribelle Inaya Overall', 10, 280000, 280000, 12, 'S', 'INAYA overall dipadukan dengan inner blouse yang nyaman dikenakan dan lengan yang cantik model puffy. didesign chic dan simple.  MATERIAL : OVER ALL : Baby Korduroy suede (Spesifikasi : tebal, tidak menerawang, cocok untuk bahan rok, menyerap keringat, nyaman dikenakan) BLOUSE & Kerudung instan : ITY Jersey (Spesifikasi : jersey kualitas premium, adem, jauh, menyerap keringat, gak gampang kusut dan nyaman dikenakan)  SIZE PACK: SIZE 6 LD 74cm/ PT 41cm/ PB 95cm SIZE 8 LD 80cm/ PT 47cm/ PB 105cm SIZE 10 LD 86cm/ PT 53cm/ PB 125cm SIZE 12 LD 90cm/ PT 56cm/ PB 130cm  SIZE PACK TEENS: SIZE XS/S LD 94cm/ PT 56cm/ PB 135cm  Keterangan : LD = Lingkar Dada PT = Panjang Tangan PB = Panjang Baju (Note : Panjang Overall dari bahu sampai mata kaki)  WARNA : STONE / ARMY / PINK / LILAC', 'img1654673046.png', '2022-06-08'),
('ORBKAR', 'Oribelle Karra One Set', 10, 285000, 280000, 15, 'S', 'One set \"KARRA\", set basic dengan blouse super gemas karena terdapat aksen sambung juga dipadukan celana semi flare memberikan kesan chic and casual. Dan ga kalah gemashnya karena one set KARRA hadir dengan warna warna yang limited, cocok banget untuk semua skintone  KARRA set dengan design simple dan elegan terbuat dari bahan Mango Misty, sejenis bahan kaos super nyaman, adem, menyerap keringat, bertesktur dan stretch jadi nyaman di pakai seharian  SIZE PACK 6 / 8 / 10 /12 / XS  WARNA SAGE / ASHROSE / DUSTY BLUE / ZINC', 'img1654673332.png', '2022-06-08'),
('ORBNKT', 'Oribelle Nikita Overall', 10, 295000, 295000, 15, 'All Size', 'Overall terbaru kali ini hadir dengan design yang unik. yaitu NIKITA overall set, terbuat dari material narumi linen look yang nyaman digunakan. NIKITA overall set ini didesign simple dan elegant karna details collar vintage dan aksen pleat dibagian rok, memberikan kesan feminin look. NIKITA overall set siap menenami aktivitas buah hati bunda makin cheerfull.  -- MATERIAL -- MOTIF Salur : NARUMI LINEN POLOS : ELENA CREPE  -- SIZE PACK -- SIZE 6 LD 74cm/ PT 41cm / PB 95cm SIZE 8 LD 80cm/ PT 47cm / PB 105cm SIZE 10 LD 86cm/ PT 53cm / PB 125cm SIZE 12 LD 90cm/ PT 56cm / PB 130cm SIZE XS LD 94 CM /PT 57CM / PB 135cm  KETERANGAN LD = Lebar Dada PT = Panjang Tangan PB = Panjang Baju  -- COLOURS -- MILLO | LILAC | DUSTY | GREY', 'img1654665550.png', '2022-06-08'),
('ORBTHE', 'Oribelle Theana', 10, 300000, 300000, 12, 'S', '-- MATERIAL -- JILBAB + VEST + ROK : (sejenis kain denim look, berserat, lembut, adem dan nyaman dikenakan) BLOUSE : Lady Zara Crepe (sejenis bahan crepe, jatuh, dan nyaman dikenakan)  -- SIZE PACK -- SIZE 6 Hoodie : LD 74cm / PB 47cm / PT 41cm Rok : LP 48cm / PR 70cm SIZE 8 Hoodie : LD 80cm / PB 49cm / PT 47cm Rok : LP 52cm / PR 80cm SIZE 10 Hoodie: LD 86cm / PB 51cm / PT 53cm Rok : LP 56cm / PC 86cm SIZE 12 Hoodie : LD 90cm / PB 53cm / PT 57cm Rok: LP 60cm / PC 92cm SIZE XS Hoodie : LD 94 / PB 55cm / PT 58cm Rok : LP 62 / PC 96cm  LD = Lingkar Dada PB = Panjang Baju PT = Panjang Tangan LP = Lingkar Pinggang (bisa melar) PR = Panjang Rok  -- COLOUR -- DOVE | BLUE | GREY | MINT', 'img1654672184.png', '2022-06-08'),
('ORBTSY', 'Oribelle Tasya Jumpsuit Kids', 10, 280000, 280000, 10, 'S', 'Tasya jumpsuit ini didesign simple dipermanis dengan aksen ruffle dibagian lengannya. Terbuat dari bahan kaos waffle knit yang dipadukan dengan inner yang terbuat dari kaos spandek rayon yang pastinya nyaman dikenakan dan cocok untuk menemani aktivitas buah hati bunda sepanjang hari. (One set Jumpsuit + Inner blouse + kerudung)  SIZE PACK KIDS 6 / 8 / 10 /12 / XS  WARNA Grey / Dusty / Lilac / Maroon / Millo', 'img1654672843.png', '2022-06-08'),
('SLSKTK', 'Salsa Series Tunik & Kulot', 10, 260000, 260000, 15, 'S', 'MATERIAL Tunik : katun BARBIS garmen Flanel Kulot dan kerudung ( Zara crepe )  DETAIL : - Tunik model krah - kancing bagian tangan - saku bagian bawah tunik - tunik model balon - kulot kantong kiri kanan - kulot model depan rempel jait - kulot pakai karet bagian belakang - kerudung model instan segitiga. Belah depan bisa di ikat kebelakang  SIZE : S 5-6 th Tunik : LD 74 cm, PB 75 cm Kulot : Lk 48 cm, Pk 75 cm  M 7-8 th Tunik : LD 80 cm, PB 80 cm Kulot : Lk 52 cm, Pk 80 cm  L 9-10 th Tunik : LD 86 cm, PB 85 cm Kulot : Lk 56 cm, Pk 85 cm  XL 11-12 th Tunik : LD 92 cm, PB 90 cm Kulot : Lk 60cm, Pk 90 cm', 'img1654672470.png', '2022-06-08'),
('SPOVA', 'Sophie Overall', 6, 250000, 230000, 4, 'M', 'Detail Unik • Bahan overall lebih premium dari sebelumnya • Motif bunga manis khas overall Sophie Detail Dress ✓ Inner menyatu dengan overall ✓ Resleting dada depan (busui friendly) ✓ Kancing hidup di bagian depan dress dan kancing variasi di rok ✓ Saku kanan-kiri ✓ Ujung lengan manset kancing 1 (wudhu friendly) ✓ Tali terpisah dengan overall ✓ Tersedia size XS, S, M, L, dan XL Detail Bahan Polos : Amirah sofia - Tidak transparan - Tenunan 2 warna - Halus dan lembut Motif : Rayon viscose - Nyaman di kulit - Adem', 'img1654599949.png', '2022-06-07'),
('UMCIAR', 'Umama Ciput Arab', 9, 7500, 7000, 12, 'All Size', 'Aksesoris hijab terbaru Ciput Arab Ninja by Umama Scarf, terbuat dari bahan kaos inner berkualitas yang adem dan nyaman dipakai.', 'img1654606649.png', '2022-06-07'),
('UMCINJ', 'Umama Ciput Ninja', 9, 7000, 7000, 12, 'All Size', 'Aksesoris hijab terbaru Ciput Arab Ninja by Umama Scarf, terbuat dari bahan kaos inner berkualitas yang adem dan nyaman dipakai.', 'img1654606614.png', '2022-06-07'),
('UMPAJP', 'Umama Paris Jepang', 8, 22000, 22000, 17, 'All Size', 'Kerudung segi empat terbaru Paris Jepang Lc. Terbuat dari bahan Paris twice yang adem, tebal dan mudah dibentuk. Dilengkapi dengan lasercut pada pinggiran hijab dan tag Umama plat besi. Bahan : Paris Twice Ukuran : 110 x 110 cm', 'img1654605500.png', '2022-06-07'),
('UMPOSQ', 'Umama Potton Square', 8, 22000, 22000, 17, 'All Size', 'Kerudung Potton Square terbaru dari Umama Scarf. Dengan bahan yang adem, mudah dibentuk dan enak digunakan. Cocok digunakan dengan bawahan manapun. tersedia dalam berbagai warna menarik. Bahan : Polycotton Ukuran : 110 x 110', 'img1654605380.png', '2022-06-07'),
('UMPSBD', 'Umama Scarf Pashmina Baby Doll Armany', 8, 25000, 25000, 12, 'All Size', 'Armany Pashmina Baby Doll terbaru by Umama Scarf. Terbuat dari bahan Ceruty Baby Doll premium yang lentur, tidak mudah kusut, tebal dan jatuh. Permukaannya bertekstur pasir yang rapat dan pinggirnya di double jahit tepi yg super rapih. Tersedia dalam berbagai warna yang cantik. Ukuran : 175 x 75 cm Bahan : Ceruty Baby Doll Premium', 'img1654600346.png', '2022-06-07'),
('UMPSSQ', 'Umama Pashmina Square', 8, 20000, 20000, 12, 'All Size', 'Kerudung Pashmina Square terbaru by Umama Scarf. Terbuat dari bahan Ceruty Diamond premium yang tebal, lembut dan mudah diatur. Dilengkapi dengan tag plat besi yang cantik. Bahan : Ceruty Diamond Ukuran : 175 x 75', 'img1654607404.png', '2022-06-07'),
('UMSARA', 'Umama Saudia Rawis', 8, 20000, 19500, 17, 'All Size', 'Kerudung Saudia Rawis terbaru by Umama Scarf terbuat dari bahan premium yang berkualitas, tidak mudah berbulu, lembut, tidak luntur, adem dan nyaman dipakai. Dilengkapi dengan aksen rawis pada pinggiran hijabnya. Bahan : Polyester Ukuran : 110 x 110', 'img1654605939.png', '2022-06-07'),
('UMSEBV', 'Umama Segi Empat Basic Voal', 8, 25000, 22500, 12, 'All Size', 'Kerudung Segi Empat Basic Voal Lc. Terbuat dari bahan Polyester yang adem, mudah dibentuk dan nyaman dipakai. Dilengkapi dengan lasercut pada pinggir hijabnya. Tersedia dalam berbagai warna cantik. Bahan : Polyester Ukuran : 110x110cm', 'img1654606709.png', '2022-06-07'),
('UMSEGL', 'Umama Segi Empat Glowing', 8, 20000, 20000, 17, 'All Size', 'Kerudung segi empat Glowing Lc by Umama Scarf. Terbuat dari bahan Cotton Lurex yang berserat, jatuh dan ringan dipakai. Dengan aksen glitter menambah kesan mewah pada kerudung ini, dilengkapi dengan lasercut pada pinggiran hijabnya. Bahan : Cotton Lurex Ukuran : 110 x 110', 'img1654606004.png', '2022-06-07'),
('UMVOMJ', 'Umama Voal Miracle Japan Print', 8, 25000, 25000, 17, 'All Size', 'Kerudung motif Voal Miracle Print Lc terbaru by Umama Scarf terbuat dari bahan Voal Miracle yang berkualitas, tidak mudah berbulu, lembut, tidak luntur, adem dan nyaman dipakai. Terdiri dalam berbagai motif cantik. Material : Voal Miracle Size : 110 x 110 cm', 'img1654605878.png', '2022-06-07'),
('UMVOMM', 'Umama Voal Miracle Motif LC', 8, 22000, 21500, 15, 'All Size', 'Kerudung motif Voal Miracle Motif Lc terbaru by Umama Scarf terbuat dari bahan Voal Miracle yang berkualitas, tidak mudah berbulu, lembut, tidak luntur, adem dan nyaman dipakai. Terdiri dalam berbagai motif cantik. Material : Voal Miracle Size : 110 x 110 cm', 'img1654606368.png', '2022-06-07'),
('UMVOMP', 'Umama Voal Miracle Print', 8, 22000, 22000, 17, 'All Size', 'Kerudung motif Voal Miracle Print Lc terbaru by Umama Scarf terbuat dari bahan Voal Miracle yang berkualitas, tidak mudah berbulu, lembut, tidak luntur, adem dan nyaman dipakai. Terdiri dalam berbagai motif cantik. Material : Voal Miracle Size : 110 x 110 cm', 'img1654605305.png', '2022-06-07'),
('UMVOMS', 'Umama Voal Miracle Syar\'i Motif', 8, 25000, 25000, 17, 'All Size', 'Voal Miracle Syar\'i Motif LC terbaru by Umama Scarf. Terbuat dari bahan Voal Miracle yang bertekstur silky, tebal dan tidak menerawang. Dilengkapi dengan aksen lasercut pada pinggiran hijabnya. Tersedia dalam 10 motif menarik Bahan : Voal Miracle Ukuran : 130 x 130', 'img1654605785.png', '2022-06-07'),
('UMVOTM', 'Umama Voal Turkey Motif', 8, 20000, 18000, 12, 'All Size', 'produk terbaru dari umama scarf, kerudung motif seragaman voal turkey. terbuat dari bahan yang adem, gampang diatur dan tersedia dengan 4 motif dan warna berbeda. bahan: voal turkey ukuran : 110x110cm', 'img1654606098.png', '2022-06-07'),
('UMVOUP', 'Umama Segi Empat Voal Ultimate Plain', 8, 22000, 22000, 12, 'All Size', 'Kerudung Polos Segi Empat terbaru Voal Ultimate Plain Lc . Terbuat dari bahan Voal Miracle yang tebal, nyaman dipakai dan tersedia dalam berbagai motif cantik. Dilengkapi dengan lasercut pada pinggiran hijabnya. Ukuran : 110 x 110 Bahan : Voal Miracle', 'img1654606880.png', '2022-06-07'),
('UMVOUS', 'Umama Segi Empat Voal Ultimate Syar\'i', 8, 35000, 34500, 12, 'All Size', 'Kerudung Polos Segi Empat terbaru Voal Ultimate syari Lc . Terbuat dari bahan Voal Miracle yang tebal, nyaman dipakai dan tersedia dalam berbagai warna cantik. Dilengkapi dengan lasercut pada pinggiran hijabnya. Ukuran : 130 x 130 Bahan : Voal Miracle', 'img1654607338.png', '2022-06-07');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `nama` varchar(56) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_transaksi` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `nama`, `alamat`, `tgl_transaksi`, `batas_bayar`) VALUES
(1, 'Vano', 'Tegal', '2022-06-21 11:40:26', '2022-06-22 11:40:26'),
(2, 'Vano', 'Tegal', '2022-06-21 12:07:12', '2022-06-22 12:07:12'),
(3, 'Vano', 'Tegal', '2022-06-21 14:31:58', '2022-06-22 14:31:58');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `nm_user` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `image` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `tgl_daftar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `nm_user`, `email`, `password`, `image`, `role_id`, `is_active`, `tgl_daftar`) VALUES
(5, 'vano', 'Arvano Salma', 'arvano990@gmail.com', '$2y$10$oKEhOGeUgbrkuCEs8LnoCu88rM/pkzJtymnmDkWW35t.zVHP6xOzi', 'pro1653492860.png', 2, 1, 1653066770),
(6, 'admin', 'Admin1', 'admin@gmail.com', '$2y$10$Xqoxy1mkcHuwMPXQparcuONHqK6OT2rZVf15D6DCT21rI1uMHOmbC', 'default.jpg', 1, 1, 1653069943),
(7, 'putri', 'Putri', 'putri@gmail.com', '$2y$10$1u85cgykUOvi.6.C7cQq8e07q5A2KCtNlLlG5H8/f.v8kfTFhFy/.', 'pro1653492933.png', 2, 1, 1653194124),
(20, 'vano', 'Arvano Salma Fatimatus Za', 'vano@gmail.com', '$2y$10$JoYqrfT1KPRSYT3f72VVTO6o0a7Kq5.ywEruBcqBkbufjOo0yHVBW', 'default.jpg', 2, 1, 1654140194);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'administrator'),
(2, 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`no`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_bank` (`id_bank`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD CONSTRAINT `konfirmasi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`),
  ADD CONSTRAINT `konfirmasi_ibfk_2` FOREIGN KEY (`id_bank`) REFERENCES `bank` (`id_bank`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
