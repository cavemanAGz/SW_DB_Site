<?php

/** This file is based on tutorial from:
 *   https://www.binpress.com/tutorial/using-php-with-mysql-the-right-way/17
 *  to ensure db best practices**/


function db_connect() {
    static $conn;
    //echo "In the function db_connect";
    //If connection not available, connect to DB
    if(!isset($conn)) {
        $config = parse_ini_file('config.ini');
        if ($config === null) {
            echo "There was an error parsing the config file";
        }
        
        $conn = mysqli_connect($config['dbhost'], $config['username'], $config['password'], $config['dbname']);
    }
    
    if ($conn === false) {
        echo "There was an error Connecting to MySQL, error: " . mysqli_connect_error(); ;
        return mysqli_connect_error();
    }
    
    return $conn;
}

function db_query($query) {
    //First connect to the DB
    $conn = db_connect();
    
    //Query the DB
    $res = mysqli_query($conn, $query);
    
    return $res;
}

function db_generic_select($query) {
    $rows = array();
    $res = db_query($query);
    
    //If Query return false
    if($res === false) {
        echo "There was an error with the query";
        return false;
    }
    
    //Query is successfull, return the rows
    while ($row = mysqli_fetch_assoc($res)) {
        $rows[] = $row;
    }
    
    return $rows;
}

function db_error() {
    $conn = db_connect();
    return mysqli_error($conn);
}

/** Function to quote and escape user input **/
function db_quote($value) {
    $conn = db_connect();
    return '' . mysqli_real_escape_string($conn, $value) . '';
}
