<?php
// ---------------------------------
// Author: Eugene Gerber
// Name: login.inc.php
// Description: Login Handler
// Used to interact with the Database
// Login & Logout Functionality
// ---------------------------------
  
include 'dbh.inc.php';

// Login
function getLogin($conn) {
	if (isset($_POST['loginSubmit'])) {
		$uid = $_POST['uid'];
		$pwd = $_POST['pwd'];

		$sql = "SELECT * FROM users WHERE uid='$uid' AND password='$pwd'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) == 1) {
			if ($row = mysqli_fetch_assoc($result)) {
				$_SESSION['id'] = $row['id'];
				header("Location: index.php?loginsuccess");
				exit();
			}
		} else {
			header("Location: index.php?loginfailed");
			exit();
		}
	}
}

// Logout
function userLogout() {
	if (isset($_POST['logoutSubmit'])) {
		session_start();
		session_destroy();
		header("Location: index.php?");
		exit();

	}
}
?>
