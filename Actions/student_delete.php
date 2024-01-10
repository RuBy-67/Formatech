<?php
session_start();
require_once(__DIR__ . "/../Autoloader.php");
use Repository\StudentRepository;
 $studentId = $_POST['studentId'];
 $studentRepository = new StudentRepository();
 $studentRepository->deleteStudentInDb($studentId);
 $_SESSION['confirmationMessage'] = 'Etudiant '.$studentId.' Suprimmée avec succès!';
 header("Location: /Pages/panel_employee.php");
 exit;