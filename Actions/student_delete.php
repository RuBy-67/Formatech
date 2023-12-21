<?php
require_once(__DIR__ . "/../Autoloader.php");
use Repository\StudentRepository;
 $studentId = $_POST['studentId'];
 $studentRepository = new StudentRepository();
 $studentRepository->deleteStudentInDb($studentId);
 header("Location: /Pages/panel_employee.php");
 exit;