-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Des 2023 pada 05.41
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_film`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_actor`
--

CREATE TABLE `tb_actor` (
  `actor_id` int(11) NOT NULL,
  `name_actor` varchar(100) NOT NULL,
  `birth_date` date NOT NULL,
  `country` varchar(100) NOT NULL,
  `actor_description` text NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_actor`
--

INSERT INTO `tb_actor` (`actor_id`, `name_actor`, `birth_date`, `country`, `actor_description`, `foto`) VALUES
(1, 'Vino G Bastian', '1982-03-24', 'indonesia', 'Vino Giovanni Bastiaon lahir pada 24 Maret 1982 di Jakarta. Ia mendapat darah keturunan Minangkabau dari sang ayah, penulis novel Wiro Sableng bernama Bastian Tito. Sementara ibu Vino bernama Herna Debby yang berdarah Minahasa. Vino merupakan anak bungsu dari 5 bersaudara.', 'aktor_656fec00c91f4_Vino-G-Bastian.jpg'),
(2, 'Anya Geraldine', '1995-12-15', 'indonesia', 'Anya Geraldine adalah seorang selebgram, model, dan aktris asal Indonesia.  Ia pernah menempuh pendidikan modelling di Kimmy Jayanti School. Pada tahun 2016', 'aktor_656febf922853_anya.jpg'),
(3, 'Prilly Latuconsina', '1996-10-15', 'Indonesia', 'Prilly merupakan anak sulung dari dua bersaudara, dari pasangan Rizal Latuconsina, yang berasal dari Ambon dan Ully Djulita yang berketurunan Sunda. Ia memiliki seorang adik laki-laki bernama Raja Latuconsina. Prilly memulai kariernya di dunia hiburan Indonesia pada tahun 2009 . Sebelum benar-benar terjun, Prilly mengasah kemampuan aktingnya di Sanggar Ananda. ', 'aktor_65713cd10f80c_prily.jpg'),
(4, 'Angga Yunanda', '2000-05-16', 'Indonesiaa', 'Angga memulai kariernya sebagai model. Ia terjun ke dunia akting pada tahun 2015 dengan membintangi sinetron pertamanya, Malu-Malu Kucing berperan sebagai Baim. Selanjutnya, ia berperan sebagai Erick pada sinetron Mermaid in Love serta sekuelnya, Mermaid in Love 2 Dunia.', 'aktor_656fedb2e464f_angga yunanda.jpg'),
(5, 'Yasmin Napper', '2003-11-22', 'Indonesia', 'Yasmin memulai kariernya dengan membintangi sejumlah FTV pada tahun 2018. Setelah itu, ia mendapatkan kesempatan menjadi kameo di Generasi Micin. Film ini merupakan debutnya di dunia film.[3] Pada tahun yang sama, ia juga tergabung ke dalam sebuah grup vokal wanita bernama Pocari 7 yang mengeluarkan singel berjudul \"Sweat for Your Dream\".', 'aktor1701835673.jpg'),
(6, 'Bryan Domani', '2000-01-29', 'Indonesia', 'Bryan memulai debutnya di televisi dengan pertunjukan Bastian Steel Bukan Cowok Biasa di RCTI pada tahun 2014, ia beradu akting dengan Bastian Bintang Simbolon, mantan personil grup boyband Coboy Junior. Ia memainkan peran Guntur. Pertunjukan tersebut berakhir pada tanggal 24 Oktober 2014.\r\n\r\nPada tahun 2014, ia memainkan peran Bryan dalam pertunjukan Aisyah Putri the Series: Jilbab in Love, berlawanan dengan Cassandra Sheryl Lee. Pertunjukan tersebut berakhir pada tanggal 15 Februari 2015.', 'aktor1701836218.png'),
(7, 'Ibrahim Risyad', '1993-07-20', 'Indonesia', 'Ibrahim Risjad (2 Maret 1934 – 17 Februari 2012) yang diyakini punya alur keturunan dari Tgk Chik Di Reubee ini mengawali petualangannya sebagai penjahit di pusat Kota Idi Rayek, Aceh Timur.\r\nKeuletan dan kepiawaiannya dalam berbisnis membuat Ibrahim berhasil mendapatkan kepercayaan dari para langgannya, hingga selepas lulus SLTA di Medan pada 1954, ia memulai kariernya pada sebuah perusahaan swasta. Pada 1965, almarhum sudah menjadi direktur CV Waringin.', 'aktor1701837124.jpg'),
(8, 'Anggika Bolsterli', '1995-06-21', 'Indonesia', 'Bakat dan hobi Anggika di bidang seni peran sudah ada sejak kecil. Anggika sempat mengikuti pentas teater di sekolahnya, tetapi tidak diizinkan untuk meneruskan, karena dikhawatirkan akan menganggu studinya.[3] Setelah lulus SMA, Anggika diberi pilihan oleh orang tuanya untuk berkuliah di Swiss atau masuk ke dunia seni peran. Saat itu, ia memilih seni peran dan mulai mengikuti pemilihan pemeran untuk iklan dan sinetron.', 'aktor1701837489.jpg'),
(9, 'Omar Daniel', '1995-04-15', 'Indonesia', 'Omar lahir dengan Omar Daniel Assegaf pada 9 April 1995 di Surakarta, Jawa Tengah. Ia merupakan putra bungsu dari empat bersaudara.[1][2] Omar menempuh pendidikan sekolah di SMA Batik 1 Surakarta dan lulus pada tahun 2013. Kemudian, ia melanjutkan pendidikannya di Universitas Mercu Buana, Jakarta. Ia lulus dengan gelar sarjana ilmu komunikasi dan IPK 3,75.', 'aktor1701838793.png'),
(10, 'Aghniny Haque', '1997-03-18', 'Indonesia', 'Aghniny pernah menjadi bagian dari tim nasional taekwondo Indonesia pada tahun 2011. Namun, ia didegradasi dari pelatihan nasional pada 2016 karena mengalami cedera lutut. Oleh karena itu, ia memutuskan untuk pulang ke Semarang. Di sana, ia mendapat tawaran untuk mengikuti penyeleksian pemain film Wiro Sableng: Pendekar Kapak Maut Naga Geni 212. Ia pun lolos dengan mendapatkan peran sebagai Rara Murni, dan karier beraktingnya pun dimulai', 'aktor1701838986.jpg'),
(13, 'Refal hady', '2024-01-04', 'Indonesia', 'gdsgfsdgf', 'aktor1701920080.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_film`
--

CREATE TABLE `tb_film` (
  `film_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `film_name` varchar(100) NOT NULL,
  `film_release` date NOT NULL,
  `film_description` text NOT NULL,
  `film_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_film`
--

INSERT INTO `tb_film` (`film_id`, `genre_id`, `film_name`, `film_release`, `film_description`, `film_image`) VALUES
(11, 8, 'Gampang Cuan', '2023-12-06', 'Di tengah kesulitan finansial keluarga yang tak kunjung usai, Sultan (Vino G Bastian) dan adik perempuannya, Bilqis (Anya Geraldine), harus mengatasi warisan utang mendiang ayah mereka sebesar 300 juta.', 'gampangcuan.jpg'),
(12, 4, 'Budi Pekerti', '2023-12-06', 'Bu Prani (Ine Febriyanti), seorang guru BK yang video perselisihannya dengan penguniung pasar meniadi viral di media sosial. Akibat tindakannya yang dinilai tidak mencerminkan pribadi seorang guru, ia dan keluarganya Muklas (Angga Yunanda), Tita (Prilly Latuconsina), dan Pak Didit (Dwi Sasono) mendapat perundungan, dicari-cari kesalahan lainnya hingga terancam kehilangan pekerjaan.', 'budipekerti.jpg'),
(14, 7, '172 days', '2023-11-23', '172 hari yang indah untuk Zira (Yasmin Napper), dan berkesan sepanjang hidupnya. Menikah dengan putra ustadz legendaris Arifin Ilham, Amer Azzikra (Bryan Domani), yang telah membuat Zira menjadi pribadi yang lebih baik. Namun Amer pergi terlalu cepat. \"Aku ikhlas, namun aku rindu!\"', '172 days.jpg'),
(15, 6, 'Sijjin', '2023-12-22', 'Irma (Anggika Bolsterli) jatuh cinta pada Galang (Ibrahim Risyad), sepupunya yang sudah beristri dan punya anak. Namun Irma masih terobsesi dan ingin menjadi perempuan satu-satunya di hidup Galang. Irma datang ke dukun untuk mengirim santet pada istri Galang. Sejak saat itu teror dimulai. Gangguan mistis, kesurupan, dan kematian terjadi di rumah Galang. Namun, yang tak diduga Irma, ancaman itu juga mengincar nyawanya sendiri.', 'sijjin.jpg'),
(16, 6, 'Qorin', '2023-12-22', 'Zahra (Zulfa Maharani), siswi tingkat tiga sekolah asrama Rodiatul Jannah, selalu menjadi siswi teladan yang memiliki segudang prestasi di sekolah. Zahra rela menuruti apapun perintah Ustad Jaelani (Omar Daniel), gurunya, demi mendapatkan nilai. Termasuk tugas untuk menjaga seorang siswi baru yang terkenal nakal bernama Yolanda (Aghniny Haque), dan tugas mengajak para siswi melakukan ritual Qorin. Setelah menjalani kedua tugas itu, Zahra mulai mendapatkan terror dan hal-hal mistis.', 'qorin.jpg'),
(17, 9, 'Serigala Terakhir', '2023-12-14', 'Jarot dan Ale adalah teman baik, tumbuh bersama sejak kecil. Keduanya memiliki banyak kesamaan, tapi tidak dengan karakter. Mereka membentuk geng Serigala Terakhir, dan bermimpi menjadi mafia terbesar.', 'Poster-serigala-terakhir.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_film_actor`
--

CREATE TABLE `tb_film_actor` (
  `film_id` int(11) NOT NULL,
  `actor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_film_actor`
--

INSERT INTO `tb_film_actor` (`film_id`, `actor_id`) VALUES
(11, 1),
(11, 2),
(12, 3),
(12, 4),
(14, 5),
(14, 6),
(15, 7),
(15, 8),
(16, 9),
(16, 10),
(17, 1),
(17, 5),
(17, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_genre`
--

CREATE TABLE `tb_genre` (
  `genre_id` int(11) NOT NULL,
  `genre_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_genre`
--

INSERT INTO `tb_genre` (`genre_id`, `genre_name`) VALUES
(4, 'Drama'),
(6, 'Horror'),
(7, 'Romance'),
(8, 'Comedy'),
(9, 'Action');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_review`
--

CREATE TABLE `tb_review` (
  `review_id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `review_title` text NOT NULL,
  `review` text NOT NULL,
  `rating` decimal(50,0) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_review`
--

INSERT INTO `tb_review` (`review_id`, `film_id`, `user_id`, `review_title`, `review`, `rating`, `tanggal`) VALUES
(3, 14, 4, 'bella', 'baguss', 7, '2023-12-06'),
(12, 11, 4, 'bella', 'bagus', 9, '2023-12-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('admin','user') NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `name`, `gambar`, `username`, `password`, `role`, `email`) VALUES
(1, 'admin', '', 'admin', 'admin123', 'admin', 'admin@gmail.com'),
(2, 'ridho', '', 'ridho', 'ridho123', 'user', 'ridho@gmail.com'),
(3, 'isnan', '', 'isnan', 'isnan123', 'user', 'isnan@gmail.com'),
(4, 'bella', 'profile-8681profile-32author.png', 'bella', 'bella123', 'user', 'bella@gmail.com'),
(5, 'abel', '', 'abel', 'abel123', 'user', 'abel@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_actor`
--
ALTER TABLE `tb_actor`
  ADD PRIMARY KEY (`actor_id`);

--
-- Indeks untuk tabel `tb_film`
--
ALTER TABLE `tb_film`
  ADD PRIMARY KEY (`film_id`),
  ADD KEY `fk_filmgenre` (`genre_id`);

--
-- Indeks untuk tabel `tb_film_actor`
--
ALTER TABLE `tb_film_actor`
  ADD PRIMARY KEY (`film_id`,`actor_id`),
  ADD KEY `actor_id` (`actor_id`);

--
-- Indeks untuk tabel `tb_genre`
--
ALTER TABLE `tb_genre`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indeks untuk tabel `tb_review`
--
ALTER TABLE `tb_review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `fk_reviewuser` (`user_id`),
  ADD KEY `fk_reviewfilm` (`film_id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_actor`
--
ALTER TABLE `tb_actor`
  MODIFY `actor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_film`
--
ALTER TABLE `tb_film`
  MODIFY `film_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_genre`
--
ALTER TABLE `tb_genre`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_review`
--
ALTER TABLE `tb_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_film`
--
ALTER TABLE `tb_film`
  ADD CONSTRAINT `fk_filmgenre` FOREIGN KEY (`genre_id`) REFERENCES `tb_genre` (`genre_id`);

--
-- Ketidakleluasaan untuk tabel `tb_film_actor`
--
ALTER TABLE `tb_film_actor`
  ADD CONSTRAINT `tb_film_actor_ibfk_1` FOREIGN KEY (`film_id`) REFERENCES `tb_film` (`film_id`),
  ADD CONSTRAINT `tb_film_actor_ibfk_2` FOREIGN KEY (`actor_id`) REFERENCES `tb_actor` (`actor_id`);

--
-- Ketidakleluasaan untuk tabel `tb_review`
--
ALTER TABLE `tb_review`
  ADD CONSTRAINT `fk_reviewfilm` FOREIGN KEY (`film_id`) REFERENCES `tb_film` (`film_id`),
  ADD CONSTRAINT `fk_reviewuser` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
