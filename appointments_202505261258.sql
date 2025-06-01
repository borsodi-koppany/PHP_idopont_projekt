DROP DATABASE IF EXISTS idopont_php;
  
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

CREATE TABLE idopont_php.users (
  email varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  isAdmin boolean DEFAULT FALSE,
  PRIMARY KEY (email)
)

ENGINE = INNODB,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_general_ci,
ROW_FORMAT = DYNAMIC;

--
-- Create table `appointments`
--
CREATE TABLE appointments (
  id INT(11) NOT NULL AUTO_INCREMENT,
  email VARCHAR(255) NOT NULL,
  date DATETIME DEFAULT NULL,
  time VARCHAR(255) DEFAULT NULL,
  type VARCHAR(255) DEFAULT NULL,
  isApproved BOOLEAN DEFAULT FALSE,
  PRIMARY KEY (id),
  CONSTRAINT fk_user_email FOREIGN KEY (email) REFERENCES users(email) ON DELETE CASCADE ON UPDATE CASCADE
)

INSERT INTO users (email, password, isAdmin) VALUES ('admin@a.a', 'blanky', 1)



ENGINE = INNODB,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_general_ci,
ROW_FORMAT = DYNAMIC;