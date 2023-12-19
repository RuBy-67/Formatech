<?php 
require_once(__DIR__ . "\..\Autoloader.php");
Autoloader::register();


function addNewEmployeeInDb($firstName, $lastName, $job, $mail , $database){
    $database->executeQuery("INSERT INTO Formation (name, durationFormationInMonth, abbreviation, rncpLvl, moduleId, accessibility) VALUES (?, ?, ?, ?, ?, ?)", [$formation['nom'], $formation['duree'], $formation['abreviation'], $formation['niveau'], 1, 1]);
}
