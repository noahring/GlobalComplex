DROP DATABASE IF EXISTS bugs;
CREATE DATABASE bugs;
USE bugs;

CREATE TABLE species (
    orderName VARCHAR(64),
    familyName VARCHAR(64),
    genusName VARCHAR(64),
    speciesName VARCHAR(64) PRIMARY KEY
);
CREATE TABLE specimens (
    speciesName VARCHAR(64) FOREIGN KEY,
    specimenId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    isAlive BOOLEAN,
);