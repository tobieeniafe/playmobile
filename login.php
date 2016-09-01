<?php
/* session_start();
	if (condition) {
	$_SESSION['playmobile'] = 'true';
	header('location:admin.php');
		}
		else{
			header('location:login.php');
		}
session_destroy(); */
		
	
$message = '';
if ($_POST) {
	
	$user = 'root';
	$pass ='';
	$db = 'playmobile';
	$conn = mysqli_connect('localhost', $user, $pass, $db ) or die( "unable to connect");

	$username = $_POST["username"]; //admin
	$password = $_POST['password']; //admin

	$query = "SELECT * from users where username = '$username' and password = '$password' ";
	$result = mysqli_query($conn,$query);

	if (mysqli_num_rows($result) ==  1) 
	{
		session_start();
		$_SESSION['playmobile'] = 'true';
		header('location:admin.php');
	}
	else{
		 $message = 'Invalid Username or Password';
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
            
    
			<div align="center" id="login" class="form" style=" width:400px; margin:auto;">
			<form action="" method="post" class="form">
				<h2>Sign In</h2>
				<p><input class="input" type="text" name="username" required="" placeholder="Username"></p>
				<p><input class="input" type="password" name="password" required="" placeholder="Password"></p>
				<p><input type="submit" name="submit" value="Sign In"></p>
			</form>
			<?php 
				echo $message;
			?>
			
			</div>

	
            
		</div>

        


</body>
</html>
