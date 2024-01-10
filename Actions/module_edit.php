<?php
session_start();
require_once(__DIR__ . "/../Autoloader.php");

use Repository\ModuleRepository;
use Mapper\ModuleMapper;

$moduleId = $_POST['id'];
$newName = $_POST['name'];
$newDurationInHours = $_POST['durationInHours'];
$selectedSpeakersIds = $_POST['speakers'] ?? [];

$moduleMapper = ModuleMapper::getInstance();
$module = $moduleMapper->getOneById($moduleId);

$module->setName($newName);
$module->setDurationInHours($newDurationInHours);

$speakersToAddToModule = array_diff($selectedSpeakersIds, $module->getSpeakersIds());
$speakersToRemoveFromModule = array_diff($module->getSpeakersIds(), $selectedSpeakersIds);

$moduleRepository = new ModuleRepository();
$moduleRepository->updateModule($module);
$moduleRepository->addSpeakersToModule($moduleId, $speakersToAddToModule);
$moduleRepository->removeSpeakersFromModule($moduleId, $speakersToRemoveFromModule);
$_SESSION['confirmationMessage'] = 'Module '. $newName .' modifiées avec succès!';
header("Location: /Pages/panel_employee.php?action=module_list");
exit;
