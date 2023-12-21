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

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mise à jour de la promotion</title>
</head>
<body>

<h2>Mise à jour de la promotion</h2>

<form action="/formatech/Actions/promotion_update.php" method="post">
    <input type="hidden" name="promotionId" value="<?php echo $promotionId; ?>">

    <label for="formationId">ID de la formation :</label>
    <input type="number" id="formationId" name="formationId" value="<?php echo $formationId; ?>" required><br>

    <label for="promotionYear">Année de promotion :</label>
    <input type="number" id="promotionYear" name="promotionYear" value="<?php echo $promotionYear; ?>" required><br>

    <label for="startingDate">Date de début :</label>
    <input type="date" id="startingDate" name="startingDate" value="<?php echo $startingDate; ?>" required><br>

    <label for="endingDate">Date de fin :</label>
    <input type="date" id="endingDate" name="endingDate" value="<?php echo $endingDate; ?>" required><br>

    <input type="submit" value="Mettre à jour la promotion">
</form>

</body>
</html>
