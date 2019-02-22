-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22 Feb 2019 pada 06.50
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tutor`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ambil_mapel`
--

CREATE TABLE `ambil_mapel` (
  `id` varchar(20) NOT NULL,
  `id_mapel` int(10) DEFAULT NULL,
  `id_user` varchar(10) NOT NULL,
  `mapel` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ambil_mapel`
--

INSERT INTO `ambil_mapel` (`id`, `id_mapel`, `id_user`, `mapel`) VALUES
('0002', 2, 'T002', 'Basis Data'),
('0003', 1, 'T001', 'Data Mining'),
('0004', 2, 'T001', 'Basis Data'),
('0005', 2, 'T003', 'Basis Data');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ambil_tutor`
--

CREATE TABLE `ambil_tutor` (
  `id` varchar(20) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `id_tutor` varchar(10) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ambil_tutor`
--

INSERT INTO `ambil_tutor` (`id`, `id_user`, `id_tutor`, `id_mapel`, `id_kelas`) VALUES
('0005', 'U003', 'T001', 1, 'DM1'),
('0006', 'U002', 'T001', 1, 'DM1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` varchar(10) NOT NULL,
  `id_kelas` varchar(20) NOT NULL,
  `id_tutor` varchar(10) NOT NULL,
  `id_mapel` varchar(10) NOT NULL,
  `kuota` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `id_kelas`, `id_tutor`, `id_mapel`, `kuota`) VALUES
('0003', 'DM1', 'T001', '1', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_user` varchar(10) NOT NULL,
  `umur` int(10) NOT NULL,
  `jenis_kel` varchar(2) NOT NULL,
  `lama_mengajar` int(10) NOT NULL,
  `alamat` text NOT NULL,
  `link` varchar(100) NOT NULL,
  `awal` date NOT NULL,
  `akhir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_user`, `umur`, `jenis_kel`, `lama_mengajar`, `alamat`, `link`, `awal`, `akhir`) VALUES
('T001', 22, 'L', 12, 'Jln.Pesantren Al-Hidayah\r\nkecamatan sukorejo', 'sanja.com', '2000-12-12', '2012-12-12'),
('T002', 22, 'L', 15, 'Jln.Pesantren Al-Hidayah\r\nkecamatan sukorejo', '', '2000-12-12', '2015-12-12'),
('T003', 22, 'L', 15, 'asdasdasdasdadasdasd', '', '2000-12-12', '2015-12-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `mapel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `mapel`) VALUES
(1, 'Data Mining'),
(2, 'Basis Data');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `id_materi` varchar(10) NOT NULL,
  `id_kelas` varchar(20) NOT NULL,
  `id_mapel` varchar(10) NOT NULL,
  `id_tutor` varchar(20) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `materi` text NOT NULL,
  `file` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id_materi`, `id_kelas`, `id_mapel`, `id_tutor`, `judul`, `materi`, `file`) VALUES
('0001', 'DM1', '1', 'T001', 'Berkarya', '<p>adalah <strong>suatu perjuangan </strong><em>heuristic <span style=\"background-color:#ffff00\">speciess</span></em></p>\r\n', '383-953-1-PB.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasi`
--

CREATE TABLE `prestasi` (
  `id_user` varchar(10) NOT NULL,
  `prestasi` varchar(100) NOT NULL,
  `lulusan` varchar(10) NOT NULL,
  `universitas` varchar(100) NOT NULL,
  `qualifikasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prestasi`
--

INSERT INTO `prestasi` (`id_user`, `prestasi`, `lulusan`, `universitas`, `qualifikasi`) VALUES
('T001', 'luar negeri', 'S1', 'dalam negeri', 'tersertifikasi'),
('T001', 'dalam negeri', 'S2', 'luar negeri', 'non-sertifikasi'),
('T001', 'luar negeri', 'S3', 'dalam negeri', 'tersertifikasi'),
('T003', 'luar negeri', 'S1', 'dalam negeri', 'tersertifikasi'),
('T003', 'dalam negeri', 'S2', 'luar negeri', 'non-sertifikasi'),
('T002', 'luar negeri', 'S1', 'dalam negeri', 'tersertifikasi'),
('T002', 'dalam negeri', 'S2', 'dalam negeri', 'non-sertifikasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(10) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kel` enum('L','P') NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `akses` enum('Tutor','Siswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `username`, `email`, `tempat_lahir`, `tgl_lahir`, `jenis_kel`, `password`, `foto`, `akses`) VALUES
('T001', 'sanja maulana', 'sanja96', 'avi.sanja@gmail.com', 'pasuruan', '1996-12-11', 'L', 'sanja', '12299172_1672845569651629_7719121632367886286_n.jpg', 'Tutor'),
('T002', 'sanja maulana', 'sanja', 'avi.sanja@gmail.com', 'pasuruan', '1996-12-12', 'L', 'sanja', '108-512.png', 'Tutor'),
('T003', 'sanja avi', 'sanja89', 'avi.sanja@gmail.com', 'pasuruan', '1996-12-12', 'L', 'sanja', '0056a5df5641136.jpg', 'Tutor'),
('U001', 'sanja maulana', 'sanja1', 'avi.sanja@gmail.com', 'pasuruan', '1991-12-12', 'L', 'sanja', '', 'Siswa'),
('U002', 'sanja maulana', 'sanja12', 'avi.sanja@gmail.com', 'pasuruan', '1991-12-12', 'L', 'sanja', 'stealth-mode-sticker_470x.png', 'Siswa'),
('U003', 'sanja avi', 'sanja0', 'avi.sanja@gmail.com', 'pasuruan', '1996-12-12', 'L', 'sanja', '0056a5df5641136.jpg', 'Siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ambil_mapel`
--
ALTER TABLE `ambil_mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ambil_tutor`
--
ALTER TABLE `ambil_tutor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
