<?php
// ---------------------------------
// Author: Eugene Gerber
// Name: signup.inc.php
// Description: Signup Handler
// Used to interact with the Database
// Enter User data into the DB
// ---------------------------------

// Connect to database 
include 'dbh.inc.php';

// Variables storing input from the Signup Form
// Escape variables for security: mysqli_real_escape_string(connection,escapestring);
$first = mysqli_real_escape_string($conn, $_POST['first']);
$last = mysqli_real_escape_string($conn, $_POST['last']);
$dob = mysqli_real_escape_string($conn, $_POST['dob']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$utype = mysqli_real_escape_string($conn, $_POST['utype']);
$uid = mysqli_real_escape_string($conn, $_POST['uid']);
$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
$campusID = mysqli_real_escape_string($conn, $_POST['campusID']);

// INSERT INTO the database: mysqli_query(connection,query);
// The "header()" function sends a raw HTTP header to a client: header(string); 
// The mysqli_real_escape_string() function escapes special characters in a string for use in an SQL statement: mysqli_real_escape_string(connection,escapestring);

include 'validate.inc.php';

// Query the Database
// $sql = Define the Query to Run

// ********************************
// *** We need to discuss this: ***
// *** Which Table will be used ***
// ********************************

// Test for User Type
// Depending on the input received, INSERT INTO table: "lecturers" or "students"
if ($utype == 'l' || $utype == 'L') {
	$sql="INSERT INTO lecturers (firstName, lastName, dob, email, uid, campusID, password) VALUES ('$first', '$last', '$dob', '$email', '$uid', '$campusID', '$pwd');";
		mysqli_query($conn, $sql); 
} else if ($utype == 's' || $utype == 'S') {
	$sql="INSERT INTO students (firstName, lastName, dob, email, uid, campusID, password) VALUES ('$first', '$last', '$dob', '$email', '$uid', '$campusID', '$pwd');"; 
		mysqli_query($conn, $sql);
} else {
	echo "Invalid Input. Please try again";
}

// INSERT INTO table: "users"
$sql="INSERT INTO users (firstName, lastName, dob, email, utype, uid, campusID, password) VALUES ('$first', '$last', '$dob', '$email', '$utype','$uid', '$campusID', '$pwd');"; 

mysqli_query($conn, $sql);

header("Location: ../index.php?signup=success");
?>