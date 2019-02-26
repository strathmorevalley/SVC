<?php 
	include 'dbh.inc.php';

	function setComments($conn) {
		if (isset($_POST['commentSubmit'])) {
		// Variables storing input from the Comments Form
		$uid = $_POST['uid'];
		$date = $_POST['date'];
		$message = $_POST['message'];

		$sql = "INSERT INTO comments (uid, date, message) VALUES ('$uid', '$date', '$message')";
		// $result = $conn->query($sql);
		$result = mysqli_query($conn, $sql);
		}
	}

	function getComments($conn) {
		$sql = "SELECT * FROM comments";
		$result = mysqli_query($conn, $sql);
		// while ($row = $result->fetch_assoc()) {
		while ($row = mysqli_fetch_assoc($result)) {
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

	function editComments($conn) {
		if (isset($_POST['commentSubmit'])) {
		// Variables storing input from the Comments Form
		$id = $_POST['id'];
		$uid = $_POST['uid'];
		$date = $_POST['date'];
		$message = $_POST['message'];

		$sql = "UPDATE comments SET message='$message' WHERE id='$id'";
		// $result = $conn->query($sql);
		$result = mysqli_query($conn, $sql);
		header("Location: ../index.php");
		}
	}

	function deleteComments($conn) {
		if (isset($_POST['commentDelete'])) {
		// Variables storing input from the Comments Form
		$id = $_POST['id'];

		$sql = "DELETE FROM comments WHERE id='$id'";
		// $result = $conn->query($sql);
		$result = mysqli_query($conn, $sql);
		header("Location: index.php");
		}
	}