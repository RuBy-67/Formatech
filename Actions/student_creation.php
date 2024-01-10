
<?php
session_start();
require_once(__DIR__ . "/../Autoloader.php");

use Repository\StudentRepository;
use Entity\Student;  // Ajout de l'utilisation de la classe Student

// Récupération des données du formulaire
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$mail = $_POST['mail'];
$birthDate = $_POST['birthDate'];
$password = $_POST['password'];
$promotionId = $_POST['promotionId'];  


$newStudent = new Student();
$newStudent
    ->setFirstName($firstName)
    ->setLastName($lastName)
    ->setMail($mail)
    ->setBirthDate($birthDate)
    ->setPassword($password);

$studentRepository = new StudentRepository();

$studentRepository->createStudent($newStudent, $promotionId);

// Redirection vers la page précédente
$_SESSION['confirmationMessage'] = 'Etudiant(e) '.$firstName .'-'. $lastName.' ajoutées avec succès!';
header("Location: {$_SERVER['HTTP_REFERER']}");
exit;
