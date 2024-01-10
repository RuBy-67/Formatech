<?php
require_once(__DIR__ . "/../Autoloader.php");

use Repository\FormationRepository;

$formationIdToDelete = $_POST['formationIdToDelete'];


$formationRepository = new FormationRepository();
$formationRepository->deleteFormation($formationIdToDelete);

header("Location: {$_SERVER['HTTP_REFERER']}");
exit;