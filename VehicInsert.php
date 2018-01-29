<?php

$title = "Insert Vehicle";
include 'header.php';
include 'DBHelper.php';
include "db_queries.php";

if (isset($_POST['submit'])) {
    $vehic_name = db_quote($_POST['vehic_name']);
    $type = db_quote($_POST['type']);
    $about = db_quote($_POST['about']);
    $iconic = $_POST['iconic'];
    $planet_pid = $_POST['planetselect'];
    
    //echo '<h3>Form POST Method</h3>';
    //echo 'Vehicle Name:' . $vehic_name . '<br />';
    //echo 'Type:' . $type . '<br />';
    //echo 'About:' . $about . '<br />';
    //echo 'Iconic: ' . $iconic . '<br />';
    //echo 'Planet ID: ' . $planet_pid . '<br />';

    
    if ($iconic != "TRUE") {
        //not iconic
        $iconic = 1;
    } else {
        //iconic
        $iconic = 0;
    }
    
    $qry = "INSERT INTO swdb_vehicles ("
            . "vid, "
            . "vehic_name, "
            . "type,"
            . " about, "
            . "iconic, "
            . "Planets_pid) "
            . "VALUES ("
            . "NULL, '".$vehic_name."', '".$type."', '".$about."', '".$iconic."', '".$planet_pid."');";
    
    echo '<br>';
    echo 'The query is: ' .$qry . '<br />';
    
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
    window.location = "Vehicles.php";
</script>


