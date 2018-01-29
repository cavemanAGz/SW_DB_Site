<?php
$title ='Organization Insert';
include 'header.php';
include 'DBHelper.php';
include "db_queries.php";

header( "refresh:2;url=Organizations.php" );

// Check if the form is submitted
 if ( isset( $_POST['submit'] ) ) {
     // retrieve the form data by using the element's name attributes value as key
      $name = db_quote($_POST['name']); 
      $type = db_quote($_POST['type']);
      $about = db_quote($_POST['about']);      
      
      // display the results
echo '<h3>Form POST Method</h3>';
echo 'Organization Name:' . $name . '<br />';
echo 'Organization Type:' . $type . '<br />';
echo 'About:' . $about . '<br />';

$result = db_query("INSERT INTO `woodal-db`.`swdb_organizations` "
        . "(`oid` ,"
        . "`name` ,"
        . "`type` ,"
        . "`about`)"
        . " VALUES "
        . "(NULL , "
        . "'" . $name . "',"
        . " '" . $type . "',"
        . " '" . $about . "');"
        );

$err = db_error();
if ($err != null) {
    echo $err;
}


 } else {
     echo "Error receiving data from the post!";
 }

?>

<script>
    window.location = "Organization.php";
</script>
