-- 在庫
drop table if exists `stocks` cascade;

create table `stocks` (
  `stock_id` BIGINT UNSIGNED not null AUTO_INCREMENT comment '在庫ID'
  , `created_at` DATETIME comment '作成日時'
  , `updated_at` DATETIME comment '更新日時'
  , `deleted_at` DATETIME comment '削除日時'
  , `customer_id` BIGINT UNSIGNED not null comment '取引先ID'
  , `material_id` BIGINT UNSIGNED not null comment '材料ID'
  , `in_out_type` TINYINT UNSIGNED not null comment '入出庫区分'
  , `in_out_date` DATE not null comment '入出庫日'
  , `in_out_number` FLOAT comment '入出庫数'
  , `stock_number` FLOAT comment '在庫数'
  , `reason` TINYINT UNSIGNED comment '理由'
  , `in_out_order_detail_id` BIGINT UNSIGNED comment '受発注明細ID'
  , `note` TEXT comment '備考'
  , constraint `stocks_pkc` primary key (`stock_id`)
) comment '在庫' ENGINE=InnoDB DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

create index `stocks_idx_1`
  on `stocks`(`stock_id`,`customer_id`,`material_id`,`in_out_type`,`in_out_date`);

-- 発注明細
drop table if exists `send_order_details` cascade;

create table `send_order_details` (
  `send_order_detail_id` BIGINT UNSIGNED not null AUTO_INCREMENT comment '発注明細ID'
  , `created_at` DATETIME comment '作成日時'
  , `updated_at` DATETIME comment '更新日時'
  , `deleted_at` DATETIME comment '削除日時'
  , `send_order_id` BIGINT UNSIGNED comment '発注ID'
  , `receive_order_detail_id` BIGINT UNSIGNED not null comment '受注明細ID'
  , `product_type` TINYINT UNSIGNED not null comment '商品区分'
  , `instruction_no` VARCHAR(50) comment '指図No'
  , `part_number` VARCHAR(50) comment '品番'
  , `product_id` BIGINT UNSIGNED comment '商品ID'
  , `product_name` VARCHAR(50) comment '品名'
  , `item_name` VARCHAR(50) comment 'アイテム名'
  , `size` TINYINT UNSIGNED not null comment 'サイズ'
  , `quantity` MEDIUMINT UNSIGNED not null comment '数量'
  , `note` TEXT comment 'メモ'
  , `status` TINYINT UNSIGNED comment 'ステータス'
  , constraint `send_order_details_pkc` primary key (`send_order_detail_id`)
) comment '発注明細' ENGINE=InnoDB DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

create index `send_order_details_idx_1`
  on `send_order_details`(`send_order_detail_id`,`deleted_at`,`send_order_id`,`receive_order_detail_id`,`part_number`,`product_id`,`status`,`size`);

-- 発注
drop table if exists `send_orders` cascade;

create table `send_orders` (
  `send_order_id` BIGINT UNSIGNED not null AUTO_INCREMENT comment '発注ID'
  , `created_at` DATETIME comment '作成日時'
  , `updated_at` DATETIME comment '更新日時'
  , `deleted_at` DATETIME comment '削除日時'
  , `receive_order_id` BIGINT UNSIGNED comment '受注ID'
  , `receive_order_customer_id` BIGINT UNSIGNED comment '取引先ID'
  , `status` TINYINT UNSIGNED comment 'ステータス'
  , constraint `send_orders_pkc` primary key (`send_order_id`)
) comment '発注' ENGINE=InnoDB DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

create index `send_orders_idx_1`
  on `send_orders`(`send_order_id`,`deleted_at`,`receive_order_id`,`receive_order_customer_id`,`status`);

-- 受注明細
drop table if exists `receive_order_details` cascade;

create table `receive_order_details` (
  `receive_order_detail_id` BIGINT UNSIGNED not null AUTO_INCREMENT comment '受注明細ID'
  , `created_at` DATETIME comment '作成日時'
  , `updated_at` DATETIME comment '更新日時'
  , `deleted_at` DATETIME comment '削除日時'
  , `receive_order_id` BIGINT UNSIGNED comment '受注ID'
  , `product_type` TINYINT UNSIGNED not null comment '商品区分'
  , `instruction_no` VARCHAR(50) comment '指図No'
  , `part_number` VARCHAR(50) comment '品番'
  , `product_id` BIGINT UNSIGNED comment '商品ID'
  , `product_name` VARCHAR(50) comment '品名'
  , `item_name` VARCHAR(50) comment 'アイテム名'
  , `size` TINYINT UNSIGNED not null comment 'サイズ'
  , `instruction_quantity` MEDIUMINT UNSIGNED not null comment '数量'
  , `cutting_quantity` MEDIUMINT UNSIGNED comment '実数量'
  , `estimated_shipping_date` DATE comment '出荷予定日'
  , `processing_fee` MEDIUMINT comment '加工費'
  , `billing_amount` INT comment '請求金額'
  , `freight_fee` TINYINT UNSIGNED not null comment '運送料'
  , `freight_service` VARCHAR(50) comment '運送便'
  , `destination` VARCHAR(50) comment '送り先'
  , `note` TEXT comment 'メモ'
  , `progress_arrival` TINYINT UNSIGNED comment '進捗状況.入荷'
  , `progress_cutting` TINYINT UNSIGNED comment '進捗状況.裁断'
  , `progress_interruption` TINYINT UNSIGNED comment '進捗状況.中断'
  , `progress_sewing` TINYINT UNSIGNED comment '進捗状況.縫製'
  , `progress_shipment` TINYINT UNSIGNED comment '進捗状況.出荷'
  , `progress_claim` TINYINT UNSIGNED comment '進捗状況.請求'
  , constraint `receive_order_details_pkc` primary key (`receive_order_detail_id`)
) comment '受注明細' ENGINE=InnoDB DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

create index `receive_order_details_idx_1`
  on `receive_order_details`(`receive_order_detail_id`,`deleted_at`,`receive_order_id`,`part_number`,`product_id`,`size`,`estimated_shipping_date`,`progress_arrival`,`progress_cutting`,`progress_interruption`,`progress_sewing`,`progress_shipment`,`progress_claim`);

-- 受注
drop table if exists `receive_orders` cascade;

create table `receive_orders` (
  `receive_order_id` BIGINT UNSIGNED not null AUTO_INCREMENT comment '受注ID'
  , `created_at` DATETIME comment '作成日時'
  , `updated_at` DATETIME comment '更新日時'
  , `deleted_at` DATETIME comment '削除日時'
  , `receive_order_customer_id` BIGINT UNSIGNED comment '取引先ID'
  , `requested_date` DATE comment '依頼日'
  , `status` TINYINT UNSIGNED comment 'ステータス'
  , `consumption_tax` TINYINT comment '消費税'
  , constraint `receive_orders_pkc` primary key (`receive_order_id`)
) comment '受注' ENGINE=InnoDB DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

create index `receive_orders_idx_1`
  on `receive_orders`(`receive_order_id`,`deleted_at`,`receive_order_customer_id`,`requested_date`,`status`);

-- 商品に紐づく材料
drop table if exists `product_materials` cascade;

create table `product_materials` (
  `product_material_id` BIGINT UNSIGNED not null AUTO_INCREMENT comment '商品に紐づく材料ID'
  , `created_at` DATETIME comment '作成日時'
  , `updated_at` DATETIME comment '更新日時'
  , `deleted_at` DATETIME comment '削除日時'
  , `product_id` BIGINT UNSIGNED comment '商品ID'
  , `material_id` BIGINT UNSIGNED comment '材料ID'
  , `required_scale` FLOAT not null comment '要尺'
  , constraint `product_materials_pkc` primary key (`product_material_id`)
) comment '商品に紐づく材料' ENGINE=InnoDB DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

create index `product_materials_idx_1`
  on `product_materials`(`product_material_id`,`deleted_at`,`product_id`,`material_id`);

-- 取引先
drop table if exists `customers` cascade;

create table `customers` (
  `customer_id` BIGINT UNSIGNED not null AUTO_INCREMENT comment '取引先ID'
  , `created_at` DATETIME comment '作成日時'
  , `updated_at` DATETIME comment '更新日時'
  , `deleted_at` DATETIME comment '削除日時'
  , `name` VARCHAR(50) not null comment '取引先名'
  , `contact` VARCHAR(50) comment '担当者名'
  , `postal_code` VARCHAR(7) comment '郵便番号'
  , `address_1` VARCHAR(100) comment '住所1'
  , `address_2` VARCHAR(100) comment '住所2'
  , `phone_number` VARCHAR(20) comment '電話番号'
  , `email_1` VARCHAR(255) comment 'メールアドレス1'
  , `email_2` VARCHAR(255) comment 'メールアドレス2'
  , `display_type` TINYINT UNSIGNED comment '表示区分'
  , `memo` TEXT comment 'メモ'
  , constraint `customers_pkc` primary key (`customer_id`)
) comment '取引先' ENGINE=InnoDB DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

create index `customers_idx_1`
  on `customers`(`deleted_at`,`display_type`);

-- 商品
drop table if exists `products` cascade;

create table `products` (
  `product_id` BIGINT UNSIGNED not null AUTO_INCREMENT comment '商品ID'
  , `created_at` DATETIME comment '作成日時'
  , `updated_at` DATETIME comment '更新日時'
  , `deleted_at` DATETIME comment '削除日時'
  , `receive_order_customer_id` BIGINT UNSIGNED comment '取引先ID'
  , `category` SMALLINT UNSIGNED comment 'カテゴリー'
  , `name` VARCHAR(50) not null comment '品名'
  , `part_number` VARCHAR(50) comment '品番'
  , `display_type` TINYINT UNSIGNED comment '表示区分'
  , `unit` TINYINT UNSIGNED not null comment '単位'
  , `processing_fee` MEDIUMINT comment '加工賃'
  , constraint `products_pkc` primary key (`product_id`)
) comment '商品' ENGINE=InnoDB DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

create index `products_idx_1`
  on `products`(`product_id`,`deleted_at`,`receive_order_customer_id`,`name`,`part_number`,`display_type`);

-- 材料
drop table if exists `materials` cascade;

create table `materials` (
  `material_id` BIGINT UNSIGNED not null AUTO_INCREMENT comment '材料ID'
  , `created_at` DATETIME comment '作成日時'
  , `updated_at` DATETIME comment '更新日時'
  , `deleted_at` DATETIME comment '削除日時'
  , `receive_order_customer_id` BIGINT UNSIGNED comment '取引先ID'
  , `category` SMALLINT UNSIGNED comment 'カテゴリー'
  , `part_number` VARCHAR(50) not null comment '品番'
  , `color_number_code` VARCHAR(20) comment '色番.コード'
  , `color_number_tint` VARCHAR(50) comment '色番.色合い'
  , `unit` TINYINT UNSIGNED not null comment '単位'
  , `spec` VARCHAR(100) comment '仕様'
  , `display_type` TINYINT UNSIGNED comment '表示区分'
  , `send_order_customer_id` BIGINT UNSIGNED not null comment '発注先ID'
  , constraint `materials_pkc` primary key (`material_id`)
) comment '材料' ENGINE=InnoDB DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

create index `materials_idx_1`
  on `materials`(`material_id`,`deleted_at`,`receive_order_customer_id`,`part_number`,`color_number_code`,`color_number_tint`,`display_type`);

-- アカウント
drop table if exists `accounts` cascade;

create table `accounts` (
  `account_id` BIGINT UNSIGNED not null AUTO_INCREMENT comment 'アカウントID'
  , `created_at` DATETIME comment '作成日時'
  , `updated_at` DATETIME comment '更新日時'
  , `deleted_at` DATETIME comment '削除日時'
  , `username` VARCHAR(50) not null comment 'ユーザー名'
  , `password` VARCHAR(255) not null comment 'パスワード'
  , `auth` TINYINT UNSIGNED comment '権限'
  , constraint `accounts_pkc` primary key (`account_id`)
) comment 'アカウント' ENGINE=InnoDB DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

create index `accounts_idx_1`
  on `accounts`(`account_id`,`deleted_at`);

-- admin/admin
INSERT INTO `accounts` (`username`, `password`, `auth`) VALUES ('admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '100');
-- user/test
INSERT INTO `accounts` (`username`, `password`, `auth`) VALUES ('user', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', '0');

-- insert data customers
INSERT INTO `customers` VALUES ('1', '2017-07-25 13:37:03', '2017-07-26 12:45:08', null, 'customer 1 受注先 ', '担当者名 1', '1000013', '東京都', '千代田区霞が関', '0809999999', 'eyemovic@gmail.com', '', '1', 'メモメモメモメモメモメモメモメモメモ');
INSERT INTO `customers` VALUES ('2', '2017-07-25 13:37:11', '2017-07-26 12:08:20', null, 'customer 2 両方', '', '', '', '', '', '', '', '3', '');
INSERT INTO `customers` VALUES ('3', '2017-07-25 13:37:21', '2017-07-26 12:45:16', null, 'customer 3 発注先', '', '', '', '', '', '', '', '2', '');
INSERT INTO `customers` VALUES ('4', '2017-07-25 13:37:59', '2017-07-26 12:08:42', null, 'customer 4  両方', '', '1030016', '東京都', '中央区日本橋小網町 123', '', 'test1@gmail.com', 'test2@gmail.com', '3', '');
INSERT INTO `customers` VALUES ('5', '2017-07-26 12:17:31', '2017-07-26 12:45:27', null, 'customer 5 表示しない', '', '', '', '', '', '', '', '0', '');

-- Materials
INSERT INTO `materials` (`receive_order_customer_id`, `category`, `part_number`, `color_number_code`, `color_number_tint`, `unit`, `spec`, `display_type`, `send_order_customer_id`) VALUES ('1', '2', 'KNT18', 'R', 'レッド', '1', 'width:18', '3', '3');
INSERT INTO `materials` (`receive_order_customer_id`, `category`, `part_number`, `color_number_code`, `color_number_tint`, `unit`, `spec`, `display_type`, `send_order_customer_id`) VALUES ('2', '1', 'E-13', 'GL', 'ゴールド', '1', 'width:13', '3', '3');
INSERT INTO `materials` (`receive_order_customer_id`, `category`, `part_number`, `color_number_code`, `color_number_tint`, `unit`, `spec`, `display_type`, `send_order_customer_id`) VALUES ('1', '3', 'E-14', 'OR', 'オレンジ', '1', 'volume: 50.0', '3', '3');
INSERT INTO `materials` (`receive_order_customer_id`, `category`, `part_number`, `color_number_code`, `color_number_tint`, `unit`, `spec`, `display_type`, `send_order_customer_id`) VALUES ('1', '2', 'KNT18', 'G', 'グリーン', '1', 'width:18', '3', '3');
INSERT INTO `materials` (`receive_order_customer_id`, `category`, `part_number`, `color_number_code`, `color_number_tint`, `unit`, `spec`, `display_type`, `send_order_customer_id`) VALUES ('2', '1', 'E-13', 'B', 'ブルー', '1', 'width:13', '3', '3');
INSERT INTO `materials` (`receive_order_customer_id`, `category`, `part_number`, `color_number_code`, `color_number_tint`, `unit`, `spec`, `display_type`, `send_order_customer_id`) VALUES ('1', '0', 'E-14', 'PU', 'パープル', '1', 'volume: 50.0', '3', '4');

-- Products
INSERT INTO `products` (`category`, `name`, `part_number`, `display_type`, `unit`, `processing_fee`) VALUES ('1', '商品1', 'A00001', '0', '1', '100');
INSERT INTO `products` (`category`, `name`, `part_number`, `display_type`, `unit`, `processing_fee`) VALUES ('1', '商品2', 'A00001', '1', '2', '100');
INSERT INTO `products` (`category`, `name`, `part_number`, `display_type`, `unit`, `processing_fee`) VALUES ('2', '商品3', 'B90099', '1', '1', '100');
INSERT INTO `products` (`category`, `name`, `part_number`, `display_type`, `unit`, `processing_fee`) VALUES ('1', '商品4', 'B90099', '1', '2', '100');
INSERT INTO `products` (`category`, `name`, `part_number`, `display_type`, `unit`, `processing_fee`) VALUES ('2', '商品5', 'A00001', '0', '1', '100');
INSERT INTO `products` (`category`, `name`, `part_number`, `display_type`, `unit`, `processing_fee`) VALUES ('1', '商品6', 'A00001', '1', '2', '100');
INSERT INTO `products` (`category`, `name`, `part_number`, `display_type`, `unit`, `processing_fee`) VALUES ('3', '商品7', 'A00001', '1', '2', '100');
INSERT INTO `products` (`category`, `name`, `part_number`, `display_type`, `unit`, `processing_fee`) VALUES ('1', '商品8', 'B90099', '0', '2', '100');
INSERT INTO `products` (`category`, `name`, `part_number`, `display_type`, `unit`, `processing_fee`) VALUES ('4', '商品9', 'B90099', '1', '1', '100');
INSERT INTO `products` (`category`, `name`, `part_number`, `display_type`, `unit`, `processing_fee`) VALUES ('4', '商品10', 'B90099', '1', '2', '100');
INSERT INTO `products` (`category`, `name`, `part_number`, `display_type`, `unit`, `processing_fee`) VALUES ('3', '商品11', 'B90099', '0', '1', '100');
INSERT INTO `products` (`category`, `name`, `part_number`, `display_type`, `unit`, `processing_fee`) VALUES ('3', '商品12', 'A00001', '1', '1', '100');
INSERT INTO `products` (`category`, `name`, `part_number`, `display_type`, `unit`, `processing_fee`) VALUES ('1', '商品13', 'A00001', '0', '2', '100');
INSERT INTO `products` (`category`, `name`, `part_number`, `display_type`, `unit`, `processing_fee`) VALUES ('5', '商品14', 'B90099', '1', '1', '100');
INSERT INTO `products` (`category`, `name`, `part_number`, `display_type`, `unit`, `processing_fee`) VALUES ('1', '商品15', 'B90099', '0', '1', '100');
