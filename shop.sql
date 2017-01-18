/*
Navicat MySQL Data Transfer

Source Server         : web
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : shop

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2017-01-18 23:49:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for hx_admin_user
-- ----------------------------
DROP TABLE IF EXISTS `hx_admin_user`;
CREATE TABLE `hx_admin_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '后台管理用户',
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` tinyint(4) DEFAULT '1' COMMENT '锁定状态2锁定，1：未锁定',
  `last_time` datetime DEFAULT NULL COMMENT '登录时间',
  `last_ip` varchar(255) DEFAULT NULL COMMENT '登录ip',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `update_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY `username` (`username`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hx_admin_user
-- ----------------------------
INSERT INTO `hx_admin_user` VALUES ('1', 'admin', 'pbkdf2_sha256$12000$HVqHjtCOhoKo$TZOQbvzgln4Ni4WfJtWw3Dz0it9ugCGIxXeAK9sen/4=', '1', '2016-11-27 15:13:51', '127.0.0.1', '2016-11-27 15:11:13', '2016-11-27 15:13:51');
INSERT INTO `hx_admin_user` VALUES ('2', 'root', 'pbkdf2_sha256$12000$6UUdpVdTMcxA$ypzocPbaYvbECQWOyjdwT5XJH4XgAHbp6B7rp3pfFao=', '2', null, null, '2016-11-27 15:13:21', '2016-11-27 17:53:08');

-- ----------------------------
-- Table structure for hx_article
-- ----------------------------
DROP TABLE IF EXISTS `hx_article`;
CREATE TABLE `hx_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `cate_id` int(11) DEFAULT '0' COMMENT '分类id',
  `title` varchar(200) DEFAULT NULL COMMENT '文章标题',
  `desc` varchar(200) DEFAULT NULL COMMENT '描述',
  `content` longtext COMMENT '文章内容',
  `time` int(11) DEFAULT '0' COMMENT '创建时间',
  `del` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1:正常；2：删除',
  `recommend` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否推荐 1：否；2：是',
  `top` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否置顶:1否；2：是',
  `audit` tinyint(1) NOT NULL DEFAULT '1' COMMENT '审核状态1：待审核；2：审核成功；3：审核失败',
  `sort` int(11) NOT NULL DEFAULT '50',
  `userid` int(11) NOT NULL DEFAULT '0' COMMENT '用户id',
  `update_time` int(11) DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hx_article
-- ----------------------------

-- ----------------------------
-- Table structure for hx_auth_group
-- ----------------------------
DROP TABLE IF EXISTS `hx_auth_group`;
CREATE TABLE `hx_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` text NOT NULL,
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `update_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hx_auth_group
-- ----------------------------
INSERT INTO `hx_auth_group` VALUES ('1', '超级管理员', null, '1', '54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,1,2,3,4,5,12,13,14,15,16,23,7,8,9,10,11,17,18,19,20,21,80,81,82,83,72,73,74,75,76,77,78,79,37,38,39,40,41,42,24,25,26,27,28,29,30,31,32,33,34,35,36', '2016-11-27 16:28:50', '2016-11-27 16:28:50');
INSERT INTO `hx_auth_group` VALUES ('2', '普通管理员', '普通管理员', '2', '54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,17,18,19,20,21,43,44,45,46,47,48,49,50,51,52,53,37,38,39,40,41,42,24,25,26,27,28,29,30,31,32,33,34,35,36', '2016-11-27 16:28:50', '2016-11-27 16:44:14');
INSERT INTO `hx_auth_group` VALUES ('3', '测试', '测试', '1', '51,33,22,21,20,19,18,17,16,15,14,13,12,11,10,9,8,7,6,5,4,3,2,1', '2016-11-27 16:28:50', '2016-11-27 18:25:42');

-- ----------------------------
-- Table structure for hx_auth_group_access
-- ----------------------------
DROP TABLE IF EXISTS `hx_auth_group_access`;
CREATE TABLE `hx_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`) USING BTREE,
  KEY `uid` (`uid`) USING BTREE,
  KEY `group_id` (`group_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hx_auth_group_access
-- ----------------------------
INSERT INTO `hx_auth_group_access` VALUES ('1', '1');
INSERT INTO `hx_auth_group_access` VALUES ('2', '2');

-- ----------------------------
-- Table structure for hx_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `hx_auth_rule`;
CREATE TABLE `hx_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  `pid` int(11) DEFAULT '0',
  `url` varchar(200) DEFAULT NULL,
  `sort` int(10) DEFAULT NULL COMMENT '排序',
  `menu` int(1) DEFAULT '0' COMMENT '是否是菜单,1是菜单 2：不是',
  `icon` varchar(150) DEFAULT NULL COMMENT '图标',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hx_auth_rule
-- ----------------------------
INSERT INTO `hx_auth_rule` VALUES ('1', 'Manageer/Rbac/index', '权限管理', '1', '1', '', '0', 'Rbac/index', '0', '1', 'fa-gear');
INSERT INTO `hx_auth_rule` VALUES ('2', 'Manageer/AdminUser/list', '管理员管理', '1', '1', '', '1', 'AdminUser/index', '1', '1', '');
INSERT INTO `hx_auth_rule` VALUES ('3', 'Manager/AdminUser/index', '列表', '1', '1', '', '2', 'AdminUser/index', '0', '0', '');
INSERT INTO `hx_auth_rule` VALUES ('4', 'Manager/AdminUser/add', '添加', '1', '1', '', '2', 'AdminUser/add', '1', '0', '');
INSERT INTO `hx_auth_rule` VALUES ('5', 'Manager/AdminUser/edit', '修改', '1', '1', '', '2', 'AdminUser/edit', '2', '0', '');
INSERT INTO `hx_auth_rule` VALUES ('6', 'Manager/AdminUser/del', '启用/禁用', '1', '1', '', '2', 'AdminUser/del', '4', '0', '');
INSERT INTO `hx_auth_rule` VALUES ('7', 'Manager/Node/list', '节点管理', '1', '1', '', '1', 'Node/index', '2', '1', 'cogs');
INSERT INTO `hx_auth_rule` VALUES ('8', 'Manager/Node/index', '列表', '1', '1', '', '7', 'Node/index', '0', '0', '');
INSERT INTO `hx_auth_rule` VALUES ('9', 'Manager/Node/add', '添加', '1', '1', '', '7', 'Node/add', '2', '0', '');
INSERT INTO `hx_auth_rule` VALUES ('10', 'Manager/Node/edit', '修改', '1', '1', '', '7', 'Node/edit', '3', '0', '');
INSERT INTO `hx_auth_rule` VALUES ('11', 'Manager/Node/del', '启用/禁用', '1', '1', '', '7', 'Node/del', '4', '0', '');
INSERT INTO `hx_auth_rule` VALUES ('12', 'Manager/Role/list', '角色管理', '1', '1', '', '1', 'Role/index', '2', '1', '');
INSERT INTO `hx_auth_rule` VALUES ('13', 'Manager/Role/index', '列表', '1', '1', '', '12', 'Role/index', '1', '0', '');
INSERT INTO `hx_auth_rule` VALUES ('14', 'Manager/Role/add', '添加', '1', '1', '', '12', 'Role/add', '2', '0', '');
INSERT INTO `hx_auth_rule` VALUES ('15', 'Manager/Role/edit', '修改', '1', '1', '', '12', 'Role/edit', '3', '0', '');
INSERT INTO `hx_auth_rule` VALUES ('16', 'Manager/Role/del', '启用/禁用', '1', '1', '', '12', 'Role/del', '4', '0', '');
INSERT INTO `hx_auth_rule` VALUES ('17', 'Manager/User/lists', '用户管理', '1', '1', '', '0', 'User/index', '2', '1', ' fa-user');
INSERT INTO `hx_auth_rule` VALUES ('18', 'Manager/User/list', '用户管理', '1', '1', '', '17', 'User/index', '1', '1', '');
INSERT INTO `hx_auth_rule` VALUES ('19', 'Manager/User/index', '列表', '1', '1', '', '18', 'User/index', '1', '0', '');
INSERT INTO `hx_auth_rule` VALUES ('20', 'Manager/User/enable', '启用', '1', '1', '', '18', 'User/enable', '2', '0', '');
INSERT INTO `hx_auth_rule` VALUES ('21', 'Manager/User/shield', '禁用', '1', '1', '', '18', 'User/shield', '3', '0', '');
INSERT INTO `hx_auth_rule` VALUES ('22', 'Manager/Role/rbac', '授权', '1', '1', '', '12', 'Role/rbac', '5', '0', '');
INSERT INTO `hx_auth_rule` VALUES ('23', 'Manager/UserInfo/list', '个人信息', '1', '1', '', '24', 'UserInfo/index', '2', '0', '');
INSERT INTO `hx_auth_rule` VALUES ('24', 'Manager/UserInfo/index', '修改昵称', '1', '1', '', '27', 'UserInfo/index', '1', '0', '');
INSERT INTO `hx_auth_rule` VALUES ('25', 'Manager/UserInfo/pass', '修改密码', '1', '1', '', '27', 'UserInfo/pass', '2', '0', '');
INSERT INTO `hx_auth_rule` VALUES ('26', 'Manager/Link/list', '友情链接', '1', '1', '', '24', 'Link/index', '3', '1', '');
INSERT INTO `hx_auth_rule` VALUES ('27', 'Manager/Link/index', '列表', '1', '1', '', '30', 'Link/index', '1', '0', '');
INSERT INTO `hx_auth_rule` VALUES ('28', 'Manager/Link/add', '添加', '1', '1', '', '30', 'Link/add', '2', '0', '');
INSERT INTO `hx_auth_rule` VALUES ('29', 'Manager/Link/edit', '修改', '1', '1', '', '30', 'Link/edit', '3', '0', '');
INSERT INTO `hx_auth_rule` VALUES ('30', 'Manager/Link/del', '删除', '1', '1', '', '30', 'Link/del', '4', '0', '');
INSERT INTO `hx_auth_rule` VALUES ('31', 'Manager/Cache/list', '缓存管理', '1', '1', '', '24', 'Cache/index', '4', '1', '');
INSERT INTO `hx_auth_rule` VALUES ('32', 'Manager/Cache/index', '清理缓存', '1', '1', '', '35', 'Cache/index', '1', '0', '');
INSERT INTO `hx_auth_rule` VALUES ('33', 'Manager/Com/list', '内容管理', '1', '1', '', '0', 'Com/list', '0', '1', 'fa-tasks');
INSERT INTO `hx_auth_rule` VALUES ('34', 'Manager/Cate/list', '文章分类', '1', '1', '', '54', 'Cate/index', '1', '1', '');
INSERT INTO `hx_auth_rule` VALUES ('35', 'Manager/Cate/index', '列表', '1', '1', '', '55', 'Cate/index', '1', '0', '');
INSERT INTO `hx_auth_rule` VALUES ('36', 'Manager/Cate/add', '添加', '1', '1', '', '55', 'Cate/add', '2', '0', '');
INSERT INTO `hx_auth_rule` VALUES ('37', 'Manager/Cate/edit', '修改', '1', '1', '', '55', 'Cate/edit', '3', '0', '');
INSERT INTO `hx_auth_rule` VALUES ('38', 'Manager/Cate/del', '删除', '1', '1', '', '55', 'Cate/del', '4', '0', '');
INSERT INTO `hx_auth_rule` VALUES ('39', 'Manager/Article/list', '文章管理', '1', '1', '', '54', 'Article/index', '2', '1', '');
INSERT INTO `hx_auth_rule` VALUES ('40', 'Manager/Article/index', '列表', '1', '1', '', '60', 'Article/index', '1', '0', '');
INSERT INTO `hx_auth_rule` VALUES ('41', 'Manager/Article/add', '添加', '1', '1', '', '60', 'Article/add', '2', '0', '');
INSERT INTO `hx_auth_rule` VALUES ('42', 'Manager/Article/edit', '修改', '1', '1', '', '60', 'Article/edit', '3', '0', '');
INSERT INTO `hx_auth_rule` VALUES ('43', 'Manager/Article/del', '删除', '1', '1', '', '60', 'Article/del', '4', '0', '');
INSERT INTO `hx_auth_rule` VALUES ('44', 'Manager/Comment/list', '评论管理', '1', '1', '', '54', 'Comment/index', '3', '1', '');
INSERT INTO `hx_auth_rule` VALUES ('45', 'Manager/Comment/index', '列表', '1', '1', '', '65', 'Comment/index', '1', '0', '');
INSERT INTO `hx_auth_rule` VALUES ('46', 'Manager/Comment/del', '删除', '0', '1', '', '65', 'Comment/del', '2', '0', '');
INSERT INTO `hx_auth_rule` VALUES ('47', 'Manager/Recycle/list', '回收站', '1', '1', '', '54', 'Recycle/index', '4', '1', '');
INSERT INTO `hx_auth_rule` VALUES ('48', 'Manager/Recycle/index', '列表', '1', '1', '', '68', 'Recycle/index', '1', '0', '');
INSERT INTO `hx_auth_rule` VALUES ('49', 'Manager/Recycle/restore', '恢复', '1', '1', '', '68', 'Recycle/restore', '2', '0', '');
INSERT INTO `hx_auth_rule` VALUES ('50', 'Manager/Recycle/del', '删除', '1', '1', '', '68', 'Recycle/del', '3', '0', '');
INSERT INTO `hx_auth_rule` VALUES ('51', 'aa/bb/cc', '测试', '1', '1', '', '33', 'bb/cc222', '52', '0', '');

-- ----------------------------
-- Table structure for hx_cate
-- ----------------------------
DROP TABLE IF EXISTS `hx_cate`;
CREATE TABLE `hx_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `pid` int(11) DEFAULT NULL,
  `cate` varchar(200) DEFAULT NULL COMMENT '分类名称',
  `sort` int(11) DEFAULT '50',
  `status` tinyint(4) DEFAULT '1' COMMENT '1:启用，2：禁用',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hx_cate
-- ----------------------------

-- ----------------------------
-- Table structure for hx_comments
-- ----------------------------
DROP TABLE IF EXISTS `hx_comments`;
CREATE TABLE `hx_comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL COMMENT '图片地址',
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '发表评论的用户id',
  `full_name` varchar(50) DEFAULT NULL COMMENT '评论者昵称',
  `email` varchar(255) DEFAULT NULL COMMENT '评论者邮箱',
  `createtime` datetime NOT NULL DEFAULT '2000-01-01 00:00:00',
  `content` text NOT NULL COMMENT '评论内容',
  `parentid` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '被回复的评论id',
  `aid` int(11) DEFAULT NULL COMMENT '评论内容id',
  PRIMARY KEY (`id`),
  KEY `comment_parent` (`parentid`) USING BTREE,
  KEY `createtime` (`createtime`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hx_comments
-- ----------------------------

-- ----------------------------
-- Table structure for hx_link
-- ----------------------------
DROP TABLE IF EXISTS `hx_link`;
CREATE TABLE `hx_link` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL COMMENT '友情链接地址',
  `name` varchar(255) NOT NULL COMMENT '友情链接名称',
  `image` varchar(255) DEFAULT NULL COMMENT '友情链接图标',
  `desc` text NOT NULL COMMENT '友情链接描述',
  `sort` int(10) NOT NULL DEFAULT '50' COMMENT '排序',
  `time` int(11) DEFAULT NULL COMMENT '创建时间',
  `create_time` int(11) DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hx_link
-- ----------------------------

-- ----------------------------
-- Table structure for hx_log
-- ----------------------------
DROP TABLE IF EXISTS `hx_log`;
CREATE TABLE `hx_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL COMMENT '管理员远',
  `time` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `ip` varchar(20) DEFAULT NULL COMMENT '登录ip',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1152 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hx_log
-- ----------------------------

-- ----------------------------
-- Table structure for hx_nav
-- ----------------------------
DROP TABLE IF EXISTS `hx_nav`;
CREATE TABLE `hx_nav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '1:显示2：不显示',
  `sort` int(6) DEFAULT '50',
  `time` int(11) DEFAULT NULL COMMENT '创建时间',
  `name` varchar(255) DEFAULT NULL COMMENT '名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hx_nav
-- ----------------------------

-- ----------------------------
-- Table structure for hx_system
-- ----------------------------
DROP TABLE IF EXISTS `hx_system`;
CREATE TABLE `hx_system` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL COMMENT '网站名称',
  `title` varchar(100) DEFAULT NULL COMMENT '网站标题',
  `domain` varchar(200) DEFAULT NULL COMMENT '网站域名',
  `address` varchar(200) DEFAULT NULL COMMENT '公司地址',
  `phone` varchar(100) DEFAULT NULL COMMENT '公司电话',
  `qq` varchar(50) DEFAULT NULL COMMENT '公司QQ',
  `email` varchar(100) DEFAULT NULL COMMENT '公司email',
  `keyword` varchar(200) DEFAULT NULL COMMENT '网站关键字',
  `desc` varchar(200) DEFAULT NULL COMMENT '网站描述',
  `copyright` varchar(200) DEFAULT NULL COMMENT '底部版权',
  `content` text COMMENT '关于我们',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hx_system
-- ----------------------------
INSERT INTO `hx_system` VALUES ('1', '嘎嘎时代科技有限公司', '嘎嘎时代科技', 'www.haophper.com', '霍营', '18600957490', '907274532', '907274532@qq.com', '嘎嘎时代', '嘎嘎时代嘎嘎时代嘎嘎时代嘎嘎时代嘎嘎时代嘎嘎时代嘎嘎时代嘎嘎时代嘎嘎时代嘎嘎时代', '嘎嘎时代', '嘎嘎时代嘎嘎时代嘎嘎时代嘎嘎时代嘎嘎时代嘎嘎时代嘎嘎时代嘎嘎时代嘎嘎时代嘎嘎时代2222222222');

-- ----------------------------
-- Table structure for hx_user
-- ----------------------------
DROP TABLE IF EXISTS `hx_user`;
CREATE TABLE `hx_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) NOT NULL DEFAULT '' COMMENT '用户名',
  `user_pass` varchar(64) NOT NULL DEFAULT '' COMMENT '登录密码；hx_password加密',
  `user_nicename` varchar(50) NOT NULL DEFAULT '' COMMENT '用户美名',
  `user_email` varchar(100) NOT NULL DEFAULT '' COMMENT '登录邮箱',
  `user_url` varchar(100) NOT NULL DEFAULT '' COMMENT '用户个人网站',
  `mobile_phone` char(11) DEFAULT NULL COMMENT '手机号',
  `avatar` varchar(255) DEFAULT NULL COMMENT '用户头像，相对于upload/avatar目录',
  `sex` smallint(1) DEFAULT '0' COMMENT '性别；0：保密，1：男；2：女',
  `birthday` int(11) DEFAULT NULL COMMENT '生日',
  `signature` varchar(255) DEFAULT NULL COMMENT '个性签名',
  `last_login_ip` varchar(16) NOT NULL COMMENT '最后登录ip',
  `user_activation_key` varchar(60) NOT NULL DEFAULT '' COMMENT '激活码',
  `user_status` int(11) NOT NULL DEFAULT '1' COMMENT '用户状态 0：禁用； 1：正常 ；2：未验证',
  `score` int(11) NOT NULL DEFAULT '0' COMMENT '用户积分',
  `last_login_time` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_login_key` (`user_login`) USING BTREE,
  KEY `user_nicename` (`user_nicename`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hx_user
-- ----------------------------

-- ----------------------------
-- Table structure for hx_users
-- ----------------------------
DROP TABLE IF EXISTS `hx_users`;
CREATE TABLE `hx_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) NOT NULL DEFAULT '' COMMENT '用户名',
  `user_pass` varchar(64) NOT NULL DEFAULT '' COMMENT '登录密码；hx_password加密',
  `user_nicename` varchar(50) NOT NULL DEFAULT '' COMMENT '用户美名',
  `user_email` varchar(100) NOT NULL DEFAULT '' COMMENT '登录邮箱',
  `user_url` varchar(100) NOT NULL DEFAULT '' COMMENT '用户个人网站',
  `avatar` varchar(255) DEFAULT NULL COMMENT '用户头像，相对于upload/avatar目录',
  `sex` smallint(1) DEFAULT '0' COMMENT '性别；0：保密，1：男；2：女',
  `birthday` int(11) DEFAULT NULL COMMENT '生日',
  `signature` varchar(255) DEFAULT NULL COMMENT '个性签名',
  `last_login_ip` varchar(16) NOT NULL COMMENT '最后登录ip',
  `user_activation_key` varchar(60) NOT NULL DEFAULT '' COMMENT '激活码',
  `user_status` int(11) NOT NULL DEFAULT '1' COMMENT '用户状态 0：禁用； 1：正常 ；2：未验证',
  `score` int(11) NOT NULL DEFAULT '0' COMMENT '用户积分',
  `last_login_time` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_login_key` (`user_login`) USING BTREE,
  KEY `user_nicename` (`user_nicename`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hx_users
-- ----------------------------
