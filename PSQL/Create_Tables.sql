/*  Source: 	Create_Tables.sql
 *	Author:		Benjamin A Garza III
 *	Date:		April 6, 2019
 *	Class:		CMPS 3420 - Databases
 *	Purpose: 	Create all tables.
 *
 *  Run:
 *  	psql -f Create_Tables.sql dionysusbrewingco dionysus
 */

CREATE TABLE IF NOT EXISTS Addresses (
	AddressID 	serial primary key not null,
	street 		varchar(30) default '123 Main Street',
	city   		varchar(20) default 'Bakersfield',
	state  		char(2) default 'CA',
	zip    		integer default 93305,
	CHECK		(zip > 0),
	CHECK		(zip < 100000)
)
TABLESPACE DionysusData;

CREATE TABLE IF NOT EXISTS Brewery (
	BreweryID 		serial primary key not null,
	BreweryName 	varchar(30) default 'Dionysus Brewing, Co.' not null,
	AddressID  		integer references Addresses (AddressID) unique not null,
	Unique 			(BreweryName, AddressID)
) 
TABLESPACE DionysusData;

CREATE TABLE IF NOT EXISTS Employee (
	EmployeeID 		serial primary key not null,
	SSN 			integer UNIQUE not null,
	FirstName 		varchar(20) default 'John' not null,
	MiddleName		varchar(20) default null,
	LastName		varchar(20) default 'Doe' not null,
	Birthday 		date not null,
	Position 		varchar(30),
	AddressID 		integer references Addresses (AddressID) not null,
	BreweryID		integer references Brewery (BreweryID) not null,
	passwords		varchar (16) default 'secretpassword' not null,
	CHECK			(SSN > 0),
	CHECK 			(SSN < 1000000000),
	CHECK 			(EmployeeID > 0),
	CHECK			(Birthday < (current_date - integer '7665')),
	Unique 			(SSN, FirstName, MiddleName, LastName, Birthday, AddressID, Position, BreweryID)
)
TABLESPACE DionysusData;

CREATE TABLE IF NOT EXISTS Salary (
	EmployeeID		integer references Employee (EmployeeID) not null,
	StartDate 		date not null,
	SalaryAmount	float not null,
	CHECK 			(SalaryAmount > 0.00),
	CHECK			(EmployeeID > 0),
	UNIQUE			(EmployeeID, StartDate),
	Unique			(EmployeeID, StartDate, SalaryAmount)
) 
TABLESPACE DionysusData;

CREATE TABLE IF NOT EXISTS Supplier (
	SupplierID  	serial primary key not null,
	SupplierName 	varchar(32) not null,
	AddressID 		integer not null,
	UNIQUE			(SupplierName, AddressID)
) 
TABLESPACE DionysusData;

CREATE TABLE IF NOT EXISTS Orders (
	OrderID 	serial primary key not null,
	OrderDate	date not null,
	SupplierID	integer references Supplier (SupplierID) not null,
	EmployeeID	integer references Employee (EmployeeID) not null
) 
TABLESPACE DionysusData;

CREATE TABLE IF NOT EXISTS Ingredient (
	IngredientID 	serial primary key not null,
	IngredientName	varchar(40) unique not null,
	Amount			float default 0.00,
	Cost			float not null,
	CHECK			(Amount >= 0),
	CHECK			(Cost > 0)
) 
TABLESPACE DionysusData;

CREATE TABLE IF NOT EXISTS Item (
	ItemID 			serial primary key not null,
	Quantity  		integer default 0,
	ItemAmount		float not null,
	IngredientID	integer references Ingredient (IngredientID) not null,
	OrderID			integer references Orders (OrderID) not null,
	CHECK			(Quantity > 0),
	CHECK			(ItemAmount > 0)	
) 
TABLESPACE DionysusData;

CREATE TABLE IF NOT EXISTS Beer (
	BeerID 			serial primary key not null,
	BeerName		varchar(40) unique not null,
	AlcoholPercent	float not null,
	BeerType		varchar(8) not null,
	BeerPrice		float not null default 4.00,
	BeerAmount		float not null default 0,
	ServingSize 	integer default 16 not null,
	CHECK 			(AlcoholPercent > 0.00),
	CHECK 			(AlcoholPercent <= 100.00),
	CHECK 			(BeerPrice > 0.00),
	CHECK 			(BeerAmount >= 0),
	CHECK 			(ServingSize > 0),
	CHECK 			(BeerID > -1)
) 
TABLESPACE DionysusData;

CREATE TABLE IF NOT EXISTS Recipe (
	BeerID 				integer references Beer(BeerID) not null,
	IngredientID 		integer references Ingredient(IngredientID) not null,
	EstimatedAmount 	float default 0.00,
	primary key 		(BeerID, IngredientID)
)
TABLESPACE DionysusData;

CREATE TABLE IF NOT EXISTS Yield (
	YieldID 	serial primary key not null,
	YieldDate	date not null,
	YieldAmount	float default 0.00,
	BeerID		integer references Beer (BeerID) not null,
	EmployeeID	integer references Employee (EmployeeID) not null
) 
TABLESPACE DionysusData;

CREATE TABLE IF NOT EXISTS Keg (
	KegID 		serial primary key not null,
	StatusDate	date not null,
	KegStatus	varchar(8) default 'Clean' not null,
	KegSize		float default 5.00 not null,
	UpdatedBy 	integer references Employee (EmployeeID) not null,
	YieldID		integer references Yield (YieldID),
	CHECK		(KegSize = 3 OR KegSize = 5),
	CHECK		(KegStatus = 'clean' OR KegStatus = 'dirty' OR KegStatus = 'washing' OR KegStatus = 'full' OR KegStatus = 'empty')
)
TABLESPACE DionysusData;

CREATE TABLE IF NOT EXISTS Customer (
	CustomerID 		serial primary key not null,
	CustomerName 	varchar(56) default 'John Doe' not null,
	PhoneNumber		varchar(10) default null
	) 
TABLESPACE DionysusData;

CREATE TABLE IF NOT EXISTS Sale (
	SaleID 	serial primary key not null,
	SaleDate	date not null,
	CustomerID	integer references Customer (CustomerID) not null,
	EmployeeID	integer references Employee (EmployeeID) not null,
	CHECK 		(SaleDate <= current_date)
) 
TABLESPACE DionysusData;


CREATE TABLE IF NOT EXISTS Product (
	ProductID 	serial primary key not null,
	Quantity	integer default 0 not null,
	YieldID		integer references Yield (YieldID) not null,
	SaleID		integer references Sale (SaleID) not null,
	CHECK		(Quantity >= 0)
) 
TABLESPACE DionysusData;