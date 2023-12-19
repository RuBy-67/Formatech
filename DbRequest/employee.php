<?php 
require_once(__DIR__ . "\..\Autoloader.php");
Autoloader::register();

function addNewEmployeeInDb($firstName, $lastName, $job, $mail , $database){
    $database->executeQuery("INSERT INTO employees (firstName, lastName, job, mail) VALUES (?, ?, ?, ?, ?, ?)", [$firstName, $lastName, $job, $mail]);
}
