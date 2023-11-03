DELIMITER //

CREATE PROCEDURE updateClient(
    new_clientID         INT,
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

    UPDATE clients
        SET clientAddress    = new_clientAddress,
            clientAreaCode   = new_clientAreaCode,
            clientCity       = new_clientCity,
            clientCountry    = new_clientCountry,
            clientEmail      = new_clientEmail,
            clientPhone      = new_clientPhone,
            clientProfession = new_clientProfession,
            clientState      = new_clientState
        WHERE clientID = new_clientID;

END;

//

DELIMITER ;