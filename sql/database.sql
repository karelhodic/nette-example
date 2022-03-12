CREATE TABLE `user` (
    `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `first_name` VARCHAR(64) NOT NULL COMMENT 'Jméno' COLLATE 'utf8_bin',
    `last_name` VARCHAR(64) NOT NULL COMMENT 'Příjmení' COLLATE 'utf8_bin',
    `email` VARCHAR(64) NOT NULL COMMENT 'Email' COLLATE 'utf8_bin',
    `password` VARCHAR(64) NOT NULL COMMENT 'Hash hesla' COLLATE 'utf8_bin',
    `created` DATETIME NOT NULL COMMENT 'Založeno',
    PRIMARY KEY (`id`) USING BTREE,
    UNIQUE INDEX `user_email_unique` (`email`) USING BTREE
)
    COLLATE='utf8_bin'
ENGINE=InnoDB
;

CREATE TABLE `article` (
    `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(64) NULL DEFAULT NULL COLLATE 'utf8mb4_0900_ai_ci',
    `perex` TEXT NULL DEFAULT NULL COLLATE 'utf8mb4_0900_ai_ci',
    `created` DATETIME NULL DEFAULT NULL,
    `requires_logging_in` TINYINT(1) NOT NULL DEFAULT '1',
    PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8mb4_0900_ai_ci'
ENGINE=InnoDB
;

CREATE TABLE `article_rating` (
    `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `user_id` INT(10) UNSIGNED NOT NULL,
    `article_id` INT(10) UNSIGNED NULL DEFAULT NULL,
    `rating` INT(10) UNSIGNED NULL DEFAULT NULL COMMENT '1 - like, 0 - dislike',
    PRIMARY KEY (`id`) USING BTREE,
    UNIQUE INDEX `article_rating_user_id_article_id_unique` (`user_id`, `article_id`) USING BTREE,
    INDEX `article_rating_article_id_article` (`article_id`) USING BTREE,
    INDEX `article_rating_user_id_user` (`user_id`) USING BTREE,
    CONSTRAINT `article_rating_article_id_article` FOREIGN KEY (`article_id`) REFERENCES `nette_example`.`article` (`id`) ON UPDATE RESTRICT ON DELETE RESTRICT,
    CONSTRAINT `article_rating_user_id_user` FOREIGN KEY (`user_id`) REFERENCES `nette_example`.`user` (`id`) ON UPDATE RESTRICT ON DELETE RESTRICT
)
    COLLATE='utf8_bin'
ENGINE=InnoDB
;

