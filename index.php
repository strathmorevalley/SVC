<?php 
	date_default_timezone_set('Europe/London');
	include 'inc/dbh.inc.php';
	include 'inc/comments.inc.php';
	include 'inc/login.inc.php';
	session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css" />

	<title>TEST PHP & SQL | Insert data into the Database | </title>
</head>
<body>

	<div class="main-wrapper">
<?php 	
	echo "
		<h2>Login Form</h2>
		<div class='form-wrapper'>
		";

	echo "
		<form method='POST' action='".getLogin($conn)."'>
			<input type='text' name='uid' placeholder='Username'><br>
			<input type='password' name='pwd' placeholder='Password'><br>
			<button type='submit' name='loginSubmit'>Login</button>
		</form>
		";

	echo "			
		<form method='POST' action='".userLogout($conn)."'>
			<button type='submit' name='logoutSubmit'>Logout</button>
		</form>
		";

	if (isset($_SESSION['id'])) {
		echo "You are logged in.";
	} else {
		echo "You are NOT logged in.";
	}
	echo "
		</div>
		";
?>


<!-- Comments -->
<?php 
if (isset($_SESSION['id'])) {
	echo "<div class='form-wrapper'>
			<form method='POST' action='".setComments($conn)."'>
			    <input type='hidden' name='uid' value='uid'>
			    <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
				<textarea name='message' cols='10' rows='10'></textarea>
				<br>
				<button name='commentSubmit' type='submit'>Comment</button>
			</form>
		</div>";
} else {
	echo "You need to be logged in to comment.<br>";
}

	getComments($conn);	
?>	
	
<br><br><br>
<?php 
	echo "
		<h2>Register/Signup</h2>
		<div class='form-wrapper'>
			<form action='inc/signup.inc.php' method='POST'>
				<input type='text' name='first' placeholder='Firstname'>
				<br>
				<input type='text' name='last' placeholder='Lastname'>
				<br>
				<input type='text' name='dob' placeholder='Date of Birth'>
				<br>
				<input type='text' name='email' placeholder='E-mail Address'>
				<br>
				<select name='utype' id=''>
					<option value='S'>Student</option>
					<option value='L'>Lecturer</option>
				</select>
				<br>
				<input type='text' name='uid' placeholder='Username'>
				<br>
				<select name='campusID' id=''>
					<option value='SVC-DUN'>Dundee</option>
					<option value='SVC-BGR'>Blairgowrie</option>
				</select>
				<br>
				<input type='password' name='pwd' placeholder='Password'>
				<br>
		<!-- 		<input type='password' name='pwd-rpt' placeholder='Repeat Password'>
				<br>
		 -->		<button type='submit' name='submit'>Sign Up</button>
			</form>
		</div>
	";
?>



		<!-- File Upload -->
		<?php 
		echo "
			<h2>File upload facility</h2>

			<div class='form-wrapper'>
				<form action='inc/upload.inc.php' method='post' enctype='multipart/form-data'>
				    <label>Select file to upload:</label>
				    <input type='file' name='file' id='file'>
				    <br>
					<button type='submit' name='submit'>UPLOAD</button>
				</form>
			</div>
		</div>
			";
		?>
	</div>
</body>
</html>