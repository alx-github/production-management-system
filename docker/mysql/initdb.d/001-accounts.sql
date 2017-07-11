-- ----------------------------
-- Table structure for accounts
-- ----------------------------
DROP TABLE IF EXISTS `accounts`;
CREATE TABLE `accounts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `login_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL COMMENT '最終ログイン日時',
  `type` int(11) DEFAULT '0' COMMENT '0:指定なし、1:管理者、2:受発注ユーザー、3:裁断ユーザー、4:縫製ユーザー、5:出荷ユーザー',
  `created_at` datetime DEFAULT NULL COMMENT '作成日時',
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '更新日時',
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='';
SET FOREIGN_KEY_CHECKS=1;

-- admin/admin
INSERT INTO `accounts` (`login_id`, `password`, `type`) VALUES ('admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '1');
-- user/test
INSERT INTO `accounts` (`login_id`, `password`, `type`) VALUES ('user', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', '0');
