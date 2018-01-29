<?php   
    
    $title = "Edit an Organization commit";
    include 'header.php';
    include "DBHelper.php";
    include "db_queries.php";
    
    if ( isset( $_POST['submit'] ) ) {
        $name = db_quote($_POST['name']);
        $type = db_quote($_POST['type']);
        $about = db_quote($_POST['about']); 
        $oid = $_POST['oid'];
    
    
        $qry = "UPDATE swdb_organizations o SET o.name ='".$name."',"
                . " o.type ='".$type."', o.about ='".$about."' "
                . "WHERE o.oid ='".$oid."'";
    
        echo 'The query string is: '.$qry;
    
        $update = db_query($qry);

        echo '<br />The query has executed! <br />';
    
        $err = db_error();

        if ($err != null) {
            echo $err;
        }
    } else {
        echo "Error receiving data from the post!";
    }    
    
?>

<script>
    window.location = "Organization.php";
</script>
    

