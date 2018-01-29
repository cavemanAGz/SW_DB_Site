<?php

$title = "Delete a Characters Membership";
include "header.php";
include "DBHelper.php";
include "db_queries.php";
$oid = $_GET['id'];
$cid = $_GET['id1'];

//echo 'Org ID: '.$oid . '<br />';
//echo 'Char ID: '.$cid . '<br />';

//Create query to delete the relattion
$qry = "DELETE FROM swdb_rel_char_org 
WHERE 
swdb_organizations_oid = ".$oid." 
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
    window.location = "Char_Org.php";
</script>