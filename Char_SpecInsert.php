<?php
    $title = "Insert Caharcter into a species";
    include 'header.php';
    include 'DBHelper.php';
    include "db_queries.php";
    
    if (isset($_POST['submit'])) {
        $spec = db_quote($_POST['specselect']);
        $char = db_quote($_POST['charselect']);
        
        //echo 'Species ID: ' .$spec. '<br />';
        //echo 'Char ID: ' .$char. '<br />';
        
        $qry = "INSERT INTO swdb_rel_char_spec ("
                . "swdb_species_sid, swdb_characters_cid) "
                . "VALUES ('".$spec."', '".$char."');";
        
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
        echo "Error receiving data from the post!";            
    }
    
?>

<script>
    window.location = "Char_Spec.php";
</script>
