<?php
    $title = "Edit Species Commit";
    include 'header.php';
    include 'DBHelper.php';
    include "db_queries.php";
    //echo 'You will be Submitting the Update query<br />';
    
    if (isset($_POST['submit'])) {
        $spec_name = db_quote($_POST['spec_name']);
        $spec_desc = db_quote($_POST['spec_desc']);
        $swdb_planets_pid = db_quote($_POST['planetselect']);
        $sid = $_POST['sid'];
        
            //echo 'Species ID: '.$spec_name.'<br />';
            //echo 'Species Name:' . $spec_desc . '<br />';
            //echo 'Species Description:' . $swdb_planets_pid . '<br />';   
            //echo 'Home World ID:' . $sid . '<br />';  
            
            $qry = "UPDATE swdb_species s "
                    . "SET s.spec_name ='".$spec_name."', "
                    . "s.spec_desc ='".$spec_desc."', "
                    . "s.swdb_planets_pid ='".$swdb_planets_pid."' "
                    . "WHERE s.sid ='".$sid."'";
            
            //echo 'The query string is: '.$qry .'<br />';
             
            $update = db_query($qry);
            
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

