<?php

    $title = "Delete Vehicle";
    include "header.php";
    include "DBHelper.php";
    include "db_queries.php";
    
    $vid = $_GET['id'];
    
    echo 'You are deleteing a Vehicle<br>';
    echo 'The selected VID is: '.$vid. '<br />';

    $qry = "DELETE FROM swdb_vehicles WHERE swdb_vehicles.vid = ".$vid." ";

    echo 'The qry txt is: '.$qry. '<br />';
    
    $result = db_query($qry);

    $err = db_error();
    if ($err != null) {
        echo $err;
    }

?>


<script>
    window.location = "Vehicles.php";
</script>

