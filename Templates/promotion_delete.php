<?php
require_once(__DIR__ . "/../Autoloader.php");
use Repository\PromotionRepository;
$promotionId = 1;  // Remplacez par l'ID de la promotion que vous souhaitez supprimer

if (!$promotionId) {
    header("Location: /path/to/error_page.php");
    exit;
}

// Créez une instance de PromotionRepository
$promotionRepository = new PromotionRepository();

// Utilisez la méthode getPromotionDetailsInDb pour obtenir les détails de la promotion par ID
$promotionDetails = $promotionRepository->getPromotionDetailsInDb($promotionId);
var_dump($promotionDetails);
// Vérifiez si la promotion existe
if (!$promotionDetails) {
    header("Location: /path/to/error_page.php");
    exit;
}

// Les détails de la promotion sont maintenant dans $promotionDetails
?>

Voulez-vous supprimer la promotion ayant pour ID  "<?php echo $promotionId; ?>" ?

<form action="/formatech/Actions/promotion_delete.php" method="post">
    <input type="hidden" name="promotionId" value="<?php echo $promotionId; ?>">
    <input type="submit" value="Confirmer la suppression">
</form>
