-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 08, 2022 at 06:50 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `alur_pendaftarans`
--

DROP TABLE IF EXISTS `alur_pendaftarans`;
CREATE TABLE IF NOT EXISTS `alur_pendaftarans` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alur_pendaftarans`
--

INSERT INTO `alur_pendaftarans` (`id`, `file`, `created_at`, `updated_at`) VALUES
(1, 'alur_pendaftaran.png', '2022-02-08 11:50:17', '2022-02-08 11:50:17');

-- --------------------------------------------------------

--
-- Table structure for table `biayas`
--

DROP TABLE IF EXISTS `biayas`;
CREATE TABLE IF NOT EXISTS `biayas` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_category` int(11) NOT NULL,
  `total` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `biayas`
--

INSERT INTO `biayas` (`id`, `name`, `id_category`, `total`, `created_at`, `updated_at`) VALUES
(1, 'Titipan infaq komite bulan juli 2021', 3, 90000, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(2, 'Titipan infaq dana fisik untuk pembangunan lokal baru/tambahan', 3, 10000, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(3, 'Ikat pinggang', 1, 45000, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(4, 'Atribut seragam sekolah', 1, 60000, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(5, 'Baju olahraga 1 stel', 1, 125000, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(6, 'Dasi pelajar', 1, 15000, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(7, 'Nama siswa', 1, 15000, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(8, 'Kain batik', 1, 94000, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(9, 'Atribut seragam pramuka', 1, 80000, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(10, 'Kaos kaki', 1, 20000, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(11, 'Konsumsi MATSAMA 3 hari (Makan siang)', 1, 45000, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(12, 'Materai 6000 untuk surat pernyataan', 1, 6000, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(13, 'Tumbler (Botol minum) + Tas bekal', 1, 35000, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(14, 'Jilbab putih', 2, 65000, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(15, 'Jilbab pramuka', 2, 65000, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(16, 'Badge Madrasah 2 set dan badge pramuka 1 set', 2, 60000, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(17, 'Baju olahraga 1 stel', 2, 125000, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(18, 'Dasi pelajar', 2, 15000, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(19, 'Nama siswa', 2, 15000, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(20, 'Kain batik', 2, 94000, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(21, 'Kacu pramuka, talikur dan topi boni', 2, 80000, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(22, 'Kaos kaki', 2, 20000, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(23, 'Konsumsi MATSAMA 3 hari (Makan siang)', 2, 45000, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(24, 'Materai 6000 untuk surat pernyataan', 2, 6000, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(25, 'Tumbler (Botol minum) + Tas bekal', 2, 35000, '2022-02-08 11:50:17', '2022-02-08 11:50:17');

-- --------------------------------------------------------

--
-- Table structure for table `booklets`
--

DROP TABLE IF EXISTS `booklets`;
CREATE TABLE IF NOT EXISTS `booklets` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booklets`
--

INSERT INTO `booklets` (`id`, `file`, `created_at`, `updated_at`) VALUES
(1, 'booklet.pdf', '2022-02-08 11:50:17', '2022-02-08 11:50:17');

-- --------------------------------------------------------

--
-- Table structure for table `calon_pesertas`
--

DROP TABLE IF EXISTS `calon_pesertas`;
CREATE TABLE IF NOT EXISTS `calon_pesertas` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_siswa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_peserta` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_pendaftaran` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jalur` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `calon_pesertas`
--

INSERT INTO `calon_pesertas` (`id`, `id_siswa`, `no_peserta`, `no_pendaftaran`, `jalur`, `jurusan`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', 'MAN1-00001', 'REG-00001', 'Regular', 'Agama', 'Calon Pendaftar', '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(2, '2', 'MAN1-00002', 'REG-00002', 'Undangan', 'Agama', 'Lulus', '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(3, '3', 'MAN1-00003', 'REG-00003', 'Regular', 'IPS', 'Tidak Lulus', '2022-02-08 11:50:17', '2022-02-08 11:50:17');

-- --------------------------------------------------------

--
-- Table structure for table `category_biayas`
--

DROP TABLE IF EXISTS `category_biayas`;
CREATE TABLE IF NOT EXISTS `category_biayas` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_biayas`
--

INSERT INTO `category_biayas` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Putra', '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(2, 'Putri', '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(3, 'Infaq', '2022-02-08 11:50:17', '2022-02-08 11:50:17');

-- --------------------------------------------------------

--
-- Table structure for table `category_persyaratans`
--

DROP TABLE IF EXISTS `category_persyaratans`;
CREATE TABLE IF NOT EXISTS `category_persyaratans` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_persyaratans`
--

INSERT INTO `category_persyaratans` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Persyaratan Umum', '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(2, 'Persyaratan Khusus Jalur Undangan', '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(3, 'Persyaratan Khusus Jalur Reguler', '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(4, 'Tempat dan Waktu Pendaftaran', '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(5, 'Daftar Ulang', '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(6, 'Hal-Hal lain', '2022-02-08 11:50:17', '2022-02-08 11:50:17');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jadwals`
--

DROP TABLE IF EXISTS `jadwals`;
CREATE TABLE IF NOT EXISTS `jadwals` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwals`
--

INSERT INTO `jadwals` (`id`, `file`, `created_at`, `updated_at`) VALUES
(1, 'jadwal_pendaftaran.png', '2022-02-08 11:50:17', '2022-02-08 11:50:17');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1153 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1138, '2014_10_12_000000_create_users_table', 1),
(1139, '2014_10_12_100000_create_password_resets_table', 1),
(1140, '2019_08_19_000000_create_failed_jobs_table', 1),
(1141, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(1142, '2022_01_30_081322_create_siswas_table', 1),
(1143, '2022_01_30_093452_create_calon_pesertas_table', 1),
(1144, '2022_02_01_141238_create_category_persyaratans_table', 1),
(1145, '2022_02_01_141612_create_persyaratans_table', 1),
(1146, '2022_02_01_152443_create_category_biayas_table', 1),
(1147, '2022_02_01_152452_create_biayas_table', 1),
(1148, '2022_02_02_174312_create_jadwals_table', 1),
(1149, '2022_02_02_174452_create_booklets_table', 1),
(1150, '2022_02_02_174516_create_alur_pendaftarans_table', 1),
(1151, '2022_02_04_183136_create_soal_tests_table', 1),
(1152, '2022_02_04_200125_create_nilai_tests_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_tests`
--

DROP TABLE IF EXISTS `nilai_tests`;
CREATE TABLE IF NOT EXISTS `nilai_tests` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `persyaratans`
--

DROP TABLE IF EXISTS `persyaratans`;
CREATE TABLE IF NOT EXISTS `persyaratans` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `sub_persyaratan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_category` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `persyaratans`
--

INSERT INTO `persyaratans` (`id`, `name`, `number`, `sub_persyaratan`, `id_category`, `created_at`, `updated_at`) VALUES
(1, 'Beragama islam', 1, '', 1, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(2, 'Umur tidak tidak lebih dari 21 tahun pada saat mendaftarkan diri', 2, '', 1, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(3, 'Memiliki ijazah/STTB/SKHU dan Raport MTs/sederajat', 3, '', 1, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(4, 'Jalur undangan adalah jalur khusus penerimaan calon peserta didik baru yang direkomendasikan oleh Madrasah berdasarkan surat edaran dari MAN 1 Hulu Sungai Tengah', 1, '', 2, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(5, 'Calon peserta didik baru didaftarkan secara kolektif oleh Madrasah atau sekolah dengan format yang terlampir', 2, '', 2, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(6, 'Kuota jalur undangan disesuaikan dengan jumlah formasi yang ditentukan oleh panitia PPDB 2021', 3, '', 2, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(7, 'Calon peserta didik baru melalui jalur undangan yang direkomendasikan oleh Madrasah/sekolah harus memenuhi kriteria sebagai berikut:', 4, '', 2, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(8, 'Pilihan peminatan IPA, rata rata nilai mata pelajaran IPA dan Matemarika dari semester 1 sampai 5 minimal 81,00 atau rata rata nilainya 80,00 dengan syarat berprestasi dalam lomba Juara (1,2,3) tingkat propinsi atau mewakili sebagai peserta tingkat nasonal dalam cabang lomba (Foto copy bukti dilampirkan)', 5, '7', 2, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(9, 'Pemilihan peminatan IPS, rata rata nilai mata pelajaran IPS dan Matematika dari semester 1 sampai 5 minimal 81,00 atay rata rata nilainya 80,00 dengan syarat berprestasi dalam lomba juara (1,2,3) tingkat propinsi atau mewakili sebagai peserta tingkat nasional dalam cabang lomba (Foto copy bukti dilampirkan)', 6, '7', 2, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(10, 'Pemilihan peminatan IIK (Ilmu ilmu keagamaan), rata rata nilai mata pelajaran PAI (Aqidah-Akhlaq, Qur an Hadits, Fiqih, SKI) dari semester 1 sampai 5 minimal 81,00 atay rata rata nilainya 80,00 dengan syarat berprestasi dalam lomba juara (1,2,3) tingkat propinsi atau mewakili sebagai peserta tingkat nasional dalam cabang lomba (Foto copy bukti dilampirkan)', 7, '7', 2, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(11, 'Melampirkan fotocopy nilai raport semester I,II,III,IV,V sebanyak 1 rangkap yang telah dilegalisir setiap calon peserta didik baru yang direkomendasikan oleh pihak Madrasah', 8, '7', 2, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(12, 'Melampirkan fotocopy kartu keluarga sebanyak 1 lembar (yang ada NIK nya) dan Akta Kelahiran', 9, '', 2, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(13, 'Melampirkan pas photo ukuran 3x4 sebanyak 2 lembar yang disetempel dii formulir pendaftaran', 10, '', 2, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(14, 'Semua persyaratan peserta jalur undangan dimasukkan ke dalam satu berkas', 11, '', 2, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(15, 'Semua persyaratan dimasukkan kedalam MAP : Warna hijau program IIK, Kuning program IPA, Merah program IPS', 12, '', 2, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(16, 'Bagi calon peserta seleksi yang berprestasi juara dalam bidang lomba kejuaraan harus memperlihatkan piagam aslinya', 13, '', 2, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(17, 'Photocopi kartu peserta ujian nasional', 14, '', 2, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(18, 'Tempat MAN 1 Hulu Sungai TEngah', 1, '', 4, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(19, 'Waktu pendaftaran di mulai pada hari Senin-Jumat, tanggal 1-5 maret 2021 / Penyerahan berkas jalur undangan pada hari Sabtu Tangal 6 maret 2021 secara kolektif dari pihak Madrasah kepada Panitia PPDB MAN 1 Hulu sungai tengah dalam amplop tertutup', 2, '', 4, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(20, 'Pengumuman hasil jalur undangan pada hari selasa, 9 maret 2021', 3, '', 4, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(21, 'Daftal ulang / registrasi jalur undangan di mulai pada hari selasa - sabtu tanggal 9 s/d 13 maret 2021 dengan membawa surat rekomendasi yang telah diusulkan oleh pihak madrasah, dan dilakukan oleh orang tua / wali calon peserta didik baru', 1, '', 5, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(22, 'Bagi peserta didik baru yang telah meregistrasi biaya atau uang regristasi tidak bisa diambil kembali jika mengundurkan diri', 2, '', 5, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(23, 'Bagi peserta seleksi penerimaan peserta didik baru yang dinyatakan lulus namun tidak lulus pada Madrasah/Sekolah asal (MTs/SMP) maka dinyatakan gugur sebagai peserta didik di Madrasah Aliyah Negeri 1 Hulu Sungai Tengah', 3, '', 5, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(24, 'Format pengiriman data peserta jalur undangan terlampir yang dicontohkan panitia PPDB', 1, '', 6, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(25, 'Hal-hal lain yang belum jelas dapat ditanyakan pada panitia penerimaan peserta didik baru', 2, '', 6, '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(26, 'Biaya registrasi akan ditentukan oleh panitia setelah pengumuman kelulusan', 3, '', 6, '2022-02-08 11:50:17', '2022-02-08 11:50:17');

-- --------------------------------------------------------

--
-- Table structure for table `siswas`
--

DROP TABLE IF EXISTS `siswas`;
CREATE TABLE IF NOT EXISTS `siswas` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ijazah` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_lengkap` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nisn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nis` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hobi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cita_cita` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_saudara` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anak_ke` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asal_sekolah` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `npsn_asal_sekolah` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_sekolah` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_sekolah` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mengikuti_paud` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mengikuti_tk` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `desa_kelurahan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kodepos` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kab_kota` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provinsi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jarak_tempat_tinggal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transportasi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_penerimaan_pip_bsm` text COLLATE utf8mb4_unicode_ci,
  `alasan_menerima_pip_bsm` text COLLATE utf8mb4_unicode_ci,
  `periode_menerima_pip_bsm` text COLLATE utf8mb4_unicode_ci,
  `bidang_prestasi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tingkat_prestasi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peringkat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_beasiswa` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sumber_beasiswa` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_beasiswa` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jangka_waktu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `besaran_uang` bigint(20) DEFAULT NULL,
  `no_kk` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_ayah` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik_ayah` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikan_terakhir_ayah` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon_ayah` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan_ayah` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_ibu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik_ibu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikan_terakhir_ibu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon_ibu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan_ibu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penghasilan_perbulan` bigint(20) DEFAULT NULL,
  `nomor_kss_kps` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_pkh` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_kip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `siswas_nisn_unique` (`nisn`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswas`
--

INSERT INTO `siswas` (`id`, `ijazah`, `photo`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `nisn`, `nis`, `email`, `telepon`, `hobi`, `cita_cita`, `jumlah_saudara`, `anak_ke`, `asal_sekolah`, `npsn_asal_sekolah`, `jenis_sekolah`, `status_sekolah`, `mengikuti_paud`, `mengikuti_tk`, `alamat`, `desa_kelurahan`, `kodepos`, `kecamatan`, `kab_kota`, `provinsi`, `jarak_tempat_tinggal`, `transportasi`, `status_penerimaan_pip_bsm`, `alasan_menerima_pip_bsm`, `periode_menerima_pip_bsm`, `bidang_prestasi`, `tingkat_prestasi`, `peringkat`, `tahun`, `status_beasiswa`, `sumber_beasiswa`, `jenis_beasiswa`, `jangka_waktu`, `besaran_uang`, `no_kk`, `nama_ayah`, `nik_ayah`, `pendidikan_terakhir_ayah`, `telepon_ayah`, `pekerjaan_ayah`, `nama_ibu`, `nik_ibu`, `pendidikan_terakhir_ibu`, `telepon_ibu`, `pekerjaan_ibu`, `penghasilan_perbulan`, `nomor_kss_kps`, `nomor_pkh`, `nomor_kip`, `created_at`, `updated_at`) VALUES
(1, NULL, '1_1_Yoyon Hermawan.jpg', 'Yoyon Hermawan', 'Jombang', '1999-01-25', 'L', '1532485689', '1231456412345621', 'yoyon123@gmail.com', '082165451234', 'Kesenian', 'Seniman', '3', '1', 'Mts Ar Roudlotul Ilmiyah', '56482315', 'Mts', 'Swasta', 'Pernah', 'Pernah', 'Dsn. Bandar, Rt. 01, Rw. 04, no. 56', 'Bandar', '61583', 'Bandar Kedung Mulyo', 'Jombang', 'Jawa Timur', '5-10 Km', 'Motor', 'Aktif', 'Ranking 1 selama 3 tahun', '2021', 'Design Graphic', 'Regional', '2', '2021', 'Aktif', 'Dinas Pendidikan', 'Beasiswa Anak Cerdas', '6', 2500000, '3124564756423564', 'Suyitno', '3514235685464567', 'S1', '0821987564552', 'Designer graphic', 'Indriyani', '35127456785213521', 'D3', '082132524567', 'Guru', 6500000, '6548321', '6875465', '67912315', '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(2, NULL, NULL, 'Deni Kurniawan', 'Jombang', '1999-01-25', 'L', '85216654825', '123556428521', 'deni123@gmail.com', '082165451234', 'Kesenian', 'Seniman', '3', '1', 'Mts Ar Roudlotul Ilmiyah', '45612564', 'Mts', 'Swasta', 'Pernah', 'Pernah', 'Dsn. Bandar, Rt. 01, Rw. 04, no. 56', 'Bandar', '61583', 'Bandar Kedung Mulyo', 'Jombang', 'Jawa Timur', '5-10 Km', 'Motor', 'Aktif', 'Ranking 1 selama 3 tahun', '2021', 'Design Graphic', 'Regional', '2', '2021', 'Aktif', 'Dinas Pendidikan', 'Beasiswa Anak Cerdas', '6', 2500000, '3124564756423564', 'Suyitno', '3514235685464567', 'S1', '0821987564552', 'Designer graphic', 'Indriyani', '35127456785213521', 'D3', '082132524567', 'Guru', 6500000, '6548321', '6875465', '67912315', '2022-02-08 11:50:17', '2022-02-08 11:50:17'),
(3, NULL, NULL, 'Dewi Agfiannisa', 'Blitar', '1999-01-05', 'P', '8521456789', '9854561234564852', 'dewi123@gmail.com', '082165451234', 'Kesenian', 'Seniman', '3', '1', 'Mts Ar Roudlotul Ilmiyah', '78901234', 'Mts', 'Swasta', 'Pernah', 'Pernah', 'Dsn. Bandar, Rt. 01, Rw. 04, no. 56', 'Bandar', '61583', 'Bandar Kedung Mulyo', 'Jombang', 'Jawa Timur', '5-10 Km', 'Motor', 'Aktif', 'Ranking 1 selama 3 tahun', '2021', 'Design Graphic', 'Regional', '2', '2021', 'Aktif', 'Dinas Pendidikan', 'Beasiswa Anak Cerdas', '6', 2500000, '3124564756423564', 'Suyitno', '3514235685464567', 'S1', '0821987564552', 'Designer graphic', 'Indriyani', '35127456785213521', 'D3', '082132524567', 'Guru', 6500000, '6548321', '6875465', '67912315', '2022-02-08 11:50:17', '2022-02-08 11:50:17');

-- --------------------------------------------------------

--
-- Table structure for table `soal_tests`
--

DROP TABLE IF EXISTS `soal_tests`;
CREATE TABLE IF NOT EXISTS `soal_tests` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `soal_tests`
--

INSERT INTO `soal_tests` (`id`, `file`, `created_at`, `updated_at`) VALUES
(1, 'soal_test_regular.pdf', '2022-02-08 11:50:17', '2022-02-08 11:50:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin123@root.com', 'Root', 1, NULL, '$2y$10$Dcn2xyJqKlW.JbPNszS/FuNoJvvYLaM/GFwjTX7Bk1.1TxxVSMvRu', NULL, '2022-02-08 04:50:17', '2022-02-08 04:50:17'),
(2, 'Pegawai', 'pegawai123@gmail.com', 'Admin', 1, NULL, '$2y$10$HlpRAEkpCuizgjd63tAlOe8RcaJhxWMd4.jITWVzKkX1HS8GAgFTy', NULL, '2022-02-08 04:50:17', '2022-02-08 04:50:17');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
