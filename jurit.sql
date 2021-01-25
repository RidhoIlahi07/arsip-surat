-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jan 2021 pada 00.55
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jurit`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `notulen`
--

CREATE TABLE `notulen` (
  `no_notulen` int(11) NOT NULL,
  `no_suratnotulen` text NOT NULL,
  `pemimpin_notulen` text NOT NULL,
  `tanggal_notulen` text NOT NULL,
  `tempat_notulen` text NOT NULL,
  `agenda_notulen` text NOT NULL,
  `pengirim_notulen` text NOT NULL,
  `penerima_notulen` text NOT NULL,
  `hasil_notulen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `notulen`
--

INSERT INTO `notulen` (`no_notulen`, `no_suratnotulen`, `pemimpin_notulen`, `tanggal_notulen`, `tempat_notulen`, `agenda_notulen`, `pengirim_notulen`, `penerima_notulen`, `hasil_notulen`) VALUES
(4, '007/UN18.F6/PSTI/EP/2020', 'ridho ilahi', '01/21/2021 12:00 AM', 'kantor desa', 'itusudah', 'kepala desa', 'staf desa', 'udaudhaudhaidhaidad'),
(5, '007/UN18.F6/PSTI/EP/2020', 'ridho ilahi', '01/21/2021 12:00 AM', 'kantor desa', 'itusudah', 'kepala desa', 'staf desa', 'udaudhaudhaidhaidad'),
(7, '007/UN18.F6/PSTI/EP/2020', 'ridho ilahi', '01/21/2021 12:00 AM', 'kantor desa', 'itusudah', 'kepala desa', 'staf desa', 'udaudhaudhaidhaidad'),
(8, '007/UN18.F6/PSTI/EP/2020', 'ridho ilahi', '01/21/2021 12:00 AM', 'kantor desa', 'itusudah', 'kepala desa', 'staf desa', 'udaudhaudhaidhaidad'),
(9, '007/UN18.F6/PSTI/EP/2020', 'ridho ilahi', '01/21/2021 12:00 AM', 'kantor desa', 'itusudah', 'kepala desa', 'staf desa', 'udaudhaudhaidhaidad'),
(10, '007/UN18.F6/PSTI/EP/2020', 'Prof. Dr. Eng. I Gede Pasek Suta Wijaya, S.T., M.T.', '01/24/2021 4:47 AM', 'Ruang Rapat Prodi', 'ADAD', 'ProgramStudi', 'Dosen Informatika', 'ADADAD');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerima_sk`
--

CREATE TABLE `penerima_sk` (
  `id_penerima_sk` int(11) NOT NULL,
  `nama_penerimask` text CHARACTER SET utf8mb4 NOT NULL,
  `tl_penerimask` text CHARACTER SET utf8mb4 NOT NULL,
  `tgl_penerimask` text CHARACTER SET utf8mb4 NOT NULL,
  `pddk_terakhir` text CHARACTER SET utf8mb4 NOT NULL,
  `jbtn_baru` text CHARACTER SET utf8mb4 NOT NULL,
  `jbtn_lama` text CHARACTER SET utf8mb4 NOT NULL,
  `akhir_penerimask` text CHARACTER SET utf8mb4 NOT NULL,
  `ket_penerimask` text CHARACTER SET utf8mb4 NOT NULL,
  `id_sk` int(11) NOT NULL,
  `no_sk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penerima_sk`
--

INSERT INTO `penerima_sk` (`id_penerima_sk`, `nama_penerimask`, `tl_penerimask`, `tgl_penerimask`, `pddk_terakhir`, `jbtn_baru`, `jbtn_lama`, `akhir_penerimask`, `ket_penerimask`, `id_sk`, `no_sk`) VALUES
(1, 'as', '32', '3', 'eee', 'rrr', 'fff', 'sss', 'fff', 1, '009');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_suratkeluar` int(11) NOT NULL,
  `tgl_suratkeluar` text NOT NULL,
  `no_suratkeluar` text NOT NULL,
  `isi_suratkeluar` text NOT NULL,
  `perihal_suratkeluar` text NOT NULL,
  `penerima_suratkeluar` text NOT NULL,
  `pengirim_suratkeluar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_suratkeluar`, `tgl_suratkeluar`, `no_suratkeluar`, `isi_suratkeluar`, `perihal_suratkeluar`, `penerima_suratkeluar`, `pengirim_suratkeluar`) VALUES
(3, '2021-01-20 11:30:00', '008', 'adniadn', 'adiandia', 'daaidnai', 'dadada'),
(4, '2021-01-20 12:19:00', '125', 'surat ketrengan domisi usaha untuk bapak ajar', 'pengajuan bantuan umum', 'bapak ajar', 'pemerintah desa'),
(5, '2021-01-31 04:42:00', 'qeqeq', 'qrwerr', 'pengajuan bantuan umum', 'bapak ajar', 'pemerintah desa'),
(6, '2021-01-31 04:48:00', '125', 'Aassdad', 'dadada', 'dwad', 'adadadade'),
(7, '2021-01-24 00:26:00', '', '', '', '', 'ket'),
(8, '2021-01-24 19:50:00', '', '', '', '', 'ket');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_suratmasuk` int(11) NOT NULL,
  `tgl_suratmasuk` text NOT NULL,
  `no_suratmasuk` text NOT NULL,
  `isi_suratmasuk` text NOT NULL,
  `perihal_suratmasuk` text NOT NULL,
  `penerima_suratmasuk` text NOT NULL,
  `pengirim_suratmasuk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_suratmasuk`, `tgl_suratmasuk`, `no_suratmasuk`, `isi_suratmasuk`, `perihal_suratmasuk`, `penerima_suratmasuk`, `pengirim_suratmasuk`) VALUES
(14, '1970-01-01 07:00:00', '006', 'dadadadad', 'dadadad', 'dadadda', 'dadada'),
(15, '2021-01-15 12:32:00', '003', 'dadadadad', 'adadada', 'dada', 'dadada'),
(17, '2021-01-20 12:22:00', '414/26/PMD/2021', 'Ada 3 poin :\r\n1. adbadaj\r\n2.iadiada\r\n3.bdakjbdakjda', 'review APBDesa', 'Kepala desa', 'Dinas PMD'),
(18, '1970-01-01 07:00:00', '', '', '', '', ''),
(19, '1970-01-01 07:00:00', '', '', '', '', ''),
(20, '2021-01-31 04:40:00', '414/26/PMD/2021', 'adadad', 'qqq', 'qeqeq', 'yee wah'),
(21, '2021-01-31 04:44:00', '414/26/PMD/20', 'dajdjadnj', 'iyeewah', 'pokok ngenowah', 'saihul');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_sk`
--

CREATE TABLE `surat_sk` (
  `id_sk` int(11) NOT NULL,
  `no_sk` text NOT NULL,
  `tentang_sk` text NOT NULL,
  `tanggal_sk` text NOT NULL,
  `penerbit_sk` text NOT NULL,
  `keputusan_sk` text NOT NULL,
  `keterangan_sk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat_sk`
--

INSERT INTO `surat_sk` (`id_sk`, `no_sk`, `tentang_sk`, `tanggal_sk`, `penerbit_sk`, `keputusan_sk`, `keterangan_sk`) VALUES
(1, '009', 'itudahlol', '09/08/2021 12:00 AM', 'unram', 'program kkn', 'memmutuskan si itu jadi ketuakelompok'),
(3, '008', 'pengangkatan kepala desa', '2021-01-25 00:06:00', 'pemerintah daerah', 'memutuskan saudara ibrahim untuk menjadi kepala desa', 'surat keputusan tentang SK yang berisi nama kepala desa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `username_admin` varchar(255) NOT NULL,
  `password_admin` varchar(255) NOT NULL,
  `foto_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `username_admin`, `password_admin`, `foto_admin`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `username_pengguna` varchar(255) NOT NULL,
  `password_pengguna` varchar(255) NOT NULL,
  `foto_pengguna` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `full_name`, `username_pengguna`, `password_pengguna`, `foto_pengguna`) VALUES
(1, 'saihul', 'saihul amri buyut achmarain', 'saihul', '875635d9f756b6a33b37984f5693f73a24cd6ff9 ', 'saihul.jpeg'),
(5, 'tes', 'tes', 'tes', 'd1c056a983786a38ca76a05cda240c7b86d77136 ', 'tes.JPG'),
(6, 'pengguna', 'pengguna', 'pengguna', '8b097b8a86f9d6a991357d40d3d58634', 'pengguna.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `notulen`
--
ALTER TABLE `notulen`
  ADD PRIMARY KEY (`no_notulen`);

--
-- Indeks untuk tabel `penerima_sk`
--
ALTER TABLE `penerima_sk`
  ADD PRIMARY KEY (`id_penerima_sk`),
  ADD KEY `id_sk` (`id_sk`),
  ADD KEY `id_sk_2` (`id_sk`);

--
-- Indeks untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_suratkeluar`);

--
-- Indeks untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_suratmasuk`);

--
-- Indeks untuk tabel `surat_sk`
--
ALTER TABLE `surat_sk`
  ADD PRIMARY KEY (`id_sk`);

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `notulen`
--
ALTER TABLE `notulen`
  MODIFY `no_notulen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `penerima_sk`
--
ALTER TABLE `penerima_sk`
  MODIFY `id_penerima_sk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_suratkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_suratmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `surat_sk`
--
ALTER TABLE `surat_sk`
  MODIFY `id_sk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
