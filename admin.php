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
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    
    <title>PlayMobile - Admin</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="style/style.css">

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li><a href="#" id="upload_files_btn">Upload Files</a></li>

                <li><a href="#" id="manage_categories_btn">Manage Categories</a></li>
                
                <li><a href="#" id="settings_btn">Settings</a></li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">

                        <h2>Welcome Admin</h2>
                        <div class="row">
                        <div class="col-md-1"><a href="#menu-toggle" class="btn btn-default" id="menu-toggle" style="background-color:#e6e6e6">&#9776; Menu</a></div>
                        <div class="col-md-8"></div>
                        <div class="col-md-1"><a href="logout.php" class="btn btn-default" style="background-color:#e6e6e6">Logout</a></div>
                        </div>

                        
                        <!-- UPLOAD PAGE -->
                        <div id="upload_page" class="row">
                                
                            <div class="col-md-4">
                                    <h3>Select file to Upload</h3>
                                    <!-- Upload Form -->
                                        
                                        <form action="upload.php" method="post" enctype="multipart/form-data" >
                                            <input type="file" name="file" class="form-control">
                                            <br>
                                            <select name="category" class="form-control">

                                                <?php
                                                    $sql="SELECT id,name FROM `categories`";
                                                    $result_set=mysqli_query($conn,$sql);
                                                    while($row=mysqli_fetch_array($result_set,MYSQLI_ASSOC))

                                                    { $id = $row['id'] ;
                                                        $name = $row['name'] ;
                                                        ?>
                                                        
                                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                                      
                                                        <?php
                                                    }

                                                ?> 
                                                    
                                            </select>
                                            <br>
                                            <input type="submit"  name="btn-upload" value="Upload" class="form-control btn btn-primary" >
                                        </form>
                            </div>
                            <div class="col-md-6">
                                        <table class="table table-responsive">
                                            <tr>
                                            <th>Title</th>
                                            <th>Category ID</th>
                                            <th>url</th>
                                            </tr>

                                            <?php
                                            $sql="SELECT * FROM playlists";
                                            $result_set=mysqli_query($conn,$sql);
                                            while($row=mysqli_fetch_array($result_set,MYSQLI_ASSOC))

                                            { $url = "uploads/".$row['title'] ;
                                                $title = $row['title'] ;
                                                $sql="UPDATE `tbl_uploads` SET `url`='$url' WHERE title='$title' ";
                                                mysqli_query($conn,$sql);
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
                        <!-- UPLOAD PAGE END -->

                        <!-- MANAGE CATEGORIES PAGE -->

                        <div id="manage_categories_page">
                        <div class="row">
                           
                           <h3>Manage Categories</h3>

                                <div class="col-md-5">
                                <table class="table table-responsive">
                                    <tr>
                                    <th>ID</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    </tr>

                                    <?php
                                    $sql="SELECT * FROM categories";
                                    $result_set=mysqli_query($conn,$sql);
                                    while($row=mysqli_fetch_array($result_set,MYSQLI_ASSOC))

                                    {
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
                                </div>


                                <h3>Add A New Category</h3>
                                <div class="col-md-6">
                                <form method="post" action="" data-ajax='false'>
                                    <input class="form-control" type="text" name="cat_name" placeholder="category name">
                                    <br>
                                    <input class="form-control" type="text" name="cat_des" placeholder="category description">
                                    <br>
                                    <input class="form-control btn btn-primary" type="submit"  name="cat_add" value="Add Category">

                                </form>
                                </div>
                                <div class="col-md-1"></div>

                                <?php 
                                if(isset($_POST['cat_add']))
                                {
                                $cat_name = $_POST['cat_name'];
                                $cat_des = $_POST['cat_des'];
                                
                                $sql2 = "INSERT INTO categories (name, description) VALUES ('$cat_name','$cat_des')";
                                mysqli_query($conn,$sql2); 
                                ?>
                                    <script>
                                    alert('category added');
                                    window.location.href='admin.php';
                                    </script>
                                <?php
                                } 
                                ?>

                        </div>
                        </div>

                        <!-- MANAGE CATEGORIES PAGE END-->
<p style="color:#f1f2f4; background-color:#f1f2f4"><?php
    include_once 'xmlscript.php';
?></p>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    $(document).ready(function(){

    $("#upload_files_btn").click(function(){
        $("#upload_page").css('display','block');
        $("#manage_categories_page").css('display','none');
    });
    $("#manage_categories_btn").click(function(){
       $("#upload_page").css('display','none');
       $("#manage_categories_page").css('display','block');
    });
});




    </script>

</body>

</html>
