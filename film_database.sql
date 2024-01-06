-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jan 2024 pada 10.13
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `film_database`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `film`
--

CREATE TABLE `film` (
  `id_film` int(11) NOT NULL,
  `judul_film` varchar(100) NOT NULL,
  `gambar_film` varchar(100) NOT NULL,
  `tahun_rilis` int(11) DEFAULT NULL,
  `durasi` int(11) DEFAULT NULL,
  `id_genre` int(11) DEFAULT NULL,
  `deskripsi_film` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `film`
--

INSERT INTO `film` (`id_film`, `judul_film`, `gambar_film`, `tahun_rilis`, `durasi`, `id_genre`, `deskripsi_film`) VALUES
(24, 'Dora The Movie', '659_dora.jpeg', 2022, 120, 3, 'Setelah menghabiskan sebagian besar hidupnya menjelajahi hutan, tidak ada yang bisa mempersiapkan Dora untuk petualangan paling berbahayanya -- sekolah menengah. Ditemani oleh sekelompok remaja dan si monyet Boots, Dora '),
(25, 'Aquaman and the Lost Kingdom II', '659_aquaman2.jpeg', 2023, 124, 3, 'Black Manta berusaha membalas dendam pada Aquaman atas kematian ayahnya. Dengan menggunakan kekuatan Trisula Hitam, dia menjadi musuh yang tangguh. Untuk mempertahankan Atlantis.'),
(26, 'Be with You (Korean Movie)', '659_be with you (korean movie).jpeg', 2018, 131, 4, 'Woo-Jin (So Ji-Sub) merawat putranya Ji-Ho (Kim Ji-Hwan) sendirian setelah istrinya Soo-A (Son Ye-Jin) meninggal dunia. Sebelum meninggal, ia berjanji akan kembali pada hari hujan satu tahun kemudian. Satu tahun kemudian, Soo-A muncul lagi, tetapi dia tidak ingat apa-apa.'),
(27, 'All Quiet on the Western Front', '659_All Quiet on the Western Front.jpeg', 2022, 0, 3, 'Pengalaman mengerikan dan penderitaan seorang prajurit muda Jerman di garis depan barat selama Perang Dunia I.'),
(28, 'Oppenheimer', '659_Oppenheimer.jpeg', 2023, 181, 3, 'Kisah ilmuwan Amerika Serikat, J. Robert Oppenheimer, dan perannya dalam pengembangan bom atom.'),
(30, 'Stand By Me Doraemon 2', '659_stand by me doraemon 2.jpeg', 2012, 220, 3, '\"Stand by Me Doraemon 2\" adalah sebuah film animasi Jepang yang merupakan sekuel dari film \"Stand by Me Doraemon\" yang dirilis pada tahun 2014. Film ini mengisahkan petualangan Doraemon dan Nobita di masa depan. Film ini dirilis pada tahun 2020 dan menjadi salah satu film animasi populer di Jepang.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `genre`
--

CREATE TABLE `genre` (
  `id_genre` int(11) NOT NULL,
  `nama_genre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `genre`
--

INSERT INTO `genre` (`id_genre`, `nama_genre`) VALUES
(1, 'Drama'),
(2, 'Komedi'),
(3, 'Aksi'),
(4, 'Romansa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`),
  ADD KEY `id_genre` (`id_genre`);

--
-- Indeks untuk tabel `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `film`
--
ALTER TABLE `film`
  MODIFY `id_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `film_ibfk_1` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
