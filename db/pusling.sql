-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 04 Okt 2020 pada 10.22
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pusling`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `kode_buku` varchar(255) NOT NULL,
  `klasifikasi` varchar(255) DEFAULT NULL,
  `judul` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tempat_terbit` varchar(255) NOT NULL,
  `call_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `kode_buku`, `klasifikasi`, `judul`, `pengarang`, `penerbit`, `tempat_terbit`, `call_number`) VALUES
(1, '0001', 'Sosial', 'Laskar Pelangi', 'Rivaldi', 'SmartTyti', 'Bandung', '123'),
(2, '0002', 'Sosial', 'Laskar Pelangi', 'Rivaldi', 'SmartTyti', 'Bandung', '123'),
(3, '0003', 'Sosial', 'Laskar Pelangi', 'Rivaldi', 'SmartTyti', 'Bandung', '123'),
(4, '0004', 'Sosial', 'Laskar Pelangi', 'Rivaldi', 'SmartTyti', 'Bandung', '123'),
(5, '0005', 'Sosial', 'Laskar Pelangi', 'Rivaldi', 'SmartTyti', 'Bandung', '123'),
(6, '0006', 'Sosial', 'Laskar Pelangi', 'Rivaldi', 'SmartTyti', 'Bandung', '123'),
(7, '0007', 'Sosial', 'Laskar Pelangi', 'Rivaldi', 'SmartTyti', 'Bandung', '123'),
(8, '0008', 'Sosial', 'Laskar Pelangi', 'Rivaldi', 'SmartTyti', 'Bandung', '123'),
(9, '0009', 'Sosial', 'Laskar Pelangi', 'Rivaldi', 'SmartTyti', 'Bandung', '123'),
(10, '0010', 'Sosial', 'Laskar Pelangi', 'Rivaldi', 'SmartTyti', 'Bandung', '123'),
(11, '0011', 'Sosial', 'Laskar Pelangi', 'Rivaldi', 'SmartTyti', 'Bandung', '123'),
(12, '0012', 'Sosial', 'Laskar Pelangi', 'Rivaldi', 'SmartTyti', 'Bandung', '123'),
(13, '0013', '008', 'Rekayasa Sosial', 'Septian', 'SmartTyti', 'Bandung', '008 SEP p'),
(14, '0014', '008', 'Rekayasa Sosial', 'Septian', 'SmartTyti', 'Bandung', '008 SEP p');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `waktu` varchar(100) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `waktu`, `judul`, `keterangan`, `gambar`) VALUES
(30, '20-08-2020', 'Keren, Gerbang Maca Indramayu Masuk 8 Besar Sinovik Terbaik Di Jabar', '<p>Keren, Gerbang Maca Indramayu Masuk 8 Besar Sinovik Terbaik Di Jabar</p>\r\n', 'ca736da6348c327973c037d66a44e5ac.jpg'),
(31, '20-08-2020', 'WUJUDKAN GERBANG MACA, DISARPUS INDRAMAYU ANTAR JEMPUT PEMUSTAKA GUNAKAN BUS', '<p><strong>INDRAMAYU</strong>&nbsp;&ndash; Langkah inovatif dan terobosan kembali dilakukan oleh Dinas Kearsipan dan Perpustakaan Kabupaten Indramayu. Guna mewujudkan program Gerbang Maca sejak dini bagi masyarakat Kabupaten Indramayu, Disarpus melakukan antar jemput bagi para pemustaka dengan gunakan bus secara gratis.</p>\r\n', '147cca6def91718d64b5a12a9ade259c.jpg'),
(32, '20-08-2020', 'Generasi Millineal Indramayu Grudug Disarpus Indramayu Beli Buku', '<p>Generasi Millineal Indramayu Grudug Disarpus Indramayu Beli Buku</p>\r\n', '66c8f5c8d48e636acdec2726f1dcbbe6.jpg'),
(33, '20-08-2020', 'Disarpus Indramayu Gelar Lomba Bercerita Dimasa Pandemi Covid 19', '<p>Disarpus Indramayu Gelar Lomba Bercerita Dimasa Pandemi Covid 19</p>\r\n', '72737f9eb350876c9e867eba7481f2e9.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `lokasi` text NOT NULL,
  `status` enum('1','0') NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `waktu`, `lokasi`, `status`, `latitude`, `longitude`) VALUES
(4, '0000-00-00 00:00:00', 'Dukuh', '1', '-6.377741559315982', '108.32141876220705'),
(5, '2020-10-24 13:30:00', 'Sindang', '1', '-6.332616144972457', '108.31944465637208'),
(6, '2020-10-31 13:00:00', 'Tirtamaya', '1', '-6.336113719208537', '108.33043098449708'),
(7, '2020-10-31 02:48:00', 'Penganjang', '1', '-6.3332889', '108.3104681');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id_kendaraan` int(11) NOT NULL,
  `kode_kendaraan` varchar(255) NOT NULL,
  `jenis_kendaraan` enum('Motor','Mobil') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kendaraan`
--

INSERT INTO `kendaraan` (`id_kendaraan`, `kode_kendaraan`, `jenis_kendaraan`) VALUES
(4, 'E4437P', 'Motor'),
(5, 'B9896PQV', 'Mobil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `klasifikasi`
--

CREATE TABLE `klasifikasi` (
  `id_klasifikasi` int(11) NOT NULL,
  `klasifikasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `klasifikasi`
--

INSERT INTO `klasifikasi` (`id_klasifikasi`, `klasifikasi`) VALUES
(1, 'Agama'),
(2, 'Umum'),
(4, 'Filsafat'),
(5, 'Sosial'),
(6, 'Bahasa'),
(7, 'Sains'),
(8, 'Teknologi'),
(9, 'Seni dan Rekreasi'),
(10, 'Literatur'),
(11, 'Sejarah'),
(12, 'Psikologi'),
(13, 'Rekreasi\r\n'),
(14, 'Sastra'),
(15, 'Geografis\r\n'),
(16, 'Matematika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `alamat`, `no_hp`, `email`) VALUES
(1, '<p>Jl. MT Haryono Nomor 49 Indramayu - Jawa Barat</p>\r\n', '0234277139', 'arpusindramayu7@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL,
  `tgl_laporan` datetime NOT NULL DEFAULT current_timestamp(),
  `nama` varchar(255) NOT NULL,
  `nama_ast` varchar(255) NOT NULL,
  `nama_sup` varchar(255) NOT NULL,
  `jenis_pusling` enum('Motor','Mobil') NOT NULL,
  `kode_kendaraan` varchar(255) NOT NULL,
  `alamat_lokasi` text NOT NULL,
  `nama_pengelola` varchar(255) NOT NULL,
  `no_pengelola` varchar(13) NOT NULL,
  `tot_pengunjung` int(255) NOT NULL,
  `tot_lk` int(255) NOT NULL,
  `tot_pr` int(255) NOT NULL,
  `gambar` text NOT NULL,
  `gambar2` text NOT NULL,
  `gambar3` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status_notif` enum('unread','read') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `tgl_laporan`, `nama`, `nama_ast`, `nama_sup`, `jenis_pusling`, `kode_kendaraan`, `alamat_lokasi`, `nama_pengelola`, `no_pengelola`, `tot_pengunjung`, `tot_lk`, `tot_pr`, `gambar`, `gambar2`, `gambar3`, `created_at`, `status_notif`) VALUES
(89, '2020-08-06 01:29:46', 'irfan', 'ade', 'Denny', 'Motor', 'E4437P', 'Lemahabang, Indramayu, Indramayu Regency, West Java 45212, Indonesia', '', '089654321987', 10, 5, 5, '827d443dd1c593af369e5de615114743.jpg', '', '', '2020-08-06 01:29:46', 'read'),
(90, '2020-08-18 01:28:39', 'Faris Faisal Mohammad', 'Septian', 'Irfan', 'Mobil', 'B9896PQV', 'jl. lohbener lama No.08, Legok, Kec. Lohbener, Kabupaten Indramayu, Jawa Barat 45252, Indonesia', '', '789456123', 100, 50, 50, 'bf61603807d5974ad4be929f273ab2eb.jpeg', '', '', '2020-08-18 01:28:39', 'read'),
(91, '2020-08-18 19:13:08', 'Faris Faisal Mohammad', 'Irfan', 'Septian', 'Mobil', 'B9896PQV', 'qdwqwd', '', '787451', 10, 5, 5, '27e6b7d132e394c3b006c96c0dd5de5d.jpeg', '', '', '2020-08-18 19:13:08', 'read'),
(92, '2020-08-20 11:43:22', 'Faris Faisal Mohammad', 'Irfan', 'Septian', 'Mobil', 'B9896PQV', 'jl. lohbener lama No.08, Legok, Kec. Lohbener, Kabupaten Indramayu, Jawa Barat 45252, Indonesia', '', '089654321', 100, 50, 50, '47674cf8a6a006070a3dd2564cc1b9c4.jpg', '', '', '2020-08-20 11:43:22', 'read'),
(93, '2020-08-20 11:44:40', 'Syahndra', 'Irfan', 'Septian', 'Motor', 'E4437P', 'Jatibarang, Indramayu Regency, West Java, Indonesia', '', '08232165497', 20, 10, 10, 'bf09ffe729e88490ebbf5a19d4da2e61.jpg', '', '', '2020-08-20 11:44:40', 'read'),
(94, '2020-08-23 04:15:10', 'Faris Faisal Mohammad', 'Ade Kurnawan', 'Fasha Muhani', 'Mobil', 'B9896PQV', 'jl. lohbener lama No.08, Legok, Kec. Lohbener, Kabupaten Indramayu, Jawa Barat 45252, Indonesia', '', '0896543321', 2, 1, 1, '7fd494a97612d95f819fcf5f9ef4aa61.png', '', '', '2020-08-23 04:15:10', 'read'),
(95, '2020-08-24 15:51:32', 'Faris Faisal Mohammad', 'Ade Kurnawan', 'Fasha Muhani', 'Mobil', 'B9896PQV', 'jl. lohbener lama No.08, Legok, Kec. Lohbener, Kabupaten Indramayu, Jawa Barat 45252, Indonesia', '', '089654321', 2, 1, 1, 'a7fb5716c914109d492e369cc3fc6ce4.png', '', '', '2020-08-24 15:51:32', 'read'),
(96, '2020-08-24 23:59:17', 'Faris Faisal Mohammad', 'Ade Kurnawan', 'Fasha Muhani', 'Mobil', 'B9896PQV', 'jl. lohbener lama No.08, Legok, Kec. Lohbener, Kabupaten Indramayu, Jawa Barat 45252, Indonesia', '', '089654321', 2, 1, 1, '88e3dc09cf905109c5bd598b10d41a9e.jpg', '', '', '2020-08-24 23:59:17', 'read'),
(97, '2020-09-15 00:56:14', 'Faris Faisal Mohammad', 'Ade Kurnawan', 'Fasha Muhani', 'Mobil', 'B9896PQV', 'jl. lohbener lama No.08, Legok, Kec. Lohbener, Kabupaten Indramayu, Jawa Barat 45252, Indonesia', '', '08965432145', 0, 0, 0, '0c18acef59240c7b318a64ded3a8d1f1.jpg', '', '', '2020-09-15 00:56:14', 'read'),
(98, '2020-09-17 21:22:48', 'Faris Faisal Mohammad', 'Ade Kurnawan', 'Faris Faisal Mohammad', 'Mobil', 'B9896PQV', 'Jl. MT Haryono No.49, RT 1, Penganjang, Sindang, Kabupaten Indramayu, Jawa Barat 45222, Indonesia', '', '56164', 0, 0, 0, '89a61e3afa15f1d32bef61c44cbfd760.jpg', 'f3e81cf08aa4a7dc72bc906652137cd9.jpg', '', '2020-09-17 21:22:48', 'read'),
(99, '2020-09-17 21:31:01', 'Faris Faisal Mohammad', 'Ade Kurnawan', 'Fasha Muhani', 'Mobil', 'B9896PQV', 'jl. lohbener lama No.08, Legok, Kec. Lohbener, Kabupaten Indramayu, Jawa Barat 45252, Indonesia', '', '08965432145', 0, 0, 0, 'abe5767e334d97d057c65bfa37186d45.jpg', '548b4d1d0617fc6c027046557df8e694.jpg', '2ee13172f62990744fa5016fc2c4974b.jpg', '2020-09-17 21:31:01', 'read'),
(100, '2020-10-01 13:18:00', 'Faris Faisal Mohammad', 'Faris Faisal Mohammad', 'Faris Faisal Mohammad', 'Mobil', 'B9896PQV', 'Jalur Lohbener-Cirebon No.35, Penganjang, Sindang, Kabupaten Indramayu, Jawa Barat 45221, Indonesia', 'Sugeng', '0884545', 2, 2, 0, 'fd5312750e7a250e51d7a27545fe27f5.png', '7d2ac867ec577258a23c99eb8da0fe82.png', '', '2020-10-01 13:18:00', 'unread'),
(101, '2020-10-01 13:35:26', 'Faris Faisal Mohammad', 'Faris Faisal Mohammad', 'Ade Kurnawan', 'Mobil', 'B9896PQV', 'Jl. MT Haryono No.5, Penganjang, Sindang, Kabupaten Indramayu, Jawa Barat 45221, Indonesia', 'Sugeng', '0884545', 2, 2, 0, '50a12deda23a7d689195a7dd1bfc423a.png', 'efeb23f781e80b8ecf2a9762a13dd2c4.png', '', '2020-10-01 13:35:26', 'unread');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_buku`
--

CREATE TABLE `laporan_buku` (
  `id_laporan_buku` int(11) NOT NULL,
  `klasifikasi` varchar(255) NOT NULL,
  `id_users` int(11) NOT NULL,
  `kode_buku` varchar(255) NOT NULL,
  `nama_pembaca` varchar(255) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tempat_terbit` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('baca','kembali') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `laporan_buku`
--

INSERT INTO `laporan_buku` (`id_laporan_buku`, `klasifikasi`, `id_users`, `kode_buku`, `nama_pembaca`, `kategori`, `judul`, `pengarang`, `penerbit`, `tempat_terbit`, `jenis_kelamin`, `tanggal`, `status`) VALUES
(84, '5', 62, 'A001', 'Supri', 'SMA/SMK/MA', 'Rekayasa Sosial', 'Rivaldi', 'SmartTyti', 'Bandung', 'Pria', '2020-09-22', 'kembali'),
(85, '5', 62, 'A001', 'Sugeng', 'Mahasiswa', 'Rekayasa Sosial', 'Rivaldi', 'SmartTyti', 'Bandung', 'Pria', '2020-09-25', 'kembali'),
(86, '7', 62, 'KK01', 'Sugeng', 'Mahasiswa', 'Laskar Pelangi', 'Septian', 'SmartTyti', 'Bandung', 'Pria', '2020-09-25', 'kembali'),
(87, '5', 62, 'A001', 'Sugeng', 'Mahasiswa', 'Rekayasa Sosial', 'Rivaldi', 'SmartTyti', 'Bandung', 'Pria', '2020-09-30', 'kembali'),
(88, '7', 62, 'KK01', 'Sugeng', 'Mahasiswa', 'Laskar Pelangi', 'Septian', 'SmartTyti', 'Bandung', 'Pria', '2020-09-30', 'kembali'),
(89, 'Sosial', 62, '0001', 'Sugeng', 'Mahasiswa', 'Laskar Pelangi', 'Rivaldi', 'SmartTyti', 'Bandung', 'Pria', '2020-10-01', 'kembali'),
(90, 'Sosial', 62, '0003', 'Andre', 'Mahasiswa', 'Laskar Pelangi', 'Rivaldi', 'SmartTyti', 'Bandung', 'Pria', '2020-10-01', 'kembali');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`id_profil`, `judul`, `isi`, `gambar`) VALUES
(1, 'Sejarah Lembaga', '<p>Peraturan Daerah Kabupaten Daerah tingkat II Indramayu No. 14 tahun 1994 tentang Organisasi dan Tata Kerja Kantor Arsip Daerah Kabupaten Daerah Tingkat II Indramayu. Peraturan Daerah&nbsp; Kabupaten Daerah tingakat II Indramayu No.13 tahun 1995 tentang Oraganisasi dan Tata Kerja Kantor Arsip Daerah Kabupaten Daerah Tingkat II Indramayu. Kantor Arsip Daerah dibentuk pada tanggal 9 Januari 1997.</p>\r\n\r\n<p>Pada tanggal 7 April 2001 disatukannya antara Kantor Arsip dan Perpustakaan Umum Daerah Kabupaten Daerah Tingkat II Indramayu yang&nbsp;</p>\r\n\r\n<p>berada dibawah dan bertanggung jawab langsung kepada Bupati melalui Sekretaris Daerah.Peraturan Daerah Nomor 19 Tahun 2002 tentang Penataan dan Pembentukan Lembaga Perangkat Daerah Kabupaten Indramayu.Keputusan Bupati Indramayu Nomor 26 Tahun 2002 tentang Organisasi dan Tata Kerja Kantor Arsip dan Perpustakaan Kabupaten Indramayu.</p>\r\n\r\n<p>Berdasarkan Peraturan Daerah Kabupaten Indramayu Nomor 9 Tahun 2016 tentang Pembentukan dan Susunan Perangkat Daerah Kabupaten Indramayu dan ditegaskan dalam Peraturan Bupati Indramayu No. 58 Tahun 2016 tentang Organisasi dan tata kerja Dinas Kerasipan dan Perpustakaan Kabupaten Indramayu. Berdasarkan Peraturan diatas yang semula Kantor Arsip dan Perpustakaan ditetapkan menjadi Dinas Kearsipan dan Perpustakaaan.</p>\r\n', '4f1f40881d2f136ffafa972be00ba51e.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pustakawan`
--

CREATE TABLE `pustakawan` (
  `id_pustakawan` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `nama_pustakawan` varchar(255) NOT NULL,
  `telp_pustakawan` varchar(15) NOT NULL,
  `alamat_pustakawan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pustakawan`
--

INSERT INTO `pustakawan` (`id_pustakawan`, `id_users`, `nama_pustakawan`, `telp_pustakawan`, `alamat_pustakawan`) VALUES
(2, 62, 'Faris Faisal Mohammad', '081385339611', 'Jl. Raya Tambi Lor Blok Bantar'),
(3, 63, 'Ade Kurnawan', '089654987789', 'Desa Krasak'),
(4, 64, 'Fasha Muhani', '087654321123', 'Jl Raya Kertasemaya, Desa Kertasemaya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimoni`
--

CREATE TABLE `testimoni` (
  `id_testimoni` int(11) NOT NULL,
  `waktu` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `komentar` text NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `testimoni`
--

INSERT INTO `testimoni` (`id_testimoni`, `waktu`, `nama`, `komentar`, `jabatan`, `gambar`) VALUES
(29, '20-08-2020', 'Faris Faisal Mohammad', '<p>sukses dan sehat selalu bro</p>\r\n', 'Mahasiswa', '8ce3a036524eff19cf4e5a7cf3af6937.jpg'),
(30, '20-08-2020', 'Fasha Muhani', '<p>Mantap sangan bermanfaat</p>\r\n', 'Mahasiswa', '37fadf0f20a0c7bc2849481c2c301e52.jpg'),
(31, '20-08-2020', 'Ade Kurnawan', '<p>Mantap ini keren</p>\r\n', 'Mahasiswa', 'f2bf29140e080d96ddbf79d9806f4521.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `tanggal_dibuat` date NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `role` enum('superadmin','pustakawan','kasi','kabid') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `tanggal_dibuat`, `username`, `password`, `nama_user`, `role`) VALUES
(48, '2020-06-30', 'kasi', 'b68fcc3e90e4fecf7182587472526728', 'Kepala Seksi', 'kasi'),
(49, '2020-07-07', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'superadmin'),
(62, '2020-08-20', 'farisfaixal', '0c339c91e77220416be396339d66e599', 'Faris Faisal Mohammad', 'pustakawan'),
(63, '2020-08-20', 'adekurnawan', 'c6a6f0a7249648f75af23a99f7ed1c63', 'Ade Kurnawan', 'pustakawan'),
(64, '2020-08-20', 'fashamuhani', '037a3b21a4f065e972a09d33023cb685', 'Fasha Muhani', 'pustakawan'),
(67, '2020-08-24', 'pustakawan', '1fa3f5ae016e4b0691eb5c1b4fd9b951', 'testing tambah pustakawan', 'pustakawan'),
(69, '2020-09-25', 'kabid', '6d6827e38b382572cc5be098158174d3', 'Kepala Bidang', 'kabid');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indeks untuk tabel `klasifikasi`
--
ALTER TABLE `klasifikasi`
  ADD PRIMARY KEY (`id_klasifikasi`);

--
-- Indeks untuk tabel `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indeks untuk tabel `laporan_buku`
--
ALTER TABLE `laporan_buku`
  ADD PRIMARY KEY (`id_laporan_buku`),
  ADD KEY `id_users` (`id_users`);

--
-- Indeks untuk tabel `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indeks untuk tabel `pustakawan`
--
ALTER TABLE `pustakawan`
  ADD PRIMARY KEY (`id_pustakawan`),
  ADD KEY `id_users` (`id_users`);

--
-- Indeks untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id_testimoni`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `klasifikasi`
--
ALTER TABLE `klasifikasi`
  MODIFY `id_klasifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT untuk tabel `laporan_buku`
--
ALTER TABLE `laporan_buku`
  MODIFY `id_laporan_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT untuk tabel `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pustakawan`
--
ALTER TABLE `pustakawan`
  MODIFY `id_pustakawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id_testimoni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `laporan_buku`
--
ALTER TABLE `laporan_buku`
  ADD CONSTRAINT `laporan_buku_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pustakawan`
--
ALTER TABLE `pustakawan`
  ADD CONSTRAINT `pustakawan_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
