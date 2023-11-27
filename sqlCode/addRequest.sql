DELIMITER //

CREATE PROCEDURE addRequest(
    new_clientID    INT,
    new_speciesName  INT,
    new_requestDate DATE
)

BEGIN;

    DECLARE new_requestID INT;

    INSERT INTO requests (clientID, speciesName, requestDate)
         VALUES (new_clientID, new_speciesName, new_requestDate);

END;

//

DELIMITER ;