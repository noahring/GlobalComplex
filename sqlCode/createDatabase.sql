DROP DATABASE IF EXISTS bugs;
CREATE DATABASE bugs;
USE bugs;

CREATE TABLE species (
    orderName    VARCHAR(64),
    familyName   VARCHAR(64),
    genusName    VARCHAR(64),
    speciesName  VARCHAR(64) PRIMARY KEY
);

INSERT INTO species VALUES (
    ('Coleoptera', 'Carabidae', 'Cicindela', 'Cicindela sexguttata'),
    ('Coleoptera', 'Carabidae', 'Cicindela', 'Cicindela repanda'),
    ('Coleoptera', 'Carabidae', 'Cicindela', 'Cicindela punctulata'),
    ('Coleoptera', 'Carabidae', 'Cicindela', 'Cicindela hirticollis'),
    ('Coleoptera', 'Carabidae', 'Cicindela', 'Cicindela puritana'),
    ('Coleoptera', 'Carabidae', 'Cicindela', 'Cicindela scutellaris'),
    ('Coleoptera', 'Carabidae', 'Cicindela', 'Cicindela repanda'),
    ('Coleoptera', 'Carabidae', 'Cicindela', 'Cicindela repanda'),
    ('Coleoptera', 'Carabidae', 'Cicindela', 'Cicindela repanda'),
    ('Coleoptera', 'Carabidae', 'Cicindela', 'Cicindela repanda'),
    ('Coleoptera', 'Carabidae', 'Cicindela', 'Cicindela repanda'),
    ('Coleoptera', 'Carabidae', 'Cicindela', 'Cicindela repanda'),
    ('Coleoptera', 'Carabidae', 'Cicindela', 'Cicindela repanda'),
    ('Coleoptera', 'Carabidae', 'Cicindela', 'Cicindela repanda'),
    ('Coleoptera', 'Carabidae', 'Cicindela', 'Cicindela repanda');
);

CREATE TABLE specimens (
    speciesName VARCHAR(64) FOREIGN KEY,
    specimenId  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    isAlive     BOOLEAN,
    photograph  VARCHAR(64)
);

INSERT INTO specimens VALUES (
    ('Cincidela sexguttata', '1', '1', '1'),
    ('Cincidela repanda', '2', '1', '1'),
    ('Cincidela punctulata', '3', '1', '1'),
    ('Cincidela puritana', '4', '1', '1'),
    ('Cincidela repanda', '5', '1', '1'),
    ('Cincidela repanda', '6', '1', '1'),
    ('Cincidela repanda', '7', '1', '1');
);

CREATE TABLE clients (
    clientAddress    VARCHAR(64),
    clientAreaCode   VARCHAR(64),
    clientCity       VARCHAR(64),
    clientCountry    VARCHAR(64),
    clientEmail      VARCHAR(64),
    clientID         INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    clientPhone      VARCHAR(15),
    clientProfession VARCHAR(64),
    clientState      VARCHAR(64)
);

INSERT INTO clients VALUES (
    ('1234 Main St.', '12345', 'Anytown', 'USA', 'johnd.doe@gmail.com', '1', '123-456-7890', 'Entomologist', 'AnyState'),
    ('1234 Main St.', '12345', 'Anytown', 'USA', 'johnd.doe@gmail.com', '1', '123-456-7890', 'Entomologist', 'AnyState'),
    ('1234 Main St.', '12345', 'Anytown', 'USA', 'johnd.doe@gmail.com', '1', '123-456-7890', 'Entomologist', 'AnyState'),
    ('1234 Main St.', '12345', 'Anytown', 'USA', 'johnd.doe@gmail.com', '1', '123-456-7890', 'Entomologist', 'AnyState'),
    ('1234 Main St.', '12345', 'Anytown', 'USA', 'johnd.doe@gmail.com', '1', '123-456-7890', 'Entomologist', 'AnyState'),
    ('1234 Main St.', '12345', 'Anytown', 'USA', 'johnd.doe@gmail.com', '1', '123-456-7890', 'Entomologist', 'AnyState'),
    ('1234 Main St.', '12345', 'Anytown', 'USA', 'johnd.doe@gmail.com', '1', '123-456-7890', 'Entomologist', 'AnyState');
);

CREATE TABLE requests (
    clientID     INT FOREIGN KEY,
    specimenID   INT FOREIGN KEY,
    requestDate  DATE,
    dateOut      DATE,
    dateIn       DATE,
    requestID    INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
);

INSERT INTO requests VALUES (
    ('1', '1', '2018-01-01', '2018-01-01', '2018-01-01', '1'),
    ('1', '1', '2018-01-01', '2018-01-01', '2018-01-01', '1'),
    ('1', '1', '2018-01-01', '2018-01-01', '2018-01-01', '1'),
    ('1', '1', '2018-01-01', '2018-01-01', '2018-01-01', '1'),
    ('1', '1', '2018-01-01', '2018-01-01', '2018-01-01', '1'),
    ('1', '1', '2018-01-01', '2018-01-01', '2018-01-01', '1'),
    ('1', '1', '2018-01-01', '2018-01-01', '2018-01-01', '1');
);
