-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2024 at 04:15 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travacation`
--

-- --------------------------------------------------------

--
-- Table structure for table `destinasi_wisata`
--

CREATE TABLE `destinasi_wisata` (
  `id_destinasi` int(11) NOT NULL,
  `id_kota` int(11) DEFAULT NULL,
  `nama_destinasi` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `kategori` varchar(100) DEFAULT NULL,
  `jam_operasional` varchar(100) DEFAULT NULL,
  `harga_tiket` decimal(10,2) DEFAULT NULL,
  `mata_uang` varchar(5) DEFAULT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destinasi_wisata`
--

INSERT INTO `destinasi_wisata` (`id_destinasi`, `id_kota`, `nama_destinasi`, `deskripsi`, `kategori`, `jam_operasional`, `harga_tiket`, `mata_uang`, `foto`) VALUES
(1, 1, 'Pantai Ancol', 'Pantai yang terletak di Jakarta Utara, cocok untuk liburan keluarga.', 'Alam', '08:00 - 18:00', 100000.00, 'IDR', 'images/ancol.jpg'),
(2, 1, 'Kota Tua', 'Area bersejarah di Jakarta dengan banyak bangunan kolonial Belanda.', 'Budaya', '24 Jam', 400000.00, 'IDR', 'images/kotu.jpg'),
(4, 2, 'Tangkuban Perahu', 'Gunung berapi yang masih aktif dengan pemandangan yang indah.', 'Alam', '08:00 - 17:00', 200000.00, 'IDR', 'images/sangkuriang.jpg'),
(5, 2, 'Museum Asia Afrika', 'Museum yang menyimpan sejarah penting tentang Konferensi Asia Afrika.', 'Budaya', '09:00 - 16:00', 30000.00, 'IDR', 'images/asiafrika.jpg'),
(7, 3, 'Pantai Pandawa', 'Pantai indah di Bali yang dikelilingi tebing-tebing tinggi.', 'Alam', '07:00 - 18:00', 100000.00, 'IDR', 'images/pandawa.jpg'),
(8, 3, 'Uluwatu', 'Pura yang terletak di tebing dengan pemandangan laut yang menakjubkan.', 'Budaya', '06:00 - 18:00', 30000.00, 'IDR', 'images/uluwatu.jpg'),
(10, 4, 'Candi Borobudur', 'Candi Buddha terbesar dan terkenal yang terletak di Magelang, dekat Yogyakarta.', 'Budaya', '06:00 - 17:00', 50000.00, 'IDR', 'images/borobudur.jpg'),
(11, 4, 'Gunung Merapi', 'Gunung berapi yang aktif dan populer untuk pendakian dan wisata alam di Yogyakarta.', 'Alam', '24 Jam', 100000.00, 'IDR', 'images/merapi.jpg'),
(13, 5, 'Gunung Bromo', 'Gunung berapi yang terkenal dengan keindahan matahari terbitnya.', 'Alam', '03:00 - 17:00', 200000.00, 'IDR', 'images/bromo.jpg'),
(14, 5, 'Jatim Park 2', 'Taman hiburan dengan berbagai atraksi menarik dan edukatif.', 'Budaya', '08:00 - 17:00', 120000.00, 'IDR', 'images/jatimpark.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `nama_kota`, `deskripsi`, `provinsi`) VALUES
(1, 'Jakarta', 'Ibu kota negara Indonesia, terkenal dengan gedung-gedung tinggi dan pusat perbelanjaan.', 'DKI Jakarta'),
(2, 'Bandung', 'Kota dengan udara sejuk dan destinasi wisata alam serta budaya yang kaya.', 'Jawa Barat'),
(3, 'Bali', 'Pulau dengan pantai indah, budaya unik, dan kuliner khas.', 'Bali'),
(4, 'Yogyakarta', 'Kota yang terkenal dengan budaya dan situs bersejarahnya, seperti Candi Borobudur dan Prambanan.', 'DI Yogyakarta'),
(5, 'Malang', 'Kota di Jawa Timur yang terkenal dengan wisata alam dan sejarahnya.', 'Jawa Timur');

-- --------------------------------------------------------

--
-- Table structure for table `rekomendasi_transportasi`
--

CREATE TABLE `rekomendasi_transportasi` (
  `id_transportasi` int(11) NOT NULL,
  `id_destinasi` int(11) DEFAULT NULL,
  `jenis_transportasi` varchar(100) DEFAULT NULL,
  `nama_transportasi` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL,
  `kota` varchar(20) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rekomendasi_transportasi`
--

INSERT INTO `rekomendasi_transportasi` (`id_transportasi`, `id_destinasi`, `jenis_transportasi`, `nama_transportasi`, `deskripsi`, `harga`, `kota`, `foto`) VALUES
(1, 1, 'Bus', 'TransJakarta', 'Transportasi umum dengan jalur khusus yang menghubungkan berbagai area di Jakarta.', 3500.00, 'Jakarta', 'images/transjakarta.jpg'),
(2, 1, 'Angkutan Umum', 'JakLingko', 'Layanan transportasi terintegrasi di Jakarta yang mencakup berbagai moda seperti mikrolet, angkot, dan bus kecil.', 0.00, 'Jakarta', 'images/jaklingko.jpg'),
(3, 1, 'Ojek Online', 'Gojek, Grab, dll', 'Layanan ojek online yang mudah dipesan melalui aplikasi, sangat praktis untuk berkeliling kota.', 20000.00, 'All', 'images/gojek.jpg'),
(4, 1, 'KRL Commuter Line', 'Kereta Commuter Line', 'Kereta rel listrik yang menghubungkan Jakarta dengan kota-kota di sekitarnya seperti Bogor, Depok, Tangerang, dan Bekasi.', 5000.00, 'Jakarta', 'images/commuterline.jpg'),
(5, 1, 'MRT Jakarta', 'MRT Jakarta', 'Moda Raya Terpadu yang menghubungkan wilayah selatan dan pusat Jakarta.', 14000.00, 'Jakarta', 'images/mrt.jpg'),
(6, 1, 'LRT Jakarta', 'LRT Jakarta', 'Light Rail Transit yang melayani rute Kelapa Gading - Velodrome.', 5000.00, 'Jakarta', 'images/lrt.jpg'),
(7, 1, 'Kereta Api', 'KAI (Kereta Api Indonesia)', 'Kereta api antarkota yang menghubungkan Jakarta dengan berbagai kota besar di Indonesia seperti Bandung, Surabaya, dan Yogyakarta.', 150000.00, 'All', 'images/kai.jpg'),
(9, 4, 'Angkot', 'Angkot Bandung', 'Transportasi umum yang menjangkau banyak area di dalam kota Bandung.', 5000.00, 'Bandung', 'images/angkotbdg.jpg'),
(10, 4, 'Rental Kendaraan', 'Rental Kendaraan Bandung', 'Layanan sewa mobil dan motor untuk memudahkan perjalanan wisata di Bandung.', 300000.00, 'Bandung', 'images/rentkbdg.jpg'),
(11, 4, 'Kereta Api Lokal', 'Kereta Api Bandung Raya', 'Kereta api lokal yang melayani rute Bandung - Padalarang - Cicalengka.', 5000.00, 'Bandung', 'images/commuterlinebandung.jpeg'),
(12, 4, 'Trans Metro Bandung', 'TMB', 'Bus rapid transit dengan rute yang menghubungkan beberapa area utama di Bandung.', 5000.00, 'Bandung', 'images/transmetrobandung.jpg'),
(13, 4, 'Bus Wisata', 'Bandros', 'Bus wisata keliling Bandung yang melewati tempat bersejarah dan ikon kota. Rp20.000 untuk sekali jalan dan Rp40.000 untuk tiket terusan.', 20000.00, 'Bandung', 'images/bandros.jpg'),
(14, 7, 'Bus', 'Sarbagita', 'Bus yang menghubungkan area Bali bagian selatan dengan rute yang luas.', 3500.00, 'Bali', 'images/sarbagita.jpg'),
(15, 7, 'Taksi', 'Bali Taxi', 'Layanan taksi yang tersedia di berbagai lokasi wisata di Bali.', 100000.00, 'Bali', 'images/bluebird.jpg'),
(16, 7, 'Rental Kendaraan', 'Rental Kendaraan Bali', 'Layanan sewa mobil dan motor untuk menjelajahi Bali secara mandiri.', 50000.00, 'Bali', 'images/rentkbl.jpg'),
(17, 7, 'Bus', 'Trans Metro Dewata', 'Sekarang kamu bisa keliling Denpasar, Tabanan, Ubud, Gianyar, Sukawati, Banjar Tegal Jaya, dan Sanur dengan Bus Trans Metro Dewata.', 0.00, 'Bali', 'images/tmd.jpg'),
(19, 10, 'Bus', 'Trans Jogja', 'Bus BRT dengan rute yang mencakup berbagai tempat wisata dan pusat kota Yogyakarta.', 4000.00, 'Yogyakarta', 'images/tji.jpg'),
(20, 10, 'Kereta Api Lokal', 'Prameks', 'Kereta api lokal yang menghubungkan Yogyakarta dan Solo dengan tarif terjangkau.', 8000.00, 'Yogyakarta', 'images/kai.jpg'),
(21, 10, 'Becak', 'Becak Jogja', 'Transportasi tradisional untuk menikmati kota secara santai.', 20000.00, 'Yogyakarta', 'images/becak.jpg'),
(23, 10, 'DAMRI', 'Bus DAMRI', 'Layanan bus pemerintah yang melayani rute ke bandara dan kota-kota terdekat.', 10000.00, 'All', 'images/damri.jpg'),
(24, 13, 'Angkot', 'Angkot Malang', 'Transportasi umum dengan rute yang menjangkau berbagai tempat di Malang.', 5000.00, 'Malang', 'images/angkotmlg.jpg'),
(25, 13, 'Rental Kendaraan', 'Rental Kendaraan Malang', 'Layanan sewa mobil dan motor untuk memudahkan kunjungan ke destinasi wisata.', 300000.00, 'Malang', 'images/rentkmlg.jpg'),
(26, 13, 'Bus Wisata', 'Macyto (Malang City Tour)', 'Bus wisata 2 tingkat gratis yang beroperasi di akhir pekan untuk tur keliling Kota Malang.', 0.00, 'Malang', 'images/macito.jpg'),
(27, 13, 'Kereta Api Lokal', 'Penataran', 'Kereta api lokal yang melayani rute Malang - Surabaya dengan biaya terjangkau.', 12000.00, 'Malang', 'images/kai.jpg'),
(28, 13, 'Bus', 'Trans Malang', 'Bus rapid transit yang melayani area dalam kota Malang.', 5000.00, 'Malang', 'images/kwansan.jpg'),
(29, 13, 'DAMRI', 'Bus DAMRI', 'Bus umum pemerintah yang melayani rute jarak jauh di Malang.', 10000.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tour_guide`
--

CREATE TABLE `tour_guide` (
  `id_guide` int(11) NOT NULL,
  `id_destinasi` int(11) DEFAULT NULL,
  `nama_guide` varchar(100) DEFAULT NULL,
  `kontak` varchar(100) DEFAULT NULL,
  `tarif_guide` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tour_guide`
--

INSERT INTO `tour_guide` (`id_guide`, `id_destinasi`, `nama_guide`, `kontak`, `tarif_guide`) VALUES
(1, 1, 'Rudi Santoso', '081234567890', 100000.00),
(2, 2, 'Lina Aulia', '081234567891', 120000.00),
(4, 4, 'Andri Setiawan', '081234567893', 150000.00),
(5, 5, 'Siti Nurhaliza', '081234567894', 150000.00),
(7, 7, 'Wayan Sujana', '081234567896', 200000.00),
(8, 8, 'Made Prabawa', '081234567897', 200000.00),
(10, 10, 'Dian Prasetyo', '081234567899', 200000.00),
(11, 11, 'Joko Sulistyo', '081234567900', 200000.00),
(13, 13, 'Agus Hermawan', '081234567902', 300000.00),
(14, 14, 'Rina Saputri', '081234567903', 150000.00);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto_profil` varchar(255) DEFAULT 'default.png',
  `nama_depan` varchar(50) NOT NULL,
  `nama_belakang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `foto_profil`, `nama_depan`, `nama_belakang`) VALUES
(1, 'laminejamal@gmail.com', '$2y$10$SgJhnJZolGyvZQ0uflzDce1pU7E2kGc12OgZq/m49eEdNlibkf...', 'images/ppdefault.jpg', 'Yamal', 'Lamine'),
(2, 'rzkymrdk69@gmail.com', '$2y$10$o5DsHm9crIBZY.IZQiybLu29IFeplk25VSb/gpZu.YlZ2MCLbDbg6', 'images/ppdefault.jpg', 'Rizky', 'Maradika'),
(3, 'fahmii69@gmail.com', '$2y$10$90sgwtLYoqIsCfxEVcSMgewhVcfYtsLqNkS2c3VSWRhJO9mFGCRKK', 'images/ppdefault.jpg', 'Naufal', 'Fahmi'),
(4, 'cristianopodado07@gmail.com', '$2y$10$ccj0DDh2B/YkCUjy0jhOSuxrAgW7CHNZ3VXIdqJUU9kDJq5XRwlzG', 'images/ppdefault.jpg', 'Cristiano', 'Podado'),
(6, 'lionelmessi10@gmail.com', '$2y$10$vZ.jNuz1.DWFf9nCpYyjfuTlOv4qH8B6LQBWpp08g8fzPSbNi/odK', 'images/ppdefault.jpg', 'Leo', 'Messi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `destinasi_wisata`
--
ALTER TABLE `destinasi_wisata`
  ADD PRIMARY KEY (`id_destinasi`),
  ADD KEY `id_kota` (`id_kota`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `rekomendasi_transportasi`
--
ALTER TABLE `rekomendasi_transportasi`
  ADD PRIMARY KEY (`id_transportasi`),
  ADD KEY `id_destinasi` (`id_destinasi`);

--
-- Indexes for table `tour_guide`
--
ALTER TABLE `tour_guide`
  ADD PRIMARY KEY (`id_guide`),
  ADD KEY `id_destinasi` (`id_destinasi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `destinasi_wisata`
--
ALTER TABLE `destinasi_wisata`
  MODIFY `id_destinasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rekomendasi_transportasi`
--
ALTER TABLE `rekomendasi_transportasi`
  MODIFY `id_transportasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tour_guide`
--
ALTER TABLE `tour_guide`
  MODIFY `id_guide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `destinasi_wisata`
--
ALTER TABLE `destinasi_wisata`
  ADD CONSTRAINT `destinasi_wisata_ibfk_1` FOREIGN KEY (`id_kota`) REFERENCES `kota` (`id_kota`) ON DELETE CASCADE;

--
-- Constraints for table `rekomendasi_transportasi`
--
ALTER TABLE `rekomendasi_transportasi`
  ADD CONSTRAINT `rekomendasi_transportasi_ibfk_1` FOREIGN KEY (`id_destinasi`) REFERENCES `destinasi_wisata` (`id_destinasi`) ON DELETE CASCADE;

--
-- Constraints for table `tour_guide`
--
ALTER TABLE `tour_guide`
  ADD CONSTRAINT `tour_guide_ibfk_1` FOREIGN KEY (`id_destinasi`) REFERENCES `destinasi_wisata` (`id_destinasi`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
