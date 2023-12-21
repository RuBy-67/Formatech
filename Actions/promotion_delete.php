
<?php
require_once(__DIR__ . "/../Autoloader.php");
use Repository\PromotionRepository;
$studentId = $_POST['promotionId'];
 $promotionRepository = new PromotionRepository();
 $promotionRepository->deletePromotionInDb($studentId);
 header("Location: /Pages/panel_employee.php");
 exit;