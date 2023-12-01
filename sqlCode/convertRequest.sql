DELIMITER //
CREATE PROCEDURE convertRequest(
    inRequestID INT
)

BEGIN
    DECLARE inSpeciesName VARCHAR(64);
    DECLARE requestClientID INT;
    DECLARE outSpecimenID INT;

    SET inSpeciesName = SELECT speciesName FROM requests
        WHERE request.requestID = inRequestID;
        
    
    SET requestClientID = SELECT clientID FROM requests
        WHERE request.requestID = inRequestID;
    

    SET outSpecimenID = EXEC getFirstSpecimen inSpeciesName;

    EXEC addTransaction new_clientID = requestClientID, newSpecimenID = outSpecimenID, new_dateOut = NULL 
END;

//

DELIMITER ;

GRANT EXECUTE ON PROCEDURE bugs.convertRequest TO 'webuser'@'localhost';