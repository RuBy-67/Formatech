<?php
session_start();
require_once(__DIR__ . "/../Autoloader.php");

use Repository\StudentRepository;
use Entity\Student;  // Ajout de l'utilisation de la classe Student

// Récupération des données du formulaire
$studentId = $_POST['studentId'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$mail = $_POST['mail'];
$birthDate = $_POST['birthDate'];
$password = $_POST['password'];
$promotionId = $_POST['promotionId'];

// Créez une instance de StudentRepository
$studentRepository = new StudentRepository();

// Créez une instance de l'entité Student avec les nouvelles données
$student = new Student();
$student->setId($studentId)
        ->setFirstName($firstName)
        ->setLastName($lastName)
        ->setMail($mail)
        ->setBirthDate($birthDate)
        ->setPassword($password);

// Mettez à jour l'étudiant dans la base de données
$studentRepository->modifyStudentInDb($student, $promotionId);
// Redirigez vers une page de confirmation ou toute autre page appropriée
$_SESSION['confirmationMessage'] = 'Etudiant(e) '. $firstName.'-'. $lastName.' modifiées avec succès!';
header("Location: {$_SERVER['HTTP_REFERER']}");
exit;