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
