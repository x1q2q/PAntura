-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jul 2021 pada 12.10
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
(1, 1, 'POS A', 'deket langit-langit', 'Miniatur pionering', 1800),
(2, 1, 'POS B', 'deket longan', 'pengerahuan kepramukaan dan pengetahuan umum', 4800),
(3, 1, 'POS C', 'dekete amben', 'Tali-temali, morse dan semaphore', 2400),
(4, 1, 'POS D', 'deket jendela', 'Menaksir tinggi', 2400),
(5, 1, 'POS E', 'deket kursi', 'Ketangkasan (jumparingan)', 1800),
(6, 2, 'POS A', 'sebelah kanan jalan', 'Miniatur pionering', 1800),
(7, 2, 'POS B', 'persimpangan jalan', 'pengerahuan kepramukaan dan pengetahuan umum', 4800),
(8, 2, 'POS C', 'pertigaan jalan', 'Tali-temali, morse dan semaphore', 2400),
(9, 2, 'POS D', 'perenaman jalan', 'Menaksir tinggi', 2400),
(10, 2, 'POS E', 'di ujung jalan', 'Ketangkasan (jumparingan)', 1800);

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
(64, 3, 'QZ140251', 98, 'PA-TEF7LEU', 'esai', 'ya sudah benar', 7, '1', '2021-07-29 08:13:19'),
(65, 3, 'QZ113098', 102, 'PA-TEF7LEU', 'esai', 'ya benar itu ', 7, '1', '2021-07-29 08:13:19'),
(66, 3, 'QZ198665', 100, 'PA-TEF7LEU', 'esai', 'say rasa benar', 7, '1', '2021-07-29 08:13:19'),
(67, 2, 'QZ554438', 21, 'PA-H3S8L2H', 'pilgan', 'Antarmuka', 7, '1', '2021-07-29 08:13:52'),
(68, 2, 'QZ269279', 34, 'PA-H3S8L2H', 'pilgan', 'Gampang Dibobol', 7, '0', '2021-07-29 08:13:52'),
(69, 2, 'QZ174025', 90, 'PA-H3S8L2H', 'pilgan', '1 dan 2', 7, '0', '2021-07-29 08:13:52'),
(70, 2, 'QZ674018', 43, 'PA-H3S8L2H', 'pilgan', 'Design yang flexible', 7, '0', '2021-07-29 08:13:52'),
(71, 2, 'QZ872581', 85, 'PA-H3S8L2H', 'pilgan', 'New Java Package', 7, '0', '2021-07-29 08:13:52'),
(72, 2, 'QZ155610', 68, 'PA-H3S8L2H', 'pilgan', 'Assembly', 7, '1', '2021-07-29 08:13:52'),
(73, 2, 'QZ640249', 53, 'PA-H3S8L2H', 'pilgan', 'Non-document Based', 7, '0', '2021-07-29 08:13:52'),
(74, 2, 'QZ133477', 29, 'PA-H3S8L2H', 'pilgan', 'Layar Program', 7, '0', '2021-07-29 08:13:52'),
(75, 2, 'QZ756344', 61, 'PA-H3S8L2H', 'pilgan', 'Notepad++', 7, '1', '2021-07-29 08:13:52'),
(76, 2, 'QZ191347', 75, 'PA-H3S8L2H', 'pilgan', 'New Project->Java->Java Class Library', 7, '0', '2021-07-29 08:13:52'),
(77, 3, 'QZ140251', 98, 'PA-TEF7LEU', 'esai', 'sudah bener bor', 9, '1', '2021-07-29 16:24:55'),
(78, 3, 'QZ113098', 102, 'PA-TEF7LEU', 'esai', 'iya udah bener bor', 9, '1', '2021-07-29 16:24:55'),
(79, 3, 'QZ198665', 100, 'PA-TEF7LEU', 'esai', 'sesuai juri', 9, '1', '2021-07-29 16:24:55'),
(80, 2, 'QZ554438', 18, 'PA-H3S8L2H', 'pilgan', 'Pemrograman/Coding', 9, '0', '2021-07-29 16:25:44'),
(81, 2, 'QZ269279', 35, 'PA-H3S8L2H', 'pilgan', 'User Friendly', 9, '1', '2021-07-29 16:25:44'),
(82, 2, 'QZ174025', 90, 'PA-H3S8L2H', 'pilgan', '1 dan 2', 9, '0', '2021-07-29 16:25:44'),
(83, 2, 'QZ674018', 43, 'PA-H3S8L2H', 'pilgan', 'Design yang flexible', 9, '0', '2021-07-29 16:25:44'),
(84, 2, 'QZ872581', 83, 'PA-H3S8L2H', 'pilgan', 'New Java Class', 9, '0', '2021-07-29 16:25:44'),
(85, 2, 'QZ155610', 66, 'PA-H3S8L2H', 'pilgan', 'Java', 9, '0', '2021-07-29 16:25:44'),
(86, 2, 'QZ640249', 51, 'PA-H3S8L2H', 'pilgan', 'Graphical User Interface', 9, '1', '2021-07-29 16:25:44'),
(87, 2, 'QZ133477', 28, 'PA-H3S8L2H', 'pilgan', 'Design Program', 9, '0', '2021-07-29 16:25:44'),
(88, 2, 'QZ756344', 60, 'PA-H3S8L2H', 'pilgan', 'Eclipse', 9, '0', '2021-07-29 16:25:44'),
(89, 2, 'QZ191347', 74, 'PA-H3S8L2H', 'pilgan', 'New Project->Java->Java Application', 9, '1', '2021-07-29 16:25:44'),
(90, 1, 'QZ263497', 16, 'PA-BAUWE96', 'esai', 'sudah 12m', 9, '1', '2021-07-29 17:07:43'),
(91, 2, 'QZ554438', 0, 'PA-H3S8L2H', 'pilgan', 'tidak terjawab', 3, '0', '2021-07-30 03:41:19'),
(92, 2, 'QZ269279', 0, 'PA-H3S8L2H', 'pilgan', 'tidak terjawab', 3, '0', '2021-07-30 03:41:19'),
(93, 2, 'QZ174025', 0, 'PA-H3S8L2H', 'pilgan', 'tidak terjawab', 3, '0', '2021-07-30 03:41:19'),
(94, 2, 'QZ674018', 0, 'PA-H3S8L2H', 'pilgan', 'tidak terjawab', 3, '0', '2021-07-30 03:41:19'),
(95, 2, 'QZ872581', 0, 'PA-H3S8L2H', 'pilgan', 'tidak terjawab', 3, '0', '2021-07-30 03:41:19'),
(96, 2, 'QZ155610', 0, 'PA-H3S8L2H', 'pilgan', 'tidak terjawab', 3, '0', '2021-07-30 03:41:19'),
(97, 2, 'QZ640249', 0, 'PA-H3S8L2H', 'pilgan', 'tidak terjawab', 3, '0', '2021-07-30 03:41:19'),
(98, 2, 'QZ133477', 0, 'PA-H3S8L2H', 'pilgan', 'tidak terjawab', 3, '0', '2021-07-30 03:41:19'),
(99, 2, 'QZ756344', 0, 'PA-H3S8L2H', 'pilgan', 'tidak terjawab', 3, '0', '2021-07-30 03:41:19'),
(100, 2, 'QZ191347', 0, 'PA-H3S8L2H', 'pilgan', 'tidak terjawab', 3, '0', '2021-07-30 03:41:19'),
(101, 4, 'QZ946248', 104, 'PA-89196IL', 'esai', 'nemodong bor', 3, '1', '2021-07-30 03:50:51');

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
(16, 'QZ263497', 'jawaban sesuai peserta pada tempat (dibantu juri)', '1'),
(17, 'QZ176691', 'jawaban sesuai peserta pada tempat (dibantu juri)', '1'),
(18, 'QZ554438', 'Pemrograman/Coding', '0'),
(19, 'QZ554438', 'CPU', '0'),
(20, 'QZ554438', 'User Experience', '0'),
(21, 'QZ554438', 'Antarmuka', '1'),
(22, 'QZ600141', 'Pemrograman/Coding', '0'),
(23, 'QZ600141', 'CPU', '0'),
(24, 'QZ600141', 'User Experience', '0'),
(25, 'QZ600141', 'Antarmuka', '1'),
(26, 'QZ133477', 'Design Interface', '1'),
(27, 'QZ133477', 'Design Grafis', '0'),
(28, 'QZ133477', 'Design Program', '0'),
(29, 'QZ133477', 'Layar Program', '0'),
(30, 'QZ170033', 'Design Interface', '1'),
(31, 'QZ170033', 'Design Grafis', '0'),
(32, 'QZ170033', 'Design Program', '0'),
(33, 'QZ170033', 'Layar Program', '0'),
(34, 'QZ269279', 'Gampang Dibobol', '0'),
(35, 'QZ269279', 'User Friendly', '1'),
(36, 'QZ269279', 'Susah Dibuat', '0'),
(37, 'QZ269279', 'Lebih Berfungsi', '0'),
(38, 'QZ787757', 'Gampang Dibobol', '0'),
(39, 'QZ787757', 'User Friendly', '1'),
(40, 'QZ787757', 'Susah Dibuat', '0'),
(41, 'QZ787757', 'Lebih Berfungsi', '0'),
(42, 'QZ674018', 'Kemonotonan', '0'),
(43, 'QZ674018', 'Design yang flexible', '0'),
(44, 'QZ674018', 'Pengguna', '1'),
(45, 'QZ674018', 'Artistik', '0'),
(46, 'QZ166989', 'Kemonotonan', '0'),
(47, 'QZ166989', 'Design yang flexible', '0'),
(48, 'QZ166989', 'Pengguna', '1'),
(49, 'QZ166989', 'Artistik', '0'),
(50, 'QZ640249', 'Layout Utilitas', '0'),
(51, 'QZ640249', 'Graphical User Interface', '1'),
(52, 'QZ640249', 'Text Based', '0'),
(53, 'QZ640249', 'Non-document Based', '0'),
(54, 'QZ146498', 'Layout Utilitas', '0'),
(55, 'QZ146498', 'Graphical User Interface', '1'),
(56, 'QZ146498', 'Text Based', '0'),
(57, 'QZ146498', 'Non-document Based', '0'),
(58, 'QZ756344', 'Netbeans', '0'),
(59, 'QZ756344', 'Visual Studio Code', '0'),
(60, 'QZ756344', 'Eclipse', '0'),
(61, 'QZ756344', 'Notepad++', '1'),
(62, 'QZ143471', 'Netbeans', '0'),
(63, 'QZ143471', 'Visual Studio Code', '0'),
(64, 'QZ143471', 'Eclipse', '0'),
(65, 'QZ143471', 'Notepad++', '1'),
(66, 'QZ155610', 'Java', '0'),
(67, 'QZ155610', 'PHP', '0'),
(68, 'QZ155610', 'Assembly', '1'),
(69, 'QZ155610', 'C/C++', '0'),
(70, 'QZ636345', 'Java', '0'),
(71, 'QZ636345', 'PHP', '0'),
(72, 'QZ636345', 'Assembly', '1'),
(73, 'QZ636345', 'C/C++', '0'),
(74, 'QZ191347', 'New Project->Java->Java Application', '1'),
(75, 'QZ191347', 'New Project->Java->Java Class Library', '0'),
(76, 'QZ191347', 'Open Project->Java->Java Application', '0'),
(77, 'QZ191347', 'New Project->Maven->POM Project', '0'),
(78, 'QZ170065', 'New Project->Java->Java Application', '1'),
(79, 'QZ170065', 'New Project->Java->Java Class Library', '0'),
(80, 'QZ170065', 'Open Project->Java->Java Application', '0'),
(81, 'QZ170065', 'New Project->Maven->POM Project', '0'),
(82, 'QZ872581', 'New Folder', '0'),
(83, 'QZ872581', 'New Java Class', '0'),
(84, 'QZ872581', 'New Jframe Form', '1'),
(85, 'QZ872581', 'New Java Package', '0'),
(86, 'QZ384683', 'New Folder', '0'),
(87, 'QZ384683', 'New Java Class', '0'),
(88, 'QZ384683', 'New Jframe Form', '1'),
(89, 'QZ384683', 'New Java Package', '0'),
(90, 'QZ174025', '1 dan 2', '0'),
(91, 'QZ174025', '2, 3 dan 4', '1'),
(92, 'QZ174025', '2 dan 3', '0'),
(93, 'QZ174025', '1 dan 4', '0'),
(94, 'QZ109443', '1 dan 2', '0'),
(95, 'QZ109443', '2, 3 dan 4', '1'),
(96, 'QZ109443', '2 dan 3', '0'),
(97, 'QZ109443', '1 dan 4', '0'),
(98, 'QZ140251', 'point ditentukan juri di tempat', '1'),
(99, 'QZ836323', 'point ditentukan juri di tempat', '1'),
(100, 'QZ198665', 'jawaban pada juri di tempat', '1'),
(101, 'QZ348018', 'jawaban pada juri di tempat', '1'),
(102, 'QZ113098', 'jawaban pada juri di tempat', '1'),
(103, 'QZ144018', 'jawaban pada juri di tempat', '1'),
(104, 'QZ946248', 'IKAN NEMO', '1'),
(105, 'QZ104677', 'IKAN NEMO', '1');

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
('QZ104677', 9, 'PA-89196IL', '<p><img src=\"nemo.jpg\" style=\"width: 25%;\"></p><p>Jenis ikan apakah di samping?</p>', 'esai', '2021-07-28 22:51:18', 'nemo.jpg'),
('QZ109443', 7, 'PA-H3S8L2H', '<p>Perhatikan contoh komponen palette GUI pada Java Netbeans berikut ini :</p><ol><li>Loader, Switch Button, Combo Box.</li><li>Radio Button, Button, Toggle Button.</li><li>Text Area, Text Field, Text Pane.</li><li>Progress Bar, Check Box, Label</li></ol><p><br></p><p>Manakah dari contoh di atas yang merupakan ada pada palette controller…</p>', 'pilgan', '2021-07-28 22:43:08', ''),
('QZ113098', 3, 'PA-TEF7LEU', '<p>Perhatiikan sandi morse oleh temanmu sendiri...</p>', 'esai', '2021-07-28 22:48:00', ''),
('QZ133477', 2, 'PA-H3S8L2H', '<p>Jendela antara muka yang menghubungkan program dengan pengguna disebut?<br></p>', 'pilgan', '2021-07-28 22:43:08', ''),
('QZ140251', 3, 'PA-TEF7LEU', '<p>Perhatikan semaphore yang dilakukan panitia...</p>', 'esai', '2021-07-28 22:48:00', ''),
('QZ143471', 7, 'PA-H3S8L2H', '<p>Contoh Software/tools yang Biasa digunakan dalam pembuatan program aplikasi berbasis GUI adalah, Kecuali..<br></p>', 'pilgan', '2021-07-28 22:43:08', ''),
('QZ144018', 8, 'PA-TEF7LEU', '<p>Perhatiikan sandi morse oleh temanmu sendiri...</p>', 'esai', '2021-07-28 22:48:00', ''),
('QZ146498', 7, 'PA-H3S8L2H', '<p>Model aplikasi yang cenderung menekankan style dibandingkan dengan fitur aplikasi adalah..<br></p>', 'pilgan', '2021-07-28 22:43:08', ''),
('QZ155610', 2, 'PA-H3S8L2H', '<p>Netbeans merupakan software (IDE) yang biasa digunakan dalam pembuatan program berbasis GUI, berikut adalah bahasa yang bisa digunakan</p><p>dalam software tersebut, kecuali…<br></p>', 'pilgan', '2021-07-28 22:43:08', ''),
('QZ166989', 7, 'PA-H3S8L2H', '<p>Pembuatan desain interface harus dlihat dari berbagai macam aspek salah satunya…<br></p>', 'pilgan', '2021-07-28 22:43:08', ''),
('QZ170033', 7, 'PA-H3S8L2H', '<p>Jendela antara muka yang menghubungkan program dengan pengguna disebut?<br></p>', 'pilgan', '2021-07-28 22:43:08', ''),
('QZ170065', 7, 'PA-H3S8L2H', '<p>Berikut urutan dalam membuat projek program baru pada Netbeans untuk java adalah…<br></p>', 'pilgan', '2021-07-28 22:43:08', ''),
('QZ174025', 2, 'PA-H3S8L2H', '<p>Perhatikan contoh komponen palette GUI pada Java Netbeans berikut ini :</p><ol><li>Loader, Switch Button, Combo Box.</li><li>Radio Button, Button, Toggle Button.</li><li>Text Area, Text Field, Text Pane.</li><li>Progress Bar, Check Box, Label</li></ol><p><br></p><p>Manakah dari contoh di atas yang merupakan ada pada palette controller…</p>', 'pilgan', '2021-07-28 22:43:08', ''),
('QZ176691', 6, 'PA-BAUWE96', '<p>Berapakah tiang yang anda taksir?</p>', 'esai', '2021-07-28 22:34:09', ''),
('QZ191347', 2, 'PA-H3S8L2H', '<p>Berikut urutan dalam membuat projek program baru pada Netbeans untuk java adalah…<br></p>', 'pilgan', '2021-07-28 22:43:08', ''),
('QZ198665', 3, 'PA-TEF7LEU', '<p>Perhatiikan macam tali-temali berikut..</p>', 'esai', '2021-07-28 22:48:00', ''),
('QZ263497', 1, 'PA-BAUWE96', '<p>Berapakah tiang yang anda taksir?</p>', 'esai', '2021-07-28 22:34:09', ''),
('QZ269279', 2, 'PA-H3S8L2H', '<p>Sebuah desain interface yang baik harus membuat sebuah program menjadi…<br></p>', 'pilgan', '2021-07-28 22:43:08', ''),
('QZ348018', 8, 'PA-TEF7LEU', '<p>Perhatiikan macam tali-temali berikut..</p>', 'esai', '2021-07-28 22:48:00', ''),
('QZ384683', 7, 'PA-H3S8L2H', '<p>Opsi Setelah membuat project baru agar bisa menampilkan form design untuk Java GUI pada Netbeans adalah …<br></p>', 'pilgan', '2021-07-28 22:43:08', ''),
('QZ554438', 2, 'PA-H3S8L2H', 'Komunikasi antara pengguna dengan sistem disebut?', 'pilgan', '2021-07-28 22:43:08', ''),
('QZ600141', 7, 'PA-H3S8L2H', 'Komunikasi antara pengguna dengan sistem disebut?', 'pilgan', '2021-07-28 22:43:08', ''),
('QZ636345', 7, 'PA-H3S8L2H', '<p>Netbeans merupakan software (IDE) yang biasa digunakan dalam pembuatan program berbasis GUI, berikut adalah bahasa yang bisa digunakan</p><p>dalam software tersebut, kecuali…<br></p>', 'pilgan', '2021-07-28 22:43:08', ''),
('QZ640249', 2, 'PA-H3S8L2H', '<p>Model aplikasi yang cenderung menekankan style dibandingkan dengan fitur aplikasi adalah..<br></p>', 'pilgan', '2021-07-28 22:43:08', ''),
('QZ674018', 2, 'PA-H3S8L2H', '<p>Pembuatan desain interface harus dlihat dari berbagai macam aspek salah satunya…<br></p>', 'pilgan', '2021-07-28 22:43:08', ''),
('QZ756344', 2, 'PA-H3S8L2H', '<p>Contoh Software/tools yang Biasa digunakan dalam pembuatan program aplikasi berbasis GUI adalah, Kecuali..<br></p>', 'pilgan', '2021-07-28 22:43:08', ''),
('QZ787757', 7, 'PA-H3S8L2H', '<p>Sebuah desain interface yang baik harus membuat sebuah program menjadi…<br></p>', 'pilgan', '2021-07-28 22:43:08', ''),
('QZ836323', 8, 'PA-TEF7LEU', '<p>Perhatikan semaphore yang dilakukan panitia...</p>', 'esai', '2021-07-28 22:48:00', ''),
('QZ872581', 2, 'PA-H3S8L2H', '<p>Opsi Setelah membuat project baru agar bisa menampilkan form design untuk Java GUI pada Netbeans adalah …<br></p>', 'pilgan', '2021-07-28 22:43:08', ''),
('QZ946248', 4, 'PA-89196IL', '<p><img src=\"nemo.jpg\" style=\"width: 25%;\"></p><p>Jenis ikan apakah di samping?</p>', 'esai', '2021-07-28 22:51:18', 'nemo.jpg');

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
(4, 'Barongsai', 'Rafik Bojes', 'rafikbojes', 'laki-laki', 3, '0', 0),
(5, 'Teratai', 'Nausica', 'nausica123', 'perempuan', 4, '0', 0),
(7, 'Kanthil', 'Mei', 'mei123', 'perempuan', 3, '0', 0),
(9, 'Makcongcang', 'Mahesa', 'mahesa123', 'laki-laki', 3, '0', 0);

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
(37, 64, 80, 'manual', '2021-07-30 06:30:31'),
(38, 65, 94, 'manual', '2021-07-30 06:30:31'),
(39, 66, 70, 'manual', '2021-07-30 06:30:31'),
(40, 67, 2, 'otomatis', '2021-07-29 08:13:52'),
(41, 68, 0, 'otomatis', '2021-07-29 08:13:52'),
(42, 69, 0, 'otomatis', '2021-07-29 08:13:52'),
(43, 70, 0, 'otomatis', '2021-07-29 08:13:52'),
(44, 71, 0, 'otomatis', '2021-07-29 08:13:52'),
(45, 72, 2, 'otomatis', '2021-07-29 08:13:52'),
(46, 73, 0, 'otomatis', '2021-07-29 08:13:52'),
(47, 74, 0, 'otomatis', '2021-07-29 08:13:52'),
(48, 75, 2, 'otomatis', '2021-07-29 08:13:52'),
(49, 76, 0, 'otomatis', '2021-07-29 08:13:52'),
(50, 77, 80, 'manual', '2021-07-30 09:22:54'),
(51, 78, 85, 'manual', '2021-07-30 09:22:54'),
(52, 79, 70, 'manual', '2021-07-30 09:22:54'),
(53, 80, 0, 'otomatis', '2021-07-29 16:25:44'),
(54, 81, 2, 'otomatis', '2021-07-29 16:25:44'),
(55, 82, 0, 'otomatis', '2021-07-29 16:25:44'),
(56, 83, 0, 'otomatis', '2021-07-29 16:25:44'),
(57, 84, 0, 'otomatis', '2021-07-29 16:25:44'),
(58, 85, 0, 'otomatis', '2021-07-29 16:25:44'),
(59, 86, 2, 'otomatis', '2021-07-29 16:25:44'),
(60, 87, 0, 'otomatis', '2021-07-29 16:25:44'),
(61, 88, 0, 'otomatis', '2021-07-29 16:25:44'),
(62, 89, 2, 'otomatis', '2021-07-29 16:25:44'),
(63, 90, 100, 'manual', '2021-07-30 09:22:54'),
(64, 91, 0, 'otomatis', '2021-07-30 03:41:19'),
(65, 92, 0, 'otomatis', '2021-07-30 03:41:19'),
(66, 93, 0, 'otomatis', '2021-07-30 03:41:19'),
(67, 94, 0, 'otomatis', '2021-07-30 03:41:19'),
(68, 95, 0, 'otomatis', '2021-07-30 03:41:19'),
(69, 96, 0, 'otomatis', '2021-07-30 03:41:19'),
(70, 97, 0, 'otomatis', '2021-07-30 03:41:19'),
(71, 98, 0, 'otomatis', '2021-07-30 03:41:19'),
(72, 99, 0, 'otomatis', '2021-07-30 03:41:19'),
(73, 100, 0, 'otomatis', '2021-07-30 03:41:19'),
(74, 101, 90, 'manual', '2021-07-30 04:20:50');

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
(3, 'RUMAH KURCACI', 'Serang, pratin, rt xx/rw xx'),
(4, 'SEFA GARDEN', 'Bukateja, rt xx/rw xx'),
(5, 'CURUG DHUWUR', 'Bumisari, rt xx/rw xx'),
(6, 'CURUG SUMBA', 'Karangreja, rt xx/rw xx');

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
  MODIFY `id_pos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pa_quiz_jawaban`
--
ALTER TABLE `pa_quiz_jawaban`
  MODIFY `id_quizjawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT untuk tabel `pa_quiz_pilihan`
--
ALTER TABLE `pa_quiz_pilihan`
  MODIFY `id_quizpilihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT untuk tabel `pa_sekolah`
--
ALTER TABLE `pa_sekolah`
  MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pa_siswa`
--
ALTER TABLE `pa_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pa_skoring`
--
ALTER TABLE `pa_skoring`
  MODIFY `id_skor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

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
