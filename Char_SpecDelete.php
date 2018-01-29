<?php

$title = "Delete a Characters From a Species";
include "header.php";
include "DBHelper.php";
include "db_queries.php";

$sid = $_GET['id'];
$cid = $_GET['id1'];

//echo 'Species ID: '.$sid . '<br />';
//echo 'Char ID: '.$cid . '<br />';

//Create query to delete the relattion
$qry = "DELETE FROM swdb_rel_char_spec 
WHERE 
swdb_species_sid = ".$sid." 
AND 
swdb_characters_cid = ".$cid.";";

//echo 'The query string is: ' . $qry .'<br />';

$result = db_query($qry);

$err = db_error();
if ($err != null) {
    echo $err;
}

?>

<script>
    window.location = "Char_Spec.php";
</script>