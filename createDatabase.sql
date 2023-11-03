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
CREATE TABLE specimens (
    speciesName VARCHAR(64) FOREIGN KEY,
    specimenId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    isAlive BOOLEAN,
    photograph VARCHAR(64)
);
CREATE TABLE clients (
    clientAddress VARCHAR(64),
    clientAreaCode VARCHAR(64),
    clientCity VARCHAR(64),
    clientCountry VARCHAR(64),
    clientEmail VARCHAR(64),
    clientID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    clientPhone VARCHAR(15),
    clientProfession VARCHAR(64),
    clientState VARCHAR(64)
)

CREATE TABLE requests (
    clientID INT FOREIGN KEY,
    specimenID INT FOREIGN KEY,
    requestDate DATE,
    dateOut DATE,
    dateIn Date,
    requestID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
)