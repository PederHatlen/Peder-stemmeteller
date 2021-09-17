CREATE DATABASE stemmetellerdb;

USE stemmetellerdb;

CREATE TABLE partier (
    parti_id INT AUTO_INCREMENT,
    parti VARCHAR(255) NOT NULL,
    partikode VARCHAR(10) NOT NULL,
    stemmer INT(255) DEFAULT 0,
    PRIMARY KEY (parti_id)
);