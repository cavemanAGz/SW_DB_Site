<?php
$title = "Delete a Conflict";
include "header.php";
include "DBHelper.php";
include "db_queries.php";
$oid1 = $_GET['id'];
$oid2 = $_GET['id1'];

//echo 'You are deleteing a Conflict<br>';
//echo 'The selected OID 1 is: '.$oid1 .'<br />';
//echo 'The selected OID 2 is: '.$oid2 .'<br />';

//Now delete the relation
$qry = "DELETE FROM swdb_rel_org_adver 
WHERE 
swdb_organizations_oid = ".$oid1." 
AND 
swdb_organizations_oid1 = ".$oid2.";";

//echo 'The query string is: ' . $qry .'<br />';

$result = db_query($qry);

$err = db_error();
if ($err != null) {
    echo $err;
}

?>

<script>
    window.location = "Adversaries.php";
</script>
