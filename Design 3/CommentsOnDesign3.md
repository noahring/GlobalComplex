# Comments on ER Diagram
- Remember to prefix all the field names with the table name. Instead of "City", use "ClientCity".
- You may want to break the Kingdom, Phylum, ..., Family, Genus, Species information into a separate table, so that you can represent the higherarchy. Currently, you can have mismatches, because the fields are not validated.
- You may want allow a request for multiple specimines at a time. Supporting this will require some revision to your table structures.