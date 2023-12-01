DROP DATABASE IF EXISTS bugs;
CREATE DATABASE bugs;
USE bugs;

CREATE TABLE species (
    orderName    VARCHAR(64),
    familyName   VARCHAR(64),
    genusName    VARCHAR(64),
    speciesName  VARCHAR(64) PRIMARY KEY
);




CREATE TABLE specimens (
    specimenId  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    speciesName VARCHAR(64),
    isAlive     BOOLEAN,
    photograph  VARCHAR(64),
    FOREIGN KEY (speciesName) REFERENCES species(speciesName)
);



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


    


CREATE TABLE requests (
    requestID    INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    clientID     INT,
    speciesName  VARCHAR(64),
    requestDate  DATE,
    FOREIGN KEY (clientID) REFERENCES clients(clientID),
    FOREIGN KEY (speciesName) REFERENCES species(speciesName)
);



CREATE TABLE transactions (
    transactionID    INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    clientID     INT,
    specimenID  INT,
    dateOut  DATE,
    FOREIGN KEY (clientID) REFERENCES clients(clientID),
    FOREIGN KEY (specimenID) REFERENCES specimens(specimenID)
);

INSERT INTO species (orderName, familyName, genusName, speciesName)
VALUES  ('Coleoptera', 'Carabidae', 'Cicindela', 'Cicindela sexguttata'),
        ('Coleoptera', 'Carabidae', 'Cicindela', 'Cicindela repanda'),
        ('Coleoptera', 'Carabidae', 'Cicindela', 'Cicindela punctulata'),
        ('Coleoptera', 'Carabidae', 'Cicindela', 'Cicindela hirticollis'),
        ('Coleoptera', 'Carabidae', 'Cicindela', 'Cicindela puritana'),
        ('Coleoptera', 'Carabidae', 'Cicindela', 'Cicindela scutellaris');

INSERT INTO specimens (speciesName, isAlive, photograph) VALUES 
    ('Cicindela sexguttata', 1, 'photo'),
    ('Cicindela repanda', 1, 'photo'),
    ('Cicindela punctulata', 1, 'photo'),
    ('Cicindela hirticollis', 1, 'photo'),
    ('Cicindela puritana', 1, 'photo');

INSERT INTO clients (clientFirstName, clientLastName,clientAddress,
clientCity, clientAreaCode, clientState, clientCountry, clientEmail, clientPhone, clientProfession) VALUES 
    ('John', 'Doe', '1234 Main St', 'Anytown', '12345', 'CA', 'USA', 'jdoe@gmail.com', '123-456-7890', 'Entomologist'),
    ('Jane', 'Doe', '1234 Main St', 'Anytown', '12345', 'CA', 'USA', 'jdoe@gmail.com', '123-456-7890', 'Entomologist'),
    ('John', 'Doe', '1234 Main St', 'Anytown', '12345', 'CA', 'USA', 'jdoe@gmail.com', '123-456-7890', 'Entomologist'),
    ('Jane', 'Doe', '1234 Main St', 'Anytown', '12345', 'CA', 'USA', 'jdoe@gmail.com', '123-456-7890', 'Entomologist'),
    ('John', 'Doe', '1234 Main St', 'Anytown', '12345', 'CA', 'USA', 'jdoe@gmail.com', '123-456-7890', 'Entomologist'),
    ('Jane', 'Doe', '1234 Main St', 'Anytown', '12345', 'CA', 'USA', 'jdoe@gmail.com', '123-456-7890', 'Entomologist');

 INSERT INTO requests (clientID, speciesName, requestDate) VALUES
     ('1', 'Cicindela sexguttata', '2017-01-01'),
     ('2', 'Cicindela repanda', '2017-01-01'),
     ('3', 'Cicindela punctulata', '2017-01-01'),
     ('4', 'Cicindela hirticollis', '2017-01-01'),
     ('5', 'Cicindela puritana', '2017-01-01');

SOURCE addClients.sql
SOURCE addRequest.sql
SOURCE addSpecimen.sql
SOURCE addTransaction.sql
SOURCE convertRequest.sql
SOURCE deleteClient.sql
SOURCE deleteRequest.sql
SOURCE deleteSpecimen.sql
SOURCE functions.sql 
SOURCE updateClients.sql