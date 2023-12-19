<?php
require_once(__DIR__ . "\..\\Autoloader.php");
require_once(__DIR__ . "\..\\Functions\index.php");



use Entity\Employee;
use Entity\Module;

$name = $_POST['name'];
$durationFormationInHours = $_POST['durationFormationInHours'];
$speakerIDsString = $_POST['speakerIDs'];



checkIfStringOfIds($speakerIDsString);
$speakerIdsArray = splitIdsInStringIntoArray($speakerIDsString);
$formation = new Module($name, $durationFormationInHours,$speakerIdsArray);

exit;

//! TODO: cabler avec BD
Employee::createModule($name, $durationFormationInHours,$speakerIdsArray);