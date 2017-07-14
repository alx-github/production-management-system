-- ----------------------------
-- Table structure for accounts
-- ----------------------------
drop table if exists `accounts` cascade;

create table `accounts` (
  `account_id` BIGINT UNSIGNED not null PRIMARY KEY AUTO_INCREMENT comment 'アカウントID'
  , `created_at` DATETIME comment '作成日時'
  , `updated_at` DATETIME comment '更新日時'
  , `deleted_at` DATETIME comment '削除日時'
  , `username` VARCHAR(50) not null comment 'ユーザー名'
  , `password` VARCHAR(255) not null comment 'パスワード'
  , `auth` TINYINT UNSIGNED comment '権限'
) comment 'アカウント' ENGINE=InnoDB DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

create index `accounts_idx_1`
  on `accounts`(`account_id`,`deleted_at`);

-- admin/admin
INSERT INTO `accounts` (`username`, `password`, `auth`) VALUES ('admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '100');
-- user/test
INSERT INTO `accounts` (`username`, `password`, `auth`) VALUES ('user', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', '10');
