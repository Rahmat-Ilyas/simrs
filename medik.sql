-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08 Jul 2019 pada 08.05
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id`, `id_akun`, `username`, `password`) VALUES
(1, 1, 'admin', '$2y$10$Ox5esXmqfdfjX/DZlDHERunGJQqYaXcWdMX7RdS4m41ejcHt28iWK'),
(2, 2, 'namadokter', '$2y$10$j7cKilFnbOGvTBQHoEMmPuZSqqohhuQe2IzIJOglFdtaHSSx6E5XS'),
(3, 3, 'namastaf', '$2y$10$06Xn3ToRfXQqG3U2nLjtKuwtPcpy.SqTA/CVGUuKyuzm2/DKk1e/C');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang_kantor`
--

CREATE TABLE `tb_barang_kantor` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang_kantor`
--

INSERT INTO `tb_barang_kantor` (`id`, `nama_barang`, `jumlah`) VALUES
(1, 'Komputer', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang_pelayanan`
--

CREATE TABLE `tb_barang_pelayanan` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang_pelayanan`
--

INSERT INTO `tb_barang_pelayanan` (`id`, `nama_barang`, `jumlah`) VALUES
(1, 'Ambulance', 3),
(2, 'Ranjang Bersalin', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_diagnosa_penyakit`
--

CREATE TABLE `tb_diagnosa_penyakit` (
  `id` int(11) NOT NULL,
  `kd_penyakit` varchar(10) NOT NULL,
  `nama_penyakit` varchar(50) NOT NULL,
  `ciri_ciri` text NOT NULL,
  `keterangan` text NOT NULL,
  `ciri_umum` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_diagnosa_penyakit`
--

INSERT INTO `tb_diagnosa_penyakit` (`id`, `kd_penyakit`, `nama_penyakit`, `ciri_ciri`, `keterangan`, `ciri_umum`) VALUES
(1, 'TPS0001', 'Tipes', 'Demam tinggi beberapa hari', 'Diberikan obat yang tepat', 'Sakit kepala disertai mual');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dokter`
--

CREATE TABLE `tb_dokter` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `spesialis` varchar(50) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_dokter`
--

INSERT INTO `tb_dokter` (`id`, `nama`, `spesialis`, `telepon`, `status`) VALUES
(9, 'dr. Harinjg', 'Dokter Umum', '085242657206', 'aktif'),
(10, 'dr. Rahmat Ilyas, S.Kom', 'Dokter Umum', '085287345666', 'aktif'),
(11, 'dr. Azwar Bahar S.Komputer', 'Dokter Sikuyuang', '098765432112', 'aktif'),
(12, 'Muhammad Ilham S.Kom', 'Spesialis Hati', '1213141516', 'aktif'),
(13, 'dr. miftahul khair', 'Anak', '12345678900', 'aktif'),
(16, 'dr. Wahyuni', 'Mata', '2434234243', 'aktif'),
(17, 'ilham', 'spesialis tulang', '24344645', 'aktif'),
(20, 'ilhaaam', 'spesialis tulang', '09867545534234', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori_ruangan`
--

CREATE TABLE `tb_kategori_ruangan` (
  `id` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori_ruangan`
--

INSERT INTO `tb_kategori_ruangan` (`id`, `kategori`) VALUES
(2, 'Ruang UGD'),
(3, 'Ruang IGD'),
(4, 'Ruang Perawatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori_tindakan`
--

CREATE TABLE `tb_kategori_tindakan` (
  `id` int(11) NOT NULL,
  `kd_kategori` varchar(10) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori_tindakan`
--

INSERT INTO `tb_kategori_tindakan` (`id`, `kd_kategori`, `nama_kategori`) VALUES
(1, 'JT001', 'Tindakan Jantung'),
(2, 'GG001', 'Tindakan Gigi'),
(3, 'HT001', 'Tindakan Hati');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas_ruangan`
--

CREATE TABLE `tb_kelas_ruangan` (
  `id` int(11) NOT NULL,
  `kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kelas_ruangan`
--

INSERT INTO `tb_kelas_ruangan` (`id`, `kelas`) VALUES
(1, 'Kelas I'),
(2, 'Kelas II'),
(3, 'Kelas III'),
(4, 'VIP I');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_laporan_pengadaan`
--

CREATE TABLE `tb_laporan_pengadaan` (
  `id` int(11) NOT NULL,
  `kd_obat` int(11) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `harga_beli` double NOT NULL,
  `harga_jual` double NOT NULL,
  `stok` int(11) NOT NULL,
  `tggl_kadaluarsa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_laporan_pengadaan`
--

INSERT INTO `tb_laporan_pengadaan` (`id`, `kd_obat`, `nama_obat`, `harga_beli`, `harga_jual`, `stok`, `tggl_kadaluarsa`) VALUES
(1, 1, 'Paramex', 2000, 5000, 20, '2019-06-30'),
(2, 4, 'Lolicandy', 20000, 100000, 30, '2023-06-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_obat_dan_alkes`
--

CREATE TABLE `tb_obat_dan_alkes` (
  `id` int(11) NOT NULL,
  `kd_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `harga` double NOT NULL,
  `stok` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `tggl_kadaluarsa` date NOT NULL,
  `no_rak` int(11) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_obat_dan_alkes`
--

INSERT INTO `tb_obat_dan_alkes` (`id`, `kd_barang`, `nama_barang`, `keterangan`, `jenis`, `harga`, `stok`, `status`, `tggl_kadaluarsa`, `no_rak`, `nama_supplier`) VALUES
(2, 'BRG-2', 'Paramex', 'Obat sakit kepala', 'Sachet', 20000, 20, 'tersedia', '2024-02-12', 23, 'PT. Media Farma'),
(3, 'BRG-3', 'Insana', 'obat anak', 'Kapsul', 20000, 20, 'tersedia', '2023-08-17', 221, 'PT. Media Farma');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_paramedik`
--

CREATE TABLE `tb_paramedik` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `spesialis` varchar(50) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_paramedik`
--

INSERT INTO `tb_paramedik` (`id`, `nama`, `spesialis`, `telepon`, `status`) VALUES
(1, 'Herawati', 'Anak', '089234876456', 'aktif'),
(3, 'azwar', 'bedah', '098675452', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pemeriksaan_lab`
--

CREATE TABLE `tb_pemeriksaan_lab` (
  `id` int(11) NOT NULL,
  `kd_priksa` varchar(10) NOT NULL,
  `nama_priksa` varchar(50) NOT NULL,
  `tarif` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pemeriksaan_lab`
--

INSERT INTO `tb_pemeriksaan_lab` (`id`, `kd_priksa`, `nama_priksa`, `tarif`) VALUES
(1, 'DR', 'Dara Rutin', 45000),
(2, 'SB', 'Suhu Badan', 10000),
(3, 'GD', 'Gula Darah', 50000),
(4, '', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pendaftaran`
--

CREATE TABLE `tb_pendaftaran` (
  `id` int(11) NOT NULL,
  `no_registrasi` int(11) NOT NULL,
  `no_rawat` int(11) NOT NULL,
  `tggl_masuk` date NOT NULL,
  `cara_masuk` varchar(50) NOT NULL,
  `ruang_rawat` varchar(50) NOT NULL,
  `poli_tujuan` varchar(50) NOT NULL,
  `dokter_pj` varchar(50) NOT NULL,
  `jenis_bayar` varchar(50) NOT NULL,
  `asal_rujukan` varchar(50) NOT NULL,
  `no_rm` varchar(30) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `tggl_lahir` date NOT NULL,
  `pj` varchar(50) NOT NULL,
  `hubungan_pj` varchar(50) NOT NULL,
  `alamat_pj` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pendaftaran`
--

INSERT INTO `tb_pendaftaran` (`id`, `no_registrasi`, `no_rawat`, `tggl_masuk`, `cara_masuk`, `ruang_rawat`, `poli_tujuan`, `dokter_pj`, `jenis_bayar`, `asal_rujukan`, `no_rm`, `nama_pasien`, `tggl_lahir`, `pj`, `hubungan_pj`, `alamat_pj`) VALUES
(5, 4, 5, '2019-06-28', 'Rawat Inap', 'Melati', '', 'dr. Rahmat Ilyas, S.Kom', 'BPJS', 'Bulukumba', 'RM4-5', 'Awalia', '1998-02-14', 'Liliana', 'Ibu', 'Bulukumba'),
(6, 5, 1, '2019-06-28', 'Rawat Jalan', '', 'Poli Umum', 'dr. Harinjg', 'Normal', 'Puskesmas Tanete', 'RM5-1', 'Rahmat', '1998-02-14', 'Rahmatia', 'Ibu', 'Karangpuang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_poli`
--

CREATE TABLE `tb_poli` (
  `id` int(11) NOT NULL,
  `nama_poli` varchar(50) NOT NULL,
  `dokter` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_poli`
--

INSERT INTO `tb_poli` (`id`, `nama_poli`, `dokter`) VALUES
(1, 'Poli Gigi', 'dr. Rahmat Ilyas, S.Kom'),
(3, 'Poli Umum', 'Muhammad Ilham S.Kom'),
(4, 'Poli Jantung', 'Muhammad Ilham S.Kom');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ruangan`
--

CREATE TABLE `tb_ruangan` (
  `id` int(11) NOT NULL,
  `nama_ruangan` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `no_kamar` varchar(11) NOT NULL,
  `no_tt` varchar(11) NOT NULL,
  `tarif` double NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_ruangan`
--

INSERT INTO `tb_ruangan` (`id`, `nama_ruangan`, `kelas`, `kategori`, `no_kamar`, `no_tt`, `tarif`, `status`) VALUES
(10, 'Melati', 'Kelas I', 'Ruang Perawatan', '1', '1', 100000, 'Tersedia'),
(12, 'Angreg', 'Kelas I', 'Ruang UGD', '2', '3', 100000, 'Tersedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sub_pemeriksaan_lab`
--

CREATE TABLE `tb_sub_pemeriksaan_lab` (
  `id` int(11) NOT NULL,
  `id_priksa` int(11) NOT NULL,
  `kd_sub_priksa` varchar(10) NOT NULL,
  `nama_sub_priksa` varchar(50) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `nilai_rujukan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_sub_pemeriksaan_lab`
--

INSERT INTO `tb_sub_pemeriksaan_lab` (`id`, `id_priksa`, `kd_sub_priksa`, `nama_sub_priksa`, `satuan`, `nilai_rujukan`) VALUES
(1, 2, 'SB001', 'Tinggi suhu badan', 'celcius', 10),
(2, 1, 'DR0001', 'Pemeriksaan tekanan darah', 'Hg', 95),
(6, 1, 'DR0002', 'Pemeriksaan tekanan darah putih', 'Hg', 100),
(7, 1, 'DR0003', 'Kecepatan peredaran darah', 'm', 100),
(10, 3, 'GD0007', 'Pemeriksan jumlah glukosa', 'gram', 100),
(11, 1, 'DR0010', 'Kecepatan peredaran darah', 'mm', 100),
(12, 2, 'SB0011', 'Pemeriksaan demam', 'celcius', 40);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `id` int(11) NOT NULL,
  `kd_supplier` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telepon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_supplier`
--

INSERT INTO `tb_supplier` (`id`, `kd_supplier`, `nama`, `alamat`, `telepon`) VALUES
(2, '0909', 'CV. Hrt', 'Jl. Kemakmuran', '085287345666'),
(3, '7888', 'CV. Hartono', 'Jl. Kemakmuran', '085242657206'),
(4, '3344', 'PT. Media Farma', 'Jl. Kemakmuran', '08763345223');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tindakan`
--

CREATE TABLE `tb_tindakan` (
  `id` int(11) NOT NULL,
  `kd_tindakan` varchar(10) NOT NULL,
  `nama_tindakan` varchar(50) NOT NULL,
  `tarif` double NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `poli` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_tindakan`
--

INSERT INTO `tb_tindakan` (`id`, `kd_tindakan`, `nama_tindakan`, `tarif`, `kategori`, `poli`) VALUES
(1, '001', 'Operasi Jantung Mendadak', 20000000, 'Tindakan Jantung', 'Poli Umum'),
(2, '12', 'hihihi', 600000000, 'Tindakan Gigi', 'Poli Gigi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_akun` (`id_akun`);

--
-- Indexes for table `tb_barang_kantor`
--
ALTER TABLE `tb_barang_kantor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_barang_pelayanan`
--
ALTER TABLE `tb_barang_pelayanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_diagnosa_penyakit`
--
ALTER TABLE `tb_diagnosa_penyakit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_dokter`
--
ALTER TABLE `tb_dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kategori_ruangan`
--
ALTER TABLE `tb_kategori_ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kategori_tindakan`
--
ALTER TABLE `tb_kategori_tindakan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kelas_ruangan`
--
ALTER TABLE `tb_kelas_ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_laporan_pengadaan`
--
ALTER TABLE `tb_laporan_pengadaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_obat_dan_alkes`
--
ALTER TABLE `tb_obat_dan_alkes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_paramedik`
--
ALTER TABLE `tb_paramedik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pemeriksaan_lab`
--
ALTER TABLE `tb_pemeriksaan_lab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_poli`
--
ALTER TABLE `tb_poli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_sub_pemeriksaan_lab`
--
ALTER TABLE `tb_sub_pemeriksaan_lab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_tindakan`
--
ALTER TABLE `tb_tindakan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_barang_kantor`
--
ALTER TABLE `tb_barang_kantor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_barang_pelayanan`
--
ALTER TABLE `tb_barang_pelayanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_diagnosa_penyakit`
--
ALTER TABLE `tb_diagnosa_penyakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_dokter`
--
ALTER TABLE `tb_dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tb_kategori_ruangan`
--
ALTER TABLE `tb_kategori_ruangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_kategori_tindakan`
--
ALTER TABLE `tb_kategori_tindakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_kelas_ruangan`
--
ALTER TABLE `tb_kelas_ruangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_laporan_pengadaan`
--
ALTER TABLE `tb_laporan_pengadaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_obat_dan_alkes`
--
ALTER TABLE `tb_obat_dan_alkes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_paramedik`
--
ALTER TABLE `tb_paramedik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_pemeriksaan_lab`
--
ALTER TABLE `tb_pemeriksaan_lab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_poli`
--
ALTER TABLE `tb_poli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_sub_pemeriksaan_lab`
--
ALTER TABLE `tb_sub_pemeriksaan_lab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_tindakan`
--
ALTER TABLE `tb_tindakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
