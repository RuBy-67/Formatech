<?php
require_once(__DIR__ . "\..\\Autoloader.php");
use Mapper\PromotionMapper;
use Mapper\StudentMapper;

$promotionMapper = new PromotionMapper();
$promotions = $promotionMapper->getList();

$studentMapper = StudentMapper::getInstance();
$students = $studentMapper->getList();
?>

<h2>Ajouter un étudiant à une promotion</h2>

<form action="/formatech/Actions/student_add_in_promotion.php" method="post">
    <label for="studentId">Sélectionnez un étudiant :</label>
    <select id="studentId" name="studentId" required>
        <?php foreach ($students as $student): ?>
            <option value="<?= $student->getId() ?>"><?= $student->getFirstName() ?></option>
        <?php endforeach; ?>
    </select>

    <br>

    <label for="promotionId">Sélectionnez une promotion :</label>
    <select id="promotionId" name="promotionId" required>
        <?php foreach ($promotions as $promotion): ?>
            
            <option value="<?= $promotion->getId() ?>">Année: <?= $promotion->getPromotionYear() ?> , ID :<?= $promotion->getId() ?></option>
        <?php endforeach; ?>
    </select>

    <br>

    <input type="submit" value="Ajouter à la promotion">
</form>