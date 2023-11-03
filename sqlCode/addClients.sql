DELIMITER //

CREATE PROCEDURE addClient(
    new_clientAddress    VARCHAR(64),
    new_clientAreaCode   VARCHAR(64),
    new_clientCity       VARCHAR(64),
    new_clientCountry    VARCHAR(64),
    new_clientEmail      VARCHAR(64),
    new_clientPhone      VARCHAR(15),
    new_clientProfession VARCHAR(64),
    new_clientState      VARCHAR(64)
)

BEGIN;

    DECLARE new_clientID INT;

    INSERT INTO clients (clientAddress, clientAreaCode, clientCity, clientCountry, clientEmail, clientPhone, clientProfession, clientState)
         VALUES (new_clientAddress, new_clientAreaCode, new_clientCity, new_clientCountry, new_clientEmail, new_clientPhone, new_clientProfession, new_clientState);

END;

//

DELIMITER ;