<?php 
require_once(__DIR__ . "\..\Autoloader.php");

Autoloader::register();



function addNewEmployeeInDb($firstName, $lastName, $job, $mail,$database ){
    $database->executeQuery("INSERT INTO employees (`employeeId`, `firstName`, `lastName`, `job`, `mail`) VALUES (?, ?, ?, ?, ?)", [null,$firstName, $lastName, $job, $mail]);
}
//! Todo : câbler à BD
function addNewFormationInDb($name, $durationFormationInMonth, $abbreviation, $rncpLvl, $moduleId, $accessibility, $database){
    exit;
    $database->executeQuery("INSERT INTO formation (`formationId`, `name`, `durationFormationInMonth`, `abbreviation`, `rncpLvl`, 'moduleId','accessibility') VALUES (?, ?, ?, ?, ?, ?, ?)", [null,$name, $durationFormationInMonth, $abbreviation, $rncpLvl, $moduleId, $accessibility]);
}