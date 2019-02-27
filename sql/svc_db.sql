DROP DATABASE strathmore;
CREATE DATABASE strathmore;

truncate table users;
truncate table lecturers;
truncate table students;
truncate table comments;

drop table users;
drop table lecturers;
drop table students;
drop table comments;

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

CREATE TABLE comments (
	id INT(8) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY
,	date datetime NOT NULL
,   message TEXT NOT NULL
,	uid INT(8) UNSIGNED UNIQUE NOT NULL
);

ALTER TABLE `comments` 
ADD CONSTRAINT `UsersComments_FK` 
FOREIGN KEY (`uid`) REFERENCES `users`(`id`) 
ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE users AUTO_INCREMENT=1230001;

-- ********************************** --
