<?php 
	date_default_timezone_set('Europe/London');
	include_once 'dbh.inc.php';
	include_once 'comments.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
	<title>TEST PHP & SQL | Edit data in the Database | </title>
</head>

<body>

	<div class="main-wrapper">
		<!-- UPDATE the Database -->
		<!-- Run 'editComments()' function - located in  'comments.inc.php' -->
		<!-- $conn = Database Connection - located in' dbh.inc.php' -->

		<!-- Comments -->
		<?php
		$id = $_POST['id'];
		$uid = $_POST['uid'];
		$date = $_POST['date'];
		$message = $_POST['message'];

		echo "
			<h2>Edit Comments</h2>

			<div class='form-wrapper'>
				<form method='POST' action='".editComments($conn)."'>
				    <input type='hidden' name='id' value='".$id."'>
				    <input type='hidden' name='uid' value='".$uid."'>
				    <input type='hidden' name='date' value='".$date."'>
					<textarea name='message' cols='10' rows='10'>".$message."</textarea>
					<br>
					<button name='commentSubmit' type='submit'>Edit</button>
				</form>
			</div>
			";
		?>
	</div>

</body>
</html>