/* FUNCTIONS AND TRIGGERS */
/*  Source: 	Components.sql
 *	Author:		Benjamin A Garza III
 *	Date:		April 6, 2019
 *	Class:		CMPS 3420 - Databases
 *	Purpose: 	Create functions, triggers, etc.
 *
 * 	Run: 
 *  	psql -f Components.sql  dionysusbrewingco dionysus
 */


/***********************  FUNCTIONS  ************************/

/*  A stored procedure for inserting a new record into       *
 *  one of your tables. The field values are passed to the   *
 *  procedure through the input parameters.                  */
CREATE OR REPLACE FUNCTION InsertBeer (varchar(40), float, varchar(8), float, float, integer) 
    RETURNS VOID AS
    $$	BEGIN
        INSERT INTO Beer (BeerName,AlcoholPercent, BeerType, BeerPrice, BeerAmount, ServingSize) 
        VALUES ($1, $2, $3, $4, $5, $6);
    END;
    $$    LANGUAGE plpgsql;


/*  A stored procedure for deleting a existing record       *
 *	based on the primary key of your selected table.        */
CREATE OR REPLACE FUNCTION DeleteBeer (n integer) 
    RETURNS VOID AS
    $$	BEGIN
        DELETE FROM Beer WHERE BeerID = n;
        RETURN;
    END;
    $$    LANGUAGE plpgsql;


/*  A stored function which returns average of a numerical   *
 *  fields of highest or lowest N records where N is the     *
 *  parameter for the function.                              */


CREATE OR REPLACE FUNCTION LowAverageBeerPrice (n integer) 
    RETURNS TABLE (B float) AS
    $$ 
    BEGIN
        RETURN QUERY SELECT avg(B.BeerPrice) 
        FROM (
            SELECT BeerPrice FROM Beer
            ORDER BY BeerPrice ASC
            LIMIT n
        ) AS B;
    END;
    $$    LANGUAGE 'plpgsql';


CREATE OR REPLACE FUNCTION HighAverageBeerPrice (n integer) 
    RETURNS TABLE (B float) AS
    $$ 
    BEGIN
        RETURN QUERY SELECT avg(B.BeerPrice) 
        FROM (
            SELECT BeerPrice FROM Beer
            ORDER BY BeerPrice ASC
            LIMIT n
        ) AS B;
    END;
    $$    LANGUAGE 'plpgsql'; 




/***********************  TRIGGERS  ************************/


/*  Define a "before update DID trigger on department table to  *
 *  update DID in employee table to new DID to.                 */
CREATE TRIGGER AutoUpdateDID 
BEFORE UPDATE OF DID ON department
BEGIN
    UPDATE Employee E
    SET E.DID = :new.DID
    WHERE E.DID = :old.DID;
END;
           
/*  Create a delete trigger for cascaded deletion also. Make sure you    *
 *  backup your data.                                                    */
CREATE TRIGGER AutoUpdateDID 
BEFORE UPDATE OF DID ON department
BEGIN
    UPDATE Employee E
    SET E.DID = :new.DID
    WHERE E.DID = :old.DID;
END;

/*  Create a view involved two to three tables, and define a "INSTEAD OF"    *
 *  trigger so that when you update the view, the update will be perform by  *
 *  trigger, and the updates will be performed on base table.                */
