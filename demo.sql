/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : demo

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2017-11-24 13:15:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for rq_business
-- ----------------------------
DROP TABLE IF EXISTS `rq_business`;
CREATE TABLE `rq_business` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rq_business
-- ----------------------------

-- ----------------------------
-- Table structure for rq_goods
-- ----------------------------
DROP TABLE IF EXISTS `rq_goods`;
CREATE TABLE `rq_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) CHARACTER SET utf8 NOT NULL,
  `name` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(8,0) NOT NULL,
  `img_url` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `zhengce` varchar(300) COLLATE utf8_unicode_ci NOT NULL COMMENT '特权',
  `note` int(11) NOT NULL COMMENT '通知方式',
  `info` text COLLATE utf8_unicode_ci NOT NULL COMMENT '商品信息',
  `category` int(11) NOT NULL,
  `add_time` int(11) NOT NULL,
  `isshow` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of rq_goods
-- ----------------------------
INSERT INTO `rq_goods` VALUES ('2', 'G1237', '测试', '10', '#', '#', '1', '1111', '2', '0', '0');
INSERT INTO `rq_goods` VALUES ('15', '0', '水杯', '0', '', '2,3', '2', '水杯', '4', '1511335077', '1');
INSERT INTO `rq_goods` VALUES ('16', '0', '铅笔', '3', '/Uploads/2017-11-22/1511335273294681556.png', '2,3', '2', '铅笔很好', '2', '1511335291', '1');
INSERT INTO `rq_goods` VALUES ('18', '0', '鼠标', '30', '/Uploads/2017-11-22/1511335443522688415.png', '2,3', '2', '鼠标', '3', '1511335465', '1');
INSERT INTO `rq_goods` VALUES ('19', '0', '面包', '2', '/Uploads/2017-11-22/1511335714105661634.png', '2', '2', '面包', '1', '1511335743', '1');
INSERT INTO `rq_goods` VALUES ('22', '11', '11', '0', '/Uploads/2017-11-22/1511339256407480650.png', '2', '2', '3333', '3', '1511339314', '1');
INSERT INTO `rq_goods` VALUES ('23', '0', '电视机', '0', '/Uploads/2017-11-22/15113404621458431979.png', '2', '3', '电视机', '3', '1511340476', '1');
INSERT INTO `rq_goods` VALUES ('24', '3006', '洗衣液', '0', '/Uploads/2017-11-22/1511340578642006944.png', '1', '1', '洗衣必备', '2', '1511340593', '1');
INSERT INTO `rq_goods` VALUES ('25', '0', '显卡', '0', '/Uploads/2017-11-22/15113410861628811388.png', '包邮,到付,退换', '2', '高端独立显卡', '3', '1511341107', '1');
INSERT INTO `rq_goods` VALUES ('26', '0', '硬盘', '0', '/Uploads/2017-11-22/15113412191077753038.png', '到付,退换', '1', 'SSD固态', '3', '1511341234', '1');
INSERT INTO `rq_goods` VALUES ('27', '0', '机箱', '0', '/Uploads/2017-11-22/1511341356747633798.png', '退换', '2', '22', '3', '1511341408', '1');
INSERT INTO `rq_goods` VALUES ('28', '0', '111', '11', '/Uploads/2017-11-22/151134155758097760.png', '到付', '1', '111', '3', '1511341575', '0');
INSERT INTO `rq_goods` VALUES ('29', '12345', '123', '12', '/Uploads/2017-11-22/1511341677242318973.png', '退换', '1', '22', '2', '1511341683', '0');
INSERT INTO `rq_goods` VALUES ('30', '0', '内存条', '399', '/Uploads/2017-11-22/1511341805554485302.png', '包邮,到付,退换', '1', '8G DDR4高速', '3', '1511341822', '1');
INSERT INTO `rq_goods` VALUES ('31', '2232', '大棉袄', '1', '/Uploads/2017-11-22/1511342047795499930.png', '包邮,到付,退换', '3', '御寒佳品', '2', '1511401882', '1');
INSERT INTO `rq_goods` VALUES ('32', '2233', '机箱', '0', '/Uploads/2017-11-22/1511341356747633798.png', '退换', '2', '游戏机箱', '3', '1511400573', '1');
INSERT INTO `rq_goods` VALUES ('33', '6666', '测试图片', '10', '/Uploads/2017-11-23/15114011481507632317.png', '到付', '3', '测试图片', '1', '1511401172', '1');

-- ----------------------------
-- Table structure for rq_merchant
-- ----------------------------
DROP TABLE IF EXISTS `rq_merchant`;
CREATE TABLE `rq_merchant` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `source_id` int(10) DEFAULT '0' COMMENT '商户号',
  `time` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '事件',
  `name` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '事件名称',
  `msg` text COLLATE utf8_unicode_ci COMMENT '事件描述',
  `client_ip` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '操作者ip',
  `channel` varchar(10) CHARACTER SET utf8 DEFAULT NULL COMMENT '渠道',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of rq_merchant
-- ----------------------------

-- ----------------------------
-- Table structure for rq_order
-- ----------------------------
DROP TABLE IF EXISTS `rq_order`;
CREATE TABLE `rq_order` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `sn` char(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '订单号',
  `source_id` int(10) DEFAULT '0' COMMENT '商户号',
  `time` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '时间戳',
  `type` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '事件',
  `name` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '事件名称',
  `money` decimal(10,2) DEFAULT NULL COMMENT '涉及金额',
  `msg` text COLLATE utf8_unicode_ci COMMENT '事件描述',
  `client_ip` char(15) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '操作者ip',
  `channel` varchar(10) CHARACTER SET utf8 DEFAULT NULL COMMENT '渠道',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of rq_order
-- ----------------------------

-- ----------------------------
-- Table structure for rq_request_log
-- ----------------------------
DROP TABLE IF EXISTS `rq_request_log`;
CREATE TABLE `rq_request_log` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `time` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '时间戳',
  `msg` text COLLATE utf8_unicode_ci COMMENT '事件描述',
  `client_ip` char(15) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '操作者ip',
  `event` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '请求事件',
  `assembly` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '请求组件',
  `channel` varchar(10) CHARACTER SET utf8 DEFAULT NULL COMMENT '请求渠道',
  `request_type` char(4) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '请求类型（get|post）但不局限者两种',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of rq_request_log
-- ----------------------------

-- ----------------------------
-- Table structure for rq_user
-- ----------------------------
DROP TABLE IF EXISTS `rq_user`;
CREATE TABLE `rq_user` (
  `id` int(11) NOT NULL,
  `account` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `pwd` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `grade` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `last_login` int(11) DEFAULT NULL COMMENT '最后登录时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of rq_user
-- ----------------------------
INSERT INTO `rq_user` VALUES ('1', 'admin', '小兵', '202cb962ac59075b964b07152d234b70', '管理员', null);
