<?php
// ---------------------------------
// Author: Eugene Gerber
// Name: comments.inc.php
// Description: Comments Handler
// Used to interact with the Database
// Add, Display, Edit, Delete Comments

// Variables:
// $uid, $date, $message -  Storing ($_POST) input from the Comments Form:
// $sql - SQL statement to interact with the DB
// NOTE: "$result = $conn->query($sql);" == "$result = mysqli_query($conn, $sql);"
// NOTE: "while ($row = $result->fetch_assoc()) {" == "while ($row = mysqli_fetch_assoc($result))
// ---------------------------------

include 'dbh.inc.php';

	// Add Comments
	function setComments($conn) {
		if (isset($_POST['commentSubmit'])) {
			$uid = $_POST['uid'];
			$date = $_POST['date'];
			$message = $_POST['message'];

			$sql = "INSERT INTO comments (uid, date, message) VALUES ('$uid', '$date', '$message')";
			$result = mysqli_query($conn, $sql);
		}
	}

	// Display Comments
	function getComments($conn) {
		$sql = "SELECT * FROM comments";
		$result = mysqli_query($conn, $sql);
		while ($row = mysqli_fetch_assoc($result)) {
			$id = $row['uid'];
			$sql2 = "SELECT * FROM user WHERE id='$id'";
			$result2 = mysqli_query($conn, $sql2);
			if ($row2 = mysqli_fetch_assoc($result2)) { 
				echo "<div class='comment-box'><p>";
				echo "<strong>".$row2['uid']."</strong></br></br>";
				echo nl2br($row['message'])."<br><br>";
				echo ($row['date']);
				echo "</p>";
				echo "
					<form class='delete-form' method='POST' action='".deleteComments($conn)."'>
					    <input type='hidden' name='id' value='".$row['id']."'>
						<button type='submit' name='commentDelete'>Delete</button>
					</form>
					<form class='edit-form' method='POST' action='inc/editComment.inc.php'>
					    <input type='hidden' name='id' value='".$row['id']."'>
					    <input type='hidden' name='uid' value='".$row['uid']."'>
					    <input type='hidden' name='date' value='".$row['date']."'>
					    <input type='hidden' name='message' value='".$row['message']."'>
						<button>Edit</button>
					</form>
					</div>";
			}

			echo "<div class='comment-box'><p>";
			echo "<strong>".$row['uid']."</strong></br></br>";
			echo nl2br($row['message'])."<br><br>";
			echo $row['date']."</p>";
			echo "
				<form class='delete-form' method='POST' action='".deleteComments($conn)."'>
				    <input type='hidden' name='id' value='".$row['id']."'>
					<button type='submit' name='commentDelete'>Delete</button>
				</form>
				<form class='edit-form' method='POST' action='inc/editComment.inc.php'>
				    <input type='hidden' name='id' value='".$row['id']."'>
				    <input type='hidden' name='uid' value='".$row['uid']."'>
				    <input type='hidden' name='date' value='".$row['date']."'>
				    <input type='hidden' name='message' value='".$row['message']."'>
					<button>Edit</button>
				</form>
				</div>";
		}
	}

	// Edit Comments
	function editComments($conn) {
		if (isset($_POST['commentSubmit'])) {
			$id = $_POST['id'];
			$uid = $_POST['uid'];
			$date = $_POST['date'];
			$message = $_POST['message'];

			$sql = "UPDATE comments SET message='$message' WHERE id='$id'";

			$result = mysqli_query($conn, $sql);
			header("Location: ../index.php");
		}
	}

	// Delete Comments
	function deleteComments($conn) {
		if (isset($_POST['commentDelete'])) {
		$id = $_POST['id'];

		$sql = "DELETE FROM comments WHERE id='$id'";

		$result = mysqli_query($conn, $sql);
		header("Location: index.php");
		}
	}