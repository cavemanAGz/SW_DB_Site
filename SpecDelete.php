<?php

$title = "Delete species";
include "header.php";
include "DBHelper.php";
include "db_queries.php";
$sid = $_GET['id'];
echo 'You are deleteing a Species<br>';
echo 'The selected PID is: '.$sid .'<br>';

$qry = "DELETE FROM swdb_species WHERE swdb_species.sid = ".$sid." ";

echo $qry;

$result = db_query($qry);

$err = db_error();
if ($err != null) {
    echo $err;
}

?>


<script>
    window.location = "Species.php";
</script>
