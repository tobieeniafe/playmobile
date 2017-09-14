<?php
error_reporting(0);
	$message = '';
	session_start();
	if ($_SESSION['playmobile'] == true) {
		header('location:admin.php');
	}
	else{
		session_destroy(); 
	}

 if ($_POST) {
 	$host = 'localhost';
 	$user = 'root';
 	$pass = '';
 	$db = 'playmobile';
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
        <script src="js/playmobile.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 
	</head>
<body style="background-color:#f1f2f4">
				
				<div class="row">
					<div class="col-md-1"></div>
                    <div class="col-md-1"><a href="index.php" class="btn btn-default" style="background-color:#e6e6e6"><span class="glyphicon glyphicon-home"></span> Home</a></div>
                </div> 
			
            
    
	<div align="center" id="login" class="form" style="min-width: 300; width:400px; margin:auto;">
	<form method="post">
	<h2>Sign In</h2>
		<p><input class="form-control" type="text" name="username" required="" placeholder="USERNAME"></p>
		<p><input class="form-control" type="password" name="password" required="" placeholder="PASSWORD"></p>
		<p><input class="form-control btn btn-primary" type="submit" name="submit" value="SIGN IN"></p>
	</form>
		<?php 
			echo $message;
		?>
	</div>

	

</body>
</html>