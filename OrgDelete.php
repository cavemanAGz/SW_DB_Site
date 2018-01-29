<?php 

    $title = "Delete an Organization";
    include 'header.php';
    include "DBHelper.php";
    include "db_queries.php";
    
    $oid = $_GET['id'];
    echo 'You are deleteing an organization<br>';
    echo 'The selected OID is: '.$oid;

    $qry = "DELETE FROM swdb_organizations WHERE swdb_organizations.oid = ".$oid." ";

   $result = db_query($qry);

    $err = db_error();
    if ($err != null) {
        echo $err;
    }

?>

<script>
    window.location = "Organization.php";
</script>
