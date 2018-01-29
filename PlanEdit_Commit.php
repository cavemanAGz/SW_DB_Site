//First insert into db, then redirect, maybe a toast?
<?php
$title = "Edit Planet Commit";
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
      $pid = ($_POST['pid']);
      $orig_name = ($_POST['orig_name']);
      /**
      //display the results
      echo '<h3>Editing and Sending this stuff</h3>';
      echo 'Planet name:' . $plan_name . '<br />';
      echo 'Climate:' . $climate . '<br />';
      echo 'Population:' . $pop . '<br />';
      echo 'Notes: ' . $notes . '<br />';
      echo 'PID: ' . $pid . '<br />';
        **/
        if ($orig_name === $plan_name) {
            $update = db_query("UPDATE swdb_planets p SET p.plan_name ='".$plan_name."', p.climate ='".$climate."', p.population ='".$pop."', p.notes ='".$notes."' WHERE p.pid ='".$pid."'");
        } else {
            $update = db_query("UPDATE swdb_planets p SET p.climate ='".$climate."', p.population ='".$pop."', p.notes ='".$notes."' WHERE p.pid ='".$pid."'");
        }

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






