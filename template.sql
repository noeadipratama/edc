/*
 Navicat Premium Data Transfer

 Source Server         : Local
 Source Server Type    : MySQL
 Source Server Version : 50542
 Source Host           : localhost
 Source Database       : template

 Target Server Type    : MySQL
 Target Server Version : 50542
 File Encoding         : utf-8

 Date: 03/13/2016 18:53:15 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `ref_area`
-- ----------------------------
DROP TABLE IF EXISTS `ref_area`;
CREATE TABLE `ref_area` (
  `id_area` int(11) NOT NULL AUTO_INCREMENT,
  `nm_area` varchar(45) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL COMMENT '1. active\n2. deactive\n',
  `cdate` datetime DEFAULT NULL,
  `cuser` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_area`),
  KEY `fk_id_user_ref_area_idx` (`cuser`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
delimiter ;;
CREATE TRIGGER `ref_area_BEFORE_INSERT` BEFORE INSERT ON `ref_area` FOR EACH ROW BEGIN
set new.cdate = current_timestamp();
END;
 ;;
delimiter ;

-- ----------------------------
--  Table structure for `ref_kota`
-- ----------------------------
DROP TABLE IF EXISTS `ref_kota`;
CREATE TABLE `ref_kota` (
  `id_kota` int(11) NOT NULL AUTO_INCREMENT,
  `nm_kota` varchar(45) DEFAULT NULL,
  `id_provinsi` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL COMMENT '1. active\n2. deactive\n',
  `cdate` datetime DEFAULT NULL,
  `cuser` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_kota`),
  KEY `fk_id_user_ref_kota_idx` (`cuser`) USING BTREE,
  KEY `fk_id_provinsi_ref_provinsi_idx` (`id_provinsi`) USING BTREE,
  CONSTRAINT `ref_kota_ibfk_1` FOREIGN KEY (`id_provinsi`) REFERENCES `ref_provinsi` (`id_provinsi`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ref_kota_ibfk_2` FOREIGN KEY (`cuser`) REFERENCES `ref_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
delimiter ;;
CREATE TRIGGER `ref_kota_BEFORE_INSERT` BEFORE INSERT ON `ref_kota` FOR EACH ROW BEGIN
set new.cdate = current_timestamp();
END;
 ;;
delimiter ;

-- ----------------------------
--  Table structure for `ref_level`
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
delimiter ;;
CREATE TRIGGER `ref_level_BEFORE_INSERT` BEFORE INSERT ON `ref_level` FOR EACH ROW BEGIN
set new.cdate = current_timestamp();
END;
 ;;
delimiter ;

-- ----------------------------
--  Table structure for `ref_menu_groups`
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
delimiter ;;
CREATE TRIGGER `ref_menu_groups_BEFORE_INSERT` BEFORE INSERT ON `ref_menu_groups` FOR EACH ROW BEGIN
set new.cdate = current_timestamp();
END;
 ;;
delimiter ;

-- ----------------------------
--  Table structure for `ref_menu_details`
-- ----------------------------
DROP TABLE IF EXISTS `ref_menu_details`;
CREATE TABLE `ref_menu_details` (
  `id_menu_details` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
delimiter ;;
CREATE TRIGGER `ref_menu_details_BEFORE_INSERT` BEFORE INSERT ON `ref_menu_details` FOR EACH ROW BEGIN
set new.cdate = current_timestamp();
END;
 ;;
delimiter ;

-- ----------------------------
--  Table structure for `ref_menu_groups_access`
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
delimiter ;;
CREATE TRIGGER `ref_menu_groups_access_BEFORE_INSERT` BEFORE INSERT ON `ref_menu_groups_access` FOR EACH ROW BEGIN
set new.cdate = current_timestamp();
END;
 ;;
delimiter ;

-- ----------------------------
--  Table structure for `ref_menu_details_access`
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
delimiter ;;
CREATE TRIGGER `ref_menu_details_access_BEFORE_INSERT` BEFORE INSERT ON `ref_menu_details_access` FOR EACH ROW BEGIN
set new.cdate = current_timestamp();
END;
 ;;
delimiter ;

-- ----------------------------
--  Table structure for `ref_perusahaan`
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
delimiter ;;
CREATE TRIGGER `ref_perusahaan_BEFORE_INSERT` BEFORE INSERT ON `ref_perusahaan` FOR EACH ROW BEGIN
set new.cdate = current_timestamp();
END;
 ;;
delimiter ;

-- ----------------------------
--  Table structure for `ref_provinsi`
-- ----------------------------
DROP TABLE IF EXISTS `ref_provinsi`;
CREATE TABLE `ref_provinsi` (
  `id_provinsi` int(11) NOT NULL AUTO_INCREMENT COMMENT '	',
  `nm_provinsi` varchar(45) DEFAULT NULL,
  `id_area` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL COMMENT '1. active\n2. deactive',
  `cdate` datetime DEFAULT NULL,
  `cuser` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_provinsi`),
  KEY `fk_id_user_ref_provinsi_idx` (`cuser`) USING BTREE,
  KEY `fk_id_area_ref_area_idx` (`id_area`) USING BTREE,
  CONSTRAINT `ref_provinsi_ibfk_1` FOREIGN KEY (`id_area`) REFERENCES `ref_area` (`id_area`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
delimiter ;;
CREATE TRIGGER `ref_provinsi_BEFORE_INSERT` BEFORE INSERT ON `ref_provinsi` FOR EACH ROW BEGIN
set new.cdate = current_timestamp();
END;
 ;;
delimiter ;

-- ----------------------------
--  Table structure for `ref_cabang`
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
delimiter ;;
CREATE TRIGGER `ref_cabang_BEFORE_INSERT` BEFORE INSERT ON `ref_cabang` FOR EACH ROW BEGIN
set new.cdate = current_timestamp();
END;
 ;;
delimiter ;

-- ----------------------------
--  Table structure for `ref_user`
-- ----------------------------
DROP TABLE IF EXISTS `ref_user`;
CREATE TABLE `ref_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `fk_username` (`username`) USING BTREE,
  KEY `fk_id_cabang_ref_user_idx` (`id_cabang`) USING BTREE,
  KEY `fk_id_perusahaan_ref_user_idx` (`id_perusahaan`) USING BTREE,
  KEY `fk_id_level_ref_level_idx` (`id_level`) USING BTREE,
  KEY `fk_id_user_ref_user` (`cuser`) USING BTREE,
  KEY `fk_id_atasan` (`id_atasan`) USING BTREE,
  CONSTRAINT `ref_user_ibfk_1` FOREIGN KEY (`id_cabang`) REFERENCES `ref_cabang` (`id_cabang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ref_user_ibfk_2` FOREIGN KEY (`id_atasan`) REFERENCES `ref_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ref_user_ibfk_3` FOREIGN KEY (`id_level`) REFERENCES `ref_level` (`id_level`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ref_user_ibfk_4` FOREIGN KEY (`id_perusahaan`) REFERENCES `ref_perusahaan` (`id_perusahaan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ref_user_ibfk_5` FOREIGN KEY (`cuser`) REFERENCES `ref_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
delimiter ;;
CREATE TRIGGER `ref_user_BEFORE_INSERT` BEFORE INSERT ON `ref_user` FOR EACH ROW BEGIN
set new.cdate = current_timestamp();
END;
 ;;
delimiter ;



-- ----------------------------
--  Records of `ref_area`
-- ----------------------------
BEGIN;
INSERT INTO `ref_area` VALUES ('1', 'Region 1', '1', '2016-03-03 09:12:04', null), ('2', 'Region2', '1', '2016-03-03 09:12:04', null);
COMMIT;

-- ----------------------------
--  Records of `ref_kota`
-- ----------------------------
BEGIN;
INSERT INTO `ref_kota` VALUES ('1', 'Bandung', '1', '1', '2016-03-03 09:12:05', null);
COMMIT;

-- ----------------------------
--  Records of `ref_level`
-- ----------------------------
BEGIN;
INSERT INTO `ref_level` VALUES ('1', 'Super Admin', '1', '2016-03-03 09:12:05', null);
COMMIT;

-- ----------------------------
--  Records of `ref_menu_groups`
-- ----------------------------
BEGIN;
INSERT INTO `ref_menu_groups` VALUES ('1', 'Settings', 'fa fa-edit', '1', '1', '2016-03-03 09:12:05', null), ('2', 'Master', 'fa fa-edit', '1', '2', '2016-03-03 09:12:05', null), ('3', 'Logistics', 'fa fa-edit', '1', '3', '2016-03-03 09:12:05', null), ('4', 'Purchase', 'fa fa-edit', '1', '4', '2016-03-03 09:12:05', null), ('5', 'Report', 'fa fa-edit', '1', '5', '2016-03-03 09:12:05', null);
COMMIT;

-- ----------------------------
--  Records of `ref_menu_details`
-- ----------------------------
BEGIN;
INSERT INTO `ref_menu_details` VALUES ('1', 'Menu Groups', 'menu_groups', '1', '1', '1', '2016-03-03 09:12:05', null), ('2', 'Menu Groups Akses', 'menu_groups_access', '1', '2', '1', '2016-03-03 09:12:05', null), ('3', 'Menu Details', 'menu_details', '1', '3', '1', '2016-03-03 09:12:05', null), ('4', 'Menu Details Akses', 'menu_details_access', '1', '4', '1', '2016-03-03 09:12:05', null), ('5', 'User', 'user', '1', '5', '1', '2016-03-03 09:12:05', null), ('6', 'Level', 'level', '1', '6', '1', '2016-03-03 09:12:05', null), ('7', 'Area', 'area', '1', '1', '2', '2016-03-03 09:12:05', null), ('8', 'Provinsi', 'provinsi', '1', '2', '2', '2016-03-03 09:12:05', null), ('9', 'Kota', 'kota', '1', '3', '2', '2016-03-03 09:12:05', null), ('10', 'Cabang', 'cabang', '1', '4', '2', '2016-03-03 09:12:05', null), ('11', 'Perusahaan', 'perusahaan', '1', '5', '2', '2016-03-03 09:12:05', null), ('12', 'Request Order', 'ro', '1', '1', '3', '2016-03-03 09:12:05', null), ('13', 'Approval Order', 'ao', '1', '2', '3', '2016-03-03 09:12:05', null), ('14', 'Shipment Order', 'so', '1', '4', '3', '2016-03-03 09:12:05', null), ('15', 'Purchase Request', 'pr', '1', '1', '4', '2016-03-03 09:12:05', null), ('16', 'Purchase Order', 'po', '1', '3', '4', '2016-03-03 09:12:05', null), ('17', 'Inbound', 'in', '1', '3', '3', '2016-03-03 09:12:05', null), ('18', 'Barang', 'barang', '1', '6', '2', '2016-03-03 09:12:05', null), ('19', 'Vendor', 'vendor', '1', '7', '2', '2016-03-03 09:12:05', null), ('20', 'Approval Purchase', 'ap', '1', '2', '4', '2016-03-03 09:12:05', null);
COMMIT;


-- ----------------------------
--  Records of `ref_menu_groups_access`
-- ----------------------------
BEGIN;
INSERT INTO `ref_menu_groups_access` VALUES ('1', '1', '1', '1', '2016-03-03 09:12:05', null), ('2', '2', '1', '1', '2016-03-03 09:12:05', '1'), ('3', '3', '1', '1', '2016-03-03 09:12:05', '1'), ('4', '4', '1', '1', '2016-03-03 09:12:05', '1'), ('5', '5', '1', '1', '2016-03-03 09:12:05', '1');
COMMIT;

-- ----------------------------
--  Records of `ref_menu_details_access`
-- ----------------------------
BEGIN;
INSERT INTO `ref_menu_details_access` VALUES ('1', '1', '1', '1', '2016-03-03 09:12:05', null), ('2', '1', '2', '1', '2016-03-03 09:12:05', null), ('3', '1', '3', '1', '2016-03-03 09:12:05', null), ('4', '1', '4', '1', '2016-03-03 09:12:05', null), ('5', '1', '5', '1', '2016-03-03 09:12:05', null), ('6', '1', '6', '1', '2016-03-03 09:12:05', '1'), ('7', '1', '7', '1', '2016-03-03 09:12:05', null), ('8', '1', '8', '1', '2016-03-03 09:12:05', null), ('9', '1', '9', '1', '2016-03-03 09:12:05', null), ('10', '1', '10', '1', '2016-03-03 09:12:05', null), ('11', '1', '11', '1', '2016-03-03 09:12:05', null), ('12', '1', '12', '1', '2016-03-03 09:12:05', '1'), ('13', '1', '13', '1', '2016-03-03 09:12:05', '1'), ('14', '1', '14', '1', '2016-03-03 09:12:05', '1'), ('15', '1', '15', '1', '2016-03-03 09:12:05', '1'), ('16', '1', '16', '1', '2016-03-03 09:12:05', '1'), ('17', '1', '17', '1', '2016-03-03 09:12:05', '1'), ('18', '1', '18', '1', '2016-03-03 09:12:05', '1'), ('19', '1', '19', '1', '2016-03-03 09:12:05', '1'), ('20', '1', '20', '1', '2016-03-03 09:12:05', '1');
COMMIT;

-- ----------------------------
--  Records of `ref_perusahaan`
-- ----------------------------
BEGIN;
INSERT INTO `ref_perusahaan` VALUES ('1', 'CMNC', '1', '1', '2016-03-03 09:12:05', '1');
COMMIT;

-- ----------------------------
--  Records of `ref_provinsi`
-- ----------------------------
BEGIN;
INSERT INTO `ref_provinsi` VALUES ('1', 'Jawa Barat', '1', '1', '2016-03-03 09:12:05', null);
COMMIT;

-- ----------------------------
--  Records of `ref_cabang`
-- ----------------------------
BEGIN;
INSERT INTO `ref_cabang` VALUES ('1', 'BDG', 'Bandung', '1', '1', '2016-03-03 09:12:05', null);
COMMIT;

-- ----------------------------
--  Records of `ref_user`
-- ----------------------------
BEGIN;
INSERT INTO `ref_user` VALUES ('1', 'adi', 'adi', '7f78f270e3e1129faf118ed92fdf54db', '1', '1', '1', '1', '1', '2016-03-03 09:12:05', null);
COMMIT;

