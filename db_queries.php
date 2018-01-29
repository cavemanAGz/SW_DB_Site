<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$bsg_db_select_planets = "SELECT * FROM bsg_planets";
$bsg_db_select_people = "SELECT * FROM bsg_people";

/* ***********************************************************************************
 * ****************************** BEGIN GENERAL QUERIES *****************************
 * These are just the initial generic db queries for populating the pages main list */
$swdb_char_selec_all = "SELECT * FROM swdb_characters ORDER BY f_name";
$swdb_planets_select_all = "SELECT * FROM swdb_planets ORDER BY plan_name";
$swdb_vehcles_select_all = "SELECT * FROM swdb_vehicles ORDER BY vehic_name";
$swdb_species_select_all = "SELECT * FROM swdb_species ORDER BY spec_name";
$swdb_organizations_select_all = "SELECT * FROM swdb_organizations ORDER BY name";
$swdb_adversaries_select_all = "SELECT * FROM swdb_rel_org_adver ORDER BY swdb_organizations_oid";
$swdb_char_org_select_all = "SELECT * FROM swdb_rel_char_org ORDER BY swdb_organizations_oid";
$swdb_char_vehic_select_all = "SELECT * FROM swdb_rel_char_vehicle ORDER BY swdb_vehicles_vid";
$swdb_char_spec_select_all = "SELECT * FROM swdb_rel_char_spec cs ORDER BY cs.swdb_species_sid";
/* ***********************************************************************************
 * ****************************** END GENERAL QUERIES *****************************
 * These are just the initial generic db queries for populating the pages main list */

// Get planet names from planets db to populate add character planets dropdown.
$sql_select_planet_names = "SELECT pid, plan_name "
        . "FROM swdb_planets";

// THis will get teh names of the organizations in the data base to popultat selection boxes
$sql_select_org_name = "SELECT oid, name "
        . "FROM swdb_organizations";

// This will get teh first and last names of all characters
$sql_select_cahr_name = "SELECT cid, f_name, l_name "
        . "FROM swdb_characters";

//Get a vehicle name for selection queries
$sql_select_vehic_name = "SELECT vid, vehic_name FROM swdb_vehicles";

//Get a speciecs name for select queries
$sql_select_spec_name = "SELECT sid, spec_name FROM swdb_species";

$sql_index_char_spec_plan = "SELECt c.cid, c.f_name, c.l_name, c.Planets_pid, s.spec_name, p.plan_name FROM swdb_characters c
INNER JOIN swdb_rel_char_spec rcs ON rcs.swdb_characters_cid = c.cid
INNER JOIN swdb_species s ON s.sid = rcs.swdb_species_sid
INNER JOIN swdb_planets p ON p.pid = c.Planets_pid;";

// Insert for planets no variables TESTIng
$insert_planet = "INSERT INTO `woodal-db`.`swdb_planets` (
`pid` ,
`plan_name` ,
`climate` ,
`population` ,
`notes`
)
VALUES (
NULL , 'Tatooine', 'Hot, Arid.', '200000', 'A harsh desert world orbiting twin suns in the galaxys Outer Rim, Tatooine is a lawless place ruled by Hutt gangsters. Many settlers scratch out a living on moisture farms, while spaceport cities such as Mos Eisley and Mos Espa serve as home base for smugglers, criminals, and other rogues. Tatooines many dangers include sandstorms, bands of savage Tusken Raiders, and carnivorous krayt dragons. The planet is also known for its dangerous Podraces, rampant gambling, and legalized slavery. Anakin Skywalker and Luke Skywalker both grew up on Tatooine, and Obi-Wan Kenobi spent years in hiding on this desolate world. Cite: starwars.com/databank '
);";

$insert_planet_dantooine = "INSERT INTO `woodal-db`.`swdb_planets` (
`pid` ,
`plan_name` ,
`climate` ,
`population` ,
`notes`
)
VALUES (
NULL , 'Dantooine', 'Lush, Temperate', '4000000', 'The site of the first base for the Rebel Alliance, Dantooine is an Outer Rim world, filled with lush forests and green landscapes. The Alliance would later leave Dantooine for a new home in an effort to stay one step ahead of the Empire. Cite: starwars.com/databank '
);";

// Insert Luke skywalker into the character table TESTING
$insert_character = "INSERT INTO `woodal-db`.`swdb_characters` (
`cid` ,
`f_name` ,
`l_name` ,
`call_sign` ,
`title` ,
`Gender` ,
`iconic` ,
`Planets_pid`
)
VALUES (
NULL , 
'Luke', 
'Skywalker', 
'Rogue Leader', 
'Jedi Master', 
'Male', 
'TRUE', 
'2'
);";

?>

