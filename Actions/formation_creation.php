<?php
require_once(__DIR__ . "\..\\Autoloader.php");


use Entity\Employee;
use Entity\Formation;

$name = $_POST['name'];
$durationFormationInMonth = $_POST['durationFormationInMonth'];
$abbreviation = $_POST['abbreviation'];
$rncpLvl = $_POST['rncpLvl'];
$moduleIdString = $_POST['moduleId'];
$accessibility = $_POST['accessibility'];
$selectedModuleIds = isset($_POST['moduleId']) ? $_POST['moduleId'] : array();
var_dump($selectedModuleIds);
exit;
