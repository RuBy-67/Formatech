<?php
require_once(__DIR__ . "\..\\Autoloader.php");
use Mapper\FormationMapper;

$formationMapper = FormationMapper::getInstance();
$formations = $formationMapper->getList();
?>


<section>
    <h2 class="text-center">Formulaire de création de Promotion</h2>
    <form action="/Actions/promotion_creation.php" method="post" class="flex flex-col justify-center items-center">
        <div class="grid grid-cols-2 gap-8">
            <div class="flex flex-col items-center">
                <label for="formationId">ID de la formation liée :</label>
                <select id="formationId" name="formationId" required>
                    <?php foreach ($formations as $formation): ?>
                        <option value="<?= $formation->getId() ?>">
                            <?= $formation->getName() ?>
                        </option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="flex flex-col items-center">
                <label for="promotionYear">Année de la promotion :</label>
                <input type="number" id="promotionYear" name="promotionYear" placeholder="Année de la promotion"
                    min="1950" max="2150" required>
            </div>
            <div class="flex flex-col items-center">
                <label for="startingDate">Date de début :</label>
                <input type="date" id="startingDate" name="startingDate" required><br>

            </div>
            <div class="flex flex-col items-center">
                <label for="endingDate">Date de fin :</label>
                <input type="date" id="endingDate" name="endingDate" required><br>
            </div>
        </div>
        <input type="submit" value="Ajouter la promotion">
    </form>
</section>