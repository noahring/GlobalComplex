DELIMITER //

CREATE PROCEDURE deleteClient(
    new_clientID INT
)

BEGIN; 

    DELETE FROM clients
        WHERE clientID = new_clientID;

END;