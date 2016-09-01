<?php 
session_start();
if (!$_SESSION['playmobile'])
 {
	header('location:login.php');
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>PlayMobile - Admin</title>
</head>
<body>

	<div data-role="page" id="admin">
	<?php 
session_start();
if (!$_SESSION['playmobile'])
 {
	header('location:login.php');
}
 ?>
		<div data-role="header" data-theme="b"> 
			<a href="index.php" data-role="button" data-icon="home">Home</a>
			<h1>PlayMobile</h1>
			<a href="logout.php" data-role='button' data-icon='power'>Logout</a>
		</div>
		<h2>Welcome Admin</h2>
		<div style=" width:400px; margin:auto;">
		<form method="post" action="" name="upload" enctype="multipart/form-data">
		<p>Filename <input type="text" name="filename"></p>
		<p>Upload file <input type="file" name="uploadfile"></p>
		<p><input type="submit" name="Upload"></p>

			
		</form>
		</div>
	
            
    

	
            
	</div>

	<?php 
		$filename = $_POST['filename'];
		$user = 'root';
		$pass ='';
		$db = 'playmobile';
		$conn = mysqli_connect('localhost', $user, $pass, $db ) or die( "unable to connect");
		if (isset( $_POST['submit'] ) ) {
			$uploadfile = $_FILES['uploadfile']['name'];
			$dir = './uploads/'.$uploadfile;
			move_uploaded_file($_FILES['uploadfile'][''],$dir);
		}

	?>


	

</body>
</html>
 