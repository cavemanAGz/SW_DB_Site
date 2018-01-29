<?php

$title = "Delete a Characters Membership";
include "header.php";
include "DBHelper.php";
include "db_queries.php";
$vid = $_GET['id'];
$cid = $_GET['id1'];

echo 'Vehic ID: '.$vid . '<br />';
echo 'Char ID: '.$cid . '<br />';

//Create query to delete the relattion
$qry = "DELETE FROM swdb_rel_char_vehicle 
WHERE 
swdb_vehicles_vid = ".$vid." 
AND 
swdb_characters_cid = ".$cid.";";

echo 'The query string is: ' . $qry .'<br />';

$result = db_query($qry);

$err = db_error();
if ($err != null) {
    echo $err;
}

?>

<script>
    window.location = "Char_Vehic.php";
</script>