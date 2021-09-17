CREATE DATABASE stemmetellerdb;

USE stemmetellerdb;

CREATE TABLE partier (
    parti_id int AUTO_INCREMENT,
    parti VARCHAR(255) NOT NULL,
    partikode Varchar(10) NOT NULL,
    stemmer int(255) default 0,
    PRIMARY KEY (parti_id)
);