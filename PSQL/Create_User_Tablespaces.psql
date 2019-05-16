/*  Source: 	Create_User_Tablespaces.sql
 *	Author:		Benjamin A Garza III
 *	Date:		April 6, 2019
 *	Class:		CMPS 3420 - Databases
 *	Purpose: 	Create superuser, tablespaces, and database.
 *
 * 	Run: (as admin/root)
 *  	psql -f Create_User_Tablespaces.sql  
 */

CREATE USER Dionysus SUPERUSER PASSWORD 'BrewMaster661' ;  -- create a role.

CREATE TABLESPACE DionysusData
	 OWNER Dionysus
	 LOCATION '/Users/minibeniitec/Desktop/Database/';    -- The directories should be created before in postgres user
 --      [ WITH ( tablespace_option = value [, ... ] ) ]
CREATE TABLESPACE dionysusIdx
	 OWNER Dionysus
	 LOCATION '/Users/minibeniitec/Desktop/Database/DionysusIdx/';     -- separate indexes from relations/tables
 --      [ WITH ( tablespace_option = value [, ... ] ) ]

CREATE DATABASE DionysusBrewingCo 
	OWNER Dionysus 
	TABLESPACE = DionysusData; 

