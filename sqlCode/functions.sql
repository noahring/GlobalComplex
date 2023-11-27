DROP FUNCTION IF EXISTS getFirstSpecimen;
CREATE FUNCTION getFirstSpecimen(VARCHAR)
    RETURNS INT
    RETURN (
        SELECT specimenID FROM specimens
         WHERE specimen.speciesName = climbId
    );