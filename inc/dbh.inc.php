<?php
// ---------------------------------
// Author: Eugene Gerber
// Name: dbh.inc.php
// Description: Database Handler
// Used to connect to the Database
// ---------------------------------

// Database Connection Credentials
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "strathmore";

// Connection to the Database
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
	die("Connection Failed: ".mysqli_connect_error());
};

