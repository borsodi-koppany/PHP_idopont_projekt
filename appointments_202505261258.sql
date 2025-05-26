CREATE DATABASE idopont_php
	CHARACTER SET utf8mb4
	COLLATE utf8mb4_general_ci;

	--
-- Set character set the client will use to send SQL statements to the server
--
SET NAMES 'utf8';

--
-- Set default database
--
USE idopont_php;

--
-- Create table `appointments`
--
CREATE TABLE appointments (
  id INT(11) NOT NULL AUTO_INCREMENT,
  email VARCHAR(50) DEFAULT NULL,
  date DATETIME DEFAULT NULL,
  time VARCHAR(255) DEFAULT NULL,
  type VARCHAR(255) DEFAULT NULL,
  isApproved BOOLEAN DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_general_ci,
ROW_FORMAT = DYNAMIC;