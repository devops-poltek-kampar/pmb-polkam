-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db-polkam
CREATE DATABASE IF NOT EXISTS `db-polkam` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db-polkam`;

-- Dumping structure for table db-polkam.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db-polkam.cache: ~0 rows (approximately)

-- Dumping structure for table db-polkam.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db-polkam.cache_locks: ~0 rows (approximately)

-- Dumping structure for table db-polkam.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db-polkam.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table db-polkam.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db-polkam.jobs: ~0 rows (approximately)

-- Dumping structure for table db-polkam.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db-polkam.job_batches: ~0 rows (approximately)

-- Dumping structure for table db-polkam.master_dosen
CREATE TABLE IF NOT EXISTS `master_dosen` (
  `id` int NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nidn` varchar(50) DEFAULT NULL,
  `nrp` varchar(50) DEFAULT NULL,
  `master_program_studi_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db-polkam.master_dosen: ~0 rows (approximately)

-- Dumping structure for table db-polkam.master_kelas
CREATE TABLE IF NOT EXISTS `master_kelas` (
  `id` int NOT NULL,
  `master_program_studi_id` int DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `angkatan` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db-polkam.master_kelas: ~0 rows (approximately)

-- Dumping structure for table db-polkam.master_mahasiswa
CREATE TABLE IF NOT EXISTS `master_mahasiswa` (
  `id` int NOT NULL,
  `master_semester_id` int DEFAULT NULL,
  `master_program_studi_id` int DEFAULT NULL,
  `master_kelas_id` int DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nim` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db-polkam.master_mahasiswa: ~0 rows (approximately)

-- Dumping structure for table db-polkam.master_mata_kuliah
CREATE TABLE IF NOT EXISTS `master_mata_kuliah` (
  `id` int NOT NULL,
  `master_program_studi_id` int DEFAULT NULL,
  `master_semester_id` int DEFAULT NULL,
  `kode_mata_kuliah` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `singkatan` varchar(50) DEFAULT NULL,
  `sks` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db-polkam.master_mata_kuliah: ~0 rows (approximately)

-- Dumping structure for table db-polkam.master_perwalian
CREATE TABLE IF NOT EXISTS `master_perwalian` (
  `id` int NOT NULL,
  `master_dosen_id` int DEFAULT NULL,
  `master_kelas_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db-polkam.master_perwalian: ~0 rows (approximately)

-- Dumping structure for table db-polkam.master_program_studi
CREATE TABLE IF NOT EXISTS `master_program_studi` (
  `id` int DEFAULT NULL,
  `master_dosen_id` int DEFAULT NULL COMMENT 'kaprodi nya',
  `kode_prodi` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `singkatan` varchar(50) DEFAULT NULL,
  `jenjang` enum('DII','DIII','DIV') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db-polkam.master_program_studi: ~8 rows (approximately)
INSERT INTO `master_program_studi` (`id`, `master_dosen_id`, `kode_prodi`, `nama`, `singkatan`, `jenjang`) VALUES
	(1, 1, 'TPS01', 'Teknik Pengolahan Sawit', 'TPS', 'DIII'),
	(2, 2, 'PPM01', 'Perawatan dan Perbaikan Mesin', 'PPM', 'DIII'),
	(3, 3, 'TIF01', 'Teknik Informatika', 'TIF', 'DIII'),
	(4, 4, 'TPKS01', 'Teknik Pengolahan Kelapa Sawit', 'TPKS', 'DII'),
	(5, 5, 'ABI01', 'Administrasi Bisnis Internasional', 'ABI', 'DIV'),
	(6, 6, 'TRL01', 'Teknologi Rekayasa Logistik', 'TRL', 'DIV'),
	(7, 7, 'MAB01', 'Manajemen Agribisnis', 'MAB', 'DIV'),
	(8, 8, 'PP01', 'Pengelolaan Perkebunan', 'PP', 'DIV');

-- Dumping structure for table db-polkam.master_semester
CREATE TABLE IF NOT EXISTS `master_semester` (
  `id` int NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db-polkam.master_semester: ~0 rows (approximately)

-- Dumping structure for table db-polkam.master_tahun_akademik
CREATE TABLE IF NOT EXISTS `master_tahun_akademik` (
  `id` int NOT NULL,
  `tahun` int DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db-polkam.master_tahun_akademik: ~0 rows (approximately)

-- Dumping structure for table db-polkam.master_users
CREATE TABLE IF NOT EXISTS `master_users` (
  `id` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `is_reset` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db-polkam.master_users: ~0 rows (approximately)
INSERT INTO `master_users` (`id`, `username`, `email`, `password`, `is_reset`) VALUES
	(1, 'keuangan', 'keuangan@gmail.com', '$2y$12$6BuNY7YJ4Pa0LYq9Purep.572d1w3t034nTkbX02cOQ7stgcwyxRO', NULL);

-- Dumping structure for table db-polkam.master_user_akses
CREATE TABLE IF NOT EXISTS `master_user_akses` (
  `id` int NOT NULL,
  `master_users_id` int DEFAULT NULL,
  `master_user_role_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db-polkam.master_user_akses: ~0 rows (approximately)

-- Dumping structure for table db-polkam.master_user_role
CREATE TABLE IF NOT EXISTS `master_user_role` (
  `id` int NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db-polkam.master_user_role: ~0 rows (approximately)

-- Dumping structure for table db-polkam.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db-polkam.migrations: ~0 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2025_10_31_083146_pmb_registrasi', 1),
	(5, '2025_10_31_084814_pmb_lampiran_registrasi', 1),
	(6, '2025_10_31_085003_pmb_gelombang', 1),
	(7, '2025_11_04_020941_pmb_jalur_masuk', 1),
	(8, '2025_11_04_021455_pmb_provinsi', 1),
	(9, '2025_11_05_043938_pmb_notifikasi', 1),
	(10, '2025_11_05_064040_pmb_bukti_pembayaran', 1);

-- Dumping structure for table db-polkam.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db-polkam.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table db-polkam.pmb_berita
CREATE TABLE IF NOT EXISTS `pmb_berita` (
  `id` varchar(50) NOT NULL,
  `subjek` text,
  `slug` text,
  `deskripsi` longtext,
  `thumbnail` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db-polkam.pmb_berita: ~2 rows (approximately)
INSERT INTO `pmb_berita` (`id`, `subjek`, `slug`, `deskripsi`, `thumbnail`, `created_at`, `updated_at`) VALUES
	('YCU1VGLRKVH9ZXSIBHSI', 'Kunjungan Bupati Kampar Ke Politeknik Kampar', 'kunjungan-bupati-kampar-ke-politeknik-kampar', '<p>Bupati kampar sedang melakukan kunjungan ke Politeknik Kampar untuk mengajarkan sosialisasi pmb. Bupati kampar sedang melakukan kunjungan ke Politeknik Kampar untuk mengajarkan sosialisasi pmbBupati kampar sedang melakukan kunjungan ke Politeknik Kampar untuk mengajarkan sosialisasi pmbBupati kampar sedang melakukan kunjungan ke Politeknik Kampar untuk mengajarkan sosialisasi pmbBupati kampar sedang melakukan kunjungan ke Politeknik Kampar untuk mengajarkan sosialisasi pmbBupati kampar sedang melakukan kunjungan ke Politeknik Kampar untuk mengajarkan sosialisasi pmbBupati kampar sedang melakukan kunjungan ke Politeknik Kampar untuk mengajarkan sosialisasi pmbBupati kampar sedang melakukan kunjungan ke Politeknik Kampar untuk mengajarkan sosialisasi pmb</p>', 'upload/berita/HPzayG32eRNF0KMPTUt2swAB7xn2McBE5PrCAVqB.jpg', '2025-12-24 08:34:09', '2025-12-24 08:34:09');

-- Dumping structure for table db-polkam.pmb_berkas
CREATE TABLE IF NOT EXISTS `pmb_berkas` (
  `id` varchar(50) NOT NULL,
  `pmb_pengajuan_berkas_id` varchar(50) DEFAULT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `path` text,
  `kategori` varchar(50) DEFAULT NULL,
  `status` enum('Review','Reject','Accept') DEFAULT NULL,
  `message` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pmb_pengajuan_berkas_id` (`pmb_pengajuan_berkas_id`),
  CONSTRAINT `pengajuan_berkas` FOREIGN KEY (`pmb_pengajuan_berkas_id`) REFERENCES `pmb_pengajuan_berkas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db-polkam.pmb_berkas: ~2 rows (approximately)
INSERT INTO `pmb_berkas` (`id`, `pmb_pengajuan_berkas_id`, `nama`, `path`, `kategori`, `status`, `message`, `created_at`, `updated_at`) VALUES
	('8DX9PMAA6ACD87H2LK2W', 'NBDWFU6GDFFSP4MV8HE7', 'pengaduan (1).pdf', 'uploads/rahmathamdani314@gmail.com/eQHkUWJimTYVB0QfhPOAzJfLdMtQhghIrMsXK64o.pdf', 'rapor_semester_1', 'Accept', NULL, '2026-01-12 08:25:08', '2026-01-12 08:55:36'),
	('YSG6NKOQSJFMWAJDEUNE', 'NBDWFU6GDFFSP4MV8HE7', 'pengaduan (8).pdf', 'uploads/rahmathamdani314@gmail.com/ViOZGl68mkK4rwZNFoEjnmStHAJYC0bd9jeYy2YZ.pdf', 'rapor_semester_2', 'Accept', NULL, '2026-01-12 08:25:08', '2026-01-12 08:55:40');

-- Dumping structure for table db-polkam.pmb_berkas_pernyataan
CREATE TABLE IF NOT EXISTS `pmb_berkas_pernyataan` (
  `id` varchar(50) NOT NULL,
  `nomor_registrasi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `status` enum('Review','Reject','Approve') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nomor_registrasi` (`nomor_registrasi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db-polkam.pmb_berkas_pernyataan: ~0 rows (approximately)

-- Dumping structure for table db-polkam.pmb_bukti_pembayaran
CREATE TABLE IF NOT EXISTS `pmb_bukti_pembayaran` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pmb_registrasi_nomor_registrasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Accept','Reject','Pending') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` enum('Registrasi','Daftar Ulang') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tabel Pembayaran Registrasi Rp. 200.000 dan Registrasi Ulang Rp. 1.000.000';

-- Dumping data for table db-polkam.pmb_bukti_pembayaran: ~1 rows (approximately)
INSERT INTO `pmb_bukti_pembayaran` (`id`, `pmb_registrasi_nomor_registrasi`, `path`, `status`, `kategori`, `created_at`, `updated_at`) VALUES
	('PZAIF0JPCMNRM7FHKL6O', '219251181087526', 'uploads/rahmathamdani314@gmail.com/MFhs8p3lTTpqUuypRgqsVim2qd4SUNGYuywFlwEh.png', 'Accept', 'Registrasi', '2026-01-12 08:21:14', '2026-01-12 08:23:51'),
	('ZXKHKNTKJSWB10717ZC4', '219251181087526', 'uploads/rahmathamdani314@gmail.com/DU9aWuy0H72D1d17BZuWxvPLiEkhwghxshnK1Tsz.jpg', 'Pending', 'Daftar Ulang', '2026-01-12 10:01:26', '2026-01-12 10:01:38');

-- Dumping structure for table db-polkam.pmb_cbt
CREATE TABLE IF NOT EXISTS `pmb_cbt` (
  `id` varchar(50) NOT NULL,
  `nomor_registrasi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Ujian','Tidak Lulus','Lulus','Menunggu') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `aktif` enum('Y','N') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nomor_registrasi` (`nomor_registrasi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db-polkam.pmb_cbt: ~1 rows (approximately)
INSERT INTO `pmb_cbt` (`id`, `nomor_registrasi`, `status`, `aktif`, `created_at`, `updated_at`) VALUES
	('7IT2GYPLEKYX14NL6BBD', '219251181087526', 'Lulus', 'Y', '2026-01-12 08:28:33', '2026-01-12 08:28:48');

-- Dumping structure for table db-polkam.pmb_dokumen_jalur
CREATE TABLE IF NOT EXISTS `pmb_dokumen_jalur` (
  `id` varchar(50) NOT NULL DEFAULT '',
  `pmb_jalur_masuk_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `name_attribute` varchar(50) DEFAULT NULL,
  `tipe` enum('pdf','jpg','jpeg','png') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `sifat` enum('required','not required') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db-polkam.pmb_dokumen_jalur: ~2 rows (approximately)
INSERT INTO `pmb_dokumen_jalur` (`id`, `pmb_jalur_masuk_id`, `nama`, `name_attribute`, `tipe`, `sifat`, `created_at`, `updated_at`) VALUES
	('34IBERR3JBHIKJXX0XNH', '1V6LRUHJ3U5QNBBVQYZM', 'Rapor Semester 2', 'rapor_semester_2', 'pdf', 'required', '2026-01-08 06:34:15', '2026-01-08 06:34:15'),
	('XXJSSXJQYGV7V8W4VG5U', '1V6LRUHJ3U5QNBBVQYZM', 'Rapor semester 1', 'rapor_semester_1', 'pdf', 'required', '2026-01-08 06:33:59', '2026-01-08 06:33:59');

-- Dumping structure for table db-polkam.pmb_dokumen_registrasi
CREATE TABLE IF NOT EXISTS `pmb_dokumen_registrasi` (
  `id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pmb_registrasi_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pmb_jalur_masuk_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Accept','Reject','Review') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db-polkam.pmb_dokumen_registrasi: ~2 rows (approximately)
INSERT INTO `pmb_dokumen_registrasi` (`id`, `pmb_registrasi_id`, `pmb_jalur_masuk_id`, `nama`, `path`, `status`, `kategori`, `created_at`, `updated_at`) VALUES
	('8GEZ6WHQZWE4H3YLRUGV', 'M2LP1ZSAMLPWFVQ45QUZ', '1V6LRUHJ3U5QNBBVQYZM', 'sawit hijau.jpg', 'uploads/rahmathamdani314@gmail.com/JDhxgVhUzHkeAZG1SIxpuhyMbEJY4tAnP5f9FK7Y.jpg', 'Accept', 'pas_foto', '2026-01-08 06:18:25', '2026-01-08 06:18:25'),
	('DXWXONL5OFDN569KBHQW', 'M2LP1ZSAMLPWFVQ45QUZ', '1V6LRUHJ3U5QNBBVQYZM', 'sawit oren.jpg', 'uploads/rahmathamdani314@gmail.com/UEjtoToamKtajdN4m8GWb8wOsrWKERP3rhp60xoS.jpg', 'Accept', 'ktp', '2026-01-08 06:18:25', '2026-01-08 06:18:25'),
	('O1UTYRVWAG6ASXU7UYNN', 'VTLSYYEZQFXESCZMWUDJ', '1V6LRUHJ3U5QNBBVQYZM', 'tombol play.jpeg', 'uploads/rahmathamdani314@gmail.com/wU9TmHSzZVSwki7pgLhxcJEoPZF38QdzthXrUQam.jpg', 'Accept', 'ktp', '2026-01-12 08:19:35', '2026-01-12 08:19:35'),
	('TKSXNMAJGRI1P8SGXRRK', 'RZU8VKVKDFM2D84QJBN1', '1V6LRUHJ3U5QNBBVQYZM', 'gambar sawit.png', 'uploads/rahmathamdani314@gmail.com/U4m5k9Mz6zrjpaj5zFXFJitUlCQEcd1PxaEgU4uS.png', 'Accept', 'ktp', '2026-01-12 08:12:43', '2026-01-12 08:12:43'),
	('TVYNKNSZG3HCN9XL8DAR', 'RZU8VKVKDFM2D84QJBN1', '1V6LRUHJ3U5QNBBVQYZM', 'buah dura.jpeg', 'uploads/rahmathamdani314@gmail.com/AHHAkpvF11VJ3nmaVgdieBtiqmbUQVVoweJNVRsf.jpg', 'Accept', 'pas_foto', '2026-01-12 08:12:43', '2026-01-12 08:12:43'),
	('Z0A1ZI3D43H5CYQTCZOE', 'VTLSYYEZQFXESCZMWUDJ', '1V6LRUHJ3U5QNBBVQYZM', 'bg main menu.jpeg', 'uploads/rahmathamdani314@gmail.com/5hxvowAGCfpYbp0NPOfowVVWA06Mx1x8Sa2B5AEB.jpg', 'Accept', 'pas_foto', '2026-01-12 08:19:35', '2026-01-12 08:19:35');

-- Dumping structure for table db-polkam.pmb_forgot_password
CREATE TABLE IF NOT EXISTS `pmb_forgot_password` (
  `id` varchar(50) DEFAULT NULL,
  `pmb_users_email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `token` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db-polkam.pmb_forgot_password: ~0 rows (approximately)
INSERT INTO `pmb_forgot_password` (`id`, `pmb_users_email`, `token`, `created_at`, `updated_at`) VALUES
	('CJSTKMPFNQ0HROI6KNDA', 'rahmathamdani314@gmail.com', 146029, '2026-01-12 03:14:13', '2026-01-12 02:52:13');

-- Dumping structure for table db-polkam.pmb_gelombang
CREATE TABLE IF NOT EXISTS `pmb_gelombang` (
  `id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'AUTO_INCREMENT',
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` year NOT NULL,
  `open` date NOT NULL,
  `close` date NOT NULL,
  `status` enum('OPEN','CLOSE') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db-polkam.pmb_gelombang: ~0 rows (approximately)
INSERT INTO `pmb_gelombang` (`id`, `nama`, `tahun`, `open`, `close`, `status`, `created_at`, `updated_at`) VALUES
	('RMCKGQFMENAFGIUEIDUQ', 'Gelombang I', '2026', '2026-01-01', '2026-02-28', 'OPEN', '2026-01-08 04:17:12', '2026-01-08 04:17:12');

-- Dumping structure for table db-polkam.pmb_jalur
CREATE TABLE IF NOT EXISTS `pmb_jalur` (
  `id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `nama` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db-polkam.pmb_jalur: ~5 rows (approximately)
INSERT INTO `pmb_jalur` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	('0HOLTHERNTPB93DMIYOQ', 'Undangan', '2026-01-08 04:16:51', '2026-01-08 04:16:51'),
	('6VLPTSMKWY0PV3VVPA0Q', 'Reguler', '2026-01-08 04:16:17', '2026-01-08 04:16:17'),
	('BC1VBJDDY274ZKFSELOT', 'Prestasi Non Akademik', '2026-01-08 04:16:35', '2026-01-08 04:16:35'),
	('KQE888XMRDTYZ8NXZVPD', 'Prestasi Akademik', '2026-01-08 04:16:25', '2026-01-08 04:16:25'),
	('PYD5VR3AFVEW7BWAT1ND', 'KIP Kuliah', '2026-01-08 04:16:43', '2026-01-08 04:16:43');

-- Dumping structure for table db-polkam.pmb_jalur_masuk
CREATE TABLE IF NOT EXISTS `pmb_jalur_masuk` (
  `id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pmb_gelombang_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `pmb_jalur_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `biaya_registrasi` int NOT NULL DEFAULT '0',
  `status` enum('Open','Close') COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db-polkam.pmb_jalur_masuk: ~4 rows (approximately)
INSERT INTO `pmb_jalur_masuk` (`id`, `pmb_gelombang_id`, `pmb_jalur_id`, `biaya_registrasi`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES
	('1V6LRUHJ3U5QNBBVQYZM', 'RMCKGQFMENAFGIUEIDUQ', 'BC1VBJDDY274ZKFSELOT', 200000, 'Close', 'Prestasi Non Akademik', '2026-01-08 04:18:24', '2026-01-08 04:18:24'),
	('OSKWMJJI6HNWUVKDYT2K', 'RMCKGQFMENAFGIUEIDUQ', '6VLPTSMKWY0PV3VVPA0Q', 200000, 'Close', 'Jalur Reguler', '2026-01-08 04:17:42', '2026-01-08 04:17:42'),
	('PYXPG52VAVLO9ILGYJS0', 'RMCKGQFMENAFGIUEIDUQ', '0HOLTHERNTPB93DMIYOQ', 0, 'Close', 'Jalur Undangan', '2026-01-08 04:19:04', '2026-01-08 04:19:04'),
	('TJQTG7TLRQWECBGIMIWP', 'RMCKGQFMENAFGIUEIDUQ', 'KQE888XMRDTYZ8NXZVPD', 200000, 'Close', 'Prestasi Akademik', '2026-01-08 04:18:01', '2026-01-08 04:18:01'),
	('VEIX2ZUMNXS7DJXKRAW3', 'RMCKGQFMENAFGIUEIDUQ', 'PYD5VR3AFVEW7BWAT1ND', 200000, 'Close', 'KIP Kuliah', '2026-01-08 04:18:42', '2026-01-08 04:18:42');

-- Dumping structure for table db-polkam.pmb_jalur_masuk_prodi
CREATE TABLE IF NOT EXISTS `pmb_jalur_masuk_prodi` (
  `id` varchar(50) NOT NULL,
  `pmb_jalur_masuk_id` varchar(50) DEFAULT NULL,
  `master_program_studi_id` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db-polkam.pmb_jalur_masuk_prodi: ~4 rows (approximately)
INSERT INTO `pmb_jalur_masuk_prodi` (`id`, `pmb_jalur_masuk_id`, `master_program_studi_id`, `created_at`, `updated_at`) VALUES
	('MWEBSBMVUZAYYCHSM99R', '1V6LRUHJ3U5QNBBVQYZM', '5', '2026-01-08 05:17:35', '2026-01-08 05:17:35'),
	('T0SWQLAJUSMCON6ZEVJU', '1V6LRUHJ3U5QNBBVQYZM', '2', '2026-01-08 04:35:26', '2026-01-08 04:35:26'),
	('TKYW1XV2P279BTSKHKKA', '1V6LRUHJ3U5QNBBVQYZM', '3', '2026-01-08 04:35:17', '2026-01-08 04:35:17'),
	('TSBHCFD2SXRL6YW1CILR', '1V6LRUHJ3U5QNBBVQYZM', '4', '2026-01-08 04:35:40', '2026-01-08 04:35:40'),
	('VTM45RU9VHEKSM94Y17P', '1V6LRUHJ3U5QNBBVQYZM', '1', '2026-01-08 04:35:04', '2026-01-08 04:35:04');

-- Dumping structure for table db-polkam.pmb_kelulusan
CREATE TABLE IF NOT EXISTS `pmb_kelulusan` (
  `id` varchar(50) NOT NULL,
  `nomor_registrasi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_prodi` varchar(50) DEFAULT NULL COMMENT 'Program studi lulus',
  `status` enum('LULUS','TIDAK LULUS') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nomor_registrasi` (`nomor_registrasi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db-polkam.pmb_kelulusan: ~1 rows (approximately)
INSERT INTO `pmb_kelulusan` (`id`, `nomor_registrasi`, `kode_prodi`, `status`, `created_at`, `updated_at`) VALUES
	('MYSYMYFG1KCFNUQO6725', '219251181087526', 'TIF01', 'LULUS', '2026-01-12 09:15:01', '2026-01-12 09:15:01');

-- Dumping structure for table db-polkam.pmb_notifikasi
CREATE TABLE IF NOT EXISTS `pmb_notifikasi` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pmb_users_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subjek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db-polkam.pmb_notifikasi: ~0 rows (approximately)

-- Dumping structure for table db-polkam.pmb_pengajuan_berkas
CREATE TABLE IF NOT EXISTS `pmb_pengajuan_berkas` (
  `id` varchar(50) NOT NULL,
  `pmb_users_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nomor_registrasi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pmb_jalur_masuk_id` varchar(50) DEFAULT NULL,
  `status` enum('Review','Reject','Verified') DEFAULT NULL,
  `aktif` enum('Y','N') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db-polkam.pmb_pengajuan_berkas: ~0 rows (approximately)
INSERT INTO `pmb_pengajuan_berkas` (`id`, `pmb_users_id`, `nomor_registrasi`, `pmb_jalur_masuk_id`, `status`, `aktif`, `created_at`, `updated_at`) VALUES
	('NBDWFU6GDFFSP4MV8HE7', 'OETRKPAMDNRBNFYG9F7Y', '219251181087526', '1V6LRUHJ3U5QNBBVQYZM', 'Verified', NULL, '2026-01-12 08:25:08', '2026-01-12 09:15:01');

-- Dumping structure for table db-polkam.pmb_provinsi
CREATE TABLE IF NOT EXISTS `pmb_provinsi` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kode_provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db-polkam.pmb_provinsi: ~0 rows (approximately)

-- Dumping structure for table db-polkam.pmb_registrasi
CREATE TABLE IF NOT EXISTS `pmb_registrasi` (
  `id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pmb_users_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pmb_jalur_masuk_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `nomor_registrasi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal_kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rw` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pos` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hp_ortu` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hp_mahasiswa` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_wa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` enum('Islam','Kristen Khatolik','Kristen Protestan','Hindu','Budha','Lainnya') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_nikah` enum('Menikah','Belum Menikah') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_bayar_registrasi` enum('Pending','Done','Reject') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_registrasi` enum('Approve','Reject','Review') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Review',
  `asal_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pernyataan_serah_data` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pernyataan_data_valid` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sumber_info_daftar` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sumber_info` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Jika sumber_info diisi ketika sumber_info_daftar dipilih Teman/Saudara, Website/Medsos\r\n',
  `prodi_pilihan_1` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Referensi ke master_program_studi',
  `prodi_pilihan_2` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Referensi ke master_program_studi',
  `pembiayaan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nomor_registrasi` (`nomor_registrasi`),
  UNIQUE KEY `pmb_users_id` (`pmb_users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db-polkam.pmb_registrasi: ~1 rows (approximately)
INSERT INTO `pmb_registrasi` (`id`, `pmb_users_id`, `pmb_jalur_masuk_id`, `nomor_registrasi`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `asal_kecamatan`, `rt`, `rw`, `provinsi`, `kode_pos`, `hp_ortu`, `hp_mahasiswa`, `no_wa`, `agama`, `status_nikah`, `status_bayar_registrasi`, `status_registrasi`, `asal_sekolah`, `jurusan`, `pernyataan_serah_data`, `pernyataan_data_valid`, `sumber_info_daftar`, `sumber_info`, `prodi_pilihan_1`, `prodi_pilihan_2`, `pembiayaan`, `created_at`, `updated_at`) VALUES
	('VTLSYYEZQFXESCZMWUDJ', 'OETRKPAMDNRBNFYG9F7Y', '1V6LRUHJ3U5QNBBVQYZM', '219251181087526', 'Rahmat Hamdani', 'Lubuk Basung', '2026-01-16', 'Laki-laki', 'Lubuk Basung', 'Lubuk Basung', '01', '02', 'Sumatera Barat', '082333', '32434', '4234234', '4324234', 'Islam', 'Belum Menikah', 'Done', 'Approve', 'SMA IT Bangkinang Kota', 'IPS', 'Tidak', 'Ya', 'Teman/Saudara', 'Seseorang', 'TIF01', 'TIF01', '', '2026-01-12 08:19:35', '2026-01-12 08:28:30');

-- Dumping structure for table db-polkam.pmb_registrasi_ulang
CREATE TABLE IF NOT EXISTS `pmb_registrasi_ulang` (
  `id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pmb_registrasi_id` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db-polkam.pmb_registrasi_ulang: ~0 rows (approximately)

-- Dumping structure for table db-polkam.pmb_role
CREATE TABLE IF NOT EXISTS `pmb_role` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db-polkam.pmb_role: ~3 rows (approximately)
INSERT INTO `pmb_role` (`id`, `nama`) VALUES
	(1, 'PMB'),
	(2, 'Keuangan'),
	(3, 'Mahasiswa Baru'),
	(4, 'Akademik');

-- Dumping structure for table db-polkam.pmb_users
CREATE TABLE IF NOT EXISTS `pmb_users` (
  `id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pmb_role_id` bigint unsigned NOT NULL DEFAULT '0',
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_hp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Verified','Suspend') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Suspend',
  `foto_profile` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pmb_users_email_unique` (`email`),
  UNIQUE KEY `google_id` (`google_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db-polkam.pmb_users: ~3 rows (approximately)
INSERT INTO `pmb_users` (`id`, `google_id`, `pmb_role_id`, `username`, `email`, `password`, `nomor_hp`, `status`, `foto_profile`, `created_at`, `updated_at`) VALUES
	('313VX7QMR66TYSPDHVRC', '109582921922818150232', 3, 'rahmat hamdani', 'rahmat2019.tif@poltek-kampar.ac.id', '$2y$12$P2Gjnq5aR1sgqrfnJBtDvOf0mjAKualEEDn9SqUBDG4zBO398t8WO', NULL, 'Suspend', NULL, '2026-01-12 03:21:29', '2026-01-12 03:21:29'),
	('34JFLK88VAV03W4JLJF9', NULL, 4, 'akademik', 'akademik@gmail.com', '$2y$12$H9hUyysxBB.5vkO9yYFPQe4yr/dl4zWWg1IGG6WhDRY3IhOoRCx1q', '08123456789', 'Verified', NULL, '2025-11-10 05:05:08', '2025-11-10 05:05:08'),
	('HFPEOSVCT2RVZY3VXAYF', NULL, 1, 'admin pmb', 'pmb@gmail.com', '$2y$12$H9hUyysxBB.5vkO9yYFPQe4yr/dl4zWWg1IGG6WhDRY3IhOoRCx1q', '08123456789', 'Verified', NULL, '2025-11-10 05:05:08', '2025-11-10 05:05:08'),
	('OETRKPAMDNRBNFYG9F7Y', NULL, 3, 'Rahmat Hamdani', 'rahmathamdani314@gmail.com', '$2y$12$ozJyWZFrSaXJGeoC6Kr/a.9oxVBxSVA8vOir4GsLcd0fN9JS3cMDy', '081276499544', 'Verified', NULL, '2026-01-12 07:43:26', '2026-01-12 07:43:26'),
	('T5R6S5W2VZHTONSOLKJ9', NULL, 2, 'keuangan', 'keuangan@gmail.com', '$2y$12$6BuNY7YJ4Pa0LYq9Purep.572d1w3t034nTkbX02cOQ7stgcwyxRO', '08123456789', 'Verified', NULL, '2025-11-10 05:05:08', '2025-11-10 05:05:08');

-- Dumping structure for table db-polkam.pmb_wawancara
CREATE TABLE IF NOT EXISTS `pmb_wawancara` (
  `id` varchar(50) NOT NULL,
  `nomor_registrasi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Menunggu','Lulus','Tidak Lulus') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nomor_registrasi` (`nomor_registrasi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db-polkam.pmb_wawancara: ~0 rows (approximately)
INSERT INTO `pmb_wawancara` (`id`, `nomor_registrasi`, `status`, `created_at`, `updated_at`) VALUES
	('ZCOK9QZVGEQQWIZVHSIF', '219251181087526', 'Lulus', '2026-01-12 08:25:22', '2026-01-12 08:37:23');

-- Dumping structure for table db-polkam.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db-polkam.sessions: ~6 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('7XtCrHwHDFtiEFlGOoC8kqzMJMItSZEVBPz2uaHn', 'OETRKPAMDNRBNFYG9F7Y', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo5OntzOjY6Il90b2tlbiI7czo0MDoicVI4NjlpYnRWNGNuWHFuRkpEYTZickllZlQxOWlUdXVZT21lNVIwSSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC91c2VyL3Blbmd1bXVtYW4iO3M6NToicm91dGUiO047fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtzOjIwOiJPRVRSS1BBTUROUkJORllHOUY3WSI7czo1OiJzdGF0ZSI7czo0MDoicFZkVGF1Rzl5Z0lBTTdudjhsYk5FcFBOYnJDdkwwNFhSdU1OOXVwUSI7czoyOiJpZCI7czoyMDoiT0VUUktQQU1ETlJCTkZZRzlGN1kiO3M6ODoidXNlcm5hbWUiO3M6MTQ6IlJhaG1hdCBIYW1kYW5pIjtzOjU6ImVtYWlsIjtzOjI2OiJyYWhtYXRoYW1kYW5pMzE0QGdtYWlsLmNvbSI7czo3OiJyb2xlX2lkIjtOO30=', 1768213450),
	('8x3plJBc948PzIVJNgwQ1ib3pVM0qD81G9DKLfPd', 'HFPEOSVCT2RVZY3VXAYF', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo4OntzOjk6Il9wcmV2aW91cyI7YToyOntzOjM6InVybCI7czozOToiaHR0cDovL2xvY2FsaG9zdDo4MDAwL3BtYi9sdWx1cy1zZWxla3NpIjtzOjU6InJvdXRlIjtzOjQ6InBtYi4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoiYno1dUFhT1J1MmQ2aklNbmhHMFo1dG9NaUJNMkFwODBsQlhiOUhUWSI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO3M6MjA6IkhGUEVPU1ZDVDJSVlpZM1ZYQVlGIjtzOjI6ImlkIjtzOjIwOiJIRlBFT1NWQ1QyUlZaWTNWWEFZRiI7czo4OiJ1c2VybmFtZSI7czo5OiJhZG1pbiBwbWIiO3M6NToiZW1haWwiO3M6MTM6InBtYkBnbWFpbC5jb20iO3M6Nzoicm9sZV9pZCI7Tjt9', 1768211165),
	('FZjPRkXkklfU4n1GVdh3aXLtQD0s25qJnCqGHp5i', 'OETRKPAMDNRBNFYG9F7Y', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo4OntzOjY6Il90b2tlbiI7czo0MDoiNVE3ZVViUVdBcWlqSTBreUlDQnBJUnRaa1M5eHpBY1d2RW1VWm4yQSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC91c2VyL3Blbmd1bXVtYW4iO3M6NToicm91dGUiO047fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtzOjIwOiJPRVRSS1BBTUROUkJORllHOUY3WSI7czoyOiJpZCI7czoyMDoiT0VUUktQQU1ETlJCTkZZRzlGN1kiO3M6ODoidXNlcm5hbWUiO3M6MTQ6IlJhaG1hdCBIYW1kYW5pIjtzOjU6ImVtYWlsIjtzOjI2OiJyYWhtYXRoYW1kYW5pMzE0QGdtYWlsLmNvbSI7czo3OiJyb2xlX2lkIjtOO30=', 1768271518),
	('SsUo0szqLaKdfKmSSNQFzGjky5Is0k6zGQJ7Zf4x', 'T5R6S5W2VZHTONSOLKJ9', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo4OntzOjY6Il90b2tlbiI7czo0MDoiYWc5TmFtZHcwd1Y1b2tLSFVXeVE2RkVpcVdzT2tFakR0Rk4yZ0lBMiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9rZXVhbmdhbi9kYXRhLXBlbWJheWFyYW4iO3M6NToicm91dGUiO047fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtzOjIwOiJUNVI2UzVXMlZaSFRPTlNPTEtKOSI7czoyOiJpZCI7czoyMDoiVDVSNlM1VzJWWkhUT05TT0xLSjkiO3M6ODoidXNlcm5hbWUiO3M6ODoia2V1YW5nYW4iO3M6NToiZW1haWwiO3M6MTg6ImtldWFuZ2FuQGdtYWlsLmNvbSI7czo3OiJyb2xlX2lkIjtOO30=', 1768213421);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
