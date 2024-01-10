
<?php
session_start();
require_once(__DIR__ . "/../Autoloader.php");
use Repository\PromotionRepository;
$studentId = $_POST['promotionId'];
 $promotionRepository = new PromotionRepository();
 $promotionRepository->deletePromotionInDb($studentId);
 $_SESSION['confirmationMessage'] = 'Promotion '.$studentId.' Suprimmée avec succès!';
 header("Location: /Pages/panel_employee.php");
 exit;