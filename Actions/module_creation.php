<?php
require_once(__DIR__ . "\..\\Autoloader.php");


use Repository\ModuleRepository;

$name = $_POST['name'];
$durationInHours = $_POST['durationFormationInHours'];
$selectedSpeakerIds = isset($_POST['speakerId']) ? $_POST['speakerId'] : array();

$moduleRepository = new ModuleRepository();
$moduleRepository->createModule($name, $durationInHours, $selectedSpeakerIds);
exit;
header("Location: {$_SERVER['HTTP_REFERER']}");
exit;

