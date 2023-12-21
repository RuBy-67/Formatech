<?php
require_once(__DIR__ . "\..\\Autoloader.php");
use Mapper\FormationMapper;
$formationMapper = FormationMapper::getInstance();
$formations = $formationMapper->getList();
?>
<h2>Sélection de Formation</h2>

<form action="/formatech/Actions/student_list_by_formation.php" method="post">
    <label for="formationId">Sélectionnez une formation :</label>
    <select id="formationId" name="formationId" required>
        <?php
        foreach ($formations as $formation) {
            echo "<option value='{$formation->getId()}'>{$formation->getName()}</option>";
            echo "<input type='text' name='name' hidden value='{$formation->getName()}'>";
        }
        ?>
    </select>
    <input type="submit" value="Afficher la liste des étudiants">
</form>
