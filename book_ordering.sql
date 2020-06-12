/*
Navicat MySQL Data Transfer

Source Server         : Ming
Source Server Version : 50562
Source Host           : localhost:3306
Source Database       : book_ordering

Target Server Type    : MYSQL
Target Server Version : 50562
File Encoding         : 65001

Date: 2020-06-12 19:30:38
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `admin_no` char(5) NOT NULL,
  `admin_name` varchar(10) NOT NULL,
  `gender` char(1) NOT NULL,
  `password` char(64) NOT NULL,
  PRIMARY KEY (`admin_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('30000', '书商管理员', '男', '30ebd12244d939fc019a2c2f05f01f81e82240f81beb6b78fe6da9f09b12b5cc');

-- ----------------------------
-- Table structure for book
-- ----------------------------
DROP TABLE IF EXISTS `book`;
CREATE TABLE `book` (
  `book_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `author` varchar(20) NOT NULL,
  `version` varchar(20) DEFAULT NULL,
  `press` varchar(20) DEFAULT NULL,
  `isbn` char(17) DEFAULT NULL,
  `price` decimal(5,2) NOT NULL,
  PRIMARY KEY (`book_id`),
  KEY `tittle` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of book
-- ----------------------------
INSERT INTO `book` VALUES ('1', '高等数学', '陆庆乐', '第六版', '人民出版社', '978-7-301-05668-4', '29.88');
INSERT INTO `book` VALUES ('2', '离散数学', '左孝凌', '第三版', '科学出版社', '978-7-309-08563-1', '30.00');
INSERT INTO `book` VALUES ('3', 'Java程序设计', 'Joshua J', '第四版', '机械出版社', '978-7-301-05118-4', '56.00');
INSERT INTO `book` VALUES ('4', 'C程序设计', '谭浩强', '第一版', '人民出版社', '948-3-301-05668-4', '27.55');
INSERT INTO `book` VALUES ('5', 'C++程序设计', '虞歌', '第三版', '科学出版社', '911-2-301-05118-2', '56.00');
INSERT INTO `book` VALUES ('6', '线性代数', '陈殿友', '第三版', '人民出版社', '928-7-301-05238-1', '23.11');
INSERT INTO `book` VALUES ('7', '数据库原理', '王珊', '第六版', '浙江出版社', '918-7-301-05123-3', '87.41');
INSERT INTO `book` VALUES ('8', '操作系统', '唐朔飞', '第四版', '高等教育出版社', '938-7-301-05008-3', '23.22');
INSERT INTO `book` VALUES ('9', '计算机网络', '谢希仁', '第三版', '清华出版社', '918-3-201-05338-4', '33.00');
INSERT INTO `book` VALUES ('10', '数据结构', '严蔚敏', '第四版', '浙江出版社', '966-3-201-02138-4', '46.88');
INSERT INTO `book` VALUES ('11', 'C程序设计', '虞歌', '第三版', '浙江出版社', '912-2-231-02138-1', '33.90');
INSERT INTO `book` VALUES ('12', '数据结构', 'Drozdek', '第四版', '清华出版社', '912-5-121-03674-1', '43.90');

-- ----------------------------
-- Table structure for book_get
-- ----------------------------
DROP TABLE IF EXISTS `book_get`;
CREATE TABLE `book_get` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_id` tinyint(4) NOT NULL,
  `num` smallint(6) NOT NULL,
  `total_price` decimal(8,2) NOT NULL,
  `date` date NOT NULL,
  `is_get` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `dept_id` (`dept_id`),
  CONSTRAINT `book_get_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of book_get
-- ----------------------------

-- ----------------------------
-- Table structure for class
-- ----------------------------
DROP TABLE IF EXISTS `class`;
CREATE TABLE `class` (
  `class_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(20) NOT NULL,
  `dept_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`class_id`),
  KEY `depart_name` (`dept_id`),
  KEY `class_name` (`class_name`),
  CONSTRAINT `class_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`)
) ENGINE=InnoDB AUTO_INCREMENT=301 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of class
-- ----------------------------
INSERT INTO `class` VALUES ('100', '计算机184', '1');
INSERT INTO `class` VALUES ('101', '计算机174', '1');
INSERT INTO `class` VALUES ('102', '软工182', '1');
INSERT INTO `class` VALUES ('200', '数学182', '2');
INSERT INTO `class` VALUES ('300', '化学182', '3');

-- ----------------------------
-- Table structure for department
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `dept_id` tinyint(4) NOT NULL,
  `dept_name` varchar(20) NOT NULL,
  PRIMARY KEY (`dept_id`),
  KEY `dept_name` (`dept_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of department
-- ----------------------------
INSERT INTO `department` VALUES ('3', '材化学院');
INSERT INTO `department` VALUES ('1', '杭州国际服务工程学院');
INSERT INTO `department` VALUES ('2', '理学院');

-- ----------------------------
-- Table structure for dept_user
-- ----------------------------
DROP TABLE IF EXISTS `dept_user`;
CREATE TABLE `dept_user` (
  `no` char(5) NOT NULL,
  `name` varchar(10) NOT NULL,
  `gender` char(1) NOT NULL,
  `password` char(64) NOT NULL,
  `dept_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`no`),
  KEY `dept_id` (`dept_id`),
  CONSTRAINT `dept_user_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dept_user
-- ----------------------------
INSERT INTO `dept_user` VALUES ('20000', 'hise', '男', '5edf8d26a4f08f7e9d5db5f154c3cb1254d2bedbf5ca4e4ca3016c85ee630530', '1');
INSERT INTO `dept_user` VALUES ('20001', 'math', '男', '5edf8d26a4f08f7e9d5db5f154c3cb1254d2bedbf5ca4e4ca3016c85ee630530', '2');
INSERT INTO `dept_user` VALUES ('20002', 'cai', '女', '5edf8d26a4f08f7e9d5db5f154c3cb1254d2bedbf5ca4e4ca3016c85ee630530', '3');

-- ----------------------------
-- Table structure for stock
-- ----------------------------
DROP TABLE IF EXISTS `stock`;
CREATE TABLE `stock` (
  `book_id` smallint(4) NOT NULL AUTO_INCREMENT,
  `number` int(11) NOT NULL,
  PRIMARY KEY (`book_id`),
  CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of stock
-- ----------------------------
INSERT INTO `stock` VALUES ('1', '1');
INSERT INTO `stock` VALUES ('2', '1');
INSERT INTO `stock` VALUES ('3', '5');
INSERT INTO `stock` VALUES ('4', '31');
INSERT INTO `stock` VALUES ('5', '5');
INSERT INTO `stock` VALUES ('6', '11');
INSERT INTO `stock` VALUES ('7', '6');
INSERT INTO `stock` VALUES ('8', '24');
INSERT INTO `stock` VALUES ('9', '62');
INSERT INTO `stock` VALUES ('10', '0');
INSERT INTO `stock` VALUES ('11', '2');
INSERT INTO `stock` VALUES ('12', '10');

-- ----------------------------
-- Table structure for student
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `stu_no` char(5) NOT NULL,
  `stu_name` varchar(10) NOT NULL,
  `gender` char(1) NOT NULL,
  `password` char(64) NOT NULL,
  `class_id` smallint(6) NOT NULL,
  PRIMARY KEY (`stu_no`),
  KEY `class_id` (`class_id`),
  CONSTRAINT `student_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO `student` VALUES ('10000', '数据库好难', '男', 'fbfb386efea67e816f2dda0a8c94a98eb203757aebb3f55f183755a192d44467', '100');
INSERT INTO `student` VALUES ('10001', '彭于晏', '男', 'fbfb386efea67e816f2dda0a8c94a98eb203757aebb3f55f183755a192d44467', '100');
INSERT INTO `student` VALUES ('10002', '胡歌', '男', 'fbfb386efea67e816f2dda0a8c94a98eb203757aebb3f55f183755a192d44467', '101');
INSERT INTO `student` VALUES ('10003', '刘亦菲', '女', 'fbfb386efea67e816f2dda0a8c94a98eb203757aebb3f55f183755a192d44467', '102');
INSERT INTO `student` VALUES ('10004', '迪丽热巴', '女', 'fbfb386efea67e816f2dda0a8c94a98eb203757aebb3f55f183755a192d44467', '101');
INSERT INTO `student` VALUES ('20000', '吴彦祖', '男', 'fbfb386efea67e816f2dda0a8c94a98eb203757aebb3f55f183755a192d44467', '200');
INSERT INTO `student` VALUES ('30000', '小明', '男', 'fbfb386efea67e816f2dda0a8c94a98eb203757aebb3f55f183755a192d44467', '300');
INSERT INTO `student` VALUES ('30001', '张三', '男', 'fbfb386efea67e816f2dda0a8c94a98eb203757aebb3f55f183755a192d44467', '300');

-- ----------------------------
-- Table structure for stu_order
-- ----------------------------
DROP TABLE IF EXISTS `stu_order`;
CREATE TABLE `stu_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stu_no` char(5) NOT NULL,
  `book_id` smallint(6) NOT NULL,
  `is_get` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `book_id` (`book_id`),
  KEY `stu_no` (`stu_no`),
  CONSTRAINT `stu_order_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `stu_order_ibfk_2` FOREIGN KEY (`stu_no`) REFERENCES `student` (`stu_no`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of stu_order
-- ----------------------------
INSERT INTO `stu_order` VALUES ('2', '10000', '2', '0');
INSERT INTO `stu_order` VALUES ('4', '10001', '3', '0');
INSERT INTO `stu_order` VALUES ('5', '10003', '3', '0');
INSERT INTO `stu_order` VALUES ('6', '10002', '3', '0');
INSERT INTO `stu_order` VALUES ('7', '20000', '2', '0');
INSERT INTO `stu_order` VALUES ('8', '30000', '2', '0');
INSERT INTO `stu_order` VALUES ('9', '30001', '2', '0');
INSERT INTO `stu_order` VALUES ('10', '10001', '2', '0');
INSERT INTO `stu_order` VALUES ('11', '30000', '8', '0');
INSERT INTO `stu_order` VALUES ('12', '20000', '7', '0');
INSERT INTO `stu_order` VALUES ('13', '30000', '5', '0');
INSERT INTO `stu_order` VALUES ('17', '10000', '1', '0');
DROP TRIGGER IF EXISTS `stock_reduce`;
DELIMITER ;;
CREATE TRIGGER `stock_reduce` AFTER UPDATE ON `stu_order` FOR EACH ROW begin
update stock set number=number-1 where book_id=new.book_id;
end
;;
DELIMITER ;
