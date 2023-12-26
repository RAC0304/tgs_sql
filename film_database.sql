-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Des 2023 pada 14.51
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
  `tahun_rilis` int(11) DEFAULT NULL,
  `durasi` int(11) DEFAULT NULL,
  `id_genre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `film`
--

INSERT INTO `film` (`id_film`, `judul_film`, `tahun_rilis`, `durasi`, `id_genre`) VALUES
(1, 'Judul Film 1', 2020, 120, 1),
(2, 'Judul Film 2', 2019, 105, 2),
(3, 'Judul Film 3', 2022, 150, 3);

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
(3, 'Aksi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemeran`
--

CREATE TABLE `pemeran` (
  `id_pemeran` int(11) NOT NULL,
  `nama_pemeran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemeran`
--

INSERT INTO `pemeran` (`id_pemeran`, `nama_pemeran`) VALUES
(1, 'Nama Pemeran 1'),
(2, 'Nama Pemeran 2'),
(3, 'Nama Pemeran 3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemeranfilm`
--

CREATE TABLE `pemeranfilm` (
  `id_film` int(11) NOT NULL,
  `id_pemeran` int(11) NOT NULL,
  `peran` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemeranfilm`
--

INSERT INTO `pemeranfilm` (`id_film`, `id_pemeran`, `peran`) VALUES
(1, 1, 'Pemeran Utama'),
(1, 2, 'Pemeran Pendukung'),
(2, 2, 'Pemeran Utama'),
(3, 3, 'Pemeran Utama');

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
-- Indeks untuk tabel `pemeran`
--
ALTER TABLE `pemeran`
  ADD PRIMARY KEY (`id_pemeran`);

--
-- Indeks untuk tabel `pemeranfilm`
--
ALTER TABLE `pemeranfilm`
  ADD PRIMARY KEY (`id_film`,`id_pemeran`),
  ADD KEY `id_pemeran` (`id_pemeran`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `film_ibfk_1` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`);

--
-- Ketidakleluasaan untuk tabel `pemeranfilm`
--
ALTER TABLE `pemeranfilm`
  ADD CONSTRAINT `pemeranfilm_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  ADD CONSTRAINT `pemeranfilm_ibfk_2` FOREIGN KEY (`id_pemeran`) REFERENCES `pemeran` (`id_pemeran`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
