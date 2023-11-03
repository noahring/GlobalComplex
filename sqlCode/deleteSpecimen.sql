DELIMITER //

CREATE PROCEDURE deleteSpecimen(
    new_specimenID INT
)

BEGIN;

    DELETE FROM specimens
        WHERE specimenID = new_specimenID;

END;

//

DELIMITER ;