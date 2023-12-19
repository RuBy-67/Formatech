<?php
require_once(__DIR__ . "\..\\Autoloader.php");
require_once(__DIR__ . "\..\\Functions\index.php");

use Entity\Employee;
use Entity\Formation;

$name = $_POST['name'];
$durationFormationInMonth = $_POST['durationFormationInMonth'];
$abbreviation = $_POST['abbreviation'];
$rncpLvl = $_POST['rncpLvl'];
$moduleIdString = $_POST['moduleId'];
$accessibility = $_POST['accessibility'];

$moduleIdsArray = splitIdsInStringIntoArray($moduleIdString);
$formation = new Formation($name, $durationFormationInMonth, $abbreviation, $rncpLvl, $accessibility,$moduleIdsArray);
Employee::createFormation($name, $durationFormationInMonth, $abbreviation, $rncpLvl,$moduleIdString, $accessibility);