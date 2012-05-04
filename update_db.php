<?php

define('DB_NAME', 'c4admin');

/** MySQL database username */
define('DB_USER', 'c4admin');

/** MySQL database password */
define('DB_PASSWORD', 'pfetecadmin');


$conn = mysql_connect('localhost', 'c4admin', 'pfetecadmin');
$db = mysql_select_db('c4admin', $conn);

$sql = "SELECT * FROM wp_posts WHERE guid LIKE '%wp/wordpress/%'";

if( $result = mysql_query($sql) ) {
  
  while ($row = mysql_fetch_assoc($result)) {
    
      $new_guid = str_replace("wp/wordpress/", "", $row['guid']);
      echo "<pre>";
      echo "old_guid = ".$row['guid'];
      echo "=> new_guid = ".$new_guid."<br/>";
      update_db($row['ID'], $new_guid, $conn);
      echo "</pre>===============================\n\r";
  }
  
}

function update_db($post_id, $url, $conn){
  // var_dump($conn);
  $sql = "update wp_posts set wp_posts.guid = '".$url."' where wp_posts.ID=".$post_id;  
  if($result = mysql_query($sql)){
    echo " ====> update success! <br />";
  }
}