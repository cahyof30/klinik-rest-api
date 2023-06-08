-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jun 2023 pada 07.33
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_klinik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL,
  `nomor_rm` varchar(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nomor_telepon` varchar(128) NOT NULL,
  `alamat` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id`, `nomor_rm`, `nama`, `tanggal_lahir`, `nomor_telepon`, `alamat`) VALUES
(1, '9749377', 'Romaine Torphy', '2011-12-20', '119.741.4662x967', '10449 Zboncak Crossing\nElliottfurt, MN 38268-8733'),
(2, '11822', 'Skyla Huels MD', '2023-03-02', '(369)959-5101x53904', '957 Botsford Rapids Suite 138\nMadisynshire, MN 66817'),
(3, '1', 'Mrs. Linda Huels III', '1996-03-19', '+85(5)0225792184', '52508 Gene Crescent Suite 648\nRamonbury, CT 82135-6912'),
(4, '451012', 'Miss Lilian Heaney', '1992-07-11', '1-524-483-4545', '25135 Riley Plaza Apt. 431\nNew Sandrine, WV 38096-4939'),
(5, '7034', 'Mr. Alexie Farrell', '2003-09-26', '(465)264-3763x195', '597 Maegan Locks Suite 491\nCorbinmouth, UT 34960'),
(6, '68', 'Jerrold Bayer', '1982-07-19', '05737396375', '07265 Royce Row Suite 150\nCronaville, PA 67359-8904'),
(7, '65617', 'Vladimir Hoppe', '2020-08-21', '1-497-169-3175', '66195 Franecki Isle\nLynnborough, KS 01103-6434'),
(8, '119', 'Tillman Murazik', '1975-08-20', '00778324531', '89791 Renner Stream\nHarmonstad, DC 59443'),
(9, '6', 'Kali Rosenbaum', '2018-09-15', '(776)886-4092', '357 Abernathy Rue Apt. 500\nGrahamshire, AK 23018'),
(10, '761933451', 'Lottie Reynolds MD', '1974-01-03', '1-237-404-6565x3178', '513 Emmie Ramp\nSouth Myrl, HI 53615');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nip` varchar(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nomor_telepon` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `nip`, `nama`, `tanggal_lahir`, `nomor_telepon`, `email`, `password`) VALUES
(1, '194124942', 'Mr. Pierre Fisher PhD', '2007-05-08', '407-940-6381', 'eusebio.nienow@yahoo.com', ''),
(2, '1', 'Moriah Pfeffer', '1972-09-10', '828-276-8036', 'kaley.cummerata@wehner.biz', ''),
(3, '80973', 'Murl Leffler', '1988-04-16', '554.717.3900', 'justice.nienow@hotmail.com', ''),
(4, '2694', 'Paula Hammes', '1989-06-28', '1-470-612-5946', 'afton.hermann@reynoldsokon.com', ''),
(5, '', 'Allie Thompson', '1998-07-30', '065.038.2655x628', 'scasper@streichharvey.com', ''),
(6, '887254474', 'Miss Elise Schulist Jr.', '1990-09-11', '(964)099-0596', 'rowan82@sporer.com', ''),
(7, '7', 'Nickolas Stehr', '1994-09-15', '525.776.2755', 'rhudson@hamill.net', ''),
(8, '3', 'Anibal Wolff', '1971-01-28', '(671)002-2513x778', 'karson33@yahoo.com', ''),
(9, '87613', 'Boris McLaughlin', '2009-02-16', '+13(3)5602451496', 'monique.ortiz@yahoo.com', ''),
(10, '1778758', 'Beulah Hills', '1994-03-27', '(807)423-2127x659', 'rohan.genevieve@gmail.com', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `poli`
--

CREATE TABLE `poli` (
  `id` int(11) NOT NULL,
  `nama_poli` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `poli`
--

INSERT INTO `poli` (`id`, `nama_poli`) VALUES
(1, 'Poli Umum'),
(2, 'Poli Kandungan'),
(3, 'Poli Jiwa'),
(4, 'Pol THT'),
(6, 'Poli Saraf');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `poli`
--
ALTER TABLE `poli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
