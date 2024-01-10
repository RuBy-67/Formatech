<?php
require_once(__DIR__ . "/../Autoloader.php");

use Repository\FormationRepository;
use Mapper\FormationMapper;

$formationId = $_POST['id'];
$newName = $_POST['name'];
$newDurationInMonths = $_POST['durationInMonth'];
$newAbbreviation = $_POST['abbreviation'];
$newRncpLvl = $_POST['rncpLvl'];
$newAccessibiliy = $_POST['accessibility'];

$selectedModulesIds = $_POST['modules'] ?? [];

$formationMapper = FormationMapper::getInstance();
$formation = $formationMapper->getOneById($formationId);

$formation->setName($newName);
$formation->setDurationInMonth($newDurationInMonths);
$formation->setAbbreviation($newAbbreviation);
$formation->setRncpLvl($newRncpLvl);
$formation->setAccessibility($newAccessibiliy);

$modulesToAddToformation = array_diff($selectedModulesIds, $formation->getModulesIds());
$modulesToRemoveFromformation = array_diff($formation->getModulesIds(), $selectedModulesIds);

$formationRepository = new FormationRepository();
$formationRepository->updateformation($formation);
$formationRepository->addModulesToformation($formationId, $modulesToAddToformation);
$formationRepository->removeModulesFromformation($formationId, $modulesToRemoveFromformation);

header("Location: {$_SERVER['HTTP_REFERER']}");
exit;
