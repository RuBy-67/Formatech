<?php
require_once(__DIR__ . "/../Autoloader.php");

use Repository\ModuleRepository;

$moduleIdToDelete = $_POST['moduleIdToDelete'];


$moduleRepository = new ModuleRepository();
$moduleRepository->deletemodule($moduleIdToDelete);

header("Location: {$_SERVER['HTTP_REFERER']}");
exit;