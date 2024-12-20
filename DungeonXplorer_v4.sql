CREATE TABLE `Class` (
  `cl_id` INT PRIMARY KEY AUTO_INCREMENT,
  `cl_name` VARCHAR(50) NOT NULL,
  `cl_base_pv` INT NOT NULL,
  `cl_base_mana` INT NOT NULL,
  `cl_strength` INT NOT NULL,
  `cl_initiative` INT NOT NULL,
  `cl_max_items` INT NOT NULL
);

CREATE TABLE `Items` (
  `it_id` INT PRIMARY KEY AUTO_INCREMENT,
  `it_name` VARCHAR(50) NOT NULL,
  `it_description` TEXT,
  `it_weight` INT NOT NULL DEFAULT 1,
  `it_maxstack` INT NOT NULL DEFAULT 1,
  `it_handitem` BOOLEAN NOT NULL DEFAULT 0,
  `it_armor` BOOLEAN NOT NULL DEFAULT 0,
  `it_effectname` varchar(30),
  `it_effectvalue` int,
  `it_manacost` int,
  `it_protectvalue` int,
  `it_damage` int
);

CREATE TABLE `ItemsClass` (
  `it_id` INT,
  `cl_id` INT
);

CREATE TABLE `Loot` (
  `lo_id` INT,
  `it_id` INT,
  `lo_effet` varchar(30),
  `lo_piece` BOOLEAN,
  `lo_quantity` INT NOT NULL
);

CREATE TABLE `Monster` (
  `mo_id` INT PRIMARY KEY AUTO_INCREMENT,
  `mo_name` VARCHAR(50) NOT NULL,
  `mo_pv` INT NOT NULL,
  `mo_mana` INT,
  `mo_initiative` INT NOT NULL,
  `mo_strength` INT NOT NULL,
  `mo_attack` TEXT,
  `ce_id` INT NOT NULL,
  `mo_xp` INT NOT NULL
);

CREATE TABLE `Hero` (
  `he_id` INT PRIMARY KEY AUTO_INCREMENT,
  `he_name` VARCHAR(50) NOT NULL,
  `cl_id` INT,
  `he_image` VARCHAR(255),
  `he_biography` TEXT,
  `he_pv` INT NOT NULL,
  `he_mana` INT NOT NULL,
  `he_strength` INT NOT NULL,
  `he_initiative` INT NOT NULL,
  `he_armor` VARCHAR(50),
  `he_primary_weapon` VARCHAR(50),
  `he_secondary_weapon` VARCHAR(50),
  `he_shield` VARCHAR(50),
  `he_spell_list` TEXT,
  `he_xp` INT NOT NULL,
  `he_current_level` INT DEFAULT 1,
  `ch_id` INT NOT NULL DEFAULT 1
);

CREATE TABLE `Level` (
  `le_id` INT PRIMARY KEY AUTO_INCREMENT,
  `cl_id` INT,
  `le_level` INT NOT NULL,
  `le_required_xp` INT NOT NULL,
  `le_pv_bonus` INT NOT NULL,
  `le_mana_bonus` INT NOT NULL,
  `le_strength_bonus` INT NOT NULL,
  `le_initiative_bonus` INT NOT NULL
);

CREATE TABLE `Chapter` (
  `ch_id` INT PRIMARY KEY AUTO_INCREMENT,
  `ch_content` TEXT NOT NULL,
  `ch_image` VARCHAR(255),
  `lo_id` int NOT NULL,
  `ce_id` int NOT NULL
);

CREATE TABLE `Inventory` (
  `he_id` INT,
  `it_id` INT,
  `quantity` INT DEFAULT 1
);

CREATE TABLE `Links` (
  `li_id` INT PRIMARY KEY AUTO_INCREMENT,
  `ch_id` INT,
  `li_next_chapter_id` INT
);

CREATE TABLE `User` (
  `us_id` INT PRIMARY KEY AUTO_INCREMENT,
  `us_username` varchar(255) NOT NULL,
  `us_password` varchar(255) NOT NULL,
  `he_id` INT NOT NULL
);

CREATE TABLE `Administrateur` (
  `us_id` INT
);

CREATE TABLE `ChapterEvent` (
  `ce_id` INT PRIMARY KEY AUTO_INCREMENT,
  `ce_image` varchar(255),
  `lo_id` INT NOT NULL
);

CREATE TABLE `MCQTest` (
  `ce_id` INT NOT NULL,
  `mcqt_question` varchar(255) NOT NULL
);

CREATE TABLE `MCQAnwser` (
  `ce_id` INT NOT NULL,
  `mcqt_awnser` varchar(255) NOT NULL
);

CREATE TABLE `Spell` (
  `sp_id` INT PRIMARY KEY AUTO_INCREMENT,
  `sp_name` varchar(30) NOT NULL,
  `sp_manacost` INT NOT NULL,
  `sp_damage` INT NOT NULL
);

CREATE TABLE `HeroSpell` (
  `he_id` INT NOT NULL,
  `sp_id` INT NOT NULL
);

ALTER TABLE `User` ADD FOREIGN KEY (`he_id`) REFERENCES `Hero` (`he_id`);

ALTER TABLE `HeroSpell` ADD FOREIGN KEY (`he_id`) REFERENCES `Hero` (`he_id`);

ALTER TABLE `HeroSpell` ADD FOREIGN KEY (`sp_id`) REFERENCES `Spell` (`sp_id`);

ALTER TABLE `ItemsClass` ADD FOREIGN KEY (`cl_id`) REFERENCES `Class` (`cl_id`);

ALTER TABLE `ItemsClass` ADD FOREIGN KEY (`it_id`) REFERENCES `Items` (`it_id`);

ALTER TABLE `MCQTest` ADD FOREIGN KEY (`ce_id`) REFERENCES `MCQAnwser` (`ce_id`);

ALTER TABLE `Monster` ADD FOREIGN KEY (`ce_id`) REFERENCES `ChapterEvent` (`ce_id`);

ALTER TABLE `ChapterEvent` ADD FOREIGN KEY (`ce_id`) REFERENCES `MCQTest` (`ce_id`);

ALTER TABLE `Administrateur` ADD FOREIGN KEY (`us_id`) REFERENCES `User` (`us_id`);

ALTER TABLE `Loot` ADD FOREIGN KEY (`it_id`) REFERENCES `Items` (`it_id`);

ALTER TABLE `Hero` ADD FOREIGN KEY (`cl_id`) REFERENCES `Class` (`cl_id`);

ALTER TABLE `Level` ADD FOREIGN KEY (`cl_id`) REFERENCES `Class` (`cl_id`);

ALTER TABLE `Inventory` ADD FOREIGN KEY (`he_id`) REFERENCES `Hero` (`he_id`);

ALTER TABLE `Inventory` ADD FOREIGN KEY (`it_id`) REFERENCES `Items` (`it_id`);

ALTER TABLE `Links` ADD FOREIGN KEY (`ch_id`) REFERENCES `Chapter` (`ch_id`);

ALTER TABLE `Links` ADD FOREIGN KEY (`li_next_chapter_id`) REFERENCES `Chapter` (`ch_id`);

ALTER TABLE `Hero` ADD FOREIGN KEY (`ch_id`) REFERENCES `Chapter` (`ch_id`);

ALTER TABLE `Chapter` ADD FOREIGN KEY (`ce_id`) REFERENCES `ChapterEvent` (`ce_id`);
