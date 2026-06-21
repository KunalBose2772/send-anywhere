CREATE DATABASE IF NOT EXISTS `sendanywhere_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `sendanywhere_db`;

CREATE TABLE IF NOT EXISTS `transfers` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `pin` VARCHAR(6) NOT NULL UNIQUE,
  `sender_offer` TEXT NOT NULL,
  `receiver_answer` TEXT DEFAULT NULL,
  `status` ENUM('waiting', 'ready', 'active', 'completed', 'expired') DEFAULT 'waiting',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  INDEX (`pin`),
  INDEX (`status`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `ice_candidates` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `transfer_id` INT NOT NULL,
  `sender` TINYINT NOT NULL, -- 1 if sender, 0 if receiver
  `candidate` TEXT NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`transfer_id`) REFERENCES `transfers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB;
