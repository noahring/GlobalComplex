DELIMITER //

CREATE PROCEDURE addSpecimen(
    new_specimenID INT,
    new_speciesName VARCHAR(64),
    new_isAlive BOOLEAN,
    new_photograph VARCHAR(64)
)

BEGIN

    INSERT INTO specimens (specimenID, speciesName, isAlive, photograph)
         VALUES (new_specimenID, new_speciesName, new_isAlive, new_photograph);

END;

//

DELIMITER ;

GRANT EXECUTE ON PROCEDURE bugs.addSpecimen TO 'webuser'@'localhost';