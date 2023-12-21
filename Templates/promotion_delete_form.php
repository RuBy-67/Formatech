<?php 

use Mapper\PromotionMapper;

$promotionMapper = PromotionMapper::getInstance();
$promotions = $promotionMapper->getList();

?>

<h2 class="mb-8">Formulaire de suppression de promotion</h2>
<form action="/Templates/promotion_delete.php" method="post" class="flex flex-col justify-center items-center ">
    
    <label for="promotionIdToDelete">promotion à retirer de l'école:</label>
    <select id="promotionIdToDelete" name="promotionIdToDelete" required>
       <?php foreach ($promotions as $promotion) :?>
            <option value="<?=$promotion->getId()?>"><?=$promotion->getPromotionYear() ?> - <?= $promotion->getFormationId()?></option>
        <?php endforeach ;?>
    </select><br>

    <input type="submit" value="Soumettre">
</form>