-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jul 2022 pada 09.54
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemadam`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jns_kebakaran`
--

CREATE TABLE `jns_kebakaran` (
  `id_kebakaran` int(11) NOT NULL,
  `nm_kebakaran` varchar(100) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `data_create` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jns_kebakaran`
--

INSERT INTO `jns_kebakaran` (`id_kebakaran`, `nm_kebakaran`, `deskripsi`, `data_create`) VALUES
(1, 'Kebakaran Kelas A', 'kebakaran aa', '2022-07-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kordinat`
--

CREATE TABLE `kordinat` (
  `id_kor` int(11) NOT NULL,
  `lat_kor` varchar(100) NOT NULL,
  `long_kor` varchar(100) NOT NULL,
  `pelapor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kordinat`
--

INSERT INTO `kordinat` (`id_kor`, `lat_kor`, `long_kor`, `pelapor_id`) VALUES
(2, '-1.3522798497145676', '100.5931091378443', 2),
(3, '-1.2738545852095122', '100.50785063998774', 3),
(4, '-1.4412041067172296', '100.60114860883914', 4),
(5, '-0.9050467912861138', '100.37790298287291', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelapor`
--

CREATE TABLE `pelapor` (
  `id_pelapor` int(11) NOT NULL,
  `nama_pel` varchar(100) NOT NULL,
  `nohp_pel` varchar(20) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `pemadam_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status_lap` int(11) NOT NULL,
  `data_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelapor`
--

INSERT INTO `pelapor` (`id_pelapor`, `nama_pel`, `nohp_pel`, `id_jenis`, `pemadam_id`, `image`, `status_lap`, `data_created`) VALUES
(1, 'muhammad alip', '0823232323', 1, 1, 'aasd.jpg', 1, '2022-07-21'),
(2, 'alip', '083232423423', 1, 1, 'bbb.jpg', 0, '2022-07-21'),
(3, 'ayam', '083232423423', 1, 1, 'aasd.jpg', 0, '2022-07-23'),
(4, 'kucing', '083232423423', 1, 1, 'bbb.jpg', 0, '2022-07-23'),
(5, 'alip', '083232423423', 1, 3, 'bbb.jpg', 0, '2022-07-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pemadam`
--

CREATE TABLE `tbl_pemadam` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `data_create` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pemadam`
--

INSERT INTO `tbl_pemadam` (`id`, `nama`, `alamat`, `latitude`, `longitude`, `nohp`, `gambar`, `data_create`) VALUES
(1, 'Posko painan', 'painan', '-1.3498809685134807', '100.57900786399843', '082283327577', 'damkar.jpg', '2022-07-21'),
(2, 'posko Kambang', 'kambang', '-1.6929069918426052', '100.70995328715073', '082283327577', 'damkar.jpg', '2022-07-21'),
(3, 'posko coba', 'padang ', '-0.922640023569157', '100.35209655936342', '0922232343', 'aasd.jpg', '2022-07-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `posisi` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `salt` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `data_create` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nik`, `password`, `nama`, `nohp`, `posisi`, `role`, `salt`, `image`, `data_create`) VALUES
(1, '18101152610510', '63f550b7b38cb27363fd46f02748e78f62954526898e76.09038443', 'muhammad alip', '082283327577', '', 1, '62954526898e76.09038443', 'default.png', '0000-00-00'),
(2, '18101152610511', '63f550b7b38cb27363fd46f02748e78f62d91bae9a3ca1.53549381', 'alip', '082283327577', '-1.3498809685134807,100.57900786399843', 2, '62d91bae9a3ca1.53549381', 'default.png', '2022-07-21'),
(3, '18101152610512', '63f550b7b38cb27363fd46f02748e78f62daf5e0e23a45.82015442', 'kucing', '082283327577', '-1.6929069918426052,100.70995328715073', 2, '62daf5e0e23a45.82015442', 'default.png', '2022-07-23'),
(4, '18101152610513', '63f550b7b38cb27363fd46f02748e78f62daf99f8c6146.04673861', 'alip', '082283327577', '-0.922640023569157,100.35209655936342', 2, '62daf99f8c6146.04673861', 'default.png', '2022-07-23');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jns_kebakaran`
--
ALTER TABLE `jns_kebakaran`
  ADD PRIMARY KEY (`id_kebakaran`);

--
-- Indeks untuk tabel `kordinat`
--
ALTER TABLE `kordinat`
  ADD PRIMARY KEY (`id_kor`);

--
-- Indeks untuk tabel `pelapor`
--
ALTER TABLE `pelapor`
  ADD PRIMARY KEY (`id_pelapor`);

--
-- Indeks untuk tabel `tbl_pemadam`
--
ALTER TABLE `tbl_pemadam`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jns_kebakaran`
--
ALTER TABLE `jns_kebakaran`
  MODIFY `id_kebakaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kordinat`
--
ALTER TABLE `kordinat`
  MODIFY `id_kor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pelapor`
--
ALTER TABLE `pelapor`
  MODIFY `id_pelapor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_pemadam`
--
ALTER TABLE `tbl_pemadam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
