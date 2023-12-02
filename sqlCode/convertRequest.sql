DELIMITER //
CREATE PROCEDURE convertRequest(
    inRequestID INT
)

BEGIN
    DECLARE inSpeciesName VARCHAR(64);
    DECLARE requestClientID INT;
    DECLARE outSpecimenID INT;

    SET inSpeciesName = (SELECT speciesName FROM requests
        WHERE requests.requestID = inRequestID);
        
    
    SET requestClientID = (SELECT clientID FROM requests
        WHERE requests.requestID = inRequestID);
    

    SET outSpecimenID = getFirstSpecimen (inSpeciesName);

    CALL addTransaction (requestClientID, outSpecimenID, NULL);

    CALL deleteRequest(inRequestID);
END;

//

DELIMITER ;

GRANT EXECUTE ON PROCEDURE bugs.convertRequest TO 'webuser'@'localhost';