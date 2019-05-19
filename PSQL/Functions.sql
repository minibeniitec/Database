/*  Source: 	Create_Tables.sql
 *	Author:		Benjamin A Garza III
 *	Date:		May 17, 2019
 *	Class:		CMPS 3420 - Databases
 *	Purpose: 	Create all tables.
 *
 *  Run:
 *  	psql -f Functions.sql dionysusbrewingco dionysus
 */

CREATE OR REPLACE FUNCTION getBeerSales (integer) 
RETURNS table (beername varchar, sum bigint) AS $$
        Select c.beername, d.sum from (
            Select sum(quantity), beerid from (
                Select quantity, beerid from (
                    select quantity,yieldid from product p inner join sale s on s.saleid = p.saleid and s.saledate > (current_date - $1)
                ) t inner join yield y on t.yieldid = y.yieldid
            ) as f group by f.beerid
        ) d inner join beer c on d.beerid = c.beerid;
$$ LANGUAGE sql;

CREATE OR REPLACE FUNCTION gettotalcustomers (integer) 
RETURNS table(counts bigint) AS $$
        select count(t.*) from (
            Select c.customername from sale s inner join customer c 
            on s.customerid = c.customerid and s.saledate > (current_date - $1)
            group by c.customerid
        ) t;
$$ LANGUAGE sql;

CREATE OR REPLACE FUNCTION gettotalreturningcustomers (integer) 
RETURNS table(counts bigint) AS $$
        select count(a.*) from (
            select * from (
                select t.customerid from (
                    Select c.customerid from sale s inner join customer c 
                    on s.customerid = c.customerid and s.saledate <= (current_date - $1)
                    group by c.customerid
                ) t inner join (
                    Select c.customerid from sale s inner join customer c 
                    on s.customerid = c.customerid and s.saledate > (current_date - $1)
                    group by c.customerid
                ) v on t.customerid = v.customerid 
            ) n group by n.customerid
        ) a;
$$ LANGUAGE sql;

CREATE OR REPLACE FUNCTION getdays (varchar) 
RETURNS integer AS $$
    BEGIN
        RETURN (CURRENT_DATE - to_date($1,'YYYY-MM-DD'));
    END;
$$ LANGUAGE plpgsql;


CREATE OR REPLACE FUNCTION getprofit (integer) 
RETURNS table(bname varchar, bprice float, quantity numeric) AS $$
        select b.beername, b.beerprice, z.sum from (
            Select y.beerid, sum(t.sum) from (
                Select yieldid, sum(quantity) from sale s inner join product p 
                on p.saleid = s.saleid and s.saledate > (CURRENT_DATE - $1) group by yieldid
            ) t inner join yield y on y.yieldid = t.yieldid group by y.beerid
        ) z inner join beer b on b.beerid = z.beerid;
$$ LANGUAGE sql;

CREATE OR REPLACE FUNCTION getmaxprofit (integer) 
RETURNS table(beername varchar, profit float) AS $$
        select bname, max(quantity*bprice) from getprofit(5000) group by bname order by max desc limit 5 ;
$$ LANGUAGE sql;

CREATE OR REPLACE FUNCTION getEmployees () 
RETURNS table(beername varchar, profit float) AS $$
        select bname, max(quantity*bprice) from getprofit(5000) group by bname order by max desc limit 5 ;
$$ LANGUAGE sql;

CREATE OR REPLACE VIEW employees AS
    Select f.employeeid, f.position, f.firstname, f.middlename, f.lastname, f.birthday, f.addressid, t.startdate, t.salaryamount 
    from employee f inner join (
        select s.* from salary s inner join (
            select employeeid, max(startdate) from salary
            group by employeeid order by employeeid asc
        ) e on e.employeeid = s.employeeid and e.max = s.startdate
    ) t on f.employeeid = t.employeeid order by f.position, f.employeeid;

CREATE OR REPLACE VIEW managers AS
Select * from employees where position = 'Manager';

CREATE OR REPLACE VIEW salesteam AS
Select * from employees where position = 'Sales';

CREATE OR REPLACE VIEW brewers AS
Select * from employees where position = 'Brewer';

CREATE OR REPLACE VIEW getmonthlyemployeesales AS
select d.firstname, d.lastname, e.sum from employee d inner join (
    select b.employeeid, sum(c.beerprice*b.sum) from beer c inner join (
        select a.employeeid, y.beerid, sum(a.sum) from yield y inner join (
            select s.employeeid,p.yieldid, sum(p.quantity) from sale s inner join product p
            on s.saledate > CURRENT_DATE-50000 group by s.employeeid, p.yieldid
        ) a on a.yieldid = y.yieldid group by y.beerid, a.employeeid order by a.employeeid
    ) b on b.beerid = c.beerid group by b.employeeid order by b.employeeid asc
) e on d.employeeid = e.employeeid order by e.sum desc;


CREATE OR REPLACE FUNCTION insertemployee (varchar, varchar, varchar, date, varchar, integer, varchar, varchar, varchar, integer)
RETURNS void AS $$
    Insert into employee (firstname, middlename, lastname, birthday, position, ssn, addressid, breweryid) 
    values ($1, $2, $3, $4, $5, $6, (select * from insertaddress($7, $8, $9, $10)), 1);
$$ LANGUAGE sql;

CREATE OR REPLACE FUNCTION insertaddress (varchar, varchar, varchar, integer)
RETURNS bigint AS $$
    INSERT INTO Addresses (Street, City, State, ZIP) VALUES ($1, $2, $3, $4) returns addressid;
$$ LANGUAGE sql;