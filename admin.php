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
		    
			<form action="upload.php" method="post" enctype="multipart/form-data" data-ajax='false'>
				<input type="file" name="file">
				<input type="text" name="category" placeholder="category">
				<input type="text" name="description" placeholder="description">
				<input type="submit"  name="btn-upload" value="Upload">
			</form>
		    </div>

	<table cellpadding="2" border="2">
    <tr>
    <td>Title</td>
    <td>Category</td>
    <td>Description</td>
    <td>url</td>
    </tr>

    <?php
	$sql="SELECT * FROM tbl_uploads";
	$result_set=mysql_query($sql);
	while($row=mysql_fetch_array($result_set))

	{ $url = "uploads/".$row['title'] ;
        $title = $row['title'] ;
        $sql="UPDATE `tbl_uploads` SET `url`='$url' WHERE title='$title' ";
        mysql_query($sql);
		?>
        <tr>
        <td><?php echo $row['title'] ?></td>
        <td><?php echo $row['category'] ?></td>
        <td><?php echo $row['description'] ?></td>
        <td><a href="<?php echo $url ?>" target="_blank">listen</a></td>
        </tr>
        <?php


	}

	?>
    </table>
    
    <?php
    //IT SHOULD CALL THE CONVERSION FUNCTION BUT TURNS ERROR 
	//include_once 'xmlinput.php';
	?>

    
   

	  
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