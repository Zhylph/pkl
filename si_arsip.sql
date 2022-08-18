-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2022 at 09:54 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_arsip`
--

-- --------------------------------------------------------

--
-- Table structure for table `countdowntime`
--

CREATE TABLE `countdowntime` (
  `1` int(3) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countdowntime`
--

INSERT INTO `countdowntime` (`1`, `nip`, `waktu`) VALUES
(10, '1111', '2022-07-27 13:24:00'),
(14, '4545', '2023-06-10 05:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_access_menu`
--

CREATE TABLE `tbl_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_access_menu`
--

INSERT INTO `tbl_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 13, 1),
(6, 1, 4),
(12, 13, 3),
(13, 13, 4),
(14, 13, 7),
(19, 13, 8),
(20, 2, 7),
(21, 2, 8),
(23, 2, 11),
(25, 1, 10),
(26, 3, 10),
(27, 13, 10),
(28, 1, 9),
(29, 13, 9),
(30, 1, 11),
(31, 13, 11),
(32, 2, 6),
(33, 3, 9),
(34, 5, 9),
(35, 5, 10),
(37, 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alat`
--

CREATE TABLE `tbl_alat` (
  `id_alat` int(25) NOT NULL,
  `id_kegiatan` int(9) NOT NULL,
  `nama_alat` varchar(25) NOT NULL,
  `biaya` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_alat`
--

INSERT INTO `tbl_alat` (`id_alat`, `id_kegiatan`, `nama_alat`, `biaya`) VALUES
(2, 7, 'Bendera s', '100000'),
(3, 8, 'Tihang', '10000000'),
(7, 8, 'Kerupuk', '500000'),
(8, 10, 'Sound System', '1000000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_berkas`
--

CREATE TABLE `tbl_berkas` (
  `id_berkas` int(11) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `id_jenis_berkas` varchar(25) NOT NULL,
  `id_jenis_pengajuan` varchar(25) NOT NULL,
  `file_berkas` varchar(255) NOT NULL,
  `tanggal_upload` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_berkas`
--

INSERT INTO `tbl_berkas` (`id_berkas`, `nip`, `id_jenis_berkas`, `id_jenis_pengajuan`, `file_berkas`, `tanggal_upload`) VALUES
(65, '5789', 'KP1', '', 'SuratMasukk.pdf', '2022-08-01'),
(66, '5789', 'SK5', 'JP1', 'Sistem_Informasi_Pengelolaan_Arsip_Digit.pdf', '0000-00-00'),
(88, '4545', 'SK1', 'JP1', 'SK_CPNS_Okta.jpg', '2022-08-14'),
(89, '4545', 'KP3', 'JP1', 'KTP.jpg', '2022-08-14'),
(90, '4545', 'DOC1', 'JP1', 'akta_kelahiran.jpg', '2022-08-14'),
(91, '4545', 'DOC1', 'JP2', 'Artoriaa.jpg', '2022-08-14'),
(92, '4545', 'KP4', 'JP3', 'Zorro.jpg', '2022-08-14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_disposisi`
--

CREATE TABLE `tbl_disposisi` (
  `id_disposisi` int(9) NOT NULL,
  `d_id_surat` int(9) NOT NULL,
  `tgl_disposisi` date NOT NULL,
  `perintah` text NOT NULL,
  `file_disposisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_disposisi`
--

INSERT INTO `tbl_disposisi` (`id_disposisi`, `d_id_surat`, `tgl_disposisi`, `perintah`, `file_disposisi`) VALUES
(1, 3, '2022-08-03', 'Diminta untuk melakukan kegiatan. Diminta untuk melakukan kegiatan. Diminta untuk melakukan kegiatan. Diminta untuk melakukan kegiatan. Diminta untuk melakukan kegiatan. Diminta untuk melakukan kegiatan. Diminta untuk melakukan kegiatan. Diminta untuk melakukan kegiatan. Diminta untuk melakukan kegiatan. Diminta untuk melakukan kegiatan. Diminta untuk melakukan kegiatan. Diminta untuk melakukan kegiatan. Diminta untuk melakukan kegiatan. ', 'disposisi.pdf'),
(2, 5, '2022-12-08', 'Teruskan ke bidang pariwisata', 'r.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hasil`
--

CREATE TABLE `tbl_hasil` (
  `id_hasil` int(10) NOT NULL,
  `id_kegiatan` int(10) NOT NULL,
  `hasil_kegiatan` varchar(1000) NOT NULL,
  `file_hasil` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_hasil`
--

INSERT INTO `tbl_hasil` (`id_hasil`, `id_kegiatan`, `hasil_kegiatan`, `file_hasil`) VALUES
(1, 7, 'Kegiatan ini tidak menghasilkan apa-apa karena uang yang seharusnya digunakan untuk Lomba justru digunakan oleh sang penguasa dinasti untuk melestarikan Kekuasaan Dinastinya ', 'Arlecchino_full_3701687.jpg'),
(2, 10, 'Kegiatan berjalan lancar sebagaimana mestinya tanpa ada kendala', 'Surat_BALASAN_BUPATI.png'),
(3, 10, 'Kegiatan telah berjalan lancar sebagaimana mestinya tanpa ada halangan.', 'wakil-bupati-h-rahmadian-noor-membuka-lomba-dalam-rangka-menyemarakan-hut.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_history`
--

CREATE TABLE `tbl_history` (
  `id_history` int(10) NOT NULL,
  `id_jenis_pengajuan` varchar(3) NOT NULL,
  `nip` int(25) NOT NULL,
  `status_history` varchar(10) NOT NULL,
  `ket_history` varchar(50) NOT NULL,
  `tgl_history` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_history`
--

INSERT INTO `tbl_history` (`id_history`, `id_jenis_pengajuan`, `nip`, `status_history`, `ket_history`, `tgl_history`) VALUES
(2, 'JP1', 4545, 'Diterima', 'Data Sesuai', '2022-06-28'),
(3, 'JP1', 4545, 'Ditolak', 'Data ktp tidak sesuai', '2022-06-28'),
(4, 'JP1', 4545, 'Diterima', 'Data Sesuai', '2022-06-28'),
(5, 'JP2', 2147483647, 'Diterima', 'Data Sesuai', '2022-06-28'),
(6, 'JP2', 2147483647, 'Ditolak', 'Data SK PNS buram', '2022-06-28'),
(7, 'JP2', 2147483647, 'Ditolak', 'KTP buram', '2022-06-28'),
(8, 'JP3', 2147483647, 'Diterima', 'Data Sesuai', '2022-06-28'),
(9, 'JP3', 2147483647, 'Ditolak', 'data palsu', '2022-06-28'),
(10, 'JP2', 2147483647, 'Diterima', 'Data Sesuai', '2022-06-28'),
(11, 'JP2', 2147483647, 'Ditolak', 'hubla', '2022-06-28'),
(12, 'JP2', 2147483647, 'Ditolak', 'data ktp salah', '2022-06-28'),
(13, 'JP2', 1111, 'Ditolak', 'data palsu', '2022-06-28'),
(14, 'JP1', 1111, 'Diterima', 'Data Sesuai', '2022-07-03'),
(15, 'JP1', 1111, 'Diterima', 'Data Sesuai', '2022-07-03'),
(16, 'JP2', 1111, 'Ditolak', 'ktp, surat kawin buran', '2022-07-03'),
(17, 'JP2', 1111, 'Ditolak', 'ktp, surat kawin buran', '2022-07-03'),
(18, 'JP2', 4545, 'Ditolak', 'ktp, surat kawin buran', '2022-07-03'),
(19, 'JP2', 4545, 'Ditolak', 'ktp, surat kawin buran', '2022-07-03'),
(20, 'JP2', 4545, 'Diterima', 'Data Sesuai', '2022-07-03'),
(21, 'JP2', 4545, 'Ditolak', 'Tertolak', '2022-07-21'),
(22, 'JP1', 1111, 'Ditolak', 'Tertolak', '2022-07-21'),
(23, 'JP3', 4545, 'Diterima', 'Data Sesuai', '2022-08-14'),
(24, 'JP3', 4545, 'Diterima', 'Data Sesuai', '2022-08-14'),
(25, 'JP3', 4545, 'Ditolak', 'Kdd ay', '2022-08-14'),
(26, 'JP3', 4545, 'Diterima', 'Data Sesuai', '2022-08-14'),
(27, 'JP3', 4545, 'Diterima', 'Data Sesuai', '2022-08-14'),
(28, 'JP2', 4545, 'Diterima', 'Data Sesuai', '2022-08-14'),
(29, 'JP1', 4545, 'Diterima', 'Data Sesuai', '2022-08-14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_berkas`
--

CREATE TABLE `tbl_jenis_berkas` (
  `id_jenis_berkas` varchar(25) NOT NULL,
  `nama_berkas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jenis_berkas`
--

INSERT INTO `tbl_jenis_berkas` (`id_jenis_berkas`, `nama_berkas`) VALUES
('DOC1', 'Akta Kelahiran'),
('KP1', 'Kartu Pegawai'),
('KP2', 'Kartu Suami/Istri'),
('KP3', 'KTP'),
('KP4', 'Kartu Peserta Taspen'),
('SK1', 'SK CPNS'),
('SK10', 'SK Kenaikan Gaji Berkala Terakhir'),
('SK11', 'PPKPNS'),
('SK12', 'SK PMK'),
('SK13', 'SK Konversi NIP Baru'),
('SK14', 'Surat Keterangan Penghentian'),
('SK2', 'SK PNS'),
('SK3', 'SK Pangkat Terakhir'),
('SK4', 'SK Mutasi'),
('SK5', 'SKP 2 Tahun Terakhir'),
('SK6', 'SK Jabatan Struktural'),
('SK7', 'SK Jabatan Sebelumnya'),
('SK8', 'SK Pembebasan Jabatan Fungsional'),
('SK9', 'SK Penambahan Masa Kerja'),
('SP1', 'Surat Pengantar Dinas'),
('ST1', 'Ijazah Terakhir'),
('ST2', 'Transkip Nilai'),
('ST3', 'STTPL Penjenjangan'),
('ST4', 'STLUD'),
('ST5', 'Surat Izin Belajar'),
('ST6', 'Surat Tugas Belajar'),
('ST7', 'Legalisir Pangkalan Data'),
('ST8', 'Surat Tanda Lulus UKPPI'),
('ST9', 'Surat Nikah');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_pengajuan`
--

CREATE TABLE `tbl_jenis_pengajuan` (
  `id_jenis_pengajuan` varchar(25) NOT NULL,
  `jenis_pengajuan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jenis_pengajuan`
--

INSERT INTO `tbl_jenis_pengajuan` (`id_jenis_pengajuan`, `jenis_pengajuan`) VALUES
('JP1', 'Kenaikan Pangkat'),
('JP2', 'Kenaikan Gaji'),
('JP3', 'Pensiun'),
('JP4', 'Izin Cuti');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kegiatan`
--

CREATE TABLE `tbl_kegiatan` (
  `id_kegiatan` int(25) NOT NULL,
  `nama_kegiatan` varchar(50) NOT NULL,
  `tanggal_kegiatan` date NOT NULL,
  `total_anggaran` varchar(50) NOT NULL,
  `file_berkas` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kegiatan`
--

INSERT INTO `tbl_kegiatan` (`id_kegiatan`, `nama_kegiatan`, `tanggal_kegiatan`, `total_anggaran`, `file_berkas`) VALUES
(7, 'Lomba', '2022-11-10', '1000000', 'Scan2022-07-13_151059.jpg'),
(8, 'Lomba 17 Agustus', '2022-10-10', '2000000', 'abstract-cubes-glow-lines-corridor-wallpaper-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'Administrator'),
(3, 'Menu'),
(4, 'Data'),
(6, 'Dashboard'),
(7, 'Pengarsipan'),
(8, 'Pengajuan'),
(9, 'Penyetujuan'),
(10, 'Laporan'),
(11, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notif`
--

CREATE TABLE `tbl_notif` (
  `id_notif` int(9) NOT NULL,
  `id_user` int(9) NOT NULL,
  `id_jenis_pengajuan` varchar(3) NOT NULL,
  `notif_ke` int(9) NOT NULL,
  `nama_berkas` varchar(25) NOT NULL,
  `status` varchar(10) NOT NULL,
  `ket` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_notif`
--

INSERT INTO `tbl_notif` (`id_notif`, `id_user`, `id_jenis_pengajuan`, `notif_ke`, `nama_berkas`, `status`, `ket`) VALUES
(6, 2147483647, '', 2, 'Kenaikan Gaji', 'Diterima', 'Data Sesuai'),
(7, 2147483647, '', 2, 'Kenaikan Gaji', 'Ditolak', 'Data SK PNS buram'),
(8, 2147483647, '', 2, 'Kenaikan Gaji', 'Ditolak', 'KTP buram'),
(9, 2147483647, '', 2, 'Pensiun', 'Diterima', 'Data Sesuai'),
(10, 2147483647, '', 2, 'Pensiun', 'Ditolak', 'data palsu'),
(11, 2147483647, '', 2, 'Kenaikan Gaji', 'Diterima', 'Data Sesuai'),
(12, 2147483647, '', 2, 'Kenaikan Gaji', 'Ditolak', 'hubla'),
(13, 2147483647, '', 2, 'Kenaikan Gaji', 'Ditolak', 'data ktp salah'),
(26, 1111, '', 1, '', '-', 'Data di ajukan kembali'),
(34, 1111, '', 2, 'Kenaikan Pangkat', 'Ditolak', 'Tertolak'),
(35, 2147483647, '', 2, 'Kenaikan Gaji', 'Diterima', 'Data Sesuai'),
(36, 2147483647, '', 2, 'Kenaikan Gaji', 'Diterima', 'Data Sesuai'),
(37, 4545, 'JP1', 1, '', '-', 'Data Baru'),
(38, 4545, 'JP2', 1, '', '-', 'Data Baru'),
(39, 4545, 'JP3', 1, '', '-', 'Data Baru');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_panitia`
--

CREATE TABLE `tbl_panitia` (
  `id_panitia` int(10) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `nama_panitia` varchar(255) NOT NULL,
  `tugas` varchar(255) NOT NULL,
  `gaji` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_panitia`
--

INSERT INTO `tbl_panitia` (`id_panitia`, `id_kegiatan`, `nama_panitia`, `tugas`, `gaji`) VALUES
(1, 7, 'Muhammad D. Luffy', 'BOS', '10000000'),
(2, 8, 'Okta Wibu', 'Gaji Buta', '5000000'),
(3, 8, 'Rajif', 'Mehabisi Makanan', '2000000'),
(4, 10, 'Jauzi Oktaviandy', 'Dokumentasi', '25000000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengajuan`
--

CREATE TABLE `tbl_pengajuan` (
  `id_pengajuan` int(25) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `id_jenis_pengajuan` varchar(25) NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `status2` varchar(15) NOT NULL,
  `ket` varchar(30) NOT NULL,
  `penyetujuan` int(1) NOT NULL,
  `tanggal_verif` date NOT NULL,
  `golongan_baru` varchar(9) NOT NULL,
  `golongan_lama` varchar(9) NOT NULL,
  `gaji_baru` varchar(20) NOT NULL,
  `gaji_lama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengajuan`
--

INSERT INTO `tbl_pengajuan` (`id_pengajuan`, `nip`, `id_jenis_pengajuan`, `tanggal_pengajuan`, `status`, `status2`, `ket`, `penyetujuan`, `tanggal_verif`, `golongan_baru`, `golongan_lama`, `gaji_baru`, `gaji_lama`) VALUES
(36, '4545', 'JP1', '2022-06-16', 'Diterima', 'Verifikasi', 'Data ktp tidak sesuai', 1, '0000-00-00', '', '', '', ''),
(37, '1111', 'JP2', '2022-06-28', '-', '-', '', 1, '0000-00-00', '', '', '', ''),
(38, '1111', 'JP1', '2022-07-03', 'Ditolak', 'Ditolak', 'Tertolak', 0, '2022-07-03', 'IV/b', 'Tingkat A', '', ''),
(39, '1111', 'JP2', '2022-07-03', '-', '-', '', 0, '0000-00-00', '', '', '', ''),
(40, '4545', 'JP2', '2022-07-03', 'Ditolak', 'Ditolak', 'Tertolak', 1, '2022-07-03', '', '', '3000000', '2500000'),
(41, '4545', 'JP1', '2022-08-14', 'Diterima', 'Verifikasi', '', 0, '2022-08-14', 'I/d', '-', '', ''),
(42, '4545', 'JP2', '2022-08-14', 'Diterima', 'Verifikasi', '', 0, '2022-08-14', '', '', '15000000', '3000000'),
(43, '4545', 'JP3', '2022-08-14', 'Diterima', 'Verifikasi', 'Kdd ay', 0, '2022-08-14', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'User'),
(13, 'Superadmin'),
(3, 'Errorboi'),
(5, 'Kepala Dinas');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_menu`
--

CREATE TABLE `tbl_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sub_menu`
--

INSERT INTO `tbl_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin/index', 'fas fa-fw fa-tachometer-alt', 1),
(3, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(7, 7, 'Upload Berkas', 'user/upberkas', 'fas fa-fw fa-upload', 1),
(8, 4, 'Data Pegawai', 'data', 'fas fa-fw fa-user', 1),
(9, 4, 'Data Berkas', 'data/berkas', 'fas fa-fw fa-file', 1),
(10, 2, 'Dashboard', 'newadmin', 'fas fa-fw fa-tachometer-alt', 1),
(11, 4, 'Data Jenis Berkas', 'data/jenisberkas', 'fas fa-fw fa-file-alt', 1),
(12, 4, 'Data Jenis Pengajuan', 'data/jenispengajuan', 'fas fa-fw fa-share-square', 1),
(13, 8, 'Ajukan Berkas', 'user/pengajuan', 'fas fa-fw fa-paper-plane', 1),
(14, 10, 'Laporan Pegawai', 'data/pdf', 'fas fa-fw fa-tasks', 0),
(15, 10, 'Laporan Berkas', 'data/pdfberkas', 'fas fa-fw fa-tasks', 0),
(16, 10, 'Laporan Kenaikan Pangkat', 'data/pdfpengajuankp', 'fas fa-fw fa-tasks', 0),
(17, 10, 'Laporan Kenaikan Gaji', 'data/pdfpengajuankg', 'fas fa-fw fa-tasks', 0),
(18, 4, 'Data Pengajuan', 'data/pengajuan', 'fas fa-fw fa-tasks', 0),
(19, 10, 'Laporan Pengajuan', 'data/pdfpengajuan', 'fas fa-fw fa-tasks', 0),
(20, 11, 'Ubah Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(21, 9, 'Kenaikan Pangkat', 'data/approve_kp', 'fas fa-fw fa-check', 1),
(22, 9, 'Kenaikan Gaji', 'data/approve_kg', 'fas fa-fw fa-check', 1),
(23, 9, 'Pensiun', 'data/approve_p', 'fas fa-fw fa-check', 1),
(24, 9, 'Izin Cuti', 'data/approve_c', 'fas fa-fw fa-check', 0),
(25, 10, 'Laporan Pensiun', 'data/pdfpengajuanpensi', 'fas fa-fw fa-tasks', 0),
(26, 10, 'Laporan Izin Cuti', 'data/pdfpengajuancuti', 'fas fa-fw fa-tasks', 0),
(27, 9, 'Data Baru Masuk', 'data/approve_b', 'fas fa-fw fa-check', 0),
(28, 8, 'List Pengajuan', 'user/listpengajuan', 'fas fa-fw fa-solid fa-book', 1),
(29, 6, 'Dashboard', 'dashboard/index', 'fas fa-fw fa-tachometer-alt', 1),
(30, 10, 'List Laporan', 'data/laporan', 'fas fa-fw fa-tasks', 1),
(31, 4, 'Data Surat', 'data/suratmasuk', 'fas fa-fw fa-envelope', 1),
(32, 9, 'Kegiatan', 'data/kegiatan', 'fas fa-fw fa-check', 1),
(33, 8, 'Kegiatan', 'user/kegiatan', 'fas fa-fw fa-clipboard-list', 0),
(34, 4, 'Data Kegiatan', 'data/kegiatan', 'fas fa-fw fa-tasks', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_surat_masuk`
--

CREATE TABLE `tbl_surat_masuk` (
  `id_surat` int(9) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `tgl_surat` date NOT NULL,
  `perihal` varchar(30) NOT NULL,
  `file_surat` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_surat_masuk`
--

INSERT INTO `tbl_surat_masuk` (`id_surat`, `no_surat`, `tgl_surat`, `perihal`, `file_surat`, `status`) VALUES
(3, '18/VIII/22', '2022-08-01', 'Perubahan Kebijakan', 'suratmasukk.pdf', 1),
(5, '20/VIII/22', '2022-08-11', 'Kegiatan Baru', 'surat_masuk.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `nip` varchar(18) NOT NULL,
  `nama_pegawai` varchar(25) NOT NULL,
  `golongan` varchar(10) NOT NULL,
  `jabatan` varchar(150) NOT NULL,
  `gaji` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`nip`, `nama_pegawai`, `golongan`, `jabatan`, `gaji`, `password`, `role_id`) VALUES
('1111', 'Hijra Anshordiknas', '-', 'Honorer', '3000000', '', 2),
('196505011986021007', 'Sabirin, S.Sos', 'IV/c', 'Kepala Dinas', '', '', 2),
('2222', 'superadmin', 'Tingkat At', 'Yonkou', '', '$2y$10$/XQRdls8D.WsSuzO/mgJ2O2qtl2XwGdh3xBSqy/ajryYc84allmmW', 13),
('4545', 'Jauzi Oktaviandy', 'I/d', 'PPNPN', '15000000', '$2y$10$6tsbTrhxzXZpc.GH6cZTDuGh2f96d5J5Tfyg5Smo6WpeQDX32751.', 2),
('admin', 'Administrator', 'Admin', 'Admin', '', '$2y$10$6tsbTrhxzXZpc.GH6cZTDuGh2f96d5J5Tfyg5Smo6WpeQDX32751.', 1),
('birin', 'Kepala Dinas', 'IV/D', 'Kepala Dinas', '5000000', '$2y$10$6tsbTrhxzXZpc.GH6cZTDuGh2f96d5J5Tfyg5Smo6WpeQDX32751.', 5),
('rajif', 'rajif', 'rajif', 'rajif', '3000000', '$2y$10$tFP0S/7ome7bfDGoXFgQO.zaZpAijmJfmraybJs5mzuau8Jb4Pm0S', 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countdowntime`
--
ALTER TABLE `countdowntime`
  ADD PRIMARY KEY (`1`);

--
-- Indexes for table `tbl_access_menu`
--
ALTER TABLE `tbl_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_alat`
--
ALTER TABLE `tbl_alat`
  ADD PRIMARY KEY (`id_alat`);

--
-- Indexes for table `tbl_berkas`
--
ALTER TABLE `tbl_berkas`
  ADD PRIMARY KEY (`id_berkas`),
  ADD KEY `id_jenis_berkas` (`id_jenis_berkas`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `tbl_disposisi`
--
ALTER TABLE `tbl_disposisi`
  ADD PRIMARY KEY (`id_disposisi`);

--
-- Indexes for table `tbl_hasil`
--
ALTER TABLE `tbl_hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `tbl_history`
--
ALTER TABLE `tbl_history`
  ADD PRIMARY KEY (`id_history`);

--
-- Indexes for table `tbl_jenis_berkas`
--
ALTER TABLE `tbl_jenis_berkas`
  ADD PRIMARY KEY (`id_jenis_berkas`);

--
-- Indexes for table `tbl_jenis_pengajuan`
--
ALTER TABLE `tbl_jenis_pengajuan`
  ADD PRIMARY KEY (`id_jenis_pengajuan`);

--
-- Indexes for table `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_notif`
--
ALTER TABLE `tbl_notif`
  ADD PRIMARY KEY (`id_notif`);

--
-- Indexes for table `tbl_panitia`
--
ALTER TABLE `tbl_panitia`
  ADD PRIMARY KEY (`id_panitia`);

--
-- Indexes for table `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `nip` (`nip`),
  ADD KEY `id_jenis_pengajuan` (`id_jenis_pengajuan`);

--
-- Indexes for table `tbl_sub_menu`
--
ALTER TABLE `tbl_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_surat_masuk`
--
ALTER TABLE `tbl_surat_masuk`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countdowntime`
--
ALTER TABLE `countdowntime`
  MODIFY `1` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_access_menu`
--
ALTER TABLE `tbl_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_alat`
--
ALTER TABLE `tbl_alat`
  MODIFY `id_alat` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_berkas`
--
ALTER TABLE `tbl_berkas`
  MODIFY `id_berkas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `tbl_disposisi`
--
ALTER TABLE `tbl_disposisi`
  MODIFY `id_disposisi` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_hasil`
--
ALTER TABLE `tbl_hasil`
  MODIFY `id_hasil` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_history`
--
ALTER TABLE `tbl_history`
  MODIFY `id_history` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  MODIFY `id_kegiatan` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_notif`
--
ALTER TABLE `tbl_notif`
  MODIFY `id_notif` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_panitia`
--
ALTER TABLE `tbl_panitia`
  MODIFY `id_panitia` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  MODIFY `id_pengajuan` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_sub_menu`
--
ALTER TABLE `tbl_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_surat_masuk`
--
ALTER TABLE `tbl_surat_masuk`
  MODIFY `id_surat` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_berkas`
--
ALTER TABLE `tbl_berkas`
  ADD CONSTRAINT `tbl_berkas_ibfk_1` FOREIGN KEY (`id_jenis_berkas`) REFERENCES `tbl_jenis_berkas` (`id_jenis_berkas`);

--
-- Constraints for table `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  ADD CONSTRAINT `tbl_pengajuan_ibfk_2` FOREIGN KEY (`id_jenis_pengajuan`) REFERENCES `tbl_jenis_pengajuan` (`id_jenis_pengajuan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
