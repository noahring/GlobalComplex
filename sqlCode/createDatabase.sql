DROP DATABASE IF EXISTS bugs;
CREATE DATABASE bugs;
USE bugs;

CREATE TABLE species (
    orderName    VARCHAR(64),
    familyName   VARCHAR(64),
    genusName    VARCHAR(64),
    speciesName  VARCHAR(64) PRIMARY KEY
);

INSERT INTO species (orderName, familyName, genusName, speciesName)
VALUES  ('Coleoptera', 'Carabidae', 'Cicindela', 'Cicindela sexguttata'),
        ('Coleoptera', 'Carabidae', 'Cicindela', 'Cicindela repanda'),
        ('Coleoptera', 'Carabidae', 'Cicindela', 'Cicindela punctulata'),
        ('Coleoptera', 'Carabidae', 'Cicindela', 'Cicindela hirticollis'),
        ('Coleoptera', 'Carabidae', 'Cicindela', 'Cicindela puritana'),
        ('Coleoptera', 'Carabidae', 'Cicindela', 'Cicindela scutellaris');


CREATE TABLE specimens (
    specimenId  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    speciesName VARCHAR(64),
    isAlive     BOOLEAN,
    photograph  VARCHAR(64),
    FOREIGN KEY (speciesName) REFERENCES species(speciesName)
);

INSERT INTO specimens (specimenID, speciesName, isAlive, photograph) VALUES 
    ('1', 'Cicindela sexguttata', 1, 'photo'),
    ('2', 'Cicindela repanda', 1, 'photo'),
    ('3', 'Cicindela punctulata', 1, 'photo'),
    ('4', 'Cicindela hirticollis', 1, 'photo'),
    ('5', 'Cicindela puritana', 1, 'photo');

CREATE TABLE clients (
    clientID         INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    clientFirstName  VARCHAR(64),
    clientLastName   VARCHAR(64),
    clientAddress    VARCHAR(64),
    clientCity       VARCHAR(64),
    clientAreaCode   VARCHAR(64),
    clientState      VARCHAR(64),
    clientCountry    VARCHAR(64),
    clientEmail      VARCHAR(64),
    clientPhone      VARCHAR(15),
    clientProfession VARCHAR(64)
);

INSERT INTO clients (clientID, clientFirstName, clientLastName,clientAddress,
clientCity, clientAreaCode, clientState, clientCountry, clientEmail, clientPhone, clientProfession) VALUES 
    ('1', 'John', 'Doe', '1234 Main St', 'Anytown', '12345', 'CA', 'USA', 'jdoe@gmail.com', '123-456-7890', 'Entomologist'),
    ('2', 'Jane', 'Doe', '1234 Main St', 'Anytown', '12345', 'CA', 'USA', 'jdoe@gmail.com', '123-456-7890', 'Entomologist'),
    ('3', 'John', 'Doe', '1234 Main St', 'Anytown', '12345', 'CA', 'USA', 'jdoe@gmail.com', '123-456-7890', 'Entomologist'),
    ('4', 'Jane', 'Doe', '1234 Main St', 'Anytown', '12345', 'CA', 'USA', 'jdoe@gmail.com', '123-456-7890', 'Entomologist'),
    ('5', 'John', 'Doe', '1234 Main St', 'Anytown', '12345', 'CA', 'USA', 'jdoe@gmail.com', '123-456-7890', 'Entomologist'),
    ('6', 'Jane', 'Doe', '1234 Main St', 'Anytown', '12345', 'CA', 'USA', 'jdoe@gmail.com', '123-456-7890', 'Entomologist');
    


CREATE TABLE requests (
    requestID    INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    clientID     INT,
    specimenID   INT,
    requestDate  DATE,
    dateOut      DATE,
    dateIn       DATE,
    FOREIGN KEY (clientID) REFERENCES clients(clientID),
    FOREIGN KEY (specimenID) REFERENCES specimens(specimenID)
);

INSERT INTO requests (requestID, clientID, specimenID, requestDate, dateOut, dateIn) VALUES 
    ('1', '1', '1', '2017-01-01', '2017-01-01', '2017-01-01'),
    ('2', '2', '2', '2017-01-01', '2017-01-01', '2017-01-01'),
    ('3', '3', '3', '2017-01-01', '2017-01-01', '2017-01-01'),
    ('4', '4', '4', '2017-01-01', '2017-01-01', '2017-01-01'),
    ('5', '5', '5', '2017-01-01', '2017-01-01', '2017-01-01');

