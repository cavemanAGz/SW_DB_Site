<?php

    $title = "Insert Caharcter organization memberships";
    include 'header.php';
    include 'DBHelper.php';
    include "db_queries.php";
    //echo 'You are now inserting!';
    
    if(isset($_POST['submit'])) {
        $vehic = db_quote($_POST['vehicselect']);
        $char = db_quote($_POST['charselect']);
        
        //echo '<h3>Form POST Method</h3>';
        //echo 'Vehicle:' . $vehic . '<br />';
        //echo 'Character:' . $char . '<br />';
        
        $qry = "INSERT INTO swdb_rel_char_vehicle ("
                . "swdb_vehicles_vid, swdb_characters_cid) "
                . "VALUES ('".$vehic."', '".$char."');";
        
        //echo 'The query string: '.$qry;
        
        $result = db_query($qry);
    
        //echo 'The query string: '.$qry;
    
        $err = db_error();
        if ($err != null) {
            echo $err;
            //Error Toast?
            //echo '<script>
            //window.location = "Characters.php";
            //</script>';
        }        
        
    } else {
    //put a toast here
    echo "Error receiving data from the post!";    
}
?>

<script>
    window.location = "Char_Vehic.php";
</script>
    
    
