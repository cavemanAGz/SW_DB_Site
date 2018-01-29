<?php
$title = "Insert Planet";
include 'header.php';
include 'DBHelper.php';
include "db_queries.php";

// Check if the form is submitted
 if ( isset( $_POST['submit'] ) ) {
     // retrieve the form data by using the element's name attributes value as key
      $plan_name = htmlspecialchars($_POST['plan_name']); 
      $climate = htmlspecialchars($_POST['climate']);
      $pop = htmlspecialchars($_POST['population']);
      $notes = db_quote($_POST['notes']);
      
      
      // display the results
      echo '<h3>Form POST Method</h3>';
      echo 'Planet name:' . $plan_name . '<br />';
      echo 'Climate:' . $climate . '<br />';
      echo 'Population:' . $pop . '<br />';
      echo 'Notes: ' . $notes . '<br />';

        $result = db_query("INSERT INTO `woodal-db`.`swdb_planets` "
        . "(`pid` ,"
        . "`plan_name` ,"
        . "`climate` ,"
        . "`population` ,"
        . "`notes`)"
        . " VALUES "
        . "(NULL , "
        . "'" . $plan_name . "',"
        . " '" . $climate . "',"
        . " '" . $pop . "',"
        . " '" . $notes . "');"
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
    window.location = "Planets.php";
</script>


