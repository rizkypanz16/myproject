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

 Date: 04/01/2022 10:37:47
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
INSERT INTO `instansi` VALUES (9, 'BP BATAM', 'Jl. Ibnu Sutowo No.1, Teluk Tering, Batam Kota, Batam City, Riau Islands 29400');
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
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_task`(`id_task`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of item_pekerjaan
-- ----------------------------
INSERT INTO `item_pekerjaan` VALUES (1, 1, 3, 'troubleshooting', '2021-01-04 08:00:00', '2021-01-04 12:00:00', '2021-01-04 17:00:00');
INSERT INTO `item_pekerjaan` VALUES (2, 3, 3, 'update serial', '2021-01-05 08:00:00', '2021-01-05 12:00:00', '2021-01-05 17:00:00');
INSERT INTO `item_pekerjaan` VALUES (3, 1, 3, 'troubleshooting', '2021-01-06 08:00:00', '2021-01-06 12:00:00', '2021-01-06 17:00:00');
INSERT INTO `item_pekerjaan` VALUES (4, 3, 3, 'update serial', '2021-01-07 08:00:00', '2021-01-07 12:00:00', '2021-01-07 17:00:00');
INSERT INTO `item_pekerjaan` VALUES (5, 1, 3, 'troubleshooting', '2021-01-08 08:00:00', '2021-01-08 12:00:00', '2021-01-08 17:00:00');
INSERT INTO `item_pekerjaan` VALUES (6, 3, 3, 'update serial', '2021-02-01 08:00:00', '2021-02-01 12:00:00', '2021-02-01 17:00:00');
INSERT INTO `item_pekerjaan` VALUES (7, 1, 3, 'troubleshooting', '2021-02-02 08:00:00', '2021-02-02 12:00:00', '2021-02-02 17:00:00');
INSERT INTO `item_pekerjaan` VALUES (8, 3, 3, '<p>troubleshooting ns server</p>\r\n', '2021-12-18 08:00:00', '2021-12-18 12:00:00', '2021-12-18 07:31:05');
INSERT INTO `item_pekerjaan` VALUES (9, 3, 3, '<p>troubleshooting serial</p>\r\n', '2021-12-27 12:00:00', '2021-12-27 17:00:00', '2021-12-27 08:56:54');
INSERT INTO `item_pekerjaan` VALUES (10, 4, 4, '<p>trouble akses point manglayang</p>\r\n', '2021-01-04 08:00:00', '2021-01-04 10:00:00', '2021-01-04 08:27:47');
INSERT INTO `item_pekerjaan` VALUES (11, 4, 4, '<p>troubleshooting wifi biro umum</p>\r\n', '2021-03-01 13:00:00', '2021-03-01 16:00:00', '2021-03-01 08:31:24');
INSERT INTO `item_pekerjaan` VALUES (12, 4, 4, '<p>troubleshooting wifi biro umum</p>\r\n', '2021-02-01 13:00:00', '2021-02-01 16:00:00', '2021-02-01 08:31:24');
INSERT INTO `item_pekerjaan` VALUES (13, 4, 4, '<p>trouble akses point papandayan</p>\r\n', '2021-05-04 08:00:00', '2021-05-04 10:00:00', '2021-05-04 08:27:47');
INSERT INTO `item_pekerjaan` VALUES (14, 4, 4, '<p>troubleshooting wifi biro umum</p>\r\n', '2021-03-02 13:00:00', '2021-03-02 16:00:00', '2021-03-02 08:31:24');
INSERT INTO `item_pekerjaan` VALUES (15, 3, 3, 'update serial', '2021-06-01 08:00:00', '2021-06-01 12:00:00', '2021-06-01 17:00:00');
INSERT INTO `item_pekerjaan` VALUES (16, 3, 3, 'update serial', '2021-06-02 08:00:00', '2021-06-02 12:00:00', '2021-06-02 17:00:00');
INSERT INTO `item_pekerjaan` VALUES (19, 3, 3, 'update domain', '2021-07-09 08:00:00', '2021-07-09 12:00:00', '2021-07-09 17:00:00');
INSERT INTO `item_pekerjaan` VALUES (20, 1, 3, '<p>maintenance</p>\r\n', '2021-12-29 08:00:00', '2021-12-29 09:30:00', '2021-12-29 05:15:50');
INSERT INTO `item_pekerjaan` VALUES (21, 6, 6, '<p>pembuatan UI website</p>\r\n', '2021-10-04 09:00:00', '2021-10-04 11:30:00', '2021-10-04 05:33:53');

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
  PRIMARY KEY (`id_proyek`) USING BTREE,
  INDEX `id_instansi`(`id_instansi`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of proyek
-- ----------------------------
INSERT INTO `proyek` VALUES (9, 'Pemeliharaan Infrastuktur Jaringan', 7);
INSERT INTO `proyek` VALUES (11, 'Pengembangan Server', 8);
INSERT INTO `proyek` VALUES (12, 'Pengembangan Aplikasi', 9);
INSERT INTO `proyek` VALUES (13, 'Pengembangan Aplikasi', 10);

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
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of task_proyek
-- ----------------------------
INSERT INTO `task_proyek` VALUES (1, 13, '2021-11-20 08:11:50', 'pemeliharaan core router vyatta');
INSERT INTO `task_proyek` VALUES (2, 16, '2021-11-20 08:13:05', 'Maintenance Perangkat Jaringan ');
INSERT INTO `task_proyek` VALUES (3, 13, '2021-11-24 11:56:21', 'pemeliharaan server ns');
INSERT INTO `task_proyek` VALUES (4, 14, '2021-12-10 07:23:57', 'Pemeliharaan Perangkat Accesspoint dan Wifi');
INSERT INTO `task_proyek` VALUES (5, 17, '2021-12-28 08:40:59', 'penarikan kabel jaringan');
INSERT INTO `task_proyek` VALUES (6, 18, '2021-12-29 05:32:16', 'pembuatan aplikasi backend dan frontend');
INSERT INTO `task_proyek` VALUES (7, 19, '2021-12-29 05:40:15', 'pembuatan aplikasi backend dan frontend');

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
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'Administrator', 'admin', 'admin@bit.co.id', '08911223311', 1, '21232f297a57a5a743894a0e4a801fc3', 1, 1, 1, 'Jl. Merak Ngibing No. 12 Bandung');
INSERT INTO `user` VALUES (3, 'Rizky Panji', 'rizkypanji', 'rizkypanji@bit.co.id', '089123221131', 2, '5f31bb8b626959510975c71a94c2c5fd', 1, 1, 1, 'Jl. Jamika. Kota. Bandung');
INSERT INTO `user` VALUES (4, 'Yoga Septian', 'yoga', 'yogaseptian@bit.co.id', '089312113322', 2, '807659cd883fc0a63f6ce615893b3558', 1, 1, 1, 'Jl. Ciawitali Kota. Cimahi');
INSERT INTO `user` VALUES (5, 'Sandi Prayogo', 'sandi', 'sandi@bit.co.id', '08998655432', 2, 'ac9b4e0b6a21758534db2a6324d34a54', 1, 1, 1, 'Jl. Maleber Utara');
INSERT INTO `user` VALUES (6, 'Naufal Dwi', 'naufal', 'naufal', '0895652365', 2, 'a7ef174d3ed272acd2b72913a7ef9d40', 1, 3, 1, 'Jl. Margahayu');
INSERT INTO `user` VALUES (7, 'Sulaeman', 'sulaeman', 'sulaeman@bit.co.id', '08927323621', 2, 'cdbb3ceb3a9ca73bd12dc4c85e044365', 1, 3, 1, 'Jl. Merak Ngibing No. 12 Bandung');
INSERT INTO `user` VALUES (8, 'Ikmal Wiawan', 'ikmal', 'ikmal@bit.co.id', '0842381232', 2, '64c7fc824b418bac991d3fe363a7211e', 1, 4, 3, 'Jl. Rancamanyar Kab. Bandung');
INSERT INTO `user` VALUES (9, 'Yosep Rohayadi', 'yosep', 'yosep@bit.co.id', '08978062356', 2, '4f5b3bd0ae0019415565e554ae5f0cfa', 1, 3, 2, 'Jl. Melong Kab. Bandung');
INSERT INTO `user` VALUES (10, 'Indra Yustiana', 'indra', 'indra@bit.co.id', '081672673223', 2, 'e24f6e3ce19ee0728ff1c443e4ff488d', 1, 3, 3, 'Jl. Cimindi Kota. Cimahi');
INSERT INTO `user` VALUES (11, 'Muhdi Suhendi', 'muhdi', 'muhdi@bit.co.id', '081232676811', 2, 'ac247ce11d4a654c429a45bd390db1d2', 1, 2, 1, 'Jl. Dago Atas Kota. Bandung');

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
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user_proyek
-- ----------------------------
INSERT INTO `user_proyek` VALUES (13, 9, 3, 'Rizky Panji');
INSERT INTO `user_proyek` VALUES (14, 9, 4, 'Yoga Septian');
INSERT INTO `user_proyek` VALUES (16, 10, 3, 'Rizky Panji');
INSERT INTO `user_proyek` VALUES (17, 11, 5, 'Sandi Prayogo');
INSERT INTO `user_proyek` VALUES (18, 12, 6, 'Naufal Dwi');
INSERT INTO `user_proyek` VALUES (19, 13, 7, 'Sulaeman');

SET FOREIGN_KEY_CHECKS = 1;
