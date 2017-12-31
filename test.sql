/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 100126
Source Host           : localhost:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 100126
File Encoding         : 65001

Date: 2017-12-31 18:27:29
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL COMMENT '用户名',
  `password` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '密码',
  `salt` varchar(255) DEFAULT NULL COMMENT '加盐加密',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('0', 'admin', 'f6fdffe48c908deb0f4c3bd36c032e72', 'admin');

-- ----------------------------
-- Table structure for class
-- ----------------------------
DROP TABLE IF EXISTS `class`;
CREATE TABLE `class` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `number` int(11) NOT NULL,
  `zhuanye` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of class
-- ----------------------------
INSERT INTO `class` VALUES ('10', '安全1502', '1434050102', '33');
INSERT INTO `class` VALUES ('11', '网络1502', '1434050103', '34');

-- ----------------------------
-- Table structure for lesson
-- ----------------------------
DROP TABLE IF EXISTS `lesson`;
CREATE TABLE `lesson` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '课程编号',
  `name` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '课程名称',
  `number` varchar(11) CHARACTER SET utf8 NOT NULL COMMENT '课程号',
  `time` varchar(11) CHARACTER SET utf8 DEFAULT NULL COMMENT '上课时间，1~35，每节课都能分配到一个数字',
  `last` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '学时',
  `score` smallint(6) DEFAULT NULL COMMENT '学分',
  `teacher` varchar(11) CHARACTER SET utf8 DEFAULT NULL COMMENT '老师编号',
  `class` varchar(11) CHARACTER SET utf8 DEFAULT NULL COMMENT '上课班级',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of lesson
-- ----------------------------
INSERT INTO `lesson` VALUES ('1', 'a', 'a', '1', 'a', '33', '33', '1');
INSERT INTO `lesson` VALUES ('3', '4', '5', '6', '6', '6', '6', '5');
INSERT INTO `lesson` VALUES ('5', '5', '5', '5', '5', '5', '5', '5');
INSERT INTO `lesson` VALUES ('8', '111', '111', '16', '111', '111', '111', '5');
INSERT INTO `lesson` VALUES ('9', '555', '55', '2', '', '0', '4', '5');
INSERT INTO `lesson` VALUES ('10', '安全工程', '456', '0', '55', '23', null, '5');
INSERT INTO `lesson` VALUES ('11', '343', '434', '0', '434', '343', null, '5');
INSERT INTO `lesson` VALUES ('12', 'fdsf', 'fdsa', '0', 'fdsa', '0', '1', '5');
INSERT INTO `lesson` VALUES ('13', '159', 'fdsa', '1', 'fdsa', '0', '4', '5');
INSERT INTO `lesson` VALUES ('14', '159', 'fdsa', '1', 'fdsa', '0', '4', '5');
INSERT INTO `lesson` VALUES ('15', '159', 'fdsa', '1', 'fdsa', '0', '4', '5');
INSERT INTO `lesson` VALUES ('16', '159', 'fdsa', '1', 'fdsa', '0', '4', '5');
INSERT INTO `lesson` VALUES ('17', '156', '333', '8', '333', '33', '2', '5');
INSERT INTO `lesson` VALUES ('18', 'dsf', 'fdsa', '15', 'dfsa', '0', '3', '9');
INSERT INTO `lesson` VALUES ('19', '安全工程', '1434', '35', '12', '4', '2', '5');
INSERT INTO `lesson` VALUES ('20', '安全工程', '1001', '1', '20', '3', '10', '10');
INSERT INTO `lesson` VALUES ('21', '机械设计制造基础', '1002', '8', '15', '3', '9', '10');
INSERT INTO `lesson` VALUES ('22', '安全人机工程学', '1003', '15', '20', '2', '11', '10');
INSERT INTO `lesson` VALUES ('23', '工程力学', '1004', '22', '20', '23', '10', '10');
INSERT INTO `lesson` VALUES ('24', '航空航天概论', '1005', '29', '20', '4', '11', '10');
INSERT INTO `lesson` VALUES ('25', '高等数学', '1006', '2', '20', '6', '10', '10');
INSERT INTO `lesson` VALUES ('26', '英语', '1007', '9', '6', '6', '9', '10');
INSERT INTO `lesson` VALUES ('27', '防火防爆概论', '1008', '16', '6', '2', '10', '10');
INSERT INTO `lesson` VALUES ('28', '风险评价基础', '1002', '23', '52', '3', '9', '10');
INSERT INTO `lesson` VALUES ('29', '颈椎康复教程', '1009', '30', '20', '2', '9', '10');
INSERT INTO `lesson` VALUES ('30', 'C语言程序设计', '1010', '3', '10', '10', '9', '10');
INSERT INTO `lesson` VALUES ('31', 'java程序设计', '1011', '10', '11', '11', '11', '10');
INSERT INTO `lesson` VALUES ('32', 'PHP程序设计', '1012', '17', '12', '12', '9', '10');
INSERT INTO `lesson` VALUES ('33', 'Python程序设计', '1013', '24', '10', '1', '10', '10');
INSERT INTO `lesson` VALUES ('34', 'Linux从入门到放弃', '1014', '31', '10', '4', '10', '10');
INSERT INTO `lesson` VALUES ('35', '黑客入门到放弃', '555', '4', '20', '2', '10', '10');
INSERT INTO `lesson` VALUES ('36', '安全工程师', '45', '5', '45', '45', '9', '10');
INSERT INTO `lesson` VALUES ('37', '今天休息', '', '6', '', '0', '10', '10');
INSERT INTO `lesson` VALUES ('38', '今天休息', '55', '7', '44', '5', '9', '10');

-- ----------------------------
-- Table structure for student
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '信息标号',
  `name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '密码',
  `salt` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '加盐加密',
  `number` varchar(20) NOT NULL COMMENT '学号',
  `sex` tinyint(4) NOT NULL COMMENT '性别，0男，1女。',
  `zhuanye` varchar(30) CHARACTER SET utf8 DEFAULT NULL COMMENT '专业',
  `grade` int(11) DEFAULT NULL COMMENT '年级',
  `class` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO `student` VALUES ('1', 'admin', '54ebdfbbfe6c31c39aaba9a1ee83860a', '3671', '0', '0', null, null, '5');
INSERT INTO `student` VALUES ('6', 'gfsdg', 'dad0dff8d503b8fb5ca57b6368b9de0f', '2409', 'dfgsdf', '0', '0', '5', '5');
INSERT INTO `student` VALUES ('7', '李学良', '79c0244686c528c04b9576c9d8a56535', '9334', '143405222', '0', '0', '1502', '10');
INSERT INTO `student` VALUES ('8', '李学良', 'c849e7e2c0bbc70de0fb146f8abc882e', '4632', '1434052223', '0', '0', '1502', '5');
INSERT INTO `student` VALUES ('9', '李学亮', '9107f2e46d23faea9951889b5cbe46b1', '7744', '159494865', '1', '0', '4', '1');
INSERT INTO `student` VALUES ('11', '李学良', '0a388257eebdb81091159609d3141b04', '5642', '143405010219', '0', '33', '15', '10');
INSERT INTO `student` VALUES ('12', '李学良', '1f1e711c9d37d2579b53a672071f51cf', '2213', '143405010201', '1', '33', '14', '10');
INSERT INTO `student` VALUES ('13', '李学良', 'b0034e73823d35a5a92edf8469586428', '8327', '143405010202', '1', '33', '14', '10');
INSERT INTO `student` VALUES ('14', '李学良', 'aef246369d454c4acb8f0297c5298f56', '4156', '143405010203', '1', '33', '14', '10');
INSERT INTO `student` VALUES ('15', '李学良', '2c9830fbd693117ce7eebea84db5ddf4', '3212', '143405010204', '1', '33', '14', '10');
INSERT INTO `student` VALUES ('16', '小明', '998cfd4a74423aa02dee4afefb4fd991', '7205', '143405010206', '0', '33', '14', '10');
INSERT INTO `student` VALUES ('17', '小萌', 'd1ed9fbd403da8a91d941792ad321563', '5336', '143405010207', '1', '33', '14', '10');
INSERT INTO `student` VALUES ('18', '小明', '6731a14ee9e464d53af6db6c99824e1f', '6850', '143405010269', '0', '33', '15', '10');

-- ----------------------------
-- Table structure for subject
-- ----------------------------
DROP TABLE IF EXISTS `subject`;
CREATE TABLE `subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of subject
-- ----------------------------
INSERT INTO `subject` VALUES ('33', '安全工程');
INSERT INTO `subject` VALUES ('34', '网络工程');
INSERT INTO `subject` VALUES ('35', '材料工程');
INSERT INTO `subject` VALUES ('36', '计算机科学与技术');
INSERT INTO `subject` VALUES ('37', '航空航天工程学部');
INSERT INTO `subject` VALUES ('38', '软件工程');
INSERT INTO `subject` VALUES ('39', '英语专业');

-- ----------------------------
-- Table structure for teacher
-- ----------------------------
DROP TABLE IF EXISTS `teacher`;
CREATE TABLE `teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '老师姓名',
  `password` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '密码',
  `salt` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '加盐加密',
  `number` varchar(11) CHARACTER SET utf8 NOT NULL COMMENT '教工号',
  `sex` tinyint(4) NOT NULL COMMENT '性别:0男，1女',
  `zhicheng` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '职称',
  `job` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '职务',
  `role` tinyint(1) DEFAULT NULL COMMENT '角色:0管理员，1学生，2老师',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of teacher
-- ----------------------------
INSERT INTO `teacher` VALUES ('9', '李老师', '75021a7087e5b3477f76855eca94109a', '2147', '001', '0', 'a:3:{i:0;s:12:\"人大代表\";i:1;s:12:\"国家精英\";i:2;s:18:\"人类杰出人才\";}', '监考老师', null);
INSERT INTO `teacher` VALUES ('10', '张凤阳', '707e51aea699ecba4d734df5b3d83d74', '5709', '002', '0', 'a:3:{i:0;s:12:\"老骥伏枥\";i:1;s:12:\"中国未来\";i:2;s:12:\"智障儿童\";}', '安全人机工程学讲师', null);
INSERT INTO `teacher` VALUES ('11', '萌老师', 'df9985453ea51b850482060b0c62ebbf', '4779', '003', '1', 'a:2:{i:0;s:18:\"人类进化向导\";i:1;s:12:\"极度风骚\";}', '电工实验', null);
