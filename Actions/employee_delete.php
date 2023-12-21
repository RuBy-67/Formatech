<?php
require_once(__DIR__ . "\..\\Autoloader.php");

use Repository\EmployeeRepository;

$employeeIdToDelete = $_POST['employeeIdToDelete'];

$employeeRepository = new EmployeeRepository();
$employeeRepository->deleteEmployee($employeeIdToDelete);

header("Location: {$_SERVER['HTTP_REFERER']}");
exit;