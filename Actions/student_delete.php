<?php
require_once(__DIR__ . "/../Autoloader.php");
use Repository\StudentRepository;
 $studentId = $_POST['studentId'];
 $studentRepository = new StudentRepository();
 $studentRepository->deleteStudentInDb($studentId);
 header("Location: /path/to/success_page.php");
 exit;