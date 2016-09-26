

<!-- =========== SCRIPT TO CONVERT DATA FROM DATA BASE TO XML FORMAT ================
 -->


<?php  
include_once 'dbconfig.php';

$config['playlists_table'] = "playlists";  
$config['categories_table'] = "categories";	


$root_element = 'playmobile'; 


//this will get all our categories
$category_sql = "SELECT * FROM ".$config['categories_table'];

 

 //so first we will retrieve our categories
$result1 = mysqli_query($conn,$category_sql);
if (!$result1) {
    die('Invalid query1: ' . mysqli_error($conn));
}
if(mysqli_num_rows($result1)>0)
{
   
   $xml = "<$root_element>";
   $xml .= "<version>v1.0.2</version>";

      while($result_array1 = mysqli_fetch_assoc($result1))
      {
            $xml .= "<playerlist>";
            $xml .= "<category>{$result_array1['name']}</category>";
            $xml .= "<description>{$result_array1['description']}</description>";
            
            

            // At this stage
            // we have our categories and we will begin fetching playlists
            // associated with each of them

            //this will get our playlists
            $playlist_sql = "SELECT * FROM ".$config['playlists_table']." WHERE category_id = {$result_array1['id']}";
            $result2 = mysqli_query($conn,$playlist_sql);
            if (!$result2) {
                die('Invalid query2: ' . mysqli_error($conn));
            }
            if(mysqli_num_rows($result2)>0)
            {

               while($result_array2 = mysqli_fetch_assoc($result2))
               {     
                  $xml .= "<track>";
                     $xml .= "<title>".cdata($result_array2['title'])."</title>";
                     $xml .= "<url>".cdata($result_array2['url'])."</url>";
                  $xml .= "</track>";
               }

            }

            $xml .= "</playerlist>";

      }

   $xml .= "</$root_element>";

}else{
   die("No result found in ".$config['categories_table']);
}

 //close the root element
//$xml .= "</$root_element>]]>";
 
//send the xml header to the browser
//header ("Content-Type:text/xml");

//output
echo $xml;
 
   // clean tags
   $xml =str_replace('<![CDATA[','',$xml);
   $xml = str_replace(']]>','',$xml);
   // store in a file
   $file = fopen('xml/mp3.xml','w');
   fwrite($file, $xml);
   fclose($file); 




// function to add cdata tags
function cdata($x){ return "<![CDATA[".$x."]]>";}

?>



<?php 

//redirect back to upload page
//header('location:admin.php#upload');

 ?>