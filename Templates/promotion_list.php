<?php
require_once(__DIR__ . "\..\\Autoloader.php");
use Mapper\PromotionMapper;

$promotionMapper = new PromotionMapper();
$promotions = $promotionMapper->getList();
var_dump($promotions);

?>

<section>
    <h2>Liste Promotion</h2>
    <table>
        <thead>
            <tr>
                <th hidden>Id</th>
                <th>Promotion Year</th>
                <th>Formation Id</th>
                <th>StartingDate</th>
                <th>EndingDate</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($promotions as $promotion): ?>
                <tr>
                    <td hidden>
                        <?= $promotion->getId() ?>
                    </td>
                    <td>
                        <?= $promotion->getPromotionYear() ?>
                    </td>
                    <td>
                        <?= $promotion->getFormationId() ?>
                    </td>
                    <td>
                        <?= $promotion->getStartingDate() ?>
                    </td>
                    <td>
                        <?= $promotion->getEndingDate();?>
                        
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</section>