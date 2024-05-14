-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Bulan Mei 2024 pada 13.25
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `example_app`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_cop`
--

CREATE TABLE `daftar_cop` (
  `id` char(36) NOT NULL,
  `seafare_code` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `jenis_sertifikat_cop` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `kabupaten_kota` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kelurahan_desa` varchar(255) NOT NULL,
  `rt_rw` varchar(255) NOT NULL,
  `kode_pos` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `nama_ibu` varchar(255) NOT NULL,
  `nama_ayah` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `daftar_cop`
--

INSERT INTO `daftar_cop` (`id`, `seafare_code`, `nama_lengkap`, `jenis_kelamin`, `jenis_sertifikat_cop`, `pekerjaan`, `agama`, `alamat`, `provinsi`, `kabupaten_kota`, `kecamatan`, `kelurahan_desa`, `rt_rw`, `kode_pos`, `tanggal_lahir`, `tempat_lahir`, `status`, `nama_ibu`, `nama_ayah`, `foto`, `no_telp`, `email`, `created_at`, `updated_at`) VALUES
('4d24f148-0c47-4cc7-9f58-f51e450bb08e', '1246888900964112', 'Bagus Prasetya Budi', 'Laki - Laki', 'MFA', 'Mahasiswa', 'Islam', 'Langlang', 'Jawa Timur', 'Kabupaten Malang', 'Singosari', 'Desa Langlang', '04/02', '311150', '2002-02-12', 'Malang', 'Belum Menikah', 'Intan', 'Pandu', '1715003068_Screenshot 2024-05-01 174114.png', '081357114923', 'bagusprasetya@gmail.com', '2024-05-06 06:44:29', '2024-05-06 06:44:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_gmdss`
--

CREATE TABLE `daftar_gmdss` (
  `id` char(36) NOT NULL,
  `seafare_code` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `kewarganegaraan` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `kabupaten_kota` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kelurahan_desa` varchar(255) NOT NULL,
  `kode_pos` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `nama_ibu_kandung` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `daftar_gmdss`
--

INSERT INTO `daftar_gmdss` (`id`, `seafare_code`, `nik`, `nama_lengkap`, `jenis_kelamin`, `pekerjaan`, `kewarganegaraan`, `alamat`, `provinsi`, `kabupaten_kota`, `kecamatan`, `kelurahan_desa`, `kode_pos`, `tanggal_lahir`, `tempat_lahir`, `nama_ibu_kandung`, `foto`, `no_telp`, `email`, `created_at`, `updated_at`) VALUES
('75cfbd37-d3fa-43f2-a3ca-6eaa41859308', '2227272727272727', '1111111111111111', 'Ivan Kristanto Santoso', 'Laki - Laki', 'Mahasiswa', 'WNA', 'Buring ,Sawojajar', 'Jawa Timur', 'Malang', 'Sawojajar', 'Buring', '311150', '2002-10-24', 'Semarang', 'Kartika Aulia Sari', '1715012772_Screenshot 2024-05-02 091904.png', '081357122634', 'ivan@gmail.com', '2024-05-06 09:26:12', '2024-05-06 09:26:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_mcu`
--

CREATE TABLE `daftar_mcu` (
  `id` char(36) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `jabatan_diatas_kapal` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `foto_ktp` varchar(255) NOT NULL,
  `foto_bst` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `daftar_mcu`
--

INSERT INTO `daftar_mcu` (`id`, `nama_lengkap`, `jabatan_diatas_kapal`, `no_telp`, `foto`, `foto_ktp`, `foto_bst`, `created_at`, `updated_at`) VALUES
('660625f5-f4c6-4256-9fa7-a82f392e661e', 'Budi Setiawan', 'Kapten', '081374132655', '1715058514_Screenshot 2024-04-22 205829.png', '1715058798_Screenshot 2024-05-01 185433.png', '1715058798_Screenshot 2024-05-01 185508.png', '2024-05-06 22:08:35', '2024-05-06 22:13:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_reor`
--

CREATE TABLE `daftar_reor` (
  `id` char(36) NOT NULL,
  `pilihan_diklat` varchar(255) NOT NULL,
  `periode_ujian_negara` varchar(255) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `npwp` varchar(16) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `kabupaten_kota` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `nama_instansi` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `nama_ibu` varchar(255) NOT NULL,
  `pekerjaan_ibu` varchar(255) NOT NULL,
  `penghasilan_ibu` varchar(255) NOT NULL,
  `nama_ayah` varchar(255) NOT NULL,
  `pekerjaan_ayah` varchar(255) NOT NULL,
  `penghasilan_ayah` varchar(255) NOT NULL,
  `scan_foto_ktp` varchar(255) DEFAULT NULL,
  `scan_foto_ijazah_terakhir` varchar(255) DEFAULT NULL,
  `scan_foto_akte` varchar(255) DEFAULT NULL,
  `scan_foto_npwp` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `daftar_reor`
--

INSERT INTO `daftar_reor` (`id`, `pilihan_diklat`, `periode_ujian_negara`, `nik`, `npwp`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `provinsi`, `kabupaten_kota`, `kecamatan`, `jenis_kelamin`, `pekerjaan`, `nama_instansi`, `status`, `nama_ibu`, `pekerjaan_ibu`, `penghasilan_ibu`, `nama_ayah`, `pekerjaan_ayah`, `penghasilan_ayah`, `scan_foto_ktp`, `scan_foto_ijazah_terakhir`, `scan_foto_akte`, `scan_foto_npwp`, `foto`, `email`) VALUES
('7a108dcf-12cb-4a3e-9922-007937af2de1', 'SRE-II', 'Maret', '1234567812345678', '2282829292020020', 'M Eri Kusyairi', 'Semarang', '2003-03-21', 'Islam', 'Klampok, Singosari', '081357122634', 'Jawa Timur', 'Malang', 'Lawang', 'Laki - Laki', 'Mahasiswa', 'Universitas Muhammaddyah Malang', 'Belum Menikah', 'Sutrisna', 'Wiraswasta', '8.000.000', 'Sunarto', 'Pemimpin Agama', '8.000.000', '1714966861_Screenshot 2024-04-22 215707.png', '1714966861_Screenshot 2024-05-01 174114.png', '1714966861_Screenshot 2024-05-01 184334.png', '1714966861_Screenshot 2024-05-01 185329.png', '1714966861_Screenshot 2024-04-22 205829.png', 'eri@gmail.com'),
('927677e0-5ef9-420f-a1e0-165f79dd79df', 'SOU-NAUTIKA', 'November', '3515132410040009', '2282829292020021', 'Muhammad Rizal Saputra', 'Surabaya', '2002-02-22', 'Kristen', 'Klampok, Singosari', '081357122634', 'Jawa Timur', 'Malang', 'Singosari', 'Laki - Laki', 'Mahasiswa', 'Institut Teknologi Nasional Malang', 'Belum Menikah', 'Sutri', 'Wiraswasta', '1.000.000', 'Basori', 'Pemimpin Agama', '5.000.000', '1714971942_Screenshot 2024-05-01 185508.png', '1714971942_Screenshot 2024-05-01 192244.png', '1714971942_Screenshot 2024-05-02 091904.png', '1714971942_Screenshot 2024-04-22 215707.png', '1714971942_Screenshot 2024-05-01 185433.png', 'petrussimanjuntak@gmail.com'),
('dceb36ad-693b-4f2b-aaf7-9aae6c129630', 'SOU-REGULAR', 'Februari', '3515132410020029', '2282829290044231', 'Hannes Tigor Hamonangan Sinaga', 'Surabaya', '2002-02-21', 'Kristen', 'Klampok, Singosari', '081357122634', 'Jawa Timur', 'Malang', 'Singosari', 'Laki - Laki', 'Mahasiswa', 'Institut Teknologi Nasional Malang', 'Belum Menikah', 'Herda Verawaty Panggabean', 'Wiraswasta', '8.000.000', 'Dianto Sinaga', 'Wiraswasta', '8.000.000', '1714970748_dark-purple-dreamer-neon-sign-vw5x5pfin5qnfs4l.jpg', '1714970748_Screenshot 2024-04-21 143607.png', '1714970748_Screenshot 2024-05-02 091904.png', '1714970748_Screenshot 2024-05-01 185508.png', '1714970748_StarRail_Image_1689598560.png', 'hannessinaga77@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventory_sertifikat`
--

CREATE TABLE `inventory_sertifikat` (
  `id` char(36) NOT NULL,
  `jenis_sertifikat` varchar(255) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL,
  `no_sertifikat` varchar(255) NOT NULL,
  `status_sertifikat` varchar(255) NOT NULL,
  `foto_sertifikat` varchar(255) NOT NULL,
  `bukti_pengambilan` varchar(255) NOT NULL,
  `bukti_pengiriman` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keuangan`
--

CREATE TABLE `keuangan` (
  `id` bigint(20) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `nomor_bukti` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `berita_pembayaran` varchar(255) NOT NULL,
  `status_pembayaran` varchar(255) NOT NULL,
  `jumlah_uang` float NOT NULL,
  `petugas` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `keuangan`
--

INSERT INTO `keuangan` (`id`, `tanggal_pembayaran`, `nomor_bukti`, `nama`, `berita_pembayaran`, `status_pembayaran`, `jumlah_uang`, `petugas`, `created_at`, `updated_at`) VALUES
(3, '2024-05-07', '0001/I/INV/BharunaBhakti Utama - 2024', 'HANNES TIGOR HAMONANGAN SINAGA', 'Pembayaran Pendaftaran Diklat COP', 'LUNAS', 8000000, 'M Eri Kusyairi', '2024-05-07 06:58:36', '2024-05-07 06:58:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_05_02_160424_pendaftaran_diklat_reor', 2),
(5, '2024_05_03_071931_pendaftaran_diklat_cop', 3),
(6, '2024_05_03_072313_pendaftaran_diklat_gmdss', 3),
(7, '2024_05_06_150958_pendaftaran_sertifikat_mcu', 4),
(8, '2024_05_06_151052_perpanjangan_sertifikat_gmdss', 4),
(9, '2024_05_06_151100_perpanjangan_sertifikat_reor', 4),
(10, '2024_05_07_115615_keuangan', 5),
(11, '2024_05_07_120135_inventory_sertifikat', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perpanjang_gmdss`
--

CREATE TABLE `perpanjang_gmdss` (
  `id` char(36) NOT NULL,
  `seafare_code` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `lembaga_diklat` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `kewarganegaraan` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `kabupaten_kota` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kelurahan_desa` varchar(255) NOT NULL,
  `kode_pos` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `nama_ibu_kandung` varchar(255) NOT NULL,
  `nama_ayah_kandung` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `scan_foto_ijazah_laut` varchar(255) NOT NULL,
  `scan_foto_masa_layar` varchar(255) NOT NULL,
  `scan_foto_mcu` varchar(255) NOT NULL,
  `scan_foto_sertifikat_bst` varchar(255) NOT NULL,
  `scan_foto_ktp` varchar(255) NOT NULL,
  `scan_foto_akte` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `perpanjang_gmdss`
--

INSERT INTO `perpanjang_gmdss` (`id`, `seafare_code`, `nik`, `lembaga_diklat`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `kewarganegaraan`, `alamat`, `no_telp`, `provinsi`, `kabupaten_kota`, `kecamatan`, `kelurahan_desa`, `kode_pos`, `jenis_kelamin`, `pekerjaan`, `status`, `nama_ibu_kandung`, `nama_ayah_kandung`, `foto`, `scan_foto_ijazah_laut`, `scan_foto_masa_layar`, `scan_foto_mcu`, `scan_foto_sertifikat_bst`, `scan_foto_ktp`, `scan_foto_akte`, `email`, `created_at`, `updated_at`) VALUES
('8ef7b244-e0ea-427a-80b5-f67374793031', '2091102359921522', '3515132410020029', 'Politeknik Ilmu Pelayaran Semarang', 'Daffa Noviar Saputra', 'Kediri', '2001-02-12', 'WNI', 'Klampok, Singosari', '081357122634', 'Jawa Timur', 'Malang', 'Singosari', 'Desa Klampok', '311150', 'Laki - Laki', 'Mahasiswa', 'Belum Menikah', 'Sri Nurhayati', 'Sunarto', '1715024554_Screenshot 2024-04-22 205829.png', '1715024554_Screenshot 2024-04-22 215707.png', '1715024554_Screenshot 2024-05-01 174114.png', '1715024554_Screenshot 2024-05-01 184334.png', '1715024554_Screenshot 2024-05-01 185329.png', '1715024554_Screenshot 2024-05-01 185433.png', '1715024554_Screenshot 2024-05-01 185508.png', 'daffa@gmail.com', '2024-05-06 12:42:34', '2024-05-06 12:42:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perpanjang_reor`
--

CREATE TABLE `perpanjang_reor` (
  `id` char(36) NOT NULL,
  `no_sertifikat` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `npwp` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `jenis_sertifikat` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `kabupaten_kota` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kelurahan_desa` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `scan_foto_npwp` varchar(255) NOT NULL,
  `scan_foto_ijazah` varchar(255) NOT NULL,
  `scan_foto_sertifikat` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `perpanjang_reor`
--

INSERT INTO `perpanjang_reor` (`id`, `no_sertifikat`, `nik`, `npwp`, `nama_lengkap`, `jenis_sertifikat`, `tempat_lahir`, `tanggal_lahir`, `agama`, `no_telp`, `alamat`, `provinsi`, `kabupaten_kota`, `kecamatan`, `kelurahan_desa`, `jenis_kelamin`, `foto`, `scan_foto_npwp`, `scan_foto_ijazah`, `scan_foto_sertifikat`, `email`, `created_at`, `updated_at`) VALUES
('cd291b1a-3ff8-4b88-9295-3d055edf02a2', '162277288217239495000', '1234567812345678', '1234567891234567', 'M Bandi Kurniawan', 'SOU', 'Surabaya', '1990-02-22', 'Islam', '081357122634', 'Klampok, Singosari', 'Jawa Timur', 'Malang', 'Blimbing', 'Langlang', 'Laki - Laki', '1715024015_Screenshot 2024-04-22 205829.png', '1715024015_Screenshot 2024-04-22 215707.png', '1715024015_Screenshot 2024-05-01 174114.png', '1715024015_Screenshot 2024-05-01 184334.png', 'mbandi@gmail.com', '2024-05-06 12:33:35', '2024-05-06 12:33:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0H1dS1CTetWJJSHVdBc1618wM26Om42BdE8Mo3oC', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVDZyaFZrRFVTQnJBZktmb1dmS3lrajJURjBWaTZmaTc4V0YxS09ncyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9rZXVhbmdhbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1715090317);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `daftar_cop`
--
ALTER TABLE `daftar_cop`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `daftar_gmdss`
--
ALTER TABLE `daftar_gmdss`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `daftar_mcu`
--
ALTER TABLE `daftar_mcu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `daftar_reor`
--
ALTER TABLE `daftar_reor`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `inventory_sertifikat`
--
ALTER TABLE `inventory_sertifikat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `perpanjang_gmdss`
--
ALTER TABLE `perpanjang_gmdss`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perpanjang_reor`
--
ALTER TABLE `perpanjang_reor`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
