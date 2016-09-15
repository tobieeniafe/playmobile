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
  <div data-role="panel" id="myPanel" data-swipe-close="true" data-position-fixed="true" data-theme="b"> 
    <h2>Menu</h2>

	    <ul data-role="listview" data-inset="true">    
	      <li><a href="#upload">Upload Files</a></li>
	      <li><a href="#manage">Manage Categories</a></li>
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
  <div data-role="footer" data-position="fixed" data-id="footernav" data-theme="b">
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
  <div data-role="panel" id="myPanel" data-swipe-close="true" data-position-fixed="true" data-theme="b"> 
    

	    <ul data-role="listview" data-inset="true">    
	      <li><a href="#upload">Upload Files</a></li>
	      <li><a href="#manage">Manage Categories</a></li>
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

				<select name="category">

					<option name="afro" value="1">Afro</option>
					<option name="afro pop" value="8">Afro Pop</option>
					<option name="christian  gospel" value="6">Christian  Gospel</option>
					<option name="country" value="5">Country</option>
					<option name="jazz" value="2">Jazz</option>
					<option name="pop / rock" value="4">Pop / Rock</option>
					<option name="rap" value="9">Rap</option>
					<option name="reggae" value="7">Reggae</option>
					<option name="soul / r  b" value="3">Soul / R  B</option>
						
				</select>
				
				<input type="submit"  name="btn-upload" value="Upload">
			</form>
		    </div>

	<table cellpadding="2" border="2">
    <tr>
    <th>Title</th>
    <th>Category ID</th>
    <th>url</th>
    </tr>

    <?php
	$sql = "SELECT * FROM playlists";
	$result_set=mysqli_query($conn, $sql);
	while($row=mysqli_fetch_array($result_set))

	{ $url = "uploads/".$row['title'] ;
        $title = $row['title'] ;
        $sql="UPDATE `tbl_uploads` SET `url`='$url' WHERE title='$title' ";
        mysqli_query($conn, $sql);
		?>
        <tr>
        <td><?php echo $row['title'] ?></td>
        <td><?php echo $row['category_id'] ?></td>
        <td><a href="<?php echo $url ?>" target="_blank">listen</a></td>
        </tr>
        <?php


	}

	?>
    </table>
    

	</div> 
	</div>

	<!-- Footer start -->
	<div data-role="footer" data-position="fixed" data-id="footernav" data-theme="b">
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



 <?php
    //CALL THE FUNCTION TO WRITE THE XML CODE FROM DATABASE
   // header('location:admin.php#upload');
	include_once 'xmlscript.php';
	?>






<!-- ========================  Manage Categories Page  ===================================== -->
<div data-role="page" id="manage">
  <div data-role="panel" id="myPanel" data-swipe-close="true" data-position-fixed="true" data-theme="b"> 
    <h2>Menu</h2>

	    <ul data-role="listview" data-inset="true">    
	      <li><a href="#upload">Upload Files</a></li>
	      <li><a href="#manage">Manage Categories</a></li>
	      <li><a href="#">Settings</a></li>
	    </ul>

  </div> 

  <div data-role="header"  data-theme="b">
    <a href="#myPanel"data-role="button" data-icon="bullets">Menu</a>
    <h1>PlayMobile - Admin</h1>
    <a href="logout.php" data-role="button" data-icon="power" class="ui-btn-right">Logout</a>
  </div>

  <div data-role="main" class="ui-content">
    <h1>Manage Categories</h1>

    <table cellpadding="2" border="2">
    <tr>
    <th>ID</th>
    <th>Category</th>
    <th>Description</th>
    </tr>

    <?php
	$sql="SELECT * FROM categories";
	$result_set=mysql_query($sql);
	while($row=mysql_fetch_array($result_set))

	{ 
        // $title = $row['title'] ;
        // $sql="UPDATE `tbl_uploads` SET `url`='$url' WHERE title='$title' ";
        // mysql_query($sql);
		?>
        <tr>
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['name'] ?></td>
        <td><?php echo $row['description'] ?></td>
        </tr>
        <?php


	}

	?>
    </table>


    <h3>Add A New Category</h3>
	<div data-role="controlgroup" data-type="horizontal">
    <form method="post" action="" data-ajax='false'>
    	<input type="text" name="cat_name" placeholder="category name">
    	<input type="text" name="cat_des" placeholder="category description">
    	<input type="submit"  name="cat_add" value="Add Category">

    </form>

    <?php 
    if(isset($_POST['cat_add']))
    {
    $cat_name = $_POST['cat_name'];
    $cat_des = $_POST['cat_des'];
    
    $sql2 = "INSERT INTO categories (name, description) VALUES ('$cat_name','$cat_des')";
    mysql_query($sql2); 
    ?>
        <script>
        alert('category added');
        window.location.href='admin.php#manage';
        </script>
    <?php
	} 
	?>
    

    </div>

    
    
  </div>
  <!-- Footer start -->
  <div data-role="footer" data-position="fixed" data-id="footernav" data-theme="b">
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