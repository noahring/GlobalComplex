
DROP FUNCTION IF EXISTS getFirstSpecimen;
CREATE FUNCTION getFirstSpecimen(desiredSpecies VARCHAR(64))
    RETURNS INT
    RETURN (
        SELECT specimenID 
          FROM specimens
         WHERE specimens.speciesName = desiredSpecies 
               AND specimens.specimenID NOT IN (SELECT specimenID FROM transactions)
         LIMIT 1
    );