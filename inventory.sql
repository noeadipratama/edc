/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 100110
Source Host           : localhost:3306
Source Database       : hris

Target Server Type    : MYSQL
Target Server Version : 100110
File Encoding         : 65001

Date: 2016-05-25 18:52:01
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ref_bank
-- ----------------------------
DROP TABLE IF EXISTS `ref_bank`;
CREATE TABLE `ref_bank` (
  `id_bank` int(11) NOT NULL AUTO_INCREMENT,
  `nm_bank` varchar(255) DEFAULT NULL,
  `alamat_bank` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_bank`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of ref_bank
-- ----------------------------
INSERT INTO `ref_bank` VALUES ('1', 'BCA', 'Jakarta', '1');

-- ----------------------------
-- Table structure for ref_cabang
-- ----------------------------
DROP TABLE IF EXISTS `ref_cabang`;
CREATE TABLE `ref_cabang` (
  `id_cabang` int(11) NOT NULL AUTO_INCREMENT,
  `kd_cabang` varchar(3) DEFAULT NULL,
  `nm_cabang` varchar(45) DEFAULT NULL,
  `id_kota` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL COMMENT '1. Active\n2. Deactive',
  `cdate` datetime DEFAULT NULL,
  `cuser` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cabang`),
  UNIQUE KEY `fk_kd_cabang_ref_cabang` (`kd_cabang`) USING BTREE,
  KEY `fk_id_user_ref_cabang_idx` (`cuser`) USING BTREE,
  KEY `fk_id_kota_ref_kota_idx` (`id_kota`) USING BTREE,
  CONSTRAINT `ref_cabang_ibfk_1` FOREIGN KEY (`id_kota`) REFERENCES `ref_kota` (`id_kota`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ref_cabang_ibfk_2` FOREIGN KEY (`cuser`) REFERENCES `ref_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of ref_cabang
-- ----------------------------
INSERT INTO `ref_cabang` VALUES ('1', 'BKS', 'Jakarta', '1', '1', '2016-03-24 13:57:40', '1');

-- ----------------------------
-- Table structure for ref_department
-- ----------------------------
DROP TABLE IF EXISTS `ref_department`;
CREATE TABLE `ref_department` (
  `id_department` int(11) NOT NULL AUTO_INCREMENT,
  `kd_department` varchar(3) DEFAULT NULL,
  `nm_department` varchar(45) DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL COMMENT '1. Active\n2. Deactive',
  `cdate` datetime DEFAULT NULL,
  `cuser` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_department`),
  UNIQUE KEY `fk_kd_cabang_ref_depart` (`kd_department`) USING BTREE,
  KEY `fk_id_user_ref_cabang_idx` (`cuser`) USING BTREE,
  KEY `ref-department_perusahaan1` (`id_perusahaan`),
  CONSTRAINT `ref-department_perusahaan1` FOREIGN KEY (`id_perusahaan`) REFERENCES `ref_perusahaan` (`id_perusahaan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ref_department_user1` FOREIGN KEY (`cuser`) REFERENCES `ref_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of ref_department
-- ----------------------------
INSERT INTO `ref_department` VALUES ('1', '100', 'IT', '1', '1', '2016-03-24 14:41:02', '1');

-- ----------------------------
-- Table structure for ref_jabatan
-- ----------------------------
DROP TABLE IF EXISTS `ref_jabatan`;
CREATE TABLE `ref_jabatan` (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `nm_jabatan` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ref_jabatan
-- ----------------------------
INSERT INTO `ref_jabatan` VALUES ('2', 'Staff', '1');

-- ----------------------------
-- Table structure for ref_jenis
-- ----------------------------
DROP TABLE IF EXISTS `ref_jenis`;
CREATE TABLE `ref_jenis` (
  `id_jenis` int(11) NOT NULL AUTO_INCREMENT,
  `nm_jenis` varchar(255) DEFAULT NULL,
  `lama_jenis` tinyint(2) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_jenis`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ref_jenis
-- ----------------------------
INSERT INTO `ref_jenis` VALUES ('1', 'Cuti Tahunan', '0', '1');
INSERT INTO `ref_jenis` VALUES ('2', 'Cuti Melahirkan/Keguguran', '2', '1');
INSERT INTO `ref_jenis` VALUES ('3', 'Cuti Menikah', '3', '1');
INSERT INTO `ref_jenis` VALUES ('4', 'Cuti Menikahkan Anak', '2', '1');
INSERT INTO `ref_jenis` VALUES ('5', 'Cuti Mengkhitankan Anak', '2', '1');
INSERT INTO `ref_jenis` VALUES ('6', 'Cuti Membaptiskan Anak', '2', '1');
INSERT INTO `ref_jenis` VALUES ('7', 'Cuti Suami/Istri/orang tua/mertua/anak/menantu meninggal dunia', '2', '1');
INSERT INTO `ref_jenis` VALUES ('8', 'Cuti Anggota keluarga dalam satu rumah meninggal dunia', '1', '1');

-- ----------------------------
-- Table structure for ref_kota
-- ----------------------------
DROP TABLE IF EXISTS `ref_kota`;
CREATE TABLE `ref_kota` (
  `id_kota` int(11) NOT NULL AUTO_INCREMENT,
  `nm_kota` varchar(45) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL COMMENT '1. active\n2. deactive\n',
  `cdate` datetime DEFAULT NULL,
  `cuser` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_kota`),
  KEY `fk_id_user_ref_kota_idx` (`cuser`) USING BTREE,
  CONSTRAINT `ref_kota_ibfk_2` FOREIGN KEY (`cuser`) REFERENCES `ref_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of ref_kota
-- ----------------------------
INSERT INTO `ref_kota` VALUES ('1', 'Jakarta', '1', '2016-03-24 13:57:40', '1');

-- ----------------------------
-- Table structure for ref_level
-- ----------------------------
DROP TABLE IF EXISTS `ref_level`;
CREATE TABLE `ref_level` (
  `id_level` int(11) NOT NULL AUTO_INCREMENT,
  `nm_level` varchar(45) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL COMMENT '1.active\n2.deactive',
  `cdate` datetime DEFAULT NULL,
  `cuser` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_level`),
  KEY `fk_id_user_ref_level_idx` (`cuser`) USING BTREE,
  CONSTRAINT `ref_level_ibfk_1` FOREIGN KEY (`cuser`) REFERENCES `ref_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of ref_level
-- ----------------------------
INSERT INTO `ref_level` VALUES ('1', 'Super Admin', '1', '2016-03-24 13:57:40', null);

-- ----------------------------
-- Table structure for ref_libur
-- ----------------------------
DROP TABLE IF EXISTS `ref_libur`;
CREATE TABLE `ref_libur` (
  `id_libur` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_libur` date DEFAULT NULL,
  `nm_libur` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_libur`),
  UNIQUE KEY `indx_libur_tgl` (`tgl_libur`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ref_libur
-- ----------------------------
INSERT INTO `ref_libur` VALUES ('4', '2016-01-02', 'Tahun Baru');
INSERT INTO `ref_libur` VALUES ('5', '2016-01-01', 'Tahun Baru');
INSERT INTO `ref_libur` VALUES ('6', '2016-01-05', 'Tahun Baru');

-- ----------------------------
-- Table structure for ref_menu_details
-- ----------------------------
DROP TABLE IF EXISTS `ref_menu_details`;
CREATE TABLE `ref_menu_details` (
  `id_menu_details` int(11) NOT NULL AUTO_INCREMENT,
  `kd_menu_details` varchar(10) DEFAULT NULL,
  `nm_menu_details` varchar(45) DEFAULT NULL,
  `url` varchar(45) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL COMMENT '1. active\n2. deactive\n',
  `position` tinyint(2) DEFAULT NULL,
  `id_menu_groups` int(11) DEFAULT NULL,
  `cdate` datetime DEFAULT NULL,
  `cuser` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_menu_details`),
  KEY `fk_id_user_ref_menu_details_idx` (`cuser`) USING BTREE,
  KEY `fk_id_menu_groups_ref_menu_details_idx` (`id_menu_groups`) USING BTREE,
  CONSTRAINT `ref_menu_details_ibfk_1` FOREIGN KEY (`id_menu_groups`) REFERENCES `ref_menu_groups` (`id_menu_groups`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ref_menu_details_ibfk_2` FOREIGN KEY (`cuser`) REFERENCES `ref_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of ref_menu_details
-- ----------------------------
INSERT INTO `ref_menu_details` VALUES ('1', 'S01', 'Menu Groups', 'menu_groups', '1', '1', '1', '2016-03-24 13:57:40', null);
INSERT INTO `ref_menu_details` VALUES ('2', 'S02', 'Menu Groups Akses', 'menu_groups_access', '1', '2', '1', '2016-03-24 13:57:40', null);
INSERT INTO `ref_menu_details` VALUES ('3', 'S03', 'Menu Details', 'menu_details', '1', '3', '1', '2016-03-24 13:57:40', null);
INSERT INTO `ref_menu_details` VALUES ('4', 'S04', 'Menu Details Akses', 'menu_details_access', '1', '4', '1', '2016-03-24 13:57:40', null);
INSERT INTO `ref_menu_details` VALUES ('5', 'S05', 'User', 'user', '1', '5', '1', '2016-03-24 13:57:40', null);
INSERT INTO `ref_menu_details` VALUES ('6', 'S06', 'Level', 'level', '1', '6', '1', '2016-03-24 13:57:40', null);
INSERT INTO `ref_menu_details` VALUES ('9', 'M03', 'Kota', 'kota', '1', '3', '2', '2016-03-24 13:57:40', null);
INSERT INTO `ref_menu_details` VALUES ('10', 'M04', 'Cabang', 'cabang', '1', '4', '2', '2016-03-24 13:57:40', null);
INSERT INTO `ref_menu_details` VALUES ('11', 'M05', 'Perusahaan', 'perusahaan', '1', '5', '2', '2016-03-24 13:57:40', null);
INSERT INTO `ref_menu_details` VALUES ('12', 'T01', 'Absensi Alpa', 'alpa', '1', '1', '3', '2016-03-24 13:57:40', null);
INSERT INTO `ref_menu_details` VALUES ('15', 'M01', 'Bank', 'bank', '1', '1', '2', '2016-03-24 13:57:40', null);
INSERT INTO `ref_menu_details` VALUES ('16', 'M02', 'Department', 'department', '1', '2', '2', '2016-03-24 13:57:40', null);
INSERT INTO `ref_menu_details` VALUES ('17', 'T02', 'Cuti', 'cuti', '1', '2', '3', '2016-03-24 14:21:41', null);
INSERT INTO `ref_menu_details` VALUES ('18', 'T03', 'Payroll', 'payroll', '1', '4', '3', '2016-03-24 14:22:07', null);
INSERT INTO `ref_menu_details` VALUES ('19', 'M06', 'Hari Libur', 'libur', '1', '6', '2', '2016-04-13 21:13:53', null);
INSERT INTO `ref_menu_details` VALUES ('20', 'M07', 'Gaji', 'gaji', '1', '7', '2', '2016-04-14 11:12:18', null);
INSERT INTO `ref_menu_details` VALUES ('21', 'M08', 'Jabatan', 'jabatan', '1', '8', '2', '2016-04-18 12:11:54', null);
INSERT INTO `ref_menu_details` VALUES ('22', 'T04', 'Approval Cuti', 'approval', '1', '3', '3', '2016-04-19 22:58:03', null);
INSERT INTO `ref_menu_details` VALUES ('23', 'P01', 'Balance Personal', 'balance/personal', '1', '1', '4', '2016-04-24 17:26:21', null);
INSERT INTO `ref_menu_details` VALUES ('24', 'T05', 'Leave Balance', 'balance', '1', '10', '2', '2016-04-26 11:31:32', null);
INSERT INTO `ref_menu_details` VALUES ('25', 'M09', 'Jenis', 'jenis', '1', '9', '2', '2016-04-26 14:40:37', null);
INSERT INTO `ref_menu_details` VALUES ('26', 'T06', 'Approval Payroll', 'payroll/approval', '1', '6', '3', '2016-05-03 15:34:57', null);
INSERT INTO `ref_menu_details` VALUES ('27', 'T07', 'Transfer Payroll', 'payroll/transfer', '1', '7', '3', '2016-05-12 22:36:06', null);
INSERT INTO `ref_menu_details` VALUES ('28', 'T08', 'Slip Gaji', 'payroll/slipgaji', '1', '8', '3', '2016-05-14 09:25:11', null);
INSERT INTO `ref_menu_details` VALUES ('29', 'R01', 'Report Cuti', 'report', '1', '1', '5', '2016-05-16 01:23:00', null);
INSERT INTO `ref_menu_details` VALUES ('30', 'R02', 'Report Payroll', 'report/payroll', '1', '2', '5', '2016-05-16 01:23:22', null);

-- ----------------------------
-- Table structure for ref_menu_details_access
-- ----------------------------
DROP TABLE IF EXISTS `ref_menu_details_access`;
CREATE TABLE `ref_menu_details_access` (
  `id_menu_details_access` int(11) NOT NULL AUTO_INCREMENT,
  `id_level` int(11) DEFAULT NULL,
  `id_menu_details` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL COMMENT '1. active\n2. deactive\n',
  `cdate` datetime DEFAULT NULL,
  `cuser` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_menu_details_access`),
  KEY `fk_id_user_ref_menu_details_access_idx` (`cuser`) USING BTREE,
  KEY `fk_id_level_ref_menu_details_access_idx` (`id_level`) USING BTREE,
  KEY `fk_id_menu_details_ref_menu` (`id_menu_details`) USING BTREE,
  CONSTRAINT `ref_menu_details_access_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `ref_level` (`id_level`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ref_menu_details_access_ibfk_2` FOREIGN KEY (`id_menu_details`) REFERENCES `ref_menu_details` (`id_menu_details`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ref_menu_details_access_ibfk_3` FOREIGN KEY (`cuser`) REFERENCES `ref_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of ref_menu_details_access
-- ----------------------------
INSERT INTO `ref_menu_details_access` VALUES ('1', '1', '1', '1', '2016-03-24 13:57:40', null);
INSERT INTO `ref_menu_details_access` VALUES ('2', '1', '2', '1', '2016-03-24 13:57:40', null);
INSERT INTO `ref_menu_details_access` VALUES ('3', '1', '3', '1', '2016-03-24 13:57:40', null);
INSERT INTO `ref_menu_details_access` VALUES ('4', '1', '4', '1', '2016-03-24 13:57:40', null);
INSERT INTO `ref_menu_details_access` VALUES ('5', '1', '5', '1', '2016-03-24 13:57:40', null);
INSERT INTO `ref_menu_details_access` VALUES ('6', '1', '6', '1', '2016-03-24 13:57:40', '1');
INSERT INTO `ref_menu_details_access` VALUES ('9', '1', '9', '1', '2016-03-24 13:57:40', null);
INSERT INTO `ref_menu_details_access` VALUES ('10', '1', '10', '1', '2016-03-24 13:57:40', null);
INSERT INTO `ref_menu_details_access` VALUES ('11', '1', '11', '1', '2016-03-24 13:57:40', null);
INSERT INTO `ref_menu_details_access` VALUES ('12', '1', '12', '1', '2016-03-24 13:57:40', '1');
INSERT INTO `ref_menu_details_access` VALUES ('15', '1', '15', '1', '2016-03-24 13:57:40', '1');
INSERT INTO `ref_menu_details_access` VALUES ('17', '1', '17', '1', '2016-03-24 14:22:17', '1');
INSERT INTO `ref_menu_details_access` VALUES ('18', '1', '18', '1', '2016-03-24 14:22:21', '1');
INSERT INTO `ref_menu_details_access` VALUES ('19', '1', '16', '1', '2016-03-24 14:37:08', '1');
INSERT INTO `ref_menu_details_access` VALUES ('20', '1', '19', '1', '2016-04-13 21:14:11', '1');
INSERT INTO `ref_menu_details_access` VALUES ('21', '1', '20', '1', '2016-04-14 11:12:27', '1');
INSERT INTO `ref_menu_details_access` VALUES ('22', '1', '21', '1', '2016-04-18 12:12:03', '1');
INSERT INTO `ref_menu_details_access` VALUES ('23', '1', '22', '1', '2016-04-19 22:58:21', '1');
INSERT INTO `ref_menu_details_access` VALUES ('24', '1', '23', '1', '2016-04-24 17:26:33', '1');
INSERT INTO `ref_menu_details_access` VALUES ('25', '1', '24', '1', '2016-04-26 11:33:56', '1');
INSERT INTO `ref_menu_details_access` VALUES ('26', '1', '25', '1', '2016-04-26 14:40:58', '1');
INSERT INTO `ref_menu_details_access` VALUES ('27', '1', '26', '1', '2016-05-03 15:35:07', '1');
INSERT INTO `ref_menu_details_access` VALUES ('28', '1', '27', '1', '2016-05-12 22:36:31', '1');
INSERT INTO `ref_menu_details_access` VALUES ('29', '1', '28', '1', '2016-05-14 09:25:45', '1');
INSERT INTO `ref_menu_details_access` VALUES ('30', '1', '29', '1', '2016-05-16 01:23:32', '1');
INSERT INTO `ref_menu_details_access` VALUES ('31', '1', '30', '1', '2016-05-16 01:23:38', '1');

-- ----------------------------
-- Table structure for ref_menu_groups
-- ----------------------------
DROP TABLE IF EXISTS `ref_menu_groups`;
CREATE TABLE `ref_menu_groups` (
  `id_menu_groups` int(11) NOT NULL AUTO_INCREMENT,
  `nm_menu_groups` varchar(45) DEFAULT NULL,
  `icon` varchar(45) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL COMMENT '1.active\n2. deactive',
  `position` tinyint(2) DEFAULT NULL,
  `cdate` datetime DEFAULT NULL,
  `cuser` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_menu_groups`),
  KEY `fk_id_user_ref_menu_groups_idx` (`cuser`) USING BTREE,
  CONSTRAINT `ref_menu_groups_ibfk_1` FOREIGN KEY (`cuser`) REFERENCES `ref_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of ref_menu_groups
-- ----------------------------
INSERT INTO `ref_menu_groups` VALUES ('1', 'Settings', 'fa fa-edit', '1', '1', '2016-03-24 13:57:40', null);
INSERT INTO `ref_menu_groups` VALUES ('2', 'Master', 'fa fa-edit', '1', '2', '2016-03-24 13:57:40', null);
INSERT INTO `ref_menu_groups` VALUES ('3', 'Transaksi', 'fa fa-edit', '1', '3', '2016-03-24 13:57:40', null);
INSERT INTO `ref_menu_groups` VALUES ('4', 'Personal', 'fa fa-edit', '1', '4', '2016-04-24 17:25:08', null);
INSERT INTO `ref_menu_groups` VALUES ('5', 'Report', 'fa fa-edit', '1', '5', '2016-05-16 01:22:13', null);

-- ----------------------------
-- Table structure for ref_menu_groups_access
-- ----------------------------
DROP TABLE IF EXISTS `ref_menu_groups_access`;
CREATE TABLE `ref_menu_groups_access` (
  `id_menu_groups_access` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu_groups` int(11) DEFAULT NULL,
  `id_level` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL COMMENT '1. Active\n2. Deactive',
  `cdate` datetime DEFAULT NULL,
  `cuser` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_menu_groups_access`),
  KEY `fk_id_user_ref_menu_groups_access_idx` (`cuser`) USING BTREE,
  KEY `fk_id_level_ref_menu_groups_access_idx` (`id_level`) USING BTREE,
  KEY `fk_id_menugroups` (`id_menu_groups`) USING BTREE,
  CONSTRAINT `ref_menu_groups_access_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `ref_level` (`id_level`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ref_menu_groups_access_ibfk_2` FOREIGN KEY (`id_menu_groups`) REFERENCES `ref_menu_groups` (`id_menu_groups`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ref_menu_groups_access_ibfk_3` FOREIGN KEY (`cuser`) REFERENCES `ref_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of ref_menu_groups_access
-- ----------------------------
INSERT INTO `ref_menu_groups_access` VALUES ('1', '1', '1', '1', '2016-03-24 13:57:40', null);
INSERT INTO `ref_menu_groups_access` VALUES ('2', '2', '1', '1', '2016-03-24 13:57:40', '1');
INSERT INTO `ref_menu_groups_access` VALUES ('3', '3', '1', '1', '2016-03-24 13:57:40', '1');
INSERT INTO `ref_menu_groups_access` VALUES ('4', '4', '1', '1', '2016-04-24 17:25:19', '1');
INSERT INTO `ref_menu_groups_access` VALUES ('5', '5', '1', '1', '2016-05-16 01:22:22', '1');

-- ----------------------------
-- Table structure for ref_perusahaan
-- ----------------------------
DROP TABLE IF EXISTS `ref_perusahaan`;
CREATE TABLE `ref_perusahaan` (
  `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT,
  `nm_perusahaan` varchar(45) DEFAULT NULL,
  `jenis` tinyint(1) DEFAULT NULL COMMENT '1. Pusat 2. Subcon',
  `active` tinyint(1) DEFAULT NULL COMMENT '1. Active\n2. Deactive',
  `cdate` datetime DEFAULT NULL,
  `cuser` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_perusahaan`),
  KEY `fk_id_user_ref_perusahaan_idx` (`cuser`) USING BTREE,
  CONSTRAINT `ref_perusahaan_ibfk_1` FOREIGN KEY (`cuser`) REFERENCES `ref_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of ref_perusahaan
-- ----------------------------
INSERT INTO `ref_perusahaan` VALUES ('1', 'Indoproc', '1', '1', '2016-03-24 13:57:41', '1');

-- ----------------------------
-- Table structure for ref_user
-- ----------------------------
DROP TABLE IF EXISTS `ref_user`;
CREATE TABLE `ref_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(255) DEFAULT NULL,
  `nm_user` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `id_cabang` int(11) DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT NULL,
  `id_level` int(11) DEFAULT NULL,
  `id_atasan` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL COMMENT '1. Active\n2. Deactive\n',
  `cdate` datetime DEFAULT NULL,
  `cuser` int(11) DEFAULT NULL,
  `tgl_join` date DEFAULT NULL,
  `no_tlp` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `fk_username` (`username`) USING BTREE,
  KEY `fk_id_cabang_ref_user_idx` (`id_cabang`) USING BTREE,
  KEY `fk_id_perusahaan_ref_user_idx` (`id_perusahaan`) USING BTREE,
  KEY `fk_id_level_ref_level_idx` (`id_level`) USING BTREE,
  KEY `fk_id_user_ref_user` (`cuser`) USING BTREE,
  KEY `fk_id_atasan` (`id_atasan`) USING BTREE,
  CONSTRAINT `ref_user_ibfk_1` FOREIGN KEY (`id_cabang`) REFERENCES `ref_cabang` (`id_cabang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ref_user_ibfk_3` FOREIGN KEY (`id_level`) REFERENCES `ref_level` (`id_level`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ref_user_ibfk_4` FOREIGN KEY (`id_perusahaan`) REFERENCES `ref_perusahaan` (`id_perusahaan`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of ref_user
-- ----------------------------
INSERT INTO `ref_user` VALUES ('1', '101503001', 'adi', 'adi', '7f78f270e3e1129faf118ed92fdf54db', '1', '1', '1', '1', '1', '2016-03-24 13:57:41', null, '2016-01-01', '08111010404');
INSERT INTO `ref_user` VALUES ('2', '154544', 'Bintangs', 'bintang', '827ccb0eea8a706c4c34a16891f84e7b', '1', '1', '1', '1', '1', '2016-05-10 16:18:09', null, '0000-00-00', '');
INSERT INTO `ref_user` VALUES ('3', '2016010001', 'Gerald', 'gerald', '380891959a0754c24a7ad3525c2d1e77', '1', '1', '1', '1', '1', '2016-05-13 15:54:37', null, null, null);

-- ----------------------------
-- Table structure for tr_alpa
-- ----------------------------
DROP TABLE IF EXISTS `tr_alpa`;
CREATE TABLE `tr_alpa` (
  `id_alpa` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `tgl_alpa` date DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '1. alpa 2. sakit',
  `note_alpa` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_alpa`),
  UNIQUE KEY `indx_id_user_tgl_alpa` (`id_user`,`tgl_alpa`) USING BTREE,
  CONSTRAINT `fk_id_user_tr_alpa` FOREIGN KEY (`id_user`) REFERENCES `ref_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tr_alpa
-- ----------------------------
INSERT INTO `tr_alpa` VALUES ('5', '1', '2016-01-11', '2', 'sakit');
INSERT INTO `tr_alpa` VALUES ('7', '1', '2016-01-12', '2', 'sakit');
INSERT INTO `tr_alpa` VALUES ('8', '1', '2016-01-13', '1', 'bolos');
INSERT INTO `tr_alpa` VALUES ('9', '2', '0000-00-00', '2', 'ijin');

-- ----------------------------
-- Table structure for tr_balance
-- ----------------------------
DROP TABLE IF EXISTS `tr_balance`;
CREATE TABLE `tr_balance` (
  `id_balance` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `tahun_cuti` mediumint(4) DEFAULT NULL,
  `sisa_cuti` tinyint(2) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_balance`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tr_balance
-- ----------------------------
INSERT INTO `tr_balance` VALUES ('1', '1', '2016', '2', '1');
INSERT INTO `tr_balance` VALUES ('2', '1', '2015', '7', '1');

-- ----------------------------
-- Table structure for tr_cuti
-- ----------------------------
DROP TABLE IF EXISTS `tr_cuti`;
CREATE TABLE `tr_cuti` (
  `id_cuti` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_atasan` int(11) DEFAULT NULL,
  `id_jenis` int(11) DEFAULT NULL,
  `tgl_awal_cuti` date DEFAULT NULL,
  `tgl_akhir_cuti` date DEFAULT NULL,
  `lama_cuti` tinyint(4) DEFAULT NULL,
  `note_cuti` text,
  `status` tinyint(1) DEFAULT NULL COMMENT '1. new 2. approval 3. approve 4. reject',
  `cdate` datetime DEFAULT NULL,
  `cuser` int(11) DEFAULT NULL,
  `udate` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `alamat_cuti` text,
  PRIMARY KEY (`id_cuti`),
  KEY `fk_id_user_ref_cuti` (`id_user`),
  KEY `fk-id_atasan_tr_cuti` (`id_atasan`),
  CONSTRAINT `fk-id_atasan_tr_cuti` FOREIGN KEY (`id_atasan`) REFERENCES `ref_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_user_ref_cuti` FOREIGN KEY (`id_user`) REFERENCES `ref_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tr_cuti
-- ----------------------------
INSERT INTO `tr_cuti` VALUES ('15', '1', '1', '1', '2015-12-29', '2016-01-04', '4', 'Liburan', '3', '2016-05-08 23:33:59', '1', '2016-05-09 15:11:34', null);
INSERT INTO `tr_cuti` VALUES ('16', '3', '1', '6', '2016-05-17', '2016-05-19', '3', 'cuti dongs', '2', '2016-05-16 17:36:44', '3', '2016-05-16 17:36:50', 'Mongolia');

-- ----------------------------
-- Table structure for tr_cuti_detail
-- ----------------------------
DROP TABLE IF EXISTS `tr_cuti_detail`;
CREATE TABLE `tr_cuti_detail` (
  `id_cuti_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_cuti` int(11) DEFAULT NULL,
  `tgl_cuti` date DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cuti_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tr_cuti_detail
-- ----------------------------
INSERT INTO `tr_cuti_detail` VALUES ('37', '15', '2015-12-29', '1');
INSERT INTO `tr_cuti_detail` VALUES ('38', '15', '2015-12-30', '1');
INSERT INTO `tr_cuti_detail` VALUES ('39', '15', '2015-12-31', '1');
INSERT INTO `tr_cuti_detail` VALUES ('40', '15', '2016-01-04', '1');

-- ----------------------------
-- Table structure for tr_gaji
-- ----------------------------
DROP TABLE IF EXISTS `tr_gaji`;
CREATE TABLE `tr_gaji` (
  `id_gaji` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL COMMENT 'TETAP, KONTRAK, OUTSOURCE, MAGANG',
  `id_jabatan` int(11) DEFAULT NULL,
  `id_department` int(11) DEFAULT NULL,
  `gaji_pokok` double DEFAULT NULL,
  `tunjangan` double DEFAULT NULL,
  `makan` double DEFAULT NULL,
  `transport` double DEFAULT NULL,
  `asuransi` double DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_gaji`),
  KEY `fk_id_jabatan_tr_gaji` (`id_jabatan`),
  KEY `fk_iduser_tr_gaji` (`id_user`),
  CONSTRAINT `fk_id_jabatan_tr_gaji` FOREIGN KEY (`id_jabatan`) REFERENCES `ref_jabatan` (`id_jabatan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_iduser_tr_gaji` FOREIGN KEY (`id_user`) REFERENCES `ref_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tr_gaji
-- ----------------------------
INSERT INTO `tr_gaji` VALUES ('2', '1', 'TETAP', '2', '1', '1000000', '200000', '50000', '50000', '30000', '1');
INSERT INTO `tr_gaji` VALUES ('3', '2', 'TETAP', '2', '1', '4000000', '200000', '200000', '100000', '45000', '1');

-- ----------------------------
-- Table structure for tr_payroll
-- ----------------------------
DROP TABLE IF EXISTS `tr_payroll`;
CREATE TABLE `tr_payroll` (
  `id_payroll` int(11) NOT NULL AUTO_INCREMENT,
  `bulan` varchar(2) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '1. new 2.approval 3. Transfer 4. SLip',
  `cdate` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `cuser` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_payroll`),
  UNIQUE KEY `uq_payroll` (`bulan`,`tahun`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tr_payroll
-- ----------------------------
INSERT INTO `tr_payroll` VALUES ('29', '01', '2016', 'januari', '4', '2016-05-16 17:27:05', '1');
INSERT INTO `tr_payroll` VALUES ('31', '05', '2016', 'Mei', '1', '2016-05-19 16:05:09', '1');
INSERT INTO `tr_payroll` VALUES ('33', '02', '2016', 'df', '4', '2016-05-19 16:02:16', '1');

-- ----------------------------
-- Table structure for tr_slip
-- ----------------------------
DROP TABLE IF EXISTS `tr_slip`;
CREATE TABLE `tr_slip` (
  `id_slip` int(11) NOT NULL AUTO_INCREMENT,
  `id_payroll` int(11) DEFAULT NULL,
  `id_gaji` int(11) DEFAULT NULL,
  `id_department` int(11) DEFAULT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_bank` int(11) DEFAULT NULL,
  `gaji_pokok` double DEFAULT NULL,
  `tunjangan` double DEFAULT NULL,
  `makan` double DEFAULT NULL,
  `transport` double DEFAULT NULL,
  `asuransi` double DEFAULT NULL,
  `kerja` tinyint(2) DEFAULT NULL,
  `absen` tinyint(2) DEFAULT NULL,
  `sakit` tinyint(2) DEFAULT NULL,
  `cuti` tinyint(2) DEFAULT NULL,
  `potongan_absen` double DEFAULT NULL,
  `potongan_lain` double DEFAULT NULL,
  `tambahan_lain` double DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `bulan` varchar(2) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_slip`),
  KEY `fk_id_gaji` (`id_gaji`),
  KEY `fk_id_user` (`id_user`),
  KEY `fk_id_bank` (`id_bank`),
  KEY `fk_id_payroll` (`id_payroll`),
  CONSTRAINT `fk_id_bank` FOREIGN KEY (`id_bank`) REFERENCES `ref_bank` (`id_bank`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_gaji` FOREIGN KEY (`id_gaji`) REFERENCES `tr_gaji` (`id_gaji`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_payroll` FOREIGN KEY (`id_payroll`) REFERENCES `tr_payroll` (`id_payroll`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_user` FOREIGN KEY (`id_user`) REFERENCES `ref_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tr_slip
-- ----------------------------
INSERT INTO `tr_slip` VALUES ('40', '29', '2', '1', '2', '1', null, '1000000', '200000', '50000', '50000', '30000', '22', '1', '2', '1', '59091', null, null, '2016', '01', '1');
INSERT INTO `tr_slip` VALUES ('41', '29', '3', '1', '2', '2', null, '4000000', '200000', '200000', '100000', '45000', '22', '0', '0', '0', '0', null, null, '2016', '01', '1');
INSERT INTO `tr_slip` VALUES ('42', '31', '2', '1', '2', '1', null, '1000000', '200000', '50000', '50000', '30000', '22', '0', '0', '0', '0', null, null, '2016', '05', '1');
INSERT INTO `tr_slip` VALUES ('43', '31', '3', '1', '2', '2', null, '4000000', '200000', '200000', '100000', '45000', '22', '0', '0', '0', '0', null, null, '2016', '05', '1');
INSERT INTO `tr_slip` VALUES ('44', '33', '2', '1', '2', '1', null, '1000000', '200000', '50000', '50000', '30000', '22', '0', '0', '0', '0', null, null, '2016', '02', '1');
INSERT INTO `tr_slip` VALUES ('45', '33', '3', '1', '2', '2', null, '4000000', '200000', '200000', '100000', '45000', '22', '0', '0', '0', '0', null, null, '2016', '02', '1');

-- ----------------------------
-- Procedure structure for p_payroll
-- ----------------------------
DROP PROCEDURE IF EXISTS `p_payroll`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_payroll`(IN `p_id_payroll` int, IN p_tahun VARCHAR(4), IN p_bulan VARCHAR(2))
BEGIN
  DECLARE done INT DEFAULT FALSE;
	DECLARE a, b, absens, sakits, cutis, n, h, i INT;
	DECLARE potongan, m VARCHAR(10);
	DECLARE c, d, e, f, g DOUBLE;
  DECLARE cur1 CURSOR FOR SELECT id_gaji, id_user, gaji_pokok, tunjangan, makan, transport, asuransi, id_jabatan, id_department FROM tr_gaji where active = 1;
  
  DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

  OPEN cur1;

	SET n = CHAR_LENGTH(p_bulan);
	IF n = 1 THEN SET m = CONCAT('0', p_bulan);
	ELSE SET m = p_bulan;
  END IF;
  read_loop: LOOP
    FETCH cur1 INTO a, b, c, d, e, f, g, h, i;
		IF done THEN
      LEAVE read_loop;
    END IF;
		
		SET absens = (select count(id_alpa) from tr_alpa where DATE_FORMAT( tgl_alpa, '%Y-%m') = CONCAT(p_tahun,'-',m) and status = 1 and id_user = b );
		SET sakits = (select count(id_alpa) from tr_alpa where DATE_FORMAT( tgl_alpa, '%Y-%m') = CONCAT(p_tahun,'-',m) and status = 2 and id_user = b );
		SET cutis = (select count(id_cuti_detail) from tr_cuti_detail where DATE_FORMAT( tgl_cuti, '%Y-%m') = CONCAT(p_tahun,'-',m) and id_user = b );
		SET potongan =  (c + d + e + f )/ 22 * absens ;
		
		INSERT INTO tr_slip (id_payroll, id_gaji, id_user, gaji_pokok, tunjangan, makan, transport, asuransi, potongan_absen, tahun, bulan, status, id_jabatan, id_department, kerja, absen, sakit, cuti) VALUES (p_id_payroll, a, b, c, d, e, f, g, ROUND(potongan), p_tahun, m, 1, h, i, 22, absens, sakits, cutis);
		END LOOP;

  CLOSE cur1;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for p_rpt_absensi
-- ----------------------------
DROP PROCEDURE IF EXISTS `p_rpt_absensi`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_rpt_absensi`(IN p_bulan VARCHAR(10))
BEGIN
	select a.nik, a.nm_user, (select 22) as hari,
(select count(b.id_alpa) from tr_alpa b where DATE_FORMAT( b.tgl_alpa, '%Y-%m') = DATE_FORMAT( p_bulan, '%Y-%m') and b.status = 1 and b.id_user = a.id_user ) as alpa ,
(select count(c.id_alpa) from tr_alpa c where DATE_FORMAT( c.tgl_alpa, '%Y-%m') = DATE_FORMAT( p_bulan, '%Y-%m') and c.status = 2 and c.id_user = a.id_user ) as sakit ,
(select count(d.id_cuti_detail) from tr_cuti_detail d where DATE_FORMAT( d.tgl_cuti, '%Y-%m') = DATE_FORMAT( p_bulan, '%Y-%m') and d.id_user = a.id_user ) as cuti,
(select count(b.id_alpa) from tr_alpa b where DATE_FORMAT( b.tgl_alpa, '%Y-%m') = DATE_FORMAT( p_bulan, '%Y-%m') and b.status = 1 and b.id_user = a.id_user )  +  (select count(d.id_cuti_detail) from tr_cuti_detail d where DATE_FORMAT( d.tgl_cuti, '%Y-%m') = DATE_FORMAT( p_bulan, '%Y-%m') and d.id_user = a.id_user ) as jml_absen,  
(select 20) - (select count(b.id_alpa) from tr_alpa b where DATE_FORMAT( b.tgl_alpa, '%Y-%m') = DATE_FORMAT( p_bulan, '%Y-%m') and b.status = 1 and b.id_user = a.id_user )  -  (select count(d.id_cuti_detail) from tr_cuti_detail d where DATE_FORMAT( d.tgl_cuti, '%Y-%m') = DATE_FORMAT( p_bulan, '%Y-%m') and d.id_user = a.id_user ) as jml_masuk  
from ref_user a;


END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for p_test
-- ----------------------------
DROP PROCEDURE IF EXISTS `p_test`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_test`(IN tgl_awal varchar(10), IN tgl_akhir varchar(10), IN id_cuti int(11), IN id_user int(11))
BEGIN
	
	DECLARE tgl INT DEFAULT 0;
	DECLARE libur INT DEFAULT 0;
	DECLARE lama INT DEFAULT 0 ;
	DECLARE tgla VARCHAR(10) ;
	DECLARE tglb VARCHAR(10) ;
  SET tgla = tgl_awal;
	SET tglb = tgl_akhir;
	
	

	SET lama =  datediff(tgl_akhir, tgl_awal) + 1;
	
	read_loop: LOOP

	IF 	tgla > tglb THEN
	LEAVE read_loop;
	end IF;
	
	SET tgl = DATE_FORMAT( tgla, '%w');
  IF tgl != 6 THEN
	IF tgl != 0 THEN  
	set libur = 0;
	set libur = (select count(id_libur) as total from ref_libur where tgl_libur = tgla) ;
	IF libur = 0 THEN
	INSERT INTO tr_cuti_detail (id_cuti, tgl_cuti, id_user) VALUES (id_cuti, tgla, id_user);
	
	END IF ;
	END IF ; 
	END IF ;
	SET tgla = DATE_ADD(tgla, INTERVAL 1 DAY);
	END LOOP;
	
END
;;
DELIMITER ;

-- ----------------------------
-- Function structure for CountBulan
-- ----------------------------
DROP FUNCTION IF EXISTS `CountBulan`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `CountBulan`(`bulan` int(2)) RETURNS varchar(2) CHARSET utf8
BEGIN
	DECLARE  n INT;
	DECLARE  m VARCHAR(2);
	
	SET n = CHAR_LENGTH(bulan);
	IF n = 1 THEN SET m = CONCAT('0', bulan);
	ELSE SET m = bulan;
	END IF;

	RETURN m;
END
;;
DELIMITER ;

-- ----------------------------
-- Function structure for CountLibur
-- ----------------------------
DROP FUNCTION IF EXISTS `CountLibur`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `CountLibur`(`tgl_awal` varchar(10),`tgl_akhir` varchar(10)) RETURNS tinyint(2)
BEGIN
	DECLARE v1 INT DEFAULT 0;
	DECLARE tgl INT DEFAULT 0;
	DECLARE libur INT DEFAULT 0;
	DECLARE lama INT DEFAULT 0 ;
	DECLARE tgla VARCHAR(10) ;
	DECLARE tglb VARCHAR(10) ;
  SET tgla = tgl_awal;
	SET tglb = tgl_akhir;
	
	

	SET lama =  datediff(tgl_akhir, tgl_awal) + 1;
	
	read_loop: LOOP

	IF 	tgla > tglb THEN
	LEAVE read_loop;
	end IF;
	
	SET tgl = DATE_FORMAT( tgla, '%w');
  
	IF tgl = 0 or tgl = 6 THEN  
	SET v1 = v1 + 1;
	ELSE 
	set libur = 0;
	set libur = (select count(id_libur) as total from ref_libur where tgl_libur = tgla) ;
	IF libur != 0 THEN
	SET v1 = v1 + 1;
	END IF ;
	END IF ; 

	SET tgla = DATE_ADD(tgla, INTERVAL 1 DAY);
	END LOOP;
	SET lama =  lama - v1;
	
	RETURN lama;
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `ref_cabang_BEFORE_INSERT`;
DELIMITER ;;
CREATE TRIGGER `ref_cabang_BEFORE_INSERT` BEFORE INSERT ON `ref_cabang` FOR EACH ROW BEGIN
set new.cdate = current_timestamp();
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `ref_cabang_BEFORE_INSERT_copy`;
DELIMITER ;;
CREATE TRIGGER `ref_cabang_BEFORE_INSERT_copy` BEFORE INSERT ON `ref_department` FOR EACH ROW BEGIN
set new.cdate = current_timestamp();
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `ref_kota_BEFORE_INSERT`;
DELIMITER ;;
CREATE TRIGGER `ref_kota_BEFORE_INSERT` BEFORE INSERT ON `ref_kota` FOR EACH ROW BEGIN
set new.cdate = current_timestamp();
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `ref_level_BEFORE_INSERT`;
DELIMITER ;;
CREATE TRIGGER `ref_level_BEFORE_INSERT` BEFORE INSERT ON `ref_level` FOR EACH ROW BEGIN
set new.cdate = current_timestamp();
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `ref_menu_details_BEFORE_INSERT`;
DELIMITER ;;
CREATE TRIGGER `ref_menu_details_BEFORE_INSERT` BEFORE INSERT ON `ref_menu_details` FOR EACH ROW BEGIN
set new.cdate = current_timestamp();
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `ref_menu_details_access_BEFORE_INSERT`;
DELIMITER ;;
CREATE TRIGGER `ref_menu_details_access_BEFORE_INSERT` BEFORE INSERT ON `ref_menu_details_access` FOR EACH ROW BEGIN
set new.cdate = current_timestamp();
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `ref_menu_groups_BEFORE_INSERT`;
DELIMITER ;;
CREATE TRIGGER `ref_menu_groups_BEFORE_INSERT` BEFORE INSERT ON `ref_menu_groups` FOR EACH ROW BEGIN
set new.cdate = current_timestamp();
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `ref_menu_groups_access_BEFORE_INSERT`;
DELIMITER ;;
CREATE TRIGGER `ref_menu_groups_access_BEFORE_INSERT` BEFORE INSERT ON `ref_menu_groups_access` FOR EACH ROW BEGIN
set new.cdate = current_timestamp();
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `ref_perusahaan_BEFORE_INSERT`;
DELIMITER ;;
CREATE TRIGGER `ref_perusahaan_BEFORE_INSERT` BEFORE INSERT ON `ref_perusahaan` FOR EACH ROW BEGIN
set new.cdate = current_timestamp();
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `ref_user_BEFORE_INSERT`;
DELIMITER ;;
CREATE TRIGGER `ref_user_BEFORE_INSERT` BEFORE INSERT ON `ref_user` FOR EACH ROW BEGIN
set new.cdate = current_timestamp();
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `before_update_balance`;
DELIMITER ;;
CREATE TRIGGER `before_update_balance` BEFORE UPDATE ON `tr_balance` FOR EACH ROW BEGIN
if new.sisa_cuti < 0 then

delete from sisa_cuti_habis where lama = new.sisa_cuti; 

end if ;
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `before_insert_cuti`;
DELIMITER ;;
CREATE TRIGGER `before_insert_cuti` BEFORE INSERT ON `tr_cuti` FOR EACH ROW BEGIN
set new.lama_cuti = CountLibur(new.tgl_awal_cuti, new.tgl_akhir_cuti);
set new.cdate = current_timestamp();
set new.id_atasan = (select id_atasan from ref_user where id_user = new.id_user);
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `before_update_cuti`;
DELIMITER ;;
CREATE TRIGGER `before_update_cuti` BEFORE UPDATE ON `tr_cuti` FOR EACH ROW begin
set new.lama_cuti = CountLibur(new.tgl_awal_cuti, new.tgl_akhir_cuti);
end
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `after_update_cuti`;
DELIMITER ;;
CREATE TRIGGER `after_update_cuti` AFTER UPDATE ON `tr_cuti` FOR EACH ROW BEGIN
if new.status = 3 then
call p_test(new.tgl_awal_cuti, new.tgl_akhir_cuti, new.id_cuti, new.id_user);
END IF;
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `before_delete_cuti`;
DELIMITER ;;
CREATE TRIGGER `before_delete_cuti` BEFORE DELETE ON `tr_cuti` FOR EACH ROW BEGIN

Delete from tr_cuti_detail where id_cuti = old.id_cuti;

END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `before_insert_cuti_detail`;
DELIMITER ;;
CREATE TRIGGER `before_insert_cuti_detail` BEFORE INSERT ON `tr_cuti_detail` FOR EACH ROW BEGIN

update tr_balance set sisa_cuti = ( sisa_cuti - 1 ) where id_user =new.id_user and tahun_cuti = DATE_FORMAT( new.tgl_cuti, '%Y');

END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `before_delete_cuti_Detail`;
DELIMITER ;;
CREATE TRIGGER `before_delete_cuti_Detail` BEFORE DELETE ON `tr_cuti_detail` FOR EACH ROW BEGIN

update tr_balance set sisa_cuti = ( sisa_cuti + 1 ) where id_user =old.id_user and tahun_cuti = DATE_FORMAT( old.tgl_cuti, '%Y');

END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `before_tr_payroll_insert`;
DELIMITER ;;
CREATE TRIGGER `before_tr_payroll_insert` BEFORE INSERT ON `tr_payroll` FOR EACH ROW BEGIN
set new.cdate = current_timestamp();
set new.bulan = CountBulan(new.bulan);

END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `after_tr_pauroll_insert`;
DELIMITER ;;
CREATE TRIGGER `after_tr_pauroll_insert` AFTER INSERT ON `tr_payroll` FOR EACH ROW BEGIN
call p_payroll(new.id_payroll, new.tahun, new.bulan);

end
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `before_delete_payroll`;
DELIMITER ;;
CREATE TRIGGER `before_delete_payroll` BEFORE DELETE ON `tr_payroll` FOR EACH ROW BEGIN
delete from tr_slip where id_payroll = old.id_payroll;
END
;;
DELIMITER ;
