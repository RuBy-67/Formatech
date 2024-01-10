<?php
session_start();
require_once(__DIR__ . "/../Autoloader.php");

use Repository\FormationRepository;

$formationIdToDelete = $_POST['formationIdToDelete'];


$formationRepository = new FormationRepository();
$formationRepository->deleteFormation($formationIdToDelete);
$_SESSION['confirmationMessage'] = 'Formation '. $formationIdToDelete .' Suprimmée avec succès!';
header("Location: {$_SERVER['HTTP_REFERER']}");
exit;