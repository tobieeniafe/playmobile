

<!-- =========== SCRIPT TO CONVERT DATA FROM DATA BASE TO XML FORMAT ================
 -->


<?php  

$config['mysql_host'] = "localhost";
$config['mysql_user'] = "root";
$config['mysql_pass'] = "";
$config['db_name']    = "playmobile";
$config['table_name'] = "tbl_uploads";	

//connect to host
mysql_connect($config['mysql_host'],$config['mysql_user'],$config['mysql_pass']);
//select database
@mysql_select_db($config['db_name']) or die( "Unable to select database");

$root_element = 'playmobile'; 
$xml         = "<$root_element>";

//select all items in table
$sql = "SELECT * FROM ".$config['table_name'];
 
$result = mysql_query($sql);
if (!$result) {
    die('Invalid query: ' . mysql_error());
}
if(mysql_num_rows($result)>0)
{
   while($result_array = mysql_fetch_assoc($result))
   {
      $xml .= "<playerlist>";
 
      //loop through each key,value pair in row
      foreach($result_array as $key => $value)
      {
         //$key holds the table column name
         $xml .= "<$key>";
 
         //embed the SQL data in a CDATA element to avoid XML entity issues
         $xml .= "<![CDATA[
         $value]]>";
 
         //and close the element
         $xml .= "</$key>";
      }
 
      $xml.="</playerlist>";
   }
}

 //close the root element
$xml .= "</$root_element>";
 
//send the xml header to the browser
header ("Content-Type:text/xml");
 
 $nxml =str_replace('![CDATA[','  ',$xml);
 $xml2 = str_replace(']]','  ',$nxml);
//output the XML data
//echo $xml;
 
   $file = fopen('xml/document.xml','w');
   fwrite($file, $xml2);
fclose($file);
   ?>





?>