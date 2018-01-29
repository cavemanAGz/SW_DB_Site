<?php

$title = "Edit Planets";
include "header.php";
include "DBHelper.php";
include "db_queries.php";
$cid = $_GET['id'];
echo 'You are deleteing a planet<br>';
echo 'The selected PID is: '.$cid;

$qry = "DELETE FROM swdb_characters WHERE swdb_characters.cid = ".$cid." ";

$result = db_query($qry);

$err = db_error();
if ($err != null) {
    echo $err;
}

?>

<script>
    window.location = "Characters.php";
</script>