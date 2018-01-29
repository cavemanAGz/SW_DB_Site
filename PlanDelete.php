<?php

$title = "Edit Planets";
include "header.php";
include "DBHelper.php";
include "db_queries.php";
$pid = $_GET['id'];
echo 'You are deleteing a planet<br>';
echo 'The selected PID is: '.$pid;

$qry = "DELETE FROM swdb_planets WHERE swdb_planets.pid = ".$pid." ";

$result = db_query($qry);

$err = db_error();
if ($err != null) {
    echo $err;
}

?>

<script>
    window.location = "Planets.php";
</script>