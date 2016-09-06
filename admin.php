<?php
	// REDIRECT IF USER NOT LOGGED IN 
	session_start();
	if (!$_SESSION['playmobile']) {
		header('location:login.php');
	}
?>

<?php
include_once 'dbconfig.php';
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
	
	

	

<!-- ========================  Admin homepage  ===================================== -->
<div data-role="page" id="adminhome">
  <div data-role="panel" id="myPanel" data-swipe-close="true" data-position-fixed="true" data-theme="a"> 
    <h2>Menu</h2>

	    <ul data-role="listview" data-inset="true">    
	      <li><a href="#upload">Upload Files</a></li>
	      <li><a href="#viewupload">View Uploads</a></li>
	      <li><a href="#">Manage Categories</a></li>
	      <li><a href="#">Settings</a></li>
	    </ul>

  </div> 

  <div data-role="header"  data-theme="b">
    <a href="#myPanel"data-role="button" data-icon="bullets">Menu</a>
    <h1>PlayMobile - Admin</h1>
    <a href="logout.php" data-role="button" data-icon="power" class="ui-btn-right">Logout</a>
  </div>

  <div data-role="main" class="ui-content">
    <h1>Welcome Admin</h1>
    
  </div>
  <!-- Footer start -->
  <div data-role="footer" data-position="fixed" data-id="footernav">
		<div data-role="navbar">
			<ul>
				<li><a href="index.php" data-icon='home' data-role='button'>Home</a></li>
				<li><a href="playerlist.php" rel="external" id="listTracks" data-icon='audio' data-role='button'>Play All</a></li>
				<li><a href="#" data-icon='user' data-role='button'>Contact</a></li>
			</ul>
		</div>
	</div>
	<!-- Footer end -->

  
</div> 


<!-- ===========================   Upload page ========================= -->

<div data-role="page" id="upload">
  <div data-role="panel" id="myPanel" data-swipe-close="true" data-position-fixed="true" data-theme="a"> 
    

	    <ul data-role="listview" data-inset="true">    
	      <li><a href="#upload">Upload Files</a></li>
	      <li><a href="#viewupload">View Uploads</a></li>
	      <li><a href="#">Manage Categories</a></li>
	      <li><a href="#">Settings</a></li>
	    </ul>

  </div> 

  <div data-role="header"  data-theme="b">
  	<a href="#myPanel"data-role="button" data-icon="bullets">Menu</a>
    <h1>PlayMobile - Admin</h1>
    <a href="logout.php" data-role="button" data-icon="power" class="ui-btn-right">Logout</a>
  </div>

  <div data-role="main" class="ui-content">


  		<h3>Select file to Upload</h3>
  		<!-- Upload Form -->
		<div data-role="main" class="ui-content">
		    <div data-role="controlgroup" data-type="horizontal">
		    
			<form action="upload.php" method="post" enctype="multipart/form-data">
				<input type="file" name="file" />
				<button type="submit" name="btn-upload">Upload</button>
			</form>
		    </div>

	  
		</div> 
	</div>

	<!-- Footer start -->
	<div data-role="footer" data-position="fixed" data-id="footernav">
		<div data-role="navbar">
			<ul>
				<li><a href="index.php" data-icon='home' data-role='button'>Home</a></li>
				<li><a href="playerlist.php" rel="external" id="listTracks" data-icon='audio' data-role='button'>Play All</a></li>
				<li><a href="#" data-icon='user' data-role='button'>Contact</a></li>
			</ul>
		</div>
	</div>
	<!-- Footer end -->
</div>




<!-- ==================================  View Uploads page  =================================== -->

<div data-role="page" id="viewupload">
  <div data-role="panel" id="myPanel" data-swipe-close="true" data-position-fixed="true" data-theme="a"> 
    

	    <ul data-role="listview" data-inset="true">    
	      <li><a href="#upload">Upload Files</a></li>
	      <li><a href="#viewupload">View Uploads</a></li>
	      <li><a href="#">Manage Categories</a></li>
	      <li><a href="#">Settings</a></li>
	    </ul>

  </div> 

  <div data-role="header"  data-theme="b">
  	<a href="#myPanel"data-role="button" data-icon="bullets">Menu</a>
    <h1>PlayMobile - Admin</h1>
    <a href="logout.php" data-role="button" data-icon="power" class="ui-btn-right">Logout</a>
  </div>

  <div data-role="main" class="ui-content">
  		<h3>Here Are Your Uploads</h3>
  		<!-- Upload Form -->
		<div data-role="main" class="ui-content">
		    <div data-role="controlgroup" data-type="horizontal">
		    
		    </div>

	  
		</div> 
	</div>

	<!-- Footer start -->
	<div data-role="footer" data-position="fixed" data-id="footernav">
		<div data-role="navbar">
			<ul>
				<li><a href="index.php" data-icon='home' data-role='button'>Home</a></li>
				<li><a href="playerlist.php" rel="external" id="listTracks" data-icon='audio' data-role='button'>Play All</a></li>
				<li><a href="#" data-icon='user' data-role='button'>Contact</a></li>
			</ul>
		</div>
	</div>
	<!-- Footer end -->
</div>





</body>
</html>