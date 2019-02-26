DROP DATABASE strathmore;
CREATE DATABASE strathmore;

-- clear table (TRUNCATE) --
-- truncate table "tablename"
truncate table students;

-- delete table (DROP) --
-- drop table "tablename"
drop table students;

-- student table --
CREATE TABLE students(
    id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY
,	firstName VARCHAR(30) NOT NULL
,   lastName VARCHAR(50) NOT NULL
,   dob DATE
,   email VARCHAR(128) NOT NULL
,	uid VARCHAR(7) UNIQUE NOT NULL
,	campusID VARCHAR(8)
,   password VARCHAR(32) NOT NULL
);
