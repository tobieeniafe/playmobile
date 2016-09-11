

<!-- =========== SCRIPT TO CONVERT DATA FROM DATA BASE TO XML FORMAT ================
 -->


<?php  

$config['mysql_host'] = "localhost";
$config['mysql_user'] = "root";
$config['mysql_pass'] = "";
$config['db_name']    = "playmobile";
$config['playlists_table'] = "playlists";  
$config['categories_table'] = "categories";	

//connect to host
mysql_connect($config['mysql_host'],$config['mysql_user'],$config['mysql_pass']);
//select database
@mysql_select_db($config['db_name']) or die( "Unable to select database");

$root_element = 'playmobile'; 


//this will get all our categories
$category_sql = "SELECT * FROM ".$config['categories_table'];

 

 //so first we will retrieve our categories
$result1 = mysql_query($category_sql);
if (!$result1) {
    die('Invalid query1: ' . mysql_error());
}
if(mysql_num_rows($result1)>0)
{
   
   $xml = "<$root_element>";
   $xml .= "<version>v1.0.2</version>";

      while($result_array1 = mysql_fetch_assoc($result1))
      {
            $xml .= "<playerlist>";
            $xml .= "<category>{$result_array1['name']}</category>";
            $xml .= "<description>{$result_array1['description']}</description>";
            
            

            // At this stage
            // we have our categories and we will begin fetching playlists
            // associated with each of them

            //this will get our playlists
            $playlist_sql = "SELECT * FROM ".$config['playlists_table']." WHERE category_id = {$result_array1['id']}";
            $result2 = mysql_query($playlist_sql);
            if (!$result2) {
                die('Invalid query2: ' . mysql_error());
            }
            if(mysql_num_rows($result2)>0)
            {

               while($result_array2 = mysql_fetch_assoc($result2))
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