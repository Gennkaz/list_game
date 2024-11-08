-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Nov 2024 pada 15.35
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
-- Database: `kazweb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','users') DEFAULT 'users',
  `alamat` varchar(255) NOT NULL,
  `no_phone` varchar(12) NOT NULL,
  `status` enum('active','unactive') DEFAULT 'unactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `username`, `password`, `role`, `alamat`, `no_phone`, `status`) VALUES
(1, 'Akas muhamad pirdaus', 'akas', '$2y$10$iNsUHgJaLiBbZyjSTzszP.HN.f2iAjempA01jtMRYAGzlLC6EcQ3i', 'admin', 'Ciomas', '086778527365', 'active'),
(2, 'Gilang rahmat firdaus', 'gilang', '$2y$10$eYIAgkxDEwk0714MJLOlCODXjGzYfr.qgjcGmUy1tAHJUSQm3Hh0.', 'users', 'Cikaracak', '085663725124', 'active'),
(3, 'Nurul hamim', 'hamim', '$2y$10$n7X0IPdxy009fZAFeGppw.FiSbHxvZEJi4QkQ/6NeMbztoDOgHoV.', 'users', 'Cikaracak', '082331423463', 'unactive');

-- --------------------------------------------------------

--
-- Struktur dari tabel `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `message`
--

INSERT INTO `message` (`id`, `fullname`, `email`, `message`, `created_at`) VALUES
(10, 'Nurul hamim', 'hamim@gmail.com', 'Jika kamu berpikir bahwa orang memikirkan sesuatu dua kali atau lebih, percayalah aku tidak pernah memikirkannya satu kalipun.', '2024-09-09 04:43:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `more`
--

CREATE TABLE `more` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `unduhan` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `rilis` date NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `is_deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `more`
--

INSERT INTO `more` (`id`, `nama`, `unduhan`, `genre`, `rilis`, `link`, `image`, `is_deleted`) VALUES
(4, 'Super Sus', '50+ Juta unduhan', 'Strategi', '2021-11-29', 'https://play.google.com/store/apps/details?id=com.je.supersus&pcampaignid=web_share', '679-sus.jpg', 0),
(5, 'eFootball TM 2024', '100+ Juta unduhan', 'Olahraga', '2017-05-23', 'https://play.google.com/store/apps/details?id=jp.konami.pesam&pcampaignid=web_share', '723-foot.jpg', 0),
(6, 'Pokemon GO', '500+ Juta unduhan', 'MOBA', '2016-08-05', 'https://play.google.com/store/apps/details?id=com.nianticlabs.pokemongo&pcampaignid=web_share', '767-pokemon.jpg', 0),
(7, 'Call of Duty:Mobile', '50+ Juta unduhan', 'Battle Royale', '2019-09-29', 'https://play.google.com/store/apps/details?id=com.garena.game.codm&pcampaignid=web_share', '400-call.jpg', 0),
(8, 'Clash Royale', '500+ Juta unduhan', 'Card game, RTS, MOBA', '2016-03-01', 'https://play.google.com/store/apps/details?id=com.supercell.clashroyale&pcampaignid=web_share', '310-royal.jpg', 0),
(9, 'MARVEL Future Fight', '100+ Juta unduhan', 'RPG', '2015-04-29', 'https://play.google.com/store/apps/details?id=com.netmarble.mherosgb&pcampaignid=web_share', '81-marvel.jpg', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `top1`
--

CREATE TABLE `top1` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `unduhan` varchar(255) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `rilis` date DEFAULT NULL,
  `rating` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `top1`
--

INSERT INTO `top1` (`id`, `nama`, `unduhan`, `genre`, `rilis`, `rating`, `link`, `image`) VALUES
(1, 'FREE FIRE', '1+ Milliar unduhan', 'Battle Royale', '2017-11-02', '4.2(PlayStore) 4.4(AppStore)', 'https://play.google.com/store/apps/details?id=com.dts.freefireth', '825-ff.jpg'),
(2, 'MOBILE LEGEND', '1,2+ Milliar unduhan', 'MOBA', '2016-09-24', '4.1(PlayStore) 4.6(AppStore)', 'https://play.google.com/store/apps/details?id=com.mobile.legends', '251-ml.jpg'),
(3, 'HONOR OF KING', '10+ Juta unduhan', 'MOBA', '2024-06-18', '4.4(PlayStore)', 'https://play.google.com/store/apps/details?id=com.levelinfinite.sgameGlobal', '169-hok.jpg'),
(4, 'PUBG MOBILE', '1,3+ Milliar unduhan', 'MOBA', '2018-03-19', '3.8(PlayStore) 4.5(AppStore)', 'https://play.google.com/store/apps/details?id=com.tencent.ig', '202-pubg.jpg'),
(5, 'GENSHIN IMPACT', '139+ Juta unduhan', 'RPG', '2020-09-26', '4.6(PlayStore) 4.7(AppStore)', 'https://play.google.com/store/apps/details?id=com.miHoYo.GenshinImpact', '313-genshin.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `top2`
--

CREATE TABLE `top2` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `unduhan` varchar(255) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `rilis` date DEFAULT NULL,
  `rating` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `top2`
--

INSERT INTO `top2` (`id`, `nama`, `unduhan`, `genre`, `rilis`, `rating`, `link`, `image`) VALUES
(1, 'ROBLOX', '995+ Juta unduhan', 'SANDBOX', '2006-09-01', '4.3(PlayStore) 4.5(AppStore)', 'https://play.google.com/store/apps/details?id=com.roblox.client&pcampaignid=web_share', '851-roblox.jpg'),
(2, 'MINECRAFT', '300+ Juta unduhan', 'SANDBOX', '2011-06-15', '4.7(PlayStore) 4.8(AppStore)', 'https://play.google.com/store/apps/details?id=com.mojang.minecraftpe&pcampaignid=web_share', '853-minecraft.jpg'),
(3, 'CLASH OF CLANS', '1,7+ Miliar unduhan', 'STRATEGI', '2013-09-30', '4.5(PlayStore) 4.8(AppStore)', 'https://play.google.com/store/apps/details?id=com.supercell.clashofclans&pcampaignid=web_share', '647-coc.jpg'),
(4, 'HONKAI STAR RAIL', '10+ Juta unduhan', 'RPG', '2023-04-06', '4.3(PlayStore)', 'https://play.google.com/store/apps/details?id=com.HoYoverse.hkrpgoversea&pcampaignid=web_share', '253-star.jpg'),
(5, 'ZENLESS ZONE ZERO', '5+ Juta unduhan', 'RPG', '2024-06-19', '3.5(PlayStore)', 'https://play.google.com/store/apps/details?id=com.HoYoverse.Nap&pcampaignid=web_share', '736-zzz.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `more`
--
ALTER TABLE `more`
  ADD PRIMARY KEY (`id`,`nama`);

--
-- Indeks untuk tabel `top1`
--
ALTER TABLE `top1`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `top2`
--
ALTER TABLE `top2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `more`
--
ALTER TABLE `more`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `top1`
--
ALTER TABLE `top1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `top2`
--
ALTER TABLE `top2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
