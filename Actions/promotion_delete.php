
<?php
require_once(__DIR__ . "/../Autoloader.php");
use Repository\PromotionRepository;
$studentId = $_POST['promotionId'];
 $promotionRepository = new PromotionRepository();
 $promotionRepository->deletePromotionInDb($studentId);
 header("Location: /path/to/success_page.php");
 exit;