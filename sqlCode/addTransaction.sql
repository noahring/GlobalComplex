DELIMITER //

CREATE PROCEDURE addTransaction(
    new_clientID    INT,
    new_specimenID  INT,
    new_dateOut DATE
)

BEGIN

    INSERT INTO transactions (clientID, specimenID, dateOut)
         VALUES (new_clientID, new_specimenID, new_dateOut);

END;

//

DELIMITER ;

GRANT EXECUTE ON PROCEDURE bugs.addTransaction TO 'webuser'@'localhost';