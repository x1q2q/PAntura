-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jul 2021 pada 07.24
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

--
-- Dumping data untuk tabel `pa_admin`
--

INSERT INTO `pa_admin` (`id_admin`, `username`, `password`, `role`) VALUES
(1, 'bojes', '3baa82bcda6cddabc64bb69929d7500d', 'super');

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
(7, 3, 'Pos A', 'dekat sungai selo', 'dekat sekali gan'),
(8, 4, 'Pos A', 'Dekat rumah bu nyai', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pa_quiz_jawaban`
--

CREATE TABLE `pa_quiz_jawaban` (
  `id_quiz_jawaban` int(11) NOT NULL,
  `pos_id` int(11) NOT NULL,
  `quizsoal_id` varchar(30) NOT NULL,
  `kode_jawaban` varchar(10) NOT NULL,
  `quizpilihan_id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `is_jawaban_benar` enum('1','0') NOT NULL,
  `submited_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pa_quiz_jawaban`
--

INSERT INTO `pa_quiz_jawaban` (`id_quiz_jawaban`, `pos_id`, `quizsoal_id`, `kode_jawaban`, `quizpilihan_id`, `siswa_id`, `is_jawaban_benar`, `submited_at`) VALUES
(1, 1, 'QZ199043', 'PA-4M12D9D', 46, 1, '0', '2021-07-20 08:42:25'),
(2, 1, 'QZ210626', 'PA-4M12D9D', 41, 1, '1', '2021-07-20 08:44:32'),
(3, 1, 'QZ506281', 'PA-4M12D9D', 40, 2, '1', '2021-07-20 08:45:28'),
(4, 1, 'QZ506281', 'PA-4M12D9D', 40, 1, '1', '2021-07-20 14:45:32'),
(5, 1, 'QZ199043', 'PA-4M12D9D', 45, 2, '1', '2021-07-20 14:53:53'),
(6, 1, 'QZ210626', 'PA-4M12D9D', 41, 2, '1', '2021-07-20 14:53:53'),
(7, 3, 'QZ136977', 'PA-RX859YG', 78, 1, '0', '2021-07-20 15:00:11'),
(8, 3, 'QZ118570', 'PA-RX859YG', 74, 1, '1', '2021-07-20 15:00:11'),
(9, 3, 'QZ152026', 'PA-RX859YG', 73, 1, '1', '2021-07-20 15:00:11');

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
(37, 'QZ506281', 'bapak LBP', '0'),
(38, 'QZ506281', 'pak luhut binsar', '0'),
(39, 'QZ506281', 'opung luhut', '0'),
(40, 'QZ506281', 'semua benar', '1'),
(41, 'QZ210626', 'boden powell', '1'),
(42, 'QZ210626', 'naruto uzumaki', '0'),
(43, 'QZ210626', 'monkey d luffy', '0'),
(44, 'QZ210626', 'roger danuarta', '0'),
(45, 'QZ199043', 'bidang kemanusiaan', '1'),
(46, 'QZ199043', 'bidang kesehatan', '0'),
(47, 'QZ199043', 'bidang olahraga', '0'),
(48, 'QZ199043', 'semuanya benar', '0'),
(69, 'QZ962779', 'contoh sj', '0'),
(70, 'QZ962779', 'contoh 2', '1'),
(71, 'QZ947861', 'contoh sj', '0'),
(72, 'QZ947861', 'contoh 2', '1'),
(73, 'QZ152026', 'tacinpapatrerahedisbersu', '1'),
(74, 'QZ118570', 'dasar kehidupan; dasar talitemali; dasar survival', '1'),
(75, 'QZ136977', 'Pak Soekarno', '1'),
(76, 'QZ136977', 'Bpk. Boden Powell', '0'),
(77, 'QZ136977', 'Bpk. Luhut Binsar', '0'),
(78, 'QZ136977', 'Bapak Saya Sendiri', '0');

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
('QZ118570', 3, 'PA-RX859YG', '<p>sebutkan dasar-dasar pramuka</p>', 'esai', '2021-07-18 07:20:32', ''),
('QZ136977', 3, 'PA-RX859YG', '<p>siapakah bapak presiden RI ke-1</p>', 'pilgan', '2021-07-18 07:20:32', ''),
('QZ152026', 3, 'PA-RX859YG', '<p><span style=\"color: rgb(25, 29, 33); font-size: 20px; background-color: rgb(255, 255, 255);\">Sebutkan 5 dasadarma pramuka...&nbsp; &nbsp;&nbsp;</span><br></p>', 'esai', '2021-07-18 07:20:32', ''),
('QZ199043', 1, 'PA-4M12D9D', '<p>Bergerak di bidang apakah pramuka?</p>', 'pilgan', '2021-07-15 13:58:12', ''),
('QZ210626', 1, 'PA-4M12D9D', '<p>Siapakah bapakpramuka sedunia?</p>', 'pilgan', '2021-07-15 13:58:12', ''),
('QZ506281', 1, 'PA-4M12D9D', '<p>Siapa dalang pembunuhan munir?</p>', 'pilgan', '2021-07-15 13:58:12', ''),
('QZ947861', 4, 'PA-BHLACYR', '<p>Ini contoh</p>', 'pilgan', '2021-07-16 08:01:51', ''),
('QZ962779', 2, 'PA-BHLACYR', '<p>Ini contoh</p>', 'pilgan', '2021-07-16 08:01:51', '');

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
(7, 'teratai', 'hafsani', 'hafsani123', 'perempuan', 2, '1', 0),
(8, 'Kambing Jantan', 'rafik', 'rafik123', 'laki-laki', 16, '1', 0);

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
(3, 'Lapangan Selakambang', 'Desa Selakambang, RT11/RW2, Kec. Kaligondang'),
(4, 'Rumah Kurcaci', 'Desa Serang');

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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pa_notif`
--
ALTER TABLE `pa_notif`
  MODIFY `id_notif` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pa_pos`
--
ALTER TABLE `pa_pos`
  MODIFY `id_pos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pa_quiz_jawaban`
--
ALTER TABLE `pa_quiz_jawaban`
  MODIFY `id_quiz_jawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pa_quiz_pilihan`
--
ALTER TABLE `pa_quiz_pilihan`
  MODIFY `id_quizpilihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT untuk tabel `pa_sekolah`
--
ALTER TABLE `pa_sekolah`
  MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `pa_siswa`
--
ALTER TABLE `pa_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pa_tempat`
--
ALTER TABLE `pa_tempat`
  MODIFY `id_tempat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
