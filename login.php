<?php
	$message = '';
	session_start();
	if ($_SESSION['playmobile']) {
		header('location:admin.php');
	}
	else{
		session_destroy(); 
	}

 if ($_POST) {
 	$host = 'localhost';
 	$user = 'stanley';
 	$pass = 'warri';
 	$db = 'products_playmobile';
 	$username = $_POST['username'];
 	$password = $_POST['password'];
 	$conn = mysqli_connect($host,$user,$pass,$db);
 	$query = "SELECT * from users where username='$username' and password='$password' ";
 	$result = mysqli_query($conn,$query);
 		if (mysqli_num_rows($result) == 1) {
 			session_start();
 			$_SESSION['playmobile'] = 'true';
 			header('location: admin.php');
 		}
 		else {
 			$message = "Invalid username or password ";
 		}
 }

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>PlayMobile - Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
        <script src="js/playmobile.js"></script>
         
	</head>
<body>
		<div data-role="page" id="header">
			<div data-role="header" data-theme="b"> 
				<a href="index.php" data-role="button" data-icon="home">Home</a>
				<h1>PlayMobile</h1> 
			</div>
            
    
	<div align="center" id="login" class="form" style="min-width: 300; width:400px; margin:auto;">
	<form method="post">
	<h2>Sign In</h2>
		<p><input type="text" name="username" required="" placeholder="USERNAME"></p>
		<p><input type="password" name="password" required="" placeholder="PASSWORD"></p>
		<p><input type="submit" name="submit" value="SIGN IN"></p>
	</form>
		<?php 
			echo $message;
		?>
	</div>

		</div>

</body>
</html>