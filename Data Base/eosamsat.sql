-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jun 2022 pada 19.06
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eosamsat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmotor`
--

CREATE TABLE `tmotor` (
  `id_motor` int(11) NOT NULL,
  `plat_kendaraan` varchar(8) NOT NULL,
  `nomor_plat` int(11) NOT NULL,
  `nomor_seri` int(10) NOT NULL,
  `nomor_rangka` int(5) NOT NULL,
  `provinsi` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tmotor`
--

INSERT INTO `tmotor` (`id_motor`, `plat_kendaraan`, `nomor_plat`, `nomor_seri`, `nomor_rangka`, `provinsi`) VALUES
(18, 'DK', 4964, 27, 22121, 'Kepulauan Riau');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tmotor`
--
ALTER TABLE `tmotor`
  ADD PRIMARY KEY (`id_motor`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tmotor`
--
ALTER TABLE `tmotor`
  MODIFY `id_motor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
