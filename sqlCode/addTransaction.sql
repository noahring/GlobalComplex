DELIMITER //

CREATE PROCEDURE addTransaction(
    new_clientID    INT,
    new_specimenID  INT,
    new_DateOut DATE
)

BEGIN;

    DECLARE new_transactionID INT;

    INSERT INTO transactions (clientID, specimenID, dateOut)
         VALUES (new_clientID, new_specimenID, new_DateOut);

END;

//

DELIMITER ;