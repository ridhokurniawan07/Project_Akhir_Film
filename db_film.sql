-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Nov 2023 pada 08.56
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

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
(1, 'aktor 1', '2023-11-01', 'indonesia', 'akskdaj', ''),
(2, 'aktor 2', '2023-11-03', 'indonesia', 'hsbdhsbnsjbe', '');

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_film_actor`
--

CREATE TABLE `tb_film_actor` (
  `film_id` int(11) NOT NULL,
  `actor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(4, 'comedy'),
(6, 'actionn');

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
(4, 'Ridho', '', 'ridho7', 'r', 'user', ''),
(5, 'admin', '', 'admin', 'admin', 'admin', ''),
(6, 'ridho', '', 'ridho', 'r', 'user', ''),
(100, 'abel', '', 'abel', 'abel123', 'user', 'abel@gmail.com'),
(101, 'admin', '', 'admin', 'admin123', 'user', 'admin123'),
(102, 'admin', '', 'admin', 'admin123', 'user', 'admin123'),
(103, 'admin', '', 'admin', 'asdmin123', 'user', 'asdmin123');

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
  MODIFY `actor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_film`
--
ALTER TABLE `tb_film`
  MODIFY `film_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_genre`
--
ALTER TABLE `tb_genre`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_review`
--
ALTER TABLE `tb_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

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
