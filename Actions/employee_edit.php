<?php
require_once(__DIR__ . "\..\\Autoloader.php");

use Repository\EmployeeRepository;
use Mapper\EmployeeMapper;


$employeeId = $_POST['id'];
$newFirstName = $_POST['firstName'];
$newLastName = $_POST['lastName'];
$newMail = $_POST['mail'];
$newJob =$_POST['job'];


$employeeMapper = EmployeeMapper::getInstance();
$employee = $employeeMapper->getOneById($employeeId);

$employee->setFirstName($newFirstName)
         ->setLastName($newLastName)
         ->setMail($newMail)
         ->setJob($newJob);

$employeeRepository = new EmployeeRepository();
$employeeRepository->updateemployee($employee);


header("Location: /Pages/panel_employee.php?action=employee_list");
exit;
