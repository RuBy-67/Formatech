<?php
session_start();
require_once(__DIR__ . "/../Autoloader.php");

use Repository\EmployeeRepository;

$employeeIdToDelete = $_POST['employeeIdToDelete'];

$employeeRepository = new EmployeeRepository();
$employeeRepository->deleteEmployee($employeeIdToDelete);
$_SESSION['confirmationMessage'] = 'Donnée de l\'employe ' . $employeeIdToDelete .  ' Suprimmée avec succès!';
header("Location: {$_SERVER['HTTP_REFERER']}");

exit;