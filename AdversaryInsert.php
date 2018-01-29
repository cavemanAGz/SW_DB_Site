<?php

$title = "Insert Organizational Conflict";
include 'header.php';
include 'DBHelper.php';
include "db_queries.php";

//echo 'Inserting an adversarial relationship!';

if (isset($_POST['submit'])) {
    
    $bel_1 = db_quote($_POST['orgselect']);
    $bel_2 = db_quote($_POST['orgselect1']);
    
    //echo '<h3>Form POST Method</h3>';
    //echo 'Beligerent1:' . $bel_1 . '<br />';
    //echo 'Beligerent2:' . $bel_2 . '<br />';
    
    if ($bel_1 != $bel_2) {
        
        $qry = "INSERT INTO swdb_rel_org_adver ( "
                . "swdb_organizations_oid, swdb_organizations_oid1) "
                . "VALUES ('".$bel_1."', '.$bel_2.');";
    
        $result = db_query($qry);
    
        $err = db_error();
        if ($err != null) {
            echo $err;
            //Error Toast?
            //echo '<script>
            //window.location = "Characters.php";
            //</script>';
        }
    } else {
        //Display error for internal confilict. Not allowed
        echo '<script> '
            . 'window.location = "Adversaries.php";'
            . '</script>';
    }
    
} else {
         //put a toast here
     echo "Error receiving data from the post!";
}

?>

<script>
    window.location = "Adversaries.php";
</script>