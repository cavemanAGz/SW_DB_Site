<?php
$dbhost = 'oniddb.cws.oregonstate.edu';
$dbname = 'woodal-db';
$dbuser = 'woodal-db';
$dbpass = 'bprLv3kwh31H52s7';

function db_query($query) {
    $result = mysqli_query($mysql_handle, $query);
    return $result;
}

function db_select($query) {
    $rows = array();
    $result = db_query($query);
    
    if ($result === false) {
        return false;
    }
    
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function connect_mysql() {
   static $conn = null; 
   
   if ($conn = null) {
       $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
       
       if (mysqli_connect_errno($conn)) {
           echo "Failed to connect to MySQL: " . mysqli_connect_error();
       }
   }
   
   return $conn;
}
 
?>