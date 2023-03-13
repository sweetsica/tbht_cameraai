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


-- Dumping database structure for cam_ai
DROP DATABASE IF EXISTS `cam_ai`;
CREATE DATABASE IF NOT EXISTS `cam_ai` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `cam_ai`;

-- Dumping structure for table cam_ai.belong
DROP TABLE IF EXISTS `belong`;
CREATE TABLE IF NOT EXISTS `belong` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_staff` varchar(25) DEFAULT NULL,
  `id_room` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mp` (`id_room`) USING BTREE,
  KEY `mnv` (`id_staff`) USING BTREE,
  CONSTRAINT `FK_belong_room` FOREIGN KEY (`id_room`) REFERENCES `room` (`id`),
  CONSTRAINT `FK_belong_user` FOREIGN KEY (`id_staff`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table cam_ai.belong: ~6 rows (approximately)
INSERT INTO `belong` (`id`, `id_staff`, `id_room`) VALUES
	(32, '1', '37'),
	(33, '4', '37'),
	(36, '50234', '37'),
	(37, '2378231312193421312', 'H2246HV0046'),
	(38, '2378989238671638528', 'H2246HV0046'),
	(39, '2378992524774604800', 'H2246HV0046');

-- Dumping structure for table cam_ai.company
DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name_company` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `level` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=16122 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table cam_ai.company: ~5 rows (approximately)
INSERT INTO `company` (`id`, `name_company`, `level`) VALUES
	(41, 'Thái Hưng', 0),
	(15835, 'Văn phong MTT', 0),
	(15904, 'Cửa hàng', 0),
	(16120, 'Thái Hưng', 0),
	(16121, 'Thái Hưng', 0);

-- Dumping structure for table cam_ai.room
DROP TABLE IF EXISTS `room`;
CREATE TABLE IF NOT EXISTS `room` (
  `id` varchar(50) NOT NULL DEFAULT 'AUTO_INCREMENT',
  `name_room` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_company` int DEFAULT NULL,
  `level` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `mcompany` (`id_company`) USING BTREE,
  CONSTRAINT `m_company` FOREIGN KEY (`id_company`) REFERENCES `company` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table cam_ai.room: ~2 rows (approximately)
INSERT INTO `room` (`id`, `name_room`, `id_company`, `level`) VALUES
	('37', 'IT', 41, 1),
	('H2246HV0046', '"Văn_Phòng_MTT"', 15835, 1);

-- Dumping structure for table cam_ai.timekeeping
DROP TABLE IF EXISTS `timekeeping`;
CREATE TABLE IF NOT EXISTS `timekeeping` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `time_now` time NOT NULL DEFAULT '00:00:00',
  `time_out` time NOT NULL DEFAULT '00:00:00',
  `role` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `id_belong` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `id_belong` (`id_belong`) USING BTREE,
  CONSTRAINT `FK_timekeeping_belong` FOREIGN KEY (`id_belong`) REFERENCES `belong` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table cam_ai.timekeeping: ~1 rows (approximately)
INSERT INTO `timekeeping` (`id`, `date`, `time_now`, `time_out`, `role`, `id_belong`) VALUES
	(51, '2023-03-01', '20:03:00', '18:03:00', 'muộn', 32);

-- Dumping structure for table cam_ai.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` varchar(25) NOT NULL,
  `fullname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `date_birth` date DEFAULT NULL,
  `date_job_receive` date NOT NULL,
  `status` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `role` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table cam_ai.user: ~10 rows (approximately)
INSERT INTO `user` (`id`, `fullname`, `email`, `date_birth`, `date_job_receive`, `status`, `role`) VALUES
	('1', 'Kiêu Đăng Huy', 'kieudanghuy.code@gmail.com', '2002-05-21', '2023-01-01', 'Đang làm', 'Thực Tập'),
	('1121', '1', '2', '0002-02-22', '0002-02-22', 'Đang Làm', 'Admin'),
	('2', 'Nguyễn Văn Minh', 'vanminh@gmail.com', '2000-03-01', '2023-01-01', 'Đang làm', 'Thực tập'),
	('2378231312193421312', 'Trịnh Xuân Tuyền', 'txt1312@gmail.com', '2023-03-08', '2023-03-08', 'Đang làm', 'Nhân viên'),
	('2378989238671638528', 'Chu Văn Linh', 'cvl8528@gmail.com', '2023-03-08', '2023-03-08', 'Đang làm', 'Nhân viên'),
	('2378992524774604800', 'Sỹ Sơn', 'ss4800@gmail.com', '2023-03-08', '2023-03-08', 'Đang làm', 'Nhân viên'),
	('2381101746790334464', 'Nguyễn Thị Nga', 'ntn4464@gmail.com', '2023-03-08', '2023-03-08', 'Đang làm', 'Nhân viên'),
	('3', 'Hoàng Đực cảnh', 'canh12@gmail.com', '2002-03-01', '2023-01-01', 'Đang làm', 'Thục tập'),
	('4', 'Nguyễn Thế Công', 'cong12@gmail.com', '1996-03-01', '2023-01-01', 'Đang làm', 'Thực tập'),
	('50234', '21', '121', '2023-03-07', '2023-03-07', 'Đang làm', 'Nhân viên');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
