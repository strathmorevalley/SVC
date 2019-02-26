<?php
// ---------------------------------
// Author: Eugene Gerber
// Name: validate.inc.php
// Description: Validation Handler
// Used to interact with the Database
// Validate User-entered data
// ---------------------------------

// NOTE: Currently still a work in Progress

// define variables and set to empty values
$first = $last = $dob = $email = $uid = $pwd = $campusID = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $first = test_input($_POST["first"]);
  $last = test_input($_POST["last"]);
  $dob = test_input($_POST["dob"]);
  $email = test_input($_POST["email"]);
  $uid = test_input($_POST["uid"]);
  $pwd = test_input($_POST["pwd"]);
  $campusID = test_input($_POST["campusID"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>