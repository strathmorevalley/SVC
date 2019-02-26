<?php
// ---------------------------------
// Author: Eugene Gerber
// Name: upload.inc.php
// Description: Uploads Handler
// Used to interact with the Database
// Upload certain file types into the DB
// ---------------------------------

if (isset($_POST['submit'])){
	$file = $_FILES['file'];

	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];
	$fileName = $_FILES['file']['name'];
	$fileName = $_FILES['file']['name'];

	// Break the string into an array: "explode(separator,string)" -- containing the filename and the file extention
	$fileExt = explode('.', $fileName);
	// Select the last element in the array: "end()" AND convert it to lowercase: "strtolower()" 
	$fileActualExt = strtolower(end($fileExt));
	// Create an array with allowed file extentions
	$allowed = array('jpg', 'jpeg', 'png', 'pdf', 'doc', 'docx', 'xls', 'xlsx', 'zip', 'rar');

	// Search the array for the specific file extention: "in_array(search,array)" -- search: what to search for. array: which array to search
	if (in_array($fileActualExt, $allowed)) {
		// Error Handling
		if ($fileError === 0) {
			// Check file size - stop upload if < certain size 
			if ($fileSize < 5120000) {
				// Generate a unique ID: uniqid(prefix,more_entropy) --  prefix: prefix to unique ID. more_entropy: true: 23 character string
				$fileNameNew = uniqid('',true).".".$fileActualExt;
				// Set the destination of the uploaded file
				$fileDestination = '../uploads/'.$fileNameNew;
				// Move the uploaded file (temporary) to the destination location
				move_uploaded_file($fileTmpName, $fileDestination);
				// Return to location specified: The header() function sends a raw HTTP header to a client
				header("Location: ../index.php?upload=success");

				// NOTE: For Possible future inclusion 
				// echo "The file " . basename($_FILES['file']['name']) . " has been uploaded.";
				// echo "<div class='image-display'>
				//  	<img src='" . $fileDestination . "' /></div>";				
			} else {
				// Display error message if file size > certain size
				// Format the number of "$fileSize": number_format(number,decimals) 
				echo "Your file is too big: <h3 style=\"color:red;\">" . number_format((($fileSize)/1024),2) . " Kb.</h3><h4>The maximum file size allowed is: 5Mb.</h4>";
			}
		} else {
			echo "There was an error uploading your file";
		}
	} else {
		// Display error message if the file extension is not in the array: "$allowed"
		echo "We do not allow uploads of this file type: <h3 style=\"color:red;\">" . strtoupper($fileActualExt) . "</h3><br> The following file types are allowed: <br><h4>Images: </h4> JPG, JPEG & PNG<br><h4>Documents: </h4> PDF, DOC & DOCX<br><h4>Spreadsheets: </h4> XLS & XLSX<br><h4>Archives: </h4> ZIP & RAR<br><br>";
	}
}
?>