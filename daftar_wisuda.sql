-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Sep 2023 pada 18.07
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `daftar_wisuda`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dosbing`
--

CREATE TABLE `tbl_dosbing` (
  `id_dosbing` int(11) NOT NULL,
  `dosbing_1` varchar(100) NOT NULL,
  `dosbing_2` varchar(100) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_dosbing`
--

INSERT INTO `tbl_dosbing` (`id_dosbing`, `dosbing_1`, `dosbing_2`, `created_by`, `created_date`) VALUES
(1, 'Dr. Vika S.kom, M.kom', 'Dr. Guntur Saputra S.kom, M.kom', 'admin', '2023-09-21 20:16:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_formulir`
--

CREATE TABLE `tbl_formulir` (
  `id_formulir` int(11) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nim` varchar(100) NOT NULL,
  `ipk` varchar(30) NOT NULL,
  `dosbing_1` varchar(100) NOT NULL,
  `dosbing_2` varchar(100) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `tahun_masuk` varchar(30) NOT NULL,
  `tahun_lulus` varchar(30) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` varchar(20) NOT NULL,
  `nama_ortu` varchar(100) NOT NULL,
  `alamat_tinggal` text NOT NULL,
  `alamat_asal` text NOT NULL,
  `bekerja` varchar(100) NOT NULL,
  `alamat_bekerja` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `judul_skripsi` varchar(100) NOT NULL,
  `foto` text NOT NULL,
  `bukti_bayar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_formulir`
--

INSERT INTO `tbl_formulir` (`id_formulir`, `id_tahun`, `id_jurusan`, `nama`, `nim`, `ipk`, `dosbing_1`, `dosbing_2`, `agama`, `tahun_masuk`, `tahun_lulus`, `tempat_lahir`, `tgl_lahir`, `nama_ortu`, `alamat_tinggal`, `alamat_asal`, `bekerja`, `alamat_bekerja`, `email`, `no_hp`, `judul_skripsi`, `foto`, `bukti_bayar`) VALUES
(1, 1, 1, 'Aldi', '16117091', '3.35', 'Dr. Vika S.kom, M.kom', 'Dr. Guntur Saputra S.kom, M.kom', 'Islam', '2017', '2021', 'TANGERANG', '09/06/1999', 'Udin', 'Kota Tangerang', 'Kota Tangerang', 'belum bekerja', 'belum bekerja', 'aldi@gmail.com', '085881377774', 'Pembuatan Website Pendaftaran Wisuda', 'Baju-Totebag-Cangkir_acc.jpg', 'edit_foto_bpr.png'),
(2, 1, 2, 'Vieri Satria Ardiansyah', '162271', '3.40', 'Dr. Vika S.kom, M.kom', 'Dr. Guntur Saputra S.kom, M.kom', 'Islam', '2017', '2021', 'Purwakarta', '08/10/1999', 'Hardi Suhardiman', 'Perumahan Talaga Bestari Blok G1/10 Rt003/003, Kelurahan Wanakerta, Kecamatan Sindang Jaya, Kabupatèn Tangerang, Banten, Indonesia', 'Tangerang', 'PT BPR Kredit Mandiri Indonesia', 'BSD - BPR Kredit Mandiri Indonesia', 'vierisatriaa08@gmail.com', '0895336769180', 'Sistem Pendukung Keputusan Menggunakan Metode Weight Product dalam pemilihan laptop terbaik', 'Logo_web_ver.png', 'Shot_2_Food_Dashboard.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jurusan`
--

CREATE TABLE `tbl_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jenjang` varchar(100) NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL,
  `nama_fakultas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_jurusan`
--

INSERT INTO `tbl_jurusan` (`id_jurusan`, `nama_jenjang`, `nama_jurusan`, `nama_fakultas`) VALUES
(1, 'S-1', 'Sistem Informasi', 'Ilmu Komputer dan Teknologi Informasi'),
(2, 'S-1', 'Teknik Kimia', 'Teknologi Industri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id_setting` int(11) NOT NULL,
  `nama_website` varchar(100) NOT NULL,
  `nama_univ` varchar(100) NOT NULL,
  `alamat_univ` text NOT NULL,
  `no_telp` varchar(14) NOT NULL,
  `email` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_setting`
--

INSERT INTO `tbl_setting` (`id_setting`, `nama_website`, `nama_univ`, `alamat_univ`, `no_telp`, `email`, `icon`, `logo`) VALUES
(1, 'Pendaftaran Wisuda', 'Universitas Gunadarma', 'Jl. Raya Karawaci - Kabupaten Tangerang', '021617281291', 'gunadarma@ac.id', 'fas fa-graduation-cap', 'logo1.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tahun_akademik`
--

CREATE TABLE `tbl_tahun_akademik` (
  `id_tahun` int(11) NOT NULL,
  `tahun_akademik` varchar(100) NOT NULL,
  `periode` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_tahun_akademik`
--

INSERT INTO `tbl_tahun_akademik` (`id_tahun`, `tahun_akademik`, `periode`, `keterangan`, `status`) VALUES
(1, '23.1', 'Periode I TA 2023/2024', '                                Paling Lambat Pendaftaran Tanggal 21 September 2023 Jam 13.00                                ', 'Aktif'),
(2, '19.1', 'Periode I TA 2019/2020', 'Paling Lambat test', 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `id_setting` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL,
  `created_update` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `id_setting`, `nama`, `username`, `password`, `level`, `created_update`) VALUES
(1, '', 'Administrator', 'admin', 'admin123', '1', '2023-09-21 20:00:44'),
(2, '', 'Aldi', '16117091', 'aldi12', '2', '2023-09-21 20:08:58'),
(3, '', 'Vieri Satria Ardiansyah', '162271', 'vieri123', '2', '2023-09-21 20:40:54');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_dosbing`
--
ALTER TABLE `tbl_dosbing`
  ADD PRIMARY KEY (`id_dosbing`);

--
-- Indeks untuk tabel `tbl_formulir`
--
ALTER TABLE `tbl_formulir`
  ADD PRIMARY KEY (`id_formulir`),
  ADD KEY `id_tahun` (`id_tahun`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indeks untuk tabel `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indeks untuk tabel `tbl_tahun_akademik`
--
ALTER TABLE `tbl_tahun_akademik`
  ADD PRIMARY KEY (`id_tahun`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_dosbing`
--
ALTER TABLE `tbl_dosbing`
  MODIFY `id_dosbing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_formulir`
--
ALTER TABLE `tbl_formulir`
  MODIFY `id_formulir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_tahun_akademik`
--
ALTER TABLE `tbl_tahun_akademik`
  MODIFY `id_tahun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
