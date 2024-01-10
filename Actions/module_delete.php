<?php
session_start();
require_once(__DIR__ . "/../Autoloader.php");

use Repository\ModuleRepository;

$moduleIdToDelete = $_POST['moduleIdToDelete'];


$moduleRepository = new ModuleRepository();
$moduleRepository->deletemodule($moduleIdToDelete);
$_SESSION['confirmationMessage'] = 'Module '.$moduleIdToDelete.' Suprimmée avec succès!';
header("Location: {$_SERVER['HTTP_REFERER']}");
exit;