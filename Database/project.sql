/*
 Navicat Premium Data Transfer

 Source Server         : project
 Source Server Type    : MySQL
 Source Server Version : 50620
 Source Host           : localhost:3306
 Source Schema         : project

 Target Server Type    : MySQL
 Target Server Version : 50620
 File Encoding         : 65001

 Date: 18/01/2022 11:55:51
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for divisi
-- ----------------------------
DROP TABLE IF EXISTS `divisi`;
CREATE TABLE `divisi`  (
  `id_divisi` int(11) NOT NULL AUTO_INCREMENT,
  `divisi` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_divisi`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of divisi
-- ----------------------------
INSERT INTO `divisi` VALUES (1, 'networking');
INSERT INTO `divisi` VALUES (2, 'administrasi');
INSERT INTO `divisi` VALUES (3, 'aplikasi');
INSERT INTO `divisi` VALUES (4, 'direksi');

-- ----------------------------
-- Table structure for instansi
-- ----------------------------
DROP TABLE IF EXISTS `instansi`;
CREATE TABLE `instansi`  (
  `id_instansi` int(11) NOT NULL AUTO_INCREMENT,
  `instansi` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_instansi`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of instansi
-- ----------------------------
INSERT INTO `instansi` VALUES (7, 'SEKRETARIAT DAERAH PROVINSI JAWA BARAT', 'Jl. Diponegoro No. 22 Kota. Bandung');
INSERT INTO `instansi` VALUES (8, ' DINAS PERTANIAN TANAMAN PANGAN PROVINSI JAWA ... ', 'Jl. Surapati No.71, Sadang Serang, Kecamatan Coblong, Kota Bandung, Jawa Barat 40133');
INSERT INTO `instansi` VALUES (10, 'BPPD KOTA BANDUNG', 'Jl. Wastukencana No.2, Babakan Ciamis, Kec. Sumur Bandung, Kota Bandung, Jawa Barat 40117');

-- ----------------------------
-- Table structure for item_pekerjaan
-- ----------------------------
DROP TABLE IF EXISTS `item_pekerjaan`;
CREATE TABLE `item_pekerjaan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_task` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `deskripsi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_mulai` datetime NOT NULL,
  `tanggal_selesai` datetime NOT NULL,
  `gambar` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_task`(`id_task`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of item_pekerjaan
-- ----------------------------
INSERT INTO `item_pekerjaan` VALUES (2, 6, 3, '<ul>\r\n	<li>instalasi kabel lan</li>\r\n</ul>\r\n', '2022-01-17 08:00:00', '2022-01-17 12:00:00', 'HKNO9126.JPG', '2022-01-17 08:36:41');
INSERT INTO `item_pekerjaan` VALUES (3, 6, 3, '<ul>\r\n	<li>penarikan kabel stp</li>\r\n</ul>\r\n', '2022-01-17 13:00:00', '2022-01-17 17:00:00', 'IMG_E0378.JPG', '2022-01-17 09:37:16');

-- ----------------------------
-- Table structure for kelamin
-- ----------------------------
DROP TABLE IF EXISTS `kelamin`;
CREATE TABLE `kelamin`  (
  `id_kelamin` int(11) NOT NULL AUTO_INCREMENT,
  `kelamin` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_kelamin`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of kelamin
-- ----------------------------
INSERT INTO `kelamin` VALUES (1, 'Pria');
INSERT INTO `kelamin` VALUES (2, 'Wanita');

-- ----------------------------
-- Table structure for pendidikan
-- ----------------------------
DROP TABLE IF EXISTS `pendidikan`;
CREATE TABLE `pendidikan`  (
  `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT,
  `pendidikan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_pendidikan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pendidikan
-- ----------------------------
INSERT INTO `pendidikan` VALUES (1, 'SMA / SMK');
INSERT INTO `pendidikan` VALUES (2, 'S1');
INSERT INTO `pendidikan` VALUES (3, 'S2');

-- ----------------------------
-- Table structure for proyek
-- ----------------------------
DROP TABLE IF EXISTS `proyek`;
CREATE TABLE `proyek`  (
  `id_proyek` int(11) NOT NULL AUTO_INCREMENT,
  `proyek` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_instansi` int(11) NOT NULL,
  `mulai_proyek` date NOT NULL,
  `selesai_proyek` date NOT NULL,
  PRIMARY KEY (`id_proyek`) USING BTREE,
  INDEX `id_instansi`(`id_instansi`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of proyek
-- ----------------------------
INSERT INTO `proyek` VALUES (15, 'Pemeliharaan Jaringan', 7, '2022-01-03', '2022-12-30');

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role`  (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_role`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES (1, 'admin');
INSERT INTO `role` VALUES (2, 'user');

-- ----------------------------
-- Table structure for task_proyek
-- ----------------------------
DROP TABLE IF EXISTS `task_proyek`;
CREATE TABLE `task_proyek`  (
  `id_task` int(11) NOT NULL AUTO_INCREMENT,
  `id_userproyek` int(11) NOT NULL,
  `tanggal_input` datetime NOT NULL,
  `task` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_task`) USING BTREE,
  INDEX `id_userproyek`(`id_userproyek`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of task_proyek
-- ----------------------------
INSERT INTO `task_proyek` VALUES (2, 4, '2022-01-11 04:11:39', 'pemeliharaan core router vyatta');
INSERT INTO `task_proyek` VALUES (3, 5, '2022-01-11 04:28:03', 'pemeliharaan server & mikrotik');
INSERT INTO `task_proyek` VALUES (4, 6, '2022-01-13 05:08:55', 'maintenance perangkat jaringan');
INSERT INTO `task_proyek` VALUES (5, 7, '2022-01-13 05:33:13', 'perancangan frontend aplikasi');
INSERT INTO `task_proyek` VALUES (6, 8, '2022-01-17 06:48:25', 'Pemeliharaan Core Router ');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_telp` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `role` int(11) NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kelamin` int(11) NOT NULL,
  `divisi` int(11) NOT NULL,
  `pendidikan` int(11) NOT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_user`) USING BTREE,
  INDEX `pendidikan`(`pendidikan`) USING BTREE,
  INDEX `divisi`(`divisi`) USING BTREE,
  INDEX `role`(`role`) USING BTREE,
  INDEX `pendidikan_2`(`pendidikan`) USING BTREE,
  INDEX `pendidikan_3`(`pendidikan`) USING BTREE,
  INDEX `divisi_2`(`divisi`) USING BTREE,
  INDEX `role_2`(`role`) USING BTREE,
  INDEX `kelamin`(`kelamin`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'Administrator', 'admin', 'admin@bit.co.id', '08911223311', 1, '21232f297a57a5a743894a0e4a801fc3', 1, 1, 1, 'Jl. Merak Ngibing No. 12 Bandung');
INSERT INTO `user` VALUES (3, 'Rizky Panji', 'rizkypanji', 'rizkypanji@bit.co.id', '089123221131', 2, '5f31bb8b626959510975c71a94c2c5fd', 1, 1, 1, 'Jl. Jamika. Kota. Bandung');
INSERT INTO `user` VALUES (4, 'Yoga Septian', 'yoga', 'yogaseptian@bit.co.id', '089312113322', 2, '807659cd883fc0a63f6ce615893b3558', 1, 1, 1, 'Jl. Ciawitali Kota. Cimahi');
INSERT INTO `user` VALUES (5, 'Sandi Prayogo', 'sandi', 'sandi@bit.co.id', '08998655432', 2, 'ac9b4e0b6a21758534db2a6324d34a54', 1, 1, 1, 'Jl. Maleber Utara');

-- ----------------------------
-- Table structure for user_proyek
-- ----------------------------
DROP TABLE IF EXISTS `user_proyek`;
CREATE TABLE `user_proyek`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_proyek` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `nama_karyawan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_proyek`(`id_proyek`) USING BTREE,
  INDEX `id_karyawan`(`id_karyawan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user_proyek
-- ----------------------------
INSERT INTO `user_proyek` VALUES (4, 9, 3, 'Rizky Panji');
INSERT INTO `user_proyek` VALUES (5, 11, 5, 'Sandi Prayogo');
INSERT INTO `user_proyek` VALUES (6, 9, 4, 'Yoga Septian');
INSERT INTO `user_proyek` VALUES (7, 12, 7, 'Sulaeman');
INSERT INTO `user_proyek` VALUES (8, 15, 3, 'Rizky Panji');

SET FOREIGN_KEY_CHECKS = 1;
