DELIMITER //

CREATE PROCEDURE deleteRequest(
    new_requestID INT
)

BEGIN

    DELETE FROM requests
        WHERE requestID = new_requestID;

END;

//

DELIMITER ;

GRANT EXECUTE ON PROCEDURE bugs.deleteRequest TO 'webuser'@'localhost';