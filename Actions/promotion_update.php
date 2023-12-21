<?php
require_once(__DIR__ . "/../Autoloader.php");

use Entity\Promotion;
use Repository\PromotionRepository;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
   
    $promotionId = isset($_POST['promotionId']) ? $_POST['promotionId'] : null;
    $formationId = isset($_POST['formationId']) ? $_POST['formationId'] : null;
    $promotionYear = isset($_POST['promotionYear']) ? $_POST['promotionYear'] : null;
    $startingDate = isset($_POST['startingDate']) ? $_POST['startingDate'] : null;
    $endingDate = isset($_POST['endingDate']) ? $_POST['endingDate'] : null;

    
    if (!$promotionId) {
        header("Location: /path/to/error_page.php");
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

    
    header("Location: /path/to/success_page.php");
    exit;
} else {
   
    header("Location: /path/to/error_page.php");
    exit;
}
