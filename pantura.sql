-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jan 2022 pada 15.17
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
(1, 'bojes', '3baa82bcda6cddabc64bb69929d7500d', 'super'),
(4, 'rifan', '745f7fe7b874750907bd874d7b52ea87', 'general'),
(5, 'royan', 'b7cc242a4fac57ed313e7780e21b46d6', 'general');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pa_notif`
--

CREATE TABLE `pa_notif` (
  `id_notif` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `judul_notif` text DEFAULT NULL,
  `stts_notif` enum('seen','unseen') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `pa_papanskor`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `pa_papanskor` (
`username` varchar(25)
,`nm_sekolah` varchar(30)
,`regu` varchar(30)
,`pos_selesai` bigint(21)
,`total_skor` double
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pa_pos`
--

CREATE TABLE `pa_pos` (
  `id_pos` int(11) NOT NULL,
  `tempat_id` int(11) DEFAULT NULL,
  `nm_pos` varchar(25) DEFAULT NULL,
  `lokasi_pos` text DEFAULT NULL,
  `deskripsi_pos` text DEFAULT NULL,
  `waktu` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pa_pos`
--

INSERT INTO `pa_pos` (`id_pos`, `tempat_id`, `nm_pos`, `lokasi_pos`, `deskripsi_pos`, `waktu`) VALUES
(1, 1, 'POS 1', 'deket langit-langit', 'Miniatur pionering', 2400),
(2, 1, 'POS 2', 'deket longan', 'pengerahuan kepramukaan dan pengetahuan umum', 1800),
(3, 1, 'POS 3A', '-', 'Morse', 900),
(4, 1, 'POS 4', 'deket jendela', 'Menaksir tinggi', 900),
(5, 1, 'POS 5', 'deket kursi', 'Ketangkasan (jumparingan)', 900),
(6, 2, 'POS 1', 'sebelah kanan jalan', 'Miniatur pionering', 2400),
(7, 2, 'POS 2', 'persimpangan jalan', 'pengerahuan kepramukaan dan pengetahuan umum', 1800),
(8, 2, 'POS 3A', 'pertigaan jalan', 'Morse', 900),
(9, 2, 'POS 4', 'perenaman jalan', 'Menaksir tinggi', 900),
(10, 2, 'POS 5', 'di ujung jalan', 'Ketangkasan (jumparingan)', 900),
(14, 5, 'POS 1', '-', 'Minatur Pionering', 2400),
(15, 5, 'POS 2', '-', 'PUPK', 1800),
(16, 5, 'POS 3A', '-', 'Morse', 900),
(17, 1, 'POS 3B', '-', 'Semaphore', 900),
(18, 2, 'POS 3B', '-', 'Semaphore', 900),
(19, 5, 'POS 3B', '-', 'Semaphore', 900),
(20, 1, 'POS 3C', '-', 'Tali-temali', 600),
(21, 2, 'POS 3C', '-', 'Tali-temali', 600),
(22, 5, 'POS 3C', '-', 'Tali-temali', 600),
(23, 5, 'POS 4', '-', 'Menaksir tinggi', 900),
(24, 5, 'POS 5', '-', 'Ketangkasan', 900);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pa_quiz_jawaban`
--

CREATE TABLE `pa_quiz_jawaban` (
  `id_quizjawaban` int(11) NOT NULL,
  `pos_id` int(11) DEFAULT NULL,
  `quizsoal_id` varchar(30) DEFAULT NULL,
  `quizpilihan_id` int(11) DEFAULT NULL,
  `kode_jawaban` varchar(10) NOT NULL,
  `jenis_jawaban` enum('esai','pilgan') DEFAULT NULL,
  `jawaban` text DEFAULT NULL,
  `siswa_id` int(11) DEFAULT NULL,
  `is_jawaban_benar` enum('1','0') DEFAULT NULL,
  `submited_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pa_quiz_jawaban`
--

INSERT INTO `pa_quiz_jawaban` (`id_quizjawaban`, `pos_id`, `quizsoal_id`, `quizpilihan_id`, `kode_jawaban`, `jenis_jawaban`, `jawaban`, `siswa_id`, `is_jawaban_benar`, `submited_at`) VALUES
(228, 1, 'QZ143538', 123, 'PA-RNEW28R', 'esai', 'ya gtu bor', 13, '1', '2021-08-28 17:23:28'),
(229, 1, 'QZ411725', 129, 'PA-RNEW28R', 'esai', 'eeh iya', 13, '1', '2021-08-28 17:23:28'),
(230, 1, 'QZ897612', 126, 'PA-RNEW28R', 'esai', 'huehue', 13, '1', '2021-08-28 17:23:28'),
(231, 2, 'QZ403086', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(232, 2, 'QZ464509', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(233, 2, 'QZ242475', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(234, 2, 'QZ878651', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(235, 2, 'QZ956415', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(236, 2, 'QZ144579', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(237, 2, 'QZ784235', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(238, 2, 'QZ114958', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(239, 2, 'QZ712885', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(240, 2, 'QZ316548', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(241, 2, 'QZ112179', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(242, 2, 'QZ129648', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(243, 2, 'QZ178800', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(244, 2, 'QZ847530', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(245, 2, 'QZ183728', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(246, 2, 'QZ142824', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(247, 2, 'QZ202343', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(248, 2, 'QZ728352', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(249, 2, 'QZ105848', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(250, 2, 'QZ123247', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(251, 2, 'QZ146509', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(252, 2, 'QZ205245', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(253, 2, 'QZ149915', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(254, 2, 'QZ226110', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(255, 2, 'QZ918679', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(256, 2, 'QZ103531', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(257, 2, 'QZ399346', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(258, 2, 'QZ837279', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(259, 2, 'QZ153074', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(260, 2, 'QZ132402', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(261, 2, 'QZ135475', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(262, 2, 'QZ341946', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(263, 2, 'QZ207398', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(264, 2, 'QZ102742', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(265, 2, 'QZ335062', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(266, 2, 'QZ187530', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(267, 2, 'QZ210601', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(268, 2, 'QZ848582', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(269, 2, 'QZ496554', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(270, 2, 'QZ138362', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(271, 2, 'QZ187233', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(272, 2, 'QZ158124', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(273, 2, 'QZ945590', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(274, 2, 'QZ139457', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(275, 2, 'QZ134573', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(276, 2, 'QZ776422', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(277, 2, 'QZ154045', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(278, 2, 'QZ406132', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(279, 2, 'QZ617946', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(280, 2, 'QZ199485', 0, 'PA-KR4HMAH', 'pilgan', 'tidak terjawab', 13, '0', '2021-08-28 17:23:52'),
(281, 5, 'QZ808955', 735, 'PA-HXNOFKG', 'esai', '40', 13, '1', '2021-08-28 17:25:06'),
(282, 5, 'QZ808955', 735, 'PA-HXNOFKG', 'esai', '2001', 7, '1', '2021-08-28 17:27:01'),
(283, 1, 'QZ897612', 126, 'PA-RNEW28R', 'esai', 'tidak terjawab', 7, '1', '2021-08-28 17:27:35'),
(284, 1, 'QZ411725', 129, 'PA-RNEW28R', 'esai', 'tidak terjawab', 7, '1', '2021-08-28 17:27:35'),
(285, 1, 'QZ143538', 123, 'PA-RNEW28R', 'esai', 'tidak terjawab', 7, '1', '2021-08-28 17:27:35'),
(286, 3, 'QZ111571', 738, 'PA-O6WW8Z0', 'esai', 'sudah', 7, '1', '2021-08-29 04:46:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pa_quiz_pilihan`
--

CREATE TABLE `pa_quiz_pilihan` (
  `id_quizpilihan` int(11) NOT NULL,
  `quizsoal_id` varchar(30) DEFAULT NULL,
  `pilihan` text DEFAULT NULL,
  `is_pilihan_benar` enum('1','0') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pa_quiz_pilihan`
--

INSERT INTO `pa_quiz_pilihan` (`id_quizpilihan`, `quizsoal_id`, `pilihan`, `is_pilihan_benar`) VALUES
(123, 'QZ143538', 'jawaban sesuai panitia', '1'),
(124, 'QZ160883', 'jawaban sesuai panitia', '1'),
(125, 'QZ740949', 'jawaban sesuai panitia', '1'),
(126, 'QZ897612', 'jawaban sesuai on spot. panitia', '1'),
(127, 'QZ735678', 'jawaban sesuai on spot. panitia', '1'),
(128, 'QZ173396', 'jawaban sesuai on spot. panitia', '1'),
(129, 'QZ411725', 'sesuai panduan pada on-spot panitia', '1'),
(130, 'QZ115779', 'sesuai panduan pada on-spot panitia', '1'),
(131, 'QZ151070', 'sesuai panduan pada on-spot panitia', '1'),
(132, 'QZ918679', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(133, 'QZ918679', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(134, 'QZ918679', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(135, 'QZ918679', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(136, 'QZ187483', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(137, 'QZ187483', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(138, 'QZ187483', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(139, 'QZ187483', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(140, 'QZ145512', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(141, 'QZ145512', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(142, 'QZ145512', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(143, 'QZ145512', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(144, 'QZ187530', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(145, 'QZ187530', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(146, 'QZ187530', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(147, 'QZ187530', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(148, 'QZ640200', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(149, 'QZ640200', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(150, 'QZ640200', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(151, 'QZ640200', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(152, 'QZ114294', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(153, 'QZ114294', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(154, 'QZ114294', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(155, 'QZ114294', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(156, 'QZ202343', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(157, 'QZ202343', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(158, 'QZ202343', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(159, 'QZ202343', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(160, 'QZ176677', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(161, 'QZ176677', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(162, 'QZ176677', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(163, 'QZ176677', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(164, 'QZ892483', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(165, 'QZ892483', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(166, 'QZ892483', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(167, 'QZ892483', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(168, 'QZ154045', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(169, 'QZ154045', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(170, 'QZ154045', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(171, 'QZ154045', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(172, 'QZ139785', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(173, 'QZ139785', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(174, 'QZ139785', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(175, 'QZ139785', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(176, 'QZ764949', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(177, 'QZ764949', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(178, 'QZ764949', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(179, 'QZ764949', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(180, 'QZ129648', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(181, 'QZ129648', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(182, 'QZ129648', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(183, 'QZ129648', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(184, 'QZ176571', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(185, 'QZ176571', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(186, 'QZ176571', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(187, 'QZ176571', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(188, 'QZ540268', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(189, 'QZ540268', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(190, 'QZ540268', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(191, 'QZ540268', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(192, 'QZ316548', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(193, 'QZ316548', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(194, 'QZ316548', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(195, 'QZ316548', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(196, 'QZ105182', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(197, 'QZ105182', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(198, 'QZ105182', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(199, 'QZ105182', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(200, 'QZ160582', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(201, 'QZ160582', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(202, 'QZ160582', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(203, 'QZ160582', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(204, 'QZ728352', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(205, 'QZ728352', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(206, 'QZ728352', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(207, 'QZ728352', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(208, 'QZ186261', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(209, 'QZ186261', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(210, 'QZ186261', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(211, 'QZ186261', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(212, 'QZ247312', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(213, 'QZ247312', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(214, 'QZ247312', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(215, 'QZ247312', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(216, 'QZ341946', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(217, 'QZ341946', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(218, 'QZ341946', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(219, 'QZ341946', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(220, 'QZ177533', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(221, 'QZ177533', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(222, 'QZ177533', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(223, 'QZ177533', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(224, 'QZ187080', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(225, 'QZ187080', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(226, 'QZ187080', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(227, 'QZ187080', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(228, 'QZ114958', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(229, 'QZ114958', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(230, 'QZ114958', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(231, 'QZ114958', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(232, 'QZ120286', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(233, 'QZ120286', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(234, 'QZ120286', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(235, 'QZ120286', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(236, 'QZ927003', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(237, 'QZ927003', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(238, 'QZ927003', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(239, 'QZ927003', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(240, 'QZ205245', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(241, 'QZ205245', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(242, 'QZ205245', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(243, 'QZ205245', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(244, 'QZ211226', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(245, 'QZ211226', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(246, 'QZ211226', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(247, 'QZ211226', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(248, 'QZ114227', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(249, 'QZ114227', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(250, 'QZ114227', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(251, 'QZ114227', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(252, 'QZ406132', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(253, 'QZ406132', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(254, 'QZ406132', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(255, 'QZ406132', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(256, 'QZ229741', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(257, 'QZ229741', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(258, 'QZ229741', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(259, 'QZ229741', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(260, 'QZ137431', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(261, 'QZ137431', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(262, 'QZ137431', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(263, 'QZ137431', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(264, 'QZ210601', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(265, 'QZ210601', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(266, 'QZ210601', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(267, 'QZ210601', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(268, 'QZ962366', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(269, 'QZ962366', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(270, 'QZ962366', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(271, 'QZ962366', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(272, 'QZ178596', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(273, 'QZ178596', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(274, 'QZ178596', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(275, 'QZ178596', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(276, 'QZ848582', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(277, 'QZ848582', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(278, 'QZ848582', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(279, 'QZ848582', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(280, 'QZ901508', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(281, 'QZ901508', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(282, 'QZ901508', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(283, 'QZ901508', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(284, 'QZ399218', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(285, 'QZ399218', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(286, 'QZ399218', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(287, 'QZ399218', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(288, 'QZ149915', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(289, 'QZ149915', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(290, 'QZ149915', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(291, 'QZ149915', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(292, 'QZ883270', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(293, 'QZ883270', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(294, 'QZ883270', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(295, 'QZ883270', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(296, 'QZ339547', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(297, 'QZ339547', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(298, 'QZ339547', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(299, 'QZ339547', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(300, 'QZ847530', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(301, 'QZ847530', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(302, 'QZ847530', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(303, 'QZ847530', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(304, 'QZ104436', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(305, 'QZ104436', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(306, 'QZ104436', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(307, 'QZ104436', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(308, 'QZ184859', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(309, 'QZ184859', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(310, 'QZ184859', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(311, 'QZ184859', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(312, 'QZ464509', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(313, 'QZ464509', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(314, 'QZ464509', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(315, 'QZ464509', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(316, 'QZ612581', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(317, 'QZ612581', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(318, 'QZ612581', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(319, 'QZ612581', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(320, 'QZ166992', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(321, 'QZ166992', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(322, 'QZ166992', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(323, 'QZ166992', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(324, 'QZ135475', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(325, 'QZ135475', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(326, 'QZ135475', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(327, 'QZ135475', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(328, 'QZ563774', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(329, 'QZ563774', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(330, 'QZ563774', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(331, 'QZ563774', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(332, 'QZ202730', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(333, 'QZ202730', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(334, 'QZ202730', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(335, 'QZ202730', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(336, 'QZ784235', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(337, 'QZ784235', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(338, 'QZ784235', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(339, 'QZ784235', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(340, 'QZ177595', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(341, 'QZ177595', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(342, 'QZ177595', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(343, 'QZ177595', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(344, 'QZ107733', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(345, 'QZ107733', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(346, 'QZ107733', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(347, 'QZ107733', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(348, 'QZ945590', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(349, 'QZ945590', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(350, 'QZ945590', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(351, 'QZ945590', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(352, 'QZ127982', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(353, 'QZ127982', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(354, 'QZ127982', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(355, 'QZ127982', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(356, 'QZ178048', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(357, 'QZ178048', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(358, 'QZ178048', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(359, 'QZ178048', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(360, 'QZ226110', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(361, 'QZ226110', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(362, 'QZ226110', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(363, 'QZ226110', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(364, 'QZ954737', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(365, 'QZ954737', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(366, 'QZ954737', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(367, 'QZ954737', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(368, 'QZ110147', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(369, 'QZ110147', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(370, 'QZ110147', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(371, 'QZ110147', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(372, 'QZ956415', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(373, 'QZ956415', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(374, 'QZ956415', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(375, 'QZ956415', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(376, 'QZ206123', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(377, 'QZ206123', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(378, 'QZ206123', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(379, 'QZ206123', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(380, 'QZ118097', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(381, 'QZ118097', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(382, 'QZ118097', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(383, 'QZ118097', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(384, 'QZ837279', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(385, 'QZ837279', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(386, 'QZ837279', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(387, 'QZ837279', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(388, 'QZ560744', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(389, 'QZ560744', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(390, 'QZ560744', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(391, 'QZ560744', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(392, 'QZ118664', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(393, 'QZ118664', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(394, 'QZ118664', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(395, 'QZ118664', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(396, 'QZ112179', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(397, 'QZ112179', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(398, 'QZ112179', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(399, 'QZ112179', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(400, 'QZ178944', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(401, 'QZ178944', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(402, 'QZ178944', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(403, 'QZ178944', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(404, 'QZ189495', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(405, 'QZ189495', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(406, 'QZ189495', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(407, 'QZ189495', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(408, 'QZ878651', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(409, 'QZ878651', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(410, 'QZ878651', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(411, 'QZ878651', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(412, 'QZ162664', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(413, 'QZ162664', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(414, 'QZ162664', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(415, 'QZ162664', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(416, 'QZ191232', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(417, 'QZ191232', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(418, 'QZ191232', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(419, 'QZ191232', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(420, 'QZ187233', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(421, 'QZ187233', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(422, 'QZ187233', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(423, 'QZ187233', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(424, 'QZ715181', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(425, 'QZ715181', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(426, 'QZ715181', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(427, 'QZ715181', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(428, 'QZ113167', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(429, 'QZ113167', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(430, 'QZ113167', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(431, 'QZ113167', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(432, 'QZ335062', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(433, 'QZ335062', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(434, 'QZ335062', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(435, 'QZ335062', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(436, 'QZ169287', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(437, 'QZ169287', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(438, 'QZ169287', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(439, 'QZ169287', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(440, 'QZ136629', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(441, 'QZ136629', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(442, 'QZ136629', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(443, 'QZ136629', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(444, 'QZ123247', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(445, 'QZ123247', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(446, 'QZ123247', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(447, 'QZ123247', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(448, 'QZ765460', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(449, 'QZ765460', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(450, 'QZ765460', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(451, 'QZ765460', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(452, 'QZ108435', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(453, 'QZ108435', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(454, 'QZ108435', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(455, 'QZ108435', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(456, 'QZ158124', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(457, 'QZ158124', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(458, 'QZ158124', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(459, 'QZ158124', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(460, 'QZ113918', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(461, 'QZ113918', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(462, 'QZ113918', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(463, 'QZ113918', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(464, 'QZ937198', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(465, 'QZ937198', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(466, 'QZ937198', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(467, 'QZ937198', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(468, 'QZ242475', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(469, 'QZ242475', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(470, 'QZ242475', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(471, 'QZ242475', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(472, 'QZ186552', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(473, 'QZ186552', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(474, 'QZ186552', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(475, 'QZ186552', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(476, 'QZ108865', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(477, 'QZ108865', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(478, 'QZ108865', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(479, 'QZ108865', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(480, 'QZ146509', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(481, 'QZ146509', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(482, 'QZ146509', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(483, 'QZ146509', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(484, 'QZ204297', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(485, 'QZ204297', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(486, 'QZ204297', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(487, 'QZ204297', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(488, 'QZ103976', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(489, 'QZ103976', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(490, 'QZ103976', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(491, 'QZ103976', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(492, 'QZ144579', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(493, 'QZ144579', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(494, 'QZ144579', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(495, 'QZ144579', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(496, 'QZ210953', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(497, 'QZ210953', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(498, 'QZ210953', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(499, 'QZ210953', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(500, 'QZ150203', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(501, 'QZ150203', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(502, 'QZ150203', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(503, 'QZ150203', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(504, 'QZ178800', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(505, 'QZ178800', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(506, 'QZ178800', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(507, 'QZ178800', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(508, 'QZ207971', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(509, 'QZ207971', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(510, 'QZ207971', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(511, 'QZ207971', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(512, 'QZ474172', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(513, 'QZ474172', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(514, 'QZ474172', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(515, 'QZ474172', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(516, 'QZ496554', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(517, 'QZ496554', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(518, 'QZ496554', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(519, 'QZ496554', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(520, 'QZ201884', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(521, 'QZ201884', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(522, 'QZ201884', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(523, 'QZ201884', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(524, 'QZ135399', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(525, 'QZ135399', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(526, 'QZ135399', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(527, 'QZ135399', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(528, 'QZ776422', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(529, 'QZ776422', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(530, 'QZ776422', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(531, 'QZ776422', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(532, 'QZ473104', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(533, 'QZ473104', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(534, 'QZ473104', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(535, 'QZ473104', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(536, 'QZ164204', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(537, 'QZ164204', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(538, 'QZ164204', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(539, 'QZ164204', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(540, 'QZ199485', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(541, 'QZ199485', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(542, 'QZ199485', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(543, 'QZ199485', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(544, 'QZ412329', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(545, 'QZ412329', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(546, 'QZ412329', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(547, 'QZ412329', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(548, 'QZ190288', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(549, 'QZ190288', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(550, 'QZ190288', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(551, 'QZ190288', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(552, 'QZ103531', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(553, 'QZ103531', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(554, 'QZ103531', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(555, 'QZ103531', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(556, 'QZ210778', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(557, 'QZ210778', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(558, 'QZ210778', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(559, 'QZ210778', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(560, 'QZ152163', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(561, 'QZ152163', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(562, 'QZ152163', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(563, 'QZ152163', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(564, 'QZ102742', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(565, 'QZ102742', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(566, 'QZ102742', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(567, 'QZ102742', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(568, 'QZ168778', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(569, 'QZ168778', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(570, 'QZ168778', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(571, 'QZ168778', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(572, 'QZ382090', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(573, 'QZ382090', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(574, 'QZ382090', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(575, 'QZ382090', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(576, 'QZ617946', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(577, 'QZ617946', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(578, 'QZ617946', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(579, 'QZ617946', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(580, 'QZ760835', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(581, 'QZ760835', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(582, 'QZ760835', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(583, 'QZ760835', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(584, 'QZ100809', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(585, 'QZ100809', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(586, 'QZ100809', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(587, 'QZ100809', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(588, 'QZ142824', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(589, 'QZ142824', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(590, 'QZ142824', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(591, 'QZ142824', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(592, 'QZ595444', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(593, 'QZ595444', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(594, 'QZ595444', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(595, 'QZ595444', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(596, 'QZ179202', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(597, 'QZ179202', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(598, 'QZ179202', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(599, 'QZ179202', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(600, 'QZ399346', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(601, 'QZ399346', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(602, 'QZ399346', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(603, 'QZ399346', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(604, 'QZ142314', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(605, 'QZ142314', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(606, 'QZ142314', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(607, 'QZ142314', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(608, 'QZ142093', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(609, 'QZ142093', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(610, 'QZ142093', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(611, 'QZ142093', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(612, 'QZ183728', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(613, 'QZ183728', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(614, 'QZ183728', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(615, 'QZ183728', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(616, 'QZ188560', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(617, 'QZ188560', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(618, 'QZ188560', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(619, 'QZ188560', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(620, 'QZ197771', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(621, 'QZ197771', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(622, 'QZ197771', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(623, 'QZ197771', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(624, 'QZ105848', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(625, 'QZ105848', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(626, 'QZ105848', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(627, 'QZ105848', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(628, 'QZ209870', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(629, 'QZ209870', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(630, 'QZ209870', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(631, 'QZ209870', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(632, 'QZ101677', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(633, 'QZ101677', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(634, 'QZ101677', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(635, 'QZ101677', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(636, 'QZ139457', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(637, 'QZ139457', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(638, 'QZ139457', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(639, 'QZ139457', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(640, 'QZ170183', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(641, 'QZ170183', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(642, 'QZ170183', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(643, 'QZ170183', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(644, 'QZ101973', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(645, 'QZ101973', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(646, 'QZ101973', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(647, 'QZ101973', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(648, 'QZ712885', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(649, 'QZ712885', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(650, 'QZ712885', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(651, 'QZ712885', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(652, 'QZ211984', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(653, 'QZ211984', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(654, 'QZ211984', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(655, 'QZ211984', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(656, 'QZ541548', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(657, 'QZ541548', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(658, 'QZ541548', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(659, 'QZ541548', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(660, 'QZ132402', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(661, 'QZ132402', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(662, 'QZ132402', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(663, 'QZ132402', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(664, 'QZ159398', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(665, 'QZ159398', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(666, 'QZ159398', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(667, 'QZ159398', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(668, 'QZ139558', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(669, 'QZ139558', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(670, 'QZ139558', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(671, 'QZ139558', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(672, 'QZ153074', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(673, 'QZ153074', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(674, 'QZ153074', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(675, 'QZ153074', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(676, 'QZ637139', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(677, 'QZ637139', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(678, 'QZ637139', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(679, 'QZ637139', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(680, 'QZ144211', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(681, 'QZ144211', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(682, 'QZ144211', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(683, 'QZ144211', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(684, 'QZ403086', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(685, 'QZ403086', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(686, 'QZ403086', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(687, 'QZ403086', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(688, 'QZ165888', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(689, 'QZ165888', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(690, 'QZ165888', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(691, 'QZ165888', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(692, 'QZ573497', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(693, 'QZ573497', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(694, 'QZ573497', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(695, 'QZ573497', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(696, 'QZ138362', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(697, 'QZ138362', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(698, 'QZ138362', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(699, 'QZ138362', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(700, 'QZ207409', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(701, 'QZ207409', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(702, 'QZ207409', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(703, 'QZ207409', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(704, 'QZ197743', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(705, 'QZ197743', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(706, 'QZ197743', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(707, 'QZ197743', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(708, 'QZ207398', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(709, 'QZ207398', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(710, 'QZ207398', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(711, 'QZ207398', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(712, 'QZ206160', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(713, 'QZ206160', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(714, 'QZ206160', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(715, 'QZ206160', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(716, 'QZ348579', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(717, 'QZ348579', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(718, 'QZ348579', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(719, 'QZ348579', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(720, 'QZ134573', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(721, 'QZ134573', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(722, 'QZ134573', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(723, 'QZ134573', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(724, 'QZ199057', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(725, 'QZ199057', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(726, 'QZ199057', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(727, 'QZ199057', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(728, 'QZ112003', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(729, 'QZ112003', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(730, 'QZ112003', 'contoh iput opsi yang b aja loh sob ih gimana dah', '1'),
(731, 'QZ112003', 'contoh iput opsi yang b aja loh sob ih gimana dah', '0'),
(735, 'QZ808955', '60', '1'),
(736, 'QZ642080', '60', '1'),
(737, 'QZ200321', '60', '1'),
(738, 'QZ111571', 'sudah', '1'),
(739, 'QZ111571', 'belum', '0'),
(740, 'QZ144563', 'sudah', '1'),
(741, 'QZ144563', 'belum', '0'),
(742, 'QZ194476', 'sudah', '1'),
(743, 'QZ194476', 'belum', '0'),
(744, 'QZ327861', 'Boden Powell', '1'),
(745, 'QZ327861', 'Badan pawal', '0'),
(746, 'QZ327861', 'I.R Soekarno', '0'),
(747, 'QZ327861', 'Jenderal Soedirman', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pa_quiz_soal`
--

CREATE TABLE `pa_quiz_soal` (
  `id_quizsoal` varchar(30) NOT NULL,
  `pos_id` int(11) DEFAULT NULL,
  `kode` varchar(10) DEFAULT NULL,
  `soal` text DEFAULT NULL,
  `jenis` enum('pilgan','esai') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `img_path` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pa_quiz_soal`
--

INSERT INTO `pa_quiz_soal` (`id_quizsoal`, `pos_id`, `kode`, `soal`, `jenis`, `created_at`, `img_path`) VALUES
('QZ100809', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ101677', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ101973', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:46', ''),
('QZ102742', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ103531', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ103976', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ104436', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ105182', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ105848', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ107733', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ108435', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ108865', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ110147', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ111571', 3, 'PA-O6WW8Z0', '<p>contoh pilgan sudah ya?</p>', 'esai', '2021-08-29 04:41:31', ''),
('QZ112003', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:46', ''),
('QZ112179', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ113167', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ113918', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ114227', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ114294', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:44', ''),
('QZ114958', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ115779', 6, 'PA-RNEW28R', '<p>silakan gunakan tali-temali untuk membentuk ...</p>', 'esai', '2021-08-26 16:30:18', ''),
('QZ118097', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ118664', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ120286', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ123247', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ127982', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ129648', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah&nbsp;</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ132402', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:46', ''),
('QZ134573', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:46', ''),
('QZ135399', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ135475', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ136629', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ137431', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ138362', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:46', ''),
('QZ139457', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ139558', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:46', ''),
('QZ139785', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ142093', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ142314', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ142824', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ143538', 1, 'PA-RNEW28R', 'silakan tebak sandi morse yang anda ketahui ...', 'esai', '2021-08-26 16:30:18', ''),
('QZ144211', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:46', ''),
('QZ144563', 8, 'PA-O6WW8Z0', '<p>contoh pilgan sudah ya?</p>', 'esai', '2021-08-29 04:41:37', ''),
('QZ144579', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ145512', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:44', ''),
('QZ146509', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ149915', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ150203', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ151070', 14, 'PA-RNEW28R', '<p>silakan gunakan tali-temali untuk membentuk ...</p>', 'esai', '2021-08-26 16:30:18', ''),
('QZ152163', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ153074', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:46', ''),
('QZ154045', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:44', ''),
('QZ158124', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ159398', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:46', ''),
('QZ160582', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ160883', 6, 'PA-RNEW28R', 'silakan tebak sandi morse yang anda ketahui ...', 'esai', '2021-08-26 16:30:18', ''),
('QZ162664', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ164204', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ165888', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:46', ''),
('QZ166992', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ168778', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ169287', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ170183', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ173396', 14, 'PA-RNEW28R', '<p>silakan tebak tinggi tiang di hadapan anda...&nbsp;&nbsp;&nbsp;&nbsp;</p>', 'esai', '2021-08-26 16:30:18', ''),
('QZ176571', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah&nbsp;</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ176677', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:44', ''),
('QZ177533', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ177595', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ178048', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ178596', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ178800', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ178944', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ179202', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ183728', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ184859', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ186261', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ186552', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ187080', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ187233', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ187483', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:44', ''),
('QZ187530', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:44', ''),
('QZ188560', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ189495', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ190288', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ191232', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ194476', 16, 'PA-O6WW8Z0', '<p>contoh pilgan sudah ya?</p>', 'esai', '2021-08-29 04:41:41', ''),
('QZ197743', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:46', ''),
('QZ197771', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ199057', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:46', ''),
('QZ199485', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ200321', 24, 'PA-HXNOFKG', '<p>Silakan input point yang kaka dapat...</p>', 'esai', '2021-08-28 17:24:44', ''),
('QZ201884', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ202343', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:44', ''),
('QZ202730', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ204297', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ205245', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ206123', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ206160', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:46', ''),
('QZ207398', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:46', ''),
('QZ207409', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:46', ''),
('QZ207971', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ209870', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ210601', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ210778', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ210953', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ211226', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ211984', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:46', ''),
('QZ226110', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ229741', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ242475', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ247312', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ316548', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ327861', 17, 'PA-NP9IVK0', '<p>Siapakah bapak pramuka dunia?</p>', 'pilgan', '2021-12-20 20:19:34', ''),
('QZ335062', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ339547', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ341946', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ348579', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:46', ''),
('QZ382090', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ399218', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ399346', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ403086', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:46', ''),
('QZ406132', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ411725', 1, 'PA-RNEW28R', '<p>silakan gunakan tali-temali untuk membentuk ...</p>', 'esai', '2021-08-26 16:30:18', ''),
('QZ412329', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ464509', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ473104', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ474172', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ496554', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ540268', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah&nbsp;</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ541548', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:46', ''),
('QZ560744', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ563774', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ573497', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:46', ''),
('QZ595444', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ612581', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ617946', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ637139', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:46', ''),
('QZ640200', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:44', ''),
('QZ642080', 10, 'PA-HXNOFKG', '<p>Silakan input point yang kaka dapat...</p>', 'esai', '2021-08-28 17:24:44', ''),
('QZ712885', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:46', ''),
('QZ715181', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ728352', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ735678', 6, 'PA-RNEW28R', '<p>silakan tebak tinggi tiang di hadapan anda...&nbsp;&nbsp;&nbsp;&nbsp;</p>', 'esai', '2021-08-26 16:30:18', ''),
('QZ740949', 14, 'PA-RNEW28R', 'silakan tebak sandi morse yang anda ketahui ...', 'esai', '2021-08-26 16:30:18', ''),
('QZ760835', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ764949', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ765460', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ776422', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ784235', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ808955', 5, 'PA-HXNOFKG', '<p>Silakan input point yang kaka dapat...</p>', 'esai', '2021-08-28 17:24:44', ''),
('QZ837279', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ847530', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ848582', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ878651', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ883270', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ892483', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:44', ''),
('QZ897612', 1, 'PA-RNEW28R', '<p>silakan tebak tinggi tiang di hadapan anda...&nbsp;&nbsp;&nbsp;&nbsp;</p>', 'esai', '2021-08-26 16:30:18', ''),
('QZ901508', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ918679', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:44', ''),
('QZ927003', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ937198', 15, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ945590', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ954737', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ956415', 2, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', ''),
('QZ962366', 7, 'PA-KR4HMAH', '<p>contoh soal ini adalah contoh soal yang bener bener contoh soal. tapi kalo contoh soal ya bener-bener contoh soal ya</p><p>yang aduh loh ini bener contoh soal gimane dah</p>', 'pilgan', '2021-08-27 15:30:45', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pa_sekolah`
--

CREATE TABLE `pa_sekolah` (
  `id_sekolah` int(11) NOT NULL,
  `nm_sekolah` varchar(30) DEFAULT NULL,
  `deskripsi_sekolah` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pa_sekolah`
--

INSERT INTO `pa_sekolah` (`id_sekolah`, `nm_sekolah`, `deskripsi_sekolah`) VALUES
(1, 'SMKN 1 Purbalingga', 'pembina = Bpk. Sumardi'),
(2, 'SMAN 1 Purbalingga', 'pembina = Bpk. Sukardi'),
(3, 'SMAN 2 Purbalingga', 'pembina = Bpk. Sakirun'),
(4, 'SMAN 1 Padamara', 'pembina = Ibu. Lilis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pa_siswa`
--

CREATE TABLE `pa_siswa` (
  `id_siswa` int(11) NOT NULL,
  `regu` varchar(30) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `jenkel` enum('laki-laki','perempuan') DEFAULT NULL,
  `sekolah_id` int(11) DEFAULT NULL,
  `is_login` enum('1','0') DEFAULT NULL,
  `skor_regu` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pa_siswa`
--

INSERT INTO `pa_siswa` (`id_siswa`, `regu`, `username`, `password`, `jenkel`, `sekolah_id`, `is_login`, `skor_regu`) VALUES
(1, 'Scorpion', 'Royan Gagas', 'royangagas123', 'laki-laki', 2, '0', 0),
(2, 'Itik', 'Khabib Malik', 'khabib123', 'laki-laki', 1, '0', 0),
(3, 'Garuda', 'Liza Rifan', 'rifan123', 'laki-laki', 1, '0', 0),
(5, 'Teratai', 'Nausica', 'nausica123', 'perempuan', 4, '0', 0),
(7, 'Kanthil', 'Mei', 'mei123', 'perempuan', 3, '1', 0),
(9, 'Makcongcang', 'Mahesa', 'mahesa123', 'laki-laki', 3, '0', 0),
(10, 'SuperVoli', 'ibnu', 'ibnu123', 'laki-laki', 1, '0', 0),
(11, 'Renjana', 'Ragil', 'ragil123', 'laki-laki', 4, '0', 0),
(12, 'Kerbaw', 'Anjas', 'anjas123', 'laki-laki', 2, '0', 0),
(13, 'Kerbaw', 'farhan', 'dluik2cl', 'laki-laki', 2, '1', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pa_skoring`
--

CREATE TABLE `pa_skoring` (
  `id_skor` int(11) NOT NULL,
  `quizjawaban_id` int(11) NOT NULL,
  `skor` float DEFAULT NULL,
  `tipe` enum('manual','otomatis') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pa_skoring`
--

INSERT INTO `pa_skoring` (`id_skor`, `quizjawaban_id`, `skor`, `tipe`, `created_at`) VALUES
(201, 228, 100, 'otomatis', '2021-08-28 17:23:28'),
(202, 229, 100, 'otomatis', '2021-08-28 17:23:28'),
(203, 230, 100, 'otomatis', '2021-08-28 17:23:28'),
(204, 231, 0, 'otomatis', '2021-08-28 17:23:52'),
(205, 232, 0, 'otomatis', '2021-08-28 17:23:52'),
(206, 233, 0, 'otomatis', '2021-08-28 17:23:52'),
(207, 234, 0, 'otomatis', '2021-08-28 17:23:52'),
(208, 235, 0, 'otomatis', '2021-08-28 17:23:52'),
(209, 236, 0, 'otomatis', '2021-08-28 17:23:52'),
(210, 237, 0, 'otomatis', '2021-08-28 17:23:52'),
(211, 238, 0, 'otomatis', '2021-08-28 17:23:52'),
(212, 239, 0, 'otomatis', '2021-08-28 17:23:52'),
(213, 240, 0, 'otomatis', '2021-08-28 17:23:52'),
(214, 241, 0, 'otomatis', '2021-08-28 17:23:52'),
(215, 242, 0, 'otomatis', '2021-08-28 17:23:52'),
(216, 243, 0, 'otomatis', '2021-08-28 17:23:52'),
(217, 244, 0, 'otomatis', '2021-08-28 17:23:52'),
(218, 245, 0, 'otomatis', '2021-08-28 17:23:52'),
(219, 246, 0, 'otomatis', '2021-08-28 17:23:52'),
(220, 247, 0, 'otomatis', '2021-08-28 17:23:52'),
(221, 248, 0, 'otomatis', '2021-08-28 17:23:52'),
(222, 249, 0, 'otomatis', '2021-08-28 17:23:52'),
(223, 250, 0, 'otomatis', '2021-08-28 17:23:52'),
(224, 251, 0, 'otomatis', '2021-08-28 17:23:52'),
(225, 252, 0, 'otomatis', '2021-08-28 17:23:52'),
(226, 253, 0, 'otomatis', '2021-08-28 17:23:52'),
(227, 254, 0, 'otomatis', '2021-08-28 17:23:52'),
(228, 255, 0, 'otomatis', '2021-08-28 17:23:52'),
(229, 256, 0, 'otomatis', '2021-08-28 17:23:52'),
(230, 257, 0, 'otomatis', '2021-08-28 17:23:52'),
(231, 258, 0, 'otomatis', '2021-08-28 17:23:52'),
(232, 259, 0, 'otomatis', '2021-08-28 17:23:52'),
(233, 260, 0, 'otomatis', '2021-08-28 17:23:52'),
(234, 261, 0, 'otomatis', '2021-08-28 17:23:52'),
(235, 262, 0, 'otomatis', '2021-08-28 17:23:52'),
(236, 263, 0, 'otomatis', '2021-08-28 17:23:52'),
(237, 264, 0, 'otomatis', '2021-08-28 17:23:52'),
(238, 265, 0, 'otomatis', '2021-08-28 17:23:52'),
(239, 266, 0, 'otomatis', '2021-08-28 17:23:52'),
(240, 267, 0, 'otomatis', '2021-08-28 17:23:52'),
(241, 268, 0, 'otomatis', '2021-08-28 17:23:52'),
(242, 269, 0, 'otomatis', '2021-08-28 17:23:52'),
(243, 270, 0, 'otomatis', '2021-08-28 17:23:52'),
(244, 271, 0, 'otomatis', '2021-08-28 17:23:52'),
(245, 272, 0, 'otomatis', '2021-08-28 17:23:52'),
(246, 273, 0, 'otomatis', '2021-08-28 17:23:52'),
(247, 274, 0, 'otomatis', '2021-08-28 17:23:52'),
(248, 275, 0, 'otomatis', '2021-08-28 17:23:52'),
(249, 276, 0, 'otomatis', '2021-08-28 17:23:52'),
(250, 277, 0, 'otomatis', '2021-08-28 17:23:52'),
(251, 278, 0, 'otomatis', '2021-08-28 17:23:52'),
(252, 279, 0, 'otomatis', '2021-08-28 17:23:52'),
(253, 280, 0, 'otomatis', '2021-08-28 17:23:52'),
(254, 281, 100, 'otomatis', '2021-08-28 17:25:06'),
(255, 282, 100, 'otomatis', '2021-08-28 17:27:01'),
(256, 283, 100, 'otomatis', '2021-08-28 17:27:35'),
(257, 284, 100, 'otomatis', '2021-08-28 17:27:35'),
(258, 285, 100, 'otomatis', '2021-08-28 17:27:35'),
(259, 286, 2, 'otomatis', '2021-08-29 03:07:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pa_tempat`
--

CREATE TABLE `pa_tempat` (
  `id_tempat` int(11) NOT NULL,
  `nm_tempat` varchar(30) DEFAULT NULL,
  `lokasi_tempat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pa_tempat`
--

INSERT INTO `pa_tempat` (`id_tempat`, `nm_tempat`, `lokasi_tempat`) VALUES
(1, 'SANGGA LANGIT', 'gemuruh, rt xx/rw xx'),
(2, 'WATU KAMBANG', 'selakambang, rt xx/rw xx'),
(5, 'CURUG DHUWUR', 'Bumisari, rt xx/rw xx');

-- --------------------------------------------------------

--
-- Struktur untuk view `pa_papanskor`
--
DROP TABLE IF EXISTS `pa_papanskor`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pa_papanskor`  AS  select `sw`.`username` AS `username`,`s`.`nm_sekolah` AS `nm_sekolah`,`sw`.`regu` AS `regu`,count(distinct `qj`.`kode_jawaban`) AS `pos_selesai`,sum(`sk`.`skor`) AS `total_skor` from (((`pa_quiz_jawaban` `qj` join `pa_siswa` `sw` on(`qj`.`siswa_id` = `sw`.`id_siswa`)) join `pa_sekolah` `s` on(`sw`.`sekolah_id` = `s`.`id_sekolah`)) join `pa_skoring` `sk` on(`qj`.`id_quizjawaban` = `sk`.`quizjawaban_id`)) group by `qj`.`siswa_id` ;

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
  ADD PRIMARY KEY (`id_quizjawaban`),
  ADD KEY `FK_quizsoalid2` (`quizsoal_id`);

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
-- Indeks untuk tabel `pa_skoring`
--
ALTER TABLE `pa_skoring`
  ADD PRIMARY KEY (`id_skor`),
  ADD KEY `FK_quizjawaban` (`quizjawaban_id`);

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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pa_notif`
--
ALTER TABLE `pa_notif`
  MODIFY `id_notif` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pa_pos`
--
ALTER TABLE `pa_pos`
  MODIFY `id_pos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `pa_quiz_jawaban`
--
ALTER TABLE `pa_quiz_jawaban`
  MODIFY `id_quizjawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=287;

--
-- AUTO_INCREMENT untuk tabel `pa_quiz_pilihan`
--
ALTER TABLE `pa_quiz_pilihan`
  MODIFY `id_quizpilihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=748;

--
-- AUTO_INCREMENT untuk tabel `pa_sekolah`
--
ALTER TABLE `pa_sekolah`
  MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pa_siswa`
--
ALTER TABLE `pa_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pa_skoring`
--
ALTER TABLE `pa_skoring`
  MODIFY `id_skor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=260;

--
-- AUTO_INCREMENT untuk tabel `pa_tempat`
--
ALTER TABLE `pa_tempat`
  MODIFY `id_tempat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pa_pos`
--
ALTER TABLE `pa_pos`
  ADD CONSTRAINT `FK_tempatid` FOREIGN KEY (`tempat_id`) REFERENCES `pa_tempat` (`id_tempat`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pa_quiz_jawaban`
--
ALTER TABLE `pa_quiz_jawaban`
  ADD CONSTRAINT `FK_quizsoalid2` FOREIGN KEY (`quizsoal_id`) REFERENCES `pa_quiz_soal` (`id_quizsoal`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pa_quiz_pilihan`
--
ALTER TABLE `pa_quiz_pilihan`
  ADD CONSTRAINT `FK_quizsoalid` FOREIGN KEY (`quizsoal_id`) REFERENCES `pa_quiz_soal` (`id_quizsoal`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pa_quiz_soal`
--
ALTER TABLE `pa_quiz_soal`
  ADD CONSTRAINT `FK_posid` FOREIGN KEY (`pos_id`) REFERENCES `pa_pos` (`id_pos`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pa_siswa`
--
ALTER TABLE `pa_siswa`
  ADD CONSTRAINT `FK_sekolahid` FOREIGN KEY (`sekolah_id`) REFERENCES `pa_sekolah` (`id_sekolah`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pa_skoring`
--
ALTER TABLE `pa_skoring`
  ADD CONSTRAINT `FK_quizjawaban` FOREIGN KEY (`quizjawaban_id`) REFERENCES `pa_quiz_jawaban` (`id_quizjawaban`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
