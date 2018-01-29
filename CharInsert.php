<?php
$title = "Insert Character";
include 'header.php';
include 'DBHelper.php';
include "db_queries.php";

// Check if the form is submitted
 if ( isset( $_POST['submit'] ) ) {
     // retrieve the form data by using the element's name attributes value as key
      $fname = db_quote($_POST['fname']); 
      $lname = db_quote($_POST['lname']);
      $callsign = db_quote($_POST['callsign']);
      $title = db_quote($_POST['title']);
      $gender = db_quote($_POST['gender']);
      $iconic = db_quote($_POST['iconic']);
      $homeworld = db_quote($_POST['planetselect']);
      
      if ($iconic === "TRUE") {
        //not iconic
        $iconic = 0;
      } else {
        //iconic
        $iconic = 1;
      }
      
      
      // display the results
//echo '<h3>Form POST Method</h3>';
//echo 'First name:' . $fname . '<br />';
//echo 'Last name:' . $lname . '<br />';
//echo 'Callsign:' . $callsign . '<br />';
//echo 'Title: ' . $title . '<br />';
//echo 'Gender: ' . $gender . '<br />';
//echo 'Iconic: ' . $iconic . '<br />';
//echo 'Homeworld ID: ' . $homeworld . '<br />';
      
      $qry = "INSERT INTO swdb_characters (
`cid` ,
`f_name` ,
`l_name` ,
`call_sign` ,
`title` ,
`Gender` ,
`iconic` ,
`Planets_pid`
)
VALUES (
NULL , '" . $fname . "', '" . $lname . "', '" . $callsign . "', '" . $title . "', '" . $gender . "', '" . $iconic . "', '" . $homeworld . "'
);";

$result = db_query($qry);

$err = db_error();
if ($err != null) {
    echo $err;
}

 } else {
     //put a toast here
     echo "Error receiving data from the post!";
 }

?>

<script>
    window.location = "Characters.php";
</script>


