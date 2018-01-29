<?php
$title = "Insert Species";
include 'header.php';
include 'DBHelper.php';
include "db_queries.php";
//echo 'You will be inserting a Species <br />';

if (isset($_POST['submit'])) {
    $spec_name = db_quote($_POST['spec_name']);
    $spec_desc = db_quote($_POST['spec_desc']);
    $swdb_planets_pid = $_POST['planetselect'];
    
    //echo '<h3>Form POST Method</h3>';
    //echo 'Species name:' . $spec_name . '<br />';
    //echo 'About :' . $spec_desc . '<br />';
    //echo 'Callsign:' . $swdb_planets_pid . '<br />';
    
    $qry = "INSERT INTO swdb_species (sid, spec_name, spec_desc, swdb_planets_pid) VALUES (NULL, '".$spec_name."', '".$spec_desc."', '".$swdb_planets_pid."');";
    
    echo $qry . '<br />';
    
    $result = db_query($qry);
    $err = db_error();
    
    if ($err != null) {
        echo $err;
    }

    
} else {
    echo "Error receiving data from the post!";
}

?>

<script>
    window.location = "Species.php";
</script>

