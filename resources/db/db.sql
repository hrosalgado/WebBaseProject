-- ----------------------------------------------------------------------------
-- DATABASE New
-- ----------------------------------------------------------------------------
DROP DATABASE IF EXISTS New;
CREATE DATABASE IF NOT EXISTS New DEFAULT CHARACTER SET latin1 COLLATE latin1_general_cs;
USE New;

-- ----------------------------------------------------------------------------
-- USER: new
-- PASSWORD: New@.18#
-- ----------------------------------------------------------------------------
DROP USER IF EXISTS 'new'@'localhost';
CREATE USER 'new'@'localhost' IDENTIFIED BY 'New@.18#';
GRANT ALL ON new.* TO 'new'@'localhost';
FLUSH PRIVILEGES;

-- ----------------------------------------------------------------------------
-- TABLE Users
-- ----------------------------------------------------------------------------
CREATE TABLE Users(
    ID INT NOT NULL,
    
    username VARCHAR(20) DEFAULT NULL,
    password VARCHAR(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- ----------------------------------------------------------------------------
-- INDEXES
-- ----------------------------------------------------------------------------
ALTER TABLE Users
    ADD PRIMARY KEY (ID);

-- ----------------------------------------------------------------------------
-- MODS
-- ----------------------------------------------------------------------------
ALTER TABLE Users
    MODIFY ID INT NOT NULL AUTO_INCREMENT;

-- ----------------------------------------------------------------------------
-- RESTRICTIONS
-- ----------------------------------------------------------------------------