<?php
$title = "Edit Vehicle Commit";
include 'header.php';
include 'DBHelper.php';
include "db_queries.php";

if ( isset( $_POST['submit'] ) ) {
    // retrieve the form data by using the element's name attributes value as key
    $vehic_name = db_quote($_POST['vehic_name']); 
    $type = db_quote($_POST['type']);
    $about = db_quote($_POST['about']);
    $iconic = db_quote($_POST['iconic']);
    $vid = ($_POST['vid']);
    $plan_pid = ($_POST['planetselect']);
      
        if ($iconic != "TRUE") {
            echo 'Not Iconic<br />';
            $iconic = 1;
        } else {
            echo 'Iconic character<br />';
            $iconic = 0;
        }
    
    //display the results
    //echo '<h3>Editing and Sending this stuff</h3>';
    //echo 'Vehicle ID: '.$vid.'<br />';
    //echo 'Vehicle Name:' . $vehic_name . '<br />';
    //echo 'Type:' . $type . '<br />';   
    //echo 'About:' . $about . '<br />';   
    //echo 'Iconic:' . $iconic . '<br />';   
    //echo 'Planet ID:' . $plan_pid . '<br />';
    

    
    $qry = "UPDATE swdb_vehicles v "
            . "SET "
            . "v.vehic_name ='".$vehic_name."', "
            . "v.type ='".$type."', "
            . "v.about ='".$about."', "
            . "v.iconic ='".$iconic."', "
            . "v.Planets_pid = '".$plan_pid."' "
            . "WHERE v.vid ='".$vid."'";
    
    echo 'The query string is: '.$qry .'<br />';
    
    $update = db_query($qry);

    echo '<br />The query has executed! <br />';
    
    $err = db_error();

    if ($err != null) {
        echo $err;
    }
 } else {
     echo "Error receiving data from the post!";
 }

?>


<script>
    window.location = "Vehicles.php";
</script>

