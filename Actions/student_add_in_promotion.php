<?php
session_start();
require_once(__DIR__ . "/../Autoloader.php");

use Repository\PromotionRepository;
use Repository\StudentRepository;

$studentId = isset($_POST['studentId']) ? (int)$_POST['studentId'] : null;
$promotionId = isset($_POST['promotionId']) ? (int)$_POST['promotionId'] : null;

// Vérifier si les valeurs de studentId et promotionId sont définies
if ($studentId !== null && $promotionId !== null) {
    $studentRepository = new StudentRepository();
    $promotionRepository = new PromotionRepository();

    // Ajouter l'étudiant à la promotion (en vérifiant d'abord si la paire existe déjà)
    try {
        $studentRepository->addStudentInPromotion($studentId, $promotionId);
        $_SESSION['confirmationMessage'] = 'Données de l\'étudiant '.$studentId.' ajoutées dans '.$promotionId.' avec succès!';
    } catch (Exception $e) {
        $_SESSION['confirmationMessage'] ="Erreur : " . $e->getMessage();
    }
} else {
    $_SESSION['confirmationMessage'] ="Les valeurs de studentId et promotionId ne sont pas définies correctement.";
}
?>
