<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "playmobile";
$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if (mysqli_connect_errno()) {
	echo "error to commect to database: ".mysqli_connect_errno();
}
?>