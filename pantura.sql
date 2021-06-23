-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jun 2021 pada 05.15
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pantura`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pa_admin`
--

CREATE TABLE `pa_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('super','general') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pa_pos`
--

CREATE TABLE `pa_pos` (
  `id_pos` int(11) NOT NULL,
  `tempat_id` int(11) NOT NULL,
  `nm_pos` varchar(25) NOT NULL,
  `lokasi_pos` text NOT NULL,
  `deskripsi_pos` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pa_pos`
--

INSERT INTO `pa_pos` (`id_pos`, `tempat_id`, `nm_pos`, `lokasi_pos`, `deskripsi_pos`) VALUES
(1, 1, 'Pos A', 'dekat pohon nangkas', 'Banyak orangnya di sini'),
(2, 1, 'Pos B', 'dekat lapangan', 'banyak daunnya di sini'),
(3, 3, 'Pos C', 'dekat sungai klawing', 'banyak orangnya di sini heheh'),
(4, 3, 'Pos D', 'dekat pohon beringin', 'Ada duitnya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pa_quiz_jawaban`
--

CREATE TABLE `pa_quiz_jawaban` (
  `id_quiz_jawaban` int(11) NOT NULL,
  `quizsoal_id` varchar(30) NOT NULL,
  `quizpilihan_id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `jenis` enum('pilgan','esai') NOT NULL,
  `is_jawaban_benar` enum('1','0') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pa_quiz_pilihan`
--

CREATE TABLE `pa_quiz_pilihan` (
  `id_quizpilihan` int(11) NOT NULL,
  `quizsoal_id` varchar(30) NOT NULL,
  `pilihan` text NOT NULL,
  `is_pilihan_benar` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pa_quiz_soal`
--

CREATE TABLE `pa_quiz_soal` (
  `id_quizsoal` varchar(30) NOT NULL,
  `pos_id` int(11) NOT NULL,
  `soal` text NOT NULL,
  `tema` varchar(25) NOT NULL,
  `jenis` enum('pilgan','esai') NOT NULL,
  `point_skor` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `img_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pa_regu`
--

CREATE TABLE `pa_regu` (
  `id_regu` int(11) NOT NULL,
  `sekolah_id` int(11) NOT NULL,
  `nm_regu` varchar(25) NOT NULL,
  `total_skor` float NOT NULL,
  `deskripsi_regu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pa_regu`
--

INSERT INTO `pa_regu` (`id_regu`, `sekolah_id`, `nm_regu`, `total_skor`, `deskripsi_regu`) VALUES
(1, 1, 'Regu Barongsai', 0, 'Siap Menerkam Kapanpun'),
(2, 7, 'Regu Makcongcang', 0, 'Menerkanerka'),
(4, 3, 'Regu Bajaklaut', 0, 'we are blackpirates');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pa_sekolah`
--

CREATE TABLE `pa_sekolah` (
  `id_sekolah` int(11) NOT NULL,
  `nm_sekolah` varchar(30) NOT NULL,
  `pembina` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pa_sekolah`
--

INSERT INTO `pa_sekolah` (`id_sekolah`, `nm_sekolah`, `pembina`) VALUES
(1, 'SMKN 1 Purbalingga', 'Bpk. Sumardis'),
(2, 'SMAN 1 Purbalingga', 'Bpk. Sukardi'),
(3, 'SMAN 2 Purbalingga', 'Bpk. Sakirun'),
(6, 'SMAN 1 Padamara', 'Ibu. Lilis'),
(7, 'SMK YPLP Purbalingga', 'Bpk. Satyo'),
(16, 'SMK JATENG', 'Bpk. Solihun');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pa_siswa`
--

CREATE TABLE `pa_siswa` (
  `id_siswa` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `regu_id` int(11) NOT NULL,
  `sekolah_id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pa_siswa`
--

INSERT INTO `pa_siswa` (`id_siswa`, `username`, `password`, `regu_id`, `sekolah_id`, `fullname`) VALUES
(1, 'rafikbojes', 'bojes123', 2, 3, 'Arafik Bojess'),
(2, 'zakie', 'zakie123', 2, 7, 'zakie'),
(4, 'rendi', 'rendi123', 4, 3, 'rendi pangalilo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pa_skor`
--

CREATE TABLE `pa_skor` (
  `id_skor` int(11) NOT NULL,
  `pos_id` int(11) NOT NULL,
  `regu_id` int(11) NOT NULL,
  `skor` float NOT NULL,
  `tipe` enum('manual','otomatis') NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pa_tempat`
--

CREATE TABLE `pa_tempat` (
  `id_tempat` int(11) NOT NULL,
  `nm_tempat` varchar(30) NOT NULL,
  `lokasi_tempat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pa_tempat`
--

INSERT INTO `pa_tempat` (`id_tempat`, `nm_tempat`, `lokasi_tempat`) VALUES
(1, 'Bumi Perkemahan', 'Limbangan, Rt02/Rw12, Kec. Kutasari'),
(3, 'Lapangan Selakambang', 'Desa Selakambang, RT11/RW2, Kec. Kaligondang');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pa_admin`
--
ALTER TABLE `pa_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `pa_pos`
--
ALTER TABLE `pa_pos`
  ADD PRIMARY KEY (`id_pos`),
  ADD KEY `FK_tempatid` (`tempat_id`);

--
-- Indeks untuk tabel `pa_quiz_jawaban`
--
ALTER TABLE `pa_quiz_jawaban`
  ADD PRIMARY KEY (`id_quiz_jawaban`),
  ADD KEY `FK_siswaid2` (`siswa_id`),
  ADD KEY `FK_quizsoalid2` (`quizsoal_id`),
  ADD KEY `FK_quizpilihanid2` (`quizpilihan_id`);

--
-- Indeks untuk tabel `pa_quiz_pilihan`
--
ALTER TABLE `pa_quiz_pilihan`
  ADD PRIMARY KEY (`id_quizpilihan`),
  ADD KEY `FK_quizsoalid` (`quizsoal_id`);

--
-- Indeks untuk tabel `pa_quiz_soal`
--
ALTER TABLE `pa_quiz_soal`
  ADD PRIMARY KEY (`id_quizsoal`),
  ADD KEY `FK_posid` (`pos_id`);

--
-- Indeks untuk tabel `pa_regu`
--
ALTER TABLE `pa_regu`
  ADD PRIMARY KEY (`id_regu`),
  ADD KEY `FK_sekolahid2` (`sekolah_id`);

--
-- Indeks untuk tabel `pa_sekolah`
--
ALTER TABLE `pa_sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indeks untuk tabel `pa_siswa`
--
ALTER TABLE `pa_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `FK_reguid` (`regu_id`),
  ADD KEY `FK_sekolahid` (`sekolah_id`);

--
-- Indeks untuk tabel `pa_skor`
--
ALTER TABLE `pa_skor`
  ADD PRIMARY KEY (`id_skor`),
  ADD KEY `FK_posid2` (`pos_id`),
  ADD KEY `FK_reguid2` (`regu_id`);

--
-- Indeks untuk tabel `pa_tempat`
--
ALTER TABLE `pa_tempat`
  ADD PRIMARY KEY (`id_tempat`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pa_admin`
--
ALTER TABLE `pa_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pa_pos`
--
ALTER TABLE `pa_pos`
  MODIFY `id_pos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pa_quiz_jawaban`
--
ALTER TABLE `pa_quiz_jawaban`
  MODIFY `id_quiz_jawaban` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pa_quiz_pilihan`
--
ALTER TABLE `pa_quiz_pilihan`
  MODIFY `id_quizpilihan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pa_regu`
--
ALTER TABLE `pa_regu`
  MODIFY `id_regu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pa_sekolah`
--
ALTER TABLE `pa_sekolah`
  MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `pa_siswa`
--
ALTER TABLE `pa_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pa_skor`
--
ALTER TABLE `pa_skor`
  MODIFY `id_skor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pa_tempat`
--
ALTER TABLE `pa_tempat`
  MODIFY `id_tempat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pa_pos`
--
ALTER TABLE `pa_pos`
  ADD CONSTRAINT `FK_tempatid` FOREIGN KEY (`tempat_id`) REFERENCES `pa_tempat` (`id_tempat`);

--
-- Ketidakleluasaan untuk tabel `pa_quiz_jawaban`
--
ALTER TABLE `pa_quiz_jawaban`
  ADD CONSTRAINT `FK_quizpilihanid2` FOREIGN KEY (`quizpilihan_id`) REFERENCES `pa_quiz_pilihan` (`id_quizpilihan`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_quizsoalid2` FOREIGN KEY (`quizsoal_id`) REFERENCES `pa_quiz_soal` (`id_quizsoal`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_siswaid2` FOREIGN KEY (`siswa_id`) REFERENCES `pa_siswa` (`id_siswa`);

--
-- Ketidakleluasaan untuk tabel `pa_quiz_pilihan`
--
ALTER TABLE `pa_quiz_pilihan`
  ADD CONSTRAINT `FK_quizsoalid` FOREIGN KEY (`quizsoal_id`) REFERENCES `pa_quiz_soal` (`id_quizsoal`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pa_quiz_soal`
--
ALTER TABLE `pa_quiz_soal`
  ADD CONSTRAINT `FK_posid` FOREIGN KEY (`pos_id`) REFERENCES `pa_pos` (`id_pos`);

--
-- Ketidakleluasaan untuk tabel `pa_regu`
--
ALTER TABLE `pa_regu`
  ADD CONSTRAINT `FK_sekolahid2` FOREIGN KEY (`sekolah_id`) REFERENCES `pa_sekolah` (`id_sekolah`);

--
-- Ketidakleluasaan untuk tabel `pa_siswa`
--
ALTER TABLE `pa_siswa`
  ADD CONSTRAINT `FK_reguid` FOREIGN KEY (`regu_id`) REFERENCES `pa_regu` (`id_regu`),
  ADD CONSTRAINT `FK_sekolahid` FOREIGN KEY (`sekolah_id`) REFERENCES `pa_sekolah` (`id_sekolah`);

--
-- Ketidakleluasaan untuk tabel `pa_skor`
--
ALTER TABLE `pa_skor`
  ADD CONSTRAINT `FK_posid2` FOREIGN KEY (`pos_id`) REFERENCES `pa_pos` (`id_pos`),
  ADD CONSTRAINT `FK_reguid2` FOREIGN KEY (`regu_id`) REFERENCES `pa_regu` (`id_regu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
