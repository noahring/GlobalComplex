DELIMITER //

CREATE PROCEDURE addRequest(
    new_clientID    INT,
    new_specimenID  INT,
    new_requestDate DATE,
    new_dateOut     DATE,
    new_dateIn      DATE
)

BEGIN;

    DECLARE new_requestID INT;

    INSERT INTO requests (clientID, specimenID, requestDate, dateOut, dateIn)
         VALUES (new_clientID, new_specimenID, new_requestDate, new_dateOut, new_dateIn);

END;

//

DELIMITER ;