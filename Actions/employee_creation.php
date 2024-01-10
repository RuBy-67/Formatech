<?php
require_once(__DIR__ . "/../Autoloader.php");

use Repository\EmployeeRepository;

$firstName = $_POST['firstName'];
$lastName =  $_POST['lastName'];
$job = $_POST['job'];
$mail =  $_POST['mail'];
$password = $_POST['password'];



$formationRepository = new EmployeeRepository();
$formationRepository->createEmployee($firstName, $lastName, $job, $mail, $password);

header("Location: {$_SERVER['HTTP_REFERER']}");
exit;

