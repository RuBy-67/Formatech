<?php
require_once(__DIR__ . "/../Autoloader.php");
use Repository\PromotionRepository;
$promotionId = $_POST['promotionIdToDelete'] ?? null;
if (!$promotionId) {
    header("Location: /path/to/error_page.php");
    exit;
}

// Créez une instance de PromotionRepository
$promotionRepository = new PromotionRepository();

// Utilisez la méthode getPromotionDetailsInDb pour obtenir les détails de la promotion par ID
$promotionDetails = $promotionRepository->getPromotionDetailsInDb($promotionId);
// Vérifiez si la promotion existe
if (!$promotionDetails) {
    header("Location: /path/to/error_page.php");
    exit;
}

// Les détails de la promotion sont maintenant dans $promotionDetails
?>
<?php
require_once(__DIR__ . '/../Layouts/header.php');
?>
    <section class="w-full h-[400px] banner-bg bg-cover flex flex-col justify-center items-center mb-8 ">
        <h1 class="text-white text-center ">Supprimer une promotion</h1>
    </section>
    <section class="container h-100%">
        <h3 class="mb-8 text-center">Voulez-vous supprimer la promotion ayant pour ID  "<?php echo $promotionId; ?>" ? <br> Promotion : <?php echo $promotionDetails[0]['promotion_promotionYear']?></h3>
        <form action="/Actions/promotion_delete.php" method="post" class="flex items-center justify-center">
            <input type="hidden" name="promotionId" value="<?php echo $promotionId; ?>">
            <input type="submit" value="Confirmer la suppression">
        </form>
    </section>
<?php
require_once(__DIR__ . '/../Layouts/footer.php');
?>

