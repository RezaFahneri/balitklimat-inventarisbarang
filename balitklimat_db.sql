-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Feb 2022 pada 07.22
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `balitklimat_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_golongan`
--

CREATE TABLE `data_golongan` (
  `id_golongan` int(11) NOT NULL,
  `golongan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_golongan`
--

INSERT INTO `data_golongan` (`id_golongan`, `golongan`) VALUES
(1, 'II C'),
(3, 'II D'),
(4, 'III A'),
(5, 'III C'),
(6, 'III C'),
(7, 'III D'),
(8, 'IV A'),
(9, 'IV B'),
(10, 'IV C'),
(11, 'IV D');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_jabatan`
--

CREATE TABLE `data_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_jabatan`
--

INSERT INTO `data_jabatan` (`id_jabatan`, `jabatan`) VALUES
(2, 'Plt. Kepala Balai'),
(3, 'Peneliti Ahli Utama'),
(4, 'Peneliti Ahli Madya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pangkat`
--

CREATE TABLE `data_pangkat` (
  `id_pangkat` int(11) NOT NULL,
  `pangkat` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_pangkat`
--

INSERT INTO `data_pangkat` (`id_pangkat`, `pangkat`) VALUES
(1, 'Pembina Tk I'),
(2, 'Pembina Utama'),
(3, 'Pembina Utama Muda'),
(4, 'Pembina'),
(6, 'Penata'),
(7, 'Penata Tk I'),
(8, 'Pengatur Tk I');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pegawai`
--

CREATE TABLE `data_pegawai` (
  `nip` varchar(18) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `golongan` varchar(10) NOT NULL,
  `status_kepegawaian` varchar(15) NOT NULL,
  `pangkat` varchar(40) NOT NULL,
  `jabatan` varchar(40) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `no_whatsapp` varchar(20) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `pumk` tinyint(1) NOT NULL,
  `kpa` tinyint(1) NOT NULL,
  `ppk` tinyint(1) NOT NULL,
  `pj` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_pegawai`
--

INSERT INTO `data_pegawai` (`nip`, `nama_pegawai`, `foto`, `golongan`, `status_kepegawaian`, `pangkat`, `jabatan`, `nik`, `email`, `password`, `no_whatsapp`, `admin`, `pumk`, `kpa`, `ppk`, `pj`) VALUES
('195805161993032002', 'Dr. Nani Heryani', 'fix_kolokium.jpg', 'IV D', 'PNS', 'Pembina Tk I', 'Peneliti Ahli Madya', '3271055605580006', 'administrator@gmail.com', '876543221', '081235062988', 0, 0, 0, 0, 0),
('196401211990031002', 'Dr. Ir. A. Arivin Rivaie, M.Sc', 'WhatsApp Image 2022-01-14 at 14.30.57.jpeg', 'IV D', 'PNS', 'Pembina Tk I', 'Plt. Kepala Balai', '3271062101640004', 'bogorfood.kel8@gmail.com', '12345678', '081235062988', 0, 0, 0, 0, 0),
('196411291990032002', 'Dr. Ir. Popi Redjekiningrum Dwi Mustatingingsih', 'DSCF5201-removebg-preview.png', 'IV D', 'PNS', 'Pembina Utama', 'Peneliti Ahli Utama', '3201296911640001', 'administrator@gmail.com', '12345678', '081235062988', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_role`
--

CREATE TABLE `data_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_role`
--

INSERT INTO `data_role` (`id_role`, `role`) VALUES
(1, 'Admin'),
(3, 'PUMK'),
(4, 'Bendahara ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `id_jenis` int(11) NOT NULL,
  `jenis_barang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_barang`
--

INSERT INTO `jenis_barang` (`id_jenis`, `jenis_barang`) VALUES
(1, 'Peralatan dan Mesin (132111)'),
(2, 'Gedung dan Bangunan (133111)'),
(4, 'Irigasi (134112) '),
(5, 'Jaringan (134113)'),
(6, 'Aset tetap lainnya (135121)'),
(7, 'Aset tetap yang tidak digunakan (166112)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `nama`, `foto`, `role`, `email`, `password`) VALUES
(1, 'Robbi Hably', NULL, 'Admin', 'robbi123@gmail.com', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'Lugas Munayasika', NULL, 'Pegawai', 'lugas123@gmail.com', '047aeeb234644b9e2d4138ed3bc7976a'),
(3, 'Reza', NULL, 'Admin', 'reza@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perbaikan_barang`
--

CREATE TABLE `perbaikan_barang` (
  `id_perbaikan` int(11) NOT NULL,
  `id_Barang` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `tempat` varchar(50) NOT NULL,
  `tglperbaikan` date NOT NULL,
  `tglselesai` date NOT NULL,
  `qty` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `perbaikan_barang`
--

INSERT INTO `perbaikan_barang` (`id_perbaikan`, `id_Barang`, `jenis`, `tempat`, `tglperbaikan`, `tglselesai`, `qty`, `status`) VALUES
(3, 50, 'Mati total', 'Gudang kamera', '2022-02-21', '2022-02-28', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjam_barang`
--

CREATE TABLE `pinjam_barang` (
  `id_pinjam` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `peminjam` varchar(50) NOT NULL,
  `tglpinjam` date NOT NULL,
  `tglselesai` date NOT NULL,
  `qty` int(11) NOT NULL,
  `kegiatan` varchar(100) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pinjam_barang`
--

INSERT INTO `pinjam_barang` (`id_pinjam`, `id_barang`, `peminjam`, `tglpinjam`, `tglselesai`, `qty`, `kegiatan`, `lokasi`, `status`) VALUES
(14, 6, 'Robbi', '2022-02-12', '2022-02-16', 1, 'PKL', 'Bogor', '1'),
(15, 5, 'Reza', '2022-02-12', '2022-02-14', 1, 'Gotong Royong', 'Balai Penelitian Agroklimat dan Hidrologi ', '2'),
(28, 50, 'Fahneri', '2022-02-18', '2022-02-27', 1, 'Liburan', 'Padang', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan_barang`
--

CREATE TABLE `satuan_barang` (
  `id_satuan` int(11) NOT NULL,
  `satuan_barang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `satuan_barang`
--

INSERT INTO `satuan_barang` (`id_satuan`, `satuan_barang`) VALUES
(1, 'Unit'),
(2, 'Buah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_kepegawaian`
--

CREATE TABLE `status_kepegawaian` (
  `id_status_peg` int(11) NOT NULL,
  `status_kepegawaian` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status_kepegawaian`
--

INSERT INTO `status_kepegawaian` (`id_status_peg`, `status_kepegawaian`) VALUES
(1, 'PNS'),
(2, 'PNS/TB'),
(3, 'CPNS'),
(5, 'PPNPN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_barang`
--

CREATE TABLE `stok_barang` (
  `id_barang` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `jenis_barang` varchar(255) NOT NULL,
  `satuan_barang` varchar(255) DEFAULT NULL,
  `jumlah_barang` int(255) NOT NULL,
  `kondisi_barang` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `stok_barang`
--

INSERT INTO `stok_barang` (`id_barang`, `kode`, `gambar`, `nama_barang`, `jenis_barang`, `satuan_barang`, `jumlah_barang`, `kondisi_barang`, `keterangan`) VALUES
(1, '3.02.01.02.003', '5995b09be1fa2a4a337780ac013f37902.png', 'Mini Bus (Penumpang 14 Orang Kebawah)', 'Peralatan dan Mesin (132111)', 'Unit', 6, 'Baik', ''),
(5, '3.02.01.03.002', 'pickup2.jpg', 'Pick Up', 'Peralatan dan Mesin (132111)', 'Unit', 0, 'Baik', ''),
(6, '3.02.01..04.001', 'motor.jpg', 'Sepeda Motor', 'Peralatan dan Mesin (132111)', 'Unit', 4, 'Baik', ''),
(7, '3.02.01.04.999', '', 'Kendaraan Bermotor Beroda Dua Lainnya', 'Peralatan dan Mesin (132111)', '', 1, 'Baik', ''),
(8, '3.03.01.03.004', 'solderlistrik3.jpg', 'Solder  Listrik', 'Peralatan dan Mesin (132111)', 'Buah', 2, 'Baik', ''),
(9, '3.03.02.07.003', '', 'Bor', 'Peralatan dan Mesin (132111)', 'Buah', 6, 'Baik', ''),
(10, '3.03.02.12.028', '', 'Mesin Bor Listrik Tangan', 'Peralatan dan Mesin (132111)', 'Buah', 1, 'Baik', ''),
(11, '3.03.03.01.023', '', 'Volt Meter Elektronik', 'Peralatan dan Mesin (132111)', 'Buah', 1, 'Baik', ''),
(12, '3.03.03.01.072', '', 'Global Positioning System', 'Peralatan dan Mesin (132111)', 'Buah', 5, 'Baik', ''),
(13, '3.03.03.06.004', '', 'Oscilloscope Envelope', 'Peralatan dan Mesin (132111)', 'Buah', 1, 'Baik', ''),
(14, '3.03.03.08.020', '', 'Metra Block', 'Peralatan dan Mesin (132111)', 'Buah', 9, 'Baik', ''),
(15, '3.03.03.17.042', '', 'Soil Moisture Meter', 'Peralatan dan Mesin (132111)', 'Buah', 3, 'Baik', ''),
(16, '3.03.03.17.133', '', 'Resistivity Meter', 'Peralatan dan Mesin (132111)', 'Buah', 1, 'Baik', ''),
(17, '3.04.01.04.004', '', 'Lemari Penyimpanan', 'Peralatan dan Mesin (132111)', 'Buah', 8, 'Baik', ''),
(18, '3.04.01.05.999', '', 'Alat Laboratorium Pertanian Lainnya (Alat Pengolahan Pertanian)', 'Peralatan dan Mesin (132111)', '', 7, 'Baik', ''),
(19, '3.05.01.01.002', '', 'Mesin Ketik Manual Standard (14-16 Inci)', 'Peralatan dan Mesin (132111)', 'Buah', 5, 'Baik', ''),
(20, '3.05.01.02.001', '', 'Mesin Hitung Manual', 'Peralatan dan Mesin (132111)', 'Buah', 1, 'Baik', ''),
(21, '3.05.01.04.001', '', 'Lemari Besi/Metal', 'Peralatan dan Mesin (132111)', 'Buah', 37, 'Baik', ''),
(22, '3.05.01.04.002', '', 'Lemari Kayu', 'Peralatan dan Mesin (132111)', 'Buah', 24, 'Baik', ''),
(23, '3.05.01.04.003', '', 'Rak Besi', 'Peralatan dan Mesin (132111)', 'Buah', 10, 'Baik', ''),
(24, '3.05.01.04.004', '', 'Rak Kayu', 'Peralatan dan Mesin (132111)', 'Buah', 5, 'Baik', ''),
(50, '123', 'kamera1.jpg', 'Mirrorless', 'Peralatan dan Mesin (132111)', 'Unit', 0, 'Baik', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_golongan`
--
ALTER TABLE `data_golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indeks untuk tabel `data_jabatan`
--
ALTER TABLE `data_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `data_pangkat`
--
ALTER TABLE `data_pangkat`
  ADD PRIMARY KEY (`id_pangkat`);

--
-- Indeks untuk tabel `data_pegawai`
--
ALTER TABLE `data_pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `data_role`
--
ALTER TABLE `data_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perbaikan_barang`
--
ALTER TABLE `perbaikan_barang`
  ADD PRIMARY KEY (`id_perbaikan`);

--
-- Indeks untuk tabel `pinjam_barang`
--
ALTER TABLE `pinjam_barang`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `id_barang_join` (`id_barang`);

--
-- Indeks untuk tabel `satuan_barang`
--
ALTER TABLE `satuan_barang`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indeks untuk tabel `status_kepegawaian`
--
ALTER TABLE `status_kepegawaian`
  ADD PRIMARY KEY (`id_status_peg`);

--
-- Indeks untuk tabel `stok_barang`
--
ALTER TABLE `stok_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_golongan`
--
ALTER TABLE `data_golongan`
  MODIFY `id_golongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `data_jabatan`
--
ALTER TABLE `data_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `data_pangkat`
--
ALTER TABLE `data_pangkat`
  MODIFY `id_pangkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `data_role`
--
ALTER TABLE `data_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `perbaikan_barang`
--
ALTER TABLE `perbaikan_barang`
  MODIFY `id_perbaikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pinjam_barang`
--
ALTER TABLE `pinjam_barang`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `satuan_barang`
--
ALTER TABLE `satuan_barang`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `status_kepegawaian`
--
ALTER TABLE `status_kepegawaian`
  MODIFY `id_status_peg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `stok_barang`
--
ALTER TABLE `stok_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pinjam_barang`
--
ALTER TABLE `pinjam_barang`
  ADD CONSTRAINT `id_barang_join` FOREIGN KEY (`id_barang`) REFERENCES `stok_barang` (`id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
