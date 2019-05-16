/* FUNCTIONS */
/*  Source: 	CreateInsertFunctions.sql
 *	Author:		Benjamin A Garza III
 *	Date:		April 6, 2019
 *	Class:		CMPS 3420 - Databases
 *	Purpose: 	Create functions to insert 
 *
 * 	Run: 
 *  	psql -f CreateInsertFunctions.sql  dionysusbrewingco dionysus
 */


/*
// Insert into Addresses 
CREATE OR REPLACE FUNCTION InsertAddress (varchar(30), varchar(20), char(2), integer) 
    RETURNS INTEGER AS $$	
    BEGIN
        RETURN INSERT INTO Addresses (street, city, state, zip) VALUES ($1, $2, $3, $4) RETURNING AddressID;
    END;
$$ LANGUAGE plpgsql;



// Insert into Brewery 
CREATE OR REPLACE FUNCTION InsertBrewery (varchar(30), integer) 
    RETURNS INTEGER AS $$	
    BEGIN
        RETURN INSERT INTO Brewery (BreweryName, AddressID) VALUES ($1, $2) RETURNING BreweryID;
    END;
$$ LANGUAGE plpgsql;


// Insert into Employee 
CREATE OR REPLACE FUNCTION InsertEmployee (char(9), varchar(20), varchar(20) varchar(20), date, varchar(30), integer, integer) 
    RETURNS INTEGER AS $$	
    BEGIN
        RETURN INSERT INTO Employee (SSN, FirstName, MiddleName, LastName, Birthday, Position, AddressID, BreweryID)
        VALUES ($1, $2, $3, $4, $5, $6, $7, $8) RETURNING EmployeeID;
    END;
$$ LANGUAGE plpgsql;


// Insert into Supplier 
CREATE OR REPLACE FUNCTION InsertSupplier (varchar(32), integer) 
    RETURNS INTEGER AS $$	
    BEGIN
        RETURN INSERT INTO Supplier (SupplierName, AddressID) VALUES ($1, $2) RETURNING SupplierID;
    END;
$$ LANGUAGE plpgsql;

// Insert into Order 
CREATE OR REPLACE FUNCTION InsertOrder (date, integer, integer) 
    RETURNS INTEGER AS $$	
    BEGIN
        RETURN INSERT INTO Order (SupplierID, EmployeeD) VALUES ($1, $2) RETURNING OrderID;
    END;
$$ LANGUAGE plpgsql;


// Insert into Ingredient 
CREATE OR REPLACE FUNCTION InsertIngredient (varchar(40), float, float) 
    RETURNS INTEGER AS $$	
    BEGIN
        RETURN INSERT INTO Ingredient (IngredientName, Amount, Cost) VALUES ($1, $2, $3) RETURNING IngredientID;
    END;
$$ LANGUAGE plpgsql;


// Insert into Item 
CREATE OR REPLACE FUNCTION InsertItem (integer, float, integer, integer) 
    RETURNS INTEGER AS $$	
    BEGIN
        RETURN INSERT INTO Item (Quantity, ItemAmount, IngredientID, OrderID)
        VALUES ($1, $2, $3, $4) RETURNING ItemID;
    END;
$$ LANGUAGE plpgsql;


// Insert into Beer 
CREATE OR REPLACE FUNCTION InsertBeer (varchar(40), float, varchar(8), float, float, integer) 
    RETURNS INTEGER AS $$	
    BEGIN
        RETURN INSERT INTO Beer (BeerName, BeerType, BeerAmount, ServingSize)
        VALUES ($1, $2, $3, $4, $5) RETURNING BeerID;
    END;
$$ LANGUAGE plpgsql;


// Insert into Recipe 
CREATE OR REPLACE FUNCTION InsertRecipe (integer, integer, float) 
    RETURNS VOID AS $$	
    BEGIN
        INSERT INTO Recipe VALUES ($1, $2, $3);
    END;
$$ LANGUAGE plpgsql;


// Insert into Yield 
CREATE OR REPLACE FUNCTION InsertYield (date, float, integer, integer) 
    RETURNS INTEGER AS $$	
    BEGIN
        RETURN INSERT INTO Yield VALUES ($1, $2, $3, $4) RETURNING YieldID;
    END;
$$ LANGUAGE plpgsql;

// Insert into Keg 
CREATE OR REPLACE FUNCTION InsertKeg (date, varchar(8), float, integer, integer) 
    RETURNS INTEGER AS $$	
    BEGIN
        RETURN INSERT INTO Keg VALUES ($1, $2, $3, $4, $5) RETURNING KegID;
    END;
$$ LANGUAGE plpgsql;

// Insert into Customer 
CREATE OR REPLACE FUNCTION InsertCustomer (varchar(56), char(10)) 
    RETURNS INTEGER AS $$	
    BEGIN
        RETURN INSERT INTO Customer VALUES ($1, $2) RETURNING CustomerID;
    END;
$$ LANGUAGE plpgsql;

// Insert into Sale 
CREATE OR REPLACE FUNCTION InsertSale (date, integer, integer) 
    RETURNS INTEGER AS $$	
    BEGIN
        RETURN INSERT INTO Sale VALUES ($1, $2, $3) RETURNING SaleID;
    END;
$$ LANGUAGE plpgsql;


// Insert into Product 
CREATE OR REPLACE FUNCTION InsertProduct (integer, integer, integer) 
    RETURNS INTEGER AS $$	
    BEGIN
        RETURN INSERT INTO Product VALUES ($1, $2, $3) RETURNING ProductID;
    END;
$$ LANGUAGE plpgsql;

*/