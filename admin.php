<?php
	// REDIRECT IF USER NOT LOGGED IN 
	session_start();
	if (!$_SESSION['playmobile']) {
		header('location:login.php');
	}
?>

<?php
//FILE UPLOAD
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$filetype = pathinfo($target_file,PATHINFO_EXTENSION);
$notif = ' ';

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 15000000) //15mb
{
    echo "Sorry, your file is too large. <br>";
    $uploadOk = 0;
}
// Allow certain file formats
if($filetype != "mp3" and $filetype != "rar" and $filetype != "zip") //working 
 {
    echo "Sorry, only mp3 files are allowed. <br>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $notif = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file. <br>";
    }
}
?>




<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>PlayMobile - Admin</title>
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
        <script src="js/playmobile.js"></script>
         
	</head>
<body>
	<h1>Welcome Admin</h1>
	<a href="logout.php">Logout</a>

	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
	    Select file to upload:
	    <input type="file" name="fileToUpload" id="fileToUpload">
	    <input type="submit" value="Upload file" name="submit">
	</form>
	<?php 
	 echo $notif;
	 ?>

</body>
</html>