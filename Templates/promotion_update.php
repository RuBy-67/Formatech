<?php
require_once(__DIR__ . "/../Autoloader.php");

use Repository\PromotionRepository;


$promotionId = 1;


if (!$promotionId) {
    header("Location: /path/to/error_page.php");
    exit;
}


$promotionRepository = new PromotionRepository();

$promotionDetails = $promotionRepository->getPromotionDetailsInDb($promotionId);

if (!$promotionDetails) {
    header("Location: /path/to/error_page.php");
    exit;
}


$formationId = $promotionDetails['promotion_formationId'];
$promotionYear = $promotionDetails['promotion_promotionYear'];
$startingDate = $promotionDetails['promotion_startingDate'];
$endingDate = $promotionDetails['promotion_endingDate'];
?>


<h2>Mise à jour de la promotion</h2>

<form action="/Actions/promotion_update.php" method="post" class="flex flex-col justify-center items-center">
    <input type="hidden" name="promotionId" value="<?php echo $promotionId; ?>">
    <div class="grid grid-cols-2 gap-x-8 gap-y-3 mb-8 justify-items-center">
        <div class="flex flex-col items-center">
            <label for="formationId">ID de la formation :</label>
            <input type="number" id="formationId" name="formationId" value="<?php echo $formationId; ?>" required><br>
        </div>
        <div class="flex flex-col items-center">
            <label for="promotionYear">Année de promotion :</label>
            <input type="number" id="promotionYear" name="promotionYear" value="<?php echo $promotionYear; ?>" required><br>
        </div>
        <div class="flex flex-col items-center">
            <label for="startingDate">Date de début :</label>
            <input type="date" id="startingDate" name="startingDate" value="<?php echo $startingDate; ?>" required><br>
        </div>
        <div class="flex flex-col items-center">
            <label for="endingDate">Date de fin :</label>
            <input type="date" id="endingDate" name="endingDate" value="<?php echo $endingDate; ?>" required><br>
        </div>
    </div>
    <input type="submit" value="Mettre à jour la promotion">
</form>
