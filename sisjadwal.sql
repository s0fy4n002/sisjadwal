CREATE TABLE `roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', '2024-07-07 13:47:55', '2024-07-07 13:47:56'),
	(2, 'guru', '2024-07-07 13:48:05', '2024-07-07 13:48:05'),
	(3, 'operator', '2024-07-07 13:49:26', '2024-07-07 13:49:26');


CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role_id` int NOT NULL DEFAULT '2',
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `jenis_kelamin` tinyint NOT NULL COMMENT '1=laki2 2=perempuan',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO `users` (`id`, `role_id`, `username`, `name`, `jenis_kelamin`, `password`, `created_at`, `updated_at`) VALUES
	(1, 2, 'dadang', 'Dadang', 1, '$2y$12$sFuYn9cF.XjmPvvIOGR2NuwXCWHB19cR.I163raNWXtnt0TDBX6Q.', '2024-07-07 07:16:49', '2024-07-07 11:21:58'),
	(2, 2, 'andi', 'andi', 1, '$2y$12$j4CSjd3trKCvzLaR6xOepOHPTs7xmlgM5J/yoUmDnhzYneFx2xD3m', '2024-07-07 07:08:39', '2024-07-07 07:08:39'),
	(3, 2, 'test', 'test', 1, '$2y$12$JTI8Y4IfXugrNv3cS3ir6O1SJ080tQvtnAJ4xKFtNSzb2Ess3mLKG', '2024-07-07 07:16:23', '2024-07-07 07:16:23'),
	(4, 2, 'lisna', 'Lisna', 2, '$2y$12$itRiqkDkkwKl0nZIH7NPL.gYkMCbx2ikg45gtFkTGS85x/KcvybKi', '2024-07-07 07:17:40', '2024-07-07 07:17:40'),
	(6, 2, 'nina', 'nina', 2, '$2y$12$RvEywFitlO7oqZ4QhKIaT.lV8m1VhSOBEwMxAq6wsNTqSqOU/u2Ny', '2024-07-07 19:52:26', '2024-07-12 21:51:47');


CREATE TABLE `hari` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sisjadwal.hari: ~5 rows (approximately)
INSERT INTO `hari` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'senin', '2024-07-09 04:38:07', '2024-07-09 04:38:08'),
	(2, 'selasa', '2024-07-09 04:38:38', '2024-07-09 04:38:39'),
	(3, 'rabu', '2024-07-09 04:38:45', '2024-07-09 04:38:45'),
	(4, 'kamis', '2024-07-09 04:38:53', '2024-07-09 04:38:54'),
	(5, 'jumat', '2024-07-09 04:39:04', '2024-07-09 04:39:05'),
	(6, 'sabtu', '2024-07-09 04:39:13', '2024-07-09 04:39:13');

-- Dumping structure for table sisjadwal.jam_slot
CREATE TABLE `jam_slot` (
  `id` int NOT NULL AUTO_INCREMENT,
  `hari_id` int NOT NULL,
  `jam_ke` int NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_jam_slot_hari` (`hari_id`),
  CONSTRAINT `FK_jam_slot_hari` FOREIGN KEY (`hari_id`) REFERENCES `hari` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sisjadwal.jam_slot: ~9 rows (approximately)
INSERT INTO `jam_slot` (`id`, `hari_id`, `jam_ke`, `jam_mulai`, `jam_selesai`, `created_at`, `updated_at`) VALUES
	(1, 1, 6, '07:00:00', '08:10:00', NULL, '2024-07-10 20:27:43'),
	(2, 1, 2, '08:10:00', '09:10:00', NULL, NULL),
	(3, 1, 3, '09:10:00', '10:10:00', NULL, NULL),
	(4, 1, 4, '10:10:00', '11:10:00', NULL, NULL),
	(5, 1, 5, '11:10:00', '12:10:00', NULL, NULL),
	(6, 1, 1, '08:27:00', '09:00:00', '2024-07-10 20:28:06', '2024-07-10 20:28:06'),
	(7, 2, 1, '07:00:00', '08:10:00', '2024-07-10 20:36:09', '2024-07-10 20:37:00'),
	(8, 2, 2, '08:00:00', '09:00:00', '2024-07-10 20:36:25', '2024-07-10 20:36:25'),
	(9, 2, 3, '09:00:00', '10:00:00', '2024-07-10 20:36:40', '2024-07-10 20:54:34');

-- Dumping structure for table sisjadwal.tingkatan
CREATE TABLE `tingkatan` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sisjadwal.tingkatan: ~3 rows (approximately)
INSERT INTO `tingkatan` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, '1 (Satu)', '2024-07-07 07:39:08', '2024-07-07 07:39:20'),
	(2, '2 (Dua)', '2024-07-07 07:39:15', '2024-07-07 07:39:15'),
	(3, '3 (tiga)', '2024-07-12 21:43:31', '2024-07-12 21:43:37');

-- Dumping structure for table sisjadwal.kelas
CREATE TABLE `kelas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tingkatan_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_kelas_level` (`tingkatan_id`),
  CONSTRAINT `FK_kelas_level` FOREIGN KEY (`tingkatan_id`) REFERENCES `tingkatan` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sisjadwal.kelas: ~3 rows (approximately)
INSERT INTO `kelas` (`id`, `tingkatan_id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 2, 'a', '2024-07-07 09:21:30', '2024-07-07 09:44:26'),
	(2, 1, 'b', '2024-07-07 09:55:44', '2024-07-07 09:55:44'),
	(3, 1, 'c', '2024-07-09 04:49:15', '2024-07-09 04:49:15');

-- Dumping structure for table sisjadwal.pelajaran
CREATE TABLE `pelajaran` (
  `id_pelajaran` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `name` varchar(50) NOT NULL,
  `tahun_ajaran` year NOT NULL DEFAULT '2000',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pelajaran`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sisjadwal.pelajaran: ~5 rows (approximately)
INSERT INTO `pelajaran` (`id_pelajaran`, `name`, `tahun_ajaran`, `created_at`, `deleted_at`, `updated_at`) VALUES
	('BINGGRIS02', 'Bahasa Inggris', '2024', '2024-07-07 11:17:05', '2024-07-07 18:17:05', '2024-07-07 11:17:05'),
	('MTK01', 'Matematika', '2024', '2024-07-07 11:16:25', '2024-07-07 18:16:25', '2024-07-07 11:16:35'),
	('PEL02', 'Olahraga', '2024', '2024-07-10 21:02:53', '2024-07-10 21:02:53', '2024-07-10 21:02:53'),
	('PEL03', 'Agama', '2024', '2024-07-10 21:03:03', '2024-07-10 21:03:03', '2024-07-10 21:03:03'),
	('PEL04', 'Seni Budaya', '2024', '2024-07-12 21:47:20', '2024-07-12 21:47:20', '2024-07-12 21:47:35');

-- Dumping structure for table sisjadwal.penjadwalan
CREATE TABLE `penjadwalan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `guru_id` int DEFAULT NULL,
  `kelas_id` int DEFAULT NULL,
  `pelajaran_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `jam_slot_id` int NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_penjadwalan_users` (`guru_id`),
  KEY `FK_penjadwalan_kelas` (`kelas_id`),
  KEY `FK_penjadwalan_pelajaran` (`pelajaran_id`),
  KEY `jam_slot_id` (`jam_slot_id`) USING BTREE,
  CONSTRAINT `FK_penjadwalan_jam_slot` FOREIGN KEY (`jam_slot_id`) REFERENCES `jam_slot` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_penjadwalan_kelas` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_penjadwalan_pelajaran` FOREIGN KEY (`pelajaran_id`) REFERENCES `pelajaran` (`id_pelajaran`) ON UPDATE CASCADE,
  CONSTRAINT `FK_penjadwalan_users` FOREIGN KEY (`guru_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sisjadwal.penjadwalan: ~8 rows (approximately)
INSERT INTO `penjadwalan` (`id`, `guru_id`, `kelas_id`, `pelajaran_id`, `jam_slot_id`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 'BINGGRIS02', 1, '2024-07-09 04:51:34', '2024-07-09 04:51:34'),
	(4, 1, 2, 'BINGGRIS02', 1, '2024-07-09 05:39:31', '2024-07-09 05:39:31'),
	(5, 1, 1, 'BINGGRIS02', 2, '2024-07-09 05:43:56', '2024-07-09 05:43:56'),
	(7, 3, 2, 'BINGGRIS02', 2, '2024-07-09 05:46:29', '2024-07-09 05:46:29'),
	(8, 4, 1, 'MTK01', 3, '2024-07-09 05:47:57', '2024-07-09 05:47:57'),
	(9, 2, 1, 'PEL02', 8, '2024-07-10 21:04:17', '2024-07-10 21:04:17'),
	(10, 4, 2, 'PEL04', 6, '2024-07-12 21:51:08', '2024-07-12 21:51:08'),
	(11, 4, 2, 'PEL04', 9, '2024-07-12 21:51:35', '2024-07-12 21:51:35');

