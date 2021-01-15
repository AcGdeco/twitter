﻿CREATE TABLE twitter.usuarios (
  id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  nome VARCHAR(255) DEFAULT NULL,
  email VARCHAR(50) DEFAULT NULL,
  senha VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 3,
AVG_ROW_LENGTH = 8192,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_general_ci;