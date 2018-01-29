<?php

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <script src="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"></script>
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <meta charset="utf-8"></meta>
    <meta name="viewport" content="width=device-width, initial-scale=1">
          
    <link rel="stylesheet" type="text/css" href="css/myCSS.css"></link>
       
    <title><?php echo $title; ?></title>
</head>
 
<body class="body">
    <div class="navbar">
    <nav class='navbar navbar-default navbar-fixed-top'>            
        <div class="container">                
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle='collapse' data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php" style="color: #f4d941">@UO-SWDB*</a></li>
                    <li><a href="Characters.php" style="color: #f4d941">Characters</a></li>
                    <li><a href="Vehicles.php" style="color: #f4d941">Vehicles</a></li>
                    <li><a href="Planets.php" style="color: #f4d941">Planets</a></li>
                    <li><a href="Species.php" style="color: #f4d941">Species</a></li>
                    <li><a href="Organization.php" style="color: #f4d941">Organizations</a></li>
                    <li><a href="Adversaries.php" style="color: #f4d941">Adversarial Groups</a></li>
                    <li><a href="Char_Org.php" style="color: #f4d941">Organization Memberships</a></li>
                    <li><a href="Char_Vehic.php" style="color: #f4d941">Vehicle Ownership</a></li>
                    <li><a href="Char_Spec.php" style="color: #f4d941">Character SPecies</a></li>
                </ul>
            </div>
        </div>            
    </nav>
    </div>
    <div class="container">         
        <div class="jumbotron text-center row col-md-12 col-md-offset-0">
            <h1><a style="color:#e0492f">@</a> STAR WARS DATABASE <a style="color:white">*</a></h1>
            <h3>!!! Un-official !!!</h3>
            <p>We specialize in the STAR WARS universe PRIOR to Disney!</p>
        </div>
    </div>
     
