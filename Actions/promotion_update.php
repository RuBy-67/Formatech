<?php
session_start();
require_once(__DIR__ . "/../Autoloader.php");

use Entity\Promotion;
use Repository\PromotionRepository;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
   
    $promotionId = isset($_POST['promotionId']) ? $_POST['promotionId'] : null;
    $formationId = isset($_POST['formationId']) ? $_POST['formationId'][0] : null; //! a corriger 
    $promotionYear = isset($_POST['promotionYear']) ? $_POST['promotionYear'] : null;
    $startingDate = isset($_POST['startingDate']) ? $_POST['startingDate'] : null;
    $endingDate = isset($_POST['endingDate']) ? $_POST['endingDate'] : null;

    
    if (!$promotionId) {
        $_SESSION['confirmationMessage'] = 'Erreurs dans la mise à jours de la promotion';
        header("Location: /Pages/panel_employee.php?action=promotion_list");
        exit;
    }

    
    $promotion = new Promotion();
    $promotion->setId($promotionId)
        ->setFormationId($formationId)
        ->setPromotionYear($promotionYear)
        ->setStartingDate($startingDate)
        ->setEndingDate($endingDate);

    
    $promotionRepository = new PromotionRepository();

    $promotionRepository->modifyPromotionInDb($promotion);

    $_SESSION['confirmationMessage'] = 'Promotion modifiées avec succès!';
    header("Location: /Pages/panel_employee.php?action=promotion_list");
    exit;
} else {
   
    $_SESSION['confirmationMessage'] = 'Erreur dans la mise à jours de la promotion';
    header("Location: /Pages/panel_employee.php?action=promotion_list");
    exit;
}
