<?php
require_once(__DIR__ . "/../Autoloader.php");
use Mapper\PromotionMapper;
use Mapper\FormationMapper;

$promotionMapper = PromotionMapper::getInstance();
$promotions = $promotionMapper->getList();

$formationMapper = FormationMapper::getInstance();
?>

<section  class="container">
    <h2 class=" text-center">Liste Promotion</h2>
    <table class="w-full">
        <thead class="bg-darkGrey text-white">
            <tr>
                <th>Id</th>
                <th>Promotion Year</th>
                <th>Formation Name</th>
                <th>StartingDate</th>
                <th>EndingDate</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($promotions as $promotion): ?>
                <tr>
                    <td>
                        <?= $promotion->getId() ?>
                    </td>
                    <td>
                        <?= $promotion->getPromotionYear() ?>
                    </td>
                    <td>
                        <?= $promotion->getFormationName() ?>
                    </td>
                    <td>
                        <?= $promotion->getStartingDate() ?>
                    </td>
                    <td>
                        <?= $promotion->getEndingDate();?>
                        
                    </td>
                    <td><a href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=promotion_update&id=<?= $promotion->getId() ?>" class="bg-white rounded-md px-1">Modifier</a></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</section>