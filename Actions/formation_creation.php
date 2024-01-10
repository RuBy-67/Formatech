<?php
require_once(__DIR__ . "/../Autoloader.php");

use Repository\FormationRepository;

$name = $_POST['name'];
$durationInMonth = $_POST['durationFormationInMonth'];
$abbreviation = $_POST['abbreviation'];
$rncpLvl = $_POST['rncpLvl'];
$accessibility = $_POST['accessibility'];
$selectedModuleIds = isset($_POST['moduleId']) ? $_POST['moduleId'] : array();



$formationRepository = new FormationRepository();
$formationRepository->createFormation($name, $durationInMonth, $abbreviation, $rncpLvl, $accessibility, $selectedModuleIds);

header("Location: {$_SERVER['HTTP_REFERER']}");
exit;

