-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 22, 2025 at 08:11 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qiznet`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int NOT NULL,
  `profil` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `visi` text,
  `misi` text,
  `alasan` text,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `profil`, `visi`, `misi`, `alasan`, `gambar`) VALUES
(1, 'Qiznet adalah penyedia layanan WiFi berkualitas tinggi yang menghadirkan koneksi internet cepat, stabil, dan terjangkau untuk rumah, bisnis, dan industri. Kami berkomitmen untuk memberikan pengalaman internet terbaik bagi pelanggan.', 'Menjadi penyedia internet terbaik yang menghubungkan semua orang dengan jaringan cepat dan handal.', 'Menyediakan layanan internet cepat dan stabil untuk semua kalangan.\r\nMemastikan jangkauan internet luas dengan harga yang kompetitif.\r\nMemberikan pelayanan pelanggan yang responsif dan berkualitas.', 'Internet Cepat\r\nKoneksi Stabil\r\nHarga Terjangkau\r\nLayanan 24/7', 'tentang_kami_1745308247.webp');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'Budi');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` int NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `konten` text NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `judul`, `slug`, `konten`, `created_at`, `foto`) VALUES
(10, 'Apa Itu AI?', 'apa-itu-ai', '<p>Artificial Intelligence (AI) adalah cabang ilmu komputer yang berfokus pada pengembangan sistem yang dapat meniru kecerdasan manusia dalam memproses informasi, membuat keputusan, dan menyelesaikan tugas secara otomatis. AI bekerja dengan menggunakan algoritma dan data untuk mengenali pola, memprediksi hasil, serta melakukan tindakan tanpa perlu intervensi langsung dari manusia. Teknologi ini telah berkembang pesat dalam berbagai bidang, mulai dari pengenalan wajah, pemrosesan bahasa alami, hingga analisis data yang kompleks. Dengan pendekatan berbasis pembelajaran mesin (machine learning) dan jaringan saraf tiruan (neural networks), AI dapat meningkatkan kinerjanya secara terus-menerus, menghasilkan solusi yang semakin cerdas dan adaptif.Dalam kehidupan sehari-hari, AI telah menjadi bagian tak terpisahkan dari berbagai aplikasi dan layanan yang kita gunakan. Misalnya, dalam dunia bisnis, AI membantu perusahaan mengoptimalkan operasional mereka melalui otomatisasi proses dan analisis pasar yang lebih akurat. Di bidang kesehatan, AI digunakan untuk mendeteksi penyakit lebih dini dan meningkatkan efisiensi diagnosa medis. Sementara dalam industri hiburan, AI memungkinkan pengalaman yang lebih personal melalui rekomendasi musik, film, atau bahkan pembuatan konten digital yang semakin realistis. Dengan perkembangan teknologi yang semakin pesat, AI terus bertransformasi menjadi alat yang semakin bermanfaat, membuka peluang baru bagi inovasi serta perubahan sosial yang signifikan.</p>', '2025-04-21 09:28:45', 'apa-itu-ai.jpg'),
(11, 'Tips Belajar Coding', 'tips-belajar-coding', '<p>Belajar coding membutuhkan pendekatan yang terstruktur dan konsisten agar hasilnya maksimal. Mulailah dengan memahami dasar-dasar pemrograman, seperti sintaks, logika, dan struktur data. Pilih bahasa pemrograman yang sesuai dengan tujuan belajar—misalnya, Python untuk pemrograman umum, JavaScript untuk pengembangan web, atau C++ untuk pemrograman sistem. Praktikkan konsep yang telah dipelajari dengan proyek sederhana, seperti membuat website atau aplikasi kecil. Selain itu, manfaatkan sumber belajar online seperti tutorial, kursus interaktif, dan komunitas pemrograman untuk mendapatkan wawasan lebih luas serta dukungan saat menemui kendala.<br />\r</p><p>Selain teori, penting untuk mengasah keterampilan dengan proyek nyata dan tantangan coding. Cobalah mengikuti kompetisi pemrograman atau berkontribusi dalam proyek open-source untuk meningkatkan pengalaman serta membangun portofolio. Jangan takut untuk melakukan debugging dan mencari solusi atas kesalahan yang muncul, karena ini merupakan bagian penting dari proses belajar. Gunakan alat seperti GitHub untuk mengelola kode dan berkolaborasi dengan sesama programmer. Dengan kedisiplinan dan ketekunan, belajar coding bisa menjadi perjalanan yang menyenangkan dan membuka banyak peluang karier di dunia teknologi.<br />\r</p><p></p>', '2025-04-21 09:30:41', 'tips-belajar-coding.jpg'),
(12, 'Pentingnya Cybersecurity', 'pentingnya-cybersecurity', '<p>Cybersecurity memainkan peran krusial dalam menjaga keamanan data dan sistem digital dari ancaman yang semakin kompleks. Di era digital ini, serangan siber seperti peretasan, pencurian data, dan malware dapat berdampak besar pada individu, bisnis, dan bahkan pemerintah. Tanpa perlindungan yang memadai, informasi sensitif bisa jatuh ke tangan pihak yang tidak bertanggung jawab, menyebabkan kerugian finansial dan merusak reputasi. Oleh karena itu, memahami serta menerapkan praktik keamanan siber yang efektif menjadi suatu keharusan, baik melalui enkripsi data, firewall, atau pengelolaan akses yang ketat.</p><p>Selain melindungi informasi pribadi dan bisnis, cybersecurity juga berperan dalam menjaga stabilitas sistem teknologi yang digunakan dalam berbagai sektor. Infrastruktur penting seperti layanan keuangan, kesehatan, dan transportasi semakin bergantung pada teknologi digital, sehingga menjadi target potensial bagi serangan siber. Serangan terhadap sistem ini tidak hanya dapat mengganggu operasional, tetapi juga membahayakan keselamatan publik. Dengan investasi yang tepat dalam teknologi keamanan serta peningkatan kesadaran pengguna, risiko dapat diminimalkan, memastikan ekosistem digital yang lebih aman dan terpercaya.</p><p>Lebih dari sekadar perlindungan teknis, cybersecurity juga berkaitan erat dengan etika dan kesadaran pengguna dalam berinteraksi di dunia digital. Mengedukasi masyarakat tentang pentingnya menjaga kredensial, mengenali ancaman phishing, serta menghindari praktik online yang berisiko adalah langkah penting dalam menciptakan lingkungan digital yang lebih aman. Setiap individu memiliki tanggung jawab untuk menjaga keamanan data mereka, baik melalui penggunaan kata sandi yang kuat, pembaruan perangkat lunak secara rutin, maupun berhati-hati dalam berbagi informasi pribadi. Dengan meningkatnya kesadaran kolektif terhadap keamanan siber, kita dapat menciptakan dunia digital yang lebih terlindungi dari ancaman yang terus berkembang.</p>', '2025-04-21 09:32:18', 'cybersecurity.jpg'),
(13, 'Tren Teknologi 2025', 'tren-teknologi-2025', '<p>Tahun 2025 diperkirakan menjadi titik perubahan besar dalam dunia teknologi, dengan inovasi yang semakin menekankan integrasi kecerdasan buatan (AI) dalam kehidupan sehari-hari. AI tidak hanya digunakan dalam industri besar, tetapi juga semakin merambah ke bidang pendidikan, kesehatan, dan gaya hidup pribadi. Perkembangan AI generatif memungkinkan otomatisasi yang lebih kompleks, seperti asisten digital yang mampu memahami konteks secara lebih mendalam dan memberikan solusi yang benar-benar sesuai dengan kebutuhan pengguna. Selain itu, teknologi AI dalam desain dan pengembangan perangkat lunak semakin mempermudah pembuatan aplikasi serta meningkatkan efisiensi kerja para programmer.</p><p>Selain AI, tren teknologi 2025 juga akan ditandai dengan kemajuan dalam komputasi kuantum yang menjanjikan kecepatan pemrosesan data jauh lebih tinggi dibandingkan komputer klasik. Teknologi ini akan memberikan dampak besar pada bidang keamanan siber, kriptografi, dan analisis data skala besar, memungkinkan pemrosesan yang lebih cepat dan akurat. Di sisi lain, perkembangan teknologi blockchain juga semakin terarah pada aplikasi nyata di luar keuangan, seperti sistem rantai pasokan, identitas digital, dan perlindungan hak cipta. Dengan semakin banyaknya perusahaan yang mengadopsi teknologi ini, transparansi dan efisiensi bisnis diperkirakan akan meningkat secara signifikan.</p><p>Perubahan besar juga akan terjadi dalam dunia Internet of Things (IoT) dengan perangkat yang semakin terhubung dan mampu berkomunikasi secara lebih cerdas. Rumah pintar, kendaraan otonom, dan solusi kota cerdas akan lebih dioptimalkan untuk memberikan pengalaman yang lebih nyaman dan efisien bagi pengguna. Kombinasi IoT dengan AI dan 5G akan menciptakan ekosistem digital yang lebih responsif serta mempercepat integrasi teknologi dalam kehidupan sehari-hari. Dengan berbagai inovasi yang berkembang pesat, tahun 2025 akan menjadi era teknologi yang semakin terhubung, cerdas, dan mampu memberikan dampak positif bagi berbagai aspek kehidupan manusia.</p>', '2025-04-21 09:40:58', 'tren-teknologi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_replied` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `is_replied`) VALUES
(48, 'Faiz', 'pratamafaiz1010@gmail.com', 'Test Email', 'cihuy', '2025-04-21 08:34:17', 1),
(49, 'Faiz', 'pratamafaiz1010@gmail.com', 'Test Email (2)', 'ping!', '2025-04-21 08:52:13', 1),
(50, 'Faiz', 'pratamafaiz1010@gmail.com', 'Test Email (3)', 'test', '2025-04-22 04:35:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dokumentasi`
--

CREATE TABLE `dokumentasi` (
  `id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `judul` varchar(255) DEFAULT NULL,
  `deskripsi` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dokumentasi`
--

INSERT INTO `dokumentasi` (`id`, `created_at`, `judul`, `deskripsi`) VALUES
(15, '2025-04-15 14:55:27', 'Seminar dan Pelatihan', 'Seminar dan pelatihan merupakan wadah bagi peserta untuk memperoleh pengetahuan mendalam, meningkatkan keterampilan, serta berbagi pengalaman langsung dengan para ahli di bidangnya.'),
(16, '2025-04-15 14:55:54', 'Event Sosial', 'Event sosial merupakan kesempatan bagi individu dan komunitas untuk berkumpul, berbagi pengalaman, serta berkontribusi dalam berbagai kegiatan yang bertujuan untuk meningkatkan kesejahteraan dan kesadaran sosial.'),
(17, '2025-04-15 14:56:30', 'Ulang Tahun Perusahaan', 'Ulang tahun perusahaan merupakan momen penting untuk merayakan perjalanan, pencapaian, serta komitmen terhadap inovasi dan pertumbuhan, sekaligus menjadi kesempatan untuk memperkuat hubungan dengan karyawan, mitra bisnis, serta pelanggan.');

-- --------------------------------------------------------

--
-- Table structure for table `dokumentasi_gambar`
--

CREATE TABLE `dokumentasi_gambar` (
  `id` int NOT NULL,
  `dokumentasi_id` int DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dokumentasi_gambar`
--

INSERT INTO `dokumentasi_gambar` (`id`, `dokumentasi_id`, `image`) VALUES
(62, 17, 'assets/img/uploads/dokumentasi/event-1.webp'),
(64, 16, 'assets/img/uploads/dokumentasi/sosial-1.webp'),
(65, 15, 'assets/img/uploads/dokumentasi/seminar-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int NOT NULL,
  `dokumentasi_id` int NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `isi_komentar` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `dokumentasi_id`, `nama`, `isi_komentar`, `created_at`) VALUES
(1, 16, 'Kona Naria', 'Goks bang', '2025-04-22 11:47:52'),
(2, 17, 'dilan', 'aduhai, kok saya ga diundang pak', '2025-04-22 11:57:55'),
(3, 17, 'hermansyah', 'keren', '2025-04-22 12:03:29');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int NOT NULL,
  `dokumentasi_id` int NOT NULL,
  `user_ip` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `dokumentasi_id`, `user_ip`, `created_at`) VALUES
(1, 16, '::1', '2025-04-22 11:45:05'),
(2, 15, '::1', '2025-04-22 11:56:41'),
(3, 17, '::1', '2025-04-22 11:57:09');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `kecepatan` varchar(50) NOT NULL,
  `deskripsi` text,
  `harga` int NOT NULL,
  `fasilitas` text,
  `populer` tinyint(1) DEFAULT '0',
  `link_pesan` varchar(255) DEFAULT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama_paket`, `kecepatan`, `deskripsi`, `harga`, `fasilitas`, `populer`, `link_pesan`, `foto`) VALUES
(12, 'Paket 25 Mbps', 'Up To 25 Mbps', 'Internet stabil untuk kegiatan sehari-hari.', 150000, 'Internet Stabil\r\nInternet Tak Terbatas\r\nModem Wifi\r\nGratis Instalasi\r\nTerhubung hingga 5–6 Perangkat', 0, 'https://wa.me/6287716180033?text=Halo,%20saya%20ingin%20memasang%20internet%20dari%20Qiznet%20paket%2025%20Mbps', '1745294378.png'),
(13, 'Paket 100 Mbps', 'Up To 100 Mbps', 'Cocok untuk kebutuhan keluarga dan kantor.', 350000, 'Internet Super Cepat\r\nInternet Tak Terbatas\r\nModem Wifi\r\nGratis Instalasi\r\nTerhubung hingga 9-10 Perangkat', 0, 'https://wa.me/6287716180033?text=Halo,%20saya%20ingin%20memasang%20internet%20dari%20Qiznet%20paket%20100%20Mbps', '1744762777.png'),
(14, 'Paket 50 Mbps', 'Up To 50 Mbps', 'Cocok untuk streaming, gaming, dan WFH.', 250000, 'Internet Cepat\r\nInternet Tak Terbatas\r\nModem Wifi\r\nGratis Instalasi\r\nTerhubung hingga 7–8 Perangkat', 1, 'https://wa.me/6287716180033?text=Halo,%20saya%20ingin%20memasang%20internet%20dari%20Qiznet%20paket%2050%20Mbps', '1744762468.png'),
(15, 'Paket 200 Mbps', 'Up To 200 Mbps', 'Cocok untuk kebutuhan berat dan banyak.', 450000, 'Internet Super Duper Cepat\r\nInternet Tak Terbatas\r\nModem Wifi\r\nGratis Instalasi\r\nTerhubung hingga 20-30 Perangkat', 1, 'https://wa.me/6287716180033?text=Halo,%20saya%20ingin%20memasang%20internet%20dari%20Qiznet%20paket%20200%20Mbps', '1744762787.png'),
(16, 'Paket 300 Mbps', 'Up To 300 Mbps', 'Cocok buat sedekah atau company besar.', 550000, 'Internet Super Duper Gila Cepat\r\nInternet Tak Terbatas\r\nModem Wifi\r\nGratis Instalasi\r\nTerhubung hingga 50-60 Perangkat', 0, 'https://wa.me/6287716180033?text=Halo,%20saya%20ingin%20memasang%20internet%20dari%20Qiznet%20paket%20300%20Mbps', '1744762795.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dokumentasi`
--
ALTER TABLE `dokumentasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dokumentasi_gambar`
--
ALTER TABLE `dokumentasi_gambar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dokumentasi_id` (`dokumentasi_id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `dokumentasi`
--
ALTER TABLE `dokumentasi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `dokumentasi_gambar`
--
ALTER TABLE `dokumentasi_gambar`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dokumentasi_gambar`
--
ALTER TABLE `dokumentasi_gambar`
  ADD CONSTRAINT `dokumentasi_gambar_ibfk_1` FOREIGN KEY (`dokumentasi_id`) REFERENCES `dokumentasi` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
