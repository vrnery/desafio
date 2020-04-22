CREATE DATABASE IF NOT EXISTS dbagevir DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE dbagevir;
CREATE USER IF NOT EXISTS 'agevirroot'@'localhost' IDENTIFIED BY 'agerviradmin';
GRANT SELECT, INSERT, UPDATE, DELETE, EXECUTE, SHOW VIEW ON dbagevir.* TO 'agevirroot'@'localhost';

CREATE TABLE IF NOT EXISTS `dbagevir`.`adresses` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `zipcode` VARCHAR(9) UNIQUE NOT NULL,
    `street` VARCHAR(100) DEFAULT NULL,
    `neighborhood` VARCHAR(100) DEFAULT NULL,
    `city` VARCHAR(100) DEFAULT NULL,
    `abbreviation` VARCHAR(2) DEFAULT NULL,
    `created_at` TIMESTAMP NULL DEFAULT NULL,
    `updated_at` TIMESTAMP NULL DEFAULT NULL,
    `deleted_at` TIMESTAMP NULL DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `dbagevir`.`phones` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `phone` VARCHAR(15) UNIQUE NOT NULL,
    `whatsapp` BOOLEAN DEFAULT FALSE,
    `created_at` TIMESTAMP NULL DEFAULT NULL,
    `updated_at` TIMESTAMP NULL DEFAULT NULL,
    `deleted_at` TIMESTAMP NULL DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `dbagevir`.`users` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(100) NOT NULL,
    `email` VARCHAR(200) UNIQUE NOT NULL,
    `password` VARCHAR(200) NOT NULL,
    `adresse_id` INT UNSIGNED DEFAULT NULL,
    `number` VARCHAR(10) DEFAULT NULL,
    `telephone_id` INT UNSIGNED DEFAULT NULL,
    `cellphone_id` INT UNSIGNED DEFAULT NULL,
    `created_at` TIMESTAMP NULL DEFAULT NULL,
    `updated_at` TIMESTAMP NULL DEFAULT NULL,
    `deleted_at` TIMESTAMP NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`adresse_id`) REFERENCES `dbagevir`.`adresses`(`id`) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (`telephone_id`) REFERENCES `dbagevir`.`phones`(`id`) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (`cellphone_id`) REFERENCES `dbagevir`.`phones`(`id`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `dbagevir`.`companies` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `cnpj` VARCHAR(18) DEFAULT NULL,
    `companyname` VARCHAR(200) NOT NULL,
    `fantasyname` VARCHAR(200) DEFAULT NULL,
    `adresse_id` INT UNSIGNED DEFAULT NULL,
    `number` VARCHAR(10) DEFAULT NULL,
    `telephone_id` INT UNSIGNED DEFAULT NULL,
    `cellphone_id` INT UNSIGNED DEFAULT NULL,
    `email` VARCHAR(200) DEFAULT NULL,
    `website` VARCHAR(200) DEFAULT NULL,
    `facebook` VARCHAR(200) DEFAULT NULL,
    `instagran` VARCHAR(200) DEFAULT NULL,
    `user_id` INT UNSIGNED NOT NULL,
    `created_at` TIMESTAMP NULL DEFAULT NULL,
    `updated_at` TIMESTAMP NULL DEFAULT NULL,
    `deleted_at` TIMESTAMP NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`adresse_id`) REFERENCES `dbagevir`.`adresses`(`id`) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (`telephone_id`) REFERENCES `dbagevir`.`phones`(`id`) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (`cellphone_id`) REFERENCES `dbagevir`.`phones`(`id`) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (`user_id`) REFERENCES `dbagevir`.`users`(`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `dbagevir`.`users` ADD COLUMN `photo` VARCHAR(255) DEFAULT NULL AFTER `cellphone_id`;

ALTER TABLE `dbagevir`.`users` DROP FOREIGN KEY `users_ibfk_1`;
ALTER TABLE `dbagevir`.`users` DROP FOREIGN KEY `users_ibfk_2`;
ALTER TABLE `dbagevir`.`users` DROP FOREIGN KEY `users_ibfk_3`;
ALTER TABLE `dbagevir`.`users` ADD CONSTRAINT `fk_users_address`
  FOREIGN KEY (`adresse_id`) REFERENCES `dbagevir`.`adresses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `dbagevir`.`users` ADD CONSTRAINT `fk_users_telephone`
  FOREIGN KEY (`telephone_id`) REFERENCES `dbagevir`.`phones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `dbagevir`.`users` ADD CONSTRAINT `fk_users_cellphone`
  FOREIGN KEY (`cellphone_id`) REFERENCES `dbagevir`.`phones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `dbagevir`.`companies` DROP FOREIGN KEY `companies_ibfk_1`;
ALTER TABLE `dbagevir`.`companies` DROP FOREIGN KEY `companies_ibfk_2`;
ALTER TABLE `dbagevir`.`companies` DROP FOREIGN KEY `companies_ibfk_3`;
ALTER TABLE `dbagevir`.`companies` ADD CONSTRAINT `fk_companies_address`
  FOREIGN KEY (`adresse_id`) REFERENCES `dbagevir`.`adresses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `dbagevir`.`companies` ADD CONSTRAINT `fk_companies_telephone`
  FOREIGN KEY (`telephone_id`) REFERENCES `dbagevir`.`phones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `dbagevir`.`companies` ADD CONSTRAINT `fk_companies_cellphone`
  FOREIGN KEY (`cellphone_id`) REFERENCES `dbagevir`.`phones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;