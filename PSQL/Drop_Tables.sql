/*  Source: 	Drop_Tables.sql
 *	Author:		Benjamin A Garza III
 *	Date:		April 6, 2019
 *	Class:		CMPS 3420 - Databases
 *	Purpose: 	Drop all tables.
 *
 *  Run:
 *      psql -f Drop_Tables.sql dionysusbrewingco dionysus
 */

drop table if exists product;
drop table if exists sale;
drop table if exists customer;
drop table if exists keg;
drop table if exists yield;
drop table if exists recieptoingredient;
drop table if exists recipe;
drop table if exists beer;
drop table if exists item;
drop table if exists ingredient;
drop table if exists orders;
drop table if exists supplier;
drop table if exists salary;
drop table if exists employee;
drop table if exists brewery;
drop table if exists addresses;
