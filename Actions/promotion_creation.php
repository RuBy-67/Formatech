<?php
require_once(__DIR__ . "/../Autoloader.php");

use Repository\PromotionRepository;
use Entity\Promotion;
// Récupération des données du formulaire
$formationId = $_POST['formationId'];
$promotionYear = $_POST['promotionYear'];
$startingDate = $_POST['startingDate'];
$endingDate = $_POST['endingDate'];

// Création d'une nouvelle instance de la classe Promotion
$newPromotion = new Promotion();
$newPromotion
    ->setFormationId($formationId)
    ->setPromotionYear($promotionYear)
    ->setStartingDate($startingDate)
    ->setEndingDate($endingDate);
// Création d'une instance de PromotionRepository
$promotionRepository = new PromotionRepository();
// Appel de la fonction createPromotion avec la promotion nouvellement créée
$promotionRepository->createPromotion($newPromotion);
// Redirection vers la page précédente
header("Location: {$_SERVER['HTTP_REFERER']}");
exit;
