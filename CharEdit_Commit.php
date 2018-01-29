<?php
$title = "Edit Character Commit";
include 'header.php';
include 'DBHelper.php';
include "db_queries.php";

if ( isset( $_POST['submit'] ) ) {
    // retrieve the form data by using the element's name attributes value as key
    $f_name = db_quote($_POST['f_name']); 
    $l_name = db_quote($_POST['l_name']);
    $call_sign = db_quote($_POST['callsign']);
    $title = db_quote($_POST['title']);
    $cid = ($_POST['cid']);
    $gender = db_quote($_POST['gender']);
    $iconic = db_quote($_POST['iconic']);
    $plan_pid = ($_POST['planetselect']);
      
        if ($iconic != "TRUE") {
            echo 'Not Iconic<br />';
            $iconic = 1;
        } else {
            echo 'Iconic character<br />';
            $iconic = 0;
        }
    
    //display the results
    echo '<h3>Editing and Sending this stuff</h3>';
    echo 'Character ID: '.$cid.'<br />';
    echo 'First Name:' . $f_name . '<br />';
    echo 'Last Name:' . $l_name . '<br />';   
    echo 'Call Sign:' . $call_sign . '<br />';   
    echo 'Title:' . $title . '<br />';   
    echo 'Gender:' . $gender . '<br />';   
    echo 'Iconic:' . $iconic . '<br />';   
    echo 'Planet ID:' . $plan_pid . '<br />';
    

    
    $qry = "UPDATE swdb_characters c SET c.f_name ='".$f_name."', c.l_name ='".$l_name."', c.call_sign ='".$call_sign."', c.title ='".$title."', c.Gender = '".$gender."', c.iconic = '".$iconic."', c.Planets_pid = '".$plan_pid."'  WHERE c.cid ='".$cid."'";
    
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
    window.location = "Characters.php";
</script>


