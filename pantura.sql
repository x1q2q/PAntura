-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jul 2021 pada 09.19
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
-- Struktur dari tabel `pa_notif`
--

CREATE TABLE `pa_notif` (
  `id_notif` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `judul_notif` text NOT NULL,
  `stts_notif` enum('seen','unseen') NOT NULL
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
(4, 3, 'Pos D', 'dekat pohon beringin', 'Ada duitnya'),
(7, 3, 'Pos A', 'dekat sungai selo', 'dekat sekali gan');

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

--
-- Dumping data untuk tabel `pa_quiz_pilihan`
--

INSERT INTO `pa_quiz_pilihan` (`id_quizpilihan`, `quizsoal_id`, `pilihan`, `is_pilihan_benar`) VALUES
(1, 'QZ52784', 'simpul kegaduhan', '0'),
(2, 'QZ52784', 'simpul kebenaran', '0'),
(3, 'QZ52784', 'simpul kebatilan', '0'),
(4, 'QZ52784', 'simpul belahdua', '1'),
(5, 'RY590546', 'Bapak Raffi', '0'),
(6, 'RY590546', 'Anon darkjokes', '0'),
(7, 'RY590546', 'Boden Powell', '1'),
(8, 'RY590546', 'Jessno limit', '0'),
(9, 'SX53789', '17 Agustus 1945', '0'),
(10, 'SX53789', '3 Januari 1936', '1'),
(11, 'SX53789', '2 Desember 1967', '0'),
(12, 'SX53789', '03 Oktober 1934', '0'),
(14, 'TY42890', 'sandi morse memiliki beberapa macam yaitu: (a). sandi morse I; (b). sandi morse II', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pa_quiz_soal`
--

CREATE TABLE `pa_quiz_soal` (
  `id_quizsoal` varchar(30) NOT NULL,
  `pos_id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `soal` text NOT NULL,
  `jenis` enum('pilgan','esai') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `img_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pa_quiz_soal`
--

INSERT INTO `pa_quiz_soal` (`id_quizsoal`, `pos_id`, `kode`, `soal`, `jenis`, `created_at`, `img_path`) VALUES
('QZ52784', 2, '20347HE32S', 'Di antara berikut, manakah yang termasuk jenis simpul pramuka', 'pilgan', '2021-07-10 10:54:26', ''),
('RY590546', 2, '20347HE32S', 'Siapakah bapak pramuka sedunia?', 'pilgan', '2021-07-10 10:51:39', ''),
('SX53789', 2, '20347HE32S', 'Kapan hari pramuka dirayakan?', 'pilgan', '2021-07-10 10:52:20', ''),
('TY42890', 1, '70673RY797', 'sebutkan macam-macam sandi morse', 'esai', '2021-07-10 11:01:06', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pa_sekolah`
--

CREATE TABLE `pa_sekolah` (
  `id_sekolah` int(11) NOT NULL,
  `nm_sekolah` varchar(30) NOT NULL,
  `deskripsi_sekolah` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pa_sekolah`
--

INSERT INTO `pa_sekolah` (`id_sekolah`, `nm_sekolah`, `deskripsi_sekolah`) VALUES
(1, 'SMKN 1 Purbalingga', 'pembina = Bpk. Sumardis'),
(2, 'SMAN 1 Purbalingga', 'pembina = Bpk. Sukardi'),
(3, 'SMAN 2 Purbalingga', 'pembina = Bpk. Sakiruns'),
(6, 'SMAN 1 Padamara', 'pembina = Ibu. Lilis'),
(7, 'SMK YPLP Purbalingga', 'pembina = Bpk. Satyo'),
(16, 'SMK JATENG', 'pembina = Bpk. Solihun'),
(19, 'SMK YPLP 1 Purbalingga', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pa_siswa`
--

CREATE TABLE `pa_siswa` (
  `id_siswa` int(11) NOT NULL,
  `regu` varchar(30) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jenkel` enum('laki-laki','perempuan') NOT NULL,
  `sekolah_id` int(11) NOT NULL,
  `is_login` enum('1','0') NOT NULL,
  `skor_regu` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pa_siswa`
--

INSERT INTO `pa_siswa` (`id_siswa`, `regu`, `username`, `password`, `jenkel`, `sekolah_id`, `is_login`, `skor_regu`) VALUES
(1, 'barongsai', 'rafikbojes', 'bojes123', 'laki-laki', 1, '0', 0),
(2, 'yakuza', 'zakie', 'zakie123', 'laki-laki', 7, '0', 0),
(4, 'muay thai', 'rendi', 'rendi123', 'laki-laki', 19, '0', 0),
(5, 'gajahduduks', 'ibnuarya', 'ibnu123', 'laki-laki', 2, '1', 0),
(7, 'teratai', 'hafsani', 'hafsani123', 'perempuan', 2, '1', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pa_skor`
--
-- Kesalahan membaca struktur untuk tabel pantura.pa_skor: #1932 - Table 'pantura.pa_skor' doesn't exist in engine
-- Kesalahan membaca data untuk tabel pantura.pa_skor: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `pantura`.`pa_skor`' at line 1

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
-- Indeks untuk tabel `pa_notif`
--
ALTER TABLE `pa_notif`
  ADD PRIMARY KEY (`id_notif`);

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
-- Indeks untuk tabel `pa_sekolah`
--
ALTER TABLE `pa_sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indeks untuk tabel `pa_siswa`
--
ALTER TABLE `pa_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `FK_sekolahid` (`sekolah_id`);

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
-- AUTO_INCREMENT untuk tabel `pa_notif`
--
ALTER TABLE `pa_notif`
  MODIFY `id_notif` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pa_pos`
--
ALTER TABLE `pa_pos`
  MODIFY `id_pos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pa_quiz_jawaban`
--
ALTER TABLE `pa_quiz_jawaban`
  MODIFY `id_quiz_jawaban` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pa_quiz_pilihan`
--
ALTER TABLE `pa_quiz_pilihan`
  MODIFY `id_quizpilihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pa_sekolah`
--
ALTER TABLE `pa_sekolah`
  MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `pa_siswa`
--
ALTER TABLE `pa_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- Ketidakleluasaan untuk tabel `pa_siswa`
--
ALTER TABLE `pa_siswa`
  ADD CONSTRAINT `FK_sekolahid` FOREIGN KEY (`sekolah_id`) REFERENCES `pa_sekolah` (`id_sekolah`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
