DROP DATABASE strathmore;
CREATE DATABASE strathmore;

-- clear table (TRUNCATE) --
-- truncate table "tablename"
truncate table students;
truncate table comments;
truncate table students;
truncate table comments;

-- delete table (DROP) --
-- drop table "tablename"
drop table users;
drop table lecturers;
drop table students;
drop table comments;

-- create table (CREATE) --
-- student table --
CREATE TABLE students(
    id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY
,	firstName VARCHAR(30) NOT NULL
,   lastName VARCHAR(50) NOT NULL
,   dob DATE
,   email VARCHAR(128) NOT NULL
,	uid INT(8) UNSIGNED UNIQUE NOT NULL
,	campusID VARCHAR(8)
,   password VARCHAR(32) NOT NULL
);

-- lecturer table --
CREATE TABLE lecturers(
    id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY
,	firstName VARCHAR(30) NOT NULL
,   lastName VARCHAR(50) NOT NULL
,   dob DATE
,   email VARCHAR(128) NOT NULL
,	uid INT(8) UNSIGNED UNIQUE NOT NULL
,	campusID VARCHAR(8)
,   password VARCHAR(32) NOT NULL
);

-- users table --
CREATE TABLE users(
    id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY
,	firstName VARCHAR(30) NOT NULL
,   lastName VARCHAR(50) NOT NULL
,   dob DATE
,   email VARCHAR(128) NOT NULL
,	utype VARCHAR(1)
, 	CHECK (utype='l' OR utype='L' OR utype='s' OR utype='S')
,	uid INT(8) UNSIGNED UNIQUE NOT NULL
,	campusID VARCHAR(8)
,   password VARCHAR(32) NOT NULL
);

-- comments table --
CREATE TABLE comments (
	id INT(8) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY
,	date datetime NOT NULL
,   message TEXT NOT NULL
,	uid INT(8) UNSIGNED UNIQUE NOT NULL
);

-- campus table --
create table campus(
	id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY
,	name VARCHAR(30) NOT NULL
,	address VARCHAR(100)
,	email VARCHAR(50) NOT NULL
,	phone VARCHAR(11) NOT NULL
);

-- course table --
create table courses( ID INT(8) 
,	name VARCHAR(30)
,	description VARCHAR(50)
,	semester VARCHAR(1)
,	unitID INT(8)
);

-- edit/change table (ALTER) --

-- create foreign keys --
ALTER TABLE `comments` 
ADD CONSTRAINT `UsersComments_FK` 
FOREIGN KEY (`uid`) REFERENCES `users`(`id`) 
ON DELETE RESTRICT ON UPDATE RESTRICT;

-- set "table" PK to auto-increment from ="number"
ALTER TABLE users AUTO_INCREMENT=1230001;
ALTER TABLE lecturers AUTO_INCREMENT=1230001;
ALTER TABLE students AUTO_INCREMENT=1230001;

-- insert data into "table" --
INSERT INTO students (firstName, lastName, dob, email, uid, campusID, password) VALUES ('One', 'Student-1', '1984-01-01', 'student1@svc.com', '1230001', 'Dundee', 'password');
INSERT INTO students (firstName, lastName, dob, email, uid, campusID, password) VALUES ('Two', 'Student-21', '1984-01-01', 'student2@svc.com', '1230001', 'Blairgowrie', 'password');
INSERT INTO lecturers (firstName, lastName, dob, email, uid, campusID, password) VALUES ('Lecturer', 'One', '1984-01-01', 'piet@svc.com', '1234567', 'Dundee', 'password');

-- delete instance from "table" --
DELETE FROM students WHERE id='1';
DELETE FROM students WHERE students.id=2 

